<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSurat extends CI_Model {

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
