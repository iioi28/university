<?php
class Departments_model extends CI_Model {
  function Departments_model() {
		parent::__construct();
	}
	
	function get_departments(){
		return $this->db->select('*')->from('departments')->get();
	}
	
	function add_new_department($department_data){
		if($this->db->insert('departments',$department_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function remove_department($dep_id){
		return $this->db->where('code', $dep_id)->delete('departments');
	}
	

}
?>
