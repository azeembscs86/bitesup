<?php

class Restaurant_menu_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'category_id' => $item['category_id'],
            'restaurant_id' => $item['restaurant_id']
        );

        $this->db->insert('restaurant_menu', $data);
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant_menu');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_limited_by_restaurant_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant_menu');
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
        $this->db->from('restaurant_menu');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $item) {
        $data = array(
            'category_id' => $item['category_id'],
            'restaurant_id' => $item['restaurant_id']
        );

        $this->db->where('id', $id);
        $this->db->update('restaurant_menu', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('restaurant_menu');
    }

}
