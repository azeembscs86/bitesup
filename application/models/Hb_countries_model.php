<?php
class Hb_countries_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'country_code' => $item['country_code'],
			'country_name' => $item['country_name']
			 ); 

		$this->db->insert('hb_countries', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('hb_countries');
		$this->db->where('country_id', $id);
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
		$this->db->select('country_id,country_name');
		$this->db->from('hb_countries');
                $this->db->order_by('country_name', 'asc');
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result();
		}
	}

	function update($id, $item)
	{
		$data = array(
			'country_code' => $item['country_code'],
			'country_name' => $item['country_name']
			 ); 

		$this->db->where('country_id', $id);
		$this->db->update('hb_countries', $data);
	}

	function delete($id)
	{
		$this->db->where('country_id', $id);
		$this->db->delete('hb_countries');
	}
        
      public  function getCountryByName($city)
        {
            $this->db->select('country_id');
		$this->db->from('hb_countries');
		$this->db->where('country_name', $city);
		$query = $this->db->get();

		 if ($query->num_rows() < 1) {
                return null;
            } else {
                $variable = $query->row("country_id");
                 return $variable;
            }
        }
        
      public  function getCityIdByName($city)
        {
            $this->db->select('city_id');
		$this->db->from('cities');
		$this->db->where('city_name', $city);
		$query = $this->db->get();

		 if ($query->num_rows() < 1) {
                return null;
            } else {
                $variable = $query->row("city_id");
                 return $variable;
            }
        }
        
        
}