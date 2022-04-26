<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDisposisi extends CI_Model
{

	private $table = 'disposisi';
	private $id = 'id';

	public function datatables($tipe_surat){
		// function callback($id)
		// {
		// 	return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a>';
		// }
		if ($tipe_surat == 'masuk') {
			$this->datatables->select('d.id, s.nomor_surat, i.instansi as asal_surat, j.jabatan as tujuan_disposisi, s.tanggal_surat, d.tipe_disposisi, d.disposisi, d.tanggal_disposisi, s.status_surat');
			$this->datatables->from('disposisi as d');
			$this->datatables->join('surat as s', 'd.id_surat = s.id', 'inner');
			$this->datatables->join('jabatan j', 'j.id = d.tujuan_disposisi');
			$this->datatables->join('instansi i', 'i.id = s.asal_surat');
			$this->datatables->where('d.is_deleted', 0);
			$this->datatables->where('s.tipe_surat', $tipe_surat);
			// $this->datatables->add_column('action', '$1', 'callback(id)');
			return $this->datatables->generate();
		}elseif ($tipe_surat == 'keluar') {
			$this->datatables->select('d.id, s.nomor_surat, j.jabatan as asal_surat, i.instansi as tujuan_disposisi, s.tanggal_surat, d.tipe_disposisi, d.disposisi, d.tanggal_disposisi, s.status_surat');
			$this->datatables->from('disposisi as d');
			$this->datatables->join('surat as s', 'd.id_surat = s.id', 'inner');
			$this->datatables->join('jabatan j', 'j.id = s.asal_surat');
			$this->datatables->join('instansi i', 'i.id = d.tujuan_disposisi');
			$this->datatables->where('d.is_deleted', 0);
			$this->datatables->where('s.tipe_surat', $tipe_surat);
			// $this->datatables->add_column('action', '$1', 'callback(id)');
			return $this->datatables->generate();
		}else {
			$this->datatables->select('d.id, s.nomor_surat, jb.jabatan as asal_surat, j.jabatan as tujuan_disposisi, s.tanggal_surat, d.tipe_disposisi, d.disposisi, d.tanggal_disposisi, s.status_surat');
			$this->datatables->from('disposisi as d');
			$this->datatables->join('surat as s', 'd.id_surat = s.id', 'inner');
			$this->datatables->join('jabatan j', 'j.id = d.tujuan_disposisi');
			$this->datatables->join('jabatan jb', 'jb.id = s.asal_surat');
			$this->datatables->where('d.is_deleted', 0);
			$this->datatables->where('s.tipe_surat', $tipe_surat);
			// $this->datatables->add_column('action', '$1', 'callback(id)');
			return $this->datatables->generate();
		}
	}

	public function getAll()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getDataById($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	public function getDisposisiByIdSurat($id)
	{
		$this->db->where('id_surat', $id);
		$this->db->join('tipe_disposisi', 'tipe_disposisi.id = disposisi.tipe_disposisi');
		return $this->db->get($this->table)->result();
	}

	public function get_tipe_disposisi(){
		$query = $this->db->get('tipe_disposisi');
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

	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}

/* End of file ModelJabatan.php */
