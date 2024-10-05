<?php

class ModelExtensionModuleTkCheckout extends Model {
	
	// полета със стандартни за опенкарт адреси
	public function getAddress() {
		
		$this->load->language('tk_checkout/checkout');
		
		$data['customer_id'] = isset($this->session->data['customer_id']) ? $this->session->data['customer_id'] : '';
		$data['text_address'] = $this->language->get('text_address');
		$data['error_address'] = '';
		$data['text_none'] = $this->language->get('text_none');
		$data['entry_address_1'] = $this->language->get('entry_address_1');
		$data['entry_address_2'] = $this->language->get('entry_address_2');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['entry_shipping'] = $this->language->get('entry_shipping');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$data['addresses'] = array();
		if ($this->customer->isLogged()) {
			$addresses = $this->model_account_address->getAddresses();
			foreach ($addresses as $address) {
				if (isset($this->session->data['tk_checkout']['country_id']) && isset($address['country_id']) && $address['country_id'] == $this->session->data['tk_checkout']['country_id']) {
					$data['addresses'][] = $address;
				}
			}
			
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
				} else if ($this->config->get('config_zone_id')) {
					$data['zone_id'] = $this->config->get('config_zone_id');
				} else {
					$data['zone_id'] = 1;
				}
			}
			
			if (isset($this->session->data['tk_checkout']['payment_address_id'])) {
				$data['payment_address_id'] = $this->session->data['tk_checkout']['payment_address_id'];
			} else {
				$data['payment_address_id'] = $this->customer->getAddressId();
			}
			
