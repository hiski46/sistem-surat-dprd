<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}

		$this->load->model("ModelSurat", "ModelSurat");
		$this->load->library('form_validation');
	}

	public function view($tipe_surat = 'masuk')
	{
		$data["title"] = "Daftar Surat ".$tipe_surat;
		$data['expand'] = 'surat_'.$tipe_surat;
		$data['active'] = 'surat_'.$tipe_surat;
		$data['tipe_surat'] = $tipe_surat;

		$data['js'] = ["assets/app/surat/surat_".$tipe_surat.".js"];

		// if ($tipe_surat == "keluar") {
		// 	$data['js'] = ["assets/app/surat/surat_keluar.js"];
		// } else if ($tipe_surat == "internal") {
		// 	$data['js'] = ["assets/app/surat/surat_internal.js"];
		// } {
		// 	$data['js'] = ["assets/app/surat/surat_masuk.js"];
		// }

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/list_surat');
		$this->load->view('include/footer');
	}


	// public function masuk()
	// {
	// 	$data["title"] = "Surat Masuk";
	// 	$data['js'] = ["assets/app/surat/surat_masuk.js"];
	// 	$data['expand'] = 'surat_masuk';
	// 	$data['active'] = 'surat_masuk';
	// 	$data['tipe_surat'] = 'masuk';
	// 	$this->load->view('include/header', $data);
	// 	$this->load->view('surat_v/list_surat');
	// 	$this->load->view('include/footer');
	// }

	// public function keluar()
	// {
	// 	$data["title"] = "Surat Keluar";
	// 	$data['js'] = ["assets/app/surat/surat_keluar.js"];
	// 	$data['expand'] = 'surat_keluar';
	// 	$data['active'] = 'surat_keluar';
	// 	$data['tipe_surat'] = 'keluar';
	// 	$this->load->view('include/header', $data);
	// 	$this->load->view('surat_v/list_surat');
	// 	$this->load->view('include/footer');
	// }

	// public function internal()
	// {
	// 	$data["title"] = "Surat Internal";
	// 	$data['js'] = ["assets/app/surat/surat_internal.js"];
	// 	$data['expand'] = 'surat_internal';
	// 	$data['active'] = 'surat_internal';
	// 	$data['tipe_surat'] = 'internal';
	// 	$this->load->view('include/header', $data);
	// 	$this->load->view('surat_v/list_surat');
	// 	$this->load->view('include/footer');
	// }

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
		$id_surat = decrypt_url($this->input->post('id_surat'));
		echo $this->ModelSurat->datatables_disposisi($id_surat);
	}

	public function add_surat($tipe_surat = "masuk")
	{
		$this->load->model(['ModelInstansi', 'ModelJabatan']);

		$data = array(
			'title' => 'Tambah Surat',
			'tipe_surat' => $tipe_surat,
			'js' => ["assets/app/surat/surat_create.js"],
			'jabatan' => $this->ModelJabatan->getAll(),
			'instansi' => $this->ModelInstansi->getAll(),
		);

		$this->load->view('include/header',$data);
		$this->load->view('surat_v/form_tambah');
		$this->load->view('include/footer');
	}

	public function edit_surat($tipe_surat = "masuk", $id)
	{
		$this->load->model(['ModelInstansi', 'ModelJabatan']);
		$id_surat = decrypt_url($id);
		$data = array(
			'title' => 'Edit Surat',
			'js' => ["assets/app/surat/surat_edit.js"],
			'tipe_surat' => $tipe_surat,
			'jabatan' => $this->ModelJabatan->getAll(),
			'instansi' => $this->ModelInstansi->getAll(),
			'surat' => $this->ModelSurat->getDataById($id_surat),
		);

		$this->load->view('include/header', $data);
		$this->load->view('surat_v/form_edit');
		$this->load->view('include/footer');
	}

	public function detail_surat($id)
	{
		$id_surat = decrypt_url($id);

		$data = [
			'surat' => $this->ModelSurat->getDetailSurat($id_surat),
			'js' => ["assets/app/surat/surat_detail.js"],
		];
		
		// var_dump($data);die;
		$this->load->view('include/header', $data);
		$this->load->view('surat_v/detail_surat');
		$this->load->view('include/footer');
	}

	public function create()
	{
		$tipe_surat = $this->input->post('tipe_surat');
		$this->validation();

		if ($this->form_validation->run() == false) {
			$this->add_surat($tipe_surat);
		} else {
			$config['upload_path']          = FCPATH . '/writable/upload/surat/';
			$config['allowed_types']        = 'pdf|jpg|png|jpeg';
			// $config['file_name']            = strtotime("now");
			$config['max_size']             = 2048;
			$config['encrypt_name'] 		= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$uploaded_data = $this->upload->data();
				$data = [
					'tipe_surat' => $this->input->post('tipe_surat'),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'nomor_agenda' => $this->input->post('nomor_agenda'),
					'tanggal_surat' => $this->input->post('tanggal_surat') . ' 00:00:00',
					'isi' => $this->input->post('isi'),
					'tanggal_diterima' => $this->input->post('tanggal_diterima') . ' 00:00:00',
					'sifat_surat' => $this->input->post('sifat_surat'),
					'kecepatan_surat' => $this->input->post('kecepatan_surat'),
					'asal_surat' => $this->input->post('asal_surat'),
					'tujuan_surat' => $this->input->post('tujuan_surat'),
					'file' => $uploaded_data['file_name'],
					'status_surat' => 'diterima',
					'penerima' => decrypt_url($this->session->userdata('id_user')),
				];

				$this->ModelSurat->create($data);

				$this->session->set_flashdata('message', 'Data berhasil di simpan!');

				if ($this->input->post('tipe_surat') == 'masuk') {
					redirect(site_url('surat/Surat/view/masuk'));
				} elseif ($this->input->post('tipe_surat') == 'keluar') {
					redirect(site_url('surat/Surat/view/keluar'));
				} else {
					redirect(site_url('surat/Surat/view/internal'));
				}
			}
		}
	}

	public function check_nomor_surat(){
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'is_unique[surat.nomor_surat]');

		if ($this->form_validation->run() == false) {
			$msg = [
				'status' => 'error',
				'message' => 'Nomor surat ini sudah ada didalam sistem',
			];
		}else {
			$msg = [
				'status' => 'success',
				'message' => 'success'
			];
		}

		echo json_encode($msg);
	}

	public function update()
	{
		$tipe_surat = $this->input->post('tipe_surat');
		$id_surat = decrypt_url($this->input->post('id_surat'));
		$this->validation();
		
		// var_dump($tipe_surat);var_dump($id_surat);die;
		if ($this->form_validation->run() == false) {
			$this->edit_surat($tipe_surat, $id_surat);
		} else {
			$config['upload_path']          = FCPATH . '/writable/upload/surat/';
			$config['allowed_types']        = 'pdf|jpg|png|jpeg';
			// $config['file_name']            = strtotime("now");
			$config['max_size']             = 2048;
			$config['encrypt_name'] 		= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$data_lama = $this->ModelSurat->getDataById($id_surat);
				unlink('writable/upload/surat/' . $data_lama->file);
				$uploaded_data = $this->upload->data();
				$data = [
					'tipe_surat' => $this->input->post('tipe_surat'),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'nomor_agenda' => $this->input->post('nomor_agenda'),
					'tanggal_surat' => $this->input->post('tanggal_surat') . ' 00:00:00',
					'isi' => $this->input->post('isi'),
					'tanggal_diterima' => $this->input->post('tanggal_diterima') . ' 00:00:00',
					'sifat_surat' => $this->input->post('sifat_surat'),
					'kecepatan_surat' => $this->input->post('kecepatan_surat'),
					'asal_surat' => $this->input->post('asal_surat'),
					'tujuan_surat' => $this->input->post('tujuan_surat'),
					'file' => $uploaded_data['file_name'],
					'status_surat' => 'diterima',
					// 'penerima' => $this->session->userdata('nama_lengkap'),
				];

				$this->ModelSurat->update($id_surat, $data);

				$this->session->set_flashdata('message', 'Data berhasil di simpan!');

				if ($this->input->post('tipe_surat') == 'masuk') {
					redirect(site_url('surat/Surat/view/masuk'));
				} elseif ($this->input->post('tipe_surat') == 'keluar') {
					redirect(site_url('surat/Surat/view/keluar'));
				} else {
					redirect(site_url('surat/Surat/view/internal'));
				}
			}else {
				$data = [
					'tipe_surat' => $this->input->post('tipe_surat'),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'nomor_agenda' => $this->input->post('nomor_agenda'),
					'tanggal_surat' => $this->input->post('tanggal_surat') . ' 00:00:00',
					'isi' => $this->input->post('isi'),
					'tanggal_diterima' => $this->input->post('tanggal_diterima') . ' 00:00:00',
					'sifat_surat' => $this->input->post('sifat_surat'),
					'kecepatan_surat' => $this->input->post('kecepatan_surat'),
					'asal_surat' => $this->input->post('asal_surat'),
					'tujuan_surat' => $this->input->post('tujuan_surat'),
					'status_surat' => 'diterima',
					// 'penerima' => $this->session->userdata('nama_lengkap'),
				];

				$this->ModelSurat->update($id_surat, $data);

				$this->session->set_flashdata('message', 'Data berhasil di simpan!');

				if ($this->input->post('tipe_surat') == 'masuk') {
					redirect(site_url('surat/Surat/view/masuk'));
				} elseif ($this->input->post('tipe_surat') == 'keluar') {
					redirect(site_url('surat/Surat/view/keluar'));
				} else {
					redirect(site_url('surat/Surat/view/internal'));
				}
			}
		}
	}

	public function selesai($id)
	{
		$id_Surat = decrypt_url($id);
		$row_surat = $this->ModelSurat->getDataById($id_Surat);

		$data = [
			'status_surat' => 'selesai',
		];

		$this->ModelSurat->update($id_Surat, $data);

		redirect(site_url('surat/Surat/detail_surat/' . encrypt_url($row_surat->id)));
	}

	public function delete()
	{
		$id = decrypt_url($this->input->post('id'));
		$data = [
			'is_deleted' => 1,
			'date_deleted' => date('Y-m-d H:i:s'),
		];
		$this->ModelSurat->delete($id, $data);

		$msg = [
			'status' => 'success',
			'message' => 'Data berhasil di hapus!',
		];


		echo json_encode($msg);
	}


	private function validation()
	{
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('nomor_agenda', 'Nomor Agenda', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('isi', 'Isi Surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'trim|required');
		$this->form_validation->set_rules('sifat_surat', 'Sifat Surat', 'trim|required');
		$this->form_validation->set_rules('kecepatan_surat', 'Kecepatan Surat', 'trim|required');
		$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'trim|required');
		$this->form_validation->set_rules('tujuan_surat', 'Tujuan Surat', 'trim|required');
		// $this->form_validation->set_rules('file', 'File Surat', 'required');
		// $this->form_validation->set_rules('penerima', 'Penerima Surat', 'trim|required');
		$this->form_validation->set_error_delimiters('<small><span class="text-danger">', '</span></small>');
	}
}
