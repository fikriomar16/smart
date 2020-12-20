<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_proses extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function createPerhitungan()
	{
		$data = $this->db->insert('tbl_perhitungan');
		if ($data) {
			return true;
		} else {
			return false;
		}
	}

	public function getLastIdPerhitungan()
	{
		$this->db->select('id_perhitungan');
		$this->db->from('tbl_perhitungan');
		$this->db->order_by('id_perhitungan', 'desc');
		$this->db->limit(1);
		$result = $this->db->get();
		return $result->row();
	}

	public function getLastIdDetailPerhitungan()
	{
		$this->db->select('id_detail');
		$this->db->from('tbl_detail_perhitungan');
		$this->db->order_by('id_detail', 'desc');
		$this->db->limit(1);
		$result = $this->db->get();
		return $result->row();
	}

}

/* End of file M_proses.php */
/* Location: ./application/models/M_proses.php */