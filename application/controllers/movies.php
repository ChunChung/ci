<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller {
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
		if ($this->uri->segment(3) === FALSE)
		{
			$movieID = 0;
		}
		else
		{
			$movieID = $this->uri->segment(3);
		}

		$this->load->model('Movies_model');

		$data = $this->Movies_model->getMovieDetails($movieID)[0];
		$data['Actors'] = $this->Movies_model->getMovieActors($data['MovieID']);
		$this->load->view('moviedetail', $data);
	}
}
