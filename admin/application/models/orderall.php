<?php
class Orderall extends CI_Model{
function __construct(){
parent::__construct();
}

	function order_all()
	{
		$query=$this->db->query("select id_order,pemesan,email,telp,company,divisi,`read` from xorder where `read`='0' UNION select id_orderpro,pemesan,email,telp,company,id_software,`terbaca` from xorderpro where `terbaca`='0'");
		
		return $query;
	}
	
	function order_hardware()
	{
		$query=$this->db->query("select id_order,pemesan,email,telp,company,divisi from xorder where `read`='0' ");
		
		return $query;
	}
	
	function order_software()
	{
		$query=$this->db->query("SELECT xorderpro.id_orderpro, xorderpro.kode, xorderpro.pemesan, xorderpro.email, xorderpro.tgl, xorderpro.telp, xorderpro.company, xorderpro.id_software, xorderpro.request, xorderpro.terbaca, xorderpro.ket, xorderpro.id_status, mstatus.nama as nama_status, msoftware.nama as nama_software
FROM xorderpro LEFT JOIN msoftware ON xorderpro.id_software=msoftware.kode
LEFT JOIN mstatus
ON xorderpro.id_status=mstatus.kode where `terbaca`='false'");
		
		return $query;
	}

}