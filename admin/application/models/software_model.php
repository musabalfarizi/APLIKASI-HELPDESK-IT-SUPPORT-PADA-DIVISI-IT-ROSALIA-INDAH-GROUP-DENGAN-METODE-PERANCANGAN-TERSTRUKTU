<?php
class software_model extends CI_Model{

private $primary_key='id_software';
private $table_name='msoftware';

function __construct(){
parent::__construct();
}
	function get_user_all()
	{
	$query=$this->db->query("SELECT * FROM msoftware ORDER BY kode desc");
	return $query->result();
	}
	
	function save($person)
	{
	$this->db->insert($this->table_name,$person);
				return $this->db->insert_id();
	}
	
	function count_all(){
	return $this->db->count_all($this->table_name);
	}
	
	function get_by_id($id){
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
	}

	function update($id,$person) {
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person);
	}

	function delete($id){
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
	
}
	?>
	
	