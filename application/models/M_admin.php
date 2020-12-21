<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function list_admin()
	{
		$query = $this->db->get('tbl_admin');
		return $query->result();
	}
	public function get_admin($id_admin)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('id_admin', $id_admin);

		$q = $this->db->get();
		return $q->row();
	}
	public function insert_admin($data)
	{
		$this->db->insert('tbl_admin', $data);
		return $this->db->insert_id();
	}
	public function update_admin($id_admin,$data)
	{
		$this->db->where('id_admin', $id_admin);
		return $this->db->update('tbl_admin', $data);
	}
	public function delete_admin($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		return $this->db->delete('tbl_admin');
	}

	public function list_kriteria()
	{
		$query = $this->db->get('tbl_kriteria');
		return $query->result();
	}
	public function get_kriteria($id_kriteria)
	{
		$this->db->select('*');
		$this->db->from('tbl_kriteria');
		$this->db->where('id_kriteria', $id_kriteria);

		$q = $this->db->get();
		return $q->row();
	}
	public function update_kriteria($id_kriteria,$data)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		return $this->db->update('tbl_kriteria', $data);
	}
	public function kriteria_all()
	{
		$this->db->from('tbl_kriteria');
		return $this->db->count_all_results();
	}

	public function list_pertanyaan()
	{
		$this->db->select('id_pertanyaan, pertanyaan, tbl_kriteria.id_kriteria, tbl_kriteria.kriteria');
		$this->db->from('tbl_pertanyaan');
		$this->db->join('tbl_kriteria', 'tbl_pertanyaan.id_kriteria = tbl_kriteria.id_kriteria', 'inner');
		$q = $this->db->get();
		return $q->result();
	}
	public function get_pertanyaan($id_pertanyaan)
	{
		$this->db->select('id_pertanyaan, pertanyaan, tbl_kriteria.id_kriteria, tbl_kriteria.kriteria');
		$this->db->from('tbl_pertanyaan');
		$this->db->join('tbl_kriteria', 'tbl_pertanyaan.id_kriteria = tbl_kriteria.id_kriteria', 'inner');
		$this->db->where('tbl_pertanyaan.id_pertanyaan', $id_pertanyaan);

		$q = $this->db->get();
		return $q->row();
	}
	public function update_pertanyaan($id_pertanyaan,$data)
	{
		$this->db->where('id_pertanyaan', $id_pertanyaan);
		return $this->db->update('tbl_pertanyaan', $data);
	}
	public function pertanyaan_all()
	{
		$this->db->from('tbl_pertanyaan');
		return $this->db->count_all_results();
	}

	public function list_perhitungan()
	{
		$this->db->select('tbl_perhitungan.tanggal, tbl_smartphone.merk, tbl_smartphone.seri, tbl_detail_perhitungan.id_detail, tbl_detail_perhitungan.id_perhitungan, tbl_detail_perhitungan.skor_akhir');
		$this->db->from('tbl_detail_perhitungan');
		$this->db->join('tbl_smartphone', 'tbl_detail_perhitungan.id_smartphone = tbl_smartphone.id', 'inner');
		$this->db->join('tbl_perhitungan', 'tbl_detail_perhitungan.id_perhitungan = tbl_perhitungan.id_perhitungan', 'inner');
		$q = $this->db->get();
		return $q->result();
	}
	public function perhitungan_all()
	{
		$this->db->from('tbl_perhitungan');
		return $this->db->count_all_results();
	}

	public function most_frequent()
	{
		$this->db->select('count(tbl_detail_perhitungan.id_smartphone) as id_smartphone, tbl_smartphone.merk, tbl_smartphone.seri');
		$this->db->from('tbl_detail_perhitungan');
		$this->db->join('tbl_smartphone', 'tbl_detail_perhitungan.id_smartphone = tbl_smartphone.id', 'inner');
		$this->db->group_by('tbl_detail_perhitungan.id_smartphone');
		$this->db->order_by('id_smartphone', 'desc');
		$this->db->limit(1);
		$q = $this->db->get();
		return $q->row();
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */