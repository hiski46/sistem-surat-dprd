<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSurat extends CI_Model {

	private $table = 'surat';
	private $id = 'id';

	public function datatables_surat_masuk()
	{
		function callback_one($id){
			return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><a href="' . site_url('surat/Surat/edit_surat/masuk/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus" onclick="hapus(this)"><i class="far fa-trash-alt"></i></button>';
		}
		$this->datatables->select('id, nomor_surat, isi, tanggal_diterima, sifat_surat, asal_surat, tujuan_surat');
		$this->datatables->where('is_deleted', 0);
		$this->datatables->where('tipe_surat', 'masuk');
		$this->datatables->from($this->table);
		$this->datatables->add_column('action', '$1', 'callback_one(id)');

		return $this->datatables->generate();
	}

	public function datatables_surat_keluar()
	{
		function callback_two($id){
			return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><a href="' . site_url('surat/Surat/edit_surat/keluar/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus" onclick="hapus(this)"><i class="far fa-trash-alt"></i></button>';
		}
		$this->datatables->select('id, nomor_surat, isi, tanggal_diterima, sifat_surat, asal_surat, tujuan_surat');
		$this->datatables->where('is_deleted', 0);
		$this->datatables->where('tipe_surat', 'keluar');
		$this->datatables->from($this->table);
		$this->datatables->add_column('action', '$1', 'callback_two(id)');

		return $this->datatables->generate();
	}

	public function datatables_surat_internal()
	{
		function callback_three($id){
			return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><a href="' . site_url('surat/Surat/edit_surat/internal/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus" onclick="hapus(this)"><i class="far fa-trash-alt"></i></button>';
		}
		$this->datatables->select('id, nomor_surat, isi, tanggal_diterima, sifat_surat, asal_surat, tujuan_surat');
		$this->datatables->where('is_deleted', 0);
		$this->datatables->where('tipe_surat', 'internal');
		$this->datatables->from($this->table);
		$this->datatables->add_column('action', '$1', 'callback_three(id)');

		return $this->datatables->generate();
	}

	public function datatables_disposisi($id_surat)
	{
		$this->datatables->select('d.id, d.id_surat, d.nama_instansi, d.jabatan, d.disposisi, d.tanggal_disposisi');
		$this->datatables->from('disposisi as d');
		$this->datatables->join('surat as s', 's.id = d.id_surat');
		$this->datatables->where('d.is_deleted', 0);
		$this->datatables->where('s.is_deleted', 0);
		$this->datatables->where('d.id_surat', $id_surat);
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

	public function getDetailSurat($id){
		$row_surat = $this->getDataById($id);
		if ($row_surat->tipe_surat == 'masuk') {
			$this->db->select('s.id as id_surat, s.tipe_surat, s.nomor_surat, s.tanggal_surat, s.isi, s.tanggal_diterima, s.sifat_surat, s.kecepatan_surat, i.instansi as asal_surat, j.jabatan as tujuan_surat, s.file, s.status_surat, u.nama_lengkap as penerima');
			$this->db->from('surat as s');
			$this->db->join('instansi as i', 'i.id = s.asal_surat');
			$this->db->join('jabatan as j', 'j.id = s.tujuan_surat');
			$this->db->join('users as u', 'u.id = s.penerima');
		}elseif ($row_surat->tipe_surat == 'keluar') {
			$this->db->select('s.id as id_surat, s.tipe_surat, s.nomor_surat, s.tanggal_surat, s.isi, s.tanggal_diterima, s.sifat_surat, s.kecepatan_surat, j.jabatan as asal_surat, i.instansi as tujuan_surat, s.file, s.status_surat, u.nama_lengkap as penerima');
			$this->db->from('surat as s');
			$this->db->join('jabatan as j', 'j.id = s.asal_surat');
			$this->db->join('instansi as i', 'i.id = s.tujuan_surat');
			$this->db->join('users as u', 'u.id = s.penerima');
		}else {
			$this->db->select('s.id as id_surat, s.tipe_surat, s.nomor_surat, s.tanggal_surat, s.isi, s.tanggal_diterima, s.sifat_surat, s.kecepatan_surat, j.jabatan as asal_surat, jb.jabatan as tujuan_surat, s.file, s.status_surat, u.nama_lengkap as penerima');
			$this->db->from('surat as s');
			$this->db->join('jabatan as j', 'j.id = s.asal_surat');
			$this->db->join('jabatan as jb', 'jb.id = s.tujuan_surat');
			$this->db->join('users as u', 'u.id = s.penerima');
		}
		$this->db->where('s.id', $id);
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

	public function delete($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	public function get_surat()
	{
		$this->db->select("*");
		$this->db->from("surat");
		$this->db->where("is_deleted",0);
		$this->db->order_by("tanggal_diterima", "DESC");

		return $this->db->get()->result_array();
	}

	public function save()
	{
		$surat["tipe_surat"] = $this->input->post("tipe_surat");;
		$surat["nomor_surat"] = $this->input->post("nomor_surat");
		$surat["tanggal_surat"] = $this->input->post("tanggal_surat");
		$surat["isi"] = $this->input->post("isi");
		$surat["sifat_surat"] = $this->input->post("sifat_surat");
		$surat["kecepatan_surat"] = $this->input->post("kecepatan_surat");
		$surat["tanggal_diterima"] = $this->input->post("tanggal_diterima");

		if($this->db->insert("surat", $surat))
		{
			return TRUE;			
		} else {
			return FALSE;
		}
	}

}
