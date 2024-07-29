<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perizinan_umkm_m', 'perizinan_umkm_m');
    }

	public function index()
	{
        $data['jml_terverifikasi'] = $this->db->get_where('m_umkm', ['is_verifikasi' => 1])->num_rows();
		$data['jml_tertolak'] = $this->db->get_where('m_umkm', ['is_verifikasi' => 0])->num_rows();
		$data['jml_belum_verif'] = $this->db->get_where('m_umkm', ['is_verifikasi' => null])->num_rows();
		$data['jml_semua'] = $this->db->get('m_umkm')->num_rows();
		$this->load->view('home/index',$data);
	}
}
