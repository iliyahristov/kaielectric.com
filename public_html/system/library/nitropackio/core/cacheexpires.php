<?php

namespace nitropackio\core;

use nitropackio\core\Nitropack;

class CacheExpires extends Library {
    private $min_expires = null;
    private $last_query_time = 0;
    private $last_query = "";
    private $check_product_ids = [];

    public function prepareProductId($product_id) {
        if (!in_array($product_id, $this->check_product_ids)) {
            $this->check_product_ids[] = $product_id;
        }
    }

    public function expiresHeader($registry) {
        // Query minimum expires
        $this->queryMinExpires();

        if ($this->min_expires != null && $this->min_expires > time()) {
            Nitropack::logDebugMessage(sprintf("Set X-Nitro-Expires: %s | Date: %s | Products: %s | Query: %s | Query Time: %s", $this->min_expires, date('Y-m-d', $this->min_expires), implode(",", $this->check_product_ids), $this->last_query, $this->last_query_time));

            Nitropack::header("X-Nitro-Expires: " . $this->min_expires);
        }
    }

    private function queryMinExpires() {
        if (!empty($this->check_product_ids)) {
            $in = implode(",", $this->check_product_ids);

            $subquery = "SELECT DISTINCT date_start, date_end FROM `" . DB_PREFIX . "product_special` WHERE product_id IN (" . $in . ") UNION SELECT date_start, date_end FROM `" . DB_PREFIX . "product_discount` WHERE product_id IN (" . $in . ")";

            $sql = "SELECT MIN(e.expires) as expires FROM (
                SELECT
                    t.date_end as expires
                FROM
                    (" . $subquery . ") AS t
                WHERE t.date_start < NOW() AND t.date_end > NOW()
                UNION SELECT
                    t.date_start as expires
                FROM
                    (" . $subquery . ") AS t
                WHERE t.date_start > NOW() AND (t.date_end = '0000-00-00' OR t.date_end > t.date_start)
            ) AS e;";

            $start_time = microtime(true);

            $expires = $this->db->query($sql)->row['expires'];
            
            $this->last_query_time = microtime(true) - $start_time;
            $this->last_query = $sql;

            // Amend the global earliest expires date, if needed. Note that if the earliest expires date is in the past, we disregard it.
            if ($expires) {
                $this->min_expires = strtotime($expires);
            }
        }
    }
}
