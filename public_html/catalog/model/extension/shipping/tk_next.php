<?php

class ModelExtensionShippingTkNext extends Model {
	
	public function getQuote($address) {
		
		$this->load->language('extension/shipping/tk_next');
		$this->load->model('extension/module/tk_checkout');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_tk_next_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
		if (!$this->config->get('shipping_tk_next_geo_zone_id')) {
			$status = true;
		} else if ($this->config->get('shipping_tk_next_status')) {
			$status = true;
		} else if ($this->config->get('module_tk_checkout_token')) {
			$status = true;
		} else if ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
		
		if (!empty($address['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($address['country_id']);
		} else if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$address['country_id'] = $this->session->data['tk_checkout']['country_id'];
			$country = $this->model_extension_module_tk_checkout->getCountryById($address['country_id']);
		} else {
			$country = $this->model_extension_module_tk_checkout->getCountryByIso2('BG');
			$address['country_id'] = $country['country_id'];
		}
		
		if (!empty($country['iso_code_2'])) {
			$address['country_iso'] = $country['iso_code_2'];
		} else {
			$address['country_iso'] = 'BG';
		}
		
		$this->load->model('setting/setting');
		$next_setting = $this->model_setting_setting->getSetting('shipping_tk_next');
		
		$next_country = $next_setting['shipping_tk_next_countries'][$address['country_iso']];
		
		$method_data = array();
		
		if ($status && !empty($next_country['status']) && $this->config->get('total_shipping_status')) {
			$quote_data = array();
			
			// платежен метод
			if (!empty($address['payment_method'])) {
				$payment_method = $address['payment_method'];
			} else if (!empty($this->session->data['payment_method']['code'])) {
				$payment_method = $this->session->data['payment_method']['code'];
			} else if (!empty($this->session->data['tk_checkout']['payment_method']['code'])) {
				$payment_method = $this->session->data['tk_checkout']['payment_method']['code'];
			} else {
				if ($this->config->get('payment_bank_transfer_sort_order') && $this->config->get('payment_cod_sort_order') && $this->config->get('payment_cod_sort_order') > $this->config->get('payment_bank_transfer_sort_order')) {
					$payment_method = 'bank_transfer';
				} else {
					$payment_method = 'cod';
				}
			}
			
			// адрес за доставка
			if (empty($address['city']) && !empty($this->session->data['tk_checkout']['next']['next_address_city'])) {
				$address['city'] = $this->session->data['tk_checkout']['next']['next_address_city'];
			}
			
			if (empty($address['postcode']) && !empty($this->session->data['tk_checkout']['next']['next_address_postcode'])) {
				$address['postcode'] = $this->session->data['tk_checkout']['next']['next_address_postcode'];
			}
			if (empty($address['office_id']) && !empty($this->session->data['tk_checkout']['next']['next_office_office_id'])) {
				$address['office_id'] = $this->session->data['tk_checkout']['next']['next_office_office_id'];
			}
			
			// текуща валута на магазина
			if (isset($this->session->data['currency'])) {
				$currency = $this->session->data['currency'];
			} else {
				$currency = $this->config->get('config_currency');
			}
			
			// да се провери
			if (!empty($address['shipping_method'])) {
				$shipping = explode('.', $address['shipping_method']);
				if (isset($shipping[1]) && isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) $this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
			}
			
			$count_sort = 10;
			foreach ($next_country['couriers'] as $courier) {
				if (!empty($courier['status'])) {
					
					// тегло на количката
					if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
						$weight = $this->cart->getWeight();
					} else if (!empty($courier['weight_total']) && $courier['weight_total'] > 0) {
						$weight = $courier['weight_total'] * $this->cart->countProducts();
					} else {
						$weight = 1 * $this->cart->countProducts();
					}
					
					if (!empty($courier['weight_type']) && $courier['weight_type'] == 'gram') {
						$weight = $weight / 1000;
					}
					
					if ($weight < 0.01) {
						$weight = 0.01;
					}
					
					// сума на количката
					if (!empty($courier['totals'])) {
						$total = $this->model_extension_module_tk_checkout->getSelectedTotals($courier['totals']);
					} else {
						$total = $this->model_extension_module_tk_checkout->getSubAndTax();
					}
					
					if (!empty($courier['machine']['status'])) {
						
						// ако теглото е над допустимото
						if (!empty($courier['machine']['weight']) && $courier['machine']['weight'] < $weight) {
							continue;
						}
						
						// подредба
						if (!empty($courier['machine']['sort']) && $courier['machine']['sort'] > 0) {
							$machine_sort = $courier['machine']['sort'];
						} else {
							$machine_sort = $count_sort + 1;
						}
						
						// заглавие
						if (!empty($courier['machine']['title'][$this->session->data['language']])) {
							$machine_title = $courier['machine']['title'][$this->session->data['language']];
						} else {
							$machine_title = $courier['name'] . ' - ' . $this->language->get('text_machine');
						}
						
						// допълнителен текст
						if (!empty($courier['machine']['text'][$this->session->data['language']])) {
							$machine_text = $courier['machine']['text'][$this->session->data['language']];
						} else {
							$machine_text = '';
						}
						
						// цена
						$price = $this->getPrices('machine', $courier, $address, $weight, $total, $payment_method, $next_country, $currency);
						
						if (isset($price['total'])) {
							
							$price_machine_text = $this->currency->format($price['total'], $currency);
							
							//пресмятане на ДДС
							if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_next_tax_class_id') && $price['total'] > 0) {
								$rate = array_values($this->tax->getRates($price['total'], $this->config->get('shipping_tk_next_tax_class_id')));
								$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
								
								if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
									$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
								}
							}
							
							$quote_data[$machine_sort][$address['country_iso'] . '_' . $courier['id'] . '_machine'] = array(
								'code'         => 'tk_next.' . $address['country_iso'] . '_' . $courier['id'] . '_machine',
								'name'         => strtolower($courier['name']),
								'title'        => $machine_title,
								'description'  => $machine_text,
								'cost'         => $this->tax->calculate($price['total'], $this->config->get('shipping_tk_next_tax_class_id'), $this->config->get('config_tax')),
								'tax_class_id' => $this->config->get('shipping_tk_next_tax_class_id'),
								'text'         => '<span id="service_' . $address['country_iso'] . '_' . $courier['id'] . '_machine_price">' . $price_machine_text . '</span>'
							);
						}
					}
					
					if (!empty($courier['office']['status'])) {
						
						// ако теглото е над допустимото
						if (!empty($courier['office']['weight']) && $courier['office']['weight'] < $weight) {
							continue;
						}
						
						// подредба
						if (!empty($courier['office']['sort']) && $courier['office']['sort'] > 0) {
							$office_sort = $courier['office']['sort'];
						} else {
							$office_sort = $count_sort + 1;
						}
						
						// заглавие
						if (!empty($courier['office']['title'][$this->session->data['language']])) {
							$office_title = $courier['office']['title'][$this->session->data['language']];
						} else {
							$office_title = $courier['name'] . ' - ' . $this->language->get('text_office');
						}
						
						// допълнителен текст
						if (!empty($courier['office']['text'][$this->session->data['language']])) {
							$office_text = $courier['office']['text'][$this->session->data['language']];
						} else {
							$office_text = '';
						}
						
						// цена
						$price = $this->getPrices('office', $courier, $address, $weight, $total, $payment_method, $next_country, $currency);
						
						if (isset($price['total'])) {
							
							$price_office_text = $this->currency->format($price['total'], $currency);
							
							//пресмятане на ДДС
							if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_next_tax_class_id') && $price['total'] > 0) {
								$rate = array_values($this->tax->getRates($price['total'], $this->config->get('shipping_tk_next_tax_class_id')));
								$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
								
								if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
									$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
								}
							}
							
							$quote_data[$office_sort][$address['country_iso'] . '_' . $courier['id'] . '_office'] = array(
								'code'         => 'tk_next.' . $address['country_iso'] . '_' . $courier['id'] . '_office',
								'name'         => strtolower($courier['name']),
								'title'        => $office_title,
								'description'  => $office_text,
								'cost'         => $this->tax->calculate($price['total'], $this->config->get('shipping_tk_next_tax_class_id'), $this->config->get('config_tax')),
								'tax_class_id' => $this->config->get('shipping_tk_next_tax_class_id'),
								'text'         => '<span id="service_' . $address['country_iso'] . '_' . $courier['id'] . '_office_price">' . $price_office_text . '</span>'
							);
						}
					}
					
