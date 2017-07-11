<?php
class Restaurant_menu_images_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'item_id' => $item['item_id'],
			'image_url' => $item['image_url']
			//'image_desc' => $item['image_desc']
			 ); 

		$this->db->insert('restaurant_menu_images', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_menu_images');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}
        
        function get_images_by_item_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_menu_images');
		$this->db->where('item_id', $id);
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
		$this->db->from('restaurant_menu_images');
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
			'item_id' => $item['item_id'],
			'image_url' => $item['image_url'],
			'image_desc' => $item['image_desc']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_menu_images', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_menu_images');
	}



}