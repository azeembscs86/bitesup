<?php

class User_friend_request_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($requested_friend_id, $user_id) {
        $data = array(
            'user_id' => $user_id,
            'friend_request_id' => $requested_friend_id,
            'status' => 'Requested',
//            'request_datetime' => $item['request_datetime']
        );
        $this->db->set('request_datetime', 'NOW()', FALSE);
        $this->db->insert('user_friend_request', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_by_logged_id($id) {
        $this->db->select('friend_request_id');
        $this->db->from('user_friend_request');
        $this->db->where('user_id', $id);
        $this->db->where('status', 'Requested');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_friend_list($user_id, $id) {
        $this->db->select('status');
        $this->db->from('user_friend_request');
        $this->db->where('user_id', $id);
        $this->db->where('friend_request_id', $user_id);
        $this->db->where('status', 'Requested');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_friend_request($id) {
        $this->db->select('*');
        $this->db->from('user_friend_request');
        $this->db->where('friend_request_id', $id);
        $this->db->where('status', 'Requested');
        $this->db->join('users', 'users.id = user_friend_request.user_id', 'left');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('user_friend_request');
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
        $this->db->from('user_friend_request');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function accept_request($requested_friend_id, $id) {
        $data = array(
            'status' => 'Accepted'
        );

        $this->db->where('user_id', $requested_friend_id);
        $this->db->where('friend_request_id', $id);
        $this->db->update('user_friend_request', $data);
    }

    function update($id, $item) {
        $data = array(
            'user_id' => $item['user_id'],
            'friend_request_id' => $item['friend_request_id'],
            'status' => $item['status'],
            'request_datetime' => $item['request_datetime']
        );

        $this->db->where('id', $id);
        $this->db->update('user_friend_request', $data);
    }

    function cancel_request($friend_request_id, $user_id) {
        $data = array(
            'status' => 'Rejected'
        );
        $this->db->where('friend_request_id', $user_id);
        $this->db->where('user_id', $friend_request_id);
        $this->db->where('status', 'Requested');
        $this->db->update('user_friend_request',$data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_friend_request');
    }

}
