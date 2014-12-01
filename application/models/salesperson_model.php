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

	function getTransaction() {
		$result = Array();
		$query = $this->db->query(
			'select * from Transaction, Customer where Transaction.`Customer_MobileNumber` = Customer.`MobileNumber` and Transaction.TransactionID NOT IN (select Transaction_TransactionID as TransactionID from Payment)');

		foreach ($query->result() as $row) {              
			$customer = Array();
			$customer['Name'] = $row->FName. ", ".$row->LName;
			$customer['MobileNumber'] = $row->MobileNumber;
			$customer['BorrowDate'] = $row->Borrow_Date;
			$customer['Movies'] = $this->getBorrowMovies($row->TransactionID);
			$customer['Address'] = $row->Address;
			$customer['TID'] = $row->TransactionID;
			array_push($result, $customer);   
		}                                                 
		return $result; 
	}

	function returnTransaction($TID) {
		$payment = Array();

		$query = $this->db->query(
		'select * from Movie_has_Store_has_Transaction where Transaction_TransactionID = '.$TID);

		$movie_count = 0;
		foreach ($query->result() as $row) {              
			$movie_count = $movie_count + 1;
			$data = array(
				'Movie_MovieID' => $row->Movie_has_Store_Movie_MovieID,
				'Store_StoreID' => $row->Movie_has_Store_Store_StoreID,
			);

			$this->db->set('Quantity', 'Quantity+1', FALSE);
			$this->db->where($data);
			$this->db->update('Movie_has_Store'); 
		}                                                 

		$query = $this->db->query(
		'select *, datediff(Transaction.Borrow_Date, now()) as Days from Transaction where TransactionID = '.$TID);

		$query_result = $query->result()[0];

		$payment['Customer_MobileNumber'] = $query_result->Customer_MobileNumber;
		$payment['Transaction_TransactionID'] = $TID;
		$payment['Salesperson_SalespersonID'] = $query_result->Salesperson_SalespersonID;
		$payment['Return_Date'] = date("Y-m-d");
		$payment['Amount'] = (abs($query_result->Days)==0?1:abs($query_result->Days)) * $movie_count + floor(abs($query_result->Days)/7) * 5;


		$this->db->insert('Payment', $payment); 

		$payment['Count'] = $movie_count;
		$payment['Day'] = abs($query_result->Days);


		return $payment; 
	}

	function getBorrowMovies($TID) {
		$movies = Array();
		$query = $this->db->query(
		'SELECT * FROM 	`Movie_has_Store_has_transaction`, Movie WHERE Movie.MovieID = Movie_has_Store_has_transaction.`Movie_has_Store_Movie_MovieID` and  `Transaction_TransactionID` ='.$TID);

		foreach ($query->result() as $row) {              
			array_push($movies, $row->Title);   
		}                                                 
		return $movies; 
	
	}

	function getCustomerTransaction($MobileNumber, $SalespersonID) {
		$result = Array();
		$query = $this->db->query(
		'select * from Transaction, Customer where Transaction.`Customer_MobileNumber` = Customer.`MobileNumber` and Transaction.`Customer_MobileNumber` = ' . $MobileNumber . ' and Transaction.Salesperson_SalespersonID = ' .$SalespersonID);

		foreach ($query->result() as $row) {              
			$customer = Array();
			$customer['Name'] = $row->FName. ", ".$row->LName;
			$customer['MobileNumber'] = $row->MobileNumber;
			$customer['BorrowDate'] = $row->Borrow_Date;
			$customer['Movies'] = $this->getBorrowMovies($row->TransactionID);
			$customer['TID'] = $row->TransactionID;
			array_push($result, $customer);   
		}                                                 
		return $result; 
	}

	function gettopcustomer() {
		$result = Array();
		$query = $this->db->query(
			'select *, sum(payment.Amount) as TAmount from customer, payment where payment.`Customer_MobileNumber`=customer.MobileNumber group by payment.`Customer_MobileNumber`  order by TAmount desc');

		foreach ($query->result() as $row) {              
			$customer = Array();
			$customer['type'] = 1;
			$customer['1'] = $row->MobileNumber;
			$customer['2'] = $row->FName." ".$row->LName;
			$customer['3'] = "$ ".$row->TAmount . " USD";
			array_push($result, $customer);   
		}                                                 
		return $result; 
		
	}

	function getstorerevenue() {
		$result = Array();
		$query = $this->db->query(
			'select *, sum(payment.Amount) as TAmount from payment group by `Salesperson_SalespersonID` order by TAmount desc
			');

		foreach ($query->result() as $row) {              
			$customer = Array();
			$customer['type'] = 2;
			$customer['1'] = $this->getStoreID($row->Salesperson_SalespersonID)[0];
			$customer['2'] = $row->Salesperson_SalespersonID ;
			$customer['3'] = "$ ".$row->TAmount . " USD";
			array_push($result, $customer);   
		}                                                 
		return $result; 
		
	}

	function getactivesalesperson() {
		$result = Array();
		$query = $this->db->query('Select *, count(Payment.`Transaction_TransactionID`) as active from Payment, Salesperson where Payment.Salesperson_SalespersonID = Salesperson.SalespersonID group by Payment.`Salesperson_SalespersonID` order by active desc');
		foreach ($query->result() as $row) {              
			$customer = Array();
			$customer['type'] = 4;
			$customer['1'] = $row->Salesperson_SalespersonID;
			$customer['2'] = $row->FName." ".$row->LName;
			$customer['3'] = $row->active . " times";
			array_push($result, $customer);   
		}                                                 
		return $result; 
		
	}

	function getmostrented() {                                                                                           
		$result = Array();                                                                                                   
		$query = $this->db->query('                                                                                          
			SELECT Movie_has_Store_has_Transaction.Movie_has_Store_Movie_MovieID as MovieID, Movie.Duration, Movie.Title, Movie.PictureURL FROM Movie, Movie_has_Store_has_Transaction WHERE Movie.MovieID = Movie_has_Store_has_Transaction.Movie_has_Store_Movie_MovieID group by Movie_has_Store_has_Transaction.Movie_has_Store_Movie_MovieID order by count(*) desc               '                                                                                                                
		);                                                                                                               
		foreach ($query->result() as $row) {                                                                                 
			$movie =  Array();                                                                                               
			$movie['type'] = 3;
			$movie['3'] = $row->Duration;                                                                             
			$movie['1'] = $row->Title;                                                                                   
			$movie['2'] = implode('|' , $this->getGenre($row->MovieID));                                                 
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

	function getagingcustomer() {                                                                                           
		$result = Array();                                                                                                   
		$query = $this->db->query('                                                                                          
            select *, datediff(Transaction.Borrow_Date, now()) as timediff from Transaction, Customer where Transaction.`Customer_MobileNumber` = Customer.`MobileNumber` and Transaction.TransactionID NOT IN (select Transaction_TransactionID as TransactionID from Payment) order by timediff'
		);                                                                                                               
		foreach ($query->result() as $row) {                                                                                 
			$movie =  Array();                                                                                               
			$movie['type'] = 5;
			$movie['1'] = $row->MobileNumber;
			$movie['2'] = $row->FName." ".$row->LName;
			$movie['3'] = "Last ". abs($row->timediff) . " days";
			array_push($result, $movie);                                                                                     
		}                                                                                                                    
		return $result;                                                                                                      

	}                                                                                                                        


}
?>
