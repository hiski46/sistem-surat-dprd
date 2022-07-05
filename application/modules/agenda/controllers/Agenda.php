<?php

use Composer\Autoload\ClassLoader;

defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (logged_in() == false) {
            redirect(site_url('login'));
        }

        $this->load->model("ModelAgenda", "ModelAgenda");
        $this->load->library('form_validation');
    }

    // public function index($type)
    // {
    //     $data['js'] = array(
    //         "https://raw.githubusercontent.com/mgalante/jquery.redirect/master/jquery.redirect.js",
    //         "assets/js/download.js",
    //         "assets/app/surat/agenda.js"
    //     );
    //     $data['title'] = 'Agenda Rapat';
    //     $data['type'] = $type;
    //     $data['expand'] = 'agenda';
    //     $data['active'] = 'agenda';

    //     $this->load->view("include/header", $data);
    //     $this->load->view("agenda");
    //     $this->load->view("include/footer");
    // }
    public function view($type)
    {
        $data['js'] = array(
            "https://raw.githubusercontent.com/mgalante/jquery.redirect/master/jquery.redirect.js",
            "assets/js/download.js",
            ($type) ? "assets/app/agenda/agenda.js" : "assets/app/agenda/agenda_kegiatan.js"
        );
        $data['title'] = ($type == 1) ? 'Agenda Rapat' : 'Agenda Kegiatan';
        $data['type'] = $type;
        $data['expand'] = 'agenda';
        $data['active'] = 'agenda';

        $this->load->view("include/header", $data);
        $this->load->view("agenda");
        $this->load->view("include/footer");
    }

    public function datatables_agenda($type)
    {
        header('Content-Type: application/json');
        echo $this->ModelAgenda->datatables_agenda($type);
    }

    public function add_agenda($type = NULL)
    {

        $data = array(
            'title' => ($type == 1) ? 'Tambah Agenda Rapat' : 'Tambah Agenda Kegiatan',
            'type' => $type,
            'js' => ["assets/app/agenda/agenda_create.js"],
        );

        $this->load->view('include/header', $data);
        $this->load->view('agenda/agenda/form_tambah_agenda');
        $this->load->view('include/footer');
    }

    public function create()
    {
        $tipe_agenda = $this->input->post('tipe_agenda');

        $this->validation();

        if ($this->form_validation->run() == false) {
            $this->add_agenda($tipe_agenda);
        } else {
            $config['upload_path']          = FCPATH . '/writable/upload/agenda/';
            $config['allowed_types']        = 'pdf|jpg|png|jpeg';
            // $config['file_name']            = strtotime("now");
            $config['max_size']             = 2048;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);

            $datetime = $this->input->post('tanggal') . ' ' . $this->input->post('waktu');
            $data = [
                'is_rapat' => $this->input->post('tipe_agenda'),
                'agenda' => $this->input->post('agenda'),
                'tanggal' => $datetime,
                'detail' => $this->input->post('detail'),
                'data' => json_encode('')
            ];
            if ($tipe_agenda) {
                if ($this->upload->do_upload('data')) {
                    $uploaded_data = $this->upload->data();
                    $data['data'] = json_encode($uploaded_data['file_name']);
                    $this->ModelAgenda->create($data);

                    $this->session->set_flashdata('message', 'Data berhasil di simpan!');

                    if ($this->input->post('tipe_agenda') == 1) {
                        redirect(site_url('agenda/Agenda/view/1'));
                    } elseif ($this->input->post('tipe_agenda') == 0) {
                        redirect(site_url('agenda/Agenda/view/0'));
                    }
                } else {
                    echo 'error';
                }
            } else {
                $this->ModelAgenda->create($data);
                if ($this->input->post('tipe_agenda') == 1) {
                    redirect(site_url('agenda/Agenda/view/1'));
                } elseif ($this->input->post('tipe_agenda') == 0) {
                    redirect(site_url('agenda/Agenda/view/0'));
                }
            }
        }
    }

    public function update()
    {
        $id = decrypt_url($this->input->post('id'));
        $tipe_agenda = $this->input->post('tipe_agenda');
        $data = [
            'agenda' => htmlspecialchars($this->input->post('agenda')),
            'detail' => htmlspecialchars($this->input->post('detail')),
        ];
        if ($this->input->post('tanggal') && $this->input->post('waktu')) {
            $datetime = $this->input->post('tanggal') . ' ' . $this->input->post('waktu');
            $data['tanggal'] = $datetime;
        }
        if ($tipe_agenda) {
            $config['upload_path']          = FCPATH . '/writable/upload/agenda/';
            $config['allowed_types']        = 'pdf|jpg|png|jpeg';
            // $config['file_name']            = strtotime("now");
            $config['max_size']             = 2048;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $uploaded_data = $this->upload->data();
                $data['data'] = json_encode($uploaded_data['file_name']);
            }
        }
        $this->ModelAgenda->update($id, $data);

        $msg = [
            'status' => 'success',
            'message' => 'Data berhasil di simpan!',
        ];
        if ($this->input->post('tipe_agenda') == 1) {
            redirect(site_url('agenda/Agenda/view/1'));
        } elseif ($this->input->post('tipe_agenda') == 0) {
            redirect(site_url('agenda/Agenda/view/0'));
        }
    }

    public function form_edit()
    {
        $id = decrypt_url($this->input->post('id'));
        $type = $this->input->post('type');
        $agenda = $this->ModelAgenda->getDataById($id);

        $data = [
            'title' => 'Edit Agenda',
            'type' => $type,
            'agenda' => $agenda,
        ];

        $msg = [
            'message' => $this->load->view('agenda/agenda/form_edit_agenda', $data, true),
        ];

        echo json_encode($msg);
    }

    public function delete()
    {
        $id = decrypt_url($this->input->post('id'));

        $data = [
            'is_deleted' => 1,
        ];
        $this->ModelAgenda->update($id, $data);

        $msg = [
            'status' => 'success',
            'message' => 'Data berhasil di hapus!',
        ];


        echo json_encode($msg);
    }

    private function validation()
    {
        $this->form_validation->set_rules('agenda', 'Agenda', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
    }
}
