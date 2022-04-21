<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelDisposisi');
	}

	public function index()
	{
		$data = [
			'title' => 'Disposisi Surat'
		];

		$this->load->view('template/header', $data);
		$this->load->view('disposisi');
		$this->load->view('template/footer');
	}

	public function datatables()
	{
		header('Content-Type: application/json');
		echo $this->ModelDisposisi->datatables();
	}

}

/* End of file Disposisi.php */
