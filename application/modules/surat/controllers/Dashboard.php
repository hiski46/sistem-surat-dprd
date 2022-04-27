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
			'jml_surat_masuk' => $jml_surat_masuk,
			'jml_surat_keluar' => $jml_surat_keluar,
			'jml_surat_internal' => $jml_surat_internal,
		];

		$this->load->view('include/header', $data);
		$this->load->view('dashboard');
		$this->load->view('include/footer');
	}
}

/* End of file Dashboard.php */
