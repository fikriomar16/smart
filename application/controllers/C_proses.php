<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_proses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_smartphone','msmart');
		$this->load->model('M_admin','madmin');
		$this->load->model('M_proses','mproses');
		$this->load->helper('smart');
	}

	public function index()
	{
		$data['title'] = 'Recommendation - Cari Rekomendasi';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/find_rekomendasi', $data);
		$this->load->view('template/us_foot', $data);
	}
	public function splithigh($value)
	{
		$val = explode("+",$value);
		return max($val);
	}
	public function bobot()
	{
		$hp = $this->input->post('hp');
		if (count($hp)<2) {
			redirect('cari');
		}
		$data['hp'] = $hp;
		$data['pertanyaan'] = $this->madmin->list_pertanyaan();
		$data['title'] = 'Recommendation - Pembobotan';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/bobot', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function select_smart($id)
	{
		return $this->msmart->get_smartphone($id);
	}
	public function select_kriteria($id_kriteria)
	{
		return $this->madmin->get_kriteria($id_kriteria);
	}
	public function show_smartphone()
	{
		return $this->msmart->list_smartphone();
	}

	// Memberikan bobot pada masing masing kriteria
	public function setbobot($id_kriteria,$bobot)
	{
		$result = array(
			'id_kriteria' => $id_kriteria,
			'bobot' => $bobot
		);
		return $result;
	}
	// Menghitung Normalisasi Bobot
	public function normalisasi($id_kriteria,$bobot)
	{
		$data = $this->setbobot($id_kriteria,$bobot);
		$jum = 0;
		$normalisasi = array();
		for($i = 0; $i < sizeof($data['bobot']); $i++){
			$jum += $data['bobot'][$i];
		}
		for($i = 0; $i < sizeof($data['bobot']); $i++) {
			$temp_normal = 0;
			$temp_normal = $data['bobot'][$i] / $jum;
			array_push($normalisasi, $temp_normal);
		}
		$result = array(
			'id_kriteria' => $id_kriteria,
			'bobot' => $bobot,
			'normalisasi' => $normalisasi
		);
		return $result;
	}
	// Menentukan nilai Sub Kriteria sesuai dengan value kriteria
	public function setsubkriteria($id_kriteria,$hp)
	{
		$dataset = $this->msmart->getanysmart($hp);
		$subKriteria = array();

		// Looping sebanyak jumlah smartphone yang dipilih
		for ($i=0; $i < sizeof($dataset); $i++) {
			// Looping sebanyak jumlah kriteria
			for ($j=0; $j < sizeof($id_kriteria); $j++) {
				// Kriteria Display
				if ($j == 0) {
					if ($dataset[$i]->display > 6.7) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($dataset[$i]->display > 6.2) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($dataset[$i]->display > 5.7) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria RAM
				if ($j == 1) {
					if ($dataset[$i]->ram > 8) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($dataset[$i]->ram > 6) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($dataset[$i]->ram > 4) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria ROM
				if ($j == 2) {
					if ($dataset[$i]->rom > 512) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 5;
					} else if ($dataset[$i]->rom > 256) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($dataset[$i]->rom > 128) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($dataset[$i]->rom > 64) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria Kamera Depan
				if ($j == 3) {
					if ($this->splithigh($dataset[$i]->kamera_depan) > 25) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 5;
					} else if ($this->splithigh($dataset[$i]->kamera_depan) > 20) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($this->splithigh($dataset[$i]->kamera_depan) > 15) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($this->splithigh($dataset[$i]->kamera_depan) > 10) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria Kamera Belakang
				if ($j == 4) {
					if ($this->splithigh($dataset[$i]->kamera_belakang) > 60) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 5;
					} else if ($this->splithigh($dataset[$i]->kamera_belakang) > 45) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($this->splithigh($dataset[$i]->kamera_belakang) > 30) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($this->splithigh($dataset[$i]->kamera_belakang) > 15) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria CPU
				if ($j == 5) {
					if (preg_replace('/[^0-9\.,]/', '', $dataset[$i]->cpu) > 2.8) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if (preg_replace('/[^0-9\.,]/', '', $dataset[$i]->cpu) > 2.3) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if (preg_replace('/[^0-9\.,]/', '', $dataset[$i]->cpu) > 1.8) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria OS
				if ($j == 6) {
					if ($dataset[$i]->os > 10) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($dataset[$i]->os > 9) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($dataset[$i]->os > 8) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria Baterai
				if ($j == 7) {
					if ($dataset[$i]->baterai > 6000) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($dataset[$i]->baterai > 5000) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($dataset[$i]->baterai > 4000) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
				// Kriteria Harga
				if ($j == 8) {
					if ($dataset[$i]->harga > 13000000) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 4;
					} else if ($dataset[$i]->harga > 9000000) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 3;
					} else if ($dataset[$i]->harga > 5000000) {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 2;
					} else {
						$subKriteria[$dataset[$i]->id]['subkriteria'][$j] = 1;
					}
				}
			}
		}
		return $subKriteria;
	}
	// Menghitung Utilities Score dengan Rumus = (Cout-Cmin)/(Cmax-Cmin)
	public function getValueUtilities($id_kriteria,$hp)
	{
		$data = $this->setsubkriteria($id_kriteria,$hp);
		$temp_data = array();
		foreach ($id_kriteria as $key => $value) {
			$temp_data[] =  $key;
		}
		for($i = 0; $i < sizeof($data); $i++) {
			$max = max($data[$hp[$i]]['subkriteria']);
			$min = min($data[$hp[$i]]['subkriteria']);
			for ($j = 0; $j < sizeof($id_kriteria); $j++) { 
				if($j == $temp_data[$j]) {
					$cout = ($data[$hp[$i]]['subkriteria'][$j] - $min) / ($max - $min);
					$data[$hp[$i]]['value_utilities'][$j] = $cout;
				}
			}
		}
		return $data;
	}
	// Mengalikan Utilities Score dengan Normalisasi
	public function getScore($id_kriteria,$hp,$bobot)
	{
		$data = $this->getValueUtilities($id_kriteria,$hp);
		$normalisasi = $this->normalisasi($id_kriteria,$bobot);
		$temp_data = array();
		foreach ($id_kriteria as $key => $value) {
			$temp_data[] =  $key;
		}
		for($i = 0; $i < sizeof($data); $i++) {
			for ($j = 0; $j < sizeof($id_kriteria) ; $j++) { 
				if($j == $temp_data[$j]) {
					$total = $data[$hp[$i]]['value_utilities'][$j] * $normalisasi['normalisasi'][$j];
					$data[$hp[$i]]['normalisasi'][$j] = $normalisasi['normalisasi'][$j];
					$data[$hp[$i]]['total'][$j] = $total;
				}
			}
		}
		return $data;
	}
	// Mendapatkan Score Akhir Perhitungan
	public function getTotalScore($id_kriteria,$hp,$bobot)
	{
		$data = $this->getScore($id_kriteria,$hp,$bobot);
		$temp_data = array();
		for($i = 0; $i < sizeof($data); $i++) {
			$temp_data[] =  $i;
		}
		for($i = 0; $i < sizeof($data); $i++) {
			if($i == $temp_data[$i]) {
				$score = array_sum($data[$hp[$i]]['total']);
				$data[$hp[$i]]['final_score'][0] = $score;
			}
		}
		return $data;
	}
	// Proses Perhitungan
	public function insertPerhitungan($id_kriteria,$hp,$bobot)
	{
		$createPerhitungan = $this->mproses->createPerhitungan();
		if ($createPerhitungan) {
			$getLastIdPerhitungan = $this->mproses->getLastIdPerhitungan();
			$id_perhitungan = $getLastIdPerhitungan->id_perhitungan;
			$perhitungan = $this->getTotalScore($id_kriteria,$hp,$bobot);
			$isInsert = false;
			$isInsertNormal = false;

			for ($i=0; $i < sizeof($perhitungan); $i++) { 
				$temp_hp = $hp[$i];
				$temp_score = $perhitungan[$hp[$i]]['final_score'][0];
				$val = array(
					'id_perhitungan' => $id_perhitungan,
					'id_smartphone' => $temp_hp,
					'skor_akhir' => $temp_score
				);
				$data = $this->mproses->insertDetailPerhitungan($val);
				$isInsert = $data ? true : false;

				if ($isInsert) {
					$getLastIdDetailPerhitungan = $this->mproses->getLastIdDetailPerhitungan();
					$id_detail = $getLastIdDetailPerhitungan->id_detail;
					for ($j=0; $j < sizeof($id_kriteria); $j++) { 
						$temp_normalisasi = $perhitungan[$hp[$i]]['normalisasi'][$j];
						$temp_utility = $perhitungan[$hp[$i]]['value_utilities'][$j];
						$normal = array(
							'id_detail' => $id_detail,
							'normalisasi' => $temp_normalisasi,
							'utilities' => $temp_utility
						);
						$dataNormal = $this->mproses->insertNormalisasi($normal);
						$isInsertNormal = $dataNormal ? true : false;
						if (!$isInsertNormal) {
							return false;
						}
					}
				} else {
					return false;
				}
			}
			$SMART = array(
				'id_smartphone' => $hp,
				'id_kriteria' => $id_kriteria,
				'bobot' => $bobot,
				'perhitungan' => $perhitungan
			);
			return $SMART;
		} else {
			return false;
		}
	}

	public function result()
	{
		$bobot = array();
		for ($i=1; $i <= $this->madmin->pertanyaan_all(); $i++) {
			$bbt = $this->input->post('bobot'.$i);
			$bobot[] .= $bbt;
		}
		$id_kriteria = $this->input->post('id_kriteria');
		$hp = $this->input->post('hp');
		if (empty($bobot) || empty($hp)) {
			redirect('pembobotan');
		}
		if ($hp || $id_kriteria) {
			$data['hasil'] = $this->insertPerhitungan($id_kriteria,$hp,$bobot);
		}
		$data['title'] = 'Hasil Rekomendasi';
		$this->load->view('template/us_head', $data);
		$this->load->view('front/hasil', $data);
		$this->load->view('template/us_foot', $data);
	}

	public function pushdata()
	{
		$id = $this->input->post('hp');
		$arr = array();
		if (false !== $key = array_search($id, $arr)) {
			unset($arr[$key]);
		} else {
			array_push($arr,$id);
		}
		// return $arr;
		echo json_encode($arr);
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
		$decimal = preg_replace('/[^0-9\.,]/', '', $str);
		$letters = preg_replace('/[^a-zA-Z]/', '', $str);
	}

}

/* End of file C_proses.php */
/* Location: ./application/controllers/C_proses.php */