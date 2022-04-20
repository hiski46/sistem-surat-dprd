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
		$data["css"] = array(
			"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback",
			"assets/backend/plugins/fontawesome-free/css/all.min.css",
			"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
		);
		$data["js"] = array(
			"assets/app/surat.js"
		);

		$data["title"] = "surat masukx";
		$data["surat"] = $this->ModelSurat->get_surat();
		$this->load->view('include/header', $data);
		$this->load->view('list_surat');
		$this->load->view('include/footer');
	}

	public function list()
	{
		$data = array();
		$list_surat = $this->ModelSurat->get_surat();

		foreach ($list_surat as $key => $surat) {
			$temp_surat["no_surat"] = $surat["nomor_surat"];
			$temp_surat["tanggal_surat"] = $surat["tanggal_surat"];
			$temp_surat["isi_surat"] = $surat["isi_surat"];

			$data[] = $temp_surat;
		}

		if($this->input->is_ajax_request())
		{

			$response["draw"] = 1; 
			$response["recordsTotal"] = 20; 
			$response["recordsFiltered"] = 20; 
			$response["data"] = $data; 
			echo json_encode($response);

		} else 
		{
			$response["data"] = $data;
			echo json_encode($response, JSON_FORCE_OBJECT);
		}
		
	}

	public function add_surat()
	{

		$data["js"] = array(
			"assets/js/wizard.js",
			"assets/app/input.surat.js"
		);

		$data["css"] = array(
			"assets/css/wizard.css"
		);

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
