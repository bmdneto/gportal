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
			$this->load->model('model_gerencia_portal','',TRUE);
		
			if(isset($_POST['edit'])) {
				$this->model_gerencia_portal->editarPortal($_POST['edit']);

				if(isset($_POST['botaoEnviarEdicao'])) {
					echo 'tesssssste';
				}
			}
/*
			if(isset($_POST['botaoEnviar'])) {
				$this->model_gerencia_portal->editarPortal($_POST['edit']);	
			}
*/

		}

	}

?>