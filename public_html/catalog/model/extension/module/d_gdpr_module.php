<?php
/*
 *  location: admin/model
 */

include_once DIR_SYSTEM.'library/d_inky_premailer/autoload.php';
include_once DIR_SYSTEM.'library/d_inky_premailer/dreamvention/inky-premailer/src/InkyPremailer.php';

use Dreamvention\InkyPremailer\InkyPremailer;

class ModelExtensionModuleDGDPRModule extends Model
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/module/d_gdpr_module';

    public function sendDownloadRequestMail($data, $download=true)
    {
        if ($data['customer_id'] !== 0) {
            $this->load->model('account/customer');
            $customer_info = $this->model_account_customer->getCustomer($data['customer_id']);
            $data['hi_customer']= $this->language->get('text_hi').' '. $customer_info['firstname'] . ' ' . $customer_info['lastname'];
        } else {
            $data['hi_customer']= $this->language->get('text_hi').' '.$data['email'];
        }


        if ($download) {
            $data['mail_text_additional'] = '';
            $data['mail_text'] = $this->language->get('mail_text_download');
        } else {
            $data['mail_text_additional'] = $this->language->get('mail_text_remove_additional').' ';
            $data['mail_text'] = $this->language->get('mail_text_delete');
        }

        $data['mail_text_additional'] .= $this->language->get('mail_text_confirm_request');

        $data['mail_text_customer_profile'] = $this->language->get('mail_text_customer_profile');
        $data['mail_text_customer_addresses'] = $this->language->get('mail_text_customer_addresses');
        $data['mail_text_session_information'] = $this->language->get('mail_text_session_information');

        $this->load->model('tool/image');

        if ($this->request->server['HTTPS']) {
            $data['logo'] = $this->config->get('config_ssl') . 'image/catalog/'.$this->codename.'/d_gdpr_module.svg' ;
        } else {
            $data['logo'] = $this->config->get('config_url') . 'image/catalog/'.$this->codename.'/d_gdpr_module.svg' ;
        }

        if (VERSION >= '2.2.0.0') {
            if (VERSION >= '3.0.0.0') {
                $engine = $this->config->get('config_mail_engine');
                $mail = new Mail($engine);
                $mail->protocol = $engine;
            } else {
                $mail = new Mail();
                $mail->protocol = $this->config->get('config_mail_protocol');
            }

            $mail->parameter = $this->config->get('config_mail_parameter');
            $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
            $mail->smtp_username = $this->config->get('config_mail_smtp_username');
            $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
            $mail->smtp_port = $this->config->get('config_mail_smtp_port');
            $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
        } elseif (VERSION=='2.1.0.1' || VERSION=='2.1.0.2' || VERSION == '2.0.3.1') {
            $mail = new Mail();
            $mail->protocol = $this->config->get('config_mail_protocol');
            $mail->parameter = $this->config->get('config_mail_parameter');
            $mail->smtp_hostname = $this->config->get('config_smtp_host');
            $mail->smtp_username = $this->config->get('config_smtp_username');
            $mail->smtp_password = $this->config->get('config_smtp_password');
            $mail->smtp_port = $this->config->get('config_smtp_port');
            $mail->smtp_timeout = $this->config->get('config_smtp_timeout');
        } else {
            $mail = new Mail($this->config->get('config_mail'));
        }

        $mail->setTo($data['email']);
        $mail->setFrom($this->config->get('config_email'));
        $mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
        $mail->setSubject($this->language->get('text_subject_mail'));

        $mailText =$this->model_extension_d_opencart_patch_load->view('extension/'.$this->codename.'/download_request_email', $data);
        $links = array(
            'catalog/view/javascript/d_gdpr_module/library/foundation-emails.css',
            'catalog/view/theme/default/stylesheet/d_gdpr_module/mail.css'
        );
        $mailText = $this->getEmailContent($mailText, $links, '');

        $mail->setHtml($mailText);
        $mail->setText(html_entity_decode($mailText, ENT_QUOTES, 'UTF-8'));
        $mail->send();
        return true;
    }

    public function getEmailContent($html, $links, $styles)
    {
        $inkyPremailer = new InkyPremailer();

        return $inkyPremailer->render($html, $links, $styles);
    }

    public function getCustomerByEmail($email)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer`
            WHERE `email` = '" . $this->db->escape($email) . "'";

        $query = $this->db->query($sql);

        return $query->row;
    }

    public function getRequestsByCustomer($customer_id)
    {
        $sql = "SELECT * FROM ". DB_PREFIX . "d_gdpr_request
            WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }
    public function getRequestsByEmail($email)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "d_gdpr_request`
            WHERE `email` = '" . $this->db->escape($email) . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function createRequest($data)
    {
        $result = $this->cache->get('gdpr-request.' . $data['key']);
        if (!$result) {
            $sql = "INSERT INTO `" . DB_PREFIX . "d_gdpr_request`
            SET `request_type` = '" . $this->db->escape($data['request_type']) . "',
                `customer_id` = '" . (int)$data['customer_id'] . "',
                `email` = '" . $this->db->escape($data['email']) . "',
                `user_agent` = '" . $data['user_agent'] . "',
                `request_key` = '" . $data['key'] . "',
                `confirmed` = '" . (int)false . "',
                `request_date` = NOW()";

            $this->db->query($sql);

            $this->cache->set('gdpr-request.' .$data['key'], 1);
        }

        return $data['key'];
    }

    public function getRestrictByCustomer($customer_id)
    {
        $sql = "SELECT * FROM ". DB_PREFIX . "d_gdpr_restrict
        WHERE customer_id = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->row;
    }

    public function editRestrict($customer_id, $status)
    {
        $result = $this->getRestrictByCustomer($customer_id);
        if (empty($result)) {
            $sql = "INSERT INTO `". DB_PREFIX . "d_gdpr_restrict`
            SET `status` = '".(int)$status."'
            , `customer_id` = '" . (int)$customer_id . "'";
            $query = $this->db->query($sql);
        } else {
            $sql = "UPDATE `". DB_PREFIX . "d_gdpr_restrict`
            SET `status` = '".(int)$status."'
            WHERE `customer_id` = '" . (int)$customer_id . "'";
            $query = $this->db->query($sql);
        }
    }


    public function saveCookies($cookies_data)
    {
        $sql = "INSERT INTO `". DB_PREFIX . "d_gdpr_cookie` SET
            `customer_id` = '" . $this->db->escape($cookies_data['customer_id']) . "',
            `user_agent` = '" . $this->db->escape($cookies_data['user_agent'])."',
            `accepted` =  '" . $this->db->escape($cookies_data['accepted']) . "',
            `cookie_extra` = '" . $this->db->escape(json_encode($cookies_data['coockie_extra'])) . "', 
            `accept_language_id` = '" . $this->db->escape($cookies_data['accept_language_id']) . "',
            `accept_date` = NOW(),
            `decline_date` = NOW()
            ON DUPLICATE KEY UPDATE
            `accept_date` = NOW(),
            `decline_date` = NOW()";

        $this->db->query($sql);
    }

    public function savePolicy($policy_data)
    {
        $sql = "INSERT INTO `". DB_PREFIX . "d_gdpr_policy` SET 
        customer_id = '".(int)$policy_data['customer_id']."',
        email = '".$this->db->escape($policy_data['email'])."',
        policy_id = '".(int)$policy_data['policy_id']."',
        name = '".$this->db->escape($policy_data['name'])."',
        content = '".$this->db->escape($policy_data['content'])."',
        date = NOW()";

        $this->db->query($sql);
    }

    public function getOrdersForEmail($email)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "order`
            WHERE `email` = '" . $this->db->escape($email) . "'";
        $query = $this->db->query($sql);

        $orders = $query->rows;

        $that = $this;

        $orders = array_map(function ($value) use ($that) {
            $value['products'] = $that->getOrderProducts($value['order_id']);
            return $value;
        }, $orders);

        return $orders;
    }

    public function getOrderProducts($order_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "order_product`
            WHERE `order_id` = '" . (int)$order_id . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getAddressesForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "address`
            WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getUserAddressesData($customer_id)
    {
        $some_data = array(
            array('Address ID','Customer ID','First Name','Last Name','Company','Address 1','Address 2','City','Postcode','Country ID','Zone ID','Custom field')
        );

        $requests = $this->getAddressesForCustomer($customer_id);

        foreach ($requests as $r) {
            $some_data[] = array(
                $r['address_id'],
                $r['customer_id'],
                $r['firstname'],
                $r['lastname'],
                $r['company'],
                $r['address_1'],
                $r['address_2'],
                $r['city'],
                $r['postcode'],
                $r['country_id'],
                $r['zone_id'],
                $r['custom_field'],
            );
        }

        return $some_data;
    }

    public function getUserOrdersData($email)
    {
        $some_data = array(
            array('order_id' ,'invoice_no', 'invoice_prefix','store_id','store_name','store_url','customer_id','customer_group_id','firstname','lastname','email','telephone','fax','custom_field','payment_firstname','payment_lastname','payment_company','payment_address_1','payment_address_2','payment_city','payment_postcode','payment_country','payment_country_id','payment_zone','payment_zone_id','payment_address_format','payment_custom_field','payment_method','payment_code','shipping_firstname','shipping_lastname','shipping_company','shipping_address_1','shipping_address_2','shipping_city','shipping_postcode','shipping_country','shipping_country_id','shipping_zone','shipping_zone_id','shipping_address_format','shipping_custom_field','shipping_method','shipping_code','comment','total','order_status_id','affiliate_id','commission','marketing_id','tracking','language_id','currency_id','currency_code','currency_value','ip','forwarded_ip','user_agent','accept_language','date_added','date_modified', 'products')
        );

        $orders = $this->getOrdersForEmail($email);

        foreach ($orders as $r) {
            $products = $this->getOrderProducts($r['order_id']);
            $some_data[] = array(
                $r['order_id'],
                $r['invoice_no'],
                $r['invoice_prefix'],
                $r['store_id'],
                $r['store_name'],
                $r['store_url'],
                $r['customer_id'],
                $r['customer_group_id'],
                $r['firstname'],
                $r['lastname'],
                $r['email'],
                $r['telephone'],
                $r['fax'],
                $r['custom_field'],
                $r['payment_firstname'],
                $r['payment_lastname'],
                $r['payment_company'],
                $r['payment_address_1'],
                $r['payment_address_2'],
                $r['payment_city'],
                $r['payment_postcode'],
                $r['payment_country'],
                $r['payment_country_id'],
                $r['payment_zone'],
                $r['payment_zone_id'],
                $r['payment_address_format'],
                $r['payment_custom_field'],
                $r['payment_method'],
                $r['payment_code'],
                $r['shipping_firstname'],
                $r['shipping_lastname'],
                $r['shipping_company'],
                $r['shipping_address_1'],
                $r['shipping_address_2'],
                $r['shipping_city'],
                $r['shipping_postcode'],
                $r['shipping_country'],
                $r['shipping_country_id'],
                $r['shipping_zone'],
                $r['shipping_zone_id'],
                $r['shipping_address_format'],
                $r['shipping_custom_field'],
                $r['shipping_method'],
                $r['shipping_code'],
                $r['comment'],
                $r['total'],
                $r['order_status_id'],
                $r['affiliate_id'],
                $r['commission'],
                $r['marketing_id'],
                $r['tracking'],
                $r['language_id'],
                $r['currency_id'],
                $r['currency_code'],
                $r['currency_value'],
                $r['ip'],
                $r['forwarded_ip'],
                $r['user_agent'],
                $r['accept_language'],
                $r['date_added'],
                $r['date_modified'],
                json_encode($products)
            );
        }

        return $some_data;
    }

    public function getUserRequestsData($customer_id)
    {
        $some_data = array(
            array('ID', 'Request type', 'Customer ID', 'Email', 'Confirmed', 'Request time'),
        );

        $requests = $this->getRequestsByCustomer($customer_id);

        foreach ($requests as $r) {
            $some_data[] = array(
                $r['id'],
                $r['request_type'],
                $r['customer_id'],
                $r['email'],
                ($r['confirmed']) ? true : false,
                $r['request_date'],
            );
        }

        return $some_data;
    }

    public function getActivitiesForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_activity`
            WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getCustomerDataForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer`
            WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->row;
    }

    public function getIPforCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_ip`
            WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getUserPersonalData($customer_id)
    {
        $some_data = array(array(
            'Activity'
        ));
        $some_data[] = array(
            'customer_activity_id','customer_id','key','data','ip','date_added'
        );

        $activities = $this->getActivitiesForCustomer($customer_id);


        foreach ($activities as $a) {
            $some_data[] = array(
                $a['customer_activity_id'],
                $a['customer_id'],
                $a['key'],
                $a['data'],
                $a['ip'],
                $a['date_added']
            );
        }
        $some_data[] = array();
        $some_data[] = array('Customer Account Data');
        $some_data[] =
            array('customer_id','firstname','lastname','email','telephone','fax','wishlist','newsletter','ip','custom_field','date_added');

        $customer_data = $this->getCustomerDataForCustomer($customer_id);

        $some_data[] = array(
            $customer_data['customer_id'],
            $customer_data['firstname'],
            $customer_data['lastname'],
            $customer_data['email'],
            $customer_data['telephone'],
            $customer_data['fax'],
            $customer_data['wishlist'],
            $customer_data['newsletter'],
            $customer_data['ip'],
            $customer_data['custom_field'],
            $customer_data['date_added']
        );

        $some_data[] = array();
        $some_data[] = array('Ip');
        $some_data[] = array('customer_ip_id','customer_id','ip','date_added');

        $ip = $this->getIPforCustomer($customer_id);

        foreach ($ip as $i) {
            $some_data[] = array(
                $i['customer_ip_id'],
                $i['customer_id'],
                $i['ip'],
                $i['date_added']
            );
        }


        return $some_data;
    }

    public function getRequestDataByKey($key, $active_hours = 10)
    {
        $sql = "SELECT * FROM " . DB_PREFIX . "d_gdpr_request WHERE request_key = '" . $key . "' AND 
        `request_date` >= (NOW() - INTERVAL " . (int)$active_hours . " HOUR)";
        return $this->db->query($sql)->row;
    }

    public function changeRequestStatus($key, $status)
    {
        $sql = "UPDATE `". DB_PREFIX ."d_gdpr_request`
        SET
            `confirmed` = '" . (int)$status . "'
        WHERE `request_key` = '" . $key . "'";
        $this->db->query($sql);

        $this->cache->delete('gdpr-request.' . $key);
    }

    public function reportMail($data)
    {
        $this->load->model('setting/setting');

        $setting_module = $this->model_setting_setting->getSetting($this->codename);

        $this->load->model('extension/d_opencart_patch/load');
        $this->load->language($this->route);

        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');

        $data['text_account_detail'] = $this->language->get('text_account_detail');
        $data['text_addresses'] = $this->language->get('text_addresses');
        $data['text_orders'] = $this->language->get('text_orders');
        $data['text_order_number'] = $this->language->get('text_order_number');
        $data['text_payment_address'] = $this->language->get('text_payment_address');
        $data['text_shipping_address'] = $this->language->get('text_shipping_address');
        $data['text_products'] = $this->language->get('text_products');
        $data['text_activity'] = $this->language->get('text_activity');
        $data['text_history'] = $this->language->get('text_history');
        $data['text_saved_ip'] = $this->language->get('text_saved_ip');
        $data['text_logins'] = $this->language->get('text_logins');
        $data['text_onlines'] = $this->language->get('text_onlines');
        $data['text_rewards'] = $this->language->get('text_rewards');
        $data['text_reviews'] = $this->language->get('text_reviews');
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['text_transactions'] = $this->language->get('text_transactions');
        $data['text_gdpr_requests'] = $this->language->get('text_gdpr_requests');

        $data['text_firstname'] = $this->language->get('text_firstname');
        $data['text_lastname'] = $this->language->get('text_lastname');
        $data['text_email'] = $this->language->get('text_email');
        $data['text_phone'] = $this->language->get('text_phone');
        $data['text_fax'] = $this->language->get('text_fax');
        $data['text_account_newsletter'] = $this->language->get('text_account_newsletter');
        $data['text_date_created'] = $this->language->get('text_date_created');

        $data['text_invoice_no'] = $this->language->get('text_invoice_no');
        $data['text_store_name'] = $this->language->get('text_store_name');
        $data['text_payment_method'] = $this->language->get('text_payment_method');
        $data['text_shipping_method'] = $this->language->get('text_shipping_method');
        $data['text_currency'] = $this->language->get('text_currency');
        $data['text_total'] = $this->language->get('text_total');
        $data['text_address_ip'] = $this->language->get('text_address_ip');
        $data['text_date_updated'] = $this->language->get('text_date_updated');

        $data['text_company_name'] = $this->language->get('text_company_name');
        $data['text_address'] = $this->language->get('text_address');
        $data['text_city'] = $this->language->get('text_city');
        $data['text_country'] = $this->language->get('text_country');
        $data['text_postcode'] = $this->language->get('text_postcode');

        $data['text_product_model'] = $this->language->get('text_product_model');
        $data['text_product_name'] = $this->language->get('text_product_name');
        $data['text_product_quantity'] = $this->language->get('text_product_quantity');
        $data['text_product_total'] = $this->language->get('text_product_total');
        $data['text_product_tax'] = $this->language->get('text_product_tax');
        $data['text_product_reward'] = $this->language->get('text_product_reward');

        $data['text_request_id'] = $this->language->get('text_request_id');
        $data['text_request_type'] = $this->language->get('text_request_type');
        $data['text_confirmed'] = $this->language->get('text_confirmed');
        $data['text_await'] = $this->language->get('text_await');
        $data['text_status'] = $this->language->get('text_status');
        $data['text_datetime'] = $this->language->get('text_datetime');

        $data['text_comment'] = $this->language->get('text_comment');

        $data['text_id'] = $this->language->get('text_id');

        $data['text_url'] = $this->language->get('text_url');
        $data['text_referer'] = $this->language->get('text_referer');

        $data['text_key'] = $this->language->get('text_key');
        $data['text_data'] = $this->language->get('text_data');
        $data['text_ip'] = $this->language->get('text_ip');

        $data['text_product_id'] = $this->language->get('text_product_id');
        $data['text_text'] = $this->language->get('text_text');
        $data['text_rating'] = $this->language->get('text_rating');
        $data['text_status'] = $this->language->get('text_status');

        $data['text_order_id'] = $this->language->get('text_order_id');
        $data['text_description'] = $this->language->get('text_description');
        $data['text_points'] = $this->language->get('text_points');

        $data['text_amount'] = $this->language->get('text_amount');

        $data['text_location_personal_data'] = $this->language->get('text_location_personal_data');
        $data['text_physical_location_host'] = $this->language->get('text_physical_location_host');

        if (!empty($setting_module[$this->codename.'_setting']['language'][$this->config->get('config_language_id')])) {
            $data['gdpr_setting'] = $setting_module[$this->codename.'_setting']['language'][$this->config->get('config_language_id')];
        }

        if ($data['customer_id'] !== 0) {
            $this->load->model('account/customer');
            $customer_info = $this->model_account_customer->getCustomer($data['customer_id']);
            $data['hi_customer']= $this->language->get('text_hi').' '. $customer_info['firstname'] . ' ' . $customer_info['lastname'];
        } else {
            $data['hi_customer']= $this->language->get('text_hi').' '.$data['email'];
        }

        if ($data['customer_id'] != 0) {
            $data['customer_data'] = $this->getCustomerDataForCustomer($data['customer_id']);
        } else {
            $data['customer_data'] = $this->getCustomerDataForEmail($data['email']);
        }

        if ($data['customer_data']) {
            $email = $data['customer_data']['email'];

            $data['addresses'] = $this->getAddressesForCustomer($data['customer_data']['customer_id']);
            $data['ip_data'] = $this->getIPforCustomer($data['customer_data']['customer_id']);
            $data['histories'] = $this->getHistoryForCustomer($data['customer_data']['customer_id']);
            $data['activities'] = $this->getActivitiesForCustomer($data['customer_data']['customer_id']);
            $data['onlines'] = $this->getOnlinesForCustomer($data['customer_data']['customer_id']);
            $data['reviews'] = $this->getReviewsForCustomer($data['customer_data']['customer_id']);
            $data['rewards'] = $this->getRewardsForCustomer($data['customer_data']['customer_id']);
            $data['wishlists'] = $this->getWishlistsForCustomer($data['customer_data']['customer_id']);
            $data['transactions'] = $this->getTransactionsForCustomer($data['customer_data']['customer_id']);

            $data['wishlist_short'] = VERSION < '2.1.0.0';
        } else {
            $email = $data['email'];
        }

        $data['orders'] = $this->getOrdersForEmail($email);
        $data['logins'] = $this->getLoginsForEmail($email);
        $data['requests'] = $this->getRequestsByEmail($email);

        $message = '';

        if ($data['customer_id'] !== 0) {
            $this->load->model('account/customer');
            $customer_info = $this->model_account_customer->getCustomer($data['customer_id']);
            $data['hi_customer']= $this->language->get('text_hi').' '. $customer_info['firstname'] . ' ' . $customer_info['lastname'];
        } else {
            $data['hi_customer']= $this->language->get('text_hi').' '.$data['email'];
        }

        $data['message'] = $message;

        $this->load->model('tool/image');

        if ($this->request->server['HTTPS']) {
            $data['logo'] = $this->config->get('config_ssl') . 'image/catalog/'.$this->codename.'/d_gdpr_module.svg' ;
        } else {
            $data['logo'] = $this->config->get('config_url') . 'image/catalog/'.$this->codename.'/d_gdpr_module.svg' ;
        }

        if (VERSION >= '2.2.0.0') {
            if (VERSION >= '3.0.0.0') {
                $engine = $this->config->get('config_mail_engine');
                $mail = new Mail($engine);
                $mail->protocol = $engine;
            } else {
                $mail = new Mail();
                $mail->protocol = $this->config->get('config_mail_protocol');
            }

            $mail->parameter = $this->config->get('config_mail_parameter');
            $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
            $mail->smtp_username = $this->config->get('config_mail_smtp_username');
            $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
            $mail->smtp_port = $this->config->get('config_mail_smtp_port');
            $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
        } elseif (VERSION=='2.1.0.1' || VERSION=='2.1.0.2' || VERSION == '2.0.3.1') {
            $mail = new Mail();
            $mail->protocol = $this->config->get('config_mail_protocol');
            $mail->parameter = $this->config->get('config_mail_parameter');
            $mail->smtp_hostname = $this->config->get('config_smtp_host');
            $mail->smtp_username = $this->config->get('config_smtp_username');
            $mail->smtp_password = $this->config->get('config_smtp_password');
            $mail->smtp_port = $this->config->get('config_smtp_port');
            $mail->smtp_timeout = $this->config->get('config_smtp_timeout');
        } else {
            $mail = new Mail($this->config->get('config_mail'));
        }
        $mail->setTo($data['email']);
        $mail->setFrom($this->config->get('config_email'));
        $mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
        $mail->setSubject($this->language->get('text_subject_mail'));

        $mailText =$this->model_extension_d_opencart_patch_load->view('extension/'.$this->codename.'/report_email', $data);
        $links = array(
            'catalog/view/javascript/d_gdpr_module/library/foundation-emails.css',
            'catalog/view/theme/default/stylesheet/'.$this->codename.'/mail.css'
        );
        $mailText = $this->getEmailContent($mailText, $links, '');

        $mail->setHtml($mailText);
        $mail->setText(html_entity_decode($mailText, ENT_QUOTES, 'UTF-8'));
        $mail->send();
        return true;
    }

    public function getCustomerDataForEmail($email)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer`
            WHERE `email` = '" . $this->db->escape($email) . "'";

        $query = $this->db->query($sql);

        return $query->row;
    }

    public function getHistoryForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_history`
            WHERE `customer_id` = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getOnlinesForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_online`
            WHERE `customer_id` = '" . (int)$customer_id . "'";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getReviewsForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "review`
            WHERE `customer_id` = '" . (int)$customer_id . "'";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getRewardsForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_reward`
            WHERE `customer_id` = '" . (int)$customer_id . "'";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getWishlistsForCustomer($customer_id)
    {
        $wishlist_data = array();

        if (VERSION < '2.1.0.0') {
            if(!empty($this->session->data['wishlist'])){
                foreach ($this->session->data['wishlist'] as $key => $product_id) {
                    $wishlist_data[] = array(
                        'product_id' => $product_id
                    );
                }
            }
        } else {
            $sql = "SELECT * FROM `". DB_PREFIX . "customer_wishlist`
            WHERE `customer_id` = '" . (int)$customer_id . "'";

            $query = $this->db->query($sql);

            $wishlist_data = $query->rows;
        }

        return $wishlist_data;
    }

    public function getTransactionsForCustomer($customer_id)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_transaction`
            WHERE `customer_id` = '" . (int)$customer_id . "'";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getLoginsForEmail($email)
    {
        $sql = "SELECT * FROM `". DB_PREFIX . "customer_login`
            WHERE `email` = '" . (int)$email . "'";

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function deleteCustomerData($customer_id, $email)
    {
        if ($customer_id) {
            $this->anonymizeTable(array('firstname', 'lastname', 'email', 'telephone', 'fax', 'ip'), 'customer', array("customer_id='".(int)$customer_id."'"));
            $this->anonymizeTable(array(
                'firstname',
                'lastname',
                'company',
                'address_1',
                'address_2',
                'city',
                'postcode',
                'custom_field'
            ), 'address', array("customer_id='".(int)$customer_id."'"));
            $this->zerosTable(array('address_id', 'newsletter'), 'customer', array("customer_id='".(int)$customer_id."'"));
            if(VERSION > '2.2.0.0') {
                $this->cleanTable(array(
                    'cart',
                    'customer_ip',
                    'customer_wishlist'
                ), array("customer_id='".(int)$customer_id."'"));
            } elseif(VERSION >= '2.1.0.0' && VERSION < '2.2.0.0'){
                $this->cleanTable(array(
                    'customer_ip',
                    'customer_wishlist'
                ), array("customer_id='".(int)$customer_id."'"));
            } else {
                $this->cleanTable(array(
                    'cart',
                    'customer_ip',
                ), array("customer_id='".(int)$customer_id."'"));
            }
        }

        $this->anonymizeTable(array(
            'firstname',
            'lastname',
            'email',
            'telephone',
            'fax',
            'payment_firstname',
            'payment_lastname',
            'payment_company',
            'payment_address_1',
            'payment_address_2',
            'payment_city',
            'payment_postcode',
            'payment_country',
            'payment_zone',
            'payment_custom_field',
            'payment_method',
            'shipping_firstname',
            'shipping_lastname',
            'shipping_company',
            'shipping_address_1',
            'shipping_address_2',
            'shipping_city',
            'shipping_postcode',
            'shipping_country',
            'shipping_zone',
            'shipping_custom_field',
            'shipping_method',
            'tracking',
            'comment',
            'ip',
            'forwarded_ip',
            'user_agent',
            'accept_language'
        ), 'order', array("email='".$this->db->escape($email)."'"));
    }

    public function cleanTable($tables, $where)
    {
        foreach ($tables as $value) {
            $table_check = $this->db->query("SHOW TABLES LIKE '".DB_PREFIX.$value."'")->rows;
            if (!empty($table_check)) {
                $query = $this->db->query("DELETE FROM  `".DB_PREFIX.$value."` WHERE ".implode(' AND ', $where));
            }
        }
    }

    public function zerosTable($columns, $table_name, $where)
    {
        $query = $this->db->query("SELECT ".implode(', ', $columns)." FROM `".DB_PREFIX.$table_name."` WHERE ".implode(' AND ', $where));
        $result = $query->row;
        if ($query->num_rows) {
            foreach ($result as $key => $value) {
                $result[$key] = 0;
            }
            $sql = "UPDATE `".DB_PREFIX.$table_name."` SET ";
            $implode = array();
            foreach ($result as $key => $value) {
                $implode[] = $key."='".$value."'";
            }
            $sql .= implode(', ', $implode);
            $sql.=" WHERE ".implode(' AND ', $where);
            $this->db->query($sql);
        }
    }

    public function anonymizeTable($columns, $table_name, $where)
    {
        $query = $this->db->query("SELECT ".implode(', ', $columns)." FROM `".DB_PREFIX.$table_name."` WHERE ".implode(' AND ', $where));
        $result = $query->row;
        if ($query->num_rows) {
            foreach ($result as $key => $value) {
                $result[$key] = $this->anonymize($value);
            }
            $sql = "UPDATE `".DB_PREFIX.$table_name."` SET ";
            $implode = array();
            foreach ($result as $key => $value) {
                $implode[] = $key."='".$value."'";
            }
            $sql .= implode(', ', $implode);
            $sql.=" WHERE ".implode(' AND ', $where);
            $this->db->query($sql);
        }
    }

    public function anonymize($str)
    {
        $strs = explode(' ', $str);

        $result = array();

        foreach ($strs as $value) {
            $result[] = $this->generateRandomString(strlen($value));
        }

        return implode(' ', $result);
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
