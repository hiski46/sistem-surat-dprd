<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLaporan extends CI_Model {

	private $column_search = array("isi", "nomor_surat");

	public function get_datatables_query()
	{
		$i = 0;
		$this->db->from("surat");
		// $this->db->where("is_deleted", 0);

		foreach ($this->column_search as $item) {

			if(isset($_POST["search"]["value"])) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST["search"]["value"]);
                }
                // else
                // {
                //     $this->db->or_like($item, $this->input->post("search"));
                // }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
			
		}

		// if ($this->input->post("search")) {
		// 	# code...
		// }

	}

	public function get_datatables()
	{
		$this->get_datatables_query();

		if ($this->input->post("length") != -1) {
			$this->db->limit($this->input->post("length"), $this->input->post("start"));
		}
		return $this->db->get()->result_array();
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
}
