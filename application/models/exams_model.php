<?php
class Exams_model extends CI_Model {
  function Exams_model() {
		parent::__construct();
	}
	
	function list_active_exams(){
		return $this->db->select('*')->from('exams')->where('status',1)->get();
	}
	
	function list_finished_exams(){
		return $this->db->select('*')->from('exams')->where('status',2)->get();
	}
	
	function list_dismissed_exams(){
		return $this->db->select('*')->from('exams')->where('status',0)->get();
	}
	function list_suspended_exams(){
		return $this->db->select('*')->from('exams')->where('status',3)->get();
	}
	
	function time_availability_check($days_1, $start_time, $end_time){
		$this->db->select('*');from('exams')->where('da');
		$this->db->from('exams');
		$check_day_array = array('day1' => $days_1,'day2' => $days_1,'day3' => $days_1,'day4' => $days_1,);
		$this->db->where($array); 
		$this->db->where('day1',$days_1);
	}
	function add_new_exam($exam_data){
		if($this->db->insert('exams',$exam_data))
			return TRUE;
		else
			return FALSE;
	}
	
	function activate_exam($cou_id){
		return $this->db->where('code', $cou_id)->update('exams',array('status' => 1));
	}
	
	function remove_exam($exam_id){
		return $this->db->where('code', $exam_id)->delete('exams');
	}
	
	function dismiss_exam($exam_id){
		return $this->db->where('code', $exam_id)->update('exams',array('status' => 0));
	}
	
	function suspend_exam($exam_id){
		return $this->db->where('code', $exam_id)->update('exams',array('status' => 3));
	}
	function exam_results($exam_id){
		return $this->db->select('*')->from('results')->where('exams_id',$exam_id)->get();
	}
	function exam_info($exam_id){
		$this->db->select('e.courses_id,c.lecturers_id,c.subjects_id');
		$this->db->from('exams as e');
		$this->db->join('courses as c', 'e.courses_id = c.code');
		$this->db->where('e.code',$exam_id);
		$this->db->get();
	}
	

}
?>
