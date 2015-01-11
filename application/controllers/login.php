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
			$this->session->set_userdata('salesperson', $this->input->post('FName')." ".$this->input->post('LName'));
			$this->session->set_userdata('login_id', $this->input->post('inputID'));
		}
		redirect('/login');
	}

	public function logout()
	{
		session_start();
		if($this->session->userdata('login_id')) {
			$this->session->unset_userdata('login_id');
			$this->session->unset_userdata('salesperson');
		}
		redirect('/login');
	}

	public function test()
	{

		echo "test123";
	}
}
