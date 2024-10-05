<?php
/*
 *  location: admin/model
 */

class ModelExtensionModuleDGDPRModule extends Model
{
    private $codename = 'd_gdpr_module';

    /**
     * Install database
     */
    public function installDatabase()
    {
        $this->db->query("CREATE TABLE IF NOT EXISTS `". DB_PREFIX . "d_gdpr_cookie` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `customer_id` int(11) NOT NULL,
            `user_agent` varchar(255) NOT NULL,
            `accepted` tinyint(3) NOT NULL,
            `cookie_extra` text NOT NULL,
            `accept_language_id` char(128) NOT NULL,
            `accept_date` datetime not null,
            `decline_date` datetime not null,
            PRIMARY KEY (`id`),
            UNIQUE KEY `no_duplicate` (`customer_id`)
        )
        COLLATE='utf8_general_ci'
        ENGINE=MyISAM;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `". DB_PREFIX ."d_gdpr_request` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `request_type` char(128) NOT NULL,
            `customer_id` int(11) NOT NULL,
            `email` varchar(256) NOT NULL,
            `user_agent` varchar(255) NOT NULL,
            `request_key` text NOT NULL,
            `confirmed` tinyint(3) NOT NULL,
            `request_date` datetime not null,
            PRIMARY KEY (`id`)
        )
        COLLATE='utf8_general_ci'
        ENGINE=MyISAM;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `". DB_PREFIX . "d_gdpr_policy` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `customer_id` INT(11) NOT NULL,
            `email` VARCHAR(256) NOT NULL,
            `policy_id` INT(11) NOT NULL,
            `name` VARCHAR(256) NOT NULL,
            `content` LONGTEXT NOT NULL,
            `date` datetime not null,
            PRIMARY KEY (`id`)
        )
        COLLATE='utf8_general_ci'
        ENGINE=MyISAM;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `". DB_PREFIX ."d_gdpr_restrict` (
            `customer_id` INT(11) NOT NULL AUTO_INCREMENT,
            `status` TINYINT(4) NOT NULL,
            PRIMARY KEY (`customer_id`)
        )
        COLLATE='utf8_general_ci'
        ENGINE=MyISAM;");
    }

    /**
     * Uninstall database
     */
    public function uninstallDatabase()
    {
        $this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."d_gdpr_cookie`");
        $this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."d_gdpr_request`");
        $this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."d_gdpr_policy`");
        $this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."d_gdpr_restrict`");
    }


    /**
     * Update database
     */
    public function updateDatabase()
    {

        //if you have changed something in your tables, remeber to add it to your update database function
    }


    /**
     * Get all Vue templates
     * @return array
     */
    public function getVueTemplates()
    {
        $files = glob(DIR_TEMPLATE.'extension/'.$this->codename.'/**/*.vue', GLOB_BRACE);
        foreach ($files as $key => $file) {
            $files[$key] = file_get_contents($file);
        }
        return $files;
    }

    /**
     * Get Vue JS scripts
     * @return array
     */
    public function getVueScripts()
    {
        $results = array();
        $files = glob(DIR_APPLICATION.'view/javascript/'.$this->codename.'/model/**/*.js');
        foreach ($files as $file) {
            $results[] = str_replace(DIR_APPLICATION, '', $file);
        }
        $files = glob(DIR_APPLICATION.'view/javascript/'.$this->codename.'/model/*.js');
        foreach ($files as $file) {
            $results[] = str_replace(DIR_APPLICATION, '', $file);
        }
        
        $files = glob(DIR_APPLICATION.'view/javascript/'.$this->codename.'/actions/*.js');
        foreach ($files as $file) {
            $results[] = str_replace(DIR_APPLICATION, '', $file);
        }
        
        $files = glob(DIR_APPLICATION.'view/javascript/'.$this->codename.'/mutations/*.js');
        foreach ($files as $file) {
            $results[] = str_replace(DIR_APPLICATION, '', $file);
        }

        $files = glob(DIR_APPLICATION.'view/javascript/'.$this->codename.'/getters/*.js');
        foreach ($files as $file) {
            $results[] = str_replace(DIR_APPLICATION, '', $file);
        }
        return $results;
    }

    /**
     * Get all requests
     * @param $data
     * @return mixed
     */
    public function getRequests($data)
    {
        $sql = "SELECT *, gr.email as email FROM ". DB_PREFIX . "d_gdpr_request gr LEFT JOIN " . DB_PREFIX ."customer ca ON gr.customer_id = ca.customer_id";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 100;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * Get total requests
     * @return mixed
     */
    public function getTotalRequests()
    {
        return $this->db->query("SELECT COUNT(DISTINCT `id`) AS total
            FROM `". DB_PREFIX ."d_gdpr_request`")->row['total'];
    }

    /**
     * Get all cookies
     * @param $data
     * @return mixed
     */
    public function getCookies($data)
    {
        $sql = "SELECT * FROM ". DB_PREFIX . "d_gdpr_cookie c LEFT JOIN " . DB_PREFIX ."customer ca ON c.customer_id = ca.customer_id";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 100;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * Get all cookies
     * @return mixed
     */
    public function getTotalCookies()
    {
        return $this->db->query("SELECT count(*) as total FROM ". DB_PREFIX . "d_gdpr_cookie c LEFT JOIN " . DB_PREFIX ."customer ca ON c.customer_id = ca.customer_id")->row['total'];
    }

    /**
     * Get all policies
     * @param $data
     * @return mixed
     */
    public function getPolicies($data)
    {
        $sql = "SELECT * FROM ". DB_PREFIX . "d_gdpr_policy p ORDER BY p.id";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 100;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * Get total policies
     * @return mixed
     */
    public function geTotalPolicies()
    {
        return $this->db->query("SELECT count(*) as total FROM ". DB_PREFIX . "d_gdpr_policy p")->row['total'];
    }

    public function getSections() {
        $files = glob(DIR_APPLICATION.'controller/extension/'.$this->codename.'/*.php');

        $result = array_map(function($value) {
            return basename($value, '.php');
        }, $files);

        return $result;
    }

    public function getRestrict($customer_id) {
        $sql = "SELECT * FROM `". DB_PREFIX . "d_gdpr_restrict`
        WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->row;
    }

}
