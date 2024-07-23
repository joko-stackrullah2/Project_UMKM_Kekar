<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Perizinan_umkm_m', 'perizinan_umkm_m');
        $this->load->model('Produk_m','produk_m');
    }

    // UMKM DAN PERIZINAN UMKM

    public function index()
    {
        $data['title'] = 'UMKM dan Perizinannya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_umkm'] = $this->perizinan_umkm_m->getUMKMPelaku($data['user']['id']);
        $data['list_all_pelaku_umkm'] = $this->perizinan_umkm_m->getAllPelakuUMKM();
        $data['list_all_jenis_usaha'] = $this->perizinan_umkm_m->getAllJenisUsaha();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelaku/index', $data);
        $this->load->view('templates/footer');
    }

    public function newUMKM()
    {
        $email_umkm = $this->input->post('email_umkm', true);

        $data = [
            'pelaku_umkm_id' => htmlspecialchars($this->input->post('pelaku_umkm', true)),
            'nama_umkm' => htmlspecialchars($this->input->post('nama_umkm', true)),
            'alamat_umkm' => htmlspecialchars($this->input->post('alamat_umkm', true)),
            'email_umkm' => htmlspecialchars($email_umkm),
            'telepon_umkm' => htmlspecialchars($this->input->post('telepon_umkm', true)),
            // 'foto_umkm_1' => htmlspecialchars($this->input->post('foto_umkm_1', true)),
            // 'foto_umkm_2' => htmlspecialchars($this->input->post('foto_umkm_2', true)),
            'tanggal_pendirian' => date("Y-m-d H:i:s"),
            'jenis_usaha_id' => htmlspecialchars($this->input->post('jenis_usaha', true)),
            // 'kategori_usaha' => htmlspecialchars($this->input->post('jenis_usaha_name', true))
        ];

        if ($this->perizinan_umkm_m->is_email_registered_umkm($email_umkm)) {
            echo json_encode(array('error' => 'Email UMKM ini telah digunakan !'));
            return;
        }

        $insert = $this->perizinan_umkm_m->newUMKM($data);
        if ($insert) {
            echo json_encode(array('success' => 'Tambah UMKM Berhasil.'));
        } else {
            echo json_encode(array('error' => 'Tambah UMKM Gagal.'));
        }
    }

    public function editUMKM()
    {
        $email_umkm = $this->input->post('email_umkm', true);
        $id_umkm = htmlspecialchars($this->input->post('id_umkm', true));

        $data = [
            'pelaku_umkm_id' => htmlspecialchars($this->input->post('pelaku_umkm', true)),
            'nama_umkm' => htmlspecialchars($this->input->post('nama_umkm', true)),
            'alamat_umkm' => htmlspecialchars($this->input->post('alamat_umkm', true)),
            'email_umkm' => htmlspecialchars($email_umkm),
            'telepon_umkm' => htmlspecialchars($this->input->post('telepon_umkm', true)),
            // 'foto_umkm_1' => htmlspecialchars($this->input->post('foto_umkm_1', true)),
            // 'foto_umkm_2' => htmlspecialchars($this->input->post('foto_umkm_2', true)),
            'tanggal_pendirian' => date("Y-m-d H:i:s"),
            'jenis_usaha_id' => htmlspecialchars($this->input->post('jenis_usaha', true)),
            // 'kategori_usaha' => htmlspecialchars($this->input->post('jenis_usaha_name', true))
        ];

        $edit = $this->perizinan_umkm_m->editUMKM($data,$id_umkm);
        if ($edit) {
            echo json_encode(array('success' => 'Edit UMKM Berhasil.'));
        } else {
            echo json_encode(array('error' => 'Edit UMKM Gagal.'));
        }
    }
    
    public function deleteUMKM()
    {
        $data = ['id_umkm' => htmlspecialchars($this->input->post('id_umkm', true))];
        $delete = $this->perizinan_umkm_m->deleteUMKM($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus UMKM.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus UMKM.'));
        }
    }

    public function editPerizinanUMKM($id_umkm="")
    {
        $is_oss = htmlspecialchars($this->input->post('is_oss', true));
        $is_bpom = htmlspecialchars($this->input->post('is_bpom', true));
        $tanggal_pengajuan_izin = date("Y-m-d H:i:s");

        $config['upload_path'] = './assets/img/perizinan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2000; // Set your size limit (in KB)

        $this->load->library('upload', $config);

        $files = $_FILES;
        $count = count($_FILES['images']['name']);
        $uploaded_files = [];

        for ($i = 0; $i < $count; $i++) {
            if (!empty($files['images']['name'][$i])) {
                $_FILES['image']['name'] = $files['images']['name'][$i];
                $_FILES['image']['type'] = $files['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['images']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['images']['error'][$i];
                $_FILES['image']['size'] = $files['images']['size'][$i];

                if ($this->upload->do_upload('image')) {
                    $uploaded_files[] = $this->upload->data('file_name');
                } else {
                    $error = $this->upload->display_errors();
                    echo json_encode(['error' => $error]);
                    return;
                }
            }
        }

        if (empty($uploaded_files) || count($uploaded_files) < 3) {
            echo json_encode(['error' => 'No files were selected for upload']);
            return;
        }

        $data = [
            'is_oss' => $is_oss,
            'is_bpom' => $is_bpom,
            'tanggal_pengajuan_izin' => $tanggal_pengajuan_izin,
            'foto_nib' => $uploaded_files[0],
            'foto_ktp' => $uploaded_files[1],
            'foto_kk' => $uploaded_files[2]
        ];

        //editUMKM sama aja bisa mengupdate perizinan
        $edit = $this->perizinan_umkm_m->editUMKM($data,$id_umkm);
        if ($edit) {
            echo json_encode(array('success' => 'Edit Perizinan UMKM Berhasil.'));
        } else {
            echo json_encode(array('error' => 'Edit Perizinan UMKM Gagal.'));
        }
    }











    //PRODUK - PELAKU UMKM

        public function produk_umkm()
        {
            $data['title'] = 'Produk UMKM';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $data['dataProduk'] = $this->produk_m->getAllProdukByPelaku($data['user']['id']);
            $data['listUMKMPelaku'] = $this->perizinan_umkm_m->getUMKMPelaku($data['user']['id']);
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelaku/produk', $data);
            $this->load->view('templates/footer');
        }
    
        public function newProduk()
        {
            $data = [
                'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
                'deskripsi_produk' => htmlspecialchars($this->input->post('deskripsi_produk', true)),
                'harga_produk' => htmlspecialchars($this->input->post('harga_produk', true)),
                'stok_produk' => htmlspecialchars($this->input->post('stok_produk', true)),
                'id_umkm' =>  htmlspecialchars($this->input->post('umkm', true)),
            ];
    
            $insert = $this->produk_m->newProduk($data);
            if ($insert) {
                echo json_encode(array('success' => 'Tambah Produk Berhasil.'));
            } else {
                echo json_encode(array('error' => 'Tambah Produk Gagal.'));
            }
        }
    
        public function editProduk()
        {
            $id_produk = htmlspecialchars($this->input->post('id_produk', true));
    
            $data = [
                'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
                'deskripsi_produk' => htmlspecialchars($this->input->post('deskripsi_produk', true)),
                'harga_produk' => htmlspecialchars($this->input->post('harga_produk', true)),
                'stok_produk' => htmlspecialchars($this->input->post('stok_produk', true)),
                'id_umkm' => htmlspecialchars($this->input->post('umkm', true))
            ];
    
            $edit = $this->produk_m->editProduk($data,$id_produk);
            if ($edit) {
                echo json_encode(array('success' => 'Edit Produk Berhasil.'));
            } else {
                echo json_encode(array('error' => 'Edit Produk Gagal.'));
            }
        }
    
        public function deleteProduk()
        {
            $data = ['id_produk' => htmlspecialchars($this->input->post('id_produk', true))];
            $delete = $this->produk_m->deleteProduk($data);
            if ($delete) {
                echo json_encode(array('success' => 'Berhasil menghapus Produk.'));
            } else {
                echo json_encode(array('error' => 'Gagal menghapus Produk.'));
            }
        }
}
?>