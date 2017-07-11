<?php
class User_selected_tags_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($user_id,$tags)
	{
		$data = array(
			'user_id' => $user_id,
			'tag' => $tags
			 ); 

		$this->db->insert('user_selected_tags', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('user_selected_tags');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('user_selected_tags');
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result_array();
		}
	}

	function update($id, $item)
	{
		$data = array(
			'user_id' => $item['user_id'],
			'tag' => $item['tag']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('user_selected_tags', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_selected_tags');
	}
}