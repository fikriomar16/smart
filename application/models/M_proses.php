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
		$data = $this->db->insert('tbl_perhitungan',array('tanggal' => NULL));
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

	public function insertDetailPerhitungan($val)
	{
		$this->db->insert('tbl_detail_perhitungan', $val);
		return $this->db->insert_id();
	}

	public function insertNormalisasi($normal)
	{
		$this->db->insert('tbl_normalisasi', $normal);
		return $this->db->insert_id();
	}

	public function search_log($id_user)
	{
		$this->db->select('tbl_perhitungan.tanggal, tbl_smartphone.merk, tbl_smartphone.seri, tbl_detail_perhitungan.id_detail, tbl_detail_perhitungan.id_perhitungan, tbl_detail_perhitungan.skor_akhir, tbl_user.nama');
		$this->db->from('tbl_detail_perhitungan');
		$this->db->join('tbl_smartphone', 'tbl_detail_perhitungan.id_smartphone = tbl_smartphone.id', 'inner');
		$this->db->join('tbl_perhitungan', 'tbl_detail_perhitungan.id_perhitungan = tbl_perhitungan.id_perhitungan', 'inner');
		$this->db->join('tbl_user', 'tbl_detail_perhitungan.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_user.id_user', $id_user);
		$this->db->order_by('tbl_detail_perhitungan.skor_akhir', 'desc');
		$q = $this->db->get();
		return $q->result();
	}

}

/* End of file M_proses.php */
/* Location: ./application/models/M_proses.php */