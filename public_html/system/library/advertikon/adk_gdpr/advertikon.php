<?php
/**
 * @package adk_gdpr
 * @author Advertikon
 *@version1.1.73
3
 */

namespace Advertikon\Adk_Gdpr;

use Advertikon\Setting;

class Advertikon extends \Advertikon\Advertikon {

    /* @var string Extension type */
    public $type = 'module';

    /* @var string Extension code */
    public $code = 'adk_gdpr';

    /* @var string Class instance indent */
    protected static $c = __NAMESPACE__;

    /* @var \Registry registry object */
    public $registry = null;

    protected static $journal_menu;
    protected static $is_journal_footer_menu_set = false;

    /* @var array Extension's tables */
    public $tables = [
        'terms_acceptance' => 'adk_gdpr_terms_acceptance',
        'terms_version'    => 'adk_gdpr_terms_version',
        'request_table'    => 'adk_gdpr_request',
        'breach_log'       => 'adk_gdpr_breach_log',
    ];

    public $tmp_dir = null;
    public $libray_dir = __DIR__;

    static $env = array();
    public static $instanceG;

    const DIR_FONT = __DIR__ . '/../vendor/tcpdf/fonts/';

    public static function instance() {
        $registry = null;

        if ( func_num_args() > 0 && func_get_arg( 0 ) instanceof \Registry ) {
            $registry = func_get_arg( 0 );
        }

        if ( !self::$instanceG ) {
            self::$instanceG = new self( $registry );
            \Advertikon\Advertikon::instance( $registry );
        }

        return self::$instanceG;
    }

    public $_file = __FILE__;

    /**
     * Class constructor
     */
    public function __construct() {
        $registry = null;

        if ( func_num_args() > 0 && func_get_arg( 0 ) instanceof \Registry ) {
            $registry = func_get_arg( 0 );
        }

        if ( version_compare( VERSION, '2.3.0.0', '>=' ) ) {
            $this->type = 'extension/' . $this->type;
        }

        parent::__construct( $registry );
        self::$instanceG = $this;

        $this->data_dir      = $this->data_dir . 'adk_gdpr/';
        $this->tmp_dir       = $this->data_dir . 'tmp/';
    }

    public function add_to_left_panel( &$data ) {
        if ( !$this->has_permissions( \Advertikon\Advertikon::PERMISSION_ACCESS ) ||
            !Setting::get( 'in_left_panel', $this ) ) {
            return;
        }

        $data['menus'][] = array(
            'id'       => 'adk-gdpr',
            'icon'	   => 'fa-shield',
            'name'	   => 'GDPR tools',
            'href'     => $this->u( $this->full_name ),
            'children' => '',
        );
    }

    public function add_to_left_panel2000() {
        if ( !$this->has_permissions( \Advertikon\Advertikon::PERMISSION_ACCESS ) ||
            !Setting::get( 'in_left_panel', $this ) ) {
            return;
        }

        $href = $this->u( $this->full_name );

        echo <<<HTML
	<li>
		<a class="parent" href="$href"><i class="fa fa-shield fa-fw"></i> <span>GDPR tools</span></a>
	</li>
HTML;
    }

    protected function link() {
        $href = $this->link_href();
        $text = $this->link_text();

        return "<a href=\"$href\">$text</a>";
    }

    protected function link_text() {
        return $this->__( 'GDPR tools' );
    }

    protected function link_href() {
        return $this->u( $this->full_name . '/account' );
    }

    protected function add_gdpr_page() {
        return "<li class='gdpr'>" . $this->link() . "</li>";
    }

    public function check_font( $name ) {
        foreach( $this->get_fonts_list( $name ) as $font ) {
            if ( !file_exists( self::DIR_FONT . $font ) ) {
                return false;
            }
        }

        return true;
    }

    public function get_fonts_list( $name ) {
        $type = [ '', 'b', 'i', 'bi' ];
        $ext = [ '.ctg.z', '.php', '.z', ];

        $ret = [];

        foreach( $type as $t ) {
            foreach( $ext as $e ) {
                $ret[] = $name . $t . $e;
            }
        }

        return $ret;
    }

