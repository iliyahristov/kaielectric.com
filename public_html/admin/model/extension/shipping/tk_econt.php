<?php

class ModelExtensionShippingTkEcont extends Model {
	
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
				'operation' => $this->base64url_encode('install_econt')
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
					
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_office` (" . $this->base64url_decode($result->tk_econt_office) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_city` (" . $this->base64url_decode($result->tk_econt_city) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_quarter` (" . $this->base64url_decode($result->tk_econt_quarter) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_street` (" . $this->base64url_decode($result->tk_econt_street) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_customer` (" . $this->base64url_decode($result->tk_econt_customer) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_order` (" . $this->base64url_decode($result->tk_econt_order) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				} else if (!empty($result->error)) {
					if (!empty($result->error_module)) {
						$this->load->model('setting/setting');
						$data = $this->model_setting_setting->getSetting('shipping_tk_econt');
						$data['shipping_tk_econt_logged'] = false;
						$data['shipping_tk_econt_status'] = 0;
						$this->model_setting_setting->editSetting('shipping_tk_econt', $data);
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
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_office` LIKE 'office_code' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_office MODIFY `office_code` varchar(20)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_customer` LIKE 'office_code' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_customer MODIFY `office_code` varchar(20)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'office_code' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order MODIFY `office_code` varchar(20)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'mail_send' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order ADD `mail_send` varchar(512) DEFAULT NULL");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'sms' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order ADD `sms` int(11) NOT NULL DEFAULT '0'");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_city` LIKE 'is_office' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_city ADD `is_office` tinyint(1)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_city` LIKE 'is_machine' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_city ADD `is_machine` tinyint(1)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'shipment_number' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order ADD `shipment_number` bigint(20)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'shipment_status_txt' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order ADD `shipment_status_txt` varchar(512)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'shipment_status' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order ADD `shipment_status` varchar(256)");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_econt_order` LIKE 'pdf' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_econt_order ADD `pdf` varchar(512)");
		}
	}
	
	public function deleteTables() {
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_office`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_city`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_quarter`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_street`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_customer`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_order`");
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
			'operation' => $this->base64url_encode('settings_econt')
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
				$data = $this->model_setting_setting->getSetting('shipping_tk_econt');
				$data['shipping_tk_econt_logged'] = false;
				$data['shipping_tk_econt_status'] = 0;
				$this->model_setting_setting->editSetting('shipping_tk_econt', $data);
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
	public function validateAddress($data) {
		
		$sql = "SELECT COUNT(c.city_id) AS total FROM " . DB_PREFIX . "tk_econt_city c LEFT JOIN " . DB_PREFIX . "tk_econt_quarter q ON (c.city_id = q.city_id) LEFT JOIN " . DB_PREFIX . "tk_econt_street s ON (c.city_id = s.city_id) WHERE TRIM(c.post_code) = '" . $this->db->escape(trim($data['postcode'])) . "' AND (LCASE(TRIM(c.name)) = '" . $this->db->escape(utf8_strtolower(trim($data['city']))) . "' OR LCASE(TRIM(c.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($data['city']))) . "')";
		
		if ($data['quarter']) {
			$sql .= " AND (LCASE(TRIM(q.name)) = '" . $this->db->escape(utf8_strtolower(trim($data['quarter']))) . "' OR LCASE(TRIM(q.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($data['quarter']))) . "')";
		}
		
		if ($data['street']) {
			$sql .= " AND (LCASE(TRIM(s.name)) = '" . $this->db->escape(utf8_strtolower(trim($data['street']))) . "' OR LCASE(TRIM(s.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($data['street']))) . "')";
		}
		
		$query = $this->db->query($sql);
		
		return $query->row['total'];
	}
	
	// обработваме данните за поръчката
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function updateOrder($data) {
		
		$econt_order = $this->getOrder($data['order_id']);
		
		if (isset($econt_order) && $econt_order) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '" . (int)$data['status_id'] . "', shipping_to = '" . $this->db->escape($data['shipping_to']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', city = '" . $this->db->escape($data['city']) . "', quarter = '" . $this->db->escape($data['quarter']) . "', street = '" . $this->db->escape($data['street']) . "', street_num = '" . $this->db->escape($data['street_num']) . "', other = '" . $this->db->escape($data['other']) . "', city_id = '" . (int)$data['city_id'] . "', office_id = '" . (int)$data['office_id'] . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', date_delivery = '" . $this->db->escape($data['date_delivery']) . "' WHERE order_id  = '" . (int)$data['order_id'] . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_econt_order SET order_id = '" . (int)$data['order_id'] . "', status_id = '" . (int)$data['status_id'] . "', shipping_to = '" . $this->db->escape($data['shipping_to']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', city = '" . $this->db->escape($data['city']) . "', quarter = '" . $this->db->escape($data['quarter']) . "', street = '" . $this->db->escape($data['street']) . "', street_num = '" . $this->db->escape($data['street_num']) . "', other = '" . $this->db->escape($data['other']) . "', city_id = '" . (int)$data['city_id'] . "', office_id = '" . (int)$data['office_id'] . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', date_delivery = '" . $this->db->escape($data['date_delivery']) . "'");
		}
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_order WHERE status_id > 0 AND shipment_status != 'payed' AND shipment_status != 'client' AND shipment_status != 'return' AND shipment_status != 'deleted' AND shipment_status != 'destroy' AND shipment_status != 'error' OR shipment_status is NULL");
		
		return $query->rows;
	}
	
	public function getOrderPayment($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_payment WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	// данни за офиси и адреси
	public function getOfficesByCityId($city_id, $is_machine = 0) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address FROM " . DB_PREFIX . "tk_econt_office o WHERE o.city_id = '" . (int)$city_id . "' AND o.is_machine = '" . (int)$is_machine . "' GROUP BY o.office_id ORDER BY o.name" . $suffix;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getOffice($office_id) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT o.office_id, o.city_id, o.office_code, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address, eco.name" . $suffix . " AS office_city, eco.post_code FROM " . DB_PREFIX . "tk_econt_office o LEFT JOIN " . DB_PREFIX . "tk_econt_city eco ON eco.city_id = o.city_id WHERE o.office_id = '" . (int)$office_id . "'");
		
		return $query->row;
	}
	
	public function getOfficeByOfficeCode($office_code) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT o.office_id, o.city_id, o.office_code, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address, eco.name" . $suffix . " AS office_city, eco.post_code FROM " . DB_PREFIX . "tk_econt_office o LEFT JOIN " . DB_PREFIX . "tk_econt_city eco ON eco.city_id = o.city_id WHERE o.office_code = '" . $office_code . "'");
		
		if ($query->num_rows == 1) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function getCities($is_office = 0, $is_machine = 0) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		if ($is_machine == 1) {
			$sql = "SELECT city_id, name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city WHERE is_office = '" . (int)$is_office . "' AND is_machine = '" . (int)$is_machine . "' GROUP BY city_id ORDER BY name" . $suffix;
		} else {
			$sql = "SELECT city_id, name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city WHERE is_office = '" . (int)$is_office . "' GROUP BY city_id ORDER BY name" . $suffix;
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCity($city_id) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT c.city_id, c.post_code, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city c WHERE city_id = '" . (int)$city_id . "'";
		
		$query = $this->db->query($sql);
		if ($query->num_rows == 1) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function getQuarters($name, $city_id, $limit = 10) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, q.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_quarter q WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(q.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(q.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND q.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY q.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getStreets($name, $city_id, $limit = 10) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, s.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_street s WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(s.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(s.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND s.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY s.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCityByName($name, $limit = 20) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city c WHERE";
		
		if ($name) {
			$sql .= " (LCASE(c.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(c.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		$sql .= " ORDER BY c.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getQuartersByCityId($city_id) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, q.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_quarter q WHERE q.city_id = '" . (int)$city_id . "' ORDER BY q.name" . $suffix;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getStreetsByCityId($city_id, $data = array()) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, s.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_street s WHERE s.city_id = '" . (int)$city_id . "' ORDER BY s.name" . $suffix;
		
		if (isset($data['limit']) && $data['limit'] != 0) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			
			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getQuartersByName($name, $city_id, $limit = 20) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, q.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_quarter q WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(q.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(q.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND q.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY q.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getStreetsByName($name, $city_id, $limit = 20) {
		
		if (strtolower($this->config->get('config_language')) == 'bg' || strtolower($this->config->get('config_language')) == 'bg-bg') {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, s.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_street s WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(s.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(s.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND s.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY s.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCityByNameAndPostcode($name, $postcode) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_city c WHERE (LCASE(TRIM(c.name)) = '" . $this->db->escape(utf8_strtolower(trim($name))) . "' OR LCASE(TRIM(c.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($name))) . "') AND TRIM(c.post_code) = '" . $this->db->escape(trim($postcode)) . "'");
		
		return $query->row;
	}
	
	// ъпдейт на офиси и адреси
	public function updateOffices() {
		
		$office_city = array();
		$machine_city = array();
		
		// добавяме градове
		$data['type'] = 'cities';
		$cities_results = $this->serviceXML($data);
		if (isset($cities_results->cities)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_city");
			
			$city_insert_sql = "INSERT INTO " . DB_PREFIX . "tk_econt_city (`city_id`, `post_code`, `type`, `name`, `name_en`, `is_office`, `is_machine`) VALUES ";
			foreach ($cities_results->cities->e as $city) {
				if ($city->id_country == '1033') {
					$city_insert_sql .= "(" . (int)$city->id . ", '" . (int)$city->post_code . "', '" . $this->db->escape($city->type) . "', '" . $this->db->escape($city->name) . "', '" . $this->db->escape($city->name_en) . "', 0, 0), ";
				}
			}
			$city_insert_sql = substr_replace($city_insert_sql, ';', strrpos($city_insert_sql, ','), 1);
			$this->db->query($city_insert_sql);
		} else {
			return false;
		}
		
		// добавяме квартали
		$data['type'] = 'cities_quarters';
		$cities_quarters_results = $this->serviceXML($data);
		if (isset($cities_quarters_results->cities_quarters)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_quarter");
			
			$quarter_insert_sql = "INSERT INTO " . DB_PREFIX . "tk_econt_quarter (`quarter_id`, `name`, `name_en`, `city_id`) VALUES ";
			foreach ($cities_quarters_results->cities_quarters->e as $quarter) {
				$quarter_insert_sql .= "(" . (int)$quarter->id . ", '" . $this->db->escape($quarter->name) . "', '" . $this->db->escape($quarter->name_en) . "', " . (int)$quarter->id_city . "), ";
			}
			$quarter_insert_sql = substr_replace($quarter_insert_sql, ';', strrpos($quarter_insert_sql, ','), 1);
			$this->db->query($quarter_insert_sql);
		} else {
			return false;
		}
		
		// добавяме улици
		$data['type'] = 'cities_streets';
		$cities_streets_results = $this->serviceXML($data);
		if (isset($cities_streets_results->cities_street)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_street");
			
			$count_sql = 0;
			$count_result = 0;
			$street_insert_sql[$count_sql] = "INSERT INTO " . DB_PREFIX . "tk_econt_street (`street_id`, `name`, `name_en`, `city_id`) VALUES ";
			foreach ($cities_streets_results->cities_street->e as $street) {
				
				if ($count_result == 10000) {
					$count_sql++;
					
					$street_insert_sql[$count_sql] = "INSERT INTO " . DB_PREFIX . "tk_econt_street (`street_id`, `name`, `name_en`, `city_id`) VALUES ";
				}
				
				$street_insert_sql[$count_sql] .= "(" . (int)$street->id . ", '" . $this->db->escape($street->name) . "', '" . $this->db->escape($street->name_en) . "', " . (int)$street->id_city . "), ";
				
				$count_result++;
			}
			
			foreach ($street_insert_sql as $street_insert) {
				$street_insert = substr_replace($street_insert, ';', strrpos($street_insert, ','), 1);
				$this->db->query($street_insert);
			}
		} else {
			return false;
		}
		
		// добавяме офиси
		$data['type'] = 'offices';
		$offices_results = $this->serviceXML($data);

		if (isset($offices_results->offices)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_office");
			foreach ($offices_results->offices->e as $office) {
				
				$office_city[] = (int)$office->id_city;
				
				if ($office->is_machine > 0) {
					$machine_city[] = (int)$office->id_city;
				}
				
				if ($office->country_code == 'BGR') {
					$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_econt_office SET office_id = '" . (int)$office->id . "', name = '" . $this->db->escape($office->name) . "', name_en = '" . $this->db->escape($office->name_en) . "', office_code = '" . $this->db->escape($office->office_code) . "', address = '" . $this->db->escape($office->address) . "', address_en = '" . $this->db->escape($office->address_en) . "', city_id = '" . (int)$office->id_city . "', is_machine = '" . (int)$office->is_machine . "'");
				}
			}
		} else {
			return false;
		}
		
		// обновяваме в кои градове има офиси и автомати
		$data['type'] = 'cities';
		$results = $this->serviceXML($data);
		if (isset($results->cities)) {
			foreach ($results->cities->e as $city) {
				if ($city->id_country == '1033') {
					
					if (in_array($city->id, $office_city)) {
						$is_office = 1;
					} else {
						$is_office = 0;
					}
					
					if (in_array($city->id, $machine_city)) {
						$is_machine = 1;
					} else {
						$is_machine = 0;
					}
					
					$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_city SET is_machine = '" . $is_machine . "', is_office = '" . $is_office . "' WHERE city_id  = '" . (int)$city->id . "'");
				}
			}
		} else {
			return false;
		}
		
		return true;
	}
	
	// ъпдейт на товарителници
	public function editShipment($order_id, $response) {
		
		if (!isset($response) || !$response) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '1', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			if (!empty($response['trackingEvents'])) {
				
				// добавяме статус за платени
				if (isset($response['cdPaidTime']) && $response['cdPaidTime']) {
					$response['trackingEvents'][1000] = array(
						'destinationType'    => 'payed',
						'destinationDetails' => 'Изплатени'
					);
				}
				
				// добавяме статус за върната
				foreach ($response['trackingEvents'] as $trackingEvents) {
					if ($trackingEvents['destinationType'] == 'return') {
						$response['trackingEvents'][2000] = array(
							'destinationType'    => 'return',
							'destinationDetails' => 'Върната пратка'
						);
					}
				}
				
				$reversed = array_reverse($response['trackingEvents']);
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '2', shipment_number = '" . $this->db->escape($response['shipmentNumber']) . "', shipment_status = '" . $this->db->escape($reversed[0]['destinationType']) . "', shipment_status_txt = '" . $this->db->escape($reversed[0]['destinationDetails']) . "', pdf = '" . $this->db->escape($response['pdfURL']) . "', mail_send = '" . $this->db->escape($reversed[0]['destinationType']) . "' WHERE order_id  = '" . (int)$order_id . "'");
			} else if (!empty($response['shipmentNumber'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '2', shipment_number = '" . $this->db->escape($response['shipmentNumber']) . "', shipment_status = 'prepared', shipment_status_txt = 'Очаква предаване към Еконт', pdf = '" . $this->db->escape($response['pdfURL']) . "', mail_send = 'prepared' WHERE order_id  = '" . (int)$order_id . "'");
			} else if (isset($response['id'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '1', loading_id =  '" . $this->db->escape($response['id']) . "', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
			} else if (isset($response['error'])) {
				$shipment_number = preg_replace('/\D/', '', $response['error']['message']);
				if (!$shipment_number) {
					$shipment_number = NULL;
				}
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '3', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status = 'error', shipment_status_txt = '" . $this->db->escape($response['error']['message']) . "', pdf = NULL, mail_send = 'error' WHERE order_id  = '" . (int)$order_id . "'");
			} else {
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '1', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
			}
		}
	}
	
	// ъпдйет на клиентски номер
	public function updateUser($data) {
		
		$this->load->model('setting/setting');
		
		$dataEcont = $this->model_setting_setting->getSetting('shipping_tk_econt');
		
		$data['type'] = 'profile';
		$results = $this->serviceXML($data);
		if ($results && !isset($results->error)) {
			if (isset($results->client_info)) {
				if (isset($results->client_info->id)) {
					$dataEcont['shipping_tk_econt_profile_id'] = (string)$results->client_info->id;
				}
			}
		}
		
		$this->model_setting_setting->editSetting('tk_econt', $dataEcont);
	}
	
	// връзка с еконт
	public function serviceXML($data) {
		
		if (!empty($data['test'])) {
			$test = $data['test'];
		} else {
			$test = $this->config->get('shipping_tk_econt_test');
		}
		
		if ($test) {
			$url = 'http://demo.econt.com/e-econt/xml_service_tool.php';
		} else {
			$url = 'http://www.econt.com/e-econt/xml_service_tool.php';
		}
		
		if (!empty($data['username'])) {
			$username = $data['username'];
		} else {
			$username = $this->config->get('shipping_tk_econt_username');
		}
		
		if (!empty($data['password'])) {
			$password = $data['password'];
		} else {
			$password = $this->config->get('shipping_tk_econt_password');
		}
		
		$request = '<?xml version="1.0" ?>
		<request>
		<client>
		<username>' . $username . '</username>
		<password>' . $password . '</password>
		</client>
		<request_type>' . $data['type'] . '</request_type>';
		
		if (isset($data['xml'])) {
			$request .= $data['xml'];
		}
		
		$request .= '</request>';
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array('xml' => $request));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		libxml_use_internal_errors(true);
		
		return simplexml_load_string($response);
	}
	
	public function serviceJSON($data) {
		
		$method = "Shipments/ShipmentService.getShipmentStatuses.json";
		
		if (!empty($data['test'])) {
			$test = $data['test'];
		} else {
			$test = $this->config->get('shipping_tk_econt_test');
		}
		
		if ($test) {
			$url = 'https://demo.econt.com/ee/services/';
		} else {
			$url = 'https://ee.econt.com/services/';
		}
		
		if (!empty($data['username'])) {
			$username = $data['username'];
		} else {
			$username = $this->config->get('shipping_tk_econt_username');
		}
		
		if (!empty($data['password'])) {
			$password = $data['password'];
		} else {
			$password = $this->config->get('shipping_tk_econt_password');
		}
		
		if ($data['shipment_number']) {
			$data = array(
				"shipmentNumbers" => [$data['shipment_number']]
			);
		}
		
		$auth = array(
			'username' => $username,
			'password' => $password,
		);
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url . $method);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_USERPWD, $auth['username'] . ':' . $auth['password']);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		
		$response = curl_exec($curl);
		
		$jsonResponse = json_decode($response, true);
		
		curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		if ($jsonResponse === false) {
			exit("cURL Error: " . curl_error($curl));
		}
		
		return ($jsonResponse);
	}
	
	public function serviceDelivery($url, $data, $store_id = false, $test = false) {
		
		if (!$store_id) {
			$store_id = $this->config->get('config_store_id');
		}
		
		if (!$store_id) {
			$store_id = 0;
		}
		
		$tk_econt_store_kay = $this->config->get('shipping_tk_econt_store_kay');
		
		if (!$test) {
			$test = $this->config->get('shipping_tk_econt_test');
		}
		
		if ($test) {
			$data_url = 'http://delivery.demo.econt.com/';
		} else {
			$data_url = 'https://delivery.econt.com/';
		}
		
		$response = array();
		
		if (isset($tk_econt_store_kay[$store_id]) && $tk_econt_store_kay[$store_id] && $data) {
			
			try {
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $data_url . $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_HTTPHEADER, [
					'Content-Type: application/json',
					'Authorization: ' . $tk_econt_store_kay[$store_id]
				]);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($curl, CURLOPT_TIMEOUT, 60);
				
				$response = json_decode(curl_exec($curl), true);
				
				$response_info = curl_getinfo($curl);
				
				if ($response_info['http_code'] !== 200) $response['error'] = $response;
				
				curl_close($curl);
			} catch (Exception $exception) {
				$response['error'] = $exception;
				
				if ($this->config->get('module_tk_checkout_debug')) {
					$this->log->write('TK Econt error');
					$this->log->write($exception->getCode());
					$this->log->write($exception->getMessage());
				}
			}
		}
		
		return $response;
	}
}