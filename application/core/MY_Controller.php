<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct(){
		if($this->router->fetch_class() != 'login'){
			if(!$this->session->has_userdata('logged_in')){
				redirect(base_url('login'));
			}
		} else if($this->router->fetch_class() == 'login'){
			if($this->session->has_userdata('logged_in')){
				redirect(base_url());
			}
		}
	}

	public function load_page($page, $data = array()){

          $this->load->view('includes/head',$data);
          $this->load->view($page,$data);
          $this->load->view('includes/footer',$data);
     }

	public function login_page($page, $data = array()){
          $this->load->view('includes/login_head',$data);
          $this->load->view($page,$data);
          $this->load->view('includes/login_footer',$data);
     }

	public function sendEmail($from,$body){
		$email = 'prospteam@gmail.com';
		$config = Array(
            	'protocol' => 'smtp',
            	'smtp_host' => 'smtp.mailgun.org',
            	'smtp_port' => 587,
            	'smtp_user' => 'postmaster@mailgun.proweaver.com',
            	'smtp_pass' => '5b7c0c074cf27306ce725201b20afb78',
            	'wordwrap' => TRUE,
            	'mailtype' => 'html'
          );

          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from($from, 'National Insurance, Inc.');
          $this->email->to($email);
          $message = "<div>Hi Administrator<div/>";
          $message .= $body;
          $this->email->subject('Lead Order Request');
          $this->email->message($message);
          $this->email->send();

	}

}
