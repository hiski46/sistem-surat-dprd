<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{

	public function getAll()
	{
		$this->db->where('is_deleted', 0);
		$query = $this->db->get('surat');
		return $query->result();
	}

	public function getAllPerYear($tahun = null)
	{
		$query = $this->db->query("SELECT * FROM surat WHERE YEAR(tanggal_diterima) = '$tahun' AND is_deleted = 0");
		return $query->result();
	}

	public function getAjax($tahun = null, $jenis_surat = null)
	{
		if ($jenis_surat == null) {
			$tipe_surat = '';
		}else {
			$tipe_surat = "AND tipe_surat = '".$jenis_surat."'";
		}

		$query_surat_perbulan = $this->db->query("SELECT MONTH(tanggal_diterima) AS bulan, COUNT(id) AS total_surat FROM surat WHERE YEAR(tanggal_diterima) = '$tahun' AND is_deleted = 0 $tipe_surat GROUP BY bulan;")->result();

		$total_surat_perbulan = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0);

		$total_surat = array();
		foreach ($query_surat_perbulan as $value) {
			$total_surat[$value->bulan] = (int)$value->total_surat;
		}
		$fix_total_surat = array_replace($total_surat_perbulan, $total_surat);

		return array_values($fix_total_surat);
	}
	
	public function getNotification()
	{
		$this->db->select('n.id, j.jabatan as from, jb.jabatan as to, n.id_surat, s.tipe_surat, n.time');
		$this->db->from('notifikasi as n');
		$this->db->join('surat as s', 's.id = n.id_surat');
		$this->db->join('jabatan as j', 'j.id = n.from');
		$this->db->join('jabatan as jb', 'jb.id = n.to');
		$this->db->where('n.read_status', 1);
		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file ModelJabatan.php */
