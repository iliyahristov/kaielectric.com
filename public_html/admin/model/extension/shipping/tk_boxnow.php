<?php

class ModelExtensionShippingTkBoxnow extends Model {
	
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
				'operation' => $this->base64url_encode('install_boxnow')
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
					
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_boxnow_order` (" . $this->base64url_decode($result->tk_boxnow_order) . ") ENGINE=InnoDB DEFAULT CHARSET=utf8;");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_boxnow_customer` (" . $this->base64url_decode($result->tk_boxnow_customer) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				} else if (!empty($result->error)) {
					if (!empty($result->error_module)) {
						$this->load->model('setting/setting');
						$data = $this->model_setting_setting->getSetting('shipping_tk_boxnow');
						$data['shipping_tk_boxnow_logged'] = false;
						$data['shipping_tk_boxnow_status'] = 0;
						$this->model_setting_setting->editSetting('shipping_tk_boxnow', $data);
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
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_boxnow_order`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_boxnow_customer`");
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
			'operation' => $this->base64url_encode('settings_boxnow')
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
				$data = $this->model_setting_setting->getSetting('shipping_tk_boxnow');
				$data['shipping_tk_boxnow_logged'] = false;
				$data['shipping_tk_boxnow_status'] = 0;
				$this->model_setting_setting->editSetting('shipping_tk_boxnow', $data);
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
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tk_boxnow_order` WHERE `order_id` = '" . (int)$order_id . "' ");
		
		return $query->row;
	}
	
	public function updateOrder($order_id, $data) {
		if(is_array($data['parcel'])){
			$data['parcel'] = '';
		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_boxnow_order SET request_id = '" . (int)$data['request_id'] . "', parcel = '" . $this->db->escape($data['parcel']) . "', locker_id='" . (int)$data['locker_id'] . "', locker_address='" . $this->db->escape($data['locker_address']) . "', locker_name='" . $this->db->escape($data['locker_name']) . "', status_message='" . $this->db->escape($data['status_message']) . "', status_code='" . $this->db->escape($data['status_code']) . "', status='" . (int)$data['status_id'] . "', mail_send='" . $this->db->escape($data['mail_send']) . "' WHERE order_id = '" . (int)$order_id . "' ");
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_boxnow_order WHERE (status_code != 'delivered' AND status_code != 'returned' AND status_code != 'cancelled' OR status_code IS NULL) AND parcel IS NOT NULL");
		
		return $query->rows;
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
