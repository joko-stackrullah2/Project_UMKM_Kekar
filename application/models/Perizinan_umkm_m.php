<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan_umkm_m extends CI_Model
{
    public function getUMKM()
    {
        $query = "SELECT a.*,b.nama AS nama_pelaku_umkm
                  FROM m_umkm a
                  LEFT JOIN user b on a.pelaku_umkm_id = b.id
                ";
        return $this->db->query($query)->result_array();
    }
}
