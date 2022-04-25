<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}

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

	public function disposisi_surat($id){
		$this->load->model(['ModelInstansi', 'ModelJabatan', 'ModelSurat']);
		$id_surat = decrypt_url($id);
		$data_surat = $this->ModelDisposisi->disposisi_surat($id_surat);

		$data = [
			'title' => 'Disposisi Surat',
			'disposisi' => $data_surat,
			'jabatan' => $this->ModelJabatan->getAll(),
			'instansi' => $this->ModelInstansi->getAll(),
			'surat' => $this->ModelSurat->getDataById($id_surat),
			'tipe_disposisi' => $this->ModelDisposisi->get_tipe_disposisi(),
		];

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/disposisi_surat');
		$this->load->view('include/footer');

	}

}

/* End of file Disposisi.php */
