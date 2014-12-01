<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesperson extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->helper(array('form', 'url', 'date'));
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

	public function sendmovie()
	{
		session_start();
		$this->load->model('Salesperson_model');
		if($this->session->userdata('login_id')) {
			$data['type'] = "Error";
			if($this->input->post('MobileNumber') && $this->input->post('MovieID')) {
				$Movies = $this->input->post('MovieID');
				$storeID = $this->Salesperson_model->getStoreID($this->session->userdata('login_id'))[0];
				$Transaction = Array();
				$Transaction['Customer_MobileNumber'] = $this->input->post('MobileNumber');
				$Transaction['Salesperson_SalespersonID'] = $this->session->userdata('login_id');
				$Transaction['Borrow_Date'] = $this->input->post('user-borrowdate');
				$TID = $this->Salesperson_model->addTransaction($Transaction);
				foreach($Movies as $MovieID) {
					$update = Array();
					$update['StoreID'] = $storeID;
					$update['MovieID'] = $MovieID;
					$update['TID'] = $TID;
					$this->Salesperson_model->updateRentMovie($update);
				}

				$data['Movies'] = $this->Salesperson_model->getAvailableMovies($storeID);
				$data['Customers'] = $this->Salesperson_model->getCustomers();
				$this->load->view('rentamovie', $data);
			
			}
			else { 
				$data['message'] = "Sorry, you need to choose right infomation.";
				$this->load->view('showmessages', $data); 
			}
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
		$this->load->model('Salesperson_model');
		if($this->session->userdata('login_id')) {
			$data['type'] = "Error";
			if($this->input->post('user-number')) {
				try {
					$userInfo['FName'] = $this->input->post('user-fname');
					$userInfo['LName'] = $this->input->post('user-lname');
					$userInfo['Email'] = $this->input->post('user-email');
					$userInfo['DOB'] = $this->input->post('user-dob');
					$userInfo['Address'] = $this->input->post('user-address');
					$userInfo['MobileNumber'] = $this->input->post('user-number');

					$this->Salesperson_model->addCustomer($userInfo);
					$data['type'] = "Success!!";
					$data['message'] = "Add a new costomer!";
					$this->load->view('showmessages', $data); 
				} catch (Exception $e) {
					$data['message'] = $e->getMessage();
					$this->load->view('showmessages', $data); 
				}
			
			}
			else { 
				$data['message'] = "Sorry, you must input your phone number.";
				$this->load->view('showmessages', $data); 
			}
		}
		else { 
			$data['message'] = "Sorry, you don't have right to add a customer.";
			$this->load->view('showmessages', $data); 
		}
	}

	public function rentmovie() 
	{
		session_start();
		$this->load->model('Salesperson_model');

		if($this->session->userdata('login_id')) {
			$storeID = $this->Salesperson_model->getStoreID($this->session->userdata('login_id'))[0];
			$data['Movies'] = $this->Salesperson_model->getAvailableMovies($storeID);
			$data['Customers'] = $this->Salesperson_model->getCustomers();
			$this->load->view('rentamovie', $data);
		}
		else {
			$data['type'] = "Error";
			$data['message'] = "Sorry, you don't have right to rent a movie";
			$this->load->view('showmessages', $data); 
		}
	}


	public function reports()
	{
		session_start();
		if($this->session->userdata('login_id')) {
			$this->load->model('Salesperson_model');

			if($this->uri->segment(3) == "topcustomer") {
				$data['result'] = $this->Salesperson_model->gettopcustomer();
			}
			else if($this->uri->segment(3) == "storerevenue") {
				$data['result'] = $this->Salesperson_model->getstorerevenue();
			}
			else if($this->uri->segment(3) == "mostrented") {
				$data['result'] = $this->Salesperson_model->getmostrented();
			}
			else if($this->uri->segment(3) == "activesalesperson") {
				$data['result'] = $this->Salesperson_model->getactivesalesperson();
			}
			else if($this->uri->segment(3) == "agingcustomer") {
				$data['result'] = $this->Salesperson_model->getagingcustomer();
			}
			else {
				$data['result'] = $this->Salesperson_model->gettopcustomer();
			}
			$this->load->view('reports', $data);
		}
		else {
			$this->load->view('login');
		}
	}

	public function returnmovie() 
	{
		session_start();
		$this->load->model('Salesperson_model');

		if($this->session->userdata('login_id')) {
			$data['Transactions'] = $this->Salesperson_model->getTransaction($this->session->userdata('login_id'));
			$this->load->view('returnmovie', $data);
		}
		else {
			$data['type'] = "Error";
			$data['message'] = "Sorry, you don't have right to return a movie";
			$this->load->view('showmessages', $data); 
		}
	}

	public function moviebycustomer() 
	{
		session_start();
		$this->load->model('Salesperson_model');

		if($this->session->userdata('login_id')) {
			$data['Transactions'] = $this->Salesperson_model->getCustomerTransaction($this->input->post('mobileNumber'), $this->session->userdata('login_id'));
			$this->load->view('returnmovie', $data);
		}
		else {
			$data['type'] = "Error";
			$data['message'] = "Sorry, you don't have right to return a movie";
			$this->load->view('showmessages', $data); 
		}
	}

	public function returnm() 
	{
		session_start();
		$this->load->model('Salesperson_model');

		if($this->session->userdata('login_id')) {
			$data['ReturnInfos'] = $this->Salesperson_model->returnTransaction($this->input->post('TID'));
			$data['Transactions'] = $this->Salesperson_model->getTransaction($this->session->userdata('login_id'));
			$this->load->view('returnmovie', $data);
		}
		else {
			$data['type'] = "Error";
			$data['message'] = "Sorry, you don't have right to return a movie";
			$this->load->view('showmessages', $data); 
		}
	}
}
