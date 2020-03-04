<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('orderm','',TRUE);
		$this->load->helper('form','url','date');
		error_reporting(0);
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('orderm');
		$this->load->view('home');
		//$this->orderm->get_status()->row();
		//$this->orderm->get_jeniswo()->row();
	}
	
	function add()
{
	$data['pesan']='Order anda berhasil dikirim';
	$data['judul']='Order';
	$data['action']=site_url('home/add');
	//$this->load->view('orderform');
	
		$this->form_validation->set_rules('pemesan','pemesan','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telp','telp','required');
		$this->form_validation->set_rules('company','company','required');
		$this->form_validation->set_rules('divisi','divisi','required');
		$this->form_validation->set_rules('id_jeniswo','id_jeniswo','required');
		$this->form_validation->set_rules('keluhan','keluhan','required');
		$this->form_validation->set_rules('id_status','id_status','required');
	if ($this->form_validation->run() == FALSE)
	{
		
		
		$data['order']['tgl']='';
		$data['order']['pemesan']='';
		$data['order']['email']='';
		$data['order']['telp']='';
		$data['order']['company']='';
		$data['order']['divisi']='';
		$data['order']['id_jeniswo']='';
		$data['order']['keluhan']='';
		$data['order']['id_status']='';
	
	}else{
	$order = array(

	
	'pemesan' => $this->input->post('pemesan'),
	'email' => $this->input->post('email'),
	'telp' => $this->input->post('telp'),
	'company' => $this->input->post('company'),
	'divisi' => $this->input->post('divisi'),
	'id_jeniswo' => $this->input->post('id_jeniswo'),
	'keluhan' => $this->input->post('keluhan'),
	'id_status' => $this->input->post('id_status'),
	'read' => $this->input->post('read')?yes:no
	);
	
	$id=$this->orderm->save($order);
	
	$this->load->view('formsukses',$data);
	}
}



function addsoft()
{
	$data['pesan']='Order software anda berhasil dikirim';
	
	
		$this->form_validation->set_rules('pemesan','pemesan','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telp','telp','required');
		$this->form_validation->set_rules('company','company','required');
		$this->form_validation->set_rules('id_software','software','required');
		$this->form_validation->set_rules('request','request','required');
		$this->form_validation->set_rules('ket','ket','required');
	
	

	
	
	
	if ($this->form_validation->run() == FALSE)
	{
	
		$data['orderpro']['tgl']='';
		$data['orderpro']['pemesan']='';
		$data['orderpro']['email']='';
		$data['orderpro']['telp']='';
		$data['orderpro']['company']='';
		$data['orderpro']['id_software']='';
		$data['orderpro']['request']='';
		$data['orderpro']['ket']='';
		$data['orderpro']['id_status']='';
	}else{
	$xorderpro = array(

	
	'pemesan' => $this->input->post('pemesan'),
	'email' => $this->input->post('email'),
	'telp' => $this->input->post('telp'),
	'company' => $this->input->post('company'),
	'id_software' => $this->input->post('id_software'),
	'request' => $this->input->post('request'),
	'ket' => $this->input->post('ket'),
	'id_status' => $this->input->post('id_status'),
	'terbaca' => $this->input->post('terbaca')?yes:no
	);
	
	$id=$this->orderm->savesoft($xorderpro);
	
	$this->load->view('formsukses',$data);
	}
}



}
