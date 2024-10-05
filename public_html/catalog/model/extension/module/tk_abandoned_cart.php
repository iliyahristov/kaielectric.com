<?php

class ModelExtensionModuleTkAbandonedCart extends Model {
	
	public function getAbandonedCart($cart_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart WHERE cart_id = '" . (int)$cart_id . "' LIMIT 1");
		
		return $query->row;
	}
	
	public function getAbandonedCartByid($abandoned_cart_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "' LIMIT 1");
		
		return $query->row;
	}
	
	public function getAbandonedCarts() {
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tk_abandoned_cart` WHERE send = '0' AND date_added > CURRENT_DATE - INTERVAL 7 DAY AND date_added < CURRENT_DATE");
		
		return $query->rows;
	}
	
	public function getAbandonedCartId($abandoned_cart_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "' LIMIT 1");
		
		if (isset($query->row['cart_id'])) {
			return $query->row['cart_id'];
		}
	}
	
	public function addAbandonedCart($data, $cart_id) {
		
		if (isset($data['email'])) {
			$data['email'] = str_replace(" ", "", $data['email']);
			$data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
		}
		if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$data['email'] = '';
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart SET cart_id = '" . (int)$cart_id . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', email = '" . $this->db->escape($data['email']) . "', currency = '" . $this->db->escape($this->session->data['currency']) . "', status_id = '1', store_id = '" . (int)$this->config->get('config_store_id') . "', store_name = '" . $this->db->escape($this->config->get('config_name')) . "', store_url = '" . $this->db->escape($this->config->get('config_url')) . "', language_id = '" . (int)$this->config->get('config_language_id') . "', language_code = '" . $this->db->escape($this->config->get('config_language')) . "', comment = '', send = 0, data = '" . $this->db->escape(serialize($data)) . "', date_modified = NOW(),date_added = NOW()");
		
		return $this->db->getLastId();
	}
	
	public function updateAbandonedCart($data, $abandoned_cart_id) {
		
		if (isset($data['email'])) {
			$data['email'] = str_replace(" ", "", $data['email']);
			$data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
		}
		if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$data['email'] = '';
		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_abandoned_cart SET firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', email = '" . $this->db->escape($data['email']) . "', currency = '" . $this->db->escape($this->session->data['currency']) . "', status_id = '1', store_id = '" . (int)$this->config->get('config_store_id') . "', store_name = '" . $this->db->escape($this->config->get('config_name')) . "', store_url = '" . $this->db->escape($this->config->get('config_url')) . "', language_id = '" . (int)$this->config->get('config_language_id') . "', language_code = '" . $this->db->escape($this->config->get('config_language')) . "', comment = '', send = 0, data = '" . $this->db->escape(serialize($data)) . "' WHERE abandoned_cart_id  = '" . (int)$abandoned_cart_id . "'");
	}
	
	public function addAbandonedCartProducts($products, $abandoned_cart_id) {
		
		$cart_id = $this->getAbandonedCartId($abandoned_cart_id);
		
		foreach ($products as $product) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_product SET cart_id = '" . $this->db->escape($cart_id) . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', quantity = '" . (int)$product['quantity'] . "', name = '" . $this->db->escape($product['name']) . "', image = '" . $this->db->escape($product['image']) . "', price = '" . $this->db->escape($product['price']) . "'");
			
			$abandoned_cart_product_id = $this->db->getLastId();
			
			if (isset($product['option']) && $product['option']) {
				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_option SET  abandoned_cart_product_id = '" . (int)$abandoned_cart_product_id . "', cart_id = '" . $this->db->escape($cart_id) . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}
	}
	
	public function updateAbandonedCartProducts($products, $abandoned_cart_id) {
		
		$cart_id = $this->getAbandonedCartId($abandoned_cart_id);
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		
		foreach ($products as $product) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_product SET cart_id = '" . $this->db->escape($cart_id) . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', quantity = '" . (int)$product['quantity'] . "', name = '" . $this->db->escape($product['name']) . "', image = '" . $this->db->escape($product['image']) . "', price = '" . $this->db->escape($product['price']) . "'");
			
			$abandoned_cart_product_id = $this->db->getLastId();
			
			if (isset($product['option']) && $product['option']) {
				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_option SET abandoned_cart_product_id = '" . (int)$abandoned_cart_product_id . "', cart_id = '" . $this->db->escape($cart_id) . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}
	}
	
	public function removeAbandonedCart($abandoned_cart_id) {
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
	}
	
	public function removeAbandonedCartByCartId($cart_id) {
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart WHERE cart_id = '" . (int)$cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE cart_id = '" . (int)$cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE cart_id = '" . (int)$cart_id . "'");
	}
	
	public function updateAbandonedCartStatus($abandoned_cart_id) {
		
		$query = "UPDATE " . DB_PREFIX . "tk_abandoned_cart SET  status_id = '2', date_modified = NOW() WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'";
		
		$this->db->query($query);
	}
	
	public function updateAbandonedCartSend($abandoned_cart_id, $send) {
		
		$query = "UPDATE " . DB_PREFIX . "tk_abandoned_cart SET send = '" . (int)$send . "', date_send = NOW() WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'";
		
		$this->db->query($query);
	}
	
	public function getAbandonedCartProducts($abandoned_cart_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		
		return $query->rows;
	}
	
	public function getAbandonedCartOptions($abandoned_cart_id, $product_id, $abandoned_cart_product_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "' AND product_id = '" . (int)$product_id . "' AND abandoned_cart_product_id = '" . (int)$abandoned_cart_product_id . "'");
		
		return $query->rows;
	}
	
	public function sendMail($abandoned_cart_id, $send) {
		
		$this->load->model('setting/setting');
		$this->load->model('tool/image');
		$this->load->model('tool/upload');
		
		$settings = $this->config->get('module_tk_checkout_mail');
		
		$data['column'] = -2;
		foreach ($settings['products'] as $setting_product) {
			if ($setting_product == 1) {
				$data['column']++;
			}
		}
		
		$order_info = $this->getAbandonedCartByid($abandoned_cart_id);
		
		if ($order_info && !empty($order_info['email'])) {
			$email = str_replace(" ", "", $order_info['email']);
			
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$language = new Language($order_info['language_code']);
				$language->load($order_info['language_code']);
				$language->load('tk_checkout/checkout');
				
				$data['text_product'] = $language->get('text_product');
				$data['text_tax'] = $language->get('text_tax');
				$data['text_model'] = $language->get('text_model');
				$data['text_sku'] = $language->get('text_sku');
				$data['text_quantity'] = $language->get('text_quantity');
				$data['text_price'] = $language->get('text_price');
				$data['text_total'] = $language->get('text_total');
				
				$unserialize_data = unserialize($order_info['data']);
				
				if (!empty($unserialize_data['shipping_method']['title'])) {
					$shipping_method = $unserialize_data['shipping_method']['title'];
				} else {
					$shipping_method = '';
				}
				
				if (!empty($unserialize_data['address_1'])) {
					$address = $unserialize_data['address_1'];
				} else {
					$address = '';
				}
				
				if (!empty($unserialize_data['city'])) {
					$city = $unserialize_data['city'];
				} else {
					$city = '';
				}
				
				if (!empty($unserialize_data['zone'])) {
					$zone = $unserialize_data['zone'];
				} else {
					$zone = '';
				}
				
				if (!empty($unserialize_data['country'])) {
					$country = $unserialize_data['country'];
				} else {
					$country = '';
				}
				
				if (!empty($order_info['firstname'])) {
					$firstname = $order_info['firstname'];
				} else {
					$firstname = '';
				}
				
				if (!empty($order_info['lastname'])) {
					$lastname = $order_info['lastname'];
				} else {
					$lastname = '';
				}
				
				if (!empty($order_info['email'])) {
					$email = $order_info['email'];
				} else {
					$email = '';
				}
				
				if (!empty($order_info['telephone'])) {
					$telephone = $order_info['telephone'];
				} else {
					$telephone = '';
				}
				
				$add_to_cart_link = $order_info['store_url'] . 'index.php?route=extension/module/tk_abandoned_cart&id=' . $abandoned_cart_id;
				
				$patterns = array(
					'store_name'       => '{store_name}',
					'store_url'        => '{store_url}',
					'logo'             => '{logo}',
					'date_added'       => '{date_added}',
					'shipping_method'  => '{shipping_method}',
					'firstname'        => '{firstname}',
					'lastname'         => '{lastname}',
					'email'            => '{email}',
					'telephone'        => '{telephone}',
					'country'          => '{country}',
					'zone'             => '{zone}',
					'city'             => '{city}',
					'address'          => '{address}',
					'add_to_cart_link' => '{add_to_cart_link}'
				);
				
				$replacements = array(
					'store_name'       => $order_info['store_name'],
					'store_url'        => $order_info['store_url'],
					'logo'             => $order_info['store_url'] . 'image/' . $this->config->get('config_logo'),
					'date_added'       => date($language->get('date_format_short'), strtotime($order_info['date_added'])),
					'shipping_method'  => $shipping_method,
					'firstname'        => $firstname,
					'lastname'         => $lastname,
					'email'            => $email,
					'telephone'        => $telephone,
					'country'          => $country,
					'zone'             => $zone,
					'city'             => $city,
					'address'          => $address,
					'add_to_cart_link' => $add_to_cart_link
				);
				
				$order_products = $this->getAbandonedCartProducts($abandoned_cart_id);
				
				$data['products'] = array();
				if (isset($settings['products']['status']) && $settings['products']['status'] == 1) {
					
					$data['settings'] = $settings['products'];
					
					foreach ($order_products as $order_product) {
						
						$product_info = $this->getProduct($order_product['product_id'], $order_info['language_id']);
						
						$tax = '';
						if ($product_info['tax_class_id'] > 0) {
							$query = $this->db->query("SELECT title FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . (int)$product_info['tax_class_id'] . "'");
							if ($query->num_rows) {
								$tax = $query->row['title'];
							}
						}
						
						$option_data = array();
						
						$order_options = $this->getAbandonedCartOptions($abandoned_cart_id, $product_info['product_id'], $order_product['abandoned_cart_product_id']);
						
						foreach ($order_options as $order_option) {
							if ($order_option['type'] != 'file') {
								$value = $order_option['value'];
							} else {
								$upload_info = $this->model_tool_upload->getUploadByCode($order_option['value']);
								
								if ($upload_info) {
									$value = $upload_info['name'];
								} else {
									$value = '';
								}
							}
							
							$option_data[] = array(
								'name'  => $order_option['name'],
								'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value)
							);
						}
						
						$image = '';
						if (!empty($product_info['image']) && !empty($settings['products']['image'])) {
							
							if (!$this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width')) {
								$image_width = 100;
							} else {
								$image_width = $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width');
							}
							
							if (!$this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_height')) {
								$image_height = 100;
							} else {
								$image_height = $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_height');
							}
							
							$image = $this->model_tool_image->resize($product_info['image'], $image_width, $image_height);
						}
						
						$data['products'][] = array(
							'name'     => $product_info['name'],
							'image'    => $image,
							'tax'      => $tax,
							'sku'      => $product_info['sku'],
							'model'    => $product_info['model'],
							'option'   => $option_data,
							'quantity' => $order_product['quantity'],
							'price'    => $this->currency->format($product_info['price'], $order_info['currency']),
							'total'    => $this->currency->format($product_info['price'] * $order_product['quantity'], $order_info['currency'])
						);
					}
				}
				
				$from = $this->model_setting_setting->getSettingValue('config_email', $order_info['store_id']);
				
				if (!$from) {
					$from = $this->config->get('config_email');
				}
				
				if (!empty($settings['width'])) {
					$data['width'] = $settings['width'];
				} else {
					$data['width'] = '700px';
				}
				
				if (!empty($settings['title'][$order_info['language_id']])) {
					$data['text_subject'] = $settings['title'][$order_info['language_id']];
				} else {
					$data['text_subject'] = $language->get('text_subject');
				}
				
				$data['header'] = '';
				if (!empty($settings['header'][$order_info['language_id']])) {
					
					$header = html_entity_decode($settings['header'][$order_info['language_id']], ENT_QUOTES, 'UTF-8');
					$header = str_replace("{ ", "{", $header);
					$header = str_replace(" }", "}", $header);
					
					$data['header'] = trim(str_replace($patterns, $replacements, $header));
				}
				
				$data['footer'] = '';
				if (!empty($settings['footer'][$order_info['language_id']])) {
					
					$footer = html_entity_decode($settings['footer'][$order_info['language_id']], ENT_QUOTES, 'UTF-8');
					$footer = str_replace("{ ", "{", $footer);
					$footer = str_replace(" }", "}", $footer);
					
					$data['footer'] = trim(str_replace($patterns, $replacements, $footer));
				}
				
				$mail = new Mail($this->config->get('config_mail_engine'));
				$mail->parameter = $this->config->get('config_mail_parameter');
				$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
				$mail->smtp_username = $this->config->get('config_mail_smtp_username');
				$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
				$mail->smtp_port = $this->config->get('config_mail_smtp_port');
				$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
				
				$mail->setTo($email);
				$mail->setFrom($from);
				$mail->setSender(html_entity_decode($order_info['store_name'], ENT_QUOTES, 'UTF-8'));
				$mail->setSubject(html_entity_decode($data['text_subject'], ENT_QUOTES, 'UTF-8'));
				$mail->setHtml($this->load->view('mail/tk_abandoned_mail', $data));
				
				$mail->send();
				
				$this->updateAbandonedCartSend($abandoned_cart_id, $send);
			}
		}
	}
	
	public function getProduct($product_id, $language_id) {
		
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$language_id . "'");
		
		return $query->row;
	}
}