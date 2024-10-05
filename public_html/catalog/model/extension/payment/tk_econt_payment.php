<?php

class ModelExtensionPaymentTkEcontPayment extends Model {
	
	public function getMethod($address, $total) {
		
		$this->load->language('extension/payment/tk_econt_payment');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payment_tk_econt_payment_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
		if ($this->config->get('payment_tk_econt_payment_total') > 0 && $this->config->get('payment_tk_econt_payment_total') > $total) {
			$status = false;
		} else if (!$this->config->get('shipping_tk_econt_store_kay')) {
			$status = false;
		} else if (!$this->cart->hasShipping()) {
			$status = false;
		} else if (!$this->config->get('payment_tk_econt_payment_geo_zone_id')) {
			$status = true;
		} else if ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
		
		$my_referer = isset($_POST['referer']) ? trim($_POST['referer']) : (isset($_SERVER['HTTP_REFERER']) ? base64_encode($_SERVER['HTTP_REFERER']) : false);
		if (strpos($my_referer, 'sale/order/edit') !== false) {
			$status = false;
		}
		
		if (!isset($this->session->data['shipping_method'])) {
			$status = false;
		} else {
			if ($this->session->data['shipping_method']['code'] != 'tk_econt.econt_machine' && $this->session->data['shipping_method']['code'] != 'tk_econt.econt_office' && $this->session->data['shipping_method']['code'] != 'tk_econt.econt_door') {
				$status = false;
			}
		}
		
		$method_data = array();
		if ($status) {
			$method_data = array(
				'code'       => 'tk_econt_payment',
				'title'      => $this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('payment_tk_econt_payment_sort_order')
			);
		}
		
		return $method_data;
	}
	
	public function addOrder($order_id, $token = '', $uri = '', $identifier = '') {
		
		$order = $this->getOrder($order_id);
		
		if ($order) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_payment SET payment_token = '" . $this->db->escape($token) . "', payment_uri = '" . $this->db->escape($uri) . "', payment_identifier = '" . $this->db->escape($identifier) . "' WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_econt_payment SET order_id = '" . (int)$order_id . "', payment_token = '" . $this->db->escape($token) . "', payment_uri = '" . $this->db->escape($uri) . "', payment_identifier = '" . $this->db->escape($identifier) . "'");
		}
		
