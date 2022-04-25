<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDisposisi extends CI_Model
{

	private $table = 'disposisi';
	private $id = 'id';

	public function datatables(){
		$this->datatables->select('d.id, s.nomor_surat, d.nama, d.jabatan, d.disposisi, d.tanggal_disposisi, d.status');
		$this->datatables->from('disposisi as d');
		$this->datatables->join('surat as s', 'd.id_surat = s.id', 'inner');
		$this->datatables->where('d.is_deleted', 0);
		$this->datatables->add_column('action', '<button type="button" class="btn btn-sm mr-2 btn-primary btn-tambah" data-toggle="tooltip" title="Tambah"><i class="fas fa-search-plus"></i></button><button type="button" class="btn btn-sm mr-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 btn-danger btn-hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i></button>', 'id');

		return $this->datatables->generate();
	}

	public function getData()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getDataById($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	public function getSuratById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('surat')->row();
	}

	public function get_tipe_disposisi(){
		$query = $this->db->get('tipe_disposisi');
		return $query->result();
	}

	public function disposisi_surat($id_surat)
	{
		$row_surat = $this->getSuratById($id_surat);
		if ($row_surat->tipe_surat == 'masuk') {
			$this->db->select('s.id as id_surat, s.tipe_surat, s.nomor_surat, s.tanggal_surat, s.isi, s.tanggal_diterima, s.sifat_surat, s.kecepatan_surat, i.instansi as asal_surat, j.jabatan as tujuan_surat, s.file, s.status_surat, u.nama_lengkap as penerima');
			$this->db->from('surat as s');
			$this->db->join('instansi as i', 'i.id = s.asal_surat');
			$this->db->join('jabatan as j', 'j.id = s.tujuan_surat');
			$this->db->join('users as u', 'u.id = s.penerima');
		} elseif ($row_surat->tipe_surat == 'keluar') {
			$this->db->select('s.id as id_surat, s.tipe_surat, s.nomor_surat, s.tanggal_surat, s.isi, s.tanggal_diterima, s.sifat_surat, s.kecepatan_surat, j.jabatan as asal_surat, i.instansi as tujuan_surat, s.file, s.status_surat, u.nama_lengkap as penerima');
			$this->db->from('surat as s');
			$this->db->join('jabatan as j', 'j.id = s.asal_surat');
			$this->db->join('instansi as i', 'i.id = s.tujuan_surat');
			$this->db->join('users as u', 'u.id = s.penerima');
		} else {
			$this->db->select('s.id as id_surat, s.tipe_surat, s.nomor_surat, s.tanggal_surat, s.isi, s.tanggal_diterima, s.sifat_surat, s.kecepatan_surat, j.jabatan as asal_surat, jb.jabatan as tujuan_surat, s.file, s.status_surat, u.nama_lengkap as penerima');
			$this->db->from('surat as s');
			$this->db->join('jabatan as j', 'j.id = s.asal_surat');
			$this->db->join('jabatan as jb', 'jb.id = s.tujuan_surat');
			$this->db->join('users as u', 'u.id = s.penerima');
		}
		$this->db->where('s.id', $id_surat);
		return $this->db->get()->row();
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
