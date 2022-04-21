<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ModelSurat","ModelSurat");
	}

	public function index()
	{
		$data["title"] = "surat masuk";
		$data["surat"] = $this->ModelSurat->get_surat();
		$data['js'] = ["assets/app/surat.js"];
		$this->load->view('include/header', $data);
		$this->load->view('list_surat');
		$this->load->view('include/footer');
	}

	public function datatables_surat_masuk()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_masuk();
	}

	public function detail_surat($id){
		$id_surat = $this->secure->decrypt_url($id);
		$data = [
			'surat' => $this->ModelSurat->getDataById($id_surat),
		];
		$this->load->view('include/header', $data);
		$this->load->view('detail_surat');
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
		if($this->ModelSurat->save())
		{
			
		}
	}
}
