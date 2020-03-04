<?php
class Order extends CI_Controller {
	
	function __construct() {
		parent::__construct
		$this->load->library('form_validation');
		$this->load->model('orderm');
		$this->load->helper('form');
	}
	
function index() {
	$data['order']=$this->orderm->get_order()->result();
	$this->load->view('index.php/orderform');
}

function add()
{
	$data['pesan']='Ditambahkan';
	$data['judul']='Tambah Order';
	$data['close']=anchor('home','Close', array('class'=>'back'));
	$data['action']=site_url('order/add');
	$this->load->view('index.php/orderform',$data);
	
	$this->valid();
	
	if ($this->form_validation->run() == FALSE)
	{
		$data['order']['id']='';
		$data['order']['kode']='';
		$data['order']['tgl']='';
		$data['order']['pemesan']='';
		$data['order']['email']='';
		$data['order']['telp']='';
		$data['order']['company']='';
		$data['order']['divisi']='';
		$data['order']['ref_jeniswo']='';
		$data['order']['keluhan']='';
		$data['order']['ref_status']='';
		$this->load->view('index.php/orderform',$data);
	}
	else
	{
	$order = array(
	'kode' => $this->input->post('kode'),
	'tgl' => $this->load->post('tgl'),
	'pemesan' => $this->load->post('pemesan'),
	'email' => $this->load->post('email'),
	'telp' => $this->load->post('telp'),
	'company' => $this->load->post('company'),
	'divisi' => $this->load->post('divisi'),
	'ref_jeniswo' => $this->load->post('ref_jeniswo'),
	'keluhan' => $this->load->post('keluhan'),
	'ref_status' => $this->load->post('ref_status')
	);
	
	$id=$this->orderm->save($order);
	$this->validation->id=$id;
	redirect('home');
	}
}

function update($id)
{
	$data['action']=site_url('admin/order/update'.$id);
	
	$data['pesan']='Update Berhasil';
	$data['order']=$this->orderm->get_order($id)->row_array();	
}

function valid()
{
	$this->form_validation->set_rules('tgl','Tanggal','required');
	$this->form_validation->set_rules('pemesan','Pemesan','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('telp','Telepon','required');
	$this->form_validation->set_rules('company','Perusahaan','required');
	$this->form_validation->set_rules('divisi','Divisi','required');
	$this->form_validation->set_rules('ref_jeniswo','JenisWO','required');
	$this->form_validation->set_rules('keluhan','Keluhan','required');
	$this->form_validation->set_rules('ref_status','Status','required');
}

}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		