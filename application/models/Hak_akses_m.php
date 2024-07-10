<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Hak_akses_m extends CI_Model
{
    public function getAllListHakAkses()
    {
        $query = "SELECT * FROM user_role WHERE role_id != 1";
        return $this->db->query($query)->result_array();
    }

    public function newHakAkses($data) {
        return $this->db->insert('user_role', $data);
    }

    public function editHakAkses($data,$role_id) {
        $this->db->where("role_id",$role_id);
        return $this->db->update('user_role', $data);
    }
}
