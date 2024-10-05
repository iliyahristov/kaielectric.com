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
 * Class ControllerExtensionTfaAuthenticate
 *
 * Two factor authentication extension for Open Cart.
 *
 * @author Gelderblom Internet Solution
 * @copyright 2017-2020 Gelderblom Internet Solutions
 */
class ControllerExtensionTfaAuthenticate extends Controller {
    private $error = array();

    public function index() {
        $this->load->model('account/customer');

        if ($this->customer->isLogged()) {
            $this->response->redirect($this->url->link('account/account', '', true));
        }

        if (!isset($this->session->data['tfa_customer_id']) || $this->session->data['tfa_customer_id'] == 0) {
            $this->response->redirect($this->url->link('account/login', '', true));
        }

        $this->load->language('extension/tfa/authenticate');

        $this->document->setTitle($this->language->get('heading_title'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->session->data['customer_id'] = $this->session->data['tfa_customer_id'];

            // Unset tfa customer data
            unset($this->session->data['tfa_customer_id']);
            unset($this->session->data['customer_shared_secret']);
            unset($this->session->data['customer_backup_code']);

            // Unset guest
            unset($this->session->data['guest']);

            // Default Shipping Address
            $this->load->model('account/address');

            if ($this->config->get('config_tax_customer') == 'payment') {
                $this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
            }

            if ($this->config->get('config_tax_customer') == 'shipping') {
                $this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
            }

            // Wishlist
            if (isset($this->session->data['wishlist']) && is_array($this->session->data['wishlist'])) {
                $this->load->model('account/wishlist');

                foreach ($this->session->data['wishlist'] as $key => $product_id) {
                    $this->model_account_wishlist->addWishlist($product_id);

                    unset($this->session->data['wishlist'][$key]);
                }
            }

            // Added strpos check to pass McAfee PCI compliance test (http://forum.opencart.com/viewtopic.php?f=10&t=12043&p=151494#p151295)
            if (isset($this->request->post['redirect']) && $this->request->post['redirect'] != $this->url->link('account/logout', '', true) && (strpos($this->request->post['redirect'], $this->config->get('config_url')) !== false || strpos($this->request->post['redirect'], $this->config->get('config_ssl')) !== false)) {
                $this->response->redirect(str_replace('&amp;', '&', $this->request->post['redirect']));
            } else {
                $this->response->redirect($this->url->link('account/account', '', true));
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
            'text' => $this->language->get('text_tfa'),
            'href' => $this->url->link('extension/tfa/authenticate', '', true)
        );

        if (isset($this->session->data['error'])) {
            $data['error_warning'] = $this->session->data['error'];

            unset($this->session->data['error']);
        } elseif (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['action'] = $this->url->link('extension/tfa/authenticate', '', true);

        // Added strpos check to pass McAfee PCI compliance test (http://forum.opencart.com/viewtopic.php?f=10&t=12043&p=151494#p151295)
        if (isset($this->request->post['redirect']) && (strpos($this->request->post['redirect'], $this->config->get('config_url')) !== false || strpos($this->request->post['redirect'], $this->config->get('config_ssl')) !== false)) {
            $data['redirect'] = $this->request->post['redirect'];
        } elseif (isset($this->session->data['redirect'])) {
            $data['redirect'] = $this->session->data['redirect'];

            unset($this->session->data['redirect']);
        } else {
            $data['redirect'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('extension/tfa/authenticate', $data));
    }

    protected function validate() {
        $tfa = new RobThree\Auth\TwoFactorAuth($this->config->get('config_name'));

        $customer_info = $this->model_account_customer->getCustomer($this->session->data['tfa_customer_id']);

        if (!isset($this->request->post['code'])) {
            $this->error['warning'] = $this->language->get('error_login');
        }

        $result = $tfa->verifyCode($customer_info['shared_secret'], $_POST['code']);
        if ($result != 1 && !$this->customer->backupcode($this->session->data['tfa_customer_id'], $_POST['code'])) {
            $this->error['warning'] = $this->language->get('error_login');
        }

        return !$this->error;
    }
}
