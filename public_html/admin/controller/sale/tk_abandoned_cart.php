<?php

class ControllerSaleTkAbandonedCart extends Controller {
	
	private $error = array();
	
	public function index() {
		
		$this->load->language('sale/tk_abandoned_cart');
		
		$this->document->setTitle(strip_tags($this->language->get('heading_title')));
		
		$this->load->model('localisation/language');
		$this->load->model('sale/tk_abandoned_cart');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			if ($this->request->post['action'] == 'delete' && isset($this->request->post['selected'])) {
				$this->model_sale_tk_abandoned_cart->deleteQuickOrders($this->request->post['selected']);
			}
			
			$this->response->redirect($this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}
		
		$data = array();
		
		if (isset($this->request->get['filter_abandoned_cart_id'])) {
			$filter_abandoned_cart_id = $this->request->get['filter_abandoned_cart_id'];
		} else {
			$filter_abandoned_cart_id = '';
		}
		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}
		
		if (isset($this->request->get['filter_telephone'])) {
			$filter_telephone = $this->request->get['filter_telephone'];
		} else {
			$filter_telephone = '';
		}
		
		if (isset($this->request->get['filter_email'])) {
			$filter_email = $this->request->get['filter_email'];
		} else {
			$filter_email = '';
		}
		
		if (isset($this->request->get['filter_comment'])) {
			$filter_comment = $this->request->get['filter_comment'];
		} else {
			$filter_comment = '';
		}
		
		if (isset($this->request->get['filter_send'])) {
			$filter_send = $this->request->get['filter_send'];
		} else {
			$filter_send = '';
		}
		
		if (isset($this->request->get['filter_status_id'])) {
			$filter_status_id = $this->request->get['filter_status_id'];
		} else {
			$filter_status_id = '';
		}
		
		if (isset($this->request->get['filter_date_from'])) {
			$filter_date_from = $this->request->get['filter_date_from'];
		} else {
			$filter_date_from = '';
		}
		
		if (isset($this->request->get['filter_date_to'])) {
			$filter_date_to = $this->request->get['filter_date_to'];
		} else {
			$filter_date_to = '';
		}
		
