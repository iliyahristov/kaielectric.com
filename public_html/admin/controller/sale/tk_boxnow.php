<?php

class ControllerSaleTkBoxnow extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('extension/shipping/tk_boxnow');
		
		$this->load->model('extension/shipping/tk_boxnow');
		$this->load->model('extension/module/tk_checkout');
		$this->load->model('sale/order');
		$this->load->model('catalog/product');
		
		if ($this->request->server['HTTPS']) {
			$data['web_url'] = str_replace('admin/', '', HTTPS_SERVER);
		} else {
			$data['web_url'] = str_replace('admin/', '', HTTP_SERVER);
		}
		
		if (isset($this->session->data['error'])) {
			$this->error = $this->session->data['error'];
			
			unset($this->session->data['error']);
		}
		
		if (isset($this->error)) {
			$data['error_warning'] = $this->error;
		} else if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['error_firstname'])) {
			$data['error_firstname'] = $this->error['error_firstname'];
		} else {
			$data['error_firstname'] = '';
		}
		
		if (isset($this->error['error_lastname'])) {
			$data['error_lastname'] = $this->error['error_lastname'];
		} else {
			$data['error_lastname'] = '';
		}
		
		if (isset($this->error['error_telephone'])) {
			$data['error_telephone'] = $this->error['error_telephone'];
		} else {
			$data['error_telephone'] = '';
		}
		
		if (isset($this->error['error_locker_id'])) {
			$data['error_locker_id'] = $this->error['error_locker_id'];
		} else {
			$data['error_locker_id'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$url = '';
		
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
		
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
		
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}
		
		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}
		
		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}
		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$this->document->setTitle($this->language->get('heading_title'));
		
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
		
		if (isset($this->request->get['order_id']) && $this->request->get['order_id']) {
			
			$data['action'] = $this->url->link('sale/tk_boxnow', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, true);
			$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true);
			
			$data['token'] = $this->session->data['user_token'];
			
			if ($this->config->get('shipping_tk_boxnow_warehouse_number')) {
				$data['warehouses'] = explode(',', $this->config->get('shipping_tk_boxnow_warehouse_number'));
			} else {
				$data['warehouses'] = array();
			}
			
			if (isset($this->request->post['warehouse_number']) && $this->request->post['warehouse_number']) {
				$data['warehouse_number'] = $this->request->post['warehouse_number'];
			} else if (isset($data['warehouses'][0])) {
				$data['warehouse_number'] = $data['warehouses'][0];
			} else {
				$data['warehouse_number'] = '';
			}
			
			$data['partner_id'] = $this->config->get('shipping_tk_boxnow_partner_id');
			
			$order = $this->model_sale_order->getOrder($this->request->get['order_id']);
			$boxnow_order = $this->model_extension_shipping_tk_boxnow->getOrder($this->request->get['order_id']);
			
			$data['postcode'] = $order['shipping_postcode'];
			
			if (isset($boxnow_order['parcel']) && $boxnow_order['parcel']) {
				
				$data['parcel'] = $boxnow_order['parcel'];
				
				$data['action_parcel'] = $this->url->link('sale/tk_boxnow/parcel', 'order_id=' . $this->request->get['order_id'] . '&parcel_id=' . $boxnow_order['parcel'] . '&user_token=' . $this->session->data['user_token'] . $url, true);
				
				$data['action_edit'] = $this->url->link('sale/tk_boxnow/edit', 'order_id=' . $this->request->get['order_id'] . '&parcel_id=' . $boxnow_order['parcel'] . '&user_token=' . $this->session->data['user_token'] . $url, true);
			} else {
				$data['parcel'] = '';
			}
			
			if (isset($this->request->post['locker_id']) && $this->request->post['locker_id']) {
				$data['locker_id'] = $this->request->post['locker_id'];
			} else {
				$data['locker_id'] = $boxnow_order['locker_id'];
			}
			
			if (isset($this->request->post['locker_address']) && $this->request->post['locker_address']) {
				$data['locker_address'] = $this->request->post['locker_address'];
			} else {
				$data['locker_address'] = $boxnow_order['locker_address'];
			}
			
			if (isset($this->request->post['locker_name']) && $this->request->post['locker_name']) {
				$data['locker_name'] = $this->request->post['locker_name'];
			} else {
				$data['locker_name'] = $boxnow_order['locker_name'];
			}
			
			if (isset($this->request->post['quantity']) && $this->request->post['quantity'] > 1) {
				$data['quantity'] = $this->request->post['quantity'];
			} else {
				$data['quantity'] = 1;
			}
			
			if (isset($this->request->post['payment_mode']) && $this->request->post['payment_mode']) {
				$data['payment_mode'] = $this->request->post['payment_mode'];
			} else if (isset($order['payment_mode']) && $order['payment_mode']) {
				$data['payment_mode'] = $order['payment_mode'];
			} else if (isset($order['payment_code']) && $order['payment_code'] == 'cod') {
				$data['payment_mode'] = 'cod';
			} else {
				$data['payment_mode'] = 'prepaid';
			}
			
			if (isset($this->request->post['weight'])) {
				$data['weight'] = $this->request->post['weight'];
			} else {
				$op_order_products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);
				$product_weight = array();
				foreach ($op_order_products as $product) {
					$product_weight[$product['product_id']] = 0;
					
					$result = $this->model_catalog_product->getProduct($product['product_id']);
					
					$product_weight[$product['product_id']] += $result['weight'];
					
					$order_options = $this->model_extension_module_tk_checkout->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);
					if ($order_options) {
						foreach ($order_options as $order_option) {
							$option = $this->model_extension_module_tk_checkout->getProductOptionValue($product['product_id'], $order_option['product_option_value_id']);
							
							if (isset($option['weight_prefix']) && isset($option['weight'])) {
								if ($option['weight_prefix'] == '+') {
									$product_weight[$product['product_id']] += $option['weight'];
								} else if ($option['weight_prefix'] == '-') {
									$product_weight[$product['product_id']] -= $option['weight'];
								} else {
									$product_weight[$product['product_id']] = $option['weight'];
								}
							}
						}
					}
					
					$product_weight[$product['product_id']] = $this->weight->convert($product_weight[$product['product_id']], $result['weight_class_id'], $this->config->get('config_weight_class_id'));
					
					if ($product_weight[$product['product_id']] == 0 && $this->config->get('shipping_tk_boxnow_weight_total') && $this->config->get('shipping_tk_boxnow_weight_total') > 0) {
						$product_weight[$product['product_id']] = $this->config->get('shipping_tk_boxnow_weight_total');
					}
					
					$product_weight[$product['product_id']] = $product_weight[$product['product_id']] * $product['quantity'];
				}
				
				$totalWeight = 0;
				foreach ($product_weight as $product_wt) {
					$totalWeight += $product_wt;
				}
				
				if ($this->config->get('shipping_tk_boxnow_weight_type') && $this->config->get('shipping_tk_boxnow_weight_type') == 'gram') {
					$totalWeight = $totalWeight / 1000;
				}
				
				if ($totalWeight < 0.01) {
					$totalWeight = 0.01;
				}
				
				$data['weight'] = $totalWeight;
			}
			
			if (isset($this->request->post['total']) && $this->request->post['total']) {
				$data['total'] = $this->request->post['total'];
			} else {
				
				$totalPrice = 0;
				$totalShipping = 0;
				
				$order_totals = $this->model_sale_order->getOrderTotals($this->request->get['order_id']);
				if (!empty($order_totals)) {
					$not_shipping_total = array(
						'shipping',
						'total'
					);
					$only_shipping = array('shipping');
					
					foreach ($order_totals as $order_total) {
						if (!in_array($order_total['code'], $not_shipping_total)) {
							$totalPrice += $order_total['value'];
						}
						if (in_array($order_total['code'], $only_shipping)) {
							$totalShipping += $order_total['value'];
						}
					}
				}
				
				if ($totalPrice > 0) {
					$totalPrice = $this->currency->convert($totalPrice, $this->config->get('config_currency'), $order['currency_code']);
				}
				
				if ($totalShipping > 0) {
					$totalShipping = $this->currency->convert($totalShipping, $this->config->get('config_currency'), $order['currency_code']);
				}
				
				$totalPrice = $totalPrice + $totalShipping;
				
				$data['total'] = round($totalPrice, 2);
			}
			
			if ($data['payment_mode'] == 'cod') {
				$data['amount_to_be_collected'] = $data['total'];
			} else {
				$data['amount_to_be_collected'] = 0;
			}
			
			if (isset($this->request->post['firstname']) && $this->request->post['firstname']) {
				$data['firstname'] = $this->request->post['firstname'];
			} else {
				$data['firstname'] = $order['shipping_firstname'];
			}
			
			if (isset($this->request->post['lastname']) && $this->request->post['lastname']) {
				$data['lastname'] = $this->request->post['lastname'];
			} else {
				$data['lastname'] = $order['shipping_lastname'];
			}
			
			if (isset($this->request->post['email']) && $this->request->post['email']) {
				$data['email'] = $this->request->post['email'];
			} else {
				$data['email'] = $order['email'];
			}
			
			if (isset($this->request->post['telephone']) && $this->request->post['telephone']) {
				$phone = $this->request->post['telephone'];
			} else {
				$phone = $order['telephone'];
			}
			$data['phone'] = preg_replace('/^(?:\+?359|0)?/m', '+359', $phone);
			
			if (isset($this->request->post['size']) && $this->request->post['size']) {
				$data['size'] = $this->request->post['size'];
			} else {
				$data['size'] = 1;
			}
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				
				$authorization = $this->model_extension_shipping_tk_boxnow->serviceJSON();
				
				if ($authorization) {
					$post = curl_init();
					
					if ($data['locker_id'] != 2) {
						$items[] = array(
							"itemID" => $order['order_id'],
							"value"  => number_format(0, 2, '.', ''),
							"weight" => (float)$data['weight']
						);
					} else {
						$items[] = array(
							"itemID"          => $order['order_id'],
							"value"           => number_format(0, 2, '.', ''),
							"weight"          => (float)$data['weight'],
							"compartmentSize" => (int)$data['size']
						);
					}
					
					$box_data = array(
						"orderNumber"                      => $order['order_id'] . time(),
						"invoiceValue"                     => number_format($data['total'], 2, '.', ''),
						"paymentMode"                      => $data['payment_mode'],
						"amountToBeCollected"              => number_format($data['amount_to_be_collected'], 2, '.', ''),
						"allowReturn"                      => true,
						"origin"                           => array(
							"partnerID"  => $this->config->get('shipping_tk_boxnow_partner_id'),
							"locationId" => strval($data['warehouse_number']),
						),
						"destination"                      => array(
							"contactNumber" => $data['phone'],
							"contactEmail"  => $data['email'],
							"contactName"   => $data['firstname'] . ' ' . $data['lastname'],
							"locationId"    => $data['locker_id'],
						),
						"overwriteSenderShippingLabelInfo" => array(
							"row3" => 'Поръчка ' . $order['order_id']
						),
						"items"                            => $items
					);
					
					$data_json = json_encode($box_data);
					
					// Prepare CURL for delivery request
					curl_setopt_array($post, array(
						CURLOPT_URL            => $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/delivery-requests',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING       => '',
						CURLOPT_MAXREDIRS      => 10,
						CURLOPT_CONNECTTIMEOUT => 5,
						CURLOPT_TIMEOUT        => 20,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST  => 'POST',
						CURLOPT_HTTPHEADER     => array(
							$authorization,
							"Content-Type: application/json",
							"Content-Length:" . strlen($data_json)
						),
						CURLOPT_POSTFIELDS     => $data_json
					));
					$response = curl_exec($post);
					curl_close($post);
					
					if ($response) {
						$response_data = JSON_DECODE($response, true);
						
						$send_data['locker_id'] = $data['locker_id'];
						$send_data['locker_address'] = $data['locker_address'];
						$send_data['locker_name'] = $data['locker_name'];
						
						if (!isset($response_data['status']) && isset($response_data['id'])) {
							$send_data['request_id'] = $response_data['id'];
							$send_data['parcel'] = $response_data['parcels'][0]['id'];
							$send_data['status_id'] = 1;
							$send_data['status_message'] = 'Нова поръчка';
							$send_data['status_code'] = 'new';
							$send_data['status'] = 1;
							
							$send_data['mail_send'] = NULL;
							
							if ($this->config->get('shipping_tk_boxnow_order_status_id')) {
								$api_token = $this->model_extension_module_tk_checkout->getApiToken();
							} else {
								$api_token = '';
							}
							
							// искаме ли да пратим е-маил с номера на товарителницата и да сменим статуса на поръчката
							if ($this->config->get('shipping_tk_boxnow_order_status_id') > 0 && $api_token) {
								if ($this->config->get('shipping_tk_boxnow_order_status_id_mail')) {
									$notify = true;
								} else {
									$notify = false;
								}
								
								if ($this->config->get('shipping_tk_boxnow_order_status_id_mail_text')) {
									$patterns = array();
									$patterns[0] = '{shipment_number}';
									
									$replacements = array();
									$replacements[0] = $send_data['parcel'];
									
									$comment = str_replace($patterns, $replacements, $this->config->get('shipping_tk_boxnow_order_status_id_mail_text'));
								} else {
									$comment = 'Номер на пратка: ' . $send_data['parcel'];
								}
								
								$history_data = array(
									'order_status_id' => $this->config->get('shipping_tk_boxnow_order_status_id'),
									'notify'          => $notify,
									'comment'         => $comment
								);
								
								$this->model_extension_module_tk_checkout->addOrderHistory($order['order_id'], $api_token, $history_data);
							}
							
							$this->model_extension_shipping_tk_boxnow->updateOrder($order['order_id'], $send_data);
							$this->session->data['success'] = $this->language->get('text_voucher_status_success');
							
							$this->response->redirect($this->url->link('sale/order/info', 'order_id=' . $order['order_id'] . '&user_token=' . $this->session->data['user_token'], true));
						} else {
							$error_codes = [
								'P400' => 'Заявка с грешни данни. Информацията изпратена от Вас не може да бъде валидирана.',
								'P401' => 'Заявка с грешна начална точка на пратката. Уверете се, че ползвате валиден ID на локацията, от която BOX NOW ще вземе пратката.',
								'P402' => 'Невалидна крайна дестинация! Уверете се, че използвате правилното ID на локацията (Номер на BOX NOW автомат) и че подадените данни са коректни.',
								'P403' => 'Не Ви е позволено да ползвате доставки от типа (Всеки Автомат към същия автомат) AnyAPM - SameAPM. Обърнете се към техническата поддръжка, ако считате, че това е невярно',
								'P404' => 'Невалиден CSV импорт. Вижте съдържанието на грешката за повече информация.',
								'P405' => 'Невалиден телефонен номер. Проверете дали изпращате телефон в подходящ интернационален формат, пример: +359 xx xxx xxxx.',
								'P406' => 'Невалиден размер. Уверете се, че в заявката си изпращате някой от необходимите размери 1, 2 или 3 (Малък, Среден или Голям). Размерът е задължителна опция, особено когато изпращате от дадена машина директно.',
								'P407' => 'Невалиден код за държавата. Уверете се, че изпращате коректен код за държава във формат по ISO 3166-1alpha-2. Пример: BG',
								'P408' => 'Невалидна стойност на поръчката – сума, която да бъде събрана по наложения платеж. Уверете се, че Вашата поръчка е в допустимите граници, между 0лв и 5000лв',
								'P409' => 'Невалидна референция на партньора. Уверете се, че реферирате валидно ID на партньор.',
								'P410' => 'Конфликт в номера на поръчката. Опитвате се да направите заявка за доставка за ID на поръчката, което е било използвано и/или сте генерирали товарителница за тази поръчка вече. Моля използвайте друго ID за поръчката.',
								'P411' => 'Вие не можете да използвате „наложен платеж“ като тип за плащане. Използвайте друг тип плащане или се свържете с нашият екип по поддръжка.',
								'P412' => 'Вие не можете да създадете заявка за връщане на пратка. Свържете се с нашата поддръжка, ако считате това за невярно.',
								'P420' => 'Не е възможно отказването на пратката. Типа пратки, които можете да откажете са от тип: „new“, „undelivered“. Пратки, които не можете да откажете са в състояние „returned“ или „lost“. Уверете се, че пратката е в процес по доставка и опитайте отново. ',
								'P430' => 'Тази пратка не е в готовност за AnyAPM потвърждение. Най-вероятно пратката е потвърдена за доставка. Обърнете се към поддръжката, ако считате това за невярно.',
							];
							
							$send_data['request_id'] = 0;
							$send_data['status_id'] = 2;
							$send_data['parcel'] = array();
							$send_data['status_message'] = sprintf('Код на грешката: %s.' . (!empty($error_codes[$response_data['code']]) ? $error_codes[$response_data['code']] : 'Непозната грешка'), $response_data['code']);
							$send_data['status'] = $response_data['status'];
							$send_data['status_code'] = NULL;
							
							$this->model_extension_shipping_tk_boxnow->updateOrder($order['order_id'], $send_data);
							
							$this->session->data['error'] = $send_data['status_message'];
							$this->response->redirect($this->url->link('sale/tk_boxnow', 'order_id=' . $this->request->get['order_id'] . '&user_token=' . $this->session->data['user_token'] . $url, true));
						}
					}
				}
			}
		} else {
			$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'], true));
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('sale/tk_boxnow', $data));
	}
	
	public function trace($parcel) {
		
		$this->load->language('extension/shipping/tk_boxnow');
		
		$this->load->model('extension/shipping/tk_boxnow');
		$this->load->model('extension/module/tk_checkout');
		
		$text_statuses = $this->language->get('text_status_boxnow');
		
		$status_code_old = $parcel['status_code'];
		
		$authorization = $this->model_extension_shipping_tk_boxnow->serviceJSON();
		
		if ($authorization) {
			$curl_request = curl_init();
			curl_setopt($curl_request, CURLOPT_URL, $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/parcels?parcelId=' . $parcel['parcel']);
			curl_setopt($curl_request, CURLOPT_HTTPHEADER, array(
				'Accept: application/json',
				'Content-type: application/json',
				$authorization
			));
			curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_request, CURLOPT_POST, 0);
			curl_setopt($curl_request, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($curl_request, CURLOPT_TIMEOUT, 60);
			
			$result = curl_exec($curl_request);
			
			curl_close($curl_request);
			
			$result_data = json_decode($result, true);
			
			if (isset($response['error'])) {
				$response_data['error'] = $response['error'];
			} else if (isset($result['error'])) {
				$response_data['error'] = $result['error'];
			} else if (!isset($result_data['data'][0]['status']) && isset($result_data['data'][0]['state']) && $result_data['data'][0]['state'] != $status_code_old) {
				
				$parcel['request_id'] = $result_data['data'][0]['id'];
				$parcel['status_id'] = 3;
				$parcel['status_message'] = $text_statuses[$result_data['data'][0]['state']];
				$parcel['status_code'] = $result_data['data'][0]['state'];
				$parcel['status'] = 3;
				$parcel['mail_send'] = $result_data['data'][0]['state'];
				
				// искаме ли да сменим статуса
				$tk_boxnow_order_status = $this->config->get('shipping_tk_boxnow_order_status');
				$tk_boxnow_order_status_mail = $this->config->get('shipping_tk_boxnow_order_status_mail');
				$tk_boxnow_order_status_mail_text = $this->config->get('shipping_tk_boxnow_order_status_mail_text');
				
				if (isset($tk_boxnow_order_status[$result_data['data'][0]['state']])) {
					$order_status_id = $tk_boxnow_order_status[$result_data['data'][0]['state']];
				}
				
				if (isset($order_status_id) && $order_status_id > 0) {
					if ($this->config->get('shipping_tk_boxnow_order_status')) {
						$api_token = $this->model_extension_module_tk_checkout->getApiToken();
					} else {
						$api_token = '';
					}
					
					if ($api_token) {
						$order_status_mail = $tk_boxnow_order_status_mail[$result_data['data'][0]['state']];
						
						if (isset($order_status_mail) && $order_status_mail > 0) {
							$order_status_mail_text = $tk_boxnow_order_status_mail_text[$result_data['data'][0]['state']];
							if (!isset($order_status_mail_text) || !$order_status_mail_text) {
								$order_status_mail_text = '';
							}
							$history_data = array(
								'order_status_id' => $order_status_id,
								'notify'          => true,
								'comment'         => $order_status_mail_text
							);
						} else {
							$history_data = array(
								'order_status_id' => $order_status_id,
								'notify'          => false,
								'comment'         => ''
							);
						}
						
						$this->model_extension_module_tk_checkout->addOrderHistory($parcel['order_id'], $api_token, $history_data);
					}
				}
				
				$this->model_extension_shipping_tk_boxnow->updateOrder($parcel['order_id'], $parcel);
				$response_data['success'] = true;
			} else {
				$response_data['error'] = 'Непозната грешка';
			}
		} else {
			$response_data['error'] = 'Проблем с потребителските данни';
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response_data, JSON_UNESCAPED_UNICODE));
	}
	
	// принт на товарителница
	public function parcel() {
		
		$this->load->model('extension/shipping/tk_boxnow');
		
		$authorization = $this->model_extension_shipping_tk_boxnow->serviceJSON();
		
		if ($authorization) {
			
			$parcel_id = '';
			if (isset($this->request->get['parcel_id']) && $this->request->get['parcel_id']) {
				$parcel_id = $this->request->get['parcel_id'];
			}
			
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
				CURLOPT_URL            => $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/parcels/' . $parcel_id . '/label.pdf',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING       => '',
				CURLOPT_MAXREDIRS      => 10,
				CURLOPT_CONNECTTIMEOUT => 5,
				CURLOPT_TIMEOUT        => 20,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST  => 'GET',
				CURLOPT_HTTPHEADER     => array(
					$authorization,
					"Content-Type: application/pdf"
				),
			));
			
			$response = curl_exec($curl);
			
			curl_close($curl);
			
			if ($response) {
				header('Content-Type: application/pdf');
				echo $response;
				exit;
			}
		}
	}
	
	// изтриване на товарителница
	public function cancel() {
		
		$this->load->language('extension/shipping/tk_boxnow');
		
		$this->load->model('extension/shipping/tk_boxnow');
		$this->load->model('sale/order');
		$this->load->model('catalog/product');
		
		$url = '';
		
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
		
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
		
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}
		
		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}
		
		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}
		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		if (isset($this->request->get['order_id']) && $this->request->get['order_id'] && isset($this->request->get['parcel_id']) && $this->request->get['parcel_id']) {
			
			$boxnow_order = $this->model_extension_shipping_tk_boxnow->getOrder($this->request->get['order_id']);
			
			$authorization = $this->model_extension_shipping_tk_boxnow->serviceJSON();
			
			if ($authorization) {
				$post = curl_init();
				
				$box_data = array();
				
				$data_json = json_encode($box_data);
				
				// Prepare CURL for delivery request
				curl_setopt_array($post, array(
					CURLOPT_URL            => $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/parcels/' . $this->request->get['parcel_id'] . ':cancel',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING       => '',
					CURLOPT_MAXREDIRS      => 10,
					CURLOPT_CONNECTTIMEOUT => 5,
					CURLOPT_TIMEOUT        => 20,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST  => 'POST',
					CURLOPT_HTTPHEADER     => array(
						$authorization,
						"Content-Type: application/json",
						"Content-Length:" . strlen($data_json)
					),
					CURLOPT_POSTFIELDS     => $data_json
				));
				
				curl_exec($post);
				
				curl_close($post);
				
				$this->trace($boxnow_order);
			}
		}
		
		$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true));
	}
	
	// ъпдейт на товарителници
	public function update() {
		
		$this->load->language('extension/shipping/tk_boxnow');
		
		$this->load->model('extension/shipping/tk_boxnow');
		$this->load->model('extension/module/tk_checkout');
		
		$text_statuses = $this->language->get('text_status_boxnow');
		
		$tk_boxnow_order_status = $this->config->get('shipping_tk_boxnow_order_status');
		$tk_boxnow_order_status_mail = $this->config->get('shipping_tk_boxnow_order_status_mail');
		$tk_boxnow_order_status_mail_text = $this->config->get('shipping_tk_boxnow_order_status_mail_text');
		
		$loadings = $this->model_extension_shipping_tk_boxnow->getNotDelivered();
		
		if ($loadings) {
			
			$authorization = $this->model_extension_shipping_tk_boxnow->serviceJSON();
			
			if ($authorization) {
				
				if ($this->config->get('shipping_tk_boxnow_order_status')) {
					$api_token = $this->model_extension_module_tk_checkout->getApiToken();
				} else {
					$api_token = '';
				}
				
				foreach ($loadings as $loading) {
					
					$order_status_id = 0;
					$order_status_mail = 0;
					$order_status_mail_text = '';
					
					$status_code_old = $loading['status_code'];
					
					$curl_request = curl_init();
					curl_setopt($curl_request, CURLOPT_URL, $this->config->get('shipping_tk_boxnow_api_url') . '/api/v1/parcels?parcelId=' . $loading['parcel']);
					curl_setopt($curl_request, CURLOPT_HTTPHEADER, array(
						'Accept: application/json',
						'Content-type: application/json',
						$authorization
					));
					curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl_request, CURLOPT_POST, 0);
					curl_setopt($curl_request, CURLOPT_CONNECTTIMEOUT, 5);
					curl_setopt($curl_request, CURLOPT_TIMEOUT, 60);
					
					$response_data = curl_exec($curl_request);
					$response = json_decode($response_data, true);
					
					curl_close($curl_request);
					
					if (!isset($response['data'][0]['status']) && isset($response['data'][0]['state']) && $response['data'][0]['state'] != $status_code_old) {
						$loading['request_id'] = $response['data'][0]['id'];
						$loading['status_id'] = 3;
						$loading['status_message'] = $text_statuses[$response['data'][0]['state']];
						$loading['status_code'] = $response['data'][0]['state'];
						$loading['status'] = 3;
						
						// искаме ли да сменим статуса
						if (isset($tk_boxnow_order_status[$loading['status_code']])) {
							$order_status_id = $tk_boxnow_order_status[$loading['status_code']];
						}
						
						$order_info = $this->model_extension_module_tk_checkout->getOrder($loading['order_id']);
						
						if ($order_status_id > 0 && $order_status_id != $order_info['order_status_id']) {
							
							if ($api_token) {
								
								if (!empty($tk_boxnow_order_status_mail[$loading['status_code']])) {
									$order_status_mail = $tk_boxnow_order_status_mail[$loading['status_code']];
								}
								
								if ($order_status_mail > 0) {
									
									if (!empty($tk_boxnow_order_status_mail_text[$loading['status_code']])) {
										$patterns = array();
										$patterns[0] = '{shipment_number}';
										
										$replacements = array();
										$replacements[0] = $loading['shipment_number'];
										
										$order_status_mail_text = str_replace($patterns, $replacements, $tk_boxnow_order_status_mail_text[$loading['status_code']]);
									}
									
									$history_data = array(
										'order_status_id' => $order_status_id,
										'notify'          => true,
										'comment'         => $order_status_mail_text
									);
								} else {
									$history_data = array(
										'order_status_id' => $order_status_id,
										'notify'          => false,
										'comment'         => ''
									);
								}
								
								if (isset($loading['mail_send']) && $loading['mail_send'] == $loading['status_code']) {
									$history_data['notify'] = false;
								}
								
								$loading['mail_send'] = $loading['status_code'];
								
								$this->model_extension_module_tk_checkout->addOrderHistory($loading['order_id'], $api_token, $history_data);
							}
						}
						
						$this->model_extension_shipping_tk_boxnow->updateOrder($loading['order_id'], $loading);
					}
				}
			}
		}
		
		$response['success'] = true;
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($response, JSON_UNESCAPED_UNICODE));
	}
	
	protected function validate() {
		
		if ((utf8_strlen($this->request->post['firstname']) < 3) || (utf8_strlen($this->request->post['firstname']) > 100)) {
			$this->error['error_firstname'] = $this->language->get('error_firstname');
		}
		
		if ((utf8_strlen($this->request->post['lastname']) < 3) || (utf8_strlen($this->request->post['lastname']) > 100)) {
			$this->error['error_lastname'] = $this->language->get('error_lastname');
		}
		
		if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 100)) {
			$this->error['error_telephone'] = $this->language->get('error_telephone');
		}
		
		if ((utf8_strlen($this->request->post['locker_id']) < 3) || (utf8_strlen($this->request->post['locker_id']) > 100)) {
			$this->error['error_locker_id'] = $this->language->get('error_locker_id');
		}
		
		if (!$this->error) {
			return true;
		} else {
			$this->session->data['error'] = $this->error;
			
			return false;
		}
	}
}