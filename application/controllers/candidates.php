<?php
/**
 * candidates controller
 * by:A.h panahi
 * date: 13-07-13
 */
 class Candidates extends CI_Controller
 {
   function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model');
		$this->load->library('Ajax_pagination');
		$this->load->library('form_validation');
		$this->load->helper('template');
		$this->lang->load('candidates','english');
		$this->lang->load('main','english');
	}
	function __destruct()
	{
		//no code
	}
	function index()
	{
		$str_post_str = '&ajax=1';
		$recperpage = $this->config->item('recperpage');
		//$recperpage =1;
		$starting = $this->input->post('starting');
		if(!$starting)
		{
			$starting = 0;
		}
		$get_all = $this->crud_model->getAll($starting,$recperpage,FALSE,'candidates');  
		if($get_all)
		{
			$data['details'] = $get_all;
		}
		else
		{
			$data['details']= NULL;
		}
		
		$this->ajax_pagination->make_search(
			$this->crud_model->getAll_total('candidates'),
			$starting,
			$recperpage,
			$this->lang->line('first'),
			$this->lang->line('last'),
			$this->lang->line('previous'),
			$this->lang->line('next'),
			$this->lang->line('page'),
			$this->lang->line('of'),
			$this->lang->line('total'),
			base_url().'Candidates',
			'content',
			$str_post_str
			);
		$data['links'] = $this->ajax_pagination->anchors;
		$data['total'] = $this->ajax_pagination->total;
		$data['page']  = $starting;
		if($this->input->post('ajax')==1)
		{
			putContent($this->load->view('candidates/list',$data));
		}
		else
		{
			putHeader();
			putLeft();
			putContent($this->load->view('candidates/list',$data));	
			
		}
	}
	//function to add new candidate
	function add()
	{
		$this->form_validation->set_rules('code','<span class="req">(Code)</span>','required');
		$this->form_validation->set_rules('supervisor','<span class="req">(Supervisor)</span>','required');
		$this->form_validation->set_rules('location','<span class="req">(Location)</span>','required');
		$this->form_validation->set_rules('date','<span class="req">(date)</span>','required');
		
		if($this->form_validation->run()==FALSE)
		{
				
			$this->load->view('kankors/add');
		}
		else
		{
			$date = $this->input->post('date_y')."-".$this->input->post('date_m')."-".$this->input->post('date_d');
				
			$form_data = array(
		           'code'              	=>$this->input->post('code'),
		           'supervisor'         =>$this->input->post('supervisor'),
		           'location'           =>$this->input->post('location'),
				   'date'               =>$date,
				   'entry_date'			=>date('Y-m-d'),
				   'entry_by'			=>2
                               );
			if($this->kankor_model->insertRecords($form_data)==TRUE)
            {
                $this->session->set_flashdata('msg','<span class="success">added successfully</span>');
                redirect(base_url().'kankor','refresh');
            }
            else
            {
                $this->session->set_flashdat('msg','<span class="error">not added</span>');
                redirect(base_url().'kankor','refresh');
            }
		}
	}
 }
