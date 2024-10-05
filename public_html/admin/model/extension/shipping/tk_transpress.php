<?php

class ModelExtensionShippingTkTranspress extends Model {
	
	private $tktranspressStates = array(
		array(
			'id'          => 'CCCCS',
			'key'         => 'STATUS_TAKEN_COURIER',
			'name'        => 'Взета от куриер',
			'description' => 'Взета от куриер'
		),
		array(
			'id'          => 'FFFFA',
			'key'         => 'STATUS_DELIVERED_WITHOUT_OBJECTION',
			'name'        => 'Доставена без възражение',
			'description' => 'Доставена без възражение'
		),
		array(
			'id'          => 'FFFFG',
			'key'         => 'STATUS_DELIVERED_DAMAGED_SHIPMENT',
			'name'        => 'Доставена - повр. част от пратка',
			'description' => 'Доставена - повредена част от пратката'
		),
		array(
			'id'          => 'FFFFH',
			'key'         => 'STATUS_PAID_COD',
			'name'        => 'Доставена - изплатен НП',
			'description' => 'Доставена - изплатен наложен платеж'
		),
		array(
			'id'          => 'FFFFK',
			'key'         => 'STATUS_DELIVERED_ADDITIONAL_LOADING_OPERATIONS',
			'name'        => 'Доставена-доп. товаро-разт. оп.',
			'description' => 'Доставена - допълнителни товаро-разтоварни операции'
		),
		array(
			'id'          => 'FFFFC',
			'key'         => 'STATUS_DELIVERED_MISSING_PART_SHIPMENT',
			'name'        => 'Доставена липсва част от пратка',
			'description' => 'Доставена - липсва част от пратката'
		),
		array(
			'id'          => array(
				'CCDDG',
				'CCDDC',
				'CCDDE',
				'HHHHE',
				'HHHHA',
				'DDDDA'
			),
			'key'         => 'STATUS_TRANSPORT_WAREHOUSE',
			'name'        => 'Транспортира се до склад',
			'description' => 'Транспортира се до склад'
		),
		array(
			'id'          => 'CCCCOAS',
			'key'         => 'STATUS_NEED_CLARIFICATION',
			'name'        => 'Необходимо е уточнение',
			'description' => 'Необходимо е уточнение'
		),
		array(
			'id'          => 'CCCCSNT',
			'key'         => 'STATUS_NEW_DATE_COLLECTION',
			'name'        => 'Договорена нова дата за събиране',
			'description' => 'Договорена нова дата за събиране'
		),
		array(
			'id'          => 'DDDDF',
			'key'         => 'STATUS_TRANSPORTING',
			'name'        => 'Доставя се',
			'description' => 'Доставя се'
		),
		array(
			'id'          => 'CCCCSST',
			'key'         => 'STATUS_REQUEST_CANCELED',
			'name'        => 'Заявката е отказана',
			'description' => 'Заявката е отказана'
		),
		array(
			'id'          => 'CCCCL',
			'key'         => 'STATUS_REQUEST_ACCEPTED',
			'name'        => 'Приета заявка в системата',
			'description' => 'Приета заявка в системата'
		),
		array(
			'id'          => 'HHHHFB',
			'key'         => 'STATUS_NOT_DELIVERED_WRONG_ADDRESS',
			'name'        => 'Не е доставена - грешен адрес',
			'description' => 'Не е доставена - грешен адрес'
		),
		array(
			'id'          => 'HHHHT',
			'key'         => 'STATUS_NOT_DELIVERED_NOT_ACCESS_ADDRESS',
			'name'        => 'Не е доставена - няма достъп',
			'description' => 'Не е доставена - няма достъп до адреса'
		),
		array(
			'id'          => 'HHHHFD',
			'key'         => 'STATUS_NOT_DELIVERED_INCOMPLETE_ADDRESS',
			'name'        => 'Не е доставена - непълен адрес',
			'description' => 'Не е доставена - непълен адрес'
		),
		array(
			'id'          => 'HHHHJ',
			'key'         => 'STATUS_NOT_DELIVERED_INDIVIDUAL_REASON',
			'name'        => 'Не е доставена-индивид. причина',
			'description' => 'Не е доставена - индивидуална причина'
		),
		array(
			'id'          => 'HHHHFC',
			'key'         => 'STATUS_NOT_DELIVERED_NEW_ADDRESS',
			'name'        => 'Не е доставена - нов адрес дост.',
			'description' => 'Не е доставена - нов адрес за доставка'
		),
		array(
			'id'          => 'HHHHO',
			'key'         => 'STATUS_NOT_DELIVERED_NEW_DATE',
			'name'        => 'Не е доставена - нова дата дост.',
			'description' => 'Не е доставена - получателят желае нова дата доставка'
		),
		array(
			'id'          => 'HHHHF',
			'key'         => 'STATUS_NOT_DELIVERED_REJECT_RECEIVING',
			'name'        => 'Не е доставена - Отказ за прием',
			'description' => 'Не е доставена - Отказ за прием от получателя'
		),
		array(
			'id'          => 'HHHHFA',
			'key'         => 'STATUS_NOT_DELIVERED_RECIPIENT_MISSING',
			'name'        => 'Не е доставена - Получ. отсъства',
			'description' => 'Не е доставена - Получателят отсъства'
		),
		array(
			'id'          => 'HHHHL',
			'key'         => 'STATUS_NOT_DELIVERED_RECIPIENT_PICK_ALONE',
			'name'        => 'Не е доставена-Получ. вземе прат.',
			'description' => 'Не е доставена - Получателят сам ще си вземе пратката'
		),
		array(
			'id'          => 'CCFFT',
			'key'         => 'STATUS_ANTOHER_COURIER',
			'name'        => 'Предадена на друг куриер',
			'description' => 'Предадена на друг куриер'
		),
		array(
			'id'          => array(
				'DDDDCN',
				'DDDDC'
			),
			'key'         => 'STATUS_IN_OFFICE',
			'name'        => 'В офис - до поискване',
			'description' => 'В офис - до поискване'
		),
		array(
			'id'          => 'DDDDE',
			'key'         => 'STATUS_IN_STORE_FOR_SHIPMENT',
			'name'        => 'В склад - за доставка',
			'description' => 'В склад - за доставка'
		),
		array(
			'id'          => 'DDDDEN',
			'key'         => 'STATUS_IN_STORE_UNSUCCESSFUL',
			'name'        => 'В склад - неуспешен разнос',
			'description' => 'В склад - неуспешен разнос'
		),
		array(
			'id'          => 'DDDDD',
			'key'         => 'STATUS_IN_STORE_OVERLOAD',
			'name'        => 'В склад - за претоварване',
			'description' => 'В склад - за претоварване'
		),
		array(
			'id'          => 'UNKNOWN',
			'key'         => 'STATUS_UNKNOWN',
			'name'        => 'Не може да се извлече статус',
			'description' => 'В момента не можем да извлечем статус на пратката'
		),
	);
	
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
				'operation' => $this->base64url_encode('install_transpress')
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
					
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_transpress_order` (" . $this->base64url_decode($result->tk_transpress_order) . ") ENGINE=InnoDB DEFAULT CHARSET=utf8;");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_transpress_customer` (" . $this->base64url_decode($result->tk_transpress_customer) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				} else if (!empty($result->error)) {
					if (!empty($result->error_module)) {
						$this->load->model('setting/setting');
						$data = $this->model_setting_setting->getSetting('shipping_tk_transpress');
						$data['shipping_tk_transpress_logged'] = false;
						$data['shipping_tk_transpress_status'] = 0;
						$this->model_setting_setting->editSetting('shipping_tk_transpress', $data);
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
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_transpress_order`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_transpress_customer`");
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
			'operation' => $this->base64url_encode('settings_transpress')
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
				$data = $this->model_setting_setting->getSetting('shipping_tk_transpress');
				$data['shipping_tk_transpress_logged'] = false;
				$data['shipping_tk_transpress_status'] = 0;
				$this->model_setting_setting->editSetting('shipping_tk_transpress', $data);
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
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tk_transpress_order` WHERE `order_id` = '" . (int)$order_id . "' ");
		
		return $query->row;
	}
	
	public function updateOrder($order_id, $data) {
		
		$transpress_order = $this->getOrder($order_id);
		
		if (isset($transpress_order) && $transpress_order) {
			$this->db->query("UPDATE `" . DB_PREFIX . "tk_transpress_order` SET `data` = '" . json_encode($data, JSON_UNESCAPED_UNICODE) . "', `mail_send` = NULL WHERE `order_id` = '" . ((int)$order_id) . "'");
		} else {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "tk_transpress_order` SET `order_id` = '" . ((int)$order_id) . "', `data` = '" . json_encode($data, JSON_UNESCAPED_UNICODE) . "', `mail_send` = NULL ");
		}
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_transpress_order WHERE loading != '' AND status_count != '3' ");
		
		return $query->rows;
	}
	
