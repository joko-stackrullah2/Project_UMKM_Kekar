<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendamping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Perizinan_umkm_m', 'perizinan_umkm_m');
        $this->load->model('Produk_m','produk_m');
    }

    // UMKM DAN PERIZINAN UMKM

    public function view_pendamping_umkm()
    {
        $data['title'] = 'UMKM dan Perizinannya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_umkm'] = $this->perizinan_umkm_m->getUMKMPelaku($data['user']['id']);
        $data['list_all_pelaku_umkm'] = $this->perizinan_umkm_m->getAllPelakuUMKM();
        $data['list_all_jenis_usaha'] = $this->perizinan_umkm_m->getAllJenisUsaha();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendamping/view_pendamping_umkm', $data);
        $this->load->view('templates/footer');
    }
}
?>