<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_smartphone extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_smartphone','msmart');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$sesi = $this->session->userdata('admin');
		if (!$sesi) {
			redirect('beranda');
		}
		$data['title'] = 'Admin - Data Smartphone';
		$this->load->view('template/ad_head', $data);
		$this->load->view('back/data_smartphone', $data);
		$this->load->view('modal/mdl_smart', $data);
		$this->load->view('modal/mdl_smart_del', $data);
		$this->load->view('template/ad_foot', $data);
	}

	public function ajax()
	{
		$list = $this->msmart->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$pop_det = 'data-toggle="tooltip" data-placement="top" title="Detail Data"';
		$pop_edt = 'data-toggle="tooltip" data-placement="top" title="Edit Data"';
		$pop_del = 'data-toggle="tooltip" data-placement="top" title="Delete Data"';
		foreach ($list as $sp) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $sp->merk;
			$row[] = $sp->seri;
			$row[] = $sp->display.'"';
			$row[] = $sp->ram.' GB';
			$row[] = $sp->rom.' GB';
			$row[] = $sp->kamera_belakang.' MP / '.$sp->kamera_depan.' MP';
			$row[] = $sp->cpu.' GHz';
			$row[] = $sp->chipset;
			$row[] = $sp->os;
			$row[] = $sp->baterai.' mAh';
			$row[] = 'Rp '.number_format($sp->harga,0,',','.');
			//add html for action
			$row[] = '<td class="text-center">'.
			'<button class="btn btn-sm btn-primary m-1" onclick="det_smart('.
			$sp->id.
			');" '.$pop_det.'><i class="fas fa-info-circle"></i></button>'.
			'<button class="btn btn-sm btn-warning m-1" onclick="edt_smart('.
			$sp->id.
			');" '.$pop_edt.'><i class="fas fa-pen-square"></i></button>'.
			'<button class="btn btn-sm btn-danger m-1" onclick="del_smart('.
			$sp->id.
			');" '.$pop_del.'><i class="fas fa-trash"></i></button>'.
			'</td>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->msmart->count_all(),
			"recordsFiltered" => $this->msmart->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_user()
	{
		$list = $this->msmart->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $sp) {
			$no++;
			$row = array();
			$row[] = '<input value="" type="checkbox" id="chk_boxes1"  name="hp[]" onchange=""/>';
			$row[] = $sp->merk." ".$sp->seri;
			$row[] = $sp->ram.' GB - '.$sp->rom.' GB';
			$row[] = $sp->kamera_belakang.' MP / '.$sp->kamera_depan.' MP';
			$row[] = $sp->display.'"';
			$row[] = $sp->cpu.' GHz';
			$row[] = $sp->chipset;
			$row[] = $sp->os;
			$row[] = $sp->baterai.' mAh';
			$row[] = 'Rp '.number_format($sp->harga,0,',','.');

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->msmart->count_all(),
			"recordsFiltered" => $this->msmart->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function get_smartphone()
	{
		$data = $this->msmart->list_smartphone();
		echo json_encode($data);
	}

	public function select_smart($id)
	{
		$data = $this->msmart->get_smartphone($id);
		echo json_encode($data);
	}

	public function save_smartphone()
	{
		$id = $this->input->post('id');
		$merk = strtoupper($this->input->post('merk'));
		$seri = ucwords($this->input->post('seri'), " \t\r\n\f\v'");
		$merk_seri = $merk."_".$seri;
		$title = str_replace(' ', '_', $merk_seri);

		$config['upload_path'] = './assets/img/smartphone/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '3072'; // 3MB
		$config['overwrite'] = TRUE;
		$config['file_name'] = $title;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			// $error = array('error' => $this->upload->display_errors());
			if (empty($id)) {
				$isi = array(
					'merk' => $merk,
					'seri' => $seri,
					'display' => $this->input->post('display'),
					'kamera_depan' => $this->input->post('kamera_depan'),
					'kamera_belakang' => $this->input->post('kamera_belakang'),
					'ram' => $this->input->post('ram'),
					'rom' => $this->input->post('rom'),
					'cpu' => $this->input->post('cpu'),
					'chipset' => $this->input->post('chipset'),
					'os' => $this->input->post('os'),
					'baterai' => $this->input->post('baterai'),
					'harga' => $this->input->post('harga'),
					'foto' => 'sp1.png'
				);
				$result = $this->msmart->insert_smartphone($isi);
				echo json_encode($isi);
			} else {
				$get_old_image = $this->msmart->get_foto($id);
				$old_image = $get_old_image->foto;
				$isi = array(
					'merk' => $merk,
					'seri' => $seri,
					'display' => $this->input->post('display'),
					'kamera_depan' => $this->input->post('kamera_depan'),
					'kamera_belakang' => $this->input->post('kamera_belakang'),
					'ram' => $this->input->post('ram'),
					'rom' => $this->input->post('rom'),
					'cpu' => $this->input->post('cpu'),
					'chipset' => $this->input->post('chipset'),
					'os' => $this->input->post('os'),
					'baterai' => $this->input->post('baterai'),
					'harga' => $this->input->post('harga'),
					'foto' => $old_image
				);
				$result = $this->msmart->update_smartphone($id,$isi);
				echo json_encode($old_image);
			}
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$ext = $data['upload_data']['file_ext'];
			if (empty($id)) {
				$isi = array(
					'merk' => $merk,
					'seri' => $seri,
					'display' => $this->input->post('display'),
					'kamera_depan' => $this->input->post('kamera_depan'),
					'kamera_belakang' => $this->input->post('kamera_belakang'),
					'ram' => $this->input->post('ram'),
					'rom' => $this->input->post('rom'),
					'cpu' => $this->input->post('cpu'),
					'chipset' => $this->input->post('chipset'),
					'os' => $this->input->post('os'),
					'baterai' => $this->input->post('baterai'),
					'harga' => $this->input->post('harga'),
					'foto' => $title.$ext
				);
				$result = $this->msmart->insert_smartphone($isi);
				echo json_encode($isi);
			} else {
				$get_old_image = $this->msmart->get_foto($id);
				$old_image = $get_old_image->foto;
				$isi = array(
					'merk' => $merk,
					'seri' => $seri,
					'display' => $this->input->post('display'),
					'kamera_depan' => $this->input->post('kamera_depan'),
					'kamera_belakang' => $this->input->post('kamera_belakang'),
					'ram' => $this->input->post('ram'),
					'rom' => $this->input->post('rom'),
					'cpu' => $this->input->post('cpu'),
					'chipset' => $this->input->post('chipset'),
					'os' => $this->input->post('os'),
					'baterai' => $this->input->post('baterai'),
					'harga' => $this->input->post('harga'),
					'foto' => $title.$ext
				);
				if ($old_image != "sp1.png") {
					if ($old_image != "") {
						unlink('./assets/img/smartphone/'.$old_image);
					}
				}
				$result = $this->msmart->update_smartphone($id,$isi);
				echo json_encode($isi);
			}
			
		}
	}

	public function delete_smartphone()
	{
		$id = $this->input->post('id');
		$get_old_image = $this->msmart->get_foto($id);
		$old_image = $get_old_image->foto;
		unlink('./assets/img/smartphone/'.$old_image);
		$result = $this->msmart->delete_smartphone($id);
		// echo json_encode($result);
		print_r($get_old_image);
	}

	public function jumlah_smartphone()
	{
		return $this->msmart->count_smartphone();
	}

}

/* End of file C_smartphone.php */
/* Location: ./application/controllers/C_smartphone.php */