<?php
class Jeniswo_model extends CI_Model {
	private $primary="id_jeniswo";
	private $table="mjeniswo";
	
	
function __construct(){
	parent::__construct();
}

function save($wo)
{
	$this->db->insert($this->table,$wo);
	return $this->db->insert_id();
}

function get_jeniswo()
{
	$query=$this->db->query("select * from mjeniswo");
	return $query;
}

function get_by_id($id) {
	$this->db->where('id_jeniswo',$id);
	return $this->db->get('mjeniswo');
}

function update($id,$wo)
{
	$this->db->where($this->primary,$id);
	$this->db->update('mjeniswo',$wo);
}

function delete($id)
{
	$this->db->where($this->primary,$id);
	$this->db->delete('mjeniswo');
	}
	}
	