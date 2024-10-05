<?php

class ControllerExtensionShippingTkBoxnow extends Controller {

	private $error = array();

	public function index() {
		
		$this->load->language('extension/shipping/tk_boxnow');
		$this->load->model('extension/shipping/tk_boxnow');
		$this->load->model('sale/order');
		$this->load->model('setting/setting');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->model_extension_shipping_tk_boxnow->createTables($this->config->get('module_tk_checkout_token'));

		$data = $this->model_setting_setting->getSetting('shipping_tk_boxnow');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
				
				if (!empty($this->request->post['shipping_tk_boxnow_weight_value'])) {
					$weight_values = $this->request->post['shipping_tk_boxnow_weight_value'];

					$this->request->post['shipping_tk_boxnow_weight_value'] = array();
					foreach ($weight_values as $weight_value) {
						if (!$weight_value['price']) {
							$weight_value['price'] = 0;
						}

						$this->request->post['shipping_tk_boxnow_weight_value'][] = array(
							'from' => number_format(str_replace(',', '.', (float)$weight_value['from']), 2, '.', ''),
							'to' => number_format(str_replace(',', '.', (float)$weight_value['to']), 2, '.', ''),
							'price' => number_format(str_replace(',', '.', (float)$weight_value['price']), 2, '.', '')
						);
					}
				} else {
					$this->request->post['shipping_tk_boxnow_weight_value'] = array();
				}
				
				if (empty($this->request->post['shipping_tk_boxnow_categories'])) {
					$this->request->post['shipping_tk_boxnow_categories'] = array();
				}
				
				if (empty($this->request->post['shipping_tk_boxnow_totals'])) {
					$this->request->post['shipping_tk_boxnow_totals'] = array();
				}
				
				$this->request->post += $data;

				$this->model_setting_setting->editSetting('shipping_tk_boxnow', $this->request->post);

				$this->session->data['success'] = $this->language->get('text_success');

				$this->response->redirect($this->url->link('extension/shipping/tk_boxnow', 'user_token=' . $this->session->data['user_token'], true));
			}
		}

		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['root_system'] = DIR_SYSTEM;
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		
		$data['heading_title_report'] = $this->language->get('heading_title_report');
		$data['heading_help'] = $this->language->get('heading_help');
		$data['text_extension'] = $this->language->get('text_extension');
		$data['text_success'] = $this->language->get('text_success');
		$data['entry_cost'] = $this->language->get('entry_cost');
		$data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$data['entry_payment_modules'] = $this->language->get('entry_payment_modules');
		$data['help_payment_modules'] = $this->language->get('help_payment_modules');
		$data['entry_partner_id'] = $this->language->get('entry_partner_id');
		$data['entry_free_shipping'] = $this->language->get('entry_free_shipping');
		$data['entry_api_url'] = $this->language->get('entry_api_url');
		$data['entry_client_id'] = $this->language->get('entry_client_id');
		$data['entry_client_secret'] = $this->language->get('entry_client_secret');
		$data['entry_warehouse_number'] = $this->language->get('entry_warehouse_number');
		$data['column_box_now_status'] = $this->language->get('column_box_now_status');
		$data['column_order_status'] = $this->language->get('column_order_status');
		$data['column_vouchers'] = $this->language->get('column_vouchers');
		$data['column_info'] = $this->language->get('column_info');
		$data['column_locker_id'] = $this->language->get('column_locker_id');
		$data['column_total_products'] = $this->language->get('column_total_products');
		$data['text_voucher_send_instructioms'] = $this->language->get('text_voucher_send_instructioms');
		$data['text_voucher_success'] = $this->language->get('text_voucher_success');
		$data['text_voucher_notfound'] = $this->language->get('text_voucher_notfound');
		$data['text_voucher_pending'] = $this->language->get('text_voucher_pending');
		$data['text_voucher_send'] = $this->language->get('text_voucher_send');
		$data['text_voucher_status_success'] = $this->language->get('text_voucher_status_success');
		$data['status_message_error'] = $this->language->get('status_message_error');
		$data['error_permission'] = $this->language->get('error_permission');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['entry_no'] = $this->language->get('entry_no');
		$data['entry_yes'] = $this->language->get('entry_yes');
		
		$data['text_statuses'] = $this->language->get('text_status_boxnow');

		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
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
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/shipping/tk_boxnow', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/shipping/tk_boxnow', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);

		if ($this->config->get('module_tk_checkout_token')) {
			$data['module_tk_checkout_token'] = $this->config->get('module_tk_checkout_token');
		} else {
			$data['module_tk_checkout_token'] = false;
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_tax_class_id'])) {
			$data['shipping_tk_boxnow_tax_class_id'] = $this->request->post['shipping_tk_boxnow_tax_class_id'];
		} else {
			$data['shipping_tk_boxnow_tax_class_id'] = $this->config->get('shipping_tk_boxnow_tax_class_id');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_api_url'])) {
			$data['shipping_tk_boxnow_api_url'] = $this->request->post['shipping_tk_boxnow_api_url'];
		} else {
			$data['shipping_tk_boxnow_api_url'] = $this->config->get('shipping_tk_boxnow_api_url');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_widget_url'])) {
			$data['shipping_tk_boxnow_widget_url'] = $this->request->post['shipping_tk_boxnow_widget_url'];
		} else if ($this->config->get('shipping_tk_boxnow_widget_url')) {
			$data['shipping_tk_boxnow_widget_url'] = $this->config->get('shipping_tk_boxnow_widget_url');
		} else {
			$data['shipping_tk_boxnow_widget_url'] = 'https://widget-cdn.boxnow.bg/map-widget/client/v5.js';
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_client_id'])) {
			$data['shipping_tk_boxnow_client_id'] = $this->request->post['shipping_tk_boxnow_client_id'];
		} else {
			$data['shipping_tk_boxnow_client_id'] = $this->config->get('shipping_tk_boxnow_client_id');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_client_secret'])) {
			$data['shipping_tk_boxnow_client_secret'] = $this->request->post['shipping_tk_boxnow_client_secret'];
		} else {
			$data['shipping_tk_boxnow_client_secret'] = $this->config->get('shipping_tk_boxnow_client_secret');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_warehouse_number'])) {
			$data['shipping_tk_boxnow_warehouse_number'] = $this->request->post['shipping_tk_boxnow_warehouse_number'];
		} else {
			$data['shipping_tk_boxnow_warehouse_number'] = $this->config->get('shipping_tk_boxnow_warehouse_number');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_partner_id'])) {
			$data['shipping_tk_boxnow_partner_id'] = $this->request->post['shipping_tk_boxnow_partner_id'];
		} else {
			$data['shipping_tk_boxnow_partner_id'] = $this->config->get('shipping_tk_boxnow_partner_id');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_geo_zone_id'])) {
			$data['shipping_tk_boxnow_geo_zone_id'] = $this->request->post['shipping_tk_boxnow_geo_zone_id'];
		} else {
			$data['shipping_tk_boxnow_geo_zone_id'] = $this->config->get('shipping_tk_boxnow_geo_zone_id');
		}

		if (isset($this->request->post['shipping_tk_boxnow_status'])) {
			$data['shipping_tk_boxnow_status'] = $this->request->post['shipping_tk_boxnow_status'];
		} else {
			$data['shipping_tk_boxnow_status'] = $this->config->get('shipping_tk_boxnow_status');
		}

		if (isset($this->request->post['shipping_tk_boxnow_sort_order'])) {
			$data['shipping_tk_boxnow_sort_order'] = $this->request->post['shipping_tk_boxnow_sort_order'];
		} else {
			$data['shipping_tk_boxnow_sort_order'] = $this->config->get('shipping_tk_boxnow_sort_order');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_cod'])) {
			$data['shipping_tk_boxnow_cod'] = $this->request->post['shipping_tk_boxnow_cod'];
		} else {
			$data['shipping_tk_boxnow_cod'] = $this->config->get('shipping_tk_boxnow_cod');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_address'])) {
			$data['shipping_tk_boxnow_address'] = $this->request->post['shipping_tk_boxnow_address'];
		} else {
			$data['shipping_tk_boxnow_address'] = $this->config->get('shipping_tk_boxnow_address');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_weight_type'])) {
			$data['shipping_tk_boxnow_weight_type'] = $this->request->post['shipping_tk_boxnow_weight_type'];
		} else {
			$data['shipping_tk_boxnow_weight_type'] = $this->config->get('shipping_tk_boxnow_weight_type');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_default_weight'])) {
			$data['shipping_tk_boxnow_default_weight'] = $this->request->post['shipping_tk_boxnow_default_weight'];
		} else {
			$data['shipping_tk_boxnow_default_weight'] = $this->config->get('shipping_tk_boxnow_default_weight');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_cost'])) {
			$data['shipping_tk_boxnow_cost'] = $this->request->post['shipping_tk_boxnow_cost'];
		} else {
			$data['shipping_tk_boxnow_cost'] = $this->config->get('shipping_tk_boxnow_cost');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_free_shipping'])) {
			$data['shipping_tk_boxnow_free_shipping'] = $this->request->post['shipping_tk_boxnow_free_shipping'];
		} else {
			$data['shipping_tk_boxnow_free_shipping'] = $this->config->get('shipping_tk_boxnow_free_shipping');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_free_weight'])) {
			$data['shipping_tk_boxnow_free_weight'] = $this->request->post['shipping_tk_boxnow_free_weight'];
		} else {
			$data['shipping_tk_boxnow_free_weight'] = $this->config->get('shipping_tk_boxnow_free_weight');
		}
		
		$data['shipping_tk_boxnow_weight_value'] = array();
		if (isset($this->request->post['shipping_tk_boxnow_weight_value'])) {
			$data['shipping_tk_boxnow_weight_value'] = $this->request->post['shipping_tk_boxnow_weight_value'];
		} else {
			$weight_values = $this->config->get('shipping_tk_boxnow_weight_value');
			
			if (isset($weight_values)) {
				foreach ($weight_values as $weight_value) {
					$data['shipping_tk_boxnow_weight_value'][] = array(
						'from' => number_format($weight_value['from'], 2, '.', ''),
						'to' => number_format($weight_value['to'], 2, '.', ''),
						'price' => number_format($weight_value['price'], 2, '.', '')
					);
				}
			}
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_order_status'])) {
			$data['shipping_tk_boxnow_order_status'] = $this->request->post['shipping_tk_boxnow_order_status'];
		} else {
			$data['shipping_tk_boxnow_order_status'] = $this->config->get('shipping_tk_boxnow_order_status');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_order_status_mail'])) {
			$data['shipping_tk_boxnow_order_status_mail'] = $this->request->post['shipping_tk_boxnow_order_status_mail'];
		} else {
			$data['shipping_tk_boxnow_order_status_mail'] = $this->config->get('shipping_tk_boxnow_order_status_mail');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_order_status_mail_text'])) {
			$data['shipping_tk_boxnow_order_status_mail_text'] = $this->request->post['shipping_tk_boxnow_order_status_mail_text'];
		} else {
			$data['shipping_tk_boxnow_order_status_mail_text'] = $this->config->get('shipping_tk_boxnow_order_status_mail_text');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_order_status_id_mail_text'])) {
			$data['shipping_tk_boxnow_order_status_id_mail_text'] = $this->request->post['shipping_tk_boxnow_order_status_id_mail_text'];
		} else {
			$data['shipping_tk_boxnow_order_status_id_mail_text'] = $this->config->get('shipping_tk_boxnow_order_status_id_mail_text');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_order_status_id_mail'])) {
			$data['shipping_tk_boxnow_order_status_id_mail'] = $this->request->post['shipping_tk_boxnow_order_status_id_mail'];
		} else {
			$data['shipping_tk_boxnow_order_status_id_mail'] = $this->config->get('shipping_tk_boxnow_order_status_id_mail');
		}

		if (isset($this->request->post['shipping_tk_boxnow_weight'])) {
			$data['shipping_tk_boxnow_weight'] = $this->request->post['shipping_tk_boxnow_weight'];
		} else {
			$data['shipping_tk_boxnow_weight'] = $this->config->get('shipping_tk_boxnow_weight');
		}
		
		if (isset($this->request->post['shipping_tk_boxnow_totals'])) {
			$data['shipping_tk_boxnow_totals'] = $this->request->post['shipping_tk_boxnow_totals'];
		} else if ($this->config->get('shipping_tk_boxnow_totals')) {
			$data['shipping_tk_boxnow_totals'] = $this->config->get('shipping_tk_boxnow_totals');
			
			if (!isset($data['shipping_tk_boxnow_totals'])) {
				$data['shipping_tk_boxnow_totals'] = array();
			}
		} else {
			$data['shipping_tk_boxnow_totals'] = array();
		}

		if (isset($this->request->post['shipping_tk_boxnow_categories'])) {
			$data['shipping_tk_boxnow_categories'] = $this->request->post['shipping_tk_boxnow_categories'];
		} else if ($this->config->get('shipping_tk_boxnow_categories')) {
			$data['shipping_tk_boxnow_categories'] = $this->config->get('shipping_tk_boxnow_categories');

			if (!isset($data['shipping_tk_boxnow_categories'])) {
				$data['shipping_tk_boxnow_categories'] = array();
			}
		} else {
			$data['shipping_tk_boxnow_categories'] = array();
		}

		$filter_data = array(
			'sort' => 'name',
			'order' => 'ASC'
		);
		$this->load->model('catalog/category');
		$data['oc_categories'] = $this->model_catalog_category->getCategories($filter_data);
		
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
		
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$this->load->model('customer/custom_field');
		$data['custom_fields'] = $this->model_customer_custom_field->getCustomFields();
		
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		$this->load->model('localisation/tax_class');
		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/shipping/tk_boxnow', $data));
	}

	public function install() {

		if ($this->config->get('module_tk_checkout_token')) {
			$this->load->model('setting/setting');
			$data = $this->model_setting_setting->getSetting('shipping_tk_boxnow');
			$data['shipping_tk_boxnow_oc'] = 1;
			$this->model_setting_setting->editSetting('shipping_tk_boxnow', $data);
		}
	}

	public function uninstall() {

		$this->load->model('extension/shipping/tk_boxnow');

		$this->model_extension_shipping_tk_boxnow->deleteTables();
	}

	protected function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_boxnow')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	
	protected function settings($token = false) {
		
		$this->load->model('extension/shipping/tk_boxnow');
		
		if (isset($token)) {
			$settings = $this->model_extension_shipping_tk_boxnow->settings($token);
		} else {
			$settings['error'] = "Невалиден API Token";
		}
		
		if (isset($settings['error'])) {
			$this->error['warning'] = $settings['error'];
		}
		
		return !$this->error;
	}
}