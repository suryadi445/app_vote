<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('');
    }

    public function index()
    {
        $data['judul']    = 'Voting';
        $this->load->view('template_auth/header', $data);
        $this->load->view('vote/index', $data);
        $this->load->view('template_auth/footer');
    }

    public function hasil()
    {
        $data['judul']    = 'Hasil Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('vote/hasil', $data);
        $this->load->view('templates/footer');
    }
}
