<?php

class Kontak extends CI_Model {

	function __construct() {
	parent::__construct();
	
	}
	
public function get_kontak() {
	$query=$this->db->query("SELECT * from xcontactus order by tanggal desc");
	return $query->result();
	
}

public function get_kontak_id($id) {
	$this->db->where('id_contact',$id);
	return $this->db->get('xcontactus');
	}
	
function update($id,$person) {
	$this->db->where('id_contact',$id);
	$this->db->update('xcontactus',$person);
}
	
public function delete($id) {
	$this->db->where('id_contact',$id);
	$this->db->delete('xcontactus');
	}
	
public function hitung() {
	$this->db->where('terbaca','0');
	$this->db->from('xcontactus');
	return $query=$this->db->get();
	
	}

	public function asd() {
	
	$query=$this->db->query("SELECT * from xcontactus where `terbaca`='0' order by id_contact desc");
	return $query;
	}	
	
	public function get_kontak_readed() {
	$query=$this->db->query("SELECT * from xcontactus where `terbaca`='0' order by id_contact desc");
	return $query;
	
}

	function view($id)
	{
		$this->db->query("update xcontactus set `terbaca` = '1' where id_contact = '$id'");
		return true;
	}
}