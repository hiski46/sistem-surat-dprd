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
		$this->load->view('template/header', $data);
		$this->list();
		$this->load->view('template/footer');
	}

	public function list()
	{
		$data["surat"] = $this->ModelSurat->get_surat();
		print_r($data["surat"]);
	}
}
