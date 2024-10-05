<?php
/**
 * Catalog controller
 * @package adk_gdpr
 * @author Advertikon
 * @version 1.1.75      
 */

/**
 * Class ControllerExtensionModuleAdkGdpr
 * @property DB $db
 * @property Request $request
 * @property Response $response
 * @property Config $config
 * @property Document $document
 * @property Loader $load
 * @property Language $language
 * @property Session $session
 * @property Url $url
 * @property \Cart\Customer $customer
 * @property \Cart\Cart $cart
 * @property \Cart\Currency $currency
 * @property Log $log
 */
class ControllerExtensionModuleAdkGdpr extends Controller {
	use Advertikon\Trait_Translate;

	/** @var ModelExtensionModuleAdkGdpr */
	public $model = null;

	/** @var \Advertikon\Adk_Gdpr\Advertikon  */
	public $a = null;

	/**
	 * Class constructor
	 * @param Registry $registry
	 */
	public function __construct( Registry $registry ) {
		\Advertikon\Profiler::init();
		\Advertikon\Profiler::record( 'OC catalog Controller __construct' );
		parent::__construct( $registry );
		\Advertikon\Profiler::record( 'OC catalog Controller __construct' );

		\Advertikon\Profiler::record( 'Advertikon helper load' );
		$this->a = \Advertikon\Adk_Gdpr\Advertikon::instance( $registry );
		\Advertikon\Profiler::record( 'Advertikon helper load' );

		\Advertikon\Profiler::record( 'Advertikon admin model load' );
		$this->model = $this->a->load->model( $this->a->full_name );
		\Advertikon\Profiler::record( 'Advertikon admin model load' );

		\Advertikon\Profiler::set_logger( $this->a->console );
	}

	/**
	 * @throws \Advertikon\Exception
	 */
	public function account() {
		$this->document->setTitle( 'GDPR tool' );

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->a->__( 'Home' ),
			'href' => $this->url->link( 'common/home' ),
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->a->__( 'GDPR' ),
			'href' => $this->a->u( 'account' ),
		);

		$data['heading_title'] = $this->language->get( $this->a->__( 'Personal data management tool' ) );
		$this->document->addStyle( $this->a->u()->catalog_css( 'advertikon/advertikon.css' ) );
		$this->document->addStyle( $this->a->u()->catalog_css( 'advertikon/adk_gdpr/adk_gdpr.css' ) );
		$this->document->addScript( $this->a->u()->catalog_script( 'advertikon/advertikon.js' ) );
		$this->document->addScript( $this->a->u()->catalog_script( 'advertikon/adk_gdpr/adk_gdpr.js' ) );

		$data['column_left']    = $this->load->controller('common/column_left');
		$data['column_right']   = $this->load->controller('common/column_right');
		$data['content_top']    = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer']         = $this->load->controller('common/footer');
		$data['header']         = $this->load->controller('common/header');
		$data['locale']         = $this->model->get_locale();
		$data['send_button']    = $this->a->r( [
			'type'        => 'button',
			'button_type' => 'success',
			'icon'        => 'fa-check',
			'id'          => 'adk-send',
			'text_before' => $this->a->__( 'Send' ),
			'custom_data' => [ 'data-url' => $this->a->u( 'gdpr_request' ) ],
		] );

		$data['is_extended'] = class_exists( 'Advertikon\Adk_Gdpr\Extended' );
		$this->getCaptcha( $data );
		
