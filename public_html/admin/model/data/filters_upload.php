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

        // Премахване на водещи нули за търсене по model
        $barcode_trimmed = ltrim($data['barcode'], '0');

        $product_query = "SELECT product_id FROM " . DB_PREFIX . "product WHERE `ean` ='". $this->db->escape($data['barcode']) ."' OR `model` = '" . $this->db->escape($data['barcode']) . "' OR `model` = '" . $this->db->escape($barcode_trimmed) . "' LIMIT 1";

        $product_result = $this->db->query( $product_query );

        // Проверка дали има резултат
        if( $product_result->num_rows ){
            $product_id = $product_result->row['product_id'];

            $q = "UPDATE `" . DB_PREFIX . "product_description` SET `description`='" . $this->db->escape($descr) . "' WHERE language_id='" . (int)$this->config->get('config_language_id') . "' AND product_id='" . (int)$product_id . "'";
            $this->db->query( $q );

            return true;
        }

        return false;
    }

    public function save_filter_groups( $data ){
        if (empty($data) || !is_array($data)) {
            return;
        }

        foreach ($data as $key => $filter_group ) {
            if (empty($filter_group)) {
                continue;
            }
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "filter_group_description WHERE name = '" . $this->db->escape($filter_group) . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");
            if( empty( $query->row ) ){
                $this->db->query("INSERT INTO " . DB_PREFIX . "filter_group SET sort_order = '0'");
                $filter_group_id = $this->db->getLastId();
                $this->db->query("INSERT INTO " . DB_PREFIX . "filter_group_description SET filter_group_id = '" . (int)$filter_group_id . "', language_id = '" . (int)$this->config->get('config_language_id') . "', name = '" . $this->db->escape($filter_group) . "'");
            }
        }
    }

    public function update_product_info( $data, $filter_group ){
        if (empty($data['barcode']) || empty($data['product_filters'])) {
            return false;
        }

        //1 get product id - if no such product - do nothing
        // Премахване на водещи нули за търсене по model
        $barcode_trimmed = ltrim($data['barcode'], '0');

        $product_query = "SELECT * FROM " . DB_PREFIX . "product WHERE `ean` ='". $this->db->escape($data['barcode']) ."' OR `model` = '" . $this->db->escape($data['barcode']) . "' OR `model` = '" . $this->db->escape($barcode_trimmed) . "' LIMIT 1";
        $product_result = $this->db->query( $product_query );

        if( $product_result->num_rows ){
            $product_id = $product_result->row['product_id'];
            /** first - delete product filters  */
            $this->db->query('DELETE FROM `' . DB_PREFIX .'product_filter` WHERE `product_id`=' . (int)$product_id );

            foreach( $data['product_filters'] as $col => $product_filter_value ){
                if (empty($product_filter_value) || !isset($filter_group[$col])) {
                    continue;
                }

                //get filter group id
                $q = "SELECT filter_group_id FROM " . DB_PREFIX . "filter_group_description WHERE name = '" . $this->db->escape($filter_group[$col]) . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'";

                $filter_group_id_result = $this->db->query( $q );

                if (!$filter_group_id_result->num_rows) {
                    continue;
                }

                $filter_group_id = $filter_group_id_result->row['filter_group_id'];

                //check if this filter value already exists
                $filter_value_query = "SELECT filter_id FROM " . DB_PREFIX . "filter_description WHERE name = '" . $this->db->escape($product_filter_value) . "' AND filter_group_id='" . (int)$filter_group_id . "'";
                $filter_value_result = $this->db->query( $filter_value_query );

                //value doesn't exist => add the filter value to db
                if( !$filter_value_result->num_rows ){
                    $this->db->query("INSERT INTO " . DB_PREFIX . "filter (`filter_group_id`, `sort_order`) VALUES ('". (int)$filter_group_id ."', 0)");
                    $filter_id = $this->db->getLastId();

                    $filter_descr_query = "INSERT INTO " . DB_PREFIX . "filter_description (`filter_id`, `language_id`, `filter_group_id`, `name`)";
                    $filter_descr_query .= " VALUES ('" . (int)$filter_id . "','" . (int)$this->config->get('config_language_id') . "',";
                    $filter_descr_query .= "'" . (int)$filter_group_id . "','" . $this->db->escape($product_filter_value) . "')";

                    $this->db->query( $filter_descr_query );
                } else {
                    $filter_id = $filter_value_result->row['filter_id'];
                }

                $this->db->query("INSERT INTO " . DB_PREFIX . "product_filter (`product_id`, `filter_id`) VALUES ('". (int)$product_id ."', '" . (int)$filter_id . "')");

                // НЕ добавяме филтри към категории тук - това се прави накрая чрез syncCategoryFiltersWithParents()
            }

            return true;
        }

        return false;
    }

    /**
     * Взима категориите на продукт по баркод или код на продукта
     */
    public function getProductCategoriesByBarcode($barcode) {
        $categories = array();

        if (empty($barcode)) {
            return $categories;
        }

        // Премахване на водещи нули за търсене по model
        $barcode_trimmed = ltrim($barcode, '0');

        // Търсене по EAN или по MODEL (код на продукта) - с и без водещи нули
        $product_query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product WHERE `ean` = '" . $this->db->escape($barcode) . "' OR `model` = '" . $this->db->escape($barcode) . "' OR `model` = '" . $this->db->escape($barcode_trimmed) . "' LIMIT 1");

        if ($product_query->num_rows) {
            $product_id = (int)$product_query->row['product_id'];

            $cat_query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "'");

            foreach ($cat_query->rows as $row) {
                $categories[] = (int)$row['category_id'];
            }
        }

        return $categories;
    }

    /**
     * Синхронизира филтрите в категориите.
     * Изтрива старите филтри от засегнатите категории (и техните родители)
     * и добавя само тези филтри, които реално се използват от продукти.
     *
     * @param array $leaf_category_ids - масив от ID-та на категории (листа), които са засегнати
     */
    public function syncCategoryFiltersWithParents($leaf_category_ids) {
        if (!is_array($leaf_category_ids) || empty($leaf_category_ids)) {
            return;
        }

        // Премахни дубликати и невалидни стойности
        $leaf_category_ids = array_values(array_unique(array_filter(array_map('intval', $leaf_category_ids))));

        if (empty($leaf_category_ids)) {
            return;
        }

        $leaf_in = implode(',', $leaf_category_ids);

        // Намери всички засегнати категории (включително родителите нагоре по дървото)
        // category_path съдържа връзката category_id -> path_id (родител)
        $path_query = $this->db->query("
			SELECT DISTINCT cp.path_id
			FROM " . DB_PREFIX . "category_path cp
			WHERE cp.category_id IN ($leaf_in)
		");

        if (!$path_query->num_rows) {
            return;
        }

        $affected_categories = array();
        foreach ($path_query->rows as $row) {
            $affected_categories[] = (int)$row['path_id'];
        }
        $affected_categories = array_values(array_unique($affected_categories));

        if (empty($affected_categories)) {
            return;
        }

        $affected_in = implode(',', $affected_categories);

        // 1. Изтрий ВСИЧКИ филтри от засегнатите категории
        $this->db->query("
			DELETE FROM " . DB_PREFIX . "category_filter
			WHERE category_id IN ($affected_in)
		");

        // 2. Вмъкни наново филтрите базирани на реалните product_filter записи
        // За всяка засегната категория, намери всички продукти в нея и нейните подкатегории
        // и добави техните филтри
        $this->db->query("
			INSERT INTO " . DB_PREFIX . "category_filter (category_id, filter_id)
			SELECT DISTINCT cp.path_id AS category_id, pf.filter_id
			FROM " . DB_PREFIX . "category_path cp
			INNER JOIN " . DB_PREFIX . "product_to_category ptc ON ptc.category_id = cp.category_id
			INNER JOIN " . DB_PREFIX . "product_filter pf ON pf.product_id = ptc.product_id
			WHERE cp.path_id IN ($affected_in)
		");
    }
}
