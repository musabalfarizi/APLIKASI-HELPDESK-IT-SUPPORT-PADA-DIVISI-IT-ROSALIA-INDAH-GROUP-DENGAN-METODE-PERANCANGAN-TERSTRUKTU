<?php
class Daftar extends CI_Controller {

function __construct()
{
	parent::__construct();
	$this->load->model('regis');
	}
	
function index()
	{
	$this->load->helper(array('form','url'));
	$this->load->view('registration_form');
	}
	
function add() 
	{
	$this->load->library('form_validation');
	$this->form_validation->set_rules('username','username','trim|required');
	$this->form_validation->set_rules('password','password','trim|required');
	if ($this->form_validation->run()===FALSE) {
	$this->load->view('registration_form');
	echo "registration failed";
	}
	else
	{
	$this->regis->add_user();
	redirect('login');
	
	}
	
}
}
?>