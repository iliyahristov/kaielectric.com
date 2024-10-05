<?php

class ControllerExtensionShippingTkSpeedy extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->language->load('extension/shipping/tk_speedy');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_speedy');
		
		$this->load->model('setting/setting');
		$dataConfig = $this->model_setting_setting->getSetting('shipping_tk_speedy');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
				
				if (!empty($this->request->post['shipping_tk_speedy_weight_value'])) {
					$weight_values = $this->request->post['shipping_tk_speedy_weight_value'];
					
					$this->request->post['shipping_tk_speedy_weight_value'] = array();
					foreach ($weight_values as $weight_value) {
						if (!$weight_value['price']) {
							$weight_value['price'] = 0;
						}
						
						$this->request->post['shipping_tk_speedy_weight_value'][] = array(
							'from'  => number_format(str_replace(',', '.', (float)$weight_value['from']), 2, '.', ''),
							'to'    => number_format(str_replace(',', '.', (float)$weight_value['to']), 2, '.', ''),
							'price' => number_format(str_replace(',', '.', (float)$weight_value['price']), 2, '.', ''),
							'type'  => $weight_value['type']
						);
					}
				} else {
					$this->request->post['shipping_tk_speedy_weight_value'] = array();
				}
				
				$this->model_setting_setting->editSetting('shipping_tk_speedy', $this->request->post + $dataConfig);
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/shipping/tk_speedy', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['root_system'] = DIR_SYSTEM;
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_shipping'] = $this->language->get('text_shipping');
		$data['text_success'] = $this->language->get('text_success');
		$data['text_success_update'] = $this->language->get('text_success_update');
		$data['text_get_data_info'] = $this->language->get('text_get_data_info');
		$data['text_warning_logout'] = $this->language->get('text_warning_logout');
		$data['text_real_environment'] = $this->language->get('text_real_environment');
		$data['text_demo_environment'] = $this->language->get('text_demo_environment');
		$data['text_environment_info'] = $this->language->get('text_environment_info');
		$data['text_sync_info_warning'] = $this->language->get('text_sync_info_warning');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_get_data'] = $this->language->get('text_get_data');
		$data['text_get_address'] = $this->language->get('text_get_address');
		$data['text_wait'] = $this->language->get('text_wait');
		$data['text_from_office'] = $this->language->get('text_from_office');
		$data['text_from_door'] = $this->language->get('text_from_door');
		$data['text_from_aps'] = $this->language->get('text_from_aps');
		$data['text_sender'] = $this->language->get('text_sender');
		$data['text_receiver'] = $this->language->get('text_receiver');
		$data['text_get_key_word'] = $this->language->get('text_get_key_word');
		$data['text_get_cd_agreement_num'] = $this->language->get('text_get_cd_agreement_num');
		$data['text_get_instructions'] = $this->language->get('text_get_instructions');
		$data['text_applicabl_services'] = $this->language->get('text_applicabl_services');
		$data['entry_discount'] = $this->language->get('entry_discount');
		$data['entry_general_settings'] = $this->language->get('entry_general_settings');
		$data['entry_customer_settngs'] = $this->language->get('entry_customer_settngs');
		$data['entry_oc'] = $this->language->get('entry_oc');
		$data['entry_dc'] = $this->language->get('entry_dc');
		$data['entry_sms'] = $this->language->get('entry_sms');
		$data['entry_np'] = $this->language->get('entry_np');
		$data['entry_os'] = $this->language->get('entry_os');
		$data['entry_get_address'] = $this->language->get('entry_get_address');
		$data['entry_button_logout'] = $this->language->get('entry_button_logout');
		$data['entry_office_total'] = $this->language->get('entry_office_total');
		$data['entry_door_total'] = $this->language->get('entry_door_total');
		$data['entry_office_cost'] = $this->language->get('entry_office_cost');
		$data['entry_door_cost'] = $this->language->get('entry_door_cost');
		$data['entry_machine_enabled'] = $this->language->get('entry_machine_enabled');
		$data['entry_calculate_enabled'] = $this->language->get('entry_calculate_enabled');
		$data['entry_price_settings'] = $this->language->get('entry_price_settings');
		$data['entry_office_fixed_cost'] = $this->language->get('entry_office_fixed_cost');
		$data['entry_door_fixed_cost'] = $this->language->get('entry_door_fixed_cost');
		$data['entry_weight_total'] = $this->language->get('entry_weight_total');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_speedy_contract'] = $this->language->get('entry_speedy_contract');
		$data['button_login'] = $this->language->get('button_login');
		$data['error_permission'] = $this->language->get('error_permission');
		$data['error_general'] = $this->language->get('error_general');
		$data['error_username_password'] = $this->language->get('error_username_password');
		$data['error_connect'] = $this->language->get('error_connect');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_remove'] = $this->language->get('button_remove');
		$data['button_get_address'] = $this->language->get('button_get_address');
		$data['button_get_data'] = $this->language->get('button_get_data');
		$data['button_refresh_data'] = $this->language->get('button_refresh_data');
		$data['button_office_locator'] = $this->language->get('button_office_locator');
		$data['button_get_key_word'] = $this->language->get('button_get_key_word');
		$data['button_get_cd_agreement_num'] = $this->language->get('button_get_cd_agreement_num');
		$data['button_get_instructions'] = $this->language->get('button_get_instructions');
		$data['button_instructions_form'] = $this->language->get('button_instructions_form');
		$data['entry_price_auto_settings'] = $this->language->get('entry_price_auto_settings');
		$data['entry_speedy_settings'] = $this->language->get('entry_speedy_settings');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_select_all'] = $this->language->get('text_select_all');
		$data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$data['text_filename'] = $this->language->get('text_filename');
		$data['text_loading'] = $this->language->get('text_loading');
		$data['text_sevice_id'] = $this->language->get('text_sevice_id');
		$data['text_speedy_package_dimentions'] = $this->language->get('text_speedy_package_dimentions');
		$data['text_package_weight'] = $this->language->get('text_package_weight');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_client_id'] = $this->language->get('text_client_id');
		$data['entry_version'] = $this->language->get('entry_version');
		$data['entry_server_address'] = $this->language->get('entry_server_address');
		$data['entry_username'] = $this->language->get('entry_username');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_telephone'] = $this->language->get('entry_telephone');
		$data['entry_workingtime_end'] = $this->language->get('entry_workingtime_end');
		$data['entry_allowed_methods'] = $this->language->get('entry_allowed_methods');
		$data['entry_client_id'] = $this->language->get('entry_client_id');
		$data['entry_pricing'] = $this->language->get('entry_pricing');
		$data['entry_fixed_price'] = $this->language->get('entry_fixed_price');
		$data['entry_free_shipping_total'] = $this->language->get('entry_free_shipping_total');
		$data['entry_free_method_city'] = $this->language->get('entry_free_method_city');
		$data['entry_free_method_intercity'] = $this->language->get('entry_free_method_intercity');
		$data['entry_free_method_international'] = $this->language->get('entry_free_method_international');
		$data['entry_back_documents'] = $this->language->get('entry_back_documents');
		$data['entry_back_receipt'] = $this->language->get('entry_back_receipt');
		$data['entry_default_weight'] = $this->language->get('entry_default_weight');
		$data['entry_packing'] = $this->language->get('entry_packing');
		$data['entry_label_printer'] = $this->language->get('entry_label_printer');
		$data['entry_insurance'] = $this->language->get('entry_insurance');
		$data['entry_fragile'] = $this->language->get('entry_fragile');
		$data['entry_from_office'] = $this->language->get('entry_from_office');
		$data['entry_office'] = $this->language->get('entry_office');
		$data['entry_documents'] = $this->language->get('entry_documents');
		$data['entry_fixed_time'] = $this->language->get('entry_fixed_time');
		$data['entry_taking_date'] = $this->language->get('entry_taking_date');
		$data['entry_currency'] = $this->language->get('entry_currency');
		$data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_min_package_dimention'] = $this->language->get('entry_min_package_dimention');
		$data['entry_weight_dimensions'] = $this->language->get('entry_weight_dimensions');
		$data['entry_convertion_to_win1251'] = $this->language->get('entry_convertion_to_win1251');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_options_before_payment'] = $this->language->get('entry_options_before_payment');
		$data['entry_return_payer_type'] = $this->language->get('entry_return_payer_type');
		$data['entry_return_package_city_service_id'] = $this->language->get('entry_return_package_city_service_id');
		$data['entry_return_package_intercity_service_id'] = $this->language->get('entry_return_package_intercity_service_id');
		$data['entry_return_voucher'] = $this->language->get('entry_return_voucher');
		$data['entry_return_voucher_city_service_id'] = $this->language->get('entry_return_voucher_city_service_id');
		$data['entry_return_voucher_intercity_service_id'] = $this->language->get('entry_return_voucher_intercity_service_id');
		$data['entry_return_voucher_payer_type'] = $this->language->get('entry_return_voucher_payer_type');
		$data['entry_money_transfer'] = $this->language->get('entry_money_transfer');
		$data['entry_courier_sevice'] = $this->language->get('entry_courier_sevice');
		$data['help_fragile'] = $this->language->get('help_fragile');
		$data['help_from_office'] = $this->language->get('help_from_office');
		$data['help_documents'] = $this->language->get('help_documents');
		$data['help_fixed_time'] = $this->language->get('help_fixed_time');
		$data['help_money_transfer'] = $this->language->get('help_money_transfer');
		$data['help_courier_sevice'] = $this->language->get('help_courier_sevice');
		$data['help_filename'] = $this->language->get('help_filename');
		$data['help_weight'] = $this->language->get('help_weight');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_testcredentials'] = $this->language->get('check_credentials_btn_label');
		$data['button_upload'] = $this->language->get('button_upload');
		$data['column_speedy_XS'] = $this->language->get('column_speedy_XS');
		$data['column_speedy_S'] = $this->language->get('column_speedy_S');
		$data['column_speedy_M'] = $this->language->get('column_speedy_M');
		$data['column_speedy_L'] = $this->language->get('column_speedy_L');
		$data['column_speedy_XL'] = $this->language->get('column_speedy_XL');
		$data['text_tab_price'] = $this->language->get('text_tab_price');
		$data['text_tab_status'] = $this->language->get('text_tab_status');
		$data['text_statuses'] = $this->language->get('text_status_speedy');
		$data['entry_yes'] = $this->language->get('entry_yes');
		$data['entry_no'] = $this->language->get('entry_no');
		$data['text_tab_speedy_settings'] = $this->language->get('text_tab_speedy_settings');
		
		$data['user_token'] = (isset($this->session->data['user_token']) ? $this->session->data['user_token'] : '');
		
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
		
		if (isset($this->error['get_data'])) {
			$data['error_get_data'] = $this->error['get_data'];
		} else {
			$data['error_get_data'] = '';
		}
		
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		
		if (isset($this->error['telephone'])) {
			$data['error_telephone'] = $this->error['telephone'];
		} else {
			$data['error_telephone'] = '';
		}
		
		if (isset($this->error['client_id'])) {
			$data['error_client_id'] = $this->error['client_id'];
		} else {
			$data['error_client_id'] = '';
		}
		
		if (isset($this->error['default_weight'])) {
			$data['error_default_weight'] = $this->error['default_weight'];
		} else {
			$data['error_default_weight'] = '';
		}
		
		if (isset($this->error['allowed_methods'])) {
			$data['error_allowed_methods'] = $this->error['allowed_methods'];
		} else {
			$data['error_allowed_methods'] = '';
		}
		
		if (isset($this->error['free_method_international'])) {
			$data['error_free_method_international'] = $this->error['free_method_international'];
		} else {
			$data['error_free_method_international'] = '';
		}
		
		if (isset($this->error['taking_date'])) {
			$data['error_taking_date'] = $this->error['taking_date'];
		} else {
			$data['error_taking_date'] = '';
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
			'href' => $this->url->link('extension/shipping/tk_speedy', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data['action'] = $this->url->link('extension/shipping/tk_speedy', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
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
		
		if (isset($this->request->post['shipping_tk_speedy_weight_value'])) {
			$data['shipping_tk_speedy_weight_value'] = $this->request->post['shipping_tk_speedy_weight_value'];
		} else {
			$weight_values = $this->config->get('shipping_tk_speedy_weight_value');
			
			$data['shipping_tk_speedy_weight_value'] = array();
			if (isset($weight_values)) {
				foreach ($weight_values as $weight_value) {
					
					$data['shipping_tk_speedy_weight_value'][] = array(
						'from'  => number_format($weight_value['from'], 2, '.', ''),
						'to'    => number_format($weight_value['to'], 2, '.', ''),
						'price' => number_format($weight_value['price'], 2, '.', ''),
						'type'  => $weight_value['type']
					);
				}
			}
		}
		
		if (isset($this->request->post['shipping_tk_speedy_order_status'])) {
			$data['shipping_tk_speedy_order_status'] = $this->request->post['shipping_tk_speedy_order_status'];
		} else {
			$data['shipping_tk_speedy_order_status'] = $this->config->get('shipping_tk_speedy_order_status');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_from_offices'])) {
			$data['shipping_tk_speedy_from_offices'] = $this->request->post['shipping_tk_speedy_from_offices'];
		} else {
			$data['shipping_tk_speedy_from_offices'] = $this->config->get('shipping_tk_speedy_from_offices');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_offices_id'])) {
			$data['shipping_tk_speedy_offices_id'] = $this->request->post['shipping_tk_speedy_offices_id'];
		} else {
			$data['shipping_tk_speedy_offices_id'] = $this->config->get('shipping_tk_speedy_offices_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_name_client'])) {
			$data['shipping_tk_speedy_name_client'] = $this->request->post['shipping_tk_speedy_name_client'];
		} else {
			$data['shipping_tk_speedy_name_client'] = $this->config->get('shipping_tk_speedy_name_client');
		}
	
		if (isset($this->request->post['shipping_tk_speedy_telephone_client'])) {
			$data['shipping_tk_speedy_telephone_client'] = $this->request->post['shipping_tk_speedy_telephone_client'];
		} else {
			$data['shipping_tk_speedy_telephone_client'] = $this->config->get('shipping_tk_speedy_telephone_client');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_order_status_mail'])) {
			$data['shipping_tk_speedy_order_status_mail'] = $this->request->post['shipping_tk_speedy_order_status_mail'];
		} else {
			$data['shipping_tk_speedy_order_status_mail'] = $this->config->get('shipping_tk_speedy_order_status_mail');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_order_status_mail_text'])) {
			$data['shipping_tk_speedy_order_status_mail_text'] = $this->request->post['shipping_tk_speedy_order_status_mail_text'];
		} else {
			$data['shipping_tk_speedy_order_status_mail_text'] = $this->config->get('shipping_tk_speedy_order_status_mail_text');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_order_status_id_mail_text'])) {
			$data['shipping_tk_speedy_order_status_id_mail_text'] = $this->request->post['shipping_tk_speedy_order_status_id_mail_text'];
		} else {
			$data['shipping_tk_speedy_order_status_id_mail_text'] = $this->config->get('shipping_tk_speedy_order_status_id_mail_text');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_order_status_id_mail'])) {
			$data['shipping_tk_speedy_order_status_id_mail'] = $this->request->post['shipping_tk_speedy_order_status_id_mail'];
		} else {
			$data['shipping_tk_speedy_order_status_id_mail'] = $this->config->get('shipping_tk_speedy_order_status_id_mail');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_username'])) {
			$data['shipping_tk_speedy_username'] = $this->request->post['shipping_tk_speedy_username'];
		} else {
			$data['shipping_tk_speedy_username'] = $this->config->get('shipping_tk_speedy_username');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_password'])) {
			$data['shipping_tk_speedy_password'] = $this->request->post['shipping_tk_speedy_password'];
		} else {
			$data['shipping_tk_speedy_password'] = $this->config->get('shipping_tk_speedy_password');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_status'])) {
			$data['shipping_tk_speedy_status'] = $this->request->post['shipping_tk_speedy_status'];
		} else {
			$data['shipping_tk_speedy_status'] = $this->config->get('shipping_tk_speedy_status');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_geo_zone_id'])) {
			$data['shipping_tk_speedy_geo_zone_id'] = $this->request->post['shipping_tk_speedy_geo_zone_id'];
		} else {
			$data['shipping_tk_speedy_geo_zone_id'] = $this->config->get('shipping_tk_speedy_geo_zone_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_sort_order'])) {
			$data['shipping_tk_speedy_sort_order'] = $this->request->post['shipping_tk_speedy_sort_order'];
		} else {
			$data['shipping_tk_speedy_sort_order'] = $this->config->get('shipping_tk_speedy_sort_order');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_total'])) {
			$data['shipping_tk_speedy_office_total'] = $this->request->post['shipping_tk_speedy_office_total'];
		} else {
			$data['shipping_tk_speedy_office_total'] = $this->config->get('shipping_tk_speedy_office_total');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_machine_free'])) {
			$data['shipping_tk_speedy_machine_free'] = $this->request->post['shipping_tk_speedy_machine_free'];
		} else {
			$data['shipping_tk_speedy_machine_free'] = $this->config->get('shipping_tk_speedy_machine_free');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_free'])) {
			$data['shipping_tk_speedy_office_free'] = $this->request->post['shipping_tk_speedy_office_free'];
		} else {
			$data['shipping_tk_speedy_office_free'] = $this->config->get('shipping_tk_speedy_office_free');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_door_free'])) {
			$data['shipping_tk_speedy_door_free'] = $this->request->post['shipping_tk_speedy_door_free'];
		} else {
			$data['shipping_tk_speedy_door_free'] = $this->config->get('shipping_tk_speedy_door_free');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_door_total'])) {
			$data['shipping_tk_speedy_door_total'] = $this->request->post['shipping_tk_speedy_door_total'];
		} else {
			$data['shipping_tk_speedy_door_total'] = $this->config->get('shipping_tk_speedy_door_total');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_machine_free_weight'])) {
			$data['shipping_tk_speedy_machine_free_weight'] = $this->request->post['shipping_tk_speedy_machine_free_weight'];
		} else {
			$data['shipping_tk_speedy_machine_free_weight'] = $this->config->get('shipping_tk_speedy_machine_free_weight');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_free_weight'])) {
			$data['shipping_tk_speedy_office_free_weight'] = $this->request->post['shipping_tk_speedy_office_free_weight'];
		} else {
			$data['shipping_tk_speedy_office_free_weight'] = $this->config->get('shipping_tk_speedy_office_free_weight');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_door_free_weight'])) {
			$data['shipping_tk_speedy_door_free_weight'] = $this->request->post['shipping_tk_speedy_door_free_weight'];
		} else {
			$data['shipping_tk_speedy_door_free_weight'] = $this->config->get('shipping_tk_speedy_door_free_weight');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_machine_enabled'])) {
			$data['shipping_tk_speedy_machine_enabled'] = $this->request->post['shipping_tk_speedy_machine_enabled'];
		} else {
			$data['shipping_tk_speedy_machine_enabled'] = $this->config->get('shipping_tk_speedy_machine_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_enabled'])) {
			$data['shipping_tk_speedy_office_enabled'] = $this->request->post['shipping_tk_speedy_office_enabled'];
		} else {
			$data['shipping_tk_speedy_office_enabled'] = $this->config->get('shipping_tk_speedy_office_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_address_enabled'])) {
			$data['shipping_tk_speedy_address_enabled'] = $this->request->post['shipping_tk_speedy_address_enabled'];
		} else {
			$data['shipping_tk_speedy_address_enabled'] = $this->config->get('shipping_tk_speedy_address_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_calculate_enabled'])) {
			$data['shipping_tk_speedy_calculate_enabled'] = $this->request->post['shipping_tk_speedy_calculate_enabled'];
		} else {
			$data['shipping_tk_speedy_calculate_enabled'] = $this->config->get('shipping_tk_speedy_calculate_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_machine_sort'])) {
			$data['shipping_tk_speedy_machine_sort'] = $this->request->post['shipping_tk_speedy_machine_sort'];
		} else if ($this->config->get('shipping_tk_speedy_machine_sort')) {
			$data['shipping_tk_speedy_machine_sort'] = $this->config->get('shipping_tk_speedy_machine_sort');
		} else {
			$data['shipping_tk_speedy_machine_sort'] = 1;
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_sort'])) {
			$data['shipping_tk_speedy_office_sort'] = $this->request->post['shipping_tk_speedy_office_sort'];
		} else if ($this->config->get('shipping_tk_speedy_office_sort')) {
			$data['shipping_tk_speedy_office_sort'] = $this->config->get('shipping_tk_speedy_office_sort');
		} else {
			$data['shipping_tk_speedy_office_sort'] = 2;
		}
		
		if (isset($this->request->post['shipping_tk_speedy_address_sort'])) {
			$data['shipping_tk_speedy_address_sort'] = $this->request->post['shipping_tk_speedy_address_sort'];
		} else if ($this->config->get('shipping_tk_speedy_address_sort')) {
			$data['shipping_tk_speedy_address_sort'] = $this->config->get('shipping_tk_speedy_address_sort');
		} else {
			$data['shipping_tk_speedy_address_sort'] = 3;
		}
		
		if (isset($this->request->post['shipping_tk_speedy_machine_weight'])) {
			$data['shipping_tk_speedy_machine_weight'] = $this->request->post['shipping_tk_speedy_machine_weight'];
		} else if ($this->config->get('shipping_tk_speedy_machine_weight')) {
			$data['shipping_tk_speedy_machine_weight'] = $this->config->get('shipping_tk_speedy_machine_weight');
		} else {
			$data['shipping_tk_speedy_machine_weight'] = 50;
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_weight'])) {
			$data['shipping_tk_speedy_office_weight'] = $this->request->post['shipping_tk_speedy_office_weight'];
		} else if ($this->config->get('shipping_tk_speedy_office_weight')) {
			$data['shipping_tk_speedy_office_weight'] = $this->config->get('shipping_tk_speedy_office_weight');
		} else {
			$data['shipping_tk_speedy_office_weight'] = 150;
		}
		
		if (isset($this->request->post['shipping_tk_speedy_address_weight'])) {
			$data['shipping_tk_speedy_address_weight'] = $this->request->post['shipping_tk_speedy_address_weight'];
		} else if ($this->config->get('shipping_tk_speedy_address_weight')) {
			$data['shipping_tk_speedy_address_weight'] = $this->config->get('shipping_tk_speedy_address_weight');
		} else {
			$data['shipping_tk_speedy_address_weight'] = 150;
		}
		
		if (isset($this->request->post['shipping_tk_speedy_calculator_fixed'])) {
			$data['shipping_tk_speedy_calculator_fixed'] = $this->request->post['shipping_tk_speedy_calculator_fixed'];
		} else {
			$data['shipping_tk_speedy_calculator_fixed'] = $this->config->get('shipping_tk_speedy_calculator_fixed');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_ppp_min'])) {
			$data['shipping_tk_speedy_ppp_min'] = $this->request->post['shipping_tk_speedy_ppp_min'];
		} else {
			$data['shipping_tk_speedy_ppp_min'] = $this->config->get('shipping_tk_speedy_ppp_min');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_ppp_tax'])) {
			$data['shipping_tk_speedy_ppp_tax'] = $this->request->post['shipping_tk_speedy_ppp_tax'];
		} else {
			$data['shipping_tk_speedy_ppp_tax'] = $this->config->get('shipping_tk_speedy_ppp_tax');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_weight_total'])) {
			$data['shipping_tk_speedy_weight_total'] = $this->request->post['shipping_tk_speedy_weight_total'];
		} else {
			$data['shipping_tk_speedy_weight_total'] = $this->config->get('shipping_tk_speedy_weight_total');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_weight_type'])) {
			$data['shipping_tk_speedy_weight_type'] = $this->request->post['shipping_tk_speedy_weight_type'];
		} else {
			$data['shipping_tk_speedy_weight_type'] = $this->config->get('shipping_tk_speedy_weight_type');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_machine_fixed_cost'])) {
			$data['shipping_tk_speedy_machine_fixed_cost'] = $this->request->post['shipping_tk_speedy_machine_fixed_cost'];
		} else {
			$data['shipping_tk_speedy_machine_fixed_cost'] = $this->config->get('shipping_tk_speedy_machine_fixed_cost');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_fixed_cost'])) {
			$data['shipping_tk_speedy_office_fixed_cost'] = $this->request->post['shipping_tk_speedy_office_fixed_cost'];
		} else {
			$data['shipping_tk_speedy_office_fixed_cost'] = $this->config->get('shipping_tk_speedy_office_fixed_cost');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_door_fixed_cost'])) {
			$data['shipping_tk_speedy_door_fixed_cost'] = $this->request->post['shipping_tk_speedy_door_fixed_cost'];
		} else {
			$data['shipping_tk_speedy_door_fixed_cost'] = $this->config->get('shipping_tk_speedy_door_fixed_cost');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_np_enabled'])) {
			$data['shipping_tk_speedy_np_enabled'] = $this->request->post['shipping_tk_speedy_np_enabled'];
		} else {
			$data['shipping_tk_speedy_np_enabled'] = $this->config->get('shipping_tk_speedy_np_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_os_enabled'])) {
			$data['shipping_tk_speedy_os_enabled'] = $this->request->post['shipping_tk_speedy_os_enabled'];
		} else {
			$data['shipping_tk_speedy_os_enabled'] = $this->config->get('shipping_tk_speedy_os_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_fragile_enabled'])) {
			$data['shipping_tk_speedy_fragile_enabled'] = $this->request->post['shipping_tk_speedy_fragile_enabled'];
		} else {
			$data['shipping_tk_speedy_fragile_enabled'] = $this->config->get('shipping_tk_speedy_fragile_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_ppp_enabled'])) {
			$data['shipping_tk_speedy_ppp_enabled'] = $this->request->post['shipping_tk_speedy_ppp_enabled'];
		} else {
			$data['shipping_tk_speedy_ppp_enabled'] = $this->config->get('shipping_tk_speedy_ppp_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_client_id'])) {
			$data['shipping_tk_speedy_client_id'] = $this->request->post['shipping_tk_speedy_client_id'];
		} else {
			$data['shipping_tk_speedy_client_id'] = $this->config->get('shipping_tk_speedy_client_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_order_status_id'])) {
			$data['shipping_tk_speedy_order_status_id'] = $this->request->post['shipping_tk_speedy_order_status_id'];
		} else {
			$data['shipping_tk_speedy_order_status_id'] = $this->config->get('shipping_tk_speedy_order_status_id');
		}
		if (isset($this->request->post['shipping_tk_speedy_name'])) {
			$data['shipping_tk_speedy_name'] = $this->request->post['shipping_tk_speedy_name'];
		} else {
			$data['shipping_tk_speedy_name'] = $this->config->get('shipping_tk_speedy_name');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_telephone'])) {
			$data['shipping_tk_speedy_telephone'] = $this->request->post['shipping_tk_speedy_telephone'];
		} else {
			$data['shipping_tk_speedy_telephone'] = $this->config->get('shipping_tk_speedy_telephone');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_back_documents'])) {
			$data['shipping_tk_speedy_back_documents'] = $this->request->post['shipping_tk_speedy_back_documents'];
		} else {
			$data['shipping_tk_speedy_back_documents'] = $this->config->get('shipping_tk_speedy_back_documents');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_back_receipt'])) {
			$data['shipping_tk_speedy_back_receipt'] = $this->request->post['shipping_tk_speedy_back_receipt'];
		} else {
			$data['shipping_tk_speedy_back_receipt'] = $this->config->get('shipping_tk_speedy_back_receipt');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_packing'])) {
			$data['shipping_tk_speedy_packing'] = $this->request->post['shipping_tk_speedy_packing'];
		} else {
			$data['shipping_tk_speedy_packing'] = $this->config->get('shipping_tk_speedy_packing');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_option_before_payment'])) {
			$data['shipping_tk_speedy_option_before_payment'] = $this->request->post['shipping_tk_speedy_option_before_payment'];
		} else {
			$data['shipping_tk_speedy_option_before_payment'] = $this->config->get('shipping_tk_speedy_option_before_payment');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_return_payer_type'])) {
			$data['shipping_tk_speedy_return_payer_type'] = $this->request->post['shipping_tk_speedy_return_payer_type'];
		} else {
			$data['shipping_tk_speedy_return_payer_type'] = $this->config->get('shipping_tk_speedy_return_payer_type');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_payer_type'])) {
			$data['shipping_tk_speedy_payer_type'] = $this->request->post['shipping_tk_speedy_payer_type'];
		} else {
			$data['shipping_tk_speedy_payer_type'] = $this->config->get('shipping_tk_speedy_payer_type');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_return_package_city_service_id'])) {
			$data['shipping_tk_speedy_return_package_city_service_id'] = $this->request->post['shipping_tk_speedy_return_package_city_service_id'];
		} else {
			$data['shipping_tk_speedy_return_package_city_service_id'] = $this->config->get('shipping_tk_speedy_return_package_city_service_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_return_package_intercity_service_id'])) {
			$data['shipping_tk_speedy_return_package_intercity_service_id'] = $this->request->post['shipping_tk_speedy_return_package_intercity_service_id'];
		} else {
			$data['shipping_tk_speedy_return_package_intercity_service_id'] = $this->config->get('shipping_tk_speedy_return_package_intercity_service_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_shipment_description'])) {
			$data['shipping_tk_speedy_shipment_description'] = $this->request->post['shipping_tk_speedy_shipment_description'];
		} else {
			$data['shipping_tk_speedy_shipment_description'] = $this->config->get('shipping_tk_speedy_shipment_description');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_shipment_product_name'])) {
			$data['shipping_tk_speedy_shipment_product_name'] = $this->request->post['shipping_tk_speedy_shipment_product_name'];
		} else {
			$data['shipping_tk_speedy_shipment_product_name'] = $this->config->get('shipping_tk_speedy_shipment_product_name');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_label_printer'])) {
			$data['shipping_tk_speedy_label_printer'] = $this->request->post['shipping_tk_speedy_label_printer'];
		} else {
			$data['shipping_tk_speedy_label_printer'] = $this->config->get('shipping_tk_speedy_label_printer');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_from_office'])) {
			$data['shipping_tk_speedy_from_office'] = $this->request->post['shipping_tk_speedy_from_office'];
		} else {
			$data['shipping_tk_speedy_from_office'] = $this->config->get('shipping_tk_speedy_from_office');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_office_id'])) {
			$data['shipping_tk_speedy_office_id'] = $this->request->post['shipping_tk_speedy_office_id'];
		} else {
			$data['shipping_tk_speedy_office_id'] = $this->config->get('shipping_tk_speedy_office_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_allowed_methods'])) {
			$data['shipping_tk_speedy_allowed_methods'] = $this->request->post['shipping_tk_speedy_allowed_methods'];
		} elseif ($this->config->get('shipping_tk_speedy_allowed_methods')) {
			$data['shipping_tk_speedy_allowed_methods'] = $this->config->get('shipping_tk_speedy_allowed_methods');
		} else {
			$data['shipping_tk_speedy_allowed_methods'] = array();
		}
		
		if (isset($this->request->post['shipping_tk_speedy_special_delivery_requirement_id'])) {
			$data['shipping_tk_speedy_special_delivery_requirement_id'] = $this->request->post['shipping_tk_speedy_special_delivery_requirement_id'];
		} else {
			$data['shipping_tk_speedy_special_delivery_requirement_id'] = $this->config->get('shipping_tk_speedy_special_delivery_requirement_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_administrative_fee'])) {
			$data['shipping_tk_speedy_administrative_fee'] = $this->request->post['shipping_tk_speedy_administrative_fee'];
		} else {
			$data['shipping_tk_speedy_administrative_fee'] = $this->config->get('shipping_tk_speedy_administrative_fee');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_discount_contract_id'])) {
			$data['shipping_tk_speedy_discount_contract_id'] = $this->request->post['shipping_tk_speedy_discount_contract_id'];
		} else {
			$data['shipping_tk_speedy_discount_contract_id'] = $this->config->get('shipping_tk_speedy_discount_contract_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_discount_card_id'])) {
			$data['shipping_tk_speedy_discount_card_id'] = $this->request->post['shipping_tk_speedy_discount_card_id'];
		} else {
			$data['shipping_tk_speedy_discount_card_id'] = $this->config->get('shipping_tk_speedy_discount_card_id');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_text'])) {
			$data['shipping_tk_speedy_text'] = $this->request->post['shipping_tk_speedy_text'];
		} else {
			$data['shipping_tk_speedy_text'] = $this->config->get('shipping_tk_speedy_text');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_company'])) {
			$data['shipping_tk_speedy_company'] = $this->request->post['shipping_tk_speedy_company'];
		} else {
			$data['shipping_tk_speedy_company'] = $this->config->get('shipping_tk_speedy_company');
		}
		
		if (isset($this->request->post['shipping_tk_speedy_totals'])) {
			$data['shipping_tk_speedy_totals'] = $this->request->post['shipping_tk_speedy_totals'];
		} else if ($this->config->get('shipping_tk_speedy_totals')) {
			$data['shipping_tk_speedy_totals'] = $this->config->get('shipping_tk_speedy_totals');
			
			if (!isset($data['shipping_tk_speedy_totals'])) {
				$data['shipping_tk_speedy_totals'] = array();
			}
		} else {
			$data['shipping_tk_speedy_totals'] = array();
		}
		
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
		
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		$data['clients'] = $this->model_extension_shipping_tk_speedy->getListContractClients();
		
		if (isset($data['shipping_tk_speedy_client_id']) && $data['shipping_tk_speedy_client_id']) {
			$data['services'] = $this->model_extension_shipping_tk_speedy->getServices($this->language->get('code'), $data['shipping_tk_speedy_client_id']);
		} else {
			$clients = array_values($data['clients']);
			if (isset($clients[0]['clientId'])) {
				$data['services'] = $this->model_extension_shipping_tk_speedy->getServices($this->language->get('code'), $clients[0]['clientId']);
			}
		}
		
		$data['offices'] = $this->model_extension_shipping_tk_speedy->getOffices(NULL, NULL, $this->language->get('code'));
		
		$data['pricings'] = array(
			'calculator'       => $this->language->get('text_calculator'),
			'calculator_fixed' => $this->language->get('text_calculator_fixed'),
			'fixed'            => $this->language->get('text_fixed_price'),
			'free'             => $this->language->get('text_free_shipping'),
			'table_rate'       => $this->language->get('text_table_rate'),
		);
		
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
		
		$data['package_dimentions'] = array(
			'XS' => 'XS',
			'S'  => 'S',
			'M'  => 'M',
			'L'  => 'L',
			'XL' => 'XL',
		);
		
		$this->load->model('localisation/currency');
		$data['currencies'] = $this->model_localisation_currency->getCurrencies();
		
		$this->load->model('localisation/weight_class');
		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();
		
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if ($this->config->get('shipping_tk_speedy_logged')) {
			$data['cities'] = $this->model_extension_shipping_tk_speedy->getCitiesWithOffices();
		} else {
			$data['cities'] = array();
		}
		
		if (isset($this->request->post['shipping_tk_speedy_tax_class_id'])) {
			$data['shipping_tk_speedy_tax_class_id'] = $this->request->post['shipping_tk_speedy_tax_class_id'];
		} else {
			$data['shipping_tk_speedy_tax_class_id'] = $this->config->get('shipping_tk_speedy_tax_class_id');
		}
		
		$this->load->model('localisation/tax_class');
		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$this->load->model('customer/custom_field');
		$data['custom_fields'] = $this->model_customer_custom_field->getCustomFields();
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$data['shipping_tk_speedy_logged'] = $this->config->get('shipping_tk_speedy_logged');
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$this->response->setOutput($this->load->view('extension/shipping/tk_speedy', $data));
	}
	
	public function install() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_speedy');
		
		$data['shipping_tk_speedy_oc'] = 1;
		$this->model_setting_setting->editSetting('shipping_tk_speedy', $data);
	}
	
	public function uninstall() {
		
		$this->load->model('extension/shipping/tk_speedy');
		
		$this->model_extension_shipping_tk_speedy->deleteTables();
	}
	
	public function login() {
		
		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_speedy');
		$this->load->language('extension/shipping/tk_speedy');
		
		$results_data = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			if (!empty($this->request->post['username']) && !empty($this->request->post['password'])) {
				
				$contractData = array(
					'userName' => $this->request->post['username'],
					'password' => $this->request->post['password'],
					'language' => 'BG'
				);
				
				$contractResponse = $this->model_extension_shipping_tk_speedy->serviceJSON('client/contract/', $contractData);
				$contractResponse = json_decode($contractResponse, true);
				
				if (isset($contractResponse['error']['message'])) {
					$results_data['message'] = $contractResponse['error']['message'] . ' ' . $contractResponse['error']['context'];
				} elseif (isset($contractResponse['clients'])) {
					
					$this->model_extension_shipping_tk_speedy->createTables($this->config->get('module_tk_checkout_token'));
					
					$data = $this->model_setting_setting->getSetting('shipping_tk_speedy');
					
					$data['shipping_tk_speedy_logged'] = true;
					$data['shipping_tk_speedy_test'] = $this->request->post['test'];
					$data['shipping_tk_speedy_username'] = $this->request->post['username'];
					$data['shipping_tk_speedy_password'] = $this->request->post['password'];
					$data['shipping_tk_speedy_domain'] = $_SERVER['HTTP_HOST'];
					
					$this->model_setting_setting->editSetting('shipping_tk_speedy', $data);
					
					$results_data['success'] = true;
				} else {
					
					$results_data['message'] = $this->language->get('error_general');
				}
			} else {
				$results_data['message'] = $this->language->get('error_username_password');
			}
		} else {
			$results_data['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($results_data));
	}
	
	public function logout() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_speedy');
		$data['shipping_tk_speedy_logged'] = false;
		$data['shipping_tk_speedy_status'] = 0;
		$this->model_setting_setting->editSetting('shipping_tk_speedy', $data);
	}
	
	public function update() {

		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->language->load('extension/shipping/tk_speedy');
		
		$results_data = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			$this->load->model('extension/shipping/tk_speedy');
			
			if ($this->config->get('shipping_tk_speedy_logged')) {
				$this->model_extension_shipping_tk_speedy->addColumns();
			}
			
			$result = $this->model_extension_shipping_tk_speedy->updateOffices();
			if ($result) {
				$results_data['success'] = $this->language->get('text_success_update');
			}
		} else {
			$results_data['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($results_data));
	}
	
	private function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_speedy')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
		if (!$this->request->post['shipping_tk_speedy_name']) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
		if (!$this->request->post['shipping_tk_speedy_telephone']) {
			$this->error['telephone'] = $this->language->get('error_telephone');
		}
		
		if (!$this->request->post['shipping_tk_speedy_client_id']) {
			$this->error['client_id'] = $this->language->get('error_client_id');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
	protected function settings($token = false) {
		
		$this->load->model('extension/shipping/tk_speedy');
		
		if (isset($token)) {
			$settings = $this->model_extension_shipping_tk_speedy->settings($token);
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
