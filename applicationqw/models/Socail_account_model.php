<?php
class Socail_account_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'name' => $item['name']
			 ); 

		$this->db->insert('socail_account', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('socail_account');
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
		$this->db->from('socail_account');
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result();
		}
	}

	function update($id, $item)
	{
		$data = array(
			'name' => $item['name']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('socail_account', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('socail_account');
	}
}