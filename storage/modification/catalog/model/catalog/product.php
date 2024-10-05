<?php
class ModelCatalogProduct extends Model {
	public function searchProdNameContainingString( $data ){
		$sql = "SELECT p.product_id ";

		if ( !empty($data['filter_category_id'] ) ) {

			$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";

			$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";

		} else {

			$sql .= " FROM " . DB_PREFIX . "product p";
		}

		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

		if ( !empty( $data['filter_category_id'] ) ) {

			$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
		}

		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {

			$sql .= " AND (";

			if ( !empty($data['filter_name']) ) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			$sql .= ")";
		}

		$sql .= " GROUP BY p.product_id";


		$sql .= " ORDER BY pd.name ASC ";

		$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];

		return $this->db->query( $sql );
	}

	public function queryCats( $parents, $data ){

		$sql = "SELECT c.category_id, cd.name, c.parent_id FROM oc_category c";


		$sql .= " JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c.status = '1' ";


		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {

			$sql .= " AND (";

			if ( !empty($data['filter_name'] ) ) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "cd.name LIKE '" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			$sql .= ")";
		}
		$sql .= " AND c.parent_id IN (" . implode( ',', $parents ) . ")";

		$sql .= " GROUP BY c.category_id";


		$sql .= " ORDER BY cd.name ASC ";

		$cats = $this->db->query( $sql );

		return $cats;
	}
	public function queryCatsNameContainString( $parents, $data ){

		$sql = "SELECT c.category_id, cd.name, c.parent_id FROM oc_category c";


		$sql .= " JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c.status = '1' ";


		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {

			$sql .= " AND (";

			if ( !empty($data['filter_name'] ) ) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "cd.name LIKE '%" . $this->db->escape( $word ) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			$sql .= ")";
		}
		$sql .= " AND c.parent_id IN (" . implode( ',', $parents ) . ")";

		$sql .= " GROUP BY c.category_id";


		$sql .= " ORDER BY cd.name ASC ";


		$cats = $this->db->query( $sql );

		return $cats;
	}

	public function getSearchCategories( $data = array() ) {

		$cats_num = 5;

		$parents = [2,102,106,226];
		$cats_data = [];

		while( $cats_num > 0 && !empty( $parents )){

			$cats = $this->queryCats( $parents, $data );

			foreach ($cats->rows as $cat) {

				if( !in_array( $cat['name'], $cats_data ) ){
					$cats_data[$cat['category_id']] = $cat['name'];
					$cats_num--;
				}

				if( $cats_num == 0 ){
					break;
				}

			}


			$sql = "SELECT category_id FROM oc_category WHERE parent_id IN (" . implode( ',', $parents ) . ")";

			$parents_res = $this->db->query( $sql );

			$parents = [];

			foreach ($parents_res->rows as $p) {
				if( !in_array( $p['category_id'], $parents) ){
					$parents[] = $p['category_id'];
				}
			}

		}


		$num_res = count( $cats_data );

		if( $num_res < 5 ){
			//start searching from the top level
			//the name contains the searched string


			$parents = [2,102,106,226];

			while( $num_res < 5 && !empty( $parents ) ){

				$cats_1 = $this->queryCatsNameContainString( $parents, $data );

				foreach ($cats_1->rows as $cat) {

					if( !in_array( $cat['name'], $cats_data ) ){

						$cats_data[$cat['category_id']] = $cat['name'];
						$num_res++;
					}
					if( $num_res == 5 ){
						break;
					}

				}//endforeach



				//stop is categories are 5

				$sql = "SELECT category_id FROM oc_category WHERE parent_id IN (" . implode( ',', $parents ) . ")";

				$parents_res = $this->db->query( $sql );

				$parents = [];

				foreach ($parents_res->rows as $p) {
					if( !in_array( $p['category_id'], $parents) ){
						$parents[] = (int)$p['category_id'];
					}
				}
			}
		}

		$res['cats'] 	= $cats_data;

		return $res;
	}

	public function getSearchProducts( $data = array() ) {

		$sql = "SELECT p.product_id ";

		if ( !empty($data['filter_category_id'] ) ) {

			$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";

			$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";

		} else {

			$sql .= " FROM " . DB_PREFIX . "product p";
		}

		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

		if ( !empty( $data['filter_category_id'] ) ) {

			$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
		}

		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {

			$sql .= " AND (";

			if ( !empty($data['filter_name']) ) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "pd.name LIKE '" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

				foreach ($words as $word) {
					$implode[] = "pd.tag LIKE '" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			if (!empty($data['filter_name'])) {
			    $sql .= " OR LCASE(p.model) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			    $sql .= " OR LCASE(p.jan) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
			    }

			$sql .= ")";
		}

		$sql .= " GROUP BY p.product_id";


		$sql .= " ORDER BY pd.name ASC ";

		$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];


		$product_data = array();

		$query = $this->db->query( $sql );

		$product_num = 0;
	 		//add only 3 results
		foreach ($query->rows as $result) {

			$product_num++;

			$product_data[$result['product_id']] = $this->getProduct($result['product_id']);

			if( $product_num === 3 ){

				break;
			}
		}

		//MANS
		$mans_data = [];

		foreach( $query->rows as $mresult ){

			$current_prod = $this->getProduct($mresult['product_id']);

			if( !isset( $mans_data[$current_prod['manufacturer_id']] ) ){

				$mans_data[$current_prod['manufacturer_id']] = $current_prod['manufacturer'];
			}
			if( count( $mans_data ) === 3 ){

				break;
			}
		}

		//CHECK 3 PRODUCTS FOUND
		$product_search_2 = [];

		if( $product_num < 3 ){
			//PERFORM SERCH IN THE PRODUCT NAME
			$product_search_2 = $this->searchProdNameContainingString( $data );

			foreach( $product_search_2->rows as $result) {

				if( !isset( $product_data[$result['product_id']] ) ){

					$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
					$product_num++;
				}

				if( $product_num === 3 ){
					break;
				}
			}
			// //CHECK 3 MANS FOUND
			if( count( $mans_data ) < 3 ){

				foreach( $product_search_2->rows as $mresult ){

					$current_prod = $this->getProduct($mresult['product_id']);

					if( !isset( $mans_data[$current_prod['manufacturer_id']] ) ){

						$mans_data[$current_prod['manufacturer_id']] = $current_prod['manufacturer'];
					}
					if( count( $mans_data ) === 3 ){

						break;
					}
				}
			}
		}

		$res['total'] 	= count( $query->rows );
		$res['products'] =  $product_data;
		$res['mans'] 	= $mans_data;

		return $res;
	}
	public function getRelatedModuleName( $product_id ){

		$categories = $this->db->query("SELECT DISTINCT(cp.category_id), cp.level FROM " . DB_PREFIX . "product_to_category pc JOIN oc_category_path cp ON pc.category_id=cp.category_id WHERE product_id = '" . (int)$product_id . "' ORDER BY cp.level DESC LIMIT 1");

		$cat_id = $categories->rows[0]['category_id'];

		//get the related module name
		$related = $this->db->query("SELECT * from oc_related_module_name WHERE category_id = " . (int)$cat_id );

		return $related->row['module_name'];

	}
	public function updateViewed($product_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET viewed = (viewed + 1) WHERE product_id = '" . (int)$product_id . "'");
	}

	public function getProduct($product_id) {
		$query = $this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, p.specif, m.name AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT date_end FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special_date_end, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id AND r2.status = '1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {

			return array(
				'product_id'       => $query->row['product_id'],
				'name'             => $query->row['name'],
				'description'      => $query->row['description'],
				'meta_title'       => $query->row['meta_title'],
				'meta_description' => $query->row['meta_description'],
				'meta_keyword'     => $query->row['meta_keyword'],
				'tag'              => $query->row['tag'],
				'model'            => $query->row['model'],
				'specif'           => $query->row['specif'],
				'sku'              => $query->row['sku'],
				'upc'              => $query->row['upc'],
				'ean'              => $query->row['ean'],
				'jan'              => $query->row['jan'],
				'isbn'             => $query->row['isbn'],
				'mpn'              => $query->row['mpn'],
				'location'         => $query->row['location'],
				'quantity'         => $query->row['quantity'],
				'stock_status'     => $query->row['stock_status'],
				'image'            => $query->row['image'],
				'manufacturer_id'  => $query->row['manufacturer_id'],
				'manufacturer'     => $query->row['manufacturer'],
				'price'            => ($query->row['discount'] ? $query->row['discount'] : $query->row['price']),
				'special'          => $query->row['special'],
                'special_date_end'          => $query->row['special_date_end'],
				'reward'           => $query->row['reward'],
				'points'           => $query->row['points'],
				'tax_class_id'     => $query->row['tax_class_id'],
				'date_available'   => $query->row['date_available'],
				'weight'           => $query->row['weight'],
				'weight_class_id'  => $query->row['weight_class_id'],
				'length'           => $query->row['length'],
				'width'            => $query->row['width'],
				'height'           => $query->row['height'],
				'length_class_id'  => $query->row['length_class_id'],
				'subtract'         => $query->row['subtract'],
				'rating'           => round($query->row['rating']),
				'reviews'          => $query->row['reviews'] ? $query->row['reviews'] : 0,
				'minimum'          => $query->row['minimum'],
				'sort_order'       => $query->row['sort_order'],
				'status'           => $query->row['status'],
				'date_added'       => $query->row['date_added'],
				'date_modified'    => $query->row['date_modified'],
				'viewed'           => $query->row['viewed']
			);
		} else {
			return false;
		}
	}

	public function getProducts( $data = array(), $min_price = '', $max_price = '') {

		$sql = "SELECT p.product_id, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT date_end FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special_date_end";

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

			if ( !empty( $data['filter_filter'] ) ) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
			}

		} else {

			$sql .= " FROM " . DB_PREFIX . "product p";
		}

		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

		if (!empty($data['filter_category_id'])) {
//
			if (!empty($data['filter_sub_category'])) {
				$sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
			} else {
				$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
			}

			if ( !empty( $data['filter_filter'] ) ) {

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

				// if (!empty($data['filter_description'])) {
				// 	$sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
				// }
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

			if ( !empty($data['filter_name'] ) ) {
				$sql .= " OR LCASE(p.model) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
				$sql .= " OR LCASE(p.jan) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
			}

			$sql .= ")";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		}
		if( isset($data['man'] ) ){
			if( $data['man'] != 0 ) {
	//
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

	// 	//data sort p.price-ASC

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

		if( empty( $data['filter_filter'] ) ){

			if ( isset($data['start']) || isset($data['limit']) ) {

				if ($data['start'] < 0) {
					$data['start'] = 0;
					}// //
					if ( $data['limit'] < 1 ) {
						$data['limit'] = 20;
					}//

				}
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}

			$product_data = array();

			$query = $this->db->query($sql);

	 	//for paginated results - check if filters - to retrn 18 results and last row
			foreach ($query->rows as $result) {
	// 		//check this product has all required filters
				if( isset( $filters ) ){
				//get all product filters
					$pfilters = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "product_filter WHERE product_id=" .$result['product_id'] );
	// 			//set array contain current product filter_ids
					$cpfilters = [];
				//separate pfilters by group
					foreach( $pfilters->rows as $f ){
						$cpfilters[] = $f['filter_id'];
					}
	// 			//check all required filter groups hav at least one filter that belongs to current product
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
						//
							$flag = false;
						}
					}

					if( $flag ){

						$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
					}
				} else {

				//no required filters
					$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
				}

			}
	// 	//for all filtered products - get the filters
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

	// 			//check all required filter groups hav at least one filter that belongs to current product
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

	// 			//no required filters
					$all_products_for_filter_data[$apd['product_id']] = $apd['product_id'];
				}

			}
