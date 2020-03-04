<?php

class Contactm extends CI_Model {

	function __construct() {
	parent::__construct();
	}
	
	function save($id)
	{
	$this->db->insert('xcontactus',$id);
	return $this->db->insert_id();
	}
}