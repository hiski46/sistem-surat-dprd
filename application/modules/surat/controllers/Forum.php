<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (logged_in() == false) {
			redirect(site_url('login'));
		}
		// $this->load->model(['ForumModel']);
	}

	public function index()
	{
		$data = [
			'title' => 'Forum Tindak Lanjut Surat',
			'js' => ['assets/app/surat/forum.js'],
		];

		$this->load->view('include/header', $data);
		$this->load->view('forum/index');
		$this->load->view('include/footer');
	}

	public function add($id_surat){
		$users = $this->db->select('id, id_jabatan, level, username, nama_lengkap, nip')->get('users')->result();
		$data = [
			'title' => 'Tambah Forum Tindak Lanjut Surat',
			'js' => ['assets/app/surat/forum.js'],
			'id_surat' => $id_surat,
			'users' => $users,
		];

		$this->load->view('include/header', $data);
		$this->load->view('forum/tambah_forum');
		$this->load->view('include/footer');
	}

	public function action_add(){
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'jenis_forum' => form_error('jenis_forum'),
					'anggota_forum' => form_error('anggota_forum[]'),
				],
			];
		} else {
			$id_surat = decrypt_url($this->input->post('id_surat'));
			$jenis_forum = htmlspecialchars($this->input->post('jenis_forum'));
			$anggota_forum = $this->input->post('anggota_forum');
			$data = [
				'id_forum' => get_kode('forum', 'id_forum', 'FR'),
				'id_surat' => $id_surat,
				'jenis_forum' => $jenis_forum,
				'anggota_forum' => json_encode($anggota_forum),
				'created_at' => date('Y-m-d H:i:s')
			];

			$this->db->insert('forum', $data);

			$msg = [
				'status' => 'success',
				'message' => 'Forum berhasil di buat!',
			];
		}

		echo json_encode($msg);
	}

	public function diskusi(){
		$data = [
			'title' => 'Forum Diskusi Tindak Lanjut Surat',
			'js' => ['assets/app/surat/forum.js'],
		];

		$this->load->view('include/header', $data);
		$this->load->view('forum/diskusi_forum');
		$this->load->view('include/footer');
	}



	private function validation()
	{
		$this->form_validation->set_rules('jenis_forum', 'jenis forum', 'trim|required');
		$this->form_validation->set_rules('anggota_forum[]', 'anggota forum', 'trim|required');
		$this->form_validation->set_error_delimiters('<small><span class="text-danger">', '</span></small>');
	}
}

/* End of file Disposisi.php */
