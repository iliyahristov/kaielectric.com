<?php

class ControllerExtensionShippingTkSameday extends Controller {
	
	private $error = array();
	
	public function index() {

		$this->language->load('extension/shipping/tk_sameday');
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->model('setting/setting');
		
		$data['sameday_pickups'] = array();
		$data = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token')) && $this->config->get('shipping_tk_sameday_logged')) {
			if (!isset($this->tksameday)) {
				$this->tksameday = new Tksameday($this->registry);
			}
			
			$data['sameday_pickups'] = $this->model_extension_shipping_tk_sameday->getPickup();
		}
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
				
				$this->model_setting_setting->editSetting('shipping_tk_sameday', $this->request->post + $data);
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/shipping/tk_sameday', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['heading_title_details'] = $this->language->get('heading_title_details');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_shipping'] = $this->language->get('text_shipping');
		$data['text_success'] = $this->language->get('text_success');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_code'] = $this->language->get('text_code');
		$data['text_currency'] = $this->language->get('text_currency');
		$data['text_amount'] = $this->language->get('text_amount');
		$data['text_time'] = $this->language->get('text_time');
		$data['text_status'] = $this->language->get('text_status');
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
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_send_country'] = $this->language->get('text_send_country');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
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
		
		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['root_system'] = DIR_SYSTEM;
		
		$data['user_token'] = $this->session->data['user_token'];
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['username'])) {
			$data['error_username'] = $this->error['username'];
		} else {
			$data['error_username'] = '';
		}
		
		if (isset($this->error['password'])) {
			$data['error_password'] = $this->error['password'];
		} else {
			$data['error_password'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_shipping'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/shipping/tk_sameday', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data['action'] = $this->url->link('extension/shipping/tk_sameday', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);
		
		if ($this->config->get('module_tk_checkout_token')) {
			$data['module_tk_checkout_token'] = $this->config->get('module_tk_checkout_token');
		} else {
			$data['module_tk_checkout_token'] = false;
		}
		
		if ($this->config->get('module_tk_checkout_api_url')) {
			$data['module_tk_checkout_api_url'] = $this->config->get('module_tk_checkout_api_url');
		} else {
			$data['module_tk_checkout_api_url'] = false;
		}
		
		$data['sameday_contact_persons'] = array();
		
		if (!empty($data['sameday_pickups'])) {
			foreach ($data['sameday_pickups'] as $sameday_pickup) {
				if (!empty($sameday_pickup['contactPersons'])) {
					$data['sameday_contact_persons'][$sameday_pickup['sameday_id']] = json_decode($sameday_pickup['contactPersons'], true);
				}
			}
		}

		if ($this->config->get('shipping_tk_sameday_pickup')) {
			$data['shipping_tk_sameday_pickup'] = $this->config->get('shipping_tk_sameday_pickup');
		} elseif (!empty($data['sameday_pickups'][0]['sameday_id'])) {
			$data['shipping_tk_sameday_pickup'] = $data['sameday_pickups'][0]['sameday_id'];
		} else {
			$data['shipping_tk_sameday_pickup'] = false;
		}
		
		$data['sameday_services'] = array();
		$data['sameday_countries'] = array();
		$data['sameday_statuses'] = array();

		if ($this->config->get('shipping_tk_sameday_logged')) {
			if (!empty($data['shipping_tk_sameday_username']) && !empty($data['shipping_tk_sameday_password'])) {
				$this->load->library('tksameday');
				if (!isset($this->tksameday)) {
					$this->tksameday = new TkSameday($this->registry);
				}
				try {
					$data['sameday_countries'] = TkSameday::getDefault();
					$data['sameday_services'] = TkSameday::getServices();
					$data['sameday_statuses'] = TkSameday::getStatuslist();

					if (!empty($data['sameday_services']['error'])) {
						$data['error_warning'] = $data['sameday_services']['error'];
					}
				} catch (\Exception $e) {
					$data['error_warning'] = $e->getMessage();
				}
			}
		}
		
		if (!empty($data['sameday_services']['error']['message'])) {
			$data['error_warning'] = $data['sameday_services']['error']['message'];
		}
		
		if (!empty($this->session->data['tk_sameday_token'])) {
			$data['tk_sameday_token'] = $this->session->data['tk_sameday_token'];
		} else {
			$data['tk_sameday_token'] = '';
		}
		
		if (!empty($this->session->data['tk_sameday_expire'])) {
			$data['tk_sameday_expire'] = $this->session->data['tk_sameday_expire'];
		} else {
			$data['tk_sameday_expire'] = '';
		}
		
		$data['shipping_tk_sameday_logged'] = $this->config->get('shipping_tk_sameday_logged');
		
		$this->load->model('setting/extension');
		$data['oc_totals'] = array();
		$totals = $this->model_setting_extension->getInstalled('total');
		foreach ($totals as $total) {
			$this->load->language('extension/total/' . $total);
			$data['oc_totals'][] = array(
				'code' => $total,
				'name' => strip_tags($this->language->get('heading_title'))
			);
		}
		
		if (isset($this->request->post['shipping_tk_sameday_tax_class_id'])) {
			$data['shipping_tk_sameday_tax_class_id'] = $this->request->post['shipping_tk_sameday_tax_class_id'];
		} else {
			$data['shipping_tk_sameday_tax_class_id'] = $this->config->get('shipping_tk_sameday_tax_class_id');
		}
		
		$this->load->model('localisation/tax_class');
		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->load->model('localisation/currency');
		$data['currencies'] = $this->model_localisation_currency->getCurrencies();
		
		$this->load->model('localisation/weight_class');
		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();
		
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$this->load->model('customer/custom_field');
		$data['custom_fields'] = $this->model_customer_custom_field->getCustomFields();
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('extension/shipping/tk_sameday', $data));
	}
	
	public function install() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		
		$data['shipping_tk_sameday_oc'] = 1;
		$this->model_setting_setting->editSetting('shipping_tk_sameday', $data);
	}
	
	public function uninstall() {
		
		$this->load->model('extension/shipping/tk_sameday');
		$this->model_extension_shipping_tk_sameday->deleteTables();
		
		unset($this->session->data['tk_sameday_token']);
		unset($this->session->data['tk_sameday_expire']);
	}
	
	public function login() {
		
		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->language('extension/shipping/tk_sameday');
		
		$result = array();
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			if (!empty($this->request->post['username']) && !empty($this->request->post['password'])) {
				
				$data = $this->model_setting_setting->getSetting('shipping_tk_sameday');
				$data['shipping_tk_sameday_username'] = $this->request->post['username'];
				$data['shipping_tk_sameday_password'] = $this->request->post['password'];
				
				if (!empty($this->request->post['test'])) {
					$data['shipping_tk_sameday_test'] = $this->request->post['test'];
				} else {
					$data['shipping_tk_sameday_test'] = 0;
				}
				
				$data['shipping_tk_sameday_logged'] = false;
				
				$result = $this->model_extension_shipping_tk_sameday->createTables($this->config->get('module_tk_checkout_token'));

				$this->load->library('tksameday');
				if (!isset($this->tksameday)) {
					$this->tksameday = new TkSameday($this->registry);
				}
				try {
					$login = TkSameday::login($data);
	
					if (!empty($login['error'])) {
						$result['message'] = $login['error'];
						$result['success'] = false;
					} else {
						$data['shipping_tk_sameday_logged'] = true;
						
						$result['success'] = true;
						$this->pickup();
					}
				} catch (\Exception $e) {
					$result['success'] = false;
					$result['message'] = $e->getMessage();
				}
				
				$this->model_setting_setting->editSetting('shipping_tk_sameday', $data);
			} else {
				$result['success'] = false;
				$result['message'] = $this->language->get('error_username_password');
			}
		} else {
			$result['success'] = false;
			$result['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($result));
	}
	
	public function pickup() {
		
		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->language('extension/shipping/tk_sameday');
		
		$result = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			$this->load->library('tksameday');
			if (!isset($this->tksameday)) {
				$this->tksameday = new TkSameday($this->registry);
			}
			try {
				$sameday = TkSameday::getPickup();

				if (!empty($sameday['data'])) {
					$this->model_extension_shipping_tk_sameday->updatePickup($sameday['data']);
					$result['success'] = true;
				} else if (!empty($services['error'])) {
					$result['message'] = $services['error'];
				}
			} catch (\Exception $e) {
				$result['error_warning'] = $e->getMessage();
			}
		} else {
			
			$result['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($result));
	}
	
	public function lockers($country_iso = 'BG', $page = 1) {
		
		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_sameday');
		$this->load->language('extension/shipping/tk_sameday');
		
		$result = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			if (!empty($this->request->post['country'])) {
				$country_iso = $this->request->post['country'];
			}
			
			if (!empty($this->request->post['page'])) {
				$page = $this->request->post['page'];
			}
			
			if ($page == 1) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "tk_sameday_locker WHERE country_iso = '" . $this->db->escape($country_iso) . "'");
			}
			
			$this->load->library('tksameday');
			if (!isset($this->tksameday)) {
				$this->tksameday = new TkSameday($this->registry);
			}
			try {
				$get = array(
					'page'        => $page,
					'countryCode' => $country_iso
				);
				$sameday = TkSameday::getLockers($get);
				
				if (!empty($sameday['total']) && $sameday['total'] > 0 && $sameday['currentPage'] <= $sameday['pages']) {
					
					$result['setting']['page'] = $sameday['currentPage'] + 1;
					$result['setting']['total'] = $sameday['total'];
					$result['setting']['pages'] = $sameday['pages'];
					$result['setting']['per_page'] = $sameday['perPage'];
					
					$this->model_extension_shipping_tk_sameday->updateLocker($sameday['data'], $country_iso);
				} else {
					$result['setting'] = NULL;
					$result['success'] = true;
				}
			} catch (\Exception $e) {
				$result['error_warning'] = $e->getMessage();
			}
		} else {
			
			$result['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($result));
	}
	
	public function logout() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_sameday');
		$data['shipping_tk_sameday_logged'] = false;
		$data['shipping_tk_sameday_status'] = 0;
		$data['shipping_tk_sameday_test'] = 0;
		$this->model_setting_setting->editSetting('shipping_tk_sameday', $data);
	}
	
	private function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_sameday')) {
			$this->error['warning'] = $this->language->get('error_permission');
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
	
	protected function settings($token = false) {
		
		$this->load->model('extension/shipping/tk_sameday');
		
		if (isset($token)) {
			$settings = $this->model_extension_shipping_tk_sameday->settings($token);
		} else {
			$settings['error'] = "Невалиден API Token";
		}
		
		if (isset($settings['error'])) {
			$this->error['warning'] = $settings['error'];
		}
		
		return !$this->error;
	}
}

?>
