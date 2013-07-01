<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends CI_Controller {

  function Departments(){
		parent::__construct();
		$this->load->model('departments_model');
	}
	public function index()
	{
		$departments = $this->departments_model->get_departments();
		$this->page_loader('departments/list_departments', $departments);
	}
	
	function page_loader($page, $content){
		$view_data['view_data'] = $content;
		$view_data['page'] = $page;
		$this->load->view('departments/main_view_dep', $view_data);
	}
	
	public function home()
	{
		redirect('main/index','refresh');
	}
	
	public function new_department()
	{
		$this->page_loader('new_department', "");
	}
	function all_departments(){
		$departments = $this->departments_model->get_departments();
		$this->page_loader('list_departments', $departments);
	}
	
	function add_new_department()
	{
		//print_r($_POST);exit;
		$entry_date = date('Y-m-d H:i:s');
		$department_data = array(
			'code' 			=> $this->input->post('code'),
			'title_en'			=> $this->input->post('title_en'),
			'title_da'			=> $this->input->post('title_da'),
			'faculty_id'		=> $this->input->post('faculty_id'),
			'entry_date'	=> $entry_date,
			'entry_by'		=> '1'
		);
		if($this->departments_model->add_new_department($department_data)){
			$this->index();
		}
		
	}
	
	function remove_department($dep_id="")
	{
		if($this->departments_model->remove_department($dep_id)){
			$this->index();
		}
		
	}
}
