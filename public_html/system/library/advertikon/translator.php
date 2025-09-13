<?php /** @noinspection PhpIncludeInspection */

/**
 * @package Advertikon
 * @author Advertikon
 * @version 0.00.000   
 */

namespace Advertikon;

use Advertikon\Element\Bootstrap\Button;
use advertikon\element\Div;
use Advertikon\Element\Select;
use Advertikon\Element\TextArea;

class Translator {
	protected $a;
	protected $language_code;
	protected $data = [];
	protected $inline_translate = false;
	protected $form_is_rendered = false;
	protected $default_language = 'en-gb';
	protected $files = [];
	protected $tried_files = [];

	/**
	 * Translator constructor.
	 * @param Advertikon $a
	 */
	public function __construct( Advertikon $a ) {
		$this->a = $a;

		if ( version_compare( VERSION, '2.2.0.0', '<=' ) ) {
			$this->default_language = 'english';
		}

		$this->load();
		$this->inline_translate = Setting::get( 'inline_translate', $a, false );
	}

	/**
	 * Returns translation
	 * @param string $text Translation code
	 * @return string
	 * @throws Exception
	 */
	public function get( $text ) {
		$args = func_get_args();
		$translation = $this->translate( $text );

		if ( count( $args ) > 1 ) {
			if ( 'dump' === $args[ 1 ] ) {
				$this->dump();

			} else {
				array_shift( $args );
				array_unshift( $args, $translation );
				$substitution = call_user_func_array( 'sprintf' , $args );

				if ( $substitution ) {
					$translation = $substitution;
				}
			}
		}

		if ( $this->inline_translate ) {
			$this->wrap_inline_translation( $translation, $text );
		}

		return $translation;
	}

	/**
	 * Adds/sets translation to translation file
	 * @param string $text Text
	 * @param string $code Translation code
	 * @param string $language Language code
	 * @param boolean $catalog Forcibly sets catalog as current side
	 * @throws Exception
	 */
	public function add_translaton( $text, $code, $language, $catalog ) {
		$file = $this->get_translation_file( $language, $catalog );
		$found = false;
		$this->check_file( $file );

		$lines = explode( "\n", file_get_contents( $file ) );
		$t = str_replace( [ "\r\n", "\r", "\n", ], '<line_break>', $this->escape( $text ) );
		$string = '$' . "_['" . $this->escape( $code ) . "'] = '$t';";

		foreach( $lines as &$line ) {
			if ( preg_match( '/\$_\[\s*([\'"])' . preg_quote( addcslashes( $code, "'" ), '/' ) .
                '\1\s*]/', $line ) ) {

				$line = $string;
				$found = true;
				break;
			}
		}

		if ( !$found ) {
			$lines[] = $string;
		}

		$this->a->log( 'Saving translation into ' . $file );

		file_put_contents( $file , implode( "\n", $lines ) );
	}

	protected function escape( $text ) {
		return addcslashes( $text, "\\'" );
	}

	/**
	 * Renders translate control
	 * @param string $code Translation code
	 * @param boolean $catalog Forcibly sets catalog side as current side
	 * @return string
	 * @throws Exception
	 * @throws \Exception
	 */
	public function render_translate_control( $code, $catalog = true ) {
		$translations = $this->get_translations( $code, $catalog );

		$applyButton = (new Button())
			->isPrimary()
			->textBefore( $this->a->__( 'Apply' ) )
			->icon( 'fa-language' )
			->attributes()->set( 'data-url', $this->a->u('translate' ) )
			->getClass()->add( 'adk-translate-apply pull-right' );

		$wrapper = (new Div())->getClass()->add( "adk-translate-caption" )
			->attributes()->set( ['data-code' => $code, 'data-catalog' => $catalog ? '1' : '0' ] );

		$controlView = (new Div())->getClass()->add( "adk-translate-control-view" )
			->style()
				->height('100px')
				->overflow('hidden')->stop();

		$controlSet = (new Div())->getClass()->add( "adk-translate-control-set" )
			->style()->position('relative' )->top(0)->left(0)->stop();

		$wrapper->children( $controlView );
		$controlView->children( $controlSet );
		$index = 0;

		foreach( $translations as $language_code => $translation ) {
			$controlSet->children(
				(new TextArea( $translation ))
				->id( "adk-translate-control-input-$language_code" )
				->attributes( $translation )->set( 'data-language', $language_code )
				->getClass( $index++ === 0 ? 'actiff' : null )->add( "adk-translate-text" )
				->style()->width('100%')->height('100px')->stop()
			);
		}

		$row = (new Div())->getClass()->add( 'row' );
		$wrapper->children( $row );

		$selectWrapper = (new Div())->getClass()->add( "col-sm-10 adk-translate-control-select-wrapper" );
		$row->children( $selectWrapper );

		$index = 0;
		foreach( $translations as $language_code => $translation ) {
			$selectWrapper->children( (new \Advertikon\Element\Image( Language::getByCode($language_code)->get_flag() ) )
				->getClass( $index++ === 0 ? 'actiff' : null )->add( 'adk-translate-flag' )
				->style()->cursor('pointer')->stop()
				->attributes()->set( 'data-language', $language_code )
			);
		}

		$row->children( (new Div( $applyButton ) )->getClass()->add("adk-translate-control-buttons col-sm-2") );

		return $wrapper;
	}

