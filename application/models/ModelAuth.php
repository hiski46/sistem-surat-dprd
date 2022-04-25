<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAuth extends CI_Model
{
	private $table = 'users';
	private $id = 'id';

	public function login($username){
		$this->db->select("users.id as user_id, nama_lengkap, username, password, nip, jabatan, id_jabatan, level, blokir");
		$this->db->from($this->table);
		$this->db->join('jabatan', 'jabatan.id = users.id_jabatan');
		$this->db->where("username", $username);
		$query = $this->db->get();
		return $query->row();

		/**
		 * Check password
		 */
		// if (!empty($user)) {

		// 	if (password_verify($password, $user->password)) {

		// 		return $query->result();
		// 	} else {

		// 		return FALSE;
		// 	}
		// } else {

		// 	return FALSE;
		// }
	}
}
