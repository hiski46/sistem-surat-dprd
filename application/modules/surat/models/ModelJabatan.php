<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJabatan extends CI_Model {

	private $table = 'jabatan';
	private $id = 'id';

	public function getAll(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getDataById($id){
		$query = $this->db->get_where($this->table, [$this->id => $id]);
		return $query->row();
	}
	
	public function create($data){
		$this->db->insert($this->table, $data);
	}

	public function update($id, $data){
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id, $data){
		$this->db->where($this->id, $id);
		$this->db->or_where('parent', $id);
		$this->db->update($this->table, $data);
	}

	public function getData()
	{
		$this->db->select('id, jabatan');
		$this->db->from($this->table);
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();

		return $query;
	}

	public function getByParrent($parent_key)
	{
		$this->db->select('id, jabatan');
		$this->db->from($this->table);
		$this->db->where('parent', $parent_key);
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();

		return $query->result_array();
	}

}

/* End of file ModelJabatan.php */
