<?php

class ModelExtensionPaymentTkEcontPayment extends Model {

	public function createTables() {

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tk_econt_payment` (
			`econt_order_id` int(11) NOT NULL AUTO_INCREMENT,
			`order_id` int(11) NOT NULL DEFAULT '0',
			`payment_token` varchar(1024) NOT NULL DEFAULT '',
			`payment_uri` varchar(1024) NOT NULL DEFAULT '',
			`payment_identifier` varchar(1024) NOT NULL DEFAULT '',
			`date_added` date NOT NULL DEFAULT '0000-00-00',
			PRIMARY KEY (`econt_order_id`),
			KEY `order_id` (`order_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8");
	}

	public function deleteTables() {

		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tk_econt_payment`");
	}

	public function deletePayment() {

		$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "tk_econt_payment");
	}

}