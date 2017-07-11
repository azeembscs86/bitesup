<?php
class Restaurant_selected_tags_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'restaurant_id' => $item['restaurant_id'],
			'tag' => $item['tag']
			 ); 

		$this->db->insert('restaurant_selected_tags', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurant_selected_tags');
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
		$this->db->from('restaurant_selected_tags');
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
			'tag' => $item['tag']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('restaurant_selected_tags', $data);
	}

	function delete($id)
	{
		$this->db->where('restaurant_id', $id);
		$this->db->delete('restaurant_selected_tags');
	}

	function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('restaurant_selected_tags');
	}
        
        public function get_most_use_tags()
        {
            $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name,count(restaurant_cuisine_type.cuisine_type_id) as total_tags');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('cuisine_type.id');
            $this->db->order_by('total_tags', 'desc');  
            $this->db->limit(16,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
        }
}