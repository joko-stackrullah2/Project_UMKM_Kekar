<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan_umkm_m extends CI_Model
{
    public function getUMKM()
    {
        $query = "SELECT
                a.*,
                b.nama nama_pelaku_umkm,
                c.jenis_usaha AS jenis_usaha,
                CASE
                    WHEN is_verifikasi = 1 THEN 'DITERIMA'
                    WHEN is_verifikasi = 0 THEN 'DITOLAK'
                    WHEN is_verifikasi IS NULL THEN 'BELUM MENGAJUKAN'
                    ELSE is_verifikasi
                END status_verifikasi
            FROM
                m_umkm a
                LEFT JOIN USER b ON a.pelaku_umkm_id = b.id
                LEFT JOIN m_jenis_usaha c ON a.jenis_usaha_id = c.jenis_usaha_id";
        return $this->db->query($query)->result_array();
    }

    public function getUMKMPelaku($user_id='')
    {
        $query = "SELECT
                a.*,
                b.nama nama_pelaku_umkm,
                c.jenis_usaha AS jenis_usaha,
                CASE
                    WHEN is_verifikasi = 1 THEN 'DITERIMA'
                    WHEN is_verifikasi = 0 THEN 'DITOLAK'
                    WHEN is_verifikasi IS NULL THEN 'BELUM MENGAJUKAN'
                    ELSE is_verifikasi
                END status_verifikasi
            FROM
                m_umkm a
                LEFT JOIN USER b ON a.pelaku_umkm_id = b.id
                LEFT JOIN m_jenis_usaha c ON a.jenis_usaha_id = c.jenis_usaha_id
            WHERE a.pelaku_umkm_id = $user_id";
        return $this->db->query($query)->result_array();
    }

    public function getOldImage()
    {
        $query = "SELECT
                foto_nib,
                foto_ktp,
                foto_kk
            FROM
                m_umkm ";
        return $this->db->query($query)->result_array();
    }

    public function getAllPelakuUMKM()
    {
        $query = "SELECT * FROM user WHERE role_id != 1";
        return $this->db->query($query)->result_array();
    }

    public function getAllJenisUsaha()
    {
        $query = "SELECT * FROM m_jenis_usaha";
        return $this->db->query($query)->result_array();
    }

    public function newUMKM($umkm) {
        return $this->db->insert('m_umkm', $umkm);
    }

    public function editUMKM($data,$id_umkm) {
        $this->db->where('id_umkm', $id_umkm);
        return $this->db->update('m_umkm', $data);
    }

    public function is_email_registered_umkm($email) {
        $query = $this->db->query("SELECT email_umkm FROM m_umkm WHERE email_umkm = '$email' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUMKM($data) {
        return $this->db->delete('m_umkm', $data);
    }

}
