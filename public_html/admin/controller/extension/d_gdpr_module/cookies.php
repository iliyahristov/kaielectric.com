<?php
/*
 *	location: admin/controller
 */

class ControllerExtensionDGDPRModuleCookies extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/d_gdpr_module/cookies';
    private $extension = array();

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('extension/module/'.$this->codename);
        $this->load->language('extension/'.$this->codename.'/cookies');
        $this->load->model('extension/d_opencart_patch/url');
    }

    public function init()
    {

        $data = array(
            'jobs' => array(),
            'current_page' => 1,
        );

        $filter_ = array(
            'start'     => 0,
            'limit'     => $this->config->get('config_limit_admin')
        );
        $results = $this->model_extension_module_d_gdpr_module->getCookies($filter_);
        $cookies_total = $this->model_extension_module_d_gdpr_module->getTotalCookies();

        $data['total'] = $cookies_total;
        $data['limit'] = $this->config->get('config_limit_admin');

        $that = $this;
        $cookies = array_map(function($value) use ($that) {
            $value['link'] = $that->model_extension_d_opencart_patch_url->ajax('customer/customer', '&filter_email='.$value['email'], '', true);

            return $value;
        },$results);

        $data['jobs'] = array(
            1 => $cookies
        );

        return $data;
    }

    public function update($state)
    {
        $filter_ = array(
            'start'     => ($state['current_page'] - 1)*$this->config->get('config_limit_admin'),
            'limit'     => $this->config->get('config_limit_admin')
        );
        $results = $this->model_extension_module_d_gdpr_module->getCookies($filter_);

        $that = $this;
        $cookies = array_map(function($value) use ($that) {
            $value['link'] = $that->model_extension_d_opencart_patch_url->ajax('customer/customer', '&filter_email='.$value['email'], '', true);

            return $value;
        },$results);

        $state['jobs'][$state['current_page']] =  $cookies;

        return $state;
    }

    public function local()
    {
        $local = array();

        $local['column_id'] = $this->language->get('column_id');
        $local['column_user_agent'] = $this->language->get('column_user_agent');
        $local['column_customer_id'] = $this->language->get('column_customer_id');
        $local['column_accept_language'] = $this->language->get('column_accept_language');
        $local['column_cookie_extra'] = $this->language->get('column_cookie_extra');
        $local['column_accepted_date'] = $this->language->get('column_accepted_date');

        $local['text_no_cookies'] = $this->language->get('text_no_cookies');

        return $local;
    }

    public function options()
    {
        $options = array();

        return $options;
    }
}
