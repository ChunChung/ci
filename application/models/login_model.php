<?php
class Login_model extends CI_Model {                                    

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		//$dsn = 'mysql://chunchung:IS@&!)2014fall@140.113.235.191/chunchung_cs';


		$this->load->database();
	}

	function getPasswd($SalespersonID) {
    	$table = 'Login';
		#$query = $this->db->get_where($table, array('Salesperson_SalespersonID =' => $SalespersonID));
		#$query = $this->db->get($table);
		#
		$query = $this->db->query('SELECT * FROM `Login`, `Salesperson` WHERE `Salesperson_SalespersonID` =' . $SalespersonID);
		#print_r($query->result());

		//$link = mysqli_connect("dbhome.cs.nctu.edu.tw", "chunchung_cs", "IS@&!)2014fall") or die("Could not connect : " . mysql_error()); 
		
		//$result = mysqli_query($query) or die("Query failed : " . mysql_error()); 



		#echo $this->db->last_query(); die;
    	return $query->result_array();
	}

}
?>
