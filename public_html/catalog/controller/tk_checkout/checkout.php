<?php

class ControllerTkCheckoutCheckout extends Controller {
	private $error = array();
	
	public function __construct($registry) {
		
		parent::__construct($registry);
		
		$this->load->model('account/activity');
		$this->load->model('account/address');
		$this->load->model('account/customer');
		$this->load->model('account/custom_field');
		$this->load->model('account/customer_group');
		$this->load->model('catalog/information');
		$this->load->model('localisation/country');
		$this->load->model('localisation/zone');
		$this->load->model('tool/upload');
		$this->load->model('tool/image');
		$this->load->model('setting/extension');
		$this->load->model('checkout/order');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('extension/module/tk_abandoned_cart');
		
		//проверка за статуси на еконт
		if ($this->config->get('shipping_tk_econt_status') && $this->config->get('shipping_tk_econt_status') == 1) {
			$this->load->model('extension/shipping/tk_econt');
		}
		
		//проверка за статуси на спиди
		if ($this->config->get('shipping_tk_speedy_status') && $this->config->get('shipping_tk_speedy_status') == 1) {
			$this->load->model('extension/shipping/tk_speedy');
		}
		
		//проверка за статуси на транспрес
		if ($this->config->get('shipping_tk_transpress_status') && $this->config->get('shipping_tk_transpress_status') == 1) {
			$this->load->model('extension/shipping/tk_transpress');
		}
		
		//проверка за статуси на boxnow
		if ($this->config->get('shipping_tk_boxnow_status') && $this->config->get('shipping_tk_boxnow_status') == 1) {
			$this->load->model('extension/shipping/tk_boxnow');
		}
		
		//проверка за статуси на Next Level
		if ($this->config->get('shipping_tk_next_status') && $this->config->get('shipping_tk_next_status') == 1) {
			$this->load->model('extension/shipping/tk_next');
		}
		
		//проверка за статуси на Sameday
		if ($this->config->get('shipping_tk_sameday_status') && $this->config->get('shipping_tk_sameday_status') == 1) {
			$this->load->model('extension/shipping/tk_sameday');
		}
		
		$this->load->language('tk_checkout/checkout');
	}
	
	public function index() {
		
		$data = array();
		
		$this->session->data['tk_checkout']['confirm'] = false;
		
		if ($this->config->get('module_tk_checkout_text')) {
			$tk_checkout_text_array = $this->config->get('module_tk_checkout_text');
			$tk_checkout_text = $tk_checkout_text_array[$this->config->get('config_language_id')];
		}
		
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers']))) {
			$this->response->redirect($this->url->link('checkout/cart'));
		}
		
		if (!empty($this->session->data['tk_checkout']['abandoned_cart_id'])) {
			$this->model_extension_module_tk_abandoned_cart->updateAbandonedCartProducts($this->cart->getProducts(), $this->session->data['tk_checkout']['abandoned_cart_id']);
		}
		
		$data['back_url'] = $this->url->link('tk_checkout/checkout');
		
		$this->document->addScript('catalog/view/javascript/tk_checkout/main.js?v=4.1');
		$this->document->addScript('catalog/view/javascript/tk_checkout/jquery.magnific-popup.min.js');
		$this->document->addStyle('catalog/view/theme/default/stylesheet/tk_checkout/magnific-popup.css');
		
		if ($this->config->get('module_tk_checkout_theme') == 1) {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/tk_checkout/journal-21.css');
		} else if ($this->config->get('module_tk_checkout_theme') == 3) {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/tk_checkout/journal-20.css');
		} else if ($this->config->get('module_tk_checkout_theme') == 2) {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/tk_checkout/journal-30.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/tk_checkout/main.css');
		}
		
		if ($this->config->get('module_tk_checkout_register') && $this->config->get('module_tk_checkout_register') == 3) {
			$data['random_password'] = $this->model_extension_module_tk_checkout->randomPassword();
		} else {
			$data['random_password'] = false;
		}
		
		if ($this->config->get('module_tk_checkout_color')) {
			$data['module_tk_checkout_color'] = ' ' . $this->config->get('module_tk_checkout_color');
		} else {
			$data['module_tk_checkout_color'] = ' #229ac8';
		}
		
		if ($this->config->get('module_tk_checkout_color_button')) {
			$data['module_tk_checkout_color_button'] = ' ' . $this->config->get('module_tk_checkout_color_button');
		} else {
			$data['module_tk_checkout_color_button'] = ' #22711f';
		}
		
		if ($this->config->get('module_tk_checkout_color_button_hover')) {
			$data['module_tk_checkout_color_button_hover'] = ' ' . $this->config->get('module_tk_checkout_color_button_hover');
		} else {
			$data['module_tk_checkout_color_button_hover'] = ' #1c6319';
		}
		
		if ($this->config->get('module_tk_checkout_size')) {
			$data['module_tk_checkout_size'] = ' ' . $this->config->get('module_tk_checkout_size');
		} else {
			$data['module_tk_checkout_size'] = ' 1140';
		}
		
