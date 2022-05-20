<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['ModelDashboard']);
		if (logged_in() == false) {
			redirect(site_url('login'));
		}
	}

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data_surat = $this->ModelDashboard->getAll();

		$tahun = array();
		foreach ($data_surat as $key => $value) {
			$tahun[substr($value->tanggal_diterima, 0, 4)] = substr($value->tanggal_diterima, 0, 4);
		}

		$jml_surat_masuk = 0;
		$jml_surat_keluar = 0;
		$jml_surat_internal = 0;
		if(!empty($data_surat)){
			foreach ($data_surat as $value) {
				if ($value->tipe_surat == 'masuk') {
					$jml_surat_masuk++;
				} else if ($value->tipe_surat == 'keluar') {
					$jml_surat_keluar++;
				}else {
					$jml_surat_internal++;
				}
			}
		}
		$data = [
			'title' => 'Dashboard',
			'js' => ['assets/app/dashboard.js'],
			'tahun' => array_unique($tahun),
			'jml_surat_masuk' => $jml_surat_masuk,
			'jml_surat_keluar' => $jml_surat_keluar,
			'jml_surat_internal' => $jml_surat_internal,
		];

		$this->load->view('include/header', $data);
		$this->load->view('dashboard');
		$this->load->view('include/footer');
	}

	public function getAjax(){
		// if ($this->input->is_ajax_request()) {
			date_default_timezone_set("Asia/Jakarta");
			$tahun = $this->input->post('tahun');
			$data_surat = $this->ModelDashboard->getAll();
			$data_perbulan_surat_masuk = $this->ModelDashboard->getAjax($tahun, 'masuk');
			$data_perbulan_surat_keluar = $this->ModelDashboard->getAjax($tahun, 'keluar');
			$data_perbulan_surat_internal = $this->ModelDashboard->getAjax($tahun, 'internal');

			$jml_surat_masuk = 0;
			$jml_surat_keluar = 0;
			$jml_surat_internal = 0;
			if (!empty($data_surat)) {
				foreach ($data_surat as $value) {
					if ($value->tipe_surat == 'masuk') {
						$jml_surat_masuk++;
					} else if ($value->tipe_surat == 'keluar') {
						$jml_surat_keluar++;
					} else {
						$jml_surat_internal++;
					}
				}
			}

			$data = [
				'surat_masuk_perbulan' => $data_perbulan_surat_masuk,
				'surat_keluar_perbulan' => $data_perbulan_surat_keluar,
				'surat_internal_perbulan' => $data_perbulan_surat_internal,
				'total_surat' => $jml_surat_masuk + $jml_surat_keluar + $jml_surat_internal,
				'jml_surat_masuk' => $jml_surat_masuk,
				'jml_surat_keluar' => $jml_surat_keluar,
				'jml_surat_internal' => $jml_surat_internal,
			];

			echo json_encode($data);
		// }
	}
}

/* End of file Dashboard.php */
