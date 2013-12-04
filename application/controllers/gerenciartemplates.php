<?php 
	class GerenciarTemplates extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->load->view('templates/template-header-view.php');
			$this->load->view('templates/template-topo-view.php');
			$this->load->view('templates/template-menu-view.php');
			$this->load->view('templates/template-conteudo-view.php');
			$this->load->view('templates/template-rodape-view.php');
		}
	}
?>