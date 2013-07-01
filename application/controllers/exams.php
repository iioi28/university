<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exams extends CI_Controller {

  function Exams(){
		parent::__construct();
		$this->load->model('exams_model');
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Kabul");
	}
	public function index()
	{
		$exams = $this->exams_model->list_active_exams();
		$this->page_loader('exams/list_exams', $exams);
	}
	
	function page_loader($page, $content){
		$view_data['view_data'] = $content;
		$view_data['page'] = $page;
		$this->load->view('exams/main_view_exa', $view_data);
	}
	
	public function home()
	{
		redirect('main/index','refresh');
	}
	
	public function new_exam()
	{
		$this->page_loader('new_exam', "");
	}
	
	function active_exams(){
		$exams = $this->exams_model->list_active_exams();
		$this->page_loader('list_exams', $exams);
	}
	
	function finished_exams(){
		$exams = $this->exams_model->list_finished_exams();
		$this->page_loader('list_exams', $exams);
	}
	
	function dismissed_exams(){
		$exams = $this->exams_model->list_dismissed_exams();
		$this->page_loader('list_exams', $exams);
	}
	
	function suspended_exams(){
		$exams = $this->exams_model->list_suspended_exams();
		$this->page_loader('list_exams', $exams);
	}
	
	function add_new_exam()
	{
		//print_r($_POST);exit;
		$code = $this->input->post('code');
		
		$this->form_validation->set_rules('code', 'exam Code', 'required|integer');
		$this->form_validation->set_rules('course_code', 'Course Code', 'required|integer');
		$this->form_validation->set_rules('type', 'Exam Type', 'required');
		$this->form_validation->set_rules('date', 'Exam Date', 'required|valid_date');
		$this->form_validation->set_rules('room_no', 'Room Number', 'required|integer');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->page_loader('new_exam', "");
		}else{
			$entry_date = date('Y-m-d H:i:s');
			$exam_data = array(
				'id' 			=> '',
				'code' 			=> $code,
				'courses_id'	=> $this->input->post('course_code'),
				'type'			=> $this->input->post('type'),
				'date'			=> $this->input->post('date'),
				'classroom'		=> $this->input->post('room_no'),
				'description'	=> $this->input->post('desc'),
				'entry_date'	=> $entry_date,
				'entry_by'		=> '1',
				'status'		=> '1'
			);
		
			if($this->exams_model->add_new_exam($exam_data)){
				$this->active_exams();
			}
		}
	}
	
	function activate_exam($exam_id="")
	{
		if($this->exams_model->activate_exam($exam_id)){
			$this->active_exams();
		}	
	}
	function postpone_exam($exam_id="")
	{
		if($this->exams_model->postpone_exam($exam_id)){
			$this->postponed_exams();
		}	
	}
	function remove_exam($exam_id="")
	{
		if($this->exams_model->remove_exam($exam_id)){
			//$this->removed_exams();
			$this->active_exam();
		}	
	}
	function suspend_exam($exam_id="")
	{
		if($this->exams_model->suspend_exam($exam_id)){
			$this->suspended_exams();
		}	
	}
	
	function results_exam($exam_id="")
	{
		$results['exam_results'] = $this->exams_model->exam_results($exam_id);
		$results['exam_info'] = $this->exams_model->exam_info($exam_id);
		var_dump($results);exit;
		$this->page_loader('exam_results', $results);	
	}
}
