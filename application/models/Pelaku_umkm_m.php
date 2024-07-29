<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaku_umkm_m extends CI_Model
{

    public function getAllPelakuUMKM() {
        return $this->db->query("SELECT a.*,b.role , c.desa_id,c.desa
        FROM user a
        LEFT JOIN user_role b on a.role_id = b.role_id
        LEFT JOIN m_desa c on a.desa_id = c.desa_id
        WHERE a.role_id != 1")->result_array();
    }

    public function getAllPelakuUMKMKoordinator($desa_id) {
        return $this->db->query("SELECT a.*,b.role , c.desa
        FROM user a
        LEFT JOIN user_role b on a.role_id = b.role_id
        LEFT JOIN m_desa c on a.desa_id = c.desa_id
        WHERE a.desa_id = $desa_id AND a.role_id != 1")->result_array();
    }

    public function newPelakuUMKM($data,$user_token) {
        $this->db->insert('user_token', $user_token);
        return $this->db->insert('user', $data);
    }

    public function editPelakuUMKM($data,$pelaku_id) {
        $this->db->where('id', $pelaku_id);
        return $this->db->update('user', $data);
    }

    public function is_email_registered($email) {
        $query = $this->db->query("SELECT email FROM user WHERE email = '$email' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePelakuUMKM($data) {
        return $this->db->delete('user', $data);
    }
}
