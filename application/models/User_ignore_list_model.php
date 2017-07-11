<?php
class User_ignore_list_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'ignore_user_id' => $item['ignore_user_id'],
			'date_added' => $item['date_added']
			 ); 

		$this->db->insert('user_ignore_list', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('user_ignore_list');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('user_ignore_list');
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result_array();
		}
	}

	function update($id, $item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'ignore_user_id' => $item['ignore_user_id'],
			'date_added' => $item['date_added']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('user_ignore_list', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_ignore_list');
	}
}