<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (logged_in() == true) {
			redirect(site_url('dashboard'));
		}
		$this->load->model('ModelAuth', 'Auth');
	}

	public function index()
	{
		$data = [
			'title' => 'Authentication',
		];

		$this->load->view('auth/index', $data);
	}

	public function login(){
		$this->_validation();

		if ($this->form_validation->run() == false) {
			$msg = [
				'error' => [
					'username' => form_error('username'),
					'password' => form_error('password'),
				],
			];
		}else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//cek login via model
			$cek = $this->Auth->login($username, $password);

			if (!empty($cek)) {

				foreach ($cek as $user) {

					//looping data user
					$session_data = array(
						'id_user'   => $user->id,
						'username'  => $user->username,
						'nama_lengkap' => $user->nama_lengkap,
						'jabatan' => $user->jabatan,
						'level' => $user->level,
						'logged_in' => true,
					);
					//buat session berdasarkan user yang login
					$this->session->set_userdata($session_data);
				}

				$msg = [
					'status' => 'success',
					'message' => 'Berhasil login!',
				];
			} else {

				$msg = [
					'status' => 'error',
					'message' => 'Gagal login!',
				];
			}
		}
		echo json_encode($msg);
	}

	public function logout()
	{
		//hapus session
		$this->session->sess_destroy();

		$msg = [
			'status' => 'success',
			'message' => 'Berhasil logout!',
		];

		echo json_encode($msg);
	}

	private function _validation(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}
