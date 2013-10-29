<?php 
class Idioma extends CI_Model{
	
	private $nomes;
	private $classes;
	private $arquivos;

	function __construct(){
		parent::__construct();
		$nomes = array();
		$classes = array();
		$arquivos = array();
	}

	function get_results(){
		$index = 0;
		$query = $this->db->query('SELECT nome, classe, arquivo FROM Idiomas');

		foreach ($query->result() as $row)
		{
		    
		    $this->$nomes[$index] = $row->nome;
		    $this->$classes[$index] = $row->classe;
		    $this->$arquivos[$index] = $row->arquivo;
		    $index++;
		}
		return $index;

	}
	public function getNomes()
	{
		return ($nomes);
	}
	public function getClasses()
	{
		return ($classes);
	}
	public function getArquivos()
	{
		return ($arquivos);
	}
}