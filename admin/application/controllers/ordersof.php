<?php if (!  defined ('BASEPATH')) exit('No direct script access allowed');
class Ordersof extends CI_Controller{

public function __construct()
{
	parent::__construct();
	error_reporting(0);
	$this->load->model('order_model');
	$this->load->model('orderm');
	$this->load->model('kontak');
	$this->load->library('form_validation');
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


public function index() 
	{
	$data['daftar'] = $this->order_model->get_user_all();
	$data['status']=$this->order_model->get_status_id();
	$this->load->view('ordersof/index',$data);
	$this->load->view('design/footer');
	
	}
	
	
function insert() 
	{
		
	$software=$this->order_model->get_software_id();
	$haha['software']=$software;
	$haha['status']=$this->order_model->get_status_id();
	$this->load->view('ordersof/insert',$haha);
	$data['link_back']=anchor ('ordersof','Back to list', array('class'=>'back'));
		
		$this->rules();
	if ($this->form_validation->run() == false) 
	{
		$data['xorderpro']['tanggal']='';
		$data['xorderpro']['pemesan']='';
		$data['xorderpro']['email']='';
		$data['xorderpro']['telp']='';
		$data['xorderpro']['company']='';
		$data['xorderpro']['id_software']='';
		$data['xorderpro']['request']='';
		$data['xorderpro']['ket']='';
		$data['xorderpro']['id_status']='';
		
	}else{
		
$xorderpro = array(
'pemesan'=> $this->input->post('pemesan'),
'email' => $this->input->post('email'),
'telp' => $this->input->post('telp'),
'company' => $this->input->post('company'),
'id_software' => $this->input->post('id_software'),
'request' => $this->input->post('request'),
'ket' => $this->input->post('ket'),
'id_status' => $this->input->post('id_status'),
'terbaca' => $this->input->post('terbaca')?yes:no
);
	

//dikirim ke model 
$id=$this->order_model->save($xorderpro);
//$data['message']='input Success';
//$this->load->view('partial/order2',$data);
redirect('dashboard');
	}
}

function update($id){
//set inputan

$data['title']='Update Data';
$this->load->library('form_validation');
$data['link_back']=anchor ('ordersof','Back to list', array('class'=>'back'));

//set data

$this->rules();
$data['action']=('ordersof/update/'.$id);


//validation

if($this->form_validation->run()=== FALSE){

$data['status']=$this->order_model->get_status_id();
$data['xorderpro']=$this->order_model->get_by_id($id)->row_array();

$data['title']='Update Data';
$data['message']='';
$software=$this->order_model->get_software_id();
$data['software']=$software;

$this->load->view('ordersof/update',$data);
$this->load->view('design/footer');

}else{
//save data
$data['xorderpro']=$this->order_model->get_by_id($id)->row_array();
$id=$this->input->post('id_orderpro');
$xorderpro= array(
		'pemesan'=>$this->input->post('pemesan'),
		'email'=>$this->input->post('email'),
		'telp'=>$this->input->post('telp'),
		'company'=>$this->input->post('company'),
		'id_software'=>$this->input->post('id_software'),
		'request'=>$this->input->post('request'),
		'ket'=>$this->input->post('ket'),
		'id_status' => $this->input->post('id_status'),
		'terbaca'=>$this->input->post('terbaca')?yes:no,
		
);

	$this->order_model->update($id,$xorderpro);
	
	
		redirect('ordersof');
	}
}

public function view($id) {
	$data['xorderpro']=$this->order_model->get_by_id($id)->row_array();
	$this->load->view('ordersof/order_view',$data);		
	$this->order_model->view($id);
	
	}
	
function delete($id)
{

		$this->order_model->delete($id);
		redirect('ordersof','refresh');
}
function post()
	{
		
		
	$data['link_back']=anchor('ordersof/','Kembali',array('class'=>'back'));
		
		$data['orderpro']=$this->order_model->get_user_all();
		
		$data['link_download'] = ($download_pdf == TRUE)?'':anchor(base_url().'index.php/ordersof/cetak/true', 'Download');
		
		$this->load->view('ordersof/print', $data);
	}	

public function cetak($download_pdf = '')
	{
		$data['orderpro']=$this->order_model->get_user_all();
		
		$ret = '';
		$pdf_filename = 'download_'.$id.'.pdf';
		$data['link_download'] = ($download_pdf == TRUE)?'':anchor(base_url().'index.php/ordersof/cetak/true', 'Download Pdf');
		
		
		$object = $this->load->view('ordersof/print', $data, true);
		$output = $object;
		
		if($download_pdf == true)
		 generate_pdf($output, $pdf_filename);
		
		
		
	}
	

//validasi
function rules()
{

	$this->form_validation->set_rules('pemesan','Pemesan','trim|required');
	$this->form_validation->set_rules('email','Email','trim|required');
	$this->form_validation->set_rules('telp','Telp','trim|required');
	$this->form_validation->set_rules('company','Company','trim|required');
	$this->form_validation->set_rules('id_software','id_Software','trim|required');
	$this->form_validation->set_rules('request','Request','trim|required');
	$this->form_validation->set_rules('ket','Ket','trim|required');
	$this->form_validation->set_rules('id_status','id_Status','trim|required');
	$this->form_validation->set_rules('terbaca','Terbaca','trim');
	}
	
	
/*validasi tanggal
function valid_date($str)
{

	if(preg_match('/^[0-9] {1,2} - [0-9] {1,2} - [0-9] {4}$/', $str))
	{
	
		$this->form_validation->set_message('valid_date','date format tidak valid. yyyy-mm-dd');
		return false;
		}
		else
		{
		return true;
		}
		}*/
		}
		
	?>