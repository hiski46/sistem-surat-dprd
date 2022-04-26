<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{

	public function getAll()
	{
		$query = $this->db->get('surat');
		return $query->result();
	}

	public function getDataById($id)
	{
		$query = $this->db->get_where('surat', ['id' => $id]);
		return $query->row();
	}

	
}

/* End of file ModelJabatan.php */
