<?php

class ControllerExtensionShippingTkEcont extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->language->load('extension/shipping/tk_econt');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_econt');
		
		$dataConfig = $this->model_setting_setting->getSetting('shipping_tk_econt');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
				
				if (!empty($this->request->post['shipping_tk_econt_weight_value'])) {
					$weight_values = $this->request->post['shipping_tk_econt_weight_value'];
					
					$this->request->post['shipping_tk_econt_weight_value'] = array();
					foreach ($weight_values as $weight_value) {
						if (!$weight_value['price']) {
							$weight_value['price'] = 0;
						}
						
						$this->request->post['shipping_tk_econt_weight_value'][] = array(
							'from'  => number_format(str_replace(',', '.', (float)$weight_value['from']), 2, '.', ''),
							'to'    => number_format(str_replace(',', '.', (float)$weight_value['to']), 2, '.', ''),
							'price' => number_format(str_replace(',', '.', (float)$weight_value['price']), 2, '.', ''),
							'type'  => $weight_value['type']
						);
					}
				} else {
					$this->request->post['shipping_tk_econt_weight_value'] = array();
				}
				
				if (!empty($this->request->post['shipping_tk_econt_percent_value'])) {
					$percent_values = $this->request->post['shipping_tk_econt_percent_value'];
					
					$this->request->post['shipping_tk_econt_percent_value'] = array();
					
					foreach ($percent_values as $percent_value) {
						if ($percent_value['percent']) {
							$this->request->post['shipping_tk_econt_percent_value'][] = array(
								'from'    => number_format(str_replace(',', '.', (float)$percent_value['from']), 2),
								'to'      => number_format(str_replace(',', '.', (float)$percent_value['to']), 2),
								'percent' => number_format(str_replace(',', '', $percent_value['percent'])),
								'type'    => $percent_value['type']
							);
						}
					}
				} else {
					$this->request->post['shipping_tk_econt_percent_value'] = array();
				}
				
				$this->model_setting_setting->editSetting('shipping_tk_econt', $this->request->post + $dataConfig);
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/shipping/tk_econt', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['root_system'] = DIR_SYSTEM;
		
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['cron_office'] = $this->language->get('cron_office');
		$data['cron_shipment'] = $this->language->get('cron_shipment');
		$data['entry_machine_fixed_cost'] = $this->language->get('entry_machine_fixed_cost');
		
		$data['entry_office_enabled'] = $this->language->get('entry_office_enabled');
		$data['entry_address_enabled'] = $this->language->get('entry_address_enabled');
		
		$data['text_shipping'] = $this->language->get('text_shipping');
		$data['text_success'] = $this->language->get('text_success');
		$data['text_success_update'] = $this->language->get('text_success_update');
		$data['text_get_data_info'] = $this->language->get('text_get_data_info');
		$data['text_warning_logout'] = $this->language->get('text_warning_logout');
		$data['text_real_environment'] = $this->language->get('text_real_environment');
		$data['text_demo_environment'] = $this->language->get('text_demo_environment');
		$data['text_environment_info'] = $this->language->get('text_environment_info');
		$data['text_sync_info_warning'] = $this->language->get('text_sync_info_warning');
		$data['text_shipment_description'] = $this->language->get('text_shipment_description');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
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
		$data['entry_currency'] = $this->language->get('entry_currency');
		$data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_button_logout'] = $this->language->get('entry_button_logout');
		$data['entry_office_total'] = $this->language->get('entry_office_total');
		$data['entry_door_total'] = $this->language->get('entry_door_total');
		$data['entry_office_cost'] = $this->language->get('entry_office_cost');
		$data['entry_machine_cost'] = $this->language->get('entry_machine_cost');
		$data['entry_door_cost'] = $this->language->get('entry_door_cost');
		$data['entry_machine_enabled'] = $this->language->get('entry_machine_enabled');
		$data['entry_calculate_enabled'] = $this->language->get('entry_calculate_enabled');
		$data['entry_price_settings'] = $this->language->get('entry_price_settings');
		$data['entry_office_fixed_cost'] = $this->language->get('entry_office_fixed_cost');
		$data['entry_door_fixed_cost'] = $this->language->get('entry_door_fixed_cost');
		$data['entry_weight_total'] = $this->language->get('entry_weight_total');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_username'] = $this->language->get('entry_username');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['button_login'] = $this->language->get('button_login');
		$data['error_permission'] = $this->language->get('error_permission');
		$data['error_general'] = $this->language->get('error_general');
		$data['error_username_password'] = $this->language->get('error_username_password');
		$data['error_connect'] = $this->language->get('error_connect');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
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
		
		$data['text_delivery_settings'] = $this->language->get('text_delivery_settings');
		$data['text_delivery_code'] = $this->language->get('text_delivery_code');
		$data['entry_auto_label'] = $this->language->get('entry_auto_label');
		$data['entry_auto_price_settings'] = $this->language->get('entry_auto_price_settings');
		
		$data['text_tab_price'] = $this->language->get('text_tab_price');
		$data['text_tab_status'] = $this->language->get('text_tab_status');
		$data['text_statuses'] = $this->language->get('text_status_econt');
		$data['entry_yes'] = $this->language->get('entry_yes');
		$data['entry_no'] = $this->language->get('entry_no');
		
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
			'href' => $this->url->link('extension/shipping/tk_econt', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data['action'] = $this->url->link('extension/shipping/tk_econt', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);
		
		$data['clients'] = $this->config->get('shipping_tk_econt_clients');
		
		$data['cd_agreement'] = array();
		if ($this->config->get('shipping_tk_econt_username') && $this->config->get('shipping_tk_econt_password')) {
			
			$dataAccess = array(
				'type'     => 'access_clients',
				'test'     => $this->config->get('shipping_tk_econt_test'),
				'username' => $this->config->get('shipping_tk_econt_username'),
				'password' => $this->config->get('shipping_tk_econt_password')
			);
			
			$results_access = $this->model_extension_shipping_tk_econt->serviceXML($dataAccess);
			if ($results_access->clients) {
				foreach ($results_access->clients as $clients) {
					foreach ($clients->client as $client) {
						foreach ($client->cd_agreements as $cd_agreements) {
							foreach ($cd_agreements->cd_agreement as $cd_agreement) {
								if ($cd_agreement->num) {
									$data['cd_agreement'][] = (string)$cd_agreement->num;
								}
							}
						}
					}
				}
			}
		}
		
		if (isset($this->request->post['shipping_tk_econt_cd_agreement'])) {
			$data['shipping_tk_econt_cd_agreement'] = $this->request->post['shipping_tk_econt_cd_agreement'];
		} else {
			$data['shipping_tk_econt_cd_agreement'] = $this->config->get('shipping_tk_econt_cd_agreement');
		}
		
		if (isset($this->request->post['shipping_tk_econt_profile_id'])) {
			$data['shipping_tk_econt_profile_id'] = $this->request->post['shipping_tk_econt_profile_id'];
		} else {
			$data['shipping_tk_econt_profile_id'] = $this->config->get('shipping_tk_econt_profile_id');
		}
		
		if (isset($this->request->post['shipping_tk_econt_company_name'])) {
			$data['shipping_tk_econt_company_name'] = $this->request->post['shipping_tk_econt_company_name'];
		} else {
			$data['shipping_tk_econt_company_name'] = $this->config->get('shipping_tk_econt_company_name');
		}
		
		if (isset($this->request->post['shipping_tk_econt_company'])) {
			$data['shipping_tk_econt_company'] = $this->request->post['shipping_tk_econt_company'];
		} else {
			$data['shipping_tk_econt_company'] = $this->config->get('shipping_tk_econt_company');
		}
		
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
		
		if (isset($this->request->post['shipping_tk_econt_payment_receiver_method'])) {
			$data['shipping_tk_econt_payment_receiver_method'] = $this->request->post['shipping_tk_econt_payment_receiver_method'];
		} else {
			$data['shipping_tk_econt_payment_receiver_method'] = $this->config->get('shipping_tk_econt_payment_receiver_method');
		}
		
		if (isset($this->request->post['shipping_tk_econt_order_status'])) {
			$data['shipping_tk_econt_order_status'] = $this->request->post['shipping_tk_econt_order_status'];
		} else {
			$data['shipping_tk_econt_order_status'] = $this->config->get('shipping_tk_econt_order_status');
		}
		
		if (isset($this->request->post['shipping_tk_econt_order_status_mail'])) {
			$data['shipping_tk_econt_order_status_mail'] = $this->request->post['shipping_tk_econt_order_status_mail'];
		} else {
			$data['shipping_tk_econt_order_status_mail'] = $this->config->get('shipping_tk_econt_order_status_mail');
		}
		
		if (isset($this->request->post['shipping_tk_econt_order_status_mail_text'])) {
			$data['shipping_tk_econt_order_status_mail_text'] = $this->request->post['shipping_tk_econt_order_status_mail_text'];
		} else {
			$data['shipping_tk_econt_order_status_mail_text'] = $this->config->get('shipping_tk_econt_order_status_mail_text');
		}
		
		if (isset($this->request->post['shipping_tk_econt_order_status_id_mail_text'])) {
			$data['shipping_tk_econt_order_status_id_mail_text'] = $this->request->post['shipping_tk_econt_order_status_id_mail_text'];
		} else {
			$data['shipping_tk_econt_order_status_id_mail_text'] = $this->config->get('shipping_tk_econt_order_status_id_mail_text');
		}
		
		if (isset($this->request->post['shipping_tk_econt_order_status_id_mail'])) {
			$data['shipping_tk_econt_order_status_id_mail'] = $this->request->post['shipping_tk_econt_order_status_id_mail'];
		} else {
			$data['shipping_tk_econt_order_status_id_mail'] = $this->config->get('shipping_tk_econt_order_status_id_mail');
		}
		
		if (isset($this->request->post['shipping_tk_econt_test'])) {
			$data['shipping_tk_econt_test'] = $this->request->post['shipping_tk_econt_test'];
		} else {
			$data['shipping_tk_econt_test'] = $this->config->get('shipping_tk_econt_test');
		}
		
		if (isset($this->request->post['shipping_tk_econt_username'])) {
			$data['shipping_tk_econt_username'] = $this->request->post['shipping_tk_econt_username'];
		} else {
			$data['shipping_tk_econt_username'] = $this->config->get('shipping_tk_econt_username');
		}
		
		if (isset($this->request->post['shipping_tk_econt_password'])) {
			$data['shipping_tk_econt_password'] = $this->request->post['shipping_tk_econt_password'];
		} else {
			$data['shipping_tk_econt_password'] = $this->config->get('shipping_tk_econt_password');
		}
		
		if (isset($this->request->post['shipping_tk_econt_status'])) {
			$data['shipping_tk_econt_status'] = $this->request->post['shipping_tk_econt_status'];
		} else {
			$data['shipping_tk_econt_status'] = $this->config->get('shipping_tk_econt_status');
		}
		
		if (isset($this->request->post['shipping_tk_econt_geo_zone_id'])) {
			$data['shipping_tk_econt_geo_zone_id'] = $this->request->post['shipping_tk_econt_geo_zone_id'];
		} else {
			$data['shipping_tk_econt_geo_zone_id'] = $this->config->get('shipping_tk_econt_geo_zone_id');
		}
		
		if (isset($this->request->post['shipping_tk_econt_order_status_id'])) {
			$data['shipping_tk_econt_order_status_id'] = $this->request->post['shipping_tk_econt_order_status_id'];
		} else {
			$data['shipping_tk_econt_order_status_id'] = $this->config->get('shipping_tk_econt_order_status_id');
		}
		
		if (isset($this->request->post['shipping_tk_econt_sort_order'])) {
			$data['shipping_tk_econt_sort_order'] = $this->request->post['shipping_tk_econt_sort_order'];
		} else {
			$data['shipping_tk_econt_sort_order'] = $this->config->get('shipping_tk_econt_sort_order');
		}
		
		if (isset($this->request->post['shipping_tk_econt_store_kay'])) {
			$data['shipping_tk_econt_store_kay'] = $this->request->post['shipping_tk_econt_store_kay'];
		} else {
			$data['shipping_tk_econt_store_kay'] = $this->config->get('shipping_tk_econt_store_kay');
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_total'])) {
			$data['shipping_tk_econt_office_total'] = $this->request->post['shipping_tk_econt_office_total'];
		} else {
			$data['shipping_tk_econt_office_total'] = $this->config->get('shipping_tk_econt_office_total');
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_free'])) {
			$data['shipping_tk_econt_office_free'] = $this->request->post['shipping_tk_econt_office_free'];
		} else {
			$data['shipping_tk_econt_office_free'] = $this->config->get('shipping_tk_econt_office_free');
		}
		
		if (isset($this->request->post['shipping_tk_econt_machine_free'])) {
			$data['shipping_tk_econt_machine_free'] = $this->request->post['shipping_tk_econt_machine_free'];
		} else {
			$data['shipping_tk_econt_machine_free'] = $this->config->get('shipping_tk_econt_machine_free');
		}
		
		if (isset($this->request->post['shipping_tk_econt_door_free'])) {
			$data['shipping_tk_econt_door_free'] = $this->request->post['shipping_tk_econt_door_free'];
		} else {
			$data['shipping_tk_econt_door_free'] = $this->config->get('shipping_tk_econt_door_free');
		}
		
		if (isset($this->request->post['shipping_tk_econt_bank_fee'])) {
			$data['shipping_tk_econt_bank_fee'] = $this->request->post['shipping_tk_econt_bank_fee'];
		} else {
			$data['shipping_tk_econt_bank_fee'] = $this->config->get('shipping_tk_econt_bank_fee');
		}
		
		if (isset($this->request->post['shipping_tk_econt_cod_sum'])) {
			$data['shipping_tk_econt_cod_sum'] = $this->request->post['shipping_tk_econt_cod_sum'];
		} else if ($this->config->get('shipping_tk_econt_cod_sum')) {
			$data['shipping_tk_econt_cod_sum'] = $this->config->get('shipping_tk_econt_cod_sum');
		} else {
			$data['shipping_tk_econt_cod_sum'] = 1;
		}
		
		if (isset($this->request->post['shipping_tk_econt_shipping_in'])) {
			$data['shipping_tk_econt_shipping_in'] = $this->request->post['shipping_tk_econt_shipping_in'];
		} else {
			$data['shipping_tk_econt_shipping_in'] = $this->config->get('shipping_tk_econt_shipping_in');
		}
		
		if (isset($this->request->post['shipping_tk_econt_machine_free_weight'])) {
			$data['shipping_tk_econt_machine_free_weight'] = $this->request->post['shipping_tk_econt_machine_free_weight'];
		} else {
			$data['shipping_tk_econt_machine_free_weight'] = $this->config->get('shipping_tk_econt_machine_free_weight');
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_free_weight'])) {
			$data['shipping_tk_econt_office_free_weight'] = $this->request->post['shipping_tk_econt_office_free_weight'];
		} else {
			$data['shipping_tk_econt_office_free_weight'] = $this->config->get('shipping_tk_econt_office_free_weight');
		}
		
		if (isset($this->request->post['shipping_tk_econt_door_free_weight'])) {
			$data['shipping_tk_econt_door_free_weight'] = $this->request->post['shipping_tk_econt_door_free_weight'];
		} else {
			$data['shipping_tk_econt_door_free_weight'] = $this->config->get('shipping_tk_econt_door_free_weight');
		}
		
		if (isset($this->request->post['shipping_tk_econt_door_total'])) {
			$data['shipping_tk_econt_door_total'] = $this->request->post['shipping_tk_econt_door_total'];
		} else {
			$data['shipping_tk_econt_door_total'] = $this->config->get('shipping_tk_econt_door_total');
		}
		
		if (isset($this->request->post['shipping_tk_econt_machine_enabled'])) {
			$data['shipping_tk_econt_machine_enabled'] = $this->request->post['shipping_tk_econt_machine_enabled'];
		} else {
			$data['shipping_tk_econt_machine_enabled'] = $this->config->get('shipping_tk_econt_machine_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_enabled'])) {
			$data['shipping_tk_econt_office_enabled'] = $this->request->post['shipping_tk_econt_office_enabled'];
		} else {
			$data['shipping_tk_econt_office_enabled'] = $this->config->get('shipping_tk_econt_office_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_address_enabled'])) {
			$data['shipping_tk_econt_address_enabled'] = $this->request->post['shipping_tk_econt_address_enabled'];
		} else {
			$data['shipping_tk_econt_address_enabled'] = $this->config->get('shipping_tk_econt_address_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_machine_sort'])) {
			$data['shipping_tk_econt_machine_sort'] = $this->request->post['shipping_tk_econt_machine_sort'];
		} else if ($this->config->get('shipping_tk_econt_machine_sort')) {
			$data['shipping_tk_econt_machine_sort'] = $this->config->get('shipping_tk_econt_machine_sort');
		} else {
			$data['shipping_tk_econt_machine_sort'] = 1;
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_sort'])) {
			$data['shipping_tk_econt_office_sort'] = $this->request->post['shipping_tk_econt_office_sort'];
		} else if ($this->config->get('shipping_tk_econt_office_sort')) {
			$data['shipping_tk_econt_office_sort'] = $this->config->get('shipping_tk_econt_office_sort');
		} else {
			$data['shipping_tk_econt_office_sort'] = 2;
		}
		
		if (isset($this->request->post['shipping_tk_econt_address_sort'])) {
			$data['shipping_tk_econt_address_sort'] = $this->request->post['shipping_tk_econt_address_sort'];
		} else if ($this->config->get('shipping_tk_econt_address_sort')) {
			$data['shipping_tk_econt_address_sort'] = $this->config->get('shipping_tk_econt_address_sort');
		} else {
			$data['shipping_tk_econt_address_sort'] = 3;
		}
		
		if (isset($this->request->post['shipping_tk_econt_machine_weight'])) {
			$data['shipping_tk_econt_machine_weight'] = $this->request->post['shipping_tk_econt_machine_weight'];
		} else if ($this->config->get('shipping_tk_econt_machine_weight')) {
			$data['shipping_tk_econt_machine_weight'] = $this->config->get('shipping_tk_econt_machine_weight');
		} else {
			$data['shipping_tk_econt_machine_weight'] = 50;
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_weight'])) {
			$data['shipping_tk_econt_office_weight'] = $this->request->post['shipping_tk_econt_office_weight'];
		} else if ($this->config->get('shipping_tk_econt_office_weight')) {
			$data['shipping_tk_econt_office_weight'] = $this->config->get('shipping_tk_econt_office_weight');
		} else {
			$data['shipping_tk_econt_office_weight'] = 150;
		}
		
		if (isset($this->request->post['shipping_tk_econt_address_weight'])) {
			$data['shipping_tk_econt_address_weight'] = $this->request->post['shipping_tk_econt_address_weight'];
		} else if ($this->config->get('shipping_tk_econt_address_weight')) {
			$data['shipping_tk_econt_address_weight'] = $this->config->get('shipping_tk_econt_address_weight');
		} else {
			$data['shipping_tk_econt_address_weight'] = 150;
		}
		
		if (isset($this->request->post['shipping_tk_econt_auto_label'])) {
			$data['shipping_tk_econt_auto_label'] = $this->request->post['shipping_tk_econt_auto_label'];
		} else {
			$data['shipping_tk_econt_auto_label'] = $this->config->get('shipping_tk_econt_auto_label');
		}
		
		if (isset($this->request->post['shipping_tk_econt_calculate_enabled'])) {
			$data['shipping_tk_econt_calculate_enabled'] = $this->request->post['shipping_tk_econt_calculate_enabled'];
		} else {
			$data['shipping_tk_econt_calculate_enabled'] = $this->config->get('shipping_tk_econt_calculate_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_weight_total'])) {
			$data['shipping_tk_econt_weight_total'] = $this->request->post['shipping_tk_econt_weight_total'];
		} else {
			$data['shipping_tk_econt_weight_total'] = $this->config->get('shipping_tk_econt_weight_total');
		}
		
		if (isset($this->request->post['shipping_tk_econt_weight_type'])) {
			$data['shipping_tk_econt_weight_type'] = $this->request->post['shipping_tk_econt_weight_type'];
		} else {
			$data['shipping_tk_econt_weight_type'] = $this->config->get('shipping_tk_econt_weight_type');
		}
		
		if (isset($this->request->post['shipping_tk_econt_shipment_description'])) {
			$data['shipping_tk_econt_shipment_description'] = $this->request->post['shipping_tk_econt_shipment_description'];
		} else {
			$data['shipping_tk_econt_shipment_description'] = $this->config->get('shipping_tk_econt_shipment_description');
		}
		
		if (isset($this->request->post['shipping_tk_econt_shipment_product_name'])) {
			$data['shipping_tk_econt_shipment_product_name'] = $this->request->post['shipping_tk_econt_shipment_product_name'];
		} else {
			$data['shipping_tk_econt_shipment_product_name'] = $this->config->get('shipping_tk_econt_shipment_product_name');
		}
		
		if (isset($this->request->post['shipping_tk_econt_shipment_opis'])) {
			$data['shipping_tk_econt_shipment_opis'] = $this->request->post['shipping_tk_econt_shipment_opis'];
		} else {
			$data['shipping_tk_econt_shipment_opis'] = $this->config->get('shipping_tk_econt_shipment_opis');
		}
		
		if (isset($this->request->post['shipping_tk_econt_machine_fixed_cost'])) {
			$data['shipping_tk_econt_machine_fixed_cost'] = $this->request->post['shipping_tk_econt_machine_fixed_cost'];
		} else {
			$data['shipping_tk_econt_machine_fixed_cost'] = $this->config->get('shipping_tk_econt_machine_fixed_cost');
		}
		
		if (isset($this->request->post['shipping_tk_econt_office_fixed_cost'])) {
			$data['shipping_tk_econt_office_fixed_cost'] = $this->request->post['shipping_tk_econt_office_fixed_cost'];
		} else {
			$data['shipping_tk_econt_office_fixed_cost'] = $this->config->get('shipping_tk_econt_office_fixed_cost');
		}
		
		if (isset($this->request->post['shipping_tk_econt_door_fixed_cost'])) {
			$data['shipping_tk_econt_door_fixed_cost'] = $this->request->post['shipping_tk_econt_door_fixed_cost'];
		} else {
			$data['shipping_tk_econt_door_fixed_cost'] = $this->config->get('shipping_tk_econt_door_fixed_cost');
		}
		
		if (isset($this->request->post['shipping_tk_econt_discount'])) {
			$data['shipping_tk_econt_discount'] = $this->request->post['shipping_tk_econt_discount'];
		} else {
			$data['shipping_tk_econt_discount'] = $this->config->get('shipping_tk_econt_discount');
		}
		
		if (isset($this->request->post['shipping_tk_econt_np_enabled'])) {
			$data['shipping_tk_econt_np_enabled'] = $this->request->post['shipping_tk_econt_np_enabled'];
		} else {
			$data['shipping_tk_econt_np_enabled'] = $this->config->get('shipping_tk_econt_np_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_os_enabled'])) {
			$data['shipping_tk_econt_os_enabled'] = $this->request->post['shipping_tk_econt_os_enabled'];
		} else {
			$data['shipping_tk_econt_os_enabled'] = $this->config->get('shipping_tk_econt_os_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_os_price'])) {
			$data['shipping_tk_econt_os_price'] = $this->request->post['shipping_tk_econt_os_price'];
		} else if ($this->config->get('shipping_tk_econt_os_price')) {
			$data['shipping_tk_econt_os_price'] = $this->config->get('shipping_tk_econt_os_price');
		} else {
			$data['shipping_tk_econt_os_price'] = 0;
		}
		
		if (isset($this->request->post['shipping_tk_econt_sms_enabled'])) {
			$data['shipping_tk_econt_sms_enabled'] = $this->request->post['shipping_tk_econt_sms_enabled'];
		} else {
			$data['shipping_tk_econt_sms_enabled'] = $this->config->get('shipping_tk_econt_sms_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_dc_enabled'])) {
			$data['shipping_tk_econt_dc_enabled'] = $this->request->post['shipping_tk_econt_dc_enabled'];
		} else {
			$data['shipping_tk_econt_dc_enabled'] = $this->config->get('shipping_tk_econt_dc_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_get_door_enabled'])) {
			$data['shipping_tk_econt_get_door_enabled'] = $this->request->post['shipping_tk_econt_get_door_enabled'];
		} else {
			$data['shipping_tk_econt_get_door_enabled'] = $this->config->get('shipping_tk_econt_get_door_enabled');
		}
		
		if (isset($this->request->post['shipping_tk_econt_text'])) {
			$data['shipping_tk_econt_text'] = $this->request->post['shipping_tk_econt_text'];
		} else {
			$data['shipping_tk_econt_text'] = $this->config->get('shipping_tk_econt_text');
		}
		
		if (isset($this->request->post['shipping_tk_econt_weight_value'])) {
			$data['shipping_tk_econt_weight_value'] = $this->request->post['shipping_tk_econt_weight_value'];
		} else {
			$weight_values = $this->config->get('shipping_tk_econt_weight_value');
			
			$data['shipping_tk_econt_weight_value'] = array();
			if (isset($weight_values)) {
				foreach ($weight_values as $weight_value) {
					$data['shipping_tk_econt_weight_value'][] = array(
						'from'  => number_format($weight_value['from'], 2, '.', ''),
						'to'    => number_format($weight_value['to'], 2, '.', ''),
						'price' => number_format($weight_value['price'], 2, '.', ''),
						'type'  => $weight_value['type']
					);
				}
			}
		}
		
		if (isset($this->request->post['shipping_tk_econt_totals'])) {
			$data['shipping_tk_econt_totals'] = $this->request->post['shipping_tk_econt_totals'];
		} else if ($this->config->get('shipping_tk_econt_totals')) {
			$data['shipping_tk_econt_totals'] = $this->config->get('shipping_tk_econt_totals');
			
			if (!isset($data['shipping_tk_econt_totals'])) {
				$data['shipping_tk_econt_totals'] = array();
			}
		} else {
			$data['shipping_tk_econt_totals'] = array();
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
		
		if (isset($this->request->post['shipping_tk_econt_percent_value'])) {
			$data['shipping_tk_econt_percent_value'] = $this->request->post['shipping_tk_econt_percent_value'];
		} else {
			$percent_values = $this->config->get('shipping_tk_econt_percent_value');
			
			$data['shipping_tk_econt_percent_value'] = array();
			if (isset($percent_values)) {
				foreach ($percent_values as $percent_value) {
					if ($percent_value['percent']) {
						$data['shipping_tk_econt_percent_value'][] = array(
							'from'    => number_format(str_replace(',', '', $percent_value['from']), 2),
							'to'      => number_format(str_replace(',', '', $percent_value['to']), 2),
							'percent' => number_format(str_replace(',', '', $percent_value['percent'])),
							'type'    => $percent_value['type']
						);
					}
				}
			}
		}
		
		$this->load->model('localisation/currency');
		$data['currencies'] = $this->model_localisation_currency->getCurrencies();
		
		$this->load->model('localisation/weight_class');
		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();
		
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if ($this->config->get('shipping_tk_econt_logged')) {
			$data['cities'] = $this->model_extension_shipping_tk_econt->getCities();
		} else {
			$data['cities'] = array();
		}
		
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$this->load->model('customer/custom_field');
		$data['custom_fields'] = $this->model_customer_custom_field->getCustomFields();
		
		// избор на мултистор
		$this->load->model('setting/store');
		$data['stores'] = array();
		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);
		$stores = $this->model_setting_store->getStores();
		foreach ($stores as $store) {
			$data['stores'][] = array(
				'store_id' => $store['store_id'],
				'name'     => $store['name']
			);
		}
		
		if (isset($this->request->post['shipping_tk_econt_tax_class_id'])) {
			$data['shipping_tk_econt_tax_class_id'] = $this->request->post['shipping_tk_econt_tax_class_id'];
		} else {
			$data['shipping_tk_econt_tax_class_id'] = $this->config->get('shipping_tk_econt_tax_class_id');
		}
		
		$this->load->model('localisation/tax_class');
		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$data['shipping_tk_econt_logged'] = $this->config->get('shipping_tk_econt_logged');
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$this->response->setOutput($this->load->view('extension/shipping/tk_econt', $data));
	}
	
	public function install() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_econt');
		$data['shipping_tk_econt_oc'] = 1;
		$this->model_setting_setting->editSetting('shipping_tk_econt', $data);
	}
	
	public function uninstall() {
		
		$this->load->model('extension/shipping/tk_econt');
		$this->model_extension_shipping_tk_econt->deleteTables();
	}
	
	public function login() {
		
		$this->load->language('extension/shipping/tk_econt');
		
		$results_data = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			$this->load->model('setting/setting');
			$this->load->model('extension/shipping/tk_econt');
			
			if (!empty($this->request->post['username']) && !empty($this->request->post['password'])) {
				
				$dataService = array(
					'type'     => 'profile',
					'test'     => $this->request->post['test'],
					'username' => $this->request->post['username'],
					'password' => $this->request->post['password']
				);
				
				$results = $this->model_extension_shipping_tk_econt->serviceXML($dataService);
				
				if (isset($results->error)) {
					$results_data['message'] = (string)$results->error->message;
				} else if (isset($results->client_info->id)) {
					
					$this->model_extension_shipping_tk_econt->createTables($this->config->get('module_tk_checkout_token'));
					
					$data = $this->model_setting_setting->getSetting('shipping_tk_econt');
					
					$data['shipping_tk_econt_logged'] = true;
					$data['shipping_tk_econt_test'] = $this->request->post['test'];
					$data['shipping_tk_econt_username'] = $this->request->post['username'];
					$data['shipping_tk_econt_password'] = $this->request->post['password'];
					$data['shipping_tk_econt_domain'] = $_SERVER['HTTP_HOST'];
					
					$data['shipping_tk_econt_company_name'] = $results->client_info->name;
					
					$dataAccess = array(
						'type'     => 'access_clients',
						'test'     => $this->request->post['test'],
						'username' => $this->request->post['username'],
						'password' => $this->request->post['password']
					);
					
					$results_access = $this->model_extension_shipping_tk_econt->serviceXML($dataAccess);
					
					if ($results_access && !isset($results_access->error) && isset($results_access->clients)) {
						$clients = array();
						foreach ($results_access->clients->client as $client) {
							$clients[(string)$client->id] = array(
								'id'      => (string)$client->id,
								'ein'     => (string)$client->ein,
								'name'    => (string)$client->name,
								'name_en' => (string)$client->name_en
							);
						}
						
						$data['shipping_tk_econt_clients'] = $clients;
					}
					
					$this->model_setting_setting->editSetting('shipping_tk_econt', $data);
					$this->model_extension_shipping_tk_econt->updateUser($dataService);
					
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
		$data = $this->model_setting_setting->getSetting('shipping_tk_econt');
		$data['shipping_tk_econt_logged'] = false;
		$data['shipping_tk_econt_test'] = 0;
		$data['shipping_tk_econt_status'] = 0;
		$this->model_setting_setting->editSetting('shipping_tk_econt', $data);
	}
	
	public function update() {
		
		@ini_set('memory_limit', '512M');
		@ini_set('max_execution_time', 3600);
		
		$this->language->load('extension/shipping/tk_econt');
		
		$results_data = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			$this->load->model('extension/shipping/tk_econt');
			
			if ($this->config->get('shipping_tk_econt_logged')) {
				$this->model_extension_shipping_tk_econt->addColumns();
			}
			
			$result = $this->model_extension_shipping_tk_econt->updateOffices();
			if ($result) {
				$results_data['success'] = $this->language->get('text_success_update');
			}
		} else {
			$results_data['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($results_data));
	}
	
	private function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_econt')) {
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
		
		$this->load->model('extension/shipping/tk_econt');
		
		if (isset($token)) {
			$settings = $this->model_extension_shipping_tk_econt->settings($token);
		} else {
			$settings['error'] = "Невалиден API Token";
		}
		
		if (isset($settings['error'])) {
			$this->error['warning'] = $settings['error'];
		}
		
		return !$this->error;
	}
	
}