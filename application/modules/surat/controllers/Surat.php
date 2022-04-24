<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ModelSurat", "ModelSurat");
		$this->load->library('form_validation');
	}

	// public function index($tipe)
	// {
	// 	$data["title"] = "surat masuk";
	// 	$data["surat"] = $this->ModelSurat->get_surat();
	// 	$data['js'] = ["assets/app/surat/surat.js"];
	// 	$this->load->view('include/header', $data);
	// 	$this->load->view('surat_masuk/list_surat');
	// 	$this->load->view('include/footer');
	// }

	public function masuk()
	{
		$data["title"] = "Surat Masuk";
		$data['js'] = ["assets/app/surat/surat_masuk.js"];
		$data['expand'] = 'surat_masuk';
		$data['active'] = 'surat_masuk';
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}

	public function keluar()
	{
		$data["title"] = "Surat Keluar";
		$data['js'] = ["assets/app/surat/surat_keluar.js"];
		$data['expand'] = 'surat_keluar';
		$data['active'] = 'surat_keluar';
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}

	public function internal(){
		$data["title"] = "Surat Internal";
		$data['js'] = ["assets/app/surat/surat_internal.js"];
		$data['expand'] = 'surat_internal';
		$data['active'] = 'surat_internal';
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}

	public function datatables_surat_masuk()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_masuk();
	}

	public function datatables_surat_keluar()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_keluar();
	}

	public function datatables_surat_internal()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_surat_internal();
	}

	public function datatables_disposisi()
	{
		header('Content-Type: application/json');
		echo $this->ModelSurat->datatables_disposisi();
	}

	public function add(){
		$this->load->model(['ModelInstansi', 'ModelJabatan']);
		
		$data = [
			'title' => 'Tambah Surat',
			'js' => ["assets/app/surat/surat_create.js"],
			'jabatan' => $this->ModelJabatan->getAll(),
			'instansi' => $this->ModelInstansi->getAll(),
		];

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/form_tambah');
		$this->load->view('include/footer');

	}

	public function detail_surat($id)
	{
		$id_surat = $this->secure->decrypt_url($id);
		$data = [
			'surat' => $this->ModelSurat->getDataById($id_surat),
			'js' => ["assets/app/surat/surat_detail.js"],
		];
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/detail_surat');
		$this->load->view('include/footer');
	}


	public function create()
	{
		$this->validation();

		if ($this->form_validation->run() == false) {
			$this->add();
		}else {
			$config['upload_path']          = FCPATH . '/writable/upload/surat/';
			$config['allowed_types']        = 'pdf|jpg|png|jpeg';
			$config['file_name']            = strtotime("now");
			$config['max_size']             = 2048;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$uploaded_data = $this->upload->data();
				$data = [
					'tipe_surat' => $this->input->post('tipe_surat'),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'tanggal_surat' => $this->input->post('tanggal_surat') . ' 00:00:00',
					'isi' => $this->input->post('isi'),
					'tanggal_diterima' => $this->input->post('tanggal_diterima') . ' 00:00:00',
					'sifat_surat' => $this->input->post('sifat_surat'),
					'kecepatan_surat' => $this->input->post('kecepatan_surat'),
					'asal_surat' => $this->input->post('asal_surat'),
					'tujuan_surat' => $this->input->post('tujuan_surat'),
					'file' => $uploaded_data['file_name'],
					'status_surat' => 'diterima',
					'penerima' => $this->input->post('penerima'),
				];
	
				$this->ModelSurat->create($data);

				$this->session->set_flashdata('message', 'Data berhasil di simpan!');
	
				if ($this->input->post('tipe_surat') == 'masuk') {
					redirect(site_url('surat/masuk'));
				}elseif ($this->input->post('tipe_surat') == 'keluar') {
					redirect(site_url('surat/keluar'));
				}else {
					redirect(site_url('surat/internal'));
				}
			}

		}

	}

	public function ubah_status_surat($id, $status){
		$data = [
			'status_surat' => $status,
		];
		$this->ModelSurat->update($id, $data);
	}

	private function validation(){
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('isi', 'Isi Surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'trim|required');
		$this->form_validation->set_rules('sifat_surat', 'Sifat Surat', 'trim|required');
		$this->form_validation->set_rules('kecepatan_surat', 'Kecepatan Surat', 'trim|required');
		$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'trim|required');
		$this->form_validation->set_rules('tujuan_surat', 'Tujuan Surat', 'trim|required');
		// $this->form_validation->set_rules('file', 'File Surat', 'required');
		$this->form_validation->set_rules('penerima', 'Penerima Surat', 'trim|required');
		$this->form_validation->set_error_delimiters('<small><span class="text-danger">', '</span></small>');
	}
}
