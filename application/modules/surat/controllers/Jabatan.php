<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelJabatan');
		$this->load->library(['form_validation']);
	}


	public function index()
	{
		$data = [
			'title' => 'Jabatan',
		];

		$this->load->view('template/header', $data);
		$this->load->view('jabatan');
		$this->load->view('template/footer');
	}

	public function getData()
	{
		if ($this->ion_auth->is_admin()){
			$results = $this->ModelJabatan->getDataTable();

			$data = [];
			$no = $_POST['start'];
			foreach ($results as $key => $result) {
				$row = array();
				$row[] = ++$no;
				$row[] = $result->jabatan;
				$row[] = $result->parent;
				$row[] = '
				<a href="#form" class="btn btn-info btn-sm mr-1" data-toggle="modal" onclick="byid(' ."'". $result->id ."', 'edit'". ')">Edit<a/>
				';
				$data[] = $row;
			}
	
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->ModelJabatan->count_all_data(),
				"recordsFiltered" => $this->ModelJabatan->count_filtered_data(),
				"data" => $data
			);
	
			echo json_encode($output);
		}

	
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
}

/* End of file Jabatan.php */
