<?php

class ControllerExtensionShippingTkBoxnow extends Controller {
	
	public function set() {
		
		if (isset($this->request->post['boxnow_locker_id'])) {
			$this->session->data['tk_checkout']['boxnow']['locker_id'] = $this->request->post['boxnow_locker_id'];
		}
		
		if (isset($this->request->post['boxnow_locker_address'])) {
			$this->session->data['tk_checkout']['boxnow']['locker_address'] = $this->request->post['boxnow_locker_address'];
		}
		
		if (isset($this->request->post['boxnow_locker_name'])) {
			$this->session->data['tk_checkout']['boxnow']['locker_name'] = $this->request->post['boxnow_locker_name'];
		}
	}
	
	public function shipping() {
		
		$this->log->write('Box Now shipping cron update started');
		
		$this->load->language('extension/shipping/tk_boxnow');
		
		$this->load->model('extension/shipping/tk_boxnow');
		$this->load->model('extension/module/tk_checkout');
		
		$text_statuses = $this->language->get('text_status_boxnow');
		
		$tk_boxnow_order_status = $this->config->get('shipping_tk_boxnow_order_status');
		$tk_boxnow_order_status_mail = $this->config->get('shipping_tk_boxnow_order_status_mail');
		$tk_boxnow_order_status_mail_text = $this->config->get('shipping_tk_boxnow_order_status_mail_text');
		
		$loadings = $this->model_extension_shipping_tk_boxnow->getNotDelivered();
		
		if ($loadings) {
			
			$authorization = $this->model_extension_shipping_tk_boxnow->serviceJSON();
			
			if ($authorization) {
				
				if ($this->config->get('shipping_tk_boxnow_order_status')) {
					$api_token = $this->model_extension_module_tk_checkout->getApiToken();
				} else {
					$api_token = '';
				}
			
				foreach ($loadings as $loading) {
					
					$order_status_id = 0;
					$order_status_mail = 0;
					$order_status_mail_text = '';
					
					$status_code_old = $loading['status_code'];
					
					$curl_request = curl_init();
					curl_setopt($curl_request, CURLOPT_URL, $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/parcels?parcelId=' . $loading['parcel']);
					curl_setopt($curl_request, CURLOPT_HTTPHEADER, array(
						'Accept: application/json',
						'Content-type: application/json',
						$authorization
					));
					curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl_request, CURLOPT_POST, 0);
					curl_setopt($curl_request, CURLOPT_CONNECTTIMEOUT, 5);
					curl_setopt($curl_request, CURLOPT_TIMEOUT, 60);
					
					$response_data = curl_exec($curl_request);
					$response = json_decode($response_data, true);
					
					curl_close($curl_request);
					
					if (!isset($response['data'][0]['status']) && isset($response['data'][0]['state']) && $response['data'][0]['state'] != $status_code_old) {
						$loading['request_id'] = $response['data'][0]['id'];
						$loading['status_id'] = 3;
						$loading['status_message'] = $text_statuses[$response['data'][0]['state']];
						$loading['status_code'] = $response['data'][0]['state'];
						$loading['status'] = 3;
						
						// искаме ли да сменим статуса
						if (isset($tk_boxnow_order_status[$loading['status_code']])) {
							$order_status_id = $tk_boxnow_order_status[$loading['status_code']];
						}
						
						$order_info = $this->model_extension_module_tk_checkout->getOrder($loading['order_id']);
						
						if ($order_status_id > 0 && $order_status_id != $order_info['order_status_id']) {
							
							if ($api_token) {
								
								if (!empty($tk_boxnow_order_status_mail[$loading['status_code']])) {
									$order_status_mail = $tk_boxnow_order_status_mail[$loading['status_code']];
								}
								
								if ($order_status_mail > 0) {
									
									if (!empty($tk_boxnow_order_status_mail_text[$loading['status_code']])) {
										$patterns = array();
										$patterns[0] = '{shipment_number}';
										
										$replacements = array();
										$replacements[0] = $loading['shipment_number'];
										
										$order_status_mail_text = str_replace($patterns, $replacements, $tk_boxnow_order_status_mail_text[$loading['status_code']]);
									}
									
									$history_data = array(
										'order_status_id' => $order_status_id,
										'notify' => true,
										'comment' => $order_status_mail_text
									);
								} else {
									$history_data = array(
										'order_status_id' => $order_status_id,
										'notify' => false,
										'comment' => ''
									);
								}
								
								if (isset($loading['mail_send']) && $loading['mail_send'] == $loading['status_code']) {
									$history_data['notify'] = false;
								}
								
								$loading['mail_send'] = $loading['status_code'];
								
								$this->model_extension_module_tk_checkout->addOrderHistory($loading['order_id'], $api_token, $history_data);
							}
						}
						
						$this->model_extension_shipping_tk_boxnow->updateOrder($loading['order_id'], $loading);
					}
				}
			}
		}
		
		$response['success'] = true;
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response, JSON_UNESCAPED_UNICODE));
	}
}