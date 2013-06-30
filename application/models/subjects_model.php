<?php
class Subjects_model extends CI_Model {
  function Subjects_model() {
		parent::__construct();
	}
	
	function list_subjects(){
		return $this->db->select('*')->from('subjects')->get();
	}
	
	function add_new_subject($subject_data){
		if($this->db->insert('subjects',$subject_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function remove_subject($sub_id){
		return $this->db->where('code', $sub_id)->delete('subjects');
	}

}
?>
