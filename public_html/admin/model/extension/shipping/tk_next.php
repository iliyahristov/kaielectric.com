<?php

class ModelExtensionShippingTkNext extends Model {
	
	public function createTables($token) {
		
		$results = array();
		
		if ($this->config->get('module_tk_checkout_api_url')) {
			
			$url = $this->config->get('module_tk_checkout_api_url');
			
			if ($this->request->server['HTTPS']) {
				$domain = str_replace('admin/', '', HTTPS_SERVER);
			} else {
				$domain = str_replace('admin/', '', HTTP_SERVER);
			}
			
			$data = array(
				'token'     => $token,
				'domain'    => $this->base64url_encode($domain),
				'module'    => $this->base64url_encode('tk_checkout'),
				'version'   => $this->base64url_encode('4.0'),
				'operation' => $this->base64url_encode('install_next')
			);
			
			$post = json_encode($data);
			
			$curl = curl_init();
			
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Accept: application/json',
				'Content-type: application/json'
			));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			
			$response = curl_exec($curl);
			$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
			$content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
			
			if ($status_code != 200) {
				$results['error'] = "Invalid response. " . curl_error($curl);
			} else if ($content_type === 'application/json; charset=UTF-8') {
				
				$result = json_decode($response);
				
				if (!empty($result->success)) {
					$results['success'] = true;
					
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_next_customer` (" . $this->base64url_decode($result->tk_next_customer) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_next_order` (" . $this->base64url_decode($result->tk_next_order) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				} else if (!empty($result->error)) {
					if (!empty($result->error_module)) {
						$this->load->model('setting/setting');
						$data = $this->model_setting_setting->getSetting('shipping_tk_next');
						$data['shipping_tk_next_logged'] = false;
						$data['shipping_tk_next_status'] = 0;
						$this->model_setting_setting->editSetting('shipping_tk_next', $data);
					}
					
					$results['error'] = $result->error;
				} else {
					$results['error'] = "Invalid response. ";
				}
			} else {
				$results['error'] = "Invalid response. ";
			}
			
			curl_close($curl);
		} else {
			$results['error'] = 'Трявба да имате инсталиран и активиран модул - TK Checkout';
		}
		
