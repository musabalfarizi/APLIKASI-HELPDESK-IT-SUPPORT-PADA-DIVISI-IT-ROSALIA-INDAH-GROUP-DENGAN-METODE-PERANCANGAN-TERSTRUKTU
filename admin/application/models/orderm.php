<?php
class Orderm extends CI_Model {
private $p='id_order';
private $t='xorder';
	
	function __construct(){
	 parent::__construct();
}

	function save($order) 
	{
		$this->db->insert($this->t,$order);
		return $this->db->insert_id();
	}
	
	function get_order()
	{
		$query=$this->db->query('select xorder.*,mjeniswo.kode, mjeniswo.nama as jeniswo, mstatus.kode, mstatus.nama as statusnya from xorder inner join mstatus on mstatus.id_status=xorder.id_status left join mjeniswo on mjeniswo.id_jeniswo=xorder.id_jeniswo order  by xorder.tgl asc');
		return $query;
	}
	
	function get_order_id($id)
	{
		$query=$this->db->query("select xorder.*, mstatus.kode, mstatus.nama as statusnya, mjeniswo.kode, mjeniswo.nama as jeniswonya from xorder join mstatus on mstatus.id_status=xorder.id_status left join mjeniswo on mjeniswo.id_jeniswo=xorder.id_jeniswo where xorder.id_order='$id'");
		return $query;
	}
	
	function update($id,$order)
	{
		$this->db->where($this->p,$id);
		$this->db->update($this->t,$order);
	}
	
	
	function orders()
	{
	$this->db->where('read','0');
	$this->db->from('xorder');
	return $query=$this->db->get();
	}
	
	function asd($limit='4') {
	
	$query=$this->db->query("SELECT * FROM xorder where `read`='0' order by id_order desc");
	return $query;
	}
	
	
	function delete($id)
	{
		$this->db->where('id_order',$id);
		$this->db->delete('xorder');
	}
	
	function get_status()
	{
		$query=$this->db->query('select * from mstatus');
		return $query;
	}
	
	function get_jeniswo()
	{
		$query=$this->db->query('select * from mjeniswo');
		return $query;
	}
	
	function read($id)
	{
		$this->db->query("update xorder set `read` = '1' where id_order = '$id'");
		return true;
	}
	
}