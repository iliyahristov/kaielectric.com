<?php

class ControllerExtensionShippingTkSameday extends Controller {
	
	public function getCounties() {
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->model('extension/module/tk_checkout');
		
		$json['counties'] = array();
		
		if (!empty($this->request->get['country_iso'])) {
			
			if (isset($this->request->get['name'])) {
				$name = $this->request->get['name'];
				
				if ($this->request->get['country_iso'] == 'BG') {
					$name = $this->model_extension_module_tk_checkout->latin_to_cyrillic($name);
				}
			} else {
				$name = false;
			}
			
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
			
			$results = $this->model_extension_shipping_tk_sameday->getCounties($this->request->get['country_iso'], $page, $name);
			if (!empty($results['data'])) {
				foreach ($results['data'] as $result) {
					if ($this->config->get('config_language') != 'bg' && $this->config->get('config_language') != 'bg-bg' && $this->config->get('config_language') != 'bulgarian') {
						$result_name = $result['latinName'];
					} else {
						$result_name = $result['name'];
					}
					$json['counties'][] = array(
						'county_id' => $result['id'],
						'name'      => $result_name
					);
				}
				
				$json['total'] = $results['total'];
				$json['pages'] = $results['pages'];
				$json['current'] = $results['currentPage'];
				$json['per_page'] = $results['perPage'];
			}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function getCities() {
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->model('extension/module/tk_checkout');
		
		$json['cities'] = array();
		
		if (!empty($this->request->get['country_iso']) && !empty($this->request->get['county_id'])) {
			
			if (isset($this->request->get['name'])) {
				$name = $this->request->get['name'];
				
				if ($this->request->get['country_iso'] == 'BG') {
					$name = $this->model_extension_module_tk_checkout->latin_to_cyrillic($name);
				}
			} else {
				$name = false;
			}
			
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
			
			$results = $this->model_extension_shipping_tk_sameday->getCities($this->request->get['country_iso'], $this->request->get['county_id'], $page, $name);
			if (!empty($results['data'])) {
				foreach ($results['data'] as $result) {
					if ($this->config->get('config_language') != 'bg' && $this->config->get('config_language') != 'bg-bg' && $this->config->get('config_language') != 'bulgarian') {
						$result_name = $result['latinName'];
					} else {
						$result_name = $result['name'];
					}
					
					$json['cities'][] = array(
						'city_id'  => $result['id'],
						'name'     => $result_name,
						'postcode' => $result['postalCode']
					);
				}
				
				$json['total'] = $results['total'];
				$json['pages'] = $results['pages'];
				$json['current'] = $results['currentPage'];
				$json['per_page'] = $results['perPage'];
			}
		}
		
		$json['cities_count'] = count($json['cities']);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function getLockersCities() {
		
		$this->load->model('extension/shipping/tk_sameday');
		
		$json['sameday_cities'] = array();
		
		if (!empty($this->request->get['country_iso']) && !empty($this->request->get['locker_county_id'])) {
			
			$results = $this->model_extension_shipping_tk_sameday->getLockersCities($this->request->get['country_iso'], $this->request->get['locker_county_id']);
			foreach ($results as $result) {
				if (!empty($result['city'])) {
					$json['sameday_cities'][] = array(
						'locker_city_id'  => $result['city_id'],
						'locker_city'     => $result['city'],
						'locker_postcode' => $result['postcode']
					);
				}
			}
		}
		
		$json['cities_count'] = count($json['sameday_cities']);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function getLockers() {
		
		$this->load->model('extension/shipping/tk_sameday');
		
		$json['sameday_lockers'] = array();
		
		if (!empty($this->request->get['country_iso']) && !empty($this->request->get['locker_city_id'])) {
			
			$results = $this->model_extension_shipping_tk_sameday->getLockers($this->request->get['country_iso'], $this->request->get['locker_city_id']);
			foreach ($results as $result) {
				if (!empty($result['name'])) {
					$json['sameday_lockers'][] = array(
						'locker_id' => $result['locker_id'],
						'locker_name'      => $result['name'],
						'locker_address'   => $result['address']
					);
				}
			}
		}
		
		$json['lockers_count'] = count($json['sameday_lockers']);
		
		$this->response->setOutput(json_encode($json));
	}
	
	//функция за ъпдейт на автомати от крон
	public function update() {
		
		$this->log->write('Sameday lockers cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->load->model('setting/setting');
		
		if ($this->config->get('module_tk_checkout_token')) {
			$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
			$sameday_country = $sameday_setting['shipping_tk_sameday_countries'];
			
			foreach ($sameday_country as $country_iso => $value) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "'");
				if (isset($value['status']) && $value['status'] == 1) {
					$this->update_loop($country_iso, 1);
				}
			}
		}
	}
	
	public function update_loop($country_iso, $page = 1) {
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->load->model('extension/shipping/tk_sameday');
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$get = array(
				'page'        => $page,
				'countryCode' => $country_iso
			);
			$sameday = TkSameday::getLockers($get);
			
			if (!empty($sameday['total']) && $sameday['total'] > 0 && $sameday['currentPage'] <= $sameday['pages']) {
				$this->model_extension_shipping_tk_sameday->updateLocker($sameday['data'], $country_iso);
			
				$this->update_loop($country_iso, $sameday['currentPage'] + 1);
			}
		} catch (\Exception $e) {
			if ($this->config->get('shipping_tk_sameday_debug')) {
				$this->log->write($e->getMessage());
			}
		}
	}
	
	public function shipping() {
		
		$this->log->write('Sameday shipping cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$response_data = array();
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings = $this->model_extension_shipping_tk_sameday->getNotDelivered();
		
		if ($loadings) {
			
			if ($this->config->get('shipping_tk_sameday_order_status')) {
				$api_token = $this->model_extension_module_tk_checkout->getApiToken();
			} else {
				$api_token = '';
			}
			
			$tk_sameday_order_status = $this->config->get('shipping_tk_sameday_order_status');
			$tk_sameday_order_status_mail = $this->config->get('shipping_tk_sameday_order_status_mail');
			$tk_sameday_order_status_mail_text = $this->config->get('shipping_tk_sameday_order_status_mail_text');
			
			foreach ($loadings as $loading) {
				
				$label = array();
				$order_status_id = 0;
				$order_status_mail = 0;
				$order_status_mail_text = '';
				
				$order_info = $this->model_extension_shipping_tk_sameday->getOrder($loading['order_id']);
	
				if (!empty($order_info) && !empty($order_info['shipment_number'])) {
					$awb_status = $this->model_extension_shipping_tk_sameday->track($order_info['shipment_number']);
					
					if (!empty($awb_status['expeditionStatus']['statusId'])) {
						
						$label['status'] = $awb_status['expeditionStatus']['status'];
						$label['status_id'] = 2;
						$label['shipment_status'] = $awb_status['expeditionStatus']['statusId'];
						
						$label['awb'] = $order_info['shipment_number'];
						$label['shipment'] = json_decode($order_info['shipment'], true);
						$label['pdf'] = $order_info['pdf'];
						$label['mail_send'] = $order_info['mail_send'];
						
						// искаме ли да сменим статуса
						if (!empty($tk_sameday_order_status[$label['shipment_status']])) {
							$order_status_id = $tk_sameday_order_status[$label['shipment_status']];
						}
						
						$order_info = $this->model_extension_module_tk_checkout->getOrder($loading['order_id']);
						
						if ($order_status_id > 0 && $api_token && $order_status_id != $order_info['order_status_id']) {
							
							if (!empty($tk_sameday_order_status_mail[$label['shipment_status']])) {
								$order_status_mail = $tk_sameday_order_status_mail[$label['shipment_status']];
							}
							
							if ($order_status_mail > 0) {
								
								if (!empty($tk_sameday_order_status_mail_text[$label['shipment_status']])) {
									$patterns = array();
									$patterns[0] = '{shipment_number}';
									
									$replacements = array();
									$replacements[0] = $label['awb'];
									
									$order_status_mail_text = str_replace($patterns, $replacements, $tk_sameday_order_status_mail_text[$label['shipment_status']]);
								}
								
								$history_data = array(
									'order_status_id' => $order_status_id,
									'notify'          => true,
									'comment'         => $order_status_mail_text
								);
							} else {
								$history_data = array(
									'order_status_id' => $order_status_id,
									'notify'          => false,
									'comment'         => ''
								);
							}
							
							if (!empty($order_info['mail_send']) && $order_info['mail_send'] == $label['shipment_status']) {
								$history_data['notify'] = false;
							} else {
								$label['mail_send'] = $label['shipment_status'];
							}
							
							$this->model_extension_module_tk_checkout->addOrderHistory($order_info['order_id'], $api_token, $history_data);
						}
						
						$this->model_extension_shipping_tk_sameday->editShipment($order_info['order_id'], $label);
					}
				}
			}
		}
		
		$response_data['success'] = 'Товарителниците са опреснени';
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
}
