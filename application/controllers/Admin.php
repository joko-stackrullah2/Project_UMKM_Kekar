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
        $this->load->model('Jenis_usaha_m','jenis_usaha_m');
        $this->load->model('Produk_m','produk_m');
        $this->load->model('Desa_m','desa_m');
    }

    //PELAKU UMKM

    public function index()
    {
        $data['title'] = 'Pelaku UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list_hak_akses'] = $this->hak_akses_m->getAllListHakAkses();
        $data['list_desa'] = $this->desa_m->getAllListDesa();
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








    // JENIS USAHA

    public function jenis_usaha()
    {
        $data['title'] = 'Jenis Usaha';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataJenisUsaha'] = $this->jenis_usaha_m->getAllJenisUsaha();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/jenis_usaha', $data);
        $this->load->view('templates/footer');
    }

    public function newOrEditJenisUsaha()
    {
        $tipe = htmlspecialchars($this->input->post('tipe', true));
        $jenis_usaha_id = htmlspecialchars($this->input->post('jenis_usaha_id', true));
        $data = ['jenis_usaha' => htmlspecialchars($this->input->post('jenis_usaha', true))];
        if($tipe == 'new'){
            $insert = $this->jenis_usaha_m->newJenisUsaha($data);
            if ($insert) {
                echo json_encode(array('success' => 'Berhasil menambahkan jenis usaha.'));
            } else {
                echo json_encode(array('error' => 'Gagal menambahkan jenis usaha.'));
            }
        }else{
            $edit = $this->jenis_usaha_m->editJenisUsaha($data,$jenis_usaha_id);
            if ($edit) {
                echo json_encode(array('success' => 'Berhasil mengedit jenis usaha.'));
            } else {
                echo json_encode(array('error' => 'Gagal mengedit jenis usaha.'));
            }
        }
    }

    public function deleteJenisUsaha()
    {
        $data = ['jenis_usaha_id' => htmlspecialchars($this->input->post('jenis_usaha_id', true))];
        $delete = $this->jenis_usaha_m->deleteJenisUsaha($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus jenis usaha.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus jenis usaha.'));
        }
    }








    // PRODUK UMKM

    public function produk_umkm()
    {
        $data['title'] = 'Produk UMKM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataProduk'] = $this->produk_m->getAllProduk();
        $data['listUMKM'] = $this->db->get('m_umkm')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/produk', $data);
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












    // UMKM DAN PERIZINAN UMKM

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

    public function view_perizinan_umkm()
    {
        $data['title'] = 'UMKM dan Perizinannya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_umkm'] = $this->perizinan_umkm_m->getUMKM();
        $data['list_all_pelaku_umkm'] = $this->perizinan_umkm_m->getAllPelakuUMKM();
        $data['list_all_jenis_usaha'] = $this->perizinan_umkm_m->getAllJenisUsaha();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/view_perizinan_umkm', $data);
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
            'is_verifikasi' => $is_verifikasi,
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










    // DESA

    public function view_desa()
    {
        $data['title'] = 'Desa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataDesa'] = $this->desa_m->getAllListDesa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master_umkm/desa', $data);
        $this->load->view('templates/footer');
    }

    public function newOrEditDesa()
    {
        $tipe = htmlspecialchars($this->input->post('tipe', true));
        $desa_id = htmlspecialchars($this->input->post('desa_id', true));
        $data = ['desa' => htmlspecialchars($this->input->post('desa', true))];
        if($tipe == 'new'){
            $insert = $this->desa_m->newDesa($data);
            if ($insert) {
                echo json_encode(array('success' => 'Berhasil menambahkan desa.'));
            } else {
                echo json_encode(array('error' => 'Gagal menambahkan desa.'));
            }
        }else{
            $edit = $this->desa_m->editDesa($data,$desa_id);
            if ($edit) {
                echo json_encode(array('success' => 'Berhasil mengedit desa.'));
            } else {
                echo json_encode(array('error' => 'Gagal mengedit desa.'));
            }
        }
    }

    public function deleteDesa()
    {
        $data = ['desa_id' => htmlspecialchars($this->input->post('desa_id', true))];
        $delete = $this->desa_m->deleteDesa($data);
        if ($delete) {
            echo json_encode(array('success' => 'Berhasil menghapus desa.'));
        } else {
            echo json_encode(array('error' => 'Gagal menghapus desa.'));
        }
    }






        // MANAJEMEN DOKUMEN PERIZINAN

        public function view_manajemen_perizinan_umkm()
        {
            $data['title'] = 'Manajemen Perizinan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $data['data_umkm'] = $this->perizinan_umkm_m->getUMKM();
            $data['list_all_pelaku_umkm'] = $this->perizinan_umkm_m->getAllPelakuUMKM();
            $data['list_all_jenis_usaha'] = $this->perizinan_umkm_m->getAllJenisUsaha();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_umkm/view_manajemen_perizinan_umkm', $data);
            $this->load->view('templates/footer');
        }
    
        public function verifPerizinan()
        {
            $catatan_verifikasi = htmlspecialchars($this->input->post('catatan_verifikasi', true));
            $is_verifikasi = htmlspecialchars($this->input->post('is_verifikasi', true));
            $tanggal_pengajuan_izin = date("Y-m-d H:i:s");
            $umkm_id = htmlspecialchars($this->input->post('umkm_id', true));
    
            $data = [
                //default verifikasi adalah null jika bukan admin
                'is_verifikasi' => $is_verifikasi,
                'catatan_verifikasi' => $catatan_verifikasi,
                'tanggal_pengajuan_izin' => $tanggal_pengajuan_izin
            ];
    
            //editUMKM sama aja bisa mengupdate perizinan
            $edit = $this->perizinan_umkm_m->editUMKM($data,$umkm_id);
            if ($edit) {
                echo json_encode(
                    array(
                        'msg' => 'Verif Perizinan UMKM Berhasil.',
                        'status' => true
                    )
                );
            } else {
                echo json_encode(
                    array(
                        'msg' => 'Verif Perizinan UMKM Gagal.',
                        'status' => false
                    )
                );
            }
        }
}
