<?php

class ModelExtensionShippingTkBoxnow extends Model {
	
	public function getQuote($address) {
		
		$this->load->language('extension/shipping/tk_boxnow');
		$this->load->model('extension/module/tk_checkout');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_tk_boxnow_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
		if (!$this->config->get('shipping_tk_boxnow_geo_zone_id')) {
			$status = true;
		} else if ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
		
		if (!empty($address['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($address['country_id']);
		} else if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$address['country_id'] = $this->session->data['tk_checkout']['country_id'];
			$country = $this->model_extension_module_tk_checkout->getCountryById($address['country_id']);
		} else {
			$country = $this->model_extension_module_tk_checkout->getCountryByIso2('BG');
			$address['country_id'] = $country['country_id'];
		}
		
		if (!empty($country['iso_code_2'])) {
			$address['country_iso'] = $country['iso_code_2'];
		} else {
			$address['country_iso'] = 'BG';
		}
		
		if ($address['country_iso'] != 'BG') {
			$status = false;
		}
		
		if ($this->config->get('shipping_tk_boxnow_categories')) {
			foreach ($this->cart->getProducts() as $product) {
				$category_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_category` WHERE `product_id` = '" . (int)$product['product_id'] . "' AND category_id IN(" . implode(',', $this->config->get('shipping_tk_boxnow_categories')) . ")");
				
				if (empty($category_query->rows)) {
					$status = false;
				}
			}
		}
		
		// тегло
		if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
			$weight = $this->cart->getWeight();
		} else if ($this->config->get('shipping_tk_boxnow_default_weight') && $this->config->get('shipping_tk_boxnow_default_weight') > 0) {
			$weight = $this->config->get('shipping_tk_boxnow_default_weight') * $this->cart->countProducts();
		} else {
			$weight = 1 * $this->cart->countProducts();
		}
		if ($this->config->get('shipping_tk_boxnow_weight_type') && $this->config->get('shipping_tk_boxnow_weight_type') == 'gram') {
			$weight = $weight / 1000;
		}
		if ($weight < 0.01) {
			$weight = 0.01;
		}
		
		if ($this->config->get('shipping_tk_boxnow_weight') && $this->config->get('shipping_tk_boxnow_weight') < $weight) {
			$status = false;
		}
		
		$method_data = array();
		
		if ($status) {
			$quote_data = array();
			
			// тотали
			$this->load->model('extension/module/tk_checkout');
			$tk_boxnow_totals = $this->config->get('shipping_tk_boxnow_totals');
			if ($tk_boxnow_totals) {
				$total_sub_tax = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_boxnow_totals);
			} else {
				$total_sub_tax = $this->model_extension_module_tk_checkout->getSubAndTax();
			}
			
			// цена фиксирана сума
			$cost = $this->config->get('shipping_tk_boxnow_cost');
			
			// цена спрямо килограми
			if ($this->config->get('shipping_tk_boxnow_weight_value')) {
				foreach ($this->config->get('shipping_tk_boxnow_weight_value') as $weight_value) {
					if ($weight_value['from'] < $weight && $weight_value['to'] >= $weight) {
						$cost = round($weight_value['price'], 2);
					}
				}
			}
			
			// тегло за безплатна доставка
			$tk_boxnow_free_weight = false;
			if (($this->config->get('shipping_tk_boxnow_free_weight') && $this->config->get('shipping_tk_boxnow_free_weight') > 0 && $this->config->get('shipping_tk_boxnow_free_weight') >= $weight) || !$this->config->get('shipping_tk_boxnow_free_weight') || $this->config->get('shipping_tk_boxnow_free_weight') == 0) {
				$tk_boxnow_free_weight = true;
			}
			
			// безплатна доставка спрямо модула на доставчика
			if ($this->config->get('shipping_tk_boxnow_free_shipping') && $this->config->get('shipping_tk_boxnow_free_shipping') > 0 && $total_sub_tax >= $this->config->get('shipping_tk_boxnow_free_shipping') && $tk_boxnow_free_weight) {
				$cost = 0;
			}
			
			// безплатна достаква спрямо купон
			if (isset($this->session->data['coupon'])) {
				$this->load->model('extension/total/coupon');
				$coupon_info = $this->model_extension_total_coupon->getCoupon($this->session->data['coupon']);
				if (isset($coupon_info['shipping']) && $coupon_info['shipping'] == 1) {
					$cost = 0;
				}
			}
			
			// безплатна доставка от tk_special_shipping
			if ($this->config->get('module_tk_special_shipping_status')) {
				$this->load->model('extension/total/tk_special_shipping');
				$special_shipping_boxnow = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_boxnow.boxnow');
				
				if (!empty($cost) && $cost > 0 && isset($special_shipping_boxnow['total']) && $special_shipping_boxnow['free'] != 1) {
					
					if ($special_shipping_boxnow['type'] == 'F' && $special_shipping_boxnow['discount'] > 0) {
						$discount = $special_shipping_boxnow['discount'];
					} else {
						$discount = ($special_shipping_boxnow['discount'] / 100) * $cost;
					}
					
					if ($special_shipping_boxnow['sign'] == '-') {
						$cost = $cost - $discount;
					} else if ($special_shipping_boxnow['sign'] == '+') {
						$cost = $cost + $discount;
					} else if ($special_shipping_boxnow['sign'] == '=') {
						$cost = $discount;
					}
				}
			}
			
			if ($this->config->get('shipping_tk_boxnow_text')) {
				$tk_boxnow_text_array = $this->config->get('shipping_tk_boxnow_text');
				$tk_boxnow_text = $tk_boxnow_text_array[$this->config->get('config_language_id')];
			}
			
			if (isset($tk_boxnow_text['title']) && $tk_boxnow_text['title']) {
				$text_title = $tk_boxnow_text['title'];
			} else {
				$text_title = $this->language->get('text_description');
			}
			
			if (isset($tk_boxnow_text['text']) && $tk_boxnow_text['text']) {
				$text_text = $tk_boxnow_text['text'];
			} else {
				$text_text = '';
			}
			
			$price_text = $this->currency->format($cost, $this->session->data['currency']);
			
			//пресмятане на ДДС
			if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_boxnow_tax_class_id') && $cost > 0) {
				$rate = array_values($this->tax->getRates($cost, $this->config->get('shipping_tk_boxnow_tax_class_id')));
				$cost = $cost / (($rate[0]['rate'] / 100) + 1);
				
				if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
					$cost = $cost / (($rate[0]['rate'] / 100) + 1);
				}
			}
			
			$quote_data['boxnow'] = array(
				'code'         => 'tk_boxnow.boxnow',
				'title'        => $text_title,
				'description'  => $text_text,
				'cost'         => $this->tax->calculate($cost, $this->config->get('shipping_tk_boxnow_tax_class_id'), $this->config->get('config_tax')),
				'tax_class_id' => $this->config->get('shipping_tk_boxnow_tax_class_id'),
				'text'         => '<span id="tk_boxnow_price">' . $price_text . '</span>'
			);
			
			$method_data = array(
				'code'       => 'tk_boxnow',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('shipping_tk_boxnow_sort_order'),
				'error'      => false
			);
		}
		
		return $method_data;
	}
	
	// показваме темплейти
	public function getBoxNow($data = array()) {
		
		$this->load->language('tk_checkout/checkout');
		$this->load->language('extension/shipping/tk_boxnow');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$data['selected_boxnow'] = $this->language->get('selected_boxnow');
		$data['select_boxnow'] = $this->language->get('select_boxnow');
		$data['text_select_lockerid'] = $this->language->get('text_select_lockerid');
		$data['text_title'] = $this->language->get('text_title');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		
		$this->load->model('extension/module/tk_checkout');
		$zone_info = $this->model_extension_module_tk_checkout->getZone();
		if (isset($zone_info['zone_id']) && $zone_info['zone_id']) {
			$data['zone_id'] = $zone_info['zone_id'];
		} else {
			$data['zone_id'] = $this->config->get('config_zone_id');
		}
		
		$this->load->model('localisation/zone');
		$zone = $this->model_localisation_zone->getZone($data['zone_id']);
		$data['zone'] = $zone['name'];
		
		$data['boxnow_customer_locker_id'] = 0;
		$data['boxnow_customer_lockers'] = array();
		$data['boxnow_customer_locker'] = array();
		
		if ($this->customer->isLogged()) {
			$data['boxnow_customer_lockers'] = $this->getCustomers();
			$data['boxnow_customer_locker'] = $this->getCustomer();
			if (isset($data['boxnow_customer_locker']['locker_id']) && $data['boxnow_customer_locker']['locker_id']) {
				$data['boxnow_customer_locker_id'] = $data['boxnow_customer_locker']['locker_id'];
			}
		}
		
		$data['locker_id'] = '';
		$data['locker_address'] = '';
		$data['locker_name'] = '';
		
		if (isset($this->session->data['tk_checkout']['boxnow']['locker_id']) && $this->session->data['tk_checkout']['boxnow']['locker_id']) {
			$data['locker_id'] = $this->session->data['tk_checkout']['boxnow']['locker_id'];
		}
		
		if (isset($this->session->data['tk_checkout']['boxnow']['locker_address']) && $this->session->data['tk_checkout']['boxnow']['locker_address']) {
			$data['locker_address'] = $this->session->data['tk_checkout']['boxnow']['locker_address'];
		}
		
		if (isset($this->session->data['tk_checkout']['boxnow']['locker_name']) && $this->session->data['tk_checkout']['boxnow']['locker_name']) {
			$data['locker_name'] = $this->session->data['tk_checkout']['boxnow']['locker_name'];
		}
		
		if (isset($this->session->data['tk_checkout']['boxnow']['boxnow_type'])) {
			$data['boxnow_type'] = $this->session->data['tk_checkout']['boxnow']['boxnow_type'];
		} else {
			$data['boxnow_type'] = '';
		}
		
		$data['partner_id'] = $this->config->get('shipping_tk_boxnow_partner_id');
		$data['widget_url'] = $this->config->get('shipping_tk_boxnow_widget_url');
		
		$data['shipping_address'] = isset($this->session->data['shipping_address']) ? $this->session->data['shipping_address'] : NULL;
		
		$this->response->setOutput($this->load->view('tk_checkout/boxnow', $data));
	}
	
	// обработваме данните за доставка
	public function addBoxNowData($data) {
		
		$return = array();
		$this->load->language('extension/shipping/tk_boxnow');
		
		if (!isset($data['zone_id'])) {
			$this->load->model('extension/module/tk_checkout');
			$zone_info = $this->model_extension_module_tk_checkout->getZone();
			$data['zone_id'] = $zone_info['zone_id'];
		}
		
		$return['zone_id'] = $data['zone_id'];
		
		$this->load->model('localisation/zone');
		$zone_info = $this->model_localisation_zone->getZone($data['zone_id']);
		if ($zone_info) {
			$return['zone'] = $zone_info['name'];
			$return['zone_code'] = $zone_info['code'];
		} else {
			$return['zone'] = '';
			$return['zone_code'] = '';
		}
		
		$return['address_1'] = '';
		$return['city'] = '';
		$return['postcode'] = '';
		
		if (isset($data['boxnow_customer_id']) && $data['boxnow_type'] == 'existing' && $data['boxnow_customer_id'] > 0) {
			$boxnow_customer_info = $this->getCustomer($data['boxnow_customer_id']);
			
			$return['boxnow_type'] = 'existing';
			$return['boxnow_customer_id'] = $data['boxnow_customer_id'];
			$return['address_1'] = '';
			$return['city'] = '';
			$return['postcode'] = '';
			
			if (isset($boxnow_customer_info['locker_id']) && $boxnow_customer_info['locker_id']) {
				$return['locker_id'] = $boxnow_customer_info['locker_id'];
				$return['locker_address'] = $boxnow_customer_info['locker_address'];
				$return['locker_name'] = $boxnow_customer_info['locker_name'];
				$return['city'] .= $boxnow_customer_info['locker_name'];
				$return['address_1'] .= $boxnow_customer_info['locker_address'];
			}
		} else {
			$return['payment_address_type'] = 'new';
			
			if (isset($data['locker_id'])) {
				$return['locker_id'] = $data['locker_id'];
			} else {
				$return['locker_id'] = '';
			}
			
			if (isset($data['locker_address'])) {
				$return['locker_address'] = $data['locker_address'];
				$return['address_1'] .= $data['locker_address'];
			} else {
				$return['locker_address'] = '';
			}
			
			if (isset($data['locker_name'])) {
				$return['locker_name'] = $data['locker_name'];
				$return['city'] .= $data['locker_name'];
			}
		}
		
		if (isset($return['locker_id']) && $return['locker_id']) {
			$this->session->data['tk_checkout']['boxnow']['locker_id'] = $return['locker_id'];
		}
		
		if (isset($return['locker_address']) && $return['locker_address']) {
			$this->session->data['tk_checkout']['boxnow']['locker_address'] = $return['locker_address'];
		}
		
		if (isset($return['locker_name']) && $return['locker_name']) {
			$this->session->data['tk_checkout']['boxnow']['locker_name'] = $return['locker_name'];
		}
		
		if (!isset($return['locker_id']) || !$return['locker_id']) {
			$return['error']['locker_id'] = $this->language->get('text_select_lockerid');
		}
		
		return $return;
	}
	
	public function saveData() {
		
		if (isset($this->request->post['boxnow_type'])) {
			$this->session->data['tk_checkout']['boxnow']['boxnow_type'] = $this->request->post['boxnow_type'];
		}
		
		if (isset($this->request->post['locker_id'])) {
			$this->session->data['tk_checkout']['boxnow']['locker_id'] = $this->request->post['locker_id'];
		}
		
		if (isset($this->request->post['locker_address'])) {
			$this->session->data['tk_checkout']['boxnow']['locker_address'] = $this->request->post['locker_address'];
		}
		
		if (isset($this->request->post['locker_name'])) {
			$this->session->data['tk_checkout']['boxnow']['locker_name'] = $this->request->post['locker_name'];
		}
	}
	
	// обработваме данните за клиента
	public function addCustomer($data) {
		
		if (isset($data['locker_id']) && $data['locker_id']) {
			$address_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_boxnow_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND locker_id = '" . (int)$data['locker_id'] . "'");
			if (!$address_query->num_rows) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tk_boxnow_customer SET customer_id = '" . (int)$this->customer->getId() . "', locker_id='" . (int)$data['locker_id'] . "', locker_address='" . $this->db->escape($data['locker_address']) . "', locker_name='" . $this->db->escape($data['locker_name']) . "'");
			}
		}
	}
	
	public function getCustomer($boxnow_customer_id = NULL) {
		
		if ($boxnow_customer_id != NULL) {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_boxnow_customer WHERE boxnow_customer_id = '" . (int)$boxnow_customer_id . "'");
		} else {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_boxnow_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' ORDER BY boxnow_customer_id ASC LIMIT 1 ");
		}
		
		if ($address_query->num_rows) {
			return array(
				'boxnow_customer_id' => $address_query->row['boxnow_customer_id'],
				'locker_id'          => $address_query->row['locker_id'],
				'locker_name'        => $address_query->row['locker_name'],
				'locker_address'     => $address_query->row['locker_address']
			);
		} else {
			return false;
		}
	}
	
	public function getCustomers() {
		
		$address_data = array();
		$address_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_boxnow_customer WHERE customer_id = '" . (int)$this->customer->getId() . "'");
		foreach ($address_query->rows as $result) {
			$address_data[$result['boxnow_customer_id']] = array(
				'boxnow_customer_id' => $result['boxnow_customer_id'],
				'locker_id'          => $result['locker_id'],
				'locker_name'        => $result['locker_name'],
				'locker_address'     => $result['locker_address']
			);
		}
		
		return $address_data;
	}
	
	// обработваме данните за поръчката
	public function addOrder($data, $order_id = 0) {
		
		if ($order_id > 0 && isset($data['locker_id'])) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_boxnow_order SET order_id = '" . (int)$order_id . "', locker_id='" . (int)$data['locker_id'] . "', locker_address='" . $this->db->escape($data['locker_address']) . "', locker_name='" . $this->db->escape($data['locker_name']) . "', status='2' ");
		}
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_boxnow_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_boxnow_order WHERE (status_code != 'delivered' AND status_code != 'returned' AND status_code != 'cancelled' OR status_code IS NULL) AND parcel IS NOT NULL");
		
		return $query->rows;
	}
	
	// ъпдейт на товарителници с крон
	public function updateOrder($order_id, $data) {
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_boxnow_order SET request_id = '" . (int)$data['request_id'] . "', parcel = '" . $this->db->escape($data['parcel']) . "', locker_id='" . (int)$data['locker_id'] . "', locker_address='" . $this->db->escape($data['locker_address']) . "', locker_name='" . $this->db->escape($data['locker_name']) . "', status_message='" . $this->db->escape($data['status_message']) . "', status_code='" . $this->db->escape($data['status_code']) . "', status='" . (int)$data['status_id'] . "', mail_send='" . $this->db->escape($data['mail_send']) . "' WHERE order_id = '" . (int)$order_id . "' ");
	}
	
	// връзка с бокс нау
	public function serviceJSON() {
		
		$authorization = false;
		
		if ($this->config->get('shipping_tk_boxnow_api_url') && $this->config->get('shipping_tk_boxnow_client_id') && $this->config->get('shipping_tk_boxnow_client_secret')) {
			
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
				CURLOPT_URL            => $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/auth-sessions',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING       => '',
				CURLOPT_MAXREDIRS      => 10,
				CURLOPT_CONNECTTIMEOUT => 5,
				CURLOPT_TIMEOUT        => 20,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST  => 'POST',
				CURLOPT_POSTFIELDS     => '{
				"grant_type": "client_credentials",
				"client_id": "' . $this->config->get('shipping_tk_boxnow_client_id') . '",
				"client_secret": "' . $this->config->get('shipping_tk_boxnow_client_secret') . '"
				}',
				CURLOPT_HTTPHEADER     => array(
					'Content-Type: application/json'
				),
			));
			
			$response = curl_exec($curl);
			curl_close($curl);
			
			$json = json_decode($response, true);
			
			if (!empty($json['access_token'])) {
				$authorization = "Authorization: Bearer " . $json['access_token'];
			}
		}
		
		return ($authorization);
	}
	
}