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

        $this->load->model('extension/module/' . $this->codename);
        $this->load->language('extension/module/' . $this->codename);
        $this->load->model('extension/d_opencart_patch/load');
    }

    public function view_common_header_after(&$route, &$data, &$output)
    {
        $this->load->model('setting/setting');

        $cookie_setting = $this->model_setting_setting->getSetting($this->codename);

        if (!isset($cookie_setting[$this->codename . '_cookies'])) {
            $this->load->config($this->codename);
            $cookie_setting = $this->config->get($this->codename . '_cookies');
        } else {
            $cookie_setting = $cookie_setting[$this->codename . '_cookies'];
        }

        $data['cookie_accepted_route'] = $this->url->link('extension/module/' . $this->codename . '/mark_cookie_accepted', '', true);
        $data['cookie_declined_route'] = $this->url->link('extension/module/' . $this->codename . '/mark_cookie_declined', '', true);

        if ($cookie_setting['status']) {
            $data['style_link'] = 'catalog/view/javascript/d_gdpr_module/library/cookieconsent/cookieconsent.min.css';
            $data['script_link'] = 'catalog/view/javascript/d_gdpr_module/library/cookieconsent/cookieconsent.min.js';

            $data['text_message'] = $cookie_setting['content']['message'];
            $data['text_dismiss'] = $cookie_setting['content']['dismiss'];
            $data['text_link'] = $cookie_setting['content']['link'];

            $data['show_privacy_link'] = !empty($cookie_setting['show_privacy_link']);

            $data['banner_color'] = $cookie_setting['style']['banner_color'];
            $data['banner_text_color'] = $cookie_setting['style']['banner_text_color'];
            $data['button_color'] = $cookie_setting['style']['button_color'];
            $data['button_text_color'] = $cookie_setting['style']['button_text_color'];
            $data['position'] = $cookie_setting['position'];

            $privacy_policy_id = $this->config->get('config_account_id');
            if (!empty($privacy_policy_id)) {
                $data['privacy_link'] = $this->url->link('information/information', 'information_id=' . (int)$privacy_policy_id, true);
            } else {
                $data['privacy_link'] = $this->url->link('common/home', '', true);
            }

            $output .= $this->model_extension_d_opencart_patch_load->view('extension/' . $this->codename . '/cookies', $data);
        }
    }

    public function view_account_account_after(&$route, &$data, &$output)
    {
        $link = $this->url->link('extension/module/' . $this->codename, '', true);
        $html_dom = new d_simple_html_dom();
        $html_dom->load((string)$output, $lowercase = true, $stripRN = false, $defaultBRText = DEFAULT_BR_TEXT);
        $html_dom->find('#content', 0)->innertext .= '<h2>'.$this->language->get('text_title_gdpr').'</h2> <ul class="list-unstyled"><li></li><a href=' . $link . '>'.$this->language->get('text_title_manager_gdpr').'</a></ul> ';
        $output = (string)$html_dom;
    }

    public function view_extension_module_account_after(&$route, &$data, &$output)
    {
        $link = $this->url->link('extension/module/' . $this->codename, '', true);
        $html_dom = new d_simple_html_dom();
        $html_dom->load((string)$output, $lowercase = true, $stripRN = false, $defaultBRText = DEFAULT_BR_TEXT);
        $html_dom->find('.list-group', 0)->innertext .= '<a href=' . $link . ' class="list-group-item">GDPR Compliance</a>';
        $output = (string)$html_dom;
    }

    public function model_account_customer_add_customer_after(&$route, &$data, &$output)
    {
        if (!empty($data[0]['agree'])) {
            $this->load->model('extension/module/' . $this->codename);
            $this->load->model('catalog/information');

            $information_info = $this->model_catalog_information->getInformation($this->config->get('config_account_id'));
            $policy_data = array(
                'email' => $data[0]['email'],
                'policy_id' => $this->config->get('config_account_id'),
                'name' => $information_info['title'],
                'content' => $information_info['description'],
                'customer_id' => $output

            );
            $this->model_extension_module_d_gdpr_module->savePolicy($policy_data);
        }
    }

    public function model_checkout_order_after(&$route, &$data, &$output)
    {
        $this->load->model('extension/module/' . $this->codename);
        $this->load->model('catalog/information');

        $information_info = $this->model_catalog_information->getInformation($this->config->get('config_checkout_id'));
        $policy_data = array(
            'email' => $data[0]['email'],
            'policy_id' => $this->config->get('config_checkout_id'),
            'name' => $information_info['title'],
            'content' => $information_info['description'],
            'customer_id' => $data[0]['customer_id']

        );
        $this->model_extension_module_d_gdpr_module->savePolicy($policy_data);
    }

    public function view_common_footer_before(&$route, &$data)
    {
        if (isset($data['informations'])) {
            $data['informations'][] = array(
                'title' => $this->language->get('text_title_gdpr'),
                'href' => $this->url->link('extension/module/'.$this->codename, '', 'SSL')
            );
        }
    }
}
