<?php
class Restaurant_menu_item_rating_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'item_id' => $item['item_id'],
			'like' => $item['like'],
			'tried' => $item['tried'],
			'wish' => $item['wish'],
			'rating' => $item['rating']
			 ); 

		$this->db->insert('restaurant_menu_item_rating', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_menu_item_rating');
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
		$this->db->from('restaurant_menu_item_rating');
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
			'item_id' => $item['item_id'],
			'like' => $item['like'],
			'tried' => $item['tried'],
			'wish' => $item['wish'],
			'rating' => $item['rating']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_menu_item_rating', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_menu_item_rating');
	}
}