    public function add_mods( &$html ) {
        \Advertikon\Profiler::init();
        \Advertikon\Profiler::set_logger( $this->console );
        \Advertikon\Profiler::record( 'HTML' );
        try {
            $ret = $html;

            if (  !\Advertikon\Setting::get( 'status', $this ) ) {
                return;
            }

            if ( !$this->is_admin() ) {
                $ret = $this->addToHeaderSection( $ret );
                $ret = $this->addToMyAccountSection( $ret );
                $ret = $this->addToFooterSection( $ret );
                $ret = $this->addCookieBanner( $ret );
            }

        } catch ( \Exception $e ) {
            $this->error( $e );

        } catch ( \Throwable $e ) {
            $this->error( $e );
        }

        $html = $ret;
        \Advertikon\Profiler::record( 'HTML' );
    }

    /**
     * @param $html string
     * @return string
     */
    private function addToMyAccountSection( $html ) {
        if ( !\Advertikon\Setting::get( 'in_account', $this ) ) {
            return $html;
        }

        $ret = $html;
        $c = 0;
        $replacements = [
            // clean installation
            [
                's' => '~<li>\s*<a href="[^"]+?/wish-?list">.+?</a></li>~s',
                'r' => '$0&#9;' . $this->add_gdpr_page()
            ],
            // journal
            [
                's' => '~<li class="edit-wishlist">.+?</li>~s',
                'r' => '$0&#9;<style>.account-list > .gdpr > a::before { content: \'\e980\' !important;font-family: icomoon !important;}</style>' .
                    $this->add_gdpr_page()
            ],
            // india
            [
                's' => '~<a href="[^"]+?/account" class="list-group-item">.+?</a>~',
                'r' => '<a href="' . $this->link_href() . '" class="list-group-item"> <i class="fa fa-user" aria-hidden="true"></i> ' .
                    $this->link_text() . '</a>'
            ]
        ];

        foreach( $replacements as $item ) {
            $ret = preg_replace( $item['s'], $item['r'], $ret, 1, $c );

            if ( $c > 0 ) {
                break;
            }
        }

        if ( $ret ) {
            return $ret;
        }

        return $html;
    }

    private function addToFooterSection( $html ) {
        if ( !\Advertikon\Setting::get( 'in_footer', $this ) ) {
            return $html;
        }

        $ret = $html;
        $c = 0;
        $replacements = [
            // clean installation
            [
                's' => '~<li>\s*<a href="[^"]+?/wish-?list">[^<]+?</a></li>\s*(?!&)~s',
                'r' => '$0' . $this->add_gdpr_page()
            ],
            // journal
            [
                's' => '~<li class="menu-item links-menu-item links-menu-item-1">.+?<a href=".+?/(my-)?account"\s*>.+?</li>~s',
                'r' => '$0<li class="menu-item links-menu-item links-menu-item-1"><a href="' . $this->link_href() .
                    '"><span class="links-text">' . $this->link_text() . '</span></a></li>'
            ],
            [
                's' => '~<li class="menu-item links-menu-item links-menu-item-1">.+?<a href=".+?/mina-sidor"\s*>.+?</li>~s',
                'r' => '$0<li class="menu-item links-menu-item links-menu-item-1"><a href="' . $this->link_href() .
                    '"><span class="links-text">' . $this->link_text() . '</span></a></li>'
            ],
            [
                's' => '~<li>\s*<i[^>]*?>[^<]*?</i>\s*<a\s*href=".+?/wish-?list">.*?</li>~s',
                'r' => '$0<li><i class="fa fa-caret-right"></i><a href="' . $this->link_href() . '"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">' . $this->link_text() . '</font></font></a></li>'
            ]
        ];

        foreach( $replacements as $item ) {
            $ret = preg_replace( $item['s'], $item['r'], $ret, -1, $c );

            if ( $c > 0 ) {
                break;
            }
        }

        if ( $ret ) {
            return $ret;
        }

        return $html;
    }

    private function addToHeaderSection( $html ) {
        if ( !\Advertikon\Setting::get( 'in_header', $this ) ) {
            return $html;
        }

        $ret = $html;
        $c = 0;
        $replacements = [
            // clean installation
            [
                's' => '~<li><a href=".+?/log(out|in)">.+?</li>~s',
                'r' => '$0' . $this->add_gdpr_page()
            ],
            // journal
            [
                's' => '~<li class="menu-item links-menu-item links-menu-item-1">.*?<a href=".+?/account"\s*>.+?</li>~s',
                'r' => '$0&#9;<li class="menu-item links-menu-item links-menu-item-1"><a href="' . $this->link_href() .
                    '"><span class="links-text">' . $this->link_text() . '</span></a></li>'
            ]
        ];

        foreach( $replacements as $item ) {
            $ret = preg_replace( $item['s'], $item['r'], $ret, 1, $c );

            if ( $c > 0 ) {
                break;
            }
        }

        if ( $ret ) {
            return $ret;
        }

        return $html;
    }

