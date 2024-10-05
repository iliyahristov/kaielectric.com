<?php
class ModelExtensionModuleAbandonedCart extends Model{
	
	public function getAbandonedCart($cart_id){
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart WHERE cart_id = '" . (int)$cart_id . "' LIMIT 1");

		return $query->row;
		
	}
	
	public function getAbandonedCartId($cart_id){
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart WHERE cart_id = '" . (int)$cart_id . "' LIMIT 1");

		if(isset($query->row['cart_id'])){
			return $query->row['cart_id'];
		}
	}
	
	public function addAbandonedCart($data, $cart_id){
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart SET cart_id = '" . (int)$cart_id . "',firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', email = '" . $this->db->escape($data['email']) . "', currency = '" . $this->db->escape($this->session->data['currency']) . "', status_id = '1', store_id = '" . (int)$this->config->get('config_store_id') . "', store_name = '" . $this->db->escape($this->config->get('config_name')) . "', data = '" . $this->db->escape(serialize($data)) . "', date_modified = NOW(),date_added = NOW()");

		return $this->db->getLastId();
		
	}
	
	public function updateAbandonedCart($data, $abandoned_cart_id){
		
		$this->db->query("UPDATE " . DB_PREFIX . "tk_abandoned_cart SET firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', email = '" . $this->db->escape($data['email']) . "', currency = '" . $this->db->escape($this->session->data['currency']) . "', data = '" . $this->db->escape(serialize($data)) . "' WHERE abandoned_cart_id  = '" . (int)$abandoned_cart_id . "'");
		
	}
	
	public function addAbandonedCartProducts($products, $abandoned_cart_id){
		
		$cart_id = $this->getAbandonedCartId($abandoned_cart_id);
		
		foreach($products as $product){
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_product SET cart_id = '" . (int)$cart_id . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', quantity = '" . (int)$product['quantity'] . "', name = '" . $this->db->escape($product['name']) . "', image = '" . $this->db->escape($product['image']) . "', price = '" . $this->db->escape($product['price']) . "'");
			
			if(isset($product['option']) && $product['option']){
				foreach($product['option'] as $option){
					$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_option SET cart_id = '" . (int)$cart_id . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}
	}
	
	public function updateAbandonedCartProducts($products, $abandoned_cart_id){
		
		$cart_id = $this->getAbandonedCartId($abandoned_cart_id);
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		
		foreach($products as $product){
			$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_product SET cart_id = '" . (int)$cart_id . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', quantity = '" . (int)$product['quantity'] . "', name = '" . $this->db->escape($product['name']) . "', image = '" . $this->db->escape($product['image']) . "', price = '" . $this->db->escape($product['price']) . "'");
			
			if(isset($product['option']) && $product['option']){
				foreach($product['option'] as $option){
					$this->db->query("INSERT INTO " . DB_PREFIX . "tk_abandoned_cart_option SET cart_id = '" . (int)$cart_id . "', abandoned_cart_id = '" . (int)$abandoned_cart_id . "', product_id = '" . (int)$product['product_id'] . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}
	}
	
	public function removeAbandonedCart($abandoned_cart_id){
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
		
	}
	
	public function removeAbandonedCartByCartId($cart_id){
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart WHERE cart_id = '" . (int)$cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE cart_id = '" . (int)$cart_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE cart_id = '" . (int)$cart_id . "'");
		
	}
	
	public function updateAbandonedCartStatus($abandoned_cart_id) {
		
        $query = "UPDATE " . DB_PREFIX . "tk_abandoned_cart SET  status_id = '2', date_modified = NOW() WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'";

        $this->db->query($query);
    }

}