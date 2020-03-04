<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of Dashboard
 *
 * @author Pudyasto
 */
class Dashboard extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
		$this->load->model('order_model');
		$this->load->model('kontak');
		$this->load->helper('text');
		$total_id=$this->kontak->hitung()->num_rows();
		$data['kontaks']=$this->kontak->asd()->result();
		$this->load->model('orderm');
		$total_order=$this->orderm->orders()->num_rows();
		$data1['orders']=$this->orderm->asd()->result();
		$total_order1=$this->order_model->hitung()->num_rows();
		$data2['xorderpro']=$this->order_model->asd()->result();
		$this->load->model('orderall');
		$allo['all']=$this->orderall->order_all()->result();
		$allo['hardware']=$this->orderall->order_hardware()->result();
		$allo['software']=$this->orderall->order_software()->result();
		
		if ($this->session->userdata('logged_in')) {
			$_session=$this->session->userdata('logged_in');
			$data['id_user']=$_session['id_user'];
			$data['nama']=$_session['nama'];
			$data['level']=$_session['level'];
			
		
		$this->load->view('design/header',$data + $allo + $data1 + $data2 +(array('t_id'=>$total_id)) + (array('t_osof'=>$total_order1)) + (array('t_order'=>$total_order)));
		
		}else{
			
			redirect();
			
		}
    }    
    
    public function index() { 
		
        $this->load->view('dashboard/admin');
        $this->load->view('design/footer');
    }
	public function logout() {
	$this->session->unset_userdata('logged_in');
	$this->session->sess_destroy();
	redirect('access');
	}
	
	public function orderhardware()
	{
		$stat['jeniswo']=$this->orderm->get_jeniswo()->result();
		$stat['status']=$this->orderm->get_status()->result();
		$this->load->view('order/orderform', $stat);
	}
	
}