		if (isset($this->request->get['filter_store'])) {
			$filter_store = $this->request->get['filter_store'];
		} else {
			$filter_store = '';
		}
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'order_id';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}
		
		$url = '';
		
		if (isset($this->request->get['filter_abandoned_cart_id'])) {
			$url .= '&filter_abandoned_cart_id=' . $this->request->get['filter_abandoned_cart_id'];
		}
		
		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_telephone'])) {
			$url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_comment'])) {
			$url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_send'])) {
			$url .= '&filter_send=' . urlencode(html_entity_decode($this->request->get['filter_send'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_status_id'])) {
			$url .= '&filter_status_id=' . $this->request->get['filter_status_id'];
		}
		
		if (isset($this->request->get['filter_date_from'])) {
			$url .= '&filter_date_from=' . $this->request->get['filter_date_from'];
		}
		
		if (isset($this->request->get['filter_date_to'])) {
			$url .= '&filter_date_to=' . $this->request->get['filter_date_to'];
		}
		
		if (isset($this->request->get['filter_store'])) {
			$url .= '&filter_store=' . $this->request->get['filter_store'];
		}
		
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$data['sort_abandoned_cart_id'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=abandoned_cart_id' . $url, true);
		$data['sort_name'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_status_id'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=status_id' . $url, true);
		$data['sort_price'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=price' . $url, true);
		$data['sort_date_added'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=date_added' . $url, true);
		$data['sort_date_modified'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=date_modified' . $url, true);
		$data['sort_send'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=send' . $url, true);
		$data['sort_date_send'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=date_send' . $url, true);
		$data['sort_store'] = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . '&sort=store_id' . $url, true);
		
		$data['statuses'] = $this->language->get('text_statuses');
		$data['send_statuses'] = $this->language->get('text_send_statuses');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_success'] = $this->language->get('text_success');
		$data['text_success_delete'] = $this->language->get('text_success_delete');
		$data['text_success_update'] = $this->language->get('text_success_update');
		$data['text_list'] = $this->language->get('text_list');
		$data['text_add'] = $this->language->get('text_add');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_filter'] = $this->language->get('text_filter');
		$data['text_order_detail'] = $this->language->get('text_order_detail');
		$data['text_customer_detail'] = $this->language->get('text_customer_detail');
		$data['text_option'] = $this->language->get('text_option');
		$data['text_store'] = $this->language->get('text_store');
		$data['text_date_added'] = $this->language->get('text_date_added');
		$data['text_payment_method'] = $this->language->get('text_payment_method');
		$data['text_shipping_method'] = $this->language->get('text_shipping_method');
		$data['text_customer'] = $this->language->get('text_customer');
		$data['text_customer_group'] = $this->language->get('text_customer_group');
		$data['text_email'] = $this->language->get('text_email');
		$data['text_telephone'] = $this->language->get('text_telephone');
		$data['text_invoice'] = $this->language->get('text_invoice');
		$data['text_reward'] = $this->language->get('text_reward');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_payment_address'] = $this->language->get('text_payment_address');
		$data['text_shipping_address'] = $this->language->get('text_shipping_address');
		$data['text_comment'] = $this->language->get('text_comment');
		$data['text_send'] = $this->language->get('text_send');
		$data['text_history'] = $this->language->get('text_history');
		$data['text_history_add'] = $this->language->get('text_history_add');
		$data['text_account_custom_field'] = $this->language->get('text_account_custom_field');
		$data['text_payment_custom_field'] = $this->language->get('text_payment_custom_field');
		$data['text_shipping_custom_field'] = $this->language->get('text_shipping_custom_field');
		$data['text_browser'] = $this->language->get('text_browser');
		$data['text_ip'] = $this->language->get('text_ip');
		$data['text_forwarded_ip'] = $this->language->get('text_forwarded_ip');
		$data['text_user_agent'] = $this->language->get('text_user_agent');
		$data['text_accept_language'] = $this->language->get('text_accept_language');
		$data['text_order_id'] = $this->language->get('text_order_id');
		$data['text_fax'] = $this->language->get('text_fax');
		$data['text_website'] = $this->language->get('text_website');
		$data['text_invoice_no'] = $this->language->get('text_invoice_no');
		$data['text_invoice_date'] = $this->language->get('text_invoice_date');
		$data['column_order_id'] = $this->language->get('column_order_id');
		$data['column_customer'] = $this->language->get('column_customer');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_date_modified'] = $this->language->get('column_date_modified');
		$data['column_date_send'] = $this->language->get('column_date_send');
		$data['column_send'] = $this->language->get('column_send');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_product'] = $this->language->get('column_product');
		$data['column_model'] = $this->language->get('column_model');
		$data['column_quantity'] = $this->language->get('column_quantity');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_comment'] = $this->language->get('column_comment');
		$data['column_notify'] = $this->language->get('column_notify');
		$data['column_location'] = $this->language->get('column_location');
		$data['column_reference'] = $this->language->get('column_reference');
		$data['column_weight'] = $this->language->get('column_weight');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_action'] = $this->language->get('column_action');
		$data['column_shipping_method'] = $this->language->get('column_shipping_method');
		$data['column_address'] = $this->language->get('column_address');
		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_customer'] = $this->language->get('entry_customer');
		$data['column_store'] = $this->language->get('column_store');
		$data['button_add_to_cart'] = $this->language->get('button_add_to_cart');
		$data['entry_date_to'] = $this->language->get('entry_date_to');
		$data['entry_date_from'] = $this->language->get('entry_date_from');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$data['entry_firstname'] = $this->language->get('entry_firstname');
		$data['entry_lastname'] = $this->language->get('entry_lastname');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_telephone'] = $this->language->get('entry_telephone');
		$data['entry_fax'] = $this->language->get('entry_fax');
		$data['entry_address'] = $this->language->get('entry_address');
		$data['entry_company'] = $this->language->get('entry_company');
		$data['entry_address_1'] = $this->language->get('entry_address_1');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['entry_zone_code'] = $this->language->get('entry_zone_code');
		$data['entry_product'] = $this->language->get('entry_product');
		$data['entry_option'] = $this->language->get('entry_option');
		$data['entry_quantity'] = $this->language->get('entry_quantity');
		$data['entry_to_name'] = $this->language->get('entry_to_name');
		$data['entry_to_email'] = $this->language->get('entry_to_email');
		$data['entry_from_name'] = $this->language->get('entry_from_name');
		$data['entry_from_email'] = $this->language->get('entry_from_email');
		$data['entry_theme'] = $this->language->get('entry_theme');
		$data['entry_message'] = $this->language->get('entry_message');
		$data['entry_amount'] = $this->language->get('entry_amount');
		$data['entry_affiliate'] = $this->language->get('entry_affiliate');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_notify'] = $this->language->get('entry_notify');
		$data['entry_override'] = $this->language->get('entry_override');
		$data['entry_comment'] = $this->language->get('entry_comment');
		$data['entry_currency'] = $this->language->get('entry_currency');
		$data['entry_shipping_method'] = $this->language->get('entry_shipping_method');
		$data['entry_payment_method'] = $this->language->get('entry_payment_method');
		$data['entry_coupon'] = $this->language->get('entry_coupon');
		$data['entry_voucher'] = $this->language->get('entry_voucher');
		$data['entry_reward'] = $this->language->get('entry_reward');
		$data['entry_order_id'] = $this->language->get('entry_order_id');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_date_modified'] = $this->language->get('entry_date_modified');
		$data['button_filter'] = $this->language->get('button_filter');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_send'] = $this->language->get('button_send');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['entry_send'] = $this->language->get('entry_send');
		$data['column_send'] = $this->language->get('column_send');
		$data['column_date_send'] = $this->language->get('column_date_send');
		
		// Stores
		$this->load->model('setting/store');
		
		$data['stores'] = array();
		
		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);
		
		$results = $this->model_setting_store->getStores();
		
		foreach ($results as $result) {
			$data['stores'][] = array(
				'store_id' => $result['store_id'],
				'name'     => $result['name']
			);
		}
		
		$data['orders'] = array();
		
		$filter_data = array(
			'filter_abandoned_cart_id' => $filter_abandoned_cart_id,
			'filter_name'              => $filter_name,
			'filter_telephone'         => $filter_telephone,
			'filter_email'             => $filter_email,
			'filter_comment'           => $filter_comment,
			'filter_send'              => $filter_send,
			'filter_status_id'         => $filter_status_id,
			'filter_date_from'         => $filter_date_from,
			'filter_date_to'           => $filter_date_to,
			'filter_store'             => $filter_store,
			'sort'                     => $sort,
			'order'                    => $order,
			'start'                    => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                    => $this->config->get('config_limit_admin')
		);
		
		$this->load->model('tool/image');
		
		$order_total = $this->model_sale_tk_abandoned_cart->getTotalAbandonedCarts($filter_data);
		
		$results = $this->model_sale_tk_abandoned_cart->getAbandonedCarts($filter_data);
		
		foreach ($results as $result) {
			
			$products = $this->model_sale_tk_abandoned_cart->getAbandonedCartProducts($result['abandoned_cart_id']);
			
			$products_data = array();
			
			$total = 0;
			foreach ($products as $product) {
				
				$total += $product['price'] * $product['quantity'];
				
				if (is_file(DIR_IMAGE . $product['image'])) {
					$image = $this->model_tool_image->resize($product['image'], 40, 40);
				} else {
					$image = $this->model_tool_image->resize('no_image.png', 40, 40);
				}
				
				$option_data = array();
				
				$options = $this->model_sale_tk_abandoned_cart->getAbandonedCartOptions($result['abandoned_cart_id'], $product['product_id'], $product['abandoned_cart_product_id']);
				
				if ($options) {
					foreach ($options as $option) {
						$option_data[] = array(
							'name'  => $option['name'],
							'value' => $option['value'],
							'type'  => $option['type']
						);
					}
				}
				
				$products_data[] = array(
					'product_id' => $product['product_id'],
					'name'       => $product['name'],
					'image'      => $image,
					'quantity'   => $product['quantity'],
					'price'      => $this->currency->format($product['price'], $result['currency']),
					'link'       => $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $product['product_id'], true),
					'options'    => $option_data
				);
			}
			
			$unserialize_data = unserialize($result['data']);
			
			if (!empty($unserialize_data['shipping_method']['title'])) {
				$shipping_method = $unserialize_data['shipping_method']['title'];
			} else {
				$shipping_method = '';
			}
			
			if (!empty($unserialize_data['address_1'])) {
				$address_1 = $unserialize_data['address_1'];
			} else {
				$address_1 = '';
			}
			
			if (!empty($unserialize_data['city'])) {
				$city = $unserialize_data['city'] . ', ';
			} else {
				$city = '';
			}
			
			if (!empty($unserialize_data['zone'])) {
				$zone = $unserialize_data['zone'] . ', ';
			} else {
				$zone = '';
			}
			
			if (!empty($unserialize_data['country'])) {
				$country = $unserialize_data['country'] . ', ';
			} else {
				$country = '';
			}
			
			if (!empty($data['statuses'][$result['status_id']])) {
				$status = $data['statuses'][$result['status_id']];
			} else {
				$status = $data['statuses'][1];
			}
			
			if (!empty($data['send_statuses'][$result['send']])) {
				$send = $data['send_statuses'][$result['send']];
			} else {
				$send = $data['statuses'][0];
			}
			
			$data['orders'][] = array(
				'abandoned_cart_id' => $result['abandoned_cart_id'],
				'name'              => $result['firstname'] . ' ' . $result['lastname'],
				'telephone'         => $result['telephone'],
				'email'             => $result['email'],
				'comment'           => $result['comment'],
				'shipping_method'   => $shipping_method,
				'address'           => $country . $zone . $city . $address_1,
				'total'             => $this->currency->format($total, $result['currency']),
				'status_id'         => $result['status_id'],
				'status'            => $status,
				'send_status'       => $send,
				'send'              => $result['send'],
				'store_id'          => $result['store_id'],
				'store_name'        => $result['store_name'],
				'date_added'        => $result['date_added'],
				'date_modified'     => $result['date_modified'],
				'date_send'         => $result['date_send'],
				'products'          => $products_data
			);
		}
		
		$data['catalog'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
		
		$data['user_token'] = $this->session->data['user_token'];
		
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
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);
		
		$url = '';
		
		if (isset($this->request->get['filter_abandoned_cart_id'])) {
			$url .= '&filter_abandoned_cart_id=' . $this->request->get['filter_abandoned_cart_id'];
		}
		
		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_telephone'])) {
			$url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_comment'])) {
			$url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_send'])) {
			$url .= '&filter_send=' . urlencode(html_entity_decode($this->request->get['filter_send'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_status_id'])) {
			$url .= '&filter_status_id=' . $this->request->get['filter_status_id'];
		}
		
		if (isset($this->request->get['filter_date_from'])) {
			$url .= '&filter_date_from=' . $this->request->get['filter_date_from'];
		}
		
		if (isset($this->request->get['filter_date_to'])) {
			$url .= '&filter_date_to=' . $this->request->get['filter_date_to'];
		}
		
		if (isset($this->request->get['filter_store'])) {
			$url .= '&filter_store=' . $this->request->get['filter_store'];
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
		
		$pagination = new Pagination();
		$pagination->total = $order_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);
		
		$data['pagination'] = $pagination->render();
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($order_total - $this->config->get('config_limit_admin'))) ? $order_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $order_total, ceil($order_total / $this->config->get('config_limit_admin')));
		
		$data['filter_abandoned_cart_id'] = $filter_abandoned_cart_id;
		$data['filter_name'] = $filter_name;
		$data['filter_telephone'] = $filter_telephone;
		$data['filter_email'] = $filter_email;
		$data['filter_comment'] = $filter_comment;
		$data['filter_send'] = $filter_send;
		$data['filter_status_id'] = $filter_status_id;
		$data['filter_date_from'] = $filter_date_from;
		$data['filter_date_to'] = $filter_date_to;
		$data['filter_store'] = $filter_store;
		
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('sale/tk_abandoned_cart', $data));
	}
	
	public function add_to_cart() {
		
		$json = array();
		
		unset($this->session->data['cart']);
		unset($this->session->data['tk_checkout']);
		unset($this->session->data['guest']);
		
		$this->load->model('sale/tk_abandoned_cart');
		
		$this->session->data['abandoned_cart'] = array();
		
		if ($this->request->get['abandoned_cart_id']) {
			
			$abandoned_cart = $this->model_sale_tk_abandoned_cart->getAbandonedCart($this->request->get['abandoned_cart_id']);
			
			$products = $this->model_sale_tk_abandoned_cart->getAbandonedCartProducts($abandoned_cart['abandoned_cart_id']);
			
			$products_data = array();
			
			foreach ($products as $product) {
				
				$option_data = array();
				$options = $this->model_sale_tk_abandoned_cart->getAbandonedCartOptions($abandoned_cart['abandoned_cart_id'], $product['product_id'], $product['abandoned_cart_product_id']);
				
				foreach ($options as $option) {
					if ($option['type'] == 'image_checkbox' || $option['type'] == 'button_checkbox' || $option['type'] == 'checkbox') {
						$option_data[$option['product_option_id']][] = $option['product_option_value_id'];
					} elseif ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
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
			
			$json['redirect'] = HTTPS_CATALOG . "index.php?route=extension/module/tk_abandoned_cart/add_to_cart&store_id=" . $abandoned_cart['store_id'];
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function delete() {
		
		$this->load->language('sale/tk_abandoned_cart');
		
		$url = '';
		$json = array();
		
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
		
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_telephone'])) {
			$url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_comment'])) {
			$url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_send'])) {
			$url .= '&filter_send=' . urlencode(html_entity_decode($this->request->get['filter_send'], ENT_QUOTES, 'UTF-8'));
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
		
		if ($this->request->get['abandoned_cart_id']) {
			
			$this->load->model('sale/tk_abandoned_cart');
			
			$this->model_sale_tk_abandoned_cart->deleteAbandonedCart($this->request->get['abandoned_cart_id']);
			
			$this->session->data['success'] = $this->language->get('text_success_delete');
			
			$json['redirect'] = str_replace('&amp;', '&', $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function update() {
		
		$this->load->language('sale/tk_abandoned_cart');
		
		$url = '';
		
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
		
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_telephone'])) {
			$url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_comment'])) {
			$url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_send'])) {
			$url .= '&filter_send=' . urlencode(html_entity_decode($this->request->get['filter_send'], ENT_QUOTES, 'UTF-8'));
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
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('sale/tk_abandoned_cart');
			
			if (!empty($this->request->post['comment'])) {
				$comment = $this->request->post['comment'];
			} else {
				$comment = '';
			}
			
			if (!empty($this->request->post['status_id'])) {
				$status_id = $this->request->post['status_id'];
			} else {
				$status_id = 1;
			}
			
			$this->model_sale_tk_abandoned_cart->updateAbandonedCartComment($this->request->post['abandoned_cart_id'], $comment, $status_id);
			
			$this->session->data['success'] = $this->language->get('text_success_update') . " " . $this->request->post['abandoned_cart_id'];
		}
		
		$this->response->redirect($this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}
	
	public function send() {
		
		$this->load->language('sale/tk_abandoned_cart');
		
		$url = '';
		$json = array();
		
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
		
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_telephone'])) {
			$url .= '&filter_telephone=' . urlencode(html_entity_decode($this->request->get['filter_telephone'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . urlencode(html_entity_decode($this->request->get['filter_email'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_comment'])) {
			$url .= '&filter_comment=' . urlencode(html_entity_decode($this->request->get['filter_comment'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_send'])) {
			$url .= '&filter_send=' . urlencode(html_entity_decode($this->request->get['filter_send'], ENT_QUOTES, 'UTF-8'));
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
		
		if ($this->request->get['abandoned_cart_id']) {
			$this->load->model('sale/tk_abandoned_cart');
			
			$this->model_sale_tk_abandoned_cart->sendMail($this->request->get['abandoned_cart_id'], 1);
			
			$this->session->data['success'] = $this->language->get('text_success_send') . " " . $this->request->get['abandoned_cart_id'];
		}
		
		$json['redirect'] = str_replace('&amp;', '&', $this->url->link('sale/tk_abandoned_cart', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	protected function validate() {
		
		if (!$this->user->hasPermission('modify', 'sale/tk_abandoned_cart')) {
			$this->error['warning'] = 'You do not have permission to perform this action!';
		}
		
		return !$this->error;
	}
}