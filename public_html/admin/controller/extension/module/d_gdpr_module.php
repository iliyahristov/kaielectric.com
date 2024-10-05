<?php
/*
 *  location: admin/controller
 */

class ControllerExtensionModuleDGdprModule extends Controller {

    private $codename = 'd_gdpr_module';
    private $route = 'extension/module/d_gdpr_module';
    private $config_file = 'd_gdpr_module';
    private $extension = array();
    private $store_id = 0;
    private $error = array();


    public function __construct($registry) {
        parent::__construct($registry);

        $this->d_shopunity = (file_exists(DIR_SYSTEM.'library/d_shopunity/extension/d_shopunity.json'));
        $this->d_opencart_patch = (file_exists(DIR_SYSTEM.'library/d_shopunity/extension/d_opencart_patch.json'));
        $this->d_twig_manager = (file_exists(DIR_SYSTEM.'library/d_shopunity/extension/d_twig_manager.json'));
        $this->d_event_manager = (file_exists(DIR_SYSTEM.'library/d_shopunity/extension/d_event_manager.json'));
        $this->d_admin_style = (file_exists(DIR_SYSTEM.'library/d_shopunity/extension/d_admin_style.json'));
        $this->extension = json_decode(file_get_contents(DIR_SYSTEM.'library/d_shopunity/extension/'.$this->codename.'.json'), true);
        $this->store_id = (isset($this->request->get['store_id'])) ? $this->request->get['store_id'] : 0;

    }

