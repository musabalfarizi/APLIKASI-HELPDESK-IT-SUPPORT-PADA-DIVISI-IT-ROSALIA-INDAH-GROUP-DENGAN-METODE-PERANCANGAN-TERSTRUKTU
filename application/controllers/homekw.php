<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
  {
function buku_tamu()
{
  if($this->_validate_data())
  {

$data['nama'] = $this->input->post('nama', true);
$data['email'] = $this->input->post('email', true);
$data['message'] = $this->input->post('message', true);
if($this->homemodel->add($data))
$data['tamu_status'] = 'Anda berhasil menulis di Buku Tamu';
else
$data['tamu_status'] = 'Anda gagal menulis di Buku Tamu';

 }

$paging_uri=3;
if($this->uri->segment($paging_uri))
$start = $this->uri->segment($paging_uri);
else
$start = 0;
$limit_per_page = 10;
$data['tbuku_tamu_list'] = $this->homemodel->get_data_tamu($limit_per_page,$start);
$config['base_url'] = site_url('home/buku_tamu');
$config['total_rows'] = $this->homemodel->table_record_count;
$config['per_page'] = $limit_per_page;
$config['uri_segment'] = $paging_uri;
$this->pagination->initialize($config);
$data['page_links'] = $this->pagination->create_links();
$this->load->model('homemodel');
  $data['jadwal'] = $this->homemodel->jadwal();
$data['info'] = $this->homemodel->info();
$data['kegiatan'] = $this->homemodel->kegiatan();
$data['get_data_tamu'] = $this->homemodel->get_data_tamu();
$this->template->set('title','Buku Tamu | Y.P.A.M');
$this->template->load('template','buku_tamu',$data);
 }
  function _validate_data()
  {
$this->form_validation->set_rules('tamu_nama','tamu_nama','required|min_length[4]|max_length[15]');
$this->form_validation->set_rules('tamu_email','tamu_email','required|valid_email|htmlspecialchars');
$this->form_validation->set_rules('tamu_komentar','tamu_omentar','required|htmlspecialchars');
  return($this->form_validation->run()==FALSE)?FALSE:TRUE;
 }
 }
 ?>