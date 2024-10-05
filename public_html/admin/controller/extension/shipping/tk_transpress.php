<?php

class ControllerExtensionShippingTkTranspress extends Controller {

	private $error = array();

	public function index() {
		
		$this->load->language('extension/shipping/tk_transpress');
		$this->load->model('extension/shipping/tk_transpress');
		$this->load->model('sale/order');
		$this->load->model('setting/setting');
		$this->load->library('tktranspress');
		
		if (!isset($this->tktranspress)) {
			$this->tktranspress = new Tktranspress($this->registry);
		}

		$this->document->setTitle($this->language->get('heading_title'));
		
		$data = $this->model_setting_setting->getSetting('shipping_tk_transpress');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
				if (!empty($this->request->post['shipping_tk_transpress_weight_value'])) {
					$weight_values = $this->request->post['shipping_tk_transpress_weight_value'];

					$this->request->post['shipping_tk_transpress_weight_value'] = array();
					foreach ($weight_values as $weight_value) {
						if (!$weight_value['price']) {
							$weight_value['price'] = 0;
						}

						$this->request->post['shipping_tk_transpress_weight_value'][] = array(
							'from' => number_format(str_replace(',', '.', (float)$weight_value['from']), 2, '.', ''),
							'to' => number_format(str_replace(',', '.', (float)$weight_value['to']), 2, '.', ''),
							'price' => number_format(str_replace(',', '.', (float)$weight_value['price']), 2, '.', ''),
							'type' => $weight_value['type']
						);
					}
				} else {
					$this->request->post['shipping_tk_transpress_weight_value'] = array();
				}
				
				$this->request->post += $data;

				$this->model_setting_setting->editSetting('shipping_tk_transpress', $this->request->post);

				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/shipping/tk_transpress', 'user_token=' . $this->session->data['user_token'], true));
			}
		}

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$data = $this->request->post + $data;
		}
		
		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['root_system'] = DIR_SYSTEM;
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		
		if ($this->config->get('module_tk_checkout_token')) {
			$data['module_tk_checkout_token'] = $this->config->get('module_tk_checkout_token');
		} else {
			$data['module_tk_checkout_token'] = false;
		}
		
		if (isset($this->request->post['shipping_tk_transpress_logged'])) {
			$data['shipping_tk_transpress_logged'] = $this->config->get('shipping_tk_transpress_logged');
		} else if ($this->config->get('shipping_tk_transpress_logged')) {
			$data['shipping_tk_transpress_logged'] = $this->config->get('shipping_tk_transpress_logged');
		} else {
			$data['shipping_tk_transpress_logged'] = false;
		}
		
		if (isset($this->request->post['shipping_tk_transpress_client'])) {
			$data['shipping_tk_transpress_client'] = $this->config->get('shipping_tk_transpress_client');
		} else if ($this->config->get('shipping_tk_transpress_client')) {
			$data['shipping_tk_transpress_client'] = $this->config->get('shipping_tk_transpress_client');
		} else {
			$data['shipping_tk_transpress_client'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_password'])) {
			$data['shipping_tk_transpress_password'] = $this->config->get('shipping_tk_transpress_password');
		} else if ($this->config->get('shipping_tk_transpress_password')) {
			$data['shipping_tk_transpress_password'] = $this->config->get('shipping_tk_transpress_password');
		} else {
			$data['shipping_tk_transpress_password'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_sort_order'])) {
			$data['shipping_tk_transpress_sort_order'] = $this->config->get('shipping_tk_transpress_sort_order');
		} else if ($this->config->get('shipping_tk_transpress_sort_order')) {
			$data['shipping_tk_transpress_sort_order'] = $this->config->get('shipping_tk_transpress_sort_order');
		} else {
			$data['shipping_tk_transpress_sort_order'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_geo_zone_id'])) {
			$data['shipping_tk_transpress_geo_zone_id'] = $this->config->get('shipping_tk_transpress_geo_zone_id');
		} else if ($this->config->get('shipping_tk_transpress_geo_zone_id')) {
			$data['shipping_tk_transpress_geo_zone_id'] = $this->config->get('shipping_tk_transpress_geo_zone_id');
		} else {
			$data['shipping_tk_transpress_geo_zone_id'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_status'])) {
			$data['shipping_tk_transpress_status'] = $this->config->get('shipping_tk_transpress_status');
		} else if ($this->config->get('shipping_tk_transpress_status')) {
			$data['shipping_tk_transpress_status'] = $this->config->get('shipping_tk_transpress_status');
		} else {
			$data['shipping_tk_transpress_status'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_sender_type'])) {
			$data['shipping_tk_transpress_sender_type'] = $this->config->get('shipping_tk_transpress_sender_type');
		} else if ($this->config->get('shipping_tk_transpress_sender_type')) {
			$data['shipping_tk_transpress_sender_type'] = $this->config->get('shipping_tk_transpress_sender_type');
		} else {
			$data['shipping_tk_transpress_sender_type'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_shop_address'])) {
			$data['shipping_tk_transpress_shop_address'] = $this->config->get('shipping_tk_transpress_shop_address');
		} else if ($this->config->get('shipping_tk_transpress_shop_address')) {
			$data['shipping_tk_transpress_shop_address'] = $this->config->get('shipping_tk_transpress_shop_address');
		} else {
			$data['shipping_tk_transpress_shop_address'] = array();
		}
		
		if (isset($this->request->post['shipping_tk_transpress_shipment_description'])) {
			$data['shipping_tk_transpress_shipment_description'] = $this->config->get('shipping_tk_transpress_shipment_description');
		} else if ($this->config->get('shipping_tk_transpress_shipment_description')) {
			$data['shipping_tk_transpress_shipment_description'] = $this->config->get('shipping_tk_transpress_shipment_description');
		} else {
			$data['shipping_tk_transpress_shipment_description'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_weight_type'])) {
			$data['shipping_tk_transpress_weight_type'] = $this->config->get('shipping_tk_transpress_weight_type');
		} else if ($this->config->get('shipping_tk_transpress_weight_type')) {
			$data['shipping_tk_transpress_weight_type'] = $this->config->get('shipping_tk_transpress_weight_type');
		} else {
			$data['shipping_tk_transpress_weight_type'] = 'kilogram';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_print_format'])) {
			$data['shipping_tk_transpress_print_format'] = $this->config->get('shipping_tk_transpress_print_format');
		} else if ($this->config->get('shipping_tk_transpress_print_format')) {
			$data['shipping_tk_transpress_print_format'] = $this->config->get('shipping_tk_transpress_print_format');
		} else {
			$data['shipping_tk_transpress_print_format'] = 'pdf';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_allowed_services'])) {
			$data['shipping_tk_transpress_allowed_services'] = $this->config->get('shipping_tk_transpress_allowed_services');
		} else if ($this->config->get('shipping_tk_transpress_allowed_services')) {
			$data['shipping_tk_transpress_allowed_services'] = $this->config->get('shipping_tk_transpress_allowed_services');
		} else {
			$data['shipping_tk_transpress_allowed_services'] = 'EXPRESS_18';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_shipment_product_name'])) {
			$data['shipping_tk_transpress_shipment_product_name'] = $this->config->get('shipping_tk_transpress_shipment_product_name');
		} else if ($this->config->get('shipping_tk_transpress_shipment_product_name')) {
			$data['shipping_tk_transpress_shipment_product_name'] = $this->config->get('shipping_tk_transpress_shipment_product_name');
		} else {
			$data['shipping_tk_transpress_shipment_product_name'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_default_weight'])) {
			$data['shipping_tk_transpress_default_weight'] = $this->config->get('shipping_tk_transpress_default_weight');
		} else if ($this->config->get('shipping_tk_transpress_default_weight')) {
			$data['shipping_tk_transpress_default_weight'] = $this->config->get('shipping_tk_transpress_default_weight');
		} else {
			$data['shipping_tk_transpress_default_weight'] = 1;
		}
		
		if (isset($this->request->post['shipping_tk_transpress_pd'])) {
			$data['shipping_tk_transpress_pd'] = $this->config->get('shipping_tk_transpress_pd');
		} else if ($this->config->get('shipping_tk_transpress_pd')) {
			$data['shipping_tk_transpress_pd'] = $this->config->get('shipping_tk_transpress_pd');
		} else {
			$data['shipping_tk_transpress_pd'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_rr'])) {
			$data['shipping_tk_transpress_rr'] = $this->config->get('shipping_tk_transpress_rr');
		} else if ($this->config->get('shipping_tk_transpress_rr')) {
			$data['shipping_tk_transpress_rr'] = $this->config->get('shipping_tk_transpress_rr');
		} else {
			$data['shipping_tk_transpress_rr'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_pr'])) {
			$data['shipping_tk_transpress_pr'] = $this->config->get('shipping_tk_transpress_pr');
		} else if ($this->config->get('shipping_tk_transpress_pr')) {
			$data['shipping_tk_transpress_pr'] = $this->config->get('shipping_tk_transpress_pr');
		} else {
			$data['shipping_tk_transpress_pr'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_cd'])) {
			$data['shipping_tk_transpress_cd'] = $this->config->get('shipping_tk_transpress_cd');
		} else if ($this->config->get('shipping_tk_transpress_cd')) {
			$data['shipping_tk_transpress_cd'] = $this->config->get('shipping_tk_transpress_cd');
		} else {
			$data['shipping_tk_transpress_cd'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_calculate_enabled'])) {
			$data['shipping_tk_transpress_calculate_enabled'] = $this->config->get('shipping_tk_transpress_calculate_enabled');
		} else if ($this->config->get('shipping_tk_transpress_calculate_enabled')) {
			$data['shipping_tk_transpress_calculate_enabled'] = $this->config->get('shipping_tk_transpress_calculate_enabled');
		} else {
			$data['shipping_tk_transpress_calculate_enabled'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_postal_money_transfer'])) {
			$data['shipping_tk_transpress_postal_money_transfer'] = $this->config->get('shipping_tk_transpress_postal_money_transfer');
		} else if ($this->config->get('shipping_tk_transpress_postal_money_transfer')) {
			$data['shipping_tk_transpress_postal_money_transfer'] = $this->config->get('shipping_tk_transpress_postal_money_transfer');
		} else {
			$data['shipping_tk_transpress_postal_money_transfer'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_shipping_in'])) {
			$data['shipping_tk_transpress_shipping_in'] = $this->config->get('shipping_tk_transpress_shipping_in');
		} else if ($this->config->get('shipping_tk_transpress_shipping_in')) {
			$data['shipping_tk_transpress_shipping_in'] = $this->config->get('shipping_tk_transpress_shipping_in');
		} else {
			$data['shipping_tk_transpress_shipping_in'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_fixed_price_urban_amount'])) {
			$data['shipping_tk_transpress_fixed_price_urban_amount'] = $this->config->get('shipping_tk_transpress_fixed_price_urban_amount');
		} else if ($this->config->get('shipping_tk_transpress_fixed_price_urban_amount')) {
			$data['shipping_tk_transpress_fixed_price_urban_amount'] = $this->config->get('shipping_tk_transpress_fixed_price_urban_amount');
		} else {
			$data['shipping_tk_transpress_fixed_price_urban_amount'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_fixed_price_interurban_amount'])) {
			$data['shipping_tk_transpress_fixed_price_interurban_amount'] = $this->config->get('shipping_tk_transpress_fixed_price_interurban_amount');
		} else if ($this->config->get('shipping_tk_transpress_fixed_price_interurban_amount')) {
			$data['shipping_tk_transpress_fixed_price_interurban_amount'] = $this->config->get('shipping_tk_transpress_fixed_price_interurban_amount');
		} else {
			$data['shipping_tk_transpress_fixed_price_interurban_amount'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_urban_free'])) {
			$data['shipping_tk_transpress_urban_free'] = $this->config->get('shipping_tk_transpress_urban_free');
		} else if ($this->config->get('shipping_tk_transpress_urban_free')) {
			$data['shipping_tk_transpress_urban_free'] = $this->config->get('shipping_tk_transpress_urban_free');
		} else {
			$data['shipping_tk_transpress_urban_free'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_urban_free_weight'])) {
			$data['shipping_tk_transpress_urban_free_weight'] = $this->config->get('shipping_tk_transpress_urban_free_weight');
		} else if ($this->config->get('shipping_tk_transpress_urban_free_weight')) {
			$data['shipping_tk_transpress_urban_free_weight'] = $this->config->get('shipping_tk_transpress_urban_free_weight');
		} else {
			$data['shipping_tk_transpress_urban_free_weight'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_interurban_free'])) {
			$data['shipping_tk_transpress_interurban_free'] = $this->config->get('shipping_tk_transpress_interurban_free');
		} else if ($this->config->get('shipping_tk_transpress_interurban_free')) {
			$data['shipping_tk_transpress_interurban_free'] = $this->config->get('shipping_tk_transpress_interurban_free');
		} else {
			$data['shipping_tk_transpress_interurban_free'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_interurban_free_weight'])) {
			$data['shipping_tk_transpress_interurban_free_weight'] = $this->config->get('shipping_tk_transpress_interurban_free_weight');
		} else if ($this->config->get('shipping_tk_transpress_interurban_free_weight')) {
			$data['shipping_tk_transpress_interurban_free_weight'] = $this->config->get('shipping_tk_transpress_interurban_free_weight');
		} else {
			$data['shipping_tk_transpress_interurban_free_weight'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_review_before_payment'])) {
			$data['shipping_tk_transpress_review_before_payment'] = $this->config->get('shipping_tk_transpress_review_before_payment');
		} else if ($this->config->get('shipping_tk_transpress_review_before_payment')) {
			$data['shipping_tk_transpress_review_before_payment'] = $this->config->get('shipping_tk_transpress_review_before_payment');
		} else {
			$data['shipping_tk_transpress_review_before_payment'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_test_before_payment'])) {
			$data['shipping_tk_transpress_test_before_payment'] = $this->config->get('shipping_tk_transpress_test_before_payment');
		} else if ($this->config->get('shipping_tk_transpress_test_before_payment')) {
			$data['shipping_tk_transpress_test_before_payment'] = $this->config->get('shipping_tk_transpress_test_before_payment');
		} else {
			$data['shipping_tk_transpress_test_before_payment'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_package'])) {
			$data['shipping_tk_transpress_package'] = $this->config->get('shipping_tk_transpress_package');
		} else if ($this->config->get('shipping_tk_transpress_package')) {
			$data['shipping_tk_transpress_package'] = $this->config->get('shipping_tk_transpress_package');
		} else {
			$data['shipping_tk_transpress_package'] = 'А4';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_fragile'])) {
			$data['shipping_tk_transpress_fragile'] = $this->config->get('shipping_tk_transpress_fragile');
		} else if ($this->config->get('shipping_tk_transpress_fragile')) {
			$data['shipping_tk_transpress_fragile'] = $this->config->get('shipping_tk_transpress_fragile');
		} else {
			$data['shipping_tk_transpress_fragile'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_insurance'])) {
			$data['shipping_tk_transpress_insurance'] = $this->config->get('shipping_tk_transpress_insurance');
		} else if ($this->config->get('shipping_tk_transpress_insurance')) {
			$data['shipping_tk_transpress_insurance'] = $this->config->get('shipping_tk_transpress_insurance');
		} else {
			$data['shipping_tk_transpress_insurance'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_declared'])) {
			$data['shipping_tk_transpress_declared'] = $this->config->get('shipping_tk_transpress_declared');
		} else if ($this->config->get('shipping_tk_transpress_declared')) {
			$data['shipping_tk_transpress_declared'] = $this->config->get('shipping_tk_transpress_declared');
		} else {
			$data['shipping_tk_transpress_declared'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_order_status_id'])) {
			$data['shipping_tk_transpress_order_status_id'] = $this->config->get('shipping_tk_transpress_order_status_id');
		} else if ($this->config->get('shipping_tk_transpress_order_status_id')) {
			$data['shipping_tk_transpress_order_status_id'] = $this->config->get('shipping_tk_transpress_order_status_id');
		} else {
			$data['shipping_tk_transpress_order_status_id'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_order_status_id_mail'])) {
			$data['shipping_tk_transpress_order_status_id_mail'] = $this->config->get('shipping_tk_transpress_order_status_id_mail');
		} else if ($this->config->get('shipping_tk_transpress_order_status_id_mail')) {
			$data['shipping_tk_transpress_order_status_id_mail'] = $this->config->get('shipping_tk_transpress_order_status_id_mail');
		} else {
			$data['shipping_tk_transpress_order_status_id_mail'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_order_status_id_mail_text'])) {
			$data['shipping_tk_transpress_order_status_id_mail_text'] = $this->config->get('shipping_tk_transpress_order_status_id_mail_text');
		} else if ($this->config->get('shipping_tk_transpress_order_status_id_mail_text')) {
			$data['shipping_tk_transpress_order_status_id_mail_text'] = $this->config->get('shipping_tk_transpress_order_status_id_mail_text');
		} else {
			$data['shipping_tk_transpress_order_status_id_mail_text'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_order_status'])) {
			$data['shipping_tk_transpress_order_status'] = $this->config->get('shipping_tk_transpress_order_status');
		} else if ($this->config->get('shipping_tk_transpress_order_status')) {
			$data['shipping_tk_transpress_order_status'] = $this->config->get('shipping_tk_transpress_order_status');
		} else {
			$data['shipping_tk_transpress_order_status'] = array();
		}
		
		if (isset($this->request->post['shipping_tk_transpress_order_status_mail'])) {
			$data['shipping_tk_transpress_order_status_mail'] = $this->config->get('shipping_tk_transpress_order_status_mail');
		} else if ($this->config->get('shipping_tk_transpress_order_status_mail')) {
			$data['shipping_tk_transpress_order_status_mail'] = $this->config->get('shipping_tk_transpress_order_status_mail');
		} else {
			$data['shipping_tk_transpress_order_status_mail'] = array();
		}
		
		if (isset($this->request->post['shipping_tk_transpress_order_status_mail_text'])) {
			$data['shipping_tk_transpress_order_status_mail_text'] = $this->config->get('shipping_tk_transpress_order_status_mail_text');
		} else if ($this->config->get('shipping_tk_transpress_order_status_mail_text')) {
			$data['shipping_tk_transpress_order_status_mail_text'] = $this->config->get('shipping_tk_transpress_order_status_mail_text');
		} else {
			$data['shipping_tk_transpress_order_status_mail_text'] = array();
		}
		
		if (isset($this->request->post['shipping_tk_transpress_sender_office'])) {
			$data['shipping_tk_transpress_sender_office'] = $this->config->get('shipping_tk_transpress_sender_office');
		} else if ($this->config->get('shipping_tk_transpress_sender_office')) {
			$data['shipping_tk_transpress_sender_office'] = $this->config->get('shipping_tk_transpress_sender_office');
		} else {
			$data['shipping_tk_transpress_sender_office'] = '';
		}
		
		if (isset($this->request->post['shipping_tk_transpress_text'])) {
			$data['shipping_tk_transpress_text'] = $this->request->post['shipping_tk_transpress_text'];
		} else {
			$data['shipping_tk_transpress_text'] = $this->config->get('shipping_tk_transpress_text');
		}
		
		if (isset($this->request->post['shipping_tk_transpress_totals'])) {
			$data['shipping_tk_transpress_totals'] = $this->request->post['shipping_tk_transpress_totals'];
		} else if ($this->config->get('shipping_tk_transpress_totals')) {
			$data['shipping_tk_transpress_totals'] = $this->config->get('shipping_tk_transpress_totals');
			
			if (!isset($data['shipping_tk_transpress_totals'])) {
				$data['shipping_tk_transpress_totals'] = array();
			}
		} else {
			$data['shipping_tk_transpress_totals'] = array();
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
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}

		$data['errors'] = $this->error;

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
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
			'href' => $this->url->link('extension/shipping/tk_transpress', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if (isset($this->request->post['shipping_tk_transpress_tax_class_id'])) {
			$data['shipping_tk_transpress_tax_class_id'] = $this->request->post['shipping_tk_transpress_tax_class_id'];
		} else {
			$data['shipping_tk_transpress_tax_class_id'] = $this->config->get('shipping_tk_transpress_tax_class_id');
		}
		
		$this->load->model('localisation/tax_class');
		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		$this->load->model('localisation/weight_class');
		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$this->load->model('customer/custom_field');
		$data['custom_fields'] = $this->model_customer_custom_field->getCustomFields();
		
		$this->load->model('localisation/country');
		$countries = $this->model_localisation_country->getCountries();
		$data['countries'] = array();
		foreach ($countries as $country) {
			$data['countries'][] = array(
				'iso_code_2' => $country['iso_code_2'],
				'name' => $country['name']
			);
		}
		
		$data['offices'] = array();
		$data['packages'] = array();
		$data['services'] = array();
		$data['shipping_tk_transpress_weight_value'] = array();
		$data['text_statuses'] = array();

		if ($data['shipping_tk_transpress_logged']) {
			
			$this->load->model('localisation/weight_class');
			$data['text_statuses'] = $this->model_extension_shipping_tk_transpress->getTranspressStatuses();
			
			// Transpress sender office
			$this->tktranspress->setType(Tktranspress::TYPE_OFFICES);
			$offices = $this->tktranspress->execute();
			foreach ($offices['response']['item'] as $office) {
				$data['offices'][] = array(
					'value' => $office['value'],
					'name' => $office['name']
				);
			}

			// Transpress package
			$this->tktranspress->setType(Tktranspress::TYPE_PACKAGES);
			$packages = $this->tktranspress->execute();
			foreach ($packages['response']['item'] as $package) {
				$data['packages'][] = array(
					'value' => $package['value'],
					'name' => $package['name']
				);
			}

			// Transpress services
			$this->tktranspress->setType(Tktranspress::TYPE_SERVICES);
			$services = $this->tktranspress->execute();
			foreach ($services['response']['item'] as $service) {
				$data['services'][] = array(
					'value' => $service['value'],
					'name' => $service['name']
				);
			}

			if (isset($this->request->post['shipping_tk_transpress_weight_value'])) {
				$data['shipping_tk_transpress_weight_value'] = $this->request->post['shipping_tk_transpress_weight_value'];
			} else {
				$weight_values = $this->config->get('shipping_tk_transpress_weight_value');

				if (isset($weight_values)) {
					foreach ($weight_values as $weight_value) {
						$data['shipping_tk_transpress_weight_value'][] = array(
							'from' => number_format($weight_value['from'], 2, '.', ''),
							'to' => number_format($weight_value['to'], 2, '.', ''),
							'price' => number_format($weight_value['price'], 2, '.', ''),
							'type' => $weight_value['type']
						);
					}
				}
			}
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['action'] = $this->url->link('extension/shipping/tk_transpress', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);
		
		$data['user_token'] = $this->session->data['user_token'];
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/shipping/tk_transpress', $data));
	}
	
	public function install() {
		
		if ($this->config->get('module_tk_checkout_token')) {
			$this->load->model('setting/setting');
			$data = $this->model_setting_setting->getSetting('shipping_tk_transpress');
			
			$data['shipping_tk_transpress_oc'] = 1;
			$this->model_setting_setting->editSetting('shipping_tk_transpress', $data);
		}
	}
	
	public function uninstall() {
		
		$this->load->model('extension/shipping/tk_transpress');
		
		$this->model_extension_shipping_tk_transpress->deleteTables();
	}

	public function login() {

		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_transpress');
		$this->load->language('extension/shipping/tk_transpress');

		$offices = array();

		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			
			if (!empty($this->request->post['client']) && !empty($this->request->post['password'])) {
				
				$this->load->library('tktranspress');

				if (!isset($this->tktranspress)) {
					$this->tktranspress = new Tktranspress($this->registry);
				}
				// Transpress sender office
				$this->tktranspress->setType(Tktranspress::TYPE_OFFICES);
				$offices = $this->tktranspress->execute();

				foreach ($offices['response']['item'] as $office) {
					$offices = array(
						'value' => $office['value'],
						'name' => $office['name']
					);
				}
				
				$this->model_extension_shipping_tk_transpress->createTables($this->config->get('module_tk_checkout_token'));
			} else {
				$results_data['message'] = $this->language->get('error_username_password');
			}
		} else {
			$results_data['message'] = $this->error['warning'];
		}
		
		if (!empty($offices)) {
			
			$data['shipping_tk_transpress_logged'] = true;
			$data['shipping_tk_transpress_client'] = $this->request->post['client'];
			$data['shipping_tk_transpress_password'] = $this->request->post['password'];
			$data['shipping_tk_transpress_domain'] = $_SERVER['HTTP_HOST'];

			$this->model_setting_setting->editSetting('shipping_tk_transpress', $data);
			
			$results_data['success'] = true;
		} else {
			$results_data['message'] = $this->error['warning'];
		}

		$this->response->setOutput(json_encode($results_data));
	}

	public function logout() {

		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_transpress');
		$data['shipping_tk_transpress_logged'] = false;
		$data['shipping_tk_transpress_status'] = 0;
		$this->model_setting_setting->editSetting('shipping_tk_transpress', $data);
	}
	
	protected function validate() {

		$this->load->language('extension/shipping/tk_transpress');
		$this->load->model('extension/shipping/tk_transpress');

		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_transpress') && !$this->user->hasPermission('modify', 'shipping/tk_transpress')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (empty($this->request->post['shipping_tk_transpress_password'])) {
			$this->error['warning'] = $this->language->get('error_required') . ' password';
		}
		
		if (empty($this->request->post['shipping_tk_transpress_client'])) {
			$this->error['warning'] = $this->language->get('error_required') . ' client';
		}
		
		if (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $this->request->post['shipping_tk_transpress_default_weight'])) {
			$this->error['warning'] = $this->language->get('error_price') . ' default_weight';
		}
		
		if (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $this->request->post['shipping_tk_transpress_fixed_price_urban_amount']) && !empty($this->request->post['shipping_tk_transpress_fixed_price_urban'])) {
			$this->error['warning'] = $this->language->get('error_price') . ' fixed_price_urban_amount';
		}
		
		if (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $this->request->post['shipping_tk_transpress_fixed_price_interurban_amount']) && !empty($this->request->post['shipping_tk_transpress_fixed_price_interurban'])) {
			$this->error['warning'] = $this->language->get('error_price') . ' fixed_price_interurban_amount';
		}
		
		if (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $this->request->post['shipping_tk_transpress_free_shipping_amount']) && !empty($this->request->post['shipping_tk_transpress_free_shipping'])) {
			$this->error['warning'] = $this->language->get('error_price') . ' free_shipping_amount';
		}
		
		if (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $this->request->post['shipping_tk_transpress_fixed_price_amount']) && !empty($this->request->post['shipping_tk_transpress_fixed_price'])) {
			$this->error['warning'] = $this->language->get('error_price') . ' fixed_price_amount';
		}

		return !$this->error;
	}

	protected function settings($token = false) {

		$this->load->model('extension/shipping/tk_transpress');
		
		if (isset($token)) {
			$settings = $this->model_extension_shipping_tk_transpress->settings($token);
		} else {
			$settings['error'] = "Невалиден API Token";
		}

		if (isset($settings['error'])) {
			$this->error['warning'] = $settings['error'];
		}

		return !$this->error;
	}

}