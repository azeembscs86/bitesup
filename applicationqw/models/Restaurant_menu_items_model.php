<?php

class Restaurant_menu_items_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'menu_id' => $item['menu_id'],
            'name' => $item['name'],
            'price' => $item['price'],
            'description' => $item['description']
        );

        $this->db->insert('restaurant_menu_items', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant_menu_items');
        $this->db->where('menu_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_by_item_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant_menu_items');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('restaurant_menu_items');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $item) {
        $data = array(
            'menu_id' => $item['menu_id'],
            'name' => $item['name'],
            'price' => $item['price'],
            'description' => $item['description']
        );

        $this->db->where('id', $id);
        $this->db->update('restaurant_menu_items', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('restaurant_menu_items');
    }

    public function get_branch_items_by_id($id){
        $this->db->select('restaurant_menu_items.id,restaurant_menu_items.name');
        $this->db->from('restaurant_branches');
        $this->db->join('restaurant','restaurant_branches.restaurant_id = restaurant.id','inner');
        $this->db->join('restaurant_menu','restaurant_menu.restaurant_id = restaurant.id','inner');
        $this->db->join('restaurant_menu_items','restaurant_menu_items.menu_id = restaurant_menu.id','inner');
        $this->db->where('restaurant_branches.id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }

    }



}
