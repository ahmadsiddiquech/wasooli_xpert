<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_front extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function _login($username,$password,$org_id){
		$table = 'user';
		$this->db->where('phone',$username);
		$this->db->where('password',$password);
		$this->db->where('org_id',$org_id);
		return $this->db->get($table);
	}

	function _customer_list($where,$org_id){
		$table = 'customer';
		$this->db->where($where);
		$this->db->where('org_id',$org_id);
		$this->db->order_by('customer_id','DESC');
		return $this->db->get($table);
	}

	function _update_customer_amount($where,$where1,$amount,$org_id){
		$table = 'customer';
		$this->db->where($where);
		$this->db->where($where1);
		$this->db->where('org_id',$org_id);
		$this->db->set('amount', $amount);
		$this->db->update($table);
		return $this->db->affected_rows();
	}

	function  _insert_reciept($data){
		$table = 'reciept';
		$this->db->insert($table, $data);
	}

	function _get_reciept($where,$where1,$org_id){
		$table = 'reciept';
		$this->db->where($where);
		$this->db->where($where1);
		$this->db->where('org_id',$org_id);
		$this->db->order_by('reciept_id','desc');
		return $this->db->get($table);
	}

	function  _insert_expense($data){
		$table = 'expense';
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function _get_expense($where,$org_id){
		$table = 'expense';
		$this->db->where($where);
		$this->db->where('org_id',$org_id);
		$this->db->order_by('expense_id','desc');
		return $this->db->get($table);
	}

	function _get_invoice($where,$where1,$org_id){
		$table = 'invoice';
		$this->db->where($where);
		$this->db->where($where1);
		$this->db->where('org_id',$org_id);
		$this->db->order_by('invoice_id','desc');
		return $this->db->get($table);
	}

}