<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model('Movies_model');                                     
		$data['Hits'] = $this->Movies_model->getMovies();              
		$data['Ratings'] = $this->Movies_model->getMoviesByRating();              
		$this->load->view('index', $data);
	}

	public function findmovie()
	{
		$this->load->model('Movies_model');                                     
		$data['type'] = "Error";
		$data['message'] = "Please input movie name";
		if ($this->input->post('inputMovie')){
			$result = $this->Movies_model->findMovie($this->input->post('inputMovie'));              
			if (count($result) > 0) {
				$url = 'http://localhost:8888/ci/index.php/movies/index/'.$result[0];
				header('Location: '.$url);
			}
			else {
				$data['message'] = "Can't find any movie";
			}
		}
		$this->load->view('showmessages', $data);
	}
}
