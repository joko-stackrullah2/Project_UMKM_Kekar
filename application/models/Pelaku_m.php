<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaku_m extends CI_Model
{

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

}
