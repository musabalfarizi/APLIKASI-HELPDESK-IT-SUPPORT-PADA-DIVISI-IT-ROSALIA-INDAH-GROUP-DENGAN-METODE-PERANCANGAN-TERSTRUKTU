<?php
class Tuser extends CI_Controller {

private $limit=10;

function __construct()
{
	parent::__construct();
	#load library dan helper yang dibutuhkan
	$this->load->library(array('table','form_validation'));
	$this->load->helper(array('form','url'));
	$this->load->model('tuser_model','',TRUE);
}

function index($offset=0,$order_column='id',$order_type='asc')
{
	if (empty($offset)) $offset=0;
	if (empty($order_column)) $order_column='id';
	if (empty($order_type)) $order_type='asc';
	//TODO: check for valid column
	
	//load data siswa
	$tusers=$this->tuser_model->get_paged_list($this->limit,$offset,$order_column,$order_type)->result();
	
	//generate pagination
	$this->load->library('pagination');
	$config['base_url']=site_url('tuser/index/');
	$config['total_rows']=$this->tuser_model->count_all();
	$config['per_page']=$this->limit;
	$config['uri_segment']=3;
	$this->pagination->initialize($config);
	$data['pagination']=$this->pagination->create_links();
	
	//generate table data
	$this->load->library('table');
	$this->table->set_empty("&nbsp;");
	$new_order=($order_type=='asc'?'desc':'asc');
	$this->table->set_heading(
	'No',
	anchor('tuser/index/'.$offset.'/id/'.$new_order,'ID'),
	anchor('tuser/index/'.$offset.'/nama/'.$new_order,'Nama'),
	anchor('tuser/index/'.$offset.'/alamat/'.$new_order,'Alamat'),
	anchor('tuser/index/'.$offset.'/phone/'.$new_order,'Telephone'),
	'Actions'
	);
	$i=0+$offset;
	foreach ($tusers as $tuser) {
		$this->table->add_row(++$i,
		$tuser->id,
		$tuser->nama,
		$tuser->alamat,
		$tuser->phone,
		anchor('tuser/view/'.$tuser->id,
		'view',array('class'=>'view')).' '.
		anchor('tuser/update/'.$tuser->id,
		'update',array('class'=>'update')).' '.
		anchor('tuser/delete/'.$tuser->id,
		'delete',array('class'=>'delete',
		'onclick'=>"return confirm(
		'Apakah Anda yakin ingin menghapus data user?')"))
		);
	}
	$data['table']=$this->table->generate();
	
	if ($this->uri->segment(3)=='delete_success')
		$data['message']='Data berhasil dihapus';
	else if ($this->uri->segment(3)=='add_success')
		$data['message']='Data berhasil ditambah';
	else
		$data['message']='';
	//load view
	$this->load->view('design/header');
	$this->load->view('users/index',$data);
	$this->load->view('design/footer');
}
	
function add() {
	//set common properties
	$data['title']='Tambah user baru';
	$data['action']=site_url('tuser/add');
	$data['link_back']=anchor('tuser/index/',
	'Back to list of user',array('class'=>'back'));
	
	$this->_set_rules();
	
	//run validation
	if ($this->form_validation->run()=== FALSE) {
		$data['message']='';
		//set common properties
		$data['title']='Add new user';
		$data['message']='';
		$data['tuser']['id']='';
		$data['tuser']['nama']='';
		$data['tuser']['alamat']='';
		$data['tuser']['phone']='';
		$data['link_back']=anchor('tuser/index/',
		'Lihat Daftar user',array('class'=>'back'));
		
		$this->load->view('',$data);
		}
		else
		{
		//save data
		$tuser=array('nama'=>$this->input->post('nama'),
		'alamat'=>$this->input->post('alamat'),
		'phone'=>$this->input->post('phone'),
		);
		$id=$this->tuser_model->save($tuser);
		
		//set form input nama="id"
		$this->validation->id=$id;
		
		redirect('tuser/index/add_success');
		}
}

function view($id) {
	//set common properties
	$data['title']='user Details';
	$data['link_back']=anchor('tuser/index/',
	'Lihat  daftar user',array('class'=>'back'));
	
	//get siswa details
	$data['tuser']=$this->tuser_model->get_by_id($id)->row();
	
	//load view
	$this->load->view('',$data);
}
	
function update($id){
	//set common properties
	$data['title']='Update user';
	$this->load->library('form_validation');
	//set validation properties
		$this->_set_rules();
		$data['action']=('tuser/update/'.$id);
		
		//run validation
		if($this->form_validation->run()=== FALSE) {
		
	$data['message']='';
	$data['tuser']=$this->tuser_model->get_by_id($id)->row_array();
	$_POST['phone'];
	
	
	//set common properties
	$data['title']='Update user';
	$data['message']='';
	
	}
	else
	{
	//save data
	$id=$this->input->post('id');
	$tuser= array('nama'=>$this->input->post('nama'),
	'alamat'=>$this->input->post('alamat'),
	'phone'=>$this->input->post('phone'));
	$this->tuser->update($id,$tuser);
	$data['tuser']=$this->tuser_model->get_by_id($id)->row_array();
	//set user message
	$data['message']='update user success';
	}
	$data['link_back']=anchor('tuser/index/',
	'Lihat daftar user',array('class'=>'back'));
	//load view
	$this->load->view('',$data);
}

function delete($id) {
	//delete siswa
	$this->tuser_model->delete($id);
	//redirect to siswa list page
	redirect('tuser/index/delete_success','refresh');
}	
//validation rules
function _set_rules() {
	$this->form_validation->set_rules('nama','Nama',
	'required|trim');
	$this->form_validation->set_rules('phone','Password',
	'required');
	$this->form_validation->set_rules('alamat','Alamat',
	'required');
}


}