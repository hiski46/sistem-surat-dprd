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
		$this->load->view("frontend/header");
		$this->load->view("tracking");
		$this->load->view("frontend/footer");
	}

	public function list()
	{
		$data["surat"] = $this->ModelSurat->get_surat();
		print_r($data["surat"]);
	}
}
