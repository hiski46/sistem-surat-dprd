<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAgenda extends CI_Model
{
    private $table = 'agenda';
    private $id = 'id';

    public function datatables_agenda($type)
    {
        // function callback_one($id, $isi){
        // 	return '<a href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" data-toggle="tooltip" title="Click to Detail">'.$isi.'</a>';
        // 	// return '<a data-isi="'.$isi.'" href="' . site_url('surat/Surat/detail_surat/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-primary btn-detail" data-toggle="tooltip" title="Detail"><i class="fas fa-search-plus"></i></a><a href="' . site_url('surat/Surat/edit_surat/masuk/' . encrypt_url($id)) . '" class="btn btn-sm mr-2 mb-2 btn-warning btn-edit" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a><button type="button" class="btn btn-sm mr-2 mb-2 btn-danger btn-hapus" data-id="' . encrypt_url($id) . '" data-toggle="tooltip" title="Hapus" onclick="hapus(this)"><i class="far fa-trash-alt"></i></button>';
        // }
        $this->datatables->select('*');
        $this->datatables->where('is_deleted', 0);
        $this->datatables->or_where('is_deleted', NULL);
        // $this->datatables->where('tipe_surat', 'masuk');
        $this->datatables->from($this->table);
        if ($type) {
            $this->datatables->where('is_rapat', 1);
        } else {
            $this->datatables->where('is_rapat', 0);
        }
        $this->db->order_by('id', 'desc');
        // $this->datatables->add_column('isi', '$1', 'callback_one(id, isi)');
        // $this->datatables->add_column('action', '$1', 'callback_one(id)');

        return $this->datatables->generate();
    }
    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }
}
