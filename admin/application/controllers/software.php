<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class software extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('software_model');
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
		$data['daftar'] = $this->software_model->get_user_all();
      
        $this->load->view('software/index',$data);
        $this->load->view('design/footer');
		
	}
	
	public function insert(){
	$data['link_back']= anchor('software',
	'Back to list',array('class'=>'back'));
	$data['action']= site_url('software/insert');
	
	//set common properties
	$this->rules();
	if ($this->form_validation->run()=== FALSE){
	$data['message']='';
	//set common properties
	$data['title']='Add new Data';
	$data['message']='';
	$data['msoftware']['id_software']='';
	$data['msoftware']['kode']='';
	$data['msoftware']['nama']='';
	$data['msoftware']['ket']='';
	$data['link_back']= anchor('software',
	'Lihat Daftar ',array('class'=>'back'));
	

    $this->load->view('software/insert',$data);
    $this->load->view('design/footer');
	} else {
	//save data
	
	$msoftware= array(
	
	'nama'=>$this->input->post('nama'),
	'ket'=>$this->input->post('ket'),
	);
	$id=$this->software_model->save($msoftware);
	
	//set form input nama="id"
	$this->validation->id =$id;
	
	redirect('software');
	}
	}

	function update($id){
	//set common properties
	$data['title']='Update Data';
	$this->load->library('form_validation');
	$data['link_back']= anchor('software',
	'Back to list',array('class'=>'back'));
	//set validation properties
	
	$this->rules();
	$data['action']=('software/update/'.$id);
	$data['software']=$this->software_model->get_by_id($id)->row_array();	
	// run validation
	if ($this->form_validation->run()=== FALSE){
	
	$data['message']='';
	
	//set common properties
	$data['title']='Update Data';
	$data['message']='';


        $this->load->view('software/update',$data);
        $this->load->view('design/footer');
	}else{
	//save data
	$id=$this->input->post('id_software');
	$sofware= array(
	
	'nama'=>$this->input->post('nama'),
	'ket'=>$this->input->post('ket'));
	
	$this->status_model->update($id,$software);
	
	redirect('software');
	
	}
	}
	
  function delete ($id){
        $this->software_model->delete($id);
         redirect ("software");    
         
    }

	
	function rules()
	{
	
	
	$this->form_validation->set_rules('nama','Nama','required');
	$this->form_validation->set_rules('ket','Ket');
	}
}
?>