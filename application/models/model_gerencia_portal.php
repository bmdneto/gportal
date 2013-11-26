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
		$this->admin		= $_POST['username'];
		$this->portal_pai	= '';
		$this->template		= 1;
		$this->grupo_edita	= '';
		$this->menu			= '';
		$this->descPortal 	= $_POST['descPortal'];

<<<<<<< HEAD

		// inserção
		$sql = "INSERT INTO portais_teste (nome, url, descricao, template, admin) 
				VALUES (".$this->db->escape($this->nomePortal).", 
						".$this->db->escape($this->url).", 
						".$this->db->escape($this->descPortal).",
						".$this->db->escape($this->template).",
						".$this->db->escape($this->admin).")";

=======
		//consulta
		$sql = "INSERT INTO portais (nome, url, descricao) 
				VALUES (".$this->db->escape($this->nomePortal).", ".$this->db->escape($this->url).", ".$this->db->escape($this->descPortal).")";
>>>>>>> cb825f24055c08233dda816f0ae7cdcff0520741

		if (isset($_POST['botaoEnviar'])) 
		{
			//se o diretorio nao existir
			if(!is_dir($this->url))
			{
				$this->db->query($sql);
				mkdir($this->url, 0777);

				//lib pra criacao de arquivos
				$this->load->helper('file');
<<<<<<< HEAD
				$data = 'Some file data';
				//write_file('./' . $this->url . '/index.php', $data);
=======
				$data =	'<html>
							<head><title>'.$this->nomePortal.'</title></head>
							<body>
								'.$this->descPortal.'
							</body>
						 </html>
						';
				//cria o arquivo index do portal
<<<<<<< HEAD
				//write_file('./' . $this->url . '/'. 'index.php', $data);
=======
				//write_file('./' . $this->url, $data);
>>>>>>> b341d55752a27286bbb601ba31eb6936879dc19f
>>>>>>> cb825f24055c08233dda816f0ae7cdcff0520741
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

		/*
		// função q deleta todos os arquivos do diretório
		function rrmdir($url) {
			if (is_dir($url)) {
				$objects = scandir($url);
				foreach ($objects as $object) {
					if ($object != "." && $object != "..") {
						if (filetype($url.'/'.$object) == 'dir')
							rrmdir($url.'/'.$object);
						else unlink($url.'/'.$object);
					}
				}
				reset($objects);
				rmdir($url);
			}
		}
		*/

		rmdir($url);
		$this->db->where('id_portal', $var);
		$this->db->delete('portais_teste');	
		
		/*	
		echo "<script type='text/javascript'> 
		alert('Existem arquivos no portal!'); 
		</script>"; 
		*/
	}

}

?>