<?php

class ControllerExtensionPaymentTkEcontPayment extends Controller {
	
	public function index() {
		
		$data = array();
		
		$this->load->language('extension/payment/tk_econt_payment');
		
		$this->load->model('extension/payment/tk_econt_payment');
		$this->load->model('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		
		$data['text_payment'] = $this->language->get('text_payment');
		$data['text_loading'] = $this->language->get('text_loading');
		$data['button_confirm'] = $this->language->get('button_confirm');
		
		if (isset($this->session->data['order_id'])) {
			
			$data['order_id'] = $this->session->data['order_id'];
			
			try {
				$order_id = @intval($this->session->data['order_id']);
				if ($order_id) {
					$prepared_order = $this->model_extension_payment_tk_econt_payment->prepareOrder($order_id);
					
					if (isset($prepared_order['order']) && $prepared_order['order']) {
						$order_info = $this->model_extension_module_tk_checkout->getOrder($order_id);
						
						if (!isset($order_info['store_id']) || !$order_info['store_id']) {
							$order_info['store_id'] = $this->config->get('config_store_id');
						}
						
						$delivery_url = "services/PaymentsService.createPayment.json";
						$delivery_data['order'] = $prepared_order['order'];
						$delivery_data['shopName'] = $this->config->get('config_name');
						$response = $this->model_extension_shipping_tk_econt->serviceDelivery($delivery_url, $delivery_data, $order_info['store_id']);
						
						if (isset($response['message']) && $response['message']) {
							$this->log->write('TK Econt payment error');
							$this->log->write($response['message']);
							$this->log->write($response['inner'][0]['message']);
						}
						
						if (isset($response['paymentIdentifier'])) {
							
							$paymentIdentifier = @trim($response['paymentIdentifier']);
							$paymentURL = @trim($response['paymentURI']);
							
							if (empty($paymentIdentifier) || empty($paymentURL)) {
								$errorMessage = @trim($response['message']);
								throw new Exception(($errorMessage ?: $this->language->get('error_payment_generation_error')));
							}
							
							$this->model_extension_payment_tk_econt_payment->addOrder($order_id, '', $paymentURL, $paymentIdentifier);
						}
					}
				}
			} catch (Exception $exception) {
				$data['econtPaymentError'] = $exception->getMessage();
			}
		} else {
			$data['econtPaymentError'] = $this->language->get('error_payment_error');
			$data['order_id'] = false;
		}
		
		return $this->load->view('extension/payment/tk_econt_payment', $data);
	}
	
	public function confirm() {
		
		$this->load->model('extension/payment/tk_econt_payment');
		$this->load->model('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('checkout/order');
		
		$response = array();
		
		if (!empty($this->session->data['order_id'])) {
			
			$response['order_id'] = $this->session->data['order_id'];
			
			try {
				$tk_econt_pay_order = $this->model_extension_payment_tk_econt_payment->getOrder($response['order_id']);
			
				$paymentIdentifier = @trim($tk_econt_pay_order['payment_identifier']);
				$paymentURL = @trim($tk_econt_pay_order['payment_uri']);
				if (empty($paymentIdentifier) || empty($paymentURL)) throw new Exception($this->language->get('error_payment_error'));
				
				//смяна статуса на поръчката
				$this->model_checkout_order->addOrderHistory($response['order_id'], $this->config->get('payment_tk_econt_payment_order_status_denied_id'));
				
				$email = isset($this->session->data['tk_checkout']['email']) ? $this->session->data['tk_checkout']['email'] : $this->config->get('config_email');
				$paymentEMail = @trim($email);
				
				$parsetPaymentURI = @parse_url($paymentURL);
				$parsetPaymentURIParams = array();
				@parse_str($parsetPaymentURI['query'], $parsetPaymentURIParams);
				$currentTimestamp = time();
				$boricaResponseURL = HTTPS_SERVER . 'index.php?' . @http_build_query(array(
						'route' => 'extension/payment/tk_econt_payment/paymentResponse',
						'order_id' => $response['order_id'],
						'GECDPaymentIdentifier' => $paymentIdentifier,
						'GECDTime' => $currentTimestamp,
						'GECDHash' => $this->getProtectionHash(array(
							'order_id' => $response['order_id'],
							'GECDPaymentIdentifier' => $paymentIdentifier,
							'GECDTime' => (string)$currentTimestamp,
						))
					));
				
				$response['redirect'] = str_replace($parsetPaymentURI['query'], http_build_query(array_merge($parsetPaymentURIParams, array(
					'successUrl' => $boricaResponseURL,
					'failUrl' => $boricaResponseURL,
					'eMail' => $paymentEMail
				))), $paymentURL);
			} catch (Exception $exception) {
				$response['error'] = $exception->getMessage();
			}
		} else {
			$response['order_id'] = false;
			$response['error'] = $this->language->get('error_payment_error');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response));
	}
	
	public function paymentResponse() {
		
		$this->load->language('extension/payment/tk_econt_payment');
		
		$this->load->model('extension/payment/tk_econt_payment');
		$this->load->model('extension/shipping/tk_econt');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('setting/setting');
		$this->load->model('checkout/order');
		
		$order_id = @intval($this->request->get['order_id']);
		$paymentIdentifier = @trim($this->request->get['GECDPaymentIdentifier']);
		if ($order_id <= 0 || empty($paymentIdentifier) || $this->getProtectionHash(array(
				'order_id' => $order_id,
				'GECDPaymentIdentifier' => $paymentIdentifier,
				'GECDTime' => @trim($this->request->get['GECDTime'])
			)) !== @trim($this->request->get['GECDHash'])) {
			header(sprintf('Location: %s', $this->url->link('extension/payment/tk_econt_payment/error')));
			die();
		}
		
		$order_info = $this->model_extension_module_tk_checkout->getOrder($order_id);
		if (!isset($order_info['store_id']) || !$order_info['store_id']) {
			$order_info['store_id'] = $this->config->get('config_store_id');
		}

		$delivery_url = "services/PaymentsService.confirmPayment.json";
		$delivery_data['paymentIdentifier'] = $paymentIdentifier;
		$response = $this->model_extension_shipping_tk_econt->serviceDelivery($delivery_url, $delivery_data, $order_info['store_id']);
		
		if (empty($response['paymentToken'])) {
			header(sprintf('Location: %s', $this->url->link('extension/payment/tk_econt_payment/error')));
			die();
		}
		
		//автоматично пращане на данни към delivery.econt.com
		$this->model_extension_payment_tk_econt_payment->updateOrderToken($order_id, $response['paymentToken']);
		
		$this->model_extension_shipping_tk_econt->sendToDeliveryEcont($order_id);
		
		$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('payment_tk_econt_payment_order_status_id'));
		
		//изтриваме изоставената количка
		if (isset($this->session->data['tk_checkout']['abandoned_cart_id'])) {
			$this->load->model('extension/module/tk_abandoned_cart');
			$this->model_extension_module_tk_abandoned_cart->removeAbandonedCart($this->session->data['tk_checkout']['abandoned_cart_id']);
		}
		
		header(sprintf('Location: %s', $this->url->link('extension/payment/tk_econt_payment/success')));
		die();
	}
	
