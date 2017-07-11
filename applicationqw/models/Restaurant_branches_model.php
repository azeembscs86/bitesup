<?php

class Restaurant_branches_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function create($item)
    {
        $data = array(
            'branch_name' => $item['branch_name'],
            'latitude' => $item['latitude'],
            'longitude' => $item['longitude'],
            'restaurant_id' => $item['restaurant_id']
        );

        $this->db->insert('restaurant_branches', $data);
    }

    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('restaurant_branches');
        $this->db->where('restaurant_id', $id);
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
        $this->db->from('restaurant_branches');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $item)
    {
        $data = array(
            'branch_name' => $item['branch_name'],
            'latitude' => $item['latitude'],
            'longitude' => $item['longitude'],
            'restaurant_id' => $item['restaurant_id']
        );

        $this->db->where('id', $id);
        $this->db->update('restaurant_branches', $data);
    }

    function get_near_branches($lat,$lng){
        $this->db->select("restaurant_branches.id,branch_name AS name,logo_url, ( 3959 * ACOS( COS( RADIANS($lat) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) - RADIANS($lng) ) + SIN( RADIANS($lat) ) * SIN( RADIANS( latitude ) ) ) ) AS distance",false);
        $this->db->from('restaurant_branches');
        $this->db->join('restaurant','restaurant_branches.restaurant_id=restaurant.id','LEFT');
//        $this->db->having('distance <=','30');
        $this->db->order_by('distance');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }
    
        function get_all_items($id)
    {
        $this->db->select('restaurant_menu_items.id, restaurant_menu_items.name,restaurant_menu_images.image_url');
        $this->db->from('restaurant_branches');
        $this->db->join('restaurant','restaurant_branches.restaurant_id = restaurant.id','INNER');
        $this->db->join('restaurant_menu','restaurant.id=restaurant_menu.restaurant_id','INNER');
        $this->db->join('restaurant_menu_items','restaurant_menu.id=restaurant_menu_items.menu_id','INNER');
        $this->db->join('restaurant_menu_images','restaurant_menu_items.id=restaurant_menu_images.item_id','INNER');
        $this->db->where('restaurant_branches.id',$id);
        $this->db->group_by('id');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }


    function delete($id)
    {
        $this->db->where('restaurant_id', $id);
        $this->db->delete('restaurant_branches');
    }

    function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('restaurant_branches');
    }
    
    
    public function get_restaurant_near_branches($lat,$lng,$country_id=0){
        $where="restaurant.country_id=$country_id";
        $this->db->select("restaurant_branches.id,branch_name AS name,logo_url, ( 3959 * ACOS( COS( RADIANS($lat) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) - RADIANS($lng) ) + SIN( RADIANS($lat) ) * SIN( RADIANS( latitude ) ) ) ) AS distance",false);
        $this->db->from('restaurant_branches');
        $this->db->join('restaurant','restaurant_branches.restaurant_id=restaurant.id','LEFT');
        $this->db->where($where);
        $this->db->order_by('distance');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }
    
    
    
   


}