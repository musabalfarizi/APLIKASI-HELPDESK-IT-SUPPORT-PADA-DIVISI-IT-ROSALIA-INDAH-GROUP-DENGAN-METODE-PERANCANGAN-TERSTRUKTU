<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->model('order_model');
		$this->load->model('orderm');
		$this->load->library('form_validation');
		$this->load->model('kontak');
		$this->load->helper(array('form','url','file','text','mediatutorialpdf'));
		$total_id=$this->kontak->hitung()->num_rows();
		$data['kontaks']=$this->kontak->asd()->result();
		$total_order=$this->orderm->orders()->num_rows();
		$data['orders']=$this->orderm->asd()->result();
		$total_order1=$this->order_model->hitung()->num_rows();
		$data['xorderpro']=$this->order_model->asd()->result();
		
	if ($this->session->userdata('logged_in')) {
			
			$_session=$this->session->userdata('logged_in');
			$data['id_user']=$_session['id_user'];
			$data['nama']=$_session['nama'];
			$data['level']=$_session['level'];
	
		
		$this->load->view('design/header',$data +(array('t_id'=>$total_id)) + (array('t_osof'=>$total_order1)) + (array('t_order'=>$total_order)));
		
		}else{
			
			redirect();
			
		}
    }    
	
	function index()
{
	$data['list']=$this->orderm->get_order()->result();
	
	$this->load->view('order/orderview',$data);
	$this->load->view('design/footer');
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
	$this->form_validation->set_rules('keluhan','keluhan','required');
	
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
	
	redirect('dashboard');
	}
}

	function update($id)
{
	$data['pesan']='Update Berhasil';
	$data['judul']='Tambah Order';
	$data['close']=anchor('order','Kembali', array('class'=>'back'));
	$data['action']=site_url('order/update/'.$id);
	
	$this->form_validation->set_rules('tanggal','Tanggal');
	$this->form_validation->set_rules('pemesan','Pemesan','trim|required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('telp','Telepon','required');
	$this->form_validation->set_rules('company','Company','required');
	$this->form_validation->set_rules('divisi','Divisi','required');
	$this->form_validation->set_rules('id_jeniswo','id_jeniswo','required');
	$this->form_validation->set_rules('keluhan','Keluhan','required');
	$this->form_validation->set_rules('id_status','id_status','required');
	
	if ($this->form_validation->run()==FALSE)
	{
		$data['order']=$this->orderm->get_order_id($id)->row();
		$data['stat']=$this->orderm->get_status()->result();
		$data['wo']=$this->orderm->get_jeniswo()->result();
		
		$this->load->view('order/orderedit', $data);
		$this->load->view('design/footer');
	}else{
		$id=$this->input->post('id_order');
		$order= array(
	'pemesan' => $this->input->post('pemesan'),
	'email' => $this->input->post('email'),
	'telp' => $this->input->post('telp'),
	'company' => $this->input->post('company'),
	'divisi' => $this->input->post('divisi'),
	'id_jeniswo' => $this->input->post('id_jeniswo'),
	'keluhan' => $this->input->post('keluhan'),
	'id_status' => $this->input->post('id_status')
	);
		$this->orderm->update($id,$order);
		$data['order']=$this->orderm->get_order_id($id)->row();
		
		$this->load->view('order/orderedit', $data);
		$this->load->view('design/footer');
		redirect ('order');
	}
}

	function read($id)
	{
		$data['orders']=$this->orderm->get_order_id($id)->row_array();
		$this->load->view('order/order_read', $data);
		$this->orderm->read($id);
	}
	
	
	function delete($id)
{
	$this->orderm->delete($id);
	redirect('order');
}
function post()
	{
		
		
	$data['link_back']=anchor('order/','Kembali',array('class'=>'back'));
		
		$data['order']=$this->orderm->get_order();
		
		$data['link_download'] = ($download_pdf == TRUE)?'':anchor(base_url().'index.php/order/cetak/true', 'Download Pdf');
		
		$this->load->view('order/print', $data);
	}	

public function cetak($download_pdf = '')
	{
		$data['order']=$this->orderm->get_order();
		
		$ret = '';
		$pdf_filename = 'download_'.$id.'.pdf';
		$data['link_download'] = ($download_pdf == TRUE)?'':anchor(base_url().'index.php/order/cetak/true', 'Download Pdf');
		
		
		$object = $this->load->view('order/print', $data, true);
		$output = $object;
		
		if($download_pdf == true)
		 generate_pdf($output, $pdf_filename);
		
		
		
	}
	
}