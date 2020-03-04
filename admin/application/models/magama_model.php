<?php

class Magama_model extends CI_Model 
{
private $primary_key='id_agama';
private $table_name='magama';

function __construct() {
parent::__construct();
}

function get_user_all()
{
	$query=$this->db->query("SELECT * from magama ORDER BY id_agama desc");
	return $query->result();
}

function save($person) {
	$this->db->insert($this->table_name,$person);
	return $this->db->insert_id();
}

function get_by_id($id) {
	$this->db->where('id_agama',$id);
	return $this->db->get('magama');
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