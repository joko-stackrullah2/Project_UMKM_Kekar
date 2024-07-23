<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_usaha_m extends CI_Model
{

    public function getAllJenisUsaha() {
        return $this->db->query("SELECT * FROM m_jenis_usaha")->result_array();
    }

    public function newJenisUsaha($data) {
        return $this->db->insert('m_jenis_usaha', $data);
    }

    public function editJenisUsaha($data,$jenis_usaha_id) {
        $this->db->where("jenis_usaha_id",$jenis_usaha_id);
        return $this->db->update('m_jenis_usaha', $data);
    }

    public function deleteJenisUsaha($data) {
        return $this->db->delete('m_jenis_usaha', $data);
    }
}
