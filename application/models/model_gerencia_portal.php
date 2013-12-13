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
			$this->url	= 'sites/' . $_POST['nomePortal'];
			$this->portal_pai = 'sites/';
		}
		else {
			$this->url = $_POST['diretorioPortal'] .'/'. $_POST['nomePortal'];
			$this->portal_pai = $_POST['diretorioPortal'];
		}

		$this->nomePortal 	= $_POST['nomePortal'];
		$this->admin		= $_POST['username'];
		$this->template		= 1;
		$this->grupo_edita	= '';
		$this->menu			= '';
		$this->descPortal 	= $_POST['descPortal'];


		// inserção
		$sql = "INSERT INTO portais_teste (nome, url, descricao, portal_pai, template, admin) 
				VALUES (".$this->db->escape($this->nomePortal).", 
						".$this->db->escape($this->url).", 
						".$this->db->escape($this->descPortal).",
						".$this->db->escape($this->portal_pai).",
						".$this->db->escape($this->template).",
						".$this->db->escape($this->admin).")";


		if (isset($_POST['botaoEnviar'])) 
		{
			//se o diretorio nao existir
			if(!is_dir($this->url))
			{
				$this->db->query($sql);
				mkdir($this->url, 0777);
			}
			else {
				echo "<script>
					alert(\"URL existente. $this->url \");
				</script>";
			}

		}


		function copyr($source, $dest)
		{
		   // COPIA UM ARQUIVO
		   if (is_file($source)) {
		      return copy($source, $dest);
		   }
		 
		   // CRIA O DIRETÓRIO DE DESTINO
		   if (!is_dir($dest)) {
		      mkdir($dest);
		      //echo "DIRET&Oacute;RIO $dest CRIADO<br />";
		   }
		 
		   // FAZ LOOP DENTRO DA PASTA
		   $dir = dir($source);
		   while (false !== $entry = $dir->read()) {
		      // PULA "." e ".."
		      if ($entry == '.' || $entry == '..') {
		        continue;
		      }
		 
		      // COPIA TUDO DENTRO DOS DIRETÓRIOS
		      if ($dest !== "$source/$entry") {
		         copyr("$source/$entry", "$dest/$entry");
		         //echo "COPIANDO $entry de $source para $dest <br />";
		      }
		   }
		 
		   $dir->close();
		   return true;
		}

		if ($_POST['tipoPortal'] == 'professor') {
			$source = 'template/professor';	
		}
		
		elseif ($_POST['tipoPortal'] == 'projeto') {

		}

		$dest = $this->url;
		copyr($source, $dest);
		
	}


	function removePortal($var, $url)
	{
		// remove recursivamente
		function delTree($dir) { 
	   		$files = array_diff(scandir($dir), array('.','..')); 
			foreach ($files as $file) { 
				(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
			} 
	    	return rmdir($dir); 
	  	}
		
		$sql = $this->db->query('SELECT portal_pai FROM portais_teste');
		$flag = 0;

		foreach ($sql->result() as $row) {
			if ($row->portal_pai == $url) {
				$flag = 1;
			}
		}

		if ($flag == 1) {
			echo "<script>
					alert(\"Existe(m) portal(is) dentro do portal $url. \");
				  </script>";
		}
		else {
			delTree($url);
			$this->db->where('id_portal', $var);
			$this->db->delete('portais_teste');
		}
	}


	function editarPortal($var)	{

		echo $var;

		if ($_POST['editaDiretorioPortal'] == 'default') {
			//$this->url	= 'sites/' . $_POST['editaNomePortal'];
			//$this->portal_pai = 'sites/';
		}
		else {
			$this->url = $_POST['editaDiretorioPortal'] .'/'. $_POST['editaNomePortal'];
			$this->portal_pai = $_POST['editaDiretorioPortal'];
		}


		$this->nomePortal 	= $_POST['editaNomePortal'];

		$this->template		= 1;
		$this->grupo_edita	= '';
		$this->menu			= '';
		$this->descPortal 	= $_POST['editaDescPortal'];

		
		//url = ".$this->db->escape($this->url).",
		$sql = "UPDATE portais_teste SET nome = ".$this->db->escape($this->nomePortal).",
										 
										 portal_pai = ".$this->db->escape($this->portal_pai).",
										 descricao = ".$this->db->escape($this->descPortal)."
				WHERE id_portal = ".$var." ";


		$query = $this->db->query('SELECT url FROM portais_teste');
		//rename($query->url, $_POST['editaDiretorioPortal']);

		//echo $query->url();

		// alterar o nome do diretório pra nova url

		$this->db->query($sql);
	}
}

?>