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

        $data['result'] = $this->Admin_model->get_where('tbl_users', 'user', 'pengurus')->result_array();

        $data['judul']    = 'Pengurus';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('super_admin/pengurus', $data);
        $this->load->view('templates/footer');
    }

    public function edit_pengurus()
    {
        $id             = htmlspecialchars($this->input->post('data_id', true));
        $data['row']    = $this->Admin_model->get_where('tbl_users', 'id', $id)->row_array();

        echo json_encode($data['row']);
    }

    public function proses_edit_pengurus()
    {
        $id         = htmlspecialchars($this->input->post('id', true));
        $nama       = htmlspecialchars($this->input->post('nama', true));
        $nik        = htmlspecialchars($this->input->post('nik', true));
        $handphone  = htmlspecialchars($this->input->post('handphone', true));
        $j_kelamin  = htmlspecialchars($this->input->post('jenis_kelamin', true));
        $gambar     = $_FILES['gambar']['name'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric');
        $this->form_validation->set_rules('handphone', 'No Handphone', 'required|trim|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        $data['row']        = $this->db->get_where('tbl_users', ['id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $error = [
                'nama' => (form_error('nama', '<p>', '</p>')),
                'nik' => (form_error('nik', '<p>', '</p>')),
                'handphone' => (form_error('handphone', '<p>', '</p>')),
                'j_kelamin' => (form_error('jenis_kelamin', '<p>', '</p>')),

            ];
            echo json_encode($error);
        } else {
            if ($gambar) {
                $config['upload_path']      = './assets/upload_image';
                $config['allowed_types']    = 'jpg|jpeg|png';
                $config['max_size']         = 2000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    // berhasil diupload
                    $foto_lama          = $data['row']['gambar'];
                    $gambar_baru        = $this->upload->data('file_name'); //membuat nama gambar baru

                    $data = [
                        'nama' => $nama,
                        'nik' => $nik,
                        'gambar' => $gambar_baru,
                        'handphone' => $handphone,
                        'jenis_kelamin' => $j_kelamin
                    ];

                    $this->session->set_flashdata('sukses', 'Data berhasil diedit');

                    $query = $this->Admin_model->update('tbl_users', $id, $data);

                    if ($query) {
                        unlink(FCPATH . 'assets/upload_image/' . $foto_lama); // untuk menghapus file yg sudah ada
                        echo json_encode($query);
                    }
                } else {
                    $error = [
                        'gambar' =>  $this->upload->display_errors()
                    ];
                    echo json_encode($error);
                }
            } else {
                $data = [
                    'nama'          => $nama,
                    'nik'           => $nik,
                    'handphone'     => $handphone,
                    'jenis_kelamin' => $j_kelamin
                ];

                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                $query = $this->Admin_model->update('tbl_users', $id, $data);
                echo json_encode($query);
            }
        }
    }

    public function delete_pengurus($id)
    {
        $row        = $this->Admin_model->row('tbl_users', 'id', $id);
        $foto_lama  = $row['gambar'];

        $query      = $this->Admin_model->delete('tbl_users', 'id', $id);
        if ($query) {
            unlink(FCPATH . 'assets/upload_image/' . $foto_lama); // untuk menghapus file yg sudah ada
        }

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('admin/pengurus');
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

    // mendapatkan data row untuk edit
    public function edit_kandidat()
    {
        $id             = htmlspecialchars($this->input->post('data_id', true));
        $data['row']    = $this->Admin_model->row('tbl_kandidat', 'id', $id);

        echo json_encode($data['row']);
    }

    // proses edit data kandidat
    public function proses_edit()
    {
        $nama       = htmlspecialchars($this->input->post('nama', true));
        $nik        = htmlspecialchars($this->input->post('nik', true));
        $alamat     = htmlspecialchars($this->input->post('alamat', true));
        $no_urut    = htmlspecialchars($this->input->post('no_kandidat', true));
        $handphone  = htmlspecialchars($this->input->post('handphone', true));
        $id         = htmlspecialchars($this->input->post('id', true));
        $gambar     = $_FILES['gambar']['name'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_kandidat', 'No Urut', 'required|trim|numeric');
        $this->form_validation->set_rules('handphone', 'No Handphone', 'required|trim|numeric');

        $data['row']        = $this->db->get_where('tbl_kandidat', ['id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $error = [
                'nama' => (form_error('nama', '<p>', '</p>')),
                'nik' => (form_error('nik', '<p>', '</p>')),
                'alamat' => (form_error('alamat', '<p>', '</p>')),
                'no_kandidat' => (form_error('no_kandidat', '<p>', '</p>')),
                'handphone' => (form_error('handphone', '<p>', '</p>')),
            ];
            echo json_encode($error);
        } else {
            if ($gambar) {
                $config['upload_path']      = './assets/upload_kandidat';
                $config['allowed_types']    = 'jpg|jpeg|png';
                $config['max_size']         = 2000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    // berhasil diupload
                    $foto_lama          = $data['row']['foto'];
                    $gambar_baru        = $this->upload->data('file_name'); //membuat nama gambar baru

                    $data = [
                        'nama' => $nama,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'foto' => $gambar_baru,
                        'no_urut' => $no_urut,
                        'handphone' => $handphone,
                    ];

                    unlink(FCPATH . 'assets/upload_kandidat/' . $foto_lama); // untuk menghapus file yg sudah ada
                    $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                    $query = $this->Admin_model->update('tbl_kandidat', $id, $data);
                    echo json_encode($query);
                } else {
                    $error = [
                        'gambar' =>  $this->upload->display_errors()
                    ];
                    echo json_encode($error);
                }
            } else {
                $data = [
                    'nama'      => $nama,
                    'nik'       => $nik,
                    'alamat'    => $alamat,
                    'no_urut'   => $no_urut,
                    'handphone' => $handphone,
                ];

                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                $query = $this->Admin_model->update('tbl_kandidat', $id, $data);
                echo json_encode($query);
            }
        }
    }

    // tambah kandidat
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
                    'foto'              => $gambar,
                    'alamat'            => $alamat,
                    'no_urut'           => $no_urut
                ];

                $this->session->set_userdata('user', $data);

                $this->session->set_flashdata('sukses', 'Terima kasih, Registrasi berhasil dilakukan..');
                $this->Admin_model->insert('tbl_kandidat', $data);
                redirect('admin/daftar_kandidat');
            }
        }
    }

    public function delete($id)
    {

        $row        = $this->Admin_model->row('tbl_kandidat', 'id', $id);
        $foto_lama  = $row['foto'];

        $query      = $this->Admin_model->delete('tbl_kandidat', 'id', $id);
        if ($query) {
            unlink(FCPATH . 'assets/upload_kandidat/' . $foto_lama); // untuk menghapus file yg sudah ada
        }

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('admin/daftar_kandidat');
    }
}
