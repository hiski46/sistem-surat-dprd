<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelJabatan');
	}


	public function index()
	{
		$data = [
			'title' => 'Jabatan',
			'active' => 'jabatan',
			'js' => [
				'assets/app/jabatan.js'
			],
		];

		$this->load->view('include/header', $data);
		$this->load->view('jabatan/index');
		$this->load->view('include/footer');
	}

	public function form_tambah()
	{
		$parent = decrypt_url($this->input->post('parent'));
		$jabatan = $this->ModelJabatan->getDataById($parent);

		$data = [
			'title' => 'Tambah Jabatan',
			'parent' => ($parent == '') ? encrypt_url(0) : encrypt_url($parent),
			'jabatan' => $jabatan,
		];

		$msg = [
			'message' => $this->load->view('jabatan/form_tambah', $data, true),
		];

		echo json_encode($msg);
	}

	public function form_edit()
	{
		$id = decrypt_url($this->input->post('id'));
		$jabatan = $this->ModelJabatan->getDataById($id);
		$list_jabatan = $this->ModelJabatan->getAll();

		$data = [
			'title' => 'Edit Jabatan',
			'jabatan' => $jabatan,
			'list_jabatan' => $list_jabatan,
		];

		$msg = [
			'message' => $this->load->view('jabatan/form_edit', $data, true),
		];

		echo json_encode($msg);
	}


	public function create()
	{
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'jabatan' => form_error('jabatan'),
				],
			];
		} else {

			$data = [
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'parent' => htmlspecialchars(decrypt_url($this->input->post('parent')))
			];

			$this->ModelJabatan->create($data);

			$msg = [
				'status' => 'success',
				'message' => 'Data berhasil di simpan!',
			];
		}

		echo json_encode($msg);
	}

	public function update()
	{
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('parent', 'Parent', 'required');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'jabatan' => form_error('jabatan'),
					'parent' => form_error('parent'),
				],
			];
		} else {
			$id = decrypt_url($this->input->post('id'));
			$data = [
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'parent' => decrypt_url($this->input->post('parent'))
			];

			$this->ModelJabatan->update($id, $data);

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
		$this->ModelJabatan->delete($id, $data);

		$msg = [
			'status' => 'success',
			'message' => 'Data berhasil di hapus!',
		];


		echo json_encode($msg);
	}

	public function get_ajax()
	{
		$row = $this->ModelJabatan->getData();
		$data = [];
		$parent_key = '0';
		// $row = $this->db->query('SELECT id, name from item');

		if ($row->num_rows() > 0) {
			$data = $this->membersTree($parent_key);
		} else {
			$data = ["id" => "0", "name" => "No Members presnt in list", "text" => "No Members is presnt in list", "nodes" => []];
		}

		echo json_encode(array_values($data));
	}

	public function membersTree($parent_key)
	{
		$row1 = [];
		// $row = $this->db->query('SELECT id, name from item WHERE parent_id="' . $parent_key . '"')->result_array();
		$row = $this->ModelJabatan->getByParrent($parent_key);

		foreach ($row as $key => $value) {
			// $id = $value['id'];
			$row1[$key]['id'] = $value['id'];
			$row1[$key]['name'] = $value['jabatan'];
			$row1[$key]['text'] = $value['jabatan'] . '<div class="float-right"><button data-id="' . encrypt_url($value['id']) . '" onclick="form_tambah(this)" class="btn btn-xs btn-primary ml-2 mr-2 btn-tambah"><i class="glyphicon glyphicon-plus"></i></button><button data-id="' . encrypt_url($value['id']) . '" onclick="form_edit(this)" class="btn btn-xs btn-warning ml-2 mr-2 btn-edit"><i class="glyphicon glyphicon-pencil"></i></button><button data-id="' . encrypt_url($value['id']) . '" onclick="hapus(this)" class="btn btn-xs btn-danger ml-2 mr-2 btn-hapus"><i class="glyphicon glyphicon-trash"></i></button></div>';
			$row1[$key]['nodes'] = array_values($this->membersTree($value['id']));
		}

		return $row1;
	}
}

/* End of file Jabatan.php */
