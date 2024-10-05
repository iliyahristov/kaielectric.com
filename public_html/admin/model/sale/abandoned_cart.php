<?php

class ModelSaleAbandonedCart extends Model{
	
	public function getAbandonedCarts($data = array()) {
		$sql = "SELECT * FROM `" . DB_PREFIX . "tk_abandoned_cart` ";
		
		$sql .= " WHERE abandoned_cart_id > '0'";
		
		
		if (isset($data['filter_status_id']) && $data['filter_status_id'] !== '') {
			$sql .= " AND status_id = '" . (int)$data['filter_status_id'] . "'";
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


		$sort_data = array(
			'abandoned_cart_id',
			'firstname',
			'status_id',
			'date_added',
			'store_id'
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

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	
	public function getAbandonedCartProducts($abandoned_cart_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");

		return $query->rows;
	}
	
	public function getAbandonedCartOptions($abandoned_cart_id, $product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "' AND product_id = '" . (int)$product_id . "'");

		return $query->rows;
	}
	
	public function getAbandonedCart($abandoned_cart_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tk_abandoned_cart` WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");

		return $query->row;
	}
	
    public function updateAbandonedCart($data) {
        $query = "UPDATE " . DB_PREFIX . "tk_abandoned_cart SET status_id = '" . $this->db->escape($data['status_id']) . "',  date_modified = NOW() WHERE abandoned_cart_id = '" . (int)$data['abandoned_cart_id'] . "'";

        $this->db->query($query);
    }
	
	public function deleteAbandonedCart($abandoned_cart_id) {

        $this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_product WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "tk_abandoned_cart_option WHERE abandoned_cart_id = '" . (int)$abandoned_cart_id . "'");
    }


}
?>