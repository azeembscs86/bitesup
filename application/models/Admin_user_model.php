<?php
class Admin_user_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'username' => $item['username'],
			'password' => $item['password']
			 ); 

		$this->db->insert('admin_user', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('admin_user');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}
        function check_user($user,$pass)
	{
		$this->db->select('*');
		$this->db->from('admin_user');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));
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
		$this->db->from('admin_user');
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
			'username' => $item['username'],
			'password' => $item['password']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('admin_user', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin_user');
	}
}