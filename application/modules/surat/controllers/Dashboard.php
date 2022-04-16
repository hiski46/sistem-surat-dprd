<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{

		$this->load->library('ion_auth');
		$this->ion_auth->login('admin@admin.com', 'password', TRUE);
	   if (!$this->ion_auth->logged_in())
	   {
		 exit('You Must be Logged in ');
	   } 

		$data = [
			'title' => 'Dasboard'
		];

		$this->load->view('template/header', $data);
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}
}

/* End of file Dashboard.php */
