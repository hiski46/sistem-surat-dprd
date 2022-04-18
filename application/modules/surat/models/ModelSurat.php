<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSurat extends CI_Model {

	public function get_surat()
	{
		$this->db->select("*");
		$this->db->from("surat");
	}

}
