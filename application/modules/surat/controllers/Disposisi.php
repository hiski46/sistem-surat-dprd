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
		$data_disposisi = $this->ModelDisposisi->getDisposisiByIdSurat($id_surat);

		$tujuan = array();
		foreach ($data_disposisi as $val) {
			// array_push($tujuan, $val->tujuan_disposisi);
			$tujuan[] = $val->tujuan_disposisi;
		}

		// echo '<pre>';
		// var_dump($tujuan);die;

		$data = [
			'title' => 'Disposisi Surat',
			'js' => ["assets/app/surat/disposisi_surat.js"],
			'jabatan' => $this->ModelJabatan->getNotIn($tujuan),
			'instansi' => $this->ModelInstansi->getNotIn($tujuan),
			'surat' => $this->ModelSurat->getDataById($id_surat),
			'tipe_disposisi' => $this->ModelDisposisi->get_tipe_disposisi(),
		];

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/disposisi_surat');
		$this->load->view('include/footer');
	}

	public function disposisikan_surat()
	{
		$this->load->model('ModelUsers');
		$id_surat = decrypt_url($this->input->post('id_surat'));
		$data_disposisi = $this->ModelDisposisi->getDisposisiByIdSurat($id_surat);
		$data_user_login = $this->ModelUsers->getDataById(decrypt_url($this->session->userdata('id_user')));
		
		if (!empty($data_disposisi)) {
			$asal_disposisi = $data_disposisi[0]->tujuan_disposisi;
		}else {
			$asal_disposisi = $data_user_login->id_jabatan;
		}

		$this->validation();

		if ($this->form_validation->run() == false) {
			$this->disposisi_surat(encrypt_url($id_surat));
		} else {

			$data = [
				'id_surat' =>$id_surat,
				'asal_disposisi' => $asal_disposisi,
				'tujuan_disposisi' => $this->input->post('tujuan_disposisi'),
				'tipe_disposisi' => $this->input->post('tipe_disposisi'),
				// 'tanggal_disposisi' => date('Y-m-d H:i:s'),
				'disposisi' => $this->input->post('disposisi'),
			];

			$this->ModelDisposisi->create($data);
			$this->ModelSurat->update($id_surat, ['status_surat' => 'diproses']);

			$this->session->set_flashdata('message', 'Data berhasil di simpan!');

			redirect(site_url('surat/Surat/detail_surat/' . encrypt_url($id_surat)));
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tujuan_disposisi', 'tujuan disposisi', 'trim|required');
		$this->form_validation->set_rules('tipe_disposisi', 'tipe disposisi', 'trim|required');
		// $this->form_validation->set_rules('tanggal_disposisi', 'tanggal disposisi', 'trim|required');
		$this->form_validation->set_rules('disposisi', 'isi disposisi', 'trim|required');
		$this->form_validation->set_error_delimiters('<small><span class="text-danger">', '</span></small>');
	}
}

/* End of file Disposisi.php */
