<?php

	class Gerencia_paginas extends CI_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}

		public function index()
		{
			if(isset($_POST['botaoListaPaginas'])) {
				//echo $_POST['listaPaginas'];
				$this->load->helper('directory');
				$map = directory_map($_POST['listaPaginas'],1);

				foreach ($map as $i) {
					if (!is_dir($i))
						echo $i.' ';
				}
			}

			//$this->load->helper('url');
			//redirect('principal', 'refresh');
		}

		

	}

?>