			$data['shipping_address_id'] = $this->customer->getAddressId();
		} else {
			$data['shipping_address_id'] = isset($this->session->data['tk_checkout']['shipping_address_id']) ? $this->session->data['tk_checkout']['shipping_address_id'] : '';
			$data['payment_address_id'] = isset($this->session->data['tk_checkout']['payment_address_id']) ? $this->session->data['tk_checkout']['payment_address_id'] : '';
			
			if (isset($this->session->data['tk_checkout']['country_id']) && $this->session->data['tk_checkout']['country_id'] > 0) {
				$data['country_id'] = $this->session->data['tk_checkout']['country_id'];
			} else {
				$data['country_id'] = $this->config->get('config_country_id');
			}
			
			if (isset($this->session->data['tk_checkout']['zone_id']) && $this->session->data['tk_checkout']['zone_id'] > 0) {
				$data['zone_id'] = $this->session->data['tk_checkout']['zone_id'];
			} else if ($this->config->get('config_zone_id')) {
				$data['zone_id'] = $this->config->get('config_zone_id');
			} else {
				$data['zone_id'] = 0;
			}
		}
		
		if ($data['country_id']) {
			$this->load->model('localisation/zone');
			$data['zone'] = $this->model_localisation_zone->getZonesByCountryId($data['country_id']);
		} else {
			$data['zone'] = array();
		}
		
		$this->load->model('localisation/country');
		$country_info = $this->model_localisation_country->getCountry($data['country_id']);
		
		if ($country_info && $country_info['postcode_required']) {
			$data['postcode_required'] = 1;
		} else {
			$data['postcode_required'] = 0;
		}
		
		$data['postcode'] = isset($this->session->data['tk_checkout']['postcode']) ? $this->session->data['tk_checkout']['postcode'] : '';
		$data['city'] = isset($this->session->data['tk_checkout']['city']) ? $this->session->data['tk_checkout']['city'] : '';
		$data['address_1'] = isset($this->session->data['tk_checkout']['address_1']) ? $this->session->data['tk_checkout']['address_1'] : '';
		$data['base_address_type'] = isset($this->session->data['tk_checkout']['base_address_type']) ? $this->session->data['tk_checkout']['base_address_type'] : '';
		
		$this->response->setOutput($this->load->view('tk_checkout/address', $data));
	}
	
	// скриване на полетата с адреси при метод за плащане вземане от място
	public function getAddressPickup() {
		
		$this->load->language('tk_checkout/checkout');
		
		$data['lang'] = $this->session->data['language'];
		$data['zone_id'] = $this->config->get('config_zone_id');
		$this->load->model('localisation/zone');
		$zone = $this->model_localisation_zone->getZone($data['zone_id']);
		$data['zone'] = $zone['name'];
		$data['city'] = $zone['name'];
		$data['address_1'] = $this->config->get('config_address');
		$data['text_pickup'] = $this->language->get('text_pickup');
		
		$data['addresses'] = array();
		$locations = $this->getLocations();
		if ($locations) {
			foreach ($locations as $location) {
				$data['addresses'][] = array(
					'name'    => $location['name'],
					'address' => $location['address']
				);
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/pickup', $data));
	}
	
	// изпращаме поръчката към базата данни
	public function addOrder($data = array()) {
		
		$order_data = array();
		
		//запзваме тотал
		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;
		$total_data = array(
			'totals' => &$totals,
			'taxes'  => &$taxes,
			'total'  => &$total
		);
		$sort_order = array();
		$this->load->model('setting/extension');
		$results = $this->model_setting_extension->getExtensions('total');
		foreach ($results as $key => $value) {
			$sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
		}
		array_multisort($sort_order, SORT_ASC, $results);
		foreach ($results as $result) {
			if ($this->config->get('total_' . $result['code'] . '_status')) {
				$this->load->model('extension/total/' . $result['code']);
				$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
			}
		}
		$sort_order = array();
		foreach ($totals as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}
		array_multisort($sort_order, SORT_ASC, $totals);
		$order_data['totals'] = $totals;
		$order_data['total'] = $total;
		
		$order_data['sub_total'] = $this->cart->getSubTotal();
		$order_data['weight'] = $this->cart->getWeight();
		$order_data['clean_total'] = number_format($this->cart->getTotal(), 2, '.', '');
		$order_data['invoice_prefix'] = $this->config->get('config_invoice_prefix');
		$order_data['store_id'] = $this->config->get('config_store_id');
		$order_data['store_name'] = $this->config->get('config_name');
		
		if ($order_data['store_id']) {
			$order_data['store_url'] = $this->config->get('config_url');
		} else {
			$order_data['store_url'] = HTTP_SERVER;
		}
		
		$order_data['customer_group_id'] = isset($data['customer_group_id']) ? $data['customer_group_id'] : $this->config->get('config_customer_group_id');
		
		$order_data['firstname'] = isset($data['firstname']) ? $data['firstname'] : '';
		$order_data['lastname'] = isset($data['lastname']) ? $data['lastname'] : '';
		
		$data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
		if (!isset($data['email']) || !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
			if ($this->config->get('module_tk_checkout_customer_mail')) {
				$order_data['email'] = $this->config->get('module_tk_checkout_customer_mail');
			} else {
				$order_data['email'] = $this->config->get('config_email');
			}
		} else {
			$order_data['email'] = $data['email'];
		}
		
		$order_data['telephone'] = isset($data['telephone']) ? filter_var($data['telephone'], FILTER_SANITIZE_NUMBER_INT) : '';
		$order_data['fax'] = isset($data['fax']) ? $data['fax'] : '';
		$order_data['company'] = isset($data['company']) ? $data['company'] : '';
		$order_data['company_id'] = isset($data['company_id']) ? $data['company_id'] : '';
		$order_data['address_1'] = isset($data['address_1']) ? $data['address_1'] : '';
		$order_data['address_2'] = isset($data['address_2']) ? $data['address_2'] : '';
		$order_data['city'] = isset($data['city']) ? $data['city'] : '';
		$order_data['postcode'] = isset($data['postcode']) ? $data['postcode'] : '';
		$order_data['tax_id'] = isset($data['tax_id']) ? $data['tax_id'] : '';
		$order_data['zone'] = isset($data['zone']) ? $data['zone'] : '';
		$order_data['zone_id'] = isset($data['zone_id']) ? $data['zone_id'] : '';
		$order_data['country'] = isset($data['country']) ? $data['country'] : '';
		$order_data['country_id'] = isset($data['country_id']) ? $data['country_id'] : '';
		$order_data['address_format'] = isset($data['address_format']) ? $data['address_format'] : '';
		$order_data['custom_field'] = isset($data['account_custom_field']) ? $data['account_custom_field'] : '';
		
		$order_data['payment_firstname'] = $order_data['firstname'];
		$order_data['payment_lastname'] = $order_data['lastname'];
		$order_data['payment_company'] = $order_data['company'];
		$order_data['payment_company_id'] = $order_data['company_id'];
		$order_data['payment_tax_id'] = $order_data['tax_id'];
		$order_data['payment_address_1'] = $order_data['address_1'];
		$order_data['payment_address_2'] = $order_data['address_2'];
		$order_data['payment_city'] = $order_data['city'];
		$order_data['payment_postcode'] = $order_data['postcode'];
		$order_data['payment_zone'] = $order_data['zone'];
		$order_data['payment_zone_id'] = $order_data['zone_id'];
		$order_data['payment_country'] = $order_data['country'];
		$order_data['payment_country_id'] = $order_data['country_id'];
		$order_data['payment_address_format'] = $order_data['address_format'];
		$order_data['payment_custom_field'] = isset($data['address_custom_field']) ? $data['address_custom_field'] : '';
		
		if (isset($this->session->data['payment_method']['title'])) {
			$order_data['payment_method'] = preg_replace("/<img[^>]+>/i", "", $this->session->data['payment_method']['title']);
			$order_data['payment_method'] = preg_replace("/&lt;img[^>]+&gt;/i", "", $order_data['payment_method']);
			$order_data['payment_method'] = strip_tags($order_data['payment_method']);
		} else {
			$order_data['payment_method'] = 'Плащане при доставка';
		}
		
		if (isset($this->session->data['payment_method']['code'])) {
			$order_data['payment_code'] = $this->session->data['payment_method']['code'];
		} else {
			$order_data['payment_code'] = 'cod';
		}
		
		$order_data['shipping_firstname'] = $order_data['firstname'];
		$order_data['shipping_lastname'] = $order_data['lastname'];
		$order_data['shipping_company'] = $order_data['company'];
		$order_data['shipping_company_id'] = $order_data['company_id'];
		$order_data['shipping_tax_id'] = $order_data['tax_id'];
		$order_data['shipping_address_1'] = $order_data['address_1'];
		$order_data['shipping_address_2'] = $order_data['address_2'];
		$order_data['shipping_city'] = $order_data['city'];
		$order_data['shipping_postcode'] = $order_data['postcode'];
		$order_data['shipping_zone'] = $order_data['zone'];
		$order_data['shipping_zone_id'] = $order_data['zone_id'];
		$order_data['shipping_country'] = $order_data['country'];
		$order_data['shipping_country_id'] = $order_data['country_id'];
		$order_data['shipping_address_format'] = $order_data['address_format'];
		$order_data['shipping_custom_field'] = isset($data['address_custom_field']) ? $data['address_custom_field'] : '';
		
		if (isset($this->session->data['shipping_method']['title'])) {
			$order_data['shipping_method'] = $this->session->data['shipping_method']['title'];
			$order_data['shipping_method'] = strip_tags($order_data['shipping_method']);
		} else {
			$order_data['shipping_method'] = '';
		}
		
		if (isset($this->session->data['shipping_method']['code'])) {
			$order_data['shipping_code'] = $this->session->data['shipping_method']['code'];
		} else {
			$order_data['shipping_code'] = '';
		}
		
		$order_data['products'] = array();
		$products = $this->cart->getProducts();
		foreach ($products as $product) {
			$option_data = array();
			foreach ($product['option'] as $option) {
				$option_data[] = array(
					'product_option_id'       => $option['product_option_id'],
					'product_option_value_id' => $option['product_option_value_id'],
					'option_id'               => $option['option_id'],
					'option_value_id'         => $option['option_value_id'],
					'name'                    => $option['name'],
					'value'                   => $option['value'],
					'type'                    => $option['type']
				);
			}
			
			$order_data['products'][] = array(
				'product_id' => $product['product_id'],
				'name'       => $product['name'],
				'model'      => $product['model'],
				'option'     => $option_data,
				'download'   => $product['download'],
				'quantity'   => $product['quantity'],
				'subtract'   => $product['subtract'],
				'price'      => $product['price'],
				'total'      => $product['total'],
				'tax'        => $this->tax->getTax($product['price'], $product['tax_class_id']),
				'reward'     => $product['reward']
			);
		}
		
		// Gift Voucher
		$order_data['vouchers'] = array();
		if (!empty($this->session->data['vouchers'])) {
			foreach ($this->session->data['vouchers'] as $voucher) {
				$order_data['vouchers'][] = array(
					'description'      => $voucher['description'],
					'code'             => token(10),
					'to_name'          => $voucher['to_name'],
					'to_email'         => $voucher['to_email'],
					'from_name'        => $voucher['from_name'],
					'from_email'       => $voucher['from_email'],
					'voucher_theme_id' => $voucher['voucher_theme_id'],
					'message'          => $voucher['message'],
					'amount'           => $voucher['amount']
				);
			}
		}
		
		$order_data['comment'] = isset($data['comment']) ? $data['comment'] : '';
		
		if (isset($this->request->cookie['tracking'])) {
			$order_data['tracking'] = $this->request->cookie['tracking'];
			$subtotal = $this->cart->getSubTotal();
			
			// Affiliate
			$affiliate_info = $this->model_account_customer->getAffiliateByTracking($this->request->cookie['tracking']);
			
			if ($affiliate_info) {
				$order_data['affiliate_id'] = $affiliate_info['customer_id'];
				$order_data['commission'] = ($subtotal / 100) * $affiliate_info['commission'];
			} else {
				$order_data['affiliate_id'] = 0;
				$order_data['commission'] = 0;
			}
			
			// Marketing
			$this->load->model('checkout/marketing');
			$marketing_info = $this->model_checkout_marketing->getMarketingByCode($this->request->cookie['tracking']);
			if ($marketing_info) {
				$order_data['marketing_id'] = $marketing_info['marketing_id'];
			} else {
				$order_data['marketing_id'] = 0;
			}
		} else {
			$order_data['affiliate_id'] = 0;
			$order_data['commission'] = 0;
			$order_data['marketing_id'] = 0;
			$order_data['tracking'] = '';
		}
		
		$order_data['language_id'] = $this->config->get('config_language_id');
		$order_data['currency_id'] = $this->currency->getId($this->session->data['currency']);
		$order_data['currency_code'] = $this->session->data['currency'];
		$order_data['currency_value'] = $this->currency->getValue($this->session->data['currency']);
		$order_data['ip'] = $this->request->server['REMOTE_ADDR'];
		
		if (!empty($this->request->server['HTTP_X_FORWARDED_FOR'])) {
			$order_data['forwarded_ip'] = $this->request->server['HTTP_X_FORWARDED_FOR'];
		} else if (!empty($this->request->server['HTTP_CLIENT_IP'])) {
			$order_data['forwarded_ip'] = $this->request->server['HTTP_CLIENT_IP'];
		} else {
			$order_data['forwarded_ip'] = '';
		}
		
		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$order_data['user_agent'] = $this->request->server['HTTP_USER_AGENT'];
		} else {
			$order_data['user_agent'] = '';
		}
		
		if (isset($this->request->server['HTTP_ACCEPT_LANGUAGE'])) {
			$order_data['accept_language'] = $this->request->server['HTTP_ACCEPT_LANGUAGE'];
		} else {
			$order_data['accept_language'] = '';
		}
		
		//запазваме данните ако е избрано регистрация на профил
		if (!isset($this->request->post['register_select']) && isset($this->request->post['register']) && !empty($this->request->post['password'])) {
			$this->session->data['account'] = 'register';
			
			//изтриваме изоставената количка
			if (isset($this->session->data['tk_checkout']['abandoned_cart_id'])) {
				$this->load->model('extension/module/tk_abandoned_cart');
				$this->model_extension_module_tk_abandoned_cart->removeAbandonedCart($this->session->data['tk_checkout']['abandoned_cart_id']);
			}
			
			if (!$this->customer->isLogged()) {
				$this->request->post['fax'] = '';
				$this->request->post['newsletter'] = isset($data['newsletter']) ? $data['newsletter'] : '';
				$this->request->post['company'] = '';
				$this->request->post['address_1'] = $order_data['address_1'];
				$this->request->post['city'] = $order_data['city'];
				$this->request->post['postcode'] = $order_data['postcode'];
				
				$customer_id = $this->model_account_customer->addCustomer($this->request->post);
				if ($customer_id) {
					$address_id = $this->model_account_address->addAddress($customer_id, $this->request->post);
					if ($address_id) {
						$this->model_account_customer->editAddressId($customer_id, $address_id);
					}
					// Clear any previous login attempts for unregistered accounts.
					$this->model_account_customer->deleteLoginAttempts($this->request->post['email']);
					$this->customer->login($this->request->post['email'], $this->request->post['password']);
					unset($this->session->data['guest']);
				}
			}
			
			// Add to activity log
			if (isset($customer_id)) {
				$activity_data = array(
					'customer_id' => $customer_id,
					'name'        => $this->request->post['firstname'] . ' ' . $this->request->post['lastname']
				);
				$this->model_account_activity->addActivity('register', $activity_data);
			}
		}
		
		if ($this->customer->isLogged()) {
			$order_data['customer_id'] = $this->customer->getId();
		} else {
			$order_data['customer_id'] = 0;
		}
		
		//запазваме поръчката в базата данни
		$this->session->data['order_id'] = $this->model_checkout_order->addOrder($order_data);
		
		//изтриваме изоставената количка
		$this->session->data['tk_checkout']['cart_id'] = $this->getCartId();
		if (isset($this->session->data['tk_checkout']['abandoned_cart_id'])) {
			$this->load->model('extension/module/tk_abandoned_cart');
			$this->model_extension_module_tk_abandoned_cart->removeAbandonedCart($this->session->data['tk_checkout']['abandoned_cart_id']);
		}
		
		//сменяме статуса ако имаме поръчак от изоставените
		if (isset($this->session->data['abandoned_cart']['abandoned_cart_id'])) {
			$this->load->model('extension/module/tk_abandoned_cart');
			$this->model_extension_module_tk_abandoned_cart->updateAbandonedCartStatus($this->session->data['abandoned_cart']['abandoned_cart_id']);
			unset($this->session->data['abandoned_cart']);
		}
		
		//запазваме адреса ако е бил нов и имаме вписан потребител
		if ($this->customer->isLogged()) {
			$this->editCustomerCustomField($order_data['customer_id'], $this->request->post);
			if (isset($this->request->post['base_address_type']) && $this->request->post['base_address_type'] == 'new') {
				$this->model_account_address->addAddress($order_data['customer_id'], $order_data);
			}
		}
		
		//запазваме поръчка за еконт
		if (isset($this->session->data['shipping_method']) && strpos($this->session->data['shipping_method']['code'], 'tk_econt.') !== false) {
			$this->model_extension_shipping_tk_econt->addOrder($data, $this->session->data['order_id']);
			//запазваме адреса на еконт ако е бил нов и имаме вписан потребител
			if ($this->customer->isLogged()) {
				if ((isset($this->request->post['econt_address_type']) && $this->request->post['econt_address_type'] == 'new') || (isset($this->request->post['econt_office_type']) && $this->request->post['econt_office_type'] == 'new') || (isset($this->request->post['econt_machine_type']) && $this->request->post['econt_machine_type'] == 'new')) {
					$this->model_extension_shipping_tk_econt->addCustomer($data);
				}
			}
		}
		
		//запазваме поръчка за speedy
		if (isset($this->session->data['shipping_method']) && strpos($this->session->data['shipping_method']['code'], 'tk_speedy.') !== false) {
			$this->model_extension_shipping_tk_speedy->addOrder($data, $this->session->data['order_id']);
			//запазваме адреса на спиди ако е бил нов и имаме вписан потребител
			if ($this->customer->isLogged()) {
				if ((isset($this->request->post['speedy_address_type']) && $this->request->post['speedy_address_type'] == 'new') || (isset($this->request->post['speedy_office_type']) && $this->request->post['speedy_office_type'] == 'new') || (isset($this->request->post['speedy_machine_type']) && $this->request->post['speedy_machine_type'] == 'new')) {
					$this->model_extension_shipping_tk_speedy->addCustomer($data);
				}
			}
		}
		
		//запазваме поръчка за transpress
		if (isset($this->session->data['shipping_method']) && strpos($this->session->data['shipping_method']['code'], 'tk_transpress.') !== false) {
			$this->model_extension_shipping_tk_transpress->addOrder($data, $this->session->data['order_id']);
			//запазваме адреса на transpress ако е бил нов и имаме вписан потребител
			if ($this->customer->isLogged()) {
				if ((isset($this->request->post['transpress_address_type']) && $this->request->post['transpress_address_type'] == 'new')) {
					$this->model_extension_shipping_tk_transpress->addCustomer($data);
				}
			}
		}
		
		//запазваме поръчка за boxnow
		if (isset($this->session->data['shipping_method']) && strpos($this->session->data['shipping_method']['code'], 'tk_boxnow.') !== false && isset($data['boxnow'])) {
			$this->model_extension_shipping_tk_boxnow->addOrder($data['boxnow'], $this->session->data['order_id']);
			//запазваме адреса на boxnow ако е бил нов и имаме вписан потребител
			if ($this->customer->isLogged()) {
				if ((isset($this->request->post['boxnow_type']) && $this->request->post['boxnow_type'] == 'new')) {
					$this->model_extension_shipping_tk_boxnow->addCustomer($data['boxnow']);
				}
			}
		}
		
		//запазваме поръчка за NextLevel
		if (isset($this->session->data['shipping_method']) && strpos($this->session->data['shipping_method']['code'], 'tk_next.') !== false) {
			$this->model_extension_shipping_tk_next->addOrder($data['next'], $this->session->data['order_id']);
			//запазваме адреса на NextLevel ако е бил нов и имаме вписан потребител
			if ($this->customer->isLogged()) {
				if (isset($this->request->post['customer_type']) && $this->request->post['customer_type'] == 'new') {
					$this->model_extension_shipping_tk_next->addCustomer($data['next']);
				}
			}
		}
		
		//запазваме поръчка за sameday
		if (isset($this->session->data['shipping_method']) && strpos($this->session->data['shipping_method']['code'], 'tk_sameday.') !== false) {
			$this->model_extension_shipping_tk_sameday->addOrder($data['sameday'], $this->session->data['order_id']);
			//запазваме адреса на sameday ако е бил нов и имаме вписан потребител
			if ($this->customer->isLogged()) {
				if (isset($this->request->post['customer_type']) && $this->request->post['customer_type'] == 'new') {
					$this->model_extension_shipping_tk_sameday->addCustomer($data['sameday']);
				}
			}
		}
	}
	
	// вземаме ид на количката за целите на изоставени колички и проследявщи кодове
	public function getCartId() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "cart WHERE customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "'");
		if (isset($query->row['cart_id'])) {
			return $query->row['cart_id'];
		} else {
			return 0;
		}
	}
	
	// изчиства количката
	public function clearCart() {
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE session_id = '" . $this->db->escape($this->session->getId()) . "'");
	}
	
	// вземаме тоталите на количката
	public function getTotals() {
		
		if (!isset($this->session->data['shipping_method']['cost']) || $this->session->data['shipping_method']['cost'] < 0) {
			unset($this->session->data['shipping_method']);
		}
		
		$this->load->model('setting/extension');
		
		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;
		
		$total_data = array(
			'totals' => &$totals,
			'taxes'  => &$taxes,
			'total'  => &$total
		);
		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			$sort_order = array();
			$results = $this->model_setting_extension->getExtensions('total');
			foreach ($results as $key => $value) {
				$sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
			}
			array_multisort($sort_order, SORT_ASC, $results);
			
			foreach ($results as $result) {
				if ($this->config->get('total_' . $result['code'] . '_status')) {
					$this->load->model('extension/total/' . $result['code']);
					$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
				}
			}
			
			$sort_order = array();
			foreach ($totals as $key => $value) {
				$sort_order[$key] = $value['sort_order'];
			}
			array_multisort($sort_order, SORT_ASC, $totals);
		}
		
		$data['totals'] = array();
		foreach ($totals as $total) {
			
			$value = $total['value'];
			
			if ($total['code'] == 'shipping') {
				if ($this->config->get('tk_special_shipping_status') && isset($this->session->data['tk_special_shipping_discount']) && $this->session->data['tk_special_shipping_discount'] && $this->session->data['tk_special_shipping_discount'] > 0) {
					$value = $total['value'] - $this->session->data['tk_special_shipping_discount'];
					if ($value < 0) {
						$value = 0;
					}
				}
			}
			
			$data['totals'][] = array(
				'title' => $total['title'],
				'code'  => $total['code'],
				'value' => $value,
				'text'  => $this->currency->format($total['value'], $this->session->data['currency'])
			);
		}
		
		return $data['totals'];
	}
	
	// вземаме сумата без доставка и общия тотал
	public function getSubTotal() {
		
		if ($this->config->get('module_tk_checkout_totals')) {
			$total_value = $this->getSelectedTotals($this->config->get('module_tk_checkout_totals'));
		} else {
			$this->load->model('setting/extension');
			
			$totals = array();
			$taxes = $this->cart->getTaxes();
			$total = 0;
			
			$total_data = array(
				'totals' => &$totals,
				'taxes'  => &$taxes,
				'total'  => &$total
			);
			
			$results = $this->model_setting_extension->getExtensions('total');
			foreach ($results as $result) {
				if ($result['code'] != 'shipping' && $result['code'] != 'total' && $this->config->get('total_' . $result['code'] . '_status')) {
					$this->load->model('extension/total/' . $result['code']);
					$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
				}
			}
			
			$total_value = 0;
			foreach ($totals as $value) {
				$total_value += $value['value'];
			}
		}
		
		return round($total_value, 2);
	}
	
	// вземаме само сумата на продуктите с данъците
	public function getSubAndTax() {
		
		$total = $this->cart->getSubTotal();
		
		$tax = 0;
		$taxes = $this->cart->getTaxes();
		if ($taxes) {
			foreach ($taxes as $taxe) {
				$tax += $taxe;
			}
		}
		$total = $total + $tax;
		
		return round($total, 2);
	}
	
	// вземаме сумата спрямо избраните тотали
	public function getSelectedTotals($total_values) {
		
		$this->load->model('setting/extension');
		
		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;
		
		$total_data = array(
			'totals' => &$totals,
			'taxes'  => &$taxes,
			'total'  => &$total
		);
		
		$results = $this->model_setting_extension->getExtensions('total');
		foreach ($results as $result) {
			if ($this->config->get('total_' . $result['code'] . '_status')) {
				if (in_array($result['code'], $total_values) && $result['code'] != 'total_tk_special_shipping') {
					$this->load->model('extension/total/' . $result['code']);
					$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
				}
			}
		}
		
		$total_value = 0;
		foreach ($totals as $value) {
			$total_value += $value['value'];
		}
		
		return round($total_value, 2);
	}
	
	// редактиране на полета за фактура ако са променени за регистирани потребители
	public function editCustomerCustomField($customer_id, $data) {
		
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? json_encode($data['custom_field']['account']) : '') . "' WHERE customer_id = '" . (int)$customer_id . "'");
	}
	
	// генериране на парола
	public function randomPassword() {
		
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		
		$pass = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		
		return implode($pass);
	}
	
	// вземаме адресите на магазини за вземане от магазин
	public function getLocations() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "location ");
		
		return $query->rows;
	}
	
	// вземаме зона куриери когато полето е скрито по подразбиране
	public function getZone($code = 'courier') {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE code = '" . $this->db->escape($code) . "'");
		if (!$query->num_rows) {
			if ($code == 'courier_ro') {
				$country_id = 175;
				$name = 'Courier';
			} else if ($code == 'courier_gr') {
				$country_id = 84;
				$name = 'Courier';
			} else {
				$country_id = 33;
				$name = 'Куриер';
			}
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "zone SET country_id = '" . $country_id . "', code = '" . $this->db->escape($code) . "', name = '" . $this->db->escape($name) . "', status = 1");
		}
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE code = '" . $this->db->escape($code) . "'");
		
		return $query->row;
	}
	
	// транслителиране
	public function latin_to_cyrillic($text) {
		
		$cyr = array(
			'В',
			'в',
			'Я',
			'я',
			'ж',
			'ч',
			'щ',
			'ш',
			'ю',
			'а',
			'б',
			'в',
			'г',
			'д',
			'е',
			'з',
			'и',
			'й',
			'к',
			'л',
			'м',
			'н',
			'о',
			'п',
			'р',
			'с',
			'т',
			'у',
			'ф',
			'х',
			'ц',
			'ъ',
			'ь',
			'я',
			'Ж',
			'Ч',
			'Щ',
			'Ш',
			'Ю',
			'А',
			'Б',
			'В',
			'Г',
			'Д',
			'Е',
			'З',
			'И',
			'Й',
			'К',
			'Л',
			'М',
			'Н',
			'О',
			'П',
			'Р',
			'С',
			'Т',
			'У',
			'Ф',
			'Х',
			'Ц',
			'Ъ',
			'Ь',
			'Я'
		);
		$lat = array(
			'W',
			'w',
			'IA',
			'ia',
			'zh',
			'ch',
			'sht',
			'sh',
			'yu',
			'a',
			'b',
			'v',
			'g',
			'd',
			'e',
			'z',
			'i',
			'j',
			'k',
			'l',
			'm',
			'n',
			'o',
			'p',
			'r',
			's',
			't',
			'u',
			'f',
			'h',
			'c',
			'y',
			'x',
			'q',
			'Zh',
			'Ch',
			'Sht',
			'Sh',
			'Yu',
			'A',
			'B',
			'V',
			'G',
			'D',
			'E',
			'Z',
			'I',
			'J',
			'K',
			'L',
			'M',
			'N',
			'O',
			'P',
			'R',
			'S',
			'T',
			'U',
			'F',
			'H',
			'c',
			'Y',
			'X',
			'Q'
		);
		
		return str_replace($lat, $cyr, $text);
	}
	
	// транслителиране
	public function cyrillic_to_latin($text) {
		
		$cyr = array(
			'В',
			'в',
			'Я',
			'я',
			'ж',
			'ч',
			'щ',
			'ш',
			'ю',
			'а',
			'б',
			'в',
			'г',
			'д',
			'е',
			'з',
			'и',
			'й',
			'к',
			'л',
			'м',
			'н',
			'о',
			'п',
			'р',
			'с',
			'т',
			'у',
			'ф',
			'х',
			'ц',
			'ъ',
			'ь',
			'я',
			'Ж',
			'Ч',
			'Щ',
			'Ш',
			'Ю',
			'А',
			'Б',
			'В',
			'Г',
			'Д',
			'Е',
			'З',
			'И',
			'Й',
			'К',
			'Л',
			'М',
			'Н',
			'О',
			'П',
			'Р',
			'С',
			'Т',
			'У',
			'Ф',
			'Х',
			'Ц',
			'Ъ',
			'Ь',
			'Я'
		);
		$lat = array(
			'W',
			'w',
			'IA',
			'ia',
			'zh',
			'ch',
			'sht',
			'sh',
			'yu',
			'a',
			'b',
			'v',
			'g',
			'd',
			'e',
			'z',
			'i',
			'j',
			'k',
			'l',
			'm',
			'n',
			'o',
			'p',
			'r',
			's',
			't',
			'u',
			'f',
			'h',
			'c',
			'y',
			'x',
			'q',
			'Zh',
			'Ch',
			'Sht',
			'Sh',
			'Yu',
			'A',
			'B',
			'V',
			'G',
			'D',
			'E',
			'Z',
			'I',
			'J',
			'K',
			'L',
			'M',
			'N',
			'O',
			'P',
			'R',
			'S',
			'T',
			'U',
			'F',
			'H',
			'c',
			'Y',
			'X',
			'Q'
		);
		
		return str_replace($cyr, $lat, $text);
	}
	
	// вземаме държавата
	public function getCountryById($country_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "country WHERE country_id = '" . (int)$country_id . "'");
		
		return $query->row;
	}
	
	// вземаме държавата
	public function getCountryByIso2($iso_code_2) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "country WHERE iso_code_2 = '" . $this->db->escape($iso_code_2) . "'");
		
		return $query->row;
	}
	
	// вземаме данни за поръчката
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order` WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function getOrderProducts($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->rows;
	}
	
	public function getOrderOptions($order_id, $order_product_id) {
		
		$query = $this->db->query("SELECT oo.* FROM `" . DB_PREFIX . "order_option` oo LEFT JOIN `" . DB_PREFIX . "product_option` po ON po.product_option_id = oo.product_option_id LEFT JOIN `" . DB_PREFIX . "option` o ON o.option_id = po.option_id WHERE oo.order_id = '" . (int)$order_id . "' AND oo.order_product_id = '" . (int)$order_product_id . "' ORDER BY o.sort_order ASC");
		
		return $query->rows;
	}
	
	public function getOrderTotals($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_total WHERE order_id = '" . (int)$order_id . "' ORDER BY sort_order");
		
		return $query->rows;
	}
	
	public function getOrderShipping($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_total WHERE order_id = '" . (int)$order_id . "' AND code = 'shipping'");
		
		return $query->row;
	}
	
	public function getProductOptionValue($product_id, $product_option_value_id) {
		
		$query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_id = '" . (int)$product_id . "' AND pov.product_option_value_id = '" . (int)$product_option_value_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->row;
	}
	
	// за смяна на статус на поръчка
	public function getApi($api_id) {
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "api` WHERE api_id = '" . (int)$api_id . "'");
		
		return $query->row;
	}
	
	public function getApiToken() {
		
		$api_token = '';
		
		$catalog = $this->request->server['HTTPS'] ? HTTPS_SERVER : HTTP_SERVER;
		
		$api_info = $this->getApi($this->config->get('config_api_id'));
		
		if ($api_info) {
			
			$this->session->data['api_id'] = $api_info['api_id'];
			
			$curl = curl_init();
			
			if (substr(HTTPS_SERVER, 0, 5) == 'https') {
				curl_setopt($curl, CURLOPT_PORT, 443);
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_FORBID_REUSE, false);
			curl_setopt($curl, CURLOPT_USERAGENT, $this->request->server['HTTP_USER_AGENT']);
			curl_setopt($curl, CURLOPT_URL, $catalog . 'index.php?route=api/login&api_token=' . $api_token);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($api_info));
			
			$response = curl_exec($curl);
			$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
			$content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
			
			if ($status_code != 200) {
				$this->log->write('TK Checkout - Api Login ');
				$this->log->write("Invalid status: " . curl_error($curl));
			} else if ($content_type === 'application/json') {
				$result = json_decode($response);
				
				if (!empty($result->api_token)) {
					$api_token = $result->api_token;
				} else if (!empty($result->error)) {
					if (!empty($result->error->ip) && preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $result->error->ip, $ip) && !empty($ip[0])) {
						
						$query_customer = $this->db->query("SELECT * FROM `" . DB_PREFIX . "api_ip` WHERE api_id = '" . (int)$api_info['api_id'] . "' AND ip = '" . $this->db->escape($ip[0]) . "'");
						
						if (!$query_customer->num_rows) {
							$this->db->query("INSERT INTO `" . DB_PREFIX . "api_ip` SET api_id = '" . (int)$api_info['api_id'] . "', ip = '" . $this->db->escape($ip[0]) . "'");
						}
						
						$api_token = $this->getApiToken();
					}
				} else {
					$this->log->write('TK Checkout - Api Login ');
					$this->log->write("Invalid json");
				}
			} else {
				$this->log->write('TK Checkout - Api Login ');
				$this->log->write("Invalid response");
			}
		}
		
		return $api_token;
	}
	
	public function addOrderHistory($order_id, $api_token, $history_data) {
		
		$catalog = $this->request->server['HTTPS'] ? HTTPS_SERVER : HTTP_SERVER;
		
		$curl = curl_init();
		if (substr(HTTPS_SERVER, 0, 5) == 'https') {
			curl_setopt($curl, CURLOPT_PORT, 443);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, false);
		curl_setopt($curl, CURLOPT_USERAGENT, $this->request->server['HTTP_USER_AGENT']);
		curl_setopt($curl, CURLOPT_URL, $catalog . 'index.php?route=api/order/history&order_id=' . $order_id . '&api_token=' . $api_token);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($history_data));
		
		$response = curl_exec($curl);
		$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
		$content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
		
		if ($status_code != 200) {
			$this->log->write('TK Checkout - addHistory - order: ' . $order_id);
			$this->log->write("Invalid status: " . curl_error($curl));
		} else if ($content_type === 'application/json') {
			$result = json_decode($response);
			
			if (!empty($result->error)) {
				$this->log->write('TK Checkout - addHistory - order: ' . $order_id);
				$this->log->write($result->error);
			}
		} else {
			$this->log->write('TK Checkout - addHistory - order: ' . $order_id);
			$this->log->write("Invalid response");
		}
		
		curl_close($curl);
	}
}