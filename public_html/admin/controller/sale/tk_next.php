<?php

class ControllerSaleTkNext extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('extension/shipping/tk_next');
		
		$this->load->model('extension/shipping/tk_next');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('sale/order');
		$this->load->model('catalog/product');
		$this->load->model('setting/setting');
		
		$this->document->addScript('view/javascript/tk_checkout/jquery.magnific-popup.min.js');
		$this->document->addStyle('view/stylesheet/tk_checkout/magnific-popup.css');
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		if (isset($this->session->data['error'])) {
			$this->error = $this->session->data['error'];
			unset($this->session->data['error']);
		}
		
		if (isset($this->session->data['error'])) {
			$data['error_warning'] = $this->session->data['error'];
			unset($this->session->data['error']);
		} else if (isset($this->error['warning'])) {
			
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		
		if (isset($this->error['phone'])) {
			$data['error_telephone'] = $this->error['phone'];
		} else {
			$data['error_telephone'] = '';
		}
		
		if (isset($this->error['weight'])) {
			$data['error_weight'] = $this->error['weight'];
		} else {
			$data['error_weight'] = '';
		}
		
		if (isset($this->error['contents'])) {
			$data['error_contents'] = $this->error['contents'];
		} else {
			$data['error_contents'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
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
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if (isset($this->request->get['order_id']) && $this->request->get['order_id']) {
			
			$data['action'] = $this->url->link('sale/tk_next', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, true);
			$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true);
			
			$data['user_token'] = $this->session->data['user_token'];
			
			$order = $this->model_extension_module_tk_checkout->getOrder($this->request->get['order_id']);
			$next_order = $this->model_extension_shipping_tk_next->getOrder($this->request->get['order_id']);
			$order_products = $this->model_extension_module_tk_checkout->getOrderProducts($this->request->get['order_id']);
			
			if (!empty($next_order['data'])) {
				$next_order_data = unserialize($next_order['data']);
			} else {
				$next_order_data = array();
			}
			
			$data['order_id'] = $this->request->get['order_id'];
			
			if (!empty($next_order['shipment_number'])) {
				$data['shipment_number'] = $next_order['shipment_number'];
			} else {
				$data['shipment_number'] = '';
			}
			
			if (!empty($this->request->post['name'])) {
				$data['name'] = $this->request->post['name'];
			} else if (!empty($next_order['name'])) {
				$data['name'] = $next_order['name'];
			} else if (!empty($order['shipping_firstname'])) {
				$data['name'] = $order['shipping_firstname'];
				
				if (!empty($order['shipping_lastname'])) {
					$data['name'] .= ' ' . $order['shipping_lastname'];
				}
			} else {
				$data['name'] = '';
			}
			
			if (!empty($this->request->post['phone'])) {
				$data['phone'] = $this->request->post['phone'];
			} else if (!empty($next_order['phone'])) {
				$data['phone'] = $next_order['phone'];
			} else if (!empty($order['telephone'])) {
				$data['phone'] = $order['telephone'];
			} else {
				$data['phone'] = '';
			}
			
			if (!empty($this->request->post['email'])) {
				$data['email'] = $this->request->post['email'];
			} else if (!empty($next_order['email'])) {
				$data['email'] = $next_order['email'];
			} else if (!empty($order['email'])) {
				$data['email'] = $order['email'];
			} else {
				$data['email'] = '';
			}
			
			if (isset($this->request->post['country']) && $this->request->post['country']) {
				$data['country'] = $this->request->post['country'];
			} else if (!empty($next_order['country'])) {
				$data['country'] = $next_order['country'];
			} else {
				$data['country'] = 'България';
			}
			
			if (isset($this->request->post['country_iso']) && $this->request->post['country_iso']) {
				$data['country_iso'] = $this->request->post['country_iso'];
			} else if (!empty($next_order['country_iso'])) {
				$data['country_iso'] = $next_order['country_iso'];
			} else {
				$data['country_iso'] = 'BG';
			}
			
			if (isset($this->request->post['courier']) && $this->request->post['courier']) {
				$data['courier'] = $this->request->post['courier'];
			} else if (!empty($next_order['courier'])) {
				$data['courier'] = $next_order['courier'];
			} else {
				$data['courier'] = 'IMP';
			}
			
			if (isset($this->request->post['courier_id']) && $this->request->post['courier_id']) {
				$data['courier_id'] = $this->request->post['courier_id'];
			} else if (!empty($next_order['courier_id'])) {
				$data['courier_id'] = $next_order['courier_id'];
			} else {
				$data['courier_id'] = 4;
			}
			
			if (isset($this->request->post['shipping_to']) && $this->request->post['shipping_to']) {
				$data['shipping_to'] = $this->request->post['shipping_to'];
			} else if (!empty($next_order['shipping_to'])) {
				$data['shipping_to'] = $next_order['shipping_to'];
			} else {
				$data['shipping_to'] = '';
			}
			
			if (isset($this->request->post['postcode']) && $this->request->post['postcode']) {
				$data['postcode'] = $this->request->post['postcode'];
			} else if (!empty($next_order['postcode'])) {
				$data['postcode'] = $next_order['postcode'];
			} else if (!empty($order['shipping_postcode'])) {
				$data['postcode'] = $order['shipping_postcode'];
			} else {
				$data['postcode'] = '';
			}
			
			if (isset($this->request->post['city']) && $this->request->post['city']) {
				$data['city'] = $this->request->post['city'];
			} else if (!empty($next_order['city'])) {
				$data['city'] = $next_order['city'];
			} else {
				$data['city'] = '';
			}
			
			if (isset($this->request->post['quarter']) && $this->request->post['quarter']) {
				$data['quarter'] = $this->request->post['quarter'];
			} else if (!empty($next_order['quarter'])) {
				$data['quarter'] = $next_order['quarter'];
			} else {
				$data['quarter'] = '';
			}
			
			if (isset($this->request->post['street']) && $this->request->post['street']) {
				$data['street'] = $this->request->post['street'];
			} else if (!empty($next_order['street'])) {
				$data['street'] = $next_order['street'];
			} else {
				$data['street'] = '';
			}
			
			if (isset($this->request->post['street_num']) && $this->request->post['street_num']) {
				$data['street_num'] = $this->request->post['street_num'];
			} else if (!empty($next_order['street_num'])) {
				$data['street_num'] = $next_order['street_num'];
			} else {
				$data['street_num'] = '';
			}
			
			if (isset($this->request->post['block']) && $this->request->post['block']) {
				$data['block'] = $this->request->post['block'];
			} else if (!empty($next_order['block'])) {
				$data['block'] = $next_order['block'];
			} else {
				$data['block'] = '';
			}
			
			if (isset($this->request->post['entrance']) && $this->request->post['entrance']) {
				$data['entrance'] = $this->request->post['entrance'];
			} else if (!empty($next_order['entrance'])) {
				$data['entrance'] = $next_order['entrance'];
			} else {
				$data['entrance'] = '';
			}
			
			if (isset($this->request->post['floor']) && $this->request->post['floor']) {
				$data['floor'] = $this->request->post['floor'];
			} else if (!empty($next_order['floor'])) {
				$data['floor'] = $next_order['floor'];
			} else {
				$data['floor'] = '';
			}
			
			if (isset($this->request->post['apartment']) && $this->request->post['apartment']) {
				$data['apartment'] = $this->request->post['apartment'];
			} else if (!empty($next_order['apartment'])) {
				$data['apartment'] = $next_order['apartment'];
			} else {
				$data['apartment'] = '';
			}
			
			if (isset($this->request->post['other']) && $this->request->post['other']) {
				$data['other'] = $this->request->post['other'];
			} else if (!empty($next_order['other'])) {
				$data['other'] = $next_order['other'];
			} else {
				$data['other'] = '';
			}
			
			if (isset($this->request->post['office_id']) && $this->request->post['office_id']) {
				$data['office_id'] = $this->request->post['office_id'];
			} else if (!empty($next_order['office_id'])) {
				$data['office_id'] = $next_order['office_id'];
			} else {
				$data['office_id'] = '';
			}
			
			if (isset($this->request->post['office_code']) && $this->request->post['office_code']) {
				$data['office_code'] = $this->request->post['office_code'];
			} else if (!empty($next_order['office_code'])) {
				$data['office_code'] = $next_order['office_code'];
			} else {
				$data['office_code'] = '';
			}
			
			if (isset($this->request->post['office_name']) && $this->request->post['office_name']) {
				$data['office_name'] = $this->request->post['office_name'];
			} else if (!empty($next_order['office_name'])) {
				$data['office_name'] = $next_order['office_name'];
			} else {
				$data['office_name'] = '';
			}
			
			if (isset($this->request->post['office_address']) && $this->request->post['office_address']) {
				$data['office_address'] = $this->request->post['office_address'];
			} else if (!empty($next_order['office_address'])) {
				$data['office_address'] = $next_order['office_address'];
			} else {
				$data['office_address'] = '';
			}
			
			// настройки
			$next_setting = $this->model_setting_setting->getSetting('shipping_tk_next');
			$next_country = $next_setting['shipping_tk_next_countries'][$data['country_iso']];
			
			// куриери спрямо държавата
			$data['couriers'] = $next_country['couriers'];
			
			// тегло
			if (isset($this->request->post['weight'])) {
				$data['weight'] = $this->request->post['weight'];
			} else if (isset($next_order_data['weight'])) {
				$data['weight'] = $next_order_data['weight'];
			} else {
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
					
					if ($product_weight[$product['product_id']] == 0 && $this->config->get('shipping_tk_next_weight_total') && $this->config->get('shipping_tk_next_weight_total') > 0) {
						$product_weight[$product['product_id']] = $this->config->get('shipping_tk_next_weight_total');
					}
					
					$product_weight[$product['product_id']] = $product_weight[$product['product_id']] * $product['quantity'];
				}
				
				$totalWeight = 0;
				foreach ($product_weight as $product_wt) {
					$totalWeight += $product_wt;
				}
				
				if ($this->config->get('shipping_tk_next_weight_type') && $this->config->get('shipping_tk_next_weight_type') == 'gram') {
					$totalWeight = $totalWeight / 1000;
				}
				
				if ($totalWeight < 0.01) {
					$totalWeight = 0.01;
				}
				
				$data['weight'] = $totalWeight;
			}
			
			// брой пакети
			if (isset($this->request->post['parcels_count'])) {
				$data['parcels_count'] = $this->request->post['parcels_count'];
			} else if (isset($next_order_data['parcels_count'])) {
				$data['parcels_count'] = $next_order_data['parcels_count'];
			} else {
				if ($data['weight'] >= 32) {
					$data['parcels_count'] = ceil($data['weight'] / 32);
				} else {
					$data['parcels_count'] = 1;
				}
			}
			
			// метод на плащане
			if (isset($this->request->post['payment_code']) && $this->request->post['payment_code']) {
				$data['payment_code'] = $this->request->post['payment_code'];
			} else if (!empty($next_order['payment_code']) && $next_order['payment_code'] == 'cod') {
				$data['payment_code'] = 'cod';
			} else {
				$data['payment_code'] = 'prepaid';
			}
			
			// платец на куриерската услуга
			if (isset($this->request->post['payer']) && $this->request->post['payer']) {
				$data['payer'] = $this->request->post['payer'];
			} else if (!empty($next_order_data['payer'])) {
				$data['payer'] = $next_order_data['payer'];
			} else if (!empty($next_country['couriers'][$data['courier_id']]['payer'])) {
				$data['payer'] = $next_country['couriers'][$data['courier_id']]['payer'];
			} else {
				$data['payer'] = 'receiver';
			}
			
			// сума
			if (isset($this->request->post['total']) && $this->request->post['total']) {
				$data['total'] = $this->request->post['total'];
			} else {
				
				$totalPrice = 0;
				$totalShipping = 0;
				
				$order_totals = $this->model_extension_module_tk_checkout->getOrderTotals($this->request->get['order_id']);
				if (!empty($order_totals)) {
					
					$not_shipping_total = array(
						'shipping',
						'total',
						'total_tk_special_shipping'
					);
					
					$only_shipping = array('shipping');
					
					foreach ($order_totals as $order_total) {
						
						if (!empty($next_country['couriers'][$data['courier_id']]['totals'])) {
							if (in_array($order_total['code'], $next_country['couriers'][$data['courier_id']]['totals']) && $order_total != 'total_tk_special_shipping') {
								$totalPrice += $order_total['value'];
							}
						} else {
							if (!in_array($order_total['code'], $not_shipping_total)) {
								$totalPrice += $order_total['value'];
							}
						}
						
						if (in_array($order_total['code'], $only_shipping) && isset($next_country['couriers'][$data['courier_id']]['totals']) && !in_array($order_total['code'], $next_country['couriers'][$data['courier_id']]['totals'])) {
							$totalShipping += $order_total['value'];
						}
					}
				}
				
				if ($data['payment_code'] == 'prepaid' || $data['payer'] == 'sender') {
					$totalPrice = $totalPrice + $totalShipping;
				}
				
				$data['total'] = round($totalPrice, 2);
			}
			
			//обявена стойност
			if (isset($this->request->post['declared_value'])) {
				$data['declared_value'] = $this->request->post['declared_value'];
			} else if (isset($next_order_data['declared_value'])) {
				$data['declared_value'] = $next_order_data['declared_value'];
			} else if (!empty($next_country['couriers'][$data['courier_id']]['declared_value'])) {
				$data['declared_value'] = $next_country['couriers'][$data['courier_id']]['declared_value'];
			} else {
				$data['declared_value'] = 0;
			}
			
			if (isset($this->request->post['declared_total'])) {
				$data['declared_total'] = $this->request->post['declared_total'];
			} else if (isset($next_order_data['declared_total'])) {
				$data['declared_total'] = $next_order_data['declared_total'];
			} else {
				$data['declared_total'] = $data['total'];
			}
			
			// услуги преди предаване
			if (isset($this->request->post['option'])) {
				$data['option'] = $this->request->post['option'];
			} else if (isset($next_order_data['option'])) {
				$data['option'] = $next_order_data['option'];
			} else if (!empty($next_country['couriers'][$data['courier_id']]['option'])) {
				$data['option'] = $next_country['couriers'][$data['courier_id']]['option'];
			} else {
				$data['option'] = 0;
			}
			
			// платец на услуга за връщане
			if (isset($this->request->post['return_shipment_payer'])) {
				$data['return_shipment_payer'] = $this->request->post['return_shipment_payer'];
			} else if (isset($next_order_data['return_shipment_payer'])) {
				$data['return_shipment_payer'] = $next_order_data['return_shipment_payer'];
			} else if (!empty($next_country['couriers'][$data['courier_id']]['return_shipment_payer'])) {
				$data['return_shipment_payer'] = $next_country['couriers'][$data['courier_id']]['return_shipment_payer'];
			} else {
				$data['return_shipment_payer'] = 'SENDER';
			}
			
			// чупливо
			if (isset($this->request->post['fragile'])) {
				$data['fragile'] = $this->request->post['fragile'];
			} else if (isset($next_order_data['fragile'])) {
				$data['fragile'] = $next_order_data['fragile'];
			} else if (!empty($next_country['couriers'][$data['courier_id']]['fragile'])) {
				$data['fragile'] = $next_country['couriers'][$data['courier_id']]['fragile'];
			} else {
				$data['fragile'] = 0;
			}
			
			// доставка в събота
			if (isset($this->request->post['sd'])) {
				$data['sd'] = $this->request->post['sd'];
			} else if (isset($next_order_data['sd'])) {
				$data['sd'] = $next_order_data['sd'];
			} else {
				$data['sd'] = 0;
			}
			
			$data['currency'] = $next_country['currency'];
			
			// вид опаковка
			$data['packages'] = array(
				'BOX',
				'PACK',
				'PALLET',
				'LETTER'
			);
			if (isset($this->request->post['package'])) {
				$data['package'] = $this->request->post['package'];
			} else if (isset($next_order_data['package'])) {
				$data['package'] = $next_order_data['package'];
			} else {
				$data['package'] = 'BOX';
			}
			
			// името на продукта, модел и опция
			$product_name = '';
			if (isset($next_country['couriers'][$data['courier_id']]['product_name']) && $next_country['couriers'][$data['courier_id']]['product_name'] != 'none') {
				foreach ($order_products as $product) {
					$product_name .= $product['name'] . ' - ' . $product['quantity'] . ' qt. (' . $product['model'] . ')';
					
					$order_options = $this->model_extension_module_tk_checkout->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
					if ($order_options) {
						$product_name .= '| ';
						
						foreach ($order_options as $order_option) {
							$product_name .= $order_option['value'] . ' | ';
						}
					}
					$product_name .= ' / ';
				}
			}
			
			// contents - описание
			$data['contents'] = '';
			if (isset($this->request->post['contents'])) {
				$data['contents'] .= $this->request->post['contents'];
			} else if (isset($next_order_data['contents'])) {
				$data['contents'] .= $next_order_data['contents'];
			} else {
				if (!empty($next_country['couriers'][$data['courier_id']]['shipment_description'])) {
					$data['contents'] .= $next_country['couriers'][$data['courier_id']]['shipment_description'] . ' ' . $this->request->get['order_id'];
				}
				
				if (isset($next_country['couriers'][$data['courier_id']]['product_name']) && $next_country['couriers'][$data['courier_id']]['product_name'] == 'contents') {
					$data['contents'] .= $product_name;
				}
			}
			
			// ref - коментар към клиента
			$data['ref'] = '';
			if (isset($this->request->post['ref'])) {
				$data['ref'] .= $this->request->post['ref'];
			} else if (isset($next_order_data['contents'])) {
				$data['ref'] .= $next_order_data['ref'];
			} else {
				if (isset($next_country['couriers'][$data['courier_id']]['product_name']) && $next_country['couriers'][$data['courier_id']]['product_name'] == 'ref') {
					$data['ref'] .= $product_name;
				}
			}
			
			$data['next_offices_cities'] = array();
			$next_offices_cities = $this->model_extension_shipping_tk_next->getCities($data['country_iso'], $data['courier'], 'office');
			if ($next_offices_cities) {
				foreach ($next_offices_cities as $next_city) {
					$data['next_offices_cities'][] = array(
						'city_id'   => $next_city['id'],
						'postcode'  => $next_city['post_code'],
						'region'    => $next_city['region'],
						'city_name' => strip_tags(html_entity_decode($next_city['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
			
			$data['next_offices'] = array();
			if ($data['postcode']) {
				$next_offices = $this->model_extension_shipping_tk_next->getOffices($data['country_iso'], $data['courier'], $data['postcode'], 'office');
				
				if ($next_offices) {
					foreach ($next_offices as $next_office) {
						$data['next_offices'][] = array(
							'office_id'      => $next_office['id'],
							'office_code'    => $next_office['office_id'],
							'office_name'    => strip_tags(html_entity_decode($next_office['name'], ENT_QUOTES, 'UTF-8')),
							'office_address' => strip_tags(html_entity_decode($next_office['address'], ENT_QUOTES, 'UTF-8')),
							'is_machine'     => $next_office['is_machine'],
						);
					}
				}
			}
			
			$data['next_cities'] = array();
			$next_cities = $this->model_extension_shipping_tk_next->getCities($data['country_iso'], $data['courier']);
			if ($next_cities) {
				foreach ($next_cities as $next_city) {
					$data['next_cities'][] = array(
						'city_id'   => $next_city['id'],
						'postcode'  => $next_city['post_code'],
						'region'    => $next_city['region'],
						'city_name' => strip_tags(html_entity_decode($next_city['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
			
			$data['next_streets'] = array();
			if ($data['postcode']) {
				$next_streets = $this->model_extension_shipping_tk_next->getStreets($data['country_iso'], $data['postcode']);
				
				if ($next_streets) {
					foreach ($next_streets as $next_street) {
						$data['next_streets'][] = array(
							'street_id'   => $next_street['id'],
							'street_name' => strip_tags(html_entity_decode($next_street['name'], ENT_QUOTES, 'UTF-8'))
						);
					}
				}
			}
			
			// генерираме товарителница
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				
				// подател
				$shipment_data['sender'] = array(
					"id"        => $this->config->get('shipping_tk_next_sender_id'),
					"office_id" => 1
				);
				
				// получател
				$shipment_data['receiver'] = array(
					'name'      => $data['name'],
					'phone'     => $data['phone'],
					'country'   => $data['country_iso'],
					'post_code' => $data['postcode'],
					'place'     => $data['city']
				);
				
				if (!empty($data['email'])) {
					$shipment_data['receiver']['email'] = $data['email'];
				}
				
				if (!empty($data['office_id'])) {
					$shipment_data['receiver']['office_id'] = $data['office_id'];
				} else {
					if (!empty($data['street'])) {
						$shipment_data['receiver']['street'] = $data['street'];
					}
					
					if (!empty($data['street_no'])) {
						$shipment_data['receiver']['street_no'] = $data['street_no'];
					}
					
					if (!empty($data['quarter'])) {
						$shipment_data['receiver']['complex'] = $data['quarter'];
					}
					
					if (!empty($data['block'])) {
						$shipment_data['receiver']['block_no'] = $data['block'];
					}
					
					if (!empty($data['entrance'])) {
						$shipment_data['receiver']['entrance_no'] = $data['entrance'];
					}
					
					if (!empty($data['floor'])) {
						$shipment_data['receiver']['floor_no'] = $data['floor'];
					}
					
					if (!empty($data['apartment'])) {
						$shipment_data['receiver']['apartment_no'] = $data['apartment'];
					}
				}
				
				if (!empty($data['other'])) {
					$shipment_data['receiver']['other'] = $data['other'];
				}
				
				// съдържание
				$shipment_data['content'] = array(
					'parcels_count' => $data['parcels_count'],
					'weight'        => $data['weight'],
					'contents'      => $data['contents'],
					'package'       => $data['package']
				);
				
				// плащане на доставката
				$shipment_data['payment'] = array(
					'payer' => $data['payer']
				);
				
				// наложено плащане
				if ($data['payment_code'] == 'cod') {
					$shipment_data['services']['cod'] = array(
						'amount'          => $data['total'],
						'currency'        => $data['currency'],
						'processing_type' => 'BANK'
					);
					
					if (!empty($next_country['couriers'][$data['courier_id']]['included_shipping_price'])) {
						$shipment_data['services']['cod']['included_shipping_price'] = 1;
					} else {
						$shipment_data['services']['cod']['included_shipping_price'] = 0;
					}
				}
				
				// обявена сотйност
				if ($data['declared_value']) {
					$shipment_data['services']['dv'] = array(
						'amount'   => $data['declared_total'],
						'currency' => $data['currency']
					);
				}
				
				// опции преди предаване
				if ($data['option']) {
					$shipment_data['services']['obpd'] = array(
						'option'                => $data['option'],
						'return_shipment_payer' => $data['return_shipment_payer']
					);
				}
				
				// чупливо
				if ($data['fragile']) {
					$shipment_data['services']['fragile'] = true;
				}
				
				// доставка в събота
				if ($data['sd']) {
					$shipment_data['services']['sd'] = true;
				}
				
				// допълнителни инструкции към клиента
				if (!empty($data['ref'])) {
					$shipment_data['ref'] = $data['ref'];
				}
				
				$shipment_data['courier'] = $data['courier'];
				
				// генерираме товарителница
				$shipment = $this->model_extension_shipping_tk_next->create($shipment_data);
				
				if (isset($shipment['message']) && $shipment['message']) {
					$data['error_warning'] = $shipment['message'];
				} else if (isset($shipment['awb'])) {
					
					$shipment_number = $shipment['awb'];
					
					// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
					if ($this->config->get('shipping_tk_next_order_status_id')) {
						
						$api_token = $this->model_extension_module_tk_checkout->getApiToken();
						
						if ($api_token) {
							if ($this->config->get('shipping_tk_next_order_status_id_mail')) {
								$notify = true;
								$shipment['mail_send'] = $shipment['status_id'];
							} else {
								$notify = false;
							}
							
							if ($this->config->get('shipping_tk_next_order_status_id_mail_text')) {
								$patterns = array();
								$patterns[0] = '{shipment_number}';
								
								$replacements = array();
								$replacements[0] = $shipment_number;
								
								$comment = str_replace($patterns, $replacements, $this->config->get('shipping_tk_next_order_status_id_mail_text'));
							} else {
								$comment = 'Номер на пратка: ' . $shipment_number;
							}
							
							$history_data = array(
								'order_status_id' => $this->config->get('shipping_tk_next_order_status_id'),
								'notify'          => $notify,
								'comment'         => $comment
							);
							
							$this->model_extension_module_tk_checkout->addOrderHistory($this->request->get['order_id'], $api_token, $history_data);
						}
					}
				}
				
				// обновяваме данните
				$this->model_extension_shipping_tk_next->updateOrder($this->request->post, $this->request->get['order_id'], $shipment);
				
				if (isset($shipment['awb'])) {
					$this->response->redirect($this->url->link('sale/order/info', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
				}
			}
		} else {
			$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'], true));
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('sale/tk_next', $data));
	}
	
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
	
	public function parcel() {
		
		$this->load->model('extension/shipping/tk_next');
		
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
		
		if (isset($this->request->get['order_id']) && $this->request->get['order_id'] && isset($this->request->get['parcel_id']) && $this->request->get['parcel_id']) {
			
			$shipment = $this->model_extension_shipping_tk_next->createPDF($this->request->get['parcel_id']);
			
			if (isset($shipment['message']) && $shipment['message']) {
				$this->session->data['error'] = $shipment['message'];
				$this->error['warning'] = $shipment['message'];
				
				$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true));
			} else {
				header('Content-Type: application/pdf');
				echo $shipment;
				exit;
			}
		} else {
			$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}
	}
	
	public function trace($order_id) {
		
		$this->load->language('extension/shipping/tk_next');
		
		$this->load->model('extension/shipping/tk_next');
		$this->load->model('extension/module/tk_checkout');
		
		$next_order = $this->model_extension_shipping_tk_next->getOrder($order_id);
		
		$shipment_number = $next_order['shipment_number'];
		$shipment_status_old = $next_order['shipment_status'];
		
		$shipment = $this->model_extension_shipping_tk_next->track(array($shipment_number));
		if (isset($shipment[0])) {
			$shipment = $shipment[0];
			
			if (isset($shipment['message']) && $shipment['message']) {
				$this->session->data['error'] = $shipment['message'];
				$this->error['warning'] = $shipment['message'];
			} else if (isset($shipment['awb'])) {
				
				// искаме ли да сменим статуса
				$tk_next_order_status = $this->config->get('shipping_tk_next_order_status');
				$tk_next_order_status_mail = $this->config->get('shipping_tk_next_order_status_mail');
				$tk_next_order_status_mail_text = $this->config->get('shipping_tk_next_order_status_mail_text');
				
				if (isset($tk_next_order_status[$shipment['status_id']])) {
					$order_status_id = $tk_next_order_status[$shipment['status_id']];
				}
				
				// превод на статуси
				$text_label_status = $this->language->get('text_label_status');
				if (isset($text_label_status[$shipment['status_id']])) {
					$shipment['status'] = $text_label_status[$shipment['status_id']];
				}
				
				// ако товарителницата е анулира изчистваме номера и
				if ($shipment['status_id'] == 12) {
					$shipment['awb'] = '';
				}
				
				if (isset($order_status_id) && $order_status_id > 0 && $shipment['status_id'] != $shipment_status_old) {
					if ($this->config->get('shipping_tk_next_order_status')) {
						$api_token = $this->model_extension_module_tk_checkout->getApiToken();
					} else {
						$api_token = '';
					}
					
					if ($api_token) {
						$order_status_mail = $tk_next_order_status_mail[$shipment['status_id']];
						
						if (isset($order_status_mail) && $order_status_mail > 0) {
							$shipment['mail_send'] = $shipment['status_id'];
							$notify = true;
						} else {
							$notify = false;
						}
						
						$order_status_mail_text = $tk_next_order_status_mail_text[$shipment['status_id']];
						if (!isset($order_status_mail_text) || !$order_status_mail_text) {
							$comment = 'Номер на пратка: ' . $shipment_number;
						} else {
							
							$patterns = array();
							$patterns[0] = '{shipment_number}';
							
							$replacements = array();
							$replacements[0] = $shipment_number;
							
							$comment = str_replace($patterns, $replacements, $order_status_mail_text);
						}
						
						$history_data = array(
							'order_status_id' => $order_status_id,
							'notify'          => $notify,
							'comment'         => $comment
						);
						
						$this->model_extension_module_tk_checkout->addOrderHistory($order_id, $api_token, $history_data);
					}
				}
			}
			
			// обновяваме данните
			$this->model_extension_shipping_tk_next->updateOrder($next_order, $order_id, $shipment);
		}
		
		$response_data['success'] = true;
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
	public function cancel() {
		
		$this->load->language('extension/shipping/tk_next');
		
		$this->load->model('extension/shipping/tk_next');
		
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
		
		if (isset($this->request->get['order_id']) && $this->request->get['order_id'] && isset($this->request->get['parcel_id']) && $this->request->get['parcel_id']) {
			
			$shipment = $this->model_extension_shipping_tk_next->cancel($this->request->get['parcel_id']);
			
			if (isset($shipment['message']) && $shipment['message']) {
				$this->session->data['error'] = $shipment['message'];
				$this->error['warning'] = $shipment['message'];
			} else {
				$this->trace($this->request->get['order_id']);
			}
		}
		
		$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true));
	}
	
	public function update() {

		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->language->load('extension/shipping/tk_next');
		
		$this->load->model('extension/shipping/tk_next');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings_limit = 10;
		
		if (!empty($this->request->post['count'])) {
			
			if ($this->request->post['count'] == 1 && empty($this->session->data['tk_next_loadings']['total'])) {
				
				$this->cache->set('tk_next_loadings_count', $this->request->post['count']);
				
				$this->session->data['tk_next_loadings']['page'] = 1;
				$this->session->data['tk_next_loadings']['start'] = 0;
				$this->session->data['tk_next_loadings']['end'] = 10;
				
				$this->cache->delete('tk_next_loadings');
				
				$loadings = $this->model_extension_shipping_tk_next->getNotDelivered();
				
				$this->session->data['tk_next_loadings']['total'] = count($loadings);
				
				$this->cache->set('tk_next_loadings', $loadings);
			} else {
				$this->session->data['tk_next_loadings']['page'] = $this->request->post['count'];
				$loadings = $this->cache->get('tk_next_loadings');
			}
			
			if ($loadings) {
				
				$loadings_item = array_slice($loadings, 0, $loadings_limit);
				
				foreach ($loadings_item as $loading) {
					
					$this->trace($loading['order_id']);
				}
				
				array_splice($loadings, 0, $loadings_limit);
				
				$this->cache->delete('tk_next_loadings');
				$this->cache->set('tk_next_loadings', $loadings);
			}
			
			$page_count = $this->cache->get('tk_next_loadings_count');
			if (!$page_count || $page_count < 1) {
				$page_count = $this->request->post['count'];
			}
			
			$pages = ceil($this->session->data['tk_next_loadings']['total'] / $loadings_limit);
			
			if (!empty($page_count) && $page_count > $pages) {
				
				unset($this->session->data['tk_next_loadings']);
				
				$this->cache->delete('tk_next_loadings_count');
				$this->cache->delete('tk_next_loadings');
				
				$this->session->data['success'] = 'Товарителниците са опреснени';
				
				$data['redirect'] = true;
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($data, JSON_UNESCAPED_UNICODE));
			} else {
				$this->cache->delete('tk_next_loadings_count');
				
				$this->session->data['tk_next_loadings']['page']++;
				$this->session->data['tk_next_loadings']['pages'] = $pages;
				
				$this->session->data['tk_next_loadings']['start'] = $this->session->data['tk_next_loadings']['start'] + $loadings_limit;
				$this->session->data['tk_next_loadings']['end'] = $this->session->data['tk_next_loadings']['end'] + $loadings_limit;
				
				$page_count++;
				$this->session->data['tk_next_loadings']['count'] = $page_count;
				
				$this->cache->set('tk_next_loadings_count', $page_count);
				
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($this->session->data['tk_next_loadings'], JSON_UNESCAPED_UNICODE));
			}
		}
	}
	
	protected function validate() {
		
		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 100)) {
			$this->error['name'] = $this->language->get('error_txt_name');
		}
		
		if ((utf8_strlen($this->request->post['phone']) < 3) || (utf8_strlen($this->request->post['phone']) > 100)) {
			$this->error['phone'] = $this->language->get('error_txt_phone');
		}
		
		if ((utf8_strlen($this->request->post['weight']) <= 0)) {
			$this->error['weight'] = $this->language->get('error_txt_weight');
		}
		
		if ((utf8_strlen($this->request->post['contents']) <= 0)) {
			$this->error['contents'] = $this->language->get('error_txt_contents');
		}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_txt_warning');
		}
		
		return !$this->error;
	}
}