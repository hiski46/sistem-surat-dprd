<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelInstansi extends CI_Model
{

	private $table = 'instansi';
	private $id = 'id';

	public function datatables(){
		function callback($id)
		{
			return '<button type="button" class="btn btn-sm mr-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit" data-id="' . encrypt_url($id) . '" onclick="form_edit(this)"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 btn-danger btn-hapus" data-toggle="tooltip" title="Hapus" data-id="' . encrypt_url($id) . '" onclick="hapus(this)"><i class="fas fa-trash-alt"></i></button>';
		}
		$this->datatables->select('id, instansi, alamat');
		$this->datatables->where('is_deleted', 0);
		$this->datatables->from($this->table);
		$this->datatables->add_column('action', '$1', 'callback(id)');

		return $this->datatables->generate();
	}

	public function getAll()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getDataById($id)
	{
		$query = $this->db->get_where($this->table, [$this->id => $id]);
		return $query->row();
	}

	public function getNotIn($data = null)
	{
		if (!empty($data)) {
			$this->db->where_not_in('id', $data);
		}
		$query = $this->db->get($this->table);
		return $query->result();
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