    private function addCookieBanner( $html ) {
        if ( !\Advertikon\Setting::get( 'cookie_status', $this ) || !class_exists( 'Advertikon\Adk_Gdpr\Cookie' ) ) {
            return $html;
        }

        $ret = $html;
        $replacements = [
            [
                's' => '~<head.*?>~s',
                'r' => '$0' . Cookie::cookie_script()
            ],
            [
                's' => '~<body.*?>~s',
                'r' => '$0' . Cookie::banner()
            ]
        ];

        foreach( $replacements as $item ) {
            $ret = preg_replace( $item['s'], $item['r'], $ret, 1, $c );
        }

        if ( $ret ) {
            return $ret;
        }

        return $html;
    }

    //	public function add_mods( &$html, $headers ) {
    //		try {
    //			if ( $this->is_admin() ) {
    //				return;
    //			}
    //
    //			if ( !$this->isHtmlOutput( $headers ) ) {
    //				$this->log( 'Not HTML content' );
    //				return;
    //			}
    //
    //			if ( !Setting::get( 'status', $this ) ) {
    //				return;
    //			}
    //
    //			if( !class_exists( 'DOMDocument' ) ) {
    //			    $this->error( 'DOM lib missing' );
    //				return;
    //			}
    //
    //            if( !class_exists('SimpleXMLElement') ) {
    //                $this->error( 'SimpleXML lib missing' );
    //                return;
    //            }
    //
    //            if( !function_exists('libxml_use_internal_errors') ) {
    //                $this->error( 'xmllib missing' );
    //                return;
    //            }
    //
    //			if ( !function_exists('mb_convert_encoding') ) {
    //			    $this->error('mb_convert_encoding missing' );
    //			    return;
    //            }
    //
    //            libxml_use_internal_errors(true) AND libxml_clear_errors();
    //
    //			$dom = new \DOMDocument( '1.0', 'UTF-8' );
    //			$dom->loadHTML( mb_convert_encoding( $html, 'HTML-ENTITIES', 'UTF-8' ),
    //				LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_NOERROR|LIBXML_NOWARNING|LIBXML_PARSEHUGE|
    //                LIBXML_NOENT );
    //
    //			$xPath = new \DOMXPath( $dom );
    //
    //            $this->addToHeaderSection( $xPath );
    //            $this->addToMyAccountSection( $xPath );
    //            $this->addToFooterSection( $xPath );
    //            $this->addCookieBanner( $xPath, $dom );
    //            $html = $dom->saveHTML();
    //
    //		} catch ( \Exception $e ) {
    //			$this->error( $e );
    //
    //		} catch ( \Throwable $e ) {
    //			$this->error( $e );
    //		}
    //	}
    //
    //	private function isHtmlOutput( $headers ) {
    //		$result = true;
    //
    //		if ( is_array( $headers ) ) {
    //			foreach( $headers as $item ) {
    //				preg_match( '~Content-Type:\s+([a-z/]+)~i', $item, $m );
    //
    //				if ( $m ) {
    //					$result = $m[1] === 'text/html';
    //				}
    //			}
    //		}
    //
    //		return $result;
    //	}
    //
    //	private function addLink( \DOMXPath $xPath, array $info ) {
    //		foreach( $info as $data ) {
    //			/** @var \DOMNodeList $links */
    //			$links = $xPath->query( $data['xpath'] );
    //			$target = $this->searchLink( $data, $links, $xPath, 'target' );
    //			$before = $this->searchLink( $data, $links, $xPath, 'before' );
    //
    //			if ( $before && $target ) {
    //				$newElement = $before->insertBefore( $target->cloneNode( true ) );
    //				$newAnchor = $xPath->query( './/a', $newElement )->item( 0 );
    //				$newAnchor->setAttribute('href', $this->link_href() );
    //				$newAnchor->textContent = $this->link_text();
    //				return;
    //			}
    //		}
    //    }
    //
    //	/**
    //	 * @param array $data
    //	 * @param \DOMNodeList $links
    //	 * @param \DOMXPath $xPath
    //	 * @param $name
    //	 * @return \DOMNode|null
    //	 */
    //    private function searchLink( array $data, \DOMNodeList $links, \DOMXPath $xPath, $name ) {
    //	    if ( isset( $data[ $name ] ) ) {
    //	        foreach ( $data[ $name ] as $selector ) {
    //			    /** @var \DOMElement $link */
    //			    foreach ( $links as $link ) {
    //				    if ( preg_match( "~$selector~", $link->getAttribute( 'href' ) ) ) {
    //					    return $xPath->query( 'parent::li', $link )->item(0);
    //				    }
    //			    }
    //		    }
    //	    }
    //
    //	    return $xPath->query( 'parent::li', $links->item( 0 ) )->item(0);
    //    }
    //
    //	private function addToMyAccountSection( \DOMXPath $xPath ) {
    //		if ( !Setting::get( 'in_account', $this ) ) {
    //			return;
    //		}
    //
    //		$replacements = [
    //            [
    //                'xpath' => "//div[@id='content']//li//a",
    //                'before' => [
    //                    'account/wishlist',
    //                    'account/account'
    //                ],
    //                'target' => ['account/edit'],
    //            ],
    //		];
    //
    //        $this->addLink( $xPath, $replacements );
    //	}
    //
    //	private function addToFooterSection( \DOMXPath $xPath ) {
    //		if ( !Setting::get( 'in_footer', $this ) ) {
    //			return;
    //		}
    //
    //		$replacements = [
    //			[
    //				'xpath' => "//footer//li//a",
    //				'before' => [
    //					'account/newsletter',
    //					'account/wishlist',
    //					'account/account'
    //				],
    //				'target' => ['account/account'],
    //			],
    //		];
    //
    //		$this->addLink( $xPath, $replacements );
    //	}
    //
    //	private function addToHeaderSection( \DOMXPath $xPath ) {
    //		if ( !Setting::get( 'in_header', $this ) ) {
    //			return;
    //		}
    //
    //		$replacements = [
    //			[
    //				'xpath' => "//nav//li//a",
    //				'before' => [
    //					'account/login',
    //					'account/logout',
    //					'account/account'
    //				],
    //				'target' => ['account/account'],
    //			],
    //		];
    //
    //		$this->addLink( $xPath, $replacements );
    //	}
    //
    //	/**
    //	 * @param \DOMXPath $xPath
    //	 * @param \DOMDocument $dom
    //	 * @throws \Advertikon\Exception
    //	 */
    //	private function addCookieBanner( \DOMXPath $xPath, \DOMDocument $dom ) {
    //		if ( !Setting::get( 'cookie_status', $this ) || !class_exists( 'Advertikon\Adk_Gdpr\Cookie' ) ) {
    //			return;
    //		}
    //
    //		$fragment = dom_import_simplexml( new \SimpleXMLElement( Cookie::banner() ) );
    //		$last = $xPath->query('//body/*[last()]' )->item(0 );
    //
    //		if ( $last ) {
    //			$last->insertBefore( $dom->importNode( $fragment, true ) );
    //		}
    //
    //		foreach ( Cookie::cookie_script() as $type => $urls ) {
    //			if ( 'script' === $type ) {
    //				foreach (  $urls as $url ) {
    //					$this->addBannerScript( $url, $xPath, $dom );
    //				}
    //
    //			} else {
    //				foreach (  $urls as $url ) {
    //					$this->addBannerStyle( $url, $xPath, $dom );
    //				}
    //			}
    //		}
    //	}
    //
    //	private function addBannerScript( $url, \DOMXPath $xPath, \DOMDocument $dom ) {
    //		$script = $dom->createElement('script' );
    //		$script->setAttribute( 'src', $url );
    //		$last = $xPath->query('//body/*[last()]' )->item(0 );
    //
    //		if ( $last ) {
    //			$last->insertBefore( $script );
    //		}
    //	}
    //
    //	private function addBannerStyle( $url, \DOMXPath $xPath, \DOMDocument $dom ) {
    //		$script = $dom->createElement('link' );
    //		$script->setAttribute('rel', 'stylesheet' );
    //		$script->setAttribute('type', 'text/css' );
    //		$script->setAttribute('href', $url );
    ////		$last = $xPath->query('//head/*[last()]' )->item(0 );
    //		$last = $xPath->query('//body/*[last()]' )->item(0 );
    //
    //		if ( $last ) {
    //			$last->insertBefore( $script );
    //		}
    //	}
}
