<?php

class User_menu_categories_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'name' => $item['name'],
            'restaurant_id' => $item['restaurant_id'],
            'image' => $item['image'],
            'logo' => $item['logo'],
            'color_code' => $item['color_code']
        );

        $this->db->insert('user_menu_categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_category_item_by_id($id) {
        $this->db->select('*');
        $this->db->from('user_menu_categories');
        $this->db->join('restaurant', 'user_menu_categories.restaurant_id = restaurant.id', 'left');
        $this->db->join('hb_countries', 'restaurant.country_id = hb_countries.country_id', 'left');
        $this->db->join('restaurant_menu', 'user_menu_categories.id = restaurant_menu.category_id', 'left');
        $this->db->join('restaurant_menu_items', 'restaurant_menu.category_id = restaurant_menu_items.menu_id', 'left');
        $this->db->join('restaurant_menu_images', 'restaurant_menu_items.id = restaurant_menu_images.item_id', 'left');
        $this->db->where('user_menu_categories.id', $id);
        $this->db->group_by('restaurant_menu_items.id');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('user_menu_categories');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_by_restaurant_id($id) {
        $this->db->select('*');
        $this->db->from('user_menu_categories');
        $this->db->join('restaurant_menu', 'user_menu_categories.id = restaurant_menu.category_id', 'left');
        $this->db->where('user_menu_categories.restaurant_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('user_menu_categories');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function update($id, $item) {
        $data = array(
            'name' => $item['name'],
            'restaurant_id' => $item['restaurant_id'],
            'image' => $item['image'],
            'logo' => $item['logo']
        );

        $this->db->where('id', $id);
        $this->db->update('user_menu_categories', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_menu_categories');
    }

}
