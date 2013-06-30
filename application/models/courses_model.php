<?php
class Courses_model extends CI_Model {
  function Courses_model() {
		parent::__construct();
	}
	
	function list_active_courses(){
		return $this->db->select('*')->from('courses')->where('status',1)->get();
	}
	
	function list_finished_courses(){
		return $this->db->select('*')->from('courses')->where('status',2)->get();
	}
	
	function list_dismissed_courses(){
		return $this->db->select('*')->from('courses')->where('status',0)->get();
	}
	function list_suspended_courses(){
		return $this->db->select('*')->from('courses')->where('status',3)->get();
	}
	
	function time_availability_check($days_1, $start_time, $end_time){
		$this->db->select('*');from('courses')->where('da');
		$this->db->from('courses');
		$check_day_array = array('day1' => $days_1,'day2' => $days_1,'day3' => $days_1,'day4' => $days_1,);
		$this->db->where($array); 
		$this->db->where('day1',$days_1);
	}
	function add_new_course($course_data, $course_days_data){
		$this->db->trans_start();
		$this->db->insert('courses',$course_data);
		$this->db->insert('course_days',$course_days_data);
		$this->db->trans_complete();
		return true;
	}
	
	function activate_course($cou_id){
		return $this->db->where('code', $cou_id)->update('courses',array('status' => 1));
	}
	
	function remove_course($cou_id){
		return $this->db->where('code', $cou_id)->delete('courses');
	}
	
	function dismiss_course($cou_id){
		return $this->db->where('code', $cou_id)->update('courses',array('status' => 0));
	}
	
	function suspend_course($cou_id){
		return $this->db->where('code', $cou_id)->update('courses',array('status' => 3));
	}
	

}
?>
