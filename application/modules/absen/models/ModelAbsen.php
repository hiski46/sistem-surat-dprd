<?php

class ModelAbsen extends CI_Model
{
    private $table = 'absen';
    private $id = 'id';

    public function datatables_agenda($type)
    {
        function callback($id)
        {
            return '<button type="button" class="btn btn-sm mr-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit" data-id="' . encrypt_url($id) . '" onclick="form_edit(this)"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-sm mr-2 btn-danger btn-hapus" data-toggle="tooltip" title="Hapus" data-id="' . encrypt_url($id) . '" onclick="hapus(this)"><i class="fas fa-trash-alt"></i></button>';
        }
        $this->datatables->select('id, agenda, tanggal, detail');
        $this->datatables->where('is_deleted', 0);
        $this->datatables->or_where('is_deleted', NULL);
        if ($type) {
            $this->datatables->where('is_rapat', 1);
        } else {
            $this->datatables->where('is_rapat', 0);
        }
        $this->db->order_by('id', 'desc');
        $this->datatables->from($this->table);
        $this->datatables->add_column('action', '$1', 'callback(id)');

        return $this->datatables->generate();
    }
}
