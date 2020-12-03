<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_config','mconfig');
	}

	public function index()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Recommendation - Admin';
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/dashboard', $data);
		$this->load->view('template/ad_foot', $data);
	}

	public function datakriteria()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Admin - Data Kriteria';
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/data_kriteria', $data);
		$this->load->view('template/ad_foot', $data);
	}

	public function dataperhitungan()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Admin - Data Perhitungan';
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/data_perhitungan', $data);
		$this->load->view('template/ad_foot', $data);
	}

	public function datapertanyaan()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Admin - Data Pertanyaan';
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/data_pertanyaan', $data);
		$this->load->view('template/ad_foot', $data);
	}

	public function settings()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Admin - Pengaturan';
		$data['detail_con'] = $this->mconfig->det_conf();
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/setting', $data);
		$this->load->view('template/ad_foot', $data);
	}

	public function adduser()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Admin - Pengaturan Admin';
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/data_admin', $data);
		$this->load->view('template/ad_foot', $data);
	}

}

/* End of file C_admin.php */
/* Location: ./application/controllers/back/C_admin.php */