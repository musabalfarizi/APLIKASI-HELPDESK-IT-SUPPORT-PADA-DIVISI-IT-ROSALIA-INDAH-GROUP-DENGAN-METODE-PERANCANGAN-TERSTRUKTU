<?php
Class Regis extends CI_Model
{ 
function __construct()
{
	parent::__construct();
}
function add_user() 
	{
		$data=array(
		'username'=>$this->input->post('username'),
		'password'=>md5($this->input->post('password'))
		);
		$this->db->insert('user',$data);
		return true;
	}
}
?>