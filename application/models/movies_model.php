<?php
class Movies_model extends CI_Model {                                    

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	function getMovieDetails($MovieID) {
		$query = $this->db->query('
			SELECT * FROM Movie, Movie_has_Genre WHERE Movie_has_Genre.Movie_MovieID = Movie.MovieID
			and Movie.MovieID = 
			'.$MovieID);

		if ($query->num_rows() > 0)
    		return $query->result_array();
		else {
			$query = $this->db->query('
			SELECT * FROM Movie, Movie_has_Genre WHERE Movie_has_Genre.Movie_MovieID = Movie.MovieID order by rand() limit 1');
		}
    		return $query->result_array();
	}

	function getMovieActors($MovieID) {
		$result = Array();

		$query = $this->db->query('
			SELECT Actor.* FROM Actor, Movie_has_Actor WHERE Movie_has_Actor.Actor_ActorID = Actor.ActorID
			and Movie_has_Actor.Movie_MovieID = 

			'.$MovieID);

		foreach ($query->result() as $row) {
			array_push($result, $row->FName." " . $row->LName);
		}
		return $result;
	}

	function getMovies() {
		$result = Array();
		$query = $this->db->query('
			SELECT Movie.MovieID, Movie.Duration, Movie.img_url FROM Movie Order by Movie.IMDBRating limit 6'
			);
		foreach ($query->result() as $row) {
			$movie =  Array();
			$movie['MovieID'] = $row->MovieID;
			$movie['Duration'] = $row->Duration;
			$movie['Img'] = $row->img_url;
			$movie['Genre'] = implode('|' , $this->getGenre($row->MovieID));
			array_push($result, $movie);
		}

		return $result;
	}

	function getGenre($MovieID) {
		$result = Array();

		$query = $this->db->query('
			SELECT Movie_has_Genre.Genre_GenreName FROM Movie_has_Genre WHERE Movie_MovieID = 
			'.$MovieID);

		foreach ($query->result() as $row) {
			array_push($result, $row->Genre_GenreName);
		}
		return $result;
	}
}
?>
