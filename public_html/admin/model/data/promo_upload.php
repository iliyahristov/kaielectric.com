<?php

class ModelDataPromoUpload extends Model
{

    public function update_product_info($data)
    {
        $promoCategoryId = '760';
        $flag = false;

        if (!empty($data)) {
            if (!empty($data['barcode'])
                && isset($data['special_price'])
                && isset($data['date_start'])
                && isset($data['date_end'])) {

                //GET PRODUCT ID
                $query = $this->db->query("SELECT p.product_id, p.ean FROM " . DB_PREFIX . "product p WHERE p.ean = '" . (int)$data['barcode'] . "'");
                $product_data = $query->row;
                $product_id = $product_data['product_id'];

                $sql = "INSERT IGNORE INTO " . DB_PREFIX . "product_special SET product_id = '" . (int)$product_id . "',";
                $sql .= " `price` = '" . $data['special_price'] . "', ";
                $sql .= " `date_start` = '" . $data['date_start'] . "',";
                $sql .= " `date_end` = '" . $data['date_end'] . "'";

                $this->db->query($sql);

                //ADD PPRODUCT TO PRODUCT CATEGORY ID=999999
                $this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int)$product_id . "', category_id = '" . $promoCategoryId . "'");


                //ADD PRODUCT FILTERS TO PROMO CATEGORY

                $sql = "INSERT IGNORE INTO " . DB_PREFIX . "category_filter (category_id, filter_id)";
                $sql .= " SELECT 760, f.filter_id";
                $sql .= " FROM " . DB_PREFIX . "product_filter f where product_id = " . (int)$product_id . ";";

                $this->db->query($sql);

                return true;
            }

        }


    }

    public function delete_old_promo()
    {
        $promoCategoryId = '760';
        //DELETE ALL PRODUCT PROMOS
        $this->db->query("DELETE FROM `" . DB_PREFIX . "product_special` WHERE product_id > 0");

        //DELETE ALL PRODUCTS FROM PROMO CATEGORY
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE category_id = '" . $promoCategoryId . "'");

        //DELETE ALL FILTERS FROM PROMO CATEGORY
        $this->db->query("DELETE FROM " . DB_PREFIX . "category_filter WHERE category_id = '" . $promoCategoryId . "'");
    }

}