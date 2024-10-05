<?php
/*
 *	location: admin/controller
 */

class ControllerExtensionDGDPRModulePolicies extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/d_gdpr_module/policies';
    private $extension = array();

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('extension/module/'.$this->codename);
        $this->load->language('extension/'.$this->codename.'/policies');
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
        $results = $this->model_extension_module_d_gdpr_module->getPolicies($filter_);
        $policies_total = $this->model_extension_module_d_gdpr_module->geTotalPolicies();

        $data['total'] = $policies_total;
        $data['limit'] = $this->config->get('config_limit_admin');

        $that = $this;
        $policies = array_map(function($value) use ($that) {
            $value['link'] = $that->model_extension_d_opencart_patch_url->ajax('customer/customer', '&filter_email='.$value['email'], '', true);
            $value['content'] = html_entity_decode($value['content'], ENT_QUOTES, 'UTF-8');
            $value['short_content'] = utf8_substr(trim($value['content']), 0, 200) . '..';
            return $value;
        },$results);

        $data['jobs'] = array(
            1 => $policies
        );

        return $data;
    }

    public function update($state)
    {
        $filter_ = array(
            'start'     => ($state['current_page'] - 1)*$this->config->get('config_limit_admin'),
            'limit'     => $this->config->get('config_limit_admin')
        );
        $results = $this->model_extension_module_d_gdpr_module->getPolicies($filter_);

        $that = $this;
        $policies = array_map(function($value) use ($that) {
            $value['link'] = $that->model_extension_d_opencart_patch_url->ajax('customer/customer', '&filter_email='.$value['email'], '', true);
            $value['content'] = html_entity_decode($value['content'], ENT_QUOTES, 'UTF-8');
            $value['short_content'] = utf8_substr(trim(html_entity_decode($value['content'], ENT_QUOTES, 'UTF-8')), 0, 200) . '..';
            return $value;
        },$results);

        $state['jobs'][$state['current_page']] =  $policies;

        return $state;
    }

    public function local()
    {
        $local = array();

        $local['column_id'] = $this->language->get('column_id');
        $local['column_customer_email'] = $this->language->get('column_customer_email');
        $local['column_policy_id'] = $this->language->get('column_policy_id');
        $local['column_policy_name'] = $this->language->get('column_policy_name');
        $local['column_policy_content'] = $this->language->get('column_policy_content');
        $local['column_accepted_date'] = $this->language->get('column_accepted_date');
        $local['column_view'] = $this->language->get('column_view');

        $local['text_no_policies'] = $this->language->get('text_no_policies');
        $local['text_view'] = $this->language->get('text_view');

        return $local;
    }

    public function options()
    {
        $options = array();

        return $options;
    }
}
