<?php

class ControllerSaleTkSpeedy extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->language->load('extension/shipping/tk_speedy');
		
		$this->document->setTitle($this->language->get('heading_title_details'));
		
		$this->load->model('extension/shipping/tk_speedy');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('sale/order');
		$this->load->model('catalog/product');
		
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
		
		$data['store_url'] = HTTPS_CATALOG;
		
		if (isset($this->request->get['order_id'])) {
			$order_info = $this->model_sale_order->getOrder($this->request->get['order_id']);
			$speedy_order_info = $this->model_extension_shipping_tk_speedy->getOrder($this->request->get['order_id']);
		}
		
		if (!empty($order_info)) {
			if (isset($speedy_order_info['data']) && $speedy_order_info['data']) {
				$speedy_order_data = unserialize($speedy_order_info['data']);
			} else {
				$speedy_order_data = array();
			}
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate_post() && !$this->request->post['calculate']) {
	
				$this->request->post['taking_date'] = strtotime($this->request->post['taking_date']);
				
				if (isset($this->request->post['shipping_method'])) {
					$shipping_method_info = explode('.', $this->request->post['shipping_method']);
					
					$this->request->post['shipping_method_id'] = $shipping_method_info[1];
					$this->request->post['shipping_method_cost'] = $this->session->data['shipping_method_cost'][$shipping_method_info[1]];
					$this->request->post['shipping_method_title'] = $this->session->data['shipping_method_title'][$shipping_method_info[1]];
				} else {
					$this->request->post['shipping_method_id'] = $speedy_order_data['shipping_method_id'];
					$this->request->post['shipping_method_cost'] = $speedy_order_data['shipping_method_cost'];
					$this->request->post['shipping_method_title'] = $speedy_order_data['shipping_method_title'];
				}
				
				if ($this->request->post['shipping_method_id'] != 500) {
					unset($this->request->post['parcel_size']);
				} else {
					foreach ($this->request->post['parcels_size'] as $key => $parcel_size) {
						$this->request->post['parcels_size'][$key]['depth'] = '';
						$this->request->post['parcels_size'][$key]['height'] = '';
						$this->request->post['parcels_size'][$key]['width'] = '';
					}
				}
				
				$speedy_data = array_merge($speedy_order_data, $this->request->post);
				
				$bol = $this->model_extension_shipping_tk_speedy->create($speedy_data, $order_info);
				
				if (isset($bol['error']['message'])) {
					$this->error['warning'] = $bol['error']['message'];
				} else {
					
					$bol_status = $this->model_extension_shipping_tk_speedy->trackShipment($bol['id'], $this->language->get('code'));
					
					$label['bol_id'] = $bol['id'];
					$label['parcels'] = $bol['parcels'];
					$label['bol_status'] = $bol_status['code'];
					$label['bol_status_text'] = $bol_status['code'] . ' ' . $bol_status['description'];
					$label['pdf'] = '';
					
					if ($this->config->get('shipping_tk_speedy_order_status_id')) {
						$api_token = $this->model_extension_module_tk_checkout->getApiToken();
					} else {
						$api_token = '';
					}
					
					// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
					if ($this->config->get('shipping_tk_speedy_order_status_id') && $api_token) {
						if ($this->config->get('shipping_tk_speedy_order_status_id_mail')) {
							$notify = true;
						} else {
							$notify = false;
						}
						
						if ($this->config->get('shipping_tk_speedy_order_status_id_mail_text')) {
							$patterns = array();
							$patterns[0] = '{shipment_number}';
							
							$replacements = array();
							$replacements[0] = $label['bol_id'];
							
							$comment = str_replace($patterns, $replacements, $this->config->get('shipping_tk_speedy_order_status_id_mail_text'));
						} else {
							$comment = 'Номер на пратка: ' . $label['bol_id'];
						}
						
						$history_data = array(
							'order_status_id' => $this->config->get('shipping_tk_speedy_order_status_id'),
							'notify'          => $notify,
							'comment'         => $comment
						);
						
						$this->model_extension_module_tk_checkout->addOrderHistory($this->request->get['order_id'], $api_token, $history_data);
					}
					
					$this->model_extension_shipping_tk_speedy->editShipment($this->request->get['order_id'], $label);
					
					$this->session->data['success'] = sprintf($this->language->get('text_success_create'), '<a href="' . $this->url->link('sale/tk_speedy/parcel', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $this->request->get['order_id'] . $url, 'SSL') . '" target="_blank">' . $bol['id'] . '</a>');
					$this->session->data['is_speedy_bol_recalculated'] = 0;
					$this->session->data['is_speedy_bol_recalculated_orderid'] = 0;
					
					$this->response->redirect($this->url->link('sale/order/info', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
				}
			}
			
			$data['button_ip_add'] = $this->language->get('button_ip_add');
			$data['heading_title'] = $this->language->get('heading_title_details');
			$data['text_calculate'] = $this->language->get('text_calculate');
			$data['text_wait'] = $this->language->get('text_wait');
			$data['text_yes'] = $this->language->get('text_yes');
			$data['text_no'] = $this->language->get('text_no');
			$data['text_to_office'] = $this->language->get('text_to_office');
			$data['text_to_door'] = $this->language->get('text_to_door');
			$data['text_select_city'] = $this->language->get('text_select_city');
			$data['text_select_office'] = $this->language->get('text_select_office');
			$data['text_fixed_time'] = $this->language->get('text_fixed_time');
			$data['text_sender'] = $this->language->get('text_sender');
			$data['text_receiver'] = $this->language->get('text_receiver');
			$data['text_client_id'] = $this->language->get('text_client_id');
			$data['help_fragile'] = $this->language->get('help_fragile');
			$data['entry_contents'] = $this->language->get('entry_contents');
			$data['entry_weight'] = $this->language->get('entry_weight');
			$data['entry_width'] = $this->language->get('entry_width');
			$data['entry_height'] = $this->language->get('entry_height');
			$data['entry_depth'] = $this->language->get('entry_depth');
			$data['entry_parcel_weight'] = $this->language->get('entry_parcel_weight');
			$data['entry_packing'] = $this->language->get('entry_packing');
			$data['entry_client_id'] = $this->language->get('entry_client_id');
			$data['entry_min_parcel_size'] = $this->language->get('entry_min_parcel_size');
			$data['entry_count'] = $this->language->get('entry_count');
			$data['entry_size'] = $this->language->get('entry_size');
			$data['entry_shipping_method'] = $this->language->get('entry_shipping_method');
			$data['entry_deffered_days'] = $this->language->get('entry_deffered_days');
			$data['entry_client_note'] = $this->language->get('entry_client_note');
			$data['entry_cod'] = $this->language->get('entry_cod');
			$data['entry_total'] = $this->language->get('entry_total');
			$data['entry_convertion_to_win1251'] = $this->language->get('entry_convertion_to_win1251');
			$data['entry_insurance'] = $this->language->get('entry_insurance');
			$data['entry_fragile'] = $this->language->get('entry_fragile');
			$data['entry_total_insurance'] = $this->language->get('entry_total_insurance');
			$data['entry_shipping_to'] = $this->language->get('entry_shipping_to');
			$data['entry_postcode'] = $this->language->get('entry_postcode');
			$data['entry_city'] = $this->language->get('entry_city');
			$data['entry_quarter'] = $this->language->get('entry_quarter');
			$data['entry_street'] = $this->language->get('entry_street');
			$data['entry_street_no'] = $this->language->get('entry_street_no');
			$data['entry_block_no'] = $this->language->get('entry_block_no');
			$data['entry_entrance_no'] = $this->language->get('entry_entrance_no');
			$data['entry_floor_no'] = $this->language->get('entry_floor_no');
			$data['entry_apartment_no'] = $this->language->get('entry_apartment_no');
			$data['entry_office'] = $this->language->get('entry_office');
			$data['entry_note'] = $this->language->get('entry_note');
			$data['entry_fixed_time'] = $this->language->get('entry_fixed_time');
			$data['entry_options_before_payment'] = $this->language->get('entry_options_before_payment');
			$data['entry_payer_type'] = $this->language->get('entry_payer_type');
			$data['entry_country'] = $this->language->get('entry_country');
			$data['entry_state'] = $this->language->get('entry_state');
			$data['entry_address_1'] = $this->language->get('entry_address_1');
			$data['entry_address_2'] = $this->language->get('entry_address_2');
			$data['button_create'] = $this->language->get('button_create');
			$data['button_cancel'] = $this->language->get('button_cancel');
			$data['button_calculate'] = $this->language->get('button_calculate');
			$data['error_cyrillic'] = $this->language->get('error_cyrillic');
			$data['error_recalculate'] = $this->language->get('error_recalculate');
			$data['entry_return_payer_type'] = $this->language->get('entry_return_payer_type');
			
			if (isset($this->error['warning'])) {
				$data['error_warning'] = $this->error['warning'];
			} else {
				$data['error_warning'] = '';
			}
			
			if (isset($this->error['contents'])) {
				$data['error_contents'] = $this->error['contents'];
			} else {
				$data['error_contents'] = '';
			}
			
			if (isset($this->error['weight'])) {
				$data['error_weight'] = $this->error['weight'];
			} else {
				$data['error_weight'] = '';
			}
			
			if (isset($this->error['packing'])) {
				$data['error_packing'] = $this->error['packing'];
			} else {
				$data['error_packing'] = '';
			}
			
			if (isset($this->error['count'])) {
				$data['error_count'] = $this->error['count'];
			} else {
				$data['error_count'] = '';
			}
			
			if (isset($this->error['address'])) {
				$data['error_address'] = $this->error['address'];
			} else {
				$data['error_address'] = '';
			}
			
			if (isset($this->error['office'])) {
				$data['error_office'] = $this->error['office'];
			} else {
				$data['error_office'] = '';
			}
			
			if (isset($this->error['fixed_time'])) {
				$data['error_fixed_time'] = $this->error['fixed_time'];
			} else {
				$data['error_fixed_time'] = '';
			}
			
			$data['breadcrumbs'] = array();
			
			$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_home'),
				'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
				'separator' => false
			);
			
			$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('heading_title_details'),
				'href'      => $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'),
				'separator' => ' :: '
			);
			
			$data['action'] = $this->url->link('sale/tk_speedy', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $this->request->get['order_id'] . $url, 'SSL');
			$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
			
			$data['user_token'] = $this->session->data['user_token'];
			
			$data['city_nomenclature'] = '';
			
			$data['fixed_time_cb'] = false;
			$data['fixed_time'] = false;
			$data['fixed_time_hour'] = '';
			$data['fixed_time_min'] = '';
			
			if (isset($this->request->post['custmer_name'])) {
				$data['custmer_name'] = $this->request->post['custmer_name'];
			} else if (isset($speedy_order_data['custmer_name'])) {
				$data['custmer_name'] = $speedy_order_data['custmer_name'];
			} else if (isset($order_info['firstname'])) {
				$data['custmer_name'] = $order_info['firstname'] . ' ' . $order_info['lastname'];
			} else {
				$data['custmer_name'] = '';
			}
			
			//проверка дали имаме фирма
			if (!empty($this->request->post['custmer_contact'])) {
				$data['custmer_contact'] = $this->request->post['custmer_contact'];
			} else if (!empty($speedy_order_data['custmer_contact'])) {
				$data['custmer_contact'] = $speedy_order_data['custmer_contact'];
			} else {
				$data['custmer_contact'] = '';
				
				if ($this->config->get('shipping_tk_speedy_company') && !empty($order_info['custom_field'][$this->config->get('shipping_tk_speedy_company')]) && utf8_strlen($order_info['custom_field'][$this->config->get('shipping_tk_speedy_company')]) > 3) {
					$data['custmer_contact'] = $order_info['custom_field'][$this->config->get('shipping_tk_speedy_company')];
				}
			}
			
			if (isset($this->request->post['custmer_telephone'])) {
				$data['custmer_telephone'] = $this->request->post['custmer_telephone'];
			} else if (isset($speedy_order_data['custmer_telephone'])) {
				$data['custmer_telephone'] = $speedy_order_data['custmer_telephone'];
			} else if (isset($order_info['telephone'])) {
				$data['custmer_telephone'] = $order_info['telephone'];
			} else {
				$data['custmer_telephone'] = '';
			}
			
			if (isset($this->request->post['custmer_email'])) {
				$data['custmer_email'] = $this->request->post['custmer_email'];
			} else if (isset($speedy_order_data['custmer_email'])) {
				$data['custmer_email'] = $speedy_order_data['custmer_email'];
			} else if (isset($order_info['email'])) {
				$data['custmer_email'] = $order_info['email'];
			} else {
				$data['custmer_email'] = '';
			}
			
			$shipment_description = '';
			if (isset($this->request->post['contents'])) {
				$data['contents'] = $this->request->post['contents'];
			} else if (isset($speedy_order_data['contents'])) {
				$data['contents'] = $speedy_order_data['contents'];
			} else {
				if ($this->config->get('shipping_tk_speedy_shipment_description')) {
					$shipment_description .= $this->config->get('shipping_tk_speedy_shipment_description') . ' ' . $this->request->get['order_id'];
				}
				
				if ($this->config->get('shipping_tk_speedy_shipment_product_name')) {
					$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
					foreach ($op_order_products as $product) {
						if ($this->config->get('shipping_tk_speedy_shipment_product_name') == 1 || $this->config->get('shipping_tk_speedy_shipment_product_name') == 2) {
							$shipment_description .= ' ';
							$shipment_description .= $product['name'];
							
							$order_options = $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
							if ($order_options) {
								foreach ($order_options as $order_option) {
									$shipment_description .= ':';
									$shipment_description .= $order_option['value'] . '|';
								}
							}
						}
						if ($this->config->get('shipping_tk_speedy_shipment_product_name') == 1 || $this->config->get('shipping_tk_speedy_shipment_product_name') == 3) {
							$shipment_description .= ' ';
							$shipment_description .= $product['model'] . ' |';
						}
						
						if ($this->config->get('shipping_tk_speedy_shipment_product_name') < 4) {
							$shipment_description .= ' ';
							$shipment_description .= $product['quantity'] . 'бр./';
						}
					}
				}
				
				$shipment_description = str_replace('"', '', $shipment_description);
				$shipment_description = str_replace("'", "", $shipment_description);
				$shipment_description = str_replace("&quot;", "", $shipment_description);
				
				$data['contents'] = $shipment_description;
			}
			
			if (isset($this->request->post['weight'])) {
				$data['weight'] = $this->request->post['weight'];
			} else if (isset($speedy_order_data['weight']) && $speedy_order_data['weight'] > 0) {
				$data['weight'] = $speedy_order_data['weight'];
			} else {
				$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
				$product_weight = array();
				foreach ($op_order_products as $product) {
					$product_weight[$product['product_id']] = 0;
					
					$result = $this->model_catalog_product->getProduct($product['product_id']);
					
					$product_weight[$product['product_id']] += $result['weight'];
					
					$order_options = $this->model_extension_module_tk_checkout->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
					if ($order_options) {
						foreach ($order_options as $order_option) {
							$option = $this->model_extension_module_tk_checkout->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
							
							if (isset($option['weight_prefix']) && isset($option['weight'])) {
								if ($option['weight_prefix'] == '+') {
									$product_weight[$product['product_id']] += $option['weight'];
								} else if ($option['weight_prefix'] == '-') {
									$product_weight[$product['product_id']] -= $option['weight'];
								} else {
									$product_weight[$product['product_id']] = $option['weight'];
								}
							}
						}
					}
					
					$product_weight[$product['product_id']] = $this->weight->convert($product_weight[$product['product_id']], $result['weight_class_id'], $this->config->get('config_weight_class_id'));
					
					if ($product_weight[$product['product_id']] == 0 && $this->config->get('shipping_tk_speedy_weight_total') && $this->config->get('shipping_tk_speedy_weight_total') > 0) {
						$product_weight[$product['product_id']] = $this->config->get('shipping_tk_speedy_weight_total');
					}
					
					$product_weight[$product['product_id']] = $product_weight[$product['product_id']] * $product['quantity'];
				}
				
				$totalWeight = 0;
				foreach ($product_weight as $product_wt) {
					$totalWeight += $product_wt;
				}
				
				if ($this->config->get('shipping_tk_speedy_weight_type') && $this->config->get('shipping_tk_speedy_weight_type') == 'gram') {
					$totalWeight = $totalWeight / 1000;
				}
				
				if ($totalWeight < 0.01) {
					$totalWeight = 0.01;
				}
				
				$data['weight'] = $totalWeight;
			}
			
			if (isset($this->request->post['to_office'])) {
				$data['to_office'] = $this->request->post['to_office'];
				if ($this->request->post['to_office'] == 1) {
					$data['shipping_to'] = 'office';
				} else {
					$data['shipping_to'] = 'address';
				}
			} else if (isset($speedy_order_info['shipping_to']) && $speedy_order_info['shipping_to'] == 'address') {
				$data['to_office'] = 0;
				$data['shipping_to'] = 'address';
			} else {
				$data['to_office'] = 1;
				$data['shipping_to'] = 'office';
			}
			
			if (isset($this->request->post['country_id'])) {
				$data['country_id'] = $this->request->post['country_id'];
			} else if (isset($speedy_order_data['country_id'])) {
				$data['country_id'] = $speedy_order_data['country_id'];
			} else if (isset($order_info['shipping_country_id'])) {
				$data['country_id'] = 100;
			} else {
				$data['country_id'] = 100;
			}
			
			if (isset($this->request->post['country'])) {
				$data['country'] = $this->request->post['country'];
			} else if (isset($speedy_order_data['country'])) {
				$data['country'] = $speedy_order_data['country'];
			} else if (isset($order_info['shipping_country'])) {
				$data['country'] = $order_info['shipping_country'];
			} else {
				$data['country'] = '';
			}
			
			// имаме ли наложено плащане
			if (isset($this->request->post['cod']) && $this->request->post['cod'] == 1) {
				$data['cod'] = 1;
				$data['payment_code'] = 'cod';
			} else if (isset($speedy_order_data['cod']) && $speedy_order_data['cod'] == 1) {
				$data['cod'] = 1;
				$data['payment_code'] = 'cod';
			} else {
				if (isset($order_info['payment_code'])) {
					if ($order_info['payment_code'] == 'cod') {
						$data['cod'] = 1;
						$data['payment_code'] = 'cod';
					} else {
						$data['cod'] = 0;
						$data['payment_code'] = 'bank';
					}
				} else {
					$data['cod'] = 0;
					$data['payment_code'] = 'bank';
				}
			}
			
			// сума на тотала и сума на доставка
			$totalPrice = 0;
			$totalShipping = 0;
			$order_totals = $this->model_sale_order->getOrderTotals($this->request->get['order_id']);
			if (!empty($order_totals)) {
				$not_shipping_total = array(
					'shipping',
					'total',
					'total_discount'
				);
				$only_shipping = array('shipping');
				
				foreach ($order_totals as $order_total) {
					
					if (!in_array($order_total['code'], $not_shipping_total)) {
						$totalPrice += $order_total['value'];
					}
					
					if (in_array($order_total['code'], $only_shipping)) {
						$totalShipping += $order_total['value'];
					}
				}
			}
			
			if ($totalPrice > 0) {
				if ($data['country_id'] == 100 && $order_info['currency_code'] != 'BGN') {
					$totalPrice = $this->currency->convert($totalPrice, $order_info['currency_code'], 'BGN');
				} else if ($data['country_id'] != 100 && $order_info['currency_code'] != 'RON') {
					$totalPrice = $this->currency->convert($totalPrice, $order_info['currency_code'], 'RON');
				}
			}
			
			if ($totalShipping > 0) {
				if ($data['country_id'] == 100 && $order_info['currency_code'] != 'BGN') {
					$totalShipping = $this->currency->convert($totalShipping, $order_info['currency_code'], 'BGN');
				} else if ($data['country_id'] != 100 && $order_info['currency_code'] != 'RON') {
					$totalShipping = $this->currency->convert($totalShipping, $order_info['currency_code'], 'RON');
				}
			}
			
			if (isset($this->request->post['totalNoShipping'])) {
				$data['totalNoShipping'] = $this->request->post['totalNoShipping'];
			} else {
				$data['totalNoShipping'] = $totalPrice;
			}
			
			// платец на пратката
			if (isset($this->request->post['payer_type'])) {
				$data['payer_type'] = $this->request->post['payer_type'];
			} else {
				if (!empty($speedy_order_data['payer_type'])) {
					$data['payer_type'] = $speedy_order_data['payer_type'];
				} else {
					if ($totalShipping == 0 || $data['payment_code'] != 'cod' || $this->config->get('shipping_tk_speedy_calculate_enabled') == 0) {
						if ($this->config->get('shipping_tk_speedy_payer_type') == 2) {
							$data['payer_type'] = 2;
						} else {
							$data['payer_type'] = 0;
						}
					} else {
						$data['payer_type'] = $this->config->get('shipping_tk_speedy_payer_type');
					}
				}
			}
			
			if ($data['country_id'] != 100) {
				$data['payer_type'] = 0;
			}
			
			// довършваме пресмятането на тотала спрямо това дали включваме и доставката
			if ($data['payment_code'] == 'cod' && ($data['payer_type'] != 1 || $data['country_id'] != 100)) {
				$totalPrice = $totalPrice + $totalShipping;
			}
			
			if (isset($this->request->post['total'])) {
				$data['total'] = $this->request->post['total'];
			} else {
				$data['total'] = $totalPrice;
			}
			
			if ($order_info['currency_code'] == 'RON') {
				$decimal_place = $this->currency->getDecimalPlace('RON');
			} else {
				$decimal_place = $this->currency->getDecimalPlace('BGN');
			}
			
			if (!isset($decimal_place)) {
				$decimal_place = 2;
			}
			$data['total'] = round($data['total'], $decimal_place);

            if (isset($this->request->post['swap'])) {
                $data['swap'] = $this->request->post['swap'];
            } else if (isset($speedy_order_data['swap'])) {
                $data['swap'] = $speedy_order_data['swap'];
            } else {
                $data['swap'] = 0;
            }
			
			if (isset($this->request->post['insurance'])) {
				$data['insurance'] = $this->request->post['insurance'];
			} else if (isset($speedy_order_data['insurance'])) {
				$data['insurance'] = $speedy_order_data['insurance'];
			} else {
				$data['insurance'] = $this->config->get('shipping_tk_speedy_os_enabled');
			}
			
			if (isset($this->request->post['fragile'])) {
				$data['fragile'] = $this->request->post['fragile'];
			} else if (isset($speedy_order_data['fragile'])) {
				$data['fragile'] = $speedy_order_data['fragile'];
			} else {
				$data['fragile'] = $this->config->get('shipping_tk_speedy_fragile_enabled');
			}
			
			if (isset($this->request->post['packing'])) {
				$data['packing'] = $this->request->post['packing'];
			} else if (isset($speedy_order_data['packing'])) {
				$data['packing'] = $speedy_order_data['packing'];
			} else {
				$data['packing'] = $this->config->get('shipping_tk_speedy_packing');
			}
			
			if (isset($this->request->post['count'])) {
				$data['count'] = $this->request->post['count'];
			} else if (isset($speedy_order_data['count'])) {
				$data['count'] = $speedy_order_data['count'];
			} else {
				if ($data['weight'] >= 32) {
					$data['count'] = ceil($data['weight'] / 32);
				} else {
					$data['count'] = 1;
				}
			}
			
			if (isset($this->request->post['width'])) {
				$data['width'] = $this->request->post['width'];
			} else if (isset($speedy_order_data['width'])) {
				$data['width'] = $speedy_order_data['width'];
			} else {
				$data['width'] = '';
			}
			
			if (isset($this->request->post['height'])) {
				$data['height'] = $this->request->post['height'];
			} else if (isset($speedy_order_data['height'])) {
				$data['height'] = $speedy_order_data['height'];
			} else {
				$data['height'] = '';
			}
			
			if (isset($this->request->post['depth'])) {
				$data['depth'] = $this->request->post['depth'];
			} else if (isset($speedy_order_data['depth'])) {
				$data['depth'] = $speedy_order_data['depth'];
			} else {
				$data['depth'] = '';
			}
			
			if (isset($this->request->post['client_note'])) {
				$data['client_note'] = $this->request->post['client_note'];
			} else if (isset($speedy_order_data['client_note'])) {
				$data['client_note'] = $speedy_order_data['client_note'];
			} else if ($this->config->get('shipping_tk_speedy_shipment_product_name')) {
				$data['client_note'] = '';
				$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
				
				foreach ($op_order_products as $product) {
					if ($this->config->get('shipping_tk_speedy_shipment_product_name') == 4 || $this->config->get('shipping_tk_speedy_shipment_product_name') == 5) {
						$data['client_note'] .= ' ';
						$data['client_note'] .= $product['name'];
						
						$order_options = $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
						if ($order_options) {
							$data['client_note'] .= ':';
							foreach ($order_options as $order_option) {
								$option = $this->model_catalog_product->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
								$data['client_note'] .= ':';
								$data['client_note'] .= $option['name'] . '-';
							}
						}
					}
					
					if ($this->config->get('shipping_tk_speedy_shipment_product_name') == 4 || $this->config->get('shipping_tk_speedy_shipment_product_name') == 6) {
						$data['client_note'] .= ' ';
						$data['client_note'] .= $product['model'] . ' -';
					}
					
					if ($this->config->get('shipping_tk_speedy_shipment_product_name') > 4) {
						$data['client_note'] .= ' ';
						$data['client_note'] .= $product['quantity'] . 'бр. /';
					}
				}
			} else {
				$data['client_note'] = '';
			}
			
			if (isset($this->request->post['postcode'])) {
				$data['postcode'] = $this->request->post['postcode'];
			} else if (isset($speedy_order_info['speedy_address_postcode'])) {
				$data['postcode'] = $speedy_order_info['speedy_address_postcode'];
			} else if (isset($speedy_order_info['postcode'])) {
				$data['postcode'] = $speedy_order_info['postcode'];
			} else {
				$data['postcode'] = '';
			}
			
			if (isset($this->request->post['city'])) {
				$data['city'] = $this->request->post['city'];
			} else if (isset($speedy_order_info['speedy_address_city'])) {
				$data['city'] = $speedy_order_info['speedy_address_city'];
			} else if (isset($speedy_order_info['city'])) {
				$data['city'] = $speedy_order_info['city'];
			} else {
				$data['city'] = '';
			}
			
			if (isset($this->request->post['city_id'])) {
				$data['city_id'] = $this->request->post['city_id'];
			} else if (isset($speedy_order_info['city_id'])) {
				$data['city_id'] = $speedy_order_info['city_id'];
			} else if (isset($speedy_order_data['speedy_address_city_id'])) {
				$data['city_id'] = $speedy_order_data['address_city_id'];
			} else if (isset($speedy_order_data['address_city_id'])) {
				$data['city_id'] = $speedy_order_data['address_city_id'];
			} else {
				$data['city_id'] = 0;
			}
			
			if (isset($this->request->post['quarter'])) {
				$data['quarter'] = $this->request->post['quarter'];
			} else if (isset($speedy_order_info['speedy_quarter'])) {
				$data['quarter'] = $speedy_order_info['speedy_quarter'];
			} else if (isset($speedy_order_info['quarter'])) {
				$data['quarter'] = $speedy_order_info['quarter'];
			} else {
				$data['quarter'] = '';
			}
			
			if (isset($this->request->post['street'])) {
				$data['street'] = $this->request->post['street'];
			} else if (isset($speedy_order_info['speedy_street'])) {
				$data['street'] = $speedy_order_info['speedy_street'];
			} else if (isset($speedy_order_info['street'])) {
				$data['street'] = $speedy_order_info['street'];
			} else {
				$data['street'] = '';
			}
			
			if (isset($this->request->post['street_no'])) {
				$data['street_no'] = $this->request->post['street_no'];
			} else if (isset($speedy_order_info['speedy_street_num'])) {
				$data['street_no'] = $speedy_order_info['speedy_street_num'];
			} else if (isset($speedy_order_info['street_num'])) {
				$data['street_no'] = $speedy_order_info['street_num'];
			} else if (isset($speedy_order_info['street_no'])) {
				$data['street_no'] = $speedy_order_info['street_no'];
			} else {
				$data['street_no'] = '';
			}
			
			if (isset($this->request->post['block_no'])) {
				$data['block_no'] = $this->request->post['block_no'];
			} else if (isset($speedy_order_info['speedy_block_no'])) {
				$data['block_no'] = $speedy_order_info['speedy_block_no'];
			} else if (isset($speedy_order_info['block_no'])) {
				$data['block_no'] = $speedy_order_info['block_no'];
			} else {
				$data['block_no'] = '';
			}
			
			if (isset($this->request->post['entrance_no'])) {
				$data['entrance_no'] = $this->request->post['entrance_no'];
			} else if (isset($speedy_order_info['entrance_no'])) {
				$data['entrance_no'] = $speedy_order_info['entrance_no'];
			} else {
				$data['entrance_no'] = '';
			}
			
			if (isset($this->request->post['apartment_no'])) {
				$data['apartment_no'] = $this->request->post['apartment_no'];
			} else if (isset($speedy_order_info['apartment_no'])) {
				$data['apartment_no'] = $speedy_order_info['apartment_no'];
			} else {
				$data['apartment_no'] = '';
			}
			
			if (isset($this->request->post['floor_no'])) {
				$data['floor_no'] = $this->request->post['floor_no'];
			} else if (isset($speedy_order_info['floor_no'])) {
				$data['floor_no'] = $speedy_order_info['floor_no'];
			} else {
				$data['floor_no'] = '';
			}
			
			if (isset($this->request->post['deffered_days'])) {
				$data['deffered_days'] = $this->request->post['deffered_days'];
			} else if (isset($speedy_order_data['deffered_days'])) {
				$data['deffered_days'] = $speedy_order_data['deffered_days'];
			} else {
				$data['deffered_days'] = 0;
			}
			
			if (isset($this->request->post['office_id'])) {
				$data['office_id'] = $this->request->post['office_id'];
			} else if (isset($speedy_order_info['office_id'])) {
				$data['office_id'] = $speedy_order_info['office_id'];
			} else {
				$data['office_id'] = 0;
			}
			
			if (isset($this->request->post['note'])) {
				$data['note'] = $this->request->post['note'];
			} else if (isset($speedy_order_info['other'])) {
				$data['note'] = $speedy_order_info['other'];
			} else {
				$data['note'] = '';
			}
			
			$data['offices'] = array();
			
			if (isset($data['city_id']) && $data['city_id'] > 0) {
				if ($data['country_id'] == 100) {
					$def_lang = 'bg';
				} else {
					$def_lang = $this->language->get('code');
				}
				$data['offices'] = $this->model_extension_shipping_tk_speedy->getOffices(NULL, $data['city_id'], $def_lang, $data['country_id']);
			}
			
			if (isset($this->request->post['parcels_size'])) {
				$data['parcels_sizes'] = $this->request->post['parcels_size'];
			} else if (isset($speedy_order_data['parcels_size'])) {
				$data['parcels_sizes'] = $speedy_order_data['parcels_size'];
			} else {
				if (isset($speedy_order_data['width'])) {
					$data['parcels_sizes'][1]['width'] = $speedy_order_data['width'];
				} else {
					$data['parcels_sizes'][1]['width'] = '';
				}
				if (isset($speedy_order_data['height'])) {
					$data['parcels_sizes'][1]['height'] = $speedy_order_data['height'];
				} else {
					$data['parcels_sizes'][1]['height'] = '';
				}
				if (isset($speedy_order_data['depth'])) {
					$data['parcels_sizes'][1]['depth'] = $speedy_order_data['depth'];
				} else {
					$data['parcels_sizes'][1]['depth'] = '';
				}
				if (!isset($data['parcels_sizes'][1]['weight'])) {
					$data['parcels_sizes'][1]['weight'] = '';
				}
			}
			
			if (isset($this->request->post['parcel_size'])) {
				$data['parcel_size'] = $this->request->post['parcel_size'];
			} else if (isset($speedy_order_data['parcel_size'])) {
				$data['parcel_size'] = $speedy_order_data['parcel_size'];
			} else {
				$data['parcel_size'] = '';
			}
			
			if (isset($this->request->post['client_id'])) {
				$data['client_id'] = $this->request->post['client_id'];
			} else if (isset($speedy_order_data['client_id'])) {
				$data['client_id'] = $speedy_order_data['client_id'];
			} else {
				$data['client_id'] = $this->config->get('shipping_tk_speedy_client_id');
			}
			
			$lang = $this->language->get('code');
			
			if (isset($this->request->post['shipping_method'])) {
				$shipping_method = explode('.', $this->request->post['shipping_method']);
				$data['shipping_method_id'] = $shipping_method[1];
			} else if (isset($speedy_order_data['shipping_method_id'])) {
				$data['shipping_method_id'] = $speedy_order_data['shipping_method_id'];
			} else {
				$data['shipping_method_id'] = '';
			}
			
			if ($order_info['shipping_code'] == 'tk_speedy.speedy_machine' || $data['country_id'] != 100) {
				$data['option_before_payment'] = 'no_option';
			} else {
				if (isset($this->request->post['option_before_payment'])) {
					$data['option_before_payment'] = $this->request->post['option_before_payment'];
				} else if (isset($speedy_order_data['option_before_payment'])) {
					$data['option_before_payment'] = $speedy_order_data['option_before_payment'];
				} else {
					$data['option_before_payment'] = $this->config->get('shipping_tk_speedy_option_before_payment');
				}
			}
			
			if (isset($this->request->post['quarter_id'])) {
				$data['quarter_id'] = $this->request->post['quarter_id'];
			} else if (isset($speedy_order_data['speedy_quarter_id'])) {
				$data['quarter_id'] = $speedy_order_data['speedy_quarter_id'];
			} else {
				$data['quarter_id'] = 0;
			}
			
			if (isset($this->request->post['street_id'])) {
				$data['street_id'] = $this->request->post['street_id'];
			} else if (isset($speedy_order_data['speedy_street_id'])) {
				$data['street_id'] = $speedy_order_data['speedy_street_id'];
			} else {
				$data['street_id'] = 0;
			}
			
			if (isset($this->request->post['return_payer_type'])) {
				$data['return_payer_type'] = $this->request->post['return_payer_type'];
			} else if (isset($speedy_order_data['return_payer_type'])) {
				$data['return_payer_type'] = $speedy_order_data['return_payer_type'];
			} else {
				if ($data['payer_type'] == 0) {
					$data['return_payer_type'] = 0;
				} else {
					$data['return_payer_type'] = $this->config->get('shipping_tk_speedy_return_payer_type');
				}
			}
			
			$data['days'] = array(
				0,
				1,
				2
			);
			
			$data['taking_date'] = date('d-m-Y', ($this->config->get('shipping_tk_speedy_taking_date') ? strtotime('+' . (int)$this->config->get('shipping_tk_speedy_taking_date') . ' day', mktime(9, 0, 0)) : time()));
			
			$data['options_before_payment'] = array(
				'no_option' => $this->language->get('text_no'),
				'test'      => $this->language->get('text_test_before_payment'),
				'open'      => $this->language->get('text_open_before_payment'),
			);
			
			$data['return_payer_types'] = array(
				0 => $this->language->get('text_sender'),
				1 => $this->language->get('text_receiver'),
				2 => $this->language->get('text_object'),
			);
			
			$data['parcel_sizes'] = array(
				'XS' => 'XS',
				'S'  => 'S',
				'M'  => 'M',
				'L'  => 'L',
				'XL' => 'XL',
			);
			
			$data['services'] = $this->model_extension_shipping_tk_speedy->getServices($this->language->get('code'));
			$data['clients'] = $this->model_extension_shipping_tk_speedy->getListContractClients();
			
			if (!isset($data['abroad'])) {
				$data['cod_status'] = true;
			} else {
				$data['cod_status'] = false;
			}
			
			if ($data['country_id'] == 100) {
				$data['abroad'] = 0;
			} else {
				$data['abroad'] = 1;
			}
			
			$country_filter = array();
			
			if (!empty($data['country_id'])) {
				$country_filter['country_id'] = $data['country_id'];
			} else {
				$country_filter['country_id'] = 100;
			}
			
			$countries = $this->model_extension_shipping_tk_speedy->getCountries($country_filter, $lang);
			
			foreach ($countries as $country) {
				if ($country['id'] == $data['country_id']) {
					$data['country'] = $country['name'];
					$data['country_id'] = $country['id'];
					$data['country_nomenclature'] = $country['nomenclature'];
					$data['country_address_nomenclature'] = $country['address_nomenclature'];
					$data['required_state'] = $country['required_state'];
					$data['required_postcode'] = $country['required_postcode'];
					$data['active_currency_code'] = $country['active_currency_code'];
					
					if (!$country['active_currency_code']) {
						$data['cod_status'] = false;
						$data['cod'] = 0;
					} else {
						$data['cod_status'] = true;
					}
				}
			}
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate_post() && $this->request->post['calculate']) {
				$data['quote'] = $this->getQuote();
				
				$update_data['status_id'] = 0;
				$update_data['shipping_to'] = $data['shipping_to'];
				$update_data['postcode'] = $data['postcode'];
				$update_data['city'] = $data['city'];
				$update_data['country_id'] = $data['country_id'];
				$update_data['quarter'] = $data['quarter'];
				$update_data['street'] = $data['street'];
				$update_data['street_num'] = $data['street_no'];
				$update_data['block_no'] = $data['block_no'];
				$update_data['entrance_no'] = $data['entrance_no'];
				$update_data['floor_no'] = $data['floor_no'];
				$update_data['apartment_no'] = $data['apartment_no'];
				$update_data['other'] = $data['note'];
				$update_data['city_id'] = $data['city_id'];
				$update_data['office_id'] = $data['office_id'];
				$update_data['payment_code'] = $data['payment_code'];
				
				if (isset($speedy_order_info['date_delivery'])) {
					$update_data['date_delivery'] = $speedy_order_info['date_delivery'];
				} else {
					$update_data['date_delivery'] = '0000-00-00';
				}
				
				$update_data['data'] = $this->request->post;
				
				$update_data['order_id'] = $this->request->get['order_id'];
				
				$this->model_extension_shipping_tk_speedy->updateOrder($update_data);
				
				$this->session->data['is_speedy_bol_recalculated'] = 1;
				
				if (isset($data['quote']['speedy_error'])) {
					$data['error_warning'] = $data['quote']['speedy_error'];
					$data['quote'] = array();
				}
			} else {
				$data['quote'] = array();
			}

            if(!isset($data['country_id']) || $data['country_id'] == 0 || !$data['country_id']){
                $data['country_id'] = 100;
                $data['country'] = 'БЪЛГАРИЯ';
            }
			
			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			
			$this->response->setOutput($this->load->view('sale/tk_speedy', $data));
		}
	}
	
	// данни за офиси и адреси
	public function getCities() {
		
		if (isset($this->request->get['term'])) {
			$name = $this->request->get['term'];
		} else {
			$name = '';
		}
		
		if (isset($this->request->get['country_id'])) {
			$country_id = $this->request->get['country_id'];
		} else if (!isset($this->request->get['abroad']) || $this->request->get['abroad'] == 0) {
			$country_id = 100;
		} else {
			$country_id = false;
		}
		
		if ($country_id == 100) {
			$lang = 'bg';
		} else {
			$lang = 'en';
		}
		
		$this->load->model('extension/shipping/tk_speedy');
		$data = $this->model_extension_shipping_tk_speedy->getCities($name, NULL, $country_id, $lang);
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getQuarters() {
		
		if (isset($this->request->get['term'])) {
			$name = $this->request->get['term'];
		} else {
			$name = '';
		}
		
		if (isset($this->request->get['city_id'])) {
			$city_id = $this->request->get['city_id'];
		} else {
			$city_id = '';
		}
		
		if (isset($this->request->get['country_id'])) {
			$country_id = $this->request->get['country_id'];
		} else if (!isset($this->request->get['abroad']) || $this->request->get['abroad'] == 0) {
			$country_id = 100;
		} else {
			$country_id = false;
		}
		
		if ($country_id == 100) {
			$lang = 'bg';
		} else {
			$lang = 'en';
		}
		
		if ($city_id) {
			$this->load->model('extension/shipping/tk_speedy');
			$data = $this->model_extension_shipping_tk_speedy->getQuarters($name, $city_id, $lang);
		} else {
			$this->load->language('extension/shipping/tk_speedy');
			$data = array('error' => $this->language->get('error_city'));
		}
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getStreets() {
		
		if (isset($this->request->get['term'])) {
			$name = $this->request->get['term'];
		} else {
			$name = '';
		}
		
		if (isset($this->request->get['city_id'])) {
			$city_id = $this->request->get['city_id'];
		} else {
			$city_id = '';
		}
		
		if (isset($this->request->get['country_id'])) {
			$country_id = $this->request->get['country_id'];
		} else if (!isset($this->request->get['abroad']) || $this->request->get['abroad'] == 0) {
			$country_id = 100;
		} else {
			$country_id = false;
		}
		
		if ($country_id == 100) {
			$lang = 'bg';
		} else {
			$lang = 'en';
		}
		
		if ($city_id) {
			$this->load->model('extension/shipping/tk_speedy');
			$data = $this->model_extension_shipping_tk_speedy->getStreets($name, $city_id, $lang);
		} else {
			$this->load->language('extension/shipping/tk_speedy');
			$data = array('error' => $this->language->get('error_city'));
		}
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getOffices() {
		
		if (isset($this->request->get['term'])) {
			$name = $this->request->get['term'];
		} else {
			$name = '';
		}
		
		if (isset($this->request->get['city_id'])) {
			$city_id = $this->request->get['city_id'];
		} else {
			$city_id = '';
		}
		
		if (isset($this->request->get['country_id'])) {
			$country_id = $this->request->get['country_id'];
		} else if (!isset($this->request->get['abroad']) || $this->request->get['abroad'] == 0) {
			$country_id = 100;
		} else {
			$country_id = false;
		}
		
		if ($country_id == 100) {
			$lang = 'bg';
		} else {
			$lang = 'en';
		}
		
		if ($city_id && $country_id) {
			$this->load->model('extension/shipping/tk_speedy');
			$data = $this->model_extension_shipping_tk_speedy->getOffices($name, $city_id, $lang, $country_id);
		} else {
			$this->load->language('extension/shipping/tk_speedy');
			$data = array('error' => $this->language->get('error_city'));
		}
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getCountries() {
		
		if (isset($this->request->get['term'])) {
			$name = $this->request->get['term'];
		} else {
			$name = '';
		}
		
		$lang = $this->language->get('code');
		
		$this->load->model('extension/shipping/tk_speedy');
		$data = $this->model_extension_shipping_tk_speedy->getCountries($name, $lang);
		
		$this->response->setOutput(json_encode($data));
	}
	
	public function getStates() {
		
		if (isset($this->request->get['term'])) {
			$name = $this->request->get['term'];
		} else {
			$name = '';
		}
		
		if (isset($this->request->get['country_id'])) {
			$country_id = $this->request->get['country_id'];
		} else if (!isset($this->request->get['abroad']) || $this->request->get['abroad'] == 0) {
			$country_id = 100;
		} else {
			$country_id = false;
		}
		
		if ($country_id == 100) {
			$lang = 'bg';
		} else {
			$lang = 'en';
		}
		
		$this->load->model('extension/shipping/tk_speedy');
		$data = $this->model_extension_shipping_tk_speedy->getStates($country_id, $name, $lang);
		
		$this->response->setOutput(json_encode($data));
	}
	
	// данни за цени на услуги
	public function getQuote() {
		
		$this->load->language('extension/shipping/tk_speedy');
		$this->load->model('extension/shipping/tk_speedy');
		
		$quote_data = array();
		
		$quote_data['speedy'] = array(
			'code'         => 'speedy',
			'title'        => $this->language->get('text_description'),
			'cost'         => 0.00,
			'tax_class_id' => 0,
			'text'         => ''
		);
		
		$method_data = array();
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			
			$data['taking_date'] = ($this->config->get('shipping_tk_speedy_taking_date') ? strtotime('+' . (int)$this->config->get('shipping_tk_speedy_taking_date') . ' day', mktime(9, 0, 0)) : time());
			
			$data['loading'] = true;
			
			$this->request->post['fixed_time'] = '';
			
			if (!empty($this->request->post['shipping_method'])) {
				$methood = explode('.', $this->request->post['shipping_method']);
			}
			
			if (!empty($methood[1]) && $methood[1] != 500) {
				unset($this->request->post['parcel_size']);
			} else {
				foreach ($this->request->post['parcels_size'] as $key => $parcel_size) {
					$this->request->post['parcels_size'][$key]['depth'] = '';
					$this->request->post['parcels_size'][$key]['height'] = '';
					$this->request->post['parcels_size'][$key]['width'] = '';
				}
			}
			
			$methods = $this->model_extension_shipping_tk_speedy->calculate(array_merge($data, $this->request->post));
			
			if (isset($this->request->post['total'])) {
				$data['total'] = (float)$this->request->post['total'];
			}
			
			$services = $this->model_extension_shipping_tk_speedy->getServices($this->language->get('code'));
			$methods_count = 0;
			
			if (isset($methods['calculations']) && $methods['calculations']) {
				$speedy_error = '';
				
				foreach ($methods['calculations'] as $method) {
					
					if (isset($method['error']) && $method['error']) {
						$speedy_error .= $services[$method['serviceId']] . ' - ' . $method['error']['message'] . ' | ';
					} else {
						$method_total = $method['price']['total'];
						
						if ($this->config->get('shipping_tk_speedy_calculator_fixed') && $this->config->get('shipping_tk_speedy_calculator_fixed') > 0) {
							$method_total += $this->config->get('shipping_tk_speedy_calculator_fixed');
						}
						
						$this->session->data['shipping_method_cost'][$method['serviceId']] = $method_total;
						$this->session->data['shipping_method_title'][$method['serviceId']] = $services[$method['serviceId']];
						
						$quote_data[$method['serviceId']] = array(
							'code'         => 'speedy.' . $method['serviceId'],
							'title'        => $this->language->get('text_description') . ' - ' . $method['serviceId'] . ' - ' . $services[$method['serviceId']],
							'cost'         => $method_total,
							'tax_class_id' => 0,
							'text'         => $this->currency->format($method_total, 'BGN', 1)
						);
						
						$methods_count++;
					}
				}
				
				if ($methods_count) {
					unset($quote_data['speedy']);
					$method_data['quote'] = $quote_data;
				} else if ($speedy_error) {
					$method_data['speedy_error'] = $speedy_error;
				} else {
					$method_data['speedy_error'] = $this->language->get('error_calculate_empty_methods');
				}
			} else {
				$method_data['speedy_error'] = $this->language->get('error_calculate_empty_methods');
			}
		} else {
			$method_data['speedy_error'] = $this->language->get('error_calculate');
		}
		
		if (isset($method_data['speedy_error'])) {
			$method_data['quote']['speedy']['text'] = '';
		}
		
		return $method_data;
	}
	
	// принт на товарителница
	public function parcel() {
		
		$this->load->language('extension/shipping/tk_speedy');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_speedy');
		
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
		
		if (isset($this->request->get['order_id'])) {
			$speedy_order_info = $this->model_extension_shipping_tk_speedy->getOrder($this->request->get['order_id']);
		}
		
		if (!empty($speedy_order_info) && !empty($speedy_order_info['shipment_number'])) {
			
			if (isset($speedy_order_info['data']) && $speedy_order_info['data']) {
				$speedy_order_data = unserialize($speedy_order_info['data']);
			}
			
			if (isset($speedy_order_data['parcels']) && $speedy_order_data['parcels']) {
				$pdf = $this->model_extension_shipping_tk_speedy->createPDFS($speedy_order_data['parcels']);
			} else {
				$pdf = $this->model_extension_shipping_tk_speedy->createPDF($speedy_order_info['shipment_number']);
			}
			
			if (isset($pdf['error']['message'])) {
				$this->session->data['warning'] = $pdf['error']['message'];
			} else {
				header('Content-Type: application/pdf');
				echo $pdf;
				exit;
			}
		} else {
			$this->session->data['warning'] = $this->language->get('error_exists');
		}
		
		$this->response->redirect($this->url->link('sale/tk_speedy', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}
	
	// създаване на товарителница
	public function generate() {
		
		$this->load->language('extension/shipping/tk_speedy');
		$this->load->model('extension/shipping/tk_speedy');
		
		$json = array();
		
		if (isset($this->request->post['shipping_method_id'])) {
			$shipping_method_id = $this->request->post['shipping_method_id'];
		} else {
			$shipping_method_id = '';
		}
		
		if (!empty($shipping_method_id)) {
			$service = $this->model_extension_shipping_tk_speedy->getServiceById($shipping_method_id);
			
			if (!empty($service)) {
				if (isset($service['rod']['allowance']) && isset($service['returnReceipt']['allowance']) && $service['rod']['allowance'] == 'BANNED' && $service['returnReceipt']['allowance'] == 'BANNED') {
					$json['error'] = true;
					$json['errors']['document_receipt'] = $this->language->get('text_document_receipt');
				} else if (isset($service['rod']['allowance']) && $service['rod']['allowance'] == 'BANNED') {
					$json['error'] = true;
					$json['errors']['document'] = $this->language->get('text_document');
				} else if (isset($service['returnReceipt']['allowance']) && $service['returnReceipt']['allowance'] == 'BANNED') {
					$json['error'] = true;
					$json['errors']['receipt'] = $this->language->get('text_receipt');
				}
			}
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	// изтриване на товарителница
	public function cancel() {
		
		$this->load->language('extension/shipping/tk_speedy');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_speedy');
		
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
		
		if (isset($this->request->get['order_id'])) {
			$speedy_order_info = $this->model_extension_shipping_tk_speedy->getOrder($this->request->get['order_id']);
		}
		
		if (!empty($speedy_order_info) && !empty($speedy_order_info['shipment_number']) && $this->validate_delete()) {
			$cancelled = $this->model_extension_shipping_tk_speedy->cancel($speedy_order_info['shipment_number']);
			
			if (isset($cancelled['error']['message'])) {
				$this->session->data['warning'] = $cancelled['error']['message'];
			} else {
				$this->model_extension_shipping_tk_speedy->editShipment($this->request->get['order_id'], array());
				
				$this->session->data['success'] = $this->language->get('text_success_cancel');
			}
		} else {
			if (isset($this->error['warning'])) {
				$this->session->data['warning'] = $this->error['warning'];
			} else {
				$this->session->data['warning'] = $this->language->get('error_exists');
			}
		}
		
		$this->response->redirect($this->url->link('sale/tk_speedy', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}
	
	// ъпдейт на товарителници
	public function update() {

		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->load->model('extension/shipping/tk_speedy');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings_limit = 10;
		
		if (!empty($this->request->post['count'])) {
			if ($this->request->post['count'] == 1 && empty($this->session->data['tk_speedy_loadings']['total'])) {
				$this->cache->set('tk_speedy_loadings_count', $this->request->post['count']);
				
				$this->session->data['tk_speedy_loadings']['page'] = 1;
				$this->session->data['tk_speedy_loadings']['start'] = 0;
				$this->session->data['tk_speedy_loadings']['end'] = 10;
				
				$this->cache->delete('tk_speedy_loadings');
				
				$loadings = $this->model_extension_shipping_tk_speedy->getNotDelivered();
				
				$this->session->data['tk_speedy_loadings']['total'] = count($loadings);
				$this->cache->set('tk_speedy_loadings', $loadings);
			} else {
				$this->session->data['tk_speedy_loadings']['page'] = $this->request->post['count'];
				$loadings = $this->cache->get('tk_speedy_loadings');
			}
			
			if ($loadings) {
				
				if ($this->config->get('shipping_tk_speedy_order_status')) {
					$api_token = $this->model_extension_module_tk_checkout->getApiToken();
				} else {
					$api_token = '';
				}
				
				$tk_speedy_order_status = $this->config->get('shipping_tk_speedy_order_status');
				$tk_speedy_order_status_mail = $this->config->get('shipping_tk_speedy_order_status_mail');
				$tk_speedy_order_status_mail_text = $this->config->get('shipping_tk_speedy_order_status_mail_text');
				
				$loadings_item = array_slice($loadings, 0, $loadings_limit);
				
				foreach ($loadings_item as $loading) {
					
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
				
				array_splice($loadings, 0, $loadings_limit);
				
				$this->cache->delete('tk_speedy_loadings');
				$this->cache->set('tk_speedy_loadings', $loadings);
			}
			
			$page_count = $this->cache->get('tk_speedy_loadings_count');
			if (!$page_count || $page_count < 1) {
				$page_count = $this->request->post['count'];
			}
			
			$pages = ceil($this->session->data['tk_speedy_loadings']['total'] / $loadings_limit);
			
			if (!empty($page_count) && $page_count > $pages) {
				
				unset($this->session->data['tk_speedy_loadings']);
				
				$this->cache->delete('tk_speedy_loadings_count');
				$this->cache->delete('tk_speedy_loadings');
				
				$this->session->data['success'] = 'Товарителниците са опреснени';
				
				$data['redirect'] = true;
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($data, JSON_UNESCAPED_UNICODE));
			} else {
				$this->cache->delete('tk_speedy_loadings_count');
				
				$this->session->data['tk_speedy_loadings']['page']++;
				$this->session->data['tk_speedy_loadings']['pages'] = $pages;
				
				$this->session->data['tk_speedy_loadings']['start'] = $this->session->data['tk_speedy_loadings']['start'] + $loadings_limit;
				$this->session->data['tk_speedy_loadings']['end'] = $this->session->data['tk_speedy_loadings']['end'] + $loadings_limit;
				
				$page_count++;
				$this->session->data['tk_speedy_loadings']['count'] = $page_count;
				
				$this->cache->set('tk_speedy_loadings_count', $page_count);
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($this->session->data['tk_speedy_loadings'], JSON_UNESCAPED_UNICODE));
			}
		}
	}
	
	protected function validate_post() {
		
		if (!$this->user->hasPermission('modify', 'sale/tk_speedy')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ((utf8_strlen($this->request->post['contents']) < 1) || (utf8_strlen($this->request->post['contents']) > 100)) {
			$this->error['contents'] = $this->language->get('error_contents');
		}
		
		if ($this->request->post['weight'] <= 0) {
			$this->error['weight'] = $this->language->get('error_weight');
		}
		
		if ((utf8_strlen($this->request->post['packing']) < 1) || (utf8_strlen($this->request->post['packing']) > 50)) {
			$this->error['packing'] = $this->language->get('error_packing');
		}
		
		if ($this->request->post['count'] <= 0) {
			$this->error['count'] = $this->language->get('error_count');
		}
		
		if (empty($this->request->post['abroad']) || !empty($this->request->post['to_office'])) {
			if ($this->request->post['city'] && $this->request->post['city_id'] && (!$this->request->post['to_office'] && (($this->request->post['quarter'] && ($this->request->post['quarter_id'] && $this->request->post['city_nomenclature'] == 'FULL' || $this->request->post['city_nomenclature'] != 'FULL') && ($this->request->post['block_no'] || $this->request->post['street_no'])) || ($this->request->post['street'] && ($this->request->post['street_id'] && $this->request->post['city_nomenclature'] == 'FULL' || $this->request->post['city_nomenclature'] != 'FULL') && ($this->request->post['block_no'] || $this->request->post['street_no'])) || $this->request->post['note']) || ($this->request->post['to_office'] && $this->request->post['office_id']))) {
			} else {
				if ($this->request->post['to_office']) {
					$this->error['office'] = $this->language->get('error_office');
				} else {
					$this->error['address'] = $this->language->get('error_address');
				}
			}
		} else {
			$validAddress = $this->model_extension_shipping_tk_speedy->validateAddress($this->request->post);
			if ($validAddress !== true) {
				$this->error['warning'] = $validAddress;
			}
			
			if (isset($this->request->post['cod']) && $this->request->post['cod'] && isset($this->request->post['active_currency_code'])) {
				if (!$this->currency->has($this->request->post['active_currency_code'])) {
					$this->error['warning'] = sprintf($this->language->get('error_currency'), $this->request->post['active_currency_code']);
				}
			}
		}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
	protected function validate_delete() {
		
		if (!$this->user->hasPermission('modify', 'sale/tk_speedy')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}