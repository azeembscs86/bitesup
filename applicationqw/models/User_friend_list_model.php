<?php

class User_friend_list_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($requested_friend_id, $user_id) {
        $data = array(
            'user_id' => $user_id,
            'friend_user_id' => $requested_friend_id,
//            'status' => '2'
//            'date_added' => $item['date_added']
        );
        $this->db->set('date_added', 'NOW()', FALSE);
        $this->db->insert('user_friend_list', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

//    function create_with_status($requested_friend_id, $user_id) {
//        $data = array(
//            'user_id' => $requested_friend_id,
//            'friend_user_id' => $user_id,
//            'status' => '1'
////            'date_added' => $item['date_added']
//        );
//        $this->db->set('date_added', 'NOW()', FALSE);
//        $this->db->insert('user_friend_list', $data);
//        $insert_id = $this->db->insert_id();
//        return $insert_id;
//    }

    function get_friend_list($user_id, $friend_user_id) {
        $this->db->select('id');
        $this->db->from('user_friend_list');
        $this->db->where('user_id',$friend_user_id );
        $this->db->where('friend_user_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_follower($user_id) {
        $this->db->select('id');
        $this->db->from('user_friend_list');
        $this->db->where('friend_user_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->num_rows();
        }
    }

    function get_followings($id) {
        $this->db->select('id');
        $this->db->from('user_friend_list');
        $this->db->where('user_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->num_rows();
        }
    }

    function get_by_logged_id($id) {
        $this->db->select('friend_user_id');
        $this->db->from('user_friend_list');
        $this->db->where('user_id',1);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('user_friend_list');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function update($id, $item) {
        $data = array(
            'user_id' => $item['user_id'],
            'friend_user_id' => $item['friend_user_id'],
            'date_added' => $item['date_added']
        );

        $this->db->where('id', $id);
        $this->db->update('user_friend_list', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_friend_list');
    }
    function delete_user_friend($user_id, $friend_is) {
        $this->db->where('user_id', $user_id);
        $this->db->where('friend_user_id', $friend_is);
        $this->db->delete('user_friend_list');
    }

}
