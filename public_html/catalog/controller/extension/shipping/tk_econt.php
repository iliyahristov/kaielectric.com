<?php

class ControllerExtensionShippingTkEcont extends Controller {
	
	public function getOfficesByCityId() {
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = 0;
		}
		
		if (isset($this->request->get['is_machine'])) {
			$is_machine = $this->request->get['is_machine'];
		} else {
			$is_machine = 0;
		}
		
		$data = array();
		$results = $this->model_extension_shipping_tk_econt->getOfficesByCityId($city_id, $is_machine);
		foreach ($results as $result) {
			$city = $this->model_extension_shipping_tk_econt->getCity($result['city_id']);
			$address = str_replace($city['name'] . ', ', '', $result['address']);
			$address = str_replace($city['name'] . ' ', '', $address);
			$name = str_replace($city['name'] . ', ', '', $result['name']);
			$name = str_replace($city['name'] . ' ', '', $name);
			$data['offices'][] = array(
				'office_id'   => $result['office_id'],
				'office_code' => $result['office_code'],
				'name'        => $name,
				'address'     => $address,
				'city_id'     => $result['city_id'],
				'is_machine'  => $result['is_machine']
			);
		}
		
		$office_city = $this->model_extension_shipping_tk_econt->getCity($city_id);
		$data['office_city'] = $office_city['name'];
		$data['city_post_code'] = $office_city['post_code'];
		$data['offices_count'] = count($data['offices']);
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getOffice() {
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->post['office_id'])) {
			$office_id = $this->request->post['office_id'];
		} else {
			$office_id = 0;
		}
		
		$results = $this->model_extension_shipping_tk_econt->getOffice($office_id);
		
		$this->response->setOutput(json_encode($results));
	}
	
	public function getOfficeByOfficeCode() {
		
		$json = array();
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->post['office_code']) && $this->request->post['office_code']) {
			$office = $this->model_extension_shipping_tk_econt->getOfficeByOfficeCode(trim($this->request->post['office_code']));
			if (!empty($office)) {
				$json['office_id'] = $office['office_id'];
				$json['city_id'] = $office['city_id'];
				$json['office_city'] = $office['office_city'];
				
				$results = $this->model_extension_shipping_tk_econt->getOffice($office['office_id']);
				$json['name'] = $results['name'];
				$json['address'] = $results['address'];
				$json['office_code'] = $results['office_code'];
				$json['post_code'] = $results['post_code'];
				
				$machine_enabled = $this->config->get('shipping_tk_econt_machine_enabled');
				
				$json['offices'] = $this->model_extension_shipping_tk_econt->getOfficesByCityId($office['city_id'], $machine_enabled);
			} else {
				$json['error'] = $this->language->get('error_office_not_found');
			}
		} else {
			$json['error'] = $this->language->get('error_office_not_found');
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function getQuartereStreet() {
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = 0;
		}
		
		$data['quarters'] = array();
		$city_quarters = $this->model_extension_shipping_tk_econt->getQuartersByCityId($city_id);
		if ($city_quarters) {
			$quarters_count = count($city_quarters);
			$data['quarters_count'] = $quarters_count;
			foreach ($city_quarters as $result) {
				$data['quarters'][] = array(
					'quarter_id' => $result['quarter_id'],
					'name'       => $result['name']
				);
			}
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		$filter_data = array(
			'start' => ($page - 1) * 20,
			'limit' => 20
		);
		
		$data['streets'] = array();
		$city_streets = $this->model_extension_shipping_tk_econt->getStreetsByCityId($city_id, $filter_data);
		if ($city_streets) {
			$streets_count = count($city_streets);
			$data['streets_count'] = $streets_count;
			foreach ($city_streets as $result) {
				$data['streets'][] = array(
					'street_id' => $result['street_id'],
					'name'      => $result['name']
				);
			}
		}
		
		$data['city'] = array();
		$city = $this->model_extension_shipping_tk_econt->getCity($city_id);
		if ($city) {
			$data['city_id'] = $city['city_id'];
			$data['city_name'] = $city['name'];
			$data['city_post_code'] = $city['post_code'];
		}
		$this->response->setOutput(json_encode($data));
	}
	
	public function getCityByName() {
		
		$json = array();
		
		if (isset($this->request->get['filter_name'])) {
			$this->load->model('extension/shipping/tk_econt');
			
			$filter_name = $this->request->get['filter_name'];
			
			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = 10;
			}
			
			$json = $this->model_extension_shipping_tk_econt->getCityByName($filter_name, $limit);
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function getQuartersByName() {
		
		$json = array();
		
		if (isset($this->request->get['filter_name'])) {
			$this->load->model('extension/shipping/tk_econt');
			
			$filter_name = $this->request->get['filter_name'];
			
			if (isset($this->request->get['city_id'])) {
				$city_id = $this->request->get['city_id'];
			} else {
				$city_id = 0;
			}
			
			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = 10;
			}
			
			$json = $this->model_extension_shipping_tk_econt->getQuartersByName($filter_name, $city_id, $limit);
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function getStreetsByName() {
		
		$json = array();
		
		if (isset($this->request->get['filter_name'])) {
			$this->load->model('extension/shipping/tk_econt');
			
			$filter_name = $this->request->get['filter_name'];
			
			if (isset($this->request->get['city_id'])) {
				$city_id = $this->request->get['city_id'];
			} else {
				$city_id = 0;
			}
			
			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = 10;
			}
			
			$json = $this->model_extension_shipping_tk_econt->getStreetsByName($filter_name, $city_id, $limit);
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function autocompleteCity() {
		
		$json = array();
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}
		$limit = 20;
		
		$filter_data = array(
			'filter_name' => $filter_name,
			'start'       => ($page - 1) * 20
		);
		
		$results = $this->model_extension_shipping_tk_econt->getCityByName($filter_data, $limit);
		foreach ($results as $result) {
			$json[] = array(
				'city_id'   => $result['city_id'],
				'post_code' => $result['post_code'],
				'type'      => $result['type'],
				'name'      => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
			);
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function autocompleteStreet() {
		
		$json = array();
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		if (isset($this->request->get['city_id'])) {
			$city_id = $this->request->get['city_id'];
		} else {
			$city_id = 0;
		}
		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}
		$limit = 20;
		
		$filter_data = array(
			'filter_name' => $filter_name,
			'start'       => ($page - 1) * 20
		);
		
		$results = $this->model_extension_shipping_tk_econt->getStreetsByName($filter_data, $city_id, $limit);
		foreach ($results as $result) {
			$json[] = array(
				'street_id' => $result['street_id'],
				'city_id'   => $result['city_id'],
				'name'      => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
			);
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//функция за ъпдейт на офиси и адреси от крон
	public function update() {
		
		$this->log->write('Econt office cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$results_data = array();
		
		$this->language->load('extension/shipping/tk_econt');
		
		$this->load->model('extension/shipping/tk_econt');
		
		$result = $this->model_extension_shipping_tk_econt->updateOffices();
		if ($result) {
			$results_data['success'] = $this->language->get('text_success_update');
		}
		
		$this->response->setOutput(json_encode($results_data));
	}
	
	//функция за ъпдейт на товарителници от крон
	public function shipping() {
		
		$this->log->write('Econt shipping cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->language->load('extension/shipping/tk_econt');
		
		$this->load->model('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings = $this->model_extension_shipping_tk_econt->getNotDelivered();
		
		if ($loadings) {
			
			if ($this->config->get('shipping_tk_econt_order_status')) {
				$api_token = $this->model_extension_module_tk_checkout->getApiToken();
			} else {
				$api_token = '';
			}
			
			$tk_econt_order_status = $this->config->get('shipping_tk_econt_order_status');
			$tk_econt_order_status_mail = $this->config->get('shipping_tk_econt_order_status_mail');
			$tk_econt_order_status_mail_text = $this->config->get('shipping_tk_econt_order_status_mail_text');
			
			foreach ($loadings as $loading) {
				
				$response = array();
				$order_status_id = 0;
				$order_status_mail = 0;
				$order_status_mail_text = '';
				
				$order_info = $this->model_extension_module_tk_checkout->getOrder($loading['order_id']);
				
				if (!isset($order_info['store_id']) || !$order_info['store_id']) {
					$order_info['store_id'] = $this->config->get('config_store_id');
				}
				
				if (!empty($loading['loading_id'])) {
					$delivery_url = 'services/OrdersService.getTrace.json';
					$delivery_data['id'] = $loading['loading_id'];
					$response = $this->model_extension_shipping_tk_econt->serviceDelivery($delivery_url, $delivery_data, $order_info['store_id']);
				}
				
				if (empty($response['trackingEvents'])) {
					if (isset($loading['shipment_number']) && $loading['shipment_number']) {
						$response_all = $this->model_extension_shipping_tk_econt->serviceJSON($loading);
						
						if (isset($response_all['shipmentStatuses'][0]['status']) && $response_all['shipmentStatuses'][0]['status']) {
							$response = $response_all['shipmentStatuses'][0]['status'];
						} else if (isset($response_all['shipmentStatuses'][0]['error']) && $response_all['shipmentStatuses'][0]['error']) {
							$response = $response_all['shipmentStatuses'][0];
						}
					}
				}
				
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
					
					// искаме ли да сменим статуса
					if ($this->config->get('shipping_tk_econt_order_status')) {
						$reversed = array_reverse($response['trackingEvents']);
						
						if (!empty($reversed[0]['destinationType'])) {
							$shipment_status = $reversed[0]['destinationType'];
						} else {
							$shipment_status = 'unknown';
						}
						
						if (!empty($tk_econt_order_status[$shipment_status])) {
							$order_status_id = $tk_econt_order_status[$shipment_status];
						}
						
						if ($order_status_id > 0 && $api_token && $order_status_id != $order_info['order_status_id']) {
							
							if (!empty($tk_econt_order_status_mail[$shipment_status])) {
								$order_status_mail = $tk_econt_order_status_mail[$shipment_status];
							}
							
							if ($order_status_mail > 0) {
								
								if (!empty($tk_econt_order_status_mail_text[$shipment_status])) {
									$patterns = array();
									$patterns[0] = '{shipment_number}';
									
									$replacements = array();
									$replacements[0] = $loading['shipment_number'];
									
									$order_status_mail_text = str_replace($patterns, $replacements, $tk_econt_order_status_mail_text[$shipment_status]);
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
							
							if (isset($loading['mail_send']) && $loading['mail_send'] == $shipment_status) {
								$history_data['notify'] = false;
							}
							
							$this->model_extension_module_tk_checkout->addOrderHistory($loading['order_id'], $api_token, $history_data);
						}
					}
				}
				
				if (!empty($response)) {
					$this->model_extension_shipping_tk_econt->editShipment($loading['order_id'], $response);
				}
			}
		}
		
		$response['success'] = 'Товарителниците са опреснени';
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response, JSON_UNESCAPED_UNICODE));
	}
}