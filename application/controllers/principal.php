<?php
	class Principal extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->load->view('header-view.php');
			$this->load->view('principal-view.php');
			$this->load->view('principal_page_view.php');
			$this->load->view('portais_page_view.php');
			$this->load->view('idioma_page_view.php');
			$this->load->view('usuarios_page_view.php');
			$this->load->view('rodape_view.php');
		}
		
	} 
?>