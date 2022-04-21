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
			'title' => 'Instansi',
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


	public function addData()
	{
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('parent', 'Parent', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$error = [
				'jabatan' => form_error('jabatan'),
				'parent' => form_error('parent')
			];
			echo json_encode([
				'status' => 'error',
				'data' => $error
			], true);
		} else {

			$data = [
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'parent' => htmlspecialchars($this->input->post('parent'))
			];

			$this->ModelJabatan->addData($data);

			echo json_encode([
				'status' => 'success',
				'message' => 'Data berhasil ditambahkan'
			], true);
		}
	}


	public function getBy($id){

	}


	public function updateData(){}

	public function get_ajax()
	{
		$row = $this->ModelJabatan->getAll();
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
			$row1[$key]['text'] = $value['jabatan'] . '<div class="float-right"><button data-id="' . $value['id'] . '" class="btn btn-xs btn-primary ml-2 mr-2 btn-tambah"><i class="glyphicon glyphicon-plus"></i></button><button data-id="' . $value['id'] . '" class="btn btn-xs btn-warning ml-2 mr-2 btn-edit"><i class="glyphicon glyphicon-pencil"></i></button><button data-id="' . $value['id'] . '" class="btn btn-xs btn-danger ml-2 mr-2 btn-hapus"><i class="glyphicon glyphicon-trash"></i></button></div>';
			$row1[$key]['nodes'] = array_values($this->membersTree($value['id']));
		}

		return $row1;
	}
}

/* End of file Jabatan.php */
