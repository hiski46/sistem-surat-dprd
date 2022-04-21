<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSurat extends CI_Model {

	private $table = 'surat';
	private $id = 'id';

	public function datatables_surat_masuk()
	{
		function callback_one($id){
			return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-id="$1" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></button>';
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
			return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-id="$1" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></button>';
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
			return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-id="$1" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></button>';
		}
		$this->datatables->select('id, nomor_surat, isi, tanggal_diterima, sifat_surat, asal_surat, tujuan_surat');
		$this->datatables->where('is_deleted', 0);
		$this->datatables->where('tipe_surat', 'internal');
		$this->datatables->from($this->table);
		$this->datatables->add_column('action', '$1', 'callback_three(id)');

		return $this->datatables->generate();
	}

	public function datatables_disposisi()
	{
		$this->datatables->select('d.id, d.nama_instansi, d.jabatan, d.disposisi, d.tanggal_disposisi');
		$this->datatables->from('disposisi as d');
		$this->datatables->join('surat as s', 'd.id_surat = s.id', 'inner');
		$this->datatables->where('d.is_deleted', 0);
		$this->datatables->add_column('action', '<button type="button" class="btn btn-sm mr-2 btn-warning btn-edit" data-toggle="tooltip" title="Disposisi"><i class="fas fa-history"></i></button>', 'id');

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
