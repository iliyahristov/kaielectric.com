<?php

class ControllerExtensionModuleTkAbandonedCart extends Controller {
	
	public function index() {
		
		unset($this->session->data['cart']);
		unset($this->session->data['tk_checkout']);
		unset($this->session->data['guest']);
		
		$this->load->model('extension/module/tk_abandoned_cart');
		
		$this->session->data['abandoned_cart'] = array();
		
		if ($this->request->get['id']) {
			
			$abandoned_cart = $this->model_extension_module_tk_abandoned_cart->getAbandonedCartByid($this->request->get['id']);
			if (!empty($abandoned_cart['abandoned_cart_id'])) {
				$products = $this->model_extension_module_tk_abandoned_cart->getAbandonedCartProducts($abandoned_cart['abandoned_cart_id']);
				
				$products_data = array();
				
				foreach ($products as $product) {
					
					$option_data = array();
					$options = $this->model_extension_module_tk_abandoned_cart->getAbandonedCartOptions($abandoned_cart['abandoned_cart_id'], $product['product_id'], $product['abandoned_cart_product_id']);
					
					foreach ($options as $option) {
						if ($option['type'] == 'image_checkbox' || $option['type'] == 'button_checkbox' || $option['type'] == 'checkbox') {
							$option_data[$option['product_option_id']][] = $option['product_option_value_id'];
						} else if ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
							$option_data[$option['product_option_id']] = $option['value'];
						} else {
							$option_data[$option['product_option_id']] = $option['product_option_value_id'];
						}
					}
					
					$products_data[] = array(
						'product_id' => $product['product_id'],
						'quantity'   => $product['quantity'],
						'option'     => $option_data
					);
				}
				
				$unserialize_data = unserialize($abandoned_cart['data']);
				
				$this->session->data['abandoned_cart'] = array(
					'abandoned_cart_id' => $abandoned_cart['abandoned_cart_id'],
					'firstname'         => $abandoned_cart['firstname'],
					'lastname'          => $abandoned_cart['lastname'],
					'telephone'         => $abandoned_cart['telephone'],
					'email'             => $abandoned_cart['email'],
					'currency'          => $abandoned_cart['currency'],
					'products'          => $products_data,
					'data'              => $unserialize_data
				);
				
				$this->response->redirect($this->url->link('extension/module/tk_abandoned_cart/add_to_cart', 'store_id=' . $abandoned_cart['store_id'], 'SSL'));
			}
		}
	}
	
	public function add_to_cart() {
		
		if (isset($this->session->data['abandoned_cart']) && $this->session->data['abandoned_cart']) {
			
			$this->cart->clear();
			
			if (isset($this->session->data['abandoned_cart']['currency']) && $this->session->data['abandoned_cart']['currency']) {
				$this->session->data['currency'] = $this->session->data['abandoned_cart']['currency'];
			}
			
			if (isset($this->session->data['abandoned_cart']['firstname']) && $this->session->data['abandoned_cart']['firstname']) {
				$this->session->data['tk_checkout']['firstname'] = $this->session->data['abandoned_cart']['firstname'];
				$this->session->data['guest']['firstname'] = $this->session->data['abandoned_cart']['firstname'];
			}
			
			if (isset($this->session->data['abandoned_cart']['lastname']) && $this->session->data['abandoned_cart']['lastname']) {
				$this->session->data['tk_checkout']['lastname'] = $this->session->data['abandoned_cart']['lastname'];
				$this->session->data['guest']['lastname'] = $this->session->data['abandoned_cart']['lastname'];
			}
			
			if (isset($this->session->data['abandoned_cart']['telephone']) && $this->session->data['abandoned_cart']['telephone']) {
				$this->session->data['tk_checkout']['telephone'] = $this->session->data['abandoned_cart']['telephone'];
				$this->session->data['guest']['telephone'] = $this->session->data['abandoned_cart']['telephone'];
			}
			
			if (isset($this->session->data['abandoned_cart']['email']) && $this->session->data['abandoned_cart']['email']) {
				$this->session->data['tk_checkout']['email'] = $this->session->data['abandoned_cart']['email'];
				$this->session->data['guest']['email'] = $this->session->data['abandoned_cart']['email'];
			}
			
			if ($this->session->data['abandoned_cart']['data']) {
				
				if (isset($this->session->data['abandoned_cart']['data']['shipping_method']['code']) && $this->session->data['abandoned_cart']['data']['shipping_method']['code']) {
					$this->session->data['shipping_method']['code'] = $this->session->data['abandoned_cart']['data']['shipping_method']['code'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['shipping_method']['title']) && $this->session->data['abandoned_cart']['data']['shipping_method']['title']) {
					$this->session->data['shipping_method']['title'] = $this->session->data['abandoned_cart']['data']['shipping_method']['title'];
				}
				
				if (isset($this->session->data['shipping_method']) && $this->session->data['shipping_method']) {
					$this->session->data['tk_checkout']['shipping_method'] = $this->session->data['shipping_method'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['payment_method']['code']) && $this->session->data['abandoned_cart']['data']['payment_method']['code']) {
					$this->session->data['payment_method']['code'] = $this->session->data['abandoned_cart']['data']['payment_method']['code'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['payment_method']['title']) && $this->session->data['abandoned_cart']['data']['payment_method']['title']) {
					$this->session->data['payment_method']['title'] = $this->session->data['abandoned_cart']['data']['payment_method']['title'];
				}
				
				if (isset($this->session->data['payment_method']) && $this->session->data['payment_method']) {
					$this->session->data['tk_checkout']['payment_method'] = $this->session->data['payment_method'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['address_1']) && $this->session->data['abandoned_cart']['data']['address_1']) {
					$this->session->data['guest']['address_1'] = $this->session->data['abandoned_cart']['data']['address_1'];
					$this->session->data['tk_checkout']['address_1'] = $this->session->data['abandoned_cart']['data']['address_1'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['city']) && $this->session->data['abandoned_cart']['data']['city']) {
					$this->session->data['guest']['city'] = $this->session->data['abandoned_cart']['data']['city'];
					$this->session->data['tk_checkout']['city'] = $this->session->data['abandoned_cart']['data']['city'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['postcode']) && $this->session->data['abandoned_cart']['data']['postcode']) {
					$this->session->data['guest']['postcode'] = $this->session->data['abandoned_cart']['data']['postcode'];
					$this->session->data['tk_checkout']['postcode'] = $this->session->data['abandoned_cart']['data']['postcode'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['zone']) && $this->session->data['abandoned_cart']['data']['zone']) {
					$this->session->data['guest']['zone'] = $this->session->data['abandoned_cart']['data']['zone'];
					$this->session->data['tk_checkout']['zone'] = $this->session->data['abandoned_cart']['data']['zone'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['zone_id']) && $this->session->data['abandoned_cart']['data']['zone_id']) {
					$this->session->data['guest']['zone_id'] = $this->session->data['abandoned_cart']['data']['zone_id'];
					$this->session->data['tk_checkout']['zone_id'] = $this->session->data['abandoned_cart']['data']['zone_id'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['country_id']) && $this->session->data['abandoned_cart']['data']['country_id']) {
					$this->session->data['guest']['country_id'] = $this->session->data['abandoned_cart']['data']['country_id'];
					$this->session->data['tk_checkout']['country_id'] = $this->session->data['abandoned_cart']['data']['country_id'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['comment']) && $this->session->data['abandoned_cart']['data']['comment']) {
					$this->session->data['guest']['comment'] = $this->session->data['abandoned_cart']['data']['comment'];
					$this->session->data['tk_checkout']['comment'] = $this->session->data['abandoned_cart']['data']['comment'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['account_custom_field']) && $this->session->data['abandoned_cart']['data']['account_custom_field']) {
					$this->session->data['guest']['account_custom_field'] = $this->session->data['abandoned_cart']['data']['account_custom_field'];
					$this->session->data['tk_checkout']['account_custom_field'] = $this->session->data['abandoned_cart']['data']['account_custom_field'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['address_custom_field']) && $this->session->data['abandoned_cart']['data']['address_custom_field']) {
					$this->session->data['guest']['address_custom_field'] = $this->session->data['abandoned_cart']['data']['address_custom_field'];
					$this->session->data['tk_checkout']['address_custom_field'] = $this->session->data['abandoned_cart']['data']['address_custom_field'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['econt']) && $this->session->data['abandoned_cart']['data']['econt']) {
					$this->session->data['tk_checkout']['econt'] = $this->session->data['abandoned_cart']['data']['econt'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['speedy']) && $this->session->data['abandoned_cart']['data']['speedy']) {
					$this->session->data['tk_checkout']['speedy'] = $this->session->data['abandoned_cart']['data']['speedy'];
				}
				
				if (isset($this->session->data['abandoned_cart']['data']['customer_group_id']) && $this->session->data['abandoned_cart']['data']['customer_group_id']) {
					$this->session->data['tk_checkout']['customer_group_id'] = $this->session->data['abandoned_cart']['data']['customer_group_id'];
				}
				
				$this->session->data['shipping_method']['cost'] = 0;
				$this->session->data['shipping_method']['tax_class_id'] = '';
			}
			
			if (isset($this->session->data['abandoned_cart']['products']) && $this->session->data['abandoned_cart']['products']) {
				foreach ($this->session->data['abandoned_cart']['products'] as $product) {
					
					$this->cart->add($product['product_id'], $product['quantity'], $product['option'], 0);
				}
			}
			
			$this->response->redirect($this->url->link('checkout/checkout'));
		} else {
			if ((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))) {
				$this->response->redirect($this->url->link('checkout/cart'));
			}
		}
	}
	
	public function send() {
		
		$settings = $this->config->get('module_tk_checkout_mail');
		
		if (!empty($settings['status']) && $settings['status'] == 1) {
			$this->log->write('TK Checkout send mails - cron');
			
			$this->load->model('extension/module/tk_abandoned_cart');
			
			$orders = $this->model_extension_module_tk_abandoned_cart->getAbandonedCarts();
			
			if ($orders) {
				$email = false;
				foreach ($orders as $order) {
					
					if (!empty($order['email'])) {
						$email = str_replace(" ", "", $order['email']);
						$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					}
					
					if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$this->model_extension_module_tk_abandoned_cart->sendMail($order['abandoned_cart_id'], 2);
					}
				}
			}
		}
	}
}