<?php

class ModelExtensionShippingTkSameday extends Model {
	
	public function getQuote($address) {
		
		$this->load->language('extension/shipping/tk_sameday');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_tk_sameday_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
		if (!$this->config->get('shipping_tk_sameday_geo_zone_id')) {
			$status = true;
		} else if ($this->config->get('shipping_tk_sameday_status')) {
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
		
		$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		$sameday_country = $sameday_setting['shipping_tk_sameday_countries'][$address['country_iso']];
		
		$method_data = array();
		
		if ($status && !empty($sameday_country['status']) && $this->config->get('total_shipping_status')) {
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
			if (empty($address['city']) && !empty($this->session->data['tk_checkout']['sameday']['city'])) {
				$address['city'] = $this->session->data['tk_checkout']['sameday']['city'];
			}
			
			if (empty($address['county']) && !empty($this->session->data['tk_checkout']['sameday']['county'])) {
				$address['county'] = $this->session->data['tk_checkout']['sameday']['county'];
			}
			
			if (empty($address['postcode']) && !empty($this->session->data['tk_checkout']['sameday']['postcode'])) {
				$address['postcode'] = $this->session->data['tk_checkout']['sameday']['postcode'];
			}
			
			if (empty($address['locker_city']) && !empty($this->session->data['tk_checkout']['sameday']['locker_city'])) {
				$address['locker_city'] = $this->session->data['tk_checkout']['sameday']['locker_city'];
			}
			
			if (empty($address['locker_county']) && !empty($this->session->data['tk_checkout']['sameday']['locker_county'])) {
				$address['locker_county'] = $this->session->data['tk_checkout']['sameday']['locker_county'];
			}
			
			if (empty($address['locker_postcode']) && !empty($this->session->data['tk_checkout']['sameday']['locker_postcode'])) {
				$address['locker_postcode'] = $this->session->data['tk_checkout']['sameday']['locker_postcode'];
			}
			
			if (empty($address['locker_id']) && !empty($this->session->data['tk_checkout']['sameday']['sameday_locker_locker_id'])) {
				$address['locker_id'] = $this->session->data['tk_checkout']['sameday']['sameday_locker_locker_id'];
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
			
			// тегло на количката
			$weight = 0;
			if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
				$weight = $this->cart->getWeight();
			}
			
			$count_sort = 10;
			foreach ($sameday_country['services'] as $service) {
				if (!empty($service['status'])) {
					
					// сума на количката
					if (!empty($service['totals'])) {
						$total = $this->model_extension_module_tk_checkout->getSelectedTotals($service['totals']);
					} else {
						$total = $this->model_extension_module_tk_checkout->getSubAndTax();
					}
					
					// тегло ако в количката е 0
					if ($weight == 0) {
						if (!empty($service['weight_total']) && $service['weight_total'] > 0) {
							$weight_total = $service['weight_total'];
						} else {
							$weight_total = 1;
						}
						
						$weight = $weight_total * $this->cart->countProducts();
					}
					
					if (!empty($service['weight_type']) && $service['weight_type'] == 'gram') {
						$weight = $weight / 1000;
					}
					
					if ($weight < 0.01) {
						$weight = 0.01;
					}
					
					// ако теглото е над допустимото
					if (!empty($service['weight']) && $service['weight'] < $weight) {
						continue;
					}
					
					// подредба
					if (!empty($service['sort']) && $service['sort'] > 0) {
						$sort = $service['sort'];
					} else {
						$sort = $count_sort + 1;
					}
					
					// заглавие
					if (!empty($service['title'][$this->session->data['language']])) {
						$title = $service['title'][$this->session->data['language']];
					} else {
						$title = $service['name'];
					}
					
					// допълнителен текст
					if (!empty($service['text'][$this->session->data['language']])) {
						$text = $service['text'][$this->session->data['language']];
					} else {
						$text = '';
					}
					
					// цена
					$price = $this->getPrices($service, $address, $weight, $total, $payment_method, $sameday_country, $currency);
					
					
					if (isset($price['total'])) {
						
						$price_text = $this->currency->format($price['total'], $currency);
						
						//пресмятане на ДДС
						if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_sameday_tax_class_id') && $price['total'] > 0) {
							$rate = array_values($this->tax->getRates($price['total'], $this->config->get('shipping_tk_sameday_tax_class_id')));
							$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
							
							if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
								$price['total'] = $price['total'] / (($rate[0]['rate'] / 100) + 1);
							}
						}
						
						$quote_data[$sort][$address['country_iso'] . '_' . $service['id'] . '_' . $service['type']] = array(
							'code'         => 'tk_sameday.' . $address['country_iso'] . '_' . $service['id'] . '_' . $service['type'],
							'name'         => strtolower($service['name']),
							'title'        => $title,
							'description'  => $text,
							'cost'         => $this->tax->calculate($price['total'], $this->config->get('shipping_tk_sameday_tax_class_id'), $this->config->get('config_tax')),
							'tax_class_id' => $this->config->get('shipping_tk_sameday_tax_class_id'),
							'text'         => '<span id="service_' . $service['id'] . '_price">' . $price_text . '</span>'
						);
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
					'code'       => 'tk_sameday',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote,
					'sort_order' => $this->config->get('shipping_tk_sameday_sort_order'),
					'error'      => false
				);
			}
		}
		
		return $method_data;
	}
	
