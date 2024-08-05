<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Perizinan_umkm_m', 'perizinan_umkm_m');
        $this->load->model('Hak_akses_m', 'hak_akses_m');
        $this->load->model('Auth_m','auth_m');
        $this->load->model('Pelaku_umkm_m','pelaku_umkm_m');
        $this->load->model('Jenis_usaha_m','jenis_usaha_m');
        $this->load->model('Produk_m','produk_m');
        $this->load->model('Desa_m','desa_m');
    }

    //PELAKU UMKM

    public function view_pelaku_umkm()
    {
        $data['title'] = 'Pelaku UMKM';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->hak_akses_m->getDataUser($this->session->userdata('email'));
        $data['list_hak_akses'] = $this->hak_akses_m->getListHakAksesForRegister();
        $data['list_desa'] = $this->desa_m->getAllListDesa();
        $data['pelaku'] = $this->pelaku_umkm_m->getAllPelakuUMKMKoordinator($data['user']['desa_id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koordinator/pelaku_umkm', $data);
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
            'desa_id' =>  htmlspecialchars($this->input->post('desa', true)),
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
            echo json_encode(array('error' => 'Tambah Pelaku UMKM Gagal.'));
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
            'desa_id' =>  htmlspecialchars($this->input->post('desa', true)),
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






    public function getFileUmkmById()
    {
        $umkm_id = htmlspecialchars($this->input->post('umkm_id', true));
        $data = $this->perizinan_umkm_m->getFileUmkmById($umkm_id);

        echo json_encode($data);
    }

    public function view_manajemen_perizinan_umkm()
    {
        $data['title'] = 'Manajemen Perizinan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_umkm'] = $this->perizinan_umkm_m->getUMKMForKoordinator($data['user']['desa_id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koordinator/view_manajemen_perizinan_umkm', $data);
        $this->load->view('templates/footer');
    }

}
