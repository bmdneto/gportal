<?php
	class Model_Paginas extends CI_Model{
		
		function __construct()
		{
		//call the Model constructor
		parent::__construct();
		}

		function consultaPaginas($id_portal)
		{
			$query = $this->db->query("SELECT * FROM paginas WHERE portal_pai = $id_portal");
			return $query;
		}
	}
?>