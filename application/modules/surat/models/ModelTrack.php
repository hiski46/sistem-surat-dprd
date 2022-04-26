<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTrack extends CI_Model {

	public function get_surat($nomor_surat)
	{
		$this->db->select("*");
		$this->db->from("surat");
		$this->db->where("nomor_surat", $nomor_surat);
		$this->db->where("sifat_surat", "biasa");
		$this->db->where("is_deleted", 0);
		return $this->db->get()->row_array();
	}

}
