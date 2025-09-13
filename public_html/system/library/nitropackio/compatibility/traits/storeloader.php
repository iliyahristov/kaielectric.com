<?php

namespace nitropackio\compatibility\traits;

trait StoreLoader {
    public function getStores() {
        $result = array();

        $result[0] = array(
            'store_id' => 0,
            'name' => $this->normalizeStoreName($this->config->get('config_name')),
            'url' => $this->isInAdmin() ? HTTP_CATALOG : HTTP_SERVER,
            'ssl' => $this->isInAdmin() ? HTTPS_CATALOG : HTTPS_SERVER
        );

        $stores = $this->db->query("SELECT * FROM `" . DB_PREFIX . "store` ORDER BY url")->rows;

        foreach ($stores as $store) {
            $store['name'] = $this->normalizeStoreName($store['name']);

            $result[(int)$store['store_id']] = $store;
        }

        return $result;
    }

    protected function normalizeStoreName($storeName) {
        if (is_array($storeName)) {
            if (isset($storeName[ $this->config->get('config_language_id') ])) {
                return $storeName[ $this->config->get('config_language_id') ];
            } else {
                return current($storeName);
            }
        }

        return $storeName;
    }

    protected function getStore($store_id) {
        $stores = $this->getStores();

        if (isset($stores[$store_id])) {
            return $stores[$store_id];
        } else {
            trigger_error("Store not found: " . $store_id);
        }
    }

    protected function isInAdmin() {
        return basename(rtrim(DIR_TEMPLATE, '/\\')) == 'template';
    }

    public function getProductStores($product_id) {
        $product_store_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int)$product_id . "'");

        foreach ($query->rows as $result) {
            $product_store_data[] = $result['store_id'];
        }

        return $product_store_data;
    }
}
