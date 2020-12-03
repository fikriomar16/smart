<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function login($user,$pass)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		if ($query = $this->db->get()) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function update_login($username)
	{
		$now = date("Y-m-d H:i:s");
		$data = array('last_login' => $now);
		$this->db->where('username', $username);
		$this->db->update('tbl_admin', $data);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */