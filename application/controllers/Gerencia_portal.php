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
			//redirect('principal', 'refresh');
		}

		public function Remove_portal()
		{
			//echo $_POST['botaoRemover'] . $_POST['Url'];
			$this->load->model('Model_Gerencia_portal','',TRUE);
			$this->Model_Gerencia_portal->removePortal($_POST['botaoRemover'],$_POST['Url']);
			
			$this->load->helper('url');
			redirect('principal', 'refresh');
		}

		public function Edita_portal()
		{
			
			if (isset($_POST['botaoEnviarEdicao'])) {

				$this->load->model('model_gerencia_portal','',TRUE);
				$this->model_gerencia_portal->editarPortal($_POST['editaPortal']);

			}
			$this->load->helper('url');
			//redirect('principal', 'refresh');
		}

	}

?>