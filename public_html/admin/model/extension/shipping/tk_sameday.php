<?php

class ModelExtensionShippingTkSameday extends Model {
	
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
				'operation' => $this->base64url_encode('install_sameday')
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
					
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_sameday_customer` (" . $this->base64url_decode($result->tk_sameday_customer) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_sameday_order` (" . $this->base64url_decode($result->tk_sameday_order) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_sameday_pickup_point` (" . $this->base64url_decode($result->tk_sameday_pickup_point) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_sameday_locker` (" . $this->base64url_decode($result->tk_sameday_locker) . ") ENGINE=MyISAM DEFAULT CHARSET=utf8");
				} else if (!empty($result->error)) {
					if (!empty($result->error_module)) {
						$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_sameday_pickup_point`");
						$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_sameday_locker`");
						
						$this->load->model('setting/setting');
						$data = $this->model_setting_setting->getSetting('shipping_tk_sameday');
						$data['shipping_tk_sameday_logged'] = false;
						$data['shipping_tk_sameday_status'] = 0;
						$this->model_setting_setting->editSetting('shipping_tk_sameday', $data);
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
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_sameday_customer`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_sameday_order`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_sameday_pickup_point`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_sameday_locker`");
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
			'operation' => $this->base64url_encode('settings_sameday')
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
		$result = json_decode($response);
		
		if (!empty($result->error)) {
			if (!empty($result->error_module)) {
				$this->load->model('setting/setting');
				$data = $this->model_setting_setting->getSetting('shipping_tk_sameday');
				$data['shipping_tk_sameday_logged'] = false;
				$data['shipping_tk_sameday_status'] = 0;
				$this->model_setting_setting->editSetting('shipping_tk_sameday', $data);
			}
			
			$results['error'] = $result->error;
		} else if (!empty($result->success)) {
			$results['success'] = true;
		} else {
			$results['error'] = 'Problem with install token';
		}
		
		curl_close($curl);
		
		return $results;
	}
	
	public function base64url_encode($data) {
		
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}
	
	public function base64url_decode($data) {
		
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '='));
	}
	
	public function getPickup() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_pickup_point");
			
		return $query->rows;
	}
	
	public function updatePickup($pickup_points) {
		
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_sameday_pickup_point");
		
		foreach ($pickup_points as $data) {
			if ($data['defaultPickupPoint']) {
				$defaultPickupPoint = 1;
			} else {
				$defaultPickupPoint = 0;
			}
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_pickup_point SET sameday_id = '" . (int)$data['id'] . "', sameday_alias = '" . $this->db->escape($data['alias']) . "', country_id = '" . (int)$data['country']['id'] . "', country = '" . $this->db->escape($data['country']['name']) . "', country_iso = '" . (int)$data['country']['code'] . "', county_id = '" . (int)$data['county']['id'] . "', county = '" . $this->db->escape($data['county']['name']) . "', city_id = '" . (int)$data['city']['id'] . "', city = '" . $this->db->escape($data['city']['name']) . "', address = '" . $this->db->escape($data['address']) . "', contactPersons = '" . $this->db->escape(json_encode($data['pickupPointContactPerson'])) . "', default_pickup_point = '" . $defaultPickupPoint . "'");
		}
	}
	
	public function updateLocker($lockers, $country_iso) {
		
		foreach ($lockers as $data) {
			$get_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_locker WHERE locker_id = '" . (int)$data['lockerId'] . "'");
			
			if (!$get_query->num_rows) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_locker SET locker_id = '" . (int)$data['lockerId'] . "', name = '" . $this->db->escape($data['name']) . "', country_id = '" . (int)$data['countryId'] . "', country = '" . $this->db->escape($data['country']) . "', country_iso = '" . $this->db->escape($country_iso) . "', county_id = '" . (int)$data['countyId'] . "', county = '" . $this->db->escape($data['county']) . "', city_id = '" . (int)$data['cityId'] . "', city = '" . $this->db->escape($data['city']) . "', postcode = '" . $this->db->escape($data['postalCode']) . "', address = '" . $this->db->escape($data['address']) . "'");
			}
		}
	}
	
	// обработваме данните за поръчката
    public function addOrder($data, $order_id = 0) {

        $this->load->model('setting/setting');

        $service = '0';

        $name = '';
        if (!empty($data['firstname'])) {
            $name .= $data['firstname'].' ';
        }

        if (!empty($data['lastname'])) {
            $name .= $data['lastname'];
        }

        if (!empty($data['telephone'])) {
            $phone = $data['telephone'];
        } else {
            $phone = '';
        }

        if (!empty($data['email'])) {
            $email = $data['email'];
        } else {
            $email = '';
        }

        if (!empty($data['payment_country'])) {
            $country = $data['payment_country'];
        } else {
            $country = '';
        }

        if (!empty($data['payment_iso_code_2'])) {
            $country_iso = $data['payment_iso_code_2'];
        } else {
            $country_iso = '';
        }

        $this->load->library('tksameday');
        if (!isset($this->tksameday)) {
            $this->tksameday = new TkSameday($this->registry);
        }
        try {
            $sameday_address = TkSameday::getDefault();
            if (!empty($sameday_address[$country_iso])) {
                $default_address = $sameday_address[$country_iso];
            }
        } catch (\Exception $e) {
            if ($this->config->get('module_tk_checkout_debug')) {
                $this->log->write('Sameday: addOrder | getDefault');
                $this->log->write($e->getMessage());
            }
        }

        if (!empty($default_address['country_id'])) {
            $country_id = $default_address['country_id'];
        } else {
            $country_id = '';
        }

        if (!empty($data['payment_postcode'])) {
            $postcode = $data['payment_postcode'];
        } else {
            $postcode = '';
        }

        if (isset($data['payment_code'])) {
            $payment_code = $data['payment_code'];
        } else {
            $payment_code = '';
        }

        $shipping_to = '';
        $county = '';
        $county_id = '';
        $city = '';
        $city_id = '';
        $address = '';
        $locker_id = '';
        $locker_name = '';
        $locker_address = '';

        $weight = 0.01;
        $total= 0.00;

        //товарителница
        $shipment_number = NULL;
        $shipment_status_txt = '';
        $status_id = 0;
        $shipment_status = '';
        $shipment = array();
        $pdf = '';
        $delivery_date = '0000-00-00';
        $mail_send = 0;

        $this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_order SET order_id = '" . (int)$order_id . "', status_id = '" . (int)$status_id . "', service = '" . (int)$service . "', name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_id = '" . (int)$country_id . "', country_iso = '" . $this->db->escape($country_iso) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', county = '" . $this->db->escape($county) . "', county_id = '" . (int)$county_id . "', city = '" . $this->db->escape($city) . "', city_id = '" . (int)$city_id . "', address = '" . $this->db->escape($address) . "', postcode = '" . $this->db->escape($postcode) . "', locker_id = '" . (int)$locker_id . "', locker_name = '" . $this->db->escape($locker_name) . "', locker_address = '" . $this->db->escape($locker_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', shipment = '" . $this->db->escape(json_encode($shipment)) . "', pdf = '" . $this->db->escape($pdf) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', mail_send = '" . $this->db->escape($mail_send) . "', data = '" . $this->db->escape(json_encode($data)) . "'");

        return $this->db->getLastId();
    }

	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function updateOrder($data, $order_id, $shipment = array()) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (!empty($data['service'])) {
			$service = $data['service'];
		} else {
			$service = '0';
		}
		
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
		
		if (!empty($data['country'])) {
			$country = $data['country'];
		} else {
			$country = '';
		}
		
		if (!empty($data['country_id'])) {
			$country_id = $data['country_id'];
		} else {
			$country_id = '';
		}
		
		if (!empty($data['country_iso'])) {
			$country_iso = $data['country_iso'];
		} else {
			$country_iso = '';
		}
		
		if (!empty($data['shipping_to'])) {
			$shipping_to = $data['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['county'])) {
			$county = $data['county'];
		} else {
			$county = '';
		}
		
		if (!empty($data['county_id'])) {
			$county_id = $data['county_id'];
		} else {
			$county_id = '';
		}
		
		if (!empty($data['city'])) {
			$city = $data['city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['city_id'])) {
			$city_id = $data['city_id'];
		} else {
			$city_id = '';
		}
		
		if (!empty($data['address'])) {
			$address = $data['address'];
		} else {
			$address = '';
		}
		
		if (!empty($data['postcode'])) {
			$postcode = $data['postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['locker_id']) && $data['locker_id'] > 0) {
			$locker_id = $data['locker_id'];
		} else {
			$locker_id = '';
		}
		
		if (!empty($data['locker_name'])) {
			$locker_name = $data['locker_name'];
		} else {
			$locker_name = '';
		}
		
		if (!empty($data['locker_address'])) {
			$locker_address = $data['locker_address'];
		} else {
			$locker_address = '';
		}
		
		if (!empty($data['weight'])) {
			$weight = $data['weight'];
		} else {
			$weight = 0.01;
		}
		
		if (!empty($data['total'])) {
			$total = $data['total'];
		} else {
			$total = '';
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
			$shipment_number = NULL;
		}
		
		if (isset($shipment['status'])) {
			$shipment_status_txt = $shipment['status'];
		} else {
			$shipment_status_txt = '';
		}
		
		if (isset($shipment['status_id'])) {
			$status_id = $shipment['status_id'];
		} else {
			$status_id = 0;
		}
		
		if (isset($shipment['shipment_status'])) {
			$shipment_status = $shipment['shipment_status'];
		} else {
			$shipment_status = '';
		}
		
		if (isset($shipment['shipment'])) {
			$shipment = $shipment['shipment'];
		} else {
			$shipment = array();
		}
		
		if (isset($shipment['pdf'])) {
			$pdf = $shipment['pdf'];
		} else {
			$pdf = '';
		}
		
		if (isset($shipment['delivery_date'])) {
			$delivery_date = $shipment['delivery_date'];
		} else {
			$delivery_date = '0000-00-00';
		}
		
		if (isset($shipment['mail_send'])) {
			$mail_send = $shipment['mail_send'];
		} else {
			$mail_send = 0;
		}
		
		$sameday_order = $this->getOrder($order_id);
		
		if ($sameday_order) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_sameday_order SET status_id = '" . (int)$status_id . "', service = '" . (int)$service . "', name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_id = '" . (int)$country_id . "', country_iso = '" . $this->db->escape($country_iso) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', county = '" . $this->db->escape($county) . "', county_id = '" . (int)$county_id . "', city = '" . $this->db->escape($city) . "', city_id = '" . (int)$city_id . "', address = '" . $this->db->escape($address) . "', postcode = '" . $this->db->escape($postcode) . "', locker_id = '" . (int)$locker_id . "', locker_name = '" . $this->db->escape($locker_name) . "', locker_address = '" . $this->db->escape($locker_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', shipment = '" . $this->db->escape(json_encode($shipment)) . "', pdf = '" . $this->db->escape($pdf) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', mail_send = '" . $this->db->escape($mail_send) . "', data = '" . $this->db->escape(json_encode($data)) . "' WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_order SET order_id = '" . (int)$order_id . "', status_id = '" . (int)$status_id . "', service = '" . (int)$service . "', name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_id = '" . (int)$country_id . "', country_iso = '" . $this->db->escape($country_iso) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', county = '" . $this->db->escape($county) . "', county_id = '" . (int)$county_id . "', city = '" . $this->db->escape($city) . "', city_id = '" . (int)$city_id . "', address = '" . $this->db->escape($address) . "', postcode = '" . $this->db->escape($postcode) . "', locker_id = '" . (int)$locker_id . "', locker_name = '" . $this->db->escape($locker_name) . "', locker_address = '" . $this->db->escape($locker_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', shipment = '" . $this->db->escape(json_encode($shipment)) . "', pdf = '" . $this->db->escape($pdf) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', mail_send = '" . $this->db->escape($mail_send) . "', data = '" . $this->db->escape(json_encode($data)) . "'");
		}
	}
	
	public function editShipment($order_id, $shipment = array()) {
		
		$this->load->model('extension/module/tk_checkout');
		
		//товарителница
		if (isset($shipment['awb'])) {
			$shipment_number = $shipment['awb'];
		} else {
			$shipment_number = NULL;
		}
		
		if (isset($shipment['status'])) {
			$shipment_status_txt = $shipment['status'];
		} else {
			$shipment_status_txt = '';
		}
		
		if (isset($shipment['status_id'])) {
			$status_id = $shipment['status_id'];
		} else {
			$status_id = 0;
		}
		
		if (isset($shipment['shipment_status'])) {
			$shipment_status = $shipment['shipment_status'];
		} else {
			$shipment_status = '';
		}
		
		if (isset($shipment['shipment'])) {
			$shipment = $shipment['shipment'];
		} else {
			$shipment = array();
		}
		
		if (isset($shipment['pdf'])) {
			$pdf = $shipment['pdf'];
		} else {
			$pdf = '';
		}
		
		if (isset($shipment['delivery_date'])) {
			$delivery_date = $shipment['delivery_date'];
		} else {
			$delivery_date = '0000-00-00';
		}
		
		if (isset($shipment['mail_send'])) {
			$mail_send = $shipment['mail_send'];
		} else {
			$mail_send = 0;
		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_sameday_order SET status_id = '" . (int)$status_id . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', shipment = '" . $this->db->escape(json_encode($shipment)) . "', pdf = '" . $this->db->escape($pdf) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', mail_send = '" . $this->db->escape($mail_send) . "' WHERE order_id  = '" . (int)$order_id . "'");
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_order WHERE shipment_status NOT IN ('9', '15', '16', '18', '77', '94')  OR shipment_status is NULL AND status_id > 0");
		
		return $query->rows;
	}
	
	// данни за офиси и адреси
	public function getLockersCounties($country_iso, $name = false) {
		
		$sql = "SELECT county_id, county FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "' ";
		
		if ($name) {
			$latin_to_cyrillic = $this->latin_to_cyrillic($name);
			$cyrillic_to_latin = $this->cyrillic_to_latin($name);
			
			$sql .= " AND (county LIKE '%" . $this->db->escape($name) . "%' OR county LIKE '%" . $this->db->escape($latin_to_cyrillic) . "%' OR county LIKE '%" . $this->db->escape($cyrillic_to_latin) . "%') ";
		}
		
		$sql .= " GROUP BY county_id ORDER BY county";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getLockersCities($country_iso, $county_id, $name = false) {
		
		$sql = "SELECT city_id, city, postcode FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "' AND county_id = '" . (int)$county_id . "' ";
		
		if ($name) {
			$latin_to_cyrillic = $this->latin_to_cyrillic($name);
			$cyrillic_to_latin = $this->cyrillic_to_latin($name);
			
			$sql .= " AND (city LIKE '%" . $this->db->escape($name) . "%' OR city LIKE '%" . $this->db->escape($latin_to_cyrillic) . "%' OR city LIKE '%" . $this->db->escape($cyrillic_to_latin) . "%') ";
		}
		
		$sql .= " GROUP BY city_id ORDER BY city";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getLockers($country_iso, $city_id, $name = false) {
		
		$sql = "SELECT locker_id, name, address FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "' AND city_id = '" . (int)$city_id . "' ";
		
		if ($name) {
			$latin_to_cyrillic = $this->latin_to_cyrillic($name);
			$cyrillic_to_latin = $this->cyrillic_to_latin($name);
			
			$sql .= " AND (name LIKE '%" . $this->db->escape($name) . "%' OR name LIKE '%" . $this->db->escape($latin_to_cyrillic) . "%' OR name LIKE '%" . $this->db->escape($cyrillic_to_latin) . "%' ";
			$sql .= " OR locker_id LIKE '%" . $this->db->escape($name) . "%' OR locker_id LIKE '%" . $this->db->escape($latin_to_cyrillic) . "%' OR locker_id LIKE '%" . $this->db->escape($cyrillic_to_latin) . "%' ";
			$sql .= " OR address LIKE '%" . $this->db->escape($name) . "%' OR address LIKE '%" . $this->db->escape($latin_to_cyrillic) . "%' OR address LIKE '%" . $this->db->escape($cyrillic_to_latin) . "%') ";
		}
		
		$sql .= " GROUP BY locker_id ORDER BY name";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCounties($country_iso, $page = 1, $name = false) {
		
		$cities = array();
		
		$data['page'] = $page;
		$data['countryCode'] = $country_iso;
		
		if ($name) {
			$data['name'] = $name;
		}
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$cities = TkSameday::getCounty($data);
		} catch (\Exception $e) {
			$cities['error_warning'] = $e->getMessage();
		}
		
		return $cities;
	}
	
	public function getCities($country_iso, $county_id, $page = 1, $name = false) {
		
		$cities = array();
		
		$data['page'] = $page;
		$data['countryCode'] = $country_iso;
		$data['county'] = $county_id;
		
		if ($name) {
			$data['name'] = $name;
		}
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$cities = TkSameday::getCity($data);
		} catch (\Exception $e) {
			$cities['error_warning'] = $e->getMessage();
		}
		
		return $cities;
	}
	
	// заявки към апи за товарителница
	public function calculate($data) {
		
		$result = array();
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$result = TkSameday::costShipment($data);
			
			// запис на грешките
			if (!empty($result['errors']) && !empty($result['message'])) {
				
				$errors = array();
				foreach ($result['errors']['children'] as $key_1 => $value_1) {
					foreach ($value_1 as $key_2 => $value_2) {
						if (is_array($value_2)) {
							if ($key_2 == 'errors') {
								$errors[$key_1] = $value_2[0];
							} else {
								foreach ($value_2 as $key_3 => $value_3) {
									if (is_array($value_3)) {
										if ($key_3 == 'errors') {
											$errors[$key_2] = $value_3[0];
										} else {
											foreach ($value_3 as $key_4 => $value_4) {
												if (is_array($value_4)) {
													if ($key_4 == 'errors') {
														$errors[$key_3] = $value_4[0];
													} else {
														foreach ($value_4 as $key_5 => $value_5) {
															if (is_array($value_5)) {
																if ($key_5 == 'errors') {
																	$errors[$key_4] = $value_5[0];
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
				
				$html_error = $result['message'];
				if ($errors) {
					$html_error .= '<br>';
					foreach ($errors as $key => $value) {
						if ($key == 'awbPayment') {
							$key = 'awb_payment';
						}
						
						$result['error'][$key] = $value;
						
						$html_error .= $key . ' - ' . $value . '<br>';
					}
				}
				
				$result['error']['warning'] = $html_error;
			}
		} catch (\Exception $e) {
			// запис на грешките
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('Sameday: costShipment');
				$this->log->write($e->getMessage());
			}
		}
		
		return $result;
	}
	
	public function create($data) {
		
		$result = array();
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$result = TkSameday::createShipment($data);
			
			// запис на грешките
			if (!empty($result['errors']) && !empty($result['message'])) {
				
				$errors = array();
				foreach ($result['errors']['children'] as $key_1 => $value_1) {
					foreach ($value_1 as $key_2 => $value_2) {
						if (is_array($value_2)) {
							if ($key_2 == 'errors') {
								$errors[$key_1] = $value_2[0];
							} else {
								foreach ($value_2 as $key_3 => $value_3) {
									if (is_array($value_3)) {
										if ($key_3 == 'errors') {
											$errors[$key_2] = $value_3[0];
										} else {
											foreach ($value_3 as $key_4 => $value_4) {
												if (is_array($value_4)) {
													if ($key_4 == 'errors') {
														$errors[$key_3] = $value_4[0];
													} else {
														foreach ($value_4 as $key_5 => $value_5) {
															if (is_array($value_5)) {
																if ($key_5 == 'errors') {
																	$errors[$key_4] = $value_5[0];
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
				
				$html_error = $result['message'];
				if ($errors) {
					$html_error .= '<br>';
					foreach ($errors as $key => $value) {
						if ($key == 'awbPayment') {
							$key = 'awb_payment';
						}
						
						$result['error'][$key] = $value;
						
						$html_error .= $key . ' - ' . $value . '<br>';
					}
				}
				
				$result['error']['warning'] = $html_error;
			}
		} catch (\Exception $e) {
			// запис на грешките
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('Sameday: createShipment');
				$this->log->write($e->getMessage());
			}
		}
		
		return $result;
	}
	
	public function track($shipment_number) {
		
		$result = array();
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		
		try {
			$result = TkSameday::getShipment($shipment_number);
		} catch (\Exception $e) {
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('SamedayLevel: | trackShipments');
				$this->log->write($e->getMessage());
			}
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
	
	public function parcel($shipment_number) {
		
		$result = array();
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		
		try {
			$result = TkSameday::printShipment($shipment_number);
		} catch (\Exception $e) {
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('SamedayLevel: ' . $shipment_number . ' | printShipment');
				$this->log->write($e->getMessage());
			}
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
	
	public function cancel($shipment_number) {
		
		$result = array();
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		
		try {
			$result = TkSameday::cancelShipment($shipment_number);
		} catch (\Exception $e) {
			if ($this->config->get('module_tk_checkout_debug')) {
				$this->log->write('SamedayLevel: ' . $shipment_number . ' | cancelShipment');
				$this->log->write($e->getMessage());
			}
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
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
	
}