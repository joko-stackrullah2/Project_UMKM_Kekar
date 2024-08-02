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

    private function set_upload_options()
    {
        // upload preferences
        $config = array();
        $config['upload_path'] = './assets/img/perizinan/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = '0'; // 0 means no limit
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function getFileUmkmById()
    {
        $umkm_id = htmlspecialchars($this->input->post('umkm_id', true));
        $data = $this->perizinan_umkm_m->getFileUmkmById($umkm_id);

        echo json_encode($data);
    }

    public function editPerizinanUMKM($id_umkm="")
    {
        $is_oss = htmlspecialchars($this->input->post('is_oss', true));
        $is_bpom = htmlspecialchars($this->input->post('is_bpom', true));
        $is_verifikasi = htmlspecialchars($this->input->post('is_verifikasi', true));
        $role_id = htmlspecialchars($this->input->post('role_id', true));
        $tanggal_pengajuan_izin = date("Y-m-d H:i:s");
        $umkm_id = htmlspecialchars($this->input->post('umkm_id', true));

        // $config['upload_path'] = './assets/img/perizinan/';
        // $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = 2000; // Set your size limit (in KB)

        // $this->load->library('upload', $config);

        // $files = $_FILES;
        // $count = count($_FILES['images']['name']);
        // $uploaded_files = [];

        // for ($i = 0; $i < $count; $i++) {
        //     if (!empty($files['images']['name'][$i])) {
        //         $_FILES['image']['name'] = $files['images']['name'][$i];
        //         $_FILES['image']['type'] = $files['images']['type'][$i];
        //         $_FILES['image']['tmp_name'] = $files['images']['tmp_name'][$i];
        //         $_FILES['image']['error'] = $files['images']['error'][$i];
        //         $_FILES['image']['size'] = $files['images']['size'][$i];

        //         if ($this->upload->do_upload('image')) {
        //             $uploaded_files[] = $this->upload->data('file_name');
        //         } else {
        //             $error = $this->upload->display_errors();
        //             echo json_encode(['error' => $error]);
        //             return;
        //         }
        //     }
        // }

        // if (empty($uploaded_files) || count($uploaded_files) < 3) {
        //     echo json_encode(['error' => 'No files were selected for upload']);
        //     return;
        // }
        $this->load->library('upload');
        $files = $_FILES;
        $descriptions = $this->input->post('descriptions');
        // $fileIds = $this->input->post('file_umkm_ids');
        $numberOfFiles = count($files['files']['name']);
        // $numberOfFilesEdit = count($files['files']['file_umkm_id']);
        // print_r($numberOfFilesEdit);
        // exit;
        for ($i = 0; $i < $numberOfFiles; $i++) {
            $_FILES['file']['name'] = $files['files']['name'][$i];
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());

            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                $fileData = array(
                    'nama_file' => $data['file_name'],
                    'path_file' => "assets/img/perizinan/".$data['file_name'],
                    'keterangan' => $descriptions[$i],
                    'umkm_id' => $umkm_id
                );

                // Assuming $fileId is the ID of the file being edited. If new upload, set $fileId = NULL or handle accordingly.
                // For example purposes, this needs to be handled in your form.
                // $tipeInsertOrEdit = $this->input->post('tipeInsertOrEdit'); 

                // if ($tipeInsertOrEdit) {

                // } else {
                    $this->perizinan_umkm_m->insert_file_umkm($fileData);
                // }

                // echo "File " . ($i + 1) . " uploaded successfully.<br>";
                // echo "Description: " . $descriptions[$i] . "<br><br>";
            } else {
                echo $this->upload->display_errors() . "<br>";
            }
        }

        $data = [
            'is_oss' => $is_oss,
            'is_bpom' => $is_bpom,
            //default verifikasi adalah null jika bukan admin
            'is_verifikasi' => $role_id != 1 ? null : $is_verifikasi,
            'tanggal_pengajuan_izin' => $tanggal_pengajuan_izin
        ];

        //editUMKM sama aja bisa mengupdate perizinan
        $edit = $this->perizinan_umkm_m->editUMKM($data,$id_umkm);
        if ($edit) {
            echo json_encode(
                array(
                    'msg' => 'Edit Perizinan UMKM Berhasil.',
                    'status' => true
                )
            );
        } else {
            echo json_encode(
                array(
                    'msg' => 'Edit Perizinan UMKM Gagal.',
                    'status' => false
                )
            );
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


    


        //MANAJEMEN PERIZINAN - PELAKU UMKM

        public function view_manajemen_dok_perizinan()
        {
            $data['title'] = 'Manajemen Perizinan UMKM';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $data['dataFileUMKM'] = $this->perizinan_umkm_m->getFileUmkmByUserId($data['user']['id']);
            $data['listUMKMPelaku'] = $this->perizinan_umkm_m->getUMKMPelaku($data['user']['id']);
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelaku/manajemen_perizinan', $data);
            $this->load->view('templates/footer');
        }
     
        public function newDokumenPerizinan()
        {
            $umkm = htmlspecialchars($this->input->post('umkm', true));
            $tanggal_upload = date("Y-m-d H:i:s");

            $this->load->library('upload');
            $files = $_FILES;
            $descriptions = $this->input->post('descriptions');
            $numberOfFiles = htmlspecialchars($this->input->post('num_files', true));
            // print_r($numberOfFiles);
            // exit;
            for ($i = 0; $i < $numberOfFiles; $i++) {
                $_FILES['file']['name'] = $files['files']['name'][$i];
                $_FILES['file']['type'] = $files['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $files['files']['error'][$i];
                $_FILES['file']['size'] = $files['files']['size'][$i];

                $this->upload->initialize($this->set_upload_options());

                if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                $fileData = array(
                    'nama_file' => $data['file_name'],
                    'path_file' => "assets/img/perizinan/".$data['file_name'],
                    'keterangan' => $descriptions[$i],
                    'umkm_id' => $umkm,
                    'tanggal_upload' => $tanggal_upload
                );
                $this->perizinan_umkm_m->insert_file_umkm($fileData);
                } else {
                    echo $this->upload->display_errors() . "<br>";
                }
            }
            if($this->db->affected_rows() > 0){
                echo json_encode(
                    array(
                        'msg' => 'Berhasil Upload',
                        'status' => true
                    )
                );
            }else{
                echo json_encode(
                    array(
                        'msg' => 'Gagal Upload',
                        'status' => false
                    )
                );
            }
        }

        public function deleteDokumen()
        {
            $file_umkm_id = ['file_umkm_id' => htmlspecialchars($this->input->post('file_umkm_id', true))];
            $file_path = FCPATH.htmlspecialchars($this->input->post('file_path', true));
            $delete = $this->perizinan_umkm_m->deleteDokumen($file_umkm_id);

            if (file_exists($file_path)) {
                if (unlink($file_path) && $delete) {
                    echo json_encode(array('success' => 'Berhasil menghapus File.'));
                } else {
                    echo json_encode(array('error' => 'Gagal menghapus File.'));
                }
            } else {
                echo json_encode(array('error' => 'File Tidak ditemukan.'));
            }
        }
}
?>