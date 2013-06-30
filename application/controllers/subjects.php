<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects extends CI_Controller {

  function Subjects(){
		parent::__construct();
		$this->load->model('subjects_model');
	}
	public function index()
	{
		$subjects = $this->subjects_model->list_subjects();
		$this->page_loader('list_subjects',$subjects);
	}
	
	function page_loader($page, $content){
		$view_data['view_data'] = $content;
		$view_data['page'] = $page;
		$this->load->view('main_view_sub', $view_data);
	}
	
	public function home()
	{
		redirect('main/index','refresh');
	}
	
	public function new_subject()
	{
		$this->page_loader('new_subject', "");
	}
	function all_subjects(){
		$subjects = $this->subjects_model->list_subjects();
		$this->page_loader('list_subjects', $subjects);
	}
	
	function add_new_subject()
	{
		//print_r($_POST);exit;
		$entry_date = date('Y-m-d H:i:s');
		$subject_data = array(
			'code' 			=> $this->input->post('code'),
			'title_en'			=> $this->input->post('title_en'),
			'title_da'			=> $this->input->post('title_da'),
			'entry_date'	=> $entry_date,
			'entry_by'		=> '1'
		);
		if($this->subjects_model->add_new_subject($subject_data)){
			$this->index();
		}
		
	}

	function remove_subject($sub_id="")
	{
		if($this->subjects_model->remove_subject($sub_id)){
			$this->index();
		}
		
	}
}
