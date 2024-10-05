<?php
class ModelExtensionTfaCustomer extends Model
{
    public function install()
    {
        $this->db->query(
            "ALTER TABLE `" . DB_PREFIX . "customer`
            ADD `shared_secret` VARCHAR(40) NOT NULL AFTER `password`,
            ADD `backup_code` VARCHAR(40) NOT NULL AFTER `shared_secret`,
            ADD `tfa_enable` TINYINT(1) NOT NULL DEFAULT '0' AFTER `backup_code`"
        );
    }

    public function uninstall()
    {
        $this->db->query(
            "ALTER TABLE `" . DB_PREFIX . "customer`
            DROP `shared_secret`,
            DROP `backup_code`,
            DROP `tfa_enable`"
        );
    }

    public function checkInstalled()
    {
        $query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer` LIKE 'tfa_enable'");
        return (($query->num_rows > 0)?true:false);
    }
}