<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function registration($data,$user_token) {
        $this->db->insert('user_token', $user_token);
        return $this->db->insert('user', $data);
    }

    public function is_email_registered($email) {
        $query = $this->db->query("SELECT email FROM user WHERE email = '$email' ");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
