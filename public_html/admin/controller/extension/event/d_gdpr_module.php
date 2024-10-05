<?php

/*
 *  location: catalog/controller
 */

class ControllerExtensionEventDGDPRModule extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/event/d_gdpr_module';

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('extension/module/'.$this->codename);
        $this->load->language('extension/module/'.$this->codename);
        $this->load->model('extension/d_opencart_patch/load');

    }

    public function view_customer_customer_before(&$route, &$data)
    {
        if ($data['customers']) {
            foreach ($data['customers'] as $key => $customer) {
                $restrict_info = $this->{'model_extension_module_'.$this->codename}->getRestrict($customer['customer_id']);
                if(!empty($restrict_info['status'])){
                    $data['customers'][$key]['email'] .= ' - '.$this->language->get('text_restrict_processing');
                }
            }
        }
    }

}