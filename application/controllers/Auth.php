<!-- ! memberikan alert pada saat login berhasil dan llogin gagal -->

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }

    // login
    public function index()
    {
        $this->form_validation->set_rules('handphone', 'No. Handphone', 'required|trim|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data['judul']    = 'Login';
            $this->load->view('template_auth/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('template_auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $handphone      = htmlspecialchars($this->input->post('handphone', true));
        $password       = htmlspecialchars($this->input->post('password', true));

        $user           = $this->Auth_model->getRow('tbl_users', 'handphone', $handphone);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'handphone' => $user['handphone'],
                    'nama'      => $user['nama'],
                ];

                if ($user['status'] == 'user') {
                    $user_login = $user['nama'];
                    $this->session->set_flashdata('sukses', 'Selamat datang ' . $data['nama']);
                    $this->session->set_userdata('nama', $user_login);
                    redirect('vote');
                } else {
                    $this->session->set_flashdata('flash', 'Selamat datang ' . $data['nama']);
                    $this->session->set_userdata($data);
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('flash', 'Password yang anda masukkan salah');

                redirect('auth/index');
            }
        } else {
            $this->session->set_flashdata('flash', 'Anda belum terdaftar, mohon registrasi terlebih dahulu..');
            redirect('auth/index');
        }
    }

    //registrasi
    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //nama
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|is_unique[tbl_users.nik]'); //nik
        $this->form_validation->set_rules('handphone', 'Handphone', 'required|trim|numeric|is_unique[tbl_users.handphone]'); //no hp
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required'); //jenis kelamin
        $this->form_validation->set_rules('user', 'User', 'required|trim'); //user
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
        } //gambar
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[6]',
            [
                'min_length' => 'Password minimal 6 karakter'
            ]
        ); //password 

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors()); // session untuk error saat validasi error

            $data['judul']    = 'Registrasi';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            // upload file
            $config['upload_path']      = './assets/upload_image';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = 2000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $nama                = htmlspecialchars($this->input->post('nama', true));
            $nik                 = htmlspecialchars($this->input->post('nik', true));
            $handphone           = htmlspecialchars($this->input->post('handphone', true));
            $password            = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $jenis_kelamin       = $this->input->post('jenis_kelamin', true);
            $user                = htmlspecialchars($this->input->post('user', true));
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
                    'password'          => $password,
                    'jenis_kelamin'     => $jenis_kelamin,
                    'user'              => $user,
                    'gambar'            => $gambar
                ];

                $this->session->set_userdata('user', $data);

                $this->session->set_flashdata('sukses', 'Terima kasih, Registrasi berhasil dilakukan..');
                $this->Auth_model->insert('tbl_users', $data);
                redirect('admin');
            }
        }
    }

    // logout
    public function logout()
    {
        $array  = [
            'id', 'handphone', 'nama', 'status'
        ];

        $this->session->unset_userdata($array);
        $this->session->sess_destroy();

        redirect('auth');
    }
}
