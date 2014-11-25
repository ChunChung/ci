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

		if(!$this->session->userdata('login_id')) {
			$this->load->view('login');
		}
		else { 
			$this->load->view('reports');
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
}