    /**
     * Returns information for all available system languages
     * @param Advertikon $a
     * @return NULL[][]
     * @throws Exception
     */
	static public function get_languages( Advertikon $a ) {
		$data = [];

		foreach( Language::get_languages( $a ) as $language ) {
			$data[] = [
				'id'    => $language->get_code(),
				'text'  => $language->get_name(),
				'image' => $language->get_flag(),
			];
		}

		return $data;
	}
	
	/**
	 * Fetches translations from all translation files for current side
	 * @param string $key
	 * @param string $language Language code
	 * @param boolean $catalog Forcibly sets catalog as current side
	 * @return string
	 */
	public function get_translation( $key, $language, $catalog ) {
		if ( $catalog ) {
			$prefix = dirname( DIR_SYSTEM ) . '/catalog/language/';
			
		} else {
			$prefix = DIR_LANGUAGE;
		}
		
		$code = $this->check_language_code( $language );
		$file = $prefix . $code . '/' . $this->a->full_name . '.php';
		
		if ( file_exists( $file ) ) {
			return $this->get_transation_from_file( $file, $key );
		}

		return '';
	}

	////////////////////////////////////////////////////////////////////////////

    /**
     * Fetches translations from all translation files for current side
     * @param string $key
     * @param boolean $catalog Forcibly sets catalog as current side
     * @return string[]
     * @throws Exception
     */
	protected function get_translations( $key, $catalog ) {
		$ret = [];

		if ( $catalog ) {
			$prefix = dirname( DIR_SYSTEM ) . '/catalog/language/';

		} else {
			$prefix = DIR_LANGUAGE;
		}

		foreach( Language::get_languages( $this->a ) as $language ) {
			$real_code = $language->get_code();
			$code = $this->check_language_code( $real_code );
			$file = $prefix . $code . '/' . $this->a->full_name . '.php';

			if ( file_exists( $file ) ) {
				$ret[ $real_code ] = $this->get_transation_from_file( $file, $key );

			} else {
				$ret[ $real_code ] = '';
			}
		}

		return $ret;
	}

	/**
	 * Fetches translation from translation file
	 * @param string $file
	 * @param string $key
	 * @return string
	 */
	protected function get_transation_from_file( $file, $key ) {
		$fp = fopen( $file, 'r' );
		$translation = '';

		while( false !== ( $line = fgets( $fp ) ) ) {
			if ( $translation = $this->get_translation_from_line( $line, $key ) ) {
				break;
			}
		}

		fclose( $fp );

		return $translation;
	}

	/**
	 * Fetches translation from line of translation file
	 * @param string $line
	 * @param string $key
	 * @return string
	 */
	protected function get_translation_from_line( $line, $key ) {
		$pattern = '$_[\'' . $key . '\']';

		if( $pattern === substr( $line, 0, strlen( $pattern ) ) ) {
			$start = strpos( $line, '=' );
			$end = strrpos( $line, ';' );

			if ( false === $start || false === $end ) {
				$this->a->error( 'Corrupted translation line: ' . $line );
				return '';
			}

			$translation = substr( $line, $start + 1,  $end - $start - 1 );

			return stripslashes( str_replace( '<line_break>', "\r\n", trim( trim( $translation ), "'" ) ) );
		}

		return '';
	}

	/**
	 * Normalizes language code
	 * @param string $code
	 * @return string
	 */
	protected function check_language_code( $code ) {
		if (  in_array($code, ['en', 'en-gb' ] )  && version_compare( VERSION, '2.2.0.0', '<=' ) ) {
			return 'english';
		}

		return $code;
	}

	/**
	 * Returns current translation file
	 * @param string $language Language code
	 * @param boolean $catalog Forcibly sets catalog side as current side
	 * @return string
	 * @throws Exception
	 */
	protected function get_translation_file( $language, $catalog ) {
		if ( $catalog ) {
			$prefix = dirname( DIR_SYSTEM ) . '/catalog/language/';

		} else {
			$prefix = DIR_LANGUAGE;
		}

		$language = $this->check_language_code( $language );
		$file = $prefix . $language . '/' . $this->a->full_name . '.php';
		$default_file = $prefix . $this->default_language . '/' . $this->a->full_name . '.php';

		if ( file_exists( $file ) ) {
			return $file;
		}

		if ( !is_dir( dirname( $file ) ) ) {
			if ( false === @mkdir( dirname( $file ), 0775, true ) ) {
				throw new Exception( 'Failed to create directory ' . dirname( $file ) );
			}
		}

		if ( !is_writable( dirname( $file ) ) ) {
			throw new Exception( "Folder " . dirname( $file ) . " is not writable" );
		}

		if ( file_exists( $default_file ) ) {
			if ( !is_readable( $default_file ) ) {
				throw new Exception( "File $default_file is not readable" );
			}

			$this->a->log( 'Translation file ' . $file . ' is missing. Creating it as a copy of ' . $default_file );

			$content = file_get_contents( $default_file );

			if ( false === $content ) {
				throw new Exception( 'Failed to read file ' . $default_file );
			}

			if( false === file_put_contents( $file , $content ) ) {
				throw new Exception( "Failed to write into file $file" );
			}

			return $file;
		}

		$this->a->log( 'Translation file ' . $file . ' is missing. Creating empty file' );
		
		file_put_contents( $file , "<?php\n" );
		
		return $file;
	}

