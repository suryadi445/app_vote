<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function insert($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }

    public function getRow($tabel, $fields, $handphone)
    {
        return  $this->db->get_where($tabel, [$fields => $handphone])->row_array();
    }
}
