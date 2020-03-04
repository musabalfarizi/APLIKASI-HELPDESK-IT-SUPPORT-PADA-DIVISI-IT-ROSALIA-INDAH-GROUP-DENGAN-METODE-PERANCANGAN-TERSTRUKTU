<?php
class  Karyawans_model extends CI_model {

private $primary_key='id_karyawan';
private $table_name='mkaryawan';


 function __construct(){
	 parent::__construct();
}


function get_karyawan_id()
	{
	$query=$this->db->query("select mkaryawan.id_karyawan, mkaryawan.kode, mkaryawan.nik, mkaryawan.nama, mkaryawan.tempatlahir, mkaryawan.tgllahir, mkaryawan.kelamin, mkaryawan.phone, mkaryawan.tglmasuk, mkaryawan.alamat, mkaryawan.ket, magama.nama as nama_agama from mkaryawan inner join magama on magama.id_agama=mkaryawan.id_agama");
	return $query->result();
	}
	
function get_agama_id()
{
	$query=$this->db->query("select * from magama");
	return $query->result();
}

function save($person) 
{
	$this->db->insert($this->table_name,$person);
	return $this->db->insert_id();
}
function edit($id)
{
	$this->db->where('id_karyawan',$id);
	return $this->db->get('mkaryawan');
}

function update($id,$person) 
{
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person);
}

function delete($id)
{
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
}