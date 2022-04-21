<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTrack extends CI_Model {

	public function get_by_id($id)
	{
		$this->db->select("*");
		$this->db->where("", "biasa");
		$this->db->where("sifat_surat", "biasa");
		return $this->db->get()->result_array();
	}

}
