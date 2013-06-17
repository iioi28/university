<?php
/**
 * kankor controller
 * by:A.h panahi
 * date: 6-6-13
 */
 class Kankor extends CI_Controller
 {
 	function __construct()
	{
		parent::__construct();
		$this->load->model('kankor_model');
		$this->load->library('Ajax_pagination');
		$this->load->library('form_validation');
		$this->lang->load('kankor','english');
	}
	function __destruct()
	{
		//no code
	}
	function index()
	{
		$str_post_str = '&ajax=1';
		//$recperpage = $this->config->item('recperpage');
		$recperpage =1;
		$starting = $this->input->post('starting');
		if(!$starting)
		{
			$starting = 0;
		}
		$get_allkankors = $this->kankor_model->getAllKankors($starting,$recperpage,FALSE);  
		if($get_allkankors)
		{
			$data['details'] = $get_allkankors;
		}
		else
		{
			$data['details']= NULL;
		}
		
		$this->ajax_pagination->make_search(
			$this->kankor_model->getAllKankors_total(),
			$starting,
			$recperpage,
			$this->lang->line('first'),
			$this->lang->line('last'),
			$this->lang->line('previous'),
			$this->lang->line('next'),
			$this->lang->line('page'),
			$this->lang->line('of'),
			$this->lang->line('total'),
			base_url().'kankor',
			'kankors_div',
			$str_post_str
			);
		$data['links'] = $this->ajax_pagination->anchors;
		$data['total'] = $this->ajax_pagination->total;
		$data['page']  = $starting;
		if($this->input->post('ajax')==1)
		{
			$this->load->view('kankors/kankor_list',$data);
		}
		else
		{
			//$this->load->view('template/header');
	        //$this->load->view('template/menu');
			$this->load->view('kankors/kankor_list',$data);
			//$this->load->view('template/footer');
		}
	}
	//function to add new kankor
	function add_kankor()
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