//check
			$filters_data = $this->getProductsFilterData( $all_products_for_filter_data );

			$res = [];
			$res['products'] = [];


			if( isset( $data['filter_filter'] ) ){

				if( !empty( $data['filter_filter'] ) ){
					$ind = 0;

					foreach ( $product_data as $value ) {

						if( $data['last'] == 0 ){
							if( $ind < 18 ){
								$res['products'][] = $value;
							}
						}
						if( $data['last'] != 0 ){
							if( $ind > $data['last'] && $ind <= ( $data['last'] + 18 ) ){
								$res['products'][] = $value;
							}
						}
						if( $ind == ( $data['last'] + 18 ) ){
							break;
						}
						$ind++;
					}

					$res['last'] = $ind;


				} else{
					$res['products'] = $product_data;
					$res['last'] = 0;
				}
			} else {
                // Google Sitemap gets from here
				$res['products'] = $product_data;
				$res['last'] = 0;
			}


			$res['filters'] = $filters_data;
			$res['total'] = count( $all_products_for_filter_data );
			$res['total_with_filters'] = count($product_data);

			return $res;
		}

		public function getProductSpecials($data = array()) {
			$sql = "SELECT DISTINCT ps.product_id, (SELECT AVG(rating) FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = ps.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating FROM " . DB_PREFIX . "product_special ps LEFT JOIN " . DB_PREFIX . "product p ON (ps.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) GROUP BY ps.product_id";

			$sort_data = array(
				'pd.name',
				'p.model',
				'ps.price',
				'rating',
				'p.sort_order'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
					$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
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

			foreach ($query->rows as $result) {
				$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
			}

			return $product_data;
		}

		public function getLatestProducts($limit) {
			$product_data = $this->cache->get('product.latest.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit);

			if (!$product_data) {
				$query = $this->db->query("SELECT p.product_id FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY p.date_added DESC LIMIT " . (int)$limit);

				foreach ($query->rows as $result) {
					$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
				}

				$this->cache->set('product.latest.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit, $product_data);
			}

			return $product_data;
		}

		public function getPopularProducts($limit) {
			$product_data = $this->cache->get('product.popular.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit);

			if (!$product_data) {
				$query = $this->db->query("SELECT p.product_id FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY p.viewed DESC, p.date_added DESC LIMIT " . (int)$limit);

				foreach ($query->rows as $result) {
					$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
				}

				$this->cache->set('product.popular.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit, $product_data);
			}

			return $product_data;
		}

		public function getBestSellerProducts($limit) {
			$product_data = $this->cache->get('product.bestseller.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit);

			if (!$product_data) {
				$product_data = array();

				$query = $this->db->query("SELECT op.product_id, SUM(op.quantity) AS total FROM " . DB_PREFIX . "order_product op LEFT JOIN `" . DB_PREFIX . "order` o ON (op.order_id = o.order_id) LEFT JOIN `" . DB_PREFIX . "product` p ON (op.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE o.order_status_id > '0' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' GROUP BY op.product_id ORDER BY total DESC LIMIT " . (int)$limit);

				foreach ($query->rows as $result) {
					$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
				}

				$this->cache->set('product.bestseller.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit, $product_data);
			}

			return $product_data;
		}

		public function getProductAttributes($product_id) {
			$product_attribute_group_data = array();

			$product_attribute_group_query = $this->db->query("SELECT ag.attribute_group_id, agd.name FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_group ag ON (a.attribute_group_id = ag.attribute_group_id) LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (ag.attribute_group_id = agd.attribute_group_id) WHERE pa.product_id = '" . (int)$product_id . "' AND agd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name");

			foreach ($product_attribute_group_query->rows as $product_attribute_group) {
				$product_attribute_data = array();

				$product_attribute_query = $this->db->query("SELECT a.attribute_id, ad.name, pa.text FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE pa.product_id = '" . (int)$product_id . "' AND a.attribute_group_id = '" . (int)$product_attribute_group['attribute_group_id'] . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND pa.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.sort_order, ad.name");

				foreach ($product_attribute_query->rows as $product_attribute) {
					$product_attribute_data[] = array(
						'attribute_id' => $product_attribute['attribute_id'],
						'name'         => $product_attribute['name'],
						'text'         => $product_attribute['text']
					);
				}

				$product_attribute_group_data[] = array(
					'attribute_group_id' => $product_attribute_group['attribute_group_id'],
					'name'               => $product_attribute_group['name'],
					'attribute'          => $product_attribute_data
				);
			}

			return $product_attribute_group_data;
		}

		public function getProductOptions($product_id) {
			$product_option_data = array();

			$product_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY o.sort_order");

			foreach ($product_option_query->rows as $product_option) {
				$product_option_value_data = array();

				$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_id = '" . (int)$product_id . "' AND pov.product_option_id = '" . (int)$product_option['product_option_id'] . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY ov.sort_order");

				foreach ($product_option_value_query->rows as $product_option_value) {
					$product_option_value_data[] = array(
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id'         => $product_option_value['option_value_id'],
						'name'                    => $product_option_value['name'],
						'image'                   => $product_option_value['image'],
						'quantity'                => $product_option_value['quantity'],
						'subtract'                => $product_option_value['subtract'],
						'price'                   => $product_option_value['price'],
						'price_prefix'            => $product_option_value['price_prefix'],
						'weight'                  => $product_option_value['weight'],
						'weight_prefix'           => $product_option_value['weight_prefix']
					);
				}

				$product_option_data[] = array(
					'product_option_id'    => $product_option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $product_option['option_id'],
					'name'                 => $product_option['name'],
					'type'                 => $product_option['type'],
					'value'                => $product_option['value'],
					'required'             => $product_option['required']
				);
			}

			return $product_option_data;
		}

		public function getProductDiscounts($product_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND quantity > 1 AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY quantity ASC, priority ASC, price ASC");

			return $query->rows;
		}

		public function getProductImages($product_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC");

			return $query->rows;
		}

		public function getProductRelated($product_id) {
			$product_data = array();

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_related pr LEFT JOIN " . DB_PREFIX . "product p ON (pr.related_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY pr.id ASC");

			foreach ($query->rows as $result) {
				$product_data[$result['related_id']] = $this->getProduct($result['related_id']);
			}

			return $product_data;
		}

		public function getProductLayoutId($product_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

			if ($query->num_rows) {
				return (int)$query->row['layout_id'];
			} else {
				return 0;
			}
		}

		public function getCategories($product_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");

			return $query->rows;
		}

		public function getTotalProducts($data = array()) {

			$sql = "SELECT COUNT(DISTINCT p.product_id) AS total";

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

			$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

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
					$sql .= " OR LCASE(p.model) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
					$sql .= " OR LCASE(p.sku) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
					$sql .= " OR LCASE(p.upc) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
					$sql .= " OR LCASE(p.ean) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
					$sql .= " OR LCASE(p.jan) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
					$sql .= " OR LCASE(p.isbn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
					$sql .= " OR LCASE(p.mpn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
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

// var_dump( $sql );
// die;
			$query = $this->db->query($sql);
			return $query->row['total'];
		}

		public function getProfile($product_id, $recurring_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "recurring r JOIN " . DB_PREFIX . "product_recurring pr ON (pr.recurring_id = r.recurring_id AND pr.product_id = '" . (int)$product_id . "') WHERE pr.recurring_id = '" . (int)$recurring_id . "' AND status = '1' AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "'");

			return $query->row;
		}

		public function getProfiles($product_id) {
			$query = $this->db->query("SELECT rd.* FROM " . DB_PREFIX . "product_recurring pr JOIN " . DB_PREFIX . "recurring_description rd ON (rd.language_id = " . (int)$this->config->get('config_language_id') . " AND rd.recurring_id = pr.recurring_id) JOIN " . DB_PREFIX . "recurring r ON r.recurring_id = rd.recurring_id WHERE pr.product_id = " . (int)$product_id . " AND status = '1' AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' ORDER BY sort_order ASC");

			return $query->rows;
		}

		public function getTotalProductSpecials() {
			$query = $this->db->query("SELECT COUNT(DISTINCT ps.product_id) AS total FROM " . DB_PREFIX . "product_special ps LEFT JOIN " . DB_PREFIX . "product p ON (ps.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW()))");

			if (isset($query->row['total'])) {
				return $query->row['total'];
			} else {
				return 0;
			}
		}

		public function getProductsFilterData( $data ){

			$filters_data = [];

			foreach ( $data as $p ) {
				$p_filters = $this->db->query( "SELECT pf.product_id, pf.filter_id, f.filter_group_id FROM " . DB_PREFIX . "product_filter pf JOIN " . DB_PREFIX . "filter f ON pf.filter_id=f.filter_id WHERE pf.product_id = " . $p );
			// var_dump( $p_filters->rows );
				foreach ($p_filters->rows as $filter) {

					if( !isset( $filters_data[$filter['filter_group_id']] ) ){
						$filters_data[$filter['filter_group_id']] = [];

						array_push( $filters_data[$filter['filter_group_id']], $filter['filter_id'] );
					} else {
						if( !in_array( $filter['filter_id'], $filters_data[$filter['filter_group_id']] ) ){
							array_push( $filters_data[$filter['filter_group_id']], $filter['filter_id'] );
						}
					}

				}

			}

			return $filters_data;
		}


        public function getProductsForSitemap($data = array()){
            $sql = "SELECT p.product_id, p.date_modified, p.image, opd.name
                    FROM " . DB_PREFIX . "product p
                    JOIN " . DB_PREFIX . "product_description opd on p.product_id = opd.product_id";
            if (!empty($data['filter_category_id'])) {
                $sql .= " JOIN " . DB_PREFIX . "product_to_category pc ON pc.product_id = p.product_id AND pc.category_id = '" . (int)$data['filter_category_id'] . "'";
            }
            if (!empty($data['filter_manufacturer_id'])) {
                $sql .= " WHERE p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
            }

			$product_data = array();

            $result = $this->db->query($sql);
            $i = 0;
            foreach( $result->rows as $f ){
				$productData[$i]['product_id'] = $f['product_id'];
				$productData[$i]['date_modified'] = $f['date_modified'];
				$productData[$i]['image'] = $f['image'];
				$productData[$i]['name'] = $f['name'];
				$i++;
			}

            $res['products'] = $productData;
            return $productData;
        }

	}
