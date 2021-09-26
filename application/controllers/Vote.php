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
        // $data = $this->db->query("SELECT 
        //                                     a.*, 
        //                                     b.* 
        //                                   FROM tbl_kandidat AS a
        //                                   LEFT JOIN vote AS b
        //                                   ON a.no_urut = b.no_urut
        //                                   ORDER BY b.hasil DESC")->result();

        echo json_encode($data);
    }

    public function data_ajax()
    {
        $this->db->select_sum('hasil');
        $this->db->from('vote');
        $data = $this->db->get()->row_array();

        echo json_encode($data);
    }

    public function insert()
    {
        $data_kandidat      = htmlspecialchars($this->input->post('data_kandidat', true));

        $data['row']        = $this->db->get_where('vote', ['no_urut' => $data_kandidat])->row_array();
        $hasil_perolehan    = $data['row']['hasil'];
        $total_pemilih      = $data['row']['total_pemilih'];
        $pemilih_sah        = $data['row']['pemilih_sah'];

        $data = [
            'hasil'         => $hasil_perolehan + 1,
            'total_pemilih' => $total_pemilih + 1,
            'pemilih_sah'   => $pemilih_sah + 1
        ];


        $this->db->where('no_urut', $data_kandidat);
        $query = $this->db->update('vote', $data);
        if ($query) {
            echo json_encode($query);
        } else {
            return false;
        }
    }
}
