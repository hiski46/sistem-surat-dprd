<?php

use Composer\Autoload\ClassLoader;

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (logged_in() == false) {
            redirect(site_url('login'));
        }

        $this->load->model("ModelAbsen", "ModelAbsen");
        $this->load->library('form_validation');
    }

    public function view()
    {
        $data['js'] = array(
            "https://raw.githubusercontent.com/mgalante/jquery.redirect/master/jquery.redirect.js",
            "assets/js/download.js",
            "assets/app/absen/absen.js"
        );
        $data['title'] = 'Absensi';
        $data['expand'] = 'absen';
        $data['active'] = 'absen';

        $this->load->view("include/header", $data);
        $this->load->view("absen");
        $this->load->view("include/footer");
    }

    public function datatables_agenda($type)
    {
        header('Content-Type: application/json');
        echo $this->ModelAbsen->datatables_agenda($type);
    }

    public function calendar()
    {
        $prefs = array(
            'start_day'    => 'sunday',
            'month_type'   => 'long',
            'day_type'     => 'short',
            'show_next_prev' => TRUE,
            'show_other_days' => TRUE
        );
        $this->load->library('calendar', $prefs);
        echo $this->calendar->generate();
    }
}
