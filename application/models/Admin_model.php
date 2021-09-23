<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    // mengambil 1 row
    public function row($tabel, $fields, $id)
    {
        return $this->db->get_where($tabel, [$fields => $id])->row_array();
    }

    // mengambil semua data
    public function get($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }

    // tambah data
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    // update data
    public function update($tabel, $id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($tabel, $data);
    }

    // delete data
    public function delete($table, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->delete($table);
    }
}
