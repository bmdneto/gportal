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

		function addPagina(){
			
			$this->nomePagina 	= $_POST['tituloPagina'];
			$this->tipoPagina	= $_POST['tipoPagina'];
			$this->url 			= $_POST['portalPagina'];

			echo $this->url;

			// inserção
			$sql = "INSERT INTO paginas (nome, tipo_pagina) 
					VALUES (".$this->db->escape($this->nomePagina).", 
							".$this->db->escape($this->tipoPagina).")";


			if (isset($_POST['botaoAddPage'])) 
			{
				$this->db->query($sql);
				
				$this->load->helper('file');
				$data = 'Some file data';
				write_file('./'.$this->url.'/'.$this->nomePagina.'.php', $data);
			}
			
			echo 'Pagina criada com sucesso!';
			echo $_POST['botaoAddPage'];
		}
	}
?>