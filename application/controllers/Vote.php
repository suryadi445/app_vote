<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Vote_model');
    }

    public function index()
    {

        $data['result']   = $this->Vote_model->get('tbl_kandidat');

        $data['judul']    = 'Voting';
        $this->load->view('template_auth/header', $data);
        $this->load->view('vote/index', $data);
        $this->load->view('template_auth/footer');
    }

    public function test_vote()
    {
        $data['judul']    = 'Voting';
        $this->load->view('template_auth/header', $data);
        $this->load->view('vote/test_vote', $data);
        $this->load->view('template_auth/footer');
    }

    public function hasil()
    {

        $data['join']       = $this->Vote_model->join();

        $data['judul']    = 'Hasil Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('vote/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function hasil_ajax()
    {
        $data       = $this->Vote_model->join();

        echo json_encode($data);
    }

    public function ajax_alert()
    {
        $this->db->select_sum('hasil');
        $this->db->from('vote');
        $data = $this->db->get()->row_array();

        echo json_encode($data);
    }

    public function ajax_sum()
    {
        $this->db->select_sum('total_pemilih');
        $this->db->from('vote');
        $total = $this->db->get()->row_array();

        $this->db->select_sum('pemilih_sah');
        $this->db->from('vote');
        $sah = $this->db->get()->row_array();

        $this->db->select_sum('tidak_sah');
        $this->db->from('vote');
        $tidak = $this->db->get()->row_array();

        $this->db->select_sum('golput');
        $this->db->from('vote');
        $golput = $this->db->get()->row_array();

        $data = [$total, $sah, $tidak, $golput];

        echo json_encode($data);
    }

    public function insert()
    {
        $data_kandidat      = htmlspecialchars($this->input->post('data_kandidat', true));
        $pemilih    = htmlspecialchars($this->input->post('pemilih', true));

        $data['row']        = $this->db->get_where('vote', ['no_urut' => $data_kandidat])->row_array();

        $hasil_perolehan    = $data['row']['hasil'];
        $total_pemilih      = $data['row']['total_pemilih'];
        $pemilih_sah        = $data['row']['pemilih_sah'];

        $data = [
            'hasil'         => $hasil_perolehan + 1,
            'total_pemilih' => $total_pemilih + 1,
            'pemilih_sah'   => $pemilih_sah + 1
        ];

        $query = $this->Vote_model->update('vote', $data, 'no_urut', $data_kandidat);

        $data  = ['aktivasi' => 1];

        $query_aktivasi = $this->Vote_model->update('tbl_pemilih', $data, 'nik', $pemilih);


        if ($query && $query_aktivasi) {
            echo json_encode($query);
        } else {
            return false;
        }
    }
}
