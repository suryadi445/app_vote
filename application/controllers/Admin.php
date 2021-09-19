<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $handphone = $this->session->userdata('handphone');

        $data['row']      = $this->Admin_model->row('tbl_users', 'handphone', $handphone);

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

    public function daftar_kandidat()
    {
        $data['result'] = $this->Admin_model->get('tbl_kandidat');

        $data['judul']    = 'Admin | Daftar Kandidat';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('super_admin/daftar_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function kandidat()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //nama
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric'); //nik
        $this->form_validation->set_rules('no_urut', 'Nomor Peserta', 'required|trim|numeric'); //nama
        $this->form_validation->set_rules('handphone', 'Handphone', 'required|trim|numeric'); //no hp
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim'); //nama
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
        } //gambar 

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors()); // session untuk error saat validasi error

            $data['judul']    = 'Admin | Kandidat RT';

            $this->load->view('template_auth/header', $data);
            $this->load->view('super_admin/kandidat', $data);
            $this->load->view('template_auth/footer');
        } else {
            // upload file
            $config['upload_path']      = './assets/upload_kandidat';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = 2000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $nama                = htmlspecialchars($this->input->post('nama', true));
            $nik                 = htmlspecialchars($this->input->post('nik', true));
            $handphone           = htmlspecialchars($this->input->post('handphone', true));
            $alamat              = htmlspecialchars($this->input->post('alamat', true));
            $no_urut             = htmlspecialchars($this->input->post('no_urut', true));
            $gambar              = $_FILES['gambar']['name'];


            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('gagal', 'Gambar gagal diupload');
                // redirect('admin/tambah_barang');
            } else {
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');

                $gambar = $this->upload->data('file_name');

                $data = [
                    'nama'              => $nama,
                    'nik'               => $nik,
                    'handphone'         => $handphone,
                    'foto'            => $gambar,
                    'alamat'            => $alamat,
                    'no_urut'           => $no_urut
                ];

                $this->session->set_userdata('user', $data);

                $this->session->set_flashdata('sukses', 'Terima kasih, Registrasi berhasil dilakukan..');
                $this->Admin_model->insert('tbl_kandidat', $data);
                redirect('admin');
            }
        }
    }
}
