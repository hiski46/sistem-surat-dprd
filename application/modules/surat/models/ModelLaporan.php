<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLaporan extends CI_Model
{

	private $column_search = array("isi", "nomor_surat");

	public function get_datatables_query()
	{
		$i = 0;
		$this->db->from("surat");
		$this->db->where("surat.is_deleted", 0);

		foreach ($this->column_search as $item) {

			if (isset($_POST["search"]["value"])) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST["search"]["value"]);
				} else {
					$this->db->or_like($item, $_POST["search"]["value"]);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
	}

	public function get_datatables()
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
		$this->get_datatables_query();
		if ($this->input->post("length") != -1) {
			$this->db->limit($this->input->post("length"), $this->input->post("start"));
		}
 		$result = array();
		$query = $this->db->get()->result_array();
		foreach ($query as $surat) {
			if ($surat['tipe_surat'] == 'masuk') {
				$asal_surat = $surat['asal_surat'];
				$tujuan_surat = $surat['tujuan_surat'];
				$surat['asal_surat'] = $instansi[$asal_surat];
				$surat['tujuan_surat'] = $jabatan[$tujuan_surat];
			}
			if ($surat['tipe_surat'] == 'keluar') {
				$asal_surat = $surat['asal_surat'];
				$tujuan_surat = $surat['tujuan_surat'];
				$surat['asal_surat'] = $jabatan[$asal_surat];
				$surat['tujuan_surat'] = $instansi[$tujuan_surat];
			}
			if ($surat['tipe_surat'] == 'internal') {
				$asal_surat = $surat['asal_surat'];
				$tujuan_surat = $surat['tujuan_surat'];
				$surat['asal_surat'] = $jabatan[$asal_surat];
				$surat['tujuan_surat'] = $jabatan[$tujuan_surat];
			}


			$result[] = $surat;
		}
		return $result;
	}

	public function count_filtered()
	{
		$this->get_datatables_query();
		return $this->db->get()->num_rows();
	}

	public function count_total()
	{
		$this->db->from("surat");
		$this->db->where("is_deleted", 0);
		return $this->db->count_all_results();
	}

	public function getAll()
	{
		$query = $this->db->get('surat');
		return $query->result();
	}
}
