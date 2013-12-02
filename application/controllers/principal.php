<?php if ( ! defined('BASEPATH')) exit('Acesso direto não autorizado');
	session_start(); 
	class Principal extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		private function loadLanguage($lang)
		{
			if($lang == "english")$this->lang->load('system', 'english');
			else $this->lang->load('system', 'portugues');
		}

		public function index()
		{
			if($this->session->userdata('logged_in'))
		    {	
		      	$this->load->model('Idioma');
				$query = $this->Idioma->get_results();
				if(isset($language))
				{
					$language = $_POST['optionsRadios'];
					loadLanguage($language);
				} 
		      	
		      	$session_data = $this->session->userdata('logged_in');
		      	$data = array(
					'rows' => $query->result(),
					'title' => $this->lang->line('title'),
					'username' => $session_data['username'],
					'query' => $this->db->query('SELECT id_portal, nome, url, descricao, admin 
												 FROM portais_teste')
				);

				$this->load->view('header-view.php', $data);
				$this->load->view('principal-view.php');
				$this->load->view('principal_page_view.php');
				$this->load->view('portais_page_view.php', $data);
				$this->load->view('idioma_page_view.php', $data);
				$this->load->view('usuarios_page_view.php');
				$this->load->view('rodape_view.php');
		    }
		    else
		    {
		      //If no session, redirect to login page
		      redirect('login', 'refresh');
			}
		}
		
		function logout()
		{
		   $this->session->unset_userdata('logged_in');
		   session_destroy();
		   redirect('login', 'refresh');
		}		
	} 
?>