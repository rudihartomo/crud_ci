<?php
defined('BASEPATH') OR exit('No direct script alloewed');

/*
** User Controller
*/
Class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	/*
	** Default Page
	*/
	public function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			redirect(site_url('dashboard'), 'refresh');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_login');
		if($this->form_validation->run() == false){
			$this->load->view('user/login');
		}
		else{
			redirect(site_url('dashboard'), 'refresh');
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
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();

		redirect(site_url('user'), 'refresh');
	}
}