<?php
class Faculties_model extends CI_Model {
  function Faculties_model() {
		parent::__construct();
	}
	
	function list_faculties(){
		return $this->db->select('*')->from('faculties')->get();
	}
	
	function add_new_faculty($faculty_data){
		if($this->db->insert('faculties',$faculty_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function remove_faculty($fac_id){
		return $this->db->where('code', $fac_id)->delete('faculties');
	}
	

}
?>
