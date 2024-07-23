<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function editSubMenu($data,$id) {
        $this->db->where("id",$id);
        return $this->db->update('user_sub_menu', $data);
    }
    
    public function deleteSubMenu($data) {
        return $this->db->delete('user_sub_menu', $data);
    }


    public function newMenu($data) {
        return $this->db->insert('user_menu', $data);
    }

    public function editMenu($data,$menu_id) {
        $this->db->where("menu_id",$menu_id);
        return $this->db->update('user_menu', $data);
    }

    public function deleteMenu($data) {
        return $this->db->delete('user_menu', $data);
    }
}
