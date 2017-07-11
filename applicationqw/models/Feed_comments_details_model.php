<?php
class Feed_comments_details_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'comment_id' => $item['comment_id'],
			'user_id' => $item['user_id'],
			'like' => $item['like']
			 ); 

		$this->db->insert('feed_comments_details', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('feed_comments_details');
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
		$this->db->from('feed_comments_details');
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
			'comment_id' => $item['comment_id'],
			'user_id' => $item['user_id'],
			'like' => $item['like']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('feed_comments_details', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('feed_comments_details');
	}
}