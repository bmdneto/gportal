<?php

	class gerenciaPortal extends CI_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}

		
		public function index()
		{
			$this->load->helper('url');
			$caminho = 'sites/' . $_POST["nomePortal"];

			//$this->load->model('gerenciaPortal');


			mkdir($caminho, 0744);

			//echo base_url();
		}
	}

?>