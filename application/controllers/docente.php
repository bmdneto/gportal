<?php
	class Docente extends CI_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->load->view('pagina_professor');
		}
	}
?>