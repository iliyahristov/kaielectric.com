<?php

class ControllerExtensionShippingTkSpeedy extends Controller {
	
	public function getMachinesByCityId() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = 0;
		}
		
		$data = array();
		$results = $this->model_extension_shipping_tk_speedy->getMachinesByCityId($city_id);
		foreach ($results as $result) {
			$data['machines'][] = array(
				'office_id' => $result['office_id'],
				'name'      => ucfirst($result['name']),
				'address'   => ucfirst($result['address']),
				'city_id'   => $result['city_id']
			);
		}
		
		$machine_city = $this->model_extension_shipping_tk_speedy->getCityOfficeByCityId($city_id);
		$data['machine_city'] = $machine_city['name'];
		$data['city_post_code'] = $machine_city['post_code'];
		$data['machines_count'] = count($data['machines']);
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getOfficesByCityId() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = 0;
		}
		
		$data = array();
		$results = $this->model_extension_shipping_tk_speedy->getOfficesByCityId($city_id);
		foreach ($results as $result) {
			$data['offices'][] = array(
				'office_id' => $result['office_id'],
				'name'      => ucfirst($result['name']),
				'address'   => ucfirst($result['address']),
				'city_id'   => $result['city_id']
			);
		}
		
		$office_city = $this->model_extension_shipping_tk_speedy->getCityByCityId($city_id);
		$data['office_city'] = $office_city['name'];
		$data['city_post_code'] = $office_city['post_code'];
		$data['offices_count'] = count($data['offices']);
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getOffice() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($this->request->post['office_id'])) {
			$office_id = $this->request->post['office_id'];
		} else {
			$office_id = 0;
		}
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = false;
		}
		
		$results = $this->model_extension_shipping_tk_speedy->getOffice($office_id, $city_id);
		
		$this->response->setOutput(json_encode($results));
	}
	
	public function getQuartereStreet() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = 0;
		}
		
		$data['quarters'] = $this->model_extension_shipping_tk_speedy->getQuartersByCityId($city_id);
		$data['quarters_count'] = count($data['quarters']);
		
		$data['streets'] = $this->model_extension_shipping_tk_speedy->getStreetsByCityId($city_id);
		$data['streets_count'] = count($data['streets']);
		
		$data['city'] = array();
		$city = $this->model_extension_shipping_tk_speedy->getCityByCityId($city_id);
		
		if ($city) {
			$data['city_id'] = $city['city_id'];
			$data['city_name'] = $city['name'];
			$data['city_post_code'] = $city['post_code'];
		}
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function autocompleteCity() {
		
		$json = array();
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}
		
		if(empty($filter_name)){
			$results = $this->model_extension_shipping_tk_speedy->getCitiesWithOffices();
		} else {
			$results = $this->model_extension_shipping_tk_speedy->getCities($filter_name);
		}
		
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
	
	public function autocompleteCityOffice() {
		
		$json = array();
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}
		
		$results = $this->model_extension_shipping_tk_speedy->getCitiesWithOffices($filter_name);
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
	
	public function autocompleteQuarter() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
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
		
		$json = $this->model_extension_shipping_tk_speedy->getQuartersByCityId($city_id, $filter_name);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function autocompleteStreet() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
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
		
		$json = $this->model_extension_shipping_tk_speedy->getStreetsByCityId($city_id, $filter_name);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//функция за ъпдейт на офиси и адреси от крон
	public function update() {
		
		$this->log->write('Speedy office cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->language->load('extension/shipping/tk_speedy');
		
		$this->load->model('extension/shipping/tk_speedy');
		
		$results_data = array();
		$result = $this->model_extension_shipping_tk_speedy->updateOffices();
		if ($result) {
			$results_data['success'] = $this->language->get('text_success_update');
		}
		
		$this->response->setOutput(json_encode($results_data));
	}
	
	//функция за ъпдейт на товарителници от крон
	public function shipping() {
		
		$this->log->write('Speedy shipping cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$response_data = array();
		
		$this->language->load('extension/shipping/tk_speedy');
		
		$this->load->model('extension/shipping/tk_speedy');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings = $this->model_extension_shipping_tk_speedy->getNotDelivered();
		
		if ($loadings) {
			
			if ($this->config->get('shipping_tk_speedy_order_status')) {
				$api_token = $this->model_extension_module_tk_checkout->getApiToken();
			} else {
				$api_token = '';
			}
			
			$tk_speedy_order_status = $this->config->get('shipping_tk_speedy_order_status');
			$tk_speedy_order_status_mail = $this->config->get('shipping_tk_speedy_order_status_mail');
			$tk_speedy_order_status_mail_text = $this->config->get('shipping_tk_speedy_order_status_mail_text');
			
			foreach ($loadings as $loading) {
				
				$label = array();
				$bol_status = array();
				$response = array();
				$order_status_id = 0;
				$order_status_mail = 0;
				$order_status_mail_text = '';
				
				$order_info = $this->model_extension_shipping_tk_speedy->getOrder($loading['order_id']);
				
				if (!empty($order_info) && !empty($order_info['shipment_number'])) {
					$bol_status = $this->model_extension_shipping_tk_speedy->trackShipment($order_info['shipment_number']);
					
					if (isset($status['error']['message'])) {
						$response['warning'] = $status['error']['message'];
					} else {
						$response = $bol_status;
					}
				} else {
					$response['warning'] = $this->language->get('error_exists');
				}
				
				if (!isset($response['warning']) && !empty($bol_status['code'])) {
					
					$label['bol_id'] = $loading['shipment_number'];
					$label['bol_status'] = $bol_status['code'];
					$label['bol_status_text'] = $bol_status['code'] . ' ' . $bol_status['description'];
					$label['pdf'] = '';
					
					// искаме ли да сменим статуса
					if (!empty($tk_speedy_order_status[$label['bol_status']])) {
						$order_status_id = $tk_speedy_order_status[$label['bol_status']];
					}
					
					$order_info = $this->model_extension_module_tk_checkout->getOrder($loading['order_id']);
					
					if ($order_status_id > 0 && $api_token && $order_status_id != $order_info['order_status_id']) {
						
						if (!empty($tk_speedy_order_status_mail[$label['bol_status']])) {
							$order_status_mail = $tk_speedy_order_status_mail[$label['bol_status']];
						}
						
						if ($order_status_mail > 0) {
							
							if (!empty($tk_speedy_order_status_mail_text[$label['bol_status']])) {
								$patterns = array();
								$patterns[0] = '{shipment_number}';
								
								$replacements = array();
								$replacements[0] = $label['bol_id'];
								
								$order_status_mail_text = str_replace($patterns, $replacements, $tk_speedy_order_status_mail_text[$label['bol_status']]);
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
						
						if (!empty($loading['mail_send']) && $loading['mail_send'] == $label['bol_status']) {
							$history_data['notify'] = false;
						}
						
						$this->model_extension_module_tk_checkout->addOrderHistory($loading['order_id'], $api_token, $history_data);
					}
					
					$this->model_extension_shipping_tk_speedy->editShipment($loading['order_id'], $label);
				}
			}
		}
		
		$response_data['success'] = 'Товарителниците са опреснени';
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
}
