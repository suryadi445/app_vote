<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote_model extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function join()
    {
        $this->db->select('tbl_kandidat.no_urut');
        $this->db->select('nama');
        $this->db->select('nik');
        $this->db->select('foto');
        $this->db->select('alamat');
        $this->db->select('vote.hasil');
        $this->db->select('vote.total_pemilih');
        $this->db->select('vote.pemilih_sah');
        $this->db->select('vote.tidak_sah');
        $this->db->select('vote.golput');
        $this->db->from('tbl_kandidat');
        $this->db->join('vote', 'tbl_kandidat.no_urut = vote.no_urut', 'left');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
