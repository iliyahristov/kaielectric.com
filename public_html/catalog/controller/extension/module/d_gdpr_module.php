<?php

/*
 *  location: catalog/controller
 */

class ControllerExtensionModuleDGDPRModule extends Controller
{
    private $codename = 'd_gdpr_module';
    private $route = 'extension/module/d_gdpr_module';

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->language($this->route);
        $this->load->model($this->route);
        $this->load->model('extension/d_opencart_patch/load');

    }

    public function index()
    {
        $this->document->setTitle($this->language->get('heading_title'));

        $this->document->addStyle("catalog/view/javascript/d_alertify/css/alertify.min.css");
        $this->document->addStyle("catalog/view/javascript/d_alertify/css/themes/default.css");
        $this->document->addScript("catalog/view/javascript/d_alertify/alertify.min.js");
        $this->document->addScript("catalog/view/javascript/d_underscore/underscore-min.js");
        $this->document->addScript("catalog/view/javascript/d_bootstrap_switch/js/bootstrap-switch.min.js");
        $this->document->addStyle("catalog/view/javascript/d_bootstrap_switch/css/bootstrap-switch.min.css");

        // TEXT
        $data['text_request_personal_data'] = $this->language->get('text_request_personal_data');
        $data['text_request_personal_data_description'] = $this->language->get('text_request_personal_data_description');
        $data['text_remove_personal_data'] = $this->language->get('text_remove_personal_data');
        $data['text_remove_personal_data_description'] = $this->language->get('text_remove_personal_data_description');
        $data['text_restricted_processing'] = $this->language->get('text_restricted_processing');
        $data['text_restricted_processing_description'] = $this->language->get('text_restricted_processing_description');

        // BUTTON
        $data['button_request_data'] = $this->language->get('button_request_data');
        $data['button_request_data_description'] = $this->language->get('button_request_data_description');
        $data['button_remove_data'] = $this->language->get('button_remove_data');
        $data['button_remove_data_description'] = $this->language->get('button_remove_data_description');
        $data['button_request_requests'] = $this->language->get('button_request_requests');
        $data['button_request_addresses'] = $this->language->get('button_request_addresses');
        $data['button_request_orders'] = $this->language->get('button_request_orders');
        $data['button_request_personal_data'] = $this->language->get('button_request_personal_data');
        $data['button_restricted_processing'] = $this->language->get('button_restricted_processing');

        $data['entry_restricted'] = $this->language->get('entry_restricted');

        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_gdpr'),
            'href' => $this->url->link($this->route, '', true)
        );

        $data['request_data_action'] = $this->ajax($this->route . '/create_download_request');
        $data['remove_data_action'] = $this->ajax($this->route . '/create_remove_request');
        $data['restrict_data_action'] = $this->ajax($this->route . '/create_restrict_data');

        $data['customer_logged'] = $this->customer->isLogged();

        if($this->customer->isLogged()) {
            $restrict_info = $this->model_extension_module_d_gdpr_module->getRestrictByCustomer($this->customer->getId());
            $data['restrict_processing'] = !empty($restrict_info['status']);
        }

        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');

        $data['request_personal_data_action'] = $this->ajax($this->route . '/get_user_personal_data');
        $data['request_address_data_action'] = $this->ajax($this->route . '/get_user_addresses_data');
        $data['request_orders_data_action'] = $this->ajax($this->route . '/get_user_orders_data');
        $data['request_request_data_action'] = $this->ajax($this->route . '/get_user_gdpr_requests_data');

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->model_extension_d_opencart_patch_load->view('extension/' . $this->codename . '/gdpr', $data));
    }

    public function create_download_request()
    {
        $json = array();

        if ($this->customer->isLogged()) {
            $customer_id = $this->customer->getId();
            $email = $this->request->post['email'];
        } elseif (!empty($this->request->post['email'])) {
            $email = $this->request->post['email'];
            $customer_info = $this->model_extension_module_d_gdpr_module->getCustomerByEmail($this->request->post['email']);

            if (!empty($customer_info)) {
                $customer_id = $customer_info['customer_id'];
            } else {
                $customer_id = 0;
            }
        }

        if (isset($email) && isset($customer_id)) {
            $request_data = array(
                'request_type' => 'download',
                'customer_id' => $customer_id,
                'email' => $email,
                'user_agent' => (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : 'unknown',
                'key' => md5(json_encode(array($email, $customer_id, 'download')))
            );
            $key = $this->model_extension_module_d_gdpr_module->createRequest($request_data);
            $data['customer_id'] = $customer_id;
            $data['email'] = $email;
            $data['request_link'] = $this->ajax($this->route.'/get_user_gdpr_requests_data&key=' . $key);
            $this->model_extension_module_d_gdpr_module->sendDownloadRequestMail($data, true);

            $json['success'][] = $this->language->get('success_email_sended');
        } else {
            $json['error'][] = $this->language->get('error_contomer_not_logged_in');
        }

        $this->response->setOutput(json_encode($json));
    }

    public function create_remove_request()
    {
        $json = array();

        if ($this->customer->isLogged()) {
            $customer_id = $this->customer->getId();
            $email = $this->request->post['email'];
        } elseif (!empty($this->request->post['email'])) {
            $email = $this->request->post['email'];
            $customer_info = $this->model_extension_module_d_gdpr_module->getCustomerByEmail($this->request->post['email']);

            if (!empty($customer_info)) {
                $customer_id = $customer_info['customer_id'];
            } else {
                $customer_id = 0;
            }
        }

        if (isset($email) && isset($customer_id)) {
            $request_data = array(
                'request_type' => 'remove',
                'customer_id' => $customer_id,
                'email' => $email,
                'user_agent' => !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'unknown',
                'key' => md5(json_encode(array($email, $customer_id, 'remove')))
            );
            $key = $this->model_extension_module_d_gdpr_module->createRequest($request_data);
            $data['customer_id'] = $customer_id;
            $data['email'] = $email;

            $data['request_link'] = $this->ajax($this->route.'/delete_user_all_data&key=' . $key);
            $this->model_extension_module_d_gdpr_module->sendDownloadRequestMail($data, false);
            $json['success'][] = $this->language->get('success_email_sended');
        } else {
            $json['error'][] = $this->language->get('error_contomer_not_logged_in');
        }

        $this->response->setOutput(json_encode($json));
    }

    public function create_restrict_data()
    {
        $json = array();

        if (isset($this->request->post['restrict_processing'])) {
            $restrict_processing = $this->request->post['restrict_processing'];
        }

        if (isset($restrict_processing) && $this->customer->isLogged()) {
            $this->model_extension_module_d_gdpr_module->editRestrict($this->customer->getId(), $restrict_processing);

            $json['success'][] = $this->language->get('success_restrict_processing');
        } else {
            $json['error'][] = $this->language->get('error_contomer_not_logged_in');
        }

        $this->response->setOutput(json_encode($json));
    }

    public function get_user_personal_data()
    {
        if (!$this->customer->isLogged()) {
            $this->response->redirect($this->url->link('account/login', '', 'SSL'));
            return false;
        }

        $filename = 'personal_data.csv';

        $personal_data = $this->model_extension_module_d_gdpr_module->getUserPersonalData($this->customer->getId());

        header("Content-type: text/csv");
        header("Cache-Control: no-store, no-cache");
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $fp = fopen('php://output', 'w');
        foreach ($personal_data as $line) {
            fputcsv($fp, $line, ',');
        }
        fclose($fp);
        exit;
    }

    public function get_user_addresses_data()
    {
        if (!$this->customer->isLogged()) {
            $this->response->redirect($this->url->link('account/login', '', 'SSL'));
            return false;
        }

        $filename = 'address_data.csv';

        $addresses_data = $this->model_extension_module_d_gdpr_module->getUserAddressesData($this->customer->getId());

        header("Content-type: text/csv");
        header("Cache-Control: no-store, no-cache");
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $fp = fopen('php://output', 'w');
        foreach ($addresses_data as $line) {
            fputcsv($fp, $line, ',');
        }
        fclose($fp);
        exit;
    }

    public function get_user_orders_data()
    {
        if (!$this->customer->isLogged()) {
            $this->response->redirect($this->url->link('account/login', '', 'SSL'));
            return false;
        }

        $filename = 'orders_data.csv';

        $order_data = $this->model_extension_module_d_gdpr_module->getUserOrdersData($this->customer->getEmail());

        header("Content-type: text/csv");
        header("Cache-Control: no-store, no-cache");
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $fp = fopen('php://output', 'w');
        foreach ($order_data as $line) {
            fputcsv($fp, $line, ',');
        }
        fclose($fp);

        exit;
    }

    private function ajax($route, $url = '', $secure = true)
    {
        return str_replace('&amp;', '&', $this->url->link($route, $url, $secure));
    }

    public function get_user_gdpr_requests_data()
    {
        if (isset($this->request->get['key']) && !empty($this->request->get['key'])) {
            $this->load->model('account/customer');
            $this->load->model('account/address');

            $this->load->model('setting/setting');

            $common_setting = $this->model_setting_setting->getSetting($this->codename);

            if(!isset($common_setting[$this->codename.'_setting'])){
                $this->load->config($this->codename);
                $common_setting = $this->config->get($this->codename.'_setting');
            } else {
                $common_setting = $common_setting[$this->codename.'_setting'];
            }

            $gdpr_request_info = $this->model_extension_module_d_gdpr_module->getRequestDataByKey($this->request->get['key'], $common_setting['personal_data_download_expire']);

            if($gdpr_request_info) {
                $this->model_extension_module_d_gdpr_module->changeRequestStatus($this->request->get['key'], 1);

                $data['customer_id'] = $gdpr_request_info['customer_id'];
                $data['email'] = $gdpr_request_info['email'];

                $this->model_extension_module_d_gdpr_module->reportMail($data);

                $data['breadcrumbs'] = array();
                $data['breadcrumbs'][] = array(
                    'text' => $this->language->get('text_home'),
                    'href' => $this->url->link('common/home')
                );
                $data['breadcrumbs'][] = array(
                    'text' => $this->language->get('text_gdpr'),
                    'href' => $this->url->link($this->route, '', true)
                );

                $data['text_confirm_gdpr'] = $this->language->get('text_confirm_gdpr');
                $data['text_confirm_request_data_description'] = $this->language->get('text_confirm_request_data_description');

                $data['column_left'] = $this->load->controller('common/column_left');
                $data['column_right'] = $this->load->controller('common/column_right');
                $data['content_top'] = $this->load->controller('common/content_top');
                $data['content_bottom'] = $this->load->controller('common/content_bottom');
                $data['footer'] = $this->load->controller('common/footer');
                $data['header'] = $this->load->controller('common/header');
                $this->response->setOutput($this->model_extension_d_opencart_patch_load->view('extension/' . $this->codename . '/confirm', $data));
            } else {
                $data['breadcrumbs'] = array();
                $data['breadcrumbs'][] = array(
                    'text' => $this->language->get('text_error'),
                    'href' => $this->url->link($this->route, '', true)
                );

                $this->document->setTitle($this->language->get('text_error'));

                $data['continue'] = $this->url->link('common/home');
                $data['text_error'] = $this->language->get('text_error');
                $data['heading_title'] = $this->language->get('text_title_download_time_up');

                $data['button_continue'] = $this->language->get('button_continue');

                $this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

                $data['column_left'] = $this->load->controller('common/column_left');
                $data['column_right'] = $this->load->controller('common/column_right');
                $data['content_top'] = $this->load->controller('common/content_top');
                $data['content_bottom'] = $this->load->controller('common/content_bottom');
                $data['footer'] = $this->load->controller('common/footer');
                $data['header'] = $this->load->controller('common/header');
                $this->response->setOutput($this->model_extension_d_opencart_patch_load->view('error/not_found', $data));
            }

        } else {
            $filename = 'gdpr_requests_data.csv';
            if ($this->customer->isLogged()) {
                $requests_data = $this->model_extension_module_d_gdpr_module->getUserRequestsData($this->customer->getId());
            } else {
                $requests_data = $this->model_extension_module_d_gdpr_module->getUserRequestsData($this->customer->getId());
            }

            header("Content-type: text/csv");
            header("Cache-Control: no-store, no-cache");
            header('Content-Disposition: attachment; filename="' . $filename . '"');

            $fp = fopen('php://output', 'w');
            foreach ($requests_data as $line) {
                fputcsv($fp, $line, ',');
            }
            fclose($fp);
            exit;
        }
    }

    public function delete_user_all_data()
    {
        if (isset($this->request->get['key']) && !empty($this->request->get['key'])) {
            $this->load->model('account/customer');
            $this->load->model('account/address');

            $this->load->model('setting/setting');

            $common_setting = $this->model_setting_setting->getSetting($this->codename);

            if(!isset($common_setting[$this->codename.'_setting'])){
                $this->load->config($this->codename);
                $common_setting = $this->config->get($this->codename.'_setting');
            } else {
                $common_setting = $common_setting[$this->codename.'_setting'];
            }

            $gdpr_request_info =  $this->model_extension_module_d_gdpr_module->getRequestDataByKey($this->request->get['key'], $common_setting['personal_data_remove_expire']);

            if($gdpr_request_info) {
                $this->model_extension_module_d_gdpr_module->changeRequestStatus($this->request->get['key'], 1);

                if (!$gdpr_request_info['customer_id']) {
                    $customer_info = $this->model_extension_module_d_gdpr_module->getCustomerDataForEmail($gdpr_request_info['email']);

                    if (!empty($customer_info)) {
                        $customer_id = $customer_info['customer_id'];
                    } else {
                        $customer_id = 0;
                    }
                } else {
                    $customer_id = $gdpr_request_info['customer_id'];
                }

                $this->model_extension_module_d_gdpr_module->deleteCustomerData($customer_id, $gdpr_request_info['email']);
                $this->response->redirect($this->url->link('account/login'));
            } else {
            $data['breadcrumbs'] = array();
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_error'),
                'href' => $this->url->link($this->route, '', true)
            );

            $this->document->setTitle($this->language->get('text_error'));

            $data['continue'] = $this->url->link('common/home');
            $data['text_error'] = $this->language->get('text_error');
            $data['heading_title'] = $this->language->get('text_title_remove_time_up');

            $this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

            $data['button_continue'] = $this->language->get('button_continue');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');
            $this->response->setOutput($this->model_extension_d_opencart_patch_load->view('error/not_found', $data));
        }

        }
    }

    public function mark_cookie_accepted()
    {
        $data = array();

        $data['user_agent'] = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : 'unknown';
        $data['customer_id'] = $this->customer->getId();
        $data['coockie_extra'] =  $_COOKIE;
        $data['accept_language_id'] = $_COOKIE['language'];
        $data['accepted']=true;

        $this->model_extension_module_d_gdpr_module->saveCookies($data);

        $this->response->setOutput(json_encode($data));
    }
}