<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends MY_Controller {

	public function index(){
		if($this->session->userdata('user_type') == 0){
			$join = array('tbl_users' => 'tbl_users.user_id = tbl_files.user_id');
			$data['files'] = $this->MY_Model->getRows('tbl_files','*','',$join,'','','','array');
		} else {
			$data['files'] = $this->MY_Model->getRows('tbl_files','*',array('user_id' => $this->session->userdata('user_id')),'','','','','array');
		}
		$this->load_page('index',$data);
	}

	public function upload_file(){
		$config['upload_path']          = './static/files/';
		$config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = '10000000000000000000000';
		$config['max_width'] = '102400';
		$config['max_height'] = '768000';
          $this->load->library('upload', $config);
		if(!$this->upload->do_upload('file_upload')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$data = array(
				'file_name' => $this->input->post('file_name'),
				'file' => $this->upload->data('file_name'),
				'uploaded_date' => date("Y-m-d"),
				'user_id' => $this->session->userdata('user_id')
			);
			$this->MY_Model->insert('tbl_files',$data);
		}
	}

	public function download_file($id){
		$this->load->helper('download');
		$data_file = $this->MY_Model->getRows('tbl_files','*',array('file_id' => $id),'','','','','row');
		$location = $_SERVER['DOCUMENT_ROOT'].'/national_portal/static/files';		
		$name = $location.'/'.$data_file->file;
		force_download($name, null);
	}
}
