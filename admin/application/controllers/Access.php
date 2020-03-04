<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('user');
        $this->load->helper('form');
        $this->load->library('form_validation','session');
    }  
    
    public function index()
    {
         $this->load->view('access/login');
    }
    
    public function validate() {
        $this->form_validation->set_rules('nama', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'password', 'trim|required|xss_clean|callback_check_database');
		
        if ($this->form_validation->run() == FALSE)
        {
	   $this->load->view('access/login');
        }else{
			redirect('dashboard', $data);
		}
	  
        
    }
    
   public function check_database($password)
    {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('nama');

 
    //query the database
    $result = $this->user->login($username, $password);
 
    if($result)
    {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id_user' => $row->id_user,
         'nama' => $row->nama,
		 'level' => $row->level,
		 'aktif' => $row->aktif
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
    }
    else
    {
    $this->form_validation->set_message('check_database', 'Invalid username or password or contact your administrator');
    return false;
    }
	
    }
}
