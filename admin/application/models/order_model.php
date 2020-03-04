<?php
class Order_model extends CI_Model{

private $primary_key='id_orderpro';
private $table_name='xorderpro';

function __construct(){
parent::__construct();
}

function get_user_all()
{
$query=$this->db->query("SELECT xorderpro.id_orderpro, xorderpro.kode, xorderpro.pemesan, xorderpro.email, xorderpro.tgl, xorderpro.telp, xorderpro.company, xorderpro.id_software, xorderpro.request, xorderpro.terbaca, xorderpro.ket, xorderpro.id_status, mstatus.nama as nama_status, msoftware.nama as nama_software
FROM xorderpro LEFT JOIN msoftware ON xorderpro.id_software=msoftware.id_software
LEFT JOIN mstatus
ON xorderpro.id_status=mstatus.id_status");
return $query->result();
}
function get_status_id()
	{
	$query=$this->db->query("SELECT * FROM mstatus");
	return $query->result();
	}
function get_software_id()
	{
	$query=$this->db->query("SELECT * FROM msoftware order by kode asc");
	return $query->result();
	}
function export_kontak(){
        $query = $this->db->query("SELECT * from msoftware");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
	
function save($order)
{
$this->db->insert($this->table_name,$order);
return $this->db->insert_id();
}

function get_by_id($id){
$query=$this->db->query("select xorderpro.id_orderpro, xorderpro.kode, xorderpro.tgl, xorderpro.pemesan, xorderpro.email, xorderpro.telp, xorderpro.company, xorderpro.id_software,  xorderpro.request, xorderpro.ket, xorderpro.id_status, msoftware.kode, msoftware.nama as softwarenya, mstatus.kode, mstatus.nama as statusnya from xorderpro left join mstatus on mstatus.id_status=xorderpro.id_status left join msoftware on msoftware.id_software=xorderpro.id_software where xorderpro.id_orderpro='$id'");
return $query;
}

function update($id,$order) {
$this->db->where($this->primary_key,$id);
$this->db->update($this->table_name,$order);
}

function view($id) {
$this->db->query("update xorderpro set `terbaca` = '1' where id_orderpro = '$id'");
return true;
} 

function delete($id) {
$this->db->where($this->primary_key,$id);
$this->db->delete($this->table_name);
}


public function hitung() {
	
	$this->db->where('terbaca','0');
	$this->db->from('xorderpro');
	return $query=$this->db->get();
	}
	

public function asd() {
	
	
	$query=$this->db->query("SELECT * FROM xorderpro where `terbaca`='0' order by id_orderpro desc");
	return $query;
	
}	
}
?>