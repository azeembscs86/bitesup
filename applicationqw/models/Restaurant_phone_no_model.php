<?php
class Restaurant_phone_no_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'restaurant_id' => $item['restaurant_id'],
			'phone_no' => $item['phone_no']
			 ); 

		$this->db->insert('restaurant_phone_no', $data);
	}

	function insert_phone($item){

		$data = array(
				'phone_no'=>  $item['phone_no'],
				'restaurant_id' => $item['restaurant_id'],

		);

		$this->db->insert('restaurant_phone_no', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}


	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_phone_no');
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
		$this->db->from('restaurant_phone_no');
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
			'phone_no' => $item['phone_no']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_phone_no', $data);
	}

	function delete($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_phone_no');
	}
	function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_phone_no');
	}


}