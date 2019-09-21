<?php 


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller

{



function __construct() {

    parent::__construct();

    Modules::run('site_security/is_login');


}



    function index(){

        $data['view_file'] = 'home';
        $this->load->module('template');

        $config=array();

        $ci = & get_instance();

        $ci->load->library('session');

        $user_data = $ci->session->userdata('user_data');
        $data['organization'] = $user_data['user_name'];
        $org_id = $user_data['user_id'];

        $data['customer'] = $this->get_total_customer($org_id);
        $data['salesman'] = $this->get_total_teacher_parent('Salesman',$org_id);
        $data['cashier'] = $this->get_total_teacher_parent('Cashier',$org_id);

        $this->template->admin($data);

	}



    function get_total_customer($org_id){
        $this->load->model('mdl_dash');
        return $this->mdl_dash->_get_total_customer($org_id)->num_rows();
    }

    function get_total_teacher_parent($designation,$org_id){
        $this->load->model('mdl_dash');
        return $this->mdl_dash->_get_total_teacher_parent($designation,$org_id)->num_rows();
    }
}