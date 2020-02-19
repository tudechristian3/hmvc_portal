<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leadorder extends MY_Controller {

	public function index(){
		$this->load_page('index');
	}

	public function submit_lead_order(){
		$getUserDetails = $this->MY_Model->getRows('tbl_users','*',array('user_id' => $this->session->userdata('user_id')),'','','','','row');
		$data_insert = array(
			'user_id' => $this->session->userdata('user_id'),
			'start_date' => date("Y-m-d", strtotime($this->input->post('date_lead_order'))),
			'end_date' => date("Y-m-d", strtotime($this->input->post('date_lead_order'))),
			'time' => $this->input->post('time_lead_order'),
			'mile' => $this->input->post('miles').' miles'
		);
		$id = $this->MY_Model->insert('tbl_lead_order',$data_insert);
		$join = array('tbl_lead_order' => 'tbl_lead_order.user_id = tbl_users.user_id');
		$group = array('tbl_lead_order.id');
		$data = $this->MY_Model->getRows('tbl_users','tbl_lead_order.start_date,tbl_lead_order.end_date,tbl_lead_order.time,tbl_users.first_name,tbl_users.last_name',array('tbl_lead_order.id' => $id),$join,$group,'','','array');
		// $this->sendEmail($getUserDetails->email,'<div>Test</div>');
		echo json_encode($data);
	}

	public function get_lead_order(){
		$join = array('tbl_lead_order' => 'tbl_lead_order.user_id = tbl_users.user_id');
		$group = array('tbl_lead_order.id');
		$data['lead_order_data'] = $this->MY_Model->getRows('tbl_users','tbl_lead_order.id,tbl_lead_order.start_date,tbl_lead_order.end_date,tbl_lead_order.time,tbl_users.first_name,tbl_users.last_name','',$join,$group,'','','array');
		$data['last_query'] = $this->db->last_query();
		echo json_encode($data);
	}

	public function get_lead_order_details(){
		$id = $this->input->post('id');
		$join = array('tbl_lead_order' => 'tbl_lead_order.user_id = tbl_users.user_id');
		$group = array('tbl_lead_order.id');
		$where = array('tbl_lead_order.id' => $id);
		$data['lead_order_data'] = $this->MY_Model->getRows('tbl_users','tbl_lead_order.id,tbl_lead_order.mile,tbl_lead_order.start_date,tbl_lead_order.end_date,tbl_lead_order.time,tbl_users.first_name,tbl_users.last_name',$where,$join,$group,'','','row');
		// $data['last_query'] = $this->db->last_query();
		echo json_encode($data);
	}

	public function get_leadorder(){
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$column_order = array('tbl_lead_order.start_date','tbl_lead_order.time','tbl_lead_order.mile','tbl_users.first_name','tbl_users.last_name');
		$join = array(
			'tbl_users' => 'tbl_users.user_id = tbl_lead_order.user_id'
		);
		$select = "tbl_lead_order.id,tbl_lead_order.start_date,tbl_lead_order.time,tbl_lead_order.mile,tbl_users.first_name,tbl_users.last_name";
		$where = array();
		if($this->session->userdata('user_type') == '1'){
			$where['tbl_users.user_id'] = $this->session->userdata('user_id');
		}
		$group = array();
		$list = $this->MY_Model->get_datatables('tbl_lead_order',$column_order, $select, $where, $join, $limit, $offset ,$search, $order, $group);
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $list['count_all'],
				"recordsFiltered" => $list['count'],
				"data" => $list['data']
		);
		echo json_encode($output);
	}

	public function delete_lead_order(){
		$id = $this->input->post('id');
		$where = array('id' => $id);

		if($this->MY_Model->delete('tbl_lead_order',$where)){
			echo 1;
		}
	}
}
