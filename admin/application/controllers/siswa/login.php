<?php
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->helper(array('form','url'));
		$this->load->view('login_view');
		}
	}
?>