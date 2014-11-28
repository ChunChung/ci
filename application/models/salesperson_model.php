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

}
?>
