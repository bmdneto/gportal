<?php 
class Idioma extends CI_Model{
	
	private $nomes;
	private $classes;
	private $arquivos;

	function __construct(){
		parent::__construct();
		
	}

	function get_results(){
		$query = $this->db->query('SELECT nome, classe FROM idiomas');
		return $query; 	

	}
}