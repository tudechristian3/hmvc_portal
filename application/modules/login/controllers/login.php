<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index(){
		$this->login_page('index');
	}

	public function auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
		);
		$checkUser = $this->MY_Model->getRows('tbl_users','*',$where,'','','','','row');
		if($checkUser){
			if(password_verify($password,$checkUser->password)){
				if($checkUser->status == 1){
					$this->set_session($checkUser);
					redirect(base_url());
				} else {
					$data['msg'] = 'Deactivated Account, Please try again';
					$this->login_page('index',$data);
				}
			} else {
				$data['msg'] = 'Invalid password. Please try again';
				$this->login_page('index',$data);
			}
		} else {
			$data['msg'] = 'Invalid Username. Please try again';
			$this->login_page('index',$data);
		}
	}

	public function createaccount(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$address = $this->input->post('address');
		$this->form_validation->set_rules('username','Username','required|is_unique[tbl_users.username]',array(
			'is_unique' => 'The %s is already taken'
		));
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_users.email]',array(
			'is_unique' => 'The %s is already taken'
		));
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
		if($this->form_validation->run() == false){
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			$data['is_error'] = 1;
			$data['msg'] = explode("\n",validation_errors());
		}else{
			$data_insert = array(
				'username' => $username,
				'email' => $email,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'password' => password_hash($password,PASSWORD_DEFAULT),
				'address' => $address,
				'user_type' => 1,
				'status' => 1
			);
			$this->MY_Model->insert('tbl_users',$data_insert);
			$data['is_error'] = 0;
			$data['msg'] = "Successfully Registered. You can now login";
		}
		echo json_encode($data);
	}

	public function set_session($data){
		$session_data = array(
			'user_id' => $data->user_id,
			'first_name' => $data->first_name,
			'user_type' => $data->user_type,
			'logged_in' =>1
		);
		$this->session->set_userdata($session_data);
	}
}
