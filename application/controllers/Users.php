<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}

		if (is_admin() == false) {
			redirect(site_url('dashboard'));
		}
		
		$this->load->model('ModelUsers');
	}

	public function index()
	{
		$data = [
			'title' => 'Manajemen Users',
			'expand' => 'master_data',
			'active' => 'users',
			'js' => [
				'assets/app/users/users.js'
			],
		];

		$this->load->view('include/header', $data);
		$this->load->view('users/index');
		$this->load->view('include/footer');
	}

	public function datatables()
	{
		header('Content-Type: application/json');
		echo $this->ModelUsers->datatables();
	}


	public function form_tambah()
	{
		$jabatan = $this->db->get('jabatan')->result();
		$data = [
			'title' => 'Tambah Users',
			'jabatan' => $jabatan,
		];

		$msg = [
			'message' => $this->load->view('users/form_tambah', $data, true),
		];

		echo json_encode($msg);
	}

	public function form_edit()
	{
		$id = decrypt_url($this->input->post('id'));
		$user = $this->ModelUsers->getDataById($id);
		$jabatan = $this->db->get('jabatan')->result();
		$data = [
			'title' => 'Edit User',
			'user' => $user,
			'jabatan' => $jabatan,
		];

		$msg = [
			'message' => $this->load->view('users/form_edit', $data, true),
		];

		echo json_encode($msg);
	}

	public function form_detail()
	{
		$id = decrypt_url($this->input->post('id'));
		$user = $this->ModelUsers->getDataById($id);

		$data = [
			'title' => 'Detail User',
			'user' => $user,
		];

		$msg = [
			'message' => $this->load->view('users/form_detail', $data, true),
		];

		echo json_encode($msg);
	}

	public function form_ubah_password()
	{
		$id = decrypt_url($this->input->post('id'));
		$data = [
			'title' => 'Ubah Password',
			'id' => $id,
		];

		$msg = [
			'message' => $this->load->view('users/form_ubah_password', $data, true),
		];

		echo json_encode($msg);
	}

	public function ubah_password()
	{
		$this->form_validation->set_rules('password_lama', 'password lama', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('ulangi_password', 'ulangi password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'password_lama' => form_error('password_lama'),
					'password' => form_error('password'),
					'ulangi_password' => form_error('ulangi_password'),
				],
			];
		} else {
			$id = decrypt_url($this->input->post('id'));
			$user = $this->ModelUsers->getDataById($id);
			$password = $this->input->post('password_lama');
			if (password_verify($password, $user->password)) {
				$data = [
					'password' => password_hash($password, PASSWORD_DEFAULT),
				];
	
				$this->ModelUsers->update($id, $data);
	
				$msg = [
					'status' => 'success',
					'message' => 'Data berhasil di simpan!',
				];
			}else {
				$msg = [
					'error' => [
						'password_lama' => 'Password lama tidak sesuai',
					],
				];
			}
		}

		echo json_encode($msg);
	}

	public function detail($id_user){
		$id = decrypt_url($id_user);
		$user = $this->ModelUsers->getDataById($id);

		$data = [
			'title' => 'Detail User',
			'user' => $user,
			'js' => [
				'assets/app/users/users.js'
			],
		];

		$this->load->view('include/header', $data);
		$this->load->view('users/detail');
		$this->load->view('include/footer');
	}

	public function create()
	{
		$this->_validation('create');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'nama_lengkap' => form_error('nama_lengkap'),
					'username' => form_error('username'),
					'password' => form_error('password'),
					'ulangi_password' => form_error('ulangi_password'),
					'nip' => form_error('nip'),
					'jabatan' => form_error('jabatan'),
					'level' => form_error('level'),
					'blokir' => form_error('blokir'),
				],
			];
		} else {

			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nip' => htmlspecialchars($this->input->post('nip')),
				'id_jabatan' => htmlspecialchars(decrypt_url($this->input->post('jabatan'))),
				'level' => htmlspecialchars($this->input->post('level')),
				'blokir' => htmlspecialchars($this->input->post('blokir')),
			];

			$this->ModelUsers->create($data);
			
			$msg = [
				'status' => 'success',
				'message' => 'Data berhasil di simpan!',
			];
		}

		echo json_encode($msg);
	}

	public function update()
	{
		$this->_validation('update');
		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'nama_lengkap' => form_error('nama_lengkap'),
					'username' => form_error('username'),
					'password' => form_error('password'),
					'ulangi_password' => form_error('ulangi_password'),
					'nip' => form_error('nip'),
					'jabatan' => form_error('jabatan'),
					'level' => form_error('level'),
					'blokir' => form_error('blokir'),
				],
			];
		} else {
			$id = decrypt_url($this->input->post('id'));
			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nip' => htmlspecialchars($this->input->post('nip')),
				'id_jabatan' => htmlspecialchars(decrypt_url($this->input->post('jabatan'))),
				'level' => htmlspecialchars($this->input->post('level')),
				'blokir' => htmlspecialchars($this->input->post('blokir')),
			];

			$this->ModelUsers->update($id, $data);

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
		$this->ModelUsers->delete($id, $data);

		$msg = [
			'status' => 'success',
			'message' => 'Data berhasil di hapus!',
		];


		echo json_encode($msg);
	}

	private function _validation($method){
		if ($method == 'create') {
			$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('ulangi_password', 'ulangi password', 'trim|required|matches[password]');
		}else {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
		}
		$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip/nrp/kode', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');
		$this->form_validation->set_rules('blokir', 'blokir', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}
