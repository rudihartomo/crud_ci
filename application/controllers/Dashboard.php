<?php
defined('BASEPATH') OR exit('No direct script allowed');

/*
** Dasboard Controller
*/
Class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in'))
		{
			redirect(site_url('user'), 'refresh');
		}
	}
	/*
	** Default Page
	*/
	public function index()
	{
		$data['title'] = "Dashboard";

		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$data['email'] = $session_data['email'];
		$data['name'] = $session_data['name'];

		$this->load->view('dashboard/header_base', $data);
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/footer_base');

	}

	function check_login($password)
	{
		$email = $this->input->post('email');
		$result = $this->user_model->check_auth($email, $password);

		if ($result){
			$sess_arr = array();
			foreach ($result as $row) {
				$sess_arr = array('id' => $row->id, 'email' => $row->email, 'name' => $row->name);
				$this->session->set_userdata('logged_in', $sess_arr);
			}
			return true;
		}
		else{
			$this->form_validation->set_message('check_login', 'Invalid Username or Password');
			return false;
		}
	}
}