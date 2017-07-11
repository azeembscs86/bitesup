<?php

class Feeds_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_with_rest_id($item, $restaurant_id) {

        $data = array(
            'desc' => $item['desc'],
            'location' => $item['location'],
            'user_id' => $item['user_id'],
//			'feed_location_id' => $item['feed_location_id'],
//			'share_counter' => $item['share_counter'],
            'restaurant_id' => $restaurant_id,
            'title' => $item['title']
        );
        $this->db->set('datetime', 'NOW()', FALSE);
        $this->db->insert('feeds', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function create($item) {
        $data = array(
            'desc' => $item['desc'],
            'location' => $item['location'],
            'user_id' => $item['user_id'],
            'title' => $item['title'],
            'restaurant_id' => $item['restaurant_id']
        );
        $this->db->set('datetime', 'NOW()', FALSE);
        $this->db->insert('feeds', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('feeds');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_all() {
        $this->db->select('feeds.id,feeds.title,feeds.item,feeds.item,feeds.desc,feeds.datetime,users.first_name,users.last_name,users.user_image_url');
        $this->db->from('feeds');
        $this->db->join('users','feeds.user_id = users.id','left');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function update($id, $item) {
        $data = array(
            'title' => $item['title'],
            'item' => $item['item'],
            'desc' => $item['desc'],
            'location' => $item['location'],
            'datetime' => $item['datetime'],
            'branch_id' => $item['near_by_branch'],
        );

        $this->db->where('id', $id);
        $this->db->update('feeds', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('feeds');
    }

    public function get_items_data($id){
        $this->db->select('restaurant_menu_items.id as item_id , restaurant_menu_items.name as item_name');
        $this->db->from('feeds');
        $this->db->join('restaurant_menu_items','restaurant_menu_items.id = feeds.item','left');
        $this->db->where('feeds.id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all_feeds_by_firnd_ids($friends_ids) {
        $this->db->select('feed_details.like,feed_details.tried,feed_details.wish,feeds.id,feeds.title,feeds.desc,feeds.datetime,users.first_name,users.last_name,users.user_image_url');
        $this->db->from('feed_details');
        $this->db->join('feeds', 'feeds.id = feed_details.feed_id ','left');
        $this->db->join('users','feeds.user_id = users.id','left');
        $this->db->where_in('feeds.user_id',$friends_ids);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all_feeeds($id) {
        $this->db->select('feed_details.like,feed_details.tried,feed_details.wish,feeds.id,feeds.title,feeds.desc,feeds.datetime,users.first_name,users.last_name,users.user_image_url');
        $this->db->from('feeds');
        $this->db->join('feed_details','feeds.id = feed_details.feed_id','left');
        $this->db->join('users','feed_details.user_id = users.id','left');
        $this->db->where('feeds.user_id',$id);

        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }
}
