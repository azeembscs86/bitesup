<?php
class Restaurant_mobile_no_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
				'mobile_no'=>  $item['mobile_no'],
				'restaurant_id' => $item['restaurant_id']
			 );

		$this->db->insert('restaurant_mobile_no', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_mobile_no');
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
		$this->db->from('restaurant_mobile_no');
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
			'mobile_no' => $item['mobile_no']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_mobile_no', $data);
	}

	function delete($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_mobile_no');
	}

	function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_mobile_no');
	}
}