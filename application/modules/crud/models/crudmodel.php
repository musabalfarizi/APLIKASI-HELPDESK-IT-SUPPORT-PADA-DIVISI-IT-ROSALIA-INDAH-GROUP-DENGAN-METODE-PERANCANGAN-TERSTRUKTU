<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class crudmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function all($nama,$usergroup) {
    $this->db->select('id_user');
    $this->db->from('user');
    $this->db->join('usergroup','usergroup.id_usergroup=user.id_usergroup');
    if($nama!=""){
    $this->db->like('nama_user',$nama);    
    }
    if($usergroup!=""){
    $this->db->where('usergroup.usergroup',$usergroup);
    }
    return  $this->db->get();
    }

    function limit($nama,$usergroup,$limit,$per_page) {
    $this->db->select('id_user,nama_user,usergroup');
    $this->db->from('user');
    $this->db->join('usergroup','usergroup.id_usergroup=user.id_usergroup');
    if($nama!=""){
    $this->db->like('nama_user',$nama);    
    }
    if($usergroup!=""){
    $this->db->where('usergroup.usergroup',$usergroup);
    }
    $this->db->limit($limit,$per_page);
    return  $this->db->get();
    }
    
    function userbyid($id)
    {
    $this->db->where('id_user',$id);
    return $this->db->get('user');
    }
    
    function add($data)
    {
    $this->db->insert('user',$data);
    }
    
    function update($id,$data)
    {
    $this->db->where('id_user',$id);
    $this->db->update('user',$data);
    }
    
    function delete($id)
    {
    $this->db->where('id_user',$id);
    $this->db->delete('user');
    }
    
    function usergroup() {
    $this->db->select('*');
    $this->db->from('usergroup');
    return  $this->db->get();
    }
}    