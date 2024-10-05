<?php
// Register vendor modules
spl_autoload_register(function ($class) {
    $class = explode('\\', $class);
    if ($class[0] == 'RobThree' && $class[1] == 'Auth') {
        unset($class[0]);
        unset($class[1]);
        $class = implode('/', $class);
        include DIR_SYSTEM.'library/' . $class . '.php';
    }
});

/**
 * Class ControllerExtensionTfaAccount
 *
 * Two factor authentication extension for Open Cart.
 *
 * @author Gelderblom Internet Solution
 * @copyright 2017-2020 Gelderblom Internet Solutions
 */
class ControllerExtensionTfaAccount extends Controller {
    private $error = array();

    public function index() {
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('extension/tfa/account', '', true);

            $this->response->redirect($this->url->link('account/login', '', true));
        }

        $this->load->language('extension/tfa/account');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('account/customer');

        $tfa = new RobThree\Auth\TwoFactorAuth($this->config->get('config_name'));

        $customer_info = $this->model_account_customer->getCustomer($this->customer->getId());

        if ($customer_info['tfa_enable'] == 1) {
            $this->session->data['customer_shared_secret'] = $customer_info['shared_secret'];
        }

        if (!isset($this->session->data['customer_shared_secret'])) {
            $this->session->data['customer_shared_secret'] = $tfa->createSecret(160);
        }

        if (!isset($this->session->data['customer_backup_code'])) {
            $this->session->data['customer_backup_code'] = trim(chunk_split(bin2hex(openssl_random_pseudo_bytes(16)), 4, '-'), '-');
        }

        $qr_name = trim($customer_info['firstname'].' '.$customer_info['lastname']);
        if (strlen($qr_name) == 0) {
            $qr_name = $customer_info['email'];
        }
        $data['qr_image'] = $tfa->getQRCodeImageAsDataUri($qr_name, $this->session->data['customer_shared_secret']);

        $data['tfa_enable'] = $customer_info['tfa_enable'];

        $data['error_warning'] = '';
        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            if ($tfa->verifyCode($this->session->data['customer_shared_secret'], $_POST['code'])) {
                $this->model_account_customer->editTfa($this->customer->getId(), $this->request->post['tfa_enable'], $this->session->data['customer_shared_secret'], $this->session->data['customer_backup_code'], $customer_info['salt']);

                if ($this->request->post['tfa_enable'] == 1) {
                    $this->session->data['success'] = $this->language->get('text_success_enable');
                } else {
                    $this->session->data['success'] = $this->language->get('text_success_disable');
                }

                unset($this->session->data['customer_shared_secret']);
                unset($this->session->data['customer_backup_code']);

                $this->response->redirect($this->url->link('extension/tfa/account', 'user_token=' . $this->session->data['user_token'], true));
            } else {
                $data['error_warning'] = $this->language->get('text_warning');
            }
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_account'),
            'href' => $this->url->link('account/account', '', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/tfa/account', '', true)
        );

        /*if (isset($this->error['password'])) {
            $data['error_password'] = $this->error['password'];
        } else {
            $data['error_password'] = '';
        }*/

        $data['backup_code'] = $this->session->data['customer_backup_code'];

        $data['action'] = $this->url->link('extension/tfa/account', '', true);

        $data['back'] = $this->url->link('account/account', '', true);

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('extension/tfa/account', $data));
    }

    protected function validate() {
        if ((utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) < 4) || (utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) > 40)) {
            $this->error['password'] = $this->language->get('error_password');
        }

        if ($this->request->post['confirm'] != $this->request->post['password']) {
            $this->error['confirm'] = $this->language->get('error_confirm');
        }

        return !$this->error;
    }
}