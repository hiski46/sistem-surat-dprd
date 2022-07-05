<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAgenda extends CI_Model
{
    private $table = 'agenda';
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

    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function getDataById($id)
    {
        $query = $this->db->get_where($this->table, [$this->id => $id]);
        return $query->row();
    }
}
