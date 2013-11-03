<?php

	class Gerencia_portal extends CI_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}

		
		public function index()
		{
			$this->load->helper('url');
			$this->load->model('Model_Gerencia_portal','',TRUE);
			$this->Model_Gerencia_portal->inserirEntrada();
			//$this->Model_Gerencia_portal->recuperaPortais();

			$data['query'] = $this->Model_Gerencia_portal->recuperaPortais();
			$this->load->view('portais_page_view.php', $data);
		}
	}

?>