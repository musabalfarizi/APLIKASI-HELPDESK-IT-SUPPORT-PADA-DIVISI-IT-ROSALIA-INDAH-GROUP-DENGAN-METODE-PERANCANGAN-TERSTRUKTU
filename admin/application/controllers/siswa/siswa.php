<?php
class Siswa extends CI_Controller {

private $limit=10;

function __construct()
{
	parent::__construct();
	#load library dan helper yang dibutuhkan
	$this->load->library(array('table','form_validation'));
	$this->load->helper(array('form','url'));
	$this->load->model('siswa_model','',TRUE);
}

function index($offset=0,$order_column='id',$order_type='asc')
{
	if (empty($offset)) $offset=0;
	if (empty($order_column)) $order_column='id';
	if (empty($order_type)) $order_type='asc';
	//TODO: check for valid column
	
	//load data siswa
	$siswas=$this->siswa_model->get_paged_list($this->limit,$offset,$order_column,$order_type)->result();
	
	//generate pagination
	$this->load->library('pagination');
	$config['base_url']=site_url('siswa/index/');
	$config['total_rows']=$this->siswa_model->count_all();
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
	anchor('siswa/index/'.$offset.'/id/'.$new_order,'ID'),
	anchor('siswa/index/'.$offset.'/nama/'.$new_order,'Nama'),
	anchor('siswa/index/'.$offset.'/alamat/'.$new_order,'Alamat'),
	anchor('siswa/index/'.$offset.'/jenis_kelamin/'.$new_order,'Jenis kelamin'),
	anchor('siswa/index/'.$offset.'/tanggal_lahir/'.$new_order,'Tanggal Lahir'),
	'Actions'
	);
	$i=0+$offset;
	foreach ($siswas as $siswa) {
		$this->table->add_row(++$i,
		$siswa->id,
		$siswa->nama,
		$siswa->alamat,
		strtoupper($siswa->jenis_kelamin)=='M'?
		'Laki-Laki':'Perempuan',
		date('d-m-Y',strtotime(
		$siswa->tanggal_lahir)),
		anchor('siswa/view/'.$siswa->id,
		'view',array('class'=>'view')).' '.
		anchor('siswa/update/'.$siswa->id,
		'update',array('class'=>'update')).' '.
		anchor('siswa/delete/'.$siswa->id,
		'delete',array('class'=>'delete',
		'onclick'=>"return confirm(
		'Apakah Anda yakin ingin menghapus data siswa?')"))
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
	$this->load->view('siswaList',$data);
}
	
function add() {
	//set common properties
	$data['title']='Tambah Siswa baru';
	$data['action']=site_url('siswa/add');
	$data['link_back']=anchor('siswa/index/',
	'Back to list of siswas',array('class'=>'back'));
	
	$this->_set_rules();
	
	//run validation
	if ($this->form_validation->run()=== FALSE) {
		$data['message']='';
		//set common properties
		$data['title']='Add new siswa';
		$data['message']='';
		$data['siswa']['id']='';
		$data['siswa']['nama']='';
		$data['siswa']['alamat']='';
		$data['siswa']['jenis_kelamin']='';
		$data['siswa']['tanggal_lahir']='';
		$data['link_back']=anchor('siswa/index/',
		'Lihat Daftar Siswa',array('class'=>'back'));
		
		$this->load->view('siswaEdit',$data);
		}
		else
		{
		//save data
		$siswa=array('nama'=>$this->input->post('nama'),
		'alamat'=>$this->input->post('alamat'),
		'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
		'tanggal_lahir'=>date ('Y-m-d',
		strtotime($this->input->post('tanggal_lahir'))));
		$id=$this->siswa_model->save($siswa);
		
		//set form input nama="id"
		$this->validation->id=$id;
		
		redirect('siswa/index/add_success');
		}
}

function view($id) {
	//set common properties
	$data['title']='Siswa Details';
	$data['link_back']=anchor('siswa/index/',
	'Lihat  daftar siswa',array('class'=>'back'));
	
	//get siswa details
	$data['siswa']=$this->siswa_model->get_by_id($id)->row();
	
	//load view
	$this->load->view('siswaView',$data);
}
	
function update($id){
	//set common properties
	$data['title']='Update Siswa';
	$this->load->library('form_validation');
	//set validation properties
		$this->_set_rules();
		$data['action']=('siswa/update/'.$id);
		
		//run validation
		if($this->form_validation->run()=== FALSE) {
		
	$data['message']='';
	$data['siswa']=$this->siswa_model->get_by_id($id)->row_array();
	$_POST['jenis_kelamin']=
	strtoupper($data['siswa']['jenis_kelamin']);
	$data['siswa']['tanggal_lahir']= date('d-m-Y',
	strtotime($data['siswa']['tanggal_lahir']));
	
	//set common properties
	$data['title']='Update siswa';
	$data['message']='';
	
	}
	else
	{
	//save data
	$id=$this->input->post('id');
	$siswa= array('nama'=>$this->input->post('nama'),
	'alamat'=>$this->input->post('alamat'),
	'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
	'tanggal_lahir'=>date  ('Y-m-d',
	strtotime($this->input->post('tanggal_lahir'))));
	$this->siswa_model->update($id,$siswa);
	$data['siswa']=$this->siswa_model->get_by_id($id)->row_array();
	//set user message
	$data['message']='update siswa success';
	}
	$data['link_back']=anchor('siswa/index/',
	'Lihat daftar siswa',array('class'=>'back'));
	//load view
	$this->load->view('siswaEdit',$data);
}

function delete($id) {
	//delete siswa
	$this->siswa_model->delete($id);
	//redirect to siswa list page
	redirect('siswa/index/delete_success','refresh');
}	
//validation rules
function _set_rules() {
	$this->form_validation->set_rules('nama','Nama',
	'required|trim');
	$this->form_validation->set_rules('jenis_kelamin','Password',
	'required');
	$this->form_validation->set_rules('alamat','Alamat',
	'required|callback_valid_date');
	$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
}

//date validation callback
function valid_date($str)
{
	if( preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
	{$this->form_validation->set_message('valid_date',
	'date format is not valid');
	return false;
	}
	else
	{
	return true;
	}
}
}