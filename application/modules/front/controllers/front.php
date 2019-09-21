<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front extends MX_Controller {
    protected $data = '';
    function __construct() {
        parent::__construct();
        $this->load->library("pagination");
        $this->load->helper("url");
    }
    ////////////////////////// FOR HOME PAGE /////////////////////
    function index() {
        $this->load->module('template');
        $data['header_file'] = 'header';
        $data['page_title'] = 'Home';
        $data['view_file'] = 'home_page';
        $this->template->front($data);
    }

    function login(){
		$api = $this->input->post('api');
		$status =false;
		if ($api == 'true') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$org_id = $this->input->post('org_id');

			$num_rows = $this->_login($username,$password,$org_id)->num_rows();

			if($num_rows == 0 || $num_rows > 1){
				$message = 'Invalid Username or Password';
				$data = '';
			}
			elseif ($num_rows == 1) {
				$user_data = $this->_login($username,$password,$org_id)->result_array();
				$message = 'Login Successful';
				$data = $user_data;
				$status = true; 
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message, 'data' => $data));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}

	function customer_list(){
		$api = $this->input->post('api');
		$status = false;
		if ($api == 'true') {
			$user_id = $this->input->post('user_id');
			$org_id = $this->input->post('org_id');

			$where['user_id'] = $user_id;

			$customer_data = $this->_customer_list($where,$org_id)->result_array();
			if (isset($customer_data) && !empty($customer_data)) {
				foreach ($customer_data as $key => $value) {
					$finalData['customer_id'] = $value['customer_id'];
					$finalData['customer_name'] = $value['customer_name'];
					$finalData['shop'] = $value['shop'];
					$finalData['amount'] = $value['amount'];
					$finalData['user_id'] = $value['user_id'];
					if (isset($value['image']) && !empty($value['image'])) {
						$finalData['image'] = IMAGE_BASE_URL.'customer/medium_images/'.$value['image'];	
					}
					else{
						$finalData['image'] = IMAGE_BASE_URL.'customer/medium_images/customer.png';
					}
					if($value['amount'] < 0){
						$finalData['cash'] = 'Debit';
					}
					else{
						$finalData['cash'] = 'Credit';
					}

					$finalData2[] = $finalData;

				}
			}
			if (isset($finalData2) && !empty($finalData2)) {
				$message = 'Record Found Successfully';
				$data = $finalData2;
				$status = true; 
			}
			else{
				$message = 'Record Not Found';
				$data = '';
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message, 'data' => $data));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}

	function update_customer_amount(){
		$api = $this->input->post('api');
		$status = false;
		if ($api == 'true') {
			$data2['user_id'] = $this->input->post('user_id');
			$data2['user_name'] = $this->input->post('user_name');
			$data2['customer_id'] = $this->input->post('customer_id');
			$data2['customer_name'] = $this->input->post('customer_name');
			$data2['amount'] = $this->input->post('amount');
			$data2['amount_paid'] = $this->input->post('amount_paid');
			$data2['issue_date'] = $this->input->post('issue_date');
			$data2['org_id'] = $this->input->post('org_id');

			$where['user_id'] = $data2['user_id'];
			$where1['customer_id'] = $data2['customer_id'];

			$data2['amount'] = $data2['amount'] - $data2['amount_paid'];
			if($data2['amount'] < 0){
				$data1['cash'] = 'Debit';
			}
			else{
				$data1['cash'] = 'Credit';
			}

			$data1['amount'] = $data2['amount'];

			$check = $this->_update_customer_amount($where,$where1,$data2['amount'],$data2['org_id']);
			if ($check == 1) {
				$this->_insert_reciept($data2);
				$message = 'Record Updated Successfully';
				$data[] = $data1;
				$status = true; 
			}
			else{
				$message = 'Record Not Updated';
				$data = '';
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message, 'data' => $data));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}

	function get_reciept(){
		$api = $this->input->post('api');
		$status = false;
		if ($api == 'true') {
			$user_id = $this->input->post('user_id');
			$customer_id = $this->input->post('customer_id');
			$org_id = $this->input->post('org_id');

			$where['user_id'] = $user_id;
			$where1['customer_id'] = $customer_id;

			$reciept = $this->_get_reciept($where,$where1,$org_id)->result_array();
			if (isset($reciept) && !empty($reciept) ) {
				$message = 'Record Found Successfully';
				$data = $reciept;
				$status = true; 
			}
			else{
				$message = 'Record Not Found';
				$data = '';
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message, 'data' => $data));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}

	function insert_expense(){
		$api = $this->input->post('api');
		$status = false;
		if ($api == 'true') {
			$data['user_id'] = $this->input->post('user_id');
			$data['user_name'] = $this->input->post('user_name');
			$data['amount'] = $this->input->post('amount');
			$data['date'] = $this->input->post('date');
			$data['expense_type'] = $this->input->post('expense_type');
			$data['org_id'] = $this->input->post('org_id');

			$check = $this->_insert_expense($data);
			if (isset($check) && !empty($check)) {
				$message = 'Expense Added Successfully';
				$status = true; 
			}
			else{
				$message = 'Record Not Added';
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}

	function get_expense(){
		$api = $this->input->post('api');
		$status = false;
		if ($api == 'true') {
			$user_id = $this->input->post('user_id');
			$org_id = $this->input->post('org_id');

			$where['user_id'] = $user_id;

			$expense = $this->_get_expense($where,$org_id)->result_array();
			if (isset($expense) && !empty($expense) ) {
				$message = 'Record Found Successfully';
				$data = $expense;
				$status = true; 
			}
			else{
				$message = 'Record Not Found';
				$data = '';
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message, 'data' => $data));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}

	function get_invoice(){
		$api = $this->input->post('api');
		$status = false;
		if ($api == 'true') {
			$user_id = $this->input->post('user_id');
			$customer_id = $this->input->post('customer_id');
			$org_id = $this->input->post('org_id');

			$where['user_id'] = $user_id;
			$where1['customer_id'] = $customer_id;

			$invoice = $this->_get_invoice($where,$where1,$org_id)->result_array();
			if (isset($invoice) && !empty($invoice) ) {
				$message = 'Record Found Successfully';
				$data = $invoice;
				$status = true; 
			}
			else{
				$message = 'Record Not Found';
				$data = '';
			}
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => $message, 'data' => $data));
		}
		else{
			header('Content-Type: application/json');
            echo json_encode(array('status'=>$status, 'message' => "Unable to Connect"));
		}
	}



	// ===================================================
	// ================Helper Functions===================
	// ===================================================




	function _login($username,$password,$org_id){
		$this->load->model('mdl_front');
		return $this->mdl_front->_login($username,$password,$org_id);
	}

	function _customer_list($where,$org_id){
		$this->load->model('mdl_front');
		return $this->mdl_front->_customer_list($where,$org_id);
	}

	function _update_customer_amount($where,$where1,$amount,$org_id){
		$this->load->model('mdl_front');
		return $this->mdl_front->_update_customer_amount($where,$where1,$amount,$org_id);
	}

	function _insert_reciept($data){
		$this->load->model('mdl_front');
		return $this->mdl_front->_insert_reciept($data);
	}

	function _get_reciept($where,$where1,$org_id){
		$this->load->model('mdl_front');
		return $this->mdl_front->_get_reciept($where,$where1,$org_id);
	}

	function _insert_expense($data){
		$this->load->model('mdl_front');
		return $this->mdl_front->_insert_expense($data);
	}

	function _get_expense($where,$org_id){
		$this->load->model('mdl_front');
		return $this->mdl_front->_get_expense($where,$org_id);
	}

	function _get_invoice($where,$where1,$org_id){
		$this->load->model('mdl_front');
		return $this->mdl_front->_get_invoice($where,$where1,$org_id);
	}

}