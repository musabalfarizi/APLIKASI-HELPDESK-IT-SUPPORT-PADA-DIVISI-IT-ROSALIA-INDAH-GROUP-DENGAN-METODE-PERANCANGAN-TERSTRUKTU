<?php
class Orderm extends CI_Model {

	function __construct(){
	 parent::__construct();
}

	function save($order) 
	{
		$this->db->insert('xorder',$order);
		return $this->db->insert_id();
	}
	function savesoft($s)
	{
		$this->db->insert('xorderpro',$s);
		return $this->db->insert_id();
	}
	
	function get_status()
	{
		$query=$this->db->query("select * from mstatus");
		return $query;
	}
	
	function get_software_id()
	{
	$query=$this->db->query("SELECT * FROM msoftware order by id_software asc");
	return $query;
	}
	
	function delete($id)
	{
	$this->db->where('id_order',$id);
	$this->db->delete('xorder');
	}

	function get_jeniswo()
	{
		$query=$this->db->query('select * from mjeniswo');
		return $query;
	}
}