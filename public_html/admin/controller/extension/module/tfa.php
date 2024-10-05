<?php
/**
 * Class ControllerExtensionTfa
 *
 * Two factor authentication extension for Open Cart.
 *
 * @author Gelderblom Internet Solution
 * @copyright 2017-2020 Gelderblom Internet Solutions
 */
class ControllerExtensionModuleTfa extends Controller {
    private $error = array();

    private $extension_id = 32882;

    public function index() {

        $this->load->language('extension/module/tfa');

        $this->load->model('setting/setting');
        $this->load->model('setting/modification');

        $modification = $this->model_setting_modification->getModificationByCode('gelderblominternet_tfa_ocmod');

        $this->document->setTitle($this->language->get('heading_title'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('module_tfa', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/tfa', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/module/tfa', 'user_token=' . $this->session->data['user_token'], true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

        $data['user_token'] = $this->session->data['user_token'];

        if (isset($this->request->post['module_tfa_status'])) {
            $data['module_tfa_status'] = $this->request->post['module_tfa_status'];
        } else {
            $data['module_tfa_status'] = $this->config->get('module_tfa_status');
        }

        if (!isset($modification['status']) || $modification['status'] == 0) {
            $data['modification_tfa_status'] = 0;
        } else {
            $data['modification_tfa_status'] = 1;
        }

        if (isset($this->request->post['module_tfa_for_admin'])) {
            $data['module_tfa_for_admin'] = $this->request->post['module_tfa_for_admin'];
        } else {
            $data['module_tfa_for_admin'] = $this->config->get('module_tfa_for_admin');
        }

        if (isset($this->request->post['module_tfa_for_customer'])) {
            $data['module_tfa_for_customer'] = $this->request->post['module_tfa_for_customer'];
        } else {
            $data['module_tfa_for_customer'] = $this->config->get('module_tfa_for_customer');
        }

        $data['check_danger'] = '<em class="fa fa-times-circle text-danger"></em> ';
        $data['check_warning'] = '<em class="fa fa-exclamation-circle text-warning"></em> ';
        $data['check_success'] = '<em class="fa fa-check-circle text-success"></em> ';

        $curl = curl_init('https://oc.gelderblominternet.nl/api-info.php?extension_id=' . $this->extension_id);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($curl, CURLOPT_POST, 1);

        $response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $extension_info = json_decode($response, true);

        if (!isset($modification['version']) || strlen($modification['version']) == 0) {
            $data['modification_version'] = $data['check_danger'] . $this->language->get('modification_not_available');
        } else {
            if (isset($extension_info['version_latest'])) {
                if (version_compare($modification['version'], $extension_info['version_latest'], '<')) {
                    $data['modification_version'] = $data['check_warning'] . 'v.' . $modification['version'] . ' <span class="text-success"><strong>[ <small>v.' . $extension_info['version_latest'] . ' ' . $this->language->get('text_available_now') . '</small> ]</strong></span>';
                } else {
                    $data['modification_version'] = $data['check_success'] . 'v.' . $modification['version'];
                }
            } else {
                $data['modification_version'] = $data['check_success'] . 'v.' . $modification['version'];
            }
        }

        $data['instructions'] = sprintf($this->language->get('instructions'), $this->url->link('marketplace/marketplace/info', 'user_token=' . $this->session->data['user_token'] . '&extension_id=' . $this->extension_id, true));

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/tfa', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/tfa')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    public function install() {
        // Load extension user model
        $this->load->model('extension/tfa/user');
        // Load extension customer model
        $this->load->model('extension/tfa/customer');

        // Alter user table
        if (!$this->model_extension_tfa_user->checkInstalled()) {
            $this->model_extension_tfa_user->install();

            // Alter user rights
            $this->load->model('user/user_group');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/module/tfa');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/tfa');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/tfa/setup');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/tfaauthenticate');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/module/tfa');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/tfa');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/tfa/setup');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/tfaauthenticate');
        }

        // Alter customer table
        if (!$this->model_extension_tfa_customer->checkInstalled()) {
            $this->model_extension_tfa_customer->install();
        }
    }

    public function uninstall() {

        // Remove extension data
        $this->load->model('setting/extension');
        $this->load->model('setting/setting');
        $this->model_setting_extension->uninstall('module', $this->request->get['extension']);
        $this->model_setting_setting->deleteSetting('module_' . $this->request->get['extension']);

        // Remove database columns
        $this->load->model('extension/tfa/user');
        $this->load->model('extension/tfa/customer');
        if ($this->model_extension_tfa_user->checkInstalled()) {
            $this->model_extension_tfa_user->uninstall();
        }
        if ($this->model_extension_tfa_customer->checkInstalled()) {
            $this->model_extension_tfa_customer->uninstall();
        }
    }

}
