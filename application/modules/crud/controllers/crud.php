<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class crud  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crudmodel');
    }

    public function index()
    { 
    $nama = $this->input->get('nama');
    $usergroup = $this->input->get('usergroup');
    $per_page = abs($this->input->get('per_page'));
    $limit = 5;
    $tot = $this->crudmodel->all($nama,$usergroup);
    $data['user']   = $this->crudmodel->limit($nama,$usergroup, $limit, $per_page);
    $data['usergroup']   = $this->crudmodel->usergroup();
    
    $pagination['page_query_string'] = TRUE;    
    $pagination['base_url'] 	= site_url().'crud';
    $pagination['total_rows'] 	= $tot->num_rows();
    $pagination['per_page'] 	= $limit;
    $pagination['uri_segment']  = $per_page;
    $pagination['num_links'] 	= 2;
	
        
    $pagination['full_tag_open'] = '<ul class="pagination">';
    $pagination['full_tag_close'] = '</ul>';

    $pagination['first_link'] = '<<';
    $pagination['first_tag_open'] = '<li class="prev page">';
    $pagination['first_tag_close'] = '</li>';

    $pagination['last_link'] = '>>';
    $pagination['last_tag_open'] = '<li class="next page">';
    $pagination['last_tag_close'] = '</li>';

    $pagination['next_link'] = '>';
    $pagination['next_tag_open'] = '<li class="next page">';
    $pagination['next_tag_close'] = '</li>';

    $pagination['prev_link'] = '<';
    $pagination['prev_tag_open'] = '<li class="prev page">';
    $pagination['prev_tag_close'] = '</li>';

    $pagination['cur_tag_open'] = '<li class="active"><a href="">';
    $pagination['cur_tag_close'] = '</a></li>';

    $pagination['num_tag_open'] = '<li class="page">';
    $pagination['num_tag_close'] = '</li>';
        
    $this->pagination->initialize($pagination);    
    $data['isi'] = 'crud/basic/list';
    $this->load->view('tpldefault',$data); 
    }
    
    public function add()
    {
    $this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required');
    $this->form_validation->set_rules('usergroup', 'User Group', 'trim|required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
    $data['usergroup'] = $this->crudmodel->usergroup();
    $data['isi'] = 'crud/basic/add';
    $this->load->view('tpldefault',$data);
    }else{
    $data = array(
    'nama_user' =>$this->input->post('nama_user'),
    'id_usergroup' =>$this->input->post('usergroup')    
    );
    $this->crudmodel->add($data);
    redirect('crud');
    }     
    }
    
    public function update()
    {
    $id = $this->uri->segment(3);
    $user = $this->crudmodel->userbyid($id)->row();
    if ($id==$user->id_user && $id!="") {
        
    $this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required');
    $this->form_validation->set_rules('usergroup', 'User Group', 'trim|required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
    $data['usergroup'] = $this->crudmodel->usergroup();
    $data['user'] = $this->crudmodel->userbyid($id);
        
    $data['isi'] = 'crud/basic/update';
    $this->load->view('tpldefault',$data);
    }else{
    $data = array(
    'nama_user' =>$this->input->post('nama_user'),
    'id_usergroup' =>$this->input->post('usergroup')    
    );
    $this->crudmodel->update($id,$data);
    redirect('crud');
    }     
    }else{
    redirect('crud');
    }
    }
    
    public function delete(){
    $id = $this->uri->segment(3);
    $biodata = $this->crudmodel->userbyid($id)->row();
    if($id==$biodata->id_user && $id!=""){
    $this->crudmodel->delete($id);    
    redirect('crud');
    }}
}