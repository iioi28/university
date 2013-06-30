<?php
class Result_model extends CI_Model {
  function Result_model() {
		parent::__construct();
	}
	
	function get_results(){
		return $this->db->select('*')->from('results')->get();
	}
	
	function add_new_result($result_data){
		if($this->db->insert('results',$result_data)){
			return true;
		}else{
			return false;
		}
	}
	

}
?>
