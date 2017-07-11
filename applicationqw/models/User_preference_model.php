<?php

class User_preference_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($id) {
        $data = array(
            'user_id' => $id,
            'profile_setting' => 1,
            'request_setting' => 1
        );

        $this->db->insert('user_preference', $data);
    }

    function get_by_id($id) {
        $this->db->select('user_preference.profile_setting as profile_setting');
        $this->db->from('user_preference');
        $this->db->where('user_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }
     function get_profile_setting($id) {
        $this->db->select('profile_setting');
        $this->db->from('user_preference');
        $this->db->where('user_id', $id);
        $query = $this->db->get();

         if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

//    function get_preference($id) {
//        $this->db->select('request_setting');
//        $this->db->from('user_preference');
//        $this->db->where('user_id', $id);
//        $query = $this->db->get();
//
//         if ($query->num_rows() < 1) {
//            return null;
//        } else {
//            return $query->row();
//        }
//    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('user_preference');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $item) {
        $data = array(
//			'user_id' => $id,
            'profile_setting' => $item['profile_setting'],
            'request_setting' => $item['request_setting']
        );

        $this->db->where('user_id', $id);
        $this->db->update('user_preference', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_preference');
    }

}
