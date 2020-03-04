<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_tamu extends CI_Model {

    function _construct() {
        parent::__construct();
    }

    var $table_name = 'contact';

	
    public function getById($id) {
         $query = $this->db->where('id',$id)->get('contact');
        if ($query->num_rows() > 0) {
            $result = $query->row_object();
            $query->free_result();
            return $result;
        }
		return false;
    }
	
	public function get() {
      
        $query = $this->db->order_by('id','desc')->get('contact');
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
            $query->free_result();
            return $result;
        }
		return false;
    }
	

	
	function get_count()
    {
        $query = $this->db->get($this->table_name);
        return $query->num_rows();
    }
	
	
	

    function insert($par) {
		if($this->db->insert($this->table_name, $par)){
			return true;
	   }else{
			return false;
	   }
    }


    function update($data, $id) {
        $this->db->where('id', $id);
		if( $this->db->update($this->table_name, $data)){
			return true;
		}else{
			return false;
		}
    }
	
	
    function delete($id) {
		$this->db->where('id', $id);
		if( $this->db->delete($this->table_name) ){
			return true;
		}else{
			return false;
		}
    }

	
	
}

