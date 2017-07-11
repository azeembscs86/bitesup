<?php
class Feedback_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'subject' => $item['subject'],
			'detail' => $item['detail'],
			'datetime_added' => $item['datetime_added']
			 ); 

		$this->db->insert('feedback', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('feedback');
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
		$this->db->from('feedback');
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
			'subject' => $item['subject'],
			'detail' => $item['detail'],
			'datetime_added' => $item['datetime_added']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('feedback', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('feedback');
	}
}