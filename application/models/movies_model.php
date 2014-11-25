<?php
class Movies_model extends CI_Model {                                    

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	function getMovie($movieID) {
		$query = $this->db->query('
			SELECT * FROM Movie, Movie_has_Actor, Movie_has_Genre, Actor WHERE  Movie_has_Actor.Movie_MovieID = Movie.MovieID and Actor.ActorID = Movie_has_Actor.Actor_ActorID and Movie_has_Genre.Movie_MovieID = Movie.MovieID
			and Movie.MovieID = 

			'.$movieID);

    	return $query->result_array();
	}

}
?>
