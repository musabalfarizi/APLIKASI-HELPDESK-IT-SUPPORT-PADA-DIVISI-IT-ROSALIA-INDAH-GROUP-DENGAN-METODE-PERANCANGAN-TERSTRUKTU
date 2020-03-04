<?php
class Orderm extends CI_Model {
	
	
	function __construct()
	{
		parent::__construct 
	}
	
	function get_order()
	{
		$query=$this->db->query('select * from xorder');
		return $query;
	}
	
	function save($person) 
	{
		$this->db->insert(xorder,$person);
		return $this->db->insert_id();
	}
	
	/*function get_status()
	{
		$query=$this->db->query('select * from ### ');
		return $query;
	}
	
	function get_jeniswo()
	{
		$query=$this->db->query('select * from ### ');
		return $query;
	}
	*/
}