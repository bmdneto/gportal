<?php 

class Model_Gerencia_portal extends CI_Model
{	
	var $nomePortal;
	var $url;
	var $admin;
	var $portal_pai;
	var $template;
	var $grupo_edita;
	var $menu;
	var $descPortal;

	function __construct()
	{
		//call the Model constructor
		parent::__construct();
	}


	// funcao para salvar os dados no BD e criar a URL
	function inserirEntrada()
	{

		// se o diretório for default, acrescenta apenas o nome do portal, senão, concatena o novo diretorio
		if ($_POST['diretorioPortal'] == 'default') {
			$this->url	= 'sites/' . $_POST['nomePortal'] . '/';
		}
		else {
			$this->url = $_POST['diretorioPortal'] . $_POST['nomePortal'] . '/'; 
		}

		$this->nomePortal 	= $_POST['nomePortal'];
		$this->admin		= $_POST['username'];
		$this->portal_pai	= '';
		$this->template		= 1;
		$this->grupo_edita	= '';
		$this->menu			= '';
		$this->descPortal 	= $_POST['descPortal'];


		// inserção
		$sql = "INSERT INTO portais_teste (nome, url, descricao, template, admin) 
				VALUES (".$this->db->escape($this->nomePortal).", 
						".$this->db->escape($this->url).", 
						".$this->db->escape($this->descPortal).",
						".$this->db->escape($this->template).",
						".$this->db->escape($this->admin).")";


		if (isset($_POST['botaoEnviar'])) 
		{
			//se o diretorio nao existir
			if(!is_dir($this->url))
			{
				$this->db->query($sql);
				mkdir($this->url, 0777);

				/*
				//lib pra criacao de arquivos
				$this->load->helper('file');

				$data =	'<html>
							<head><title>'.$this->nomePortal.'</title></head>
							<body>
								'.$this->descPortal.'
							</body>
						 </html>
						';
				//cria o arquivo index do portal
				write_file('./' . $this->url . '/'. 'index.php', $data);
				*/
			}
			else 
			{
				echo "<script>
					alert(\"URL existente. $this->url \");
				</script>";
			}
		}

		$dadosPortal = array(
							'nomePortal'	=> $this->nomePortal,
							'adminPortal' 	=> $this->admin,
							'portal_pai' 	=> $this->portal_pai,
							'template'		=> $this->template,
							'grupo_edita'	=> $this->grupo_edita,
							'menu'			=> $this->menu,
							'descPortal'	=> $this->descPortal
					   );

		return $dadosPortal;
	}

	function removePortal($var, $url)
	{
		rmdir($url);
		$this->db->where('id_portal', $var);
		$this->db->delete('portais_teste');	
	}




	function editarPortal($var)	{

		echo $var;

		$query = $this->db->query('SELECT * FROM portais_teste WHERE id_portal = '.$var.' ');

		foreach ($query->result() as $row)
		{
			$dadosPortal = array(
				'nome' 		=> $row->nome,
				'url'		=> $row->url,
				'admin'		=> $row->admin,
				'template'	=> $row->template,
				'descPortal'=> $row->descricao
			);
		}
		
		return $dadosPortal;
	}
}

?>