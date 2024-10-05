<?php

class ModelSaleTkAbandonedCart extends Model {
	
	public function getAbandonedCarts($data = array()) {
		
		$sql = "SELECT * FROM `" . DB_PREFIX . "tk_abandoned_cart` ";
		
		$sql .= " WHERE abandoned_cart_id > '0'";
		
		if (isset($data['filter_status_id']) && $data['filter_status_id'] !== '') {
			$sql .= " AND status_id = '" . (int)$data['filter_status_id'] . "'";
		} else {
			$sql .= " AND status_id < '90'";
		}
		
		if (!empty($data['filter_abandoned_cart_id'])) {
			$sql .= " AND abandoned_cart_id = '" . (int)$data['filter_abandoned_cart_id'] . "'";
		}
		
		if (!empty($data['filter_name'])) {
			$sql .= " AND firstname LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}
		
		if (!empty($data['filter_email'])) {
			$sql .= " AND email LIKE '%" . $this->db->escape($data['filter_email']) . "%'";
		}
		
		if (!empty($data['filter_telephone'])) {
			$sql .= " AND telephone LIKE '%" . $this->db->escape($data['filter_telephone']) . "%'";
		}
		
		if (!empty($data['filter_date_from'])) {
			$sql .= " AND DATE(date_added) >= DATE('" . $this->db->escape($data['filter_date_from']) . "')";
		}
		
		if (!empty($data['filter_date_to'])) {
			$sql .= " AND DATE(date_added) <= DATE('" . $this->db->escape($data['filter_date_to']) . "')";
		}
		
		if (!empty($data['filter_store'])) {
			$sql .= " AND store_id = '" . (float)$data['filter_store'] . "'";
		}
		
		if (!empty($data['filter_comment'])) {
			$sql .= " AND comment LIKE '%" . $this->db->escape($data['filter_comment']) . "%'";
		}
		
		if (!empty($data['filter_send'])) {
			$sql .= " AND send = '" . (int)$data['filter_send'] . "'";
		}
		
		$sort_data = array(
			'abandoned_cart_id',
			'firstname',
			'status_id',
			'date_added',
			'store_id',
			'send'
		);
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY abandoned_cart_id";
		}
		
		if (isset($data['order']) && ($data['order'] == 'ASC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
		}
		
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			
			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getTotalAbandonedCarts($data = array()) {
		
		$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "tk_abandoned_cart`";
		
		$sql .= " WHERE abandoned_cart_id > '0'";
		
		if (isset($data['filter_status_id']) && $data['filter_status_id'] !== '') {
			$sql .= " AND status_id = '" . (int)$data['filter_status_id'] . "'";
		} else {
			$sql .= " AND status_id < '90'";
		}
		
		if (!empty($data['filter_abandoned_cart_id'])) {
			$sql .= " AND abandoned_cart_id = '" . (int)$data['filter_abandoned_cart_id'] . "'";
		}
		
		if (!empty($data['filter_name'])) {
			$sql .= " AND firstname LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}
		
		if (!empty($data['filter_email'])) {
			$sql .= " AND email LIKE '%" . $this->db->escape($data['filter_email']) . "%'";
		}
		
		if (!empty($data['filter_telephone'])) {
			$sql .= " AND telephone LIKE '%" . $this->db->escape($data['filter_telephone']) . "%'";
		}
		
		if (!empty($data['filter_date_from'])) {
			$sql .= " AND DATE(date_added) >= DATE('" . $this->db->escape($data['filter_date_from']) . "')";
		}
		
		if (!empty($data['filter_date_to'])) {
			$sql .= " AND DATE(date_added) <= DATE('" . $this->db->escape($data['filter_date_to']) . "')";
		}
		
		if (!empty($data['filter_store'])) {
			$sql .= " AND store_id = '" . (float)$data['filter_store'] . "'";
		}
		
		if (!empty($data['filter_comment'])) {
			$sql .= " AND comment LIKE '%" . $this->db->escape($data['filter_comment']) . "%'";
		}
		
		if (!empty($data['filter_send'])) {
			$sql .= " AND send = '" . (int)$data['filter_send'] . "'";
		}
		
		$query = $this->db->query($sql);
		
		return $query->row['total'];
	}
	
	public function getAbandonedCartProducts($abandoned_cart_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		
		return $query->rows;
	}
	
	public function getAbandonedCartOptions($abandoned_cart_id, $product_id, $abandoned_cart_product_id) {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "' AND product_id = '" . (int)$product_id . "' AND abandoned_cart_product_id = '" . (int)$abandoned_cart_product_id . "'");
		
		return $query->rows;
	}
	
	public function getAbandonedCart($abandoned_cart_id) {
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tk_abandoned_cart` WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		
		return $query->row;
	}
	
	public function updateAbandonedCartComment($abandoned_cart_id, $comment, $status_id) {
		
		$query = "UPDATE " . DB_PREFIX . "tk_abandoned_cart SET comment = '" . $this->db->escape($comment) . "', status_id = '" . (int)$this->db->escape($status_id) . "',  date_modified = NOW() WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'";
		
		$this->db->query($query);
	}
	
	public function updateAbandonedCartSend($abandoned_cart_id, $send) {
		
		$query = "UPDATE " . DB_PREFIX . "tk_abandoned_cart SET send = '" . (int)$send . "', date_send = NOW() WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'";
		
		$this->db->query($query);
	}
	
	public function deleteAbandonedCart($abandoned_cart_id) {
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
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
		
		$order_info = $this->getAbandonedCart($abandoned_cart_id);
		
		if ($order_info) {
			$language = new Language($order_info['language_code']);
			$language->load($order_info['language_code']);
			$language->load('sale/tk_abandoned_cart');
			
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
						
						if(!$this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width')){
							$image_width = 100;
						} else {
							$image_width = $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width');
						}
						
						if(!$this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_height')){
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
						'price'    => $this->currency->format($order_product['price'], $order_info['currency']),
						'total'    => $this->currency->format($order_product['price'] * $order_product['quantity'], $order_info['currency'])
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
			
			//$this->log->write($this->load->view('extension/module/tk_abandoned_mail', $data));
			
			$mail = new Mail($this->config->get('config_mail_engine'));
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
			$mail->smtp_username = $this->config->get('config_mail_smtp_username');
			$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
			$mail->smtp_port = $this->config->get('config_mail_smtp_port');
			$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
			
			$email = str_replace(" ", "", $order_info['email']);
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			
			$mail->setTo($email);
			$mail->setFrom($from);
			$mail->setSender(html_entity_decode($order_info['store_name'], ENT_QUOTES, 'UTF-8'));
			$mail->setSubject(html_entity_decode($data['text_subject'], ENT_QUOTES, 'UTF-8'));
			$mail->setHtml($this->load->view('extension/module/tk_abandoned_mail', $data));
			
			$mail->send();
			
			$this->updateAbandonedCartSend($abandoned_cart_id, $send);
		}
	}
	
	public function getProduct($product_id, $language_id) {
		
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$language_id . "'");
		
		return $query->row;
	}
	
}