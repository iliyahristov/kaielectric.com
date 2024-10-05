<?php
/*
 *	location: admin/controller
 */

class ControllerExtensionDGDPRModuleRequests extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/d_gdpr_module/requests';
    private $extension = array();

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('extension/module/'.$this->codename);
        $this->load->language('extension/'.$this->codename.'/requests');
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
        $results = $this->model_extension_module_d_gdpr_module->getRequests($filter_);
        $request_total = $this->model_extension_module_d_gdpr_module->getTotalRequests();

        $data['total'] = $request_total;
        $data['limit'] = $this->config->get('config_limit_admin');

        $that = $this;
        $requests = array_map(function($value) use ($that) {
            $value['link'] = $that->model_extension_d_opencart_patch_url->ajax('customer/customer', '&filter_email='.$value['email'], '', true);

            return $value;
        },$results);

        $data['jobs'] = array(
            1 => $requests
        );

        return $data;
    }

    public function update($state)
    {
        $filter_ = array(
            'start'     => ($state['current_page'] - 1)*$this->config->get('config_limit_admin'),
            'limit'     => $this->config->get('config_limit_admin')
        );
        $results = $this->model_extension_module_d_gdpr_module->getRequests($filter_);

        $that = $this;
        $requests = array_map(function($value) use ($that) {
            $value['link'] = $that->model_extension_d_opencart_patch_url->ajax('customer/customer', '&filter_email='.$value['email'], '', true);

            return $value;
        },$results);

        $state['jobs'][$state['current_page']] =  $requests;

        return $state;
    }

    public function local()
    {
        $local = array();

        $local['column_id'] = $this->language->get('column_id');
        $local['column_type'] = $this->language->get('column_type');
        $local['column_customer_id'] = $this->language->get('column_customer_id');
        $local['column_confirmed'] = $this->language->get('column_confirmed');
        $local['column_date'] = $this->language->get('column_date');

        $local['text_no_requests'] = $this->language->get('text_no_requests');

        return $local;
    }

    public function options()
    {
        $options = array();

        return $options;
    }
}
