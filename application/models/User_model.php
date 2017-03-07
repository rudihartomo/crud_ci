<?php
defined("BASEPATH") or exit('not allowed direct access');
/**
* USER Model
*/
class User_model extends CI_Model
{	
	public function check_auth($email, $password)
	{
		$this->db->select('id, email, name');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$this->db->limit(1);

		$query = $this->db->get();
		if ($query->num_rows() === 1) {
			return $query->result();
		}
		else {
			return false;
		}
	}
}