<?php

class Kirim extends CI_Controller {

function __construct()
{
	parent::__construct();
	$this->load->model('contactm','',TRUE);
	$this->load->library('form_validation','email');
	$this->load->helper('form','url','date');
	error_reporting(0);
}

function index()
{	
		
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('pesan','pesan','required');
		

	if ($this->form_validation->run() == FALSE)
	{
		
		$kirim['xcontactus']['tanggal']='';
		$kirim['xcontactus']['nama']='';
		$kirim['xcontactus']['email']='';
		$kirim['xcontactus']['pesan']='';
	
	}else{
		$kirim=array (
	
		'nama'=>$this->input->post('nama'),
		'email'=>$this->input->post('email'),
		'pesan'=>$this->input->post('pesan'),
		'terbaca'=>$this->input->post('terbaca')?yes:no
		);
		
		$id=$this->contactm->save($kirim);
		$this->load->view('formsukses1',$kirim);

}	

}
		

}	