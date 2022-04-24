<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];
		$data["js"] = array("assets/app/tracking_surat.js");

		$this->load->view('include/header', $data);
		$this->load->view('dashboard');
		$this->load->view('include/footer');
	}
}

/* End of file Dashboard.php */
