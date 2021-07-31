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
        // $this->load->view('template_auth/navbar', $data);
        // $this->load->view('template_auth/sidebar', $data);
        $this->load->view('vote/index', $data);
        $this->load->view('template_auth/footer');
    }
}
