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
		$query = $this->db->get_where($table, array('Salesperson_SalespersonID' => $SalespersionID));
		#$query = $this->db->get($table);
    	return $query->result_array();
	}

}
?>
