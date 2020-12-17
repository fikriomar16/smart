<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_config','mconfig');
	}

	public function index()
	{
		$data['title'] = 'Recommendation - Beranda';
		$data['detail_con'] = $this->mconfig->det_conf();
		$this->load->view('template/us_head', $data);
		$this->load->view('front/dashboard', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function helppage()
	{
		$data['title'] = 'Recommendation - Bantuan';
		$data['detail_con'] = $this->mconfig->det_conf();
		$this->load->view('template/us_head', $data);
		$this->load->view('front/help', $data);
		$this->load->view('template/us_foot', $data);
	}

}

/* End of file C_user.php */
/* Location: ./application/controllers/front/C_user.php */