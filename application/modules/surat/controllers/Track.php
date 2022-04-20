<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Track extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ModelSurat","ModelSurat");
	}

	public function index()
	{
		$this->load->view("tracking");
	}

	public function list()
	{
		$data["surat"] = $this->ModelSurat->get_surat();
		print_r($data["surat"]);
	}
}