		if ($this->config->get('module_tk_checkout_required_email')) {
			$data['module_tk_checkout_required_email'] = $this->config->get('module_tk_checkout_required_email');
		} else {
			$data['module_tk_checkout_required_email'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_required_phone')) {
			$data['module_tk_checkout_required_phone'] = $this->config->get('module_tk_checkout_required_phone');
		} else {
			$data['module_tk_checkout_required_phone'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_customer_mail')) {
			$data['module_tk_checkout_customer_mail'] = $this->config->get('module_tk_checkout_customer_mail');
		} else {
			$data['module_tk_checkout_customer_mail'] = $this->config->get('config_email');
		}
		
		if ($this->config->get('module_tk_checkout_country')) {
			$data['module_tk_checkout_country'] = $this->config->get('module_tk_checkout_country');
			$data['module_tk_checkout_country_count'] = count($this->config->get('module_tk_checkout_country'));
		} else {
			$data['module_tk_checkout_country'] = 0;
			$data['module_tk_checkout_country_count'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_customer_group')) {
			$data['module_tk_checkout_customer_group'] = $this->config->get('module_tk_checkout_customer_group');
		} else {
			$data['module_tk_checkout_customer_group'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_register')) {
			$data['module_tk_checkout_register'] = $this->config->get('module_tk_checkout_register');
		} else {
			$data['module_tk_checkout_register'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_invoice')) {
			$data['module_tk_checkout_invoice'] = $this->config->get('module_tk_checkout_invoice');
		} else {
			$data['module_tk_checkout_invoice'] = 9999;
		}
		
		if ($this->config->get('module_tk_checkout_column')) {
			$data['module_tk_checkout_column'] = $this->config->get('module_tk_checkout_column');
		} else {
			$data['module_tk_checkout_column'] = 2;
		}
		
		if ($this->config->get('module_tk_checkout_title')) {
			$data['module_tk_checkout_title'] = $this->config->get('module_tk_checkout_title');
		} else {
			$data['module_tk_checkout_title'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_payment_image')) {
			$data['module_tk_checkout_payment_image'] = array();
			foreach ($this->config->get('module_tk_checkout_payment_image') as $key => $module_tk_checkout_payment_image) {
				if ($module_tk_checkout_payment_image) {
					$data['module_tk_checkout_payment_image'][$key] = $this->model_tool_image->resize($module_tk_checkout_payment_image, 227, 65);
				} else {
					$data['module_tk_checkout_payment_image'][$key] = false;
				}
			}
		}
		
		if ($this->config->get('module_tk_checkout_shipping_image')) {
			$data['module_tk_checkout_shipping_image'] = array();
			foreach ($this->config->get('module_tk_checkout_shipping_image') as $key => $module_tk_checkout_shipping_image) {
				if ($module_tk_checkout_shipping_image) {
					$data['module_tk_checkout_shipping_image'][$key] = $this->model_tool_image->resize($module_tk_checkout_shipping_image, 26, 26);
				} else {
					$data['module_tk_checkout_shipping_image'][$key] = false;
				}
			}
		}
		
		if ($this->config->get('module_tk_checkout_css')) {
			$data['module_tk_checkout_css'] = $this->config->get('module_tk_checkout_css');
		} else {
			$data['module_tk_checkout_css'] = '';
		}
		
		if ($this->config->get('module_tk_checkout_autocomplete')) {
			$data['module_tk_checkout_autocomplete'] = $this->config->get('module_tk_checkout_autocomplete');
		} else {
			$data['module_tk_checkout_autocomplete'] = 0;
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error'])) {
			$data['error_warning'] = $this->session->data['error'];
		} else {
			$data['error_warning'] = '';
			unset($this->session->data['error']);
		}
		
		if ($this->config->get('module_tk_checkout_min') && $this->config->get('module_tk_checkout_min') > $this->model_extension_module_tk_checkout->getSubTotal() && !empty($tk_checkout_text['min'])) {
			$data['error_warning'] = $tk_checkout_text['min'];
			$this->session->data['error_min'] = true;
		} else {
			unset($this->session->data['error_min']);
		}
		
		if ($this->config->get('module_tk_checkout_max') && $this->config->get('module_tk_checkout_max') < $this->model_extension_module_tk_checkout->getSubTotal() && !empty($tk_checkout_text['max'])) {
			$data['error_warning'] = $tk_checkout_text['max'];
			$this->session->data['error_max'] = true;
		} else {
			unset($this->session->data['error_max']);
		}
		
		if ((!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$data['error_warning'] = $this->language->get('error_stock');
			$this->session->data['error_stock'] = true;
			$data['error_stock'] = true;
		} else {
			$data['error_stock'] = false;
			unset($this->session->data['error_stock']);
		}
		
		// преводи на текстове
		if (!empty($tk_checkout_text['checkout_title'])) {
			$data['checkout_title'] = $tk_checkout_text['checkout_title'];
		} else {
			$data['checkout_title'] = $this->language->get('checkout_title');
		}
		if (!empty($tk_checkout_text['text_account_have'])) {
			$data['text_account_have'] = $tk_checkout_text['text_account_have'];
		} else {
			$data['text_account_have'] = $this->language->get('text_account_have');
		}
		if (!empty($tk_checkout_text['text_buy_more'])) {
			$data['text_buy_more'] = $tk_checkout_text['text_buy_more'];
		} else {
			$data['text_buy_more'] = $this->language->get('text_buy_more');
		}
		if (!empty($tk_checkout_text['text_persondata'])) {
			$data['text_persondata'] = $tk_checkout_text['text_persondata'];
		} else {
			$data['text_persondata'] = $this->language->get('text_persondata');
		}
		if (!empty($tk_checkout_text['text_invoice'])) {
			$data['text_invoice'] = $tk_checkout_text['text_invoice'];
		} else {
			$data['text_invoice'] = $this->language->get('text_invoice');
		}
		if (!empty($tk_checkout_text['text_shiping_select'])) {
			$data['text_shiping_select'] = $tk_checkout_text['text_shiping_select'];
		} else {
			$data['text_shiping_select'] = $this->language->get('text_shiping_select');
		}
		if (!empty($tk_checkout_text['text_address'])) {
			$data['text_address'] = $tk_checkout_text['text_address'];
		} else {
			$data['text_address'] = $this->language->get('text_address');
		}
		if (!empty($tk_checkout_text['text_payment_select'])) {
			$data['text_payment_select'] = $tk_checkout_text['text_payment_select'];
		} else {
			$data['text_payment_select'] = $this->language->get('text_payment_select');
		}
		if (!empty($tk_checkout_text['text_cart'])) {
			$data['text_cart'] = $tk_checkout_text['text_cart'];
		} else {
			$data['text_cart'] = $this->language->get('text_cart');
		}
		if (!empty($tk_checkout_text['text_register'])) {
			$data['text_register'] = $tk_checkout_text['text_register'];
		} else {
			$data['text_register'] = $this->language->get('text_register');
		}
		if (!empty($tk_checkout_text['text_register_account'])) {
			$data['text_register_account'] = $tk_checkout_text['text_register_account'];
		} else {
			$data['text_register_account'] = $this->language->get('text_register_account');
		}
		if (!empty($tk_checkout_text['text_comments'])) {
			$data['text_comments'] = $tk_checkout_text['text_comments'];
		} else {
			$data['text_comments'] = $this->language->get('text_comments');
		}
		if (!empty($tk_checkout_text['text_send'])) {
			$data['text_send'] = $tk_checkout_text['text_send'];
		} else {
			$data['text_send'] = $this->language->get('text_send');
		}
		if (!empty($tk_checkout_text['entry_firstname'])) {
			$data['entry_firstname'] = $tk_checkout_text['entry_firstname'];
		} else {
			$data['entry_firstname'] = $this->language->get('entry_firstname');
		}
		if (!empty($tk_checkout_text['entry_lastname'])) {
			$data['entry_lastname'] = $tk_checkout_text['entry_lastname'];
		} else {
			$data['entry_lastname'] = $this->language->get('entry_lastname');
		}
		if (!empty($tk_checkout_text['entry_telephone'])) {
			$data['entry_telephone'] = $tk_checkout_text['entry_telephone'];
		} else {
			$data['entry_telephone'] = $this->language->get('entry_telephone');
		}
		if (!empty($tk_checkout_text['entry_email'])) {
			$data['entry_email'] = $tk_checkout_text['entry_email'];
		} else {
			$data['entry_email'] = $this->language->get('entry_email');
		}
		if (!empty($tk_checkout_text['entry_country'])) {
			$data['entry_country'] = $tk_checkout_text['entry_country'];
		} else {
			$data['entry_country'] = $this->language->get('entry_country');
		}
		if (!empty($tk_checkout_text['entry_zone'])) {
			$data['entry_zone'] = $tk_checkout_text['entry_zone'];
		} else {
			$data['entry_zone'] = $this->language->get('entry_zone');
		}
		if (!empty($tk_checkout_text['entry_city'])) {
			$data['entry_city'] = $tk_checkout_text['entry_city'];
		} else {
			$data['entry_city'] = $this->language->get('entry_city');
		}
		if (!empty($tk_checkout_text['entry_postcode'])) {
			$data['entry_postcode'] = $tk_checkout_text['entry_postcode'];
		} else {
			$data['entry_postcode'] = $this->language->get('entry_postcode');
		}
		if (!empty($tk_checkout_text['entry_address_1'])) {
			$data['entry_address_1'] = $tk_checkout_text['entry_address_1'];
		} else {
			$data['entry_address_1'] = $this->language->get('entry_address_1');
		}
		if (!empty($tk_checkout_text['entry_password'])) {
			$data['entry_password'] = $tk_checkout_text['entry_password'];
		} else {
			$data['entry_password'] = $this->language->get('entry_password');
		}
		if (!empty($tk_checkout_text['entry_confirm'])) {
			$data['entry_confirm'] = $tk_checkout_text['entry_confirm'];
		} else {
			$data['entry_confirm'] = $this->language->get('entry_confirm');
		}
		if (!empty($tk_checkout_text['entry_newsletter'])) {
			$data['entry_newsletter'] = $tk_checkout_text['entry_newsletter'];
		} else {
			$data['entry_newsletter'] = $this->language->get('entry_newsletter');
		}
		if (!empty($tk_checkout_text['text_top'])) {
			$data['text_top'] = str_replace("<p><br></p>", "", html_entity_decode($tk_checkout_text['text_top'], ENT_QUOTES, 'UTF-8'));
		} else {
			$data['text_top'] = '';
		}
		if (!empty($tk_checkout_text['text_bottom'])) {
			$data['text_bottom'] = str_replace("<p><br></p>", "", html_entity_decode($tk_checkout_text['text_bottom'], ENT_QUOTES, 'UTF-8'));
		} else {
			$data['text_bottom'] = '';
		}
		if (!empty($tk_checkout_text['text_under_button'])) {
			$data['text_under_button'] = str_replace("<p><br></p>", "", html_entity_decode($tk_checkout_text['text_under_button'], ENT_QUOTES, 'UTF-8'));
		} else {
			$data['text_under_button'] = '';
		}
		if (!empty($tk_checkout_text['text_other'])) {
			$data['text_other'] = $tk_checkout_text['text_other'];
		} else {
			$data['text_other'] = $this->language->get('text_other');
		}
		
		//статия за съгласие
		$data['text_agree'] = '';
		if ($this->config->get('module_tk_checkout_agree')) {
			if (!empty($tk_checkout_text['text_agree'])) {
				$data['text_agree'] .= $tk_checkout_text['text_agree'];
			} else {
				if ($this->config->get('config_checkout_id')) {
					$data['text_agree'] .= $this->language->get('text_agree');
				}
			}
			
			if (!empty($tk_checkout_text['text_agree_link']) && $tk_checkout_text['text_agree_link'] > 0) {
				$data['text_agree'] .= '<a href="' . $this->url->link('information/information/agree&language=' . $this->session->data['language'], 'information_id=' . $tk_checkout_text['text_agree_link'], 'SSL') . '" class="agree"><b>';
			} else {
				if ($this->config->get('config_checkout_id')) {
					$data['text_agree'] .= '<a href="' . $this->url->link('information/information/agree&language=' . $this->session->data['language'], 'information_id=' . $this->config->get('config_checkout_id'), 'SSL') . '" class="agree"><b>';
				}
			}
			
			if (!empty($tk_checkout_text['text_agree_link_text'])) {
				$data['text_agree'] .= $tk_checkout_text['text_agree_link_text'] . '</b></a>';
			} else {
				if ($this->config->get('config_checkout_id')) {
					$data['text_agree'] .= $this->language->get('text_agree_text') . '</b></a>';
				}
			}
		}
		
		$data['text_agree_2'] = '';
		if ($this->config->get('module_tk_checkout_agree_2')) {
			if (!empty($tk_checkout_text['text_agree_2'])) {
				$data['text_agree_2'] .= $tk_checkout_text['text_agree_2'];
			} else {
				$data['text_agree_2'] .= $this->language->get('text_agree_2');
			}
			
			if (!empty($tk_checkout_text['text_agree_2_link'])) {
				$data['text_agree_2'] .= '<a href="' . $this->url->link('information/information/agree&language=' . $this->session->data['language'], 'information_id=' . $tk_checkout_text['text_agree_2_link'], 'SSL') . '" class="agree"><b>';
			} else {
				$data['text_agree_2'] .= '<a href="#" class="agree"><b>';
			}
			
			if (!empty($tk_checkout_text['text_agree_2_link_text'])) {
				$data['text_agree_2'] .= $tk_checkout_text['text_agree_2_link_text'] . '</b></a>';
			} else {
				$data['text_agree_2'] .= $this->language->get('text_agree_2_text') . '</b></a>';
			}
		}
		
		$data['text_account_or'] = $this->language->get('text_account_or');
		$data['text_account_facebook'] = $this->language->get('text_account_facebook');
		$data['text_req_text'] = $this->language->get('text_req_text');
		$data['text_loading'] = $this->language->get('text_loading');
		$data['text_error'] = $this->language->get('text_error');
		$data['text_account_already'] = sprintf($this->language->get('text_account_already'), $this->url->link('account/login', '', 'SSL'));
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_forgotten'] = $this->language->get('text_forgotten');
		$data['text_trial'] = $this->language->get('text_trial');
		$data['text_recurring'] = $this->language->get('text_recurring');
		$data['text_recurring_item'] = $this->language->get('text_recurring_item');
		$data['text_pickup'] = $this->language->get('text_pickup');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_recurring_title'] = $this->language->get('text_recurring_title');
		$data['text_payment_recurring'] = $this->language->get('text_payment_recurring');
		$data['txt_entry_voucher'] = $this->language->get('entry_voucher');
		$data['txt_entry_coupon'] = $this->language->get('entry_coupon');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_model'] = $this->language->get('column_model');
		$data['column_quantity'] = $this->language->get('column_quantity');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_total'] = $this->language->get('column_total');
		$data['entry_shipping'] = $this->language->get('entry_shipping');
		$data['button_update'] = $this->language->get('button_update');
		$data['button_remove'] = $this->language->get('button_remove');
		$data['button_coupon'] = $this->language->get('button_coupon');
		$data['button_voucher'] = $this->language->get('button_voucher');
		$data['button_reward'] = $this->language->get('button_reward');
		$data['button_quote'] = $this->language->get('button_quote');
		$data['button_login'] = $this->language->get('button_login');
		
		if ($this->config->get('config_checkout_guest') && !$this->config->get('config_customer_price') && !$this->cart->hasDownload()) {
			$data['config_checkout_guest'] = 1;
		}
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_cart'),
			'href' => $this->url->link('checkout/cart')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('checkout/checkout', '', true)
		);
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		if ($this->request->server['HTTPS']) {
			$data['base'] = $this->config->get('config_ssl');
		} else {
			$data['base'] = $this->config->get('config_url');
		}
		
		$data['home'] = $this->url->link('common/home', '', 'SSL');
		$data['logged'] = $this->customer->isLogged();
		$data['shipping_required'] = $this->cart->hasShipping();
		$data['lang'] = $this->session->data['language'];
		$data['currency'] = $this->session->data['currency'];
		
		$data['forgotten'] = $this->url->link('account/forgotten', '', 'SSL');
		
		//кодове за facebook login
		$data['tk_checkout_fbq_app_id'] = $this->config->get('module_tk_checkout_fbq_app_id');
		
		//бутон за вход с фйесбук
		if ($this->config->get('module_tk_checkout_fbq_app_id') && $this->config->get('module_tk_checkout_fbq_app_secret')) {
			require_once DIR_SYSTEM . 'library/tkfacebook/autoload.php';
			$fb = new Facebook\Facebook([
				'app_id'                => $this->config->get('module_tk_checkout_fbq_app_id'),
				'app_secret'            => $this->config->get('module_tk_checkout_fbq_app_secret'),
				'default_graph_version' => 'v5.0',
			]);
			$helper = $fb->getRedirectLoginHelper();
			$data['facebook_login_url'] = $helper->getLoginUrl(HTTP_SERVER . 'index.php?route=tk_checkout/checkout/fblogin&link=checkout', ['email']);
		} else {
			$data['facebook_login_url'] = '';
		}
		
		//проверка за статуси на еконт
		if ($this->config->get('shipping_tk_econt_status') && $this->config->get('shipping_tk_econt_status') == 1) {
			$data['shipping_tk_econt_status'] = 1;
		} else {
			$data['shipping_tk_econt_status'] = 0;
		}
		
		//проверка за статуси на спиди
		if ($this->config->get('shipping_tk_speedy_status') && $this->config->get('shipping_tk_speedy_status') == 1) {
			$data['shipping_tk_speedy_status'] = 1;
		} else {
			$data['shipping_tk_speedy_status'] = 0;
		}
		
		//проверка за статуси на транспрес
		if ($this->config->get('shipping_tk_transpress_status') && $this->config->get('shipping_tk_transpress_status') == 1) {
			$data['shipping_tk_transpress_status'] = 1;
		} else {
			$data['shipping_tk_transpress_status'] = 0;
		}
		
		//проверка за статуси на boxnow
		if ($this->config->get('shipping_tk_boxnow_status') && $this->config->get('shipping_tk_boxnow_status') == 1) {
			$data['shipping_tk_boxnow_status'] = 1;
		} else {
			$data['shipping_tk_boxnow_status'] = 0;
		}
		
		//проверка за статуси на Next Level
		if ($this->config->get('shipping_tk_next_status') && $this->config->get('shipping_tk_next_status') == 1) {
			$data['shipping_tk_next_status'] = 1;
		} else {
			$data['shipping_tk_next_status'] = 0;
		}
		
		//проверка за статуси на Sameday
		if ($this->config->get('shipping_tk_sameday_status') && $this->config->get('shipping_tk_sameday_status') == 1) {
			$data['shipping_tk_sameday_status'] = 1;
		} else {
			$data['shipping_tk_sameday_status'] = 0;
		}
		
		//продукти
		$products = $this->cart->getProducts();
		
		$data['products'] = array();
		foreach ($products as $product) {
			
			$product_total = 0;
			
			foreach ($products as $product_2) {
				if ($product_2['product_id'] == $product['product_id']) {
					$product_total += $product_2['quantity'];
				}
			}
			
			if ($product['minimum'] > $product_total) {
				$data['error_warning'] = sprintf($this->language->get('error_minimum'), $product['name'], $product['minimum']);
				if (!$this->config->get('module_tk_checkout_skip_cart')) {
					$this->session->data['error'] = sprintf($this->language->get('error_minimum'), $product['name'], $product['minimum']);
					$this->response->redirect($this->url->link('checkout/cart'));
					exit;
				}
			}
			
			if ($product['image']) {
				$image = $this->model_tool_image->resize($product['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_height'));
			} else {
				$image = '';
			}
			
			$option_data = array();
			foreach ($product['option'] as $option) {
				if ($option['type'] != 'file') {
					$value = $option['value'];
				} else {
					$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);
					if ($upload_info) {
						$value = $upload_info['name'];
					} else {
						$value = '';
					}
				}
				$option_data[] = array(
					'name'  => $option['name'],
					'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value)
				);
			}
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$price = false;
			}
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$total = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'], $this->session->data['currency']);
			} else {
				$total = false;
			}
			
			$recurring = '';
			if ($product['recurring']) {
				$frequencies = array(
					'day'        => $this->language->get('text_day'),
					'week'       => $this->language->get('text_week'),
					'semi_month' => $this->language->get('text_semi_month'),
					'month'      => $this->language->get('text_month'),
					'year'       => $this->language->get('text_year'),
				);
				if ($product['recurring']['trial']) {
					$recurring = sprintf($this->language->get('text_trial_description'), $this->currency->format($this->tax->calculate($product['recurring']['trial_price'] * $product['quantity'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']), $product['recurring']['trial_cycle'], $frequencies[$product['recurring']['trial_frequency']], $product['recurring']['trial_duration']) . ' ';
				}
				if ($product['recurring']['duration']) {
					$recurring .= sprintf($this->language->get('text_payment_description'), $this->currency->format($this->tax->calculate($product['recurring']['price'] * $product['quantity'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']), $product['recurring']['cycle'], $frequencies[$product['recurring']['frequency']], $product['recurring']['duration']);
				} else {
					$recurring .= sprintf($this->language->get('text_payment_cancel'), $this->currency->format($this->tax->calculate($product['recurring']['price'] * $product['quantity'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']), $product['recurring']['cycle'], $frequencies[$product['recurring']['frequency']], $product['recurring']['duration']);
				}
			}
			
			$data['products'][] = array(
				'product_id' => $product['product_id'],
				'thumb'      => $image,
				'name'       => $product['name'],
				'model'      => $product['model'],
				'cart_id'    => $product['cart_id'],
				'option'     => $option_data,
				'quantity'   => $product['quantity'],
				'stock'      => $product['stock'] || !(!$this->config->get('config_stock_checkout') || $this->config->get('config_stock_warning')),
				'reward'     => ($product['reward'] ? sprintf($this->language->get('text_points'), $product['reward']) : ''),
				'price'      => $price,
				'total'      => $total,
				'href'       => $this->url->link('product/product', 'product_id=' . $product['product_id']),
				'remove'     => $this->url->link('checkout/cart', 'remove=' . $product['product_id']),
				'recurring'  => $recurring
			);
		}
		
		//ваучери
		$data['vouchers'] = array();
		$data['voucher_status'] = $this->config->get('total_voucher_status');
		if (!isset($this->session->data['vouchers'])) {
			$this->session->data['vouchers'] = array();
		}
		if (!empty($this->session->data['vouchers'])) {
			foreach ($this->session->data['vouchers'] as $key => $voucher) {
				$data['vouchers'][] = array(
					'key'         => $key,
					'description' => $voucher['description'],
					'amount'      => $this->currency->format($voucher['amount'], $this->session->data['currency']),
					'remove'      => $this->url->link('checkout/cart', 'remove=' . $key)
				);
			}
		}
		if (isset($this->session->data['voucher'])) {
			$data['voucher'] = $this->session->data['voucher'];
		} else {
			$data['voucher'] = '';
		}
		
		//бонус точки
		$points = $this->customer->getRewardPoints();
		$points_total = 0;
		foreach ($products as $product) {
			if ($product['points']) {
				$points_total += $product['points'];
			}
		}
		if ($points && $points_total && $this->config->get('total_reward_status') && $this->customer->isLogged()) {
			$data['txt_entry_reward'] = sprintf($this->language->get('entry_reward'), $points_total);
			$data['text_reward'] = sprintf($this->language->get('text_reward'), $points);
			if (isset($this->session->data['reward'])) {
				$data['reward'] = $this->session->data['reward'];
			} else {
				$data['reward'] = '';
			}
			$data['reward_status'] = true;
		} else {
			$data['reward_status'] = false;
			$data['reward'] = '';
		}
		
		//купони
		$data['coupon_status'] = $this->config->get('total_coupon_status');
		if (isset($this->session->data['coupon'])) {
			$data['coupon'] = $this->session->data['coupon'];
		} else {
			$data['coupon'] = '';
		}
		
		//тотал
		$data['totals'] = $this->model_extension_module_tk_checkout->getTotals();
		$this->session->data['tk_checkout']['clean_total'] = $data['clean_total'] = number_format($this->cart->getTotal(), 2, '.', '');
		
		//запазваме ид на количка
		$this->session->data['tk_checkout']['cart_id'] = $data['cart_id'] = $this->model_extension_module_tk_checkout->getCartId();
		
		//запазваме теглото на количката,
		$data['config_cart_weight'] = $this->config->get('config_cart_weight');
		$data['weight'] = $this->weight->format($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
		if ($this->cart->getWeight() == 0) {
			$this->session->data['tk_checkout']['weight'] = $data['weight_cart'] = $this->weight->format(1, $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
		} else {
			$this->session->data['tk_checkout']['weight'] = $data['weight_cart'] = $this->weight->format($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
		}
		
		//клиентски групи
		$data['customer_groups'] = array();
		if (is_array($this->config->get('config_customer_group_display'))) {
			$customer_groups = $this->model_account_customer_group->getCustomerGroups();
			foreach ($customer_groups as $customer_group) {
				if (in_array($customer_group['customer_group_id'], $this->config->get('config_customer_group_display'))) {
					$data['customer_groups'][] = $customer_group;
				}
			}
		}
		$data['count_customer_groups'] = count($data['customer_groups']);
		
		//лична информация
		$data['addresses'] = array();
		$data['firstname'] = isset($this->session->data['tk_checkout']['firstname']) ? $this->session->data['tk_checkout']['firstname'] : '';
		$data['lastname'] = isset($this->session->data['tk_checkout']['lastname']) ? $this->session->data['tk_checkout']['lastname'] : '';
		$data['email'] = isset($this->session->data['tk_checkout']['email']) ? $this->session->data['tk_checkout']['email'] : '';
		$data['telephone'] = isset($this->session->data['tk_checkout']['telephone']) ? $this->session->data['tk_checkout']['telephone'] : '';
		$data['shipping_address_id'] = isset($this->session->data['tk_checkout']['shipping_address_id']) ? $this->session->data['tk_checkout']['shipping_address_id'] : '';
		$data['payment_address_id'] = isset($this->session->data['tk_checkout']['payment_address_id']) ? $this->session->data['tk_checkout']['payment_address_id'] : '';
		$data['customer_group_id'] = isset($this->session->data['tk_checkout']['customer_group_id']) ? $this->session->data['tk_checkout']['customer_group_id'] : $this->config->get('config_customer_group_id');
		$data['custom_fields'] = array();
		$data['account_custom_fields'] = array();
		$data['address_custom_fields'] = array();
		
		if (isset($data['customer_group_id'])) {
			$custom_fields = $this->model_account_custom_field->getCustomFields($data['customer_group_id']);
			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'account') {
					$data['account_custom_fields'][] = array(
						'custom_field_id'    => $custom_field['custom_field_id'],
						'custom_field_value' => $custom_field['custom_field_value'],
						'name'               => $custom_field['name'],
						'type'               => $custom_field['type'],
						'value'              => $custom_field['value'],
						'location'           => $custom_field['location'],
						'required'           => $custom_field['required'],
						'sort_order'         => $custom_field['sort_order'],
					);
				}
				if ($custom_field['location'] == 'address') {
					$data['address_custom_fields'][] = array(
						'custom_field_id'    => $custom_field['custom_field_id'],
						'custom_field_value' => $custom_field['custom_field_value'],
						'name'               => $custom_field['name'],
						'type'               => $custom_field['type'],
						'value'              => $custom_field['value'],
						'location'           => $custom_field['location'],
						'required'           => $custom_field['required'],
						'sort_order'         => $custom_field['sort_order'],
					);
				}
			}
		} else {
			$data['customer_group_id'] = 1;
		}
		
		$data['account'] = isset($this->session->data['account']) ? $this->session->data['account'] : false;
		$data['postcode'] = isset($this->session->data['tk_checkout']['postcode']) ? $this->session->data['tk_checkout']['postcode'] : '';
		$data['city'] = isset($this->session->data['tk_checkout']['city']) ? $this->session->data['tk_checkout']['city'] : '';
		$data['address_1'] = isset($this->session->data['tk_checkout']['address_1']) ? $this->session->data['tk_checkout']['address_1'] : '';
		$data['comment'] = isset($this->session->data['tk_checkout']['comment']) ? $this->session->data['tk_checkout']['comment'] : '';
		$data['agree'] = isset($this->session->data['tk_checkout']['agree']) ? $this->session->data['tk_checkout']['agree'] : '';
		$data['agree_2'] = isset($this->session->data['tk_checkout']['agree_2']) ? $this->session->data['tk_checkout']['agree_2'] : '';
		$data['newsletter'] = isset($this->session->data['tk_checkout']['newsletter']) ? $this->session->data['tk_checkout']['newsletter'] : true;
		
		if (isset($this->session->data['tk_checkout']['account_custom_field']) && $this->session->data['tk_checkout']['account_custom_field']) {
			$data['account_custom_field'] = $this->session->data['tk_checkout']['account_custom_field'];
		}
		
		if (isset($this->session->data['tk_checkout']['address_custom_field']) && $this->session->data['tk_checkout']['address_custom_field']) {
			$data['address_custom_field'] = $this->session->data['tk_checkout']['address_custom_field'];
		}
		
		if ($this->customer->isLogged()) {
			$data['customer_id'] = $this->session->data['customer_id'];
			$data['newsletter'] = $this->customer->getNewsletter();
			$customer_info = $this->model_account_customer->getCustomer($this->session->data['customer_id']);
			$data['firstname'] = $this->customer->getFirstName();
			$data['lastname'] = $this->customer->getLastName();
			$data['email'] = $this->customer->getEmail();
			$data['telephone'] = $this->customer->getTelephone();
			$data['addresses'] = $this->model_account_address->getAddresses();
			$data['address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			
			if (isset($this->session->data['tk_checkout']['country_id']) && $this->session->data['tk_checkout']['country_id'] > 0) {
				$data['country_id'] = $this->session->data['tk_checkout']['country_id'];
			} else {
				if (isset($data['address']['zone_id']) && $data['address']['country_id'] > 0) {
					$data['country_id'] = $data['address']['country_id'];
				} else {
					$data['country_id'] = $this->config->get('config_country_id');
				}
			}
			
			if (isset($this->session->data['tk_checkout']['zone_id']) && $this->session->data['tk_checkout']['zone_id'] > 0) {
				$data['zone_id'] = $this->session->data['tk_checkout']['zone_id'];
			} else {
				if (isset($data['address']['zone_id']) && $data['address']['zone_id'] > 0) {
					$data['zone_id'] = $data['address']['zone_id'];
				} else {
					if ($this->config->get('config_zone_id')) {
						$data['zone_id'] = $this->config->get('config_zone_id');
					} else {
						$data['zone_id'] = 0;
					}
				}
			}
			
			if (isset($data['address']['zone_id']) && $data['address']['zone_id'] > 0) {
				$data['address_zone_id'] = $data['address']['zone_id'];
			}
			
			$data['shipping_address_id'] = $this->customer->getAddressId();
			$data['payment_address_id'] = $this->customer->getAddressId();
			$data['customer_group_id'] = $customer_info['customer_group_id'];
			
			$data['account_custom_field'] = json_decode($customer_info['custom_field'], true);
			if (isset($data['address']['custom_field'])) {
				$data['address_custom_field'] = $data['address']['custom_field'];
			}
		} else {
			if (isset($this->session->data['tk_checkout']['country_id']) && $this->session->data['tk_checkout']['country_id'] > 0) {
				$data['country_id'] = $this->session->data['tk_checkout']['country_id'];
			} else {
				$data['country_id'] = $this->config->get('config_country_id');
			}
			
			if (isset($this->session->data['tk_checkout']['zone_id']) && $this->session->data['tk_checkout']['zone_id'] > 0) {
				$data['zone_id'] = $this->session->data['tk_checkout']['zone_id'];
			} else {
				if ($this->config->get('config_zone_id')) {
					$data['zone_id'] = $this->config->get('config_zone_id');
				} else {
					$data['zone_id'] = 0;
				}
			}
		}
		
		if (!isset($data['address_zone_id'])) {
			$data['address_zone_id'] = 0;
		}
		
		$data['countries'] = $this->model_localisation_country->getCountries();
		$data['count_countries'] = count($data['countries']);
		$data['zone'] = $this->model_localisation_zone->getZonesByCountryId($data['country_id']);
		
		//кой е настоящия метод за доставка
		$country_info = $this->model_localisation_country->getCountry($data['country_id']);
		if ($country_info) {
			$this->session->data['guest']['shipping']['country_id'] = $data['country_id'];
			$this->session->data['guest']['shipping']['country'] = $country_info['name'];
			$this->session->data['guest']['shipping']['iso_code_2'] = $country_info['iso_code_2'];
			$this->session->data['guest']['shipping']['iso_code_3'] = $country_info['iso_code_3'];
			$this->session->data['guest']['shipping']['address_format'] = $country_info['address_format'];
			$this->session->data['guest']['shipping']['zone_id'] = $data['zone_id'];
		} else {
			$this->session->data['guest']['shipping']['country_id'] = '';
			$this->session->data['guest']['shipping']['country'] = '';
			$this->session->data['guest']['shipping']['iso_code_2'] = '';
			$this->session->data['guest']['shipping']['iso_code_3'] = '';
			$this->session->data['guest']['shipping']['address_format'] = '';
			$this->session->data['guest']['shipping']['zone_id'] = '';
		}
		$this->session->data['shipping_country_id'] = $data['country_id'];
		$this->session->data['shipping_zone_id'] = $data['zone_id'];
		
		$shipping_address = $this->session->data['guest']['shipping'];
		
		if (isset($this->session->data['payment_method']['code'])) {
			$shipping_address['payment_method'] = $this->session->data['payment_method']['code'];
		} else {
			$shipping_address['payment_method'] = '';
		}
		
		$method_data = array();
		if (isset($shipping_address) && $this->cart->hasShipping()) {
			if (isset($this->session->data['tk_checkout']['speedy'])) {
				$shipping_address['speedy'] = $this->session->data['tk_checkout']['speedy'];
			}
			if (isset($this->session->data['tk_checkout']['econt'])) {
				$shipping_address['econt'] = $this->session->data['tk_checkout']['econt'];
			}
			if (isset($this->session->data['tk_checkout']['transpress'])) {
				$shipping_address['transpress'] = $this->session->data['tk_checkout']['transpress'];
			}
			if (isset($this->session->data['tk_checkout']['boxnow'])) {
				$shipping_address['boxnow'] = $this->session->data['tk_checkout']['boxnow'];
			}
			$this->session->data['shipping_address'] = $shipping_address;
			$results = $this->model_setting_extension->getExtensions('shipping');
			foreach ($results as $result) {
				if ($this->config->get('shipping_' . $result['code'] . '_status')) {
					$this->load->model('extension/shipping/' . $result['code']);
					$quote = $this->{'model_extension_shipping_' . $result['code']}->getQuote($shipping_address);
					if ($quote) {
						$method_data[$result['code']] = array(
							'title'      => $quote['title'],
							'quote'      => $quote['quote'],
							'sort_order' => $quote['sort_order'],
							'error'      => $quote['error']
						);
					}
				}
			}
			$sort_order = array();
			foreach ($method_data as $key => $value) {
				$sort_order[$key] = $value['sort_order'];
			}
			array_multisort($sort_order, SORT_ASC, $method_data);
			$this->session->data['shipping_methods'] = $method_data;
		}
		
		if (empty($this->session->data['shipping_methods']) && $this->cart->hasShipping()) {
			$data['shipping_error_warning'] = $this->language->get('error_no_shipping');
		} else {
			$data['shipping_error_warning'] = '';
		}
		
		// сесии за методи за доставка
		if (!empty($method_data) && empty($this->session->data['shipping_methods'])) {
			$this->session->data['shipping_methods'] = $method_data;
		}
		
		if (!empty($this->session->data['shipping_methods'])) {
			$first_key = array_keys($this->session->data['shipping_methods']);
			
			if (!empty($this->request->post['shipping_method'])) {
				$shipping = explode('.', $this->request->post['shipping_method']);
				
				if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
					$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
				}
			} else if (isset($first_key[0])) {
				$second_key = array_keys($this->session->data['shipping_methods'][$first_key[0]]['quote']);
				
				if (empty($this->session->data['shipping_method'])) {
					$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$first_key[0]]['quote'][$second_key[0]];
				}
			}
		}
		
		if (!empty($this->session->data['shipping_method']['code']) && !empty($this->session->data['shipping_methods'])) {
			$shipping = explode('.', $this->session->data['shipping_method']['code']);
			if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
				$data['shipping_method_code'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
			}
		}
		
		if (!empty($this->session->data['shipping_method']['code']) && !empty($this->session->data['shipping_methods'])) {
			$shipping = explode('.', $this->session->data['shipping_method']['code']);
			if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
				$data['shipping_method_code'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
			}
		}
		
		if (empty($data['shipping_method_code'])) {
			$data['shipping_method_code'] = array();
		}
		
		if (empty($this->session->data['shipping_methods'])) {
			$this->session->data['shipping_methods'] = array();
		}
		
		$data['shipping_methods'] = $this->session->data['shipping_methods'];
		
		$this->session->data['guest'] = $this->session->data['tk_checkout'];
		
		// tk_special_total
		$data['tk_special_totals'] = array();
		if (!empty($this->session->data['tk_special_totals'])) {
			$data['tk_special_totals'] = $this->session->data['tk_special_totals'];
			
			$keys = array_column($data['tk_special_totals'], 'sort_order');
			array_multisort($keys, SORT_ASC, $data['tk_special_totals']);
		}
		// tk_special_total
		
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		
		//записваме изоставените колички
		$this->add_abandoned_cart($this->model_extension_module_tk_checkout->getCartId());
		
		$this->response->setOutput($this->load->view('tk_checkout/checkout', $data));
	}
	
	//вземаме държавите
	public function get_country() {
		
		$json = array();
		
		$country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);
		
		if ($country_info) {
			$json = array(
				'country_id'        => $country_info['country_id'],
				'name'              => $country_info['name'],
				'iso_code_2'        => $country_info['iso_code_2'],
				'iso_code_3'        => $country_info['iso_code_3'],
				'address_format'    => $country_info['address_format'],
				'postcode_required' => $country_info['postcode_required'],
				'zone'              => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
				'status'            => $country_info['status']
			);
			
			unset($this->session->data['tk_checkout']['sameday']);
			unset($this->session->data['tk_checkout']['next']);
			unset($this->session->data['tk_checkout']['econt']);
			unset($this->session->data['tk_checkout']['speedy']);
			unset($this->session->data['tk_checkout']['transpres']);
			unset($this->session->data['tk_checkout']['boxnow']);
			unset($this->session->data['tk_checkout']['address_1']);
			unset($this->session->data['tk_checkout']['city']);
			unset($this->session->data['tk_checkout']['postcode']);
			unset($this->session->data['guest']['address_1']);
			unset($this->session->data['guest']['city']);
			unset($this->session->data['guest']['postcode']);
			unset($this->session->data['shipping_method']);
			
			$this->session->data['shipping_method']['code'] = '';
			$this->session->data['shipping_method']['title'] = '';
			$this->session->data['shipping_method']['cost'] = '';
			$this->session->data['shipping_method']['tax_class_id'] = '';
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//съобщение за оставаща сума до безплатна доставка
	public function get_text_free_shipping() {
		
		$data['text_free_shipping'] = false;
		
		$total = $this->model_extension_module_tk_checkout->getSubAndTax();
		
		if ($this->config->get('total_free_shipping_status')) {
			$this->load->model('extension/total/free_shipping');
			$free_shippin_info = $this->model_extension_total_free_shipping->getFreeShippingRemain();
			if (isset($free_shippin_info['total']) && $free_shippin_info['total'] > $total) {
				$price = $this->currency->format(($free_shippin_info['total'] - $total), $this->session->data['currency']);
				if ($price) {
					$data['text_free_shipping'] = $this->language->get('text_free_shipping') . '<b>' . $price . '</b>';
				}
			}
		}
		
		if (!$data['text_free_shipping'] && !isset($this->session->data['free_shipping'])) {
			
			if (isset($this->session->data['shipping_method']['code']) && isset($this->session->data['shipping_method']['cost']) && $this->session->data['shipping_method']['cost'] > 0) {
				
				$shipping_method_code_data = explode('.', $this->session->data['shipping_method']['code']);
				
				if (!empty($shipping_method_code_data[0]) && !empty($shipping_method_code_data[1])) {
					
					if (isset($this->session->data['tk_checkout']['country_id']) && $this->session->data['tk_checkout']['country_id'] == 33) {
						
						//проверка за безплатна доставка еконт
						if ($shipping_method_code_data[0] == 'tk_econt' && $this->config->get('shipping_tk_econt_status')) {
							
							$tk_econt_totals = $this->config->get('shipping_tk_econt_totals');
							if ($tk_econt_totals) {
								$total_econt = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_econt_totals);
							} else {
								$total_econt = $total;
							}
							
							if ($shipping_method_code_data[1] == 'econt_machine' && $this->config->get('shipping_tk_econt_machine_free') && $total_econt < $this->config->get('shipping_tk_econt_machine_free')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_econt_machine_free') - $total_econt), $this->session->data['currency']);
							}
							
							if ($shipping_method_code_data[1] == 'econt_office' && $this->config->get('shipping_tk_econt_office_free') && $total_econt < $this->config->get('shipping_tk_econt_office_free')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_econt_office_free') - $total_econt), $this->session->data['currency']);
							}
							
							if ($shipping_method_code_data[1] == 'econt_door' && $this->config->get('shipping_tk_econt_door_free') && $total_econt < $this->config->get('shipping_tk_econt_door_free')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_econt_door_free') - $total_econt), $this->session->data['currency']);
							}
						}
						
						//проверка за безплатна доставка спиди
						if ($shipping_method_code_data[0] == 'tk_speedy' && $this->config->get('shipping_tk_speedy_status')) {
							
							$tk_speedy_totals = $this->config->get('shipping_tk_speedy_totals');
							if ($tk_speedy_totals) {
								$total_speedy = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_speedy_totals);
							} else {
								$total_speedy = $total;
							}
							
							if ($shipping_method_code_data[1] == 'speedy_machine' && $this->config->get('shipping_tk_speedy_machine_free') && $total_speedy < $this->config->get('shipping_tk_speedy_machine_free')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_speedy_machine_free') - $total_speedy), $this->session->data['currency']);
							}
							
							if ($shipping_method_code_data[1] == 'speedy_office' && $this->config->get('shipping_tk_speedy_office_free') && $total_speedy < $this->config->get('shipping_tk_speedy_office_free')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_speedy_office_free') - $total_speedy), $this->session->data['currency']);
							}
							
							if ($shipping_method_code_data[1] == 'speedy_door' && $this->config->get('shipping_tk_speedy_door_free') && $total_speedy < $this->config->get('shipping_tk_speedy_door_free')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_speedy_door_free') - $total_speedy), $this->session->data['currency']);
							}
						}
						
						//проверка за безплатна доставка transpress
						if ($shipping_method_code_data[0] == 'tk_transpress' && $this->config->get('shipping_tk_transpress_status')) {
							
							$tk_transpress_totals = $this->config->get('shipping_tk_transpress_totals');
							if ($tk_transpress_totals) {
								$total_transpress = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_transpress_totals);
							} else {
								$total_transpress = $total;
							}
							
							if ($shipping_method_code_data[1] == 'transpress_door' && $this->config->get('shipping_tk_transpress_free_shipping_amount') && $total_transpress < $this->config->get('shipping_tk_transpress_free_shipping_amount')) {
								$price = $this->currency->format(($this->config->get('shipping_tk_transpress_free_shipping_amount') - $total_transpress), $this->session->data['currency']);
							}
						}
						
						//проверка за безплатна доставка boxnow
						if ($shipping_method_code_data[0] == 'tk_boxnow' && $this->config->get('shipping_tk_boxnow_status') && $this->config->get('shipping_tk_boxnow_status') == 1) {
							if (isset($this->session->data['shipping_method']['code'])) {
								
								$tk_boxnow_totals = $this->config->get('shipping_tk_boxnow_totals');
								if ($tk_boxnow_totals) {
									$total_boxnow = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_boxnow_totals);
								} else {
									$total_boxnow = $total;
								}
								
								if ($shipping_method_code_data[1] == 'boxnow' && $this->config->get('shipping_tk_boxnow_free_shipping') && $total_boxnow < $this->config->get('shipping_tk_boxnow_free_shipping')) {
									$price = $this->currency->format(($this->config->get('shipping_tk_boxnow_free_shipping') - $total_boxnow), $this->session->data['currency']);
								}
							}
						}
					}
					
					//проверка за безплатна доставка next level
					if ($shipping_method_code_data[0] == 'tk_next' && $this->config->get('shipping_tk_next_status')) {
						
						$courier_data = explode('_', $shipping_method_code_data[1]);
						
						$tk_next_countries = $this->config->get('shipping_tk_next_countries');
						if (!empty($courier_data[0]) && !empty($courier_data[1]) && !empty($courier_data[2])) {
							
							if (!empty($tk_next_countries[$courier_data[0]]['couriers'][$courier_data[1]][$courier_data[2]]['free_total'])) {
								$free_total = $tk_next_countries[$courier_data[0]]['couriers'][$courier_data[1]][$courier_data[2]]['free_total'];
							}
							
							if (!empty($tk_next_countries[$courier_data[0]]['couriers'][$courier_data[1]][$courier_data[2]]['totals'])) {
								$total_boxnow = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_next_countries[$courier_data[0]]['couriers'][$courier_data[1]][$courier_data[2]]['totals']);
							} else {
								$total_boxnow = $total;
							}
							
							if (isset($free_total) && $total_boxnow < $free_total) {
								$price = $this->currency->format(($free_total - $total_boxnow), $this->session->data['currency']);
							}
						}
					}
					
					//проверка за безплатна доставка sameday
					if ($shipping_method_code_data[0] == 'tk_sameday' && $this->config->get('shipping_tk_sameday_status')) {
						
						$courier_data = explode('_', $shipping_method_code_data[1]);
						
						$tk_sameday_countries = $this->config->get('shipping_tk_sameday_countries');
						
						if (!empty($courier_data[0]) && !empty($courier_data[1])) {
							if (!empty($tk_sameday_countries[$courier_data[0]]['services'][$courier_data[1]]['free_total'])) {
								$free_total = $tk_sameday_countries[$courier_data[0]]['services'][$courier_data[1]]['free_total'];
							}
							
							if (!empty($tk_sameday_countries[$courier_data[0]]['services'][$courier_data[1]]['totals'])) {
								$total_sameday = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_sameday_countries[$courier_data[0]]['services'][$courier_data[1]]['totals']);
							} else {
								$total_sameday = $total;
							}
							
							if (isset($free_total) && $total_sameday < $free_total) {
								$price = $this->currency->format(($free_total - $total_sameday), $this->session->data['currency']);
							}
						}
					}
				}
			}
		}
		
		if (isset($price)) {
			$data['text_free_shipping'] = $this->language->get('text_free_shipping') . '<b>' . $price . '</b>';
		}
		
		// ако имаме модул TK Special Shipping
		if ($this->config->get('total_tk_special_shipping_status') && isset($this->session->data['tk_special_shipping_rest']) && $this->session->data['tk_special_shipping_rest'] > 0) {
			
			$tk_special_shipping_rest = 0;
			
			if (isset($this->session->data['tk_special_shipping_rest_shippings']) && $this->session->data['tk_special_shipping_rest_shippings'] && isset($this->session->data['shipping_method']['code'])) {
				if (in_array($this->session->data['shipping_method']['code'], $this->session->data['tk_special_shipping_rest_shippings'])) {
					$tk_special_shipping_rest = $this->session->data['tk_special_shipping_rest'];
				}
			} else {
				$tk_special_shipping_rest = $this->session->data['tk_special_shipping_rest'];
			}
			
			if ($tk_special_shipping_rest > 0) {
				$data['text_free_shipping'] = $this->language->get('text_free_shipping') . '<b>' . $this->currency->format($tk_special_shipping_rest, $this->session->data['currency']) . '</b>';
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/free_shipping_text', $data));
	}
	
	//проверка какви полета за адрес или офис да изведем
	public function get_address_shipping() {
		
		if (isset($this->session->data['shipping_method']['code']) && isset($this->request->post['shipping_method']) && $this->request->post['shipping_method'] != $this->session->data['shipping_method']['code']) {
			
			unset($this->session->data['tk_checkout']['sameday']);
			unset($this->session->data['tk_checkout']['next']);
			unset($this->session->data['tk_checkout']['econt']);
			unset($this->session->data['tk_checkout']['speedy']);
			unset($this->session->data['tk_checkout']['transpres']);
			unset($this->session->data['tk_checkout']['boxnow']);
			unset($this->session->data['tk_checkout']['address_1']);
			unset($this->session->data['tk_checkout']['city']);
			unset($this->session->data['tk_checkout']['postcode']);
			
			unset($this->session->data['guest']['address_1']);
			unset($this->session->data['guest']['city']);
			unset($this->session->data['guest']['postcode']);
		}
		
		if ($this->cart->hasShipping()) {
			
			$data['lang'] = $this->session->data['language'];
			
			// методи за доставка
			if (!empty($this->session->data['shipping_methods'])) {
				$data['shipping_methods'] = $this->session->data['shipping_methods'];
				
				if (!empty($this->request->post['shipping_method'])) {
					$data['shipping_method'] = $this->request->post['shipping_method'];
					$shipping = explode('.', $data['shipping_method']);
					
					if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
						$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
					}
				} else {
					$first_key = array_keys($this->session->data['shipping_methods']);
					if (isset($first_key[0])) {
						$second_key = array_keys($this->session->data['shipping_methods'][$first_key[0]]['quote']);
						
						if (empty($this->session->data['shipping_method'])) {
							$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$first_key[0]]['quote'][$second_key[0]];
						}
					}
				}
			}
			
			if (empty($data['shipping_methods'])) {
				$data['shipping_methods'] = array();
			}
			
			if ($this->customer->isLogged()) {
				$data['address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
				$data['country_id'] = isset($data['address']['country_id']) ? $data['address']['country_id'] : '';
			}
			
			if (isset($this->session->data['tk_checkout']['country_id'])) {
				$data['country_id'] = $this->session->data['tk_checkout']['country_id'];
			}
			
			if (isset($this->request->post['country_id'])) {
				$data['country_id'] = $this->request->post['country_id'];
			}
			
			if (!isset($data['country_id'])) {
				$data['country_id'] = $this->config->get('config_country_id');
			}
			
			if (!isset($data['country_id'])) {
				$data['country_id'] = 33;
			}
			
			// избор на шаблон за адреси спрямо метода
			if (!empty($this->session->data['shipping_method']['code'])) {
				
				$shipping_method_code_data = explode('.', $this->session->data['shipping_method']['code']);
				if (!empty($shipping_method_code_data[1])) {
					$courier_data = explode('_', $shipping_method_code_data[1]);
				}
				
				if (!empty($shipping_method_code_data[0]) && !empty($shipping_method_code_data[1])) {
					if ($shipping_method_code_data[1] == 'econt_machine') {
						$this->model_extension_shipping_tk_econt->getEcontMachine($data);
					} else if ($shipping_method_code_data[1] == 'econt_office') {
						$this->model_extension_shipping_tk_econt->getEcontOffice($data);
					} else if ($shipping_method_code_data[1] == 'econt_door') {
						$this->model_extension_shipping_tk_econt->getEcontAddress($data);
					} else if ($shipping_method_code_data[1] == 'speedy_machine') {
						$this->model_extension_shipping_tk_speedy->getSpeedyMachine($data);
					} else if ($shipping_method_code_data[1] == 'speedy_office') {
						$this->model_extension_shipping_tk_speedy->getSpeedyOffice($data);
					} else if ($shipping_method_code_data[1] == 'speedy_door') {
						$this->model_extension_shipping_tk_speedy->getSpeedyAddress($data);
					} else if ($shipping_method_code_data[1] == 'transpress_door') {
						$this->model_extension_shipping_tk_transpress->getTranspress($data);
					} else if ($shipping_method_code_data[1] == 'boxnow') {
						$this->model_extension_shipping_tk_boxnow->getBoxNow($data);
					} else if ($shipping_method_code_data[0] == 'tk_next' && !empty($courier_data[0]) && !empty($courier_data[1]) && !empty($courier_data[2]) && $courier_data[2] == 'address') {
						$this->model_extension_shipping_tk_next->getNextAddress($data, $courier_data);
					} else if ($shipping_method_code_data[0] == 'tk_next' && !empty($courier_data[0]) && !empty($courier_data[1]) && !empty($courier_data[2]) && $courier_data[2] == 'office') {
						$this->model_extension_shipping_tk_next->getNextOffice($data, $courier_data, 'office');
					} else if ($shipping_method_code_data[0] == 'tk_next' && !empty($courier_data[0]) && !empty($courier_data[1]) && !empty($courier_data[2]) && $courier_data[2] == 'machine') {
						$this->model_extension_shipping_tk_next->getNextOffice($data, $courier_data, 'machine');
					} else if ($shipping_method_code_data[0] == 'tk_sameday' && !empty($courier_data[0]) && !empty($courier_data[1]) && !empty($courier_data[2]) && $courier_data[2] == 'address') {
						$this->model_extension_shipping_tk_sameday->getSamedayAddress($data, $courier_data);
					} else if ($shipping_method_code_data[0] == 'tk_sameday' && !empty($courier_data[0]) && !empty($courier_data[1]) && !empty($courier_data[2]) && $courier_data[2] == 'machine') {
						$this->model_extension_shipping_tk_sameday->getSamedayMachine($data, $courier_data);
					} else if ($this->session->data['shipping_method']['code'] == 'pickup.pickup') {
						$this->model_extension_module_tk_checkout->getAddressPickup($data);
					} else {
						$this->model_extension_module_tk_checkout->getAddress($data);
					}
				} else {
					$this->model_extension_module_tk_checkout->getAddress($data);
				}
			} else {
				$this->model_extension_module_tk_checkout->getAddress($data);
			}
		}
	}
	
	//извежда секцията тотал на количката
	public function get_cart() {
		
		$data['redirect'] = false;
		
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers']))) {
			$data['redirect'] = $this->url->link('checkout/cart');
		}
		
		if (!isset($this->session->data['vouchers'])) {
			$this->session->data['vouchers'] = array();
		}
		
		$data['cart_id'] = $this->model_extension_module_tk_checkout->getCartId();
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if ($this->config->get('config_customer_price') && !$this->customer->isLogged()) {
			$data['attention'] = sprintf($this->language->get('text_login'), $this->url->link('account/login'), $this->url->link('account/register'));
		} else {
			$data['attention'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$data['vouchers'] = array();
		if (!empty($this->session->data['vouchers'])) {
			foreach ($this->session->data['vouchers'] as $key => $voucher) {
				$data['vouchers'][] = array(
					'key'         => $key,
					'description' => $voucher['description'],
					'amount'      => $this->currency->format($voucher['amount'], $this->session->data['currency']),
					'remove'      => $this->url->link('checkout/cart', 'remove=' . $key)
				);
			}
		}
		
		$data['shipping_status'] = $this->config->get('shipping_status') && $this->config->get('shipping_estimator') && $this->cart->hasShipping();
		
		// Totals
		$data['totals'] = $this->model_extension_module_tk_checkout->getTotals();
		
		$this->response->setOutput($this->load->view('tk_checkout/cart', $data));
	}
	
	//извежда методите на плащане
	public function get_payment_method() {
		
		$this->add_abandoned_cart($this->request->post);
		
		// методи за доставка
		if (!empty($this->session->data['shipping_methods'])) {
			$data['shipping_methods'] = $this->session->data['shipping_methods'];
			
			if (!empty($this->request->post['shipping_method'])) {
				$data['shipping_method'] = $this->request->post['shipping_method'];
				$shipping = explode('.', $data['shipping_method']);
				if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
					$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
				}
			} else {
				$first_key = array_keys($this->session->data['shipping_methods']);
				if (isset($first_key[0])) {
					$second_key = array_keys($this->session->data['shipping_methods'][$first_key[0]]['quote']);
					
					if (empty($this->session->data['shipping_method'])) {
						$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$first_key[0]]['quote'][$second_key[0]];
					}
				}
			}
		}
		
		if (empty($data['shipping_methods'])) {
			$data['shipping_methods'] = array();
		}
		
		$country_id = '';
		
		if ($this->customer->isLogged()) {
			$data['address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			$country_id = isset($data['address']['country_id']) ? $data['address']['country_id'] : '';
			$zone_id = isset($data['address']['zone_id']) ? $data['address']['zone_id'] : '';
		}
		
		if (isset($this->session->data['tk_checkout']['country_id'])) {
			$country_id = $this->session->data['tk_checkout']['country_id'];
		}
		
		if (isset($this->request->post['country_id'])) {
			$country_id = $this->request->post['country_id'];
		}
		
		if (!isset($country_id)) {
			$country_id = $this->config->get('config_country_id');
		}
		
		if (!isset($country_id) || !$country_id) {
			$country_id = 33;
		}
		
		if (isset($this->session->data['tk_checkout']['zone_id'])) {
			$zone_id = $this->session->data['tk_checkout']['zone_id'];
		}
		
		if (isset($this->request->post['zone_id'])) {
			$zone_id = $this->request->post['zone_id'];
		}
		
		if (!isset($zone_id)) {
			$zone_id = $this->config->get('config_zone_id');
		}
		
		if (!isset($zone_id)) {
			$zone_id = 0;
		}
		
		$country_info = $this->model_localisation_country->getCountry($country_id);
		if ($country_info) {
			$this->session->data['guest']['payment']['country_id'] = $country_id;
			$this->session->data['guest']['payment']['country'] = $country_info['name'];
			$this->session->data['guest']['payment']['iso_code_2'] = $country_info['iso_code_2'];
			$this->session->data['guest']['payment']['iso_code_3'] = $country_info['iso_code_3'];
			$this->session->data['guest']['payment']['address_format'] = $country_info['address_format'];
			$this->session->data['guest']['payment']['zone_id'] = $zone_id;
		} else {
			$this->session->data['guest']['payment']['country_id'] = '';
			$this->session->data['guest']['payment']['country'] = '';
			$this->session->data['guest']['payment']['iso_code_2'] = '';
			$this->session->data['guest']['payment']['iso_code_3'] = '';
			$this->session->data['guest']['payment']['address_format'] = '';
			$this->session->data['guest']['payment']['zone_id'] = '';
		}
		
		$this->session->data['payment_country_id'] = $country_id;
		$this->session->data['payment_zone_id'] = $zone_id;
		
		$payment_address = $this->session->data['guest']['payment'];
		
		if (isset($payment_address)) {
			$this->session->data['payment_address'] = $payment_address;
			$this->tax->setPaymentAddress($payment_address['country_id'], $zone_id);
			
			// Payment Methods
			$method_data = array();
			
			$this->load->model('setting/extension');
			
			$results = $this->model_setting_extension->getExtensions('payment');
			
			$recurring = $this->cart->hasRecurringProducts();
			
			$totals = $this->model_extension_module_tk_checkout->getTotals();
			$total_price = 0;
			foreach ($totals as $total) {
				if ($total['code'] == 'total') {
					$total_price += $total['value'];
				}
			}
			
			foreach ($results as $result) {
				if ($this->config->get('payment_' . $result['code'] . '_status')) {
					$this->load->model('extension/payment/' . $result['code']);
					
					$method = $this->{'model_extension_payment_' . $result['code']}->getMethod($this->session->data['payment_address'], $total_price);
					
					if ($method) {
						if ($recurring) {
							if (property_exists($this->{'model_extension_payment_' . $result['code']}, 'recurringPayments') && $this->{'model_extension_payment_' . $result['code']}->recurringPayments()) {
								$method_data[$result['code']] = array(
									'code'       => $method['code'],
									'title'      => strip_tags($method['title']),
									'terms'      => $method['terms'],
									'sort_order' => $method['sort_order'],
								);
							}
						} else {
							$method_data[$result['code']] = array(
								'code'       => $method['code'],
								'title'      => strip_tags($method['title']),
								'terms'      => $method['terms'],
								'sort_order' => $method['sort_order'],
							);
						}
						
						if ($this->config->get('module_tk_checkout_popup_payments') && in_array($result['code'], $this->config->get('module_tk_checkout_popup_payments'))) {
							$method_data[$result['code']]['popup_payment'] = 1;
						} else {
							$method_data[$result['code']]['popup_payment'] = 0;
						}
					}
				}
			}
			
			$sort_order = array();
			foreach ($method_data as $key => $value) {
				$sort_order[$key] = $value['sort_order'];
			}
			array_multisort($sort_order, SORT_ASC, $method_data);
			$this->session->data['payment_methods'] = $method_data;
		}
		
		if (empty($this->session->data['payment_methods'])) {
			$data['payment_error_warning'] = $this->language->get('error_no_payment');
		} else {
			$data['payment_error_warning'] = '';
		}
		
		if (isset($this->session->data['payment_methods']) && $this->session->data['payment_methods']) {
			$data['payment_methods'] = $this->session->data['payment_methods'];
		} else {
			$data['payment_methods'] = array();
			unset($this->session->data['payment_method']);
		}
		
		if (isset($this->request->post['payment_method'])) {
			$data['payment_method_code'] = $this->request->post['payment_method'];
			$data['payment'] = $this->load->controller('extension/payment/' . $this->request->post['payment_method']);
			$this->session->data['payment_method']['code'] = $this->request->post['payment_method'];
			$this->session->data['tk_checkout']['payment_method'] = $this->session->data['payment_method'];
		} else if (isset($this->session->data['payment_method']['code'])) {
			$data['payment_method_code'] = $this->session->data['payment_method']['code'];
			$data['payment'] = $this->load->controller('extension/payment/' . $this->session->data['payment_method']['code']);
		} else {
			$data['payment_method_code'] = '';
			$data['payment'] = '';
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/payment_method', $data));
	}
	
	//добавяме шаблона на конкретния метод за плащане
	public function get_payment_display() {
		
		$data['payment'] = '';
		
		if (isset($this->request->post['payment_method'])) {
			$data['payment_code'] = $this->request->post['payment_method'];
		} else if (isset($this->session->data['payment_method']['code'])) {
			$data['payment_code'] = $this->session->data['payment_method']['code'];
		} else {
			$data['payment_code'] = '';
		}
		
		if ((!empty($this->session->data['order_id']) && !empty($data['payment_code'])) || $data['payment_code'] == 'bank_transfer') {
			$data['payment'] = $this->load->controller('extension/payment/' . $data['payment_code']);
		}
		
		if (isset($this->session->data['shipping_method']['code'])) {
			$shipping = explode('.', $this->session->data['shipping_method']['code']);
			if ($this->config->get('shipping_tk_boxnow_text') && $this->config->get('shipping_tk_boxnow_status') && isset($shipping[0]) && $shipping[0] == 'tk_boxnow') {
				$tk_boxnow_text_array = $this->config->get('shipping_tk_boxnow_text');
				$tk_boxnow_text = $tk_boxnow_text_array[$this->config->get('config_language_id')];
			}
		}
		
		if ($data['payment_code'] == 'cod' && !empty($tk_boxnow_text['cod'])) {
			$data['payment'] = nl2br($tk_boxnow_text['cod']);
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/payment_display', $data));
	}
	
	//добавяме стартиране на метода за плащане
	public function get_payment_triger() {
		
		$data['popup_payments'] = $this->config->get('module_tk_checkout_popup_payments');
		
		if (isset($this->request->post['payment_method'])) {
			$data['payment'] = $this->load->controller('extension/payment/' . $this->request->post['payment_method']);
			$data['payment_method'] = $this->request->post['payment_method'];
		} else if (isset($this->session->data['payment_method']['code'])) {
			$data['payment'] = $this->load->controller('extension/payment/' . $this->session->data['payment_method']['code']);
			$data['payment_method'] = $this->session->data['payment_method']['code'];
		} else {
			$data['payment'] = '';
			$data['payment_method'] = '';
		}
		
		if (!isset($data['popup_payments']) || !$data['popup_payments']) {
			$data['popup_payments'] = array();
		}
		
		$data['back_url'] = $this->url->link('checkout/checkout');
		
		$this->session->data['tk_checkout']['confirm'] = false;
		
		$this->response->setOutput($this->load->view('tk_checkout/payment_triger', $data));
	}
	
	//извежда методите на доставка с първоначални цени
	public function get_shipping_method() {
		
		$this->session->data['order_id'] = false;
		
		$this->add_abandoned_cart($this->request->post);
		
		if ($this->cart->hasShipping()) {
			
			$country_id = '';
			
			if ($this->customer->isLogged()) {
				$data['address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
				$country_id = isset($data['address']['country_id']) ? $data['address']['country_id'] : '';
				$zone_id = isset($data['address']['zone_id']) ? $data['address']['zone_id'] : '';
			}
			
			if (isset($this->session->data['tk_checkout']['country_id'])) {
				$country_id = $this->session->data['tk_checkout']['country_id'];
			}
			
			if (isset($this->request->post['country_id'])) {
				$country_id = $this->request->post['country_id'];
			}
			
			if (!isset($country_id)) {
				$country_id = $this->config->get('config_country_id');
			}
			
			if (!isset($country_id)) {
				$country_id = 33;
			}
			
			if (isset($this->session->data['tk_checkout']['zone_id'])) {
				$zone_id = $this->session->data['tk_checkout']['zone_id'];
			}
			
			if (isset($this->request->post['zone_id'])) {
				$zone_id = $this->request->post['zone_id'];
			}
			
			if (!isset($zone_id)) {
				$zone_id = $this->config->get('config_zone_id');
			}
			
			if (!isset($zone_id)) {
				$zone_id = 0;
			}
			
			if (isset($country_id)) {
				$country_info = $this->model_localisation_country->getCountry($country_id);
				if ($country_info) {
					$this->session->data['guest']['shipping']['country_id'] = $country_id;
					$this->session->data['guest']['shipping']['country'] = $country_info['name'];
					$this->session->data['guest']['shipping']['iso_code_2'] = $country_info['iso_code_2'];
					$this->session->data['guest']['shipping']['iso_code_3'] = $country_info['iso_code_3'];
					$this->session->data['guest']['shipping']['address_format'] = $country_info['address_format'];
					$this->session->data['guest']['shipping']['zone_id'] = $zone_id;
				} else {
					$this->session->data['guest']['shipping']['country_id'] = '';
					$this->session->data['guest']['shipping']['country'] = '';
					$this->session->data['guest']['shipping']['iso_code_2'] = '';
					$this->session->data['guest']['shipping']['iso_code_3'] = '';
					$this->session->data['guest']['shipping']['address_format'] = '';
					$this->session->data['guest']['shipping']['zone_id'] = '';
				}
				$this->session->data['shipping_country_id'] = $country_id;
				$this->session->data['shipping_zone_id'] = $zone_id;
				$shipping_address = $this->session->data['guest']['shipping'];
			}
			
			if (isset($this->request->post['city'])) {
				$shipping_address['city'] = $this->request->post['city'];
			} else {
				$shipping_address['city'] = '';
			}
			
			if (isset($this->request->post['postcode'])) {
				$shipping_address['postcode'] = $this->request->post['postcode'];
			} else {
				$shipping_address['postcode'] = 0;
			}
			
			if (isset($this->request->post['payment_method'])) {
				$shipping_address['payment_method'] = $this->request->post['payment_method'];
				$this->session->data['payment_method']['code'] = $this->request->post['payment_method'];
				$this->session->data['tk_checkout']['payment_method'] = $this->session->data['payment_method'];
			} else if (isset($this->session->data['payment_method']['code'])) {
				$shipping_address['payment_method'] = $this->session->data['payment_method']['code'];
			} else {
				$shipping_address['payment_method'] = '';
			}
			
			$method_data = array();
			if (isset($shipping_address)) {
				$this->session->data['shipping_address'] = $shipping_address;
				$results = $this->model_setting_extension->getExtensions('shipping');
				foreach ($results as $result) {
					if ($this->config->get('shipping_' . $result['code'] . '_status')) {
						$this->load->model('extension/shipping/' . $result['code']);
						$quote = $this->{'model_extension_shipping_' . $result['code']}->getQuote($shipping_address);
						if ($quote) {
							$method_data[$result['code']] = array(
								'title'      => $quote['title'],
								'quote'      => $quote['quote'],
								'sort_order' => $quote['sort_order'],
								'error'      => $quote['error']
							);
						}
					}
				}
				$sort_order = array();
				foreach ($method_data as $key => $value) {
					$sort_order[$key] = $value['sort_order'];
				}
				array_multisort($sort_order, SORT_ASC, $method_data);
				$this->session->data['shipping_methods'] = $method_data;
			}
			
			if (empty($this->session->data['shipping_methods']) && $this->cart->hasShipping()) {
				$data['shipping_error_warning'] = $this->language->get('error_no_shipping');
			} else {
				$data['shipping_error_warning'] = '';
			}
			
			// сесии за методи за доставка
			if (!empty($method_data) && empty($this->session->data['shipping_methods'])) {
				$this->session->data['shipping_methods'] = $method_data;
			}
			
			if (!empty($this->session->data['shipping_methods'])) {
				$first_key = array_keys($this->session->data['shipping_methods']);
				
				if (!empty($this->request->post['shipping_method'])) {
					$shipping = explode('.', $this->request->post['shipping_method']);
					
					if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
						$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
					}
				} else if (isset($first_key[0])) {
					$second_key = array_keys($this->session->data['shipping_methods'][$first_key[0]]['quote']);
					
					if (empty($this->session->data['shipping_method'])) {
						$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$first_key[0]]['quote'][$second_key[0]];
					}
				}
			}
			
			if (!empty($this->session->data['shipping_method']['code']) && !empty($this->session->data['shipping_methods'])) {
				$shipping = explode('.', $this->session->data['shipping_method']['code']);
				if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
					$data['shipping_method_code'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
				}
			}
			
			if (empty($data['shipping_method_code'])) {
				$data['shipping_method_code'] = array();
			}
			
			if (empty($this->session->data['shipping_methods'])) {
				$this->session->data['shipping_methods'] = array();
			}
			
			$data['shipping_methods'] = $this->session->data['shipping_methods'];
			
			if (isset($this->request->get['type']) && $this->request->get['type'] == 'method_address') {
				$this->response->setOutput($this->load->view('tk_checkout/shipping_method_address', $data));
			} else {
				if (isset($this->request->get['type']) && $this->request->get['type'] == 'method_payment') {
					$this->response->setOutput($this->load->view('tk_checkout/shipping_method_payment', $data));
				} else {
					$this->response->setOutput($this->load->view('tk_checkout/shipping_method', $data));
				}
			}
		} else {
			
			$data = array();
			
			if (isset($this->request->get['type']) && $this->request->get['type'] == 'method_payment') {
				$this->response->setOutput($this->load->view('tk_checkout/shipping_method_payment', $data));
			} else {
				$this->response->setOutput($this->load->view('tk_checkout/shipping_method', $data));
			}
		}
	}
	
	//извеждаме допълнителни потребителски полета тип акаунт - използват се за данни за фактура
	public function get_account_custom_fields() {
		
		if ($this->config->get('module_tk_checkout_invoice')) {
			$data['module_tk_checkout_invoice'] = $this->config->get('module_tk_checkout_invoice');
		} else {
			$data['module_tk_checkout_invoice'] = 9999;
		}
		
		$data['text_invoice'] = $this->language->get('text_invoice');
		
		if (isset($this->request->post['customer_group_id'])) {
			$data['customer_group_id'] = $this->request->post['customer_group_id'];
		} else if (isset($this->session->data['tk_checkout']['customer_group_id'])) {
			$data['customer_group_id'] = $this->session->data['tk_checkout']['customer_group_id'];
		} else {
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
		}
		
		$data['account_custom_field'] = array();
		if ($this->customer->isLogged()) {
			$customer_info = $this->model_account_customer->getCustomer($this->session->data['customer_id']);
			$data['account_custom_field'] = json_decode($customer_info['custom_field'], true);
		}
		
		if (isset($this->session->data['tk_checkout']['account_custom_field'])) {
			$data['account_custom_field'] = $this->session->data['tk_checkout']['account_custom_field'];
		}
		
		$data['account_custom_fields'] = array();
		if (isset($data['customer_group_id'])) {
			$custom_fields = $this->model_account_custom_field->getCustomFields($data['customer_group_id']);
			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'account') {
					$data['account_custom_fields'][] = array(
						'custom_field_id'    => $custom_field['custom_field_id'],
						'custom_field_value' => $custom_field['custom_field_value'],
						'name'               => $custom_field['name'],
						'type'               => $custom_field['type'],
						'value'              => $custom_field['value'],
						'location'           => $custom_field['location'],
						'required'           => $custom_field['required'],
						'sort_order'         => $custom_field['sort_order'],
					);
				}
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/account_custom_fields', $data));
	}
	
	//извеждаме допълнителни потребителски полета тип адрес
	public function get_address_custom_fields() {
		
		if (isset($this->request->post['customer_group_id'])) {
			$data['customer_group_id'] = $this->request->post['customer_group_id'];
		} else if (isset($this->session->data['tk_checkout']['customer_group_id'])) {
			$data['customer_group_id'] = $this->session->data['tk_checkout']['customer_group_id'];
		} else {
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
		}
		
		$data['address_custom_field'] = array();
		if ($this->customer->isLogged()) {
			$data['address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
			$data['address_custom_field'] = isset($data['address']['custom_field']) ? $data['address']['custom_field'] : '';
		}
		
		if (isset($this->session->data['tk_checkout']['address_custom_field'])) {
			$data['address_custom_field'] = $this->session->data['tk_checkout']['address_custom_field'];
		}
		
		$data['address_custom_fields'] = array();
		if (isset($data['customer_group_id'])) {
			$custom_fields = $this->model_account_custom_field->getCustomFields($data['customer_group_id']);
			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'address') {
					$data['address_custom_fields'][] = array(
						'custom_field_id'    => $custom_field['custom_field_id'],
						'custom_field_value' => $custom_field['custom_field_value'],
						'name'               => $custom_field['name'],
						'type'               => $custom_field['type'],
						'value'              => $custom_field['value'],
						'location'           => $custom_field['location'],
						'required'           => $custom_field['required'],
						'sort_order'         => $custom_field['sort_order'],
					);
				}
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/address_custom_fields', $data));
	}
	
	//валидиране на бонус точки
	public function validate_reward() {
		
		$json = array();
		
		$points = $this->customer->getRewardPoints();
		
		$points_total = 0;
		
		foreach ($this->cart->getProducts() as $product) {
			if ($product['points']) {
				$points_total += $product['points'];
			}
		}
		
		if (empty($this->request->post['reward'])) {
			$json['error'] = $this->language->get('error_reward');
		}
		
		if ($this->request->post['reward'] > $points) {
			$json['error'] = sprintf($this->language->get('error_points'), $this->request->post['reward']);
		}
		
		if ($this->request->post['reward'] > $points_total) {
			$json['error'] = sprintf($this->language->get('error_maximum'), $points_total);
		}
		
		if (!$json) {
			$this->session->data['reward'] = abs($this->request->post['reward']);
			$json['success'] = $this->language->get('text_success_reward');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//премахване на бонус точки
	public function remove_reward() {
		
		$json = array();
		unset($this->session->data['reward']);
		$json['success'] = $this->language->get('remove_reward_success');
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//валидиране на купони
	public function validate_coupon() {
		
		$json = array();
		
		if (isset($this->request->post['coupon'])) {
			$coupon = $this->request->post['coupon'];
		} else {
			$coupon = '';
		}
		
		$this->load->model('extension/total/coupon');
		$coupon_info = $this->model_extension_total_coupon->getCoupon($coupon);
		
		if (empty($this->request->post['coupon'])) {
			$json['error'] = $this->language->get('error_coupon_empty');
			unset($this->session->data['coupon']);
		} else if ($coupon_info) {
			$this->session->data['coupon'] = $this->request->post['coupon'];
			$json['success'] = $this->language->get('text_coupon_success');
		} else {
			$json['error'] = $this->language->get('error_coupon');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//премахване на купони
	public function remove_coupon() {
		
		$json = array();
		unset($this->session->data['coupon']);
		$json['success'] = $this->language->get('remove_coupon_success');
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//валидиране на ваучери
	public function validate_voucher() {
		
		$json = array();
		
		if (isset($this->request->post['voucher'])) {
			$voucher = $this->request->post['voucher'];
		} else {
			$voucher = '';
		}
		
		$this->load->model('extension/total/voucher');
		$voucher_info = $this->model_extension_total_voucher->getVoucher($voucher);
		
		if (empty($this->request->post['voucher'])) {
			$json['error'] = $this->language->get('error_voucher_empty');
			unset($this->session->data['voucher']);
		} else if ($voucher_info) {
			$this->session->data['voucher'] = $this->request->post['voucher'];
			$json['success'] = $this->language->get('text_voucher_success');
		} else {
			$json['error'] = $this->language->get('error_voucher');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//премахване на бонус точки
	public function remove_voucher() {
		
		$json = array();
		unset($this->session->data['voucher']);
		$json['success'] = $this->language->get('remove_voucher_success');
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//валидиране на вход в съществуващ акаунт
	public function validate_login() {
		
		$json = array();
		
		if ($this->customer->isLogged()) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		if (!$json) {
			if (!$this->customer->login($this->request->post['login_email'], $this->request->post['login_password'])) {
				$json['error']['warning'] = $this->language->get('error_login');
			}
			
			// Check if customer has been approved.
			$customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['login_email']);
			if ($customer_info && !$customer_info['status']) {
				$json['error']['warning'] = $this->language->get('error_approved');
			}
		}
		
		if (!$json) {
			unset($this->session->data['guest']);
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	//вземаме теглото на количката
	public function get_cart_weight() {
		
		$json = array();
		
		if ($this->cart->getWeight() == 0) {
			$json['weight'] = $this->weight->format(1, $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
		} else {
			$json['weight'] = $this->weight->format($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//подменяме малката количка в хедъра
	public function get_min_cart() {
		
		$json = array();
		
		$this->load->language('checkout/cart');
		
		$totals = $this->model_extension_module_tk_checkout->getTotals();
		$total_price = 0;
		foreach ($totals as $total) {
			if ($total['code'] == 'total') {
				$total_price += $total['value'];
			}
		}
		
		$json['total'] = sprintf($this->language->get('text_items'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total_price, $this->session->data['currency']));
		$json['items_count'] = $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//промяна на количество продукт
	public function edit_cart() {
		
		$json = array();
		
		if (!empty($this->request->post['quantity'])) {
			if (is_numeric($this->request->post['quantity']) && $this->request->post['quantity'] > 0 && $this->request->post['quantity'] == round($this->request->post['quantity'])) {
				$cart_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "cart` WHERE cart_id = '" . (int)$this->request->post['key'] . "'");
				$cart = $cart_query->row;
				
				$product_query = $this->db->query("SELECT minimum FROM `" . DB_PREFIX . "product` WHERE product_id = '" . (int)$cart['product_id'] . "'");
				$product_minimum = $product_query->row['minimum'];
				
				if ($product_minimum <= $this->request->post['quantity']) {
					$this->cart->update($this->request->post['key'], $this->request->post['quantity']);
				} else {
					$json['redirect'] = $this->url->link('checkout/checkout');
				}
				
				foreach ($this->cart->getProducts() as $product) {
					if ($product['cart_id'] == $this->request->post['key']) {
						$total = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $this->request->post['quantity'], $this->session->data['currency']);
						$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					}
				}
				
				if (!empty($price)) {
					$json['price'] = $price;
				}
				
				if (!empty($total)) {
					$json['total'] = $total;
				}
				
				if (isset($this->session->data['tk_checkout']['abandoned_cart_id'])) {
					$this->model_extension_module_tk_abandoned_cart->updateAbandonedCartProducts($this->cart->getProducts(), $this->session->data['tk_checkout']['abandoned_cart_id']);
				}
			}
		} else {
			$this->cart->remove($this->request->post['key']);
		}
		
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers']))) {
			$json['redirect'] = $this->url->link('checkout/cart');
		}
		
		if ($this->config->get('module_tk_checkout_min') && $this->config->get('module_tk_checkout_min') > $this->model_extension_module_tk_checkout->getSubTotal() || isset($this->session->data['error_min'])) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		if ($this->config->get('module_tk_checkout_max') && $this->config->get('module_tk_checkout_max') < $this->model_extension_module_tk_checkout->getSubTotal() || isset($this->session->data['error_max'])) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		if ((!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
			$this->session->data['error_stock'] = true;
		} else if (isset($this->session->data['error_stock'])) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
			$this->session->data['error_stock'] = true;
		} else {
			unset($this->session->data['error_stock']);
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//премахва продукт
	public function remove_cart() {
		
		$this->load->language('checkout/cart');
		
		$json = array();
		
		if (isset($this->request->post['key'])) {
			$cart_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "cart` WHERE cart_id = '" . (int)$this->request->post['key'] . "'");
			if ($cart_query->num_rows) {
				unset($this->session->data['pickup'][$cart_query->row['product_id']]);
			}
			$this->cart->remove($this->request->post['key']);
			
			if (isset($this->session->data['tk_checkout']['abandoned_cart_id'])) {
				$this->model_extension_module_tk_abandoned_cart->updateAbandonedCartProducts($this->cart->getProducts(), $this->session->data['tk_checkout']['abandoned_cart_id']);
			}
			
			unset($this->session->data['vouchers'][$this->request->post['key']]);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);
			
			$this->session->data['success'] = $this->language->get('text_remove');
		}
		
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers']))) {
			$json['redirect'] = $this->url->link('checkout/cart');
		}
		
		if ($this->config->get('module_tk_checkout_min') && $this->config->get('module_tk_checkout_min') > $this->model_extension_module_tk_checkout->getSubTotal() || isset($this->session->data['error_min'])) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		if ($this->config->get('module_tk_checkout_max') && $this->config->get('module_tk_checkout_max') < $this->model_extension_module_tk_checkout->getSubTotal() || isset($this->session->data['error_max'])) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		if ((!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
			$this->session->data['error_stock'] = true;
		} else if (isset($this->session->data['error_stock'])) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
			$this->session->data['error_stock'] = true;
		} else {
			unset($this->session->data['error_stock']);
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//записваме всичко попълнено в полетата до момента на стартиране на функцията
	public function add_abandoned_cart($data = false) {
		
		if ($data && is_array($data)) {
			$this->request->post = $data;
		}
		
		if (isset($this->request->post)) {
			
			// tk_special_total
			unset($this->session->data['tk_special_total_user_select']);
			if (!empty($this->request->post['tk_special_total'])) {
				foreach ($this->request->post['tk_special_total'] as $kay => $value) {
					$this->session->data['tk_special_total_user_select'][$kay] = 1;
				}
			}
			// tk_special_total
			
			if (isset($this->request->post['shipping_method'])) {
				$this->session->data['shipping_method']['code'] = $this->request->post['shipping_method'];
			}
			
			if (isset($this->request->post['_shipping_method'])) {
				$this->session->data['shipping_method']['title'] = $this->request->post['_shipping_method'];
			}
			
			if (!empty($this->session->data['shipping_method'])) {
				$this->session->data['tk_checkout']['shipping_method'] = $this->session->data['shipping_method'];
			}
			
			if (isset($this->request->post['payment_method'])) {
				$this->session->data['payment_method']['code'] = $this->request->post['payment_method'];
			}
			
			if (isset($this->request->post['_payment_method'])) {
				$this->session->data['payment_method']['title'] = $this->request->post['_payment_method'];
			}
			
			if (!empty($this->session->data['payment_method'])) {
				$this->session->data['tk_checkout']['payment_method'] = $this->session->data['payment_method'];
			}
			
			if (isset($this->request->post['custom_field']['payment_address_id']) && !empty($this->request->post['custom_field']['payment_address_id'])) {
				$this->session->data['tk_checkout']['payment_address_id'] = $this->request->post['custom_field']['payment_address_id'];
			}
			
			//tk_econt
			if ($this->config->get('shipping_tk_econt_status') && $this->config->get('shipping_tk_econt_status') == 1) {
				$this->model_extension_shipping_tk_econt->saveData();
			}
			
			//tk_speedy
			if ($this->config->get('shipping_tk_speedy_status') && $this->config->get('shipping_tk_speedy_status') == 1) {
				$this->model_extension_shipping_tk_speedy->saveData();
			}
			
			//tk_transpress
			if ($this->config->get('shipping_tk_transpress_status') && $this->config->get('shipping_tk_transpress_status') == 1) {
				$this->model_extension_shipping_tk_transpress->saveData();
			}
			
			//tk_boxnow
			if ($this->config->get('shipping_tk_boxnow_status') && $this->config->get('shipping_tk_boxnow_status') == 1) {
				$this->model_extension_shipping_tk_boxnow->saveData();
			}
			
			//tk_next
			if ($this->config->get('shipping_tk_next_status') && $this->config->get('shipping_tk_next_status') == 1) {
				$this->model_extension_shipping_tk_next->saveData();
			}
			
			//tk_sameday
			if ($this->config->get('shipping_tk_sameday_status') && $this->config->get('shipping_tk_sameday_status') == 1) {
				$this->model_extension_shipping_tk_sameday->saveData();
			}
			
			if (isset($this->request->post['customer_group_id'])) {
				$this->session->data['tk_checkout']['customer_group_id'] = $this->request->post['customer_group_id'];
			}
			
			if (isset($this->request->post['firstname'])) {
				$this->session->data['tk_checkout']['firstname'] = trim($this->request->post['firstname']);
			} else {
				$this->session->data['tk_checkout']['firstname'] = '';
			}
			
			if (isset($this->request->post['lastname'])) {
				$this->session->data['tk_checkout']['lastname'] = trim($this->request->post['lastname']);
			} else {
				$this->session->data['tk_checkout']['lastname'] = '';
			}
			
			if (isset($this->request->post['email'])) {
				$this->request->post['email'] = filter_var($this->request->post['email'], FILTER_SANITIZE_EMAIL);
				$this->session->data['tk_checkout']['email'] = $this->request->post['email'];
			} else {
				$this->session->data['tk_checkout']['email'] = '';
			}
			
			if (isset($this->request->post['telephone'])) {
				$this->session->data['tk_checkout']['telephone'] = filter_var($this->request->post['telephone'], FILTER_SANITIZE_NUMBER_INT);
			} else {
				$this->session->data['tk_checkout']['telephone'] = '';
			}
			
			if (isset($this->request->post['econt_office_select'])) {
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['econt_office_city'] . ', ' . $this->request->post['econt_office_select'];
			} else if (isset($this->request->post['speedy_office_select'])) {
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['speedy_office_city'] . ', ' . $this->request->post['speedy_office_select'];
			} else if (isset($this->request->post['econt_machine_select'])) {
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['econt_machine_city'] . ', ' . $this->request->post['econt_machine_select'];
			} else if (isset($this->request->post['speedy_machine_select'])) {
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['speedy_machine_city'] . ', ' . $this->request->post['speedy_machine_select'];
			} else if (isset($this->request->post['econt_address_city_select'])) {
				
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['econt_address_city_select'];
				
				if (isset($this->request->post['econt_quarter']) && $this->request->post['econt_quarter']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['econt_quarter'];
				}
				
				if (isset($this->request->post['econt_street']) && $this->request->post['econt_street']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['econt_street'];
				}
				
				if (isset($this->request->post['econt_street_num']) && $this->request->post['econt_street_num']) {
					$this->session->data['tk_checkout']['address_1'] .= ' № ' . $this->request->post['econt_street_num'];
				}
				
				if (isset($this->request->post['econt_other']) && $this->request->post['econt_other']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['econt_other'];
				}
			} else if (isset($this->request->post['speedy_address_city_select'])) {
				
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['speedy_address_city_select'];
				
				if (isset($this->request->post['speedy_quarter_select']) && $this->request->post['speedy_quarter_select']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['speedy_quarter_select'];
					if (isset($this->request->post['speedy_block_no']) && $this->request->post['speedy_block_no']) {
						$this->session->data['tk_checkout']['address_1'] .= ', бл.' . $this->request->post['speedy_block_no'];
					}
				}
				
				if (isset($this->request->post['speedy_street_select']) && $this->request->post['speedy_street_select']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['speedy_street_select'];
				}
				
				if (isset($this->request->post['speedy_street_num']) && $this->request->post['speedy_street_num']) {
					$this->session->data['tk_checkout']['address_1'] .= ' № ' . $this->request->post['speedy_street_num'];
				}
				
				if (isset($this->request->post['speedy_other']) && $this->request->post['speedy_other']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['speedy_other'];
				}
			} else if (isset($this->request->post['transpress_address_city_select'])) {
				
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['transpress_address_city_select'];
				
				if (isset($this->request->post['transpress_quarter_select']) && $this->request->post['transpress_quarter_select']) {
					$this->session->data['tk_checkout']['address_1'] .= ',кв. ' . $this->request->post['transpress_quarter_select'];
					if (isset($this->request->post['transpress_block_no']) && $this->request->post['transpress_block_no']) {
						$this->session->data['tk_checkout']['address_1'] .= ', бл.' . $this->request->post['transpress_block_no'];
					}
				}
				
				if (isset($this->request->post['transpress_street_select']) && $this->request->post['transpress_street_select']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['transpress_street_select'];
				}
				
				if (isset($this->request->post['transpress_street_num']) && $this->request->post['transpress_street_num']) {
					$this->session->data['tk_checkout']['address_1'] .= ' № ' . $this->request->post['transpress_street_num'];
				}
				
				if (isset($this->request->post['transpress_other']) && $this->request->post['transpress_other']) {
					$this->session->data['tk_checkout']['address_1'] .= ', ' . $this->request->post['transpress_other'];
				}
			} else if (isset($this->request->post['locker_id'])) {
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['locker_name'] . ', ' . $this->request->post['locker_address'];
			} else if (isset($this->request->post['address_1'])) {
				$this->session->data['tk_checkout']['address_1'] = $this->request->post['address_1'];
			} else {
				$this->session->data['tk_checkout']['address_1'] = '';
			}
			
			if (isset($this->request->post['city'])) {
				$this->session->data['tk_checkout']['city'] = $this->request->post['city'];
			} else {
				$this->session->data['tk_checkout']['city'] = '';
			}
			
			if (isset($this->request->post['zone_id'])) {
				$this->session->data['tk_checkout']['zone_id'] = $this->request->post['zone_id'];
				
				$zone_info = $this->model_localisation_zone->getZone($this->request->post['zone_id']);
				if ($zone_info) {
					$this->session->data['tk_checkout']['zone'] = $zone_info['name'];
				}
			} else {
				$this->session->data['tk_checkout']['zone_id'] = '';
				$this->session->data['tk_checkout']['zone'] = '';
			}
			
			if (isset($this->request->post['country_id'])) {
				$this->session->data['tk_checkout']['country_id'] = $this->request->post['country_id'];
			} else {
				$this->session->data['tk_checkout']['country_id'] = $this->config->get('config_country_id');
			}
			
			$country_info = $this->model_localisation_country->getCountry($this->session->data['tk_checkout']['country_id']);
			if ($country_info) {
				$this->session->data['tk_checkout']['country'] = $country_info['name'];
			} else {
				$this->session->data['tk_checkout']['country'] = '';
			}
			
			if (isset($this->request->post['postcode'])) {
				$this->session->data['tk_checkout']['postcode'] = $this->request->post['postcode'];
			} else {
				$this->session->data['tk_checkout']['postcode'] = '';
			}
			
			if (isset($this->request->post['post_code'])) {
				$this->session->data['tk_checkout']['postcode'] = $this->request->post['post_code'];
			}
			
			if (isset($this->request->post['newsletter'])) {
				$this->session->data['tk_checkout']['newsletter'] = $this->request->post['newsletter'];
			} else {
				$this->session->data['tk_checkout']['newsletter'] = false;
			}
			
			if (isset($this->request->post['base_address_type'])) {
				$this->session->data['tk_checkout']['base_address_type'] = $this->request->post['base_address_type'];
			}
			
			if (isset($this->request->post['comment'])) {
				$this->session->data['tk_checkout']['comment'] = $this->request->post['comment'];
			} else {
				$this->session->data['tk_checkout']['comment'] = '';
			}
			
			if (isset($this->request->post['custom_field']['account']) && !empty($this->request->post['custom_field']['account'])) {
				$this->session->data['tk_checkout']['account_custom_field'] = $this->request->post['custom_field']['account'];
			}
			
			if (isset($this->request->post['custom_field']['address']) && !empty($this->request->post['custom_field']['address'])) {
				$this->session->data['tk_checkout']['address_custom_field'] = $this->request->post['custom_field']['address'];
			}
		}
		
		$this->session->data['guest'] = $this->session->data['tk_checkout'];
		
		//изоставена количка
		$abandoned_cart_query = $this->model_extension_module_tk_abandoned_cart->getAbandonedCart($this->model_extension_module_tk_checkout->getCartId());
		if (isset($abandoned_cart_query['abandoned_cart_id'])) {
			$this->model_extension_module_tk_abandoned_cart->updateAbandonedCart($this->session->data['tk_checkout'], $abandoned_cart_query['abandoned_cart_id']);
		} else {
			if (!isset($this->session->data['abandoned_cart']['abandoned_cart_id']) && $this->cart->hasProducts()) {
				$abandoned_cart_id = $this->model_extension_module_tk_abandoned_cart->addAbandonedCart($this->session->data['tk_checkout'], $this->model_extension_module_tk_checkout->getCartId());
				$this->session->data['tk_checkout']['abandoned_cart_id'] = $abandoned_cart_id;
				$this->model_extension_module_tk_abandoned_cart->addAbandonedCartProducts($this->cart->getProducts(), $abandoned_cart_id);
			}
		}
	}
	
	//валидиране на изпратената поръчка
	public function validate_post() {
		
		$json = array();
		
		if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers']))) {
			$json['redirect'] = $this->url->link('checkout/cart');
		}
		
		if ($this->config->get('module_tk_checkout_min') && $this->config->get('module_tk_checkout_min') > $this->model_extension_module_tk_checkout->getSubTotal()) {
			$json['redirect'] = $this->url->link('checkout/checkout');
		}
		
		if ($this->config->get('module_tk_checkout_max') && $this->config->get('module_tk_checkout_max') < $this->model_extension_module_tk_checkout->getSubTotal()) {
			$json['redirect'] = $this->url->link('checkout/checkout', '', 'SSL');
		}
		
		//запазваме и проверяваме адресите
		if ($this->cart->hasShipping()) {
			
			if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'econt') {
				$econt_data = $this->model_extension_shipping_tk_econt->addEcontData($this->request->post);
				if (isset($econt_data)) {
					$this->session->data['tk_checkout']['econt'] = $econt_data;
					$this->session->data['tk_checkout']['zone'] = isset($econt_data['zone']) ? $econt_data['zone'] : '';
					$this->session->data['tk_checkout']['zone_code'] = isset($econt_data['zone_code']) ? $econt_data['zone_code'] : '';
					$this->session->data['tk_checkout']['zone_id'] = isset($econt_data['zone_id']) ? $econt_data['zone_id'] : '';
					$this->session->data['tk_checkout']['city'] = isset($econt_data['city']) ? $econt_data['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($econt_data['address_1']) ? $econt_data['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($econt_data['postcode']) ? $econt_data['postcode'] : '';
				}
				if (isset($econt_data['error'])) {
					$json['error'] = $econt_data['error'];
				}
			} else if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'speedy') {
				$speedy_data = $this->model_extension_shipping_tk_speedy->addSpeedyData($this->request->post);
				if (isset($speedy_data)) {
					$this->session->data['tk_checkout']['speedy'] = $speedy_data;
					$this->session->data['tk_checkout']['zone'] = isset($speedy_data['zone']) ? $speedy_data['zone'] : '';
					$this->session->data['tk_checkout']['zone_code'] = isset($speedy_data['zone_code']) ? $speedy_data['zone_code'] : '';
					$this->session->data['tk_checkout']['zone_id'] = isset($speedy_data['zone_id']) ? $speedy_data['zone_id'] : '';
					$this->session->data['tk_checkout']['city'] = isset($speedy_data['city']) ? $speedy_data['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($speedy_data['address_1']) ? $speedy_data['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($speedy_data['postcode']) ? $speedy_data['postcode'] : '';
				}
				if (isset($speedy_data['error'])) {
					$json['error'] = $speedy_data['error'];
				}
			} else if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'transpress') {
				$transpress_data = $this->model_extension_shipping_tk_transpress->addTranspressData($this->request->post);
				if (isset($transpress_data)) {
					$this->session->data['tk_checkout']['transpress'] = $transpress_data;
					$this->session->data['tk_checkout']['zone'] = isset($transpress_data['zone']) ? $transpress_data['zone'] : '';
					$this->session->data['tk_checkout']['zone_code'] = isset($transpress_data['zone_code']) ? $transpress_data['zone_code'] : '';
					$this->session->data['tk_checkout']['zone_id'] = isset($transpress_data['zone_id']) ? $transpress_data['zone_id'] : '';
					$this->session->data['tk_checkout']['city'] = isset($transpress_data['city']) ? $transpress_data['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($transpress_data['address_1']) ? $transpress_data['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($transpress_data['postcode']) ? $transpress_data['postcode'] : '';
				}
				if (isset($transpress_data['error'])) {
					$json['error'] = $transpress_data['error'];
				}
			} else if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'boxnow') {
				$boxnow_data = $this->model_extension_shipping_tk_boxnow->addBoxNowData($this->request->post);
				if (isset($boxnow_data)) {
					$this->session->data['tk_checkout']['boxnow'] = $boxnow_data;
					$this->session->data['tk_checkout']['zone'] = isset($boxnow_data['zone']) ? $boxnow_data['zone'] : '';
					$this->session->data['tk_checkout']['zone_code'] = isset($boxnow_data['zone_code']) ? $boxnow_data['zone_code'] : '';
					$this->session->data['tk_checkout']['zone_id'] = isset($boxnow_data['zone_id']) ? $boxnow_data['zone_id'] : '';
					$this->session->data['tk_checkout']['city'] = isset($boxnow_data['city']) ? $boxnow_data['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($boxnow_data['address_1']) ? $boxnow_data['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($boxnow_data['postcode']) ? $boxnow_data['postcode'] : '';
				}
				if (isset($boxnow_data['error'])) {
					$json['error'] = $boxnow_data['error'];
				}
			} else if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'next') {
				$next_data = $this->model_extension_shipping_tk_next->addNextData($this->request->post);
				if (isset($next_data)) {
					$this->session->data['tk_checkout']['next'] = $next_data;
					$this->session->data['tk_checkout']['zone'] = isset($next_data['zone']) ? $next_data['zone'] : '';
					$this->session->data['tk_checkout']['zone_code'] = isset($next_data['zone_code']) ? $next_data['zone_code'] : '';
					$this->session->data['tk_checkout']['zone_id'] = isset($next_data['zone_id']) ? $next_data['zone_id'] : '';
					$this->session->data['tk_checkout']['city'] = isset($next_data['city']) ? $next_data['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($next_data['address_1']) ? $next_data['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($next_data['postcode']) ? $next_data['postcode'] : '';
				}
				if (isset($next_data['error'])) {
					$json['error'] = $next_data['error'];
				}
			} else if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'sameday') {
				$sameday_data = $this->model_extension_shipping_tk_sameday->addSamedayData($this->request->post);
				
				if (isset($sameday_data)) {
					$this->session->data['tk_checkout']['sameday'] = $sameday_data;
					$this->session->data['tk_checkout']['zone'] = isset($sameday_data['zone']) ? $sameday_data['zone'] : '';
					$this->session->data['tk_checkout']['zone_code'] = isset($sameday_data['zone_code']) ? $sameday_data['zone_code'] : '';
					$this->session->data['tk_checkout']['zone_id'] = isset($sameday_data['zone_id']) ? $sameday_data['zone_id'] : '';
					$this->session->data['tk_checkout']['city'] = isset($sameday_data['city']) ? $sameday_data['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($sameday_data['address_1']) ? $sameday_data['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($sameday_data['postcode']) ? $sameday_data['postcode'] : '';
				}
				if (isset($sameday_data['error'])) {
					$json['error'] = $sameday_data['error'];
				}
			} else if (isset($this->request->post['shipping_type']) && $this->request->post['shipping_type'] == 'pickup') {
				if (isset($this->request->post['zone_id']) && $this->request->post['zone_id'] > 0) {
					$this->session->data['tk_checkout']['zone_id'] = $this->request->post['zone_id'];
					$zone_info = $this->model_localisation_zone->getZone($this->request->post['zone_id']);
					if ($zone_info) {
						$this->session->data['tk_checkout']['zone'] = $zone_info['name'];
						$this->session->data['tk_checkout']['zone_code'] = $zone_info['code'];
					} else {
						$this->session->data['tk_checkout']['zone'] = '';
						$this->session->data['tk_checkout']['zone_code'] = '';
					}
				}
				$this->session->data['tk_checkout']['city'] = isset($this->request->post['city']) ? $this->request->post['city'] : '';
				$this->session->data['tk_checkout']['address_1'] = isset($this->request->post['address_1']) ? $this->request->post['address_1'] : '';
				$this->session->data['tk_checkout']['postcode'] = isset($this->request->post['postcode']) ? $this->request->post['postcode'] : '';
			} else {
				if (isset($this->request->post['payment_address_id']) && $this->request->post['payment_address_id'] > 0 && isset($this->request->post['base_address_type']) && $this->request->post['base_address_type'] == 'existing') {
					//съществуващ адрес
					$customer_info = $this->model_account_customer->getCustomer($this->session->data['customer_id']);
					$this->session->data['tk_checkout']['account_custom_field'] = json_decode($customer_info['custom_field'], true);
					$this->session->data['tk_checkout']['base_address_type'] = 'existing';
					$this->session->data['tk_checkout']['payment_address_id'] = $this->request->post['payment_address_id'];
					
					$address = $this->model_account_address->getAddress($this->request->post['payment_address_id']);
					$this->session->data['tk_checkout']['address_custom_field'] = $address['custom_field'];
					$this->session->data['tk_checkout']['country_id'] = $address['country_id'];
					$this->session->data['tk_checkout']['country'] = $address['country'];
					$this->session->data['tk_checkout']['zone_id'] = $address['zone_id'];
					$this->session->data['tk_checkout']['zone'] = $address['zone'];
					$this->session->data['tk_checkout']['zone_code'] = $address['zone_code'];
					$this->session->data['tk_checkout']['address_1'] = $address['address_1'];
					$this->session->data['tk_checkout']['city'] = $address['city'];
					
					if (!isset($this->request->post['country_id']) || $this->request->post['country_id'] < 1) {
						$json['error']['country_id'] = $this->language->get('error_country_id');
					}
					
					if (!isset($this->request->post['zone_id']) || $this->request->post['zone_id'] == 0) {
						$json['error']['zone_id'] = $this->language->get('error_zone_id');
					}
					
					if (isset($this->request->post['country_id']) && $this->request->post['country_id'] != $address['country_id']) {
						$json['error']['country_id'] = $this->language->get('error_country_id');
					}
				} else {
					//нов адрес адрес
					if (!isset($this->request->post['country_id']) || $this->request->post['country_id'] < 1) {
						$json['error']['country_id'] = $this->language->get('error_country_id');
					}
					
					if (!isset($this->request->post['zone_id']) || $this->request->post['zone_id'] == 0) {
						$json['error']['zone_id'] = $this->language->get('error_zone_id');
					}
					
					if (isset($this->request->post['city']) && ((utf8_strlen(trim($this->request->post['city'])) < 1) || (utf8_strlen(trim($this->request->post['city'])) > 52))) {
						$json['error']['city'] = $this->language->get('error_city');
					}
					
					if (isset($this->request->post['address_1']) && ((utf8_strlen(trim($this->request->post['address_1'])) < 1) || (utf8_strlen(trim($this->request->post['address_1'])) > 252))) {
						$json['error']['address_1'] = $this->language->get('error_address_1');
					}
					
					if (isset($this->request->post['country_id'])) {
						$country_info = $this->model_localisation_country->getCountry($this->request->post['country_id']);
						if ($country_info && $country_info['postcode_required'] && (utf8_strlen(trim($this->request->post['postcode'])) < 2 || utf8_strlen(trim($this->request->post['postcode'])) > 10)) {
							$json['error']['postcode'] = $this->language->get('error_postcode');
						}
					}
					
					$this->session->data['tk_checkout']['base_address_type'] = 'new';
					
					if (isset($this->request->post['zone_id']) && $this->request->post['zone_id'] > 0) {
						$this->session->data['tk_checkout']['zone_id'] = $this->request->post['zone_id'];
						$zone_info = $this->model_localisation_zone->getZone($this->request->post['zone_id']);
						if ($zone_info) {
							$this->session->data['tk_checkout']['zone'] = $zone_info['name'];
							$this->session->data['tk_checkout']['zone_code'] = $zone_info['code'];
						} else {
							$this->session->data['tk_checkout']['zone'] = '';
							$this->session->data['tk_checkout']['zone_code'] = '';
						}
					}
					
					$this->session->data['tk_checkout']['city'] = isset($this->request->post['city']) ? $this->request->post['city'] : '';
					$this->session->data['tk_checkout']['address_1'] = isset($this->request->post['address_1']) ? $this->request->post['address_1'] : '';
					$this->session->data['tk_checkout']['postcode'] = isset($this->request->post['postcode']) ? $this->request->post['postcode'] : '';
				}
			}
		}
		
		$this->session->data['tk_checkout']['comment'] = isset($this->request->post['comment']) ? $this->request->post['comment'] : '';
		$this->session->data['tk_checkout']['shipping_to'] = isset($this->request->post['shipping_to']) ? $this->request->post['shipping_to'] : '';
		
		//проверка на потребителски данни
		if (isset($this->request->post['firstname']) && ((utf8_strlen(trim($this->request->post['firstname'])) < 1) || (utf8_strlen(trim($this->request->post['firstname'])) > 32))) {
			$json['error']['firstname'] = $this->language->get('error_firstname');
		}
		
		if (isset($this->request->post['lastname']) && ((utf8_strlen(trim($this->request->post['lastname'])) < 1) || (utf8_strlen(trim($this->request->post['lastname'])) > 32))) {
			$json['error']['lastname'] = $this->language->get('error_lastname');
		}
		
		if (isset($this->request->post['email'])) {
			$this->request->post['email'] = str_replace(" ", "", $this->request->post['email']);
		}
		if (!$this->config->get('module_tk_checkout_required_email') || $this->config->get('module_tk_checkout_required_email') == 0) {
			if (isset($this->request->post['email']) && !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
				$json['error']['email'] = $this->language->get('error_email');
			}
		} else if ($this->config->get('module_tk_checkout_required_email') == 1) {
			if (isset($this->request->post['email']) && utf8_strlen($this->request->post['email']) > 0 && !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
				$json['error']['email'] = $this->language->get('error_email');
			}
		}
		
		if (!$this->config->get('module_tk_checkout_required_phone') || $this->config->get('module_tk_checkout_required_phone') == 0) {
			if (!isset($this->request->post['telephone']) || !$this->request->post['telephone'] || utf8_strlen($this->request->post['telephone']) < 6 || utf8_strlen($this->request->post['telephone']) > 16 || preg_match("/[a-z]/i", $this->request->post['telephone']) || preg_match("/\p{Cyrillic}/u", $this->request->post['telephone'])) {
				$json['error']['telephone'] = $this->language->get('error_telephone');
			}
		} else if ($this->config->get('module_tk_checkout_required_phone') == 2) {
			$this->request->post['telephone'] = str_replace(" ", "", $this->request->post['telephone']);
			if (!isset($this->request->post['telephone']) || !$this->request->post['telephone'] || utf8_strlen($this->request->post['telephone']) != 10 || preg_match("/[a-z]/i", $this->request->post['telephone']) || preg_match("/\p{Cyrillic}/u", $this->request->post['telephone'])) {
				$json['error']['telephone'] = $this->language->get('error_telephone');
			}
		}
		
		if (isset($this->request->post['customer_group_id'])) {
			$custom_fields = $this->model_account_custom_field->getCustomFields($this->request->post['customer_group_id']);
			foreach ($custom_fields as $custom_field) {
				if ($custom_field['required'] && empty($this->request->post['custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
					$json['error']['custom_field[' . $custom_field['location'] . '][' . $custom_field['custom_field_id'] . ']'] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
				}
			}
		}
		
		//проверка на потребителски данни при регистрация
		if (!isset($this->request->post['register_select']) && isset($this->request->post['register']) && !empty($this->request->post['register']) && !empty($this->request->post['password'])) {
			if ((utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 20)) {
				$json['error']['password'] = $this->language->get('error_password');
			}
			
			if (isset($this->request->post['confirm']) && ($this->request->post['confirm'] != $this->request->post['password'])) {
				$json['error']['confirm'] = $this->language->get('error_confirm');
			}
			
			if ((isset($this->request->post['email']) && !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) || !isset($this->request->post['email'])) {
				$json['error']['email'] = $this->language->get('error_email');
			}
			
			if (isset($this->request->post['email']) && ($this->model_account_customer->getTotalCustomersByEmail($this->request->post['email']))) {
				$json['error']['email'] = $this->language->get('error_exists');
			}
		}
		
		//проверка метода на доставка
		if (!isset($this->request->post['shipping_method']) && $this->cart->hasShipping()) {
			$json['error']['shipping_method_error'] = $this->language->get('error_shipping');
		}
		if (isset($this->request->post['shipping_method']) && $this->cart->hasShipping()) {
			$shipping = explode('.', $this->request->post['shipping_method']);
			if (!isset($shipping[0]) || !isset($shipping[1]) || !isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
				$json['error']['shipping_method_error'] = $this->language->get('error_shipping');
			}
		}
		
		//проверка метода на плащане
		if (!isset($this->request->post['payment_method'])) {
			$json['error']['payment_method_error'] = $this->language->get('error_payment');
		}
		
		//проверка на съгласие
		if (($this->config->get('module_tk_checkout_agree') && !isset($this->request->post['agree'])) || ($this->config->get('module_tk_checkout_agree_2') && !isset($this->request->post['agree_2']))) {
			$json['error']['warning'] = $this->language->get('error_agree');
		}
		
		//проверка за налични продукти
		if ((!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
			$json['error']['warning'] = $this->language->get('error_stock');;
		}
		
		if (isset($json['error'])) {
			$json['error']['text_error'] = $this->language->get('text_error');
		}
		
		//запзваме метода на плащане
		if (isset($this->request->post['payment_method']) && isset($this->request->post['_payment_method'])) {
			$this->session->data['payment_method']['code'] = $this->request->post['payment_method'];
			$this->session->data['payment_method']['title'] = $this->request->post['_payment_method'];
		} else {
			$this->session->data['payment_method']['code'] = 'cod';
			$this->session->data['payment_method']['title'] = 'В брой';
		}
		$this->session->data['tk_checkout']['payment_method'] = $this->session->data['payment_method'];
		
		//запзваме метода на доставка
		if (isset($this->request->post['shipping_method']) && isset($this->request->post['_shipping_method'])) {
			$this->session->data['shipping_method']['code'] = $this->request->post['shipping_method'];
			$this->session->data['shipping_method']['title'] = $this->request->post['_shipping_method'];
		} else {
			$this->session->data['shipping_method']['code'] = '';
			$this->session->data['shipping_method']['title'] = '';
		}
		$this->session->data['tk_checkout']['shipping_method'] = $this->session->data['shipping_method'];
		
		//запазваме потребителски данни
		$this->session->data['account'] = $this->customer->isLogged() ? 'register' : 'guest';
		
		$this->session->data['tk_checkout']['firstname'] = isset($this->request->post['firstname']) ? trim($this->request->post['firstname']) : '';
		$this->session->data['tk_checkout']['lastname'] = isset($this->request->post['lastname']) ? trim($this->request->post['lastname']) : '';
		
		if (isset($this->request->post['email'])) {
			$this->request->post['email'] = str_replace(" ", "", $this->request->post['email']);
			$this->request->post['email'] = filter_var($this->request->post['email'], FILTER_SANITIZE_EMAIL);
		}
		if (!isset($this->request->post['email']) || !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->session->data['tk_checkout']['email'] = '';
		} else {
			$this->session->data['tk_checkout']['email'] = $this->request->post['email'];
		}
		
		$this->session->data['tk_checkout']['telephone'] = isset($this->request->post['telephone']) ? filter_var($this->request->post['telephone'], FILTER_SANITIZE_NUMBER_INT) : '';
		
		if (isset($this->request->post['country_id'])) {
			$country_info = $this->model_localisation_country->getCountry($this->request->post['country_id']);
			if ($country_info) {
				$this->session->data['tk_checkout']['country_id'] = $this->request->post['country_id'];
				$this->session->data['tk_checkout']['country'] = $country_info['name'];
			}
		}
		
		if (isset($this->request->post['custom_field']['account'])) {
			$this->session->data['account_custom_field'] = $this->request->post['custom_field']['account'];
			$this->session->data['tk_checkout']['account_custom_field'] = $this->request->post['custom_field']['account'];
		} else {
			$this->session->data['account_custom_field'] = array();
			$this->session->data['tk_checkout']['account_custom_field'] = array();
		}
		
		if (isset($this->request->post['custom_field']['address'])) {
			$this->session->data['address_custom_field'] = $this->request->post['custom_field']['address'];
			$this->session->data['tk_checkout']['address_custom_field'] = $this->request->post['custom_field']['address'];
		} else {
			$this->session->data['address_custom_field'] = array();
			$this->session->data['tk_checkout']['address_custom_field'] = array();
		}
		
		if (isset($this->request->post['customer_group_id'])) {
			$this->session->data['tk_checkout']['customer_group_id'] = $this->request->post['customer_group_id'];
		} else {
			$this->session->data['tk_checkout']['customer_group_id'] = $this->config->get('config_customer_group_id');
		}
		
		if (isset($this->request->post['newsletter'])) {
			$this->session->data['tk_checkout']['newsletter'] = $this->request->post['newsletter'];
		}
		
		//добавяме данните към сесията за гости стандартна на опенкарт
		$this->session->data['guest'] = $this->session->data['tk_checkout'];
		
		$this->session->data['tk_checkout']['totals'] = $this->model_extension_module_tk_checkout->getTotals();
		
		//ако нямам грешки в проверките пращаме поръчката
		if ((!isset($json['error']) || !$json['error']) && (!isset($json['redirect']) || !$json['redirect'])) {
			$this->model_extension_module_tk_checkout->addOrder($this->session->data['tk_checkout']);
			$json['confirm'] = true;
			$this->session->data['tk_checkout']['confirm'] = true;
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	//след преминал чек на платежния метод добавяме статус на поръчката
	public function confirm() {
		
		$json = array();
		if (!empty($this->session->data['order_id'])) {
			unset($this->session->data['agree']);
			unset($this->session->data['agree_2']);
			$this->cart->clearCart();
			$json['redirect'] = $this->url->link('checkout/success');
		}
		$this->response->setOutput(json_encode($json));
	}
	
	//създава линк за вход с фйесбук
	public function fblogin() {
		
		if ($this->config->get('module_tk_checkout_fbq_app_id') && $this->config->get('module_tk_checkout_fbq_app_secret')) {
			
			require_once DIR_SYSTEM . 'library/tkfacebook/autoload.php';
			$fb = new Facebook\Facebook([
				'app_id'                => $this->config->get('module_tk_checkout_fbq_app_id'),
				'app_secret'            => $this->config->get('module_tk_checkout_fbq_app_secret'),
				'default_graph_version' => 'v5.0',
			]);
			
			$helper = $fb->getRedirectLoginHelper();
			
			if (isset($_GET['state'])) {
				$helper->getPersistentDataHandler()->set('state', $_GET['state']);
			}
			
			try {
				$accessToken = $helper->getAccessToken();
			} catch (Facebook\Exceptions\FacebookResponseException $e) {
				return;
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
				return;
			}
			
			if (!isset($accessToken)) {
				return;
			}
			
			try {
				$response = $fb->get('/me?fields=id,first_name,last_name,email', $accessToken);
			} catch (Facebook\Exceptions\FacebookResponseException $e) {
				return;
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
				return;
			}
			
			$fbUser = $response->getGraphUser();
			if ($fbUser) {
				$customer_info = $this->model_account_customer->getCustomerByEmail($fbUser->getEmail());
				if (!empty($customer_info) && $this->customer->isLogged()) {
					if (isset($this->request->get['link']) && $this->request->get['link'] == 'checkout') {
						$this->response->redirect($this->url->link('checkout/checkout'));
					} else {
						$this->response->redirect($this->url->link('account/account'));
					}
				} else {
					$data['email'] = $fbUser->getEmail();
					$data['firstname'] = $fbUser->getFirstName();
					$data['lastname'] = $fbUser->getLastName();
					$data['telephone'] = '';
					$data['fax'] = '';
					$data['password'] = '';
					$data['company'] = '';
					$data['address_1'] = '';
					$data['address_2'] = '';
					$data['city'] = '';
					$data['postcode'] = '';
					$data['country_id'] = '';
					$data['zone_id'] = '';
					
					$customer_id = $this->model_account_customer->addCustomer($data);
					
					if ($customer_id && $this->customer->login($data['email'], '', true)) {
						if ($this->config->get('config_tax_customer') == 'payment') {
							$this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
						}
						if ($this->config->get('config_tax_customer') == 'shipping') {
							$this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
						}
					}
					
					if ($this->customer->isLogged()) {
						if (isset($this->request->get['link']) && $this->request->get['link'] == 'checkout') {
							$this->response->redirect($this->url->link('checkout/checkout'));
						} else {
							$this->response->redirect($this->url->link('account/account'));
						}
					}
				}
			}
			die;
		}
	}
}