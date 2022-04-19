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
		$this->load->view('include/header', $data);
		$this->load->view('list_surat');
		$this->load->view('include/footer');
	}

	public function list()
	{
		$data["surat"] = $this->ModelSurat->get_surat();
	}

	public function add_surat()
	{
		$data["title"] = "surat masuk";
		$this->load->view('include/header', $data);
		$this->load->view('form_surat');
		$this->load->view('include/footer');
	}
}
