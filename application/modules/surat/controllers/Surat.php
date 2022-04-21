<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ModelSurat", "ModelSurat");
	}

	// public function index($tipe)
	// {
	// 	$data["title"] = "surat masuk";
	// 	$data["surat"] = $this->ModelSurat->get_surat();
	// 	$data['js'] = ["assets/app/surat.js"];
	// 	$this->load->view('include/header', $data);
	// 	$this->load->view('surat_masuk/list_surat');
	// 	$this->load->view('include/footer');
	// }

	public function masuk()
	{
		$data["title"] = "Surat Masuk";
		$data['js'] = ["assets/app/surat_masuk.js"];
		$data['expand'] = 'surat_masuk';
		$data['active'] = 'surat_masuk';
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}

	public function keluar()
	{
		$data["title"] = "Surat Keluar";
		$data['js'] = ["assets/app/surat_keluar.js"];
		$data['expand'] = 'surat_keluar';
		$data['active'] = 'surat_keluar';
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}

	public function internal(){
		$data["title"] = "Surat Internal";
		$data['js'] = ["assets/app/surat_internal.js"];
		$data['expand'] = 'surat_internal';
		$data['active'] = 'surat_internal';
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}

	public function datatables_surat_masuk()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_masuk();
	}

	public function datatables_surat_keluar()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_keluar();
	}

	public function datatables_surat_internal()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_internal();
	}

	public function datatables_disposisi()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_disposisi();
	}

	public function detail_surat($id)
	{
		$id_surat = $this->secure->decrypt_url($id);
		$data = [
			'surat' => $this->ModelSurat->getDataById($id_surat),
			'js' => ["assets/app/surat_disposisi.js"],
		];
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/detail_surat');
		$this->load->view('include/footer');
	}

	public function add_surat()
	{
		$data["title"] = "surat masuk";
		$this->load->view('include/header', $data);
		$this->load->view('form_surat');
		$this->load->view('include/footer');
	}

	public function save()
	{
		if ($this->ModelSurat->save()) {
		}
	}
}
