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
                d.desa,
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
                LEFT JOIN m_desa d ON b.desa_id = d.desa_id";
        return $this->db->query($query)->result_array();
    }

    public function getUMKMForKoordinator($desa_id)
    {
        $query = "SELECT
                a.*,
                b.nama nama_pelaku_umkm,
                c.jenis_usaha AS jenis_usaha,
                d.desa,
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
                LEFT JOIN m_desa d ON b.desa_id = d.desa_id
            WHERE b.desa_id = '$desa_id'"
            ;
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


    // Function to insert file data into the database
    public function insert_file_umkm($fileData)
    {
        $this->db->where('umkm_id', $fileData["umkm_id"]);
        $this->db->delete('file_umkm', $fileData);

        $this->db->insert('file_umkm', $fileData);
        return $this->db->insert_id();
    }

    // Function to get file data by id
    public function getFileUmkmById($umkm_id)
    {
        $this->db->where('umkm_id', $umkm_id);
        $query = $this->db->get('file_umkm');
        return $query->result_array();
    }

    public function getFileUmkmByUserId($id)
    {
        $query = "SELECT
        a.file_umkm_id,
        a.path_file,
        a.tipe_file,
        a.keterangan,
        b.nama_umkm,
        c.jenis_usaha,
        d.nama nama_pemilik_umkm,
        b.catatan_verifikasi,
        e.desa,
        CASE 
            WHEN b.is_verifikasi = 0 THEN 'TERTOLAK'
            WHEN b.is_verifikasi IS NULL THEN 'BELUM DIVERIFIKASI'
            WHEN b.is_verifikasi = 1 THEN 'TERVERIFIKASI'
            ELSE ''
        END is_verifikasi
    FROM
        file_umkm a
        LEFT JOIN m_umkm b ON a.umkm_id = b.id_umkm
        LEFT JOIN m_jenis_usaha c ON b.jenis_usaha_id = c.jenis_usaha_id
        LEFT JOIN USER d ON b.pelaku_umkm_id = d.id 
        LEFT JOIN m_desa e ON d.desa_id = e.desa_id 
    WHERE
        d.id = $id";
        return $this->db->query($query)->result_array();
    }

    // Function to update file data in the database
    public function update_file_data($fileId, $fileData)
    {
        // Fetch the old file data
        $oldFileData = $this->get_file_data($fileId);

        // Delete the old file if it exists
        if ($oldFileData && file_exists('./uploads/' . $oldFileData->file_name)) {
            unlink('./uploads/' . $oldFileData->file_name);
        }

        // Update with new file data
        $this->db->where('id', $fileId);
        $this->db->update('file_umkm', $fileData);
    }


    public function deleteDokumen($data) {
        return $this->db->delete('file_umkm', $data);
    }

}
