<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('');
    }

    public function index()
    {
        $data['judul']    = 'Login';
        $this->load->view('template_auth/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('template_auth/footer');
    }

    public function registrasi()
    {
        $data['judul']    = 'Registrasi';
        $this->load->view('template_auth/header', $data);
        $this->load->view('auth/registrasi', $data);
        $this->load->view('template_auth/footer');
    }
}
