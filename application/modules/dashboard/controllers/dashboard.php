<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index(){
		$data['list_of_content'] = $this->MY_Model->getRows('tbl_content','content_title,content_url','','','','','','array');
		$data['count_user'] = $this->MY_Model->getRows('tbl_users','*',array('user_type' => 1),'','','','','count');
		$data['count_lead_order'] = $this->MY_Model->getRows('tbl_lead_order','*','','','','','','count');
		$this->load_page('index',$data);
	}

	public function details($url){
		$data['content_data'] = $this->MY_Model->getRows('tbl_content','content_title,content',array('content_url' => $url),'','','','','row');
		$this->load_page('details',$data);
	}

	public function lead(){
		$this->load_page('lead');
	}
}
