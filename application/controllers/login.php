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
		//parent::Controller();
		//$this->load->library('encrypt');

		//$encrypted_string = $this->encrypt->encode($msg, $key);


		//session_start();

		if(!$this->session->userdata('login_id')) {
			$this->load->view('employees/login');
		}
		else { // 有登入的話就導到正確的網頁
			$this->load->view('dvds/browsing');
		}
	}

	public function submit()
	{
		$this->load->model('Login_model');
		#$this->load->view('dvds/browsing');

		#$this->load->database();
		echo $this->input->post('inputID');
		echo $this->Login_model->getPasswd($this->input->post('inputID'));

	}
}
