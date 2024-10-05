<?php

class ModelExtensionShippingTkSpeedy extends Model {
	
	public function getQuote($address) {
		
		$this->load->language('extension/shipping/tk_speedy');
		$this->load->model('extension/module/tk_checkout');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_tk_speedy_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
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
			$address['iso_code_2'] = $country['iso_code_2'];
		} else {
			$address['iso_code_2'] = 'BG';
		}
		
		if (!$this->config->get('shipping_tk_speedy_geo_zone_id')) {
			$status = true;
		} else if ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
		
		if (!$this->config->get('module_tk_checkout_token')) {
			$status = false;
		}
		
		if ($address['iso_code_2'] != 'BG' && $address['iso_code_2'] != 'RO') {
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
			$address_data['iso_code_2'] = $address['iso_code_2'];
			if ($address['iso_code_2'] == 'RO') {
				$address_data['language'] = 'EN';
				$address_data['country_id'] = 642;
				$address_data['city_id'] = '642279132';
				$address_data['office_id'] = '926';
				$address_data['machine_id'] = '29001';
			} else if ($address['iso_code_2'] == 'GR') {
				$address_data['language'] = 'EN';
				$address_data['country_id'] = 300;
				$address_data['city_id'] = '68134';
				$address_data['office_id'] = '2';
				$address_data['machine_id'] = '9001';
			} else {
				if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
					$address_data['language'] = 'BG';
				} else {
					$address_data['language'] = 'EN';
				}
				
				$address_data['country_id'] = 100;
				$address_data['city_id'] = '68134';
				$address_data['office_id'] = '2';
				$address_data['machine_id'] = '9001';
			}
			
			if (!empty($this->session->data['tk_checkout']['speedy']['speedy_address_city_id'])) {
				$address_data['city_id'] = $this->session->data['tk_checkout']['speedy']['speedy_address_city_id'];
			}
			
			if (!empty($this->session->data['tk_checkout']['speedy']['speedy_office_id']) && $this->session->data['tk_checkout']['speedy']['speedy_office_id'] > 0) {
				$address_data['office_id'] = $this->session->data['tk_checkout']['speedy']['speedy_office_id'];
			}
			
			if (!empty($this->session->data['tk_checkout']['speedy']['speedy_machine_id']) && $this->session->data['tk_checkout']['speedy']['speedy_machine_id'] > 0) {
				$address_data['machine_id'] = $this->session->data['tk_checkout']['speedy']['speedy_machine_id'];
			}
			
