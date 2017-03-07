<?php
defined('BASEPATH') OR exit('No direct script allowed');

/*
** Brand Controller
*/
Class Brand extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('brand_model');
		$this->load->library('pagination');
		/*
		* Check if already Login
		*/
		if (!$this->session->userdata('logged_in'))
		{
			redirect(site_url('user'), 'refresh');
		}
	}

	/*
	** ALL brand Page
	*/
	public function index()
	{
		$data['title'] = "Brand";

		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];
		$data['brands'] = $this->brand_model->all_brand();
		
		$this->load->view('dashboard/header_base', $data);
		$this->load->view('brand/index');
		$this->load->view('dashboard/footer_base');
	}

	/*
	* Create New Brand
	*/
	function add()
    {        
        $data['title'] = 'Create New Brand';

        $session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];
		
		/*
		* Validate Data
		*/
		$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[brands.name]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		if($this->form_validation->run() == false){
			$this->load->view('dashboard/header_base', $data);
	        $this->load->view('brand/create');
	        $this->load->view('dashboard/footer_base');
		}
		else{
			$name = $this->input->post('name');
			$address = $this->input->post('address');

			$this->brand_model->add_brand($data['id'], $name, $address);

			$this->session->set_flashdata('success', 'Brand created successfully');			
			
			redirect(site_url('brand'), 'refresh');
		}
       
    }

    /*
	* Edit Brand
	*/
    function edit($id=NULL)
    {
    	if ($id == NULL){
    		redirect('brand');
    	}
        $data['brand'] = $this->brand_model->get_brand($id);        
        
        $data['title'] = 'Edit Brand';

        $session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		if($this->form_validation->run() == false){
			$this->load->view('dashboard/header_base', $data);
	        $this->load->view('brand/edit');
	        $this->load->view('dashboard/footer_base');
		}
		else{
			$name = $this->input->post('name');
			$address = $this->input->post('address');

			$this->brand_model->edit_brand($id, $data['id'], $name, $address);
			$this->session->set_flashdata('success', 'Brand updated successfully');
			redirect(site_url('brand'), 'refresh');
		}
       
    }
    /*
	* Delete Brand
	*/
    function delete()
    {
        $id = $this->input->post('Id');
        $result = $this->brand_model->delete($id);
        echo json_encode(array('status'=>$result));
        $this->session->set_flashdata('success', 'Brand deleted successfully');
    }
}