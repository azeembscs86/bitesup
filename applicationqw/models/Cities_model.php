<?php
class Cities_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('cities');
		$this->db->where('city_id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}
	
	function get_cities_by_countries_id($id)
	{
		$this->db->select('*');
		$this->db->from('cities');
		$this->db->where('country_id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
		return null;
		}
		else{
			return $query->result();
		}
	}

	
	

	
}