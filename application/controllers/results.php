<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

  function Results(){
		parent::__construct();
		$this->load->model('results_model');
	}
	public function index()
	{
		$view_data['results'] = $this->results_model->get_results();
		$this->load->view('list_results',$view_data);
	}
	
	public function new_result()
	{
		$this->load->view('new_result');
	}
	
	function add_new_result()
	{
		//print_r($_POST);exit;
		$entry_date = date('Y-m-d H:i:s');
		$result_data = array(
			'code' 			=> $this->input->post('code'),
			'type'				=> $this->input->post('type'),
			'date'				=> $this->input->post('date'),
			'classroom'	=> $this->input->post('room_no'),
			'courses_id'	=> $this->input->post('course_code'),
			'entry_date'	=> $entry_date,
			'entry_by'		=> '1'
		);
		if($this->result_model->add_new_result($result_data)){
			$this->index();
		}
		
	}
}
