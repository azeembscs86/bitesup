<?php
class Services_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function create($item)
    {
        $data = array(
            'name' => $item['name']
        );

        $this->db->insert('services', $data);
    }



    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('services');
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
        $this->db->from('services');
        $query = $this->db->get();

        if($query->num_rows()<1){
            return null;
        }
        else{
            return $query->result();
        }
    }

    function update($service_id,$service_name)
    {
        $data = array(
            'name' =>$service_name
        );

        $this->db->where('id', $service_id);
        $this->db->update('services', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('services');
    }
    
    function getserviebyname($name)
    {
        $this->db->select('id');
		$this->db->from('services');
		$this->db->where('name', $name);
		$query = $this->db->get();

		 if ($query->num_rows() < 1) {
                return null;
            } else {
                $variable = $query->row("id");
                 return $variable;
            }
    }

}