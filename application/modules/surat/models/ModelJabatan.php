<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJabatan extends CI_Model {

	var $table = 'jabatan';
	var $column_order = array('id', 'jabatan', 'parent', 'aksi');
	var $order = array('id', 'jabatan', 'parent');

	private function _get_data_query(){
		$this->db->from($this->table);

		if (isset($_POST['search']['value'])) {
			$this->db->like('jabatan', $_POST['search']['value']);
			$this->db->or_like('parent', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		}else{
			$this->db->order_by('jabatan', 'ASC');
		}
	}


	public function getDataTable(){
		$this->_get_data_query();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data(){
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function addData($data){
		$this->db->insert('jabatan', $data);
	}

}

/* End of file ModelJabatan.php */
