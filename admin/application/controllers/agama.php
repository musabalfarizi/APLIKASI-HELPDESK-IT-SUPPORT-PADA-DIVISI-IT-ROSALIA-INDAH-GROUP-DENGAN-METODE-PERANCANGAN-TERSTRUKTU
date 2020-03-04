<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agama extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('order_model');
		$this->load->model('magama_model');
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
    
    public function index() {    	
		$data['agama']=$this->magama_model->get_user_all();
        $this->load->view('agama/indexa',$data);
        $this->load->view('design/footer');
    }
	
	public function add() {
	
		$data['action']=site_url('agama/add');
		$data['link_back']=anchor('agama/',
		'Back to data Agama',array('class'=>'back'));
		
		
		$this->_set_rules();
		
		if ($this->form_validation->run()=== FALSE) {
		$data['agama']['id_agama']='';
		$data['agama']['kode']='';
		$data['agama']['nama']='';
		$data['agama']['ket']='';
		$data['link_back']=anchor('agama/',
		'Kembali',array('class'=>'back'));
		
		$this->load->view('agama/agama_view',$data);
		$this->load->view('design/footer');
		} else {
		$agama=array
		(
		
		'nama'=>$this->input->post('nama'),
		'ket'=>$this->input->post('ket'));
		$id=$this->magama_model->save($agama);
		
		$this->validation->id=$id;
		
		redirect('agama');
		}
		}
		
	public function _set_rules()
	{
	
	$this->form_validation->set_rules('nama','nama','required');
	$this->form_validation->set_rules('ket','ket');
	}
	
	public function update($id)
	{
	$this->load->library('form_validation');
	$this->_set_rules();
	$data['action']=('agama/update/'.$id);
	$data['link_back']=anchor('agama/',
		'Kembali',array('class'=>'back'));
	
	if ($this->form_validation->run()===FALSE) {
	
	$data['agama']=$this->magama_model->get_by_id($id)->row_array();
		$this->load->view('agama/update_agama',$data);
		$this->load->view('design/footer');
	}
	else
	{
	$data['agama']=$this->magama_model->get_by_id($id)->row_array();
	$id=$this->input->post('id_agama');
	$agama=array(
		
		'nama'=>$this->input->post('nama'),
		'ket'=>$this->input->post('ket'));
		$this->magama_model->update($id,$agama);
		
		
		
		
		$this->load->view('agama/update_agama',$data);
		$this->load->view('design/footer');
		redirect('agama');
	}
	}
	
	public function delete($id)
	{
	$this->magama_model->delete($id);
	redirect('agama');
	}
	
}

