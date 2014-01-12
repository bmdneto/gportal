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

			//echo $this->url;

			$this->db->select('id_portal');
			$this->db->where('url', $this->url );
			$sql = $this->db->get('portais_teste');
			
			foreach ($sql->result() as $i) {
				//echo $i->id_portal;
				$data = array(
				   'portal_pai' => $i->id_portal,
				   'nome'		=> $this->nomePagina,
				   'tipo_pagina'=> $this->tipoPagina
				);
				$this->db->insert('paginas', $data); 
				// Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
			}

			/* inserção
			$sql2 = "INSERT INTO paginas (nome, tipo_pagina) 
					VALUES (".$this->db->escape($this->nomePagina).", 
							".$this->db->escape($this->tipoPagina).")";
			*/

			if (isset($_POST['botaoAddPage'])) 
			{
				//$this->db->query($sql2);
				$this->load->helper('file');

				if ($this->tipoPagina == 'news') {
					$data = 'PAGINA NEWS';
					write_file('./'.$this->url.'/'.$this->nomePagina.'.php', $data);
				}
				if ($this->tipoPagina == 'galeria') {
					$data = 'PAGINA GALERIA';
					write_file('./'.$this->url.'/'.$this->nomePagina.'.php', $data);
				}
				if ($this->tipoPagina == 'upload') {
					$data = 'PAGINA UPLOAD';
					write_file('./'.$this->url.'/'.$this->nomePagina.'.php', $data);
				}
			}
			
			echo 'Pagina criada com sucesso!';
			echo $_POST['botaoAddPage'];

		}
	}
?>