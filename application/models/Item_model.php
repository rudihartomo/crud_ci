<?php
defined("BASEPATH") or exit('not allowed direct access');
/**
* ITEM Model
*/
class Item_model extends CI_Model
{	
	public function all_item()
	{
		$this->db->select('items.id, items.name, items.is_active, items.stock, brands.name as brand_name, items.created_at');
		$this->db->from('items');
		$this->db->join('brands', 'brands.id=items.brand_id');
		$this->db->order_by('created_at', 'DESC');

		return $this->db->get()->result();
	}

	/*
	* Create New Item
	*/
	public function add_item($id, $name, $description, $stock, $brand, $is_active)
	{
		$data = array(
	        'brand_id' => $brand,
	        'name' => $name,
	        'description' => $description,
	        'stock' => $stock,
	        'is_active' => $is_active,
	        'created_by' => $id,
	        'modified_by' => $id,
	        'created_at' => date('Y-m-d H:i:s'),
	        'modified_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('items', $data);
	}

	/*
	* Edit Item
	*/
	public function edit_item($id, $user_id, $name, $description, $stock, $brand, $is_active)
	{
		$data = array(
	        'brand_id' => $brand,
	        'name' => $name,
	        'description' => $description,
	        'stock' => $stock,
	        'is_active' => $is_active,
	        'modified_by' => $user_id,
	        'modified_at' => date('Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
		$this->db->update('items', $data);
	}

	/*
	* Get One Item
	*/
	function get_item($id)
    {
        $this->db->select('id, name, description, stock, brand_id, is_active');
        $this->db->from('items');
        $this->db->where('id', $id);

        $query = $this->db->get();
        
        return $query->result();
    }

    /*
	* Delete Item
	*/
    public function delete($id)
    {
    	$this->db->where('id', $id);
		$this->db->delete('items');
		return true;
    }

    /*
	* Check if brand have relation
	*/
    public function check_brand($id)
    {
    	$this->db->select('*');
    	$this->db->from('items');
        $this->db->where('brand_id', $id);

        $query = $this->db->get();
        
        return $query->result();
    }
}