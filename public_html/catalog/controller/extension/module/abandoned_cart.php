<?php

class ControllerExtensionModuleAbandonedCart extends Controller{

	public function index(){
		
	}

	public function add_to_cart(){
		
		if(isset($this->session->data['abandoned_cart']) && $this->session->data['abandoned_cart']){
			
			
			$this->cart->clear();
			
			if(isset($this->session->data['abandoned_cart']['currency']) && $this->session->data['abandoned_cart']['currency']){
				$this->session->data['currency'] = $this->session->data['abandoned_cart']['currency'];
			}
			
			
			if(isset($this->session->data['abandoned_cart']['firstname']) && $this->session->data['abandoned_cart']['firstname']){
				$this->session->data['tk_checkout']['firstname'] = $this->session->data['abandoned_cart']['firstname'];
				$this->session->data['guest']['firstname'] = $this->session->data['abandoned_cart']['firstname'];
			}
			
			if(isset($this->session->data['abandoned_cart']['lastname']) && $this->session->data['abandoned_cart']['lastname']){
				$this->session->data['tk_checkout']['lastname'] = $this->session->data['abandoned_cart']['lastname'];
				$this->session->data['guest']['lastname'] = $this->session->data['abandoned_cart']['lastname'];
			}
	
			if(isset($this->session->data['abandoned_cart']['telephone']) && $this->session->data['abandoned_cart']['telephone']){
				$this->session->data['tk_checkout']['telephone'] = $this->session->data['abandoned_cart']['telephone'];
				$this->session->data['guest']['telephone'] = $this->session->data['abandoned_cart']['telephone'];
			}
			
			if(isset($this->session->data['abandoned_cart']['email']) && $this->session->data['abandoned_cart']['email']){
				$this->session->data['tk_checkout']['email'] = $this->session->data['abandoned_cart']['email'];
				$this->session->data['guest']['email'] = $this->session->data['abandoned_cart']['email'];
			}
			
			
			if($this->session->data['abandoned_cart']['data']){
				
				if(isset($this->session->data['abandoned_cart']['data']['shipping_method']['code']) && $this->session->data['abandoned_cart']['data']['shipping_method']['code']){
					$this->session->data['shipping_method']['code'] = $this->session->data['abandoned_cart']['data']['shipping_method']['code'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['shipping_method']['title']) && $this->session->data['abandoned_cart']['data']['shipping_method']['title']){
					$this->session->data['shipping_method']['title'] = $this->session->data['abandoned_cart']['data']['shipping_method']['title'];
				}
				
				if(isset($this->session->data['shipping_method']) && $this->session->data['shipping_method']){
					$this->session->data['tk_checkout']['shipping_method'] = $this->session->data['shipping_method'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['payment_method']['code']) && $this->session->data['abandoned_cart']['data']['payment_method']['code']){
					$this->session->data['payment_method']['code'] = $this->session->data['abandoned_cart']['data']['payment_method']['code'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['payment_method']['title']) && $this->session->data['abandoned_cart']['data']['payment_method']['title']){
					$this->session->data['payment_method']['title'] = $this->session->data['abandoned_cart']['data']['payment_method']['title'];
				}
				
				if(isset($this->session->data['payment_method']) && $this->session->data['payment_method']){
					$this->session->data['tk_checkout']['payment_method'] = $this->session->data['payment_method'];
				}
								
				if(isset($this->session->data['abandoned_cart']['data']['address_1']) && $this->session->data['abandoned_cart']['data']['address_1']){
					$this->session->data['guest']['address_1'] = $this->session->data['abandoned_cart']['data']['address_1'];
					$this->session->data['tk_checkout']['address_1'] = $this->session->data['abandoned_cart']['data']['address_1'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['city']) && $this->session->data['abandoned_cart']['data']['city']){
					$this->session->data['guest']['city'] = $this->session->data['abandoned_cart']['data']['city'];
					$this->session->data['tk_checkout']['city'] = $this->session->data['abandoned_cart']['data']['city'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['postcode']) && $this->session->data['abandoned_cart']['data']['postcode']){
					$this->session->data['guest']['postcode'] = $this->session->data['abandoned_cart']['data']['postcode'];
					$this->session->data['tk_checkout']['postcode'] = $this->session->data['abandoned_cart']['data']['postcode'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['zone']) && $this->session->data['abandoned_cart']['data']['zone']){
					$this->session->data['guest']['zone'] = $this->session->data['abandoned_cart']['data']['zone'];
					$this->session->data['tk_checkout']['zone'] = $this->session->data['abandoned_cart']['data']['zone'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['zone_id']) && $this->session->data['abandoned_cart']['data']['zone_id']){
					$this->session->data['guest']['zone_id'] = $this->session->data['abandoned_cart']['data']['zone_id'];
					$this->session->data['tk_checkout']['zone_id'] = $this->session->data['abandoned_cart']['data']['zone_id'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['country_id']) && $this->session->data['abandoned_cart']['data']['country_id']){
					$this->session->data['guest']['country_id'] = $this->session->data['abandoned_cart']['data']['country_id'];
					$this->session->data['tk_checkout']['country_id'] = $this->session->data['abandoned_cart']['data']['country_id'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['comment']) && $this->session->data['abandoned_cart']['data']['comment']){
					$this->session->data['guest']['comment'] = $this->session->data['abandoned_cart']['data']['comment'];
					$this->session->data['tk_checkout']['comment'] = $this->session->data['abandoned_cart']['data']['comment'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['account_custom_field']) && $this->session->data['abandoned_cart']['data']['account_custom_field']){
					$this->session->data['guest']['account_custom_field'] = $this->session->data['abandoned_cart']['data']['account_custom_field'];
					$this->session->data['tk_checkout']['account_custom_field'] = $this->session->data['abandoned_cart']['data']['account_custom_field'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['address_custom_field']) && $this->session->data['abandoned_cart']['data']['address_custom_field']){
					$this->session->data['guest']['address_custom_field'] = $this->session->data['abandoned_cart']['data']['address_custom_field'];
					$this->session->data['tk_checkout']['address_custom_field'] = $this->session->data['abandoned_cart']['data']['address_custom_field'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['econt']) && $this->session->data['abandoned_cart']['data']['econt']){
					$this->session->data['tk_checkout']['econt'] = $this->session->data['abandoned_cart']['data']['econt'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['speedy']) && $this->session->data['abandoned_cart']['data']['speedy']){
					$this->session->data['tk_checkout']['speedy'] = $this->session->data['abandoned_cart']['data']['speedy'];
				}
				
				if(isset($this->session->data['abandoned_cart']['data']['customer_group_id']) && $this->session->data['abandoned_cart']['data']['customer_group_id']){
					$this->session->data['tk_checkout']['customer_group_id'] = $this->session->data['abandoned_cart']['data']['customer_group_id'];
				}
				
				$this->session->data['shipping_method']['cost'] = 0;
				$this->session->data['shipping_method']['tax_class_id'] = '';
			}
			
			if(isset($this->session->data['abandoned_cart']['products']) && $this->session->data['abandoned_cart']['products']){
				foreach($this->session->data['abandoned_cart']['products'] as $product){
					
					$this->cart->add($product['product_id'], $product['quantity'], $product['option'], 0);
					
				}
			}
			
			$this->response->redirect($this->url->link('checkout/checkout'));

		} else{
			if((!$this->cart->hasProducts() && empty($this->session->data['vouchers'])) || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout'))){
				$this->response->redirect($this->url->link('checkout/cart'));
			}
			
		}
		
		
	}
}