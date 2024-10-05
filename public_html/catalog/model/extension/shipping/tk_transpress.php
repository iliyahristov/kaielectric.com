<?php

class ModelExtensionShippingTkTranspress extends Model {
	
	public function getQuote($address) {
		
		$this->load->language('extension/shipping/tk_transpress');
		$this->load->model('extension/module/tk_checkout');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_tk_transpress_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
		if (!$this->config->get('shipping_tk_transpress_geo_zone_id')) {
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
		
		if ($address['country_iso'] != 'BG') {
			$status = false;
		}
		
		$method_data = array();
		
		if ($status) {
			
			$this->load->library('tktranspress');
			if (!isset($this->tktranspress)) {
				$this->tktranspress = new Tktranspress($this->registry);
			}
			
			$price_transpress = 0;
			$urban_weight_price_transpress = 0;
			$interurban_weight_price_transpress = 0;
			$price_transpress_free = false;
			
			// тегло
			if ($this->cart->getWeight() && $this->cart->getWeight() > 0.0001) {
				$weight = $this->cart->getWeight();
			} else if ($this->config->get('shipping_tk_transpress_weight_total') && $this->config->get('shipping_tk_transpress_weight_total') > 0) {
				$weight = $this->config->get('shipping_tk_transpress_weight_total') * $this->cart->countProducts();
			} else {
				$weight = 1 * $this->cart->countProducts();
			}
			if ($this->config->get('shipping_tk_transpress_weight_type') && $this->config->get('shipping_tk_transpress_weight_type') == 'gram') {
				$weight = $weight / 1000;
			}
			if ($weight < 0.01) {
				$weight = 0.01;
			}
			
			$this->load->model('extension/module/tk_checkout');
			$tk_transpress_totals = $this->config->get('shipping_tk_transpress_totals');
			if ($tk_transpress_totals) {
				$total_sub_tax = $this->model_extension_module_tk_checkout->getSelectedTotals($tk_transpress_totals);
			} else {
				$total_sub_tax = $this->model_extension_module_tk_checkout->getSubAndTax();
			}
			$sub_total = $this->model_extension_module_tk_checkout->getSubTotal();
			
			$total_sub_tax = @$this->currency->convert($total_sub_tax, $this->config->get('config_currency'), Tktranspress::CURRENCY);
			$sub_total = @$this->currency->convert($sub_total, $this->config->get('config_currency'), Tktranspress::CURRENCY);
			
			if (isset($address['payment_method'])) {
				$payment_method = $address['payment_method'];
			} else if (isset($this->session->data['payment_method']['code'])) {
				$payment_method = $this->session->data['payment_method']['code'];
			} else {
				if ($this->config->get('payment_bank_transfer_sort_order') && $this->config->get('payment_cod_sort_order') && $this->config->get('payment_cod_sort_order') > $this->config->get('payment_bank_transfer_sort_order')) {
					$payment_method = 'bank_transfer';
				} else {
					$payment_method = 'cod';
				}
			}
			
			if (!isset($payment_method) || !$payment_method) {
				$payment_method = 'cod';
			}
			
			//проверка за градска или извънградкса услуга
			$senderAddress = $this->getSenderAddress();
			
			$receiverAddress = $this->getReceiverAddress();
			
			if ($senderAddress['country'] == $receiverAddress['country'] && $senderAddress['settlement'] == $receiverAddress['settlement']) {
				$urban_type = 'urban';
				$this->session->data['tk_checkout']['transpress']['urban_type'] = 'urban';
			} else if ($senderAddress['country'] != $receiverAddress['country'] || $senderAddress['settlement'] != $receiverAddress['settlement']) {
				$urban_type = 'interurban';
				$this->session->data['tk_checkout']['transpress']['urban_type'] = 'interurban';
			} else {
				$urban_type = 'interurban';
				$this->session->data['tk_checkout']['transpress']['urban_type'] = 'interurban';
			}
			
			if ($urban_type == 'urban' && $this->config->get('shipping_tk_transpress_urban_free') && $this->config->get('shipping_tk_transpress_urban_free') < $total_sub_tax) {
				if ($this->config->get('shipping_tk_transpress_urban_free_weight') && $this->config->get('shipping_tk_transpress_urban_free_weight') > $weight) {
					$price_transpress_free = false;
				} else {
					$price_transpress_free = true;
				}
			}
			
			if ($urban_type == 'interurban' && $this->config->get('shipping_tk_transpress_interurban_free') && $this->config->get('shipping_tk_transpress_interurban_free') < $total_sub_tax) {
				if ($this->config->get('shipping_tk_transpress_interurban_free_weight') && $this->config->get('shipping_tk_transpress_interurban_free_weight') > $weight) {
					$price_transpress_free = false;
				} else {
					$price_transpress_free = true;
				}
			}
			
			if ($this->config->get('shipping_tk_transpress_weight_value')) {
				foreach ($this->config->get('shipping_tk_transpress_weight_value') as $weight_value) {
					if ($weight_value['from'] < $weight && $weight_value['to'] >= $weight && $weight_value['type'] == 'urban') {
						$urban_weight_price_transpress = round($weight_value['price'], 2);
					}
					
					if ($weight_value['from'] < $weight && $weight_value['to'] >= $weight && $weight_value['type'] == 'interurban') {
						$interurban_weight_price_transpress = round($weight_value['price'], 2);
					}
				}
			}
			
			if ($price_transpress_free) {
				$price_transpress = 0;
			} else if ($urban_type == 'urban' && $urban_weight_price_transpress) {
				$price_transpress = $urban_weight_price_transpress;
			} else if ($urban_type == 'interurban' && $interurban_weight_price_transpress) {
				$price_transpress = $interurban_weight_price_transpress;
			} else if (!$this->config->get('shipping_tk_transpress_calculate_enabled')) {
				if ($urban_type == 'urban' && $this->config->get('shipping_tk_transpress_fixed_price_urban_amount')) {
					$price_transpress = $this->config->get('shipping_tk_transpress_fixed_price_urban_amount');
				} else if ($urban_type == 'interurban' && $this->config->get('shipping_tk_transpress_fixed_price_interurban_amount')) {
					$price_transpress = $this->config->get('shipping_tk_transpress_fixed_price_interurban_amount');
				}
			} else if ($this->config->get('shipping_tk_transpress_calculate_enabled')) {
				if ($senderAddress && $receiverAddress) {
					$this->tktranspress->setType(Tktranspress::TYPE_CALCULATE);
					$this->tktranspress->__set(Tktranspress::FIELD_CALCULATE, 'calculate');
					$this->tktranspress->__set(Tktranspress::FIELD_PROOF_OF_DELIVERY, $this->config->get('shipping_tk_transpress_pd') ? Tktranspress::TRUE : Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_RECEIPT_REQUIRED, $this->config->get('shipping_tk_transpress_rr') ? Tktranspress::TRUE : Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_PACKAGE_RETURN, $this->config->get('shipping_tk_transpress_pr') ? Tktranspress::TRUE : Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_REVIEW_ON_DELIVERY, $this->config->get('shipping_tk_transpress_review_before_payment') ? Tktranspress::TRUE : Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_TEST_ON_DELIVERY, $this->config->get('shipping_tk_transpress_test_before_payment') ? Tktranspress::TRUE : Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_POSTAL_MONEY_TRANSFER, $this->config->get('shipping_tk_transpress_postal_money_transfer') ? Tktranspress::TRUE : Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_PACKAGING_CODE, $this->config->get('shipping_tk_transpress_package'));
					$this->tktranspress->__set(Tktranspress::FIELD_OVERALL_WEIGHT, $weight);
					$this->tktranspress->__set(Tktranspress::FIELD_FRAGILE, $this->config->get('shipping_tk_transpress_fragile') ? Tktranspress::TRUE : Tktranspress::FALSE);
					
					if ($payment_method == 'cod') {
						$this->tktranspress->__set(Tktranspress::FIELD_PAID_ON_DELIVERY, Tktranspress::TRUE);
						$this->tktranspress->__set(Tktranspress::FIELD_CASH_ON_DELIVERY, Tktranspress::TRUE);
						$this->tktranspress->__set(Tktranspress::FIELD_DECLARED_VALUE, $sub_total);
					}
					
					if ($this->config->get('shipping_tk_transpress_allowed_services')) {
						$this->tktranspress->__set(Tktranspress::FIELD_SHIPMENT_SERVICE_TYPE, $this->config->get('shipping_tk_transpress_allowed_services'));
					} else {
						$this->tktranspress->__set(Tktranspress::FIELD_SHIPMENT_SERVICE_TYPE, 'EXPRESS_18');
					}
					if ($this->config->get('shipping_tk_transpress_insurance')) {
						$this->tktranspress->__set(Tktranspress::FIELD_INSURANCE_LIABILITY, $sub_total);
					}
					
					if (!isset($senderAddress['office'])) {
						$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_SENDER, Tktranspress::TRUE);
						$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_CITY, $senderAddress['settlement']);
					} else {
						$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_SENDER, Tktranspress::FALSE);
						$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_STATION_CODE, $senderAddress['office']);
					}
					
					$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_COUNTRY, $senderAddress['country']);
					
