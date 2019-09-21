<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
//Modules::run('site_security/has_permission');

}

    function index() {
        $this->get();
    }



    function get(){
        $data['news'] = $this->_get('user_id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create() {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id) && $update_id != 0) {
            $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function _get_data_from_db($update_id) {
        $where['user.user_id'] = $update_id;
        //$where['post.lang_id'] = $lang_id;
        $query = $this->_get_by_arr_id($where);
        // print_r($query->result_array());exit();
        foreach ($query->result() as
                $row) {
            $data['user_id'] = $row->user_id;
            $data['user_name'] = $row->user_name;
            $data['phone'] = $row->phone;
            $data['user_address'] = $row->user_address;
            $data['cnic'] = $row->cnic;
            $data['password'] = $row->password;
            $data['designation'] = $row->designation;
            $data['org_id'] = $row->org_id;
        }
        if(isset($data))
            return $data;
    }
    
    function _get_data_from_post() {
        $data['user_name'] = $this->input->post('user_name');
        $data['phone'] = $this->input->post('phone');
        $data['user_address'] = $this->input->post('user_address');
        $data['cnic'] = $this->input->post('cnic');
        $data['designation'] = $this->input->post('designation');
        $data['password'] = $this->input->post('password');
        $user_data = $this->session->userdata('user_data');
        $data['org_id'] = $user_data['user_id'];
        return $data;

    }

    function submit() {
            $update_id = $this->uri->segment(4);
            $data = $this->_get_data_from_post();
            $user_data = $this->session->userdata('user_data');
            if ($update_id != 0) {

                $id = $this->_update($update_id,$user_data['user_id'], $data);
            }
            else
            {
                $id = $this->_insert($data);
            }
                $this->session->set_flashdata('message', 'User'.' '.DATA_SAVED);										
		        $this->session->set_flashdata('status', 'success');
            
            redirect(ADMIN_BASE_URL . 'user');
        }

    function delete() {
        $delete_id = $this->input->post('id');
        $user_data = $this->session->userdata('user_data');
        $org_id = $user_data['user_id'];
        $this->_delete($delete_id, $org_id);
    }

    function validate (){
    $phone = $this->input->post('phone');
    $query = $this->_get_where_validate($phone);
    if ($query->num_rows() > 0) echo '1';
    else echo '0';
    }

    /////////////// for detail ////////////
    function detail() {
        $update_id = $this->input->post('id');
        $data['user'] = $this->_get_data_from_db($update_id);
        $this->load->view('detail', $data);
    }

    function _get($order_by) {
        $this->load->model('mdl_user');
        $query = $this->mdl_user->_get($order_by);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_user');
        return $this->mdl_user->_get_by_arr_id($arr_col);
    }
    function _insert($data) {
        $this->load->model('mdl_user');
        return $this->mdl_user->_insert($data);
    }

    function _update($arr_col, $org_id, $data) {
        $this->load->model('mdl_user');
        $this->mdl_user->_update($arr_col, $org_id, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_user');
        $this->mdl_user->_update_id($id, $data);
    }

    function _delete($arr_col, $org_id) {       
        $this->load->model('mdl_user');
        $this->mdl_user->_delete($arr_col, $org_id);
    }

    function _get_where_validate($phone){
        $this->load->model('mdl_user');
        $query = $this->mdl_user->_get_where_validate($phone);
        return $query;
    }


}