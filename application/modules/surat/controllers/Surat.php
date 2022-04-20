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
		$data["css"] = array(
			"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback",
			"assets/backend/plugins/fontawesome-free/css/all.min.css",
			"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
		);
		$data["js"] = array(
			"assets/app/surat.js"
		);

		$data["title"] = "surat masuk";
		$data["surat"] = $this->ModelSurat->get_surat();
		$this->load->view('include/header', $data);
		$this->load->view('list_surat');
		$this->load->view('include/footer');
	}

	public function list()
	{
		$data["surat"] = $this->ModelSurat->get_surat();

		if($this->input->is_ajax_request())
		{
			echo $this->output
        		->set_content_type('application/json')
        		->set_output(json_encode($data["surat"]))->_display();

		} else 
		{
			print_r($data["surat"]);
		}
		
	}

	public function add_surat()
	{

		$data["js"] = array(
			"assets/js/wizard.js",
			"assets/app/input.surat.js"
		);

		$data["css"] = array(
			"assets/css/wizard.css"
		);

		$data["title"] = "surat masuk";
		$this->load->view('include/header', $data);
		$this->load->view('form_surat');
		$this->load->view('include/footer');
	}

	public function save()
	{
		if($this->ModelSurat->save())
		{
			
		}
	}
}