	// списък със статуси в транспрес
	public function getTranspressStatuses() {
		
		return $this->tktranspressStates;
	}
	
	public function getStatusByCode($code) {
		
		foreach ($this->tktranspressStates as $status) {
			if (is_array($status['id'])) {
				if (in_array($code, $status['id'])) {
					return $status;
				}
			} else if ($status['id'] === $code) {
				return $status;
			}
		}
		
		return false;
	}
	
	// обработваме данните за товарителницата
	public function addLoading($order_id, $loading, $barcode) {
		
		return $this->db->query("UPDATE `" . DB_PREFIX . "tk_transpress_order` SET `loading` = '" . $this->db->escape($loading) . "', `barcode` = '" . $this->db->escape($barcode) . "', `generate_date` = '" . date('Y-m-d H:i:s') . "', `mail_send` = NULL WHERE `order_id` = '" . ((int)$order_id) . "' LIMIT 1");
	}
	
	public function removeLoading($loading) {
		
		$this->db->query("UPDATE `" . DB_PREFIX . "tk_transpress_order` SET `loading` = NULL, `barcode` = NULL, `status` = NULL, `status_name` = NULL, `status_count` = 0, `mail_send` = NULL WHERE `loading` = '" . $this->db->escape($loading) . "'");
	}
	
	// ъпдейт на товарителници
	public function editShipment($order_id, $response, $mail_send) {
		
		$this->db->query("UPDATE `" . DB_PREFIX . "tk_transpress_order` SET " . implode(', ', $response) . ", mail_send = '" . $this->db->escape($mail_send) . "' WHERE `order_id` = '" . $order_id . "' LIMIT 1");
	}
}