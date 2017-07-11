<?php
class Feed_comments_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'comment' => $item['comment'],
			'date' => $item['date'],
			'rating' => $item['rating']
			 ); 

		$this->db->insert('feed_comments', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('feed_comments');
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
		$this->db->from('feed_comments');
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
			'comment' => $item['comment'],
			'date' => $item['date'],
			'rating' => $item['rating']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('feed_comments', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('feed_comments');
	}
}