<?php

class ControllerSaleTkSameday extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->language->load('extension/shipping/tk_sameday');
		
		$this->document->setTitle($this->language->get('heading_title_details'));
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
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

			$sameday_order_info = $this->model_extension_shipping_tk_sameday->getOrder($this->request->get['order_id']);

            $shipping_code_data = explode('.', $order_info['shipping_code']);
            if(!$sameday_order_info && isset($shipping_code_data[0]) && $shipping_code_data[0] == 'tk_sameday'){
                $this->model_extension_shipping_tk_sameday->addOrder($order_info, $this->request->get['order_id']);
                $sameday_order_info = $this->model_extension_shipping_tk_sameday->getOrder($this->request->get['order_id']);
            }
		}

		if (isset($sameday_order_info) && $sameday_order_info && !empty($order_info) && !$sameday_order_info['shipment_number']) {
			
			if (isset($sameday_order_info['data']) && $sameday_order_info['data']) {
				$sameday_order_data = json_decode($sameday_order_info['data'], true);
			} else {
				$sameday_order_data = array();
			}
			
			$data['heading_title'] = $this->language->get('heading_title');
			$data['heading_title_details'] = $this->language->get('heading_title_details');
			$data['text_edit'] = $this->language->get('text_edit');
			$data['text_shipping'] = $this->language->get('text_shipping');
			$data['text_success'] = $this->language->get('text_success');
			$data['text_wait'] = $this->language->get('text_wait');
			$data['text_yes'] = $this->language->get('text_yes');
			$data['text_no'] = $this->language->get('text_no');
			$data['text_code'] = $this->language->get('text_code');
			$data['text_currency'] = $this->language->get('text_currency');
			$data['text_amount'] = $this->language->get('text_amount');
			$data['text_time'] = $this->language->get('text_time');
			$data['text_status'] = $this->language->get('text_status');
			$data['text_debug'] = $this->language->get('text_debug');
			$data['text_statuses'] = $this->language->get('text_statuses');
			$data['text_settings'] = $this->language->get('text_settings');
			$data['text_geo_zone'] = $this->language->get('text_geo_zone');
			$data['text_all_zones'] = $this->language->get('text_all_zones');
			$data['text_sort_order'] = $this->language->get('text_sort_order');
			$data['text_insured_value'] = $this->language->get('text_insured_value');
			$data['text_option'] = $this->language->get('text_option');
			$data['text_option_without'] = $this->language->get('text_option_without');
			$data['text_option_open'] = $this->language->get('text_option_open');
			$data['text_option_test'] = $this->language->get('text_option_test');
			$data['text_sender'] = $this->language->get('text_sender');
			$data['text_recipient'] = $this->language->get('text_recipient');
			$data['text_fragile'] = $this->language->get('text_fragile');
			$data['text_on_to_weight'] = $this->language->get('text_on_to_weight');
			$data['text_included_shipping_price'] = $this->language->get('text_included_shipping_price');
			$data['text_calculate_price'] = $this->language->get('text_calculate_price');
			$data['text_shipment_description'] = $this->language->get('text_shipment_description');
			$data['text_shipment_product'] = $this->language->get('text_shipment_product');
			$data['text_weight_type'] = $this->language->get('text_weight_type');
			$data['text_kg'] = $this->language->get('text_kg');
			$data['text_gr'] = $this->language->get('text_gr');
			$data['text_weight_total'] = $this->language->get('text_weight_total');
			$data['text_totals'] = $this->language->get('text_totals');
			$data['text_free_weight'] = $this->language->get('text_free_weight');
			$data['text_free_total'] = $this->language->get('text_free_total');
			$data['text_fixed_price'] = $this->language->get('text_fixed_price');
			$data['text_fixed_weight'] = $this->language->get('text_fixed_weight');
			$data['text_fixed_weight_price'] = $this->language->get('text_fixed_weight_price');
			$data['text_weight_price_title'] = $this->language->get('text_weight_price_title');
			$data['text_statuses_1'] = $this->language->get('text_statuses_1');
			$data['text_statuses_2'] = $this->language->get('text_statuses_2');
			$data['text_statuses_3'] = $this->language->get('text_statuses_3');
			$data['text_statuses_4'] = $this->language->get('text_statuses_4');
			$data['text_statuses_5'] = $this->language->get('text_statuses_5');
			$data['text_statuses_6'] = $this->language->get('text_statuses_6');
			$data['text_statuses_7'] = $this->language->get('text_statuses_7');
			$data['text_statuses_8'] = $this->language->get('text_statuses_8');
			$data['text_statuses_9'] = $this->language->get('text_statuses_9');
			$data['text_statuses_10'] = $this->language->get('text_statuses_10');
			$data['text_product_name'] = $this->language->get('text_product_name');
			$data['text_product_name_none'] = $this->language->get('text_product_name_none');
			$data['text_product_name_contents'] = $this->language->get('text_product_name_contents');
			$data['text_product_name_ref'] = $this->language->get('text_product_name_ref');
			$data['text_search'] = $this->language->get('text_search');
			$data['text_name'] = $this->language->get('text_name');
			$data['text_phone'] = $this->language->get('text_phone');
			$data['text_mail'] = $this->language->get('text_mail');
			$data['text_person_type'] = $this->language->get('text_person_type');
			$data['text_company'] = $this->language->get('text_company');
			$data['text_contents'] = $this->language->get('text_contents');
			$data['text_contents_letters'] = $this->language->get('text_contents_letters');
			$data['text_ref'] = $this->language->get('text_ref');
			$data['text_package'] = $this->language->get('text_package');
			$data['text_weight'] = $this->language->get('text_weight');
			$data['text_parcels_count'] = $this->language->get('text_parcels_count');
			$data['text_payment'] = $this->language->get('text_payment');
			$data['text_payment_code'] = $this->language->get('text_payment_code');
			$data['text_payment_prepaid'] = $this->language->get('text_payment_prepaid');
			$data['text_declared_total'] = $this->language->get('text_declared_total');
			$data['text_sd'] = $this->language->get('text_sd');
			$data['text_run'] = $this->language->get('text_run');
			$data['text_warning_logout'] = $this->language->get('text_warning_logout');
			$data['text_sameday_pickup'] = $this->language->get('text_sameday_pickup');
			$data['text_return_pickup_point'] = $this->language->get('text_return_pickup_point');
			$data['text_sameday_contact_persons'] = $this->language->get('text_sameday_contact_persons');
			$data['text_package_type'] = $this->language->get('text_package_type');
			$data['text_prices'] = $this->language->get('text_prices');
			$data['text_weight_from'] = $this->language->get('text_weight_from');
			$data['text_weight_to'] = $this->language->get('text_weight_to');
			$data['text_weight_price'] = $this->language->get('text_weight_price');
			$data['text_cron_lockers'] = $this->language->get('text_cron_lockers');
			$data['text_cron_shipping'] = $this->language->get('text_cron_shipping');
			$data['text_shipping_title'] = $this->language->get('text_shipping_title');
			$data['text_shipping_text'] = $this->language->get('text_shipping_text');
			$data['text_add_text'] = $this->language->get('text_add_text');
			$data['text_services_type'] = $this->language->get('text_services_type');
			$data['text_services_type_machine'] = $this->language->get('text_services_type_machine');
			$data['text_services_type_addres'] = $this->language->get('text_services_type_addres');
			$data['text_size'] = $this->language->get('text_size');
			$data['text_width'] = $this->language->get('text_width');
			$data['text_height'] = $this->language->get('text_height');
			$data['text_depth'] = $this->language->get('text_depth');
			$data['text_observation'] = $this->language->get('text_observation');
			$data['text_client_observation'] = $this->language->get('text_client_observation');
			$data['text_cod'] = $this->language->get('text_cod');
			$data['text_total'] = $this->language->get('text_total');
			$data['text_service'] = $this->language->get('text_service');
			$data['text_county'] = $this->language->get('text_county');
			$data['text_city'] = $this->language->get('text_city');
			$data['text_address'] = $this->language->get('text_address');
			$data['text_locker'] = $this->language->get('text_locker');
			$data['text_calculate'] = $this->language->get('text_calculate');
			$data['text_awb_payment'] = $this->language->get('text_awb_payment');
			$data['text_shipment_type'] = $this->language->get('text_shipment_type');
			$data['text_field_company'] = $this->language->get('text_field_company');
			$data['text_no_company'] = $this->language->get('text_no_company');
			$data['button_login'] = $this->language->get('button_login');
			$data['button_add'] = $this->language->get('button_add');
			$data['button_logout'] = $this->language->get('button_logout');
			$data['button_sinc_pickup_point'] = $this->language->get('button_sinc_pickup_point');
			$data['button_sinc_lockers'] = $this->language->get('button_sinc_lockers');
			$data['button_create'] = $this->language->get('button_create');
			$data['button_calculate'] = $this->language->get('button_calculate');
			$data['column_status'] = $this->language->get('column_status');
			$data['column_samedayId'] = $this->language->get('column_samedayId');
			$data['column_alias'] = $this->language->get('column_alias');
			$data['column_city'] = $this->language->get('column_city');
			$data['column_county'] = $this->language->get('column_county');
			$data['column_address'] = $this->language->get('column_address');
			$data['column_default_address'] = $this->language->get('column_default_address');
			$data['help_totals'] = $this->language->get('help_totals');
			
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
			
			$data['action'] = $this->url->link('sale/tk_sameday', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $this->request->get['order_id'] . $url, 'SSL');
			$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
			
			$data['user_token'] = $this->session->data['user_token'];
			
			// данни за търговеца
			$data['sameday_pickups'] = $this->model_extension_shipping_tk_sameday->getPickup();
			$data['sameday_contact_persons'] = array();
			if (!empty($data['sameday_pickups'])) {
				foreach ($data['sameday_pickups'] as $sameday_pickup) {
					if (!empty($sameday_pickup['contactPersons'])) {
						$data['sameday_contact_persons'][$sameday_pickup['sameday_id']] = json_decode($sameday_pickup['contactPersons'], true);
					}
				}
			}
			
			// услуги от семдей
			$data['sameday_services'] = array();
			$sameday_services = array();
			if ($this->config->get('shipping_tk_sameday_username') && $this->config->get('shipping_tk_sameday_password')) {
				$this->load->library('tksameday');
				if (!isset($this->tksameday)) {
					$this->tksameday = new TkSameday($this->registry);
				}
				try {
					$sameday_services = TkSameday::getServices();
				} catch (\Exception $e) {
					$this->error['warning'] = $e->getMessage();
				}
			}
			
			if (!empty($sameday_services['error']['message'])) {
				$this->error['warning'] = $sameday_services['error']['message'];
			}
			
			// услуги
			if (isset($this->request->post['service'])) {
				$data['service'] = $this->request->post['service'];
			} else {
				$data['service'] = $sameday_order_info['service'];
			}
			
			// вид на доставката
			if (isset($this->request->post['shipping_to'])) {
				$data['shipping_to'] = $this->request->post['shipping_to'];
			} else if (!empty($sameday_order_info['shipping_to'])) {
				$data['shipping_to'] = $sameday_order_info['shipping_to'];
			} else {
				$data['shipping_to'] = 'locker';
			}
			
			// настройки
			$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
			$sameday_services_seting = $sameday_setting['shipping_tk_sameday_countries'][$sameday_order_info['country_iso']]['services'];
			$sameday_service_setting = $sameday_setting['shipping_tk_sameday_countries'][$sameday_order_info['country_iso']]['services'][$data['service']];
			
			if (!empty($sameday_services['data'])) {
				foreach ($sameday_services['data'] as $sameday_service) {
					if (!empty($sameday_services_seting[$sameday_service['id']]['type'])) {
						$sameday_services_seting_type = $sameday_services_seting[$sameday_service['id']]['type'];
					} else {
						$sameday_services_seting_type = 'address';
					}
					if (!empty($sameday_services_seting[$sameday_service['id']]['status']) && $sameday_services_seting[$sameday_service['id']]['status'] == 1) {
						$data['sameday_services'][] = array(
							'id'   => $sameday_service['id'],
							'name' => $sameday_service['name'],
							'type' => $sameday_services_seting_type
						
						);
					}
				}
			}
			
			// изпраща от адрес в настройки
			if (isset($this->request->post['pickup_point'])) {
				$data['pickup_point'] = $this->request->post['pickup_point'];
			} else if (!empty($sameday_order_data['pickup_point'])) {
				$data['pickup_point'] = $sameday_order_data['pickup_point'];
			} else {
				$data['pickup_point'] = $this->config->get('shipping_tk_sameday_pickup');
			}
			
			// връща до адрес в настройки
			if (isset($this->request->post['return_pickup_point'])) {
				$data['return_pickup_point'] = $this->request->post['return_pickup_point'];
			} else if (!empty($sameday_order_data['return_pickup_point'])) {
				$data['return_pickup_point'] = $sameday_order_data['return_pickup_point'];
			} else {
				$data['return_pickup_point'] = $this->config->get('shipping_tk_sameday_pickup');
			}
			
			// лице з аконтакт
			if (isset($this->request->post['contact_person'])) {
				$data['contact_person'] = $this->request->post['contact_person'];
			} else if (!empty($sameday_order_data['contact_person'])) {
				$data['contact_person'] = $sameday_order_data['contact_person'];
			} else {
				$data['contact_person'] = $this->config->get('shipping_tk_sameday_contact_person');
			}
			
			// вид на опаковката
			if (isset($this->request->post['package_type'])) {
				$data['package_type'] = $this->request->post['package_type'];
			} else if (!empty($sameday_order_data['package_type'])) {
				$data['package_type'] = $sameday_order_data['package_type'];
			} else {
				$data['package_type'] = $this->config->get('shipping_tk_sameday_package_type');
			}
			
			// тегло
			if (isset($this->request->post['weight'])) {
				$data['weight'] = $this->request->post['weight'];
			} else if (!empty($sameday_order_data['weight']) && $sameday_order_data['weight'] > 0) {
				$data['weight'] = $sameday_order_data['weight'];
			} else {
				$this->load->model('sale/order');
				$this->load->model('catalog/product');
				
				$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
				$product_weight = 0;
				foreach ($op_order_products as $product) {
					$option_weight = 0;
					
					$result = $this->model_catalog_product->getProduct($product['product_id']);
					
					if (isset($result['weight'])) {
						$option_weight += $result['weight'];
					}
					
					$order_options = $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
					if ($order_options) {
						foreach ($order_options as $order_option) {
							$option = $this->model_catalog_product->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
							
							if ($option['weight_prefix'] == '+') {
								$option_weight += $option['weight'];
							} else if ($option['weight_prefix'] == '-') {
								$option_weight -= $option['weight'];
							} else {
								$option_weight = $option['weight'];
							}
						}
					}
					
					$product_weight += $option_weight * $product['quantity'];
				}
				
				$totalWeight = $product_weight;
				
				if ($totalWeight == 0 && isset($sameday_service_setting['weight_total']) && $sameday_service_setting['weight_total'] > 0) {
					$totalWeight = $sameday_service_setting['weight_total'];
				}
				
				if (isset($sameday_service_setting['weight_type']) && $sameday_service_setting['weight_type'] == 'gram') {
					$totalWeight = $totalWeight / 1000;
				}
				
				if ($totalWeight < 0.01) {
					$totalWeight = 0.01;
				}
				
				$data['weight'] = $totalWeight;
			}
			
			// брой пакети
			if (isset($this->request->post['count'])) {
				$data['count'] = $this->request->post['count'];
			} else if (!empty($sameday_order_data['count'])) {
				$data['count'] = $sameday_order_data['count'];
			} else {
				if ($data['weight'] >= 32) {
					$data['count'] = ceil($data['weight'] / 32);
				} else {
					$data['count'] = 1;
				}
			}
			
			// размери на всеки пакет
			if (isset($this->request->post['parcels_size'])) {
				$data['parcels_sizes'] = $this->request->post['parcels_size'];
			} else if (!empty($sameday_order_data['parcels_size'])) {
				$data['parcels_sizes'] = $sameday_order_data['parcels_size'];
			} else {
				if (isset($sameday_order_data['width'])) {
					$data['parcels_sizes'][1]['width'] = $sameday_order_data['width'];
				} else {
					$data['parcels_sizes'][1]['width'] = '';
				}
				if (isset($sameday_order_data['height'])) {
					$data['parcels_sizes'][1]['height'] = $sameday_order_data['height'];
				} else {
					$data['parcels_sizes'][1]['height'] = '';
				}
				if (isset($sameday_order_data['length'])) {
					$data['parcels_sizes'][1]['length'] = $sameday_order_data['length'];
				} else {
					$data['parcels_sizes'][1]['length'] = '';
				}
				if (!isset($data['parcels_sizes'][1]['weight'])) {
					$data['parcels_sizes'][1]['weight'] = '';
				}
			}
			
			// описание в заглавието
			$observation_description = '';
			if (isset($this->request->post['observation'])) {
				$data['observation'] = $this->request->post['observation'];
			} else if (!empty($sameday_order_data['observation'])) {
				$data['observation'] = $sameday_order_data['observation'];
			} else {
				if (!empty($sameday_service_setting['shipment_description'])) {
					$observation_description .= $sameday_service_setting['shipment_description'] . ' ' . $this->request->get['order_id'];
				}
				
				if (!empty($sameday_service_setting['product_name']) && $sameday_service_setting['product_name'] == 'contents') {
					$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
					foreach ($op_order_products as $product) {
						$observation_description .= ' ';
						
						if (!empty($sameday_service_setting['shipment_product'])) {
							$observation_description .= $sameday_service_setting['shipment_product'];
						} else {
							$observation_description .= $product['name'];
							
							$order_options = $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
							if ($order_options) {
								$observation_description .= ':';
								
								foreach ($order_options as $order_option) {
									$observation_description .= $order_option['value'] . '|';
								}
							}
						}
						
						$observation_description .= ' (' . $product['quantity'] . 'бр.) ';
						$observation_description .= ' / ';
					}
				}
				
				$data['observation'] = $observation_description;
			}
			
			// описание в забележка
			$client_observation_description = '';
			if (isset($this->request->post['client_observation'])) {
				$data['client_observation'] = $this->request->post['client_observation'];
			} else if (!empty($sameday_order_data['client_observation'])) {
				$data['client_observation'] = $sameday_order_data['client_observation'];
			} else {
				if (!empty($sameday_service_setting['product_name']) && $sameday_service_setting['product_name'] == 'ref') {
					$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
					foreach ($op_order_products as $product) {
						$client_observation_description .= ' ';
						
						if (!empty($sameday_service_setting['shipment_product'])) {
							$client_observation_description .= $sameday_service_setting['shipment_product'];
						} else {
							$client_observation_description .= $product['name'];
							
							$order_options = $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
							if ($order_options) {
								$client_observation_description .= ':';
								
								foreach ($order_options as $order_option) {
									$client_observation_description .= $order_option['value'] . '|';
								}
							}
						}
						
						$client_observation_description .= ' (' . $product['quantity'] . 'бр.) ';
						$client_observation_description .= ' / ';
					}
				}
				
				$data['client_observation'] = $client_observation_description;
			}
			
			// сума на наложения
			if (isset($this->request->post['total'])) {
				$data['total'] = $this->request->post['total'];
			} else if (!empty($sameday_order_data['total'])) {
				$data['total'] = $sameday_order_data['total'];
			} else {
				$data['total'] = 0;
				$order_totals = $this->model_sale_order->getOrderTotals($this->request->get['order_id']);
				if (!empty($order_totals)) {
					$exclude_total = array(
						'total',
						'total_discount'
					);
					foreach ($order_totals as $order_total) {
						if (!in_array($order_total['code'], $exclude_total)) {
							$data['total'] += $order_total['value'];
						}
					}
				}
				
				// превалутираме ако валутата не е спрямо валутата за страната
				if (isset($this->request->post['country_iso'])) {
					$data['country_iso'] = $this->request->post['country_iso'];
				} else if (!empty($sameday_order_info['country_iso'])) {
					$data['country_iso'] = $sameday_order_info['country_iso'];
				} else {
					$data['country_iso'] = 'BG';
				}
		
				if ($data['country_iso'] == 'RO' && $order_info['currency_code'] != 'RON') {
					$data['total'] = $this->currency->convert($data['total'], 'RON', $order_info['currency_code']);
				}
			}
			
			
			// превалотиране
			/*
			if ($data['total'] > 0) {
				if ($this->config->get('config_currency') != 'BGN' && $this->config->get('config_currency') != 'RON') {
					$data['total'] = $this->currency->convert($data['total'], 'BGN', $order_info['currency_code']);
				} else if ($order_info['currency_code'] == 'RON') {
					$data['total'] = $this->currency->convert($data['total'], $this->config->get('config_currency'), $order_info['currency_code']);
				}
			}
			*/
			
			// десетична запетая
			if (!empty($order_info['currency_code'])) {
				$decimal_place = $this->currency->getDecimalPlace($order_info['currency_code']);
			}
			if (!isset($decimal_place)) {
				$decimal_place = 2;
			}
			$data['total'] = round($data['total'], $decimal_place);
			
			// наложено плащане
			if (isset($this->request->post['cod'])) {
				$data['cod'] = $this->request->post['cod'];
			} else if (!empty($sameday_order_data['cod'])) {
				$data['cod'] = $sameday_order_data['cod'];
			} else {
				if ($sameday_order_info['payment_code'] == 'cod') {
					$data['cod'] = true;
				} else {
					$data['cod'] = false;
				}
			}
			
			// сума на обявена стойност
			if (isset($this->request->post['insured_value'])) {
				$data['insured_value'] = $this->request->post['insured_value'];
			} else if (!empty($sameday_order_data['insured_value'])) {
				$data['insured_value'] = $sameday_order_data['insured_value'];
			} else {
				if (isset($sameday_service_setting['insured_value']) && $sameday_service_setting['insured_value'] == 1) {
					$data['insured_value'] = $data['total'];
				} else {
					$data['insured_value'] = 0;
				}
			}
			
			// отвори преди да платиш
			if (isset($this->request->post['opening'])) {
				$data['opening'] = $this->request->post['opening'];
			} else if (!empty($sameday_order_data['opening'])) {
				$data['opening'] = $sameday_order_data['opening'];
			} else {
				if (isset($sameday_service_setting['opening']) && $sameday_service_setting['opening']) {
					$data['opening'] = $sameday_service_setting['opening'];
				} else {
					$data['opening'] = 0;
				}
			}
			
			// име на клиент
			if (isset($this->request->post['name'])) {
				$data['name'] = $this->request->post['name'];
			} else if (!empty($sameday_order_info['name'])) {
				$data['name'] = $sameday_order_info['name'];
			} else if (isset($order_info['firstname'])) {
				$data['name'] = $order_info['firstname'] . ' ' . $order_info['lastname'];
			} else {
				$data['name'] = '';
			}
			
			// телефон на клиент
			if (isset($this->request->post['phone'])) {
				$data['phone'] = $this->request->post['phone'];
			} else if (!empty($sameday_order_info['phone'])) {
				$data['phone'] = $sameday_order_info['phone'];
			} else if (isset($order_info['telephone'])) {
				$data['phone'] = $order_info['telephone'];
			} else {
				$data['phone'] = '';
			}
			
			// email на клиент
			if (isset($this->request->post['email'])) {
				$data['email'] = $this->request->post['email'];
			} else if (!empty($sameday_order_info['email'])) {
				$data['email'] = $sameday_order_info['email'];
			} else if (isset($order_info['email'])) {
				$data['email'] = $order_info['email'];
			} else {
				$data['email'] = '';
			}
			
			//име на фирма ако има такава
			if (isset($this->request->post['company_name'])) {
				$data['company_name'] = $this->request->post['company_name'];
			} else if (!empty($sameday_order_data['company_name'])) {
				$data['company_name'] = $sameday_order_data['company_name'];
			} else {
				$data['company_name'] = '';
	
				if ($this->config->get('shipping_tk_sameday_company') && !empty($order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) && utf8_strlen($order_info['custom_field'][$this->config->get('shipping_tk_sameday_company')]) > 3) {
					$data['company_name'] = $order_info['custom_field'][$this->config->get('shipping_tk_sameday_company')];
				}
			}
			
			// вид на клиента
			if (isset($this->request->post['person_type'])) {
				$data['person_type'] = $this->request->post['person_type'];
			} else if (!empty($sameday_order_data['person_type'])) {
				$data['person_type'] = $sameday_order_data['person_type'];
			} else {
				if ($data['company_name']) {
					$data['person_type'] = 1;
				} else {
					$data['person_type'] = 0;
				}
			}
			
			// адрес за дсотавка
			if (isset($this->request->post['country_id'])) {
				$data['country_id'] = $this->request->post['country_id'];
			} else if (!empty($sameday_order_info['country_id'])) {
				$data['country_id'] = $sameday_order_info['country_id'];
			} else {
				$data['country_id'] = '';
			}
			
			if (isset($this->request->post['country'])) {
				$data['country'] = $this->request->post['country'];
			} else if (!empty($sameday_order_info['country'])) {
				$data['country'] = $sameday_order_info['country'];
			} else {
				$data['country'] = '';
			}
			
			if (isset($this->request->post['country_iso'])) {
				$data['country_iso'] = $this->request->post['country_iso'];
			} else if (!empty($sameday_order_info['country_iso'])) {
				$data['country_iso'] = $sameday_order_info['country_iso'];
			} else {
				$data['country_iso'] = '';
			}
			
			if (isset($this->request->post['postcode'])) {
				$data['postcode'] = $this->request->post['postcode'];
			} else if (!empty($sameday_order_info['postcode'])) {
				$data['postcode'] = $sameday_order_info['postcode'];
			} else {
				$data['postcode'] = '';
			}
			
			if (isset($this->request->post['county_id'])) {
				$data['county_id'] = $this->request->post['county_id'];
			} else if (!empty($sameday_order_info['county_id'])) {
				$data['county_id'] = $sameday_order_info['county_id'];
			} else {
				$data['county_id'] = 0;
			}
			
			if (isset($this->request->post['county'])) {
				$data['county'] = $this->request->post['county'];
			} else if (!empty($sameday_order_info['county'])) {
				$data['county'] = $sameday_order_info['county'];
			} else {
				$data['county'] = '';
			}
			
			if (isset($this->request->post['city_id'])) {
				$data['city_id'] = $this->request->post['city_id'];
			} else if (!empty($sameday_order_info['city_id'])) {
				$data['city_id'] = $sameday_order_info['city_id'];
			} else {
				$data['city_id'] = 0;
			}
			
			if (isset($this->request->post['city'])) {
				$data['city'] = $this->request->post['city'];
			} else if (!empty($sameday_order_info['city'])) {
				$data['city'] = $sameday_order_info['city'];
			} else {
				$data['city'] = '';
			}
			
			if (isset($this->request->post['address'])) {
				$data['address'] = $this->request->post['address'];
			} else if (!empty($sameday_order_info['address'])) {
				$data['address'] = $sameday_order_info['address'];
			} else {
				$data['address'] = '';
			}
			
			if (isset($this->request->post['locker_id'])) {
				$data['locker_id'] = $this->request->post['locker_id'];
			} else if (!empty($sameday_order_info['locker_id'])) {
				$data['locker_id'] = $sameday_order_info['locker_id'];
			} else {
				$data['locker_id'] = 0;
			}
			
			if (isset($this->request->post['locker_name'])) {
				$data['locker_name'] = $this->request->post['locker_name'];
			} else if (!empty($sameday_order_info['locker_name'])) {
				$data['locker_name'] = $sameday_order_info['locker_name'];
			} else {
				$data['locker_name'] = '';
			}
			
			if (isset($this->request->post['locker_address'])) {
				$data['locker_address'] = $this->request->post['locker_address'];
			} else if (!empty($sameday_order_info['locker_address'])) {
				$data['locker_address'] = $sameday_order_info['locker_address'];
			} else {
				$data['locker_address'] = '';
			}
			
			$data['lockers'] = array();
			if (isset($data['city_id']) && $data['city_id'] > 0 && isset($data['country_iso'])) {
				$results = $this->model_extension_shipping_tk_sameday->getLockers($data['country_iso'], $data['city_id']);
				foreach ($results as $result) {
					if (!empty($result['name'])) {
						$data['lockers'][] = array(
							'locker_id' => $result['locker_id'],
							'name'      => $result['name'],
							'address'   => $result['address']
						);
					}
				}
			}
			
			if (isset($this->request->post['calculate'])) {
				$data['calculate'] = $this->request->post['calculate'];
			} else {
				$data['calculate'] = 0;
			}
			
			$data['amount'] = '';
			$data['currency'] = '';
			$data['time'] = '';
		
			if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate_post()) {
				
				// услуга
				$calculate['service'] = $data['service'];
				
				// данни за изпшращача
				$calculate['pickupPoint'] = $data['pickup_point'];
				$calculate['returnLocationId'] = $data['pickup_point'];
				$calculate['contactPerson'] = $data['contact_person'];
				
				//вид на пратката
				$calculate['packageType'] = $data['package_type'];
				
				// тегло на пратката
				$calculate['packageWeight'] = $data['weight'];
				
				//брой колети в пратката
				$calculate['packageNumber'] = $data['count'];
				
				// размер на всеки пакет
				$i = 1;
				foreach ($data['parcels_sizes'] as $parcel_size) {
					$calculate['parcels'][$i]['weight'] = $parcel_size['weight'];
					$calculate['parcels'][$i]['width'] = $parcel_size['width'];
					$calculate['parcels'][$i]['length'] = $parcel_size['length'];
					$calculate['parcels'][$i]['height'] = $parcel_size['height'];
					
					$i++;
				}
				
				// ако няма вкарано тегло в поне един пакет
				if (empty($calculate['parcels'][1]['weight']) || $calculate['parcels'][1]['weight'] == 0) {
					$calculate['parcels'][1]['weight'] = $data['weight'];
				}
				
				// наложено плащане
				if ($data['total'] > 0 && $data['cod']) {
					$calculate['cashOnDelivery'] = $data['total'];
				} else {
					$calculate['cashOnDelivery'] = 0;
				}
				
				// застраховка - обявена стойност
				if (!empty($data['insured_value'])) {
					$calculate['insuredValue'] = $data['insured_value'];
				} else {
					$calculate['insuredValue'] = 0;
				}
				
				// отвори преди да платиш
				if (!empty($data['opening']) && $data['opening'] == 1) {
					$calculate['serviceTaxes'] = array('OPCG');
				}
				
				// адрес за доставка
				if (!empty($data['city_id'])) {
					$calculate['awbRecipient']['city'] = $data['city_id'];
				}
				
				if (!empty($data['county_id'])) {
					$calculate['awbRecipient']['county'] = $data['county_id'];
				}
				
				if ($data['shipping_to'] == 'locker') {
					if (!empty($data['locker_id'])) {
						$calculate['lockerId'] = $data['locker_id'];
					}
				} else {
					if (!empty($data['address'])) {
						$calculate['awbRecipient']['address'] = $data['address'];
					}
				}
				
				// платец на куриерската услуга винаги е търговеца
				$calculate['awbPayment'] = 1;
				$calculate['thirdPartyPickup'] = 0;
				$calculate['cashOnDeliveryReturns'] = 0;
				
				if ($data['country_iso'] == 'RO') {
					$calculate['currency'] = 'RON';
				} else {
					$calculate['currency'] = $order_info['currency_code'];
				}
				
				if (isset($this->request->post['calculate']) && $this->request->post['calculate'] == 1) {
					// създаване на товарителница
					
					//описание на пратката
					if (!empty($data['observation'])) {
						$calculate['observation'] = $data['observation'];
					}
					
					//описание на пратката към клиента
					if (!empty($data['client_observation'])) {
						$calculate['clientObservation'] = $data['client_observation'];
					}
					
					//данни за клиента
					if (!empty($data['name'])) {
						$calculate['awbRecipient']['name'] = $data['name'];
					}
					
					if (!empty($data['phone'])) {
						$calculate['awbRecipient']['phoneNumber'] = $data['phone'];
					}
					
					if (!empty($data['email'])) {
						$calculate['awbRecipient']['email'] = $data['email'];
					}
					
					if (!empty($data['person_type'])) {
						$calculate['awbRecipient']['personType'] = $data['person_type'];
					} else {
						$calculate['awbRecipient']['personType'] = 0;
					}
					
					if (!empty($data['company_name'])) {
						$calculate['awbRecipient']['companyName'] = $data['company_name'];
					}
				
					$awb = $this->model_extension_shipping_tk_sameday->create($calculate);
					
					if (!empty($awb['error'])) {
						if ($this->config->get('module_tk_checkout_debug')) {
							$this->log->write('Sameday: order_id - ' . $order_info['order_id'] . ' | createShipment');
							$this->log->write($calculate);
							$this->log->write($awb['error']);
						}
						
						$this->error = $awb['error'];
					} else {
						
						$shipment['awb'] = $awb['awbNumber'];
						$shipment['shipment'] = $awb['parcels'];
						$shipment['pdf'] = $awb['pdfLink'];
						
						$shipment['status'] = 'New awb';
						$shipment['status_id'] = 1;
						$shipment['shipment_status'] = 1;
						$shipment['mail_send'] = 0;
						
						$awb_status = $this->model_extension_shipping_tk_sameday->track($awb['awbNumber']);
						
						if (!empty($awb_status['expeditionStatus']['statusId'])) {
							$shipment['status'] = $awb_status['expeditionStatus']['status'];
							$shipment['shipment_status'] = $awb_status['expeditionStatus']['statusId'];
						}
						
						if ($this->config->get('shipping_tk_sameday_order_status_id')) {
							$api_token = $this->model_extension_module_tk_checkout->getApiToken();
						} else {
							$api_token = '';
						}
						
						// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
						if ($this->config->get('shipping_tk_sameday_order_status_id') && $api_token) {
							if ($this->config->get('shipping_tk_sameday_order_status_id_mail')) {
								$notify = true;
							} else {
								$notify = false;
							}
							
							if ($this->config->get('shipping_tk_sameday_order_status_id_mail_text')) {
								$patterns = array();
								$patterns[0] = '{shipment_number}';
								
								$replacements = array();
								$replacements[0] = $awb['awbNumber'];
								
								$comment = str_replace($patterns, $replacements, $this->config->get('shipping_tk_sameday_order_status_id_mail_text'));
							} else {
								$comment = 'Номер на пратка: ' . $awb['awbNumber'];
							}
							
							$history_data = array(
								'order_status_id' => $this->config->get('shipping_tk_sameday_order_status_id'),
								'notify'          => $notify,
								'comment'         => $comment
							);
							
							$shipment['mail_send'] = $shipment['shipment_status'];
							
							$this->model_extension_module_tk_checkout->addOrderHistory($order_info['order_id'], $api_token, $history_data);
						}
						
						$this->model_extension_shipping_tk_sameday->updateOrder($this->request->post, $order_info['order_id'], $shipment);
						
						$this->response->redirect($this->url->link('sale/order/info', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
					}
				} else {
					// калкулиране на доставка
					$awb = $this->model_extension_shipping_tk_sameday->calculate($calculate);
					
					if (!empty($awb['error'])) {
						if ($awb['errors']['errors'][0] == 'The locker sent is inactive.' && $calculate['service'] == 30) {
							$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
					
							$data['amount'] = $sameday_setting['shipping_tk_sameday_countries']['RO']['services'][30]['fixed_price'];
							$data['currency'] = $sameday_setting['shipping_tk_sameday_countries']['RO']['currency'];
							$data['time'] = '';
							$data['calculate'] = 1;
						} else {
							if ($this->config->get('module_tk_checkout_debug')) {
								$this->log->write('Sameday: order_id - ' . $order_info['order_id'] . ' | costShipment');
								$this->log->write($calculate);
								$this->log->write($awb['error']);
							}
							
							$this->error = $awb['error'];
						}
					} else {
						
						$data['amount'] = $awb['amount'];
						$data['currency'] = $awb['currency'];
						$data['time'] = $awb['time'];
						$data['calculate'] = 1;
						
						// превалутираме ако валутата не е спрямо валутата в сайта
						if ($awb['currency'] != $calculate['currency']) {
							$data['total_amount'] = $this->currency->convert($awb['amount'], $calculate['currency'], $awb['currency']);
						}
					}
				}
				
				$this->model_extension_shipping_tk_sameday->updateOrder($this->request->post, $order_info['order_id']);
			}
			
			if ($this->error) {
				
				$data['calculate'] = 0;
				
				foreach ($this->error as $key => $value) {
					$data['error_' . $key] = $value;
				}
			}
			
			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			
			$this->response->setOutput($this->load->view('sale/tk_sameday', $data));
		} else {
			$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
	}
	
	// данни за офиси и адреси
	public function getCounties() {
		
		$this->load->model('extension/shipping/tk_sameday');
		
		$json['counties'] = array();
		
		if (!empty($this->request->get['country_iso'])) {
			
			if (isset($this->request->get['name'])) {
				$name = $this->request->get['name'];
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
		
		$json['cities'] = array();
		
		if (!empty($this->request->get['country_iso']) && !empty($this->request->get['county_id'])) {
			
			if (isset($this->request->get['name'])) {
				$name = $this->request->get['name'];
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
		
		$json['cities'] = array();
		
		if (!empty($this->request->get['country_iso']) && !empty($this->request->get['county_id'])) {
			
			if (isset($this->request->get['name'])) {
				$name = $this->request->get['name'];
			} else {
				$name = false;
			}
			
			$results = $this->model_extension_shipping_tk_sameday->getLockersCities($this->request->get['country_iso'], $this->request->get['county_id'], $name);
			foreach ($results as $result) {
				if (!empty($result['city'])) {
					$json['cities'][] = array(
						'city_id'  => $result['city_id'],
						'name'     => $result['city'],
						'postcode' => $result['postcode']
					);
				}
			}
		}
		
		$json['cities_count'] = count($json['cities']);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function getLockers() {
		
		$this->load->model('extension/shipping/tk_sameday');
		
		$json['lockers'] = array();
		
		if (!empty($this->request->get['country_iso']) && !empty($this->request->get['city_id'])) {
			
			if (isset($this->request->get['name'])) {
				$name = $this->request->get['name'];
			} else {
				$name = false;
			}
			
			$results = $this->model_extension_shipping_tk_sameday->getLockers($this->request->get['country_iso'], $this->request->get['city_id'], $name);
			foreach ($results as $result) {
				if (!empty($result['name'])) {
					$json['lockers'][] = array(
						'locker_id' => $result['locker_id'],
						'name'      => $result['name'],
						'address'   => $result['address']
					);
				}
			}
		}
		
		$json['lockers_count'] = count($json['lockers']);
		
		$this->response->setOutput(json_encode($json));
	}
	
	// принт на товарителница
	public function parcel() {
		
		$this->load->language('extension/shipping/tk_sameday');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_sameday');
		
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
			$sameday_order_info = $this->model_extension_shipping_tk_sameday->getOrder($this->request->get['order_id']);
		}
		
		if (!empty($sameday_order_info['shipment_number'])) {
			
			$pdf = $this->model_extension_shipping_tk_sameday->parcel($sameday_order_info['shipment_number']);
			
			if (isset($pdf['error']['message'])) {
				$this->session->data['warning'] = $pdf['error']['message'];
			} else {
				
				header('Content-type: application/pdf');
				header("Cache-Control: no-cache");
				header("Pragma: no-cache");
				echo $pdf;
				exit;
			}
		} else {
			$this->session->data['warning'] = $this->language->get('error_exists');
		}
		
		$this->response->redirect($this->url->link('sale/tk_sameday', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}
	
	// изтриване на товарителница
	public function cancel() {
		
		$this->load->language('extension/shipping/tk_sameday');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_sameday');
		
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
			$sameday_order_info = $this->model_extension_shipping_tk_sameday->getOrder($this->request->get['order_id']);
		}
		
		if (!empty($sameday_order_info) && !empty($sameday_order_info['shipment_number']) && $this->validate_delete()) {
			$cancelled = $this->model_extension_shipping_tk_sameday->cancel($sameday_order_info['shipment_number']);
			
			if (isset($cancelled['error']['message'])) {
				$this->session->data['warning'] = $cancelled['error']['message'];
			} else {
				$this->model_extension_shipping_tk_sameday->editShipment($this->request->get['order_id'], array());
				
				$this->session->data['success'] = $this->language->get('text_success_cancel');
			}
		} else {
			if (isset($this->error['warning'])) {
				$this->session->data['warning'] = $this->error['warning'];
			} else {
				$this->session->data['warning'] = $this->language->get('error_exists');
			}
		}
		
		$this->response->redirect($this->url->link('sale/tk_sameday', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}
	
	// ъпдейт на товарителници
	public function update() {
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings_limit = 10;
		
		if (!empty($this->request->post['count'])) {
			if ($this->request->post['count'] == 1 && empty($this->session->data['tk_sameday_loadings']['total'])) {
				$this->cache->set('tk_sameday_loadings_count', $this->request->post['count']);
				
				$this->session->data['tk_sameday_loadings']['page'] = 1;
				$this->session->data['tk_sameday_loadings']['start'] = 0;
				$this->session->data['tk_sameday_loadings']['end'] = 10;
				
				$this->cache->delete('tk_sameday_loadings');
				
				$loadings = $this->model_extension_shipping_tk_sameday->getNotDelivered();
				
				$this->session->data['tk_sameday_loadings']['total'] = count($loadings);
				$this->cache->set('tk_sameday_loadings', $loadings);
			} else {
				$this->session->data['tk_sameday_loadings']['page'] = $this->request->post['count'];
				$loadings = $this->cache->get('tk_sameday_loadings');
			}
			
			if ($loadings) {
				
				if ($this->config->get('shipping_tk_sameday_order_status')) {
					$api_token = $this->model_extension_module_tk_checkout->getApiToken();
				} else {
					$api_token = '';
				}
				
				$tk_sameday_order_status = $this->config->get('shipping_tk_sameday_order_status');
				$tk_sameday_order_status_mail = $this->config->get('shipping_tk_sameday_order_status_mail');
				$tk_sameday_order_status_mail_text = $this->config->get('shipping_tk_sameday_order_status_mail_text');
				
				$loadings_item = array_slice($loadings, 0, $loadings_limit);
				
				foreach ($loadings_item as $loading) {
					
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
				array_splice($loadings, 0, $loadings_limit);
				
				$this->cache->delete('tk_sameday_loadings');
				$this->cache->set('tk_sameday_loadings', $loadings);
			}
			
			$page_count = $this->cache->get('tk_sameday_loadings_count');
			if (!$page_count || $page_count < 1) {
				$page_count = $this->request->post['count'];
			}
			
			$pages = ceil($this->session->data['tk_sameday_loadings']['total'] / $loadings_limit);
			
			if (!empty($page_count) && $page_count > $pages) {
				
				unset($this->session->data['tk_sameday_loadings']);
				
				$this->cache->delete('tk_sameday_loadings_count');
				$this->cache->delete('tk_sameday_loadings');
				
				$this->session->data['success'] = 'Товарителниците са опреснени';
				
				$data['redirect'] = true;
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($data, JSON_UNESCAPED_UNICODE));
			} else {
				$this->cache->delete('tk_sameday_loadings_count');
				
				$this->session->data['tk_sameday_loadings']['page']++;
				$this->session->data['tk_sameday_loadings']['pages'] = $pages;
				
				$this->session->data['tk_sameday_loadings']['start'] = $this->session->data['tk_sameday_loadings']['start'] + $loadings_limit;
				$this->session->data['tk_sameday_loadings']['end'] = $this->session->data['tk_sameday_loadings']['end'] + $loadings_limit;
				
				$page_count++;
				$this->session->data['tk_sameday_loadings']['count'] = $page_count;
				
				$this->cache->set('tk_sameday_loadings_count', $page_count);
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($this->session->data['tk_sameday_loadings'], JSON_UNESCAPED_UNICODE));
			}
		}
	}
	
	protected function validate_post() {
		
		if (!$this->user->hasPermission('modify', 'sale/tk_sameday')) {
			$this->error['warning'] = $this->language->get('error_text_permission');
		}
		
		if ((utf8_strlen($this->request->post['observation']) < 1) || (utf8_strlen($this->request->post['observation']) > 100)) {
			$this->error['observation'] = $this->language->get('error_text_observation');
		}
		
		if ((utf8_strlen($this->request->post['name']) < 1) || (utf8_strlen($this->request->post['name']) > 200)) {
			$this->error['name'] = $this->language->get('error_text_name');
		}
		
		if ((utf8_strlen($this->request->post['phone']) < 1) || (utf8_strlen($this->request->post['phone']) > 200)) {
			$this->error['phone'] = $this->language->get('error_text_phone');
		}
		
		if (isset($this->request->post['email'])) {
			$this->request->post['email'] = str_replace(" ", "", $this->request->post['email']);
		}
		if (isset($this->request->post['email']) && !filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL) || !isset($this->request->post['email'])) {
			$this->error['email'] = $this->language->get('error_text_email');
		}
		
		if ($this->request->post['weight'] <= 0) {
			$this->error['weight'] = $this->language->get('error_text_weight');
		}
		
		if ($this->request->post['count'] <= 0) {
			$this->error['count'] = $this->language->get('error_text_count');
		}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_text_warning');
		}
		
		return !$this->error;
	}
	
	protected function validate_delete() {
		
		if (!$this->user->hasPermission('modify', 'sale/tk_sameday')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}