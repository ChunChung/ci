<?php
class Salesperson_model extends CI_Model {                                    

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		//$dsn = 'mysql://chunchung:IS@&!)2014fall@140.113.235.191/chunchung_cs';


		$this->load->database();
	}

	function addCustomer($infos) {
    	$table = 'Customer';
		return $this->db->insert($table, $infos); 
	}

	function addTransaction($infos) {
    	$table = 'Transaction';
		$this->db->insert($table, $infos); 
		$query = $this->db->query('SELECT LAST_INSERT_ID() as TID');
		return $query->result_array()[0]['TID'];
	}

	function updateRentMovie($infos) {
		$tableM_H_S = 'Movie_has_Store';
		$tableM_H_S_H_T = 'Movie_has_Store_has_Transaction';
		$MHSHT['Movie_has_Store_Store_StoreID'] = $infos['StoreID'];
		$MHSHT['Movie_has_Store_Movie_MovieID'] = $infos['MovieID'];
		$MHSHT['Transaction_TransactionID'] = $infos['TID'];
		$this->db->insert($tableM_H_S_H_T, $MHSHT); 

		$data = array(
			'Movie_MovieID' => $infos['MovieID'],
			'Store_StoreID' => $infos['StoreID'],
		);

		$this->db->set('Quantity', 'Quantity-1', FALSE);
		$this->db->where($data);
		$this->db->update($tableM_H_S); 
	}

	function getStoreID($salespersonID) {
		$result = Array();
		$query = $this->db->query(
			'SELECT Store_StoreID FROM Salesperson WHERE SalespersonID = '.$salespersonID
			);

		foreach ($query->result() as $row) {              
			array_push($result, $row->Store_StoreID);   
		}                                                 
		return $result; 
	}

	function getAvailableMovies($storeID) {
		$result = Array();
		$query = $this->db->query(
		' Select Movie.Title,Movie.MovieID from Movie, Movie_has_Store where Movie.MovieID = Movie_has_Store.`Movie_MovieID` and Movie_has_Store.`Quantity` > 0 and Movie_has_Store.`Store_StoreID` = 
' . $storeID
		);
		foreach ($query->result() as $row) {              
			$movie = Array();
			$movie['Title'] = $row->Title;
			$movie['MovieID'] = $row->MovieID;
			array_push($result, $movie);   
		}                                                 
		return $result; 
	}
	function getCustomers() {
		$result = Array();
		$query = $this->db->query(
		'Select * from Customer;');

		foreach ($query->result() as $row) {              
			$customer = Array();
			$customer['name'] = $row->FName. ", ".$row->LName;
			$customer['MobileNumber'] = $row->MobileNumber;
			array_push($result, $customer);   
		}                                                 
		return $result; 
	}

}
?>
