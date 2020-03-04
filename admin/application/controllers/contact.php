<?php

class Contact extends CI_Controller {

	function __construct() {
	parent::__construct();
	$this->load->model('order_model');
	$this->load->model('kontak');
	$this->load->library('form_validation');
	$this->load->helper('text');
	$total_id=$this->kontak->hitung()->num_rows();
	$data['kontaks']=$this->kontak->asd()->result();
	$this->load->model('orderm');
	$total_order=$this->orderm->orders()->num_rows();
	$data['orders']=$this->orderm->asd()->result();
	$total_order1=$this->order_model->hitung()->num_rows();
	$data['xorderpro']=$this->order_model->asd()->result();
	$this->load->view('design/footer');
	
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
	
	public function index() {
	$data['kontak']=$this->kontak->get_kontak();
	
	$this->load->view('contact/indexc',$data);
	$this->load->view('design/footer');
	}
	
	public function view($id) {

	$data['kontaks']=$this->kontak->get_kontak_id($id)->row_array();
	$this->load->view('contact/contact_view',$data);
	$this->kontak->view($id);
	}
	
	public function delete($id) {
	$this->kontak->delete($id);
	redirect('contact');
	}
	
	public function _set_rules()
	{
	$this->form_validation->set_rules('terbaca','terbaca');
	}
}