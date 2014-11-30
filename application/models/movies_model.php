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

	function getMovieStores($MovieID) {
		$result = Array();

		$query = $this->db->query('
			SELECT Store.Address, Movie_has_Store.Quantity FROM Store, Movie_has_Store WHERE Movie_has_Store.Store_StoreID = Store.StoreID and Movie_has_Store.Movie_MovieID = 
			'.$MovieID);

		foreach ($query->result() as $row) {
			$stores = Array();
			$stores['Address'] = $row->Address;
			$stores['Quantity'] = $row->Quantity;
			array_push($result, $stores);
		}
		return $result;
	}

	function getMovies() {
		$result = Array();
		$query = $this->db->query('
			SELECT Movie.MovieID, Movie.Duration, Movie.PictureURL FROM Movie Order by Movie.ReleaseDate limit 6 '
			);
		foreach ($query->result() as $row) {
			$movie =  Array();
			$movie['MovieID'] = $row->MovieID;
			$movie['Duration'] = $row->Duration;
			$movie['PictureURL'] = $row->PictureURL;
			$movie['Genre'] = implode('|' , $this->getGenre($row->MovieID));
			array_push($result, $movie);
		}
		return $result;
	}

	function getMoviesByRating() {
		$result = Array();
		$query = $this->db->query('
			SELECT Movie_has_Store_has_Transaction.Movie_has_Store_Movie_MovieID as MovieID, Movie.Duration, Movie.Title, Movie.PictureURL FROM Movie, Movie_has_Store_has_Transaction WHERE Movie.MovieID = Movie_has_Store_has_Transaction.Movie_has_Store_Movie_MovieID group by Movie_has_Store_has_Transaction.Movie_has_Store_Movie_MovieID order by count(*) desc
			'
			);
		foreach ($query->result() as $row) {
			$movie =  Array();
			$movie['MovieID'] = $row->MovieID;
			$movie['Duration'] = $row->Duration;
			$movie['PictureURL'] = $row->PictureURL;
			$movie['Title'] = $row->Title;
			$movie['Genre'] = implode('|' , $this->getGenre($row->MovieID));
			array_push($result, $movie);
		}
		return $result;
	
	}

	function findMovie($Movie) {
		$result = Array();

		$query = $this->db->query("
			SELECT MovieID FROM Movie WHERE Title like '%" . $Movie . "%'");

		foreach ($query->result() as $row) {
			array_push($result, $row->MovieID);
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
