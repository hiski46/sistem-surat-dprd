<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Track extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ModelTrack","ModelTrack");
		$this->load->model("ModelDisposisi");
	}

	public function index()
	{
		$data['js'] = array(
			"assets/app/surat/tracking_surat.js"
		);

		$this->load->view("frontend/header",$data);
		$this->load->view("tracking");
		$this->load->view("frontend/footer");
	}

	public function ajax_track()
	{
		$nomor_surat = trim($this->input->post('nomor_surat'));
		$data["surat"] = $this->ModelTrack->get_surat($nomor_surat);
		if (!is_null($data["surat"]) && (count($data["surat"]) > 0)) {
			$data["disposisi"] = $this->ModelDisposisi->getDisposisiByIdSurat($data["surat"]["id"]);
			$response["data"] = $this->load->view("tracking_response",$data,true);
		} else {
			$response["data"] = "<h3 class='text-center'>Data tidak ditemukan</h3>";
		}
		echo json_encode($response);
	}

}
