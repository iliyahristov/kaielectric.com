<?php

class ControllerSaleTkTranspress extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('extension/shipping/tk_transpress');
		$this->load->model('extension/shipping/tk_transpress');
		$this->load->model('sale/order');
		$this->load->model('setting/setting');
		$this->load->model('catalog/product');
		$this->load->model('localisation/country');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->document->addScript('view/javascript/jquery/jquery.datetimepicker.js');
		$this->document->addStyle('view/stylesheet/jquery.datetimepicker.css');
		
		$this->load->library('tktranspress');
		if (!isset($this->tktranspress)) {
			$this->tktranspress = new Tktranspress($this->registry);
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
		
		$data = $this->model_setting_setting->getSetting('shipping_tk_transpress');
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/tk_transpress', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		
		if (isset($this->session->data['warning'])) {
			$data['error_warning'] = $this->session->data['warning'];
			unset($this->session->data['warning']);
		} else if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		// Transpress sender country
		$countries = $this->model_localisation_country->getCountries();
		$data['countries'] = array();
		foreach ($countries as $country) {
			$data['countries'][] = array(
				'iso_code_2' => $country['iso_code_2'],
				'name' => $country['name']
			);
		}
		
		// Transpress sender office
		$this->tktranspress->setType(Tktranspress::TYPE_OFFICES);
		$offices = $this->tktranspress->execute();
		$data['offices'] = array();
		foreach ($offices['response']['item'] as $office) {
			$data['offices'][] = array(
				'value' => $office['value'],
				'name' => $office['name']
			);
		}
		
		// Transpress package
		$this->tktranspress->setType(Tktranspress::TYPE_PACKAGES);
		$packages = $this->tktranspress->execute();
		$data['packages'] = array();
		foreach ($packages['response']['item'] as $package) {
			$data['packages'][] = array(
				'value' => $package['value'],
				'name' => $package['name']
			);
		}
		
		// Transpress services
		$this->tktranspress->setType(Tktranspress::TYPE_SERVICES);
		$services = $this->tktranspress->execute();
		$data['services'] = array();
		foreach ($services['response']['item'] as $service) {
			$data['services'][] = array(
				'value' => $service['value'],
				'name' => $service['name']
			);
		}
		
		$order_info = $this->model_sale_order->getOrder($this->request->get['order_id']);
		
		$transpressData = array();
		$transpressOrder = $this->model_extension_shipping_tk_transpress->getOrder($this->request->get['order_id']);
		if ($transpressOrder) {
			
			$transpressData = json_decode($transpressOrder['data'], true);
		}
		if (isset($transpressOrder['loading']) && $transpressOrder['loading']) {
			$transpressOrder['generate_date'] = date('Y-m-d H:i:s');
			$transpressOrder['loading_pdf'] = $this->url->link('sale/tk_transpress/pdf', 'user_token=' . $this->session->data['user_token'] . '&loading=' . $transpressOrder['loading'] . $url, 'SSL');
		} else {
			$transpressOrder['loading'] = false;
			$transpressOrder['generate_date'] = false;
			$transpressOrder['loading_pdf'] = false;
		}
		
		$description = array();
		if ($this->config->get('shipping_tk_transpress_shipment_product_name')) {
			$products = $this->model_sale_order->getOrderProducts($order_info['order_id']);
			foreach ($products as $product) {
				$description[] = $product['name'];
			}
		} elseif ($this->config->get('shipping_tk_transpress_shipment_description')) {
			$description[] = $this->config->get('shipping_tk_transpress_shipment_description') . ' ' . $order_info['order_id'];
		}
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && empty($transpressOrder['loading'])) {
			
			if (isset($this->request->post['loading_tk_transpress_weight']) && $this->request->post['loading_tk_transpress_weight']) {
				$transpressData['loading_tk_transpress_weight'] = $this->request->post['loading_tk_transpress_weight'];
			}
			
			if (isset($this->request->post['loading_tk_transpress_sender_type']) && $this->request->post['loading_tk_transpress_sender_type']) {
				$transpressData['loading_tk_transpress_sender_type'] = $this->request->post['loading_tk_transpress_sender_type'];
			}
			
			if (isset($this->request->post['loading_tk_transpress_sender_office']) && $this->request->post['loading_tk_transpress_sender_office']) {
				$transpressData['loading_tk_transpress_sender_office'] = $this->request->post['loading_tk_transpress_sender_office'];
			} else {
				$transpressData['loading_tk_transpress_sender_office'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_shop_address_default']) && $this->request->post['loading_tk_transpress_shop_address_default']) {
				$transpressData['loading_tk_transpress_shop_address_default'] = $this->request->post['loading_tk_transpress_shop_address_default'];
			} else {
				$transpressData['loading_tk_transpress_shop_address_default'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_cd']) && $this->request->post['loading_tk_transpress_cd'] != 0) {
				$transpressData['loading_tk_transpress_cd'] = $this->request->post['loading_tk_transpress_cd'];
				if (isset($this->request->post['loading_tk_transpress_cd_amount']) && $this->request->post['loading_tk_transpress_cd_amount']) {
					$transpressData['loading_tk_transpress_cd_amount'] = $this->request->post['loading_tk_transpress_cd_amount'];
				} else {
					$transpressData['loading_tk_transpress_cd_amount'] = 0;
				}
			} else {
				$transpressData['loading_tk_transpress_cd'] = 0;
				$transpressData['loading_tk_transpress_cd_amount'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_pd']) && $this->request->post['loading_tk_transpress_pd']) {
				$transpressData['loading_tk_transpress_pd'] = $this->request->post['loading_tk_transpress_pd'];
			} else {
				$transpressData['loading_tk_transpress_pd'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_rr']) && $this->request->post['loading_tk_transpress_rr']) {
				$transpressData['loading_tk_transpress_rr'] = $this->request->post['loading_tk_transpress_rr'];
			} else {
				$transpressData['loading_tk_transpress_rr'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_pr']) && $this->request->post['loading_tk_transpress_pr']) {
				$transpressData['loading_tk_transpress_pr'] = $this->request->post['loading_tk_transpress_pr'];
			} else {
				$transpressData['loading_tk_transpress_pr'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_allowed_services']) && $this->request->post['loading_tk_transpress_allowed_services']) {
				$transpressData['loading_tk_transpress_allowed_services'] = $this->request->post['loading_tk_transpress_allowed_services'];
			} else {
				$transpressData['loading_tk_transpress_allowed_services'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_review_before_payment']) && $this->request->post['loading_tk_transpress_review_before_payment']) {
				$transpressData['loading_tk_transpress_review_before_payment'] = $this->request->post['loading_tk_transpress_review_before_payment'];
			} else {
				$transpressData['loading_tk_transpress_review_before_payment'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_test_before_payment']) && $this->request->post['loading_tk_transpress_test_before_payment']) {
				$transpressData['loading_tk_transpress_test_before_payment'] = $this->request->post['loading_tk_transpress_test_before_payment'];
			} else {
				$transpressData['loading_tk_transpress_test_before_payment'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_package']) && $this->request->post['loading_tk_transpress_package']) {
				$transpressData['loading_tk_transpress_package'] = $this->request->post['loading_tk_transpress_package'];
			} else {
				$transpressData['loading_tk_transpress_package'] = 'А4';
			}
			
			if (isset($this->request->post['loading_tk_transpress_insurance']) && $this->request->post['loading_tk_transpress_insurance']) {
				$transpressData['loading_tk_transpress_insurance'] = $this->request->post['loading_tk_transpress_insurance'];
			} else {
				$transpressData['loading_tk_transpress_insurance'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_service_date']) && $this->request->post['loading_tk_transpress_service_date']) {
				$transpressData['loading_tk_transpress_service_date'] = $this->request->post['loading_tk_transpress_service_date'];
			} else {
				$transpressData['loading_tk_transpress_service_date'] = false;
			}
			
			if (isset($this->request->post['loading_tk_transpress_fragile']) && $this->request->post['loading_tk_transpress_fragile']) {
				$transpressData['loading_tk_transpress_fragile'] = $this->request->post['loading_tk_transpress_fragile'];
			} else {
				$transpressData['loading_tk_transpress_fragile'] = 0;
			}
			
			if (isset($this->request->post['loading_tk_transpress_postal_money_transfer']) && $this->request->post['loading_tk_transpress_postal_money_transfer']) {
				$transpressData['loading_tk_transpress_postal_money_transfer'] = $this->request->post['loading_tk_transpress_postal_money_transfer'];
			} else {
				$transpressData['loading_tk_transpress_postal_money_transfer'] = 0;
			}
			
			$this->model_extension_shipping_tk_transpress->updateOrder($order_info['order_id'], $transpressData);
			
			$addressSender = array();
			
			if ($transpressData['loading_tk_transpress_sender_type'] == 'shop' && $transpressData['loading_tk_transpress_shop_address_default']) {
				$shopAddresses = $this->config->get('shipping_tk_transpress_shop_address');
				$shopAddress = !empty($shopAddresses[$transpressData['loading_tk_transpress_shop_address_default']]) ? $shopAddresses[$transpressData['loading_tk_transpress_shop_address_default']] : array();
				
				if ($shopAddress) {
					$addressSender['country'] = $shopAddress['country'];
					$addressSender['postcode'] = str_replace(' ', '', $shopAddress['post_code']);
					$settlement = $this->tktranspress->getCityByPostCode($addressSender['postcode'], $addressSender['country']);
					$addressSender['settlement'] = $settlement['value'];
					$addressSender['address'] = $shopAddress['address'];
					$addressSender['shop_name'] = $shopAddress['shop_name'];
					$addressSender['phone'] = $shopAddress['phone'];
				} else {
					$addressSender['country'] = '';
					$addressSender['postcode'] = '';
					$addressSender['settlement'] = '';
					$addressSender['address'] = '';
					$addressSender['shop_name'] = '';
					$addressSender['phone'] = '';
				}
			} elseif ($transpressData['loading_tk_transpress_sender_office']) {
				$this->tktranspress->setType(Tktranspress::TYPE_OFFICES);
				$response = $this->tktranspress->execute();
				foreach ($response['response']['item'] as $item) {
					if ($item['value'] == $transpressData['loading_tk_transpress_sender_office']) {
						$postCodeCountry = $this->tktranspress->getCountryAndPostcodeByClass($item['class']);
						if ($postCodeCountry) {
							$addressSender['country'] = $postCodeCountry[1];
							$addressSender['postcode'] = str_replace(' ', '', $postCodeCountry[2]);
						}
						$addressSender['office'] = $item['value'];
						break;
					}
				}
			}
			
			if ($addressSender) {
				$this->tktranspress->setType(Tktranspress::TYPE_REQUEST);
				$this->tktranspress->__set(Tktranspress::FIELD_PRINT_FORMAT, 'nil');
				$this->tktranspress->__set(Tktranspress::FIELD_REFERENCE_CODE, $order_info['order_id']);
				$this->tktranspress->__set(Tktranspress::FIELD_DESCRIPTION, implode(', ', $description));
				$this->tktranspress->__set(Tktranspress::FIELD_OVERALL_WEIGHT, $transpressData['loading_tk_transpress_weight']);
				//$this->tktranspress->__set(Tktranspress::FIELD_OVERALL_VOLUME, $transpressData['volume']);
				
				$this->tktranspress->setParam(Tktranspress::FIELD_SENDER, '');
				
				if ($this->request->post['loading_tk_transpress_sender_type'] == 'shop') {
					$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_SENDER, Tktranspress::TRUE);
					$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_CITY, $addressSender['settlement']);
					$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_STREET, $addressSender['address']);
					$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_CONTACT_NAME, $addressSender['shop_name']);
					$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_CONTACT_PHONE, $addressSender['phone']);
				} else {
					$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_SENDER, Tktranspress::FALSE);
					$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_STATION_CODE, $addressSender['office']);
				}
				
				$this->tktranspress->__set(Tktranspress::FIELD_TARGET_CONTACT_NAME, $order_info['shipping_firstname'] . ' ' . $order_info['shipping_lastname']);
				$this->tktranspress->__set(Tktranspress::FIELD_TARGET_CONTACT_PHONE, $order_info['telephone']);
				
				$this->tktranspress->__set(Tktranspress::FIELD_SOURCE_COUNTRY, $addressSender['country']);
				
				$cityData = $this->tktranspress->getCityByNameOrPostCode($this->request->post['loading_tk_transpress_receiver_settlement'], $this->request->post['loading_tk_transpress_receiver_postcode'], $this->request->post['loading_tk_transpress_receiver_country']);
				if ($cityData) {
					$this->tktranspress->__set(Tktranspress::FIELD_TARGET_CITY, $cityData['value']);
					$this->tktranspress->__set(Tktranspress::FIELD_TARGET_STREET_NAME, $order_info['shipping_address_1']);
				}
				$this->tktranspress->__set(Tktranspress::FIELD_COURIER_AT_RECEIVER, Tktranspress::TRUE);
				
				if (isset($this->request->post['loading_tk_transpress_cd']) && $this->request->post['loading_tk_transpress_cd'] != 0 && isset($this->request->post['loading_tk_transpress_cd_amount']) && $this->request->post['loading_tk_transpress_cd_amount'] > 0) {
					$this->tktranspress->__set(Tktranspress::FIELD_CASH_ON_DELIVERY, Tktranspress::TRUE);
					$this->tktranspress->__set(Tktranspress::FIELD_DECLARED_VALUE, $this->request->post['loading_tk_transpress_cd_amount']);
				}
				
				if (isset($this->request->post['loading_tk_transpress_shipping_payer']) && $this->request->post['loading_tk_transpress_shipping_payer'] > 0) {
					$this->tktranspress->__set(Tktranspress::FIELD_PAID_ON_DELIVERY, Tktranspress::TRUE);
				} else {
					$this->tktranspress->__set(Tktranspress::FIELD_PAID_ON_DELIVERY, Tktranspress::FALSE);
				}
				
				if (isset($this->request->post['loading_tk_transpress_insurance']) && $this->request->post['loading_tk_transpress_insurance'] != 0) {
					$this->tktranspress->__set(Tktranspress::FIELD_INSURANCE_LIABILITY, $this->request->post['loading_tk_transpress_insurance_amount']);
				}
				
				if (isset($this->request->post['loading_tk_transpress_fragile']) && $this->request->post['loading_tk_transpress_fragile'] != 0) {
					$this->tktranspress->__set(Tktranspress::FIELD_FRAGILE, 1);
				}
				
				if (isset($this->request->post['loading_tk_transpress_postal_money_transfer']) && $this->request->post['loading_tk_transpress_postal_money_transfer'] != 0) {
					$this->tktranspress->__set(Tktranspress::FIELD_POSTAL_MONEY_TRANSFER, Tktranspress::TRUE);
				}
				
				$this->tktranspress->__set(Tktranspress::FIELD_PACKAGING_CODE, $this->request->post['loading_tk_transpress_package']);
				$this->tktranspress->__set(Tktranspress::FIELD_SHIPMENT_SERVICE_TYPE, $this->request->post['loading_tk_transpress_allowed_services']);
				
				if ($this->request->post['loading_tk_transpress_allowed_services'] == 'TARGOFIX') {
					$time = strtotime($this->request->post['loading_tk_transpress_service_date']) * 1000;
					$this->tktranspress->__set(Tktranspress::FIELD_SHIPMENT_SERVICE_DATE, $time);
				}
				
				$this->tktranspress->__set(Tktranspress::FIELD_PROOF_OF_DELIVERY, ($this->request->post['loading_tk_transpress_pd']) ? Tktranspress::TRUE : Tktranspress::FALSE);
				
				$this->tktranspress->__set(Tktranspress::FIELD_RECEIPT_REQUIRED, ($this->request->post['loading_tk_transpress_rr']) ? Tktranspress::TRUE : Tktranspress::FALSE);
				
				$this->tktranspress->__set(Tktranspress::FIELD_PACKAGE_RETURN, ($this->request->post['loading_tk_transpress_pr']) ? Tktranspress::TRUE : Tktranspress::FALSE);
				
				$this->tktranspress->__set(Tktranspress::FIELD_REVIEW_ON_DELIVERY, ($this->request->post['loading_tk_transpress_review_before_payment']) ? Tktranspress::TRUE : Tktranspress::FALSE);
				
				$this->tktranspress->__set(Tktranspress::FIELD_TEST_ON_DELIVERY, ($this->request->post['loading_tk_transpress_test_before_payment']) ? Tktranspress::TRUE : Tktranspress::FALSE);
				
				$return = $this->tktranspress->execute();
				
				if (isset($return['error']) && $return['error']) {
					$this->error['warning'] = $return['error'];
					$this->session->data['warning'] = $return['error'];
				}
			}
			
			if (!empty($return['manifest'])) {
				$transpressOrder['loading'] = $return['manifest'];
				$data['show_loading_form'] = true;
				$transpressOrder['generate_date'] = date('Y-m-d H:i:s');
				$transpressOrder['loading_pdf'] = $this->url->link('sale/tk_transpress/pdf', 'user_token=' . $this->session->data['user_token'] . '&loading=' . $transpressOrder['loading'] . $url, 'SSL');
				
				if (!empty($return['barcodes']['value'])) {
					$transpressOrder['barcode'] = $return['barcodes']['value'];
				} else {
					$transpressOrder['barcode'] = '';
				}
				
				$this->model_extension_shipping_tk_transpress->addLoading($order_info['order_id'], $transpressOrder['loading'], $transpressOrder['barcode']);
				
				$this->trace($transpressOrder['loading']);
				
				$this->response->redirect($this->url->link('sale/order/info', 'order_id=' . $order_info['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
			}
		}
		
		$data['loading_tk_transpress_receiver_type'] = 'address';
		$data['loading_tk_transpress_receiver_country'] = $order_info['shipping_iso_code_2'];
		$data['loading_tk_transpress_receiver_settlement'] = $order_info['shipping_city'];
		$data['loading_tk_transpress_receiver_postcode'] = $order_info['shipping_postcode'];
		$data['loading_tk_transpress_receiver_address'] = $order_info['shipping_address_1'];
		
		if (isset($transpressData['loading_tk_transpress_sender_type'])) {
			$data['loading_tk_transpress_sender_type'] = $transpressData['loading_tk_transpress_sender_type'];
		} else if ($this->config->get('shipping_tk_transpress_sender_type')) {
			$data['loading_tk_transpress_sender_type'] = $this->config->get('shipping_tk_transpress_sender_type');
		}
		
		if (isset($transpressData['loading_tk_transpress_sender_office'])) {
			$data['loading_tk_transpress_sender_office'] = $transpressData['loading_tk_transpress_sender_office'];
		} else if ($this->config->get('shipping_tk_transpress_sender_office')) {
			$data['loading_tk_transpress_sender_office'] = $this->config->get('shipping_tk_transpress_sender_office');
		}
		
		$data['loading_tk_transpress_shop_address'] = $this->config->get('shipping_tk_transpress_shop_address');
		
		if (isset($transpressData['loading_tk_transpress_shop_address_default'])) {
			$data['loading_tk_transpress_shop_address_default'] = $transpressData['loading_tk_transpress_shop_address_default'];
		} else if ($this->config->get('shipping_tk_transpress_shop_address_default')) {
			$data['loading_tk_transpress_shop_address_default'] = $this->config->get('shipping_tk_transpress_shop_address_default');
		}
		
		if (isset($transpressData['loading_tk_transpress_pd'])) {
			$data['loading_tk_transpress_pd'] = $transpressData['loading_tk_transpress_pd'];
		} else if ($this->config->get('shipping_tk_transpress_pd')) {
			$data['loading_tk_transpress_pd'] = $this->config->get('shipping_tk_transpress_pd');
		}
		
		if (isset($transpressData['loading_tk_transpress_rr'])) {
			$data['loading_tk_transpress_rr'] = $transpressData['loading_tk_transpress_rr'];
		} else if ($this->config->get('shipping_tk_transpress_rr')) {
			$data['loading_tk_transpress_rr'] = $this->config->get('shipping_tk_transpress_rr');
		}
		
		if (isset($transpressData['loading_tk_transpress_pr'])) {
			$data['loading_tk_transpress_pr'] = $transpressData['loading_tk_transpress_pr'];
		} else if ($this->config->get('shipping_tk_transpress_pr')) {
			$data['loading_tk_transpress_pr'] = $this->config->get('shipping_tk_transpress_pr');
		}
		
		if (isset($transpressData['loading_tk_transpress_allowed_services'])) {
			$data['loading_tk_transpress_allowed_services'] = $transpressData['loading_tk_transpress_allowed_services'];
		} else if ($this->config->get('shipping_tk_transpress_allowed_services')) {
			$data['loading_tk_transpress_allowed_services'] = $this->config->get('shipping_tk_transpress_allowed_services');
		}
		
		if (isset($transpressData['loading_tk_transpress_package'])) {
			$data['loading_tk_transpress_package'] = $transpressData['loading_tk_transpress_package'];
		} else if ($this->config->get('shipping_tk_transpress_package')) {
			$data['loading_tk_transpress_package'] = $this->config->get('shipping_tk_transpress_package');
		}
		
		if (isset($transpressData['loading_tk_transpress_fragile'])) {
			$data['loading_tk_transpress_fragile'] = $transpressData['loading_tk_transpress_fragile'];
		} else if ($this->config->get('shipping_tk_transpress_fragile')) {
			$data['loading_tk_transpress_fragile'] = $this->config->get('shipping_tk_transpress_fragile');
		}
		
		if (isset($transpressData['loading_tk_transpress_service_date'])) {
			$data['loading_tk_transpress_service_date'] = $transpressData['loading_tk_transpress_service_date'];
		} else {
			$data['loading_tk_transpress_service_date'] = '';
		}
		
		if (isset($this->request->post['loading_tk_transpress_weight'])) {
			$data['loading_tk_transpress_weight'] = $this->request->post['loading_tk_transpress_weight'];
		} else {
			$op_order_products = $this->model_sale_order->getOrderProducts($order_info['order_id']);
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
				
				if ($product_weight[$product['product_id']] == 0 && $this->config->get('shipping_tk_transpress_weight_total') && $this->config->get('shipping_tk_transpress_weight_total') > 0) {
					$product_weight[$product['product_id']] = $this->config->get('shipping_tk_transpress_weight_total');
				}
				
				$product_weight[$product['product_id']] = $product_weight[$product['product_id']] * $product['quantity'];
			}
			
			$totalWeight = 0;
			foreach ($product_weight as $product_wt) {
				$totalWeight += $product_wt;
			}
			
			if ($this->config->get('shipping_tk_transpress_weight_type') && $this->config->get('shipping_tk_transpress_weight_type') == 'gram') {
				$totalWeight = $totalWeight / 1000;
			}
			
			if ($totalWeight < 0.01) {
				$totalWeight = 0.01;
			}
			
			$data['loading_tk_transpress_weight'] = $totalWeight;
		}
		
		$totalPrice = 0;
		$totalShipping = 0;
		$order_totals = $this->model_sale_order->getOrderTotals($order_info['order_id']);
		if (!empty($order_totals)) {
			$not_shipping_total = array(
				'shipping',
				'total'
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
			$totalPrice = $this->currency->convert($totalPrice, $this->config->get('config_currency'), $order_info['currency_code']);
		}
		
		if ($totalShipping > 0) {
			$totalShipping = $this->currency->convert($totalShipping, $this->config->get('config_currency'), $order_info['currency_code']);
		}
		
		if (!$this->config->get('shipping_tk_transpress_shipping_in') && !$this->config->get('shipping_tk_transpress_calculate_enabled')) {
			$totalPrice = $totalPrice + $totalShipping;
		}
		
		if ($order_info['payment_code'] == 'cod') {
			if (isset($transpressData['loading_tk_transpress_cd']) && isset($transpressData['loading_tk_transpress_cd_amount']) && $transpressData['loading_tk_transpress_cd_amount'] > 0) {
				$data['loading_tk_transpress_cd'] = $transpressData['loading_tk_transpress_cd'];
				$data['loading_tk_transpress_cd_amount'] = $transpressData['loading_tk_transpress_cd_amount'];
			} else if ($this->config->get('shipping_tk_transpress_cd')) {
				$data['loading_tk_transpress_cd'] = true;
				$data['loading_tk_transpress_cd_amount'] = round($totalPrice, 2);
			} else {
				$data['loading_tk_transpress_cd'] = false;
				$data['loading_tk_transpress_cd_amount'] = false;
			}
		} else {
			$data['loading_tk_transpress_cd'] = false;
			$data['loading_tk_transpress_cd_amount'] = false;
		}
		
		if ($data['loading_tk_transpress_cd'] && $data['loading_tk_transpress_cd_amount']) {
			if (isset($transpressData['loading_tk_transpress_review_before_payment'])) {
				$data['loading_tk_transpress_review_before_payment'] = $transpressData['loading_tk_transpress_review_before_payment'];
			} else if ($this->config->get('shipping_tk_transpress_review_before_payment')) {
				$data['loading_tk_transpress_review_before_payment'] = $this->config->get('shipping_tk_transpress_review_before_payment');
			}
		} else {
			$data['loading_tk_transpress_review_before_payment'] = false;
		}
		
		if ($data['loading_tk_transpress_cd'] && $data['loading_tk_transpress_cd_amount']) {
			if (isset($transpressData['loading_tk_transpress_test_before_payment'])) {
				$data['loading_tk_transpress_test_before_payment'] = $transpressData['loading_tk_transpress_test_before_payment'];
			} else if ($this->config->get('shipping_tk_transpress_test_before_payment')) {
				$data['loading_tk_transpress_test_before_payment'] = $this->config->get('shipping_tk_transpress_test_before_payment');
			}
		} else {
			$data['loading_tk_transpress_test_before_payment'] = false;
		}
		
		if ($data['loading_tk_transpress_cd'] && $data['loading_tk_transpress_cd_amount']) {
			if (isset($transpressData['loading_tk_transpress_postal_money_transfer'])) {
				$data['loading_tk_transpress_postal_money_transfer'] = $transpressData['loading_tk_transpress_postal_money_transfer'];
			} else if ($this->config->get('shipping_tk_transpress_postal_money_transfer')) {
				$data['loading_tk_transpress_postal_money_transfer'] = $this->config->get('shipping_tk_transpress_postal_money_transfer');
			}
		} else {
			$data['loading_tk_transpress_postal_money_transfer'] = false;
		}
		
		if (isset($transpressData['loading_tk_transpress_insurance'])) {
			$data['loading_tk_transpress_insurance'] = $transpressData['loading_tk_transpress_insurance'];
		} else if ($this->config->get('shipping_tk_transpress_insurance')) {
			$data['loading_tk_transpress_insurance'] = $this->config->get('shipping_tk_transpress_insurance');
		} else {
			$data['loading_tk_transpress_insurance'] = false;
		}
		
		if ($data['loading_tk_transpress_cd'] && $data['loading_tk_transpress_cd_amount'] && $data['loading_tk_transpress_insurance']) {
			$data['loading_tk_transpress_insurance_amount'] = $data['loading_tk_transpress_cd_amount'];
		} else {
			$data['loading_tk_transpress_insurance_amount'] = false;
		}
		
		$data['loading_tk_transpress_free_shipping'] = false;
		
		if ($totalShipping == 0) {
			$data['loading_tk_transpress_free_shipping'] = true;
		} elseif (!$data['loading_tk_transpress_cd_amount']) {
			$data['loading_tk_transpress_free_shipping'] = true;
		}
		
		if (!isset($transpressData['loading_tk_transpress_calculate_enabled']) && !$this->config->get('shipping_tk_transpress_calculate_enabled') && !$data['loading_tk_transpress_free_shipping'] && $totalShipping > 0) {
			$data['loading_tk_transpress_fixed_price'] = true;
			$data['loading_tk_transpress_fixed_price_amount'] = (double)$totalShipping;
		} else {
			$data['loading_tk_transpress_fixed_price'] = false;
			$data['loading_tk_transpress_fixed_price_amount'] = false;
		}
		
		if (empty($transpressData['loading_tk_transpress_shipping_payer']) && $this->config->get('shipping_tk_transpress_shipping_in') && $this->config->get('shipping_tk_transpress_calculate_enabled')) {
			$data['loading_tk_transpress_shipping_payer'] = true;
		} else {
			$data['loading_tk_transpress_shipping_payer'] = false;
		}
		
		$data += $transpressOrder;
		
		$data['link'] = $this->url->link('sale/tk_transpress/pdf', 'user_token=' . $this->session->data['user_token'], true);
		$data['text_generate_loading'] = $this->language->get('text_generate_loading');
		$data['column_loading'] = $this->language->get('column_loading');
		$data['text_created_on'] = $this->language->get('text_created_on');
		
		$data['action'] = $this->url->link('sale/tk_transpress', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $order_info['order_id'] . $url, true);
		$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true);
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		if (isset($this->error['warning'])) {
			$this->response->redirect($this->url->link('sale/tk_transpress', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $order_info['order_id'] . $url, true), 301);
		}
		$this->response->setOutput($this->load->view('sale/tk_transpress', $data));
	}
	
	public function parcel() {
		
		if (isset($this->request->get['loading'])) {
			$this->load->library('tktranspress');
			if (!isset($this->tktranspress)) {
				$this->tktranspress = new Tktranspress($this->registry);
			}
			
			$this->tktranspress->setType(Tktranspress::TYPE_PRINT);
			$this->tktranspress->__set(Tktranspress::FIELD_PRINT_FORMAT, $this->config->get('shipping_tk_transpress_print_format'));
			$this->tktranspress->__set(Tktranspress::FIELD_MANIFEST_ID, $this->request->get['loading']);
			$pdf = $this->tktranspress->execute();
			
			if (!isset($pdf['error'])) {
				if (strlen($pdf) > 0) {
					header('Content-type:application/pdf');
					header('Content-Disposition:attachment;filename=' . $this->request->get['loading'] . '.pdf');
					die($pdf);
				}
			} else {
				$transpress = json_decode($pdf['error'], true);
				echo $transpress['value'];
			}
		}
	}
	
	public function trace($loading) {
		
		$this->load->model('extension/shipping/tk_transpress');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		
		$this->load->library('tktranspress');
		if (!isset($this->tktranspress)) {
			$this->tktranspress = new Tktranspress($this->registry);
		}
		
		$status = false;
		
		$this->tktranspress->setType(Tktranspress::TYPE_STATUS);
		$this->tktranspress->__set(Tktranspress::FIELD_MANIFEST_ID, $loading);
		$result = $this->tktranspress->execute(true);
		
		if (is_object($result) && !empty($result->item->state)) {
			$transpress_status = $this->tktranspress->xmlAttribute($result->item->state, 'value');
			
			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tk_transpress_order` WHERE `loading` = '" . $this->db->escape($loading) . "' ");
			
			if (empty($query->row['status']) || ($query->row['status'] != $transpress_status)) {
				$status = $transpress_status;
				$setFields[] = "`status` = '" . $this->db->escape($status) . "'";
				$statuss = $this->model_extension_shipping_tk_transpress->getStatusByCode($status);
				if (!$statuss) {
					$statuss = $this->model_extension_shipping_tk_transpress->getStatusByCode('UNKNOWN');
				}
				
				$setFields[] = "`status_name` = '" . $this->db->escape($statuss['name']) . "'";
				$status_name = $statuss['name'];
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
			
			if (!empty($status) && !empty($status_name)) {
				
				if ($this->config->get('shipping_tk_transpress_order_status_id')) {
					$api_token = $this->model_extension_module_tk_checkout->getApiToken();
				} else {
					$api_token = '';
				}
				
				// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
				if ($this->config->get('shipping_tk_transpress_order_status_id') > 0 && $api_token) {
					if ($this->config->get('shipping_tk_transpress_order_status_id_mail')) {
						$notify = true;
					} else {
						$notify = false;
					}
					
					if ($this->config->get('shipping_tk_transpress_order_status_id_mail_text')) {
						$patterns = array();
						$patterns[0] = '{shipment_number}';
						
						$replacements = array();
						$replacements[0] = $loading;
						
						$comment = str_replace($patterns, $replacements, $this->config->get('shipping_tk_transpress_order_status_id_mail_text'));
					} else {
						$comment = 'Номер на пратка: ' . $loading;
					}
					
					$history_data = array(
						'order_status_id' => $this->config->get('tk_transpress_order_status_id'),
						'notify'          => $notify,
						'comment'         => $comment
					);
					
					$this->model_extension_module_tk_checkout->addOrderHistory($query->row['order_id'], $api_token, $history_data);
				}
				
				if (isset($history_data['notify']) && $history_data['notify']) {
					$mail_send = $status;
				} else {
					$mail_send = NULL;
				}
				
				$this->model_extension_shipping_tk_transpress->editShipment($query->row['order_id'], $setFields, $mail_send);
			}
		}
	}
	
	public function cancel() {
		
		$this->load->language('extension/shipping/tk_transpress');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_transpress');
		
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
			$transpress_order_info = $this->model_extension_shipping_tk_transpress->getOrder($this->request->get['order_id']);
		}
		
		if (!empty($transpress_order_info) && !empty($transpress_order_info['loading']) && $this->validate_delete()) {
			
			$this->load->model('setting/setting');
			
			$this->load->library('tktranspress');
			if (!isset($this->tktranspress)) {
				$this->tktranspress = new Tktranspress($this->registry);
			}
			
			$this->tktranspress->setType(Tktranspress::TYPE_CANCEL);
			$this->tktranspress->__set(Tktranspress::FIELD_BARCODE, $transpress_order_info['loading']);
			$return = $this->tktranspress->execute(true);
			
			$result = json_decode(json_encode($return));
			
			if ($result->error) {
				$this->error['warning'] = $result->error;
				$this->session->data['warning'] = $result->error;
			}
			
			if ($result->manifest) {
				$this->model_extension_shipping_tk_transpress->removeLoading($result->manifest);
				$this->session->data['success'] = $this->language->get('text_success_cancel');
			}
		} else {
			if (isset($this->error['warning'])) {
				$this->session->data['warning'] = $this->error['warning'];
			} else {
				$this->session->data['warning'] = $this->language->get('error_exists');
			}
		}
		
		$this->response->redirect($this->url->link('sale/tk_transpress', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}
	
	public function update() {
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->load->model('extension/shipping/tk_transpress');
		$this->load->model('extension/module/tk_checkout');
		
		$loadings = $this->model_extension_shipping_tk_transpress->getNotDelivered();
		
		if ($loadings) {
			
			$this->load->model('setting/setting');
			
			$this->load->library('tktranspress');
			
			if (!isset($this->tktranspress)) {
				$this->tktranspress = new Tktranspress($this->registry);
			}
			
			$tk_transpress_order_status = $this->config->get('shipping_tk_transpress_order_status');
			$tk_transpress_order_status_mail = $this->config->get('shipping_tk_transpress_order_status_mail');
			$tk_transpress_order_status_mail_text = $this->config->get('shipping_tk_transpress_order_status_mail_text');
			
			if ($this->config->get('shipping_tk_transpress_order_status')) {
				$api_token = $this->model_extension_module_tk_checkout->getApiToken();
			} else {
				$api_token = '';
			}
			
			$setFields = array();
			foreach ($loadings as $loading) {
				
				$this->tktranspress->setType(Tktranspress::TYPE_STATUS);
				$this->tktranspress->__set(Tktranspress::FIELD_MANIFEST_ID, $loading['loading']);
				$result = $this->tktranspress->execute(true);
				
				if (is_object($result) && !empty($result->item->state)) {
					
					$setFields[] = "`status_date` = DATE_ADD(NOW(), INTERVAL 3 HOUR)";
					
					$status = $this->tktranspress->xmlAttribute($result->item->state, 'value');
					
					if ($loading['status'] != $status) {
						
						$setFields[] = "`status` = '" . $this->db->escape($status) . "'";
						
						$statuss = $this->model_extension_shipping_tk_transpress->getStatusByCode($status);
						if (!$statuss) {
							$statuss = $this->model_extension_shipping_tk_transpress->getStatusByCode('UNKNOWN');
						}
						
						$setFields[] = "`status_name` = '" . $this->db->escape($statuss['name']) . "'";
						
						if (!isset($tk_transpress_order_status[$statuss['id']])) {
							$statuss['id'] = 'UNKNOWN';
						}
						$order_status_id = $tk_transpress_order_status[$statuss['id']];
						
						$this->load->model('sale/order');
						$order_info = $this->model_sale_order->getOrder($loading['order_id']);
						
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
				
				$this->model_extension_shipping_tk_transpress->editShipment($loading['order_id'], $setFields, $mail_send);
			}
		}
		
		
		$response_data['success'] = 'Товарителниците са опреснени';
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
	protected function validate_delete() {
		
		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_transpress')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
}