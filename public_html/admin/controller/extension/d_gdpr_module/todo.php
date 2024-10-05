<?php
/*
 *	location: admin/controller
 */

class ControllerExtensionDGDPRModuleTodo extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/d_gdpr_module/todo';
    private $extension = array();

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('extension/module/'.$this->codename);
        $this->load->language('extension/'.$this->codename.'/todo');
        $this->load->model('setting/setting');
    }

    public function init()
    {
        if ($this->request->server['HTTPS']) {
            $catalog_url = HTTPS_CATALOG;
        } else {
            $catalog_url = HTTP_CATALOG;
        }

        $setting = $this->model_setting_setting->getSetting($this->codename);

        if(!$setting) {
            $setting = array();
        } else if(!empty($setting[$this->codename.'_todo'])) {
            $setting = $setting[$this->codename.'_todo'];
        } else {
            $setting = array();
        }
        
        $gdprCatalogPage = $catalog_url.'index.php?route=extension/module/'.$this->codename;
        $informationListUrl = $this->model_extension_d_opencart_patch_url->ajax('catalog/information');

        $data['jobs'] = array(
            array(
                'title' => $this->language->get('text_todo_title_1'),
                'description' => $this->language->get('text_todo_description_1'),
                'link' => $catalog_url,
                'number' => 1
            ),
            array(
                'title' => $this->language->get('text_todo_title_2'),
                'description' => $this->language->get('text_todo_description_2'),
                'link' => $catalog_url,
                'number' => 2
            ),
            array(
                'title' => $this->language->get('text_todo_title_3'),
                'description' => $this->language->get('text_todo_description_3'),
                'link' => $informationListUrl,
                'number' => 3
            ),
            array(
                'title' => $this->language->get('text_todo_title_4'),
                'description' => $this->language->get('text_todo_description_4'),
                'link' => $informationListUrl,
                'number' => 4
            ),
            array(
                'title' => $this->language->get('text_todo_title_5'),
                'description' => $this->language->get('text_todo_description_5'),
                'link' => $gdprCatalogPage,
                'number' => 5
            ),
            array(
                'title' => $this->language->get('text_todo_title_6'),
                'description' => $this->language->get('text_todo_description_6'),
                'link' => $gdprCatalogPage,
                'number' => 6
            ),
            array(
                'title' => $this->language->get('text_todo_title_7'),
                'description' => $this->language->get('text_todo_description_7'),
                'link' => $gdprCatalogPage,
                'number' => 7
            ),
            array(
                'title' => $this->language->get('text_todo_title_8'),
                'description' => $this->language->get('text_todo_description_8'),
                'link' => $gdprCatalogPage,
                'number' => 8
            )
        );

        $that = $this;
        array_walk($data['jobs'], function(&$value, $key) use ($that, $setting) {
            $value['active'] = in_array($value['number'], $setting);
        });

        return $data;
    }

    public function update($state)
    {

        $tasks = array_filter($state['jobs'], function ($value){
            return !empty($value['active']);
        });

        $tasks = array_map(function ($value){
            return $value['number'];
        }, $tasks);

        $setting = $this->model_setting_setting->getSetting($this->codename);

        $setting[$this->codename.'_todo'] = array_values($tasks);

        $this->model_setting_setting->editSetting($this->codename, $setting);

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

        return $local;
    }

    public function options()
    {
        $options = array();

        return $options;
    }
}
