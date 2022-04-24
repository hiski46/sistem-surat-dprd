<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAuth extends CI_Model
{
	private $table = 'users';
	private $id = 'id';

	public function login($username, $password){
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->join('jabatan', 'jabatan.id = users.id_jabatan');
		$this->db->where("username", $username);
		$query = $this->db->get();
		$user = $query->row();

		/**
		 * Check password
		 */
		if (!empty($user)) {

			if (password_verify($password, $user->password)) {

				return $query->result();
			} else {

				return FALSE;
			}
		} else {

			return FALSE;
		}
	}
}
