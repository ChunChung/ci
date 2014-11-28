<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->helper(array('form', 'url', 'date'));
	}
							           

	public function index()
	{
		session_start();

		if($this->session->userdata('login_id')) {
			$this->load->view('reports');
		}
		else { 
			$this->load->view('login');
		}
	}

	public function submit()
	{
		$this->load->model('Login_model');
		$result = $this->Login_model->getPasswd($this->input->post('inputID'));

		if (isset($result[0]) && $this->input->post('inputPasswd') == $result[0]['sPassword']) {
			$this->session->set_userdata('login_id', $this->input->post('inputID'));
		}
		redirect('/login');
	}

	public function logout()
	{
		session_start();
		if($this->session->userdata('login_id')) {
			$this->session->unset_userdata('login_id');
		}
		redirect('/login');
	}

	public function addcustomer()
	{
		session_start();

		if($this->session->userdata('login_id')) {
			$this->load->view('addcustomer');
		}
		else { 
			$data['type'] = "Error";
			$data['message'] = "Sorry, you don't have right to add a customer.";
			$this->load->view('showmessages', $data); 
		}
	}

	public function send() 
	{
		session_start();
		$this->load->model('Login_model');
		if($this->session->userdata('login_id')) {
			$data['type'] = "Error";
			if($this->input->post('user-number')) {
				try {
					$userInfo['FName'] = $this->input->post('user-fname');
					$userInfo['LName'] = $this->input->post('user-lname');
					$userInfo['Email'] = $this->input->post('user-email');
					$userInfo['DOB'] = $this->input->post('user-dob');
					$userInfo['Address'] = $this->input->post('user-address');
					$userInfo['MobileNumber'] = $this->input->post('usee-number');

					$this->Login_model->addCustomer($userInfo);

					$data['type'] = "Success!!";
					$data['message'] = "Add a new costomer!";
				} catch (Exception $e) {
					$data['message'] = $e->getMessage();
					$this->load->view('showmessages', $data); 
				}
			
			}
			else { 
				$data['message'] = "Sorry, you must input your phone number.";
			}
		}
		else { 
			$data['message'] = "Sorry, you don't have right to add a customer.";
		}
		$this->load->view('showmessages', $data); 
	}
}
