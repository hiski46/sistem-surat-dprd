<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}
		$this->load->model(['ModelInstansi', 'ModelJabatan', 'ModelSurat', 'ModelDisposisi']);
	}

	// public function index()
	// {
	// 	$data = [
	// 		'title' => 'Disposisi Surat'
	// 	];

	// 	$this->load->view('template/header', $data);
	// 	$this->load->view('disposisi');
	// 	$this->load->view('template/footer');
	// }
	public function view($tipe_surat = 'masuk')
	{
		$data["title"] = "Daftar Disposisi " . $tipe_surat;
		$data['expand'] = 'surat_' . $tipe_surat;
		$data['active'] = 'disposisi_' . $tipe_surat;
		$data['tipe_surat'] = $tipe_surat;

		$data['js'] = ["assets/app/surat/disposisi_" . $tipe_surat . ".js"];

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_disposisi');
		$this->load->view('include/footer');
	}

	public function datatables()
	{
		header('Content-Type: application/json');
		$tipe_surat = $this->input->post('tipe_surat');
		echo $this->ModelDisposisi->datatables($tipe_surat);
	}

	public function disposisi_surat($id)
	{
		
		$id_surat = decrypt_url($id);
		$data_surat = $this->ModelSurat->surat_disposisi($id_surat);

		$data = [
			'title' => 'Disposisi Surat',
			'disposisi' => $data_surat,
			'js' => ["assets/app/surat/disposisi_surat.js"],
			'jabatan' => $this->ModelJabatan->getAll(),
			'instansi' => $this->ModelInstansi->getAll(),
			'surat' => $this->ModelSurat->getDataById($id_surat),
			'tipe_disposisi' => $this->ModelDisposisi->get_tipe_disposisi(),
		];
		// echo json_encode($data);die;

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/disposisi_surat');
		$this->load->view('include/footer');
	}

	public function disposisikan_surat()
	{
		$id_Surat = decrypt_url($this->input->post('id_surat'));
		$this->validation();

		if ($this->form_validation->run() == false) {
			$this->disposisi_surat(encrypt_url($id_Surat));
		} else {

			$data = [
				'id_surat' =>$id_Surat,
				'tujuan_disposisi' => $this->input->post('tujuan_disposisi'),
				'tipe_disposisi' => $this->input->post('tipe_disposisi'),
				'tanggal_disposisi' => $this->input->post('tanggal_disposisi') . ' 00:00:00',
				'disposisi' => $this->input->post('disposisi'),
			];

			$this->ModelDisposisi->create($data);
			$this->ModelSurat->update($id_Surat, ['status_surat' => 'diproses']);

			$this->session->set_flashdata('message', 'Data berhasil di simpan!');

			redirect(site_url('surat/Surat/detail_surat/' . encrypt_url($id_Surat)));
		}
	}

	

	private function validation()
	{
		$this->form_validation->set_rules('tujuan_disposisi', 'tujuan disposisi', 'trim|required');
		$this->form_validation->set_rules('tipe_disposisi', 'tipe disposisi', 'trim|required');
		$this->form_validation->set_rules('tanggal_disposisi', 'tanggal disposisi', 'trim|required');
		$this->form_validation->set_rules('disposisi', 'isi disposisi', 'trim|required');
		$this->form_validation->set_error_delimiters('<small><span class="text-danger">', '</span></small>');
	}
}

/* End of file Disposisi.php */
