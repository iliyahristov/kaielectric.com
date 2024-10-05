<?php

class ControllerExtensionShippingTkTranspress extends Controller {
	
	//функция за ъпдейт на товарителници от крон
	public function shipping() {
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->load->model('extension/shipping/tk_transpress');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		$this->load->model('checkout/order');
		
		$this->load->library('tktranspress');
		
		$loadings = $this->extension_shipping_tk_transpress->getNotDelivered();
		
		if ($loadings) {
			
			if (!isset($this->tktranspress)) {
				$this->tktranspress = new Tktranspress($this->registry);
			}
			
			if ($this->config->get('shipping_tk_transpress_order_status')) {
				$api_token = $this->model_extension_module_tk_checkout->getApiToken();
			} else {
				$api_token = '';
			}
			
			foreach ($loadings as $loading) {
				$this->tktranspress->setType(Tktranspress::TYPE_STATUS);
				$this->tktranspress->__set(Tktranspress::FIELD_MANIFEST_ID, $loading['loading']);
				$result = $this->tktranspress->execute(true);
				
				if (is_object($result)) {
					$setFields = array();
					$setFields[] = "`status_date` = DATE_ADD(NOW(), INTERVAL 3 HOUR)";
					
					if (isset($result->item->state) && $result->item->state) {
						$status = $this->tktranspress->xmlAttribute($result->item->state, 'value');
						
						if ($loading['status'] != $status || $loading['status'] == 'CCCCL') {
							$setFields[] = "`status` = '" . $this->db->escape($status) . "'";
							
							$statuss = $this->extension_shipping_tk_transpress->getStatusByCode($status);
							if (empty($statuss)) {
								$statuss = $this->extension_shipping_tk_transpress->getStatusByCode('UNKNOWN');
							}
							
							$setFields[] = "`status_name` = '" . $this->db->escape($statuss['name']) . "'";
							
							// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
							$tk_transpress_order_status = $this->config->get('shipping_tk_transpress_order_status');
							$tk_transpress_order_status_mail = $this->config->get('shipping_tk_transpress_order_status_mail');
							$tk_transpress_order_status_mail_text = $this->config->get('shipping_tk_transpress_order_status_mail_text');
							
							if (!isset($tk_transpress_order_status[$statuss['id']])) {
								$statuss['id'] = 'UNKNOWN';
							}
							
							$order_status_id = $tk_transpress_order_status[$statuss['id']];
							
							$order_info = $this->model_checkout_order->getOrder($loading['order_id']);
							
							if (isset($order_status_id) && $order_status_id > 0 && $api_token && $order_status_id != $order_info['order_status_id']) {
								$order_status_mail = $tk_transpress_order_status_mail[$statuss['id']];
								
								if (isset($order_status_mail) && $order_status_mail > 0) {
									$order_status_mail_text = $tk_transpress_order_status_mail_text[$statuss['id']];
									
									if (!isset($order_status_mail_text) || !$order_status_mail_text) {
										$order_status_mail_text = '';
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
								
								if (isset($query->row['mail_send']) && $query->row['mail_send'] == $status) {
									$history_data['notify'] = false;
								}
								
								$this->model_extension_module_tk_checkout->addOrderHistory($loading['order_id'], $api_token, $history_data);
							}
						}
						
						if ($status == 'CCCCSST' || $status == 'HHHHN') {
							$setFields[] = '`loading` = NULL ';
							$setFields[] = '`barcode` = NULL ';
						}
						
						if (strpos($status, 'F') === 0 || strpos($status, 'H') === 0) {
							$setFields[] = '`status_count` = 3';
						} else {
							$setFields[] = '`status_count` = 0';
						}
					} else {
						$setFields[] = '`status_count` = `status_count` + 1';
					}
					
					if (!empty($history_data['notify']) && !empty($status)) {
						$mail_send = $status;
					} else {
						$mail_send = NULL;
					}
					
					$this->extension_shipping_tk_transpress->editShipment($loading['order_id'], $setFields, $mail_send);
				}
			}
		}
	}
}