    public function index(){

        if($this->d_shopunity){
            $this->load->model('extension/d_shopunity/mbooth');
            $this->model_extension_d_shopunity_mbooth->validateDependencies($this->codename);
        }

        if($this->d_twig_manager){
            $this->load->model('extension/module/d_twig_manager');
            $this->model_extension_module_d_twig_manager->installCompatibility();
        }

        if($this->d_event_manager){
            $this->load->model('extension/module/d_event_manager');
            $this->model_extension_module_d_event_manager->installCompatibility();
        }

//        if ($this->d_admin_style){
//            $this->load->model('extension/d_admin_style/style');
//            $this->model_extension_d_admin_style_style->getStyles('dark');
//        }

        $this->load->language($this->route);
        $this->load->model($this->route);

        $this->load->model('setting/setting');
        $this->load->model('extension/d_opencart_patch/load');
        $this->load->model('extension/d_opencart_patch/user');
        $this->load->model('extension/d_opencart_patch/url');
        $this->load->model('extension/d_opencart_patch/cache');

        $this->model_extension_d_opencart_patch_cache->clearTwig();

        $this->document->addScript("view/javascript/d_vue/vue.js");
        $this->document->addScript("view/javascript/d_vuex/vuex.min.js");
        $this->document->addScript("view/javascript/d_vue_i18n/vue-i18n.min.js");
        $this->document->addScript('view/javascript/d_gdpr_module/library/VueOptions.js');
        $this->document->addScript('view/javascript/d_gdpr_module/library/vue-model-vuex.js');

        //styles and scripts
        $this->document->addScript('view/javascript/d_bootstrap_switch/js/bootstrap-switch.min.js');
        $this->document->addStyle('view/javascript/d_bootstrap_switch/css/bootstrap-switch.css');

        $this->document->addStyle('view/stylesheet/d_gdpr_module/d_gdpr_module.css');

        //Alertify
        $this->document->addScript('view/javascript/d_alertify/alertify.min.js');
        $this->document->addStyle('view/javascript/d_alertify/css/alertify.css');
        $this->document->addStyle('view/javascript/d_alertify/css/themes/bootstrap.css');

        $this->document->addStyle('view/javascript/d_gdpr_module/library/bootstrap.colorpickersliders.css');
        $this->document->addScript('view/javascript/d_gdpr_module/library/bootstrap.colorpickersliders.js');
        $this->document->addScript('view/javascript/d_gdpr_module/library/tinycolor.js');

        $this->document->addStyle('view/stylesheet/d_bootstrap_extra/bootstrap.css');

        //Other libraries
        $this->document->addScript('view/javascript/d_underscore/underscore-min.js');

        $this->document->addScript('view/javascript/d_gdpr_module/library/vue-router.js');

        $this->document->addScript('view/javascript/d_gdpr_module/dist/d_gdpr_module.js');

        if (file_exists(dirname(DIR_TEMPLATE).'/javascript/'.$this->codename.'/library/awesome/css/font-awesome.min.css')) {
            $this->document->addStyle('view/javascript/'.$this->codename.'/library/awesome/css/v4-shims.min.css');
            $this->document->addStyle('view/javascript/'.$this->codename.'/library/awesome/css/font-awesome.min.css');
        } else {
            $this->document->addScript('https://use.fontawesome.com/70f81fc58b.js');
        }

        //title
        $this->document->setTitle($this->language->get('heading_title_main'));
        $data['heading_title'] = $this->language->get('heading_title_main');
        $data['text_edit'] = $this->language->get('text_edit');
        
        //vars
        $data['codename'] = $this->codename;
        $data['route'] = $this->route;
        $data['version'] = $this->extension['version'];
        $data['token'] =  $this->model_extension_d_opencart_patch_user->getToken();
        $data['d_shopunity'] = $this->d_shopunity;
        $data['store_id'] = $this->store_id;
        $data['language_id'] = $this->config->get('config_language_id');

        //stores
        $this->load->model('extension/d_opencart_patch/store');
        $data['stores'] = $this->model_extension_d_opencart_patch_store->getAllStores();

        $data['vueTemplates'] = $this->{'model_extension_module_'.$this->codename}->getVueTemplates();

        $data['json'] = array();

        $sections = $this->{'model_extension_module_'.$this->codename}->getSections();

        $data['json']['sections'] = array();

        foreach ($sections as $section) {
            $data['json']['sections'][$section] = $this->load->controller('extension/'.$this->codename.'/'.$section.'/init');
        }

        $data['json']['config'] = array();

        $data['json']['config']['update_section_url'] = $this->model_extension_d_opencart_patch_url->ajax($this->route.'/updateSection');
        $data['json']['config']['setup_url'] = $this->model_extension_d_opencart_patch_url->ajax($this->route.'/setup');

        $data['local'] = $this->prepareLocal();
        $data['options'] = $this->prepareOptions();


        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->model_extension_d_opencart_patch_load->view('extension/'.$this->codename.'/'.$this->codename, $data));
    }

    public function prepareLocal(){
        $local = array();

        $local['common']['heading_title'] = $this->language->get('heading_title_main');
        $local['common']['text_edit'] = $this->language->get('text_edit');

        $local['common']['tab_gdpr'] = $this->language->get('tab_gdpr');
        $local['common']['tab_setting'] = $this->language->get('tab_setting');

        $local['common']['button_notification'] = $this->language->get('button_notification');

        $local['common']['text_yes'] = $this->language->get('text_yes');
        $local['common']['text_no'] = $this->language->get('text_no');
        $local['common']['text_enabled'] = $this->language->get('text_enabled');

        $local['common']['entry_status'] = $this->language->get('entry_status');
        //support
        $local['common']['entry_support'] = $this->language->get('entry_support');
        $local['common']['text_support'] = $this->language->get('text_support');

        $local['common']['text_notification'] = $this->language->get('text_notification');

        $local['common']['button_save_and_stay'] = $this->language->get('button_save_and_stay');
        $local['common']['button_save'] = $this->language->get('button_save');
        $local['common']['button_cancel'] = $this->language->get('button_cancel');
        $local['common']['button_setup'] = $this->language->get('button_setup');

        $local['common']['text_powered_by'] = $this->language->get('text_powered_by');

        $local['common']['tab_gdpr'] = $this->language->get('tab_gdpr');
        $local['common']['tab_setting'] = $this->language->get('tab_setting');

        $local['common']['text_showing'] = $this->language->get('text_showing');
        $local['common']['text_to'] = $this->language->get('text_to');
        $local['common']['text_of'] = $this->language->get('text_of');
        $local['common']['text_pages'] = $this->language->get('text_pages');

        $local['common']['text_welcome_heading_title'] = $this->language->get('text_welcome_heading_title');
        $local['common']['text_welcome_heading_text'] = $this->language->get('text_welcome_heading_text');

        $local['common']['text_welcome_icon_1_text'] = $this->language->get('text_welcome_icon_1_text');
        $local['common']['text_welcome_icon_2_text'] = $this->language->get('text_welcome_icon_2_text');
        $local['common']['text_welcome_icon_3_text'] = $this->language->get('text_welcome_icon_3_text');
        $local['common']['text_welcome_icon_4_text'] = $this->language->get('text_welcome_icon_4_text');

        $local['tables']['tab_gdpr_todo'] = $this->language->get('tab_gdpr_todo');
        $local['tables']['tab_gdpr_request'] = $this->language->get('tab_gdpr_request');
        $local['tables']['tab_gdpr_cookie'] = $this->language->get('tab_gdpr_cookie');
        $local['tables']['tab_gdpr_policies'] = $this->language->get('tab_gdpr_policies');
        $local['tables']['tab_gdpr_notification'] = $this->language->get('tab_gdpr_notification');

        $local['tables']['tab_gdpr_setting'] = $this->language->get('tab_gdpr_setting');
        $local['tables']['tab_gdpr_translate'] = $this->language->get('tab_gdpr_translate');
        $local['tables']['tab_gdpr_cookie_setting'] = $this->language->get('tab_gdpr_cookie_setting');

        $sections = $this->{'model_extension_module_'.$this->codename}->getSections();

        foreach ($sections as $section) {
            $local[$section] = $this->load->controller('extension/'.$this->codename.'/'.$section.'/local');
        }

        return array($this->config->get('config_language_id') => $local);
    }

    public function prepareOptions(){
        $option = array();

        $option['common']['version'] = $this->extension['version'];

        // Breadcrumbs
        $option['common']['breadcrumbs'] = array();
        $option['common']['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->model_extension_d_opencart_patch_url->ajax('common/home')
        );

        $option['common']['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->model_extension_d_opencart_patch_url->getExtensionAjax('module')
        );

        $option['common']['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title_main'),
            'href' => $this->model_extension_d_opencart_patch_url->ajax($this->route)
        );

        $option['common']['notification_url'] = $this->model_extension_d_opencart_patch_url->ajax('marketing/contact');
        $option['common']['cancel_url'] = $this->model_extension_d_opencart_patch_url->getExtensionAjax('module');

        $sections = $this->{'model_extension_module_'.$this->codename}->getSections();

        foreach ($sections as $section) {
            $option[$section] = $this->load->controller('extension/'.$this->codename.'/'.$section.'/options');
        }

        return $option;
    }


    public function getSetting(){
        $key = $this->codename.'_setting';

        if ($this->config_file) {
            $this->config->load($this->config_file);
        }

        $result = ($this->config->get($key)) ? $this->config->get($key) : array();

        if (!isset($this->request->post['config'])) {

            $this->load->model('setting/setting');
            if (isset($this->request->post[$key])) {
                $setting = $this->request->post;

            } elseif ($this->model_setting_setting->getSetting($this->codename, $this->store_id)) {
                $setting = $this->model_setting_setting->getSetting($this->codename, $this->store_id);

            }

            if (isset($setting[$key])) {
                foreach ($setting[$key] as $key => $value) {
                    $result[$key] = $value;
                }
            }
        }
        return $result;
    }

    public function updateSection(){
        $json = array();

        $this->load->model('extension/d_opencart_patch/url');
        $this->load->language($this->route);

        if(isset($this->request->post['type'])){
            $type = $this->request->post['type'];
        }

        if(isset($this->request->post['setting'])) {
            $setting = html_entity_decode($this->request->post['setting'], ENT_QUOTES, 'UTF-8');
            $setting = json_decode($setting, true);
        }

        if(isset($type) && isset($setting)) {
            $json['setting'] = $this->load->controller('extension/' . $this->codename . '/' . $type . '/update', $setting);
            $json['success'] = $this->language->get('text_success_update');
            $json['redirect_url'] = $this->model_extension_d_opencart_patch_url->getExtensionAjax('module');
        } else {
            $json['error'] = $this->language->get('error_update');
        }

        $this->response->addHeader('Content-type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function setup(){
        $json = array();
        $this->load->language($this->route);
        $this->load->model('setting/setting');
        $this->load->model('extension/d_opencart_patch/url');

        $common_setting = $this->load->controller('extension/'.$this->codename.'/setting/init');

        $common_setting['setting']['status'] = 1;
        $common_setting['setting']['install'] = array('version' => $this->extension['version']);

        $json['setting'] = $this->load->controller('extension/'.$this->codename.'/setting/update', $common_setting);

        $json['success'] = $this->language->get('success_setup');

        $this->response->addHeader('Content-type: application/json');
        $this->response->setOutput(json_encode($json, JSON_FORCE_OBJECT));
    }

    public function uninstallEvents() {
        if($this->d_event_manager) {
            $this->load->model('extension/module/d_event_manager');
            $this->model_extension_module_d_event_manager->deleteEvent($this->codename);
        }
    }

    public function installEvents() {
        if($this->d_event_manager){
            $this->load->model('extension/module/d_event_manager');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'admin/view/customer/customer_list/before', 'extension/event/d_gdpr_module/view_customer_customer_before');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'admin/view/sale/customer_list/before', 'extension/event/d_gdpr_module/view_customer_customer_before');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/model/account/customer/addCustomer/after', 'extension/event/d_gdpr_module/model_account_customer_add_customer_after');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/model/checkout/order/addOrder/after', 'extension/event/d_gdpr_module/model_checkout_order_after');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/view/extension/module/account/after', 'extension/event/d_gdpr_module/view_extension_module_account_after');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/view/module/account/after', 'extension/event/d_gdpr_module/view_extension_module_account_after');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/view/account/account/after', 'extension/event/d_gdpr_module/view_account_account_after');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/view/common/header/after', 'extension/event/d_gdpr_module/view_common_header_after');
            $this->model_extension_module_d_event_manager->addEvent($this->codename, 'catalog/view/common/footer/before', 'extension/event/d_gdpr_module/view_common_footer_before');
        }
    }

    public function install() {
        if($this->d_shopunity){
            $this->load->model('extension/d_shopunity/mbooth');
            $this->model_extension_d_shopunity_mbooth->installDependencies($this->codename);
        }

        $this->load->model('extension/module/'.$this->codename);
        $this->{'model_extension_module_'.$this->codename}->installDatabase();
    }

    public function uninstall() {
        $this->uninstallEvents();
        $this->load->model('extension/module/'.$this->codename);
        $this->{'model_extension_module_'.$this->codename}->uninstallDatabase(); 
    }

    public function update() {

        $this->uninstallEvents();
        $this->installEvents();

        $this->load->model('extension/module/d_gdpr_module');
        $this->{'model_extension_module_'.$this->codename}->updateDatabase(); 
    }
}
?>