<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_smartphone','msmart');
		$this->load->model('M_config','mconfig');
		$this->load->model('M_admin','madmin');
	}

	public function index()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['jumlah_smartphone'] = $this->msmart->count_all();
		$data['jumlah_kriteria'] = $this->madmin->kriteria_all();
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
	public function update_config()
	{
		$data = array(
			'nama_instansi' => $this->input->post('nama_instansi'),
			'nama_aplikasi' => $this->input->post('nama_aplikasi'),
			'alamat_instansi' => $this->input->post('alamat_instansi'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		if ($data['nama_aplikasi'] == "" || $data['nama_instansi'] == "" || $data['alamat_instansi'] == "" || $data['deskripsi'] == "") {
			return false;
		} else {
			$this->mconfig->update_conf($data);
		}
	}
	public function update_help()
	{
		$data = array('halaman_bantuan' => nl2br($this->input->post('note_help')));
		if ($data['halaman_bantuan'] == "") {
			return false;
		} else {
			$this->mconfig->update_conf($data);
		}
	}
	public function reset_help()
	{
		$data = array('halaman_bantuan' => '');
		$this->mconfig->update_conf($data);
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
		$this->load->view('modal/mdl_addadmin', $data);
		$this->load->view('template/ad_foot', $data);
	}
	public function get_admin()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$get = $this->madmin->list_admin();
		echo json_encode($get);
	}
	public function select_admin($id_admin)
	{
		$data = $this->madmin->get_admin($id_admin);
		echo json_encode($data);
	}
	public function save_admin()
	{
		$nama = ucwords($this->input->post('nama'), " \t\r\n\f\v'");
		$id_admin = $this->input->post('id_admin');
		if (empty($id_admin)) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama' => $nama,
				'hak_akses' => 'admin'
			);
			$this->session->set_userdata('admin',$data);
			$result = $this->madmin->insert_admin($data);
			echo json_encode($result);
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama' => $nama
			);
			$result = $this->madmin->update_admin($id_admin,$data);
			echo json_encode($result);
		}
	}
	public function delete_admin($id_admin)
	{
		$result = $this->madmin->delete_admin($id_admin);
		echo json_encode($result);
	}

	public function get_kriteria()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$get = $this->madmin->list_kriteria();
		echo json_encode($get);
	}

	public function get_pertanyaan()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$get = $this->madmin->list_pertanyaan();
		echo json_encode($get);
	}
}

/* End of file C_admin.php */
/* Location: ./application/controllers/back/C_admin.php */