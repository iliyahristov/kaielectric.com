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
 * Class ControllerExtensionTfaSetup
 *
 * Two factor authentication extension for Open Cart.
 *
 * @author Gelderblom Internet Solution
 * @copyright 2017-2020 Gelderblom Internet Solutions
 */
class ControllerExtensionTfaSetup extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('extension/tfa/setup');

        $this->document->setTitle($this->language->get('heading_title'));

        // Load user model
        $this->load->model('user/user');
        // Load extension user model
        $this->load->model('extension/tfa/user');
        // Load extension customer model
        $this->load->model('extension/tfa/customer');

        // Get user info
        $user_info = $this->model_user_user->getUser($this->user->getId());

        $tfa = new RobThree\Auth\TwoFactorAuth($this->config->get('config_name'));

        /*try {
            $tfa->ensureCorrectTime();
        } catch (RobThree\Auth\TwoFactorAuthException $ex) {
            $this->error['warning'] = '<b>Warning:</b> Your hosts time seems to be off: ' . $ex->getMessage();
        }*/

        if ($user_info['tfa_enable'] == 1) {
            $this->session->data['shared_secret'] = $user_info['shared_secret'];
        }

        if (!isset($this->session->data['shared_secret'])) {
            $this->session->data['shared_secret'] = $tfa->createSecret(160);
        }

        if (!isset($this->session->data['backup_code'])) {
            $this->session->data['backup_code'] = trim(chunk_split(bin2hex(openssl_random_pseudo_bytes(16)), 4, '-'), '-');
        }

        $qr_name = trim($user_info['firstname'].' '.$user_info['lastname']);
        if (strlen($qr_name) == 0) {
            $qr_name = $user_info['email'];
        }
        $data['qr_image'] = $tfa->getQRCodeImageAsDataUri($qr_name, $this->session->data['shared_secret']);

        $data['tfa_enable'] = $user_info['tfa_enable'];

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            if ($tfa->verifyCode($this->session->data['shared_secret'], $_POST['code'])) {
                $this->model_user_user->editTfa($this->user->getId(), $this->request->post['tfa_enable'], $this->session->data['shared_secret'], $this->session->data['backup_code'], $user_info['salt']);

                if ($this->request->post['tfa_enable'] == 1) {
                    $this->session->data['success'] = $this->language->get('text_success_enable');
                } else {
                    $this->session->data['success'] = $this->language->get('text_success_disable');
                }

                unset($this->session->data['shared_secret']);
                unset($this->session->data['backup_code']);

                $this->response->redirect($this->url->link('extension/tfa/setup', 'user_token=' . $this->session->data['user_token'], true));
            } else {
                $this->error['warning'] = $this->language->get('text_warning');
            }
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/tfa/setup', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/tfa/setup', 'user_token=' . $this->session->data['user_token'], true);

        $data['cancel'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true);

        $data['backup_code'] = $this->session->data['backup_code'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/tfa/setup', $data));
    }
}