	/**
	 * Translates string
	 * @param string $text
	 * @return string
	 */
	protected function translate( $text ) {
		if ( isset( $this->data[ $text ] ) ) {
			return str_replace( '<line_break>', "\r\n", $this->data[ $text ] );
		}

		return $text;
	}

	public function setLanguageCode( $languageCode ) {
	    $this->language_code = $languageCode;
	    $this->load();
    }

	private function getLanguageCode() {
	    if ( !$this->language_code ) {
            try {
                $this->language_code = $this->a->language()->get_code();

            } catch (Exception $e) {
                $this->a->error($e);
                $this->language_code = 'en';
            }
        }

        return $this->language_code === 'en' ? 'english' : $this->language_code;
    }

	/**
	 * Loads translation files
	 */
	protected function load() {
		if ( 'Advertikon\Advertikon' === get_class( $this->a ) ) {
			return;
		}

		$this->data = [];
		$file = DIR_LANGUAGE . $this->getLanguageCode() . '/' . $this->a->full_name . '.php';
		$default_file = DIR_LANGUAGE . $this->default_language . '/' . $this->a->full_name . '.php';
		$_ = [];

		$this->tried_files[] = $file;
		$this->tried_files[] = $default_file;

		if ( file_exists( $default_file ) ) {
			require( $default_file );
			$this->files[] = $default_file;
		}

		if ( file_exists( $file ) ) {
			require( $file );
			$this->files[] = $file;
		}

		$this->data = $_;
	}

	/**
	 * Wraps translated string so it can be translated
	 * @param string $text
	 * @param string $code
	 * @throws Exception
	 */
	protected function wrap_inline_translation( &$text, $code ) {
		$t = $text;
		$text = '<i class="adk-translate-item" data-language="' . $this->language_code . '" data-code="' . htmlspecialchars( $code ) .
				'" data-url="' . $this->a->u( 'translate' ) .  '">' .
					'<u class="adk-translate-text">' . $t . '</u>' .
					'<i class="adk-translate-check"' .
						' style="background-image: url(' . $this->a->u()->catalog_url( true )  .
						'image/catalog/advertikon/edit.png )"></i>' .
				'</i>';

		if ( !$this->form_is_rendered ) {
			$text .= $this->render_form();
			$this->form_is_rendered = true;
		}
	}

	/**
	 * Renders HTML string for translation form
	 * @return string
	 */
	protected function render_form() {
		return <<<HTML
<div class="adk-form-translate">
	<textarea class="adk-translate-field adk-translate-original" readonly="readonly"></textarea>
	<div class="adk-translate-buttons">
		<button type="button" class="adk-translate-button-copy">Copy&nbsp;<b>&dHar;</b></button>
		<button type="button" class="adk-translate-button-apply">Apply&nbsp;<b>&check;</b></button>
		<button type="button" class="adk-translate-button-close">Close&nbsp;<b>&cross;</b></button>
	</div>
	<textarea class="adk-translate-field adk-translate-new"></textarea>
</div>
HTML;
	}
	
	/**
	 * Checks if file is readable and writable
	 * @param string $file
	 * @throws Exception
	 */
	protected function check_file( $file ) {
		if ( !is_readable( $file ) ) {
			throw new Exception( sprintf( 'The process has no read permission on file %s', $file ) );
		}
		
		if ( !is_writable( $file ) ) {
			throw new Exception( sprintf( 'The process has no write permission on file %s', $file ) );
		}
	}

    /**
     * Dumps
     */
	protected function dump() {
		$dump = [];
		$dump[] =  '--------------- Translator Dump Start ----------------';
		$dump[] = 'Loaded files:';

		foreach( $this->files as $f ) {
			$dump[] = $f;
		}

		$dump[] = 'Tried files:';

		foreach( $this->tried_files as $f ) {
			$dump[] = $f;
		}

		$dump[] = 'Translations:';
		$dump[] = print_r( $this->data, true );
		$dump[] =  '--------------- Translatior Dump End -------------------';
		$this->a->log( implode( "\n", $dump ) );
	}

}