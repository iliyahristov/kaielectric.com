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
 * Class ControllerExtensionTfaauthenticate
 *
 * Two factor authentication extension for Open Cart.
 *
 * @author Gelderblom Internet Solution
 * @copyright 2017-2020 Gelderblom Internet Solutions
 */
class ControllerExtensionTfaauthenticate extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/tfa/authenticate');

        $this->document->setTitle($this->language->get('heading_title'));

        if ($this->user->isLogged() && isset($this->request->get['user_token']) && ($this->request->get['user_token'] == $this->session->data['user_token'])) {
            $this->response->redirect($this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true));
        }

        if (!isset($this->session->data['tfa_user_id']) || $this->session->data['tfa_user_id'] == '' || $this->session->data['tfa_user_id'] == 0) {
            $this->response->redirect($this->url->link('common/login', 'user_token=' . $this->session->data['user_token'], true));
        }

        $this->load->model('user/user');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->session->data['user_id'] = $this->session->data['tfa_user_id'];
            unset($this->session->data['tfa_user_id']);
            unset($this->session->data['shared_secret']);
            unset($this->session->data['backup_code']);
            if (isset($this->request->post['redirect']) && (strpos($this->request->post['redirect'], HTTP_SERVER) === 0 || strpos($this->request->post['redirect'], HTTPS_SERVER) === 0)) {
                $this->response->redirect($this->request->post['redirect'] . '&user_token=' . $this->session->data['user_token']);
            } else {
                $this->response->redirect($this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true));
            }
        }

        if ((isset($this->session->data['user_token']) && !isset($this->request->get['user_token'])) || ((isset($this->request->get['user_token']) && (isset($this->session->data['user_token']) && ($this->request->get['user_token'] != $this->session->data['user_token']))))) {
            $this->error['warning'] = $this->language->get('error_token');
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        $data['action'] = $this->url->link('extension/tfaauthenticate', 'user_token=' . $this->session->data['user_token'], true);

        if (isset($this->request->post['code'])) {
            $data['code'] = $this->request->post['code'];
        } else {
            $data['code'] = '';
        }

        if (isset($this->request->get['route'])) {
            $route = $this->request->get['route'];

            unset($this->request->get['route']);
            unset($this->request->get['user_token']);

            $url = '';

            if ($this->request->get) {
                $url .= http_build_query($this->request->get);
            }

            $data['redirect'] = $this->url->link($route, $url, true);
        } else {
            $data['redirect'] = '';
        }

        $data['header'] = $this->load->controller('common/header');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/tfa/authenticate', $data));
    }

    protected function validate() {

        $tfa = new RobThree\Auth\TwoFactorAuth($this->config->get('config_name'));

        $user_info = $this->model_user_user->getUser($this->session->data['tfa_user_id']);

        if (!isset($this->request->post['code'])) {
            $this->error['warning'] = $this->language->get('error_login');
        }

        $result = $tfa->verifyCode($user_info['shared_secret'], $_POST['code']);
        if ($result != 1 && !$this->user->backupcode($this->session->data['tfa_user_id'], $_POST['code'])) {
            $this->error['warning'] = $this->language->get('error_login');
        }

        return !$this->error;
    }
}
