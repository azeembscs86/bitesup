<?php
class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'ip_address' => $item['ip_address'],
			'username' => $item['username'],
			'password' => $item['password'],
			'salt' => $item['salt'],
			'email' => $item['email'],
			'activation_code' => $item['activation_code'],
			'forgotten_password_code' => $item['forgotten_password_code'],
			'forgotten_password_time' => $item['forgotten_password_time'],
			'remember_code' => $item['remember_code'],
			'created_on' => $item['created_on'],
			'last_login' => $item['last_login'],
			'active' => $item['active'],
			'first_name' => $item['first_name'],
			'last_name' => $item['last_name'],
			'dob' => $item['dob'],
			'phone' => $item['phone'],
			'country' => $item['country'],
			'gender' => $item['gender'],
			'user_image_url' => $item['user_image_url'],
			'cover_image_url' => $item['cover_image_url'],
			'is_block' => $item['is_block'],
			'user_type_id' => $item['user_type_id'],
			'date_created' => $item['date_created']
			 ); 

		$this->db->insert('users', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('users');
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
		$this->db->from('users');
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
			'ip_address' => $item['ip_address'],
			'username' => $item['username'],
			'password' => $item['password'],
			'salt' => $item['salt'],
			'email' => $item['email'],
			'activation_code' => $item['activation_code'],
			'forgotten_password_code' => $item['forgotten_password_code'],
			'forgotten_password_time' => $item['forgotten_password_time'],
			'remember_code' => $item['remember_code'],
			'created_on' => $item['created_on'],
			'last_login' => $item['last_login'],
			'active' => $item['active'],
			'first_name' => $item['first_name'],
			'last_name' => $item['last_name'],
			'dob' => $item['dob'],
			'phone' => $item['phone'],
			'country' => $item['country'],
			'gender' => $item['gender'],
			'user_image_url' => $item['user_image_url'],
			'cover_image_url' => $item['cover_image_url'],
			'is_block' => $item['is_block'],
			'user_type_id' => $item['user_type_id'],
			'date_created' => $item['date_created']
			 ); 

		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}