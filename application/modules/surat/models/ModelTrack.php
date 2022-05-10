<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTrack extends CI_Model {

	public function get_surat($nomor_surat)
	{
		$get_jabatan = $this->db->select('id, jabatan')->from('jabatan')->get()->result_array();
		$get_instansi = $this->db->select('id, instansi')->from('instansi')->get()->result_array();

		$jabatan = array();
		foreach ($get_jabatan as $key => $value) {
			$jabatan[$value['id']] = $value['jabatan'];
		}
		$instansi = array();
		foreach ($get_instansi as $key => $value) {
			$instansi[$value['id']] = $value['instansi'];
		}

		$this->db->select("*");
		$this->db->from("surat");
		$this->db->where("nomor_surat", $nomor_surat);
		$this->db->where("sifat_surat", "biasa");
		$this->db->where("tipe_surat !=", "internal");
		$this->db->where("is_deleted", 0);
		$result = $this->db->get()->row_array();

		$asal_surat = $result['asal_surat'];
		$tujuan_surat = $result['tujuan_surat'];
		if ($result['tipe_surat'] == 'masuk') {
				$result['asal_surat'] = $instansi[$asal_surat];
				$result['tujuan_surat'] = $jabatan[$tujuan_surat];
		}
			if ($result['tipe_surat'] == 'keluar') {
				$result['asal_surat'] = $jabatan[$asal_surat];
				$result['tujuan_surat'] = $instansi[$tujuan_surat];
			}
			if ($result['tipe_surat'] == 'internal') {
				$result['asal_surat'] = $jabatan[$asal_surat];
				$result['tujuan_surat'] = $jabatan[$tujuan_surat];
			}

		return $result;
	}

}
