<?php
namespace Advertikon;

class Twig {
	protected $twig;
	protected $data = array();
	protected $a = null;
	
	public function __construct( $a ) {
		$this->a = $a;

        $classParts = $this->cVersion() ? ['Twig', 'Loader', 'FilesystemLoader'] : ['Twig', 'Loader', 'Filesystem'];
        $className = $this->className( $classParts );

		// specify where to look for templates
		if ( defined( 'DIR_TEMPLATE' ) && defined( 'DIR_MODIFICATION' ) ) {
			$prefix = substr( DIR_TEMPLATE, strlen( dirname( DIR_SYSTEM ) ) + 1 );
			$mod_template = DIR_MODIFICATION . $prefix;

			if ( is_dir( $mod_template ) ) {
				$loader = new $className( $mod_template );
				$loader->addPath( DIR_TEMPLATE );

			} else {
				$loader = new $className( DIR_TEMPLATE );
			}

		} else {
			$loader = new $className( DIR_TEMPLATE );
		}

		if ( defined( 'DIR_DEFAULT_TEMPLATE' ) ) { // Omtext fix
			$loader->addPath( DIR_DEFAULT_TEMPLATE );
		}

		// initialize Twig environment
		$config = [
			'autoescape'  => false,
			'cache'       => DIR_CACHE,
			'auto_reload' => true,
			'debug'       => true,
		];

		$n = $this->className( ['Twig', 'Environment' ] );
		$this->twig = new $n( $loader, $config );

		$classParts = $this->cVersion() ? ['Twig', 'Extension', 'DebugExtension'] : ['Twig', 'Extension', 'Debug'];
        $className = $this->className( $classParts );
		$this->twig->addExtension( new $className() );
		$this->add( $a );
	}

	// do use my Twig or not
	private function cVersion() {
	    return !class_exists( 'Twig_Loader_Filesystem', true );
    }

	private function className( $classParts ) {
	    return implode( $this->cVersion() ? '\\' : '_', $classParts );
    }

	protected function add( Advertikon $a ) {
        $classParts = $this->cVersion() ? ['Twig', 'TwigFunction'] : ['Twig', 'SimpleFunction'];
        $className = $this->className( $classParts );

		$translate_func = new $className( '__', function ( $str ) use ( $a ) {
		    return call_user_func_array( [ $a, '__' ], func_get_args() );
		} );

		$this->twig->addFunction( $translate_func );

		$config_func = new $className( 'c', function ( $str, $def = '' ) use( $a ) {
		    return $a->config( $str, $def );
		} );

		$this->twig->addFunction( $config_func );

		$url_func = new $className( 'u', function ( $route, $query = [] ) use( $a ) {
		    return $a->u( $route, $query );
		} );

		$this->twig->addFunction( $url_func );

		$url_catalog = new $className( 'catalog_url', function () use( $a ) {
		    return $a->u()->catalog_url();
		} );

		$this->twig->addFunction( $url_catalog );

		$script_catalog = new $className( 'catalog_script', function ( $js ) use( $a ) {
		    return $a->u()->catalog_script( $js );
		} );

		$this->twig->addFunction( $script_catalog );

		$css_catalog = new $className( 'catalog_css', function ( $css ) use( $a ) {
		    return $a->u()->catalog_css( $css );
		} );

		$this->twig->addFunction( $css_catalog );

		$configuration_func = new $className( 'config', function ( $str ) use ( $a ) {
		    return $a->config->get( $str );
		} );

		$this->twig->addFunction( $configuration_func );

		$image_func = new $className( 'image', function ( $str ) use ( $a ) {
			if ( !$str ) return '';
	
			// Joomla fix
		   return ( defined( 'HTTP_IMAGE' ) ? HTTP_IMAGE : ( $a->u()->catalog_url() . 'image/' ) ) . $str;
		} );

		$this->twig->addFunction( $image_func );

		$caption_func = new $className( 'caption', function ( $str ) use ( $a ) {
		    return $a->caption( $str );
		} );

		$this->twig->addFunction( $caption_func );

		$printf_func = new $className( 'printf', function ( $str ) {
		    return call_user_func_array( 'sprintf', func_get_args() );
		} );

		$this->twig->addFunction( $printf_func );

		$date_func = new $className( 'date', function ( $str ) {
		    return call_user_func_array( 'date', func_get_args() );
		} );

		$this->twig->addFunction( $date_func );

		$convert_func = new $className( 'currency_convert', function ( $value, $from, $to ) use ( $a ) {
		    return $a->currency->convert( $value, $from, $to );
		} );

		$this->twig->addFunction( $convert_func );

		$format_func = new $className( 'currency_format', function ( $number, $currency, $value = '', $format = true ) use ( $a ) {
		    return $a->currency->format( $number, $currency, $value, $format );
		} );

		$this->twig->addFunction( $format_func );

        $classParts = $this->cVersion() ? ['Twig', 'TwigFilter'] : ['Twig', 'SimpleFilter'];
        $className = $this->className( $classParts );

		$filter_html_decode = new $className( 'html_decode', function ( $string ) {
			return htmlspecialchars_decode( $string );
		} );

		$this->twig->addFilter( $filter_html_decode );

		$filter_wrap_p = new $className( 'wrap_p', function ( $string ) {
			$parts = preg_split( '/\r?\n/', $string );
			return '<p>' . implode( '</p><p>', $parts ) . '</p>';
		} );

		$this->twig->addFilter( $filter_wrap_p );

		$this->twig->addTokenParser( new Parser\Func() );
	}
	
	public function render( $template, $data ) {
		try {
			if ( $pos = strrpos( $template, '.twig' ) ||  $pos = strrpos( $template, '.tpl' )  ) {
				$template = substr( $template, 0 , $pos );
			}

			// Absolute path
			if ( $template[ 0 ] === '/' ) {
				$base = $this->get_base_dir( $template );

				$this->twig->getLoader()->addPath( $base );
				$template = substr( $template, strlen( $base ) );

			} elseif ( !$this->a->is_admin() && strpos( $template, 'default/template/' ) !== 0 ) {
				$template = 'default/template/' . $template;
			}

			// load template
			$template = $this->twig->loadTemplate( $template . '.twig' );

			// suppressing OpenCart's Twig PHP v7 deprecation warning
            set_error_handler ( function ( $errno, $errstr, $errfile, $errline ) {
                $srt = $errstr . ( $errfile ? " in $errfile" : '' ) . ( $errline ? " on line $errline" : '' );
                $this->a->error( $srt );

            } ,E_DEPRECATED );

			$html = $template->render( $data );
			restore_error_handler();

			return $html;

		} catch (Exception $e) {
			throw new \Exception('Error: Could not load template ' . $template . '!');
		}	
	}

	protected function get_base_dir( $template ) {
		$base = '';

		if ( ( $len = $this->base_part( $template, DIR_SYSTEM ) ) > 0 ) {
			$base = substr( $template, 0, $len );
		}

		if ( !$base || !is_readable( $base ) ) {
			if ( ( $len = $this->base_part( $template, DIR_STORAGE ) ) > 0 ) {
				$base = substr( $template, 0, $len );
			}
		}

		return $base && is_readable( $base ) ? $base : '/';
	}

	protected function base_part( $a, $b ) {
		for( $i = 0; $i < strlen( $a ); $i++ ) {
			if ( !isset( $b[ $i ] ) || $a[ $i ] !== $b[ $i ] ) {
				break;
			}
		}

		return $i;
	}
}
