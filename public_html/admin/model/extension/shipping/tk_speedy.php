<?php

class ModelExtensionShippingTkSpeedy extends Model {
	
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
				'operation' => $this->base64url_encode('install_speedy')
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
					
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_speedy_city_office` (" . $this->base64url_decode($result->tk_speedy_city_office) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_speedy_office` (" . $this->base64url_decode($result->tk_speedy_office) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_speedy_customer` (" . $this->base64url_decode($result->tk_speedy_customer) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_speedy_order` (" . $this->base64url_decode($result->tk_speedy_order) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				} else if (!empty($result->error)) {
					if (!empty($result->error_module)) {
						$this->load->model('setting/setting');
						$data = $this->model_setting_setting->getSetting('shipping_tk_speedy');
						$data['shipping_tk_speedy_logged'] = false;
						$data['shipping_tk_speedy_status'] = 0;
						$this->model_setting_setting->editSetting('shipping_tk_speedy', $data);
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
	
	public function addColumns() {
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_order` LIKE 'mail_send' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_order ADD `mail_send` varchar(512) DEFAULT NULL");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_office` LIKE 'type' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_office ADD `type` varchar(255) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_order` LIKE 'block_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_order ADD `block_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_order` LIKE 'entrance_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_order ADD `entrance_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_order` LIKE 'floor_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_order ADD `floor_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_order` LIKE 'apartment_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_order ADD `apartment_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_order` LIKE 'country_id' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_order ADD `country_id` int(11) NOT NULL DEFAULT 0");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_customer` LIKE 'block_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_customer ADD `block_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_customer` LIKE 'entrance_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_customer ADD `entrance_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_customer` LIKE 'floor_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_customer ADD `floor_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_customer` LIKE 'apartment_no' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_customer ADD `apartment_no` varchar(10) NOT NULL DEFAULT ''");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_speedy_customer` LIKE 'country_id' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_speedy_customer ADD `country_id` int(11) NOT NULL DEFAULT 0");
		}
	}
	
	public function deleteTables() {
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_speedy_contract`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_speedy_city_office`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_speedy_office`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_speedy_customer`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_speedy_order`");
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
			'operation' => $this->base64url_encode('settings_speedy')
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
				$data = $this->model_setting_setting->getSetting('shipping_tk_speedy');
				$data['shipping_tk_speedy_logged'] = false;
				$data['shipping_tk_speedy_status'] = 0;
				$this->model_setting_setting->editSetting('shipping_tk_speedy', $data);
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
	
	// допълнителни данни
	public function deleteContract() {
		
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_speedy_contract");
	}
	
	public function addContract($data) {
		
		$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_speedy_contract SET client_id = '" . (int)$data['clientId'] . "', client_name = '" . $this->db->escape($data['clientName']) . "', contact_name = '" . $this->db->escape($data['contactName']) . "', address = '" . $this->db->escape($data['address']['fullAddressString']) . "'");
	}
	
	public function validateAddress($data, $language = 'bg') {
		
		if (isset($data['city_id']) && $data['city_id']) {
			$address['siteId'] = $data['city_id'];
		} else {
			$address['siteId'] = false;
		}
		
		if (!$address['siteId'] && isset($data['city']) && $data['city']) {
			$address['siteName'] = $data['city'];
		}
		
		if (isset($data['postcode']) && $data['postcode']) {
			$address['postCode'] = $data['postcode'];
		}
		
		if (isset($data['country_id']) && $data['country_id']) {
			$address['countryId'] = $data['country_id'];
		}
		
		if (isset($data['state_id']) && $data['state_id']) {
			$address['stateId'] = $data['state_id'];
		}
		
		if (isset($data['quarter']) && $data['quarter']) {
			$address['complexName'] = $data['quarter'];
		}
		
		if (isset($data['quarter_id']) && $data['quarter_id']) {
			$address['complexId'] = $data['quarter_id'];
		}
		
		if (isset($data['street']) && $data['street']) {
			$address['streetName'] = $data['street'];
		}
		
		if (isset($data['street_id']) && $data['street_id']) {
			$address['streetId'] = $data['street_id'];
		} else {
			$address['streetId'] = '';
		}
		
		if (isset($data['street_no']) && $data['street_no']) {
			$address['streetNo'] = $data['street_no'];
		}
		
		if (isset($data['block_no']) && $data['block_no']) {
			$address['blockNo'] = $data['block_no'];
		}
		
		if (isset($data['entrance_no']) && $data['entrance_no']) {
			$address['entranceNo'] = $data['entrance_no'];
		}
		
		if (isset($data['floor_no']) && $data['floor_no']) {
			$address['floorNo'] = $data['floor_no'];
		}
		
		if (isset($data['apartment_no']) && $data['apartment_no']) {
			$address['apartmentNo'] = $data['apartment_no'];
		}
		
		if (isset($data['note']) && $data['note']) {
			$address['addressNote'] = $data['note'];
		}
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$addressData = array(
			'language' => $language,
			'address'  => $address
		);
		
		$siteResponse = $this->serviceJSON('validation/address/', $addressData);
		$siteResponse = json_decode($siteResponse, true);
		
		if (isset($siteResponse['valid']) && $siteResponse['valid'] == 1) {
			return true;
		} else {
			return $siteResponse['error']['message'];
		}
	}
	
	// обработваме данните за поръчката
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_speedy_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function updateOrder($data) {
		
		$speedy_order = $this->getOrder($data['order_id']);
		
		if (isset($speedy_order) && $speedy_order) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_order SET status_id = '" . (int)$data['status_id'] . "', shipping_to = '" . $this->db->escape($data['shipping_to']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', country_id = '" . $this->db->escape($data['country_id']) . "', city = '" . $this->db->escape($data['city']) . "', quarter = '" . $this->db->escape($data['quarter']) . "', street = '" . $this->db->escape($data['street']) . "', street_num = '" . $this->db->escape($data['street_num']) . "', block_no = '" . $this->db->escape($data['block_no']) . "', entrance_no = '" . $this->db->escape($data['entrance_no']) . "', floor_no = '" . $this->db->escape($data['floor_no']) . "', apartment_no = '" . $this->db->escape($data['apartment_no']) . "', other = '" . $this->db->escape($data['other']) . "', city_id = '" . (int)$data['city_id'] . "', office_id = '" . (int)$data['office_id'] . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', date_delivery = '" . $this->db->escape($data['date_delivery']) . "', data = '" . $this->db->escape(serialize($data['data'])) . "' WHERE order_id  = '" . (int)$data['order_id'] . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_speedy_order SET order_id = '" . (int)$data['order_id'] . "', status_id = '" . (int)$data['status_id'] . "', shipping_to = '" . $this->db->escape($data['shipping_to']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', country_id = '" . $this->db->escape($data['country_id']) . "', city = '" . $this->db->escape($data['city']) . "', quarter = '" . $this->db->escape($data['quarter']) . "', street = '" . $this->db->escape($data['street']) . "', street_num = '" . $this->db->escape($data['street_num']) . "', block_no = '" . $this->db->escape($data['block_no']) . "', entrance_no = '" . $this->db->escape($data['entrance_no']) . "', floor_no = '" . $this->db->escape($data['floor_no']) . "', apartment_no = '" . $this->db->escape($data['apartment_no']) . "', other = '" . $this->db->escape($data['other']) . "', city_id = '" . (int)$data['city_id'] . "', office_id = '" . (int)$data['office_id'] . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', data = '" . $this->db->escape(serialize($data['data'])) . "'");
		}
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_speedy_order WHERE shipment_status != '-14' OR shipment_status is NULL AND status_id > 0");
		
		return $query->rows;
	}
	
	// данни за офиси и адреси
	public function getCitiesWithOffices() {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT city_id, name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_speedy_city_office GROUP BY city_id ORDER BY name" . $suffix;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCitiesWithMashines() {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT c.city_id, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_speedy_city_office c LEFT JOIN " . DB_PREFIX . "tk_speedy_office o ON c.city_id = o.city_id WHERE o.type = 'apt' GROUP BY city_id ORDER BY name" . $suffix;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getOffice($office_id) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT o.office_id, o.city_id, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address, eco.name" . $suffix . " AS office_city, eco.post_code FROM " . DB_PREFIX . "tk_speedy_office o LEFT JOIN " . DB_PREFIX . "tk_speedy_city_office eco ON eco.city_id = o.city_id WHERE o.office_id = '" . (int)$office_id . "'");
		
		return $query->row;
	}
	
	// заявки към апи на спиди за офиси и адреси
	public function getCountries($filter = NULL, $language = 'bg') {
		
		$countries = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language' => $language
		);
		
		if (isset($filter['country_id'])) {
			$siteData['countryId'] = $filter['country_id'];
		}
		if (isset($filter['name'])) {
			$siteData['name'] = $filter['name'];
		}
		if (isset($filter['iso_code_2'])) {
			$siteData['isoAlpha2'] = $filter['iso_code_2'];
		}
		if (!is_array($filter)) {
			$siteData['name'] = $filter;
		}
		
		$nomenclature = array(
			0 => 'NO',
			1 => 'FULL',
			2 => 'PARTIAL',
		);
		
		$siteResponse = $this->serviceJSON('location/country/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		foreach ($siteResponse['countries'] as $country) {
			
			if ($language == 'en') {
				$label = $country['nameEn'];
			} else {
				$label = $country['name'];
			}
			
			if (isset($country['currencyCode']) && $country['currencyCode']) {
				$currencyCode = $country['currencyCode'];
			} else {
				$currencyCode = '';
			}
			
			$countries[] = array(
				'id'                   => $country['id'],
				'name'                 => $label,
				'iso_code_2'           => $country['isoAlpha2'],
				'iso_code_3'           => $country['isoAlpha3'],
				'nomenclature'         => $nomenclature[$country['siteNomen']],
				'address_nomenclature' => $country['addressType'],
				'required_state'       => (int)$country['requireState'],
				'required_postcode'    => 1,
				'active_currency_code' => $currencyCode
			);
		}
		
		return $countries;
	}
	
	public function getStates($country_id, $name = NULL, $language = 'bg') {
		
		$states = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language'  => $language,
			'countryId' => $country_id,
			'name'      => $name
		);
		
		$siteResponse = $this->serviceJSON('location/state/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		foreach ($siteResponse['states'] as $state) {
			
			if ($language == 'en') {
				$label = $state['typeEn'] ? $state['typeEn'] . ' ' : '';
				$label .= $state['nameEn'];
			} else {
				$label = $state['type'] ? $state['type'] . ' ' : '';
				$label .= $state['name'];
			}
			
			$states[] = array(
				'id'         => $state['id'],
				'name'       => $label,
				'code'       => $state['isoAlpha '],
				'country_id' => $state['countryId']
			);
		}
		
		return $states;
	}
	
	public function getQuarters($name = NULL, $city_id = NULL, $language = 'bg') {
		
		$quarters = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language' => $language,
			'siteId'   => $city_id,
			'name'     => $name
		);
		
		$siteResponse = $this->serviceJSON('location/complex/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		foreach ($siteResponse['complexes'] as $quarter) {
			
			if ($language == 'en') {
				$label = $quarter['typeEn'] ? $quarter['typeEn'] . ' ' : '';
				$label .= $quarter['nameEn'];
			} else {
				$label = $quarter['type'] ? $quarter['type'] . ' ' : '';
				$label .= $quarter['name'];
			}
			
			$quarters[] = array(
				'id'    => $quarter['id'],
				'label' => $label,
				'value' => $label
			);
		}
		
		return $quarters;
	}
	
	public function getStreets($name = NULL, $city_id = NULL, $language = 'bg') {
		
		$streets = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language' => $language,
			'siteId'   => $city_id,
			'name'     => $name
		);
		
		$siteResponse = $this->serviceJSON('location/street/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		foreach ($siteResponse['streets'] as $street) {
			
			if ($language == 'en') {
				$label = $street['typeEn'] ? $street['typeEn'] . ' ' : '';
				$label .= $street['nameEn'];
			} else {
				$label = $street['type'] ? $street['type'] . ' ' : '';
				$label .= $street['name'];
			}
			
			$streets[] = array(
				'id'    => $street['id'],
				'label' => $label,
				'value' => $label
			);
		}
		
		return $streets;
	}
	
	public function getCities($name = NULL, $postcode = NULL, $country_id = NULL, $language = 'bg') {
		
		$cities = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language'  => $language,
			'countryId' => $country_id,
			'postCode'  => $postcode,
			'name'      => $name
		);
		
		$siteResponse = $this->serviceJSON('location/site/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		foreach ($siteResponse['sites'] as $city) {
			
			if (isset($city['postCode'])) {
				$postCode = $city['postCode'];
			} else {
				$postCode = 'a10' . $city['siteId'];
			}
			
			if ($language == 'en') {
				$label = $city['typeEn'] . ' ' . $city['nameEn'];
				$label .= $city['postCode'] ? ' (' . $city['postCode'] . ')' : '';
				$label .= ($city['municipalityEn'] && $city['municipalityEn'] != '-') ? ', Mun. ' . $city['municipalityEn'] : '';
				$label .= ($city['regionEn'] && $city['regionEn'] != '-') ? ', Area. ' . $city['regionEn'] : '';
			} else {
				$label = $city['type'] . ' ' . $city['name'];
				$label .= $city['postCode'] ? ' (' . $city['postCode'] . ')' : '';
				$label .= ($city['municipality'] && $city['municipality'] != '-') ? ', общ. ' . $city['municipality'] : '';
				$label .= ($city['region'] && $city['region'] != '-') ? ', обл. ' . $city['region'] : '';
			}
			
			$cities[] = array(
				'id'           => $city['id'],
				'label'        => $label,
				'value'        => $label,
				'postcode'     => $postCode,
				'nomenclature' => ''
			);
		}
		
		return $cities;
	}
	
	public function getOffices($name = NULL, $city_id = NULL, $language = 'bg', $country_id = 100) {
		
		$offices = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language'  => $language,
			'countryId' => $country_id,
			'siteId'    => $city_id,
			'name'      => $name
		);
		
		$siteResponse = $this->serviceJSON('location/office/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		foreach ($siteResponse['offices'] as $office) {
			if (isset($office['address']['postCode'])) {
				$postCode = $office['address']['postCode'];
			} else {
				$postCode = 'a10' . $office['siteId'];
			}
			$offices[] = array(
				'id'          => $office['id'],
				'name'        => $office['name'],
				'city_id'     => $office['siteId'],
				'address'     => $office['address']['fullAddressString'],
				'office_city' => $office['address']['siteName'],
				'label'       => $office['id'] . ' ' . $office['name'] . ', ' . $office['address']['fullAddressString'],
				'value'       => $office['name'],
				'post_code'   => $postCode
			);
		}
		
		return $offices;
	}
	
	public function getOfficeById($office_id, $language = 'bg') {
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData = array(
			'language' => $language
		);
		
		$siteResponse = $this->serviceJSON('location/office/' . $office_id, $siteData);
		
		$siteResponse = json_decode($siteResponse, true);
		
		return $siteResponse['office'];
	}
	
	// заявки към апи на спиди за услуги
	public function getServices($language = 'bg', $client_id = false) {
		
		$services = array();
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$siteData['language'] = $language;
		
		if ($client_id) {
			$siteData['clientId'] = $client_id;
		}
		
		$response = $this->serviceJSON('services/', $siteData);
		$response = json_decode($response, true);
		
		foreach ($response['services'] as $service) {
			if ($service['cargoType'] != 'PALLET') {
				if ($language == 'en') {
					$services[$service['id']] = $service['nameEn'];
				} else {
					$services[$service['id']] = $service['name'];
				}
			}
		}
		
		return $services;
	}
	
	public function getListContractClients() {
		
		$clients = array();
		$siteData = array();
		
		$response = $this->serviceJSON('client/contract/', $siteData);
		$response = json_decode($response, true);
		if (isset($response['clients'])) {
			foreach ($response['clients'] as $client) {
				
				$name = '';
				
				if (!empty($client['clientName'])) {
					$name .= $client['clientName'];
				}
				
				if (!empty($client['objectName'])) {
					$name .= ' - ' . $client['objectName'];
				}
				
				$clients[$client['clientId']] = array(
					'clientId' => $client['clientId'],
					'name'     => $name,
					'address'  => $client['address']['fullAddressString']
				);
			}
		}
		
		return $clients;
	}
	
	public function getServiceById($service_id, $client_id = false) {
		
		$siteData = array();
		
		if ($client_id) {
			$siteData['clientId'] = $client_id;
		}
		
		$response = $this->serviceJSON('services/', $siteData);
		$response = json_decode($response, true);
		
		$service = '';
		foreach ($response['services'] as $services) {
			if ($services['id'] == $service_id) {
				$service = $services;
			}
		}
		
		return $service;
	}
	
	// заявки към апи на спиди за товарителница
	public function calculate($data, $language = 'bg') {
		
		if ($data['country_id'] != 100) {
			$data['abroad'] = true;
		}
		
		// тотала спрямо валутата
		$currency = $this->registry->get('currency');
		if ($data['abroad'] && isset($data['active_currency_code']) && $currency->has($data['active_currency_code'])) {
			$data['total'] = $currency->convert($data['total'], 'BGN', $data['active_currency_code']);
		}
		
		// размер на пратката
		$parcelsArray = array();
		if (isset($data['count']) && $data['count'] == 1) {
			$parcelsCount = 0;
			if (isset($data['parcels_size']) && $data['parcels_size']) {
				foreach ($data['parcels_size'] as $seqNo => $parcels_size) {
					if ($parcelsCount == 0) {
						if ($parcels_size['width'] && $parcels_size['depth'] && $parcels_size['height'] && $parcels_size['weight']) {
							$parcelSizeArray = array(
								'width'  => $parcels_size['width'],
								'depth'  => $parcels_size['depth'],
								'height' => $parcels_size['height']
							);
							$parcelArray = array(
								'seqNo'  => $seqNo,
								'size'   => $parcelSizeArray,
								'weight' => $parcels_size['weight']
							);
						} else {
							$parcelArray = array(
								'seqNo'  => $seqNo,
								'weight' => $data['weight'] / $data['count']
							);
						}
						$parcelsArray[] = $parcelArray;
					}
					$parcelsCount++;
				}
			} else {
				$parcelArray = array(
					'seqNo'  => 1,
					'weight' => $data['weight'] / $data['count']
				);
				$parcelsArray[] = $parcelArray;
			}
		} else if ($data['count'] > 1) {
			$parcelsCount = 0;
			foreach ($data['parcels_size'] as $seqNo => $parcels_size) {
				if ($parcelsCount < $data['count']) {
					if ($parcels_size['width'] && $parcels_size['depth'] && $parcels_size['height'] && $parcels_size['weight']) {
						$parcelSizeArray = array(
							'width'  => $parcels_size['width'],
							'depth'  => $parcels_size['depth'],
							'height' => $parcels_size['height']
						);
						$parcelArray = array(
							'seqNo'  => $seqNo,
							'size'   => $parcelSizeArray,
							'weight' => $parcels_size['weight']
						);
					} else {
						
						$parcelArray = array(
							'seqNo'  => $seqNo,
							'weight' => $data['weight'] / $data['count']
						);
					}
					$parcelsArray[] = $parcelArray;
				}
				$parcelsCount++;
			}
		}
		
		$contentsArray = array(
			'parcelsCount' => $data['count'],
			'totalWeight'  => $data['weight'],
			'parcels'      => $parcelsArray
		);
		
		//от офис или адрес спярмо клиентски номер
		$senderArray = array(
			'clientId' => $data['client_id']
		);
		
		if ($this->config->get('shipping_tk_speedy_offices_id')) {
			$tk_speedy_offices_id = $this->config->get('shipping_tk_speedy_offices_id');
		} else {
			$tk_speedy_offices_id = array();
		}
		
		$tk_speedy_from_offices = $this->config->get('shipping_tk_speedy_from_offices');
		
		if (count($tk_speedy_offices_id) > 1 && isset($tk_speedy_offices_id[$data['client_id']]) && isset($tk_speedy_from_offices[$data['client_id']]) && $tk_speedy_offices_id[$data['client_id']] && $tk_speedy_from_offices[$data['client_id']]) {
			$senderArray['dropoffOfficeId'] = $tk_speedy_offices_id[$data['client_id']];
		} else if ($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')) {
			$senderArray['dropoffOfficeId'] = $this->config->get('shipping_tk_speedy_office_id');
		}
		
		// тип на доставката
		$serviceArray = array(
			'autoAdjustPickupDate' => true,
			'serviceIds'           => $this->config->get('shipping_tk_speedy_allowed_methods')
		);
		
		//наложено плащане
		if (isset($data['cod']) && $data['cod'] == 1) {
			if ($this->config->get('shipping_tk_speedy_ppp_enabled') && $this->config->get('shipping_tk_speedy_ppp_enabled') == 1 && $data['country_id'] == 100) {
				$cashOnDeliveryArray = array(
					'amount'         => $data['total'],
					'processingType' => 'POSTAL_MONEY_TRANSFER'
				);
			} else {
				$cashOnDeliveryArray = array(
					'amount'         => $data['total'],
					'processingType' => 'CASH'
				);
			}
			$serviceArray['additionalServices']['cod'] = $cashOnDeliveryArray;
		}
		
		// преглед и тест
		$obp = !empty($data['option_before_payment']) ? $data['option_before_payment'] : $this->config->get('shipping_tk_speedy_option_before_payment');
		if ($data['cod'] == 0) {
			$obp = 'no_option';
		}
		if ($obp != 'no_option') {
			
			if ($obp == 'open') {
				$obpdArray['option'] = 'OPEN';
			} else if ($obp == 'test') {
				$obpdArray['option'] = 'TEST';
			}
			
			$obpdArray['returnShipmentServiceId'] = $this->config->get('shipping_tk_speedy_return_package_city_service_id');
			
			if (isset($data['return_payer_type']) && $data['return_payer_type'] == 1) {
				$obpdArray['returnShipmentPayer'] = 'RECIPIENT';
			} else if (isset($data['return_payer_type']) && $data['return_payer_type'] == 2) {
				$obpdArray['returnShipmentPayer'] = 'THIRD_PARTY';
				$obpdArray['thirdPartyClientId'] = $this->config->get('shipping_tk_speedy_client_id');
			} else {
				$obpdArray['returnShipmentPayer'] = 'SENDER';
			}
			
			$serviceArray['additionalServices']['obpd'] = $obpdArray;
		}
		
		//обявена стойност + чупливо
		if (isset($data['insurance']) && $data['insurance'] == 1) {
			if (isset($data['fragile']) && $data['fragile'] == 1) {
				$fragile = true;
			} else {
				$fragile = false;
			}
			$declaredValueArray = array(
				'amount'  => $data['totalNoShipping'],
				'fragile' => $fragile
			);
			
			$serviceArray['additionalServices']['declaredValue'] = $declaredValueArray;
		}
		
		//страна по плащането
		if ($data['country_id'] == 100) {
			if (isset($data['payer_type']) && $data['payer_type'] == 1) {
				$paymentsArray['courierServicePayer'] = 'RECIPIENT';
			} else if (isset($data['payer_type']) && $data['payer_type'] == 2) {
				$paymentsArray['courierServicePayer'] = 'THIRD_PARTY';
				$paymentsArray['thirdPartyClientId'] = $this->config->get('shipping_tk_speedy_client_id');
			} else {
				$paymentsArray['courierServicePayer'] = 'SENDER';
			}
		} else {
			$paymentsArray['courierServicePayer'] = 'SENDER';
		}
		
		if (isset($serviceArray['additionalServices']['declaredValue']) && $serviceArray['additionalServices']['declaredValue']) {
			if (isset($data['payer_type']) && $data['payer_type'] == 1) {
				$paymentsArray['declaredValuePayer'] = 'RECIPIENT';
			} else if (isset($data['payer_type']) && $data['payer_type'] == 2) {
				$paymentsArray['declaredValuePayer'] = 'THIRD_PARTY';
				$paymentsArray['thirdPartyClientId'] = $this->config->get('shipping_tk_speedy_client_id');
			} else {
				$paymentsArray['declaredValuePayer'] = 'SENDER';
			}
		}
		
		if ($this->config->get('shipping_tk_speedy_administrative_fee') && $this->config->get('shipping_tk_speedy_administrative_fee') > 0) {
			$paymentsArray['administrativeFee'] = 1;
		}
		
		if ($this->config->get('shipping_tk_speedy_discount_contract_id') && $this->config->get('shipping_tk_speedy_discount_card_id')) {
			$paymentsArray['discountCardId'] = array(
				'contractId' => $this->config->get('shipping_tk_speedy_discount_contract_id'),
				'cardId'     => $this->config->get('shipping_tk_speedy_discount_card_id')
			);
		}
		
		// допълнително изискване при обслужване
		if ($this->config->get('shipping_tk_speedy_special_delivery_requirement_id') && $this->config->get('shipping_tk_speedy_special_delivery_requirement_id') > 0) {
			$serviceArray['additionalServices']['specialDeliveryId'] = $this->config->get('shipping_tk_speedy_special_delivery_requirement_id');
		}
		
		if (isset($data['to_office']) && $data['to_office']) {
			//доставка до офис автомат
			if ($data['country_id'] == 100) {
				$recipientArray = array(
					'privatePerson'  => true,
					'pickupOfficeId' => $data['office_id']
				);
			} else {
				$recipientArray = array(
					'privatePerson'   => true,
					'addressLocation' => array(
						'countryId'      => $data['country_id'],
						'siteId'         => $data['city_id'],
						'pickupOfficeId' => $data['office_id']
					)
				);
			}
		} else {
			//доставка до адрес
			if ($data['country_id'] == 100) {
				$recipientArray = array(
					'privatePerson'   => true,
					'addressLocation' => array(
						'siteId' => $data['city_id'],
					)
				);
			} else {
				$recipientArray = array(
					'privatePerson'   => true,
					'addressLocation' => array(
						'countryId' => $data['country_id'],
						'siteId'    => $data['city_id']
					)
				);
			}
		}
		
		$calculateData = array(
			'language'  => $language,
			'sender'    => $senderArray,
			'recipient' => $recipientArray,
			'service'   => $serviceArray,
			'content'   => $contentsArray,
			'payment'   => $paymentsArray
		);
		
		$response = $this->serviceJSON('calculate/', $calculateData);
		
		return json_decode($response, true);
	}
	
	public function create($data, $order, $language = 'bg') {
		
		if ($data['country_id'] != 100) {
			$data['abroad'] = true;
		}
		
		// тотала спрямо валутата
		$currency = $this->registry->get('currency');
		if ($data['abroad'] && isset($data['active_currency_code']) && $currency->has($data['active_currency_code'])) {
			$data['total'] = $currency->convert($data['total'], 'BGN', $data['active_currency_code']);
		}
		
		// размер на пратката
		$parcelsArray = array();
		if (isset($data['count']) && $data['count'] == 1) {
			$parcelsCount = 0;
			if (isset($data['parcels_size']) && $data['parcels_size']) {
				foreach ($data['parcels_size'] as $seqNo => $parcels_size) {
					if ($parcelsCount == 0) {
						if ($parcels_size['width'] && $parcels_size['depth'] && $parcels_size['height'] && $parcels_size['weight']) {
							$parcelSizeArray = array(
								'width'  => $parcels_size['width'],
								'depth'  => $parcels_size['depth'],
								'height' => $parcels_size['height']
							);
							$parcelArray = array(
								'seqNo'  => $seqNo,
								'size'   => $parcelSizeArray,
								'weight' => $parcels_size['weight']
							);
						} else {
							$parcelArray = array(
								'seqNo'  => $seqNo,
								'weight' => $data['weight'] / $data['count']
							);
						}
						$parcelsArray[] = $parcelArray;
					}
					$parcelsCount++;
				}
			} else {
				$parcelArray = array(
					'seqNo'  => 1,
					'weight' => $data['weight'] / $data['count']
				);
				$parcelsArray[] = $parcelArray;
			}
		} else if ($data['count'] > 1) {
			$parcelsCount = 0;
			foreach ($data['parcels_size'] as $seqNo => $parcels_size) {
				if ($parcelsCount < $data['count']) {
					if ($parcels_size['width'] && $parcels_size['depth'] && $parcels_size['height'] && $parcels_size['weight']) {
						$parcelSizeArray = array(
							'width'  => $parcels_size['width'],
							'depth'  => $parcels_size['depth'],
							'height' => $parcels_size['height']
						);
						$parcelArray = array(
							'seqNo'  => $seqNo,
							'size'   => $parcelSizeArray,
							'weight' => $parcels_size['weight']
						);
					} else {
						
						$parcelArray = array(
							'seqNo'  => $seqNo,
							'weight' => $data['weight'] / $data['count']
						);
					}
					$parcelsArray[] = $parcelArray;
				}
				$parcelsCount++;
			}
		}
		
		$contentsArray = array(
			'parcelsCount' => $data['count'],
			'totalWeight'  => $data['weight'],
			'parcels'      => $parcelsArray,
			'contents'     => $data['contents'],
			'package'      => $data['packing']
		);
		
		// данни за изпращач
		
		$tk_speedy_telephone_client = $this->config->get('shipping_tk_speedy_telephone_client');
		if (!empty($tk_speedy_telephone_client[$data['client_id']])) {
			$phone1 = $tk_speedy_telephone_client[$data['client_id']];
		} else {
			$phone1 = $this->config->get('shipping_tk_speedy_telephone');
		}
		
		$tk_speedy_name_client = $this->config->get('shipping_tk_speedy_name_client');
		if (!empty($tk_speedy_name_client[$data['client_id']])) {
			$contactName = $tk_speedy_name_client[$data['client_id']];
		} else {
			$contactName = $this->config->get('shipping_tk_speedy_name');
		}
		
		$senderArray = array(
			'phone1'      => array('number' => $phone1),
			'contactName' => $contactName,
			'clientId'    => $data['client_id']
		);
		
		if ($this->config->get('shipping_tk_speedy_offices_id')) {
			$tk_speedy_offices_id = $this->config->get('shipping_tk_speedy_offices_id');
		} else {
			$tk_speedy_offices_id = array();
		}
		
		$tk_speedy_from_offices = $this->config->get('shipping_tk_speedy_from_offices');
		
		if (count($tk_speedy_offices_id) > 1 && isset($tk_speedy_offices_id[$data['client_id']]) && isset($tk_speedy_from_offices[$data['client_id']]) && $tk_speedy_offices_id[$data['client_id']] && $tk_speedy_from_offices[$data['client_id']]) {
			$senderArray['dropoffOfficeId'] = $tk_speedy_offices_id[$data['client_id']];
		} else if ($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id')) {
			$senderArray['dropoffOfficeId'] = $this->config->get('shipping_tk_speedy_office_id');
		}
		
		// тип на доставката
		$serviceArray = array(
			'autoAdjustPickupDate' => true,
			'serviceId'            => $data['shipping_method_id']
		);
		
		// дни за отлагане
		if (isset($data['deffered_days']) && $data['deffered_days'] > 0) {
			$serviceArray['deferredDays'] = $data['deffered_days'];
		}
		
		//наложено плащане
		if (isset($data['cod']) && $data['cod'] == 1) {
			if ($this->config->get('shipping_tk_speedy_ppp_enabled') && $this->config->get('shipping_tk_speedy_ppp_enabled') == 1 && $data['country_id'] == 100) {
				$cashOnDeliveryArray = array(
					'amount'         => $data['total'],
					'processingType' => 'POSTAL_MONEY_TRANSFER'
				);
			} else {
				$cashOnDeliveryArray = array(
					'amount'         => $data['total'],
					'processingType' => 'CASH'
				);
			}
			$serviceArray['additionalServices']['cod'] = $cashOnDeliveryArray;
		}
		
		// преглед и тест
		$obp = !empty($data['option_before_payment']) ? $data['option_before_payment'] : $this->config->get('shipping_tk_speedy_option_before_payment');
		if ($data['cod'] == 0) {
			$obp = 'no_option';
		}
		if ($obp != 'no_option') {
			
			if ($obp == 'open') {
				$obpdArray['option'] = 'OPEN';
			} else if ($obp == 'test') {
				$obpdArray['option'] = 'TEST';
			}
			
			$obpdArray['returnShipmentServiceId'] = $this->config->get('shipping_tk_speedy_return_package_city_service_id');
			
			if (isset($data['return_payer_type']) && $data['return_payer_type'] == 1) {
				$obpdArray['returnShipmentPayer'] = 'RECIPIENT';
			} else if (isset($data['return_payer_type']) && $data['return_payer_type'] == 2) {
				$obpdArray['returnShipmentPayer'] = 'THIRD_PARTY';
				$obpdArray['thirdPartyClientId'] = $this->config->get('shipping_tk_speedy_client_id');
			} else {
				$obpdArray['returnShipmentPayer'] = 'SENDER';
			}
			
			$serviceArray['additionalServices']['obpd'] = $obpdArray;
		}
		
		//обявена стойност + чупливо
		if (isset($data['insurance']) && $data['insurance'] == 1) {
			if (isset($data['fragile']) && $data['fragile'] == 1) {
				$fragile = true;
			} else {
				$fragile = false;
			}
			$declaredValueArray = array(
				'amount'  => $data['totalNoShipping'],
				'fragile' => $fragile
			);
			
			$serviceArray['additionalServices']['declaredValue'] = $declaredValueArray;
		}
		
		//страна по плащането
		if ($data['country_id'] == 100) {
			if (isset($data['payer_type']) && $data['payer_type'] == 1) {
				$paymentsArray['courierServicePayer'] = 'RECIPIENT';
			} else if (isset($data['payer_type']) && $data['payer_type'] == 2) {
				$paymentsArray['courierServicePayer'] = 'THIRD_PARTY';
				$paymentsArray['thirdPartyClientId'] = $this->config->get('shipping_tk_speedy_client_id');
			} else {
				$paymentsArray['courierServicePayer'] = 'SENDER';
			}
		} else {
			$paymentsArray['courierServicePayer'] = 'SENDER';
		}
		
		if (isset($serviceArray['additionalServices']['declaredValue']) && $serviceArray['additionalServices']['declaredValue']) {
			if (isset($data['payer_type']) && $data['payer_type'] == 1) {
				$paymentsArray['declaredValuePayer'] = 'RECIPIENT';
			} else if (isset($data['payer_type']) && $data['payer_type'] == 2) {
				$paymentsArray['declaredValuePayer'] = 'THIRD_PARTY';
				$paymentsArray['thirdPartyClientId'] = $this->config->get('shipping_tk_speedy_client_id');
			} else {
				$paymentsArray['declaredValuePayer'] = 'SENDER';
			}
		}
		
		if ($this->config->get('shipping_tk_speedy_administrative_fee') && $this->config->get('shipping_tk_speedy_administrative_fee') > 0) {
			$paymentsArray['administrativeFee'] = 1;
		}
		
		if ($this->config->get('shipping_tk_speedy_discount_contract_id') && $this->config->get('shipping_tk_speedy_discount_card_id')) {
			$paymentsArray['discountCardId'] = array(
				'contractId' => $this->config->get('shipping_tk_speedy_discount_contract_id'),
				'cardId'     => $this->config->get('shipping_tk_speedy_discount_card_id')
			);
		}
		
		// допълнително изискване при обслужване
		if ($this->config->get('shipping_tk_speedy_special_delivery_requirement_id') && $this->config->get('shipping_tk_speedy_special_delivery_requirement_id') > 0) {
			$serviceArray['additionalServices']['specialDeliveryId'] = $this->config->get('shipping_tk_speedy_special_delivery_requirement_id');
		}

        // Заявка за обратни документи
        if ($this->config->get('shipping_tk_speedy_back_documents') && $this->config->get('shipping_tk_speedy_back_documents') > 0) {
            $serviceArray['additionalServices']['returns']['rod']['enabled'] = true;
        }

        // Заявка за обратна разписка
        if ($this->config->get('shipping_tk_speedy_back_receipt') && $this->config->get('shipping_tk_speedy_back_receipt') > 0) {
            $serviceArray['additionalServices']['returns']['returnReceipt']['enabled'] = true;
        }

        // Заявка за обратна пратка
        if (isset($data['swap']) && $data['swap'] > 0 && $this->config->get('shipping_tk_speedy_return_package_intercity_service_id')) {
            $serviceArray['additionalServices']['returns']['swap']['serviceId'] = $this->config->get('shipping_tk_speedy_return_package_intercity_service_id');
            $serviceArray['additionalServices']['returns']['swap']['parcelsCount'] = 1;
        }

		// данни за получател
        if($data['custmer_contact']){
            $recipientArray = array(
                'privatePerson' => false,
                'phone1'        => array('number' => $data['custmer_telephone']),
                'email'         => $data['custmer_email'],
                'clientName'    => $data['custmer_name'],
                'contactName'    => $data['custmer_contact']
            );
        } else {
            $recipientArray = array(
                'privatePerson' => true,
                'phone1'        => array('number' => $data['custmer_telephone']),
                'email'         => $data['custmer_email'],
                'clientName'    => $data['custmer_name']
            );
        }

		if (isset($data['to_office']) && $data['to_office']) {
			
			//доставка до офис автомат
			if ($data['country_id'] != 100) {
				$recipientArray['countryId'] = $data['country_id'];
				$recipientArray['siteId'] = $data['city_id'];
			}
			$recipientArray['pickupOfficeId'] = $data['office_id'];
		} else {
			
			//доставка до адрес
			if (isset($data['city_id']) && $data['city_id']) {
				$address['siteId'] = $data['city_id'];
			} else {
				$address['siteId'] = false;
			}
			
			if (!$address['siteId'] && isset($data['city']) && $data['city']) {
				$address['siteName'] = $data['city'];
			}
			
			if (isset($data['postcode']) && $data['postcode']) {
				$address['postCode'] = $data['postcode'];
			}
			
			if (isset($data['country_id']) && $data['country_id']) {
				$address['countryId'] = $data['country_id'];
			}
			
			if (isset($data['state_id']) && $data['state_id']) {
				$address['stateId'] = $data['state_id'];
			}
			
			if (isset($data['quarter']) && $data['quarter']) {
				$address['complexName'] = $data['quarter'];
			}
			
			if (isset($data['quarter_id']) && $data['quarter_id']) {
				$address['complexId'] = $data['quarter_id'];
			}
			
			if (isset($data['street']) && $data['street']) {
				$address['streetName'] = $data['street'];
			}
			
			if (isset($data['street_id']) && $data['street_id']) {
				$address['streetId'] = $data['street_id'];
			} else {
				$address['streetId'] = '';
			}
			
			if (isset($data['street_no']) && $data['street_no']) {
				$address['streetNo'] = $data['street_no'];
			}
			
			if (isset($data['block_no']) && $data['block_no']) {
				$address['blockNo'] = $data['block_no'];
			}
			
			if (isset($data['entrance_no']) && $data['entrance_no']) {
				$address['entranceNo'] = $data['entrance_no'];
			}
			
			if (isset($data['floor_no']) && $data['floor_no']) {
				$address['floorNo'] = $data['floor_no'];
			}
			
			if (isset($data['apartment_no']) && $data['apartment_no']) {
				$address['apartmentNo'] = $data['apartment_no'];
			}
			
			if (isset($data['note']) && $data['note']) {
				$address['addressNote'] = $data['note'];
			}
			
			$recipientArray['address'] = $address;
		}
		
		$calculateData = array(
			'language'       => $language,
			'sender'         => $senderArray,
			'recipient'      => $recipientArray,
			'service'        => $serviceArray,
			'content'        => $contentsArray,
			'payment'        => $paymentsArray,
			'ref1'           => $order['order_id'],
			//'clientSystemId' => '1310221366'
			//OpenCart
		);

		if (isset($data['client_note']) && $data['client_note']) {
			$calculateData['shipmentNote'] = $data['client_note'];
		}
		
		$response = $this->serviceJSON('shipment/', $calculateData);
		
		return json_decode($response, true);
	}
	
	public function createPDF($bol_id) {
		
		$parcelsArray = array(
			array('parcel' => array('id' => $bol_id)),
		);
		
		if ($this->config->get('shipping_tk_speedy_label_printer')) {
			$jsonData = array(
				'paperSize' => 'A6',
				'parcels'   => $parcelsArray
			);
		} else {
			$jsonData = array(
				'paperSize' => 'A4',
				'parcels'   => $parcelsArray
			);
		}
		
		$siteResponse = $this->serviceJSON('print/', $jsonData);
		$response = json_decode($siteResponse, true);
		
		if (isset($response['error']['message'])) {
			return $response;
		} else {
			return $siteResponse;
		}
	}
	
	public function createPDFS($parcels) {
		
		$parcelsArray = array();
		foreach ($parcels as $parcel) {
			$parcelsArray[] = array('parcel' => array('id' => $parcel['id']));
		}
		
		if ($this->config->get('shipping_tk_speedy_label_printer')) {
			$jsonData = array(
				'paperSize' => 'A6',
				'parcels'   => $parcelsArray
			);
		} else {
			$jsonData = array(
				'paperSize' => 'A4',
				'parcels'   => $parcelsArray
			);
		}
		
		$siteResponse = $this->serviceJSON('print/', $jsonData);
		$response = json_decode($siteResponse, true);
		
		if (isset($response['error']['message'])) {
			return $response;
		} else {
			return $siteResponse;
		}
	}
	
	public function cancel($bol_id) {
		
		$jsonData = array(
			'comment'    => 'Анулиране',
			'shipmentId' => $bol_id
		);
		$siteResponse = $this->serviceJSON('shipment/cancel/', $jsonData);
		$response = json_decode($siteResponse, true);
		
		if (isset($response['error']['message'])) {
			return $response;
		} else {
			return true;
		}
	}
	
	// ъпдейт на офиси и адреси
	public function updateOffices() {
		
		$cities = array();
		
		$officesDataBG = array(
			'language'  => 'BG',
			'countryId' => 100
		);
		
		$officesResponseBG = $this->serviceJSON('location/office/', $officesDataBG);
		$officesResponseBG = json_decode($officesResponseBG, true);
		
		if (isset($officesResponseBG['offices'])) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_speedy_office");
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_speedy_city_office");
			foreach ($officesResponseBG['offices'] as $office) {
				$offices = array(
					'office_id'  => $office['id'],
					'name'       => mb_convert_case($office['name'], MB_CASE_TITLE, "UTF-8"),
					'name_en'    => mb_convert_case($office['nameEn'], MB_CASE_TITLE, "UTF-8"),
					'address'    => mb_convert_case($office['address']['siteName'] . ', ' . $office['address']['localAddressString'], MB_CASE_TITLE, "UTF-8"),
					'address_en' => mb_convert_case($office['address']['siteName'] . ', ' . $office['address']['localAddressString'], MB_CASE_TITLE, "UTF-8"),
					'city_id'    => mb_convert_case($office['siteId'], MB_CASE_TITLE, "UTF-8"),
					'type'       => mb_convert_case($office['type'], MB_CASE_LOWER, "UTF-8")
				);
				
				$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_speedy_office SET office_id = '" . (int)$offices['office_id'] . "', name = '" . $this->db->escape($offices['name']) . "', name_en = '" . $this->db->escape($offices['name_en']) . "', address = '" . $this->db->escape($offices['address']) . "', address_en = '" . $this->db->escape($offices['address_en']) . "', city_id = '" . (int)$offices['city_id'] . "', type = '" . $this->db->escape($offices['type']) . "'");
				
				if (isset($office['address']['postCode'])) {
					$postCode = $office['address']['postCode'];
				} else {
					$postCode = 'a10' . $office['address']['siteId'];
				}
				
				$cities[] = array(
					'city_id'   => $office['siteId'],
					'post_code' => $postCode,
					'type'      => mb_convert_case($office['address']['siteType'], MB_CASE_LOWER, "UTF-8"),
					'name'      => mb_convert_case($office['address']['siteName'], MB_CASE_TITLE, "UTF-8"),
					'name_en'   => mb_convert_case($office['address']['siteName'], MB_CASE_TITLE, "UTF-8")
				);
				$cities = array_unique($cities, SORT_REGULAR);
			}
			
			foreach ($cities as $citie) {
				$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_speedy_city_office SET city_id = '" . (int)$citie['city_id'] . "', post_code = '" . $this->db->escape($citie['post_code']) . "', type = '" . $this->db->escape($citie['type']) . "', name = '" . $this->db->escape($citie['name']) . "', name_en = '" . $this->db->escape($citie['name_en']) . "'");
			}
		} else {
			return false;
		}
		
		$officesDataEN = array(
			'language'  => 'EN',
			'countryId' => 100
		);
		
		$officesResponseEN = $this->serviceJSON('location/office/', $officesDataEN);
		$officesResponseEN = json_decode($officesResponseEN, true);
		
		if (isset($officesResponseEN['offices'])) {
			foreach ($officesResponseEN['offices'] as $office) {
				$address_en = mb_convert_case($office['address']['siteName'] . ', ' . $office['address']['localAddressString'], MB_CASE_TITLE, "UTF-8");
				
				$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_office SET address_en = '" . $this->db->escape($address_en) . "' WHERE office_id = '" . (int)$office['id'] . "'");
				
				$name_en = mb_convert_case($office['address']['siteName'], MB_CASE_TITLE, "UTF-8");
				
				$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_city_office SET name_en = '" . $this->db->escape($name_en) . "' WHERE city_id = '" . (int)$office['address']['siteId'] . "'");
			}
		} else {
			return false;
		}
		
		return true;
	}
	
	// ъпдейт на товарителници
	public function editShipment($order_id, $response) {
		
		$speedy_order_info = $this->getOrder($order_id);
		if (isset($speedy_order_info['data']) && $speedy_order_info['data']) {
			$speedy_order_data = unserialize($speedy_order_info['data']);
		} else {
			$speedy_order_data = array();
		}
		
		if (isset($response['parcels']) && $response['parcels']) {
			$speedy_order_data['parcels'] = $response['parcels'];
		}
		
		if (!isset($response['bol_id']) || !$response['bol_id']) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_order SET status_id = '0', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, data = '" . $this->db->escape(serialize($speedy_order_data)) . "', mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			if ($this->db->escape($response['bol_status']) == 128) {
				$shipment_number = NULL;
			} else {
				$shipment_number = $response['bol_id'];
			}
			
			$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_order SET status_id = '1', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status = '" . $this->db->escape($response['bol_status']) . "', shipment_status_txt = '" . $this->db->escape($response['bol_status_text']) . "', pdf = '" . $this->db->escape($response['pdf']) . "', data = '" . $this->db->escape(serialize($speedy_order_data)) . "', mail_send = '" . $this->db->escape($response['bol_status']) . "' WHERE order_id  = '" . (int)$order_id . "'");
		}
	}
	
	public function trackShipment($bol_id, $language = 'bg') {
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$parcelsArray = array(
			array('id' => $bol_id)
		);
		
		$jsonData = array(
			'language'          => $language,
			'parcels'           => $parcelsArray,
			'lastOperationOnly' => true
		);
		
		$siteResponse = $this->serviceJSON('track/', $jsonData);
		$response = json_decode($siteResponse, true);
		
		$parcels = array();
		if (isset($response['parcels']) && $response['parcels']) {
			foreach ($response['parcels'] as $parcel) {
				if (isset($parcel['operations'][0]['operationCode']) && $parcel['operations'][0]['operationCode']) {
					$parcels['code'] = $parcel['operations'][0]['operationCode'];
					$parcels['description'] = $parcel['operations'][0]['description'];
				} else {
					$parcels['code'] = '148';
					$parcels['description'] = 'Получена информация за пратка';
				}
			}
		} else {
			$parcels['code'] = '00';
			$parcels['description'] = 'Липсва информация';
		}
		
		if (isset($response['error']['message'])) {
			return $response;
		} else {
			return $parcels;
		}
	}
	
	// връзка със спиди
	public function serviceJSON($url, $data) {
		
		$curl = curl_init('https://api.speedy.bg/v1/' . $url);
		
		if (!isset($data['userName']) && !isset($data['password'])) {
			$data['userName'] = $this->config->get('shipping_tk_speedy_username');
			$data['password'] = $this->config->get('shipping_tk_speedy_password');
		}
		
		$ip = $this->getClientIp();
		
		$json_data = json_encode($data);
		
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json",
			"X-Forwarded-For: $ip"
		));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		
		$jsonResponse = curl_exec($curl);
		
		if ($this->config->get('module_tk_checkout_debug')) {
			if ($jsonResponse === false) {
				$this->log->write(curl_error($curl));
			}
		}
		
		return ($jsonResponse);
	}
	
	public function getClientIp() {
		
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ipress = $_SERVER['HTTP_CLIENT_IP'];
		} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ipress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
			$ipress = $_SERVER['HTTP_X_FORWARDED'];
		} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
			$ipress = $_SERVER['HTTP_FORWARDED_FOR'];
		} else if (isset($_SERVER['HTTP_FORWARDED'])) {
			$ipress = $_SERVER['HTTP_FORWARDED'];
		} else if (isset($_SERVER['REMOTE_ADDR'])) {
			$ipress = $_SERVER['REMOTE_ADDR'];
		} else {
			$ipress = '127.0.0.1';
		}
		
		return $ipress;
	}
}