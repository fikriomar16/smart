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
		} else if ($this->session->userdata('user')) {
			redirect('beranda');
		}
		$data['title'] = 'Recommendation - Masuk';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/masuk', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function register()
	{
		$sesi = $this->session->userdata('admin');
		if ($sesi) {
			redirect('admin');
		} else if ($this->session->userdata('user')) {
			redirect('beranda');
		}
		$data['title'] = 'Recommendation - Mendaftar';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/mendaftar', $data);
		$this->load->view('template/us_foot', $data);
	}
	public function cekusername()
	{
		$username = $this->input->post('username');
		$res = $this->mlogin->cekusername($username);
		if ($res) {
			echo json_encode($res);
		} else {
			return false;
		}
	}
	public function user_register()
	{
		$nama = ucwords($this->input->post('nama'), " \t\r\n\f\v'");
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $nama
		);
		$result = $this->mlogin->insert_user($data);
		echo json_encode($result);
	}

	public function check_login()
	{
		if ($this->input->post('login_as')=="admin") {
			$this->check_login_admin();
		} elseif ($this->input->post('login_as')=="user") {
			$this->check_login_user();
		} else {
			return false;
		}
	}
	public function check_login_admin()
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
	public function check_login_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->mlogin->login_user($username,$password);
		if ($data) {
			// update login
			$this->mlogin->update_login_user($username);
			// re-set value untuk update time
			$data = $this->mlogin->login_user($username,$password);
			// set sesi
			$this->session->set_userdata('user',$data);
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

	public function reset_pass()
	{
		$sesi = $this->session->userdata('admin');
		if ($sesi) {
			redirect('admin');
		} else if ($this->session->userdata('user')) {
			redirect('beranda');
		}
		$data['title'] = 'Recommendation - Lupa Password';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/resetpass', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function conf_pass()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array('password' => $password);
		$res = $this->mlogin->respass_user($username,$data);
		echo json_encode($res);
	}

}

/* End of file C_login.php */
/* Location: ./application/controllers/C_login.php */