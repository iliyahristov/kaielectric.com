<?php

class ControllerExtensionModuleTkCheckout extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('extension/module/tk_checkout');
		
		$this->document->setTitle($this->language->get('heading_title') . ' - v. 4.1');
		
		$this->load->model('setting/setting');
		$this->load->model('extension/module/tk_checkout');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (isset($this->request->post['module_tk_checkout_token']) && isset($this->request->post['module_tk_checkout_token_add'])) {
				$create = $this->model_extension_module_tk_checkout->createTables($this->request->post['module_tk_checkout_token']);
				
				if (isset($create['success'])) {
					$this->model_setting_setting->editSetting('module_tk_checkout', $this->request->post);
					$this->response->redirect($this->url->link('extension/module/tk_checkout', 'user_token=' . $this->session->data['user_token'], 'SSL'));
				} else {
					$this->error['warning'] = $create['error'];
				}
			} else {
				if ($this->settings($this->config->get('module_tk_checkout_token'))) {
					$this->model_setting_setting->editSetting('module_tk_checkout', $this->request->post);
					$this->session->data['success'] = $this->language->get('text_success');
					$this->response->redirect($this->url->link('extension/module/tk_checkout', 'user_token=' . $this->session->data['user_token'], 'SSL'));
				}
			}
		}
		
		if ($this->settings($this->config->get('module_tk_checkout_token'))) {
			$data = $this->model_setting_setting->getSetting('module_tk_checkout');
			
			$this->model_extension_module_tk_checkout->addColumns();
		}
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data['module_tk_checkout_api_url'] = $this->config->get('module_tk_checkout_api_url');
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/tk_checkout', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if ($this->config->get('module_tk_checkout_customer_mail')) {
			$data['config_email'] = $this->config->get('module_tk_checkout_customer_mail');
		} else {
			$data['config_email'] = $this->config->get('config_email');
		}
		
		$this->load->model('tool/image');
		
		if ($this->config->get('module_tk_checkout_payment_image')) {
			$data['module_tk_checkout_payment_image'] = array();
			foreach ($this->config->get('module_tk_checkout_payment_image') as $key => $module_tk_checkout_payment_image) {
				
				if (is_file(DIR_IMAGE . $module_tk_checkout_payment_image)) {
					$image = $this->model_tool_image->resize($module_tk_checkout_payment_image, 40, 40);
				} else {
					$image = $this->model_tool_image->resize('no_image.png', 40, 40);
				}
				
				$data['module_tk_checkout_payment_image'][$key]['thumb'] = $image;
				$data['module_tk_checkout_payment_image'][$key]['image'] = $module_tk_checkout_payment_image;
			}
		}
		
		if ($this->config->get('module_tk_checkout_shipping_image')) {
			$data['module_tk_checkout_shipping_image'] = array();
			foreach ($this->config->get('module_tk_checkout_shipping_image') as $key => $module_tk_checkout_shipping_image) {
				
				if (is_file(DIR_IMAGE . $module_tk_checkout_shipping_image)) {
					$image = $this->model_tool_image->resize($module_tk_checkout_shipping_image, 40, 40);
				} else {
					$image = $this->model_tool_image->resize('no_image.png', 40, 40);
				}
				
				$data['module_tk_checkout_shipping_image'][$key]['thumb'] = $image;
				$data['module_tk_checkout_shipping_image'][$key]['image'] = $module_tk_checkout_shipping_image;
			}
		}
		
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 40, 40);
		
		if ($this->config->get('module_tk_checkout_debug')) {
			$data['module_tk_checkout_debug'] = $this->config->get('module_tk_checkout_debug');
		} else {
			$data['module_tk_checkout_debug'] = 0;
		}
		
		if ($this->config->get('module_tk_checkout_popup_payments')) {
			$data['module_tk_checkout_popup_payments'] = $this->config->get('module_tk_checkout_popup_payments');
		} else {
			$data['module_tk_checkout_popup_payments'] = array();
		}
		
		if ($this->config->get('module_tk_checkout_text')) {
			$data['module_tk_checkout_text'] = $this->config->get('module_tk_checkout_text');
		} else {
			$data['module_tk_checkout_text'] = array();
		}
		
		if (isset($this->session->data['error'])) {
			$data['error_warning'] = $this->session->data['error'];
			
			unset($this->session->data['error']);
		} elseif (isset($this->error['warning'])) {
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
		
		if ($this->config->get('module_tk_checkout_token')) {
			$check = $this->model_extension_module_tk_checkout->checkVersion($this->config->get('module_tk_checkout_token'));
			if (isset($check->error) && $check->error) {
				$data['error_warning'] = $check->error;
				
				if (isset($check->version) && $check->version) {
					$data['error_warning'] .=' --> Your version: <b>' . $check->version . '</b>';
				}
				
				if (isset($check->now) && $check->now) {
					$data['error_warning'] .=' --> Last stable version: <b>' . $check->now . '</b>';
				}
				
				$data['error_warning'] .= '</b> | You can contact your developer';
			}
			if (isset($check->success) && $check->success) {
				$data['success'] = $check->success;
				
				if (isset($check->version) && $check->version) {
					$data['success'] .=' --> Your version: <b>' . $check->version . '</b>';
				}
				
				if (isset($check->now) && $check->now) {
					$data['success'] .=' --> Last stable version: <b>' . $check->now . '</b>';
				}
			}
		}
		
		if ($this->request->server['HTTPS']) {
			$data['domain'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['domain'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['user_token'] = $this->session->data['user_token'];
		$data['action'] = $this->url->link('extension/module/tk_checkout', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);
		
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->load->model('localisation/country');
		$data['countries'] = $this->model_localisation_country->getCountries();
		
		$this->load->model('customer/custom_field');
		$data['custom_fields'] = $this->model_customer_custom_field->getCustomFields();
		
		$this->load->model('catalog/information');
		$data['informations'] = $this->model_catalog_information->getInformations();
		
		$this->load->model('setting/extension');
		
		$data['payments'] = array();
		$payments = $this->model_setting_extension->getInstalled('payment');
		foreach ($payments as $payment) {
			
			$this->load->language('extension/payment/' . $payment);
			
			$data['payments'][] = array(
				'code' => $payment,
				'name' => strip_tags($this->language->get('heading_title'))
			);
		}
		
		$data['shippings'] = array();
		$shippings = $this->model_setting_extension->getInstalled('shipping');
		foreach ($shippings as $shipping) {
			
			$this->load->language('extension/shipping/' . $shipping);
			
			$data['shippings'][] = array(
				'code' => $shipping,
				'name' => strip_tags($this->language->get('heading_title'))
			);
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
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('extension/module/tk_checkout', $data));
	}
	
	public function install() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('module_tk_checkout');
		$data['module_tk_checkout_api_url'] = 'https://api.tankoo.eu/';
		$this->model_setting_setting->editSetting('module_tk_checkout', $data);
		
		@mail('tankoo.eu@gmail.com', 'TK - Checkout 4.1  Module installed', HTTP_CATALOG . ' - ' . $this->config->get('config_name') . "\r\n" . 'IP - ' . $this->request->server['REMOTE_ADDR'], 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n" . 'From: ' . $this->config->get('config_owner') . ' <' . $this->config->get('config_email') . '>' . "\r\n");
	}
	
	public function uninstall() {
		
		$this->load->model('extension/module/tk_checkout');
		$this->model_extension_module_tk_checkout->deleteTables();
	}
	
	protected function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/module/tk_checkout')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		return !$this->error;
	}
	
	protected function settings($token = false) {
		
		$this->load->model('extension/module/tk_checkout');
		
		if (isset($token)) {
			$settings = $this->model_extension_module_tk_checkout->settings($token);
		} else {
			$settings['error'] = "Невалиден API Token";
		}
		
		if (isset($settings['error'])) {
			$this->error['warning'] = $settings['error'];
		}
		
		return !$this->error;
	}
	
	public function invoiceAdd() {
		
		$this->load->model('extension/module/tk_checkout');
		$this->model_extension_module_tk_checkout->addCustomFields();
		
		$this->load->language('extension/module/tk_checkout');
		$results['success'] = $this->language->get('text_success');
		
		$this->response->setOutput(json_encode($results));
	}
	
}