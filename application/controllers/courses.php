<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

  function Courses(){
		parent::__construct();
		$this->load->model('courses_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$courses = $this->courses_model->list_active_courses();
		$this->page_loader('courses/list_courses', $courses);
	}
	
	function page_loader($page, $content){
		$view_data['view_data'] = $content;
		$view_data['page'] = $page;
		$this->load->view('courses/main_view_cou', $view_data);
	}
	
	public function home()
	{
		redirect('main/index','refresh');
	}
	
	public function new_course()
	{
		$this->page_loader('new_course', "");
	}
	
	function active_courses(){
		$courses = $this->courses_model->list_active_courses();
		$this->page_loader('list_courses', $courses);
	}
	
	function finished_courses(){
		$courses = $this->courses_model->list_finished_courses();
		$this->page_loader('list_courses', $courses);
	}
	
	function dismissed_courses(){
		$courses = $this->courses_model->list_dismissed_courses();
		$this->page_loader('list_courses', $courses);
	}
	
	function suspended_courses(){
		$courses = $this->courses_model->list_suspended_courses();
		$this->page_loader('list_courses', $courses);
	}
	
	function time_availability_check($days_1, $start_time, $end_time){
		if($this->courses_model->time_availability_check($days_1, $start_time, $end_time))
			echo "Not Allowed!";
		else
			echo "Allowed!";
	}
	function add_new_course()
	{
		//print_r($_POST);exit;
		$code = $this->input->post('code');
		$entry_date = date('Y-m-d H:i:s');
		$days_1 = $this->input->post('days_1');
		$start_time = $this->input->post('time_from_1');
		$end_time = $this->input->post('time_to_1');
		$this->form_validation->set_rules('code', 'Course Code', 'required|integer');
		$this->form_validation->set_rules('sub_id', 'Subject ID', 'required|integer');
		$this->form_validation->set_rules('lec_id', 'Lecturer ID', 'required|integer');
		$this->form_validation->set_rules('s_date', 'Start Date', 'required');
		$this->form_validation->set_rules('e_date', 'End Date', 'required');
		$this->form_validation->set_rules('day1', 'Day 1', 'required');
		$this->form_validation->set_rules('time_from_1', 'Starting Time', 'required|calback_time_availability_check($day_1,$start_time,$end_time)');
		$this->form_validation->set_rules('time_to_1', 'Ending Time', 'required');
		$this->form_validation->set_rules('day1', 'Day 1', 'required');
		$this->form_validation->set_rules('sessions', 'Number if Sessions', 'required|integer|max_length[2]');
		$this->form_validation->set_rules('credits', 'Number if Credits', 'required|integer|max_length[2]');
		$this->form_validation->set_rules('classroom', 'Number if Credits', 'required|integer');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->page_loader('new_course', "");
		}
		else
		{
			$this->active_courses();
		}
		
		if($this->input->post('days_2')){
			$day2 = $this->input->post('days_2');
			$from_time2 = $this->input->post('time_from_2');
			$to_time2 = $this->input->post('time_to_2');
		}else{ 
			$day2 = NULL;
			$from_time2 = NULL;
			$to_time2 = NULL;
		}
		if($this->input->post('days_3')){
			$day3 = $this->input->post('days_3');
			$from_time3 = $this->input->post('time_from_3');
			$to_time3 = $this->input->post('time_to_3');
		}else{ 
			$day3 = NULL;
			$from_time3 = NULL;
			$to_time3 = NULL;
		}
		if($this->input->post('days_4')){
			$day4 = $this->input->post('days_4');
			$from_time4 = $this->input->post('time_from_4');
			$to_time4 = $this->input->post('time_to_4');
		}else{ 
			$day4 = NULL;
			$from_time4 = NULL;
			$to_time4 = NULL;
		}
		
		$course_data = array(
			'id' 			=> '',
			'code' 			=> $code,
			'subjects_id'	=> $this->input->post('sub_id'),
			'lecturers_id'	=> $this->input->post('lec_id'),
			'start_date'	=> $this->input->post('s_date'),
			'end_date'		=> $this->input->post('e_date'),
			'day1'			=> $this->input->post('days_1'),
			'from_time1'	=> $this->input->post('time_from_1'),
			'to_time1'		=> $this->input->post('time_to_1'),
			'day2'			=> $day2,			
			'from_time2'	=> $from_time2,
			'to_time2'		=> $to_time2,
			'day3'			=> $day3,
			'from_time3'	=> $from_time3,
			'to_time3'		=> $to_time3,
			'day4'			=> $day4,
			'from_time4'	=> $from_time4,
			'to_time4'		=> $to_time4,
			'no_sessions'	=> $this->input->post('sessions'),
			'no_credits'	=> $this->input->post('credits'),
			'classroom'		=> $this->input->post('classroom'),
			'entry_date'	=> $entry_date,
			'entry_by'		=> '1',
			'status'		=> '1'
		);
		
		if($this->courses_model->add_new_course($course_data)){
			$this->index();
		}
		
	}
	
	function activate_course($cou_id="")
	{
		if($this->courses_model->activate_course($cou_id)){
			$this->active_courses();
		}	
	}
	function dismiss_course($cou_id="")
	{
		if($this->courses_model->dismiss_course($cou_id)){
			$this->dismissed_courses();
		}	
	}
	function remove_course($cou_id="")
	{
		if($this->courses_model->remove_course($cou_id)){
			$this->removed_courses();
		}	
	}
	function suspend_course($cou_id="")
	{
		if($this->courses_model->suspend_course($cou_id)){
			$this->suspended_courses();
		}	
	}
}