	// ценообразуване
	public function getPrices($service, $address, $weight, $total, $payment_method, $sameday_country, $currency) {
		
		$this->load->model('extension/module/tk_checkout');
		
		$data = array();
		$default_address = array();
		
		$result['total'] = 0;
		$result['type'] = $service['id'];
		$result['service'] = $service['name'];
		
		// ако е включено автоматичното ценообразуване
		if (!empty($service['calculate'])) {
			
			$this->load->library('tksameday');
			if (!isset($this->tksameday)) {
				$this->tksameday = new TkSameday($this->registry);
			}
			
			try {
				$sameday_address = TkSameday::getDefault();
				if (!empty($sameday_address[$address['country_iso']])) {
					$default_address = $sameday_address[$address['country_iso']];
				}
			} catch (\Exception $e) {
				if ($this->config->get('shipping_tk_sameday_debug')) {
					$this->log->write('Sameday: ' . $service['name'] . ' - ' . $service['id'] . ' | getDefault');
					$this->log->write($e->getMessage());
				}
			}
			
			if (!empty($default_address)) {
				
				// услуга
				$data['service'] = $service['id'];
				
				// данни за изпшращача
				$data['pickupPoint'] = $this->config->get('shipping_tk_sameday_pickup');
				$data['returnLocationId'] = $this->config->get('shipping_tk_sameday_pickup');
				
				//вид на пратката
				if ($weight >= 32) {
					$data['packageType'] = 0;
				} else {
					$data['packageType'] = $this->config->get('shipping_tk_sameday_package_type');
				}
				
				// тегло на пратката
				$data['packageWeight'] = $weight;
				
				//брой колети в пратката
				if ($weight >= 32) {
					$multiply_count = ceil($weight / 32);
					
					$data['packageNumber'] = $multiply_count;
					
					for ($i = 0; $i < $multiply_count; $i++) {
						$data['parcels'][$i]['weight'] = $weight / $multiply_count;
					}
				} else {
					$data['packageNumber'] = 1;
					$data['parcels'][0]['weight'] = $weight;
				}
				
				// адрес за доставка
				if (!empty($service['type']) && $service['type'] == 'machine') {
					if (!empty($address['locker_id'])) {
						$data['lockerId'] = $address['locker_id'];
					} else {
						$data['lockerId'] = $default_address['locker_id'];
					}
					
					if (!empty($address['locker_city'])) {
						$data['awbRecipient']['cityString'] = $address['locker_city'];
					} else {
						$data['awbRecipient']['cityString'] = $default_address['city'];
					}
					
					if (!empty($address['locker_county'])) {
						$data['awbRecipient']['countyString'] = $address['locker_county'];
					} else {
						$data['awbRecipient']['countyString'] = $default_address['county'];
					}
				} else {
					if (!empty($address['city'])) {
						$data['awbRecipient']['cityString'] = $address['city'];
					} else {
						$data['awbRecipient']['cityString'] = $default_address['city'];
					}
					
					if (!empty($address['county'])) {
						$data['awbRecipient']['countyString'] = $address['county'];
					} else {
						$data['awbRecipient']['countyString'] = $default_address['county'];
					}
				}
				
				$data['awbRecipient']['countryString'] = $default_address['country'];
				
				// наложено плащане
				if ($payment_method == 'cod') {
					$data['cashOnDelivery'] = $total;//$this->currency->convert($total, $currency, $sameday_country['currency']);
				} else {
					$data['cashOnDelivery'] = 0;
				}
				
				// преглед на пратка
				if (!empty($service['opening']) && $service['opening'] == 1) {
					$data['serviceTaxes'] = array('OPCG');
				}
				
				// застраховка - обявена стойност
				if (!empty($service['insured_value'])) {
					$data['insuredValue'] = $total;
				} else {
					$data['insuredValue'] = 0;
				}
				
				$data['awbPayment'] = 1;
				$data['thirdPartyPickup'] = 0;
				$data['cashOnDeliveryReturns'] = 1;
				$data['currency'] = $currency;
			}
			$this->log->write($data);
			try {
				$result_cost = TkSameday::costShipment($data);
				
				// запис на грешките
				if (!empty($result_cost['message'])) {
					if ($this->config->get('shipping_tk_sameday_debug')) {
						$this->log->write($data);
						$this->log->write('Sameday: ' . $service['name'] . ' - ' . $service['id'] . ' | costShipment');
						$this->log->write($result_cost['message']);
					}
				}
				
				if (!empty($result_cost['amount']) && $result_cost['amount'] > 0) {
					// превалутираме ако валутата не е спрямо валутата в сайта
					if ($result_cost['currency'] != $currency) {
						$result['total'] = $this->currency->convert($result_cost['amount'], $currency, $result_cost['currency']);
					} else {
						$result['total'] = $result_cost['amount'];
					}
				}
			} catch (\Exception $e) {
				// запис на грешките
				if ($this->config->get('shipping_tk_sameday_debug')) {
					$this->log->write('Sameday: ' . $service['name'] . ' - ' . $service['id'] . ' | costShipment');
					$this->log->write($e->getMessage());
				}
			}
		}
		
		// цена спрямо тегло
		if (!empty($service['weight_price'])) {
			foreach ($service['weight_price'] as $weight_price) {
				
				if ((!empty($weight_price['from']) || $weight_price['from'] = 0) && !empty($weight_price['to']) && $weight_price['from'] <= $weight && $weight_price['to'] > $weight) {
					$result['total'] = $weight_price['price'];
				}
			}
		}
		
		// ако автоматичното ценообразуване е забранено или не се извлича сума за доставка
		if (empty($service['calculate']) || empty($result['total']) || $result['total'] == 0) {
			
			// фиксирана цена за доставка
			if (!empty($service['fixed_price']) && (!isset($result['total']) || $result['total'] == 0)) {
				$result['total'] = $service['fixed_price'];
				
				if (!empty($service['fixed_weight']) && !empty($service['fixed_weight_price'])) {
					$different_weight = $weight - $service['fixed_weight'];
					if ($different_weight > 0) {
						$different_weight = ceil($different_weight);
						$result['total'] = $result['total'] + ($different_weight * $service['fixed_weight_price']);
					}
				}
			}
			
			// превалутираме в текуща валута
			if ($currency != $sameday_country['currency'] && isset($result['total'])) {
				$result['total'] = $this->currency->convert($result['total'], $sameday_country['currency'], $currency);
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
			$tk_special_shipping = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_sameday.' . $address['country_iso'] . '_' . $service['id'] . '_' . $service['type']);
			
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
		if (!empty($service['free_weight']) && $weight >= $service['free_weight']) {
			$free_weight = false;
		}
		
		// безплатна доставка
		if ($free_weight && !empty($service['free_total']) && $total >= $service['free_total']) {
			$result['total'] = 0.00;
		}
		
		return $result;
	}
	
	// показваме темплейти
	public function getSamedayMachine($data, $service_data) {
		
		$this->load->language('extension/shipping/tk_sameday');
		$this->load->language('tk_checkout/checkout');
		
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_city'] = $this->language->get('text_city');
		$data['text_county'] = $this->language->get('text_county');
		$data['text_search'] = $this->language->get('text_search');
		
		$data['text_locker'] = $this->language->get('text_locker');
		$data['text_locker_title'] = $this->language->get('text_locker_title');
		$data['text_locker_map'] = $this->language->get('text_locker_map');
		$data['text_no_lockers'] = $this->language->get('text_no_lockers');
		$data['text_locker_existing'] = $this->language->get('text_locker_existing');
		$data['text_locker_new'] = $this->language->get('text_locker_new');
		$data['text_no_cities'] = $this->language->get('text_no_cities');
		
		$data['shipping_tk_sameday_username'] = $this->config->get('shipping_tk_sameday_username');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$zone_code = 'service';
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['country_iso'] = $service_data[0];
		$data['service'] = $service_data[1];
		$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		$service = $sameday_setting['shipping_tk_sameday_countries'][$data['country_iso']]['services'][$data['service']];
		$data['service_name'] = $service['name'];
		
		$data['sameday_customer_id'] = 0;
		$data['customer_type'] = 'new';
		$data['locker_postcode'] = '';
		$data['locker_county'] = '';
		$data['locker_county_id'] = 0;
		$data['locker_city_id'] = 0;
		$data['locker_city'] = '';
		$data['locker_id'] = 0;
		$data['locker_name'] = '';
		$data['locker_address'] = '';
		
		$data['customer_lockers'] = array();
		
		if ($this->customer->isLogged()) {
			$data['customer_lockers'] = $this->getCustomers($data['country_iso'], $data['service'], 'locker');
			$data['customer_locker'] = $this->getCustomer($data['country_iso'], $data['service'], 'locker');
			
			if (!empty($data['customer_locker'])) {
				$data['sameday_customer_id'] = $data['customer_locker']['sameday_customer_id'];
			}
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_postcode'])) {
			$data['locker_postcode'] = $this->session->data['tk_checkout']['sameday']['locker_postcode'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['customer_type'])) {
			$data['customer_type'] = $this->session->data['tk_checkout']['sameday']['customer_type'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_county_id'])) {
			$data['locker_county_id'] = $this->session->data['tk_checkout']['sameday']['locker_county_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_county'])) {
			$data['locker_county'] = $this->session->data['tk_checkout']['sameday']['locker_county'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_city_id'])) {
			$data['locker_city_id'] = $this->session->data['tk_checkout']['sameday']['locker_city_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_city'])) {
			$data['locker_city'] = $this->session->data['tk_checkout']['sameday']['locker_city'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_id'])) {
			$data['locker_id'] = $this->session->data['tk_checkout']['sameday']['locker_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_name'])) {
			$data['locker_name'] = $this->session->data['tk_checkout']['sameday']['locker_name'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['locker_address'])) {
			$data['locker_address'] = $this->session->data['tk_checkout']['sameday']['locker_address'];
		}
		
		$data['sameday_counties'] = array();
		$sameday_cities = $this->getLockersCounties($data['country_iso']);
		if ($sameday_cities) {
			foreach ($sameday_cities as $sameday_city) {
				$data['sameday_counties'][] = array(
					'locker_county_id' => $sameday_city['county_id'],
					'locker_county'    => $sameday_city['county']
				);
			}
		}
		
		$data['sameday_cities'] = array();
		if (!empty($data['locker_county_id']) && $data['locker_county_id'] > 0) {
			$sameday_cities = $this->getLockersCities($data['country_iso'], $data['locker_county_id']);
			if ($sameday_cities) {
				foreach ($sameday_cities as $sameday_city) {
					$data['sameday_cities'][] = array(
						'locker_city_id'  => $sameday_city['city_id'],
						'locker_city'     => $sameday_city['city'],
						'locker_postcode' => $sameday_city['postcode']
					);
				}
			}
		}
		
		$data['sameday_lockers'] = array();
		if (!empty($data['city_id']) && $data['city_id'] > 0) {
			$sameday_lockers = $this->getLockers($data['country_iso'], $data['city_id']);
			if ($sameday_lockers) {
				foreach ($sameday_lockers as $sameday_locker) {
					$data['sameday_lockers'][] = array(
						'locker_id'      => $sameday_locker['locker_id'],
						'locker_name'    => $sameday_locker['name'],
						'locker_address' => $sameday_locker['address']
					);
				}
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/sameday_locker', $data));
	}
	
	public function getSamedayAddress($data, $service_data) {
		
		$this->load->language('extension/shipping/tk_sameday');
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
		
		$data['shipping_tk_sameday_username'] = $this->config->get('shipping_tk_sameday_username');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$zone_code = 'service';
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['country_iso'] = $service_data[0];
		$data['service'] = $service_data[1];
		$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		$service = $sameday_setting['shipping_tk_sameday_countries'][$data['country_iso']]['services'][$data['service']];
		$data['service_name'] = $service['name'];
		
		$data['sameday_customer_id'] = 0;
		$data['customer_type'] = 'new';
		$data['postcode'] = '';
		$data['county'] = '';
		$data['county_id'] = 0;
		$data['city_id'] = 0;
		$data['city'] = '';
		$data['address'] = '';
		
		$data['customer_addresses'] = array();
		
		if ($this->customer->isLogged()) {
			$data['customer_addresses'] = $this->getCustomers($data['country_iso'], $data['service'], 'address');
			$data['customer_address'] = $this->getCustomer($data['country_iso'], $data['service'], 'address');
			
			if (!empty($data['customer_address'])) {
				$data['sameday_customer_id'] = $data['customer_address']['sameday_customer_id'];
			}
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['postcode'])) {
			$data['postcode'] = $this->session->data['tk_checkout']['sameday']['postcode'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['customer_type'])) {
			$data['customer_type'] = $this->session->data['tk_checkout']['sameday']['customer_type'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['county_id'])) {
			$data['county_id'] = $this->session->data['tk_checkout']['sameday']['county_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['county'])) {
			$data['county'] = $this->session->data['tk_checkout']['sameday']['county'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['city_id'])) {
			$data['city_id'] = $this->session->data['tk_checkout']['sameday']['city_id'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['city'])) {
			$data['city'] = $this->session->data['tk_checkout']['sameday']['city'];
		}
		
		if (!empty($this->session->data['tk_checkout']['sameday']['address'])) {
			$data['address'] = $this->session->data['tk_checkout']['sameday']['address'];
		}
		
		$data['sameday_counties'] = array();
		$data['counties_pages'] = 1;
		$sameday_counties = $this->getCounties($data['country_iso']);
		
		if (!empty($sameday_counties['data'])) {
			foreach ($sameday_counties['data'] as $sameday_county) {
				if ($this->config->get('config_language') != 'bg' && $this->config->get('config_language') != 'bg-bg' && $this->config->get('config_language') != 'bulgarian') {
					$sameday_county_name = $sameday_county['latinName'];
				} else {
					$sameday_county_name = $sameday_county['name'];
				}
				
				$data['sameday_counties'][] = array(
					'county_id' => $sameday_county['id'],
					'county'    => $sameday_county_name
				);
			}
			$data['counties_pages'] = $sameday_counties['pages'];
		}
		
		$data['sameday_cities'] = array();
		$data['cities_pages'] = 1;
		if ($data['county_id']) {
			$sameday_cities = $this->getCities($data['country_iso'], $data['county_id']);
			
			if (!empty($sameday_cities['data'])) {
				foreach ($sameday_cities['data'] as $sameday_city) {
					if ($this->config->get('config_language') != 'bg' && $this->config->get('config_language') != 'bg-bg' && $this->config->get('config_language') != 'bulgarian') {
						$sameday_county_name = $sameday_city['latinName'];
					} else {
						$sameday_county_name = $sameday_city['name'];
					}
					
					$data['sameday_cities'][] = array(
						'city_id'  => $sameday_city['id'],
						'city'     => $sameday_county_name,
						'postcode' => $sameday_city['postalCode']
					);
				}
				
				$data['cities_pages'] = $sameday_cities['pages'];
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/sameday_address', $data));
	}
	
	// обработваме данните за доставка
	public function addSamedayData($data) {
		
		$return = array();
		
		$this->load->language('extension/shipping/tk_sameday');
		
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
		$return['service'] = $data['service'];
		
		$country = $this->model_extension_module_tk_checkout->getCountryByIso2($data['country_iso']);
		$return['country'] = $country['name'];
		$return['country_id'] = $country['country_id'];
		
		$return['zone_code'] = 'service';
		$return['shipping_to'] = $data['shipping_to'];
		
		$return['postcode'] = '';
		$return['county_id'] = '';
		$return['county'] = '';
		$return['city_id'] = '';
		$return['city'] = '';
		$return['address'] = '';
		$return['locker_postcode'] = '';
		$return['locker_county_id'] = '';
		$return['locker_county'] = '';
		$return['locker_city_id'] = '';
		$return['locker_city'] = '';
		$return['locker_locker_id'] = '';
		$return['locker_name'] = '';
		$return['locker_address'] = '';
		
		if (!empty($data['sameday_customer_id']) && !empty($data['customer_type']) && $data['customer_type'] == 'existing') {
			
			$sameday_customer_info = $this->getCustomer($return['country_iso'], $return['service'], $return['shipping_to'], $data['sameday_customer_id']);
			
			$return['customer_type'] = 'existing';
			$return['sameday_customer_id'] = $data['sameday_customer_id'];
			
			$return['country'] = $sameday_customer_info['country'];
			$return['country_iso'] = $sameday_customer_info['country_iso'];
			$return['country_id'] = $sameday_customer_info['country_id'];
			
			if ($sameday_customer_info['shipping_to'] == 'locker') {
				$return['locker_postcode'] = $sameday_customer_info['postcode'];
				$return['locker_county_id'] = $sameday_customer_info['county_id'];
				$return['locker_county'] = $sameday_customer_info['county'];
				$return['locker_city_id'] = $sameday_customer_info['city_id'];
				$return['locker_city'] = $sameday_customer_info['city'];
				$return['locker_id'] = $sameday_customer_info['locker_id'];
				$return['locker_name'] = $sameday_customer_info['locker_name'];
				$return['locker_address'] = $sameday_customer_info['locker_address'];
			} else {
				$return['postcode'] = $sameday_customer_info['postcode'];
				$return['country'] = $sameday_customer_info['country'];
				$return['country_iso'] = $sameday_customer_info['country_iso'];
				$return['country_id'] = $sameday_customer_info['country_id'];
				$return['county_id'] = $sameday_customer_info['county_id'];
				$return['county'] = $sameday_customer_info['county'];
				$return['city_id'] = $sameday_customer_info['city_id'];
				$return['city'] = $sameday_customer_info['city'];
				$return['address'] = $sameday_customer_info['address'];
			}
		} else {
			
			$return['customer_type'] = 'new';
			
			if (!empty($data['postcode'])) {
				$return['postcode'] = $data['postcode'];
			}
			
			if (!empty($data['county_id'])) {
				$return['county_id'] = $data['county_id'];
			}
			
			if (!empty($data['county'])) {
				$return['county'] = $data['county'];
			}
			
			if (!empty($data['city_id'])) {
				$return['city_id'] = $data['city_id'];
			}
			
			if (!empty($data['city'])) {
				$return['city'] = $data['city'];
			}
			
			if (!empty($data['address'])) {
				$return['address'] = $data['address'];
			}
			
			if (!empty($data['locker_postcode'])) {
				$return['locker_postcode'] = $data['locker_postcode'];
			}
			
			if (!empty($data['locker_county_id'])) {
				$return['locker_county_id'] = $data['locker_county_id'];
			}
			
			if (!empty($data['locker_county'])) {
				$return['locker_county'] = $data['locker_county'];
			}
			
			if (!empty($data['locker_city_id'])) {
				$return['locker_city_id'] = $data['locker_city_id'];
			}
			
			if (!empty($data['locker_city'])) {
				$return['locker_city'] = $data['locker_city'];
			}
			
			if (!empty($data['locker_id'])) {
				$return['locker_id'] = $data['locker_id'];
			}
			
			if (!empty($data['locker_name'])) {
				$return['locker_name'] = $data['locker_name'];
			}
			
			if (!empty($data['locker_address'])) {
				$return['locker_address'] = $data['locker_address'];
			}
		}
		
		$return['address_1'] = '';
		
		if (empty($data['sameday_customer_id']) || empty($data['customer_type']) || $data['customer_type'] == 'new') {
			if ($data['shipping_to'] == 'locker') {
				if (empty($return['locker_id'])) {
					$error['sameday_locker_select'] = $this->language->get('error_machine');
				} else {
					$return['address_1'] = $return['locker_id'] . ' - ' . $return['locker_name'] . ' - ' . $return['locker_address'];
				}
			} else if ($data['shipping_to'] == 'address') {
				
				$return['address_1'] = '';
				
				if (!$return['address'] || utf8_strlen(trim($return['address'])) < 3) {
					$error['address'] = $this->language->get('error_address');
				} else {
					$return['address_1'] .= $data['address'];
				}
				
				if (!$return['county']) {
					$error['sameday_address_county_select'] = $this->language->get('error_county');
				}
				
				if (!$return['city']) {
					$error['sameday_address_city_select'] = $this->language->get('error_city');
				}
			}
		}
		
		if (isset($error) && $error) {
			$return['error'] = $error;
		}
		
		return $return;
	}
	
	public function saveData() {
		
		if (isset($this->request->post['firstname'])) {
			$this->session->data['tk_checkout']['sameday']['name'] = trim($this->request->post['firstname']);
		}
		
		if (isset($this->request->post['lastname']) && isset($this->session->data['tk_checkout']['sameday']['name'])) {
			$this->session->data['tk_checkout']['sameday']['name'] = ' ' . trim($this->request->post['lastname']);
		}
		
		if (isset($this->request->post['telephone'])) {
			$this->session->data['tk_checkout']['sameday']['phone'] = filter_var($this->request->post['telephone'], FILTER_SANITIZE_NUMBER_INT);
		}
		
		if (isset($this->request->post['email'])) {
			$this->session->data['tk_checkout']['sameday']['email'] = filter_var($this->request->post['email'], FILTER_SANITIZE_EMAIL);
		}
		
		if (isset($this->request->post['service'])) {
			$this->session->data['tk_checkout']['sameday']['service'] = $this->request->post['service'];
		}
		
		if (isset($this->request->post['sameday_customer_id'])) {
			$this->session->data['tk_checkout']['sameday']['sameday_customer_id'] = $this->request->post['sameday_customer_id'];
		}
		
		if (isset($this->request->post['zone'])) {
			$this->session->data['tk_checkout']['sameday']['zone'] = $this->request->post['zone'];
		}
		
		if (isset($this->request->post['zone_id'])) {
			$this->session->data['tk_checkout']['sameday']['zone_id'] = $this->request->post['zone_id'];
		}
		
		if (isset($this->request->post['country_id'])) {
			$this->session->data['tk_checkout']['sameday']['country_id'] = $this->request->post['country_id'];
		}
		
		if (isset($this->request->post['country_iso'])) {
			$this->session->data['tk_checkout']['sameday']['country_iso'] = $this->request->post['country_iso'];
		}
		
		if (isset($this->request->post['postcode'])) {
			$this->session->data['tk_checkout']['sameday']['postcode'] = $this->request->post['postcode'];
		}
		
		if (isset($this->request->post['county'])) {
			$this->session->data['tk_checkout']['sameday']['county'] = $this->request->post['county'];
		}
		
		if (isset($this->request->post['county_id'])) {
			$this->session->data['tk_checkout']['sameday']['county_id'] = $this->request->post['county_id'];
		}
		
		if (isset($this->request->post['city'])) {
			$this->session->data['tk_checkout']['sameday']['city'] = $this->request->post['city'];
		}
		
		if (isset($this->request->post['city_id'])) {
			$this->session->data['tk_checkout']['sameday']['city_id'] = $this->request->post['city_id'];
		}
		
		if (isset($this->request->post['address'])) {
			$this->session->data['tk_checkout']['sameday']['address'] = $this->request->post['address'];
		}
		
		if (isset($this->request->post['locker_postcode'])) {
			$this->session->data['tk_checkout']['sameday']['locker_postcode'] = $this->request->post['locker_postcode'];
		}
		
		if (isset($this->request->post['locker_county'])) {
			$this->session->data['tk_checkout']['sameday']['locker_county'] = $this->request->post['locker_county'];
		}
		
		if (isset($this->request->post['locker_county_id'])) {
			$this->session->data['tk_checkout']['sameday']['locker_county_id'] = $this->request->post['locker_county_id'];
		}
		
		if (isset($this->request->post['locker_city'])) {
			$this->session->data['tk_checkout']['sameday']['locker_city'] = $this->request->post['locker_city'];
		}
		
		if (isset($this->request->post['locker_city_id'])) {
			$this->session->data['tk_checkout']['sameday']['locker_city_id'] = $this->request->post['locker_city_id'];
		}
		
		if (isset($this->request->post['locker_id'])) {
			$this->session->data['tk_checkout']['sameday']['locker_id'] = $this->request->post['locker_id'];
		}
		
		if (isset($this->request->post['locker_name'])) {
			$this->session->data['tk_checkout']['sameday']['locker_name'] = $this->request->post['locker_name'];
		}
		
		if (isset($this->request->post['locker_address'])) {
			$this->session->data['tk_checkout']['sameday']['locker_address'] = $this->request->post['locker_address'];
		}
		
		if (isset($this->request->post['customer_type'])) {
			$this->session->data['tk_checkout']['sameday']['customer_type'] = $this->request->post['customer_type'];
		}
	}
	
	// обработваме данните за клиента
	public function addCustomer($data) {
		
		if (!empty($data['service'])) {
			$service = $data['service'];
		} else {
			$service = '0';
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
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$sameday_address = TkSameday::getDefault();
			if (!empty($sameday_address[$country_iso])) {
				$default_address = $sameday_address[$country_iso];
			}
		} catch (\Exception $e) {
			if ($this->config->get('shipping_tk_sameday_debug')) {
				$this->log->write('Sameday: addCustomer | getDefault');
				$this->log->write($e->getMessage());
			}
		}
		
		if (!empty($default_address['country_id'])) {
			$country_id = $default_address['country_id'];
		} else {
			$country_id = '';
		}
		
		if (!empty($data['shipping_to'])) {
			$shipping_to = $data['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['postcode'])) {
			$postcode = $data['postcode'];
		} else if (!empty($data['locker_postcode'])) {
			$postcode = $data['locker_postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['county'])) {
			$county = $data['county'];
		} else if (!empty($data['locker_county'])) {
			$county = $data['locker_county'];
		} else {
			$county = '';
		}
		
		if (!empty($data['county_id'])) {
			$county_id = $data['county_id'];
		} else if (!empty($data['locker_county_id'])) {
			$county_id = $data['locker_county_id'];
		} else {
			$county_id = '';
		}
		
		if (!empty($data['city'])) {
			$city = $data['city'];
		} else if (!empty($data['locker_city'])) {
			$city = $data['locker_city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['city_id'])) {
			$city_id = $data['city_id'];
		} else if (!empty($data['locker_city_id'])) {
			$city_id = $data['locker_city_id'];
		} else {
			$city_id = '';
		}
		
		if (!empty($data['address'])) {
			$address = $data['address'];
		} else {
			$address = '';
		}
		
		if (!empty($data['locker_id']) && $data['locker_id'] > 0) {
			$locker_id = $data['locker_id'];
		} else {
			$locker_id = '';
		}
		
		if (!empty($data['locker_name'])) {
			$locker_name = $data['locker_name'];
		} else {
			$locker_name = '';
		}
		
		if (!empty($data['locker_address'])) {
			$locker_address = $data['locker_address'];
		} else {
			$locker_address = '';
		}
		
		$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_sameday_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND (address = '" . $this->db->escape($address) . "' OR locker_id = '" . (int)$locker_id . "')");
		
		if (!$address_query->num_rows) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_customer SET customer_id = '" . (int)$this->customer->getId() . "', service = '" . (int)$service . "', country = '" . $this->db->escape($country) . "', country_id = '" . (int)$country_id . "', country_iso = '" . $this->db->escape($country_iso) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', county = '" . $this->db->escape($county) . "', county_id = '" . (int)$county_id . "', city = '" . $this->db->escape($city) . "', city_id = '" . (int)$city_id . "', address = '" . $this->db->escape($address) . "', postcode = '" . $this->db->escape($postcode) . "', locker_id = '" . (int)$locker_id . "', locker_name = '" . $this->db->escape($locker_name) . "', locker_address = '" . $this->db->escape($locker_address) . "'");
		}
	}
	
	public function getCustomer($country_iso, $service, $shipping_to, $sameday_customer_id = NULL) {
		
		if ($sameday_customer_id != NULL) {
			$sql = "SELECT DISTINCT * FROM " . DB_PREFIX . "tk_sameday_customer WHERE sameday_customer_id = '" . (int)$sameday_customer_id . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND service = '" . (int)$service . "'";
		} else {
			$sql = "SELECT DISTINCT * FROM " . DB_PREFIX . "tk_sameday_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND service = '" . (int)$service . "' ORDER BY sameday_customer_id ASC LIMIT 1 ";
		}
		
		$address_query = $this->db->query($sql);
		
		return $address_query->row;
	}
	
	public function getCustomers($country_iso, $service, $shipping_to) {
		
		$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_sameday_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND country_iso = '" . $this->db->escape($country_iso) . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND service = '" . (int)$service . "'");
		
		return $address_query->rows;
	}
	
	// обработваме данните за поръчката
	public function addOrder($data, $order_id = 0) {
		
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		
		if (!empty($data['service'])) {
			$service = $data['service'];
		} else {
			$service = '0';
		}
		
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
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$sameday_address = TkSameday::getDefault();
			if (!empty($sameday_address[$country_iso])) {
				$default_address = $sameday_address[$country_iso];
			}
		} catch (\Exception $e) {
			if ($this->config->get('shipping_tk_sameday_debug')) {
				$this->log->write('Sameday: addOrder | getDefault');
				$this->log->write($e->getMessage());
			}
		}
		
		if (!empty($default_address['country_id'])) {
			$country_id = $default_address['country_id'];
		} else {
			$country_id = '';
		}
		
		if (!empty($data['shipping_to'])) {
			$shipping_to = $data['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['postcode'])) {
			$postcode = $data['postcode'];
		} else if (!empty($data['locker_postcode'])) {
			$postcode = $data['locker_postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['county'])) {
			$county = $data['county'];
		} else if (!empty($data['locker_county'])) {
			$county = $data['locker_county'];
		} else {
			$county = '';
		}
		
		if (!empty($data['county_id'])) {
			$county_id = $data['county_id'];
		} else if (!empty($data['locker_county_id'])) {
			$county_id = $data['locker_county_id'];
		} else {
			$county_id = '';
		}
		
		if (!empty($data['city'])) {
			$city = $data['city'];
		} else if (!empty($data['locker_city'])) {
			$city = $data['locker_city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['city_id'])) {
			$city_id = $data['city_id'];
		} else if (!empty($data['locker_city_id'])) {
			$city_id = $data['locker_city_id'];
		} else {
			$city_id = '';
		}
		
		if (!empty($data['address'])) {
			$address = $data['address'];
		} else {
			$address = '';
		}
		
		if (!empty($data['locker_id']) && $data['locker_id'] > 0) {
			$locker_id = $data['locker_id'];
		} else {
			$locker_id = '';
		}
		
		if (!empty($data['locker_name'])) {
			$locker_name = $data['locker_name'];
		} else {
			$locker_name = '';
		}
		
		if (!empty($data['locker_address'])) {
			$locker_address = $data['locker_address'];
		} else {
			$locker_address = '';
		}
		
		$sameday_setting = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		$sameday_country = $sameday_setting['shipping_tk_sameday_countries'][$country_iso];
		
		$weight = 0;
		if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
			$weight = $this->cart->getWeight();
		}
		// тегло ако в количката е 0
		if ($weight == 0) {
			if (!empty($sameday_country['services'][$service]['weight_total']) && $sameday_country['services'][$service]['weight_total'] > 0) {
				$weight_total = $sameday_country['services'][$service]['weight_total'];
			} else {
				$weight_total = 1;
			}
			
			$weight = $weight_total * $this->cart->countProducts();
		}
		
		if (!empty($sameday_country['services'][$service]['weight_type']) && $sameday_country['services'][$service]['weight_type'] == 'gram') {
			$weight = $weight / 1000;
		}
		
		if ($weight < 0.01) {
			$weight = 0.01;
		}
		
		// сума на количката
		if (!empty($sameday_country['services'][$service]['totals'])) {
			$total = $this->model_extension_module_tk_checkout->getSelectedTotals($sameday_country['services'][$service]['totals']);
		} else {
			$total = $this->model_extension_module_tk_checkout->getSubAndTax();
		}
		
		if (isset($data['payment_code'])) {
			$payment_code = $data['payment_code'];
		} else {
			$payment_code = '';
		}
		
		//товарителница
		if (isset($shipment['awb'])) {
			$shipment_number = $shipment['awb'];
		} else {
			$shipment_number = NULL;
		}
		
		if (isset($shipment['status'])) {
			$shipment_status_txt = $shipment['status'];
		} else {
			$shipment_status_txt = '';
		}
		
		if (isset($shipment['status_id'])) {
			$status_id = $shipment['status_id'];
		} else {
			$status_id = 0;
		}
		
		if (isset($shipment['shipment_status'])) {
			$shipment_status = $shipment['shipment_status'];
		} else {
			$shipment_status = '';
		}
		
		if (isset($shipment['shipment'])) {
			$shipment = $shipment['shipment'];
		} else {
			$shipment = array();
		}
		
		if (isset($shipment['pdf'])) {
			$pdf = $shipment['pdf'];
		} else {
			$pdf = '';
		}
		
		if (isset($shipment['delivery_date'])) {
			$delivery_date = $shipment['delivery_date'];
		} else {
			$delivery_date = '0000-00-00';
		}
		
		if (isset($shipment['mail_send'])) {
			$mail_send = $shipment['mail_send'];
		} else {
			$mail_send = 0;
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_order SET order_id = '" . (int)$order_id . "', status_id = '" . (int)$status_id . "', service = '" . (int)$service . "', name = '" . $this->db->escape($name) . "', phone = '" . $this->db->escape($phone) . "', email = '" . $this->db->escape($email) . "', country = '" . $this->db->escape($country) . "', country_id = '" . (int)$country_id . "', country_iso = '" . $this->db->escape($country_iso) . "', shipping_to = '" . $this->db->escape($shipping_to) . "', county = '" . $this->db->escape($county) . "', county_id = '" . (int)$county_id . "', city = '" . $this->db->escape($city) . "', city_id = '" . (int)$city_id . "', address = '" . $this->db->escape($address) . "', postcode = '" . $this->db->escape($postcode) . "', locker_id = '" . (int)$locker_id . "', locker_name = '" . $this->db->escape($locker_name) . "', locker_address = '" . $this->db->escape($locker_address) . "', weight = '" . $this->db->escape($weight) . "', total = '" . $this->db->escape($total) . "', payment_code = '" . $this->db->escape($payment_code) . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', shipment = '" . $this->db->escape(json_encode($shipment)) . "', pdf = '" . $this->db->escape($pdf) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', mail_send = '" . $this->db->escape($mail_send) . "', data = '" . $this->db->escape(json_encode($data)) . "'");
		
		return $this->db->getLastId();
	}
	
	public function editShipment($order_id, $shipment = array()) {
		
		$this->load->model('extension/module/tk_checkout');
		
		//товарителница
		if (isset($shipment['awb'])) {
			$shipment_number = $shipment['awb'];
		} else {
			$shipment_number = NULL;
		}
		
		if (isset($shipment['status'])) {
			$shipment_status_txt = $shipment['status'];
		} else {
			$shipment_status_txt = '';
		}
		
		if (isset($shipment['status_id'])) {
			$status_id = $shipment['status_id'];
		} else {
			$status_id = 0;
		}
		
		if (isset($shipment['shipment_status'])) {
			$shipment_status = $shipment['shipment_status'];
		} else {
			$shipment_status = '';
		}
		
		if (isset($shipment['shipment'])) {
			$shipment = $shipment['shipment'];
		} else {
			$shipment = array();
		}
		
		if (isset($shipment['pdf'])) {
			$pdf = $shipment['pdf'];
		} else {
			$pdf = '';
		}
		
		if (isset($shipment['delivery_date'])) {
			$delivery_date = $shipment['delivery_date'];
		} else {
			$delivery_date = '0000-00-00';
		}
		
		if (isset($shipment['mail_send'])) {
			$mail_send = $shipment['mail_send'];
		} else {
			$mail_send = 0;
		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_sameday_order SET status_id = '" . (int)$status_id . "', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status_txt = '" . $this->db->escape($shipment_status_txt) . "', shipment_status = '" . (int)$shipment_status . "', shipment = '" . $this->db->escape(json_encode($shipment)) . "', pdf = '" . $this->db->escape($pdf) . "', delivery_date = '" . $this->db->escape($delivery_date) . "', mail_send = '" . $this->db->escape($mail_send) . "' WHERE order_id  = '" . (int)$order_id . "'");
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_order WHERE shipment_status NOT IN ('9', '15', '16', '18', '77', '94')  OR shipment_status is NULL AND status_id > 0");
		
		return $query->rows;
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	// данни за офиси и адреси
	public function getLockersCounties($country_iso) {
		
		$query = $this->db->query("SELECT county_id, county FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "' GROUP BY county_id ORDER BY county");
		
		return $query->rows;
	}
	
	public function getLockersCities($country_iso, $county_id) {
		
		$query = $this->db->query("SELECT city_id, city, postcode FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "' AND county_id = '" . (int)$county_id . "' GROUP BY city_id ORDER BY city");
		
		return $query->rows;
	}
	
	public function getLockers($country_iso, $city_id) {
		
		$query = $this->db->query("SELECT locker_id, name, address FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "' AND city_id = '" . (int)$city_id . "' GROUP BY locker_id ORDER BY name");
		
		return $query->rows;
	}
	
	public function getCounties($country_iso, $page = 1, $name = false) {
		
		$cities = array();
		
		$data['page'] = $page;
		$data['countryCode'] = $country_iso;
		
		if ($name) {
			$data['name'] = $name;
		}
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$cities = TkSameday::getCounty($data);
		} catch (\Exception $e) {
			$cities['error_warning'] = $e->getMessage();
		}
		
		return $cities;
	}
	
	public function getCities($country_iso, $county_id, $page = 1, $name = false) {
		
		$cities = array();
		
		$data['page'] = $page;
		$data['countryCode'] = $country_iso;
		$data['county'] = $county_id;
		
		if ($name) {
			$data['name'] = $name;
		}
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		try {
			$cities = TkSameday::getCity($data);
		} catch (\Exception $e) {
			$cities['error_warning'] = $e->getMessage();
		}
		
		return $cities;
	}
	
	// ъпдейт на автомати с крон
	public function updateLocker($lockers, $country_iso) {
		
		foreach ($lockers as $data) {
			$get_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_sameday_locker WHERE locker_id = '" . (int)$data['lockerId'] . "'");
			
			if (!$get_query->num_rows) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "tk_sameday_locker SET locker_id = '" . (int)$data['lockerId'] . "', name = '" . $this->db->escape($data['name']) . "', country_id = '" . (int)$data['countryId'] . "', country = '" . $this->db->escape($data['country']) . "', country_iso = '" . $this->db->escape($country_iso) . "', county_id = '" . (int)$data['countyId'] . "', county = '" . $this->db->escape($data['county']) . "', city_id = '" . (int)$data['cityId'] . "', city = '" . $this->db->escape($data['city']) . "', postcode = '" . $this->db->escape($data['postalCode']) . "', address = '" . $this->db->escape($data['address']) . "'");
			}
		}
	}
	
	// ъпдейт на товарителници с крон
	public function track($shipment_number) {
		
		$result = array();
		
		$this->load->library('tksameday');
		if (!isset($this->tksameday)) {
			$this->tksameday = new TkSameday($this->registry);
		}
		
		try {
			$result = TkSameday::getShipment($shipment_number);
		} catch (\Exception $e) {
			if ($this->config->get('shipping_tk_sameday_debug')) {
				$this->log->write('SamedayLevel: | trackShipments');
				$this->log->write($e->getMessage());
			}
			
			$result['message'] = "Invalid response.";
		}
		
		return $result;
	}
}