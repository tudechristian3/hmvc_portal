<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index(){
		$this->load_page('index');
	}

	public function get_users(){
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$column_order = array('user_id','first_name','last_name','username','email');
		$join = array();
		$select = "*";
		$where = array("user_type <>" => 0);
		$group = array();
		$list = $this->MY_Model->get_datatables('tbl_users',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $list['count_all'],
				"recordsFiltered" => $list['count'],
				"data" => $list['data']
		);
		echo json_encode($output);
	}

	public function action_user(){
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$where = array('user_id' => $id);
		$data['status'] = $status;
		if($this->MY_Model->update('tbl_users',$data,$where)){
			echo 1;
		}
	}

	public function delete_user(){
		$id = $this->input->post('id');
		$where = array('user_id' => $id);

		if($this->MY_Model->delete('tbl_users',$where)){
			echo 1;
		}
	}
}
