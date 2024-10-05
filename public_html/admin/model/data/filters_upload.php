<?php
class ModelDataFiltersUpload extends Model {

	public function update_product_descr( $data ){
	    $descr = '';
		if (isset($data['description'])){
	        $descr = $data['description'];
	    }
		$descr .= '<table>';
		foreach ($data['product_descr'] as $key => $value) {
			$descr .= '<tr>';
			$descr .= '<td>' . $key;
			$descr .= '</td>';
			$descr .= '<td>' . $value;
			$descr .= '</td>';
			$descr .= '</tr>';
		}
		$descr .= '</table>';

		$product_query = "SELECT product_id FROM " . DB_PREFIX . "product WHERE `ean` ='". $data['barcode'] ."'";
		
		$product_result = $this->db->query( $product_query );

		if( $product_result ){
			$product_id = $product_result->row['product_id'];
			
			$q = "UPDATE `" . DB_PREFIX . "product_description` SET `description`='" . $descr . "' WHERE language_id='" . (int)$this->config->get('config_language_id') . "' AND product_id='" . (int)$product_id . "'";
			$this->db->query( $q );	
			
			return true;
		}

		return false;

	}
	
	public function save_filter_groups( $data ){

		foreach ($data as $key => $filter_group ) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "filter_group_description WHERE name = '" . $filter_group . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");
			if( empty( $query->row ) ){
				$this->db->query("INSERT INTO " . DB_PREFIX . "filter_group_description (`language_id`, `name`) VALUES ('".(int)$this->config->get('config_language_id')."','" . $filter_group . "')");
				$filter_group_id = $this->db->getLastId();
				$this->db->query("INSERT INTO " . DB_PREFIX . "filter_group (`filter_group_id`) VALUES ('".(int)$filter_group_id."')");
			}
		}
	}
	
	public function update_product_info( $data, $filter_group ){
		//1 get product id - if no such product - do nothing
		$product_query = "SELECT * FROM " . DB_PREFIX . "product WHERE `ean` ='". $data['barcode'] ."'";
		$product_result = $this->db->query( $product_query );

		if( $product_result->num_rows ){
			$product_id = $product_result->row['product_id'];	
			/** first - delete product filters  */
			$this->db->query('DELETE FROM `' . DB_PREFIX .'product_filter` WHERE `product_id`=' . $product_id );

			foreach( $data['product_filters'] as $col => $product_filter_value ){
			//get filter groups to connect filter values to filter groups
			//get filter group id
				$q = "SELECT filter_group_id FROM " . DB_PREFIX . "filter_group_description WHERE name = '" . $filter_group[$col] . "'";

				$filter_group_id_result = $this->db->query( $q );
				$filter_group_id = $filter_group_id_result->row['filter_group_id'];

			//check if this filter value already exists
				$filter_value_query = "SELECT filter_id FROM " . DB_PREFIX . "filter_description WHERE name = '" . $product_filter_value . "' AND filter_group_id='" . (int)$filter_group_id . "'";
				$filter_value_result = $this->db->query( $filter_value_query );

				
			//value doesn't exist =>1/add the filter value to db
				if( !$filter_value_result->num_rows ){							

					$this->db->query("INSERT INTO " . DB_PREFIX . "filter (`filter_group_id`, `sort_order`) VALUES ('". (int)$filter_group_id ."', 0)");
					$filter_id = $this->db->getLastId();

					$filter_descr_query = "INSERT INTO " . DB_PREFIX . "filter_description (`filter_id`, `language_id`, `filter_group_id`, `name`)";
					$filter_descr_query .= " VALUES ('" . $filter_id . "','" . (int)$this->config->get('config_language_id') . "',";
					$filter_descr_query .= "'" . $filter_group_id . "','" . $product_filter_value . "')";

					$this->db->query( $filter_descr_query );				
				} else {
					$filter_id = $filter_value_result->row['filter_id'];
				}

				/* check this filter values has been added to this product, removed temporary
				// $check_product_filter = "SELECT * FROM " . DB_PREFIX . "product_filter WHERE `product_id` =". (int)$product_id ." AND `filter_id`='" . $filter_id . "'";

				$check_product_filter_result = $this->db->query( $check_product_filter );
				//case not - add the filter to the product
				if( !$check_product_filter_result->num_rows ){
					*/

				$this->db->query("INSERT INTO " . DB_PREFIX . "product_filter (`product_id`, `filter_id`) VALUES ('". (int)$product_id ."', '" . (int)$filter_id . "')");
				
				/** first - delete product filters  */
				
				//get product categories

				$product_cats = "SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE `product_id` ='". (int)$product_id ."'";

				$product_cat_result = $this->db->query( $product_cats );

				if( $product_cat_result->num_rows ){
					foreach ($product_cat_result->rows as $ptc) { 
						//check this filter has been added to this categories 
						$filter_to_cat_query = "SELECT * FROM " . DB_PREFIX . "category_filter WHERE category_id='" . (int)$ptc['category_id'] . "' AND filter_id='" . (int)$filter_id . "'";
						$filter_to_cat_result = $this->db->query( $filter_to_cat_query );

						if( !$filter_to_cat_result->num_rows ){
							//case not - add the filter id to this categories
							$this->db->query("INSERT INTO " . DB_PREFIX . "category_filter (`category_id`, `filter_id`) VALUES ('". (int)$ptc['category_id'] ."', '" . (int)$filter_id . "')");
						}			
				
					}
				}
			}
		}
		
	}

	
	
}