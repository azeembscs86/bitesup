<?php
class Users_groups_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'group_id' => $item['group_id']
			 ); 

		$this->db->insert('users_groups', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('users_groups');
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
		$this->db->from('users_groups');
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
			'group_id' => $item['group_id']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('users_groups', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users_groups');
	}
}