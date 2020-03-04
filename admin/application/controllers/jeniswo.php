<?php
class Jeniswo extends CI_Controller {
function __construct()
{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('jeniswo_model');
		$this->load->model('tuser_model');
		$this->load->library('form_validation');
		$this->load->model('kontak');
		$this->load->helper('text');
		$total_id=$this->kontak->hitung()->num_rows();
		$data['kontaks']=$this->kontak->asd()->result();
		$this->load->model('orderm');
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
	$data['jeniswo']=$this->jeniswo_model->get_jeniswo()->result();
	
	$this->load->view('jeniswo/view_jeniswo',$data);
	$this->load->view('design/footer');
}

function add() {
		$data['action']=site_url('jeniswo/add');
		$data['link_back']=anchor('jeniswo',
		'Kembali',array('class'=>'back'));
		
		$this->_set_rules();
		
		if ($this->form_validation->run()=== FALSE) {
		
		
		
		$this->load->view('jeniswo/input_jeniswo',$data);
		$this->load->view('design/footer');
		
		} else {
		$jeniswo=array
		(
		
		'nama'=>$this->input->post('nama'),
		'ket'=>$this->input->post('ket'));
		$id=$this->jeniswo_model->save($jeniswo);
		
		$this->validation->id=$id;
		
		redirect('jeniswo');
		}
		}
		

public function update($id)
	{
	$this->load->library('form_validation');
	$this->_set_rules();
	$data['action']=('jeniswo/update/'.$id);
	$data['link_back']=anchor('jeniswo',
		'Kembali',array('class'=>'back'));
		
		$data['jeniswo']=$this->jeniswo_model->get_by_id($id)->row_array();
		
	
	if ($this->form_validation->run()===FALSE) {
	
	
		
		$this->load->view('jeniswo/update_jeniswo',$data);
		$this->load->view('design/footer');
	}
	else
	{
	
	
	$id=$this->input->post('id_jeniswo');
	$jeniswo=array(
		
		'nama'=>$this->input->post('nama'),
		'ket'=>$this->input->post('ket'));
		$this->jeniswo_model->update($id,$jeniswo);		
		
		$this->load->view('jeniswo/update_jeniswo',$data);
		$this->load->view('design/footer');
		redirect('jeniswo');
	}
	}

public function delete($id)
	{
	$this->jeniswo_model->delete($id);
	redirect('jeniswo');
	}	
		

public function _set_rules()
	{
	
	$this->form_validation->set_rules('nama','nama','required');
	$this->form_validation->set_rules('ket','ket');
	}




}

	
	