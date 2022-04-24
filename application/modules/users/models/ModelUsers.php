<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUsers extends CI_Model
{

	private $table = 'users';
	private $id = 'id';

	public function datatables(){
		function callback($id)
		{
			return '<button type="button" class="btn btn-sm mr-2 btn-info btn-detail" data-toggle="tooltip" title="Detail" data-id="' . encrypt_url($id) . '" onclick="form_detail(this)"><i class="fas fa-search-plus"></i></button><button type="button" class="btn btn-sm mr-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit" data-id="' . encrypt_url($id) . '" onclick="form_edit(this)"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 btn-danger btn-hapus" data-toggle="tooltip" title="Hapus" data-id="' . encrypt_url($id) . '" onclick="hapus(this)"><i class="fas fa-trash-alt"></i></button>';
		}
		$this->datatables->select('users.id, nama_lengkap, username, nip, jabatan, level');
		$this->datatables->from('users');
		$this->datatables->join('jabatan', 'jabatan.id = users.id_jabatan', 'inner');
		$this->datatables->where('users.is_deleted', 0);
		$this->datatables->where('jabatan.is_deleted', 0);
		$this->datatables->add_column('action', '$1', 'callback(id)');

		return $this->datatables->generate();
	}

	public function getAll()
	{
		$this->db->select('users.id as user_id, nama_lengkap, username, password, nip, jabatan, id_jabatan, level, blokir');
		$this->db->from($this->table);
		$this->db->join('jabatan', 'jabatan.id = users.id_jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDataById($id)
	{
		$this->db->select('users.id as user_id, nama_lengkap, username, password, nip, jabatan, id_jabatan, level, blokir');
		$this->db->from($this->table);
		$this->db->join('jabatan', 'jabatan.id = users.id_jabatan');
		$this->db->where('users.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function create($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

}

/* End of file ModelJabatan.php */
