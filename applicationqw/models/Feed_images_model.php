<?php
class Feed_images_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'feed_id' => $item['feed_id'],
			'image_url' => $item['image_url']
//			'image_desc' => $item['image_desc']
			 ); 

		$this->db->insert('feed_images', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('feed_images');
		$this->db->where('feed_id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result();
		}
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('feed_images');
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
			'image_url' => $item['image_url'],
			'image_desc' => $item['image_desc']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('feed_images', $data);
	}

	function delete($id)
	{
		$this->db->where('feed_id', $id);
		$this->db->delete('feed_images');
	}
	function delete_image($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('feed_images');
	}
}