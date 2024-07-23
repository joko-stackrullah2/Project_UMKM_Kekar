<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

// MENU
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function newOrEditMenu()
    {
        $this->load->model('Menu_model', 'menu_m');
        $tipe = htmlspecialchars($this->input->post('tipe', true));
        $menu_id = htmlspecialchars($this->input->post('menu_id', true));
        $data = ['menu' => htmlspecialchars($this->input->post('menu', true))];
        if($tipe == 'new'){
            $insert = $this->menu_m->newMenu($data);
            if ($insert) {
                echo json_encode(array('success' => 'Berhasil menambahkan menu.'));
            } else {
                echo json_encode(array('error' => 'Gagal menambahkan menu.'));
            }
        }else{
            $edit = $this->menu_m->editMenu($data,$menu_id);
            if ($edit) {
                echo json_encode(array('success' => 'Berhasil mengedit menu.'));
            } else {
                echo json_encode(array('error' => 'Gagal mengedit menu.'));
            }
        }
    }

    public function deleteMenu()
    {
        $this->load->model('Menu_model', 'menu_m');
        $data = ['menu_id' => htmlspecialchars($this->input->post('menu_id', true))];
        $delete = $this->menu_m->deleteMenu($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus menu.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus menu.'));
        }
    }









//SUB MENU
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }


    public function editSubMenu()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $this->load->model('Menu_model', 'menu');
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),
            'id' => $id
        ];

        $edit = $this->menu->editSubMenu($data,$id);
        if ($edit) {
            echo json_encode(array('success' => 'Edit Sub menu Berhasil.'));
        } else {
            echo json_encode(array('error' => 'Edit Sub Menu Gagal.'));
        }
    }

    public function deleteSubMenu()
    {
        $this->load->model('Menu_model', 'menu');
        $data = ['id' => htmlspecialchars($this->input->post('id', true))];
        $delete = $this->menu->deleteSubMenu($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus Sub Menu.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus Sub Menu.'));
        }
    }
}
