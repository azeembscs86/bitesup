<?php
class Restaurant_promotional_banner_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_promotional_banner');
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
		$this->db->from('restaurant_promotional_banner');
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
		$this->db->from('restaurant_promotional_banner');
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
			'image_url' => $item['image_url'],
			'restaurant_id' => $item['restaurant_id']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_promotional_banner', $data);
	}

	function delete($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_promotional_banner');
	}

	function delete_banner($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_promotional_banner');
	}
        
        
        function count_promotional_id($id)
 {
  $this->db->select('count(restaurant_promotional_banner.id) as promotions');
  $this->db->from('restaurant_promotional_banner');
  $this->db->where('restaurant_id', $id);
  $query = $this->db->get();

  if($query->num_rows()<1){
   return null;
  }
  else{
   $variable = $query->row("promotions");
                 return $variable;
  }
 } 
}