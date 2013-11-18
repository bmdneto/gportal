<?php

	class Gerencia_portal extends CI_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}

		public function index()
		{
			if(isset($_POST['botaoEnviar'])) {
				$this->load->helper('url');
				$this->load->model('Model_Gerencia_portal','',TRUE);
				$this->Model_Gerencia_portal->inserirEntrada();
			}
			$this->load->helper('url');
			redirect('principal', 'refresh');
		}

		public function Remove_portal()
		{
			$this->load->model('Model_Gerencia_portal','',TRUE);
			$this->Model_Gerencia_portal->removePortal($_POST['botaoRemover'],$_POST['Url']);
			
			$this->load->helper('url');
			redirect('principal', 'refresh');
		}

	}

?>