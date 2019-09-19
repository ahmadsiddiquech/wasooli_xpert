<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_front extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function _login($username,$password){
		$table = 'user';
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get($table);
	}

	function _customer_list($where){
		$table = 'customer';
		$this->db->where($where);
		return $this->db->get($table);
	}

	function _update_customer_amount($where,$where1,$amount){
		$table = 'customer';
		$this->db->where($where);
		$this->db->where($where1);
		$this->db->set('amount', $amount);
		$this->db->update($table);
		return $this->db->affected_rows();
	}

	function  _insert_reciept($data){
		$table = 'reciept';
		$this->db->insert($table, $data);
	}

	function _get_reciept($where,$where1){
		$table = 'reciept';
		$this->db->where($where);
		$this->db->where($where1);
		return $this->db->get($table);
	}

	function  _insert_expense($data){
		$table = 'expense';
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

}