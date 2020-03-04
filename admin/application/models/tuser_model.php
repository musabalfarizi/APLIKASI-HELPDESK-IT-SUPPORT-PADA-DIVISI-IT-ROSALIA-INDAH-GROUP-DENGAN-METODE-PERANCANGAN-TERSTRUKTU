<?php

class Tuser_model extends CI_Model 
{
private $primary_key='id_user';
private $table_name='tuser';

function __construct() {
parent::__construct();
}

function get_user_all()
{
	$query=$this->db->query("SELECT tuser.id_user, tuser.kode, tuser.nama, tuser.alamat, tuser.phone, tuser.ket, tuser.aktif, tlevel.nama as jenis_pengguna from tuser inner join tlevel on tlevel.id_level=tuser.id_level");
	return $query->result();
}


function get_tlevel_id()
{
	$q=$this->db->query("select * from tlevel");
	return $q->result();
}


function save($person) {
	$this->db->insert($this->table_name,$person);
	return $this->db->insert_id();
}

function get_by_id($id) {
	$this->db->where('id_user',$id);
	return $this->db->get('tuser');
}

function update($id,$person) {
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person);
}

function delete($id) {
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
}
?>