					if (!isset($receiverAddress['office'])) {
						$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_RECEIVER, Tktranspress::TRUE);
					} else {
						$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_RECEIVER, Tktranspress::FALSE);
						$this->tktranspress->__set(Tktranspress::FIELD_TARGET_STATION_CODE, $receiverAddress['office']);
					}
					
					$this->tktranspress->__set(Tktranspress::FIELD_COUNTRY_CODE, $receiverAddress['country']);
					if (isset($receiverAddress['settlement'])) {
						$this->tktranspress->__set(Tktranspress::FIELD_TARGET_CITY, $receiverAddress['settlement']);
					}
					
					$response = $this->tktranspress->execute(true);
					
					if ($response && isset($response->price_with_vat) && $this->tktranspress->xmlAttribute($response->price_with_vat, 'value')) {
						$priceTranspress = @$this->currency->convert($this->tktranspress->xmlAttribute($response->price_with_vat, 'value'), Tktranspress::CURRENCY, $this->session->data['currency']);
					}
					
					if (isset($priceTranspress) && $priceTranspress) {
						$price_transpress = $priceTranspress;
					}
				}
				
				if ($price_transpress == 0) {
					if ($urban_type == 'urban' && $this->config->get('shipping_tk_transpress_fixed_price_urban_amount')) {
						$price_transpress = $this->config->get('shipping_tk_transpress_fixed_price_urban_amount');
					} else if ($urban_type == 'interurban' && $this->config->get('shipping_tk_transpress_fixed_price_interurban_amount')) {
						$price_transpress = $this->config->get('shipping_tk_transpress_fixed_price_interurban_amount');
					}
				}
			}
			
			if (isset($this->session->data['coupon'])) {
				$this->load->model('extension/total/coupon');
				$coupon_info = $this->model_extension_total_coupon->getCoupon($this->session->data['coupon']);
				if (isset($coupon_info['shipping']) && $coupon_info['shipping'] == 1) {
					$price_transpress = 0;
				}
			}
			
			if ($this->config->get('module_tk_special_shipping_status')) {
				$this->load->model('extension/total/tk_special_shipping');
				$special_shipping_transpress = $this->model_extension_total_tk_special_shipping->getSpecialShippings('tk_transpress.transpress_door');
				
				if (!empty($price_transpress) && $price_transpress > 0 && isset($special_shipping_transpress['total']) && $special_shipping_transpress['free'] != 1) {
					
					if ($special_shipping_transpress['type'] == 'F' && $special_shipping_transpress['discount'] > 0) {
						$discount = $special_shipping_transpress['discount'];
					} else {
						$discount = ($special_shipping_transpress['discount'] / 100) * $price_transpress;
					}
					
					if ($special_shipping_transpress['sign'] == '-') {
						$price_transpress = $price_transpress - $discount;
					} else if ($special_shipping_transpress['sign'] == '+') {
						$price_transpress = $price_transpress + $discount;
					} else if ($special_shipping_transpress['sign'] == '=') {
						$price_transpress = $discount;
					}
				}
			}
			
			$quote_data = array();
			
			if ($this->config->get('shipping_tk_transpress_text')) {
				$tk_transpress_text_array = $this->config->get('shipping_tk_transpress_text');
				$tk_transpress_text = $tk_transpress_text_array[$this->config->get('config_language_id')];
			}
			
			if (isset($tk_transpress_text['title']) && $tk_transpress_text['title']) {
				$text_title = $tk_transpress_text['title'];
			} else {
				$text_title = $this->language->get('text_send_to_address');
			}
			
			if (isset($tk_transpress_text['text']) && $tk_transpress_text['text']) {
				$text_text = $tk_transpress_text['text'];
			} else {
				$text_text = '';
			}
			
			$price_text = $this->currency->format($price_transpress, $this->session->data['currency']);
			
			//пресмятане на ДДС
			if ($this->config->get('total_tax_status') && $this->config->get('shipping_tk_transpress_tax_class_id') && $price_transpress > 0) {
				$rate = array_values($this->tax->getRates($price_transpress, $this->config->get('shipping_tk_transpress_tax_class_id')));
				$price_transpress = $price_transpress / (($rate[0]['rate'] / 100) + 1);
				
				if ($this->config->get('total_shipping_sort_order') && $this->config->get('total_tax_sort_order') && $this->config->get('total_shipping_sort_order') < $this->config->get('total_tax_sort_order')) {
					$price_transpress = $price_transpress / (($rate[0]['rate'] / 100) + 1);
				}
			}
			
			$quote_data['transpress_door'] = array(
				'code'         => 'tk_transpress.transpress_door',
				'title'        => $text_title,
				'description'  => $text_text,
				'cost'         => $this->tax->calculate($price_transpress, $this->config->get('shipping_tk_transpress_tax_class_id'), $this->config->get('config_tax')),
				'tax_class_id' => $this->config->get('shipping_tk_transpress_tax_class_id'),
				'text'         => '<span id="tk_transpress_price">' . $price_text . '</span>'
			);
			
			$method_data = array(
				'code'       => 'tk_transpress',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('shipping_tk_transpress_sort_order'),
				'error'      => ''
			);
		}
		
		return $method_data;
	}
	
	// ценообразуване
	public function getSenderAddress() {
		
		$senderType = $this->config->get('shipping_tk_transpress_sender_type');
		
		$address = array();
		if ($senderType == 'office') {
			$this->tktranspress->setType(Tktranspress::TYPE_OFFICES);
			$response = $this->tktranspress->execute();
			foreach ($response['response']['item'] as $item) {
				if ($item['value'] == $this->config->get('shipping_tk_transpress_sender_office')) {
					$postCodeCountry = $this->tktranspress->getCountryAndPostcodeByClass($item['class']);
					if ($postCodeCountry) {
						$address['country'] = $postCodeCountry[1];
						$address['postcode'] = str_replace(' ', '', $postCodeCountry[2]);
						$address['settlement'] = $this->tktranspress->getCityByPostCode($address['postcode'], $address['country']);
						if (isset($address['settlement']['value'])) {
							$address['settlement'] = $address['settlement']['value'];
						}
					}
					$address['office'] = $item['value'];
					break;
				}
			}
		} else {
			$senderAddresses = $this->config->get('shipping_tk_transpress_shop_address');
			$senderAddresses = !empty($senderAddresses[$this->config->get('shipping_tk_transpress_shop_address_default')]) ? $senderAddresses[$this->config->get('shipping_tk_transpress_shop_address_default')] : array();
			
			if ($senderAddresses) {
				$address['country'] = $senderAddresses['country'];
				$address['postcode'] = str_replace(' ', '', $senderAddresses['post_code']);
				$settlement = $this->tktranspress->getCityByPostCode($address['postcode'], $address['country']);
				$address['settlement'] = $settlement['value'];
			} else {
				$address['country'] = 'BG';
				$address['postcode'] = '1000';
				$address['settlement'] = '164 ';
			}
		}
		
		return $address;
	}
	
	public function getReceiverAddress() {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (!empty($this->session->data['tk_checkout']['country_id'])) {
			$country = $this->model_extension_module_tk_checkout->getCountryById($this->session->data['tk_checkout']['country_id']);
		} else {
			$country = $this->model_extension_module_tk_checkout->getCountryByIso2('BG');
		}
		
		if (!empty($country['iso_code_2'])) {
			$iso_code_2 = $country['iso_code_2'];
		} else {
			$iso_code_2 = 'BG';
		}
		
		if (!isset($this->session->data['tk_checkout']['transpress']['transpress_address_postcode'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_address_postcode'] = 1000;
		}
		
		if (!isset($this->session->data['tk_checkout']['transpress']['transpress_address_city'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_address_city'] = 'София';
		}
		
		$address = array();
		$address['country'] = $iso_code_2;
		$address['postcode'] = str_replace(' ', '', $this->session->data['tk_checkout']['transpress']['transpress_address_postcode']);
		$address['city'] = $this->session->data['tk_checkout']['transpress']['transpress_address_city'];
		
		if (!isset($address['city']) || !$address['city']) {
			$address['city'] = 'София';
		}
		
		if (!isset($address['postcode']) || !$address['postcode'] || !is_numeric($address['postcode'])) {
			$address['postcode'] = '1000';
		}
		
		$settlement = $this->tktranspress->getCityByNameOrPostCode($address['city'], $address['postcode'], $address['country']);
		if (!empty($settlement['value'])) {
			$address['settlement'] = $settlement['value'];
		}
		
		return $address;
	}
	
	// показваме темплейти
	public function getTranspress() {
		
		$this->load->language('extension/shipping/tk_transpress');
		$this->load->language('tk_checkout/checkout');
		
		if ($this->config->get('module_tk_checkout_zone')) {
			$data['module_tk_checkout_zone'] = $this->config->get('module_tk_checkout_zone');
		} else {
			$data['module_tk_checkout_zone'] = 0;
		}
		
		$this->load->model('extension/module/tk_checkout');
		$zone_info = $this->model_extension_module_tk_checkout->getZone();
		if (isset($zone_info['zone_id'])) {
			$zone_info['zone_id'] = $this->config->get('zone_id');
		}
		$data['zone_id'] = $zone_info['zone_id'];
		$data['transpress_zone_id'] = $zone_info['zone_id'];
		
		$data['text_transpress_office_city'] = $this->language->get('text_transpress_office_city');
		$data['text_transpress_office_office'] = $this->language->get('text_transpress_office_office');
		$data['text_transpress_office_address'] = $this->language->get('text_transpress_office_address');
		$data['text_transpres_postcode'] = $this->language->get('entry_postcode');
		$data['text_no_street'] = $this->language->get('text_no_street');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_address_existing'] = $this->language->get('text_address_existing');
		$data['text_address_new'] = $this->language->get('text_address_new');
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
		$data['error_address'] = '';
		
		$data['transpress_address_customer_id'] = 0;
		$data['transpress_addresses_customer'] = array();
		$data['transpress_quarters'] = array();
		$data['transpress_streets'] = array();
		
		if ($this->customer->isLogged()) {
			$data['transpress_addresses_customer'] = $this->getCustomers('address');
			$data['transpress_address_customer'] = $this->getCustomer('address');
			if (!empty($data['transpress_address_customer'])) {
				$data['transpress_address_customer_id'] = $data['transpress_address_customer']['transpress_customer_id'];
			}
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_address_postcode'])) {
			$data['transpress_address_postcode'] = $this->session->data['tk_checkout']['transpress']['transpress_address_postcode'];
		} else {
			$data['transpress_address_postcode'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_address_city'])) {
			$data['transpress_address_city'] = $this->session->data['tk_checkout']['transpress']['transpress_address_city'];
		} else {
			$data['transpress_address_city'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_street'])) {
			$data['transpress_street'] = $this->session->data['tk_checkout']['transpress']['transpress_street'];
		} else {
			$data['transpress_street'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_quarter'])) {
			$data['transpress_quarter'] = $this->session->data['tk_checkout']['transpress']['transpress_quarter'];
		} else {
			$data['transpress_quarter'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_street_num'])) {
			$data['transpress_street_num'] = $this->session->data['tk_checkout']['transpress']['transpress_street_num'];
		} else {
			$data['transpress_street_num'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_block_no'])) {
			$data['transpress_block_no'] = $this->session->data['tk_checkout']['transpress']['transpress_block_no'];
		} else {
			$data['transpress_block_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_entrance_no'])) {
			$data['transpress_entrance_no'] = $this->session->data['tk_checkout']['transpress']['transpress_entrance_no'];
		} else {
			$data['transpress_entrance_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_floor_no'])) {
			$data['transpress_floor_no'] = $this->session->data['tk_checkout']['transpress']['transpress_floor_no'];
		} else {
			$data['transpress_floor_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_apartment_no'])) {
			$data['transpress_apartment_no'] = $this->session->data['tk_checkout']['transpress']['transpress_apartment_no'];
		} else {
			$data['transpress_apartment_no'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_other'])) {
			$data['transpress_other'] = $this->session->data['tk_checkout']['transpress']['transpress_other'];
		} else {
			$data['transpress_other'] = '';
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['transpress_address_type'])) {
			$data['transpress_address_type'] = $this->session->data['tk_checkout']['transpress']['transpress_address_type'];
		} else {
			$data['transpress_address_type'] = '';
		}
		
		$this->response->setOutput($this->load->view('tk_checkout/transpress_address', $data));
	}
	
	// обработваме данните за доставка
	public function addTranspressData($data) {
		
		$return = array();
		
		$this->load->language('extension/shipping/tk_transpress');
		
		if (!isset($data['zone_id'])) {
			$this->load->model('extension/module/tk_checkout');
			$zone_info = $this->model_extension_module_tk_checkout->getZone();
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
		
		$return['shipping_to'] = $data['shipping_to'];
		
		if (isset($data['transpress_address_customer_id']) && $data['transpress_address_type'] == 'existing' && $data['transpress_address_customer_id'] > 0) {
			$transpress_customer_info = $this->getCustomer('address', $data['transpress_address_customer_id']);
			
			$return['transpress_address_type'] = 'existing';
			$return['transpress_address_customer_id'] = $data['transpress_address_customer_id'];
			$return['transpress_address_city'] = $transpress_customer_info['city'];
			$return['transpress_quarter'] = $transpress_customer_info['quarter'];
			$return['transpress_street'] = $transpress_customer_info['street'];
			$return['transpress_street_num'] = $transpress_customer_info['street_num'];
			$return['transpress_block_no'] = $transpress_customer_info['block_no'];
			$return['transpress_entrance_no'] = $transpress_customer_info['entrance_no'];
			$return['transpress_floor_no'] = $transpress_customer_info['floor_no'];
			$return['transpress_apartment_no'] = $transpress_customer_info['apartment_no'];
			$return['transpress_address_postcode'] = $transpress_customer_info['postcode'];
			$return['transpress_other'] = $transpress_customer_info['other'];
			
			$return['address_1'] = '';
			
			if (isset($data['transpress_quarter']) && $data['transpress_quarter']) {
				$return['address_1'] .= 'кв. ' . $data['transpress_quarter'];
			}
			
			if (isset($data['transpress_block_no']) && $data['transpress_block_no']) {
				$return['address_1'] .= ', бл. ' . $data['transpress_block_no'];
			}
			
			if (isset($data['transpress_entrance_no']) && $data['transpress_entrance_no']) {
				$return['address_1'] .= ', вх. ' . $data['transpress_entrance_no'];
			}
			
			if (isset($data['transpress_floor_no']) && $data['transpress_floor_no']) {
				$return['address_1'] .= ', ет. ' . $data['transpress_floor_no'];
			}
			
			if (isset($data['transpress_apartment_no']) && $data['transpress_apartment_no']) {
				$return['address_1'] .= ', ап. ' . $data['transpress_apartment_no'];
			}
			
			if (isset($data['transpress_street']) && $data['transpress_street']) {
				if ($return['address_1'] && $return['address_1'] !== '') {
					$return['address_1'] .= ', ';
				}
				$return['address_1'] .= $data['transpress_street'];
			}
			
			if (isset($data['transpress_street_num']) && $data['transpress_street_num']) {
				$return['address_1'] .= ' № ' . $data['transpress_street_num'];
			}
			
			if (isset($data['transpress_other']) && $data['transpress_other']) {
				$return['address_1'] .= ', допълнение: ' . $data['transpress_other'];
			}
			
			$return['city'] = $return['transpress_address_city'];
			$return['postcode'] = $return['transpress_address_postcode'];
		} else {
			$return['payment_address_type'] = 'new';
			
			if (isset($data['transpress_address_city'])) {
				$return['transpress_address_city'] = $data['transpress_address_city'];
			}
			
			if (isset($data['transpress_quarter'])) {
				$return['transpress_quarter'] = $data['transpress_quarter'];
			} else {
				$return['transpress_quarter'] = '';
			}
			
			if (isset($data['transpress_street'])) {
				$return['transpress_street'] = $data['transpress_street'];
			}
			
			if (isset($data['transpress_street_num'])) {
				$return['transpress_street_num'] = $data['transpress_street_num'];
			} else {
				$return['transpress_street_num'] = '';
			}
			
			if (isset($data['transpress_block_no'])) {
				$return['transpress_block_no'] = $data['transpress_block_no'];
			} else {
				$return['transpress_block_no'] = '';
			}
			
			if (isset($data['transpress_entrance_no'])) {
				$return['transpress_entrance_no'] = $data['transpress_entrance_no'];
			} else {
				$return['transpress_entrance_no'] = '';
			}
			
			if (isset($data['transpress_floor_no'])) {
				$return['transpress_floor_no'] = $data['transpress_floor_no'];
			} else {
				$return['transpress_floor_no'] = '';
			}
			
			if (isset($data['transpress_apartment_no'])) {
				$return['transpress_apartment_no'] = $data['transpress_apartment_no'];
			} else {
				$return['transpress_apartment_no'] = '';
			}
			
			if (isset($data['transpress_address_postcode'])) {
				$return['transpress_address_postcode'] = $data['transpress_address_postcode'];
			}
			
			if (isset($data['transpress_other'])) {
				$return['transpress_other'] = $data['transpress_other'];
			}
			
			if (isset($data['transpress_address_city']) && ((utf8_strlen(trim($data['transpress_address_city'])) < 1) || (utf8_strlen(trim($data['transpress_address_city'])) > 52))) {
				$error['transpress_address_city'] = $this->language->get('error_city');
			}
			
			if ((isset($data['transpress_street']) && ((utf8_strlen(trim($data['transpress_street'])) < 1) || (utf8_strlen(trim($data['transpress_street'])) > 350))) && (isset($data['transpress_quarter']) && ((utf8_strlen(trim($data['transpress_quarter'])) < 1) || (utf8_strlen(trim($data['transpress_quarter'])) > 350)))) {
				$error['transpress_address_city'] = $this->language->get('error_validate_street_quarter');
			}
			
			if ((isset($data['transpress_street_num']) && ((utf8_strlen(trim($data['transpress_street_num'])) < 1) || (utf8_strlen(trim($data['transpress_street_num'])) > 350))) && (isset($data['transpress_block_no']) && ((utf8_strlen(trim($data['transpress_block_no'])) < 1) || (utf8_strlen(trim($data['transpress_block_no'])) > 350)))) {
				$error['transpress_street_num'] = $this->language->get('error_street_num');
			}
			
			if (!isset($error) || !$error) {
				$return['address_1'] = '';
				
				if (isset($data['transpress_quarter']) && $data['transpress_quarter']) {
					$return['address_1'] .= 'кв. ' . $data['transpress_quarter'];
				}
				
				if (isset($data['transpress_block_no']) && $data['transpress_block_no']) {
					$return['address_1'] .= ', бл.' . $data['transpress_block_no'];
				}
				
				if (isset($data['transpress_entrance_no']) && $data['transpress_entrance_no']) {
					$return['address_1'] .= ', вх.' . $data['transpress_entrance_no'];
				}
				
				if (isset($data['transpress_floor_no']) && $data['transpress_floor_no']) {
					$return['address_1'] .= ', ет.' . $data['transpress_floor_no'];
				}
				
				if (isset($data['transpress_apartment_no']) && $data['transpress_apartment_no']) {
					$return['address_1'] .= ', ап.' . $data['transpress_apartment_no'];
				}
				
				if (isset($data['transpress_street']) && $data['transpress_street']) {
					if ($return['address_1'] && $return['address_1'] !== '') {
						$return['address_1'] .= ', ';
					}
					$return['address_1'] .= $data['transpress_street'];
				}
				
				if (isset($data['transpress_street_num']) && $data['transpress_street_num']) {
					$return['address_1'] .= ' № ' . $data['transpress_street_num'];
				}
				
				if (isset($data['transpress_other']) && $data['transpress_other']) {
					$return['address_1'] .= ', допълнение: ' . $data['transpress_other'];
				}
				
				$return['city'] = $return['transpress_address_city'];
				$return['postcode'] = $return['transpress_address_postcode'];
			}
		}
		
		if (isset($this->session->data['tk_checkout']['transpress']['payer_type']['address'])) {
			$return['payer_type']['address'] = $this->session->data['tk_checkout']['transpress']['payer_type']['address'];
		}
		
		if (isset($error) && $error) {
			$return['error'] = $error;
		}
		
		return $return;
	}
	
	public function saveData() {
		
		if (isset($this->request->post['zone'])) {
			$this->session->data['tk_checkout']['transpress']['zone'] = $this->request->post['zone'];
		}
		
		if (isset($this->request->post['zone_id'])) {
			$this->session->data['tk_checkout']['transpress']['zone_id'] = $this->request->post['zone_id'];
		}
		
		if (isset($this->request->post['country_id'])) {
			$this->session->data['tk_checkout']['transpress']['country_id'] = $this->request->post['country_id'];
		}
		
		if (isset($this->request->post['transpress_address_postcode'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_address_postcode'] = $this->request->post['transpress_address_postcode'];
		}
		
		if (isset($this->request->post['transpress_address_city'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_address_city'] = $this->request->post['transpress_address_city'];
		}
		
		if (isset($this->request->post['transpress_quarter'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_quarter'] = $this->request->post['transpress_quarter'];
		}
		
		if (isset($this->request->post['transpress_street'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_street'] = $this->request->post['transpress_street'];
		}
		
		if (isset($this->request->post['transpress_street_num'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_street_num'] = $this->request->post['transpress_street_num'];
		}
		
		if (isset($this->request->post['transpress_block_no'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_block_no'] = $this->request->post['transpress_block_no'];
		}
		
		if (isset($this->request->post['transpress_entrance_no'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_entrance_no'] = $this->request->post['transpress_entrance_no'];
		}
		
		if (isset($this->request->post['transpress_floor_no'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_floor_no'] = $this->request->post['transpress_floor_no'];
		}
		
		if (isset($this->request->post['transpress_apartment_no'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_apartment_no'] = $this->request->post['transpress_apartment_no'];
		}
		
		if (isset($this->request->post['transpress_other'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_other'] = $this->request->post['transpress_other'];
		}
		
		if (isset($this->request->post['transpress_address_customer_id'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_address_customer_id'] = $this->request->post['transpress_address_customer_id'];
		}
		
		if (isset($this->request->post['transpress_customer_id'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_customer_id'] = $this->request->post['transpress_customer_id'];
		}
		
		if (isset($this->request->post['transpress_address_type'])) {
			$this->session->data['tk_checkout']['transpress']['transpress_address_type'] = $this->request->post['transpress_address_type'];
		}
	}
	
	// обработваме данните за клиента
	public function addCustomer($data) {
		
		if (isset($data['country_id']) && $data['country_id'] > 0) {
			$country_id = $data['country_id'];
		} else {
			$country_id = '';
		}
		
		if (isset($data['transpress']['shipping_to'])) {
			$shipping_to = $data['transpress']['shipping_to'];
		} else {
			$shipping_to = '';
		}
		
		if (isset($data['transpress']['transpress_address_postcode'])) {
			$postcode = $data['transpress']['transpress_address_postcode'];
		} else {
			$postcode = '';
		}
		
		if (isset($data['transpress']['transpress_address_city'])) {
			$city = $data['transpress']['transpress_address_city'];
		} else {
			$city = '';
		}
		
		if (isset($data['transpress']['transpress_quarter'])) {
			$quarter = $data['transpress']['transpress_quarter'];
		} else {
			$quarter = '';
		}
		
		if (isset($data['transpress']['transpress_street'])) {
			$street = $data['transpress']['transpress_street'];
		} else {
			$street = '';
		}
		
		if (isset($data['transpress']['transpress_street_num'])) {
			$street_num = $data['transpress']['transpress_street_num'];
		} else {
			$street_num = '';
		}
		
		if (isset($data['transpress']['transpress_block_no'])) {
			$block_no = $data['transpress']['transpress_block_no'];
		} else {
			$block_no = '';
		}
		
		if (isset($data['transpress']['transpress_entrance_no'])) {
			$entrance_no = $data['transpress']['transpress_entrance_no'];
		} else {
			$entrance_no = '';
		}
		
		if (isset($data['transpress']['transpress_floor_no'])) {
			$floor_no = $data['transpress']['transpress_floor_no'];
		} else {
			$floor_no = '';
		}
		
		if (isset($data['transpress']['transpress_apartment_no'])) {
			$apartment_no = $data['transpress']['transpress_apartment_no'];
		} else {
			$apartment_no = '';
		}
		
		if (isset($data['transpress']['transpress_other'])) {
			$other = $data['transpress']['transpress_other'];
		} else {
			$other = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_transpress_customer SET customer_id = '" . (int)$this->customer->getId() . "', shipping_to = '" . $this->db->escape($shipping_to) . "', postcode = '" . $this->db->escape($postcode) . "', city = '" . $this->db->escape($city) . "', quarter = '" . $this->db->escape($quarter) . "', street = '" . $this->db->escape($street) . "', street_num = '" . $this->db->escape($street_num) . "', block_no = '" . $this->db->escape($block_no) . "', entrance_no = '" . $this->db->escape($entrance_no) . "', floor_no = '" . $this->db->escape($floor_no) . "', apartment_no = '" . $this->db->escape($apartment_no) . "', other = '" . $this->db->escape($other) . "', country_id = '" . (int)$country_id . "'");
	}
	
	public function getCustomer($shipping_to, $transpress_customer_id = NULL) {
		
		if (isset($this->session->data['tk_checkout']['country_id']) && $this->session->data['tk_checkout']['country_id'] != '') {
			$country_id = $this->session->data['tk_checkout']['country_id'];
		} else {
			$country_id = 33;
		}
		
		if ($transpress_customer_id != NULL) {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_transpress_customer WHERE transpress_customer_id = '" . (int)$transpress_customer_id . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND country_id = '" . (int)$country_id . "' ");
		} else {
			$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tk_transpress_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND country_id = '" . (int)$country_id . "' ORDER BY transpress_customer_id ASC LIMIT 1 ");
		}
		
		if ($address_query->num_rows) {
			return array(
				'transpress_customer_id' => $address_query->row['transpress_customer_id'],
				'shipping_to'            => $address_query->row['shipping_to'],
				'postcode'               => $address_query->row['postcode'],
				'city'                   => $address_query->row['city'],
				'quarter'                => $address_query->row['quarter'],
				'street'                 => $address_query->row['street'],
				'street_num'             => $address_query->row['street_num'],
				'block_no'               => $address_query->row['block_no'],
				'entrance_no'            => $address_query->row['entrance_no'],
				'floor_no'               => $address_query->row['floor_no'],
				'apartment_no'           => $address_query->row['apartment_no'],
				'other'                  => $address_query->row['other']
			);
		} else {
			return false;
		}
	}
	
	public function getCustomers($shipping_to) {
		
		$address_data = array();
		
		if (isset($this->session->data['tk_checkout']['country_id']) && $this->session->data['tk_checkout']['country_id'] != '') {
			$country_id = $this->session->data['tk_checkout']['country_id'];
		} else {
			$country_id = 33;
		}
		
		$address_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_transpress_customer WHERE customer_id = '" . (int)$this->customer->getId() . "' AND shipping_to = '" . $this->db->escape($shipping_to) . "' AND country_id = '" . (int)$country_id . "'");
		
		if ($address_query->num_rows) {
			foreach ($address_query->rows as $result) {
				$address_data[$result['transpress_customer_id']] = array(
					'transpress_customer_id' => $result['transpress_customer_id'],
					'shipping_to'            => $result['shipping_to'],
					'postcode'               => $result['postcode'],
					'city'                   => $result['city'],
					'quarter'                => $result['quarter'],
					'street'                 => $result['street'],
					'street_num'             => $result['street_num'],
					'block_no'               => $result['block_no'],
					'entrance_no'            => $result['entrance_no'],
					'floor_no'               => $result['floor_no'],
					'apartment_no'           => $result['apartment_no'],
					'other'                  => $result['other']
				);
			}
		}
		
		return $address_data;
	}
	
	// обработваме данните за поръчката
	public function addOrder($data, $order_id) {
		
		$this->db->query("INSERT INTO `" . DB_PREFIX . "tk_transpress_order` (`order_id`, `data`) VALUES ('" . $order_id . "', '" . json_encode($data, JSON_UNESCAPED_UNICODE) . "')");
	}
	
	public function getOrder($order_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_transpress_order WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->row;
	}
	
	public function getNotDelivered() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_transpress_order WHERE loading != '' AND status_count != '3' ");
		
		return $query->rows;
	}
	
	// ъпдейт на товарителници с крон
	public function editShipment($order_id, $response, $mail_send) {
		
		$this->db->query("UPDATE `" . DB_PREFIX . "tk_transpress_order` SET " . implode(', ', $response) . ", mail_send = '" . $this->db->escape($mail_send) . "' WHERE `order_id` = '" . $order_id . "' LIMIT 1");
	}
	
	// списък със статуси в транспрес
	public function getTranspressStatuses() {
		
		return $this->tktranspressStates;
	}
	
	public function getStatusByCode($code) {
		
		foreach ($this->tktranspressStates as $status) {
			if (is_array($status['id'])) {
				if (in_array($code, $status['id'])) {
					return $status;
				}
			} else if ($status['id'] === $code) {
				return $status;
			}
		}
		
		return false;
	}
	
	private $tktranspressStates = array(
		array(
			'id'          => 'CCCCS',
			'key'         => 'STATUS_TAKEN_COURIER',
			'name'        => 'Взета от куриер',
			'description' => 'Взета от куриер'
		),
		array(
			'id'          => 'FFFFA',
			'key'         => 'STATUS_DELIVERED_WITHOUT_OBJECTION',
			'name'        => 'Доставена без възражение',
			'description' => 'Доставена без възражение'
		),
		array(
			'id'          => 'FFFFG',
			'key'         => 'STATUS_DELIVERED_DAMAGED_SHIPMENT',
			'name'        => 'Доставена - повр. част от пратка',
			'description' => 'Доставена - повредена част от пратката'
		),
		array(
			'id'          => 'FFFFH',
			'key'         => 'STATUS_PAID_COD',
			'name'        => 'Доставена - изплатен НП',
			'description' => 'Доставена - изплатен наложен платеж'
		),
		array(
			'id'          => 'FFFFK',
			'key'         => 'STATUS_DELIVERED_ADDITIONAL_LOADING_OPERATIONS',
			'name'        => 'Доставена-доп. товаро-разт. оп.',
			'description' => 'Доставена - допълнителни товаро-разтоварни операции'
		),
		array(
			'id'          => 'FFFFC',
			'key'         => 'STATUS_DELIVERED_MISSING_PART_SHIPMENT',
			'name'        => 'Доставена липсва част от пратка',
			'description' => 'Доставена - липсва част от пратката'
		),
		array(
			'id'          => array(
				'CCDDG',
				'CCDDC',
				'CCDDE',
				'HHHHE',
				'HHHHA',
				'DDDDA'
			),
			'key'         => 'STATUS_TRANSPORT_WAREHOUSE',
			'name'        => 'Транспортира се до склад',
			'description' => 'Транспортира се до склад'
		),
		array(
			'id'          => 'CCCCOAS',
			'key'         => 'STATUS_NEED_CLARIFICATION',
			'name'        => 'Необходимо е уточнение',
			'description' => 'Необходимо е уточнение'
		),
		array(
			'id'          => 'CCCCSNT',
			'key'         => 'STATUS_NEW_DATE_COLLECTION',
			'name'        => 'Договорена нова дата за събиране',
			'description' => 'Договорена нова дата за събиране'
		),
		array(
			'id'          => 'DDDDF',
			'key'         => 'STATUS_TRANSPORTING',
			'name'        => 'Доставя се',
			'description' => 'Доставя се'
		),
		array(
			'id'          => 'CCCCSST',
			'key'         => 'STATUS_REQUEST_CANCELED',
			'name'        => 'Заявката е отказана',
			'description' => 'Заявката е отказана'
		),
		array(
			'id'          => 'CCCCL',
			'key'         => 'STATUS_REQUEST_ACCEPTED',
			'name'        => 'Приета заявка в системата',
			'description' => 'Приета заявка в системата'
		),
		array(
			'id'          => 'HHHHFB',
			'key'         => 'STATUS_NOT_DELIVERED_WRONG_ADDRESS',
			'name'        => 'Не е доставена - грешен адрес',
			'description' => 'Не е доставена - грешен адрес'
		),
		array(
			'id'          => 'HHHHT',
			'key'         => 'STATUS_NOT_DELIVERED_NOT_ACCESS_ADDRESS',
			'name'        => 'Не е доставена - няма достъп',
			'description' => 'Не е доставена - няма достъп до адреса'
		),
		array(
			'id'          => 'HHHHFD',
			'key'         => 'STATUS_NOT_DELIVERED_INCOMPLETE_ADDRESS',
			'name'        => 'Не е доставена - непълен адрес',
			'description' => 'Не е доставена - непълен адрес'
		),
		array(
			'id'          => 'HHHHJ',
			'key'         => 'STATUS_NOT_DELIVERED_INDIVIDUAL_REASON',
			'name'        => 'Не е доставена-индивид. причина',
			'description' => 'Не е доставена - индивидуална причина'
		),
		array(
			'id'          => 'HHHHFC',
			'key'         => 'STATUS_NOT_DELIVERED_NEW_ADDRESS',
			'name'        => 'Не е доставена - нов адрес дост.',
			'description' => 'Не е доставена - нов адрес за доставка'
		),
		array(
			'id'          => 'HHHHO',
			'key'         => 'STATUS_NOT_DELIVERED_NEW_DATE',
			'name'        => 'Не е доставена - нова дата дост.',
			'description' => 'Не е доставена - получателят желае нова дата доставка'
		),
		array(
			'id'          => 'HHHHF',
			'key'         => 'STATUS_NOT_DELIVERED_REJECT_RECEIVING',
			'name'        => 'Не е доставена - Отказ за прием',
			'description' => 'Не е доставена - Отказ за прием от получателя'
		),
		array(
			'id'          => 'HHHHFA',
			'key'         => 'STATUS_NOT_DELIVERED_RECIPIENT_MISSING',
			'name'        => 'Не е доставена - Получ. отсъства',
			'description' => 'Не е доставена - Получателят отсъства'
		),
		array(
			'id'          => 'HHHHL',
			'key'         => 'STATUS_NOT_DELIVERED_RECIPIENT_PICK_ALONE',
			'name'        => 'Не е доставена-Получ. вземе прат.',
			'description' => 'Не е доставена - Получателят сам ще си вземе пратката'
		),
		array(
			'id'          => 'CCFFT',
			'key'         => 'STATUS_ANTOHER_COURIER',
			'name'        => 'Предадена на друг куриер',
			'description' => 'Предадена на друг куриер'
		),
		array(
			'id'          => array(
				'DDDDCN',
				'DDDDC'
			),
			'key'         => 'STATUS_IN_OFFICE',
			'name'        => 'В офис - до поискване',
			'description' => 'В офис - до поискване'
		),
		array(
			'id'          => 'DDDDE',
			'key'         => 'STATUS_IN_STORE_FOR_SHIPMENT',
			'name'        => 'В склад - за доставка',
			'description' => 'В склад - за доставка'
		),
		array(
			'id'          => 'DDDDEN',
			'key'         => 'STATUS_IN_STORE_UNSUCCESSFUL',
			'name'        => 'В склад - неуспешен разнос',
			'description' => 'В склад - неуспешен разнос'
		),
		array(
			'id'          => 'DDDDD',
			'key'         => 'STATUS_IN_STORE_OVERLOAD',
			'name'        => 'В склад - за претоварване',
			'description' => 'В склад - за претоварване'
		),
		array(
			'id'          => 'UNKNOWN',
			'key'         => 'STATUS_UNKNOWN',
			'name'        => 'Не може да се извлече статус',
			'description' => 'В момента не можем да извлечем статус на пратката'
		),
	);
}