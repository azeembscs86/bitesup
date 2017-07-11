<?php
class Flag_type_model extends CI_Model
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

		$this->db->insert('flag_type', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('flag_type');
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
		$this->db->from('flag_type');
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
			'name' => $item['name']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('flag_type', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('flag_type');
	}
}