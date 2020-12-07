<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_proses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_smartphone','msmart');
		$this->load->model('M_proses','mproses');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$data['title'] = 'Recommendation - Cari Rekomendasi';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/find_rekomendasi', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function getdata()
	{
		$hp = $this->input->post('hp');
		if ($hp) {
		for ($i=0; $i < count($hp); $i++) {
			$data = $this->msmart->get_smartphone($hp[$i]);
			$get[] = $data;
		}
			echo json_encode($get);
		} else {
			echo "Tidak Ada Pilihan";
		}
	}

	public function olahdata()
	{
		// separate letters and digits
		// https://stackoverflow.com/questions/4311156/how-to-separate-letters-and-digits-from-a-string-in-php
		$numbers = preg_replace('/[^0-9]/', '', $str);
		$letters = preg_replace('/[^a-zA-Z]/', '', $str);
	}

}

/* End of file C_proses.php */
/* Location: ./application/controllers/C_proses.php */