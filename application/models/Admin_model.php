<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function row($tabel, $fields, $id)
    {
        return $this->db->get_where($tabel, [$fields => $id])->row_array();
    }
}
