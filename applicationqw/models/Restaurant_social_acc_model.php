<?php
class Restaurant_social_acc_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'social_acc_id' => $item['social_acc_id'],
			'link' => $item['link'],
			'restaurant_id' => $item['restaurant_id']
			 ); 

		$this->db->insert('restaurant_social_acc', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_social_acc');
		$this->db->where('restaurant_id', $id);
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
		$this->db->from('restaurant_social_acc');
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
			'social_acc_id' => $item['social_acc_id'],
			'link' => $item['link'],
			'restaurant_id' => $item['restaurant_id']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_social_acc', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_social_acc');
	}
}