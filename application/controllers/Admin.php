<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('');
    }
    public function index()
    {
        $data['judul']    = 'Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function super_admin()
    {
        $data['judul']    = 'Super Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('super_admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function pengurus()
    {
        $data['judul']    = 'Pengurus';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('super_admin/pengurus', $data);
        $this->load->view('templates/footer');
    }

    public function sub_admin()
    {
        $data['judul']    = 'Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/sub_index', $data);
        $this->load->view('templates/footer');
    }

    public function hasil()
    {
        $data['judul']    = 'Admin | Hasil  ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function struktur()
    {
        $data['judul']    = 'Admin | Struktur Pengurus  ';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/struktur', $data);
        $this->load->view('templates/footer');
    }
}
