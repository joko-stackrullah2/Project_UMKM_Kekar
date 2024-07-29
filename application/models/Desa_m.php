<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Desa_m extends CI_Model
{
    public function getAllListDesa()
    {
        $query = "SELECT * FROM m_desa";
        return $this->db->query($query)->result_array();
    }

    public function newDesa($data) {
        return $this->db->insert('m_desa', $data);
    }

    public function editDesa($data,$desa_id) {
        $this->db->where("desa_id",$desa_id);
        return $this->db->update('m_desa', $data);
    }

    public function deleteDesa($data) {
        return $this->db->delete('m_desa', $data);
    }

}
