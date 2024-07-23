<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_m extends CI_Model
{

    public function getAllProduk() {
        return $this->db->query("SELECT 
        a.*,b.nama_umkm 
        FROM m_produk a
        LEFT JOIN m_umkm b on a.id_umkm = b.id_umkm")->result_array();
    }

    public function getAllProdukByPelaku($user_id='') {
        return $this->db->query("SELECT 
        a.*,
        b.nama_umkm 
        FROM m_produk a
        LEFT JOIN m_umkm b on a.id_umkm = b.id_umkm
        WHERE b.pelaku_umkm_id = $user_id")->result_array();
    }

    public function newProduk($data) {
        return $this->db->insert('m_produk', $data);
    }

    public function editProduk($data,$id_produk) {
        $this->db->where("id_produk",$id_produk);
        return $this->db->update('m_produk', $data);
    }

    public function deleteProduk($data) {
        return $this->db->delete('m_produk', $data);
    }
}
