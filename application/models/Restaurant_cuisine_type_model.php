<?php
class Restaurant_cuisine_type_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item, $restaurant_id)
	{

		$data = array(
			'restaurant_id' => $restaurant_id,
			'cuisine_type_id' => $item['cuisine_type']
			 ); 

		$this->db->insert('restaurant_cuisine_type', $data);
	}

	public function get_all_cuisine()
	{
		$query= $this->db->select('*')
			         ->from('cuisine_type')
			         ->get();
			         
	         return $query->result();
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_cuisine_type');
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result();
		}
	}
        
        function get_by_restaurant_id($id)
	{
		 $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
           $this->db->where('restaurant_cuisine_type.restaurant_id', $id);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('restaurant_cuisine_type');
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
			'cuisine_type_id' => $item['cuisine_type']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_cuisine_type', $data);
	}

	function delete($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_cuisine_type');
	}

	function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_cuisine_type');
	}

	function delete_by_restaurant_id($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_cuisine_type');
	}
}