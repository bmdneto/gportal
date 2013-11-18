<?php if ( ! defined('BASEPATH')) exit('Scripts diretos não autorizados');

class Login extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->helper('form');
    $this->load->view('header-view');
    $this->load->view('login_view');
  }
}

?>