<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => 'Disposisi'
		];

		$this->load->view('template/header', $data);
		$this->load->view('disposisi');
		$this->load->view('template/footer');
	}

}

/* End of file Disposisi.php */