					if (!empty($courier['address']['status'])) {
						
						// ако теглото е над допустимото
						if (!empty($courier['address']['weight']) && $courier['address']['weight'] < $weight) {
							continue;
						}
						
						// подредба
						if (!empty($courier['address']['sort']) && $courier['address']['sort'] > 0) {
							$address_sort = $courier['address']['sort'];
						} else {
							$address_sort = $count_sort + 2;
						}
						
						// заглавие
						if (!empty($courier['address']['title'][$this->session->data['language']])) {
							$address_title = $courier['address']['title'][$this->session->data['language']];
						} else {
							$address_title = $courier['name'] . ' - ' . $this->language->get('text_address');
						}
						
						// допълнителен текст
						if (!empty($courier['address']['text'][$this->session->data['language']])) {
							$address_text = $courier['address']['text'][$this->session->data['language']];
						} else {
							$address_text = '';
						}
						
						// цена
						$price = $this->getPrices('address', $courier, $address, $weight, $total, $payment_method, $next_country, $currency);
						
						if (isset($price['total'])) {
							
							$price_address_text = $this->currency->format($price['total'], $currency);
							
							//пресмятане на ДДС
							if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_next_tax_class_id') && $price['total'] > 0) {
								$rate = array_values($this->tax->getRates($price['total'], $this->config->get('shipping_tk_next_tax_class_id')));
								$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
								
								if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
									$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
								}
							}
							
