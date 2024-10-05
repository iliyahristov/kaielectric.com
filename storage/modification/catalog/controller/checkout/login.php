<?php

            // Register vendor modules
            spl_autoload_register(function ($class) {
                $class = explode('\\', $class);
                if ($class[0] == 'RobThree' && $class[1] == 'Auth') {
                    unset($class[0]);
                    unset($class[1]);
                    $class = implode('/', $class);
                    include DIR_SYSTEM.'library/' . $class . '.php';
                }
            });

            
class ControllerCheckoutLogin extends Controller {
	public function index() {
		$this->load->language('checkout/checkout');

            $this->load->language('extension/tfa/checkout');
            

		$data['checkout_guest'] = ($this->config->get('config_checkout_guest') && !$this->config->get('config_customer_price') && !$this->cart->hasDownload());

		if (isset($this->session->data['account'])) {
			$data['account'] = $this->session->data['account'];
		} else {
			$data['account'] = 'register';
		}
		/*** SOCIAL LOGIN START **/

		$this->load->model('setting/setting');
		$setting = $this->model_setting_setting->getSetting('so_sociallogin');
		if (isset($setting) && $setting['so_sociallogin_enable'] && $this->config->get('so_sociallogin_enable')) {
			
			$data['setting']	= $setting;

			$this->load->language('extension/module/so_sociallogin');
			
			if( isset( $this->request->get['route'] ) ){
				$this->session->data['route']=$this->request->get['route'];
			}
								
			
			//Facebook Libery file include	
			require_once (DIR_SYSTEM.'library/so_social/Facebook/autoload.php');
			
			// Google Libery file include
			require_once DIR_SYSTEM.'library/so_social/src/Google_Client.php';
			require_once DIR_SYSTEM.'library/so_social/src/contrib/Google_Oauth2Service.php';
			
			//Facebook  Login link code
			$fb = new Facebook\Facebook ([
				'app_id' 					=> $setting['so_sociallogin_fbapikey'], 
				'app_secret' 				=> $setting['so_sociallogin_fbsecretapi'],
				'default_graph_version' 	=> 'v2.4',
			]);

			$helper = $fb->getRedirectLoginHelper();
			
			$data['fblink'] = $helper->getLoginUrl($this->url->link('extension/module/so_sociallogin/FacebookLogin', '', 'SSL'), array('public_profile','email'));
			/* Facebook  Login link code */			
			
			/* Google Login link code */
			$gClient = new Google_Client();
			$gClient->setApplicationName($setting['so_sociallogin_googletitle']);
			$gClient->setClientId($setting['so_sociallogin_googleapikey']);
			$gClient->setClientSecret($setting['so_sociallogin_googlesecretapi']);
			$gClient->setRedirectUri($this->url->link('extension/module/so_sociallogin/GoogleLogin', '', 'SSL'));
			$google_oauthV2 = new Google_Oauth2Service($gClient);
			$data['googlelink']  = $gClient->createAuthUrl();
			/* Google Login link code */
		}
		/*** SOCIAL LOGIN END ***/
		$data['forgotten'] = $this->url->link('account/forgotten', '', true);

            if ($this->config->get('module_tfa_status') && $this->config->get('module_tfa_for_customer') == 1 && isset($this->session->data['tfa_customer_id']) && $this->session->data['tfa_customer_id'] > 0) {
                $this->response->setOutput($this->load->view('extension/tfa/checkout', $data));
            } else {
            

		$this->response->setOutput($this->load->view('checkout/login', $data));

            }
            
	}

	public function save() {
		$this->load->language('checkout/checkout');

            $this->load->language('extension/tfa/checkout');
            

		$json = array();

		if ($this->customer->isLogged()) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', true);
		}

		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['redirect'] = $this->url->link('checkout/cart');
		}

		
            if (!$json && isset($this->request->post['email'])) {
            
			$this->load->model('account/customer');

			// Check how many login attempts have been made.
			$login_info = $this->model_account_customer->getLoginAttempts($this->request->post['email']);

			if ($login_info && ($login_info['total'] >= $this->config->get('config_login_attempts')) && strtotime('-1 hour') < strtotime($login_info['date_modified'])) {
				$json['error']['warning'] = $this->language->get('error_attempts');
			}

			// Check if customer has been approved.
			$customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

			if ($customer_info && !$customer_info['status']) {
				$json['error']['warning'] = $this->language->get('error_approved');
			}

			if (!isset($json['error'])) {
				if (!$this->customer->login($this->request->post['email'], $this->request->post['password'])) {
					$json['error']['warning'] = $this->language->get('error_login');

					$this->model_account_customer->addLoginAttempt($this->request->post['email']);
				} else {
					$this->model_account_customer->deleteLoginAttempts($this->request->post['email']);
				}
			}
		}

		if (!$json) {

            if ($this->config->get('module_tfa_status') && $this->config->get('module_tfa_for_customer') == 1 && isset($this->session->data['tfa_customer_id']) && $this->session->data['tfa_customer_id'] > 0 && isset($this->request->post['code'])) {

                $tfa = new RobThree\Auth\TwoFactorAuth($this->config->get('config_name'));

                $this->load->model('account/customer');
                $customer_info = $this->model_account_customer->getCustomer($this->session->data['tfa_customer_id']);

                $result = $tfa->verifyCode($customer_info['shared_secret'], $this->request->post['code']);

                if ($result == 1) {
                    $this->session->data['customer_id'] = $this->session->data['tfa_customer_id'];

                    // Unset guest
                    unset($this->session->data['guest']);

                    // Default Shipping Address
                    $this->load->model('account/address');

                    if ($this->config->get('config_tax_customer') == 'payment') {
                        $this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
                    }

                    if ($this->config->get('config_tax_customer') == 'shipping') {
                        $this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
                    }

                    // Wishlist
                    if (isset($this->session->data['wishlist']) && is_array($this->session->data['wishlist'])) {
                        $this->load->model('account/wishlist');

                        foreach ($this->session->data['wishlist'] as $key => $product_id) {
                            $this->model_account_wishlist->addWishlist($product_id);

                            unset($this->session->data['wishlist'][$key]);
                        }
                    }

                    $json['redirect'] = $this->url->link('checkout/checkout', '', true);
                } else {
                    $json['error']['warning'] = $this->language->get('error_authenticate');
                }

            } elseif (isset($this->session->data['tfa_customer_id']) && $this->session->data['tfa_customer_id'] > 0 && !isset($this->request->post['code'])) {
                $json['redirect'] = $this->url->link('checkout/checkout', '', true);
            } else {
            
			// Unset guest
			unset($this->session->data['guest']);

			// Default Shipping Address
			$this->load->model('account/address');

			if ($this->config->get('config_tax_customer') == 'payment') {
				$this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			}

			if ($this->config->get('config_tax_customer') == 'shipping') {
				$this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			}

			// Wishlist
			if (isset($this->session->data['wishlist']) && is_array($this->session->data['wishlist'])) {
				$this->load->model('account/wishlist');

				foreach ($this->session->data['wishlist'] as $key => $product_id) {
					$this->model_account_wishlist->addWishlist($product_id);

					unset($this->session->data['wishlist'][$key]);
				}
			}

			$json['redirect'] = $this->url->link('checkout/checkout', '', true);

            }
            
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
