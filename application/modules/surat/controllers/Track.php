<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Track extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ModelTrack","ModelTrack");
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
		$data["surat"] = $this->ModelTrack->get_surat();
		echo json_encode($data["surat"]);
	}

	public function tracking()
	{
		$nomor_surat = trim($this->input->post('nomor_surat'));
		$data["surat"] = $this->ModelTrack->get_surat($nomor_surat);
		echo json_encode($data["surat"]);
	}


}
