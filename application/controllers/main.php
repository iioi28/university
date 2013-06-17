<?php
/**
 * main controller
 * by:A.h panahi
 * date: 6-6-13
 */
 class Main extends CI_Controller
 {
 	function __construct()
	{
		parent::__construct();
		$this->lang->load('main','english');
	}
	function __destruct()
	{
		//no code
	}
	function index()
	{
		$this->load->view('main/main.php');
	}
 }
