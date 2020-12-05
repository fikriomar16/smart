<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_login','mlogin');
	}

	public function index()
	{
		$sesi = $this->session->userdata('admin');
		if ($sesi) {
			redirect('admin');
		}
		$data['title'] = 'Recommendation - Masuk';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/masuk', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function check_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->mlogin->login($username,$password);
		if ($data) {
			// update login
			$this->mlogin->update_login($username);
			// re-set value untuk update time
			$data = $this->mlogin->login($username,$password);
			// set sesi
			$this->session->set_userdata('admin',$data);
			echo "benar";
		} else {
			return false;
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('beranda');
	}

}

/* End of file C_login.php */
/* Location: ./application/controllers/C_login.php */