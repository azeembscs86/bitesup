<?php

class Restaurant_menu_attr_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'item_id' => $item['item_id'],
            'attribute_name' => $item['attribute_name'],
            'attribute_value' => $item['attribute_value'],
            'parent' => $item['parent'],
            'item_attr_image' => $item['item_attr_image']
        );

        $this->db->insert('restaurant_menu_attr', $data);
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant_menu_attr');
        $this->db->where('item_id', $id);
        $this->db->where('parent', 1);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('restaurant_menu_attr');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $item) {
        $data = array(
            'item_id' => $item['item_id'],
            'attribute_name' => $item['attribute_name'],
            'attribute_value' => $item['attribute_value']
        );

        $this->db->where('id', $id);
        $this->db->update('restaurant_menu_attr', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('restaurant_menu_attr');
    }

}
