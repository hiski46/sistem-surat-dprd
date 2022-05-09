<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}
		
		$this->load->model("ModelLaporan");
	}

	public function index()
	{
		$data['js'] = array(
			"assets/app/surat/laporan_surat.js"
		);

		$data['expand'] = 'laporan';
		$data['active'] = 'laporan';

		$this->load->view("include/header",$data);
		$this->load->view("laporan");
		$this->load->view("include/footer");
	}

	public function get_datatables()
	{
		$data["draw"] 			 = intval($this->input->post("draw"));
		$data["recordsTotal"] 	 = $this->ModelLaporan->count_total();
		$data["recordsFiltered"] = $this->ModelLaporan->count_filtered();

		$laporan = $this->ModelLaporan->get_datatables();

		$datatable = array();
		foreach ($laporan as $surat) {
			$surat["sec_id"] = encrypt_url($surat["id"]);
			$datatable[] = $surat;
		}
		$data["data"]	= $datatable;
		echo (json_encode($data));
	}

	public function generate_pdf()
	{
		// print("Page of Generate PDF Report");
		$mpdf = new \Mpdf\Mpdf();

		$html = 'Hello World';

		$mpdf->Bookmark('Cetak Laporan');
		$mpdf->WriteHTML($html);
		$mpdf->Output();

	}

	public function generate_excel()
	{
		
	}

}
