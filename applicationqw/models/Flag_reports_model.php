<?php
class Flag_reports_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'flag_type_id' => $item['flag_type_id'],
			'type' => $item['type'],
			'content_id' => $item['content_id']
			 ); 

		$this->db->insert('flag_reports', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('flag_reports');
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
		$this->db->from('flag_reports');
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
			'flag_type_id' => $item['flag_type_id'],
			'type' => $item['type'],
			'content_id' => $item['content_id']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('flag_reports', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('flag_reports');
	}
}