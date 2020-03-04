<?php
Class User extends CI_Model
{
	function login($username,$password)
	{
		$this->db->select('tuser.id_user,tuser.nama,tuser.pass,tuser.id_level,tlevel.nama as level');
		$this->db->from('tuser');
		$this->db->join('tlevel', 'tlevel.id_level = tuser.id_level');
		$this->db->where('tuser.aktif','true');
		$this->db->where('tuser.nama',$username);
		$this->db->where('pass',md5($password));
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows()===1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
}
?>