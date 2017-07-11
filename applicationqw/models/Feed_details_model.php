<?php
class Feed_details_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'feed_id' => $item['feed_id'],
			'user_id' => $item['user_id'],
			'like' => $item['like'],
			'tried' => $item['tried'],
			'wish' => $item['wish']
			 ); 

		$this->db->insert('feed_details', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('feed_details');
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
		$this->db->from('feed_details');
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
			'feed_id' => $item['feed_id'],
			'user_id' => $item['user_id'],
			'like' => $item['like'],
			'tried' => $item['tried'],
			'wish' => $item['wish']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('feed_details', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('feed_details');
	}

	function get_by_feed_id($feed_id)
	{
		$this->db->select('*');
		$this->db->from('feed_details');
		$this->db->where('feed_id', $feed_id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}

}