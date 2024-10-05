<?php

class ModelExtensionShippingTkEcont extends Model {
	
	public function getQuote($address) {
		
		$this->load->language('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_tk_econt_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
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
		
		if (!$this->config->get('shipping_tk_econt_geo_zone_id')) {
			$status = true;
		} else if ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
		
		if (!$this->config->get('module_tk_checkout_token')) {
			$status = false;
		}
		
		if ($address['country_iso'] != 'BG') {
			$status = false;
		}
		
		$method_data = array();
		
		if ($status) {
			$quote_data = array();
			
			// данни за метода на доставка в сесия
			if (!empty($address['shipping_method'])) {
				$shipping_method = $address['shipping_method'];
				
				$shipping = explode('.', $shipping_method);
				
				if (isset($shipping[1]) && !empty($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {
					$this->session->data['shipping_method'] = $this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]];
				}
			}
			
			// данни за текущата валута
			if (!empty($this->session->data['currency'])) {
				$currency = $this->session->data['currency'];
			} else {
				$currency = $this->config->get('config_currency');
			}
			
			//данни за адреса
			if (!empty($this->session->data['tk_checkout']['econt']['econt_office_postcode'])) {
				$address['post_code'] = $this->session->data['tk_checkout']['econt']['econt_office_postcode'];
			} else if (!empty($this->session->data['tk_checkout']['econt']['econt_address_postcode'])) {
				$address['post_code'] = $this->session->data['tk_checkout']['econt']['econt_address_postcode'];
			} else {
				$address['post_code'] = '1000';
			}
			
			if (!empty($this->session->data['tk_checkout']['econt']['econt_address_city'])) {
				$address['city'] = $this->session->data['tk_checkout']['econt']['econt_address_city'];
			} else {
				$address['city'] = 'София';
			}
			
			if (!empty($this->session->data['tk_checkout']['econt']['econt_office_code'])) {
				$address['office_code'] = $this->session->data['tk_checkout']['econt']['econt_office_code'];
			} else {
				$address['office_code'] = '1001';
			}
			
			if (!empty($this->session->data['tk_checkout']['econt']['econt_machine_code'])) {
				$address['machine_code'] = $this->session->data['tk_checkout']['econt']['econt_machine_code'];
			} else {
				$machine_codes = $this->getMachine();
				if ($machine_codes) {
					$address['machine_code'] = $machine_codes['office_code'];
				} else {
					$address['machine_code'] = false;
				}
			}
			
			// данни за теглото
			if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
				$weight = $this->cart->getWeight();
			} else if ($this->config->get('shipping_tk_econt_weight_total') && $this->config->get('shipping_tk_econt_weight_total') > 0) {
				$weight = $this->config->get('shipping_tk_econt_weight_total') * $this->cart->countProducts();
			} else {
				$weight = 1 * $this->cart->countProducts();
			}
			
			if ($this->config->get('shipping_tk_econt_weight_type') && $this->config->get('shipping_tk_econt_weight_type') == 'gram') {
				$weight = $weight / 1000;
			}
			
			if ($weight < 0.01) {
				$weight = 0.01;
			}
			
			// данни за сумата на тоталите
			$tk_totals = $this->config->get('shipping_tk_econt_totals');
			if ($tk_totals) {
				if ($this->config->get('shipping_tk_econt_shipping_in')) {
					$tk_totals['shipping'] = 'shipping';
				}
				
				$total = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_totals);
			} else {
				$total = $this->model_extension_module_tk_checkout->getSubAndTax();
			}
			
			// платежен метод
			if (!empty($address['payment_method'])) {
				$payment_method = $address['payment_method'];
			} else if (!empty($this->session->data['payment_method']['code'])) {
				$payment_method = $this->session->data['payment_method']['code'];
			} else {
				if ($this->config->get('payment_bank_transfer_sort_order') && $this->config->get('payment_cod_sort_order') && $this->config->get('payment_cod_sort_order') > $this->config->get('payment_bank_transfer_sort_order')) {
					$payment_method = 'bank_transfer';
				} else {
					$payment_method = 'cod';
				}
			}
			
			// разрешено тегло
			if ($this->config->get('shipping_tk_econt_machine_weight') > 0) {
				$machine_weight = $this->config->get('shipping_tk_econt_machine_weight');
			} else {
				$machine_weight = 50;
			}
			
			if ($this->config->get('shipping_tk_econt_office_weight') > 0) {
				$office_weight = $this->config->get('shipping_tk_econt_office_weight');
			} else {
				$office_weight = 50;
			}
			
			if ($this->config->get('shipping_tk_econt_address_weight') > 0) {
				$address_weight = $this->config->get('shipping_tk_econt_address_weight');
			} else {
				$address_weight = 2000;
			}
			
			// разрешени методи
			if (!$this->config->get('shipping_tk_econt_machine_enabled') || $weight > $machine_weight) {
				$to_machine = false;
			} else {
				$to_machine = true;
			}
			
			if (!$this->config->get('shipping_tk_econt_office_enabled') || $weight > $office_weight) {
				$to_office = false;
			} else {
				$to_office = true;
			}
			
			if (!$this->config->get('shipping_tk_econt_address_enabled') || $weight > $address_weight) {
				$to_door = false;
			} else {
				$to_door = true;
			}
			
			// подредба на методите
			if ($this->config->get('shipping_tk_econt_machine_sort') > 0) {
				$machine_sort = $this->config->get('shipping_tk_econt_machine_sort');
			} else {
				$machine_sort = 1;
			}
			
			if ($this->config->get('shipping_tk_econt_office_sort') > 0) {
				$office_sort = $this->config->get('shipping_tk_econt_office_sort');
			} else {
				$office_sort = 2;
			}
			
			if ($this->config->get('shipping_tk_econt_address_sort') > 0) {
				$address_sort = $this->config->get('shipping_tk_econt_address_sort');
			} else {
				$address_sort = 3;
			}
			
			// корекция в текстовете
			if ($this->config->get('shipping_tk_econt_text')) {
				$tk_text_array = $this->config->get('shipping_tk_econt_text');
				$tk_text = $tk_text_array[$this->config->get('config_language_id')];
			}
			
			if (isset($tk_text['machine_title']) && $tk_text['machine_title']) {
				$text_machine_title = $tk_text['machine_title'];
			} else {
				$text_machine_title = $this->language->get('text_to_machine');
			}
			
			if (isset($tk_text['machine_text']) && $tk_text['machine_text']) {
				$text_machine_text = $tk_text['machine_text'];
			} else {
				$text_machine_text = '';
			}
			
			if (isset($tk_text['office_title']) && $tk_text['office_title']) {
				$text_office_title = $tk_text['office_title'];
			} else {
				$text_office_title = $this->language->get('text_to_office');
			}
			
			if (isset($tk_text['office_text']) && $tk_text['office_text']) {
				$text_office_text = $tk_text['office_text'];
			} else {
				$text_office_text = '';
			}
			
			if (isset($tk_text['address_title']) && $tk_text['address_title']) {
				$text_address_title = $tk_text['address_title'];
			} else {
				if ($weight > 249.99) {
					$text_address_title = $this->language->get('text_to_door_50');
				} else {
					$text_address_title = $this->language->get('text_to_door');
				}
			}
			
			if (isset($tk_text['address_text']) && $tk_text['address_text']) {
				$text_address_text = $tk_text['address_text'];
			} else {
				$text_address_text = '';
			}
			
			// разрешена ли е безплатна доставка
			$free_machine = 0;
			$free_office = 0;
			$free_door = 0;
			
			// килограми за безплатна доставка
			$free_machine_weight = false;
			$free_office_weight = false;
			$free_door_weight = false;
			
			// стартираме с празна цена
			$price_machine = 0;
			$price_office = 0;
			$price_door = 0;
			
			$price_machine_text = '';
			$price_office_text = '';
			$price_door_text = '';
			
			if ($this->config->get('total_shipping_status')) {
				
				// тегло за безплатна доставка
				if (($this->config->get('shipping_tk_econt_machine_free_weight') && $this->config->get('shipping_tk_econt_machine_free_weight') > 0 && $this->config->get('shipping_tk_econt_machine_free_weight') >= $weight) || !$this->config->get('shipping_tk_econt_machine_free_weight') || $this->config->get('shipping_tk_econt_machine_free_weight') == 0) {
					$free_machine_weight = true;
				}
				
				if (($this->config->get('shipping_tk_econt_office_free_weight') && $this->config->get('shipping_tk_econt_office_free_weight') > 0 && $this->config->get('shipping_tk_econt_office_free_weight') >= $weight) || !$this->config->get('shipping_tk_econt_office_free_weight') || $this->config->get('shipping_tk_econt_office_free_weight') == 0) {
					$free_office_weight = true;
				}
				
				if (($this->config->get('shipping_tk_econt_door_free_weight') && $this->config->get('shipping_tk_econt_door_free_weight') > 0 && $this->config->get('shipping_tk_econt_door_free_weight') >= $weight) || !$this->config->get('shipping_tk_econt_door_free_weight') || $this->config->get('shipping_tk_econt_door_free_weight') == 0) {
					$free_door_weight = true;
				}
				
				// безплатна доставка спрямо модула на доставчика
				if ($this->config->get('shipping_tk_econt_machine_free') && $this->config->get('shipping_tk_econt_machine_free') > 0 && $total >= $this->config->get('shipping_tk_econt_machine_free') && $free_machine_weight) {
					if ($this->config->get('shipping_tk_econt_cod_sum') == 3) {
						$free_machine = 2;
					} else {
						$free_machine = 1;
					}
				}
				
				if ($this->config->get('shipping_tk_econt_office_free') && $this->config->get('shipping_tk_econt_office_free') > 0 && $total >= $this->config->get('shipping_tk_econt_office_free') && $free_office_weight) {
					if ($this->config->get('shipping_tk_econt_cod_sum') == 3) {
						$free_office = 2;
					} else {
						$free_office = 1;
					}
				}
				
				if ($this->config->get('shipping_tk_econt_door_free') && $this->config->get('shipping_tk_econt_door_free') > 0 && $total >= $this->config->get('shipping_tk_econt_door_free') && $free_door_weight) {
					if ($this->config->get('shipping_tk_econt_cod_sum') == 3) {
						$free_door = 2;
					} else {
						$free_door = 1;
					}
				}
				
				// безплатна доставка от купон
				if (isset($this->session->data['coupon'])) {
					$this->load->model('extension/total/coupon');
					$coupon_info = $this->model_extension_total_coupon->getCoupon($this->session->data['coupon']);
					if (isset($coupon_info['shipping']) && $coupon_info['shipping'] == 1) {
						if ($this->config->get('shipping_tk_econt_cod_sum') == 3) {
							$free_machine = 2;
							$free_office = 2;
							$free_door = 2;
						} else {
							$free_machine = 1;
							$free_office = 1;
							$free_door = 1;
						}
					}
				}
				
				// цена за доставка от апи
				if ($this->config->get('shipping_tk_econt_calculate_enabled')) {
					if ($to_machine && $free_machine != 1) {
						$price_machine = $this->getPrices('machine', $address, $total, $weight, $payment_method, $free_machine);
						
						if ($price_machine == 0 && $this->config->get('shipping_tk_econt_machine_fixed_cost') && $this->config->get('shipping_tk_econt_machine_fixed_cost') > 0) {
							$price_machine = round($this->config->get('shipping_tk_econt_machine_fixed_cost'), 2);
						}
					}
					
					if ($to_office && $free_office != 1) {
						$price_office = $this->getPrices('office', $address, $total, $weight, $payment_method, $free_office);
						
						if ($price_office == 0 && $this->config->get('shipping_tk_econt_office_fixed_cost') && $this->config->get('shipping_tk_econt_office_fixed_cost') > 0) {
							$price_office = round($this->config->get('shipping_tk_econt_office_fixed_cost'), 2);
						}
					}
					
					if ($to_door && $free_door != 1) {
						$price_door = $this->getPrices('door', $address, $total, $weight, $payment_method, $free_door);
						
						if ($price_door == 0 && $this->config->get('shipping_tk_econt_door_fixed_cost') && $this->config->get('shipping_tk_econt_door_fixed_cost') > 0) {
							$price_door = round($this->config->get('shipping_tk_econt_door_fixed_cost'), 2);
						}
					}
				} else {
					// фиксирана цена
					if ($this->config->get('shipping_tk_econt_machine_fixed_cost') && $this->config->get('shipping_tk_econt_machine_fixed_cost') > 0 && $free_machine != 1) {
						$price_machine = round($this->config->get('shipping_tk_econt_machine_fixed_cost'), 2);
					}
					
					if ($this->config->get('shipping_tk_econt_office_fixed_cost') && $this->config->get('shipping_tk_econt_office_fixed_cost') > 0 && $free_office != 1) {
						$price_office = round($this->config->get('shipping_tk_econt_office_fixed_cost'), 2);
					}
					
					if ($this->config->get('shipping_tk_econt_door_fixed_cost') && $this->config->get('shipping_tk_econt_door_fixed_cost') > 0 && $free_door != 1) {
						$price_door = round($this->config->get('shipping_tk_econt_door_fixed_cost'), 2);
					}
				}
				
				// цена по тегло
				if ($this->config->get('shipping_tk_econt_weight_value')) {
					foreach ($this->config->get('shipping_tk_econt_weight_value') as $weight_value) {
						if ($weight_value['from'] < $weight && $weight_value['to'] >= $weight) {
							if ($weight_value['type'] == 'machine' && !$free_machine) {
								$price_machine = round($weight_value['price'], 2);
							}
							
							if ($weight_value['type'] == 'office' && !$free_office) {
								$price_office = round($weight_value['price'], 2);
							}
							
							if ($weight_value['type'] == 'door' && !$free_door) {
								$price_door = round($weight_value['price'], 2);
							}
						}
					}
				}
				
				// отстъпка за плащане по банка
				if ($payment_method == 'bank_transfer' && $this->config->get('shipping_tk_econt_bank_fee') && $this->config->get('shipping_tk_econt_bank_fee') > 0) {
					if ($price_machine > 0) {
						$price_machine = round($price_machine - $this->config->get('shipping_tk_econt_bank_fee'), 2);
					}
					
					if ($price_office > 0) {
						$price_office = round($price_office - $this->config->get('shipping_tk_econt_bank_fee'), 2);
					}
					
					if ($price_door > 0) {
						$price_door = round($price_door - $this->config->get('shipping_tk_econt_bank_fee'), 2);
					}
				}
				
				// безплатна доставка от tk_special_shipping
				if ($this->config->get('module_tk_special_shipping_status')) {
					$this->load->model('extension/total/tk_special_shipping');
					
					if ($to_machine && !empty($price_machine) && $price_machine > 0) {
						$tk_special_machine = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_econt.econt_machine');
						
						if (!empty($tk_special_machine['total']) && $tk_special_machine['free'] != 1) {
							if ($tk_special_machine['type'] == 'F' && $tk_special_machine['discount'] > 0) {
								$discount = $tk_special_machine['discount'];
							} else {
								$discount = ($tk_special_machine['discount'] / 100) * $price_machine;
							}
							
							if ($tk_special_machine['sign'] == '-') {
								$price_machine = $price_machine - $discount;
							} else if ($tk_special_machine['sign'] == '+') {
								$price_machine = $price_machine + $discount;
							} else if ($tk_special_machine['sign'] == '=') {
								$price_machine = $discount;
							}
						}
					}
					
					if ($to_office && !empty($price_office) && $price_office > 0) {
						$tk_special_office = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_econt.econt_office');
						
						if (!empty($tk_special_office['total']) && $tk_special_office['free'] != 1) {
							if ($tk_special_office['type'] == 'F' && $tk_special_office['discount'] > 0) {
								$discount = $tk_special_office['discount'];
							} else {
								$discount = ($tk_special_office['discount'] / 100) * $price_office;
							}
							
							if ($tk_special_office['sign'] == '-') {
								$price_office = $price_office - $discount;
							} else if ($tk_special_office['sign'] == '+') {
								$price_office = $price_office + $discount;
							} else if ($tk_special_office['sign'] == '=') {
								$price_office = $discount;
							}
						}
					}
					
					if ($to_door && !empty($price_door) && $price_door > 0) {
						$tk_special_door = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_econt.econt_door');
						
						if (!empty($tk_special_door['total']) && $tk_special_door['free'] != 1) {
							
							if ($tk_special_door['type'] == 'F' && $tk_special_door['discount'] > 0) {
								$discount = $tk_special_door['discount'];
							} else {
								$discount = ($tk_special_door['discount'] / 100) * $price_door;
							}
							
							if ($tk_special_door['sign'] == '-') {
								$price_door = $price_door - $discount;
							} else if ($tk_special_door['sign'] == '+') {
								$price_door = $price_door + $discount;
							} else if ($tk_special_door['sign'] == '=') {
								$price_door = $discount;
							}
						}
					}
				}
				
				// зануляване
				if ($price_machine < 0) {
					$price_machine = 0;
				}
				
				if ($price_office < 0) {
					$price_office = 0;
				}
				
				if ($price_door < 0) {
					$price_door = 0;
				}
				
				// оформяме спрямо валутата
				$price_machine_text = $this->currency->format($price_machine, $currency);
				$price_office_text = $this->currency->format($price_office, $currency);
				$price_door_text = $this->currency->format($price_door, $currency);
			}
			
			//пресмятане на ДДС
			if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_econt_tax_class_id') && $price_machine > 0) {
				$rate = array_values($this->tax->getRates($price_machine, $this->config->get('shipping_tk_econt_tax_class_id')));
				
				$price_machine = $price_machine / (($rate[0]['rate'] / 100) + 1);
				$price_office = $price_office / (($rate[0]['rate'] / 100) + 1);
				$price_door = $price_door / (($rate[0]['rate'] / 100) + 1);
				
				if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
					$price_machine = $price_machine / (($rate[0]['rate'] / 100) + 1);
					$price_office = $price_office / (($rate[0]['rate'] / 100) + 1);
					$price_door = $price_door / (($rate[0]['rate'] / 100) + 1);
				}
			}
			
			if ($to_machine) {
				$quote_data[$machine_sort]['econt_machine'] = array(
					'code'         => 'tk_econt.econt_machine',
					'title'        => $text_machine_title,
					'description'  => $text_machine_text,
					'cost'         => $this->tax->calculate($price_machine, $this->config->get('shipping_tk_econt_tax_class_id'), $this->config->get('config_tax')),
					'tax_class_id' => $this->config->get('shipping_tk_econt_tax_class_id'),
					'text'         => '<span id="to_machine_price">' . $price_machine_text . '</span>'
				);
			}
			
			if ($to_office) {
				$quote_data[$office_sort]['econt_office'] = array(
					'code'         => 'tk_econt.econt_office',
					'title'        => $text_office_title,
					'description'  => $text_office_text,
					'cost'         => $this->tax->calculate($price_office, $this->config->get('shipping_tk_econt_tax_class_id'), $this->config->get('config_tax')),
					'tax_class_id' => $this->config->get('shipping_tk_econt_tax_class_id'),
					'text'         => '<span id="to_office_price">' . $price_office_text . '</span>'
				);
			}
			
			if ($to_door) {
				$quote_data[$address_sort]['econt_door'] = array(
					'code'         => 'tk_econt.econt_door',
					'title'        => $text_address_title,
					'description'  => $text_address_text,
					'cost'         => $this->tax->calculate($price_door, $this->config->get('shipping_tk_econt_tax_class_id'), $this->config->get('config_tax')),
					'tax_class_id' => $this->config->get('shipping_tk_econt_tax_class_id'),
					'text'         => '<span id="to_door_price">' . $price_door_text . '</span>'
				);
			}
			
			if (!empty($quote_data)) {
				ksort($quote_data);
				
				$quote = array();
				foreach ($quote_data as $quotes) {
					foreach ($quotes as $key => $value) {
						$quote[$key] = $value;
					}
				}
				
				$method_data = array(
					'code'       => 'tk_econt',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote,
					'sort_order' => $this->config->get('shipping_tk_econt_sort_order'),
					'error'      => false
				);
			}
		}
		
		return $method_data;
	}
	
	public function getPrices($type, $address, $total, $weight, $payment_method, $free) {
		
		$price = 0;
		
		$request_data['weight'] = $weight;
		$request_data['total'] = $total;
		$request_data['payment_method'] = $payment_method;
		
		if ($type == 'machine' && !empty($address['machine_code'])) {
			$request_data['shipment_to'] = 'machine';
			$request_data['receiver'] = array('office_code' => $address['machine_code']);
			$request_data['shipment_type'] = 'PACK';
			
			if ($this->config->get('shipping_tk_econt_get_door_enabled') && $this->config->get('shipping_tk_econt_get_door_enabled') == 1) {
				$request_data['tariff_sub_code'] = 'DOOR_OFFICE';
			} else {
				$request_data['tariff_sub_code'] = 'OFFICE_OFFICE';
			}
		} else if ($type == 'office' && !empty($address['office_code'])) {
			$request_data['shipment_to'] = 'office';
			$request_data['receiver'] = array('office_code' => $address['office_code']);
			
			if ($weight > 100) {
				$request_data['shipment_type'] = 'PALLET';
			} else if ($weight > 50) {
				$request_data['shipment_type'] = 'CARGO';
			} else if ($weight > 20) {
				$request_data['shipment_type'] = 'PACK';
			} else {
				$request_data['shipment_type'] = 'PACK';
			}
			
			if ($this->config->get('shipping_tk_econt_get_door_enabled') && $this->config->get('shipping_tk_econt_get_door_enabled') == 1) {
				$request_data['tariff_sub_code'] = 'DOOR_OFFICE';
			} else {
				$request_data['tariff_sub_code'] = 'OFFICE_OFFICE';
			}
		} else if ($type == 'door') {
			
			$request_data['shipment_to'] = 'address';
			$request_data['receiver'] = array(
				'city'      => $address['city'],
				'post_code' => $address['post_code']
			);
			
			if ($weight > 100) {
				$request_data['shipment_type'] = 'PALLET';
			} else if ($weight > 50) {
				$request_data['shipment_type'] = 'CARGO';
			} else if ($weight > 20) {
				$request_data['shipment_type'] = 'PACK';
			} else {
				$request_data['shipment_type'] = 'PACK';
			}
			
			if ($this->config->get('shipping_tk_econt_get_door_enabled') && $this->config->get('shipping_tk_econt_get_door_enabled') == 1) {
				$request_data['tariff_sub_code'] = 'DOOR_DOOR';
			} else {
				$request_data['tariff_sub_code'] = 'OFFICE_DOOR';
			}
		}
		
		$result = $this->getEcontPrice($request_data);
		
		if ($type == 'door' && (!isset($result['receiver_total']) || $result['receiver_total'] == 0)) {
			$request_data['receiver'] = array(
				'city'      => 'София',
				'post_code' => '1000'
			);
			
			$result = $this->getEcontPrice($request_data);
		}
		
		if ($result) {
			if (($this->config->get('shipping_tk_econt_cod_sum') == 3 && $free == 2) || $this->config->get('shipping_tk_econt_cod_sum') == 2 && $free == 0) {
				//само такса за наложения и смс
				if (isset($result['SMS_NOTIFICATION'])) {
					$sms = $result['SMS_NOTIFICATION'];
				} else {
					$sms = 0;
				}
				
				if (isset($result['CD'])) {
					$cd = $result['CD'];
				} else {
					$cd = 0;
				}
				
				$price = round($cd + $sms, 2);
			} else {
				// смятане по процент от цена за доставка
				if ($this->config->get('shipping_tk_econt_percent_value')) {
					foreach ($this->config->get('shipping_tk_econt_percent_value') as $percent_value) {
						if ($percent_value['from'] < $total && $percent_value['to'] >= $total && $percent_value['type'] == $type) {
							$price = round((($result['receiver_total'] * $percent_value['percent']) / 100), 2);
						}
					}
				} else {
					// цяла сума за доставка
					$price = round($result['receiver_total'], 2);
				}
			}
			
			if ($this->config->get('shipping_tk_econt_discount') && $result['discount'] < 0) {
				$price = $price + $result['discount'];
			}
		}
		
		return $price;
	}
	
	public function getEcontPrice($data = array()) {
		
		if ($this->config->get('shipping_tk_econt_company_name')) {
			$tk_econt_company_name = $this->config->get('shipping_tk_econt_company_name');
		} else {
			$tk_econt_company_name = '';
		}
		
		$params = array(
			'system'   => array(
				'validate'        => 1,
				'only_calculate'  => 1,
				'response_type'   => 'XML',
				'email_errors_to' => 'tankoo.eu@gmail.com',
			),
			'client'   => array(
				'username' => $this->config->get('shipping_tk_econt_username'),
				'password' => $this->config->get('shipping_tk_econt_password'),
			),
			'loadings' => array(
				'row' => array(
					'sender'   => array(
						'city' => 'София',
						'name' => $tk_econt_company_name
					),
					'receiver' => $data['receiver'],
					'payment'  => array(
						'side'     => 'RECEIVER',
						'method'   => 'CASH',
						'key_word' => ''
					),
					'shipment' => array(
						'description'      => 'description',
						'shipment_type'    => $data['shipment_type'],
						'pack_count'       => 1,
						'weight'           => $data['weight'],
						'tariff_sub_code'  => $data['tariff_sub_code'],
						'pay_after_accept' => 1,
						'pay_after_test'   => 1,
					),
				)
			)
		);
		
		if ($data['shipment_type'] == 'PALLET') {
			$params['loadings']['row']['shipment']['shipment_pack_dimensions_l'] = 120;
			$params['loadings']['row']['shipment']['shipment_pack_dimensions_w'] = 80;
			$params['loadings']['row']['shipment']['shipment_pack_dimensions_h'] = 12;
			$params['loadings']['row']['shipment']['description'] = 'pallet';
		}
		
		if ($this->config->get('shipping_tk_econt_dc_enabled') && $this->config->get('shipping_tk_econt_dc_enabled') == 1) {
			$params['loadings']['row']['services']['dc'] = 'ON';
		}
		
		if ($this->config->get('shipping_tk_econt_sms_enabled') && $this->config->get('shipping_tk_econt_sms_enabled') == 1) {
			$params['loadings']['row']['services']['sms_notification'] = 'ON';
		} else {
			if (isset($this->session->data['tk_checkout']['econt']['econt_sms']) && $this->session->data['tk_checkout']['econt']['econt_sms'] == 2) {
				$params['loadings']['row']['services']['sms_notification'] = 'ON';
			}
		}
		
		if ($this->config->get('shipping_tk_econt_os_enabled') && $this->config->get('shipping_tk_econt_os_enabled') == 1 && $data['shipment_to'] != 'machine') {
			if ($data['total'] >= $this->config->get('shipping_tk_econt_os_price') || !$this->config->get('shipping_tk_econt_os_price') || $this->config->get('shipping_tk_econt_os_price') == 0) {
				$params['loadings']['row']['services']['oc'] = $data['total'];
				$params['loadings']['row']['services']['oc_currency'] = 'BGN';
			}
		}
		
		if ($this->config->get('shipping_tk_econt_np_enabled') && $this->config->get('shipping_tk_econt_np_enabled') == 1) {
			if ($data['payment_method'] && ($data['payment_method'] == 'cod' || $data['payment_method'] == 'tk_econt_payment')) {
				$params['loadings']['row']['services']['cd'] = $data['total'];
				$params['loadings']['row']['services']['cd_currency'] = 'BGN';
				
				if ($this->config->get('shipping_tk_econt_cd_agreement')) {
					$params['loadings']['row']['services']['cd_agreement_num'] = $this->config->get('shipping_tk_econt_cd_agreement');
				}
			}
		}
		
		$get_data = $this->servicePriceXML($params);
		
		if (isset($get_data['result']['e']['loading_price']['total']) && $get_data['result']['e']['loading_price']['total'] > 0) {
			if (isset($get_data['result']['e']['loading_discount']['amount']) && $get_data['result']['e']['loading_discount']['amount'] < 0) {
				$get_data['result']['e']['loading_price']['discount'] = $get_data['result']['e']['loading_discount']['amount'];
			} else {
				$get_data['result']['e']['loading_price']['discount'] = 0;
			}
			
			$price = $get_data['result']['e']['loading_price'];
		} else {
			$this->log->write('TK Econt price');
			$this->log->write($get_data);
			$price = false;
		}
		
		return $price;
	}
	
	// показваме темплейти
	public function getEcontMachine($data = array()) {
		
		$this->load->language('extension/shipping/tk_econt');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$this->load->model('extension/module/tk_checkout');
		$zone_info = $this->model_extension_module_tk_checkout->getZone();
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_econt_machine_title'] = $this->language->get('text_econt_machine_title');
		$data['text_econt_machine_desc'] = $this->language->get('text_econt_office_desc');
		$data['text_econt_machine_map'] = $this->language->get('text_econt_office_map');
		$data['text_econt_machine_city'] = $this->language->get('text_econt_office_city');
		$data['text_econt_machine_office'] = $this->language->get('text_econt_office_office');
		$data['text_econt_machine_address'] = $this->language->get('text_econt_office_address');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['entry_machine'] = $this->language->get('entry_machine');
		
		$data['econt_machine_city'] = '';
		$data['econt_machine_code'] = '';
		$data['econt_machine_name'] = '';
		$data['econt_machine_address'] = '';
		$data['econt_machine_postcode'] = '';
		$data['econt_machine_customer_id'] = 0;
		$data['econt_machines_customer'] = array();
		
		if ($this->customer->isLogged()) {
			$data['econt_machines_customer'] = $this->getCustomers('machine');
			$data['econt_machine_customer'] = $this->getCustomer('machine');
			if (!empty($data['econt_machine_customer'])) {
				$data['econt_machine_customer_id'] = $data['econt_machine_customer']['econt_customer_id'];
			}
		}
		
		$data['econt_cities'] = $this->getCities(1, 1);
		if (!$data['econt_cities']) {
			$this->updateOffices();
			$data['econt_cities'] = $this->getCities(1, 1);
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_machine_city_id'])) {
			$data['econt_machine_city_id'] = $this->session->data['tk_checkout']['econt']['econt_machine_city_id'];
		} else {
			$data['econt_machine_city_id'] = '';
		}
		
		if (isset($data['econt_machine_city_id']) && $data['econt_machine_city_id'] != '') {
			$city = $this->getCity($data['econt_machine_city_id']);
			$data['econt_machine_city'] = $city['name'];
			$data['econt_machine_postcode'] = $city['post_code'];
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_machine_id'])) {
			$data['econt_machine_id'] = $this->session->data['tk_checkout']['econt']['econt_machine_id'];
		} else {
			$data['econt_machine_id'] = '';
		}
		
		if (isset($data['econt_machine_id']) && $data['econt_machine_id'] != '') {
			$machine = $this->getOffice($data['econt_machine_id']);
			
			if ($machine) {
				$data['econt_machine_city_id'] = $machine['city_id'];
				$city = $this->getCity($data['econt_machine_city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $machine['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $machine['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['econt_machine_city'] = $city['name'];
				
				$data['econt_machine_code'] = $machine['office_code'];
				$data['econt_machine_name'] = $name;
				$data['econt_machine_address'] = $address;
			}
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_machine_type'])) {
			$data['econt_machine_type'] = $this->session->data['tk_checkout']['econt']['econt_machine_type'];
		} else {
			$data['econt_machine_type'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_sms']) && $this->session->data['tk_checkout']['econt']['econt_sms'] == 2) {
			$data['econt_sms'] = 2;
		} else {
			$data['econt_sms'] = 1;
		}
		
		if ($this->config->get('shipping_tk_econt_sms_enabled') && $this->config->get('shipping_tk_econt_sms_enabled') == 2) {
			$data['econt_sms_enabled'] = 1;
		} else {
			$data['econt_sms_enabled'] = '';
		}
		
		$data['econt_machines'] = array();
		
		if (isset($data['econt_machine_city_id'])) {
			
			$results = $this->getOfficesByCityId($data['econt_machine_city_id'], 1);
			
			foreach ($results as $result) {
				$city = $this->getCity($result['city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $result['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $result['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['econt_machines'][] = array(
					'office_id'   => $result['office_id'],
					'office_code' => $result['office_code'],
					'name'        => $name,
					'address'     => $address,
					'city_id'     => $result['city_id'],
					'is_machine'  => $result['is_machine']
				);
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/econt_machine', $data));
	}
	
	public function getEcontOffice($data = array()) {
		
		$this->load->language('extension/shipping/tk_econt');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$data['econt_office_locator'] = 'https://staging.officelocator.econt.com?shopUrl=' . HTTPS_SERVER;
		
		$this->load->model('extension/module/tk_checkout');
		$zone_info = $this->model_extension_module_tk_checkout->getZone();
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_econt_office_title'] = $this->language->get('text_econt_office_title');
		$data['text_econt_office_desc'] = $this->language->get('text_econt_office_desc');
		$data['text_econt_office_map'] = $this->language->get('text_econt_office_map');
		$data['text_econt_office_city'] = $this->language->get('text_econt_office_city');
		$data['text_econt_office_office'] = $this->language->get('text_econt_office_office');
		$data['text_econt_office_address'] = $this->language->get('text_econt_office_address');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		
		$data['econt_office_city'] = '';
		$data['econt_office_code'] = '';
		$data['econt_office_name'] = '';
		$data['econt_office_address'] = '';
		$data['econt_office_postcode'] = '';
		$data['econt_office_customer_id'] = 0;
		$data['econt_offices_customer'] = array();
		
		if ($this->customer->isLogged()) {
			$data['econt_offices_customer'] = $this->getCustomers('office');
			$data['econt_office_customer'] = $this->getCustomer('office');
			if (!empty($data['econt_office_customer'])) {
				$data['econt_office_customer_id'] = $data['econt_office_customer']['econt_customer_id'];
			}
		}
		
		$data['econt_cities'] = $this->getCities(1);
		if (!$data['econt_cities']) {
			$this->updateOffices();
			$data['econt_cities'] = $this->getCities(1);
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_office_city_id'])) {
			$data['econt_office_city_id'] = $this->session->data['tk_checkout']['econt']['econt_office_city_id'];
		} else {
			$data['econt_office_city_id'] = '';
		}
		
		if (isset($data['econt_office_city_id']) && $data['econt_office_city_id'] != '') {
			$city = $this->getCity($data['econt_office_city_id']);
			$data['econt_office_city'] = $city['name'];
			$data['econt_office_postcode'] = $city['post_code'];
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_office_id'])) {
			$data['econt_office_id'] = $this->session->data['tk_checkout']['econt']['econt_office_id'];
		} else {
			$data['econt_office_id'] = '';
		}
		
		if (isset($data['econt_office_id']) && $data['econt_office_id'] != '') {
			$office = $this->getOffice($data['econt_office_id']);
			
			if ($office) {
				$data['econt_office_city_id'] = $office['city_id'];
				$city = $this->getCity($data['econt_office_city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $office['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $office['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['econt_office_city'] = $city['name'];
				
				$data['econt_office_code'] = $office['office_code'];
				$data['econt_office_name'] = $name;
				$data['econt_office_address'] = $address;
			}
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_office_type'])) {
			$data['econt_office_type'] = $this->session->data['tk_checkout']['econt']['econt_office_type'];
		} else {
			$data['econt_office_type'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_sms']) && $this->session->data['tk_checkout']['econt']['econt_sms'] == 2) {
			$data['econt_sms'] = 2;
		} else {
			$data['econt_sms'] = 1;
		}
		
		if ($this->config->get('shipping_tk_econt_sms_enabled') && $this->config->get('shipping_tk_econt_sms_enabled') == 2) {
			$data['econt_sms_enabled'] = 1;
		} else {
			$data['econt_sms_enabled'] = '';
		}
		
		$data['econt_offices'] = array();
		
		if (isset($data['econt_office_city_id'])) {
			
			$results = $this->getOfficesByCityId($data['econt_office_city_id']);
			
			foreach ($results as $result) {
				$city = $this->getCity($result['city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $result['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $result['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['econt_offices'][] = array(
					'office_id'   => $result['office_id'],
					'office_code' => $result['office_code'],
					'name'        => $name,
					'address'     => $address,
					'city_id'     => $result['city_id'],
					'is_machine'  => $result['is_machine']
				);
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/econt_office', $data));
	}
	
	public function getEcontAddress($data = array()) {
		
		$this->load->language('extension/shipping/tk_econt');
		$this->load->language('tk_checkout/checkout');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$this->load->model('extension/module/tk_checkout');
		$zone_info = $this->model_extension_module_tk_checkout->getZone();
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_econt_office_city'] = $this->language->get('text_econt_office_city');
		$data['text_econt_office_office'] = $this->language->get('text_econt_office_office');
		$data['text_econt_office_address'] = $this->language->get('text_econt_office_address');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['text_none'] = $this->language->get('text_none');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_quarter'] = $this->language->get('entry_quarter');
		$data['entry_street'] = $this->language->get('entry_street');
		$data['entry_other'] = $this->language->get('entry_other');
		$data['entry_street_num'] = $this->language->get('entry_street_num');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['error_address'] = '';
		
		$data['econt_address_customer_id'] = 0;
		$data['econt_addresses_customer'] = array();
		$data['econt_quarters'] = array();
		$data['econt_streets'] = array();
		
		if ($this->customer->isLogged()) {
			$data['econt_addresses_customer'] = $this->getCustomers('address');
			$data['econt_address_customer'] = $this->getCustomer('address');
			if (!empty($data['econt_address_customer'])) {
				$data['econt_address_customer_id'] = $data['econt_address_customer']['econt_customer_id'];
			}
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_address_postcode'])) {
			$data['econt_address_postcode'] = $this->session->data['tk_checkout']['econt']['econt_address_postcode'];
		} else {
			$data['econt_address_postcode'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_address_city'])) {
			$data['econt_address_city'] = $this->session->data['tk_checkout']['econt']['econt_address_city'];
		} else {
			$data['econt_address_city'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_address_city_id'])) {
			$data['econt_address_city_id'] = $this->session->data['tk_checkout']['econt']['econt_address_city_id'];
			$data['econt_quarters'] = $this->getQuartersByCityId($data['econt_address_city_id']);
			$data['econt_streets'] = $this->getStreetsByCityId($data['econt_address_city_id']);
		} else {
			$data['econt_address_city_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_quarter_id'])) {
			$data['econt_quarter_id'] = $this->session->data['tk_checkout']['econt']['econt_quarter_id'];
		} else {
			$data['econt_quarter_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_street_id'])) {
			$data['econt_street_id'] = $this->session->data['tk_checkout']['econt']['econt_street_id'];
		} else {
			$data['econt_street_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_street'])) {
			$data['econt_street'] = $this->session->data['tk_checkout']['econt']['econt_street'];
		} else {
			$data['econt_street'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_quarter'])) {
			$data['econt_quarter'] = $this->session->data['tk_checkout']['econt']['econt_quarter'];
		} else {
			$data['econt_quarter'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_street_num'])) {
			$data['econt_street_num'] = $this->session->data['tk_checkout']['econt']['econt_street_num'];
		} else {
			$data['econt_street_num'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_other'])) {
			$data['econt_other'] = $this->session->data['tk_checkout']['econt']['econt_other'];
		} else {
			$data['econt_other'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_address_type'])) {
			$data['econt_address_type'] = $this->session->data['tk_checkout']['econt']['econt_address_type'];
		} else {
			$data['econt_address_type'] = '';
		}
		
		$data['econt_cities'] = $this->getCities();
		
		if (!$data['econt_cities']) {
			$this->updateOffices();
			$data['econt_cities'] = $this->getCities();
		}
		
		if (isset($this->session->data['tk_checkout']['econt']['econt_sms']) && $this->session->data['tk_checkout']['econt']['econt_sms'] == 2) {
			$data['econt_sms'] = 2;
		} else {
			$data['econt_sms'] = 1;
		}
		
		if ($this->config->get('shipping_tk_econt_sms_enabled') && $this->config->get('shipping_tk_econt_sms_enabled') == 2) {
			$data['econt_sms_enabled'] = 1;
		} else {
			$data['econt_sms_enabled'] = '';
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/econt_address', $data));
	}
	
	// обработваме данните за доставка
	public function addEcontData($data) {
		
		$return = array();
		
		$this->load->language('extension/shipping/tk_econt');
		
		if (!isset($data['zone_id'])) {
			$this->load->model('extension/module/tk_checkout');
			$zone_info = $this->model_extension_module_tk_checkout->getZone();
			$data['zone_id'] = $zone_info['zone_id'];
		}
		
		$return['zone_id'] = $data['zone_id'];
		
		$this->load->model('localisation/zone');
		$zone_info = $this->model_localisation_zone->getZone($data['zone_id']);
		if ($zone_info) {
			$return['zone'] = $zone_info['name'];
			$return['zone_code'] = $zone_info['code'];
		} else {
			$return['zone'] = '';
			$return['zone_code'] = '';
		}
		
		if (isset($data['econt_sms'])) {
			$return['econt_sms'] = 2;
		} else {
			$return['econt_sms'] = 1;
		}
		
		if (isset($data['shipping_to']) && $data['shipping_to'] == 'machine') {
			$return['postcode'] = '';
			$return['shipping_to'] = $data['shipping_to'];
			
			if (isset($data['econt_machine_customer_id']) && $data['econt_machine_type'] == 'existing' && $data['econt_machine_customer_id'] > 0) {
				$econt_customer_info = $this->getCustomer('machine', $data['econt_machine_customer_id']);
				
				$return['econt_machine_type'] = 'existing';
				$return['econt_machine_customer_id'] = $data['econt_machine_customer_id'];
				$return['econt_machine_city_id'] = $econt_customer_info['city_id'];
				$return['econt_machine_id'] = $econt_customer_info['office_id'];
				$return['econt_machine_code'] = $econt_customer_info['office_code'];
				$return['econt_machine_postcode'] = $econt_customer_info['postcode'];
				
				if ($return['econt_machine_city_id'] && $return['econt_machine_id']) {
					$city = $this->getCity($return['econt_machine_city_id']);
					$return['econt_machine_city'] = $city['name'];
					$machine = $this->getOffice($return['econt_machine_id']);
					$machine_address = str_replace($return['econt_machine_city'] . ' ', '', $machine['address']);
					$return['machine'] = $machine['office_code'] . ' - ' . $machine['name'] . ' - ' . $machine_address;
				}
				
				$return['address_1'] = isset($return['machine']) ? $return['machine'] : '';
				$return['city'] = $return['econt_machine_city'];
				$return['postcode'] = $return['econt_machine_postcode'];
			} else {
				$return['econt_office_type'] = 'new';
				
				if (!isset($data['econt_machine_id']) || !$data['econt_machine_id'] || $data['econt_machine_id'] == 0) {
					$error['econt_machine_city_id'] = $this->language->get('error_office');
				}
				
				if (isset($data['econt_machine_city_id'])) {
					$return['econt_machine_city_id'] = $data['econt_machine_city_id'];
				} else {
					$return['econt_machine_city_id'] = '';
				}
				
				if (isset($data['econt_machine_id']) && $data['econt_machine_id'] != 0) {
					$return['econt_machine_id'] = $data['econt_machine_id'];
				} else {
					$return['econt_machine_id'] = '';
				}
				
				if (isset($data['econt_machine_code']) && $data['econt_machine_code'] != 0) {
					$return['econt_machine_code'] = $data['econt_machine_code'];
				} else {
					$return['econt_machine_code'] = '';
				}
				
				if (isset($data['econt_machine_postcode']) && $data['econt_machine_postcode'] != 0) {
					$return['econt_machine_postcode'] = $data['econt_machine_postcode'];
				} else {
					$return['econt_machine_postcode'] = '';
				}
				
				if ($return['econt_machine_city_id'] && $return['econt_machine_id']) {
					$city = $this->getCity($return['econt_machine_city_id']);
					$return['econt_machine_city'] = $city['name'];
					$office = $this->getOffice($return['econt_machine_id']);
					$office_address = str_replace($return['econt_machine_city'] . ' ', '', $office['address']);
					$return['machine'] = $office['office_code'] . ' - ' . $office['name'] . ' - ' . $office_address;
				}
				
				if (isset($return['machine'])) {
					$return['address_1'] = $return['machine'];
					$return['postcode'] = $return['econt_machine_postcode'];
					$return['city'] = $return['econt_machine_city'];
				}
			}
		} else if (isset($data['shipping_to']) && $data['shipping_to'] == 'office') {
			$return['postcode'] = '';
			$return['shipping_to'] = $data['shipping_to'];
			
			if (isset($data['econt_office_customer_id']) && $data['econt_office_type'] == 'existing' && $data['econt_office_customer_id'] > 0) {
				$econt_customer_info = $this->getCustomer('office', $data['econt_office_customer_id']);
				
				$return['econt_office_type'] = 'existing';
				$return['econt_office_customer_id'] = $data['econt_office_customer_id'];
				$return['econt_office_city_id'] = $econt_customer_info['city_id'];
				$return['econt_office_id'] = $econt_customer_info['office_id'];
				$return['econt_office_code'] = $econt_customer_info['office_code'];
				$return['econt_office_postcode'] = $econt_customer_info['postcode'];
				
				if ($return['econt_office_city_id'] && $return['econt_office_id']) {
					$city = $this->getCity($return['econt_office_city_id']);
					$return['econt_office_city'] = $city['name'];
					$office = $this->getOffice($return['econt_office_id']);
					$office_address = str_replace($return['econt_office_city'] . ' ', '', $office['address']);
					$return['office'] = $office['office_code'] . ' - ' . $office['name'] . ' - ' . $office_address;
				}
				
				$return['address_1'] = isset($return['office']) ? $return['office'] : '';
				$return['city'] = $return['econt_office_city'];
				$return['postcode'] = $return['econt_office_postcode'];
			} else {
				$return['econt_office_type'] = 'new';
				
				if (!isset($data['econt_office_id']) || !$data['econt_office_id'] || $data['econt_office_id'] == 0) {
					$error['econt_office_city_id'] = $this->language->get('error_office');
				}
				
				if (isset($data['econt_office_city_id'])) {
					$return['econt_office_city_id'] = $data['econt_office_city_id'];
				} else {
					$return['econt_office_city_id'] = '';
				}
				
				if (isset($data['econt_office_id']) && $data['econt_office_id'] != 0) {
					$return['econt_office_id'] = $data['econt_office_id'];
				} else {
					$return['econt_office_id'] = '';
				}
				
				if (isset($data['econt_office_code']) && $data['econt_office_code'] != 0) {
					$return['econt_office_code'] = $data['econt_office_code'];
				} else {
					$return['econt_office_code'] = '';
				}
				
				if (isset($data['econt_office_postcode']) && $data['econt_office_postcode'] != 0) {
					$return['econt_office_postcode'] = $data['econt_office_postcode'];
				} else {
					$return['econt_office_postcode'] = '';
				}
				
				if ($return['econt_office_city_id'] && $return['econt_office_id']) {
					$city = $this->getCity($return['econt_office_city_id']);
					$return['econt_office_city'] = $city['name'];
					$office = $this->getOffice($return['econt_office_id']);
					$office_address = str_replace($return['econt_office_city'] . ' ', '', $office['address']);
					$return['office'] = $office['office_code'] . ' - ' . $office['name'] . ' - ' . $office_address;
				}
				
				if (isset($return['office'])) {
					$return['address_1'] = $return['office'];
					$return['postcode'] = $return['econt_office_postcode'];
					$return['city'] = $return['econt_office_city'];
				}
			}
		} else if (isset($data['shipping_to']) && $data['shipping_to'] == 'address') {
			$return['shipping_to'] = $data['shipping_to'];
			
			if (isset($data['econt_address_customer_id']) && $data['econt_address_type'] == 'existing' && $data['econt_address_customer_id'] > 0) {
				$econt_customer_info = $this->getCustomer('address', $data['econt_address_customer_id']);
				$return['econt_address_type'] = 'existing';
				$return['econt_address_customer_id'] = $data['econt_address_customer_id'];
				$return['econt_address_city'] = $econt_customer_info['city'];
				$return['econt_address_city_id'] = $econt_customer_info['city_id'];
				$return['econt_quarter'] = $econt_customer_info['quarter'];
				$return['econt_street'] = $econt_customer_info['street'];
				$return['econt_street_num'] = $econt_customer_info['street_num'];
				$return['econt_address_postcode'] = $econt_customer_info['postcode'];
				$return['econt_other'] = $econt_customer_info['other'];
				$return['address_1'] = $return['econt_quarter'] . ' ' . $return['econt_street'] . ' ' . $return['econt_street_num'] . ' ' . $return['econt_other'];
				$return['city'] = $return['econt_address_city'];
				$return['postcode'] = $return['econt_address_postcode'];
			} else {
				$return['payment_address_type'] = 'new';
				
				if (isset($data['econt_address_city'])) {
					$return['econt_address_city'] = $data['econt_address_city'];
				}
				
				if (isset($data['econt_address_city_id'])) {
					$return['econt_address_city_id'] = $data['econt_address_city_id'];
				}
				
				if (isset($data['econt_quarter'])) {
					$return['econt_quarter'] = $data['econt_quarter'];
				} else {
					$return['econt_quarter'] = '';
				}
				
				if (isset($data['econt_street'])) {
					$return['econt_street'] = $data['econt_street'];
				}
				
				if (isset($data['econt_quarter_id'])) {
					$return['econt_quarter_id'] = $data['econt_quarter_id'];
				}
				
				if (isset($data['econt_street_id'])) {
					$return['econt_street_id'] = $data['econt_street_id'];
				}
				
				if (isset($data['econt_street_num'])) {
					$return['econt_street_num'] = $data['econt_street_num'];
				} else {
					$return['econt_street_num'] = '';
				}
				
				if (isset($data['econt_address_postcode'])) {
					$return['econt_address_postcode'] = $data['econt_address_postcode'];
				}
				
				if (isset($data['econt_other'])) {
					$return['econt_other'] = $data['econt_other'];
				}
				
				if (isset($data['econt_address_city']) && ((utf8_strlen(trim($data['econt_address_city'])) < 1) || (utf8_strlen(trim($data['econt_address_city'])) > 52))) {
					$error['econt_address_city'] = $this->language->get('error_city');
				}
				
				if ((isset($data['econt_street']) && ((utf8_strlen(trim($data['econt_street'])) < 1) || (utf8_strlen(trim($data['econt_street'])) > 350))) && (isset($data['econt_quarter']) && ((utf8_strlen(trim($data['econt_quarter'])) < 1) || (utf8_strlen(trim($data['econt_quarter'])) > 350)))) {
					$error['econt_address_city'] = $this->language->get('error_validate_street_quarter');
				}
				
				if (isset($data['econt_street_num']) && ((utf8_strlen(trim($data['econt_street_num'])) < 1) || (utf8_strlen(trim($data['econt_street_num'])) > 252))) {
					$error['econt_street_num'] = $this->language->get('error_street_num');
				}
				
				if (!isset($error) || !$error) {
					$validate_addres = $this->validateAddress($return);
				}
				
				if ((!isset($error) || !$error) && (!isset($validate_addres) || $validate_addres == 0)) {
					$error['econt_address_city'] = $this->language->get('error_validate_addres');
				}
				
				if(!empty($return['econt_other']) && utf8_strlen(trim($return['econt_other'])) > 5){
					unset($error['econt_address_city']);
					unset($error['econt_street_num']);
				}
				
				if (!isset($error) || !$error) {
					$return['address_1'] = $return['econt_quarter'] . ' ' . $return['econt_street'] . ' ' . $return['econt_street_num'] . ' ' . $return['econt_other'];
					$return['city'] = $return['econt_address_city'];
					$return['postcode'] = $return['econt_address_postcode'];
				}
			}
		}
		
		if (isset($error) && $error) {
			$return['error'] = $error;
		}
		
		return $return;
	}
	
	public function validateAddress($data) {
		
		if (isset($data['econt_address_city'])) {
			$econt_city = $data['econt_address_city'];
		} else if (isset($data['econt_office_city'])) {
			$econt_city = $data['econt_office_city'];
		} else {
			$econt_city = '';
		}
		
		if (isset($data['econt_address_postcode'])) {
			$econt_postcode = $data['econt_address_postcode'];
		} else if (isset($data['econt_office_postcode'])) {
			$econt_postcode = $data['econt_office_postcode'];
		} else {
			$econt_postcode = '';
		}
		
		$sql = "SELECT COUNT(c.city_id) AS total FROM " . DB_PREFIX . "tk_econt_city c LEFT JOIN " . DB_PREFIX . "tk_econt_quarter q ON (c.city_id = q.city_id) LEFT JOIN " . DB_PREFIX . "tk_econt_street s ON (c.city_id = s.city_id) WHERE TRIM(c.post_code) = '" . $this->db->escape(trim($econt_postcode)) . "' AND (LCASE(TRIM(c.name)) = '" . $this->db->escape(utf8_strtolower(trim($econt_city))) . "' OR LCASE(TRIM(c.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($econt_city))) . "')";
		
		if ($data['econt_quarter']) {
			$sql .= " AND (LCASE(TRIM(q.name)) = '" . $this->db->escape(utf8_strtolower(trim($data['econt_quarter']))) . "' OR LCASE(TRIM(q.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($data['econt_quarter']))) . "')";
		}
		
		if ($data['econt_street']) {
			$sql .= " AND (LCASE(TRIM(s.name)) = '" . $this->db->escape(utf8_strtolower(trim($data['econt_street']))) . "' OR LCASE(TRIM(s.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($data['econt_street']))) . "')";
		}
		
		$query = $this->db->query($sql);
		
		return $query->row['total'];
	}
	
	public function saveData() {
		
		if (isset($this->request->post['zone'])) {
			$this->session->data['tk_checkout']['econt']['zone'] = $this->request->post['zone'];
		}
		
		if (isset($this->request->post['zone_id'])) {
			$this->session->data['tk_checkout']['econt']['zone_id'] = $this->request->post['zone_id'];
		}
		
		if (isset($this->request->post['country_id'])) {
			$this->session->data['tk_checkout']['econt']['country_id'] = $this->request->post['country_id'];
		}
		
		if (isset($this->request->post['econt_address_postcode'])) {
			$this->session->data['tk_checkout']['econt']['econt_address_postcode'] = $this->request->post['econt_address_postcode'];
		}
		
		if (isset($this->request->post['econt_address_city_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_address_city_id'] = $this->request->post['econt_address_city_id'];
		}
		
		if (isset($this->request->post['econt_address_city'])) {
			$this->session->data['tk_checkout']['econt']['econt_address_city'] = $this->request->post['econt_address_city'];
		}
		
		if (isset($this->request->post['econt_quarter_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_quarter_id'] = $this->request->post['econt_quarter_id'];
		}
		
		if (isset($this->request->post['econt_street_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_street_id'] = $this->request->post['econt_street_id'];
		}
		
		if (isset($this->request->post['econt_quarter'])) {
			$this->session->data['tk_checkout']['econt']['econt_quarter'] = $this->request->post['econt_quarter'];
		}
		
		if (isset($this->request->post['econt_street'])) {
			$this->session->data['tk_checkout']['econt']['econt_street'] = $this->request->post['econt_street'];
		}
		
		if (isset($this->request->post['econt_street_num'])) {
			$this->session->data['tk_checkout']['econt']['econt_street_num'] = $this->request->post['econt_street_num'];
		}
		
		if (isset($this->request->post['econt_other'])) {
			$this->session->data['tk_checkout']['econt']['econt_other'] = $this->request->post['econt_other'];
		}
		
		if (isset($this->request->post['econt_office_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_office_id'] = $this->request->post['econt_office_id'];
		}
		
		if (isset($this->request->post['econt_office_city_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_office_city_id'] = $this->request->post['econt_office_city_id'];
		}
		
		if (isset($this->request->post['econt_office_city'])) {
			$this->session->data['tk_checkout']['econt']['econt_office_city'] = $this->request->post['econt_office_city'];
		}
		
		if (isset($this->request->post['econt_office_code'])) {
			$this->session->data['tk_checkout']['econt']['econt_office_code'] = $this->request->post['econt_office_code'];
		}
		
		if (isset($this->request->post['econt_machine_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_machine_id'] = $this->request->post['econt_machine_id'];
		}
		
		if (isset($this->request->post['econt_machine_city_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_machine_city_id'] = $this->request->post['econt_machine_city_id'];
		}
		
		if (isset($this->request->post['econt_machine_city'])) {
			$this->session->data['tk_checkout']['econt']['econt_machine_city'] = $this->request->post['econt_machine_city'];
		}
		
		if (isset($this->request->post['econt_machine_code'])) {
			$this->session->data['tk_checkout']['econt']['econt_machine_code'] = $this->request->post['econt_machine_code'];
		}
		
		if (isset($this->request->post['econt_address_customer_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_address_customer_id'] = $this->request->post['econt_address_customer_id'];
		}
		
		if (isset($this->request->post['econt_office_customer_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_office_customer_id'] = $this->request->post['econt_office_customer_id'];
		}
		
		if (isset($this->request->post['econt_machine_customer_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_machine_customer_id'] = $this->request->post['econt_machine_customer_id'];
		}
		
		if (isset($this->request->post['econt_customer_id'])) {
			$this->session->data['tk_checkout']['econt']['econt_customer_id'] = $this->request->post['econt_customer_id'];
		}
		
		if (isset($this->request->post['econt_address_type'])) {
			$this->session->data['tk_checkout']['econt']['econt_address_type'] = $this->request->post['econt_address_type'];
		}
		
		if (isset($this->request->post['econt_office_type'])) {
			$this->session->data['tk_checkout']['econt']['econt_office_type'] = $this->request->post['econt_office_type'];
		}
		
		if (isset($this->request->post['econt_machine_type'])) {
			$this->session->data['tk_checkout']['econt']['econt_machine_type'] = $this->request->post['econt_machine_type'];
		}
		
		if (isset($this->request->post['econt_sms'])) {
			$this->session->data['tk_checkout']['econt']['econt_sms'] = 2;
		} else {
			$this->session->data['tk_checkout']['econt']['econt_sms'] = 1;
		}
	}
	
	// обработваме данните за клиента
	public function addCustomer($data) {
		
		if (isset($data['econt']['econt_machine_id']) && $data['econt']['econt_machine_id'] > 0) {
			$office_id = $data['econt']['econt_machine_id'];
			$office_code = $data['econt']['econt_machine_code'];
		} else if (isset($data['econt']['econt_office_id']) && $data['econt']['econt_office_id'] > 0) {
			$office_id = $data['econt']['econt_office_id'];
			$office_code = $data['econt']['econt_office_code'];
		} else {
			$office_id = '';
			$office_code = '';
		}
		
		if (isset($data['econt']['econt_machine_city_id']) && $data['econt']['econt_machine_city_id'] > 0) {
			$city_id = $data['econt']['econt_machine_city_id'];
		} else if (isset($data['econt']['econt_office_city_id']) && $data['econt']['econt_office_city_id'] > 0) {
			$city_id = $data['econt']['econt_office_city_id'];
		} else if (isset($data['econt']['econt_address_city_id']) && $data['econt']['econt_address_city_id'] > 0) {
			$city_id = $data['econt']['econt_address_city_id'];
		} else {
			$city_id = '';
		}
		
		if (isset($data['econt']['shipping_to'])) {
			$shipping_to = $data['econt']['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (isset($data['econt']['econt_machine_postcode'])) {
			$postcode = $data['econt']['econt_machine_postcode'];
		} else if (isset($data['econt']['econt_address_postcode'])) {
			$postcode = $data['econt']['econt_address_postcode'];
		} else if (isset($data['econt']['econt_office_postcode'])) {
			$postcode = $data['econt']['econt_office_postcode'];
		} else {
			$postcode = '';
		}
		
		if (isset($data['econt']['econt_machine_city'])) {
			$city = $data['econt']['econt_machine_city'];
		} else if (isset($data['econt']['econt_address_city'])) {
			$city = $data['econt']['econt_address_city'];
		} else if (isset($data['econt']['econt_office_city'])) {
			$city = $data['econt']['econt_office_city'];
		} else {
			$city = '';
		}
		
		if (isset($data['econt']['econt_quarter'])) {
			$quarter = $data['econt']['econt_quarter'];
		} else {
			$quarter = '';
		}
		
		if (isset($data['econt']['econt_street'])) {
			$street = $data['econt']['econt_street'];
		} else {
			$street = '';
		}
		
		if (isset($data['econt']['econt_street_num'])) {
			$street_num = $data['econt']['econt_street_num'];
		} else {
			$street_num = '';
		}
		
		if (isset($data['econt']['econt_other'])) {
			$other = $data['econt']['econt_other'];
		} else {
			$other = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_econt_customer SET customer_id = '" . (int)$this->customer->getId() . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', other = '" . $this->db->escape($other) . "', city_id = '" . (int)$city_id . "', office_id = '" . (int)$office_id . "', office_code = '" . $this->db->escape($office_code) . "'");
	}
	
	public function getCustomer($shipping_to, $econt_customer_id = NULL) {
		
		if ($econt_customer_id != NULL) {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_econt_customer WHERE econt_customer_id = '" . (int)$econt_customer_id . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' ");
		} else {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_econt_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' ORDER BY econt_customer_id ASC LIMIT 1 ");
		}
		
		if ($address_query->num_rows) {
			
			if ($address_query->row['office_id'] > 0) {
				$office = $this->getOffice($address_query->row['office_id']);
				$office_name = $office['name'];
				$office_address = $office['address'];
				$office_code = $office['office_code'];
			} else {
				$office_name = '';
				$office_address = '';
				$office_code = '';
			}
			
			return array(
				'econt_customer_id' => $address_query->row['econt_customer_id'],
				'shipping_to'       => $address_query->row['shipping_to'],
				'postcode'          => $address_query->row['postcode'],
				'city'              => $address_query->row['city'],
				'quarter'           => $address_query->row['quarter'],
				'street'            => $address_query->row['street'],
				'street_num'        => $address_query->row['street_num'],
				'other'             => $address_query->row['other'],
				'city_id'           => $address_query->row['city_id'],
				'office_name'       => $office_name,
				'office_address'    => $office_address,
				'office_code'       => $office_code,
				'office_id'         => $address_query->row['office_id']
			
			);
		} else {
			return false;
		}
	}
	
	public function getCustomers($shipping_to) {
		
		$address_data = array();
		
		$address_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "'");
		
		foreach ($address_query->rows as $result) {
			
			if ($result['office_id'] > 0) {
				$office = $this->getOffice($result['office_id']);
				if ($office) {
					$office_name = $office['name'];
				} else {
					$office_name = '';
				}
			} else {
				$office_name = '';
			}
			
			$address_data[$result['econt_customer_id']] = array(
				'econt_customer_id' => $result['econt_customer_id'],
				'shipping_to'       => $result['shipping_to'],
				'postcode'          => $result['postcode'],
				'city'              => $result['city'],
				'quarter'           => $result['quarter'],
				'street'            => $result['street'],
				'street_num'        => $result['street_num'],
				'other'             => $result['other'],
				'city_id'           => $result['city_id'],
				'office_id'         => $result['office_id'],
				'office_name'       => $office_name
			
			);
		}
		
		return $address_data;
	}
	
	// обработваме данните за поръчката
	public function addOrder($data, $order_id = 0) {
		
		if (isset($data['econt']['econt_office_id']) && $data['econt']['econt_office_id'] > 0) {
			$office_id = $data['econt']['econt_office_id'];
			$office_code = $data['econt']['econt_office_code'];
		} else if (isset($data['econt']['econt_machine_id']) && $data['econt']['econt_machine_id'] > 0) {
			$office_id = $data['econt']['econt_machine_id'];
			$office_code = $data['econt']['econt_machine_code'];
		} else {
			$office_id = '';
			$office_code = '';
		}
		
		if (isset($data['econt']['econt_office_city_id']) && $data['econt']['econt_office_city_id'] > 0) {
			$city_id = $data['econt']['econt_office_city_id'];
		} else if (isset($data['econt']['econt_machine_city_id']) && $data['econt']['econt_machine_city_id'] > 0) {
			$city_id = $data['econt']['econt_machine_city_id'];
		} else if (isset($data['econt']['econt_address_city_id']) && $data['econt']['econt_address_city_id'] > 0) {
			$city_id = $data['econt']['econt_address_city_id'];
		} else {
			$city_id = '';
		}
		
		if (isset($data['econt']['shipping_to'])) {
			$shipping_to = $data['econt']['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (isset($data['econt']['econt_address_postcode'])) {
			$postcode = $data['econt']['econt_address_postcode'];
		} else if (isset($data['econt']['econt_machine_postcode'])) {
			$postcode = $data['econt']['econt_machine_postcode'];
		} else if (isset($data['econt']['econt_office_postcode'])) {
			$postcode = $data['econt']['econt_office_postcode'];
		} else {
			$postcode = '';
		}
		
		if (isset($data['econt']['econt_address_city'])) {
			$city = $data['econt']['econt_address_city'];
		} else if (isset($data['econt']['econt_machine_city'])) {
			$city = $data['econt']['econt_machine_city'];
		} else if (isset($data['econt']['econt_office_city'])) {
			$city = $data['econt']['econt_office_city'];
		} else {
			$city = '';
		}
		
		if (isset($data['econt']['econt_quarter'])) {
			$quarter = $data['econt']['econt_quarter'];
		} else {
			$quarter = '';
		}
		
		if (isset($data['econt']['econt_street'])) {
			$street = $data['econt']['econt_street'];
		} else {
			$street = '';
		}
		
		if (isset($data['econt']['econt_street_num'])) {
			$street_num = $data['econt']['econt_street_num'];
		} else {
			$street_num = '';
		}
		
		if (isset($data['econt']['econt_other'])) {
			$other = $data['econt']['econt_other'];
		} else {
			$other = '';
		}
		
		if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
			$weight = $this->cart->getWeight();
		} else if ($this->config->get('shipping_tk_econt_weight_total') && $this->config->get('shipping_tk_econt_weight_total') > 0) {
			$weight = $this->config->get('shipping_tk_econt_weight_total') * $this->cart->countProducts();
		} else {
			$weight = 1 * $this->cart->countProducts();
		}
		
		if ($this->config->get('shipping_tk_econt_weight_type') && $this->config->get('shipping_tk_econt_weight_type') == 'gram') {
			$weight = $weight / 1000;
		}
		
		if ($weight < 0.01) {
			$weight = 0.01;
		}
		
		$sub_total = $this->cart->getSubTotal();
		
		if (isset($data['payment_method']['code'])) {
			$payment_code = $data['payment_method']['code'];
		} else {
			$payment_code = 'cod';
		}
		
		if (isset($data['econt']['econt_sms']) && $data['econt']['econt_sms'] == 2) {
			$sms = 1;
		} else {
			$sms = 0;
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_econt_order SET order_id = '" . (int)$order_id . "', loading_id = '0', status_id = '0', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', other = '" . $this->db->escape($other) . "', city_id = '" . (int)$city_id . "', office_id = '" . (int)$office_id . "', office_code = '" . $this->db->escape($office_code) . "', weight = '" . $this->db->escape($weight) . "', sub_total = '" . $this->db->escape($sub_total) . "', payment_code = '" . $this->db->escape($payment_code) . "', sms = '" . $sms . "'");
		
		$econt_order_id = $this->db->getLastId();
		
		//автоматично пращане на данни към delivery.econt.com
		if ($econt_order_id) {
			if ($this->config->get('shipping_tk_econt_auto_label')) {
				$this->sendToDeliveryEcont($order_id);
			}
		}
		
		return $econt_order_id;
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function getOrderPayment($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_payment WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function updateOrder($order_id, $loading_id, $status_id) {
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET loading_id = '" . $this->db->escape($loading_id) . "', status_id = '" . (int)$status_id . "' WHERE order_id  = '" . (int)$order_id . "'");
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_order WHERE status_id > 0 AND shipment_status != 'payed' AND shipment_status != 'client' AND shipment_status != 'return' AND shipment_status != 'deleted' AND shipment_status != 'destroy' AND shipment_status != 'error' OR shipment_status is NULL");
		
		return $query->rows;
	}
	
	// данни за офиси и адреси
	public function getQuartersByCityId($city_id) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, q.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_quarter q WHERE q.city_id = '" . (int)$city_id . "' ORDER BY q.name" . $suffix;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getStreetsByCityId($city_id, $data = array()) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, s.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_street s WHERE s.city_id = '" . (int)$city_id . "' ORDER BY s.name" . $suffix;
		
		if (isset($data['limit']) && $data['limit'] != 0) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			
			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCityByName($data, $limit = 20) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city c WHERE";
		
		if (!empty($data['filter_name'])) {
			
			$sql .= " (LCASE(c.name) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			$sql .= " OR LCASE(c.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			$sql .= " OR LCASE(c.name) LIKE '%" . $this->db->escape(utf8_strtolower($this->model_extension_module_tk_checkout->latin_to_cyrillic($data['filter_name']))) . "%'";
			$sql .= " OR c.post_code LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%')";
		} else {
			$sql .= " city_id > 0 ";
		}
		
		$sql .= " ORDER BY c.name" . $suffix;
		
		if ($limit != 0) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			
			if ($limit < 1) {
				$limit = 20;
			}
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$limit;
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getQuartersByName($name, $city_id, $limit = 20) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, q.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_quarter q WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(q.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(q.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND q.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY q.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getStreetsByName($data, $city_id, $limit = 20) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, s.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_street s WHERE ";
		
		if (!empty($data['filter_name'])) {
			
			$sql .= " (LCASE(s.name) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			$sql .= " OR LCASE(s.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			$sql .= " OR LCASE(s.name) LIKE '%" . $this->db->escape(utf8_strtolower($this->model_extension_module_tk_checkout->latin_to_cyrillic($data['filter_name']))) . "%')";
		} else {
			$sql .= " street_id > 0 ";
		}
		
		if ($city_id && $city_id != 0) {
			$sql .= " AND s.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY s.name" . $suffix;
		
		if ($limit != 0) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			
			if ($limit < 1) {
				$limit = 20;
			}
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$limit;
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCityByNameAndPostcode($name, $postcode) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_econt_city c WHERE (LCASE(TRIM(c.name)) = '" . $this->db->escape(utf8_strtolower(trim($name))) . "' OR LCASE(TRIM(c.name_en)) = '" . $this->db->escape(utf8_strtolower(trim($name))) . "') AND TRIM(c.post_code) = '" . $this->db->escape(trim($postcode)) . "'");
		
		return $query->row;
	}
	
	public function getCities($is_office = 0, $is_machine = 0) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		if ($is_machine == 1) {
			$sql = "SELECT city_id, name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city WHERE is_office = '" . (int)$is_office . "' AND is_machine = '" . (int)$is_machine . "' GROUP BY city_id ORDER BY name" . $suffix;
		} else {
			$sql = "SELECT city_id, name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city WHERE is_office = '" . (int)$is_office . "' GROUP BY city_id ORDER BY name" . $suffix;
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getOfficesByCityId($city_id, $is_machine = 0) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address FROM " . DB_PREFIX . "tk_econt_office o WHERE o.city_id = '" . (int)$city_id . "' AND o.is_machine = '" . (int)$is_machine . "' GROUP BY o.office_id ORDER BY o.name" . $suffix;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getOffice($office_id) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT o.office_id, o.city_id, o.office_code, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address, eco.name" . $suffix . " AS office_city, eco.post_code FROM " . DB_PREFIX . "tk_econt_office o LEFT JOIN " . DB_PREFIX . "tk_econt_city eco ON eco.city_id = o.city_id WHERE o.office_id = '" . (int)$office_id . "'");
		
		return $query->row;
	}
	
	public function getOfficeByOfficeCode($office_code) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT o.office_id, o.city_id, o.office_code, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address, eco.name" . $suffix . " AS office_city, eco.post_code FROM " . DB_PREFIX . "tk_econt_office o LEFT JOIN " . DB_PREFIX . "tk_econt_city eco ON eco.city_id = o.city_id WHERE o.office_code = '" . $office_code . "'");
		
		if ($query->num_rows == 1) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function getMachine() {
		
		$query = $this->db->query("SELECT office_id, office_code FROM " . DB_PREFIX . "tk_econt_office WHERE is_machine = '1' ORDER BY office_id ASC LIMIT 1");
		
		return $query->row;
	}
	
	public function getCity($city_id) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT c.city_id, c.post_code, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_city c WHERE city_id = '" . (int)$city_id . "'";
		
		$query = $this->db->query($sql);
		if ($query->num_rows == 1) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function getQuarters($name, $city_id, $limit = 10) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, q.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_quarter q WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(q.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(q.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND q.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY q.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getStreets($name, $city_id, $limit = 10) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, s.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_econt_street s WHERE 1";
		
		if ($name) {
			$sql .= " AND (LCASE(s.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(s.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		if ($city_id) {
			$sql .= " AND s.city_id = '" . (int)$city_id . "'";
		}
		
		$sql .= " ORDER BY s.name" . $suffix;
		
		$sql .= " LIMIT " . (int)$limit;
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	// ъпдейт на офиси и адреси с крон
	public function updateOffices() {
		
		$office_city = array();
		$machine_city = array();
		
		// добавяме градове
		$data['type'] = 'cities';
		$cities_results = $this->serviceXML($data);
		if (isset($cities_results->cities)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_city");
			
			$city_insert_sql = "INSERT INTO " . DB_PREFIX . "tk_econt_city (`city_id`, `post_code`, `type`, `name`, `name_en`, `is_office`, `is_machine`) VALUES ";
			foreach ($cities_results->cities->e as $city) {
				if ($city->id_country == '1033') {
					$city_insert_sql .= "(" . (int)$city->id . ", '" . (int)$city->post_code . "', '" . $this->db->escape($city->type) . "', '" . $this->db->escape($city->name) . "', '" . $this->db->escape($city->name_en) . "', 0, 0), ";
				}
			}
			$city_insert_sql = substr_replace($city_insert_sql, ';', strrpos($city_insert_sql, ','), 1);
			$this->db->query($city_insert_sql);
		} else {
			return false;
		}
		
		// добавяме квартали
		$data['type'] = 'cities_quarters';
		$cities_quarters_results = $this->serviceXML($data);
		if (isset($cities_quarters_results->cities_quarters)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_quarter");
			
			$quarter_insert_sql = "INSERT INTO " . DB_PREFIX . "tk_econt_quarter (`quarter_id`, `name`, `name_en`, `city_id`) VALUES ";
			foreach ($cities_quarters_results->cities_quarters->e as $quarter) {
				$quarter_insert_sql .= "(" . (int)$quarter->id . ", '" . $this->db->escape($quarter->name) . "', '" . $this->db->escape($quarter->name_en) . "', " . (int)$quarter->id_city . "), ";
			}
			$quarter_insert_sql = substr_replace($quarter_insert_sql, ';', strrpos($quarter_insert_sql, ','), 1);
			$this->db->query($quarter_insert_sql);
		} else {
			return false;
		}
		
		// добавяме улици
		$data['type'] = 'cities_streets';
		$cities_streets_results = $this->serviceXML($data);
		if (isset($cities_streets_results->cities_street)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_street");
			
			$count_sql = 0;
			$count_result = 0;
			$street_insert_sql[$count_sql] = "INSERT INTO " . DB_PREFIX . "tk_econt_street (`street_id`, `name`, `name_en`, `city_id`) VALUES ";
			foreach ($cities_streets_results->cities_street->e as $street) {
				
				if ($count_result == 10000) {
					$count_sql++;
					
					$street_insert_sql[$count_sql] = "INSERT INTO " . DB_PREFIX . "tk_econt_street (`street_id`, `name`, `name_en`, `city_id`) VALUES ";
				}
				
				$street_insert_sql[$count_sql] .= "(" . (int)$street->id . ", '" . $this->db->escape($street->name) . "', '" . $this->db->escape($street->name_en) . "', " . (int)$street->id_city . "), ";
				
				$count_result++;
			}
			
			foreach ($street_insert_sql as $street_insert) {
				$street_insert = substr_replace($street_insert, ';', strrpos($street_insert, ','), 1);
				$this->db->query($street_insert);
			}
		} else {
			return false;
		}
		
		// добавяме офиси
		$data['type'] = 'offices';
		$offices_results = $this->serviceXML($data);
		if (isset($offices_results->offices)) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_office");
			foreach ($offices_results->offices->e as $office) {
				
				$office_city[] = (int)$office->id_city;
				
				if ($office->is_machine > 0) {
					$machine_city[] = (int)$office->id_city;
				}
				
				if ($office->country_code == 'BGR') {
					$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_econt_office SET office_id = '" . (int)$office->id . "', name = '" . $this->db->escape($office->name) . "', name_en = '" . $this->db->escape($office->name_en) . "', office_code = '" . $this->db->escape($office->office_code) . "', address = '" . $this->db->escape($office->address) . "', address_en = '" . $this->db->escape($office->address_en) . "', city_id = '" . (int)$office->id_city . "', is_machine = '" . (int)$office->is_machine . "'");
				}
			}
		} else {
			return false;
		}
		
		// обновяваме в кои градове има офиси и автомати
		$data['type'] = 'cities';
		$results = $this->serviceXML($data);
		if (isset($results->cities)) {
			foreach ($results->cities->e as $city) {
				if ($city->id_country == '1033') {
					
					if (in_array($city->id, $office_city)) {
						$is_office = 1;
					} else {
						$is_office = 0;
					}
					
					if (in_array($city->id, $machine_city)) {
						$is_machine = 1;
					} else {
						$is_machine = 0;
					}
					
					$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_city SET is_machine = '" . $is_machine . "', is_office = '" . $is_office . "' WHERE city_id  = '" . (int)$city->id . "'");
				}
			}
		} else {
			return false;
		}
		
		return true;
	}
	
	// ъпдейт на товарителници с крон
	public function editShipment($order_id, $response) {
		
		if (!isset($response) || !$response) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '1', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL WHERE order_id  = '" . (int)$order_id . "'");
		} else {
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
				
				$reversed = array_reverse($response['trackingEvents']);
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '2', shipment_number = '" . $this->db->escape($response['shipmentNumber']) . "', shipment_status = '" . $this->db->escape($reversed[0]['destinationType']) . "', shipment_status_txt = '" . $this->db->escape($reversed[0]['destinationDetails']) . "', pdf = '" . $this->db->escape($response['pdfURL']) . "', mail_send = '" . $this->db->escape($reversed[0]['destinationType']) . "' WHERE order_id  = '" . (int)$order_id . "'");
			} else if (!empty($response['shipmentNumber'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '2', shipment_number = '" . $this->db->escape($response['shipmentNumber']) . "', shipment_status = 'prepared', shipment_status_txt = 'Очаква предаване към Еконт', pdf = '" . $this->db->escape($response['pdfURL']) . "', mail_send = 'prepared' WHERE order_id  = '" . (int)$order_id . "'");
			} else if (isset($response['id'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '1', loading_id =  '" . $this->db->escape($response['id']) . "', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
			} else if (isset($response['error'])) {
				$shipment_number = preg_replace('/\D/', '', $response['error']['message']);
				if (!$shipment_number) {
					$shipment_number = NULL;
				}
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '3', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status = 'error', shipment_status_txt = '" . $this->db->escape($response['error']['message']) . "', pdf = NULL, mail_send = 'error' WHERE order_id  = '" . (int)$order_id . "'");
			} else {
				$this->db->query("UPDATE " . DB_PREFIX . "tk_econt_order SET status_id = '1', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
			}
		}
	}
	
	// връзка с еконт
	public function sendToDeliveryEcont($order_id = 0) {
		
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('catalog/product');
		
		$order_data = $this->getOrder($order_id);
		
		if ($order_data) {
			//данни за грантирано с еконт
			if ($this->config->get('payment_tk_econt_payment_status') == 1) {
				$order_payment = $this->getOrderPayment($order_id);
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
					$office = $this->getOffice($order_data['office_id']);
				}
				
				if (isset($office) && $office) {
					$office_code = $office['office_code'];
				} else {
					$office_code = '';
				}
				
				$city = '';
			} else if ($order_data['shipping_to'] == 'machine') {
				if (isset($order_data['office_id'])) {
					$office = $this->getOffice($order_data['office_id']);
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
			$this->load->model('checkout/order');
			$op_order_info = $this->model_checkout_order->getOrder($order_id);
			
			if (isset($op_order_info['payment_iso_code_3'])) {
				$countryCode = $op_order_info['payment_iso_code_3'];
			} else {
				$countryCode = 'BGR';
			}
			
			if (isset($op_order_info['firstname'])) {
				$firstname = $op_order_info['firstname'];
			} else {
				$firstname = ' ';
			}
			
			if (isset($op_order_info['lastname'])) {
				$lastname = $op_order_info['lastname'];
			} else {
				$lastname = ' ';
			}
			
			$face = '';
			$name = $firstname . ' ' . $lastname;
			
			//проверка дали имаме фирма
			if ($this->config->get('shipping_tk_econt_company') && !empty($op_order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) && utf8_strlen($op_order_info['custom_field'][$this->config->get('shipping_tk_econt_company')]) > 3) {
				$face = $name;
				$name = $op_order_info['custom_field'][$this->config->get('shipping_tk_econt_company')];
			}
		
			if (isset($op_order_info['email'])) {
				if (!$this->config->get('module_tk_checkout_required_email') || $this->config->get('module_tk_checkout_required_email') == 0) {
					$email = $op_order_info['email'];
				} else {
					$email = '';
				}
			} else {
				$email = '';
			}
			
			if (isset($op_order_info['telephone'])) {
				$telephone = $op_order_info['telephone'];
			} else {
				$telephone = '';
			}
			
			$shipment_description = '';
			if ($this->config->get('shipping_tk_econt_shipment_description')) {
				$shipment_description .= $this->config->get('shipping_tk_econt_shipment_description') . ' ' . $order_id;
			}
			
			//данни за продуктите
			$products = array();
			$op_order_products = $this->model_extension_module_tk_checkout->getOrderProducts($order_id);
			foreach ($op_order_products as $product) {
				
				if ($this->config->get('shipping_tk_econt_shipment_product_name') == 1 || $this->config->get('shipping_tk_econt_shipment_product_name') == 2) {
					$shipment_description .= ' ';
					$shipment_description .= $product['name'];
				}
				
				$result = $this->model_catalog_product->getProduct($product['product_id']);
				$order_options = $this->model_extension_module_tk_checkout->getOrderOptions($order_id, $product['order_product_id']);
				
				$option_weight = $result['weight'];
				
				if ($order_options) {
					foreach ($order_options as $order_option) {
						
						$option = $this->model_extension_module_tk_checkout->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
						
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
					$shipment_description .= $product['quantity'] . 'бр./';
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
			
			//данни за отстъпките
			$order_totals = $this->model_extension_module_tk_checkout->getOrderTotals($order_id);
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
			
			$response = $this->serviceDelivery($send_delivery_url, $send_delivery_data, $this->config->get('config_store_id'));
			
			if (isset($response['id']) && $response['id'] > 0) {
				$this->updateOrder($order_id, $response['id'], 1);
			}
		}
		
		return true;
	}
	
	public function servicePriceXML($params = array()) {
		
		if ($this->config->get('shipping_tk_econt_test')) {
			$url = 'http://demo.econt.com/e-econt/xml_parcel_import2.php';
		} else {
			$url = 'https://www.econt.com/e-econt/xml_parcel_import2.php';
		}
		
		$request = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><request></request>');
		self::array2XMLNode($params, $request);
		$curl = curl_init($url);
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_TIMEOUT        => 20,
			CURLOPT_POSTFIELDS     => array(
				'xml' => $request->asXML()
			)
		));
		
		$r = curl_exec($curl);
		
		if (empty($r)) {
			return false;
		} else {
			libxml_use_internal_errors(true);
			$doc = simplexml_load_string($r);
			if ($doc !== false) {
				return json_decode(json_encode(new \SimpleXMLElement($r)), true);
			} else {
				return false;
			}
		}
	}
	
	public static function array2XMLNode($array, \SimpleXMLElement $parentNode) {
		
		if (!is_array($array)) return;
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				if (!array_key_exists(0, $v)) $vv = array($v); else $vv = $v;
				foreach ($vv as $vvv) {
					self::array2XMLNode($vvv, $parentNode->addChild($k));
				}
			} else {
				$parentNode->addChild($k, $v);
			}
		}
	}
	
	public function serviceXML($data) {
		
		if (!empty($data['test'])) {
			$test = $data['test'];
		} else {
			$test = $this->config->get('shipping_tk_econt_test');
		}
		
		if ($test) {
			$url = 'http://demo.econt.com/e-econt/xml_service_tool.php';
		} else {
			$url = 'http://www.econt.com/e-econt/xml_service_tool.php';
		}
		
		if (!empty($data['username'])) {
			$username = $data['username'];
		} else {
			$username = $this->config->get('shipping_tk_econt_username');
		}
		
		if (!empty($data['password'])) {
			$password = $data['password'];
		} else {
			$password = $this->config->get('shipping_tk_econt_password');
		}
		
		$request = '<?xml version="1.0" ?>
		<request>
		<client>
		<username>' . $username . '</username>
		<password>' . $password . '</password>
		</client>
		<request_type>' . $data['type'] . '</request_type>';
		
		if (isset($data['xml'])) {
			$request .= $data['xml'];
		}
		
		$request .= '</request>';
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array('xml' => $request));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		libxml_use_internal_errors(true);
		
		return simplexml_load_string($response);
	}
	
	public function serviceJSON($data) {
		
		$method = "Shipments/ShipmentService.getShipmentStatuses.json";
		
		if (!empty($data['test'])) {
			$test = $data['test'];
		} else {
			$test = $this->config->get('shipping_tk_econt_test');
		}
		
		if ($test) {
			$url = 'https://demo.econt.com/ee/services/';
		} else {
			$url = 'https://ee.econt.com/services/';
		}
		
		if (!empty($data['username'])) {
			$username = $data['username'];
		} else {
			$username = $this->config->get('shipping_tk_econt_username');
		}
		
		if (!empty($data['password'])) {
			$password = $data['password'];
		} else {
			$password = $this->config->get('shipping_tk_econt_password');
		}
		
		if ($data['shipment_number']) {
			$data = array(
				"shipmentNumbers" => [$data['shipment_number']]
			);
		}
		
		$auth = array(
			'username' => $username,
			'password' => $password,
		);
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url . $method);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_USERPWD, $auth['username'] . ':' . $auth['password']);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		
		$response = curl_exec($curl);
		
		$jsonResponse = json_decode($response, true);
		
		curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		if ($jsonResponse === false) {
			exit("cURL Error: " . curl_error($curl));
		}
		
		return ($jsonResponse);
	}
	
	public function serviceDelivery($url, $data, $store_id = false, $test = false) {
		
		if (!$store_id) {
			$store_id = $this->config->get('config_store_id');
		}
		
		if (!$store_id) {
			$store_id = 0;
		}
		
		$tk_econt_store_kay = $this->config->get('shipping_tk_econt_store_kay');
		
		if (!$test) {
			$test = $this->config->get('shipping_tk_econt_test');
		}
		
		if ($test) {
			$data_url = 'http://delivery.demo.econt.com/';
		} else {
			$data_url = 'https://delivery.econt.com/';
		}
		
		$response = array();
		
		if (isset($tk_econt_store_kay[$store_id]) && $tk_econt_store_kay[$store_id] && $data) {
			try {
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $data_url . $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_HTTPHEADER, [
					'Content-Type: application/json',
					'Authorization: ' . $tk_econt_store_kay[$store_id]
				]);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($curl, CURLOPT_TIMEOUT, 60);
				
				$response = json_decode(curl_exec($curl), true);
				
				$response_info = curl_getinfo($curl);
				
				if ($response_info['http_code'] !== 200) $response['error'] = $response;
				
				curl_close($curl);
			} catch (Exception $exception) {
				$response['error'] = $exception;
				$this->log->write('TK Econt error');
				$this->log->write($exception->getCode());
				$this->log->write($exception->getMessage());
			}
		}
		
		return $response;
	}
}