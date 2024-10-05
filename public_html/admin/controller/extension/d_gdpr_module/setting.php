<?php
/*
 *	location: admin/controller
 */

class ControllerExtensionDGDPRModuleSetting extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/d_gdpr_module/setting';
    private $extension = array();

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('extension/module/'.$this->codename);
        $this->load->language('extension/'.$this->codename.'/setting');
        $this->load->model('setting/setting');
    }

    public function init()
    {
        $setting = $this->model_setting_setting->getSetting($this->codename);

        if(!isset($setting[$this->codename.'_cookies'])){
            $this->load->config($this->codename);
            $setting[$this->codename.'_cookies'] = $this->config->get($this->codename.'_cookies');
        }

        if(!isset($setting[$this->codename.'_setting'])){
            $this->load->config($this->codename);
            $setting[$this->codename.'_setting'] = $this->config->get($this->codename.'_setting');
        }

        if(!isset($setting[$this->codename.'_status'])){
            $this->load->config($this->codename);
            $setting[$this->codename.'_status'] = 0;
        }

        if(!isset($setting[$this->codename.'_install'])){
            $setting[$this->codename.'_install'] = false;
        }

        $data['setting'] = array(
            'status' => $setting[$this->codename.'_status'],
            'cookies' => $setting[$this->codename.'_cookies'],
            'setting' => $setting[$this->codename.'_setting'],
            'install' => $setting[$this->codename.'_install']
        );

        $this->load->model('localisation/language');
        $languages = $this->model_localisation_language->getLanguages();

        foreach ($languages as $value) {
            if(!isset($data['setting']['setting']['language'][$value['language_id']])){
                $this->load->config($this->codename);
                $data['setting']['setting']['language'][$value['language_id']] = $this->config->get($this->codename.'_language_default');
            }
        }

        return $data;
    }

    public function update($state)
    {
        $setting = $this->model_setting_setting->getSetting($this->codename);

        foreach ($state['setting'] as $key => $value){
            $setting[$this->codename.'_'.$key] = $value;
        }

        $this->model_setting_setting->editSetting($this->codename, $setting);

        $this->load->controller('extension/module/'.$this->codename.'/uninstallEvents');

        if (!empty($state['setting']['status'])){
            $this->load->controller('extension/module/'.$this->codename.'/installEvents');
        }

        return $state;
    }

    public function local()
    {
        $local = array();

        $local['entry_location_personal_data'] = $this->language->get('entry_location_personal_data');
        $local['entry_physical_location_host'] = $this->language->get('entry_physical_location_host');

        $local['entry_personal_data_download_expire'] = $this->language->get('entry_personal_data_download_expire');
        $local['entry_personal_data_remove_expire'] = $this->language->get('entry_personal_data_remove_expire');

        $local['entry_status'] = $this->language->get('entry_status');
        $local['entry_position'] = $this->language->get('entry_position');
        $local['entry_enable_cookies'] = $this->language->get('entry_enable_cookies');
        $local['entry_show_privacy_link'] = $this->language->get('entry_show_privacy_link');
        $local['entry_banner_color'] = $this->language->get('entry_banner_color');
        $local['entry_banner_text_color'] = $this->language->get('entry_banner_text_color');
        $local['entry_button_color'] = $this->language->get('entry_button_color');
        $local['entry_button_text_color'] = $this->language->get('entry_button_text_color');
        $local['entry_message'] = $this->language->get('entry_message');
        $local['entry_dismiss'] = $this->language->get('entry_dismiss');
        $local['entry_text_link'] = $this->language->get('entry_text_link');

        $local['help_location_personal_data'] = $this->language->get('help_location_personal_data');
        $local['help_physical_location_host'] = $this->language->get('help_physical_location_host');

        $local['help_personal_data_download_expire'] = $this->language->get('help_personal_data_download_expire');
        $local['help_personal_data_remove_expire'] = $this->language->get('help_personal_data_remove_expire');

        $local['help_status'] = $this->language->get('help_status');
        $local['help_position'] = $this->language->get('help_position');
        $local['help_enable_cookies'] = $this->language->get('help_enable_cookies');
        $local['help_show_privacy_link'] = $this->language->get('help_show_privacy_link');
        $local['help_banner_color'] = $this->language->get('help_banner_color');
        $local['help_banner_text_color'] = $this->language->get('help_banner_text_color');
        $local['help_button_color'] = $this->language->get('help_button_color');
        $local['help_button_text_color'] = $this->language->get('help_button_text_color');
        $local['help_message'] = $this->language->get('help_message');
        $local['help_dismiss'] = $this->language->get('help_dismiss');
        $local['help_text_link'] = $this->language->get('help_text_link');

        return $local;
    }

    public function options()
    {
        $options = array();
        
        $options['positions'] = array(
            'top' => $this->language->get('text_position_top'),
            'bottom' => $this->language->get('text_position_bottom'),
            'top-left' => $this->language->get('text_position_top_left'),
            'top-right' => $this->language->get('text_position_top_right'),
            'bottom-left' => $this->language->get('text_position_bottom_left'),
            'bottom-right' => $this->language->get('text_position_bottom_right')
        );


        $this->load->model('localisation/language');
        $options['languages'] = $this->model_localisation_language->getLanguages();
        foreach ($options['languages'] as $key => $language) {
            if (VERSION >= '2.2.0.0') {
                $options['languages'][$key]['flag'] = 'language/' . $language['code'] . '/' . $language['code'] . '.png';
            } else {
                $options['languages'][$key]['flag'] = 'view/image/flags/' . $language['image'];
            }
        }

        return $options;
    }
}