		$this->response->setOutput( $this->a->load->view( $this->a->full_name . '/account', $data ) );
	}

	private function getCaptcha( &$data ) {
	    if ( !\Advertikon\Setting::get( 'add_captcha', $this->a ) ) {
	        return;
        }

        if ( version_compare( VERSION, '<=', '2.0.1.1' ) ) {
            $this->captcha2011( $data );

        } else if ( version_compare( VERSION, '<=', '2.0.3.1' ) ) {
            $this->captcha2031( $data );

        } else {
            $this->captcha( $data );
        }
    }

    private function captcha( &$data ) {
        if ( !$this->config->get( $this->getCaptchaStatusName() ) ) {
            return;
        }

        $controller = version_compare( VERSION, '2.2', '>' ) ? 'extension/captcha/' : 'captcha/';
        $data['captcha'] = $this->load->controller( $controller . $this->config->get('config_captcha') );
    }

    private function getCaptchaStatusName() {
        return ( version_compare( VERSION, '3', '>=' ) ? 'captcha_' : '' ) .
            $this->config->get( 'config_captcha' ) . '_status';
    }

    private function captcha2031( &$data ) {
        if ($this->config->get('config_google_captcha_status')) {
            $this->document->addScript('https://www.google.com/recaptcha/api.js');
            $data['site_key'] = $this->config->get('config_google_captcha_public');

        } else {
            $data['site_key'] = '';
        }
    }

    private function captcha2011( &$data ) {
        $data['captcha'] = '<div class="form-group required">' .
            '<label class="col-sm-2 control-label" for="input-captcha">' . $this->a->__( 'Print in text on the image' ) . '</label>' .
            '<div class="col-sm-10">' .
            '<input type="text" name="captcha" id="input-captcha" class="form-control" />' .
            '</div>' .
            '</div>' .
            '<div class="form-group">' .
            '<div class="col-sm-10 pull-right">' .
            '<img src="index.php?route=tool/captcha" alt="" />' .
            '</div>' .
            '</div>';
    }

    /**
     * @throws \Advertikon\Exception
     */
    protected function check_captcha() {
        if ( !\Advertikon\Setting::get( 'add_captcha', $this->a ) ) {
            return;
        }

        if ( version_compare( VERSION, '<=', '2.0.1.1' ) ) {
            $this->checkCaptcha2011();

        } else if ( version_compare( VERSION, '<=', '2.0.3.1' ) ) {
            $this->checkCaptcha2031();

        } else {
            $this->checkCaptcha();
        }
    }

    /**
     * @throws \Advertikon\Exception
     */
    private function checkCaptcha() {
        if ( $this->config->get( $this->getCaptchaStatusName() ) ) {
            $controller = version_compare( VERSION, '2.2', '>' ) ? 'extension/captcha/' : 'captcha/';
            $captcha = $this->load->controller( $controller . $this->config->get('config_captcha') . '/validate' );

            if ($captcha) {
                throw new \Advertikon\Exception( $captcha );
            }
        }
    }

    /**
     * @throws \Advertikon\Exception
     */
    private function checkCaptcha2031() {
        if ( $this->config->get('config_google_captcha_status') ) {
            if (isset($this->request->post['g-recaptcha-response'])) {
                $recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' .
                    urlencode($this->config->get('config_google_captcha_secret')) .
                    '&response=' . $this->request->post['g-recaptcha-response'] .
                    '&remoteip=' . $this->request->server['REMOTE_ADDR']);

                $recaptcha = json_decode($recaptcha, true);

                if (!$recaptcha['success']) {
                    throw new \Advertikon\Exception( $this->a->__( 'Invalid captcha code' ) );
                }

            } else {
                throw new \Advertikon\Exception( $this->a->__( 'Invalid captcha code' ) );
            }
        }
    }

    /**
     * @param $data
     * @throws \Advertikon\Exception
     */
    private function checkCaptcha2011() {
        if ( empty( $this->session->data['captcha'] ) || ( $this->session->data['captcha'] != $this->request->post['captcha'] ) ) {
            throw new \Advertikon\Exception( $this->a->__( 'Invalid captcha code' ) );
        }
    }

	/**
	 *
	 */
	public function gdpr_request() {
		$email = $this->a->post( 'email' );
		$type = $this->a->post( 'type' );
		$ret = [];

		try {
			if ( !$email ) {
				throw new Advertikon\Exception( 'Email address is missing' );
			}

			if ( !$type ) {
				throw new Advertikon\Exception( 'Request type is missing' );
			}

			$this->check_captcha();

			$request = class_exists( 'Advertikon\Adk_Gdpr\Extended' ) ? new Advertikon\Adk_Gdpr\Extended( $this->a ) : new Advertikon\Adk_Gdpr\Request( $this->a );
			$request->send( $email, $type );
			$ret['success'] = $this->a->__( 'The request has been created. Authorization code was sent to your email' );

		} catch ( Advertikon\Exception $e ) {
			$this->a->error( $e );
			$ret['error'] = $e->getMessage();

		} catch ( Exception $e ) {
			$this->a->error( $e );
			$ret['error'] = $this->a->__( 'Unfortunately, at the moment, we unable to automatically handle your request. ' .
			'Please, try later or contact us using the contact form at "Contact Us" page so we can handle your request manually' );
		}
		
		$this->response->setOutput( json_encode( $ret ) );
	}

	/**
	 * @throws \Advertikon\Exception
	 */
	public function authorize() {
		$this->document->setTitle( 'Request authorization' );

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->a->__( 'Home' ),
			'href' => $this->url->link( 'common/home' ),
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->a->__( 'GDPR' ),
			'href' => $this->a->u( 'account' ),
		);

		$data['heading_title'] = $this->language->get( $this->a->__( 'GDPR request authorization' ) );
		$this->document->addStyle( $this->a->u()->catalog_css( 'advertikon/advertikon.css' ) );
		$this->document->addStyle( $this->a->u()->catalog_css( 'advertikon/adk_gdpr/adk_gdpr.css' ) );
		$this->document->addScript( $this->a->u()->catalog_script( 'advertikon/advertikon.js' ) );
		$this->document->addScript( $this->a->u()->catalog_script( 'advertikon/adk_gdpr/adk_gdpr.js' ) );

		$data['column_left']    = $this->load->controller('common/column_left');
		$data['column_right']   = $this->load->controller('common/column_right');
		$data['content_top']    = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer']         = $this->load->controller('common/footer');
		$data['header']         = $this->load->controller('common/header');
		$data['locale']         = $this->model->get_locale();

		$code = isset( $this->request->get['code'] ) ? $this->request->get['code'] : ''; 

		try {
			$request = class_exists( 'Advertikon\Adk_Gdpr\Extended' ) ? new \Advertikon\Adk_Gdpr\Extended( $this->a ) :  new \Advertikon\Adk_Gdpr\Request( $this->a );
			$data['success'] = $request->authorize( $code );

		} catch ( \Advertikon\Exception $e ) {
			$this->a->error( $e );
			$data['error'] = $e->getMessage();

		} catch ( \Exception $e ) {
			$this->a->error( $e );
			$data['error'] = $this->a->__( 'Unfortunately, at the moment, we unable to automatically handle your request. ' .
				'Please, try later or contact us using the contact form at "Contact Us" page so we can handle your request manually' );
		}

		$this->response->setOutput( $this->a->load->view( $this->a->full_name . '/authorize', $data ) );
	}
}