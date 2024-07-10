<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Perizinan_umkm_m', 'perizinan_umkm_m');
        $this->load->model('Hak_akses_m', 'hak_akses_m');
        $this->load->model('Auth_m','auth_m');
        $this->load->model('Pelaku_umkm_m','pelaku_umkm_m');
    }

    //PELAKU UMKM

    public function index()
    {
        $data['title'] = 'Pelaku UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list_hak_akses'] = $this->hak_akses_m->getAllListHakAkses();
        $data['pelaku'] = $this->pelaku_umkm_m->getAllPelakuUMKM();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pelaku_umkm', $data);
        $this->load->view('templates/footer');
    }

    public function newPelakuUMKM()
    {
        $email = $this->input->post('email', true);

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' =>  htmlspecialchars($this->input->post('role', true)),
            'is_active' => 1,
            'date_created' => time()
        ];

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        if ($this->pelaku_umkm_m->is_email_registered($email)) {
            echo json_encode(array('error' => 'Email ini telah digunakan !'));
            return;
        }

        $insert = $this->pelaku_umkm_m->newPelakuUMKM($data,$user_token);
        if ($insert) {
            echo json_encode(array('success' => 'Tambah Pelaku UMKM Berhasil.'));
        } else {
            echo json_encode(array('error' => 'Edit Pelaku UMKM Gagal.'));
        }
    }

    public function editPelakuUMKM()
    {
        $email = $this->input->post('email', true);
        $pelaku_id = htmlspecialchars($this->input->post('pelaku_id', true));

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
            'email' => htmlspecialchars($email),
            'role_id' =>  htmlspecialchars($this->input->post('role', true)),
            'is_active' => 1,
            'date_created' => time()
        ];

        $edit = $this->pelaku_umkm_m->editPelakuUMKM($data,$pelaku_id);
        if ($edit) {
            echo json_encode(array('success' => 'Edit pelaku UMKM Berhasil.'));
        } else {
            echo json_encode(array('error' => 'Edit pelaku UMKM Gagal.'));
        }
    }

    public function deletePelakuUMKM()
    {
        $data = ['id' => htmlspecialchars($this->input->post('id', true))];
        $delete = $this->pelaku_umkm_m->deletePelakuUMKM($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus Pelaku UMKM.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus Pelaku UMKM.'));
        }
    }











    //HAK AKSES

    public function view_hak_akses_role()
    {
        $data['title'] = 'Hak Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_hak_akses_role', $data);
        $this->load->view('templates/footer');
    }

    public function newOrEditHakAkses()
    {
        $tipe = htmlspecialchars($this->input->post('tipe', true));
        $role_id = htmlspecialchars($this->input->post('role_id', true));
        $data = ['role' => htmlspecialchars($this->input->post('hak_akses', true))];
        if($tipe == 'new'){
            $insert = $this->hak_akses_m->newHakAkses($data);
            if ($insert) {
                echo json_encode(array('success' => 'Berhasil menambahkan role hak akses.'));
            } else {
                echo json_encode(array('error' => 'Gagal menambahkan role hak akses.'));
            }
        }else{
            $edit = $this->hak_akses_m->editHakAkses($data,$role_id);
            if ($edit) {
                echo json_encode(array('success' => 'Berhasil mengedit role hak akses.'));
            } else {
                echo json_encode(array('error' => 'Gagal mengedit role hak akses.'));
            }
        }
    }

    public function deleteHakAkses()
    {
        $data = ['role_id' => htmlspecialchars($this->input->post('role_id', true))];
        $delete = $this->hak_akses_m->deleteHakAkses($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus role hak akses.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus role hak akses.'));
        }
    }


    public function view_hak_akses_role_centang($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['role_id' => $role_id])->row_array();

        $this->db->where('menu_id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_hak_akses_role_centang', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function jenis_usaha()
    {
        $data['title'] = 'Jenis Usaha';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('m_jenis_usaha')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/jenis_usaha', $data);
        $this->load->view('templates/footer');
    }

    public function produk_umkm()
    {
        $data['title'] = 'Produk UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('m_produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/produk', $data);
        $this->load->view('templates/footer');
    }

    public function umkm()
    {
        $data['title'] = 'Data UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('m_umkm')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/umkm', $data);
        $this->load->view('templates/footer');
    }

    public function perizinan_umkm()
    {
        $data['title'] = 'Perizinan UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_umkm'] = $this->perizinan_umkm_m->getUMKM();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/perizinan_umkm', $data);
        $this->load->view('templates/footer');
    }
}
