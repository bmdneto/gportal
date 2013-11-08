<?php
	class Principal extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			// lista portais
			// alterar: esta consulta devera listar somente portais criados pelo usuario corrente
			// 			where admin == usuario_corrente
			$data['query'] = $this->db->query('SELECT id_portal, nome, url, descricao FROM portais'); 	

			$this->load->view('header-view.php');
			$this->load->view('principal-view.php');
			$this->load->view('principal_page_view.php');
			$this->load->view('portais_page_view.php', $data);
			$this->load->view('idioma_page_view.php');
			$this->load->view('usuarios_page_view.php');
			$this->load->view('rodape_view.php');
		}

		public function testes()
		{
			$this->load->model('Idioma');
			$this->Idioma->get_results();
			foreach ($this->getNomes() as $nome)
			{
				echo $this->idioma->nome;
			}
			
			echo "Hello!";
		}

	} 
?>