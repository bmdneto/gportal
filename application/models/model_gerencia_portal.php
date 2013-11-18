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
		$this->nomePortal 	= $_POST['nomePortal'];
		$this->url			= 'sites/' . $_POST["nomePortal"];
		$this->admin		= '';
		$this->portal_pai	= '';
		$this->template		= '';
		$this->grupo_edita	= '';
		$this->menu			= '';
		$this->descPortal 	= $_POST['descPortal'];

		//consulta
		$sql = "INSERT INTO portais (nome, url, descricao) 
				VALUES (".$this->db->escape($this->nomePortal).", ".$this->db->escape($this->url).", ".$this->db->escape($this->descPortal).")";

		if (isset($_POST['botaoEnviar'])) 
		{
			//se o diretorio nao existir
			if(!is_dir($this->url))
			{
				$this->db->query($sql);
				mkdir($this->url, 0777);

				//lib pra criacao de arquivos
				$this->load->helper('file');
				$data =	'<html>
							<head><title>'.$this->nomePortal.'</title></head>
							<body>
								'.$this->descPortal.'
							</body>
						 </html>
						';
				//write_file('./' . $this->url . '/index.php', $data);
			}
			else 
			{
				echo "<script>
					alert(\"URL existente.\");
				</script>";
			}
		}
		return $this->url;
	}

	function removePortal($var, $url)
	{
		//se houver arquivos dentro, nao deleta
		rmdir($url);
		$this->db->where('id_portal', $var);
		$this->db->delete('portais');	
		
		/*
		echo "<script type='text/javascript'> 
		alert('Existem arquivos no diretorio!!'); 
		</script>"; 
		*/
	}

}

?>