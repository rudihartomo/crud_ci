<?php
defined('BASEPATH') OR exit('No direct script allowed');

/*
** Dasboard Controller
*/
Class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	/*
	** Default Page
	*/
	public function index()
	{
		if (!$this->session->userdata('logged_in'))
		{
			redirect(site_url('user'), 'refresh');
		}
		else{
			$this->load->view('dashboard/index');
		}
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