		return true;
	}
	
	public function updateOrderToken($order_id, $token) {
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_payment SET payment_token =  '" . $this->db->escape($token) . "' WHERE order_id  = '" . (int)$order_id . "'");
		
		return true;
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_payment WHERE order_id = '" . (int)$order_id . "' ");
		
		return $query->row;
	}
	
	//подготвя данните от поръчката за изпращане към еконт
	public function prepareOrder($order_id) {
		
		$this->load->model('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('checkout/order');
		$this->load->model('catalog/product');
		
		$op_order_info = $this->model_checkout_order->getOrder($order_id);
		if (empty($op_order_info)) return;
		if ($op_order_info['shipping_code'] == 'tk_econt.econt_machine' || $op_order_info['shipping_code'] == 'tk_econt.econt_office' || $op_order_info['shipping_code'] == 'tk_econt.econt_door') {
			$check_delivery = true;
		} else {
			$check_delivery = false;
		}
		
		if (!$check_delivery) return;
		
		$order_data = $this->model_extension_shipping_tk_econt->getOrder($order_id);
		if (empty($order_data)) return;
		
		if (isset($order_data['office_code']) && $order_data['office_code']) {
			$office_data = $this->model_extension_shipping_tk_econt->getOfficeByOfficeCode($order_data['office_code']);
		}
		
		if (isset($office_data) && $office_data) {
			$office_address = $office_data['address'];
		} else {
			$office_address = '';
		}
		
		if (isset($op_order_info['firstname'])) {
			$firstname = $op_order_info['firstname'];
		} else {
			$firstname = ' ';
		}
		
		if (isset($op_order_info['lastname'])) {
			$lastname = $op_order_info['lastname'];
		} else {
			$lastname = ' ';
		}
		
		$face = '';
		$name = $firstname . ' ' . $lastname;
		
		//проверка дали имаме фирма
		if ($this->config->get('shipping_tk_econt_company') && !empty($op_order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) && utf8_strlen($op_order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) > 3) {
			$face = $name;
			$name = $op_order_info['custom_field'][$this->config->get('shipping_tk_econt_company')];
		}
		
		if (isset($op_order_info['email'])) {
			if (!$this->config->get('module_tk_checkout_required_email') || $this->config->get('module_tk_checkout_required_email') == 0) {
				$email = $op_order_info['email'];
			} else {
				$email = '';
			}
		} else {
			$email = '';
		}
		
		if (isset($op_order_info['telephone'])) {
			$telephone = $op_order_info['telephone'];
		} else {
			$telephone = '';
		}
		
		//данни за доставката
		$order_shipping = $this->model_extension_module_tk_checkout->getOrderShipping($order_id);
		if (!isset($order_shipping['value']) || ($order_shipping['value'] > 0)) {
			$paymentSide = 'default';
		} else {
			$paymentSide = 'sender';
		}
		
		$customerInfo = array(
			'id'          => '',
			'name'        => $name,
			'face'        => $face,
			'phone'       => $telephone,
			'email'       => $email,
			'countryCode' => 'BGR',
			'cityName'    => $order_data['city'],
			'postCode'    => $order_data['postcode'],
			'officeCode'  => $order_data['office_code'],
			'zipCode'     => '',
			'address'     => $office_address,
			'quarter'     => $order_data['quarter'],
			'street'      => $order_data['street'],
			'num'         => $order_data['street_num'],
			'other'       => $order_data['other']
		);
		
		$order = array(
			'customerInfo'        => $customerInfo,
			'orderNumber'         => $order_id,
			'shipmentDescription' => 'Order: ' . $order_id,
			'status'              => $op_order_info['order_status'],
			'orderTime'           => $op_order_info['date_added'],
			'currency'            => $op_order_info['currency_code'],
			'cod'                 => ($op_order_info['payment_code'] === 'tk_econt_payment'),
			'partialDelivery'     => 1,
			'paymentToken'        => '',
			'paymentSide'         => $paymentSide,
			'items'               => array()
		);
		
		//данни за продуктите
		$op_order_products = $this->model_extension_module_tk_checkout->getOrderProducts($order_id);
		foreach ($op_order_products as $product) {
			$result = $this->model_catalog_product->getProduct($product['product_id']);
			$order_options = $this->model_extension_module_tk_checkout->getOrderOptions($order_id, $product['order_product_id']);
			
			$option_weight = $result['weight'];
			
			if ($order_options) {
				foreach ($order_options as $order_option) {
					$option = $this->model_extension_module_tk_checkout->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
					
					if (isset($option['weight_prefix']) && isset($option['weight'])) {
						if ($option['weight_prefix'] == '+') {
							$option_weight += $option['weight'];
						} else if ($option['weight_prefix'] == '-') {
							$option_weight -= $option['weight'];
						} else {
							$option_weight = $option['weight'];
						}
					}
				}
			}
			
			$weight_total = $option_weight;
			
			if ($weight_total == 0 && $this->config->get('shipping_tk_econt_weight_total') && $this->config->get('shipping_tk_econt_weight_total') > 0) {
				$weight_total = $this->config->get('shipping_tk_econt_weight_total');
			}
			
			$totalPrice = $product['total'];
			$totalWeight = $weight_total * $product['quantity'];
			
			if ($this->config->get('shipping_tk_econt_weight_type') && $this->config->get('shipping_tk_econt_weight_type') == 'gram') {
				$totalWeight = $totalWeight / 1000;
			}
			
			if ($totalWeight < 0.01) {
				$totalWeight = 0.01;
			}
			
			$url_prd = $this->url->link('product/product', 'product_id=' . $product['product_id']);
			$url_prd = str_replace('admin/', '', $url_prd);
			
			if ($this->config->get('shipping_tk_econt_shipment_opis')) {
				$product_name = $this->config->get('shipping_tk_econt_shipment_opis');
			} else {
				$product_name = $product['name'];
			}
			
			$order['items'][] = array(
				'name'        => $product_name,
				'SKU'         => $product['model'],
				'URL'         => $url_prd,
				'count'       => $product['quantity'],
				'hideCount'   => 1,
				'totalPrice'  => $totalPrice,
				'totalWeight' => $totalWeight
			);
		}
		
		//данни за отстъпките
		$order_totals = $this->model_extension_module_tk_checkout->getOrderTotals($order_id);
		if (!empty($order_totals)) {
			if ($this->config->get('shipping_tk_econt_shipping_in')) {
				$not_for_econt = array(
					'sub_total',
					'total',
					'total_discount'
				);
			} else {
				$not_for_econt = array(
					'sub_total',
					'shipping',
					'total',
					'total_discount'
				);
			}
			
			foreach ($order_totals as $order_total) {
				if (!in_array($order_total['code'], $not_for_econt) && $order_total['value'] != 0) {
					$order['items'][] = array(
						'name'        => $order_total['title'],
						'SKU'         => $order_total['code'],
						'URL'         => '#',
						'count'       => 1,
						'hideCount'   => 1,
						'totalPrice'  => $order_total['value'],
						'totalWeight' => 0
					);
				}
			}
		}
		
		$aOrderObject = [];
		$aOrderObject['order'] = $order;
		$aOrderObject['orderData'] = $op_order_info;
		$aOrderObject['customerInfo'] = $customerInfo;
		
		return $aOrderObject;
	}
}