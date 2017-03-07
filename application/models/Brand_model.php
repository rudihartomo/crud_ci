<?php
defined("BASEPATH") or exit('not allowed direct access');
/**
* Brand Model
*/
class Brand_model extends CI_Model
{	
	public function all_brand()
	{
		$this->db->select('*');
		$this->db->from('brands');
		$this->db->order_by('created_at', 'DESC');

		return $this->db->get()->result();
	}

	/*
	* Create New Brand
	*/
	public function add_brand($id, $name, $address)
	{
		$data = array(
	        'name' => $name,
	        'address' => $address,
	        'created_by' => $id,
	        'modified_by' => $id,
	        'created_at' => date('Y-m-d H:i:s'),
	        'modified_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('brands', $data);
	}

	/*
	* Edit Brand
	*/
	public function edit_brand($id, $user_id, $name, $address)
	{
		$data = array(
	        'name' => $name,
	        'address' => $address,
	        'modified_by' => $user_id,
	        'modified_at' => date('Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
		$this->db->update('brands', $data);
	}

	/*
	* Get one Brand
	*/
	function get_brand($id)
    {
        $this->db->select('id, name, address');
        $this->db->from('brands');
        $this->db->where('id', $id);

        $query = $this->db->get();
        
        return $query->result();
    }

    /*
	* Delete Brand
	*/
    public function delete($id)
    {
    	$this->db->where('id', $id);
		$this->db->delete('brands');
		return true;
    }
}