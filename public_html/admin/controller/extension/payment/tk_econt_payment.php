<?php

class ControllerExtensionPaymentTkEcontPayment extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('extension/payment/tk_econt_payment');
		
		$this->document->setTitle($this->language->get('heading_title'));
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['entry_order_status_denied'] = $this->language->get('entry_order_status_denied');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_tk_econt_payment', $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/tk_econt_payment', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);
		
		$data['action'] = $this->url->link('extension/payment/tk_econt_payment', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);
		
		if (isset($this->request->post['payment_tk_econt_payment_total'])) {
			$data['payment_tk_econt_payment_total'] = $this->request->post['payment_tk_econt_payment_total'];
		} else {
			$data['payment_tk_econt_payment_total'] = $this->config->get('payment_tk_econt_payment_total');
		}
		
		if (isset($this->request->post['payment_tk_econt_payment_order_status_id'])) {
			$data['payment_tk_econt_payment_order_status_id'] = $this->request->post['payment_tk_econt_payment_order_status_id'];
		} else {
			$data['payment_tk_econt_payment_order_status_id'] = $this->config->get('payment_tk_econt_payment_order_status_id');
		}
		if (isset($this->request->post['payment_tk_econt_payment_order_status_denied_id'])) {
			$data['payment_tk_econt_payment_order_status_denied_id'] = $this->request->post['payment_tk_econt_payment_order_status_denied_id'];
		} else {
			$data['payment_tk_econt_payment_order_status_denied_id'] = $this->config->get('payment_tk_econt_payment_order_status_denied_id');
		}
		
		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['payment_tk_econt_payment_geo_zone_id'])) {
			$data['payment_tk_econt_payment_geo_zone_id'] = $this->request->post['payment_tk_econt_payment_geo_zone_id'];
		} else {
			$data['payment_tk_econt_payment_geo_zone_id'] = $this->config->get('payment_tk_econt_payment_geo_zone_id');
		}
		
		$this->load->model('localisation/geo_zone');
		
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['payment_tk_econt_payment_status'])) {
			$data['payment_tk_econt_payment_status'] = $this->request->post['payment_tk_econt_payment_status'];
		} else {
			$data['payment_tk_econt_payment_status'] = $this->config->get('payment_tk_econt_payment_status');
		}
		
		if (isset($this->request->post['payment_tk_econt_payment_sort_order'])) {
			$data['payment_tk_econt_payment_sort_order'] = $this->request->post['payment_tk_econt_payment_sort_order'];
		} else {
			$data['payment_tk_econt_payment_sort_order'] = $this->config->get('payment_tk_econt_payment_sort_order');
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('extension/payment/tk_econt_payment', $data));
	}
	
	public function install() {
		
		$this->load->model('extension/payment/tk_econt_payment');
		$this->model_extension_payment_tk_econt_payment->createTables();
	}
	
	public function uninstall() {
		
		$this->load->model('extension/payment/tk_econt_payment');
		$this->model_extension_payment_tk_econt_payment->deleteTables();
	}
	
	protected function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/payment/tk_econt_payment')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_econt');
		
		if (!isset($data['shipping_tk_econt_store_kay'])) {
			$this->error['warning'] = 'Модула "Достави с Еконт" трябва да бъде инсталиран преди това!';
		}
		
		return !$this->error;
	}
	
}