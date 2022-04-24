<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Instansi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelInstansi');
	}


	public function index()
	{
		$data = [
			'title' => 'Manajemen Instansi',
			'active' => 'instansi',
			'js' => [
				'assets/app/instansi.js'
			],
		];

		$this->load->view('include/header', $data);
		$this->load->view('instansi/index', $data);
		$this->load->view('include/footer', $data);
	}

	public function datatables(){
		header('Content-Type: application/json');
		echo $this->ModelInstansi->datatables();
	}


	public function form_tambah()
	{
		$data = [
			'title' => 'Tambah Instansi',
		];

		$msg = [
			'message' => $this->load->view('instansi/form_tambah', $data, true),
		];

		echo json_encode($msg);
	}

	public function form_edit()
	{
		$id = decrypt_url($this->input->post('id'));
		$instansi = $this->ModelInstansi->getDataById($id);

		$data = [
			'title' => 'Edit Instansi',
			'instansi' => $instansi,
		];

		$msg = [
			'message' => $this->load->view('instansi/form_edit', $data, true),
		];

		echo json_encode($msg);
	}


	public function create()
	{
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'instansi' => form_error('instansi'),
					'alamat' => form_error('alamat'),
				],
			];
		} else {

			$data = [
				'instansi' => htmlspecialchars($this->input->post('instansi')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
			];

			$this->ModelInstansi->create($data);

			$msg = [
				'status' => 'success',
				'message' => 'Data berhasil di simpan!',
			];
		}

		echo json_encode($msg);
	}

	public function update()
	{
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'instansi' => form_error('instansi'),
					'alamat' => form_error('alamat'),
				],
			];
		} else {
			$id = decrypt_url($this->input->post('id'));
			$data = [
				'instansi' => htmlspecialchars($this->input->post('instansi')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
			];

			$this->ModelInstansi->update($id, $data);

			$msg = [
				'status' => 'success',
				'message' => 'Data berhasil di simpan!',
			];
		}

		echo json_encode($msg);
	}

	public function delete()
	{
		$id = decrypt_url($this->input->post('id'));
		$data = [
			'is_deleted' => 1,
			'date_deleted' => date('Y-m-d H:i:s'),
		];
		$this->ModelInstansi->delete($id, $data);

		$msg = [
			'status' => 'success',
			'message' => 'Data berhasil di hapus!',
		];


		echo json_encode($msg);
	}
}

/* End of file Jabatan.php */
