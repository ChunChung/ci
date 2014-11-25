<?php
class Login_model extends CI_Model {                                    

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	function getPasswd($SalespersonID) {
    	$table = 'Login';
		//$query = $this->db->get_where($table, array('Salesperson_SalespersonID =' => $SalespersonID));
		#$query = $this->db->get($table);
		#
		$query = $this->db->query('SELECT * FROM `Login` WHERE `Salesperson_SalespersonID` = 1');
		print_r($query->result());

		echo $this->db->last_query(); die;
    	return $query->result_array();
	}

}
?>
