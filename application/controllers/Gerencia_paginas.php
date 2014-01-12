<?php

	class Gerencia_paginas extends CI_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}

		public function index()
		{
			if(isset($_POST['botaoAddPage'])) {
				$this->load->helper('url');
				$this->load->model('model_paginas','',TRUE);
				$this->model_paginas->addPagina();
			}

			//$this->load->helper('url');
			//redirect('principal', 'refresh');
		}

		

	}

?>