<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

    public function view_lap_pelaku_umkm()
    {
        $data['title'] = 'Laporan Per User UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list_hak_akses'] = $this->hak_akses_m->getAllListHakAkses();
        $data['list_desa'] = $this->desa_m->getAllListDesa();
        $data['pelaku'] = $this->pelaku_umkm_m->getAllPelakuUMKM();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_lap_pelaku_umkm', $data);
        $this->load->view('templates/footer');
    }

    public function view_lap_umkm()
    {
        $data['title'] = 'Laporan Per UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_umkm'] = $this->perizinan_umkm_m->getUMKM();
        $data['list_all_pelaku_umkm'] = $this->perizinan_umkm_m->getAllPelakuUMKM();
        $data['list_all_jenis_usaha'] = $this->perizinan_umkm_m->getAllJenisUsaha();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_lap_umkm', $data);
        $this->load->view('templates/footer');
    }
}
?>