		return $results;
	}
	
	public function deleteTables() {
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_next_customer`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_next_order`");
	}
	
	public function settings($token) {
		
		$results = array();
		
		$url = $this->config->get('module_tk_checkout_api_url');
		
		if ($this->request->server['HTTPS']) {
			$domain = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$domain = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data = array(
			'token'     => $token,
			'domain'    => $this->base64url_encode($domain),
			'module'    => $this->base64url_encode('tk_checkout'),
			'version'   => $this->base64url_encode('4.0'),
			'operation' => $this->base64url_encode('settings_next')
		);
		
		$post = json_encode($data);
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'Content-type: application/json'
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		
		$result = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($result);
		
		if (!empty($result->error)) {
			if (!empty($result->error_module)) {
				$this->load->model('setting/setting');
				$data = $this->model_setting_setting->getSetting('shipping_tk_next');
				$data['shipping_tk_next_logged'] = false;
				$data['shipping_tk_next_status'] = 0;
				$this->model_setting_setting->editSetting('shipping_tk_next', $data);
			}
			
			$results['error'] = $result->error;
		} else if (!empty($result->success)) {
			$results['success'] = true;
		} else {
			$results['error'] = 'Problem with install token';
		}
		
		return $results;
	}
	
	public function base64url_encode($data) {
		
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}
	
	public function base64url_decode($data) {
		
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '='));
	}
	
	// обработваме данните за поръчката
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_next_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function updateOrder($data, $order_id, $shipment = array()) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (!empty($data['name'])) {
			$name = $data['name'];
		} else {
			$name = '';
		}
		
		if (!empty($data['phone'])) {
			$phone = $data['phone'];
		} else {
			$phone = '';
		}
		
		if (!empty($data['email'])) {
			$email = $data['email'];
		} else {
			$email = '';
		}
		
		if (!empty($data['office_id']) && $data['office_id'] > 0) {
			$office_id = $data['office_id'];
		} else {
			$office_id = '';
		}
		
		if (!empty($data['office_code'])) {
			$office_code = $data['office_code'];
		} else {
			$office_code = '';
		}
		
		if (!empty($data['office_name'])) {
			$office_name = $data['office_name'];
		} else {
			$office_name = '';
		}
		
		if (!empty($data['office_address'])) {
			$office_address = $data['office_address'];
		} else {
			$office_address = '';
		}
		
		if (!empty($data['country'])) {
			$country = $data['country'];
		} else {
			$country = '';
		}
		
		if (!empty($data['country_iso'])) {
			$country_iso = $data['country_iso'];
		} else {
			$country_iso = '';
		}
		
		if (!empty($data['courier'])) {
			$courier = $data['courier'];
		} else {
			$courier = 'IMP';
		}
		
		if (!empty($data['courier_id'])) {
			$courier_id = $data['courier_id'];
		} else {
			$courier_id = '4';
		}
		
		if (!empty($data['shipping_to'])) {
			$shipping_to = $data['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['postcode'])) {
			$postcode = $data['postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['city'])) {
			$city = $data['city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['quarter'])) {
			$quarter = $data['quarter'];
		} else {
			$quarter = '';
		}
		
		if (!empty($data['street'])) {
			$street = $data['street'];
		} else {
			$street = '';
		}
		
		if (!empty($data['street_num'])) {
			$street_num = $data['street_num'];
		} else {
			$street_num = '';
		}
		
		if (!empty($data['block'])) {
			$block = $data['block'];
		} else {
			$block = '';
		}
		
		if (!empty($data['entrance'])) {
			$entrance = $data['entrance'];
		} else {
			$entrance = '';
		}
		
		if (isset($data['floor'])) {
			$floor = $data['floor'];
		} else {
			$floor = '';
		}
		
		if (!empty($data['apartment'])) {
			$apartment = $data['apartment'];
		} else {
			$apartment = '';
		}
		
		if (!empty($data['other'])) {
			$other = $data['other'];
		} else {
			$other = '';
		}
		
		if (!empty($data['total'])) {
			$total = $data['total'];
		} else {
			$total = '';
		}
		
		if (!empty($data['weight'])) {
			$weight = $data['weight'];
		} else {
			$weight = 0.01;
		}
		
		if (isset($data['payment_code'])) {
			$payment_code = $data['payment_code'];
		} else {
			$payment_code = '';
		}
		
		//товарителница
		if (isset($shipment['awb'])) {
			$shipment_number = $shipment['awb'];
		} else {
			$shipment_number = '';
		}
		
		if (isset($shipment['status'])) {
			$shipment_status_txt = $shipment['status'];
		} else {
			$shipment_status_txt = '';
		}
		
		if (isset($shipment['status_id'])) {
			$shipment_status = $shipment['status_id'];
		} else {
			$shipment_status = '';
		}
		
		if (isset($shipment['courier_awb'])) {
			$courier_awb = $shipment['courier_awb'];
		} else {
			$courier_awb = '';
		}
		
		if (isset($shipment['parcels'][0]['tracking_link'])) {
			$tracking_link = $shipment['parcels'][0]['tracking_link'];
		} else {
			$tracking_link = '';
		}
		
		if (isset($shipment['delivery_date'])) {
			$delivery_date = $shipment['delivery_date'];
		} else {
			$delivery_date = '';
		}
		
		if (isset($shipment['mail_send'])) {
			$mail_send = $shipment['mail_send'];
		} else {
			$mail_send = '';
		}
		
		$next_order = $this->getOrder($order_id);
		
		if ($next_order) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_next_order SET name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_iso = '" . $this->db->escape($country_iso) . "', courier_id = '" . (int)$courier_id . "', courier = '" . $this->db->escape($courier) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block = '" . $this->db->escape($block) . "', entrance = '" . $this->db->escape($entrance) . "', floor = '" . $this->db->escape($floor) . "', apartment = '" . $this->db->escape($apartment) . "', other = '" . $this->db->escape($other) . "', office_id = '" . (int)$office_id . "', office_code = '" . $this->db->escape($office_code) . "', office_name = '" . $this->db->escape($office_name) . "', office_address = '" . $this->db->escape($office_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', courier_awb = '" . $this->db->escape($courier_awb) . "', tracking_link = '" . $this->db->escape($tracking_link) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', shipment = '" . $this->db->escape(serialize($shipment)) . "', mail_send = '" . $this->db->escape($mail_send) . "', data = '" . $this->db->escape(serialize($data)) . "' WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_next_order SET order_id = '" . (int)$order_id . "', status_id = '0', name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_iso = '" . $this->db->escape($country_iso) . "', courier_id = '" . (int)$courier_id . "', courier = '" . $this->db->escape($courier) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block = '" . $this->db->escape($block) . "', entrance = '" . $this->db->escape($entrance) . "', floor = '" . $this->db->escape($floor) . "', apartment = '" . $this->db->escape($apartment) . "', other = '" . $this->db->escape($other) . "', office_id = '" . (int)$office_id . "', office_code = '" . $this->db->escape($office_code) . "', office_name = '" . $this->db->escape($office_name) . "', office_address = '" . $this->db->escape($office_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', courier_awb = '" . $this->db->escape($courier_awb) . "', tracking_link = '" . $this->db->escape($tracking_link) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', shipment = '" . $this->db->escape(serialize($shipment)) . "', mail_send = '" . $this->db->escape($mail_send) . "', data = '" . $this->db->escape(serialize($data)) . "'");
		}
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_next_order WHERE shipment_status NOT IN ('11', '12', '13', '14')  OR shipment_status is NULL AND status_id > 0");
		
		return $query->rows;
	}
	
	// данни за офиси и адреси
	public function getCities($country_iso, $courier, $office = false, $name = false) {
		
		$cities = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			
			$json_data['country'] = $country_iso;
			
			if ($office) {
				$json_data['courier'] = $courier;
				$json_data['office_type'] = $office;//all,office,machine',
			}
			
			if ($name) {
				if (is_numeric($name)) {
					$json_data['post_code'] = $name;
				} else {
					$json_data['name'] = $name;
				}
			}
			
			$cities = TkNext::getCities($json_data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $courier . ' - cities | getCities');
			$this->log->write($e->getMessage());
		}
		
		return $cities;
	}
	
	public function getOffices($country_iso, $courier, $postcode, $office = 'all') {
		
		$offices = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$json_data = array(
				'post_code'   => $postcode,
				'country'     => $country_iso,
				'courier'     => $courier,
				'office_type' => $office
			);
			
			$offices = TkNext::getOffices($json_data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $courier . ' - office | getOffices');
			$this->log->write($e->getMessage());
		}
		
		return $offices;
	}
	
	public function getStreets($country_iso, $postcode, $name = false) {
		
		$streets = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$json_data = array(
				'post_code' => $postcode,
				'country'   => $country_iso
			);
			
			if ($name) {
				$json_data['name'] = $name;
			}
			
			$streets = TkNext::getStreets($json_data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $country_iso . ' - ' . $postcode . ' | gettStreets');
			$this->log->write($e->getMessage());
		}
		
		return $streets;
	}
	
	// заявки към апи за товарителница
	public function create($data) {
		
		$result = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$result = TkNext::createShipment($data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: | createShipment');
			$this->log->write($e->getMessage());
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
	
	public function track($shipment_number) {
		
		$result = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$result = TkNext::trackShipments($shipment_number);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: | trackShipments');
			$this->log->write($e->getMessage());
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
	
	public function createPDF($shipment_number) {
		
		$result = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$result = TkNext::printShipment($shipment_number);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $shipment_number . ' | printShipment');
			$this->log->write($e->getMessage());
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
	
	public function cancel($shipment_number) {
		
		$result = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$result = TkNext::cancelShipment($shipment_number);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $shipment_number . ' | cancelShipment');
			$this->log->write($e->getMessage());
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
	
}