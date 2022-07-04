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
		$id_surat = decrypt_url($this->input->get('s'));
		$list_forum = $this->db->select('forum.*, forum.anggota_forum as id_anggota_forum, pembuat.nama_lengkap as pembuat_forum')
			->from('forum')
			->join('users as pembuat', 'pembuat.id=forum.pembuat_forum')
			->where('id_surat', $id_surat)
			->get()
			->result_array();

		$anggota_forum = array();

		$users = $this->db->select('id, nama_lengkap')->from('users')->get()->result_array();

		foreach ($users as $val) {
			$anggota_forum[$val['id']] = $val['nama_lengkap'];
		}

		$result = array();
		foreach ($list_forum as $forum) {
			$temp_user = array();
			foreach (json_decode($forum["anggota_forum"]) as $u) {
				$temp_user[] = $anggota_forum[$u];
			}
			$forum['anggota_forum'] = $temp_user;
			$result[] = $forum;
		}

		$data = [
			'title' => 'Forum Tindak Lanjut Surat',
			'js' => ['assets/app/surat/forum.js'],
			'forums' => $result,
		];

		$this->load->view('include/header', $data);
		$this->load->view('forum/index');
		$this->load->view('include/footer');
	}

	public function add($id_surat)
	{
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

	public function action_add()
	{
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'topik_forum' => form_error('topik_forum'),
					'jenis_forum' => form_error('jenis_forum'),
					'pembahasan_forum' => form_error('pembahasan_forum'),
					'anggota_forum' => form_error('anggota_forum[]'),
				],
			];
		} else {
			$id_surat = decrypt_url($this->input->post('id_surat'));
			$topik_forum = htmlspecialchars($this->input->post('topik_forum'));
			$jenis_forum = htmlspecialchars($this->input->post('jenis_forum'));
			$pembahasan_forum = htmlspecialchars($this->input->post('pembahasan_forum'));
			$anggota_forum = $this->input->post('anggota_forum');
			$data = [
				'id_forum' => get_kode('forum', 'id_forum', 'FR'),
				'id_surat' => $id_surat,
				'topik_forum' => $topik_forum,
				'jenis_forum' => $jenis_forum,
				'pembahasan_forum' => $pembahasan_forum,
				'pembuat_forum' => decrypt_url($this->session->userdata('id_user')),
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

	public function update($id_forum){
		$users = $this->db->select('id, id_jabatan, level, username, nama_lengkap, nip')->get('users')->result();
		$forums = $this->db->get_where('forum', ['id_forum' => decrypt_url($id_forum)])->row();

		$data = [
			'title' => 'Update Forum Tindak Lanjut Surat',
			'js' => ['assets/app/surat/forum.js'],
			'id_forum' => $id_forum,
			'users' => $users,
			'forums' => $forums,
		];

		$this->load->view('include/header', $data);
		$this->load->view('forum/update_forum');
		$this->load->view('include/footer');
	}

	public function action_update()
	{
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'topik_forum' => form_error('topik_forum'),
					'jenis_forum' => form_error('jenis_forum'),
					'pembahasan_forum' => form_error('pembahasan_forum'),
					'anggota_forum' => form_error('anggota_forum[]'),
				],
			];
		} else {
			$id_surat = decrypt_url($this->input->post('id_surat'));
			$id_forum = decrypt_url($this->input->post('id_forum'));
			$topik_forum = htmlspecialchars($this->input->post('topik_forum'));
			$jenis_forum = htmlspecialchars($this->input->post('jenis_forum'));
			$pembahasan_forum = htmlspecialchars($this->input->post('pembahasan_forum'));
			$anggota_forum = $this->input->post('anggota_forum');
			$data = [
				'id_surat' => $id_surat,
				'topik_forum' => $topik_forum,
				'jenis_forum' => $jenis_forum,
				'pembahasan_forum' => $pembahasan_forum,
				'pembuat_forum' => decrypt_url($this->session->userdata('id_user')),
				'anggota_forum' => json_encode($anggota_forum),
				'updated_at' => date('Y-m-d H:i:s')
			];

			$this->db->update('forum', $data, ['id_forum' => $id_forum]);

			$msg = [
				'status' => 'success',
				'message' => 'Forum berhasil di update!',
			];
		}

		echo json_encode($msg);
	}

	public function diskusi($id_forum)
	{
		$list_forum = $this->db->select('forum.*, surat.nomor_surat, anggota.nama_lengkap, isi_forum.isi_forum, forum.created_at as tgl_forum, isi_forum.created_at, pembuat.nama_lengkap as pembuat_forum')
		->from('forum')
		->join('surat', 'surat.id = forum.id_surat')
		->join('isi_forum', 'isi_forum.id_forum = forum.id_forum', 'left')
		->join('users as anggota', 'anggota.id=isi_forum.id_anggota_forum', 'left')
		->join('users as pembuat', 'pembuat.id=forum.pembuat_forum')
		->where('forum.id_forum', decrypt_url($id_forum))
		->get()
		->result_array();

		$anggota_forum = array();

		$users = $this->db->select('id, nama_lengkap')->from('users')->get()->result_array();

		foreach ($users as $val) {
			$anggota_forum[$val['id']] = $val['nama_lengkap'];
		}

		$result = array();
		foreach ($list_forum as $forum) {
			$temp_user = array();
			foreach (json_decode($forum["anggota_forum"]) as $u) {
				$temp_user[] = $anggota_forum[$u];
			}
			$forum['anggota_forum'] = $temp_user;
			$result[] = $forum;
		}

		// var_dump($result);die;

		$data = [
			'title' => 'Forum Diskusi Tindak Lanjut Surat',
			'js' => ['assets/app/surat/forum.js'],
			'forums' => $result,
		];

		$this->load->view('include/header', $data);
		$this->load->view('forum/diskusi_forum');
		$this->load->view('include/footer');
	}

	public function post_forum(){
		$this->form_validation->set_rules('isi_forum', 'isi forum', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$msg = [
				'error' => [
					'topik_forum' => form_error('topik_forum'),
					'jenis_forum' => form_error('jenis_forum'),
					'pembahasan_forum' => form_error('pembahasan_forum'),
					'anggota_forum' => form_error('anggota_forum[]'),
				],
			];
		} else {
			$id_forum = decrypt_url($this->input->post('id_forum'));
			$isi_forum = htmlspecialchars($this->input->post('isi_forum'));

			$data = [
				'id_forum' => $id_forum,
				'id_anggota_forum' => decrypt_url($this->session->userdata('id_user')),
				'isi_forum' => $isi_forum,
				'created_at' => date('Y-m-d H:i:s')
			];

			$this->db->insert('isi_forum', $data);

			$msg = [
				'status' => 'success',
				'message' => 'Respon anda telah dikirim'
			];
		}

		echo json_encode($msg);
	}

	public function close_forum(){
		$id_forum = decrypt_url($this->input->post('id_forum'));
		$this->db->update('forum', ['status' => 'closed'], ['id_forum' => $id_forum]);

		$msg = [
			'status' => 'success',
			'message' => 'Forum telah di tutup!'
		];

		echo json_encode($msg);
	}

	private function validation()
	{
		$this->form_validation->set_rules('topik_forum', 'topik forum', 'trim|required');
		$this->form_validation->set_rules('jenis_forum', 'jenis forum', 'trim|required');
		$this->form_validation->set_rules('pembahasan_forum', 'pembahasan forum', 'trim|required');
		$this->form_validation->set_rules('anggota_forum[]', 'anggota forum', 'trim|required');
		$this->form_validation->set_error_delimiters('<small><span class="text-danger">', '</span></small>');
	}
}

/* End of file Disposisi.php */
