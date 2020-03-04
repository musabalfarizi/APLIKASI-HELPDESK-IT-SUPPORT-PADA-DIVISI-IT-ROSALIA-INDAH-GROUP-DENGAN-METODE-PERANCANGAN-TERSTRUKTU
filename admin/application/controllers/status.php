<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class status extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('status_model');
        $this->load->library('form_validation');
		$this->load->model('kontak');
		$this->load->model('order_model');
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
		$data['daftar'] = $this->status_model->get_user_all();
      
        $this->load->view('status/index',$data);
        $this->load->view('design/footer');
		
	}
	
	public function insert(){
	$data['link_back']= anchor('admin/musab',
	'Back to list',array('class'=>'back'));
	$data['action']= site_url('status/insert');
	
	//set common properties
	$this->rules();
	if ($this->form_validation->run()=== FALSE){
	$data['message']='';
	//set common properties
	$data['title']='Add new Data';
	$data['message']='';
	$data['mstatus']['id_status']='';
	$data['mstatus']['kode']='';
	$data['mstatus']['nama']='';
	$data['mstatus']['ket']='';
	$data['link_back']= anchor('status',
	'Lihat Daftar ',array('class'=>'back'));
	

    $this->load->view('status/insert',$data);
    $this->load->view('design/footer');
	} else {
	//save data
	
	$mstatus= array(
	
	'nama'=>$this->input->post('nama'),
	'ket'=>$this->input->post('ket'),
	);
	$id=$this->status_model->save($mstatus);
	
	//set form input nama="id"
	$this->validation->id =$id;
	
	redirect('status');
	}
	}

	function update($id){
	//set common properties
	$data['title']='Update Data';
	$this->load->library('form_validation');
	$data['link_back']= anchor('status',
	'Back to list',array('class'=>'back'));
	//set validation properties
	
	$this->rules();
	$data['action']=('status/update/'.$id);
	$data['mstatus']=$this->status_model->get_by_id($id)->row_array();	
	// run validation
	if ($this->form_validation->run()=== FALSE){
	
	$data['message']='';
	
	//set common properties
	$data['title']='Update Data';
	$data['message']='';


        $this->load->view('status/update',$data);
        $this->load->view('design/footer');
	}else{
	//save data
	$id=$this->input->post('id_status');
	$mstatus= array(
	
	'nama'=>$this->input->post('nama'),
	'ket'=>$this->input->post('ket'));
	
	$this->status_model->update($id,$mstatus);
	
	redirect('status');
	//set user message
	$data['message']='Update Success';
	}
	}
	
  function delete ($id){
        $this->status_model->delete($id);
         redirect ("status");    
         
    }

	
	function rules()
	{
	
	
	$this->form_validation->set_rules('nama','Nama','required');
	$this->form_validation->set_rules('ket','Ket');
	}
}
?>