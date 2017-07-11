<?php
class Restaurant_email_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'restaurant_id' => $item['restaurant_id'],
			'email' => $item['email']
			 ); 

		$this->db->insert('restaurant_email', $data);
	}

	function insert_email($item){
		$data = array(
				'email'=>  $item['email'],
				'restaurant_id' => $item['restaurant_id'],

		);

		$this->db->insert('restaurant_email', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;

	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_email');
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
		$this->db->from('restaurant_email');
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
			'email' => $item['email']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_email', $data);
	}

	function delete($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_email');
	}
	function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_email');
	}

}