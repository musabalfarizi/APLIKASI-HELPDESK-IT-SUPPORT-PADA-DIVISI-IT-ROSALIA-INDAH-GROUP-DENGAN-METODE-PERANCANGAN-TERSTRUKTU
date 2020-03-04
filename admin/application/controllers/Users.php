<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller{
	
    public function __construct()
    {
        parent::__construct();
		$this->load->model('order_model');
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
    
    public function index() {    	
		$data['datas']=$this->tuser_model->get_user_all();
        
        $this->load->view('users/index',$data);
        $this->load->view('design/footer');
    }
	
	public function add() {
	
		$data['action']=site_url('users/add');
		$data['link_back']=anchor('users/',
		'Back to data User',array('class'=>'back'));
		$level=$this->tuser_model->get_tlevel_id();
		$data['level']=$level;
		
		$this->_set_rules();
		
		if ($this->form_validation->run()=== FALSE) {
		$data['tuser']['id_user']='';
		$data['tuser']['kode']='';
		$data['tuser']['nama']='';
		$data['tuser']['pass']='';
		$data['tuser']['namafull']='';
		$data['tuser']['alamat']='';
		$data['tuser']['phone']='';
		$data['tuser']['entity']='';
		$data['tuser']['host']='';
		$data['tuser']['lastin']='';
		$data['tuser']['lastout']='';
		$data['tuser']['aktif']='';
		$data['tuser']['id_level']='';
		$data['tuser']['ket']='';
		$data['tuser']['id_status']='';
		$data['link_back']=anchor('users/',
		'Kembali',array('class'=>'back'));
		
		$this->load->view('users/insert_view',$data);
		$this->load->view('design/footer');
		} else {
		$tuser=array
		(
		'nama'=>$this->input->post('nama'),
		'pass'=>md5($this->input->post('pass')),
		'alamat'=>$this->input->post('alamat'),
		'phone'=>$this->input->post('phone'),
		'aktif'=>$this->input->post('aktif')?yes:no,
		'id_level'=>$this->input->post('id_level'),
		'ket'=>$this->input->post('ket'));
		$id=$this->tuser_model->save($tuser);
		
		$this->validation->id=$id;
		
		redirect('users');
		}
		}
		
	public function _set_rules()
	{
	
	$this->form_validation->set_rules('nama','nama','required');
	$this->form_validation->set_rules('pass','pass','required');
	$this->form_validation->set_rules('alamat','alamat','required');
	$this->form_validation->set_rules('phone','phone','required');
	
	$this->form_validation->set_rules('id_level','id_level','required');
	$this->form_validation->set_rules('ket','keterangan');
	}
	
	public function update($id)
	{
	$this->load->library('form_validation');
	$this->_set_rules();
	$data['action']=('users/update/'.$id);
	$data['link_back']=anchor('users/',
		'Kembali',array('class'=>'back'));
	$level=$this->tuser_model->get_tlevel_id();
	$data['level']=$level;
	
	if ($this->form_validation->run()===FALSE) {
	
	$data['tuser']=$this->tuser_model->get_by_id($id)->row_array();
		
		
		$this->load->view('users/update_view',$data);
		$this->load->view('design/footer');
	}
	else
	{
	
	$data['tuser']=$this->tuser_model->get_by_id($id)->row_array();
	$id=$this->input->post('id_user');
	$tuser=array(
		'nama'=>$this->input->post('nama'),
		'pass'=>md5($this->input->post('pass')),
		'alamat'=>$this->input->post('alamat'),
		'phone'=>$this->input->post('phone'),
		'aktif'=>$this->input->post('aktif')?yes:no,
		'id_level'=>$this->input->post('id_level'),
		'ket'=>$this->input->post('ket'));
		$this->tuser_model->update($id,$tuser);
		
		$this->load->view('users/update_view',$data);
		$this->load->view('design/footer');
		redirect('users');
	}
	}
	
	public function view($id){
	$level=$this->tuser_model->get_tlevel_id();
	$data['level']=$level;
	
	$data['tuser']=$this->tuser_model->get_by_id($id)->row_array();
	
	$this->load->view('users/users_view',$data);
	$this->load->view('design/footer');
	}
	
	public function delete($id)
	{
	$this->tuser_model->delete($id);
	redirect('users');
	}
	
	
    public function blank_page() {        
        
        $this->load->view('users/blank_page');
        $this->load->view('design/footer');
    }
}

