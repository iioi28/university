<?php
class kankor_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	function getAllKankors($offset=0,$nrecords=0,$isTotal=FALSE)
	{
		$this->db->select('*');
		$this->db->from('konkors');
		if(!$isTotal)
		{
			$this->db->limit($nrecords,$offset);
		}
		$result = $this->db->get();
		if($result->num_rows()>0)
		{
			return $result;
		}
		else 
		{
			return false;	
		}
		
	}
	function getAllKankors_total()
	{
		$this->db->select('count(*) AS total');
		$this->db->from('konkors');
		$query = $this->db->get();
		return $query->row()->total;
	}
}
