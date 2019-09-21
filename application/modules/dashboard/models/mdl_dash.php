<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_dash extends CI_Model {

    function __construct() {

        parent::__construct();

    }

    function _get_total_customer($org_id){
    	$table = 'customer';
        $this->db->where('org_id',$org_id);
        return $this->db->get($table);
    }

    function _get_total_teacher_parent($designation,$org_id){
    	$table = 'user';
        $this->db->select('*');
        $this->db->where('org_id',$org_id);
        $this->db->where('designation',$designation);
        return $this->db->get($table);
    }


}