	public function success() {
		
		if (isset($this->session->data['order_id'])) {
			
			$this->cart->clear();
			
			if (isset($this->session->data['tk_checkout']['abandoned_cart_id'])) {
				$this->load->model('extension/module/tk_abandoned_cart');
				$this->model_extension_module_tk_abandoned_cart->updateAbandonedCartStatus($this->session->data['tk_checkout']['abandoned_cart_id']);
				unset($this->session->data['abandoned_cart']);
			}
			
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
			unset($this->session->data['totals']);
			unset($this->session->data['tk_checkout']);
			unset($this->session->data['tk_econt_payment']);
		}
		
		header(sprintf('Location: %s', $this->url->link('checkout/success')));
		die();
	}
	
	public function error() {
		
		if (isset($this->session->data['order_id'])) {
			$this->load->model('checkout/order');
			$data['order_id'] = $this->session->data['order_id'];
			$this->model_checkout_order->addOrderHistory($data['order_id'], 0);
			unset($this->session->data['order_id']);
		}
		
		$data['loadView'] = true;
		$data['success'] = false;
		
		$this->load->language('extension/payment/tk_econt_payment');
		$this->document->setTitle($this->language->get('heading_title'));
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['home'] = $this->url->link('common/home');
		
		$data['status'] = 'Error';
		$data['statusMessage'] = $this->language->get('status_message_error');
		if (isset($this->session->data['tk_econt_payment_paymentURI'])) {
			$data['button']['text'] = $this->language->get('button_text_error');
			$data['button']['href'] = $this->session->data['tk_econt_payment_paymentURI'];
		}
		
		$data['link']['text'] = $this->language->get('button_text_success');
		$data['link']['href'] = $this->url->link('common/home');
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		
		$this->response->setOutput($this->load->view('extension/payment/tk_econt_payment', $data));
	}
	
	private function getProtectionHash($params) {
		
		$tk_econt_store_kay = $this->config->get('shipping_tk_econt_store_kay');
		
		if (!empty($tk_econt_store_kay[$this->config->get('config_store_id')])) {
			return hash_hmac('sha1', serialize($params), $tk_econt_store_kay[$this->config->get('config_store_id')]);
		}
	}
}