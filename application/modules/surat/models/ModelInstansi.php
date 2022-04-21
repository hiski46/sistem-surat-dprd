<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelInstansi extends CI_Model
{

	private $table = 'instansi';

	public function datatables(){
		$this->datatables->select('id, instansi, alamat');
		$this->datatables->where('is_deleted', 0);
		$this->datatables->from($this->table);
		$this->datatables->add_column('action', '<button type="button" class="btn btn-sm mr-2 btn-primary btn-tambah" data-toggle="tooltip" title="Tambah"><i class="fas fa-search-plus"></i></button><button type="button" class="btn btn-sm mr-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 btn-danger btn-hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></button>');

		return $this->datatables->generate();
	}

	public function getData()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getDataById($id)
	{
		$query = $this->db->get_where($this->table, ['id' => $id]);
		return $query->row();
	}

	public function create($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}

/* End of file ModelJabatan.php */
