<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-umkm_tambah">Tambah Data UMKM</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%" scope="col">#</th>
                        <th width="20%" scope="col">Pelaku UMKM</th>
                        <th width="20%" scope="col">Nama UMKM</th>
                        <th width="20%" scope="col">Email UMKM</th>
                        <th width="20%" scope="col">No Telepon UMKM</th>
                        <th width="35%" scope="col">Alamat UMKM</th>
                        <th width="35%" scope="col">Tanggal Pendirian</th>
                        <th width="35%" scope="col">Jenis Usaha</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data_umkm as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['nama_pelaku_umkm']; ?></td>
                        <td><?= $r['nama_umkm']; ?></td>
                        <td><?= $r['email_umkm']; ?></td>
                        <td><?= $r['telepon_umkm']; ?></td>
                        <td><?= $r['alamat_umkm']; ?></td>
                        <td><?= $r['tanggal_pendirian']; ?></td>
                        <td><?= $r['jenis_usaha']; ?></td>
                        <td>
                            <!-- <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a> -->
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-umkm_edit<?= $r['id_umkm']; ?>">Edit</a>
                            <a href="" class="badge badge-warning" data-toggle="modal" data-target="#infoModal<?= $r['id_umkm']; ?>">Ajukan Perizinan</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-umkm_delete<?= $r['id_umkm']; ?>">Delete</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-umkm_edit<?= $r['id_umkm']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-umkm_edit-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-umkm_edit-label">Edit Data UMKM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message<?= $r['id_umkm']; ?>" class="mt-3"></div>
                                <form id="form-umkm_edit<?= $r['id_umkm']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <p>Pelaku UMKM<p>
                                            <select name="pelaku_umkm" id="pelaku_umkm" class="form-control">
                                                <?php
                                                foreach($list_all_pelaku_umkm as $key => $data) { 
                                                    $select = ($r['pelaku_umkm_id'] == $data['id'])? "selected = 'selected'":"";?>
                                                    <option value="<?php echo $data['id']; ?>"  <?php echo $select; ?>><?php echo $data['nama']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <p>Nama UMKM<p>
                                            <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" placeholder="Nama UMKM" value="<?= $r['nama_umkm'];?>">
                                            <p>Email UMKM<p>
                                            <input type="text" class="form-control" id="email_umkm" name="email_umkm" placeholder="Email UMKM" value="<?= $r['email_umkm'];?>">
                                            <p>No.Telepon UMKM<p>
                                            <input type="text" class="form-control" id="telepon_umkm" name="telepon_umkm" placeholder="No.Telepon UMKM" value="<?= $r['telepon_umkm'];?>">
                                            <p>Alamat UMKM<p>
                                            <input type="text" class="form-control" id="alamat_umkm" name="alamat_umkm" placeholder="Alamat UMKM" value="<?= $r['alamat_umkm'];?>">
                                            <p>Jenis Usaha<p>
                                            <select name="jenis_usaha" id="jenis_usaha" class="form-control">
                                                <?php
                                                foreach($list_all_jenis_usaha as $key => $data) { 
                                                    $select = ($r['jenis_usaha_id'] == $data['jenis_usaha_id'])? "selected = 'selected'":"";?>
                                                    <option value="<?php echo $data['jenis_usaha_id']; ?>"  <?php echo $select; ?>><?php echo $data['jenis_usaha']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="editUMKM(<?= $r['id_umkm'];?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 

                    <div class="modal fade" id="modal-umkm_delete<?= $r['id_umkm']; ?>" tabindex="-1" aria-labelledby="modal-umkm_delete-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-umkm_delete-label">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus UMKM ini ?,data yang terkait juga akan terhapus !. 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteUMKM(<?= $r['id_umkm']; ?>)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-umkm_perizinan<?= $r['id_umkm']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-umkm_perizinan-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-umkm_perizinan-label">Edit Data Perizinan UMKM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message_perizinan<?= $r['id_umkm']; ?>" class="mt-3"></div>
                                <form id="form-umkm_perizinan<?= $r['id_umkm']; ?>">
                                    <div class="modal-body">
                                        <p>Apakah telah memiliki aplikasi OSS atau sudah melakukan pengurusan ke MPP ?<p>
                                        <select name="is_oss" id="is_oss" class="form-control">
                                            <option selected value="0">BELUM</option>
                                            <option value="1">SUDAH</option>
                                        </select>
                                        <p>Jika UMKM tersebut dibidang kuliner, Apakah sudah mendaftar ke online situs resmi BPOM ?<p>
                                        <select name="is_bpom" id="is_bpom" class="form-control">
                                            <option selected value="0">
                                                BELUM
                                            </option>
                                            <option value="1">
                                                SUDAH
                                            </option>
                                        </select>
                                        <p>Upload Foto NIB<p>
                                        <div style="justify-content: center;margin-bottom: 10px">
                                            <img src="<?= $r['foto_nib'] == null ? base_url('assets/img/profile/default.jpg') : base_url('assets/img/perizinan/').$r['foto_nib']; ?>" style="width: 320px;height:270px;margin-bottom:10px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto_nib" name="images[]">
                                                <label class="custom-file-label" for="foto_nib">Choose file</label>
                                            </div>
                                        </div>
                                        <p>Upload Foto KTP<p>
                                        <div style="justify-content: center;margin-bottom: 10px">
                                            <img src="<?= $r['foto_ktp'] == null ? base_url('assets/img/profile/default.jpg') : base_url('assets/img/perizinan/').$r['foto_ktp']; ?>" style="width: 320px;height:270px;margin-bottom:10px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto_ktp<?= $r['id_umkm']; ?>" name="images[]">
                                                <label class="custom-file-label" for="foto_ktp">Choose file</label>
                                            </div>
                                        </div>
                                        <p>Upload Foto KK<p>
                                        <div style="justify-content: center;margin-bottom: 10px">
                                            <img src="<?= $r['foto_kk'] == null ? base_url('assets/img/profile/default.jpg') : base_url('assets/img/perizinan/').$r['foto_kk']; ?>" style="width: 320px;height:270px;margin-bottom:10px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto_kk" name="images[]">
                                                <label class="custom-file-label" for="foto_kk">Choose file</label>
                                            </div>
                                        </div>
                                        <!-- <p>Upload Foto KTP<p>
                                        <input type="file" class="custom-file-input" id="foto_ktp" name="foto_ktp">
                                        <label class="custom-file-label" for="foto_ktp">Choose file</label>
                                        <p>Upload Foto KK<p>
                                        <input type="file" class="custom-file-input" id="foto_kk" name="foto_kk">
                                        <label class="custom-file-label" for="foto_kk">Choose file</label> -->
                                        <p>Verifikasi ? <p>
                                        <select name="is_verifikasi" id="is_verifikasi" class="form-control">
                                            <option selectedvalue="0">
                                                DITOLAK
                                            </option>
                                            <option value="1">
                                                DISETUJUI
                                            </option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="editPerizinanUMKM(<?= $r['id_umkm'];?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 

                    <div class="modal fade" id="infoModal<?= $r['id_umkm']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Informasi Perizinan Dasar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Perizinan dasar yang harus dimiliki pelaku usaha berdasarkan usahanya:</p>
                                <ul>
                                <li>Semua Produk baik makanan, Minuman Batik, Kriya Wajib SNI. syarat :</li>
                                <li>Semua Produk Makanan Wajib Halal.</li>
                                <li>Semua bidang usaha wajib punya perizinan dasar yaitu NIB pengurusan NIB wajib mencantumkan :</li>
                                <ul>
                                    <li>Mempunyai HP Android</li>
                                    <li>Email, password</li>
                                    <li>Nama Usaha</li>
                                    <li>Bidang Usaha</li>
                                </ul>
                                </ul>
                                <p>Pengurusan memiliki aplikasi OSS atau bisa datang ke MPP kalau belum paham dengan aplikasi atau bisa datang ke Gedung PLUT - KUMKM nanti akan dipandu dan dibimbing langsung oleh petugas Pendamping kami Dinas Koperasi dan Usaha Mikro.</p>
                                
                                <p>Wajib Merk untuk semua bidang Usaha :</p>
                                <ul>
                                <li>Pyur Mandiri berbayar 1,8 Juta. 
                                    <a href="https://ntb.kemenkumham.go.id/berita-kanwil/berita-utama/5767-apa-itu-merek-dan-dimana-daftar-merek-simak-penjelasannya-di-sini#:~:text=Masyarakat%20bisa%20mendaftarkan%20Merek%20yang,online%20melalui%20https%3A%2F%2Fmerek.">Link</a>
                                </li>
                                <li>Rekom Dinkop berbayar 500 Ribu</li>
                                </ul>
                                
                                <p>Persyaratannya :</p>
                                <ul>
                                <li>Punya NIB</li>
                                <li>Nama Usaha</li>
                                <li>Nama Pemilik</li>
                                <li>Logo Produk</li>
                                <li>KK KTP, dll.</li>
                                </ul>
                                
                                <p>Untuk Makanan dan Serbuk yang tahan lebih dari 7 Hari Wajib P-IRT...</p>
                                <p>Tahapan pengajuan perizinan PIRT sebagai berikut:</p>
                                <ul>
                                <li>Membuat akun OSS di oss.go.id.</li>
                                <li>Mengisi kelengkapan data pelaku usaha dan data produk pangan.</li>
                                <li>Jika memenuhi persyaratan, SPP-IRT akan otomatis diterbitkan melalui OSS.</li>
                                <li>Melakukan pemenuhan komitmen dalam jangka waktu yang ditentukan.</li>
                                </ul>
                                
                                <p>Minuman, Frozzen, atau yang berbentuk Cair wajib BPOM</p>
                                <p>Syarat BPOM :</p>
                                <p>Cara Daftar BPOM</p>
                                <ul>
                                <li>Registrasi online situs resmi BPOM <a href="https://e-reg.pom.go.id/">Link</a></li>
                                <li>Mengisi formulir tentang data perusahaan, mengunggah dokumen-dokumen perusahaan dan dokumen pendukung.</li>
                                <li>Menunggu email verifikasi yang berisi user ID dan password.</li>
                                <li>Input data dan unggah dokumen persyaratan.</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="showSecondModal(<?= $r['id_umkm']; ?>)">Lanjutkan</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>

</div>

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <!-- <label for="wali">Wali Murid</label>
                        <select name="wali" id="wali" class="form-control">
                            <option selected="selected">
                            -- Pilih Wali Murid --
                            </option>
                                                        <option selected="selected">
                            -- Pilih Wali Murid --
                            </option>
                            <?php
                            foreach($list as $key => $data) { 
                                $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                                <option value="<?php echo $data_wali[$key]['wali_murid_id']; ?>"  <?php echo $select; ?>><?php echo $data_wali[$key]['nama']; ?></option>
                            <?php } ?>
                        </select> -->
                        <p>Pilih UMKM<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Data UMKM">
                        <p>Nama Produk<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Produk">
                        <p>Deskripsi Produk<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Deskripi Produk">
                        <p>Harga Produk<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Harga Produk">
                        <p>Stok Produk<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Stok Produk">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<div class="modal fade" id="modal-umkm_tambah" tabindex="-1" role="dialog" aria-labelledby="modal-umkm_tambah-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-umkm_tambah-label">Tambah Data UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message" class="mt-3"></div>
            <form id="form-umkm_tambah">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Pelaku UMKM<p>
                        <select name="pelaku_umkm" id="pelaku_umkm" class="form-control">
                            <option selected="selected" value="">
                                Pilih pelaku UMKM
                            </option>
                            <?php
                            foreach($list_all_pelaku_umkm as $key => $data) { 
                                // $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                                <option value="<?php echo $data['id']; ?>" ><?php echo $data['nama']; ?></option>
                            <?php } ?>
                        </select>
                        <p>Nama UMKM<p>
                        <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" placeholder="Nama UMKM">
                        <p>Email UMKM<p>
                        <input type="text" class="form-control" id="email_umkm" name="email_umkm" placeholder="Email UMKM">
                        <p>No.Telepon UMKM<p>
                        <input type="text" class="form-control" id="telepon_umkm" name="telepon_umkm" placeholder="No.Telepon UMKM">
                        <p>Alamat UMKM<p>
                        <input type="text" class="form-control" id="alamat_umkm" name="alamat_umkm" placeholder="Alamat UMKM">
                        <p>Jenis Usaha<p>
                        <select name="jenis_usaha" id="jenis_usaha" class="form-control">
                            <option selected="selected" value="">
                                Pilih Jenis Usaha
                            </option>
                            <?php
                            foreach($list_all_jenis_usaha as $key => $data) { 
                                // $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                                <option value="<?php echo $data['jenis_usaha_id']; ?>" ><?php echo $data['jenis_usaha']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="newUMKM()">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<div class="loading" id="loading">
    <div class="spinner-border text-primary spinner" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script>

    function showSecondModal(id_umkm) {
        $('#infoModal'+id_umkm).modal('hide');
        $('#infoModal'+id_umkm).on('hidden.bs.modal', function () {
            $('#modal-umkm_perizinan'+id_umkm).modal('show');
            // Remove event listener to prevent it from being triggered multiple times
            $('#infoModal'+id_umkm).off('hidden.bs.modal');
        });
    }

    function newUMKM(){
        const form = document.getElementById('form-umkm_tambah');
        const formData = new FormData(form);
        const formValues = {};
        let errorMessage = '';

        for (let [key, value] of formData.entries()) {
            formValues[key] = value;
        }

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        if (formValues.pelaku_umkm == '') {
            errorMessage += '<p>Pelaku UMKM wajib dipilih.</p>';
        }
        if (formValues.nama_umkm == '') {
            errorMessage += '<p>Nama UMKM wajib diisi.</p>';
        }
        if (formValues.email_umkm == '') {
            errorMessage += '<p>Email UMKM wajib diisi.</p>';
        } else if (!validateEmail(formValues.email_umkm)) {
            errorMessage += '<p>Format email UMKM salah.</p>';
        }
        if (formValues.telepon_umkm == '') {
            errorMessage += '<p>No Telepon UMKM wajib diisi.</p>';
        }
        if (formValues.alamat_umkm == '') {
            errorMessage += '<p>Alamat UMKM wajib diisi.</p>';
        }
        if (formValues.jenis_usaha == '') {
            errorMessage += '<p>Wajib Memilih jenis usaha.</p>';
        }

        if (errorMessage != '') {
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/newUMKM',
                method: 'POST',
                data: formValues,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if(response.error) {
                        $('#loading').hide();
                        $('#message').html('<div class="alert alert-danger">' + response.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message').html('<div class="alert alert-success">' + response.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message').html('<div class="alert alert-danger">Terjadi kesalahan,hubungi tim IT</div>');
                }
            });
        }
    }

    function editUMKM(id_umkm){
        const form = document.getElementById('form-umkm_edit'+id_umkm);
        const formData = new FormData(form);
        const formValues = {};
        let errorMessage = '';

        for (let [key, value] of formData.entries()) {
            formValues[key] = value;
        }

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        formValues.id_umkm = id_umkm

        if (formValues.pelaku_umkm == '') {
            errorMessage += '<p>Pelaku UMKM wajib dipilih.</p>';
        }
        if (formValues.nama_umkm == '') {
            errorMessage += '<p>Nama UMKM wajib diisi.</p>';
        }
        if (formValues.email_umkm == '') {
            errorMessage += '<p>Email UMKM wajib diisi.</p>';
        } else if (!validateEmail(formValues.email_umkm)) {
            errorMessage += '<p>Format email UMKM salah.</p>';
        }
        if (formValues.telepon_umkm == '') {
            errorMessage += '<p>No Telepon UMKM wajib diisi.</p>';
        }
        if (formValues.alamat_umkm == '') {
            errorMessage += '<p>Alamat UMKM wajib diisi.</p>';
        }
        if (formValues.jenis_usaha == '') {
            errorMessage += '<p>Wajib Memilih jenis usaha.</p>';
        }

        if (errorMessage != '') {
            $('#message'+id_umkm).html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/editUMKM',
                method: 'POST',
                data: formValues,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if(response.error) {
                        $('#loading').hide();
                        $('#message'+id_umkm).html('<div class="alert alert-danger">' + response.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id_umkm).html('<div class="alert alert-success">' + response.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message'+id_umkm).html('<div class="alert alert-danger">Terjadi kesalahan,hubungi tim IT</div>');
                }
            });
        }
    }

    
    function deleteUMKM(id_umkm){
        console.log(id_umkm)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>admin/deleteUMKM',
                method: 'POST',
                data: { id_umkm : id_umkm },
                success: function(response) {
                    var result = JSON.parse(response);
                    console.log(result)
                    if(result.error) {
                        $('#loading').hide();
                        $('#message'+id_umkm).html('<div class="alert alert-danger">' + result.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id_umkm).html('<div class="alert alert-success">' + result.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan, hubungi tim IT.');
                }
            });
    }

    function validateImages(files) {
        const validExtensions = ['image/jpeg', 'image/png', 'image/gif'];
        const maxSize = 2 * 1024 * 1024; // 2MB
        for (let i = 0; i < files.length; i++) {
            if (!files[i]) {
                return 'Please select an image file.';
            }
            if (!validExtensions.includes(files[i].type)) {
                return `Invalid file type: ${files[i].name}`;
            }
            if (files[i].size > maxSize) {
                return `File too large: ${files[i].name}`;
            }
        }
        return null;
    }

    function editPerizinanUMKM(id_umkm){
        const formData = new FormData(document.getElementById('form-umkm_perizinan'+id_umkm));
        const foto_nib = formData.get('foto_nib')
        const foto_ktp = formData.get('foto_ktp')
        const foto_kk = formData.get('foto_kk')
        let errorMessage = '';

        // if (foto_nib == "" || foto_nib == null || foto_nib == "null" ) {
        //     errorMessage += '<p>Wajib Upload Foto NIB.</p>';
        // }
        // if (foto_ktp.name == "") {
        //     errorMessage += '<p>Wajib Upload Foto KTP.</p>';
        // }
        // if (foto_kk.name == "") {
        //     errorMessage += '<p>Wajib Upload Foto KK.</p>';
        // }
        formData.id_umkm = id_umkm
        if (errorMessage != '') {
            $('#message_perizinan'+id_umkm).html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } 
        else {
            // const data ={
            //     id_umkm : id_umkm,
            //     foto_nib : foto_nib,
            //     foto_ktp : foto_ktp,
            //     foto_kk : foto_kk,
            //     is_oss : is_oss,
            //     is_bpom : is_bpom,
            //     is_verifikasi : is_verifikasi
            // }
            // console.log(data)
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/editPerizinanUMKM/'+id_umkm,
                method: 'POST',
                data: formData,
                dataType: 'json',
                processData: false, 
                contentType: false,
                success: function(response) {
                    console.log(response)
                    if(response.error) {
                        $('#loading').hide();
                        $('#message_perizinan'+id_umkm).html('<div class="alert alert-danger">' + response.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message_perizinan'+id_umkm).html('<div class="alert alert-success">' + response.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message_perizinan'+id_umkm).html('<div class="alert alert-danger">Terjadi kesalahan,hubungi tim IT</div>');
                }
            });
        }
    }
</script>