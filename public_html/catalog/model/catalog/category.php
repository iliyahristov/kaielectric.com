<?php
class ModelCatalogCategory extends Model {
	public function getCategory($category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category c  JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row;
	}

	public function getCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c  JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}
	public function getSearchCategories( $search, $parent_id = 0 ) {
		
		$sql = "SELECT pc.category_id as child, c1.parent_id, c1.category_id, cd.name FROM oc_product p JOIN oc_product_description pd ON p.product_id=pd.product_id JOIN oc_product_to_category pc ON pc.product_id = p.product_id JOIN oc_category c ON pc.category_id=c.category_id JOIN oc_category_path cp ON cp.category_id=c.category_id JOIN oc_category c1 ON c1.category_id=cp.path_id JOIN oc_category_description cd ON c1.category_id = cd.category_id WHERE c.status = '1' AND c1.parent_id=". $parent_id ." AND ( p.model LIKE '" . $search . "%' OR p.jan LIKE '" .$search . "' OR pd.name LIKE '%" . $search ."%' ) GROUP BY c1.category_id ORDER BY c.sort_order, cd.name";	
		$query = $this->db->query( $sql );
		return $query->rows;
	}

	public function getManCategories( $man_id, $parent_id = 0 ) {
		$sql = "SELECT m.name as man_name, pc.category_id as child, c1.parent_id, c1.category_id, cd.name FROM `oc_manufacturer` m JOIN oc_product p ON p.manufacturer_id=m.manufacturer_id JOIN oc_product_to_category pc ON pc.product_id = p.product_id JOIN oc_category c ON pc.category_id=c.category_id JOIN oc_category_path cp ON cp.category_id=c.category_id JOIN oc_category c1 ON c1.category_id=cp.path_id JOIN oc_category_description cd ON c1.category_id = cd.category_id WHERE m.manufacturer_id=".$man_id." AND c.status = '1' AND c1.parent_id=". $parent_id ." GROUP BY c1.category_id ORDER BY c.sort_order, cd.name";
		
		$query = $this->db->query( $sql );
		

		return $query->rows;
	}

	public function getCategoryFilters($category_id) {
		$implode = array();

		$query = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "category_filter WHERE category_id = '" . (int)$category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int)$result['filter_id'];
		}

		$filter_group_data = array();

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f  JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id)  JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f  JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}

	public function getCategoryLayoutId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_to_layout WHERE category_id = '" . (int)$category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return (int)$query->row['layout_id'];
		} else {
			return 0;
		}
	}

	
	public function getFilterData( $filter_id ){
		$query = $this->db->query("SELECT fd.filter_id, fd.name as filter_name, f.filter_group_id, fgd.name FROM " . DB_PREFIX . "filter_description fd JOIN " . DB_PREFIX . "filter f ON f.filter_id=fd.filter_id JOIN " . DB_PREFIX . "filter_group_description fgd ON f.filter_group_id=fgd.filter_group_id WHERE fd.filter_id = '" . (int)$filter_id . "'");

		if ($query->num_rows) {
			return $query->row;
		} 
	}

	public function getManCategoryFilters( $man_id, $category_id = 0) {
		
		$implode = array();
		//get all man's products + product filter ids
		$sql = "SELECT pf.filter_id FROM " . DB_PREFIX . "product_filter pf JOIN " . DB_PREFIX . "product p ON pf.product_id=p.product_id ";
		if( $category_id ){
			//if isset category id - join product to product category and filter by category id, 
			$sql .= " JOIN " . DB_PREFIX . "product_to_category pc ON p.product_id=pc.product_id";
		}
		$sql .= " WHERE p.manufacturer_id = '" . (int)$man_id . "'";

		if( $category_id ){
			$sql .= " AND pc.category_id='" . (int)$category_id ."'";
		}

		$query = $this->db->query( $sql );
		
		//group by filter_ids		

		foreach ($query->rows as $result) {

			$implode[] = (int)$result['filter_id'];
		}
		
		$filter_group_data = array();

		if ( $implode ) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f  JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id)  JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f  JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}
	public function getSearchCategoryFilters( $search, $category_id = 0) {
		
		$implode = array();
		//get all man's products + product filter ids
		$sql = "SELECT pf.filter_id FROM " . DB_PREFIX . "product_filter pf JOIN " . DB_PREFIX . "product p ON pf.product_id=p.product_id ";
		$sql .= " JOIN " . DB_PREFIX . "product_description pd ON pd.product_id=p.product_id ";
		
		if( $category_id ){
			//if isset category id - join product to product category and filter by category id, 
			$sql .= " JOIN " . DB_PREFIX . "product_to_category pc ON p.product_id=pc.product_id";
		}
		$sql .= " WHERE ";

		if ( !empty($search ) ) {
			
			$implode = array();

			$words = explode(' ', trim(preg_replace('/\s+/', ' ', $search) ) );

			foreach ($words as $word) {
				$implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
			}

			if ($implode) {
				$sql .= " " . implode(" AND ", $implode) . "";
			}				
		}
		
		$sql .= " ";

		if( $category_id ){
			$sql .= " AND pc.category_id='" . (int)$category_id ."'";
		}

		$query = $this->db->query( $sql );
		
		//group by filter_ids		
		$implode=[];
		foreach ($query->rows as $result) {

			$implode[] = (int)$result['filter_id'];
		}
		
		$filter_group_data = array();

		if ( $implode ) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f  JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id)  JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f  JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}


	public function getCategoryPath( $category_id ){
		if( $category_id ){
			$sql = "SELECT cd.category_id, cd.name FROM oc_category_path cp JOIN oc_category_description cd ON cp.path_id=cd.category_id WHERE cp.category_id = " . (int)$category_id . " ORDER BY cp.level ASC";
			$cats = $this->db->query( $sql );
			
			return $cats->rows;
		}
		return false;
	}

}