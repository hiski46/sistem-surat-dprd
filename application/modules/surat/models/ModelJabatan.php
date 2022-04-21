<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJabatan extends CI_Model {

	private $table = 'jabatan';

	public function getData(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getDataById($id){
		$query = $this->db->get_where($this->table, ['id' => $id]);
		return $query->row();
	}
	
	public function create($data){
		$this->db->insert($this->table, $data);
	}

	public function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	public function getAll()
	{
		$this->db->select('id, jabatan');
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query;
	}

	public function getByParrent($parent_key)
	{
		$this->db->select('id, jabatan');
		$this->db->from($this->table);
		$this->db->where('parent', $parent_key);
		$query = $this->db->get();

		return $query->result_array();
	}

}

/* End of file ModelJabatan.php */
