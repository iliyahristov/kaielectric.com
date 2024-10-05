<?php

class ControllerExtensionShippingTkNext extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->language->load('extension/shipping/tk_next');
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('extension/shipping/tk_next');
		$this->load->model('setting/setting');
		
		$data = $this->model_setting_setting->getSetting('shipping_tk_next');
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token')) && $this->config->get('shipping_tk_next_logged')) {
			if (!isset($this->tknext)) {
				$this->tknext = new Tknext($this->registry);
			}
		}
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
				
				$this->model_setting_setting->editSetting('shipping_tk_next', $this->request->post + $data);
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/shipping/tk_next', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		$data['root'] = str_replace('/admin', '', DIR_APPLICATION);
		$data['root_system'] = DIR_SYSTEM;
		
		$data['user_token'] = $this->session->data['user_token'];
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['app_id'])) {
			$data['error_app_id'] = $this->error['app_id'];
		} else {
			$data['error_app_id'] = '';
		}
		
		if (isset($this->error['app_secret'])) {
			$data['error_app_secret'] = $this->error['app_secret'];
		} else {
			$data['error_app_secret'] = '';
		}
		
		if (isset($this->error['sender_id'])) {
			$data['error_sender_id'] = $this->error['sender_id'];
		} else {
			$data['error_sender_id'] = '';
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
			'href' => $this->url->link('extension/shipping/tk_next', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		$data['action'] = $this->url->link('extension/shipping/tk_next', 'user_token=' . $this->session->data['user_token'], 'SSL');
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
		
		$data['next_countries'] = array();
		
		// next level info
		if (!empty($data['shipping_tk_next_app_id']) && !empty($data['shipping_tk_next_app_secret'])) {
			$this->load->library('tknext');
			if (!isset($this->tknext)) {
				$this->tknext = new TkNext($this->registry);
			}
			try {
				TkNext::setAuth($data['shipping_tk_next_app_id'], $data['shipping_tk_next_app_secret']);
				$data['next_countries'] = TkNext::getCountries();
			} catch (\Exception $e) {
				$data['error_warning'] = $e->getMessage();
			}
		}
		
		$data['shipping_tk_next_logged'] = $this->config->get('shipping_tk_next_logged');
		
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
		
		if (isset($this->request->post['shipping_tk_next_tax_class_id'])) {
			$data['shipping_tk_next_tax_class_id'] = $this->request->post['shipping_tk_next_tax_class_id'];
		} else {
			$data['shipping_tk_next_tax_class_id'] = $this->config->get('shipping_tk_next_tax_class_id');
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
		
		$this->response->setOutput($this->load->view('extension/shipping/tk_next', $data));
	}
	
	public function install() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_next');
		
		$data['shipping_tk_next_oc'] = 1;
		$this->model_setting_setting->editSetting('shipping_tk_next', $data);
	}
	
	public function uninstall() {
		
		$this->load->model('extension/shipping/tk_next');
		$this->model_extension_shipping_tk_next->deleteTables();
	}
	
	public function login() {
		
		$this->load->model('setting/setting');
		$this->load->model('extension/shipping/tk_next');
		$this->load->language('extension/shipping/tk_next');
		
		$result = array();
		
		if ($this->config->get('module_tk_checkout_token') && $this->settings($this->config->get('module_tk_checkout_token'))) {
			if (!empty($this->request->post['app_id']) && !empty($this->request->post['app_secret'])) {
				
				$data = $this->model_setting_setting->getSetting('shipping_tk_next');
				
				$data['shipping_tk_next_app_id'] = $this->request->post['app_id'];
				$data['shipping_tk_next_app_secret'] = $this->request->post['app_secret'];
				$data['shipping_tk_next_sender_id'] = $this->request->post['sender_id'];
				$data['shipping_tk_next_domain'] = $_SERVER['HTTP_HOST'];
				
				// next level info
				$this->load->library('tknext');
				if (!isset($this->tknext)) {
					$this->tknext = new TkNext($this->registry);
				}
				
				try {
					TkNext::setAuth($data['shipping_tk_next_app_id'], $data['shipping_tk_next_app_secret']);
					TkNext::getCountries();
					
					$data['shipping_tk_next_logged'] = true;
					
					$this->model_setting_setting->editSetting('shipping_tk_next', $data);
					
					$this->model_extension_shipping_tk_next->createTables($this->config->get('module_tk_checkout_token'));
					
					$result['success'] = true;
				} catch (\Exception $e) {
					$result['message'] = $e->getMessage();
				}
			} else {
				$result['message'] = $this->language->get('error_username_password');
			}
		} else {
			$result['message'] = $this->error['warning'];
		}
		
		$this->response->setOutput(json_encode($result));
	}
	
	public function logout() {
		
		$this->load->model('setting/setting');
		$data = $this->model_setting_setting->getSetting('shipping_tk_next');
		$data['shipping_tk_next_logged'] = false;
		$data['shipping_tk_next_status'] = 0;
		$this->model_setting_setting->editSetting('shipping_tk_next', $data);
	}
	
	private function validate() {
		
		if (!$this->user->hasPermission('modify', 'extension/shipping/tk_next')) {
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
		
		$this->load->model('extension/shipping/tk_next');
		
		if (isset($token)) {
			$settings = $this->model_extension_shipping_tk_next->settings($token);
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
