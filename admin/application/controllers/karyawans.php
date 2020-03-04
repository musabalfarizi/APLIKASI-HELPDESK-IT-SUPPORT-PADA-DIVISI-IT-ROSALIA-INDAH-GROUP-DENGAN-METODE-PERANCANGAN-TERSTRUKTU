<?php
class Karyawans extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('order_model');
$this->load->model('karyawans_model');
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

public function index()
{
	$data['daftar_karyawan']=$this->karyawans_model->get_karyawan_id();	
	
	$this->load->view('karyawans/indexk', $data);
	$this->load->view('design/footer');
}
	
public function add()
{
		$data['link_back']=anchor('karyawans/','Kembali',array('class'=>'back'));
		$data['action']=site_url('karyawans/add/');
		$agama=$this->karyawans_model->get_agama_id();
		$data['agama']=$agama;
		
		$this->_set_rules();
		// Validasi dijalankan
	if ($this->form_validation->run()=== FALSE) 
	{	
		$data['kary']['id_karyawan']='';
		$data['kary']['kode']='';
		$data['kary']['nik']='';
		$data['kary']['nama']='';
		$data['kary']['tempatlahir']='';
		$data['kary']['tgllahir']='';
		$data['kary']['kelamin']='';
		$data['kary']['id_agama']='';
		$data['kary']['phone']='';
		$data['kary']['tglmasuk']='';
		$data['kary']['alamat']='';
		$data['kary']['ket']='';
		
		$this->load->view('karyawans/karyawans_view', $data);
		$this->load->view('design/footer');
	}else{
		//simpan
	$kary = array(
	
	'nik' => $this->input->post('nik'),
	'nama' => $this->input->post('nama'),
	'tempatlahir' => $this->input->post('tempatlahir'),
	'tgllahir' => date('Y-m-d',strtotime($this->input->post('tgllahir'))),
	'kelamin' => $this->input->post('kelamin'),
	'id_agama' => $this->input->post('id_agama'),
	'phone' => $this->input->post('phone'),
	'tglmasuk' =>date('Y-m-d',strtotime($this->input->post('tglmasuk'))),
	'alamat' => $this->input->post('alamat'),
	'ket' => $this->input->post('ket'));
	
	//transfer ke model
	$id=$this->karyawans_model->save($kary);
	$this->validation->id=$id;
	redirect('karyawans');
	
	}	
}
	
public function update($id)
{
// set common properties
	$data['link_back']=anchor('karyawans/','Kembali',array('class'=>'back'));
	$this->load->library('form_validation');
	$this->_set_rules();
	$data['action']=site_url('karyawans/update/'.$id);
	$agama=$this->karyawans_model->get_agama_id($id);
	$data['agama']=$agama;
	// run validasi
	if ($this->form_validation->run()===FALSE)
	{
	$data['mkaryawan']=$this->karyawans_model->edit($id)->row_array();
	$_POST['kelamin']=
	strtoupper($data['mkaryawan']['kelamin']);
	$data['mkaryawan']['tgllahir']= date('d-m-Y',
	strtotime($data['mkaryawan']['tgllahir']));
	$data['mkaryawan']['tglmasuk']= date('d-m-Y',
	strtotime($data['mkaryawan']['tglmasuk']));
	
		
		$this->load->view('karyawans/karyawans_edit',$data);
		$this->load->view('design/footer');
	
	} else {
		$data['mkaryawan']=$this->karyawans_model->edit($id)->row_array();
		$id=$this->input->post('id_karyawan');
		$mkaryawan= array(
		
		'nik'=>$this->input->post('nik'),
		'nama'=>$this->input->post('nama'),
		'tempatlahir'=>$this->input->post('tempatlahir'),
		'tgllahir'=>date('Y-m-d',strtotime($this->input->post('tgllahir'))),
		'kelamin'=>$this->input->post('kelamin'),
		'id_agama'=>$this->input->post('id_agama'),
		'phone'=>$this->input->post('phone'),
		'tglmasuk'=>date('Y-m-d',strtotime($this->input->post('tglmasuk'))),
		'alamat'=>$this->input->post('alamat'),
		'ket'=>$this->input->post('ket')
		);
		
		$this->karyawans_model->update($id,$mkaryawan);
		
		
		$this->load->view('karyawans/karyawans_edit', $data);
        $this->load->view('design/footer');
		redirect('karyawans');

		}
}

public function delete($id)
{
	$this->karyawans_model->delete($id);
	redirect('karyawans');
}

function _set_rules()
{
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('tempatlahir','Tempat_lahir','trim|required');
		$this->form_validation->set_rules('tgllahir','Tanggal_lahir','required|callback_valid_date');
		$this->form_validation->set_rules('kelamin','Kelamin','trim|required');
		$this->form_validation->set_rules('id_agama','Agama','trim|required');
		$this->form_validation->set_rules('phone','CP','required|trim');
		$this->form_validation->set_rules('tglmasuk','Tanggal_masuk','required|callback_valid_date');
		$this->form_validation->set_rules('alamat','Alamat','trim|required');
		$this->form_validation->set_rules('ket','Keterangan');
}
}