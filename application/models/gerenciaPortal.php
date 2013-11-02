<?php 

class gerenciaPortal extends CI_Model{
	
	$nomePortal = 	$_POST["nomePortal"];
	$descPortal = 	$_POST["descPortal"];
	// $usuario = 		$_POST[""];

	function __construct(){
		parent::__construct();
		$nomesPortal = array();
		$descPortal = array();
	}

	if (isset($_POST["botaoEnviar"]))
	{
		$sql = $this->db->query("INSERT INTO portais VALUES (".$nomePortal.","","","","","","",".$descPortal.")");
		echo $descPortal;
	}

}

?>