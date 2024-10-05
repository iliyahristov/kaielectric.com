<?php
class ModelExtensionModuleSosearchpro extends Model {
	
	public function getImageProduct_basic_products($product_id) {
		$sql = "SELECT * FROM " . DB_PREFIX . "product_image WHERE  product_id ='".$product_id."' ORDER BY sort_order ASC;";
		$query = $this->db->query($sql);
		return $query->rows;
	}
	
public function getProducts( $data = array(), $min_price = '', $max_price = '') {

		$sql = "SELECT p.product_id, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";

		if( isset( $data['filter_category_id'] ) ){
		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
			} else {
				$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
			}

			if (!empty($data['filter_filter'])) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
			}
		} elseif( $data['filter_category_id'] == 0 ) {

			if (!empty($data['filter_sub_category'])) {
				$sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
			} else {
				$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
			}

			if (!empty($data['filter_filter'])) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
			}

		} else {
			$sql .= " FROM " . DB_PREFIX . "product p";
		}
	} else {
			$sql .= " FROM " . DB_PREFIX . "product p";	
	}

		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";
		
		if( isset( $data['filter_category_id'] ) ){
		if (!empty($data['filter_category_id'])) {

			if (!empty($data['filter_sub_category'])) {
				$sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
			} else {
				$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
			}

			if (!empty($data['filter_filter'])) {

				$implode = array();

				$filters = explode(',', $data['filter_filter']);

				foreach ($filters as $filter_id) {
					$implode[] = (int)$filter_id;
				}

				$sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";

				//group required filters by filter group
				$filters_by_filter_group = [];

				foreach ( $filters as $f ) {

					$filter_group = $this->db->query("SELECT filter_group_id FROM " . DB_PREFIX . "filter WHERE filter_id=" . $f );
					$filter_group_id = $filter_group->row['filter_group_id'];

					if( !isset( $filters_by_filter_group[$filter_group_id] ) ){
						$filters_by_filter_group[$filter_group_id] = [];
					}
					$filters_by_filter_group[$filter_group_id][] = $f;					
				}
			}

		} elseif( $data['filter_category_id'] == 0 ) {

			if (!empty($data['filter_sub_category'])) {
				$sql .= " AND cp.path_id in (2,102,106,226,496)";
			} else {
				$sql .= " AND p2c.category_id in (2,102,106,226,496)";
			}

			if (!empty($data['filter_filter'])) {

				$implode = array();

				$filters = explode(',', $data['filter_filter']);

				foreach ($filters as $filter_id) {
					$implode[] = (int)$filter_id;
				}

				$sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";

				//group required filters by filter group
				$filters_by_filter_group = [];

				foreach ( $filters as $f ) {

					$filter_group = $this->db->query("SELECT filter_group_id FROM " . DB_PREFIX . "filter WHERE filter_id=" . $f );
					$filter_group_id = $filter_group->row['filter_group_id'];

					if( !isset( $filters_by_filter_group[$filter_group_id] ) ){
						$filters_by_filter_group[$filter_group_id] = [];
					}
					$filters_by_filter_group[$filter_group_id][] = $f;					
				}
			}

		}
	} 


		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
			$sql .= " AND (";

			if (!empty($data['filter_name'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}

				if (!empty($data['filter_description'])) {
					$sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
				}
			}

			if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

				foreach ($words as $word) {
					$implode[] = "pd.tag LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			if (!empty($data['filter_name'])) {
				$sql .= " OR LCASE(p.model) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
				$sql .= " OR LCASE(p.sku) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
				$sql .= " OR LCASE(p.upc) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
				$sql .= " OR LCASE(p.ean) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
				$sql .= " OR LCASE(p.jan) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
				$sql .= " OR LCASE(p.isbn) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
				$sql .= " OR LCASE(p.mpn) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			}

			$sql .= ")";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		} 
		if( isset($data['man'] ) ){
			if( $data['man'] != 0 ) {
	
					$sql .= " AND p.manufacturer_id = '" . (int)$data['man'] . "'";
			}
		}
		


		if( !empty( $min_price ) && !empty( $max_price ) ){
			$sql .= " AND p.price >= " . $min_price . " AND p.price <= " . $max_price;
		}

		$sql .= " GROUP BY p.product_id";

		$sort_data = array(
			'pd.name',
			'p.model',
			'p.quantity',
			'p.price',
			'rating',
			'p.sort_order',
			'p.date_added'
		);

		//data sort p.price-ASC

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
			} elseif ($data['sort'] == 'p.price') {
				$sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special WHEN discount IS NOT NULL THEN discount ELSE p.price END)";
			} else {
				$sql .= " ORDER BY " . $data['sort'];
			}
		} else {
			$sql .= " ORDER BY p.sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC, LCASE(pd.name) DESC";
		} else {
			$sql .= " ASC, LCASE(pd.name) ASC";
		}

		//get all data with these filters 
		$sql_full = $sql;
		

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$product_data = array();
		$query = $this->db->query($sql);
		//for paginated results
		foreach ($query->rows as $result) {
			//check this product has all required filters
			if( isset( $filters ) ){
				//get all product filters
				$pfilters = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "product_filter WHERE product_id=" .$result['product_id'] );
				//set array contain current product filter_ids
				$cpfilters = [];
				foreach( $pfilters->rows as $f ){
					$cpfilters[] = $f['filter_id'];
				}

				//check all required filter groups hav at least one filter that belongs to current product
				$flag = true; 

				foreach( $filters_by_filter_group as $ffg ){
					//add required filter if belongs to product
					$intersect = [];
					//loop required filters by filter group
					foreach( $ffg as $f ){
						if( in_array( $f, $cpfilters ) ){
							$intersect[] = $f;
						}
					}
					//if no intersects - flag is false, break
					if( empty( $intersect) ){
						
						$flag = false;
					}
				}

				if( $flag ){
					
					$product_data[$result['product_id']] = $this->model_catalog_product->getProduct($result['product_id']);
				}
			} else {

				//no required filters
				$product_data[$result['product_id']] = $this->model_catalog_product->getProduct($result['product_id']);
			}
			
		}
		//for all products - filter, to get the filters
		$all_products_data = $this->db->query( $sql_full );
		$all_products_for_filter_data=[];

		foreach ($all_products_data->rows as $apd) {
			//check this product has all required filters
			if( isset( $filters ) ){
				//get all product filters
				$pfilters = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "product_filter WHERE product_id=" .$apd['product_id'] );
				//set array contain current product filter_ids
				$cpfilters = [];
				foreach( $pfilters->rows as $f ){
					$cpfilters[] = $f['filter_id'];
				}

				//check all required filter groups hav at least one filter that belongs to current product
				$flag = true; 

				foreach( $filters_by_filter_group as $ffg ){
					//add required filter if belongs to product
					$intersect = [];
					//loop required filters by filter group
					foreach( $ffg as $f ){
						if( in_array( $f, $cpfilters ) ){
							$intersect[] = $f;
						}
					}
					//if no intersects - flag is false, break
					if( empty( $intersect) ){
						
						$flag = false;
					}
				}

				if( $flag ){
					
					$all_products_for_filter_data[$apd['product_id']] = $apd['product_id'];
				}
			} else {

				//no required filters
				$all_products_for_filter_data[$apd['product_id']] = $apd['product_id'];
			}
			
		}
		$filters_data = $this->model_catalog_product->getProductsFilterData( $all_products_for_filter_data );
		

		$res = [];
		$res['products'] = $product_data;
		$res['filters'] = $filters_data;
		
		return $res;
	}
	public function checkCategory($category_id) {
		$sql = "SELECT * FROM " . DB_PREFIX . "category WHERE  category_id ='".$category_id."' ORDER BY sort_order ASC;";
		$query = $this->db->query($sql);
		return $query->rows;
	}
	public function getCategories_son($data = array()) {
		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.sort_order FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category c1 ON (cp.category_id = c1.category_id) LEFT JOIN " . DB_PREFIX . "category c2 ON (cp.path_id = c2.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (cp.path_id = cd1.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (cp.category_id = cd2.category_id) WHERE  c1.parent_id = '".$data['category_id']."' AND cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c1.status = 1";

		if (!empty($data['filter_name'])) {
			$sql .= " AND cd2.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sql .= " GROUP BY cp.category_id";

		$sort_data = array(
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
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
}