			// данни за теглото
			if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
				$weight = $this->cart->getWeight();
			} else if ($this->config->get('shipping_tk_speedy_weight_total') && $this->config->get('shipping_tk_speedy_weight_total') > 0) {
				$weight = $this->config->get('shipping_tk_speedy_weight_total') * $this->cart->countProducts();
			} else {
				$weight = 1 * $this->cart->countProducts();
			}
			
			if ($this->config->get('shipping_tk_speedy_weight_type') && $this->config->get('shipping_tk_speedy_weight_type') == 'gram') {
				$weight = $weight / 1000;
			}
			
			if ($weight < 0.01) {
				$weight = 0.01;
			}
			
			// данни за сумата на тоталите
			$tk_totals = $this->config->get('shipping_tk_speedy_totals');
			if ($tk_totals) {
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
			if ($this->config->get('shipping_tk_speedy_machine_weight') > 0) {
				$machine_weight = $this->config->get('shipping_tk_speedy_machine_weight');
			} else {
				$machine_weight = 50;
			}
			
			if ($this->config->get('shipping_tk_speedy_office_weight') > 0) {
				$office_weight = $this->config->get('shipping_tk_speedy_office_weight');
			} else {
				$office_weight = 50;
			}
			
			if ($this->config->get('shipping_tk_speedy_address_weight') > 0) {
				$address_weight = $this->config->get('shipping_tk_speedy_address_weight');
			} else {
				$address_weight = 250;
			}
			
			// разрешени методи
			if (!$this->config->get('shipping_tk_speedy_machine_enabled') || $weight > $machine_weight) {
				$to_machine = false;
			} else {
				$to_machine = true;
				
				if ($address['iso_code_2'] != 'BG') {
					$to_machine = false;
				}
			}
			
			if (!$this->config->get('shipping_tk_speedy_office_enabled') || $weight > $office_weight) {
				$to_office = false;
			} else {
				$to_office = true;
			}
			
			if (!$this->config->get('shipping_tk_speedy_address_enabled') || $weight > $address_weight) {
				$to_door = false;
			} else {
				if ($this->config->get('shipping_tk_speedy_weight_value') && $weight > 50) {
					$to_door = false;
					
					foreach ($this->config->get('shipping_tk_speedy_weight_value') as $weight_value) {
						if ($weight_value['from'] < $weight && $weight_value['to'] >= $weight && $weight_value['type'] == 'door') {
							$to_door = true;
						}
					}
				} else {
					$to_door = true;
				}
			}
			
			// подредба на методите
			if ($this->config->get('shipping_tk_speedy_machine_sort') > 0) {
				$machine_sort = $this->config->get('shipping_tk_speedy_machine_sort');
			} else {
				$machine_sort = 1;
			}
			
			if ($this->config->get('shipping_tk_speedy_office_sort') > 0) {
				$office_sort = $this->config->get('shipping_tk_speedy_office_sort');
			} else {
				$office_sort = 2;
			}
			
			if ($this->config->get('shipping_tk_speedy_address_sort') > 0) {
				$address_sort = $this->config->get('shipping_tk_speedy_address_sort');
			} else {
				$address_sort = 3;
			}
			
			// корекция в текстовете
			if ($this->config->get('shipping_tk_speedy_text')) {
				$tk_text_array = $this->config->get('shipping_tk_speedy_text');
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
				if ($weight > 50) {
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
			$free_machine = false;
			$free_office = false;
			$free_door = false;
			
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
				if (($this->config->get('shipping_tk_speedy_machine_free_weight') && $this->config->get('shipping_tk_speedy_machine_free_weight') > 0 && $this->config->get('shipping_tk_speedy_machine_free_weight') >= $weight) || !$this->config->get('shipping_tk_speedy_machine_free_weight') || $this->config->get('shipping_tk_speedy_machine_free_weight') == 0) {
					$free_machine_weight = true;
				}
				
				if (($this->config->get('shipping_tk_speedy_office_free_weight') && $this->config->get('shipping_tk_speedy_office_free_weight') > 0 && $this->config->get('shipping_tk_speedy_office_free_weight') >= $weight) || !$this->config->get('shipping_tk_speedy_office_free_weight') || $this->config->get('shipping_tk_speedy_office_free_weight') == 0) {
					$free_office_weight = true;
				}
				
				if (($this->config->get('shipping_tk_speedy_door_free_weight') && $this->config->get('shipping_tk_speedy_door_free_weight') > 0 && $this->config->get('shipping_tk_speedy_door_free_weight') >= $weight) || !$this->config->get('shipping_tk_speedy_door_free_weight') || $this->config->get('shipping_tk_speedy_door_free_weight') == 0) {
					$free_door_weight = true;
				}
				
				// безплатна доставка спрямо модула на доставчика
				if ($this->config->get('shipping_tk_speedy_machine_free') && $this->config->get('shipping_tk_speedy_machine_free') > 0 && $total >= $this->config->get('shipping_tk_speedy_machine_free') && $free_machine_weight) {
					$free_machine = true;
				}
				
				if ($this->config->get('shipping_tk_speedy_office_free') && $this->config->get('shipping_tk_speedy_office_free') > 0 && $total >= $this->config->get('shipping_tk_speedy_office_free') && $free_office_weight) {
					$free_office = true;
				}
				
				if ($this->config->get('shipping_tk_speedy_door_free') && $this->config->get('shipping_tk_speedy_door_free') > 0 && $total >= $this->config->get('shipping_tk_speedy_door_free') && $free_door_weight) {
					$free_door = true;
				}
				
				// безплатна доставка от купон
				if (isset($this->session->data['coupon'])) {
					$this->load->model('extension/total/coupon');
					$coupon_info = $this->model_extension_total_coupon->getCoupon($this->session->data['coupon']);
					if (isset($coupon_info['shipping']) && $coupon_info['shipping'] == 1) {
						$free_machine = true;
						$free_office = true;
						$free_door = true;
					}
				}
				
				// цена за доставка от апи
				if ($this->config->get('shipping_tk_speedy_calculate_enabled') && $weight <= 50) {
					if ($to_machine && !$free_machine) {
						$price_machine = $this->getPrices('machine', $address_data, $total, $weight, $payment_method);
						
						if ($price_machine == 0 && $this->config->get('shipping_tk_speedy_machine_fixed_cost') && $this->config->get('shipping_tk_speedy_machine_fixed_cost') > 0) {
							$price_machine = round($this->config->get('shipping_tk_speedy_machine_fixed_cost'), 2);
						}
					}
					
					if ($to_office && !$free_office) {
						$price_office = $this->getPrices('office', $address_data, $total, $weight, $payment_method);
						
						if ($price_office == 0 && $this->config->get('shipping_tk_speedy_office_fixed_cost') && $this->config->get('shipping_tk_speedy_office_fixed_cost') > 0) {
							$price_office = round($this->config->get('shipping_tk_speedy_office_fixed_cost'), 2);
						}
					}
					
					if ($to_door && !$free_door) {
						$price_door = $this->getPrices('door', $address_data, $total, $weight, $payment_method);
						
						if ($price_door == 0 && $this->config->get('shipping_tk_speedy_door_fixed_cost') && $this->config->get('shipping_tk_speedy_door_fixed_cost') > 0) {
							$price_door = round($this->config->get('shipping_tk_speedy_door_fixed_cost'), 2);
						}
					}
				} else {
					// фиксирана цена
					if ($this->config->get('shipping_tk_speedy_machine_fixed_cost') && $this->config->get('shipping_tk_speedy_machine_fixed_cost') > 0 && !$free_machine) {
						$price_machine = round($this->config->get('shipping_tk_speedy_machine_fixed_cost'), 2);
					}
					
					if ($this->config->get('shipping_tk_speedy_office_fixed_cost') && $this->config->get('shipping_tk_speedy_office_fixed_cost') > 0 && !$free_office) {
						$price_office = round($this->config->get('shipping_tk_speedy_office_fixed_cost'), 2);
					}
					
					if ($this->config->get('shipping_tk_speedy_door_fixed_cost') && $this->config->get('shipping_tk_speedy_door_fixed_cost') > 0 && !$free_door) {
						$price_door = round($this->config->get('shipping_tk_speedy_door_fixed_cost'), 2);
					}
				}
				
				// цена по тегло
				if ($this->config->get('shipping_tk_speedy_weight_value')) {
					foreach ($this->config->get('shipping_tk_speedy_weight_value') as $weight_value) {
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
				
				// безплатна доставка от tk_special_shipping
				if ($this->config->get('module_tk_special_shipping_status')) {
					$this->load->model('extension/total/tk_special_shipping');
					
					if ($to_machine && !empty($price_machine) && $price_machine > 0) {
						$tk_special_machine = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_speedy.speedy_machine');
						
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
						$tk_special_office = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_speedy.speedy_office');
						
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
						$tk_special_door = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_speedy.speedy_door');
						
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
			if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_speedy_tax_class_id') && $price_machine > 0) {
				$rate = array_values($this->tax->getRates($price_machine, $this->config->get('shipping_tk_speedy_tax_class_id')));
				
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
				$quote_data[$machine_sort]['speedy_machine'] = array(
					'code'         => 'tk_speedy.speedy_machine',
					'title'        => $text_machine_title,
					'description'  => $text_machine_text,
					'cost'         => $this->tax->calculate($price_machine, $this->config->get('shipping_tk_speedy_tax_class_id'), $this->config->get('config_tax')),
					'tax_class_id' => $this->config->get('shipping_tk_speedy_tax_class_id'),
					'text'         => '<span id="to_machine_price">' . $price_machine_text . '</span>'
				);
			}
			
			if ($to_office) {
				$quote_data[$office_sort]['speedy_office'] = array(
					'code'         => 'tk_speedy.speedy_office',
					'title'        => $text_office_title,
					'description'  => $text_office_text,
					'cost'         => $this->tax->calculate($price_office, $this->config->get('shipping_tk_speedy_tax_class_id'), $this->config->get('config_tax')),
					'tax_class_id' => $this->config->get('shipping_tk_speedy_tax_class_id'),
					'text'         => '<span id="to_office_price">' . $price_office_text . '</span>'
				);
			}
			
			if ($to_door) {
				$quote_data[$address_sort]['speedy_door'] = array(
					'code'         => 'tk_speedy.speedy_door',
					'title'        => $text_address_title,
					'description'  => $text_address_text,
					'cost'         => $this->tax->calculate($price_door, $this->config->get('shipping_tk_speedy_tax_class_id'), $this->config->get('config_tax')),
					'tax_class_id' => $this->config->get('shipping_tk_speedy_tax_class_id'),
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
					'code'       => 'tk_speedy',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote,
					'sort_order' => $this->config->get('shipping_tk_speedy_sort_order'),
					'error'      => false
				);
			}
		}
		
		return $method_data;
	}
	
	public function getPrices($type, $address, $total, $weight, $payment_method) {
		
		$price = 0;
		
		//от офис или адрес спярмо клиентски номер
		$senderArray = array(
			'clientId' => $this->config->get('shipping_tk_speedy_client_id'),
		);
		
		if ($this->config->get('shipping_tk_speedy_from_office') && $this->config->get('shipping_tk_speedy_office_id') && $address['country_id'] == 100) {
			$senderArray['dropoffOfficeId'] = $this->config->get('shipping_tk_speedy_office_id');
		}
		
		// тип на доставката
		$serviceArray = array(
			'autoAdjustPickupDate' => true,
			'serviceIds'           => $this->config->get('shipping_tk_speedy_allowed_methods')
		);
		
		//наложено плащане
		if ($this->config->get('shipping_tk_speedy_np_enabled') && $this->config->get('shipping_tk_speedy_np_enabled') == 1 && $payment_method == 'cod') {
			if ($this->config->get('shipping_tk_speedy_ppp_enabled') && $this->config->get('shipping_tk_speedy_ppp_enabled') == 1 && $address['iso_code_2'] == 'BG') {
				$cashOnDeliveryArray = array(
					'amount'         => $total,
					'processingType' => 'POSTAL_MONEY_TRANSFER'
				);
			} else {
				$cashOnDeliveryArray = array(
					'amount'         => $total,
					'processingType' => 'CASH'
				);
			}
			
			$serviceArray['additionalServices']['cod'] = $cashOnDeliveryArray;
		}
		
		//Допълнително изискване при обслужване
		if ($this->config->get('shipping_tk_speedy_special_delivery_requirement_id') && $this->config->get('shipping_tk_speedy_special_delivery_requirement_id') > 0) {
			$serviceArray['additionalServices']['specialDeliveryId'] = $this->config->get('shipping_tk_speedy_special_delivery_requirement_id');
		}
		
		// тегло
		if ($weight >= 32) {
			$multiply_count = ceil($weight / 32);
			$contentsArray = array(
				'parcelsCount' => $multiply_count,
				'totalWeight'  => $weight
			);
		} else {
			$contentsArray = array(
				'parcelsCount' => 1,
				'totalWeight'  => $weight
			);
		}
		
		//страна по плащането
		if ($address['country_id'] == 100) {
			$paymentsArray = array(
				'courierServicePayer' => 'RECIPIENT'
			);
		} else {
			$paymentsArray = array(
				'courierServicePayer' => 'SENDER'
			);
		}
		
		if ($this->config->get('shipping_tk_speedy_administrative_fee') && $this->config->get('shipping_tk_speedy_administrative_fee') > 0) {
			$paymentsArray['administrativeFee'] = 1;
		}
		
		if ($this->config->get('shipping_tk_speedy_discount_contract_id') && $this->config->get('shipping_tk_speedy_discount_card_id')) {
			$paymentsArray['discountCardId'] = array(
				'contractId' => $this->config->get('shipping_tk_speedy_discount_contract_id'),
				'cardId'     => $this->config->get('shipping_tk_speedy_discount_card_id')
			);
		}
		
		if ($type == 'machine') {
			//доставка до автомат
			$recipientArray = array(
				'privatePerson'  => true,
				'pickupOfficeId' => $address['machine_id']
			);
		} else if ($type == 'office') {
			//обявена стойност + чупливо
			if ($this->config->get('shipping_tk_speedy_os_enabled') && $this->config->get('shipping_tk_speedy_os_enabled') == 1) {
				if ($this->config->get('shipping_tk_speedy_fragile_enabled') && $this->config->get('shipping_tk_speedy_fragile_enabled') == 1) {
					$fragile = true;
				} else {
					$fragile = false;
				}
				
				$declaredValueArray = array(
					'amount'  => $total,
					'fragile' => $fragile
				);
				
				$serviceArray['additionalServices']['declaredValue'] = $declaredValueArray;
			}
			
			//доставка до офис
			if ($address['country_id'] == 100) {
				$recipientArray = array(
					'privatePerson'  => true,
					'pickupOfficeId' => $address['office_id']
				);
			} else {
				$recipientArray = array(
					'privatePerson'   => true,
					'addressLocation' => array(
						'countryId'      => $address['country_id'],
						'siteId'         => $address['city_id'],
						'pickupOfficeId' => $address['office_id']
					)
				);
			}
		} else {
			//обявена стойност + чупливо
			if ($this->config->get('shipping_tk_speedy_os_enabled') && $this->config->get('shipping_tk_speedy_os_enabled') == 1) {
				if ($this->config->get('shipping_tk_speedy_fragile_enabled') && $this->config->get('shipping_tk_speedy_fragile_enabled') == 1) {
					$fragile = true;
				} else {
					$fragile = false;
				}
				
				$declaredValueArray = array(
					'amount'  => $total,
					'fragile' => $fragile
				);
				
				$serviceArray['additionalServices']['declaredValue'] = $declaredValueArray;
			}
			
			//доставка до адрес
			if ($address['country_id'] == 100) {
				$recipientArray = array(
					'privatePerson'   => true,
					'addressLocation' => array(
						'siteId' => $address['city_id'],
					)
				);
			} else {
				$recipientArray = array(
					'privatePerson'   => true,
					'addressLocation' => array(
						'countryId' => $address['country_id'],
						'siteId'    => $address['city_id']
					)
				);
			}
		}
		
		// вземаме цена по апи
		$calculateData = array(
			'language'  => $address['language'],
			'sender'    => $senderArray,
			'recipient' => $recipientArray,
			'service'   => $serviceArray,
			'content'   => $contentsArray,
			'payment'   => $paymentsArray
		);
		
		$calculateResponse = $this->serviceJSON('calculate/', $calculateData);
		$calculateResponse = json_decode($calculateResponse, true);
		
		if (isset($calculateResponse['calculations'][0]['error']['message']) && $calculateResponse['calculations'][0]['error']['message'] != "Услугата не е позволена") {
			$this->log->write($calculateResponse['calculations'][0]['error']['message']);
		}
		
		$calculation = false;
		$calculations = array();
		if (isset($calculateResponse['calculations'])) {
			foreach ($calculateResponse['calculations'] as $service) {
				if (isset($service['price']['total'])) {
					$calculations[$service['serviceId']] = $service['price']['total'];
				}
			}
			if ($calculations) {
				$calculation = min($calculations);
			}
		}
		
		if ($calculation && $calculation > 0) {
			$price = round($calculation, 2);
		}
		
		// надбавка за обработка
		if ($this->config->get('shipping_tk_speedy_calculator_fixed') && $this->config->get('shipping_tk_speedy_calculator_fixed') > 0) {
			$price = round($price + $this->config->get('shipping_tk_speedy_calculator_fixed'), 2);
		}
		
		// такса ппп
		if ($this->config->get('shipping_tk_speedy_ppp_min') && $this->config->get('shipping_tk_speedy_ppp_tax') > 0 && $payment_method == 'cod') {
			$ppp = $total * ($this->config->get('shipping_tk_speedy_ppp_tax') / 100);
			if ($ppp < $this->config->get('shipping_tk_speedy_ppp_min')) {
				$ppp = $this->config->get('shipping_tk_speedy_ppp_min');
			}
			$price = round($price + $ppp, 2);
		}
		
		return $price;
	}
	
	// показваме темплейти
	public function getSpeedyMachine() {
		
		$this->load->language('extension/shipping/tk_speedy');
		$this->load->language('tk_checkout/checkout');
		$this->load->model('extension/module/tk_checkout');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$zone_code = 'courier_ro';
		} else if ($iso_code_2 == 'GR') {
			$zone_code = 'courier_gr';
		} else {
			$zone_code = 'courier';
		}
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['text_no_offices'] = $this->language->get('text_no_offices');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_speedy_machine_title'] = $this->language->get('text_speedy_machine_title');
		$data['text_speedy_office_desc'] = $this->language->get('text_speedy_office_desc');
		$data['text_speedy_office_map'] = $this->language->get('text_speedy_office_map');
		$data['text_speedy_office_city'] = $this->language->get('text_speedy_office_city');
		$data['text_speedy_office_office'] = $this->language->get('text_speedy_office_office');
		$data['text_speedy_office_address'] = $this->language->get('text_speedy_office_address');
		$data['text_speedy_machine_desc'] = $this->language->get('text_speedy_office_desc');
		$data['text_speedy_machine_map'] = $this->language->get('text_speedy_office_map');
		$data['text_speedy_machine_city'] = $this->language->get('text_speedy_office_city');
		$data['text_speedy_machine_office'] = $this->language->get('text_speedy_office_office');
		$data['text_speedy_machine_address'] = $this->language->get('text_speedy_office_address');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		
		$data['speedy_machine_city'] = '';
		$data['speedy_machine_name'] = '';
		$data['speedy_machine_address'] = '';
		$data['speedy_machine_postcode'] = '';
		$data['speedy_machine_customer_id'] = 0;
		$data['speedy_machines_customer'] = array();
		
		if ($this->customer->isLogged()) {
			$data['speedy_machines_customer'] = $this->getCustomers('machine');
			$data['speedy_machine_customer'] = $this->getCustomer('machine');
			if (!empty($data['speedy_machine_customer'])) {
				$data['speedy_machine_customer_id'] = $data['speedy_machine_customer']['speedy_customer_id'];
			}
		}
		
		$data['speedy_cities'] = $this->getCitiesWithMachines();
		if (!$data['speedy_cities']) {
			$this->updateOffices();
			$data['speedy_cities'] = $this->getCitiesWithMachines();
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_machine_city_id'])) {
			$data['speedy_machine_city_id'] = $this->session->data['tk_checkout']['speedy']['speedy_machine_city_id'];
		} else {
			$data['speedy_machine_city_id'] = '';
		}
		
		if (isset($data['speedy_machine_city_id']) && $data['speedy_machine_city_id'] != '') {
			$city = $this->getCityOfficeByCityId($data['speedy_machine_city_id']);
			$data['speedy_machine_city'] = $city['name'];
			$data['speedy_machine_postcode'] = $city['post_code'];
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_machine_id'])) {
			$data['speedy_machine_id'] = $this->session->data['tk_checkout']['speedy']['speedy_machine_id'];
		} else {
			$data['speedy_machine_id'] = '';
		}
		
		if (isset($data['speedy_machine_id']) && $data['speedy_machine_id'] != '') {
			$machine = $this->getOffice($data['speedy_machine_id']);
			
			if ($machine) {
				$data['speedy_machine_city_id'] = $machine['city_id'];
				$city = $this->getCityOfficeByCityId($data['speedy_machine_city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $machine['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $machine['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['speedy_machine_city'] = $city['name'];
				$data['speedy_machine_name'] = $name;
				$data['speedy_machine_address'] = $address;
			}
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_machine_type'])) {
			$data['speedy_machine_type'] = $this->session->data['tk_checkout']['speedy']['speedy_machine_type'];
		} else {
			$data['speedy_machine_type'] = '';
		}
		
		$data['speedy_machines'] = array();
		if (isset($data['speedy_machine_city_id'])) {
			$results = $this->getMachinesByCityId($data['speedy_machine_city_id']);
			
			foreach ($results as $result) {
				$city = $this->getCityOfficeByCityId($result['city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $result['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $result['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['speedy_machines'][] = array(
					'office_id' => $result['office_id'],
					'name'      => $name,
					'address'   => $address,
					'city_id'   => $result['city_id']
				);
			}
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/speedy_machine', $data));
	}
	
	public function getSpeedyOffice() {
		
		$this->load->language('extension/shipping/tk_speedy');
		$this->load->language('tk_checkout/checkout');
		$this->load->model('extension/module/tk_checkout');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$zone_code = 'courier_ro';
		} else if ($iso_code_2 == 'GR') {
			$zone_code = 'courier_gr';
		} else {
			$zone_code = 'courier';
		}
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['text_no_offices'] = $this->language->get('text_no_offices');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_speedy_office_title'] = $this->language->get('text_speedy_office_title');
		$data['text_speedy_office_desc'] = $this->language->get('text_speedy_office_desc');
		$data['text_speedy_office_map'] = $this->language->get('text_speedy_office_map');
		$data['text_speedy_office_city'] = $this->language->get('text_speedy_office_city');
		$data['text_speedy_office_office'] = $this->language->get('text_speedy_office_office');
		$data['text_speedy_office_address'] = $this->language->get('text_speedy_office_address');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		
		$data['speedy_office_city'] = '';
		$data['speedy_office_name'] = '';
		$data['speedy_office_address'] = '';
		$data['speedy_office_postcode'] = '';
		$data['speedy_office_customer_id'] = 0;
		$data['speedy_offices_customer'] = array();
		
		if ($this->customer->isLogged()) {
			$data['speedy_offices_customer'] = $this->getCustomers('office');
			$data['speedy_office_customer'] = $this->getCustomer('office');
			if (!empty($data['speedy_office_customer'])) {
				$data['speedy_office_customer_id'] = $data['speedy_office_customer']['speedy_customer_id'];
			}
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_office_city_id'])) {
			$data['speedy_office_city_id'] = $this->session->data['tk_checkout']['speedy']['speedy_office_city_id'];
		} else {
			$data['speedy_office_city_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_office_id'])) {
			$data['speedy_office_id'] = $this->session->data['tk_checkout']['speedy']['speedy_office_id'];
		} else {
			$data['speedy_office_id'] = '';
		}
		
		if ($iso_code_2 == 'BG') {
			$data['speedy_cities'] = $this->getCitiesWithOffices();
			if (!$data['speedy_cities']) {
				$this->updateOffices();
				$data['speedy_cities'] = $this->getCitiesWithOffices();
			}
			
			if (isset($data['speedy_office_city_id']) && $data['speedy_office_city_id'] != '') {
				$city = $this->getCityOfficeByCityId($data['speedy_office_city_id']);
				if ($city) {
					$data['speedy_office_city'] = $city['name'];
					$data['speedy_office_postcode'] = $city['post_code'];
				}
			}
			
			if (isset($data['speedy_office_id']) && $data['speedy_office_id'] != '') {
				$office = $this->getOffice($data['speedy_office_id']);
				
				if ($office) {
					$data['speedy_office_city_id'] = $office['city_id'];
					$city = $this->getCityOfficeByCityId($data['speedy_office_city_id']);
					
					if ($city) {
						$address = str_replace($city['name'] . ', ', '', $office['address']);
						$address = str_replace($city['name'] . ' ', '', $address);
						
						$name = str_replace($city['name'] . ', ', '', $office['name']);
						$name = str_replace($city['name'] . ' ', '', $name);
						
						$data['speedy_office_city'] = $city['name'];
						$data['speedy_office_name'] = $name;
						$data['speedy_office_address'] = $address;
					}
				}
			}
		}
		
		if ((!$data['speedy_office_name'] || $data['speedy_office_name'] == '') && isset($this->session->data['tk_checkout']['speedy']['speedy_office_name'])) {
			$data['speedy_office_name'] = $this->session->data['tk_checkout']['speedy']['speedy_office_name'];
		}
		
		if ((!$data['speedy_office_address'] || $data['speedy_office_address'] == '') && isset($this->session->data['tk_checkout']['speedy']['speedy_office_address'])) {
			$data['speedy_office_address'] = $this->session->data['tk_checkout']['speedy']['speedy_office_address'];
		}
		
		if ((!$data['speedy_office_city'] || $data['speedy_office_city'] == '') && isset($this->session->data['tk_checkout']['speedy']['speedy_office_city'])) {
			$data['speedy_office_city'] = $this->session->data['tk_checkout']['speedy']['speedy_office_city'];
		}
		
		if ((!$data['speedy_office_postcode'] || $data['speedy_office_postcode'] == '') && isset($this->session->data['tk_checkout']['speedy']['speedy_office_postcode'])) {
			$data['speedy_office_postcode'] = $this->session->data['tk_checkout']['speedy']['speedy_office_postcode'];
		}
		
		if ((!$data['speedy_office_city_id'] || $data['speedy_office_city_id'] == '') && isset($this->session->data['tk_checkout']['speedy']['speedy_office_city_id'])) {
			$data['speedy_office_city_id'] = $this->session->data['tk_checkout']['speedy']['speedy_office_city_id'];
		}
		
		if ((!$data['speedy_office_id'] || $data['speedy_office_id'] == '') && isset($this->session->data['tk_checkout']['speedy']['speedy_office_id'])) {
			$data['speedy_office_id'] = $this->session->data['tk_checkout']['speedy']['speedy_office_id'];
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_office_type'])) {
			$data['speedy_office_type'] = $this->session->data['tk_checkout']['speedy']['speedy_office_type'];
		} else {
			$data['speedy_office_type'] = '';
		}
		
		$data['speedy_offices'] = array();
		if (isset($data['speedy_office_city_id']) && $iso_code_2 == 'BG') {
			$results = $this->getOfficesByCityId($data['speedy_office_city_id']);
			
			foreach ($results as $result) {
				$city = $this->getCityOfficeByCityId($result['city_id']);
				
				$address = str_replace($city['name'] . ', ', '', $result['address']);
				$address = str_replace($city['name'] . ' ', '', $address);
				
				$name = str_replace($city['name'] . ', ', '', $result['name']);
				$name = str_replace($city['name'] . ' ', '', $name);
				
				$data['speedy_offices'][] = array(
					'office_id' => $result['office_id'],
					'name'      => $name,
					'address'   => $address,
					'city_id'   => $result['city_id']
				);
			}
		}
		
		if ($iso_code_2 == 'BG') {
			$this->response->setOutput($this->load->view('tk_checkout/speedy_office', $data));
		} else {
			$this->response->setOutput($this->load->view('tk_checkout/speedy_office_ro', $data));
		}
	}
	
	public function getSpeedyAddress($data = array()) {
		
		$this->load->language('extension/shipping/tk_speedy');
		$this->load->language('tk_checkout/checkout');
		$this->load->model('extension/module/tk_checkout');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$zone_code = 'courier_ro';
		} else if ($iso_code_2 == 'GR') {
			$zone_code = 'courier_gr';
		} else {
			$zone_code = 'courier';
		}
		
		$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
		$data['zone_id'] = $zone_info['zone_id'];
		
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
		$data['text_speedy_office_city'] = $this->language->get('text_speedy_office_city');
		$data['text_speedy_office_office'] = $this->language->get('text_speedy_office_office');
		$data['text_speedy_office_address'] = $this->language->get('text_speedy_office_address');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['text_none'] = $this->language->get('text_none');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_quarter'] = $this->language->get('entry_quarter');
		$data['entry_street'] = $this->language->get('entry_street');
		$data['entry_other'] = $this->language->get('entry_other');
		$data['entry_street_num'] = $this->language->get('entry_street_num');
		$data['entry_block_no'] = $this->language->get('entry_block_no');
		$data['entry_entrance_no'] = $this->language->get('entry_entrance_no');
		$data['entry_floor_no'] = $this->language->get('entry_floor_no');
		$data['entry_apartment_no'] = $this->language->get('entry_apartment_no');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['text_help_address'] = $this->language->get('text_help_address');
		$data['text_no_street'] = $this->language->get('text_no_street');
		$data['error_address'] = '';
		
		$data['speedy_address_customer_id'] = 0;
		$data['speedy_addresses_customer'] = array();
		$data['speedy_quarters'] = array();
		$data['speedy_streets'] = array();
		
		if ($this->customer->isLogged()) {
			$data['speedy_addresses_customer'] = $this->getCustomers('address');
			$data['speedy_address_customer'] = $this->getCustomer('address');
			if (!empty($data['speedy_address_customer'])) {
				$data['speedy_address_customer_id'] = $data['speedy_address_customer']['speedy_customer_id'];
			}
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_address_postcode'])) {
			$data['speedy_address_postcode'] = $this->session->data['tk_checkout']['speedy']['speedy_address_postcode'];
		} else {
			$data['speedy_address_postcode'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_address_city'])) {
			$data['speedy_address_city'] = $this->session->data['tk_checkout']['speedy']['speedy_address_city'];
		} else {
			$data['speedy_address_city'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_address_city_id']) && $this->session->data['tk_checkout']['speedy']['speedy_address_city_id'] > 0) {
			$data['speedy_address_city_id'] = $this->session->data['tk_checkout']['speedy']['speedy_address_city_id'];
			if (empty($data['iso_code_2']) || $data['iso_code_2'] == 'BG') {
				$data['speedy_quarters'] = $this->getQuartersByCityId($data['speedy_address_city_id']);
				$data['speedy_streets'] = $this->getStreetsByCityId($data['speedy_address_city_id']);
			}
		} else {
			$data['speedy_address_city_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_quarter_id']) && $this->session->data['tk_checkout']['speedy']['speedy_quarter_id'] > 0) {
			$data['speedy_quarter_id'] = $this->session->data['tk_checkout']['speedy']['speedy_quarter_id'];
		} else {
			$data['speedy_quarter_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_street_id']) && $this->session->data['tk_checkout']['speedy']['speedy_street_id']) {
			$data['speedy_street_id'] = $this->session->data['tk_checkout']['speedy']['speedy_street_id'];
		} else {
			$data['speedy_street_id'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_street'])) {
			$data['speedy_street'] = $this->session->data['tk_checkout']['speedy']['speedy_street'];
		} else {
			$data['speedy_street'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_quarter'])) {
			$data['speedy_quarter'] = $this->session->data['tk_checkout']['speedy']['speedy_quarter'];
		} else {
			$data['speedy_quarter'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_street_num'])) {
			$data['speedy_street_num'] = $this->session->data['tk_checkout']['speedy']['speedy_street_num'];
		} else {
			$data['speedy_street_num'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_block_no'])) {
			$data['speedy_block_no'] = $this->session->data['tk_checkout']['speedy']['speedy_block_no'];
		} else {
			$data['speedy_block_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_entrance_no'])) {
			$data['speedy_entrance_no'] = $this->session->data['tk_checkout']['speedy']['speedy_entrance_no'];
		} else {
			$data['speedy_entrance_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_floor_no'])) {
			$data['speedy_floor_no'] = $this->session->data['tk_checkout']['speedy']['speedy_floor_no'];
		} else {
			$data['speedy_floor_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_apartment_no'])) {
			$data['speedy_apartment_no'] = $this->session->data['tk_checkout']['speedy']['speedy_apartment_no'];
		} else {
			$data['speedy_apartment_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_other'])) {
			$data['speedy_other'] = $this->session->data['tk_checkout']['speedy']['speedy_other'];
		} else {
			$data['speedy_other'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['speedy']['speedy_address_type'])) {
			$data['speedy_address_type'] = $this->session->data['tk_checkout']['speedy']['speedy_address_type'];
		} else {
			$data['speedy_address_type'] = '';
		}
		
		$data['speedy_cities'] = $this->getCities();
		
		$this->response->setOutput($this->load->view('tk_checkout/speedy_address', $data));
	}
	
	// обработваме данните за доставка
	public function addSpeedyData($data) {
		
		$return = array();
		
		$this->load->model('extension/module/tk_checkout');
		$this->load->language('extension/shipping/tk_speedy');
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$countryId = 642;
			$zone_code = 'courier_ro';
		} else if ($iso_code_2 == 'GR') {
			$countryId = 300;
			$zone_code = 'courier_gr';
		} else {
			$countryId = 100;
			$zone_code = 'courier';
		}
		
		if (!isset($data['zone_id'])) {
			$this->load->model('extension/module/tk_checkout');
			$zone_info = $this->model_extension_module_tk_checkout->getZone($zone_code);
			$data['zone_id'] = $zone_info['zone_id'];
		}
		
		//зона Спиди
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
		
		if (isset($data['shipping_to']) && $data['shipping_to'] == 'machine') {
			$return['postcode'] = '';
			
			$return['shipping_to'] = $data['shipping_to'];
			
			if (isset($data['speedy_machine_customer_id']) && $data['speedy_machine_type'] == 'existing' && $data['speedy_machine_customer_id'] > 0) {
				$speedy_customer_info = $this->getCustomer('machine', $data['speedy_machine_customer_id']);
				
				$return['speedy_machine_type'] = 'existing';
				$return['speedy_machine_customer_id'] = $data['speedy_machine_customer_id'];
				$return['speedy_machine_city_id'] = $speedy_customer_info['city_id'];
				$return['speedy_machine_id'] = $speedy_customer_info['office_id'];
				$return['speedy_machine_postcode'] = $speedy_customer_info['postcode'];
				
				if ($return['speedy_machine_city_id'] && $return['speedy_machine_id']) {
					$city = $this->getCityOfficeByCityId($return['speedy_machine_city_id']);
					
					$return['speedy_machine_city'] = $city['name'];
					
					$machine = $this->getOffice($return['speedy_machine_id']);
					$machine_address = str_replace($return['speedy_machine_city'] . ' ', '', $machine['address']);
					$return['machine'] = $machine['office_id'] . ' - ' . $machine['name'] . ' - ' . $machine_address;
				}
				
				$return['address_1'] = isset($return['machine']) ? $return['machine'] : '';
				$return['city'] = $return['speedy_machine_city'];
				$return['postcode'] = $return['speedy_machine_postcode'];
			} else {
				$return['speedy_machine_type'] = 'new';
				
				if (!isset($data['speedy_machine_id']) || !$data['speedy_machine_id'] || $data['speedy_machine_id'] == 0) {
					$error['speedy_machine_city_id'] = $this->language->get('error_office');
				}
				
				if (isset($data['speedy_machine_city_id'])) {
					$return['speedy_machine_city_id'] = $data['speedy_machine_city_id'];
				} else {
					$return['speedy_machine_city_id'] = '';
				}
				
				if (isset($data['speedy_machine_id']) && $data['speedy_machine_id'] != 0) {
					$return['speedy_machine_id'] = $data['speedy_machine_id'];
				} else {
					$return['speedy_machine_id'] = '';
				}
				
				if (isset($data['speedy_machine_postcode']) && $data['speedy_machine_postcode'] != 0) {
					$return['speedy_machine_postcode'] = $data['speedy_machine_postcode'];
				} else {
					$return['speedy_machine_postcode'] = '';
				}
				
				if ($return['speedy_machine_city_id'] && $return['speedy_machine_id']) {
					$city = $this->getCityOfficeByCityId($return['speedy_machine_city_id']);
					
					$return['speedy_machine_city'] = $city['name'];
					
					$machine = $this->getOffice($return['speedy_machine_id']);
					$machine_address = str_replace($return['speedy_machine_city'] . ' ', '', $machine['address']);
					$return['machine'] = $machine['office_id'] . ' - ' . $machine['name'] . ' - ' . $machine_address;
				}
				
				if (isset($return['machine'])) {
					$return['address_1'] = $return['machine'];
					$return['postcode'] = $return['speedy_machine_postcode'];
					$return['city'] = $return['speedy_machine_city'];
				}
			}
		} else if (isset($data['shipping_to']) && $data['shipping_to'] == 'office') {
			$return['postcode'] = '';
			
			$return['shipping_to'] = $data['shipping_to'];
			
			if (isset($data['speedy_office_customer_id']) && $data['speedy_office_type'] == 'existing' && $data['speedy_office_customer_id'] > 0) {
				$speedy_customer_info = $this->getCustomer('office', $data['speedy_office_customer_id']);
				
				$return['speedy_office_type'] = 'existing';
				$return['speedy_office_customer_id'] = $data['speedy_office_customer_id'];
				$return['speedy_office_city_id'] = $speedy_customer_info['city_id'];
				$return['speedy_office_id'] = $speedy_customer_info['office_id'];
				$return['speedy_office_postcode'] = $speedy_customer_info['postcode'];
				
				if ($return['speedy_office_city_id'] && $return['speedy_office_id']) {
					$city = $this->getCityOfficeByCityId($return['speedy_office_city_id']);
					
					$return['speedy_office_city'] = $city['name'];
					
					$office = $this->getOffice($return['speedy_office_id'], $return['speedy_office_city_id']);
					$office_address = str_replace($return['speedy_office_city'] . ' ', '', $office['address']);
					$return['office'] = $office['office_id'] . ' - ' . $office['name'] . ' - ' . $office_address;
				}
				
				$return['address_1'] = isset($return['office']) ? $return['office'] : '';
				$return['city'] = $return['speedy_office_city'];
				$return['postcode'] = $return['speedy_office_postcode'];
			} else {
				$return['speedy_office_type'] = 'new';
				
				if (!isset($data['speedy_office_id']) || !$data['speedy_office_id'] || $data['speedy_office_id'] == 0) {
					$error['speedy_office_city_id'] = $this->language->get('error_office');
				}
				
				if (isset($data['speedy_office_city_id'])) {
					$return['speedy_office_city_id'] = $data['speedy_office_city_id'];
				} else {
					$return['speedy_office_city_id'] = '';
				}
				
				if (isset($data['speedy_office_id']) && $data['speedy_office_id'] != 0) {
					$return['speedy_office_id'] = $data['speedy_office_id'];
				} else {
					$return['speedy_office_id'] = '';
				}
				
				if (isset($data['speedy_office_postcode']) && $data['speedy_office_postcode'] != 0) {
					$return['speedy_office_postcode'] = $data['speedy_office_postcode'];
				} else {
					$return['speedy_office_postcode'] = '';
				}
				
				if (isset($data['speedy_office_name']) && $data['speedy_office_name']) {
					$return['speedy_office_name'] = $data['speedy_office_name'];
				} else {
					$return['speedy_office_name'] = '';
				}
				
				if (isset($data['speedy_office_address']) && $data['speedy_office_address']) {
					$return['speedy_office_address'] = $data['speedy_office_address'];
				} else {
					$return['speedy_office_address'] = '';
				}
				
				if (isset($data['speedy_office_city']) && $data['speedy_office_city']) {
					$return['speedy_office_city'] = $data['speedy_office_city'];
				} else {
					$return['speedy_office_city'] = '';
				}
				
				if ($return['speedy_office_city_id'] && $return['speedy_office_id']) {
					if ($countryId == 100) {
						
						$city = $this->getCityOfficeByCityId($return['speedy_office_city_id']);
						
						$return['speedy_office_city'] = $city['name'];
						
						$office = $this->getOffice($return['speedy_office_id']);
						$office_address = str_replace($return['speedy_office_city'] . ' ', '', $office['address']);
						$return['office'] = $office['office_id'] . ' - ' . $office['name'] . ' - ' . $office_address;
					} else {
						$return['office'] = $return['speedy_office_id'] . ' - ' . $return['speedy_office_name'] . ' - ' . $return['speedy_office_address'];
					}
				}
				
				if (isset($return['office'])) {
					$return['address_1'] = $return['office'];
					$return['postcode'] = $return['speedy_office_postcode'];
					$return['city'] = $return['speedy_office_city'];
				}
			}
		} else if (isset($data['shipping_to']) && $data['shipping_to'] == 'address') {
			$return['shipping_to'] = $data['shipping_to'];
			
			if (isset($data['speedy_address_customer_id']) && $data['speedy_address_type'] == 'existing' && $data['speedy_address_customer_id'] > 0) {
				$speedy_customer_info = $this->getCustomer('address', $data['speedy_address_customer_id']);
				
				$return['speedy_address_type'] = 'existing';
				$return['speedy_address_customer_id'] = $data['speedy_address_customer_id'];
				
				$return['speedy_address_city'] = $speedy_customer_info['city'];
				$return['speedy_address_city_id'] = $speedy_customer_info['city_id'];
				$return['speedy_quarter'] = $speedy_customer_info['quarter'];
				$return['speedy_street'] = $speedy_customer_info['street'];
				$return['speedy_street_num'] = $speedy_customer_info['street_num'];
				$return['speedy_block_no'] = $speedy_customer_info['block_no'];
				$return['speedy_entrance_no'] = $speedy_customer_info['entrance_no'];
				$return['speedy_floor_no'] = $speedy_customer_info['floor_no'];
				$return['speedy_apartment_no'] = $speedy_customer_info['apartment_no'];
				$return['speedy_address_postcode'] = $speedy_customer_info['postcode'];
				$return['speedy_other'] = $speedy_customer_info['other'];
				
				$return['address_1'] = '';
				
				if (isset($return['speedy_quarter']) && $return['speedy_quarter']) {
					$return['address_1'] .= $this->language->get('entry_quarter') . $return['speedy_quarter'];
				}
				
				if (isset($return['speedy_block_no']) && $return['speedy_block_no']) {
					$return['address_1'] .= ', ' . $this->language->get('entry_block_no') . $return['speedy_block_no'];
				}
				
				if (isset($return['speedy_entrance_no']) && $return['speedy_entrance_no']) {
					$return['address_1'] .= ', ' . $this->language->get('entry_entrance_no') . $return['speedy_entrance_no'];
				}
				
				if (isset($return['speedy_floor_no']) && $return['speedy_floor_no']) {
					$return['address_1'] .= ', ' . $this->language->get('entry_floor_no') . $return['speedy_floor_no'];
				}
				
				if (isset($return['speedy_apartment_no']) && $return['speedy_apartment_no']) {
					$return['address_1'] .= ', ' . $this->language->get('entry_apartment_no') . $return['speedy_apartment_no'];
				}
				
				if (isset($return['speedy_street_select']) && $return['speedy_street']) {
					if ($return['address_1']) {
						$return['address_1'] .= ', ';
					}
					$return['address_1'] .= $return['speedy_street'];
				}
				
				if (isset($return['speedy_street_num']) && $return['speedy_street_num']) {
					$return['address_1'] .= ' № ' . $return['speedy_street_num'];
				}
				
				if (isset($return['speedy_other']) && $return['speedy_other']) {
					$return['address_1'] .= ', ' . $return['speedy_other'];
				}
				
				$return['city'] = $return['speedy_address_city'];
				$return['postcode'] = $return['speedy_address_postcode'];
			} else {
				$return['payment_address_type'] = 'new';
				
				if (isset($data['speedy_address_city'])) {
					$return['speedy_address_city'] = $data['speedy_address_city'];
				}
				
				if (isset($data['speedy_address_city_id'])) {
					$return['speedy_address_city_id'] = $data['speedy_address_city_id'];
				}
				
				if (isset($data['speedy_quarter'])) {
					$return['speedy_quarter'] = $data['speedy_quarter'];
				} else {
					$return['speedy_quarter'] = '';
				}
				
				if (isset($data['speedy_street'])) {
					$return['speedy_street'] = $data['speedy_street'];
				}
				
				if (isset($data['speedy_quarter_id'])) {
					$return['speedy_quarter_id'] = $data['speedy_quarter_id'];
				}
				
				if (isset($data['speedy_street_id'])) {
					$return['speedy_street_id'] = $data['speedy_street_id'];
				}
				
				if (isset($data['speedy_street_num'])) {
					$return['speedy_street_num'] = $data['speedy_street_num'];
				} else {
					$return['speedy_street_num'] = '';
				}
				
				if (isset($data['speedy_block_no'])) {
					$return['speedy_block_no'] = $data['speedy_block_no'];
				} else {
					$return['speedy_block_no'] = '';
				}
				
				if (isset($data['speedy_entrance_no'])) {
					$return['speedy_entrance_no'] = $data['speedy_entrance_no'];
				} else {
					$return['speedy_entrance_no'] = '';
				}
				
				if (isset($data['speedy_floor_no'])) {
					$return['speedy_floor_no'] = $data['speedy_floor_no'];
				} else {
					$return['speedy_floor_no'] = '';
				}
				
				if (isset($data['speedy_apartment_no'])) {
					$return['speedy_apartment_no'] = $data['speedy_apartment_no'];
				} else {
					$return['speedy_apartment_no'] = '';
				}
				
				if (isset($data['speedy_address_postcode'])) {
					$return['speedy_address_postcode'] = $data['speedy_address_postcode'];
				}
				
				if (isset($data['speedy_other'])) {
					$return['speedy_other'] = $data['speedy_other'];
				}
				
				if (isset($data['speedy_address_city']) && ((utf8_strlen(trim($data['speedy_address_city'])) < 1) || (utf8_strlen(trim($data['speedy_address_city'])) > 52))) {
					$error['speedy_street_select'] = $this->language->get('error_city');
				}
				
				$error_speedy_street_select = false;
				$error_speedy_quarter_select = false;
				if ($iso_code_2 == 'BG') {
					if (!empty($data['speedy_street'] && ((utf8_strlen(trim($data['speedy_street'])) < 1) || (utf8_strlen(trim($data['speedy_street'])) > 350)))) {
						$error_speedy_street_select = true;
					}
					
					if (!empty($data['speedy_quarter'] && ((utf8_strlen(trim($data['speedy_quarter'])) < 1) || (utf8_strlen(trim($data['speedy_quarter'])) > 350)))) {
						$error_speedy_quarter_select = true;
					}
					
					if ((empty($data['speedy_street']) && empty($data['speedy_quarter'])) || ($error_speedy_street_select && $error_speedy_quarter_select)) {
						$error['speedy_street_select'] = $this->language->get('error_validate_street_quarter');
					}
					
					if ((isset($data['speedy_street_num']) && ((utf8_strlen(trim($data['speedy_street_num'])) < 1) || (utf8_strlen(trim($data['speedy_street_num'])) > 350))) && (isset($data['speedy_block_no']) && ((utf8_strlen(trim($data['speedy_block_no'])) < 1) || (utf8_strlen(trim($data['speedy_block_no'])) > 350)))) {
						$error['speedy_street_num'] = $this->language->get('error_street_num');
					}
				} else {
					if ((isset($data['speedy_street']) && ((utf8_strlen(trim($data['speedy_street'])) < 1) || (utf8_strlen(trim($data['speedy_street'])) > 350)))) {
						$error['speedy_street_select'] = $this->language->get('error_validate_street_quarter');
					}
					
					if ((isset($data['speedy_street_num']) && ((utf8_strlen(trim($data['speedy_street_num'])) < 1) || (utf8_strlen(trim($data['speedy_street_num'])) > 350)))) {
						$error['speedy_street_num'] = $this->language->get('error_street_num');
					}
				}
				
				if (!empty($error)) {
					$error['speedy_street_select'] = $this->language->get('error_validate_addres');
				}
				
				if (empty($error)) {
					$return['address_1'] = '';
					
					if (isset($data['speedy_quarter']) && $data['speedy_quarter']) {
						$return['address_1'] .= $this->language->get('entry_quarter') . $data['speedy_quarter'];
					}
					
					if (isset($data['speedy_block_no']) && $data['speedy_block_no']) {
						$return['address_1'] .= ', ' . $this->language->get('entry_block_no') . $data['speedy_block_no'];
					}
					
					if (isset($data['speedy_entrance_no']) && $data['speedy_entrance_no']) {
						$return['address_1'] .= ', ' . $this->language->get('entry_entrance_no') . $data['speedy_entrance_no'];
					}
					
					if (isset($data['speedy_floor_no']) && $data['speedy_floor_no']) {
						$return['address_1'] .= ', ' . $this->language->get('entry_floor_no') . $data['speedy_floor_no'];
					}
					
					if (isset($data['speedy_apartment_no']) && $data['speedy_apartment_no']) {
						$return['address_1'] .= ', ' . $this->language->get('entry_apartment_no') . $data['speedy_apartment_no'];
					}
					
					if (isset($data['speedy_street']) && $data['speedy_street']) {
						if ($return['address_1']) {
							$return['address_1'] .= ', ';
						}
						$return['address_1'] .= $data['speedy_street'];
					}
					
					if (isset($data['speedy_street_num']) && $data['speedy_street_num']) {
						$return['address_1'] .= ' № ' . $data['speedy_street_num'];
					}
					
					if (isset($data['speedy_other']) && $data['speedy_other']) {
						$return['address_1'] .= ', ' . $data['speedy_other'];
					}
					
					$return['city'] = $return['speedy_address_city'];
					$return['postcode'] = $return['speedy_address_postcode'];
				}
			}
		}
		
		if (isset($error) && $error) {
			$return['error'] = $error;
		}
		
		return $return;
	}
	
	public function saveData() {
		
		if (isset($this->request->post['zone'])) {
			$this->session->data['tk_checkout']['speedy']['zone'] = $this->request->post['zone'];
		}
		
		if (isset($this->request->post['zone_id'])) {
			$this->session->data['tk_checkout']['speedy']['zone_id'] = $this->request->post['zone_id'];
		}
		
		if (isset($this->request->post['country_id'])) {
			$this->session->data['tk_checkout']['speedy']['country_id'] = $this->request->post['country_id'];
		}
		
		if (isset($this->request->post['speedy_address_postcode'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_address_postcode'] = $this->request->post['speedy_address_postcode'];
		}
		
		if (isset($this->request->post['speedy_office_postcode'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_postcode'] = $this->request->post['speedy_office_postcode'];
		}
		
		if (isset($this->request->post['speedy_machine_postcode'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_machine_postcode'] = $this->request->post['speedy_machine_postcode'];
		}
		
		if (isset($this->request->post['speedy_address_city_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_address_city_id'] = $this->request->post['speedy_address_city_id'];
		}
		
		if (isset($this->request->post['speedy_address_city'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_address_city'] = $this->request->post['speedy_address_city'];
		}
		
		if (isset($this->request->post['speedy_quarter_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_quarter_id'] = $this->request->post['speedy_quarter_id'];
		}
		
		if (isset($this->request->post['speedy_street_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_street_id'] = $this->request->post['speedy_street_id'];
		}
		
		if (isset($this->request->post['speedy_quarter'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_quarter'] = $this->request->post['speedy_quarter'];
		}
		
		if (isset($this->request->post['speedy_street'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_street'] = $this->request->post['speedy_street'];
		}
		
		if (isset($this->request->post['speedy_street_num'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_street_num'] = $this->request->post['speedy_street_num'];
		}
		
		if (isset($this->request->post['speedy_block_no'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_block_no'] = $this->request->post['speedy_block_no'];
		}
		
		if (isset($this->request->post['speedy_entrance_no'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_entrance_no'] = $this->request->post['speedy_entrance_no'];
		}
		
		if (isset($this->request->post['speedy_floor_no'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_floor_no'] = $this->request->post['speedy_floor_no'];
		}
		
		if (isset($this->request->post['speedy_apartment_no'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_apartment_no'] = $this->request->post['speedy_apartment_no'];
		}
		
		if (isset($this->request->post['speedy_other'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_other'] = $this->request->post['speedy_other'];
		}
		
		if (isset($this->request->post['speedy_machine_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_machine_id'] = $this->request->post['speedy_machine_id'];
		}
		
		if (isset($this->request->post['speedy_machine_city_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_machine_city_id'] = $this->request->post['speedy_machine_city_id'];
		}
		
		if (isset($this->request->post['speedy_office_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_id'] = $this->request->post['speedy_office_id'];
		}
		
		if (isset($this->request->post['speedy_office_city_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_city_id'] = $this->request->post['speedy_office_city_id'];
		}
		
		if (isset($this->request->post['speedy_address_customer_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_address_customer_id'] = $this->request->post['speedy_address_customer_id'];
		}
		
		if (isset($this->request->post['speedy_office_customer_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_customer_id'] = $this->request->post['speedy_office_customer_id'];
		}
		
		if (isset($this->request->post['speedy_machine_customer_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_machine_customer_id'] = $this->request->post['speedy_machine_customer_id'];
		}
		
		if (isset($this->request->post['speedy_customer_id'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_customer_id'] = $this->request->post['speedy_customer_id'];
		}
		
		if (isset($this->request->post['speedy_address_type'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_address_type'] = $this->request->post['speedy_address_type'];
		}
		
		if (isset($this->request->post['speedy_office_type'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_type'] = $this->request->post['speedy_office_type'];
		}
		
		if (isset($this->request->post['speedy_machine_type'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_machine_type'] = $this->request->post['speedy_machine_type'];
		}
		
		if (isset($this->request->post['speedy_office_name'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_name'] = $this->request->post['speedy_office_name'];
		}
		
		if (isset($this->request->post['speedy_office_address'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_address'] = $this->request->post['speedy_office_address'];
		}
		
		if (isset($this->request->post['speedy_office_city'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_office_city'] = $this->request->post['speedy_office_city'];
		}
		
		if (isset($this->request->post['speedy_machine_type'])) {
			$this->session->data['tk_checkout']['speedy']['speedy_machine_type'] = $this->request->post['speedy_machine_type'];
		}
	}
	
	// обработваме данните за клиента
	public function addCustomer($data) {
		
		if (!empty($data['country_id']) && $data['country_id'] > 0) {
			$country_id = $data['country_id'];
		} else {
			$country_id = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_id']) && $data['speedy']['speedy_machine_id'] > 0) {
			$office_id = $data['speedy']['speedy_machine_id'];
		} else if (!empty($data['speedy']['speedy_office_id']) && $data['speedy']['speedy_office_id'] > 0) {
			$office_id = $data['speedy']['speedy_office_id'];
		} else {
			$office_id = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_city_id']) && $data['speedy']['speedy_machine_city_id'] > 0) {
			$city_id = $data['speedy']['speedy_machine_city_id'];
		} else if (!empty($data['speedy']['speedy_office_city_id']) && $data['speedy']['speedy_office_city_id'] > 0) {
			$city_id = $data['speedy']['speedy_office_city_id'];
		} else if (!empty($data['speedy']['speedy_address_city_id']) && $data['speedy']['speedy_address_city_id'] > 0) {
			$city_id = $data['speedy']['speedy_address_city_id'];
		} else {
			$city_id = '';
		}
		
		if (!empty($data['speedy']['shipping_to'])) {
			$shipping_to = $data['speedy']['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_postcode'])) {
			$postcode = $data['speedy']['speedy_machine_postcode'];
		} else if (!empty($data['speedy']['speedy_office_postcode'])) {
			$postcode = $data['speedy']['speedy_office_postcode'];
		} else if (!empty($data['speedy']['speedy_address_postcode'])) {
			$postcode = $data['speedy']['speedy_address_postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_city'])) {
			$city = $data['speedy']['speedy_machine_city'];
		} else if (!empty($data['speedy']['speedy_office_city'])) {
			$city = $data['speedy']['speedy_office_city'];
		} else if (!empty($data['speedy']['speedy_address_city'])) {
			$city = $data['speedy']['speedy_address_city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['speedy']['speedy_quarter'])) {
			$quarter = $data['speedy']['speedy_quarter'];
		} else {
			$quarter = '';
		}
		
		if (!empty($data['speedy']['speedy_street'])) {
			$street = $data['speedy']['speedy_street'];
		} else {
			$street = '';
		}
		
		if (!empty($data['speedy']['speedy_street_num'])) {
			$street_num = $data['speedy']['speedy_street_num'];
		} else {
			$street_num = '';
		}
		
		if (!empty($data['speedy']['speedy_block_no'])) {
			$block_no = $data['speedy']['speedy_block_no'];
		} else {
			$block_no = '';
		}
		
		if (!empty($data['speedy']['speedy_entrance_no'])) {
			$entrance_no = $data['speedy']['speedy_entrance_no'];
		} else {
			$entrance_no = '';
		}
		
		if (isset($data['speedy']['speedy_floor_no'])) {
			$floor_no = $data['speedy']['speedy_floor_no'];
		} else {
			$floor_no = '';
		}
		
		if (!empty($data['speedy']['speedy_apartment_no'])) {
			$apartment_no = $data['speedy']['speedy_apartment_no'];
		} else {
			$apartment_no = '';
		}
		
		if (!empty($data['speedy']['speedy_other'])) {
			$other = $data['speedy']['speedy_other'];
		} else {
			$other = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_speedy_customer SET customer_id = '" . (int)$this->customer->getId() . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block_no = '" . $this->db->escape($block_no) . "', entrance_no = '" . $this->db->escape($entrance_no) . "', floor_no = '" . $this->db->escape($floor_no) . "', apartment_no = '" . $this->db->escape($apartment_no) . "', other = '" . $this->db->escape($other) . "', country_id = '" . (int)$country_id . "', city_id = '" . (int)$city_id . "', office_id = '" . (int)$office_id . "'");
	}
	
	public function getCustomer($shipping_to, $speedy_customer_id = NULL) {
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country_id = $this->session->data['tk_checkout']['country_id'];
		} else {
			$country_id = 33;
		}
		
		if ($speedy_customer_id != NULL) {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_speedy_customer WHERE speedy_customer_id = '" . (int)$speedy_customer_id . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND country_id = '" . (int)$country_id . "' ");
		} else {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_speedy_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND country_id = '" . (int)$country_id . "' ORDER BY speedy_customer_id ASC LIMIT 1 ");
		}
		
		if ($address_query->num_rows) {
			if ($address_query->row['office_id'] > 0) {
				$office = $this->getOffice($address_query->row['office_id'], $address_query->row['city_id']);
				$office_name = $office['name'];
				$office_address = $office['address'];
			} else {
				$office_name = '';
				$office_address = '';
			}
			
			return array(
				'speedy_customer_id' => $address_query->row['speedy_customer_id'],
				'shipping_to'        => $address_query->row['shipping_to'],
				'postcode'           => $address_query->row['postcode'],
				'city'               => $address_query->row['city'],
				'quarter'            => $address_query->row['quarter'],
				'street'             => $address_query->row['street'],
				'street_num'         => $address_query->row['street_num'],
				'block_no'           => $address_query->row['block_no'],
				'entrance_no'        => $address_query->row['entrance_no'],
				'floor_no'           => $address_query->row['floor_no'],
				'apartment_no'       => $address_query->row['apartment_no'],
				'other'              => $address_query->row['other'],
				'city_id'            => $address_query->row['city_id'],
				'office_name'        => $office_name,
				'office_address'     => $office_address,
				'office_id'          => $address_query->row['office_id']
			
			);
		} else {
			return false;
		}
	}
	
	public function getCustomers($shipping_to) {
		
		$address_data = array();
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country_id = $this->session->data['tk_checkout']['country_id'];
		} else {
			$country_id = 33;
		}
		
		$address_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_speedy_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND country_id = '" . (int)$country_id . "'");
		
		if ($address_query->num_rows) {
			foreach ($address_query->rows as $result) {
				if ($result['office_id'] > 0) {
					$office = $this->getOffice($result['office_id'], $result['city_id']);
					$office_name = $office['name'];
				} else {
					$office_name = '';
				}
				
				$address_data[$result['speedy_customer_id']] = array(
					'speedy_customer_id' => $result['speedy_customer_id'],
					'shipping_to'        => $result['shipping_to'],
					'postcode'           => $result['postcode'],
					'city'               => $result['city'],
					'quarter'            => $result['quarter'],
					'street'             => $result['street'],
					'street_num'         => $result['street_num'],
					'block_no'           => $result['block_no'],
					'entrance_no'        => $result['entrance_no'],
					'floor_no'           => $result['floor_no'],
					'apartment_no'       => $result['apartment_no'],
					'other'              => $result['other'],
					'city_id'            => $result['city_id'],
					'office_id'          => $result['office_id'],
					'office_name'        => $office_name
				
				);
			}
		}
		
		return $address_data;
	}
	
	// обработваме данните за поръчката
	public function addOrder($data, $order_id = 0) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (!empty($data['country_id']) && $data['country_id'] > 0) {
			$countries = $this->model_extension_module_tk_checkout->getCountryById($data['country_id']);
			$data['speedy']['iso_code_2'] = $countries['iso_code_2'];
			$data['speedy']['country'] = $countries['name'];
		} else {
			$data['speedy']['iso_code_2'] = 'BG';
			$data['speedy']['country'] = 'Bulgaria';
		}
		
		if (!empty($data['speedy']['iso_code_2'])) {
			if ($data['speedy']['iso_code_2'] == 'RO') {
				$data['speedy']['country_id'] = 642;
			} else if ($data['speedy']['iso_code_2'] == 'GR') {
				$data['speedy']['country_id'] = 300;
			} else {
				$data['speedy']['country_id'] = 100;
			}
		} else {
			$data['speedy']['country_id'] = 100;
		}
		
		if (!empty($data['country_id']) && $data['country_id'] > 0) {
			$country_id = $data['country_id'];
		} else {
			$country_id = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_id']) && $data['speedy']['speedy_machine_id'] > 0) {
			$office_id = $data['speedy']['speedy_machine_id'];
		} else if (!empty($data['speedy']['speedy_office_id']) && $data['speedy']['speedy_office_id'] > 0) {
			$office_id = $data['speedy']['speedy_office_id'];
		} else {
			$office_id = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_city_id']) && $data['speedy']['speedy_machine_city_id'] > 0) {
			$city_id = $data['speedy']['speedy_machine_city_id'];
		} else if (!empty($data['speedy']['speedy_office_city_id']) && $data['speedy']['speedy_office_city_id'] > 0) {
			$city_id = $data['speedy']['speedy_office_city_id'];
		} else if (!empty($data['speedy']['speedy_address_city_id']) && $data['speedy']['speedy_address_city_id'] > 0) {
			$city_id = $data['speedy']['speedy_address_city_id'];
		} else {
			$city_id = '';
		}
		
		if (!empty($data['speedy']['shipping_to'])) {
			$shipping_to = $data['speedy']['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_postcode'])) {
			$postcode = $data['speedy']['speedy_machine_postcode'];
		} else if (!empty($data['speedy']['speedy_office_postcode'])) {
			$postcode = $data['speedy']['speedy_office_postcode'];
		} else if (!empty($data['speedy']['speedy_address_postcode'])) {
			$postcode = $data['speedy']['speedy_address_postcode'];
		} else {
			$postcode = '';
		}
		
		if (!empty($data['speedy']['speedy_machine_city'])) {
			$city = $data['speedy']['speedy_machine_city'];
		} else if (!empty($data['speedy']['speedy_office_city'])) {
			$city = $data['speedy']['speedy_office_city'];
		} else if (!empty($data['speedy']['speedy_address_city'])) {
			$city = $data['speedy']['speedy_address_city'];
		} else {
			$city = '';
		}
		
		if (!empty($data['speedy']['speedy_quarter'])) {
			$quarter = $data['speedy']['speedy_quarter'];
		} else {
			$quarter = '';
		}
		
		if (!empty($data['speedy']['speedy_street'])) {
			$street = $data['speedy']['speedy_street'];
		} else {
			$street = '';
		}
		
		if (!empty($data['speedy']['speedy_street_num'])) {
			$street_num = $data['speedy']['speedy_street_num'];
		} else {
			$street_num = '';
		}
		
		if (!empty($data['speedy']['speedy_block_no'])) {
			$block_no = $data['speedy']['speedy_block_no'];
		} else {
			$block_no = '';
		}
		
		if (!empty($data['speedy']['speedy_entrance_no'])) {
			$entrance_no = $data['speedy']['speedy_entrance_no'];
		} else {
			$entrance_no = '';
		}
		
		if (!empty($data['speedy']['speedy_floor_no'])) {
			$floor_no = $data['speedy']['speedy_floor_no'];
		} else {
			$floor_no = '';
		}
		
		if (!empty($data['speedy']['speedy_apartment_no'])) {
			$apartment_no = $data['speedy']['speedy_apartment_no'];
		} else {
			$apartment_no = '';
		}
		
		if (!empty($data['speedy']['speedy_other'])) {
			$other = $data['speedy']['speedy_other'];
		} else {
			$other = '';
		}
		
		$data['speedy']['custmer_name'] = $data['firstname'] . ' ' . $data['lastname'];
		$data['speedy']['custmer_telephone'] = $data['telephone'];
		$data['speedy']['custmer_email'] = $data['email'];
		$data['speedy']['totals'] = $data['totals'];
		if (isset($data['shipping_method'])) {
			$data['speedy']['shipping_method'] = $data['shipping_method'];
		}
		
		if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
			$weight = $this->cart->getWeight();
		} else if ($this->config->get('shipping_tk_speedy_weight_total') && $this->config->get('shipping_tk_speedy_weight_total') > 0) {
			$weight = $this->config->get('shipping_tk_speedy_weight_total') * $this->cart->countProducts();
		} else {
			$weight = 1 * $this->cart->countProducts();
		}
		
		if ($this->config->get('shipping_tk_speedy_weight_type') && $this->config->get('shipping_tk_speedy_weight_type') == 'gram') {
			$weight = $weight / 1000;
		}
		
		if ($weight < 0.01) {
			$weight = 0.01;
		}
		
		$sub_total = $this->cart->getSubTotal();
		
		if (isset($data['payment_method']['code'])) {
			$payment_code = $data['payment_method']['code'];
		} else {
			$payment_code = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_speedy_order SET order_id = '" . (int)$order_id . "', loading_id = '0', status_id = '0', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block_no = '" . $this->db->escape($block_no) . "', entrance_no = '" . $this->db->escape($entrance_no) . "', floor_no = '" . $this->db->escape($floor_no) . "', apartment_no = '" . $this->db->escape($apartment_no) . "', other = '" . $this->db->escape($other) . "', country_id = '" . (int)$country_id . "', city_id = '" . (int)$city_id . "', office_id = '" . (int)$office_id . "', weight = '" . $this->db->escape($weight) . "', sub_total = '" . $this->db->escape($sub_total) . "', payment_code = '" . $this->db->escape($payment_code) . "', data = '" . $this->db->escape(serialize($data['speedy'])) . "'");
		
		return $this->db->getLastId();
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_speedy_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_speedy_order WHERE shipment_status != '-14' OR shipment_status is NULL AND status_id > 0");
		
		return $query->rows;
	}
	
	// данни за офиси и адреси
	public function getCityOfficeByName($name, $limit = 10) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$sql = "SELECT *, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_speedy_city_office c WHERE";
		
		if ($name) {
			$sql .= " (LCASE(c.name) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%' OR LCASE(c.name_en) LIKE '%" . $this->db->escape(utf8_strtolower($name)) . "%')";
		}
		
		$sql .= (($name) ? " AND" : '');
		$sql .= " ORDER BY c.name" . $suffix;
		$sql .= " LIMIT " . (int)$limit;
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getCitiesWithOffices($filter_name = NULL) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if ($filter_name != NULL) {
			$name = $filter_name;
		} else {
			$name = '';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$countryId = 642;
		} else if ($iso_code_2 == 'GR') {
			$countryId = 300;
		} else {
			$countryId = 100;
		}
		
		if ($countryId == 100) {
			if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
				$suffix = '';
			} else {
				$suffix = '_en';
			}
			
			$query = $this->db->query("SELECT c.city_id, c.post_code, c.type, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_speedy_city_office c LEFT JOIN " . DB_PREFIX . "tk_speedy_office o ON c.city_id = o.city_id WHERE o.type = 'office' GROUP BY city_id ORDER BY c.name" . $suffix);
			$cities = $query->rows;
		} else {
			$cities = $this->getCitiesOffices($name);
		}
		
		return $cities;
	}
	
	public function getCitiesWithMachines() {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT c.city_id, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_speedy_city_office c LEFT JOIN " . DB_PREFIX . "tk_speedy_office o ON c.city_id = o.city_id WHERE o.type = 'apt' GROUP BY city_id ORDER BY c.name" . $suffix);
		
		return $query->rows;
	}
	
	public function getOfficesByCityId($city_id, $filter_name = NULL) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		if ($filter_name != NULL) {
			$name = $filter_name;
		} else {
			$name = '';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$countryId = 642;
		} else if ($iso_code_2 == 'GR') {
			$countryId = 300;
		} else {
			$countryId = 100;
		}
		
		if ($countryId == 100) {
			if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
				$suffix = '';
			} else {
				$suffix = '_en';
			}
			
			$query = $this->db->query("SELECT *, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address FROM " . DB_PREFIX . "tk_speedy_office o  WHERE o.city_id = '" . (int)$city_id . "' ANd o.type = 'office' GROUP BY o.office_id ORDER BY o.name" . $suffix);
			
			$offices = $query->rows;
		} else {
			
			$siteData = array(
				'language'  => $language,
				'countryId' => $countryId,
				'isoAlpha2' => $iso_code_2,
				'siteId'    => $city_id,
				'name'      => $name
			);
			
			$siteResponse = $this->serviceJSON('location/office/', $siteData);
			$siteResponse = json_decode($siteResponse, true);
			
			$offices = array();
			foreach ($siteResponse['offices'] as $city) {
				if (isset($city['address']['postCode'])) {
					$postCode = $city['address']['postCode'];
				} else {
					$postCode = 'a10' . $city['siteId'];
				}
				
				$offices[] = array(
					'office_id'   => $city['id'],
					'name'        => $city['name'],
					'city_id'     => $city['siteId'],
					'address'     => $city['address']['fullAddressString'],
					'office_city' => $city['address']['siteName'],
					'post_code'   => $postCode
				
				);
			}
		}
		
		return $offices;
	}
	
	public function getMachinesByCityId($city_id) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT *, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address FROM " . DB_PREFIX . "tk_speedy_office o WHERE o.city_id = '" . (int)$city_id . "' ANd o.type = 'apt' GROUP BY o.office_id ORDER BY o.name" . $suffix);
		
		return $query->rows;
	}
	
	public function getOffice($office_id, $city_id = false) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$countryId = 642;
		} else if ($iso_code_2 == 'GR') {
			$countryId = 300;
		} else {
			$countryId = 100;
		}
		
		if ($countryId == 100) {
			if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
				$suffix = '';
			} else {
				$suffix = '_en';
			}
			
			$query = $this->db->query("SELECT o.office_id, o.city_id, o.name" . $suffix . " AS name, o.address" . $suffix . " AS address, eco.name" . $suffix . " AS office_city, eco.post_code FROM " . DB_PREFIX . "tk_speedy_office o LEFT JOIN " . DB_PREFIX . "tk_speedy_city_office eco ON eco.city_id = o.city_id WHERE o.office_id = '" . (int)$office_id . "'");
			
			$office = $query->row;
		} else {
			
			$siteData = array(
				'language'  => $language,
				'countryId' => $countryId,
				'siteId'    => $city_id,
				'officeId'  => $office_id
			);
			
			$siteResponse = $this->serviceJSON('location/office/', $siteData);
			$siteResponse = json_decode($siteResponse, true);
			
			$office = array();
			foreach ($siteResponse['offices'] as $offices) {
				if ($offices['id'] == $office_id) {
					if (isset($offices['address']['postCode'])) {
						$postCode = $offices['address']['postCode'];
					} else {
						$postCode = 'a10' . $offices['siteId'];
					}
					
					$office = array(
						'office_id'   => $office_id,
						'name'        => $offices['name'],
						'city_id'     => $offices['siteId'],
						'address'     => $offices['address']['fullAddressString'],
						'office_city' => $offices['address']['siteName'],
						'post_code'   => $postCode
					
					);
					
					break;
				}
			}
		}
		
		return $office;
	}
	
	public function getCityOfficeByCityId($city_id) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$suffix = '';
		} else {
			$suffix = '_en';
		}
		
		$query = $this->db->query("SELECT c.city_id, c.post_code, c.name" . $suffix . " AS name FROM " . DB_PREFIX . "tk_speedy_city_office c WHERE city_id = '" . (int)$city_id . "'");
		
		if ($query->num_rows == 1) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function getCitiesOffices($filter_name = NULL) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		if ($filter_name != NULL) {
			$name = $filter_name;
		} else {
			$name = '';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$countryId = 642;
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else if ($iso_code_2 == 'GR') {
			$countryId = 300;
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else {
			$countryId = 100;
			$name = $this->model_extension_module_tk_checkout->latin_to_cyrillic($name);
		}
		
		$siteData = array(
			'language'  => $language,
			'countryId' => $countryId,
			'isoAlpha2' => $iso_code_2,
			'name'      => $name
		);
		
		$siteResponse = $this->serviceJSON('location/site/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		$cities = array();
		foreach ($siteResponse['sites'] as $city) {
			if (isset($city['postCode'])) {
				$postCode = $city['postCode'];
			} else {
				$postCode = 'a10' . $city['id'];
			}
			
			$officeData = array(
				'language'  => $language,
				'countryId' => $countryId,
				'isoAlpha2' => $iso_code_2,
				'siteId'    => $city['id']
			);
			
			$officeResponse = $this->serviceJSON('location/office/', $officeData);
			$officeResponse = json_decode($officeResponse, true);
			
			if ($officeResponse['offices']) {
				$cities[] = array(
					'city_id'   => $city['id'],
					'post_code' => $postCode,
					'type'      => mb_convert_case($city['type'], MB_CASE_LOWER, "UTF-8"),
					'name'      => mb_convert_case($city['name'], MB_CASE_TITLE, "UTF-8")
				);
			}
		}
		
		return $cities;
	}
	
	public function getCities($filter_name = NULL) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		if ($filter_name != NULL) {
			$name = $filter_name;
		} else {
			$name = '';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$countryId = 642;
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else if ($iso_code_2 == 'GR') {
			$countryId = 300;
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else {
			$countryId = 100;
			$name = $this->model_extension_module_tk_checkout->latin_to_cyrillic($name);
		}
		
		$siteData = array(
			'language'  => $language,
			'countryId' => $countryId,
			'isoAlpha2' => $iso_code_2,
			'name'      => $name
		);
		
		$siteResponse = $this->serviceJSON('location/site/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		$cities = array();
		foreach ($siteResponse['sites'] as $city) {
			if (isset($city['postCode'])) {
				$postCode = $city['postCode'];
			} else {
				$postCode = 'a10' . $city['id'];
			}
			
			$cities[] = array(
				'city_id'   => $city['id'],
				'post_code' => $postCode,
				'type'      => mb_convert_case($city['type'], MB_CASE_LOWER, "UTF-8"),
				'name'      => mb_convert_case($city['name'], MB_CASE_TITLE, "UTF-8")
			);
		}
		
		return $cities;
	}
	
	public function getQuartersByCityId($city_id, $filter_name = NULL) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		if ($filter_name != NULL) {
			$name = $filter_name;
		} else {
			$name = '';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else if ($iso_code_2 == 'GR') {
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else {
			$name = $this->model_extension_module_tk_checkout->latin_to_cyrillic($name);
		}
		
		$siteData = array(
			'language' => $language,
			'siteId'   => $city_id,
			'name'     => $name
		);
		
		$siteResponse = $this->serviceJSON('location/complex/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		$quarters = array();
		foreach ($siteResponse['complexes'] as $quarter) {
			if (isset($quarter['type'])) {
				$type = $quarter['type'];
			} else {
				$type = '';
			}
			
			$quarters[] = array(
				'quarter_id' => $quarter['id'],
				'name'       => mb_convert_case($quarter['name'], MB_CASE_TITLE, "UTF-8"),
				'type'       => $type . ' '
			);
		}
		
		return $quarters;
	}
	
	public function getStreetsByCityId($city_id, $filter_name = array()) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		if ($filter_name != NULL) {
			$name = $filter_name;
		} else {
			$name = '';
		}
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
			
			if (isset($country['iso_code_2'])) {
				$iso_code_2 = $country['iso_code_2'];
			} else {
				$iso_code_2 = 'BG';
			}
		} else {
			$iso_code_2 = 'BG';
		}
		
		if ($iso_code_2 == 'RO') {
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else if ($iso_code_2 == 'GR') {
			$name = $this->model_extension_module_tk_checkout->cyrillic_to_latin($name);
			$language = 'EN';
		} else {
			$name = $this->model_extension_module_tk_checkout->latin_to_cyrillic($name);
		}
		
		$siteData = array(
			'language' => $language,
			'siteId'   => $city_id,
			'name'     => $name
		);
		
		$siteResponse = $this->serviceJSON('location/street/', $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		$streets = array();
		foreach ($siteResponse['streets'] as $street) {
			if (isset($street['type'])) {
				$type = $street['type'];
			} else {
				$type = '';
			}
			$streets[] = array(
				'street_id' => $street['id'],
				'city_id'   => $city_id,
				'name'      => mb_convert_case($street['name'], MB_CASE_TITLE, "UTF-8"),
				'type'      => $type . ' '
			);
		}
		
		return $streets;
	}
	
	public function getCityByCityId($city_id) {
		
		if (isset($this->session->data['language']) && (strtolower($this->session->data['language']) == 'bg' || strtolower($this->session->data['language']) == 'bg-bg')) {
			$language = 'BG';
		} else {
			$language = 'EN';
		}
		
		$siteData = array(
			'language' => $language
		);
		
		$siteResponse = $this->serviceJSON('location/site/' . $city_id, $siteData);
		$siteResponse = json_decode($siteResponse, true);
		
		if (isset($siteResponse['site']['postCode'])) {
			$postCode = $siteResponse['site']['postCode'];
		} else {
			$postCode = 'a10' . $siteResponse['site']['id'];
		}
		
		return array(
			'city_id'   => $siteResponse['site']['id'],
			'post_code' => $postCode,
			'type'      => mb_convert_case($siteResponse['site']['type'], MB_CASE_LOWER, "UTF-8"),
			'name'      => mb_convert_case($siteResponse['site']['name'], MB_CASE_TITLE, "UTF-8")
		);
	}
	
	// ъпдейт на офиси и адреси с крон
	public function updateOffices() {
		
		$cities = array();
		
		$officesDataBG = array(
			'language'  => 'BG',
			'countryId' => 100
		);
		
		$officesResponseBG = $this->serviceJSON('location/office/', $officesDataBG);
		$officesResponseBG = json_decode($officesResponseBG, true);
		
		if (isset($officesResponseBG['offices'])) {
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_speedy_office");
			$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_speedy_city_office");
			foreach ($officesResponseBG['offices'] as $office) {
				$offices = array(
					'office_id'  => $office['id'],
					'name'       => mb_convert_case($office['name'], MB_CASE_TITLE, "UTF-8"),
					'name_en'    => mb_convert_case($office['nameEn'], MB_CASE_TITLE, "UTF-8"),
					'address'    => mb_convert_case($office['address']['siteName'] . ', ' . $office['address']['localAddressString'], MB_CASE_TITLE, "UTF-8"),
					'address_en' => mb_convert_case($office['address']['siteName'] . ', ' . $office['address']['localAddressString'], MB_CASE_TITLE, "UTF-8"),
					'city_id'    => mb_convert_case($office['siteId'], MB_CASE_TITLE, "UTF-8"),
					'type'       => mb_convert_case($office['type'], MB_CASE_LOWER, "UTF-8")
				);
				
				$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_speedy_office SET office_id = '" . (int)$offices['office_id'] . "', name = '" . $this->db->escape($offices['name']) . "', name_en = '" . $this->db->escape($offices['name_en']) . "', address = '" . $this->db->escape($offices['address']) . "', address_en = '" . $this->db->escape($offices['address_en']) . "', city_id = '" . (int)$offices['city_id'] . "', type = '" . $this->db->escape($offices['type']) . "'");
				
				if (isset($office['address']['postCode'])) {
					$postCode = $office['address']['postCode'];
				} else {
					$postCode = 'a10' . $office['address']['siteId'];
				}
				
				$cities[] = array(
					'city_id'   => $office['siteId'],
					'post_code' => $postCode,
					'type'      => mb_convert_case($office['address']['siteType'], MB_CASE_LOWER, "UTF-8"),
					'name'      => mb_convert_case($office['address']['siteName'], MB_CASE_TITLE, "UTF-8"),
					'name_en'   => mb_convert_case($office['address']['siteName'], MB_CASE_TITLE, "UTF-8")
				);
				$cities = array_unique($cities, SORT_REGULAR);
			}
			
			foreach ($cities as $citie) {
				$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "tk_speedy_city_office SET city_id = '" . (int)$citie['city_id'] . "', post_code = '" . $this->db->escape($citie['post_code']) . "', type = '" . $this->db->escape($citie['type']) . "', name = '" . $this->db->escape($citie['name']) . "', name_en = '" . $this->db->escape($citie['name_en']) . "'");
			}
		} else {
			return false;
		}
		
		$officesDataEN = array(
			'language'  => 'EN',
			'countryId' => 100
		);
		
		$officesResponseEN = $this->serviceJSON('location/office/', $officesDataEN);
		$officesResponseEN = json_decode($officesResponseEN, true);
		
		if (isset($officesResponseEN['offices'])) {
			foreach ($officesResponseEN['offices'] as $office) {
				$address_en = mb_convert_case($office['address']['siteName'] . ', ' . $office['address']['localAddressString'], MB_CASE_TITLE, "UTF-8");
				
				$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_office SET address_en = '" . $this->db->escape($address_en) . "' WHERE office_id = '" . (int)$office['id'] . "'");
				
				$name_en = mb_convert_case($office['address']['siteName'], MB_CASE_TITLE, "UTF-8");
				
				$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_city_office SET name_en = '" . $this->db->escape($name_en) . "' WHERE city_id = '" . (int)$office['address']['siteId'] . "'");
			}
		} else {
			return false;
		}
		
		return true;
	}
	
	// ъпдейт на товарителници с крон
	public function editShipment($order_id, $response) {
		
		if (!isset($response['bol_id']) || !$response['bol_id']) {
			$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_order SET status_id = '0', shipment_number = NULL, shipment_status = NULL, shipment_status_txt = NULL, pdf = NULL, mail_send = NULL WHERE order_id  = '" . (int)$order_id . "'");
		} else {
			if ($this->db->escape($response['bol_status']) == 128) {
				$shipment_number = NULL;
			} else {
				$shipment_number = $response['bol_id'];
			}
			
			$this->db->query("UPDATE " . DB_PREFIX . "tk_speedy_order SET status_id = '1', shipment_number = '" . $this->db->escape($shipment_number) . "', shipment_status = '" . $this->db->escape($response['bol_status']) . "', shipment_status_txt = '" . $this->db->escape($response['bol_status_text']) . "', pdf = '" . $this->db->escape($response['pdf']) . "', mail_send = '" . $this->db->escape($response['bol_status']) . "' WHERE order_id  = '" . (int)$order_id . "'");
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
	
	// връзка със спиди
	public function serviceJSON($url, $data) {
		
		$curl = curl_init('https://api.speedy.bg/v1/' . $url);
		
		$data['userName'] = $this->config->get('shipping_tk_speedy_username');
		$data['password'] = $this->config->get('shipping_tk_speedy_password');
		
		$ip = $this->getClientIp();
		
		$json_data = json_encode($data);
		
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json",
			"X-Forwarded-For: $ip"
		));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		
		$jsonResponse = curl_exec($curl);
		
		if ($jsonResponse === false) {
			$this->log->write(curl_error($curl));
		}
		
		return ($jsonResponse);
	}
	
	public function getClientIp() {
		
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ipress = $_SERVER['HTTP_CLIENT_IP'];
		} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ipress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
			$ipress = $_SERVER['HTTP_X_FORWARDED'];
		} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
			$ipress = $_SERVER['HTTP_FORWARDED_FOR'];
		} else if (isset($_SERVER['HTTP_FORWARDED'])) {
			$ipress = $_SERVER['HTTP_FORWARDED'];
		} else if (isset($_SERVER['REMOTE_ADDR'])) {
			$ipress = $_SERVER['REMOTE_ADDR'];
		} else {
			$ipress = '127.0.0.1';
		}
		
		return $ipress;
	}
}