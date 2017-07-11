<?php

class Feed_tags_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_with_rest_id($tags, $id, $feed_id) {
        $data = array(
            'feed_id' => $feed_id,
            'tag' => $tags,
            'restaurant_id' => $id
        );

        $this->db->insert('feed_tags', $data);
    }

    function create($tags, $feed_id) {
        $data = array(
            'feed_id' => $feed_id,
            'tag' => $tags
//			'restaurant_id' => $item['restaurant_id']
        );

        $this->db->insert('feed_tags', $data);
    }

    function update($item,$id) {
        $data = array(
            'feed_id' => $item['feed_id'],
            'tag' => $item['tag'],

        );

        $this->db->where('id', $id);
        $this->db->update('feed_tags', $data);
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('feed_tags');
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
        $this->db->from('feed_tags');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }


    function delete($id) {
        $this->db->where('feed_id', $id);
        $this->db->delete('feed_tags');
    }

}
