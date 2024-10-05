<?php

class ControllerSaleTkEcont extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('extension/shipping/tk_econt');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('sale/order');
		$this->load->model('extension/shipping/tk_econt');
		
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_form'] = $this->language->get('text_edit');
		
		$url = '';
		
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
		
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
		
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}
		
		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}
		
		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}
		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_continue'] = $this->language->get('button_continue');
		$data['button_back'] = $this->language->get('button_back');
		$data['button_refresh'] = $this->language->get('button_refresh');
		$data['button_product_add'] = $this->language->get('button_product_add');
		$data['button_voucher_add'] = $this->language->get('button_voucher_add');
		$data['button_apply'] = $this->language->get('button_apply');
		$data['button_upload'] = $this->language->get('button_upload');
		$data['button_ip_add'] = $this->language->get('button_ip_add');
		
		$data['text_order'] = $this->language->get('text_order');
		
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_hour'] = $this->language->get('text_hour');
		$data['text_e1'] = $this->language->get('text_e1');
		$data['text_e2'] = $this->language->get('text_e2');
		$data['text_e3'] = $this->language->get('text_e3');
		$data['text_get_instructions'] = $this->language->get('text_get_instructions');
		$data['text_receiver_shipping_to'] = $this->language->get('text_receiver_shipping_to');
		$data['text_receiver_postcode'] = $this->language->get('text_receiver_postcode');
		$data['text_receiver_city'] = $this->language->get('text_receiver_city');
		$data['text_receiver_quarter'] = $this->language->get('text_receiver_quarter');
		$data['text_receiver_street'] = $this->language->get('text_receiver_street');
		$data['text_receiver_street_num'] = $this->language->get('text_receiver_street_num');
		$data['text_receiver_other'] = $this->language->get('text_receiver_other');
		$data['text_receiver_office'] = $this->language->get('text_receiver_office');
		$data['text_receiver_office_code'] = $this->language->get('text_receiver_office_code');
		$data['text_to_office'] = $this->language->get('text_to_office');
		$data['text_to_door'] = $this->language->get('text_to_door');
		$data['text_to_aps'] = $this->language->get('text_to_aps');
		$data['text_loading_note'] = $this->language->get('text_loading_note');
		
		$data['entry_address'] = $this->language->get('entry_address');
		$data['entry_products_weight'] = $this->language->get('entry_products_weight');
		$data['entry_sms'] = $this->language->get('entry_sms');
		$data['entry_sms_no'] = $this->language->get('entry_sms_no');
		$data['entry_invoice_before_cd'] = $this->language->get('entry_invoice_before_cd');
		$data['entry_oc'] = $this->language->get('entry_oc');
		$data['entry_total_for_oc'] = $this->language->get('entry_total_for_oc');
		$data['entry_dc'] = $this->language->get('entry_dc');
		$data['entry_dc_cp'] = $this->language->get('entry_dc_cp');
		$data['entry_disposition'] = $this->language->get('entry_disposition');
		$data['entry_pay_after_accept'] = $this->language->get('entry_pay_after_accept');
		$data['entry_pay_after_test'] = $this->language->get('entry_pay_after_test');
		$data['entry_priority_time'] = $this->language->get('entry_priority_time');
		$data['entry_express_city_courier'] = $this->language->get('entry_express_city_courier');
		$data['entry_delivery_day'] = $this->language->get('entry_delivery_day');
		$data['entry_pack_count'] = $this->language->get('entry_pack_count');
		$data['entry_partial_delivery'] = $this->language->get('entry_partial_delivery');
		$data['entry_partial_delivery_instruction'] = $this->language->get('entry_partial_delivery_instruction');
		$data['entry_inventory'] = $this->language->get('entry_inventory');
		$data['entry_inventory_type'] = $this->language->get('entry_inventory_type');
		$data['entry_product_id'] = $this->language->get('entry_product_id');
		$data['entry_product_name'] = $this->language->get('entry_product_name');
		$data['entry_product_weight'] = $this->language->get('entry_product_weight');
		$data['entry_product_price'] = $this->language->get('entry_product_price');
		$data['entry_instructions'] = $this->language->get('entry_instructions');
		$data['help_entry_instructions'] = $this->language->get('help_entry_instructions');
		$data['entry_instructions_type'] = $this->language->get('entry_instructions_type');
		$data['entry_instructions_name'] = $this->language->get('entry_instructions_name');
		$data['entry_instructions_list'] = $this->language->get('entry_instructions_list');
		$data['entry_receiver_address'] = $this->language->get('entry_receiver_address');
		$data['entry_sender_data'] = $this->language->get('entry_sender_data');
		
		$data['button_generate'] = $this->language->get('button_generate');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_remove'] = $this->language->get('button_remove');
		$data['button_get_instructions'] = $this->language->get('button_get_instructions');
		$data['button_instructions_form'] = $this->language->get('button_instructions_form');
		$data['button_office_locator'] = $this->language->get('button_office_locator');
		
		$data['user_token'] = $this->session->data['user_token'];
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['address'])) {
			$data['error_address'] = $this->error['address'];
		} else {
			$data['error_address'] = '';
		}
		
		if (isset($this->error['products_weight'])) {
			$data['error_products_weight'] = $this->error['products_weight'];
		} else {
			$data['error_products_weight'] = '';
		}
		
		if (isset($this->error['receiver_address'])) {
			$data['error_receiver_address'] = $this->error['receiver_address'];
		} else {
			$data['error_receiver_address'] = '';
		}
		
		if (isset($this->error['office'])) {
			$data['error_office'] = $this->error['office'];
		} else {
			$data['error_office'] = '';
		}
		
		if (isset($this->error['receiver_machine'])) {
			$data['error_receiver_machine'] = $this->error['receiver_machine'];
		} else {
			$data['error_receiver_machine'] = '';
		}
		
		if (isset($this->error['receiver_office'])) {
			$data['error_receiver_office'] = $this->error['receiver_office'];
		} else {
			$data['error_receiver_office'] = '';
		}
		
		if (isset($this->error['sms'])) {
			$data['error_sms'] = $this->error['sms'];
		} else {
			$data['error_sms'] = '';
		}
		
		if (isset($this->error['priority_time'])) {
			$data['error_priority_time'] = $this->error['priority_time'];
		} else {
			$data['error_priority_time'] = '';
		}
		
		if (isset($this->error['instruction'])) {
			$data['error_instruction'] = $this->error['instruction'];
		} else {
			$data['error_instruction'] = '';
		}
		
		if (isset($this->error['inventory'])) {
			$data['error_inventory'] = $this->error['inventory'];
		} else {
			$data['error_inventory'] = '';
		}
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);
		
		$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		
		if (isset($this->request->get['order_id'])) {
			
			$order_info = $this->model_sale_order->getOrder($this->request->get['order_id']);
			$econt_order_info = $this->model_extension_shipping_tk_econt->getOrder($this->request->get['order_id']);
			
			$data['order_id'] = $this->request->get['order_id'];
			if (!empty($econt_order_info)) {
				
				$data['status_id'] = $econt_order_info['status_id'];
				
				if (isset($econt_order_info['payment_code']) && $econt_order_info['payment_code']) {
					$data['payment_code'] = $econt_order_info['payment_code'];
				} else {
					$data['payment_code'] = 'cod';
				}
				
				$data['date_delivery'] = $econt_order_info['date_delivery'];
				
				$data['shipping_to'] = $econt_order_info['shipping_to'];
				
				if ($econt_order_info['shipping_to'] == 'office') {
					$data['office_id'] = $econt_order_info['office_id'];
					
					$office = $this->model_extension_shipping_tk_econt->getOffice($data['office_id'], 0);
					
					$data['office_code'] = $office['office_code'];
					$data['office_city_id'] = $econt_order_info['city_id'];
					
					$data['city_id'] = '';
					$data['city_name'] = '';
					$data['postcode'] = '';
					$data['quarter'] = '';
					$data['street'] = '';
					$data['street_num'] = '';
					$data['other'] = '';
					
					$data['machine_id'] = '';
					$data['machine_code'] = '';
					$data['machine_city_id'] = '';
				} else if ($econt_order_info['shipping_to'] == 'machine') {
					$data['machine_id'] = $econt_order_info['office_id'];
					
					$office = $this->model_extension_shipping_tk_econt->getOffice($data['machine_id'], 1);
					
					$data['machine_code'] = $office['office_code'];
					$data['machine_city_id'] = $econt_order_info['city_id'];
					
					$data['city_id'] = '';
					$data['city_name'] = '';
					$data['postcode'] = '';
					$data['quarter'] = '';
					$data['street'] = '';
					$data['street_num'] = '';
					$data['other'] = '';
					
					$data['office_id'] = '';
					$data['office_code'] = '';
					$data['office_city_id'] = '';
				} else {
					$data['city_id'] = $econt_order_info['city_id'];
					
					$data['city_name'] = $econt_order_info['city'];
					$data['postcode'] = $econt_order_info['postcode'];
					$data['quarter'] = $econt_order_info['quarter'];
					$data['street'] = $econt_order_info['street'];
					$data['street_num'] = $econt_order_info['street_num'];
					$data['other'] = $econt_order_info['other'];
					
					$data['office_id'] = '';
					$data['office_code'] = '';
					$data['office_city_id'] = '';
					
					$data['machine_id'] = '';
					$data['machine_code'] = '';
					$data['machine_city_id'] = '';
				}
			} else {
				
				$data['status_id'] = '0';
				
				if (isset($order_info['payment_code']) && $order_info['payment_code']) {
					$data['payment_code'] = $order_info['payment_code'];
				} else {
					$data['payment_code'] = 'cod';
				}
				
				$data['shipping_to'] = '';
				$data['city'] = '';
				$data['postcode'] = '';
				$data['quarter'] = '';
				$data['street'] = '';
				$data['street_num'] = '';
				$data['other'] = '';
				$data['city_id'] = '';
				
				$data['date_delivery'] = '0000-00-00';
				
				$data['office_id'] = '';
				$data['office_code'] = '';
				$data['office_city_id'] = '';
				
				$data['machine_id'] = '';
				$data['machine_code'] = '';
				$data['machine_city_id'] = '';
			}
			
			$data['machine_cities'] = $this->model_extension_shipping_tk_econt->getCities(1, 1);
			$data['machines'] = $this->model_extension_shipping_tk_econt->getOfficesByCityId($data['machine_city_id'], 1);
			
			$data['offices'] = $this->model_extension_shipping_tk_econt->getOfficesByCityId($data['office_city_id'], 0);
			$data['office_cities'] = $this->model_extension_shipping_tk_econt->getCities(1, 0);
			
			$data['cities'] = $this->model_extension_shipping_tk_econt->getCities(0, 0);
			
			$data['office_locator'] = 'https://www.bgmaps.com/templates/econt?office_type=to_office_courier&shop_url=' . HTTPS_SERVER;
			$data['office_locator_domain'] = 'https://www.bgmaps.com';
		} else {
			$data['order_id'] = 0;
			
			$data['shipping_to'] = '';
			$data['office_id'] = '';
			$data['office_code'] = '';
			$data['city'] = '';
			$data['postcode'] = '';
			$data['quarter'] = '';
			$data['street'] = '';
			$data['street_num'] = '';
			$data['status_id'] = '';
			$data['payment_code'] = 'cod';
			$data['other'] = '';
			$data['city_id'] = '';
			$data['office_city_id'] = '';
			
			$data['date_delivery'] = '0000-00-00';
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('sale/tk_econt', $data));
	}
	
	// данни за офиси и адреси
	public function getOfficesByCityId() {
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($this->request->post['city_id'])) {
			$city_id = $this->request->post['city_id'];
		} else {
			$city_id = 0;
		}
		
		if (isset($this->request->get['is_machine'])) {
			$is_machine = $this->request->get['is_machine'];
		} else if (isset($this->request->post['is_machine'])) {
			$is_machine = $this->request->post['is_machine'];
		} else {
			$is_machine = 0;
		}
		
		$results = $this->model_extension_shipping_tk_econt->getOfficesByCityId($city_id, $is_machine);
		
		$this->response->setOutput(json_encode($results));
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
		
		$this->load->model('extension/shipping/tk_econt');
		
		$json = array();
		
		if (isset($this->request->post['office_code']) && $this->request->post['office_code']) {
			$office = $this->model_extension_shipping_tk_econt->getOfficeByOfficeCode(trim($this->request->post['office_code']));
			if (!empty($office)) {
				$json['office_id'] = $office['office_id'];
				$json['city_id'] = $office['city_id'];
				$json['office_city'] = $office['office_city'];
				
				$results = $this->model_extension_shipping_tk_econt->getOffice($office['office_id']);
				$json['name'] = $results['name'];
				$json['address'] = $results['address'];
				
				$json['offices'] = $this->model_extension_shipping_tk_econt->getOfficesByCityId($office['city_id'], 0);
			} else {
				$json['error'] = $this->language->get('error_office_not_found');
			}
		} else {
			$json['error'] = $this->language->get('error_office_not_found');
		}
		
		$this->response->setOutput(json_encode($json));
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
	
	//създаване на товарителница
	public function generate() {
		
		$response_data = array();
		
		if (!empty($this->request->get['order_id'])) {
			
			$order_id = $this->request->get['order_id'];
			
			$this->load->model('extension/shipping/tk_econt');
			$this->load->model('extension/module/tk_checkout');
			$this->load->model('sale/order');
			$this->load->model('catalog/product');
			
			$order_data = $this->model_extension_shipping_tk_econt->getOrder($order_id);
			$order_info = $this->model_sale_order->getOrder($order_id);
			
			if ($order_data) {
				
				$delivery_url = 'services/OrdersService.getTrace.json';
				$delivery_data['orderNumber'] = $order_info['order_id'];
				$response = $this->model_extension_shipping_tk_econt->serviceDelivery($delivery_url, $delivery_data, $order_info['store_id']);
				
				if (isset($response['shipmentNumber']) && $response['shipmentNumber']) {
					
					if ($this->config->get('shipping_tk_econt_order_status_id')) {
						$api_token = $this->model_extension_module_tk_checkout->getApiToken();
					} else {
						$api_token = '';
					}
					
					// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
					if ($this->config->get('shipping_tk_econt_order_status_id') > 0 && $api_token) {
						if ($this->config->get('shipping_tk_econt_order_status_id_mail')) {
							$notify = true;
						} else {
							$notify = false;
						}
						
						if ($this->config->get('shipping_tk_econt_order_status_id_mail_text')) {
							$patterns = array();
							$patterns[0] = '{shipment_number}';
							
							$replacements = array();
							$replacements[0] = $response['shipmentNumber'];
							
							$comment = str_replace($patterns, $replacements, $this->config->get('shipping_tk_econt_order_status_id_mail_text'));
						} else {
							$comment = 'Номер на пратка: ' . $response['shipmentNumber'];
						}
						
						$history_data = array(
							'order_status_id' => $this->config->get('shipping_tk_econt_order_status_id'),
							'notify'          => $notify,
							'comment'         => $comment
						);
						
						$this->model_extension_module_tk_checkout->addOrderHistory($order_id, $api_token, $history_data);
					}
					
					$this->model_extension_shipping_tk_econt->editShipment($order_id, $response);
					$response_data['exist'] = true;
				} else {
					
					if ($this->config->get('shipping_tk_econt_payment_status') == 1) {
						$order_payment = $this->model_extension_shipping_tk_econt->getOrderPayment($order_id);
						if (isset($order_payment['payment_token']) && $order_payment['payment_token']) {
							$payment_token = $order_payment['payment_token'];
						} else {
							$payment_token = '';
						}
					} else {
						$payment_token = '';
					}
					
					//данни за поръчката от еконт
					if (isset($order_data['loading_id']) && $order_data['loading_id'] > 0) {
						$loading_id = $order_data['loading_id'];
					} else {
						$loading_id = '';
					}
					
					if ($order_data['shipping_to'] == 'office') {
						
						if (isset($order_data['office_id'])) {
							$office = $this->model_extension_shipping_tk_econt->getOffice($order_data['office_id']);
						}
						
						if (isset($office) && $office) {
							$office_code = $office['office_code'];
						} else {
							$office_code = '';
						}
						
						$city = '';
					} else if ($order_data['shipping_to'] == 'machine') {
						if (isset($order_data['office_id'])) {
							
							$office = $this->model_extension_shipping_tk_econt->getOffice($order_data['office_id']);
						}
						
						if (isset($office) && $office) {
							$office_code = $office['office_code'];
						} else {
							$office_code = '';
						}
						
						$city = '';
					} else {
						$office_code = '';
						
						if (isset($order_data['city'])) {
							$city = $order_data['city'];
						} else {
							$city = '';
						}
					}
					
					if (isset($order_data['postcode'])) {
						$postcode = $order_data['postcode'];
					} else {
						$postcode = ' ';
					}
					
					if (isset($order_data['quarter'])) {
						$quarter = $order_data['quarter'];
					} else {
						$quarter = ' ';
					}
					
					if (isset($order_data['street'])) {
						$street = $order_data['street'];
					} else {
						$street = ' ';
					}
					
					if (isset($order_data['street_num'])) {
						$street_num = $order_data['street_num'];
					} else {
						$street_num = ' ';
					}
					
					if (isset($order_data['other'])) {
						$other = $order_data['other'];
					} else {
						$other = ' ';
					}
					
					if ($order_data['payment_code'] == 'cod' || $order_data['payment_code'] == 'tk_econt_payment') {
						$cod = 1;
					} else {
						$cod = 0;
					}
					
					//данни за поръчката
					if (isset($order_info['payment_iso_code_3'])) {
						$countryCode = $order_info['payment_iso_code_3'];
					} else {
						$countryCode = 'BGR';
					}
					
					if (isset($order_info['firstname'])) {
						$firstname = $order_info['firstname'];
					} else {
						$firstname = ' ';
					}
					
					if (isset($order_info['lastname'])) {
						$lastname = $order_info['lastname'];
					} else {
						$lastname = ' ';
					}
					
					if (isset($order_info['email'])) {
						if (!$this->config->get('configuration_tk_checkout_required_email') || $this->config->get('configuration_tk_checkout_required_email') == 0) {
							$email = $order_info['email'];
						} else {
							$email = '';
						}
					} else {
						$email = '';
					}
					
					if (isset($order_info['telephone'])) {
						$telephone = $order_info['telephone'];
					} else {
						$telephone = '';
					}
					
					$shipment_description = '';
					
					if ($this->config->get('shipping_tk_econt_shipment_description')) {
						$shipment_description .= $this->config->get('shipping_tk_econt_shipment_description') . ' ' . $order_id;
					}
					
					//данни за продуктите
					$order_products = $this->model_extension_module_tk_checkout->getOrderProducts($order_id);
					$products = array();
					
					foreach ($order_products as $product) {
						
						if ($this->config->get('shipping_tk_econt_shipment_product_name') == 1 || $this->config->get('shipping_tk_econt_shipment_product_name') == 2) {
							$shipment_description .= ' ';
							$shipment_description .= $product['name'];
						}
						
						$result = $this->model_catalog_product->getProduct($product['product_id']);
						$order_options = $this->model_extension_module_tk_checkout->getOrderOptions($order_id, $product['order_product_id']);
						
						$option_weight = $result['weight'];
						
						if ($order_options) {
							foreach ($order_options as $order_option) {
								
								$option = $this->model_catalog_product->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
								
								if (isset($option['weight_prefix']) && isset($option['weight'])) {
									if ($option['weight_prefix'] == '+') {
										$option_weight += $option['weight'];
									} else if ($option['weight_prefix'] == '-') {
										$option_weight -= $option['weight'];
									} else {
										$option_weight = $option['weight'];
									}
								}
								
								if (($this->config->get('shipping_tk_econt_shipment_product_name') == 1 || $this->config->get('shipping_tk_econt_shipment_product_name') == 2) && isset($option['name'])) {
									$shipment_description .= ': ';
									$shipment_description .= $option['name'] . '-';
								}
							}
						}
						
						if ($this->config->get('shipping_tk_econt_shipment_product_name') == 2 || $this->config->get('shipping_tk_econt_shipment_product_name') == 3) {
							$shipment_description .= ' ';
							$shipment_description .= $product['model'] . ' -';
						}
						
						if ($this->config->get('shipping_tk_econt_shipment_product_name')) {
							$shipment_description .= ' ';
							$shipment_description .= $product['quantity'].'бр./';
						}
						
						$shipment_description = str_replace('"', '', $shipment_description);
						$shipment_description = str_replace("'", "", $shipment_description);
						$shipment_description = str_replace("&quot;", "", $shipment_description);
						
						$weight_total = $this->weight->convert($option_weight, $result['weight_class_id'], $this->config->get('config_weight_class_id'));
						
						if ($weight_total == 0 && $this->config->get('shipping_tk_econt_weight_total') && $this->config->get('shipping_tk_econt_weight_total') > 0) {
							$weight_total = $this->config->get('shipping_tk_econt_weight_total');
						}
						
						$totalPrice = $product['total'];
						$totalWeight = $weight_total * $product['quantity'];
						
						if ($this->config->get('shipping_tk_econt_weight_type') && $this->config->get('shipping_tk_econt_weight_type') == 'gram') {
							$totalWeight = $totalWeight / 1000;
						}
						
						if ($totalWeight < 0.01) {
							$totalWeight = 0.01;
						}
						
						$url_prd = $this->url->link('product/product', 'product_id=' . $product['product_id']);
						$url_prd = str_replace('admin/', '', $url_prd);
						
						if ($this->config->get('shipping_tk_econt_shipment_opis')) {
							$product_name = $this->config->get('shipping_tk_econt_shipment_opis');
						} else {
							$product_name = $product['name'];
						}
						
						$products[] = array(
							'name'        => $product_name,
							'SKU'         => $product['model'],
							'URL'         => $url_prd,
							'count'       => $product['quantity'],
							'hideCount'   => 1,
							'totalPrice'  => $totalPrice,
							'totalWeight' => $totalWeight
						);
					}
					
					$order_totals = $this->model_sale_order->getOrderTotals($order_id);
					if (!empty($order_totals)) {
						
						if ($this->config->get('shipping_tk_econt_shipping_in')) {
							$not_for_econt = array(
								'sub_total',
								'total',
								'total_discount'
							);
						} else {
							$not_for_econt = array(
								'sub_total',
								'shipping',
								'total',
								'total_discount'
							);
						}
						
						foreach ($order_totals as $order_total) {
							
							if (!in_array($order_total['code'], $not_for_econt) && $order_total['value'] != 0) {
								$products[] = array(
									'name'        => $order_total['title'],
									'SKU'         => $order_total['code'],
									'URL'         => '#',
									'count'       => 1,
									'hideCount'   => 1,
									'totalPrice'  => $order_total['value'],
									'totalWeight' => 0
								);
							}
						}
					}
					
					$face = '';
					$name = $firstname . ' ' . $lastname;
					
					//проверка дали имаме фирма
					if ($this->config->get('shipping_tk_econt_company') && !empty($order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) && utf8_strlen($order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) > 3) {
						$face = $name;
						$name = $order_info['custom_field'][$this->config->get('shipping_tk_econt_company')];
					}

					$send_delivery_url = 'services/OrdersService.updateOrder.json';
					$send_delivery_data = array(
						'id'                  => $loading_id,
						'orderNumber'         => $order_id,
						'status'              => 'Обработена',
						'orderTime'           => '',
						'cod'                 => $cod,
						'paymentToken'        => $payment_token,
						'partialDelivery'     => '',
						'currency'            => 'BGN',
						'shipmentDescription' => $shipment_description,
						'packCount'           => 1,
						'customerInfo'        => array(
							'id'          => '',
							'name'        => $name,
							'face'        => $face,
							'phone'       => $telephone,
							'email'       => $email,
							'countryCode' => $countryCode,
							'cityName'    => $city,
							'postCode'    => $postcode,
							'officeCode'  => $office_code,
							'quarter'     => $quarter,
							'street'      => $street,
							'num'         => $street_num,
							'other'       => $other
						),
						'items'               => $products
					);

                    //данни за доставката
                    $order_shipping = $this->model_extension_module_tk_checkout->getOrderShipping($order_id);
					if (isset($order_shipping['value']) && $order_shipping['value'] > 0) {
						if ($this->config->get('shipping_tk_econt_cod_sum') > 1) {
							$send_delivery_data['paymentSide'] = 'sender';
							$send_delivery_data['receiverShareAmount'] = $order_shipping['value'];
						} else {
							$send_delivery_data['paymentSide'] = 'default';
						}
					} else {
						$send_delivery_data['paymentSide'] = 'sender';
					}

					$response = $this->model_extension_shipping_tk_econt->serviceDelivery($send_delivery_url, $send_delivery_data, $order_info['store_id']);
					
					if (isset($response['id']) && $response['id'] > 0) {
						$this->model_extension_shipping_tk_econt->editShipment($order_id, $response);
					}
				}
				
				if (isset($response['message'])) {
					$response_data['error'] = $response['message'];
				} else if (isset($response['id']) && $response['id'] > 0) {
					$response_data['success'] = 'Данните бяха изпратени на - delivery.econt.com';
				} else {
					$response_data['error'] = 'Непозната грешка';
				}
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
	// ъпдейт на товарителница
	public function trace() {
		
		$response_data = array();
		
		if (!empty($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
			
			$this->load->model('extension/shipping/tk_econt');
			$this->load->model('extension/module/tk_checkout');
			$this->load->model('sale/order');
			
			$order_data = $this->model_sale_order->getOrder($order_id);
			
			if (!empty($this->request->post['shipmentStatus'])) {
				$response = $this->request->post['shipmentStatus'];
				
				if ($this->config->get('shipping_tk_econt_order_status_id') > 0) {
					
					if ($this->config->get('shipping_tk_econt_order_status')) {
						$api_token = $this->model_extension_module_tk_checkout->getApiToken();
					} else {
						$api_token = '';
					}
					
					// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
					if ($api_token) {
						if ($this->config->get('shipping_tk_econt_order_status_id_mail')) {
							$mail_text = $this->config->get('shipping_tk_econt_order_status_id_mail_text');
							
							$patterns = array();
							$patterns[0] = '{shipment_number}';
							$replacements = array();
							$replacements[0] = $response['shipmentNumber'];
							
							$mail_text = str_replace($patterns, $replacements, $mail_text);
							
							$history_data = array(
								'order_status_id' => $this->config->get('shipping_tk_econt_order_status_id'),
								'notify'          => true,
								'comment'         => $mail_text
							);
						} else {
							$history_data = array(
								'order_status_id' => $this->config->get('shipping_tk_econt_order_status_id'),
								'notify'          => false,
								'comment'         => 'Номер на пратка: ' . $response['shipmentNumber']
							);
						}
						
						if (isset($order_data['mail_send']) && $order_data['mail_send'] == $response['shipment_status']) {
							$history_data['notify'] = false;
						}
						
						$this->model_extension_module_tk_checkout->addOrderHistory($order_id, $api_token, $history_data);
					}
				}
				
				$this->model_extension_shipping_tk_econt->editShipment($order_id, $response);
				
				$response_data['success'] = true;
			}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
	// изтриване на товарителница
	public function cancel() {
		
		$response_data = array();
		
		if (!empty($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
			
			$this->load->model('extension/module/tk_checkout');
			$this->load->model('extension/shipping/tk_econt');
			$this->load->model('sale/order');
			$this->load->model('catalog/product');
			
			$order_data = $this->model_extension_shipping_tk_econt->getOrder($order_id);
			$order_info = $this->model_sale_order->getOrder($order_id);
			
			if ($order_data) {
				
				if ($this->config->get('payment_tk_econt_payment_status') == 1) {
					$order_payment = $this->model_extension_shipping_tk_econt->getOrderPayment($order_id);
					if (isset($order_payment['payment_token']) && $order_payment['payment_token']) {
						$payment_token = $order_payment['payment_token'];
					} else {
						$payment_token = false;
					}
				} else {
					$payment_token = false;
				}
				
				//данни за поръчката от еконт
				if (isset($order_data['shipment_number']) && $order_data['shipment_number'] > 0) {
					$shipment_number = $order_data['shipment_number'];
				} else {
					$shipment_number = false;
				}
				
				if ($shipment_number && !$payment_token) {
					
					$send_delivery_url = 'services/OrdersService.deleteLabel.json';
					$send_delivery_data = array(
						'id' => $order_data['loading_id']
					);
					
					$response = $this->model_extension_shipping_tk_econt->serviceDelivery($send_delivery_url, $send_delivery_data, $order_info['store_id']);
					
					if ($response) {
						$this->model_extension_shipping_tk_econt->editShipment($order_id, $response);
					}
				}
			}
			
			if (isset($response['message'])) {
				$response_data['error'] = $response['message'];
			} else if (isset($response['error'])) {
				$response_data['error'] = $response['error'];
			} else if (isset($response) && $response) {
				$response_data['success'] = 'Товарителницата беше изтита';
			} else {
				$response_data['error'] = 'Не може да изтриете тази товарителница.';
			}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
	// ъпдейт на товарителници
	public function update() {

		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->language->load('extension/shipping/tk_econt');
		
		$this->load->model('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings_limit = 10;
		
		if (!empty($this->request->post['count'])) {
			
			if ($this->request->post['count'] == 1 && empty($this->session->data['tk_econt_loadings']['total'])) {
				
				$this->cache->set('tk_econt_loadings_count', $this->request->post['count']);
				
				$this->session->data['tk_econt_loadings']['page'] = 1;
				$this->session->data['tk_econt_loadings']['start'] = 0;
				$this->session->data['tk_econt_loadings']['end'] = 10;
				
				$this->cache->delete('tk_econt_loadings');
				
				$loadings = $this->model_extension_shipping_tk_econt->getNotDelivered();
				
				$this->session->data['tk_econt_loadings']['total'] = count($loadings);
				
				$this->cache->set('tk_econt_loadings', $loadings);
			} else {
				$this->session->data['tk_econt_loadings']['page'] = $this->request->post['count'];
				$loadings = $this->cache->get('tk_econt_loadings');
			}
			
			if ($loadings) {
				
				$loadings_item = array_slice($loadings, 0, $loadings_limit);
				
				if ($this->config->get('shipping_tk_econt_order_status')) {
					$api_token = $this->model_extension_module_tk_checkout->getApiToken();
				} else {
					$api_token = '';
				}
				
				$tk_econt_order_status = $this->config->get('shipping_tk_econt_order_status');
				$tk_econt_order_status_mail = $this->config->get('shipping_tk_econt_order_status_mail');
				$tk_econt_order_status_mail_text = $this->config->get('shipping_tk_econt_order_status_mail_text');
				
				foreach ($loadings_item as $loading) {
					
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
				
				array_splice($loadings, 0, $loadings_limit);
				
				$this->cache->delete('tk_econt_loadings');
				$this->cache->set('tk_econt_loadings', $loadings);
			}
			
			$page_count = $this->cache->get('tk_econt_loadings_count');
			if (!$page_count || $page_count < 1) {
				$page_count = $this->request->post['count'];
			}
			
			$pages = ceil($this->session->data['tk_econt_loadings']['total'] / $loadings_limit);
			
			if (!empty($page_count) && $page_count > $pages) {
				
				unset($this->session->data['tk_econt_loadings']);
				
				$this->cache->delete('tk_econt_loadings_count');
				$this->cache->delete('tk_econt_loadings');
				
				$this->session->data['success'] = 'Товарителниците са опреснени';
				
				$data['redirect'] = true;
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($data, JSON_UNESCAPED_UNICODE));
			} else {
				$this->cache->delete('tk_econt_loadings_count');
				
				$this->session->data['tk_econt_loadings']['page']++;
				$this->session->data['tk_econt_loadings']['pages'] = $pages;
				
				$this->session->data['tk_econt_loadings']['start'] = $this->session->data['tk_econt_loadings']['start'] + $loadings_limit;
				$this->session->data['tk_econt_loadings']['end'] = $this->session->data['tk_econt_loadings']['end'] + $loadings_limit;
				
				$page_count++;
				$this->session->data['tk_econt_loadings']['count'] = $page_count;
				
				$this->cache->set('tk_econt_loadings_count', $page_count);
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($this->session->data['tk_econt_loadings'], JSON_UNESCAPED_UNICODE));
			}
		}
	}
	
	public function validate_post() {
		
		$json = array();
		
		$this->load->language('extension/shipping/tk_econt');
		$this->load->model('extension/shipping/tk_econt');
		
		$data['shipping_to'] = '';
		
		$data['city_id'] = '';
		$data['office_id'] = '';
		$data['office_code'] = '';
		
		$data['city'] = '';
		$data['postcode'] = '';
		$data['quarter'] = '';
		$data['street'] = '';
		$data['street_num'] = '';
		$data['other'] = '';
		
		$data['status_id'] = 0;
		
		if (isset($this->request->post['order_id']) && $this->request->post['order_id'] > 0) {
			$data['order_id'] = $this->request->post['order_id'];
		}
		
		if (isset($this->request->post['status_id']) && $this->request->post['status_id'] > 0) {
			$data['status_id'] = $this->request->post['status_id'];
		}
		
		if (isset($this->request->post['payment_code'])) {
			$data['payment_code'] = $this->request->post['payment_code'];
		}
		
		if (isset($this->request->post['date_delivery'])) {
			$data['date_delivery'] = $this->request->post['date_delivery'];
		} else {
			$data['date_delivery'] = '0000-00-00';
		}
		
		if (isset($this->request->post['shipping_to']) && $this->request->post['shipping_to'] == 'office') {
			
			$data['shipping_to'] = $this->request->post['shipping_to'];
			
			if (!$this->request->post['office_id'] || $this->request->post['office_id'] == 0) {
				$json['error']['office'] = $this->language->get('error_office');
			}
			
			if (!$this->request->post['office_city_id'] || $this->request->post['office_city_id'] == 0) {
				$json['error']['office_city_id'] = $this->language->get('error_city_id');
			}
			
			if (isset($this->request->post['office_city_id'])) {
				$data['city_id'] = $this->request->post['office_city_id'];
			}
			
			if (isset($this->request->post['office_id']) && $this->request->post['office_id'] != 0) {
				$data['office_id'] = $this->request->post['office_id'];
			}
			
			$city = $this->model_extension_shipping_tk_econt->getCity($data['city_id']);
			$data['city'] = $city['name'];
		} else if (isset($this->request->post['shipping_to']) && $this->request->post['shipping_to'] == 'machine') {
			
			$data['shipping_to'] = $this->request->post['shipping_to'];
			
			if (!$this->request->post['machine_id'] || $this->request->post['machine_id'] == 0) {
				$json['error']['machine'] = $this->language->get('error_office');
			}
			
			if (!$this->request->post['machine_city_id'] || $this->request->post['machine_city_id'] == 0) {
				$json['error']['machine_city_id'] = $this->language->get('error_city_id');
			}
			
			if (isset($this->request->post['machine_city_id'])) {
				$data['city_id'] = $this->request->post['machine_city_id'];
			}
			
			if (isset($this->request->post['machine_id']) && $this->request->post['machine_id'] != 0) {
				$data['office_id'] = $this->request->post['machine_id'];
			}
			
			$city = $this->model_extension_shipping_tk_econt->getCity($data['city_id']);
			$data['city'] = $city['name'];
		} else if (isset($this->request->post['shipping_to']) && $this->request->post['shipping_to'] == 'address') {
			
			$data['shipping_to'] = $this->request->post['shipping_to'];
			
			if (isset($this->request->post['city']) && ((utf8_strlen(trim($this->request->post['city'])) < 1) || (utf8_strlen(trim($this->request->post['city'])) > 52))) {
				$json['error']['city'] = $this->language->get('error_city');
			}
			
			if ((isset($this->request->post['street']) && ((utf8_strlen(trim($this->request->post['street'])) < 1) || (utf8_strlen(trim($this->request->post['street'])) > 350))) && (isset($this->request->post['quarter']) && ((utf8_strlen(trim($this->request->post['quarter'])) < 1) || (utf8_strlen(trim($this->request->post['quarter'])) > 350)))) {
				$json['error']['street'] = $this->language->get('error_street');
			}
			
			if (isset($this->request->post['street_num']) && ((utf8_strlen(trim($this->request->post['street_num'])) < 1) || (utf8_strlen(trim($this->request->post['street_num'])) > 252))) {
				$json['error']['street_num'] = $this->language->get('error_street_num');
			}
			
			if (isset($this->request->post['city'])) {
				$data['city'] = $this->request->post['city'];
			}
			
			if (isset($this->request->post['city_id'])) {
				$data['city_id'] = $this->request->post['city_id'];
			}
			
			if (isset($this->request->post['quarter'])) {
				$data['quarter'] = $this->request->post['quarter'];
			}
			
			if (isset($this->request->post['street'])) {
				$data['street'] = $this->request->post['street'];
			}
			
			if (isset($this->request->post['street_num'])) {
				$data['street_num'] = $this->request->post['street_num'];
			}
			
			if (isset($this->request->post['postcode'])) {
				$data['postcode'] = $this->request->post['postcode'];
			}
			
			if (isset($this->request->post['other'])) {
				$data['other'] = $this->request->post['other'];
			}
			
			$validate_addres = $this->model_extension_shipping_tk_econt->validateAddress($data);
			
			if (!$validate_addres || $validate_addres == 0) {
				$json['error']['city'] = $this->language->get('error_validate_addres');
			}
		}
		
		if (!$json) {
			
			$this->model_extension_shipping_tk_econt->updateOrder($data);
			
			$json['success'] = $this->language->get('text_success_change');
		}
		
		$this->response->setOutput(json_encode($json));
	}
}
