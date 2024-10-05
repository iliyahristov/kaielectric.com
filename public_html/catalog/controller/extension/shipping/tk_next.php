<?php

class ControllerExtensionShippingTknext extends Controller {
	
	public function getCities() {
		
		$this->load->model('extension/shipping/tk_next');
		
		$json['cities'] = array();
		
		if (isset($this->request->get['country_iso'])) {
			$country_iso = $this->request->get['country_iso'];
		} else {
			$country_iso = 'BG';
		}
		
		if (isset($this->request->get['courier'])) {
			$courier = $this->request->get['courier'];
		} else {
			$courier = 'IMP';
		}
		
		if (isset($this->request->get['name'])) {
			$name = $this->request->get['name'];
		} else {
			$name = '';
		}
		
		if (isset($this->request->get['office'])) {
			$office = $this->request->get['office']; ////all,office,machine
		} else {
			$office = false;
		}
		
		$results = $this->model_extension_shipping_tk_next->getCities($country_iso, $courier, $office, $name);
		foreach ($results as $result) {
			if (!empty($result['name'])) {
				$json['cities'][] = array(
					'city_id'   => $result['id'],
					'postcode'  => $result['post_code'],
					'region'    => $result['region'],
					'city_name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}
		
		$json['cities_count'] = count($json['cities']);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function getOffices() {
		
		$this->load->model('extension/shipping/tk_next');
		
		$json['offices'] = array();
		
		if (isset($this->request->post['country_iso'])) {
			$country_iso = $this->request->post['country_iso'];
		} else {
			$country_iso = 'BG';
		}
		
		if (isset($this->request->post['courier'])) {
			$courier = $this->request->post['courier'];
		} else {
			$courier = 'IMP';
		}
		
		if (isset($this->request->post['postcode'])) {
			$postcode = $this->request->post['postcode'];
		} else {
			$postcode = 1000;
		}
		
		if (isset($this->request->post['office'])) {
			$office = $this->request->post['office']; ////all,office,machine
		} else {
			$office = 'all';
		}
		
		$results = $this->model_extension_shipping_tk_next->getOffices($country_iso, $courier, $postcode, $office);
		foreach ($results as $result) {
			if (!empty($result['name'])) {
				$json['offices'][] = array(
					'office_id'      => $result['id'],
					'office_code'    => $result['office_id'],
					'office_name'    => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
					'office_address' => strip_tags(html_entity_decode($result['address'], ENT_QUOTES, 'UTF-8')),
					'is_machine'     => $result['is_machine'],
				);
			}
		}
		
		$json['offices_count'] = count($json['offices']);
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function getStreets() {
		
		$this->load->model('extension/shipping/tk_next');
		
		$json['streets'] = array();
		
		if (isset($this->request->get['country_iso'])) {
			$country_iso = $this->request->get['country_iso'];
		} else {
			$country_iso = 'BG';
		}
		
		if (isset($this->request->get['postcode'])) {
			$postcode = $this->request->get['postcode'];
		} else {
			$postcode = '1000';
		}
		
		if (isset($this->request->get['name'])) {
			$name = $this->request->get['name'];
		} else {
			$name = '';
		}
		
		$results = $this->model_extension_shipping_tk_next->getStreets($country_iso, $postcode, $name);
		foreach ($results as $result) {
			if (!empty($result['name'])) {
				$json['streets'][] = array(
					'street_id'   => $result['id'],
					'street_name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}
		
		$json['streets_count'] = count($json['streets']);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	//функция за ъпдейт на товарителници от крон
	public function shipping() {
		
		$this->log->write('next shipping cron update started');
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$response_data = array();
		
		$this->language->load('extension/shipping/tk_next');
		
		$this->load->model('extension/shipping/tk_next');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings = $this->model_extension_shipping_tk_next->getNotDelivered();
		
		if ($loadings) {
			
			if ($this->config->get('shipping_tk_next_order_status')) {
				$api_token = $this->model_extension_module_tk_checkout->getApiToken();
			} else {
				$api_token = '';
			}
			
			$tk_next_order_status = $this->config->get('shipping_tk_next_order_status');
			$tk_next_order_status_mail = $this->config->get('shipping_tk_next_order_status_mail');
			$tk_next_order_status_mail_text = $this->config->get('shipping_tk_next_order_status_mail_text');
			
			foreach ($loadings as $loading) {
				
				$label = array();
				$bol_status = array();
				$response = array();
				$order_status_id = 0;
				$order_status_mail = 0;
				$order_status_mail_text = '';
				
				$order_info = $this->model_extension_shipping_tk_next->getOrder($loading['order_id']);
				
				if (!empty($order_info) && !empty($order_info['shipment_number'])) {
					$bol_status = $this->model_extension_shipping_tk_next->trackShipment($order_info['shipment_number']);
					
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
					if (!empty($tk_next_order_status[$label['bol_status']])) {
						$order_status_id = $tk_next_order_status[$label['bol_status']];
					}
					
					$order_info = $this->model_extension_module_tk_checkout->getOrder($loading['order_id']);
					
					if ($order_status_id > 0 && $api_token && $order_status_id != $order_info['order_status_id']) {
						
						if (!empty($tk_next_order_status_mail[$label['bol_status']])) {
							$order_status_mail = $tk_next_order_status_mail[$label['bol_status']];
						}
						
						if ($order_status_mail > 0) {
							
							if (!empty($tk_next_order_status_mail_text[$label['bol_status']])) {
								$patterns = array();
								$patterns[0] = '{shipment_number}';
								
								$replacements = array();
								$replacements[0] = $label['bol_id'];
								
								$order_status_mail_text = str_replace($patterns, $replacements, $tk_next_order_status_mail_text[$label['bol_status']]);
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
					
					$this->model_extension_shipping_tk_next->editShipment($loading['order_id'], $label);
				}
			}
		}
		
		$response_data['success'] = 'Товарителниците са опреснени';
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
}
