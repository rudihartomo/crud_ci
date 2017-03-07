<?php
defined('BASEPATH') OR exit('No direct script allowed');

/*
** Item Controller
*/
Class Item extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->model('brand_model');
		$this->load->library('pagination');

		if (!$this->session->userdata('logged_in'))
		{
			redirect(site_url('user'), 'refresh');
		}
	}

	/*
	** ALL item Page
	*/
	public function index()
	{
		$data['title'] = "Item";

		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];
		$data['items'] = $this->item_model->all_item();
		
		$this->load->view('dashboard/header_base', $data);
		$this->load->view('item/index');
		$this->load->view('dashboard/footer_base');
	}
	/*
	* Create New Item
	*/
	function add()
    {

        $data['brands'] = $this->brand_model->all_brand();
        
        $data['title'] = 'Create New Item';

        $session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		if($this->form_validation->run() == false){
			$this->load->view('dashboard/header_base', $data);
	        $this->load->view('item/create');
	        $this->load->view('dashboard/footer_base');
		}
		else{
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$stock = $this->input->post('stock');
			$brand = $this->input->post('brand');
			$is_active = $this->input->post('is_active');

			$this->item_model->add_item($data['id'], $name, $description, $stock, $brand, $is_active);
			$this->session->set_flashdata('success', 'Item created successfully');
			redirect(site_url('item'), 'refresh');
		}
       
    }
    /*
	* Edit Item
	*/
    function edit($id=NULL)
    {
    	if ($id == NULL){
    		redirect('item');
    	}
        $data['brands'] = $this->brand_model->all_brand();

        $data['item'] = $this->item_model->get_item($id);        
        
        $data['title'] = 'Edit Item';

        $session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		if($this->form_validation->run() == false){
			$this->load->view('dashboard/header_base', $data);
	        $this->load->view('item/edit');
	        $this->load->view('dashboard/footer_base');
		}
		else{
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$stock = $this->input->post('stock');
			$brand = $this->input->post('brand');
			$is_active = $this->input->post('is_active');

			$this->item_model->edit_item($id, $data['id'], $name, $description, $stock, $brand, $is_active);
			$this->session->set_flashdata('success', 'Item updated successfully');
			redirect(site_url('item'), 'refresh');
		}
       
    }
    /*
	* Delete Item
	*/
    function delete()
    {
        $id = $this->input->post('Id');
        $result = $this->item_model->delete($id);
        echo json_encode(array('status'=>$result));
        $this->session->set_flashdata('success', 'Item deleted successfully');
    }
}