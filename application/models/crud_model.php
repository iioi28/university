<?php
class crud_model extends CI_Model 
{
  public function insert($table,$data)
	{
		$this->db->insert($table,$data);
		$id = $this->db->insert_id();
		/*
		$op_data = array(
						'ip'			=> $this->input->ip_address(),
						'js_op_by'		=> $this->tank_auth->get_user_id(),
						'dated'			=> date('Y-m-d H:i:s'),
						'js_table' 		=> $table,
						'js_tab_op_id'	=> $id,
						'js_op'			=> $set_data,
						'op_type'		=> 'Create',
		);
		$this->db->insert('js_ops', $op_data);
		*/
		return $id;		
	}
	
	public function update($table,$data,$where)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
		/*
		$op_data = array(
						'ip'			=> $this->input->ip_address(),
						'js_op_by'		=> $this->tank_auth->get_user_id(),
						'dated'			=> date('Y-m-d H:i:s'),
						'js_table' 		=> $table,
						'js_tab_op_id'	=> implode(":", $where),
						'js_op'			=> $set_data,
						'op_type'		=> 'Update',
		);
		$this->db->insert('js_ops', $op_data);
		 */
	}
	
	public function delete($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		/*
		$op_data = array(
						'ip'			=> $this->input->ip_address(),
						'js_op_by'		=> $this->tank_auth->get_user_id(),
						'dated'			=> date('Y-m-d H:i:s'),
						'js_table' 		=> $table,
						'js_tab_op_id'	=> implode(":", $where),
						'js_op'			=> "DELETED by ".$this->tank_auth->get_user_id(),
						'op_type'		=> 'Delete',
		);
		$this->db->insert('js_ops', $op_data);
		 */
	}
	function getAll($offset=0,$nrecords=0,$isTotal=FALSE,$table="")
	{
		if($table!="")
		{	
			$this->db->select('*');
			$this->db->from($table);
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
		else
		{
			return false;	
		}
		
	}
	function getAll_total($table="")
	{
		if($table!="")
		{	
			$this->db->select('count(*) AS total');
			$this->db->from('candidates');
			$query = $this->db->get();
			return $query->row()->total;
		}
		else
		{
			return 0;
		}
	}
	
}
//end of model