							$quote_data[$address_sort][$address['country_iso'] . '_' . $courier['id'] . '_address'] = array(
								'code'         => 'tk_next.' . $address['country_iso'] . '_' . $courier['id'] . '_address',
								'name'         => strtolower($courier['name']),
								'title'        => $address_title,
								'description'  => $address_text,
								'cost'         => $this->tax->calculate($price['total'], $this->config->get('shipping_tk_next_tax_class_id'), $this->config->get('config_tax')),
								'tax_class_id' => $this->config->get('shipping_tk_next_tax_class_id'),
								'text'         => '<span id="service_' . $address['country_iso'] . '_' . $courier['id'] . '_address_price">' . $price_address_text . '</span>'
							);
						}
					}
				}
				
				$count_sort += 10;
			}
			
			if ($quote_data) {
				ksort($quote_data);
				
				$quote = array();
				foreach ($quote_data as $quotes) {
					foreach ($quotes as $key => $value) {
						$quote[$key] = $value;
					}
				}
				
				$method_data = array(
					'code'       => 'tk_next',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote,
					'sort_order' => $this->config->get('shipping_tk_next_sort_order'),
					'error'      => false
				);
			}
		}
		
		return $method_data;
	}
	
	// ценообразуване
	public function getPrices($type, $courier, $address, $weight, $total, $payment_method, $next_country, $currency) {
		
		$this->load->model('extension/module/tk_checkout');
		
		$data = array();
		
		$result['total'] = 0;
		$result['type'] = $type;
		$result['courier'] = $courier['name'];
		
		// ако е включено автоматичното ценообразуване
		if (!empty($courier[$type]['calculate'])) {
			
			$this->load->library('tknext');
			if (!isset($this->tknext)) {
				$this->tknext = new TkNext($this->registry);
			}
			
			// данни за изпшращача
			$data['sender'] = array(
				"id" => $this->config->get('shipping_tk_next_sender_id')
			);
			
			//държава
			if (!empty($address['country_iso'])) {
				$data['receiver']['country'] = $address['country_iso'];
			} else {
				$data['receiver']['country'] = "BG";
			}
			
			// данни за доставка по подразбиране
			try {
				TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
				$default_address = TkNext::getDefault($data['receiver']['country']);
			} catch (\Exception $e) {
				$this->log->write('NextLevel: ' . $courier['name'] . ' - ' . $type . ' | getDefault');
				$this->log->write($e->getMessage());
			}
			
			// офис или адрес
			if (!empty($default_address)) {
				if ($type == 'machine') {
					if (!empty($address['office_id'])) {
						$data['receiver']['office_id'] = $address['office_id'];
					} else {
						$data['receiver']['office_id'] = $default_address['office_id'];
					}
				} else if ($type == 'office') {
					if (!empty($address['office_id'])) {
						$data['receiver']['office_id'] = $address['office_id'];
					} else {
						$data['receiver']['office_id'] = $default_address['office_id'];
					}
				} else {
					if (!empty($address['city'])) {
						$data['receiver']['place'] = $address['city'];
					} else {
						$data['receiver']['place'] = $default_address['city'];
					}
					
					if (!empty($address['postcode'])) {
						$data['receiver']['post_code'] = $address['postcode'];
					} else {
						$data['receiver']['post_code'] = $default_address['postcode'];
					}
				}
			}
			
			// тегло
			$data['weight'] = $weight;
			
			// наложено плащане
			if ($payment_method == 'cod') {
				$data['services']['cod']['amount'] = $this->currency->convert($total, $currency, $next_country['currency']);
				$data['services']['cod']['currency'] = $next_country['currency'];
				
				$data['services']['cod']['processing_type'] = "CASH";//bank
				
				if (!empty($courier['included_shipping_price'])) {
					$data['services']['cod']['included_shipping_price'] = true;
				} else {
					$data['services']['cod']['included_shipping_price'] = false;
				}
			}
			
			// обявена стойност
			if (!empty($courier['declared_value'])) {
				$data['services']['dv']['amount'] = $this->currency->convert($total, $currency, $next_country['currency']);
				$data['services']['dv']['currency'] = $next_country['currency'];
			}
			
			// преглед и тест
			if (!empty($courier['option'])) {
				$data['services']['obpd']['option'] = $courier['option'];
				
				// платец на товарителницата за връщане
				if (!empty($courier['return_shipment_payer'])) {
					$data['services']['obpd']['return_shipment_payer'] = $courier['return_shipment_payer'];
				}
			}
			
			// чупливо
			if (!empty($courier['fragile'])) {
				$data['services']['fragile'] = true;
			}
			
			try {
				TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
				$result = TkNext::getCalculate($data);
				
				// запис на грешките
				if (!empty($result['message'])) {
					$this->log->write('NextLevel: ' . $courier['name'] . ' - ' . $type . ' | getCalculate');
					$this->log->write($result['message']);
				}
				
				// превалутираме ако валутата не е спрямо BGN
				if (!empty($result['total']) && $result['total'] > 0 && $currency != 'BGN') {
					$result['total'] = $this->currency->convert($result['total'], 'BGN', $currency);
				}
			} catch (\Exception $e) {
				// запис на грешките
				$this->log->write('NextLevel: ' . $courier['name'] . ' - ' . $type . ' | getCalculate');
				$this->log->write($e->getMessage());
			}
		}
		
		// ако автоматичното ценообразуване е забранено или не се извлича сума за доставка
		if (empty($courier[$type]['calculate']) || empty($result['total']) || $result['total'] == 0) {
			
			// цена спрямо тегло
			if (!empty($courier[$type]['weight_price'])) {
				foreach ($courier[$type]['weight_price'] as $weight_price) {
					
					if ((!empty($weight_price['from']) || $weight_price['from'] = 0) && !empty($weight_price['to']) && $weight_price['from'] <= $weight && $weight_price['to'] > $weight) {
						$result['total'] = $weight_price['price'];
					}
				}
			}
			
			// фиксирана цена за доставка
			if (!empty($courier[$type]['fixed_price']) && (!isset($result['total']) || $result['total'] == 0)) {
				$result['total'] = $courier[$type]['fixed_price'];
			}
			
			// превалутираме в текуща валута
			if ($currency != $next_country['currency'] && isset($result['total'])) {
				$result['total'] = $this->currency->convert($result['total'], $next_country['currency'], $currency);
			}
		}
		
		// безплатна достаква спрямо купон
		if (isset($this->session->data['coupon'])) {
			$this->load->model('extension/total/coupon');
			$coupon_info = $this->model_extension_total_coupon->getCoupon($this->session->data['coupon']);
			if (isset($coupon_info['shipping']) && $coupon_info['shipping'] == 1) {
				$result['total'] = 0.00;
			}
		}
		
		// безплатна достаква спрямо TK Special Shipping
		if ($this->config->get('module_tk_special_shipping_status')) {
			$this->load->model('extension/total/tk_special_shipping');
			$tk_special_shipping = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_next.' . strtolower($courier['name']) . '.' . $type);
			if (!empty($result['total']) && $result['total'] > 0 && !empty($tk_special_shipping['total']) && $tk_special_shipping['free'] != 1) {
				
				if ($tk_special_shipping['type'] == 'F' && $tk_special_shipping['discount'] > 0) {
					$discount = $tk_special_shipping['discount'];
				} else {
					$discount = ($tk_special_shipping['discount'] / 100) * $result['total'];
				}
				
				if ($tk_special_shipping['sign'] == '-') {
					$result['total'] = $result['total'] - $discount;
				} else if ($tk_special_shipping['sign'] == '+') {
					$result['total'] = $result['total'] + $discount;
				} else if ($tk_special_shipping['sign'] == '=') {
					$result['total'] = $discount;
				}
			}
		}
		
		// имаме ли тегло отговарящо за безплатна доставка
		$free_weight = true;
		if (!empty($courier[$type]['free_weight']) && $weight >= $courier[$type]['free_weight']) {
			$free_weight = false;
		}
		
		// безплатна доставка
		if ($free_weight && !empty($courier[$type]['free_total']) && $total >= $courier[$type]['free_total']) {
			$result['total'] = 0.00;
		}
		
		return $result;
	}
	
	// показваме темплейти
	public function getNextOffice($data, $courier_data, $office) {
		
		$this->load->language('extension/shipping/tk_next');
		$this->load->language('tk_checkout/checkout');
		
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_city'] = $this->language->get('text_city');
		$data['text_search'] = $this->language->get('text_search');
		
		if ($office == 'machine') {
			$data['text_office'] = $this->language->get('text_machine');
			$data['text_office_title'] = $this->language->get('text_machine_title');
			$data['text_no_offices'] = $this->language->get('text_no_machines');
			$data['text_office_existing'] = $this->language->get('text_machine_existing');
			$data['text_office_new'] = $this->language->get('text_machine_new');
		} else {
			$data['text_office'] = $this->language->get('text_office');
			$data['text_office_title'] = $this->language->get('text_office_title');
			$data['text_no_offices'] = $this->language->get('text_no_offices');
			$data['text_office_existing'] = $this->language->get('text_office_existing');
			$data['text_office_new'] = $this->language->get('text_office_new');
		}
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$zone_code = 'courier';
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['country_iso'] = $courier_data[0];
		$data['courier_id'] = $courier_data[1];
		$next_setting = $this->model_setting_setting->getSetting('shipping_tk_next');
		$courier = $next_setting['shipping_tk_next_countries'][$data['country_iso']]['couriers'][$data['courier_id']];
		$data['courier_name'] = $courier['name'];
		
		$data['office_type'] = $office;
		
		$data['next_customer_id'] = 0;
		$data['customer_type'] = 'new';
		$data['postcode'] = '';
		$data['city_id'] = 0;
		$data['city'] = '';
		$data['office_id'] = 0;
		$data['office_code'] = '';
		$data['office_name'] = '';
		$data['office_address'] = '';
		
		$data['customer_offices'] = array();
		
		if ($this->customer->isLogged()) {
			$data['customer_offices'] = $this->getCustomers($data['country_iso'], $courier['name'], 'office');
			$data['customer_office'] = $this->getCustomer($data['country_iso'], $courier['name'], 'office');
			
			if (!empty($data['customer_office'])) {
				$data['next_customer_id'] = $data['customer_office']['next_customer_id'];
			}
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['postcode'])) {
			$data['postcode'] = $this->session->data['tk_checkout']['next']['postcode'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['customer_type'])) {
			$data['customer_type'] = $this->session->data['tk_checkout']['next']['customer_type'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['city_id'])) {
			$data['city_id'] = $this->session->data['tk_checkout']['next']['city_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['city'])) {
			$data['city'] = $this->session->data['tk_checkout']['next']['city'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['office_id'])) {
			$data['office_id'] = $this->session->data['tk_checkout']['next']['office_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['office_code'])) {
			$data['office_code'] = $this->session->data['tk_checkout']['next']['office_code'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['office_name'])) {
			$data['office_name'] = $this->session->data['tk_checkout']['next']['office_name'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['office_address'])) {
			$data['office_address'] = $this->session->data['tk_checkout']['next']['office_address'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['postcode'])) {
			$data['office_code'] = $this->session->data['tk_checkout']['next']['postcode'];
		}
		
		$data['next_cities'] = array();
		$next_cities = $this->getCities($data['country_iso'], $data['courier_name'], $office);
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
		
		$data['next_offices'] = array();
		if ($data['postcode']) {
			$next_offices = $this->getOffices($data['country_iso'], $data['courier_name'], $data['postcode'], $office);
			
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
		
		$this->response->setOutput($this->load->view('tk_checkout/next_office', $data));
	}
	
	public function getNextAddress($data, $courier_data) {
		
		$this->load->language('extension/shipping/tk_next');
		$this->load->language('tk_checkout/checkout');
		
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_city'] = $this->language->get('text_city');
		$data['text_search'] = $this->language->get('text_search');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_title'] = $this->language->get('text_address_title');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_postcode'] = $this->language->get('text_postcode');
		$data['text_quarter'] = $this->language->get('text_quarter');
		$data['text_block'] = $this->language->get('text_block');
		$data['text_entrance'] = $this->language->get('text_entrance');
		$data['text_floor'] = $this->language->get('text_floor');
		$data['text_apartment'] = $this->language->get('text_apartment');
		$data['text_street'] = $this->language->get('text_street');
		$data['text_street_num'] = $this->language->get('text_street_num');
		$data['text_other'] = $this->language->get('text_other');
		$data['text_no_street'] = $this->language->get('text_no_street');
		$data['text_help_address'] = $this->language->get('text_help_address');
		$data['text_no_cities'] = $this->language->get('text_no_cities');
		$data['text_center'] = $this->language->get('text_center');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$zone_code = 'courier';
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['country_iso'] = $courier_data[0];
		$data['courier_id'] = $courier_data[1];
		$next_setting = $this->model_setting_setting->getSetting('shipping_tk_next');
		$courier = $next_setting['shipping_tk_next_countries'][$data['country_iso']]['couriers'][$data['courier_id']];
		$data['courier_name'] = $courier['name'];
		
		$data['next_customer_id'] = 0;
		$data['customer_type'] = 'new';
		$data['postcode'] = '';
		$data['city_id'] = 0;
		$data['city'] = '';
		$data['quarter'] = '';
		$data['block'] = '';
		$data['entrance'] = '';
		$data['floor'] = '';
		$data['apartment'] = '';
		$data['street'] = '';
		$data['street_num'] = '';
		$data['other'] = '';
		
		$data['customer_addresses'] = array();
		
		if ($this->customer->isLogged()) {
			$data['customer_addresses'] = $this->getCustomers($data['country_iso'], $courier['name'], 'address');
			$data['customer_address'] = $this->getCustomer($data['country_iso'], $courier['name'], 'address');
			
			if (!empty($data['customer_address'])) {
				$data['next_customer_id'] = $data['customer_address']['next_customer_id'];
			}
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['postcode'])) {
			$data['postcode'] = $this->session->data['tk_checkout']['next']['postcode'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['customer_type'])) {
			$data['customer_type'] = $this->session->data['tk_checkout']['next']['customer_type'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['city_id'])) {
			$data['city_id'] = $this->session->data['tk_checkout']['next']['city_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['city'])) {
			$data['city'] = $this->session->data['tk_checkout']['next']['city'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['quarter'])) {
			$data['quarter'] = $this->session->data['tk_checkout']['next']['quarter'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['block'])) {
			$data['block'] = $this->session->data['tk_checkout']['next']['block'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['entrance'])) {
			$data['entrance'] = $this->session->data['tk_checkout']['next']['entrance'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['floor'])) {
			$data['floor'] = $this->session->data['tk_checkout']['next']['floor'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['apartment'])) {
			$data['apartment'] = $this->session->data['tk_checkout']['next']['apartment'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['street'])) {
			$data['street'] = $this->session->data['tk_checkout']['next']['street'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['street_num'])) {
			$data['street_num'] = $this->session->data['tk_checkout']['next']['street_num'];
		}
		
		if (!empty($this->session->data['tk_checkout']['next']['other'])) {
			$data['other'] = $this->session->data['tk_checkout']['next']['other'];
		}
		
		$data['next_cities'] = array();
		$next_cities = $this->getCities($data['country_iso'], $data['courier_name']);
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
			$next_streets = $this->getStreets($data['country_iso'], $data['postcode']);
			
			if ($next_streets) {
				foreach ($next_streets as $next_street) {
					$data['next_streets'][] = array(
						'street_id'   => $next_street['id'],
						'street_name' => strip_tags(html_entity_decode($next_street['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/next_address', $data));
	}
	
	// обработваме данните за доставка
	public function addNextData($data) {
		
		$return = array();
		
		$this->load->language('extension/shipping/tk_next');
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($data['firstname'])) {
			$return['name'] = $data['firstname'];
		}
		
		if (isset($data['lastname']) && isset($return['name'])) {
			$return['name'] .= ' ' . $data['lastname'];
		}
		
		if (isset($data['telephone'])) {
			$return['phone'] = $data['telephone'];
		}
		
		if (isset($data['email'])) {
			$return['email'] = $data['email'];
		}
		
		if (isset($data['payment_method'])) {
			$return['payment_code'] = $data['payment_method'];
		}
		
		$return['country_iso'] = $data['country_iso'];
		$return['courier_id'] = $data['courier_id'];
		$return['courier_name'] = $data['courier_name'];
		
		$country = $this->model_extension_module_tk_checkout->getCountryByIso2($data['country_iso']);
		$return['country'] = $country['name'];
		
		$return['zone_code'] = 'courier';
		$return['shipping_to'] = $data['shipping_to'];
		
		$return['postcode'] = '';
		
		$return['city_id'] = '';
		$return['city'] = '';
		
		$return['quarter'] = '';
		$return['street'] = '';
		$return['street_num'] = '';
		$return['block'] = '';
		$return['entrance'] = '';
		$return['floor'] = '';
		$return['apartment'] = '';
		$return['other'] = '';
		
		$return['office_id'] = '';
		$return['office_name'] = '';
		$return['office_address'] = '';
		
		if (!empty($data['next_customer_id']) && !empty($data['customer_type']) && $data['customer_type'] == 'existing') {
			
			$next_customer_info = $this->getCustomer($return['country_iso'], $return['courier_name'], $return['shipping_to'], $data['next_customer_id']);
			
			$return['customer_type'] = 'existing';
			$return['next_customer_id'] = $data['next_customer_id'];
			
			$return['postcode'] = $next_customer_info['postcode'];
			$return['country'] = $next_customer_info['country'];
			$return['city_id'] = $next_customer_info['city_id'];
			$return['city'] = $next_customer_info['city'];
			
			$return['quarter'] = $next_customer_info['quarter'];
			$return['street'] = $next_customer_info['street'];
			$return['street_num'] = $next_customer_info['street_num'];
			$return['block'] = $next_customer_info['block'];
			$return['entrance'] = $next_customer_info['entrance'];
			$return['floor'] = $next_customer_info['floor'];
			$return['apartment'] = $next_customer_info['apartment'];
			$return['other'] = $next_customer_info['other'];
			
			$return['office_id'] = $next_customer_info['office_id'];
			$return['office_code'] = $next_customer_info['office_code'];
			$return['office_name'] = $next_customer_info['office_name'];
			$return['office_address'] = $next_customer_info['office_address'];
		} else {
			$return['customer_type'] = 'new';
			
			if (!empty($data['postcode'])) {
				$return['postcode'] = $data['postcode'];
			}
			
			if (!empty($data['country'])) {
				$return['country'] = $data['country'];
			}
			
			if (!empty($data['city_id'])) {
				$return['city_id'] = $data['city_id'];
			}
			
			if (!empty($data['city'])) {
				$return['city'] = $data['city'];
			}
			
			if (!empty($data['quarter'])) {
				$return['quarter'] = $data['quarter'];
			}
			
			if (!empty($data['street'])) {
				$return['street'] = $data['street'];
			}
			
			if (!empty($data['street_num'])) {
				$return['street_num'] = $data['street_num'];
			}
			
			if (!empty($data['block'])) {
				$return['block'] = $data['block'];
			}
			
			if (!empty($data['entrance'])) {
				$return['entrance'] = $data['entrance'];
			}
			
			if (!empty($data['floor'])) {
				$return['floor'] = $data['floor'];
			}
			
			if (!empty($data['apartment'])) {
				$return['apartment'] = $data['apartment'];
			}
			
			if (!empty($data['other'])) {
				$return['other'] = $data['other'];
			}
			
			if (!empty($data['office_id'])) {
				$return['office_id'] = $data['office_id'];
			}
			
			if (!empty($data['office_code'])) {
				$return['office_code'] = $data['office_code'];
			}
			
			if (!empty($data['office_name'])) {
				$return['office_name'] = $data['office_name'];
			}
			
			if (!empty($data['office_address'])) {
				$return['office_address'] = $data['office_address'];
			}
		}
		
		if ($data['shipping_to'] == 'office') {
			
			$return['address_1'] = $return['office_id'] . ' - ' . $return['office_name'] . ' - ' . $return['office_address'];
			
			if (empty($return['office_id'])) {
				$error['city'] = $this->language->get('error_office');
			}
		} else if ($data['shipping_to'] == 'machine') {
			
			$return['address_1'] = $return['office_id'] . ' - ' . $return['office_name'] . ' - ' . $return['office_address'];
			
			if (empty($return['office_id'])) {
				$error['city'] = $this->language->get('error_machine');
			}
		} else if ($data['shipping_to'] == 'address') {
			
			$return['address_1'] = '';
			
			if ($data['quarter']) {
				$return['address_1'] .= 'кв. ' . $data['quarter'] . ', ';
			}
			
			if ($data['block']) {
				$return['address_1'] .= 'бл. ' . $data['block'] . ', ';
			}
			
			if (isset($data['entrance']) && $data['entrance']) {
				$return['address_1'] .= 'вх. ' . $data['entrance'] . ', ';
			}
			
			if (isset($data['floor']) && $data['floor']) {
				$return['address_1'] .= 'ет. ' . $data['floor'] . ', ';
			}
			
			if (isset($data['apartment']) && $data['apartment']) {
				$return['address_1'] .= 'ап. ' . $data['apartment'] . ', ';
			}
			
			if (isset($data['street']) && $data['street']) {
				$return['address_1'] .= 'ул. ' . $data['street'] . ', ';
			}
			
			if (isset($data['street_num']) && $data['street_num']) {
				$return['address_1'] .= '№ ' . $data['street_num'] . ', ';
			}
			
			if (isset($data['other']) && $data['other']) {
				$return['address_1'] .= 'Допълнение: ' . $data['other'];
			}
			
			if (!$return['city']) {
				$error['city'] = $this->language->get('error_city');
			}
			
			if (!$return['street'] && !$return['quarter']) {
				$error['street'] = $this->language->get('error_validate_street_quarter');
			}
			
			if (!$return['street_num'] && !$return['block']) {
				$error['street_num'] = $this->language->get('error_street_num');
			}
			
			if (!empty($error)) {
				$error['next_street_select'] = $this->language->get('error_validate_addres');
			}
		}
		
		if (isset($error) && $error) {
			$return['error'] = $error;
		}
		
		return $return;
	}
	
	public function saveData() {
		
		if (isset($this->request->post['firstname'])) {
			$this->session->data['tk_checkout']['next']['name'] = trim($this->request->post['firstname']);
		}
		
		if (isset($this->request->post['lastname']) && isset($this->session->data['tk_checkout']['next']['name'])) {
			$this->session->data['tk_checkout']['next']['name'] = ' ' . trim($this->request->post['lastname']);
		}
		
		if (isset($this->request->post['telephone'])) {
			$this->session->data['tk_checkout']['next']['phone'] = filter_var($this->request->post['telephone'], FILTER_SANITIZE_NUMBER_INT);
		}
		
		if (isset($this->request->post['email'])) {
			$this->session->data['tk_checkout']['next']['email'] = filter_var($this->request->post['email'], FILTER_SANITIZE_EMAIL);
		}
		
		if (isset($this->request->post['courier_id'])) {
			$this->session->data['tk_checkout']['next']['courier_id'] = $this->request->post['courier_id'];
		}
		
		if (isset($this->request->post['courier_name'])) {
			$this->session->data['tk_checkout']['next']['courier_name'] = $this->request->post['courier_name'];
		}
		
		if (isset($this->request->post['next_customer_id'])) {
			$this->session->data['tk_checkout']['next']['next_customer_id'] = $this->request->post['next_customer_id'];
		}
		
		if (isset($this->request->post['zone'])) {
			$this->session->data['tk_checkout']['next']['zone'] = $this->request->post['zone'];
		}
		
		if (isset($this->request->post['zone_id'])) {
			$this->session->data['tk_checkout']['next']['zone_id'] = $this->request->post['zone_id'];
		}
		
		if (isset($this->request->post['country_id'])) {
			$this->session->data['tk_checkout']['next']['country_id'] = $this->request->post['country_id'];
		}
		
		if (isset($this->request->post['country_iso'])) {
			$this->session->data['tk_checkout']['next']['country_iso'] = $this->request->post['country_iso'];
		}
		
		if (isset($this->request->post['postcode'])) {
			$this->session->data['tk_checkout']['next']['postcode'] = $this->request->post['postcode'];
		}
		
		if (isset($this->request->post['city'])) {
			$this->session->data['tk_checkout']['next']['city'] = $this->request->post['city'];
		}
		
		if (isset($this->request->post['city_id'])) {
			$this->session->data['tk_checkout']['next']['city_id'] = $this->request->post['city_id'];
		}
		
		if (isset($this->request->post['quarter'])) {
			$this->session->data['tk_checkout']['next']['quarter'] = $this->request->post['quarter'];
		}
		
		if (isset($this->request->post['street'])) {
			$this->session->data['tk_checkout']['next']['street'] = $this->request->post['street'];
		}
		
		if (isset($this->request->post['street_num'])) {
			$this->session->data['tk_checkout']['next']['street_num'] = $this->request->post['street_num'];
		}
		
		if (isset($this->request->post['block'])) {
			$this->session->data['tk_checkout']['next']['block'] = $this->request->post['block'];
		}
		
		if (isset($this->request->post['entrance'])) {
			$this->session->data['tk_checkout']['next']['entrance'] = $this->request->post['entrance'];
		}
		
		if (isset($this->request->post['floor'])) {
			$this->session->data['tk_checkout']['next']['floor'] = $this->request->post['floor'];
		}
		
		if (isset($this->request->post['apartment'])) {
			$this->session->data['tk_checkout']['next']['apartment'] = $this->request->post['apartment'];
		}
		
		if (isset($this->request->post['other'])) {
			$this->session->data['tk_checkout']['next']['other'] = $this->request->post['other'];
		}
		
		if (isset($this->request->post['office_id'])) {
			$this->session->data['tk_checkout']['next']['office_id'] = $this->request->post['office_id'];
		}
		
		if (isset($this->request->post['office_code'])) {
			$this->session->data['tk_checkout']['next']['office_code'] = $this->request->post['office_code'];
		}
		
		if (isset($this->request->post['office_name'])) {
			$this->session->data['tk_checkout']['next']['office_name'] = $this->request->post['office_name'];
		}
		
		if (isset($this->request->post['office_address'])) {
			$this->session->data['tk_checkout']['next']['office_address'] = $this->request->post['office_address'];
		}
		
		if (isset($this->request->post['customer_type'])) {
			$this->session->data['tk_checkout']['next']['customer_type'] = $this->request->post['customer_type'];
		}
	}
	
	// обработваме данните за клиента
	public function addCustomer($data) {
		
		if (!empty($data['country_id']) && $data['country_id'] > 0) {
			$country_id = $data['country_id'];
		} else {
			$country_id = '';
		}
		
		if (!empty($data['office_id']) && $data['office_id'] > 0) {
			$office_id = $data['office_id'];
		} else {
			$office_id = '';
		}
		
		if (!empty($data['city_id']) && $data['city_id'] > 0) {
			$city_id = $data['city_id'];
		} else {
			$city_id = '';
		}
		
		if (!empty($data['country'])) {
			$country = $data['country'];
		} else {
			$country = '';
		}
		
		if (!empty($data['country_iso'])) {
			$country_iso = $data['country_iso'];
		} else {
			$country_iso = '';
		}
		
		if (!empty($data['courier_name'])) {
			$courier_name = $data['courier_name'];
		} else {
			$courier_name = '';
		}
		
		if (!empty($data['courier_id'])) {
			$courier_id = $data['courier_id'];
		} else {
			$courier_id = '';
		}
		
		if (!empty($data['shipping_to'])) {
			$shipping_to = $data['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['postcode'])) {
			$postcode = $data['postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['city'])) {
			$city = $data['city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['quarter'])) {
			$quarter = $data['quarter'];
		} else {
			$quarter = '';
		}
		
		if (!empty($data['street'])) {
			$street = $data['street'];
		} else {
			$street = '';
		}
		
		if (!empty($data['street_num'])) {
			$street_num = $data['street_num'];
		} else {
			$street_num = '';
		}
		
		if (!empty($data['block'])) {
			$block = $data['block'];
		} else {
			$block = '';
		}
		
		if (!empty($data['entrance'])) {
			$entrance = $data['entrance'];
		} else {
			$entrance = '';
		}
		
		if (isset($data['floor'])) {
			$floor = $data['floor'];
		} else {
			$floor = '';
		}
		
		if (!empty($data['apartment'])) {
			$apartment = $data['apartment'];
		} else {
			$apartment = '';
		}
		
		if (!empty($data['other'])) {
			$other = $data['other'];
		} else {
			$other = '';
		}
		
		if (!empty($data['office_code'])) {
			$office_code = $data['office_code'];
		} else {
			$office_code = '';
		}
		
		if (!empty($data['office_name'])) {
			$office_name = $data['office_name'];
		} else {
			$office_name = '';
		}
		
		if (!empty($data['office_address'])) {
			$office_address = $data['office_address'];
		} else {
			$office_address = '';
		}
		
		if (!empty($data['office_mashine'])) {
			$office_mashine = $data['office_mashine'];
		} else {
			$office_mashine = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_next_customer SET customer_id = '" . (int)$this->customer->getId() . "', country = '" . $this->db->escape($country) . "', country_iso = '" . $this->db->escape($country_iso) . "', courier_id = '" . (int)$courier_id . "', courier = '" . $this->db->escape($courier_name) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block = '" . $this->db->escape($block) . "', entrance = '" . $this->db->escape($entrance) . "', floor = '" . $this->db->escape($floor) . "', apartment = '" . $this->db->escape($apartment) . "', other = '" . $this->db->escape($other) . "', office_code = '" . $this->db->escape($office_code) . "', office_name = '" . $this->db->escape($office_name) . "', office_address = '" . $this->db->escape($office_address) . "', office_mashine = '" . $this->db->escape($office_mashine) . "', country_id = '" . (int)$country_id . "', city_id = '" . (int)$city_id . "', office_id = '" . (int)$office_id . "'");
	}
	
	public function getCustomer($country_iso, $courier, $shipping_to, $next_customer_id = NULL) {
		
		if ($next_customer_id != NULL) {
			$sql = "SELECT DISTINCT * FROM " . DB_PREFIX . "tk_next_customer WHERE next_customer_id = '" . (int)$next_customer_id . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND courier = '" . $this->db->escape($courier) . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' ";
		} else {
			$sql = "SELECT DISTINCT * FROM " . DB_PREFIX . "tk_next_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND courier = '" . $this->db->escape($courier) . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' ORDER BY next_customer_id ASC LIMIT 1 ";
		}
		
		$address_query = $this->db->query($sql);
		
		return $address_query->row;
	}
	
	public function getCustomers($country_iso, $courier, $shipping_to) {
		
		$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_next_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND courier = '" . $this->db->escape($courier) . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "'");
		
		return $address_query->rows;
	}
	
	// обработваме данните за поръчката
	public function addOrder($data, $order_id = 0) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (!empty($data['name'])) {
			$name = $data['name'];
		} else {
			$name = '';
		}
		
		if (!empty($data['phone'])) {
			$phone = $data['phone'];
		} else {
			$phone = '';
		}
		
		if (!empty($data['email'])) {
			$email = $data['email'];
		} else {
			$email = '';
		}
		
		if (!empty($data['office_id']) && $data['office_id'] > 0) {
			$office_id = $data['office_id'];
		} else {
			$office_id = '';
		}
		
		if (!empty($data['office_code'])) {
			$office_code = $data['office_code'];
		} else {
			$office_code = '';
		}
		
		if (!empty($data['office_name'])) {
			$office_name = $data['office_name'];
		} else {
			$office_name = '';
		}
		
		if (!empty($data['office_address'])) {
			$office_address = $data['office_address'];
		} else {
			$office_address = '';
		}
		
		if (!empty($data['country'])) {
			$country = $data['country'];
		} else {
			$country = '';
		}
		
		if (!empty($data['country_iso'])) {
			$country_iso = $data['country_iso'];
		} else {
			$country_iso = '';
		}
		
		if (!empty($data['courier_name'])) {
			$courier_name = $data['courier_name'];
		} else {
			$courier_name = 'IMP';
		}
		
		if (!empty($data['courier_id'])) {
			$courier_id = $data['courier_id'];
		} else {
			$courier_id = '4';
		}
		
		if (!empty($data['shipping_to'])) {
			$shipping_to = $data['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['postcode'])) {
			$postcode = $data['postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['city'])) {
			$city = $data['city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['quarter'])) {
			$quarter = $data['quarter'];
		} else {
			$quarter = '';
		}
		
		if (!empty($data['street'])) {
			$street = $data['street'];
		} else {
			$street = '';
		}
		
		if (!empty($data['street_num'])) {
			$street_num = $data['street_num'];
		} else {
			$street_num = '';
		}
		
		if (!empty($data['block'])) {
			$block = $data['block'];
		} else {
			$block = '';
		}
		
		if (!empty($data['entrance'])) {
			$entrance = $data['entrance'];
		} else {
			$entrance = '';
		}
		
		if (isset($data['floor'])) {
			$floor = $data['floor'];
		} else {
			$floor = '';
		}
		
		if (!empty($data['apartment'])) {
			$apartment = $data['apartment'];
		} else {
			$apartment = '';
		}
		
		if (!empty($data['other'])) {
			$other = $data['other'];
		} else {
			$other = '';
		}
		
		if (!empty($courier['totals'])) {
			$total = $this->model_extension_module_tk_checkout->getSelectedTotals($courier['totals']);
		} else {
			$total = $this->model_extension_module_tk_checkout->getSubAndTax();
		}
		
		if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
			$weight = $this->cart->getWeight();
		} else if (!empty($courier['weight_total']) && $courier['weight_total'] > 0) {
			$weight = $courier['weight_total'] * $this->cart->countProducts();
		} else {
			$weight = 1 * $this->cart->countProducts();
		}
		if (!empty($courier['weight_type']) && $courier['weight_type'] == 'gram') {
			$weight = $weight / 1000;
		}
		if ($weight < 0.01) {
			$weight = 0.01;
		}
		
		if (isset($data['payment_code'])) {
			$payment_code = $data['payment_code'];
		} else {
			$payment_code = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_next_order SET order_id = '" . (int)$order_id . "', status_id = '0', name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_iso = '" . $this->db->escape($country_iso) . "', courier_id = '" . (int)$courier_id . "', courier = '" . $this->db->escape($courier_name) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block = '" . $this->db->escape($block) . "', entrance = '" . $this->db->escape($entrance) . "', floor = '" . $this->db->escape($floor) . "', apartment = '" . $this->db->escape($apartment) . "', other = '" . $this->db->escape($other) . "', office_id = '" . (int)$office_id . "', office_code = '" . $this->db->escape($office_code) . "', office_name = '" . $this->db->escape($office_name) . "', office_address = '" . $this->db->escape($office_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', data = '" . $this->db->escape(serialize($data)) . "'");
		
		return $this->db->getLastId();
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_next_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_next_order WHERE shipment_status != '-14' OR shipment_status is NULL AND status_id > 0");
		
		return $query->rows;
	}
	
	// данни за офиси и адреси
	public function getCities($country_iso, $courier, $office = false, $name = false) {
		
		$cities = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			
			$json_data['country'] = $country_iso;
			
			if ($office) {
				$json_data['courier'] = $courier;
				$json_data['office_type'] = $office;//all,office,machine',
			}
			
			if ($name) {
				if (is_numeric($name)) {
					$json_data['post_code'] = $name;
				} else {
					$json_data['name'] = $name;
				}
			}
			
			$cities = TkNext::getCities($json_data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $courier . ' - cities | getCities');
			$this->log->write($e->getMessage());
		}
		
		return $cities;
	}
	
	public function getOffices($country_iso, $courier, $postcode, $office = 'all') {
		
		$offices = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$json_data = array(
				'post_code'   => $postcode,
				'country'     => $country_iso,
				'courier'     => $courier,
				'office_type' => $office
			);
			
			$offices = TkNext::getOffices($json_data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $courier . ' - office | getOffices');
			$this->log->write($e->getMessage());
		}
		
		return $offices;
	}
	
	public function getStreets($country_iso, $postcode, $name = false) {
		
		$streets = array();
		
		$this->load->library('tknext');
		if (!isset($this->tknext)) {
			$this->tknext = new TkNext($this->registry);
		}
		
		try {
			TkNext::setAuth($this->config->get('shipping_tk_next_app_id'), $this->config->get('shipping_tk_next_app_secret'));
			$json_data = array(
				'post_code' => $postcode,
				'country'   => $country_iso
			);
			
			if ($name) {
				$json_data['name'] = $name;
			}
			
			$streets = TkNext::getStreets($json_data);
		} catch (\Exception $e) {
			$this->log->write('NextLevel: ' . $country_iso . ' - ' . $postcode . ' | gettStreets');
			$this->log->write($e->getMessage());
		}
		
		return $streets;
	}
	
	// ъпдейт на товарителници с крон
	public function editShipment($order_id, $response) {
		
		if (!isset($response['bol_id']) || !$response['bol_id']) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_next_order SET status_id = '0', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			if ($this->db->escape($response['bol_status']) == 128) {
				$shipment_number = NULL;
			} else {
				$shipment_number = $response['bol_id'];
			}
			
			$this->db->query("UPDATE " . DB_PREFIX . "tk_next_order SET status_id = '1', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status = '" . $this->db->escape($response['bol_status']) . "', shipment_status_txt = '" . $this->db->escape($response['bol_status_text']) . "', pdf = '" . $this->db->escape($response['pdf']) . "', mail_send = '" . $this->db->escape($response['bol_status']) . "' WHERE order_id  = '" . (int)$order_id . "'");
		}
	}
	
	public function trackShipment($bol_id, $language = 'bg') {
		
		if (strtolower($language) != 'bg' && strtolower($language) != 'bg-bg') {
			$language = 'en';
		}
		
		$parcelsArray = array(
			array('id' => $bol_id)
		);
		
		$jsonData = array(
			'language'          => $language,
			'parcels'           => $parcelsArray,
			'lastOperationOnly' => true
		);
		
		$siteResponse = $this->serviceJSON('track/', $jsonData);
		$response = json_decode($siteResponse, true);
		
		$parcels = array();
		if (isset($response['parcels']) && $response['parcels']) {
			foreach ($response['parcels'] as $parcel) {
				if (isset($parcel['operations'][0]['operationCode']) && $parcel['operations'][0]['operationCode']) {
					$parcels['code'] = $parcel['operations'][0]['operationCode'];
					$parcels['description'] = $parcel['operations'][0]['description'];
				} else {
					$parcels['code'] = '148';
					$parcels['description'] = 'Получена информация за пратка';
				}
			}
		} else {
			$parcels['code'] = '00';
			$parcels['description'] = 'Липсва информация';
		}
		
		if (isset($response['error']['message'])) {
			return $response;
		} else {
			return $parcels;
		}
	}
	
}