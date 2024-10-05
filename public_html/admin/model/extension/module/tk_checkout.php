<?php

class ModelExtensionModuleTkCheckout extends Model {
	
	public function createTables($token) {
		
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
			'version'   => $this->base64url_encode('4.1'),
			'operation' => $this->base64url_encode('install_checkout')
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
				
				$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_abandoned_cart` (" . $this->base64url_decode($result->tk_abandoned_cart) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_abandoned_cart_product` (" . $this->base64url_decode($result->tk_abandoned_cart_product) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_abandoned_cart_option` (" . $this->base64url_decode($result->tk_abandoned_cart_option) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				
				$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE `code` = 'courier' ");
				if (!$query->num_rows) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "zone SET country_id = 33, code = 'courier', name = 'Куриер', status = 1");
				}
				
				$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE `code` = 'courier_gr' ");
				if (!$query->num_rows) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "zone SET country_id = 84, code = 'courier_gr', name = 'Courier', status = 1");
				}
				
				$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE `code` = 'courier_ro' ");
				if (!$query->num_rows) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "zone SET country_id = 175, code = 'courier_ro', name = 'Courier', status = 1");
				}
			} else if (!empty($result->error)) {
				$results['error'] = $result->error;
			} else {
				$results['error'] = "Invalid response. ";
			}
		} else {
			$results['error'] = "Invalid response. ";
		}
		
		curl_close($curl);
		
		return $results;
	}
	
	public function addColumns() {
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart_option` LIKE 'abandoned_cart_product_id' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart_option ADD `abandoned_cart_product_id` int(11) UNSIGNED NOT NULL DEFAULT 0");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart` LIKE 'store_url' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart ADD `store_url` varchar(256) DEFAULT NULL");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart` LIKE 'language_code' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart ADD `language_code` varchar(256) DEFAULT NULL");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart` LIKE 'language_id' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart ADD `language_id` int(11) DEFAULT NULL");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart` LIKE 'comment' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart ADD `comment` varchar(512) DEFAULT NULL");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart` LIKE 'send' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart ADD `send` int(11) UNSIGNED NOT NULL DEFAULT 0");
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "tk_abandoned_cart` LIKE 'date_send' ");
		if (!$query->row) {
			$this->db->query("ALTER TABLE " . DB_PREFIX . "tk_abandoned_cart ADD `date_send` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'");
		}
	}
	
	public function deleteTables() {
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_abandoned_cart`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_abandoned_cart_product`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_abandoned_cart_option`");
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "zone WHERE code = 'courier'");
	}
	
	public function checkVersion($token) {
		
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
			'version'   => $this->base64url_encode('4.1'),
			'operation' => $this->base64url_encode('check_version')
		);
		
		$post = json_encode($data);
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $url . 'version.php');
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
		$result = json_decode($result);
		curl_close($curl);
		
		return $result;
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
			'operation' => $this->base64url_encode('settings_checkout')
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
		
		if (!empty($result->success)) {
			$results['success'] = true;
		} else if (!empty($result->error)) {
			$results['error'] = $result->error;
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
	
	public function addCustomFields() {
		
		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		
		if ($this->config->get('config_customer_group_id')) {
			$config_customer_group_id = $this->config->get('config_customer_group_id');
		} else {
			$config_customer_group_id = 0;
		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "custom_field SET status = '0' WHERE location  = 'account'");
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'checkbox', location = 'account', status = '1', sort_order = '101' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_value SET custom_field_id = '" . (int)$custom_field_id . "', sort_order = '100' ");
		$custom_field_value_id = $this->db->getLastId();
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Желая фактура' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'I need an invoice' ");
			}
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_value_description SET custom_field_value_id = '" . (int)$custom_field_value_id . "', custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'invoice' ");
		}
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('module_tk_checkout');
		$data['module_tk_checkout_invoice'] = $custom_field_id;
		$this->model_setting_setting->editSetting('module_tk_checkout', $data);
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'text', location = 'account', status = '1', sort_order = '110' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Име на фирма' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Company' ");
			}
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'text', location = 'account', status = '1', sort_order = '120' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'ЕИК' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Company ID' ");
			}
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'text', location = 'account', status = '1', sort_order = '130' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'ДДС Номер' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'VAT Number' ");
			}
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'text', location = 'account', status = '1', sort_order = '140' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Град по регистрация' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Company City' ");
			}
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'text', location = 'account', status = '1', sort_order = '150' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Адрес по регистрация' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Company Address' ");
			}
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field SET type = 'text', location = 'account', status = '1', sort_order = '160' ");
		$custom_field_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_customer_group SET custom_field_id = '" . (int)$custom_field_id . "', customer_group_id = '" . (int)$config_customer_group_id . "', required = '0' ");
		foreach ($languages as $language) {
			if ($language['code'] == 'bg' || $language['code'] == 'bg-bg' || $language['code'] == 'bulgarian') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'МОЛ' ");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "custom_field_description SET custom_field_id = '" . (int)$custom_field_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Manager' ");
			}
		}
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
		
		$catalog = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
		
		$api_info = $this->getApi($this->config->get('config_api_id'));
		
		if ($api_info) {
			
			$this->session->data['api_id'] = $api_info['api_id'];
			
			$curl = curl_init();
			
			if (substr(HTTPS_CATALOG, 0, 5) == 'https') {
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
				if ($this->config->get('module_tk_checkout_debug')) {
					$this->log->write('TK Checkout - Api Login ');
					$this->log->write("Invalid status: " . curl_error($curl));
				}
			} else if ($content_type === 'application/json') {
				$result = json_decode($response);
				
				if (!empty($result->api_token)) {
					$api_token = $result->api_token;
				} else if (!empty($result->error)) {
					if (!empty($result->error->ip)) {
						if ($this->config->get('module_tk_checkout_debug')) {
							$this->log->write('TK Checkout - ip error');
							$this->log->write($result->error->ip);
						}
					}
					
					if (!empty($result->error->ip) && preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $result->error->ip, $ip) && !empty($ip[0])) {
						
						$query_customer = $this->db->query("SELECT * FROM `" . DB_PREFIX . "api_ip` WHERE api_id = '" . (int)$api_info['api_id'] . "' AND ip = '" . $this->db->escape($ip[0]) . "'");
						
						if(!$query_customer->num_rows) {
							$this->db->query("INSERT INTO `" . DB_PREFIX . "api_ip` SET api_id = '" . (int)$api_info['api_id'] . "', ip = '" . $this->db->escape($ip[0]) . "'");
						}
						
						$api_token = $this->getApiToken();
					}
				} else {
					if ($this->config->get('module_tk_checkout_debug')) {
						$this->log->write('TK Checkout - Api Login ');
						$this->log->write("Invalid json");
					}
				}
			} else {
				if ($this->config->get('module_tk_checkout_debug')) {
					$this->log->write('TK Checkout - Api Login ');
					$this->log->write("Invalid response");
				}
			}
		}
		
		return $api_token;
	}
	
	public function addOrderHistory($order_id, $api_token, $history_data) {
		
		$catalog = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
		
		$curl = curl_init();
		if (substr(HTTPS_CATALOG, 0, 5) == 'https') {
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
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('TK Checkout - addHistory - order: ' . $order_id);
				$this->log->write("Invalid status: " . curl_error($curl));
			}
		} else if ($content_type === 'application/json') {
			$result = json_decode($response);
			
			if (!empty($result->error)) {
				if ($this->config->get('module_tk_checkout_debug')) {
					$this->log->write('TK Checkout - addHistory - order: ' . $order_id);
					$this->log->write($result->error);
				}
			}
		} else {
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('TK Checkout - addHistory - order: ' . $order_id);
				$this->log->write("Invalid response");
			}
		}
		
		curl_close($curl);
	}
}