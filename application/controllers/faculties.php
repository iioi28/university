<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculties extends CI_Controller {

  function Faculties(){
		parent::__construct();
		$this->load->model('faculties_model');
	}
	public function index()
	{
		$faculties = $this->faculties_model->list_faculties();
		$this->page_loader('list_faculties', $faculties);
	}
	
	function page_loader($page, $content){
		$view_data['view_data'] = $content;
		$view_data['page'] = $page;
		$this->load->view('main_view_fac', $view_data);
	}
	
	public function home()
	{
		redirect('main/index','refresh');
	}
	
	public function new_faculty()
	{
		$this->page_loader('new_faculty', "");
	}
	function all_faculties(){
		$faculties = $this->faculties_model->list_faculties();
		$this->page_loader('list_faculties', $faculties);
	}
	
	function add_new_faculty()
	{
		//print_r($_POST);exit;
		$entry_date = date('Y-m-d H:i:s');
		$faculty_data = array(
			'code' 			=> $this->input->post('code'),
			'title_en'			=> $this->input->post('title_en'),
			'title_da'			=> $this->input->post('title_da'),
			'branch_id'	=> $this->input->post('branch_id'),
			'desc'			=> $this->input->post('desc'),
			'entry_date'	=> $entry_date,
			'entry_by'		=> '1'
		);
		if($this->faculties_model->add_new_faculty($faculty_data)){
			$this->index();
		}
		
	}
	
	function remove_faculty($fac_id="")
	{
		if($this->faculties_model->remove_faculty($fac_id)){
			$this->index();
		}
		
	}
}
