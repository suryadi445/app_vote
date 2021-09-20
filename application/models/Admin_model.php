<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function row($tabel, $fields, $id)
    {
        return $this->db->get_where($tabel, [$fields => $id])->row_array();
    }

    public function get($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }


    public function update($tabel, $id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($tabel, $data);
    }
}
