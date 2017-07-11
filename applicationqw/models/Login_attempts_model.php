<?php
class Login_attempts_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'ip_address' => $item['ip_address'],
			'login' => $item['login'],
			'time' => $item['time']
			 ); 

		$this->db->insert('login_attempts', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('login_attempts');
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
		$this->db->from('login_attempts');
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
			'ip_address' => $item['ip_address'],
			'login' => $item['login'],
			'time' => $item['time']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('login_attempts', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('login_attempts');
	}
}