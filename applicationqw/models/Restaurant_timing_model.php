<?php
class Restaurant_timing_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'restaurant_id' => $item['restaurant_id'],
			'day' => $item['day'],
			'start_time' => $item['start_time'],
			'end_time' => $item['end_time']
			 ); 

		$this->db->insert('restaurant_timing', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_timing');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}
        
        function get_by_restaurant_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_timing');
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
		$this->db->from('restaurant_timing');
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
			'restaurant_id' => $item['restaurant_id'],
			'day' => $item['day'],
			'start_time' => $item['start_time'],
			'end_time' => $item['end_time']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_timing', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_timing');
	}
}