<?php
class ControllerMailForgotten extends Controller {
	public function index(&$route, &$args, &$output) {			            
		$this->load->language('mail/forgotten');

		$data['text_greeting'] = sprintf($this->language->get('text_greeting'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
		$data['text_change'] = $this->language->get('text_change');
		$data['text_ip'] = sprintf($this->language->get('text_ip'), $this->request->server['REMOTE_ADDR']);
		
		$data['reset'] = str_replace('&amp;', '&', $this->url->link('account/reset', 'code=' . $args[1], true));
		$data['ip'] = $this->request->server['REMOTE_ADDR'];
		
		$data['text_do_not_answer'] = $this->language->get('text_do_not_answer');
		$data['text_contact_us'] = $this->language->get('text_contact_us');
		$data['text_ignore'] = $this->language->get('text_ignore');
		$data['reset_password_text'] = $this->language->get('reset_password_text');
		
		if ($this->request->server['HTTPS']) {

			$store_url = HTTPS_SERVER;
		} else {

		    $store_url = HTTP_SERVER;
		}
		
		$data['title'] = $this->language->get('reset_password_text');
		$data['store_url'] = str_replace('http:','https:', $store_url);
		
	
		$data['logo'] = str_replace('http:','https:', $store_url . 'image/' . $this->config->get('config_logo'));
		$data['store_name'] = html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8');
		$data['store_contact_page'] = str_replace('http:','https:', $this->url->link('information/contact','', true));
		
		$mail = new Mail($this->config->get('config_mail_engine'));
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

		$mail->setTo($args[0]);
		$mail->setFrom($this->config->get('config_email'));
		$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
		$mail->setSubject( html_entity_decode(sprintf($this->language->get('text_subject'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8') );
		$mail->setHtml($this->load->view('mail/forgotten', $data));
		$mail->send();
	}
}
