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
                        <th width="35%" scope="col">Pelaku UMKM</th>
                        <th width="35%" scope="col">Nama UMKM</th>
                        <th width="35%" scope="col">Email UMKM</th>
                        <th width="35%" scope="col">No Telepon UMKM</th>
                        <th width="35%" scope="col">Alamat UMKM</th>
                        <th width="35%" scope="col">Tanggal Pendirian</th>
                        <th width="35%" scope="col">Jenis Usaha</th>
                        <th width="35%" scope="col">Status Verif</th>
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
                        <td><?= $r['status_verifikasi']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#perizinanModal<?= $r['id_umkm']; ?>">Verifikasi</a>
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
                                    <h5 class="modal-title" id="modal-umkm_perizinan-label">Verifikasi Data Perizinan UMKM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message_perizinan<?= $r['id_umkm']; ?>" class="mt-3"></div>
                                <form id="form-umkm_perizinan<?= $r['id_umkm']; ?>">
                                    <input type="hidden" name='edit' id='edit<?= $r['id_umkm']; ?>'/>
                                    <div class="modal-body">
                                        <!-- <p>Apakah telah memiliki aplikasi OSS atau sudah melakukan pengurusan ke MPP ?<p>
                                        <select name="is_oss" id="is_oss" class="form-control">
                                            <option selected value="0">BELUM</option>
                                            <option value="1">SUDAH</option>
                                        </select>
                                        <p>Jika UMKM tersebut dibidang kuliner, Apakah sudah mendaftar ke online situs resmi BPOM ?<p>
                                        <select name="is_bpom" id="is_bpom" class="form-control" style="margin-bottom: 20px;">
                                            <option selected value="0">
                                                BELUM
                                            </option>
                                            <option value="1">
                                                SUDAH
                                            </option>
                                        </select> -->


                                            <!-- <label for="num_files">Jumlah File Upload:</label>
                                            <input type="number" id="num_files<?= $r['id_umkm']; ?>" name="num_files" min="3" max="10" placeholder="maksimal 10 file" required>
                                            <button type="button" onclick="generateFileInputs(<?= $r['id_umkm']; ?>)">Generate</button>
                                            <br><br> -->

                                            <div id="file_inputs_container<?= $r['id_umkm']; ?>" name="file_inputs_container"></div>


                                        <p style="margin-top: 20px;">Verifikasi ? <p>
                                        <select name="is_verifikasi" id="is_verifikasi<?= $r['id_umkm']; ?>" class="form-control">
                                            <option value="0" <?= $r['is_verifikasi'] == '0' ? 'selected="selected"' : "" ?>>
                                                DITOLAK
                                            </option>
                                            <option value="1" <?= $r['is_verifikasi'] == '1' ? 'selected="selected"' : "" ?>>
                                                DISETUJUI
                                            </option>
                                        </select>
                                        <p>Catatan Verifikasi<p>
                                        <input type="text" class="form-control" id="catatan_verifikasi" name="catatan_verifikasi" placeholder="Catatan Verifikasi" value="<?= $r['catatan_verifikasi'];?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="editPerizinanUMKM(<?= $r['id_umkm'];?>)">Verifikasi</button>
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

                    <!-- Modal -->
                    <div class="modal fade" id="perizinanModal<?= $r['id_umkm']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Perizinan UMKM</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <?php if ($r['jenis_usaha'] == 'Perdagangan'): ?>
                                        <h5>Bidang Usaha Perdagangan</h5>
                                        <ul>
                                            <li><strong>Surat Izin Usaha Perdagangan (SIUP):</strong> Diperlukan untuk usaha yang bergerak di bidang perdagangan.</li>
                                            <li><strong>Tanda Daftar Perusahaan (TDP):</strong> Registrasi perusahaan ke pemerintah.</li>
                                        </ul>
                                        <h6>Surat Izin Usaha Perdagangan (SIUP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Pas foto pemilik (ukuran 3x4).</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                            <li>Izin gangguan (HO) (tergantung daerah).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan SIUP ke Dinas Perdagangan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SIUP diterbitkan.</li>
                                        </ol>

                                        <h6>Tanda Daftar Perusahaan (TDP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>SIUP.</li>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan TDP ke Dinas Perindustrian dan Perdagangan.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, TDP diterbitkan.</li>
                                        </ol>

                                        <h6>Proses Perizinan Umum melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>


                                    <?php elseif ($r['jenis_usaha'] == 'Pariwisata'): ?>
                                        <h5>Bidang Pariwisata</h5>
                                        <ul>
                                            <li><strong>Izin Usaha Pariwisata (IUP):</strong> Diperlukan untuk usaha yang bergerak di bidang pariwisata.</li>
                                        </ul>

                                        <h6>Izin Usaha Pariwisata (IUP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Denah lokasi usaha.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan ke Dinas Pariwisata setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas dan inspeksi lapangan.</li>
                                            <li>Jika disetujui, IUP diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Keterangan Domisili Usaha (SKDU):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Surat pengantar dari RT/RW.</li>
                                            <li>Denah lokasi usaha.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan ke kelurahan atau kecamatan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SKDU diterbitkan.</li>
                                        </ol>

                                        <h6>Proses Perizinan Umum melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>
                                        
                                        
                                    <?php elseif ($r['jenis_usaha'] == 'Jasa'): ?>
                                        <h5>Bidang Jasa</h5>
                                        <ul>
                                            <li><strong>Izin Usaha Jasa (IUJ):</strong> Diperlukan untuk usaha yang bergerak di bidang jasa.</li>
                                            <li><strong>Surat Izin Usaha Perdagangan (SIUP):</strong> Diperlukan jika usaha jasa juga melakukan perdagangan barang.</li>
                                        </ul>

                                        <h6>Izin Usaha Jasa (IUJ):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                            <li>Surat pernyataan tidak akan menimbulkan gangguan (jika diperlukan).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan IUJ ke Dinas Perdagangan atau Dinas terkait setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, IUJ diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Izin Usaha Perdagangan (SIUP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Pas foto pemilik (ukuran 3x4).</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                            <li>Izin gangguan (HO) (tergantung daerah).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan SIUP ke Dinas Perdagangan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SIUP diterbitkan.</li>
                                        </ol>

                                        <h6>Proses Perizinan Umum melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>
                                    


                                    <?php elseif ($r['jenis_usaha'] == 'Kuliner'): ?>
                                        <h5>Bidang Kuliner</h5>
                                        <ul>
                                            <li><strong>Izin Usaha Mikro Kecil (IUMK):</strong> Diperlukan untuk usaha kuliner skala mikro dan kecil.</li>
                                            <li><strong>Surat Izin Tempat Usaha (SITU):</strong> Diperlukan untuk memastikan lokasi usaha sesuai dengan peraturan yang berlaku.</li>
                                            <li><strong>Surat Izin Usaha Perdagangan (SIUP):</strong> Diperlukan jika usaha kuliner juga menjual produk dalam bentuk perdagangan.</li>
                                        </ul>

                                        <h6>Izin Usaha Mikro Kecil (IUMK):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Denah lokasi usaha.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan IUMK ke Dinas Koperasi dan UMKM setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, IUMK diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Izin Tempat Usaha (SITU):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Surat pengantar dari RT/RW.</li>
                                            <li>Denah lokasi usaha.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan ke kelurahan atau kecamatan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SITU diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Izin Usaha Perdagangan (SIUP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Pas foto pemilik (ukuran 3x4).</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                            <li>Izin gangguan (HO) (tergantung daerah).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan SIUP ke Dinas Perdagangan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SIUP diterbitkan.</li>
                                        </ol>

                                        <h6>Proses Perizinan Umum melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>

                                    <?php elseif ($r['jenis_usaha'] == 'Pertanian dan Peternakan'): ?>
                                        <h5>5. Pertanian dan Peternakan</h5>
                                        <ul>
                                            <li><strong>Izin Usaha Pertanian (IUP):</strong> Diperlukan untuk usaha yang bergerak di bidang pertanian.</li>
                                            <li><strong>Izin Usaha Peternakan (IUP):</strong> Diperlukan untuk usaha yang bergerak di bidang peternakan.</li>
                                            <li><strong>Surat Izin Tempat Usaha (SITU):</strong> Diperlukan untuk memastikan lokasi usaha sesuai dengan peraturan yang berlaku.</li>
                                        </ul>

                                        <h6>Izin Usaha Pertanian (IUP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Denah lokasi usaha.</li>
                                            <li>Surat rekomendasi dari instansi terkait.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan IUP ke Dinas Pertanian setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, IUP diterbitkan.</li>
                                        </ol>

                                        <h6>Izin Usaha Peternakan (IUP):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Denah lokasi usaha.</li>
                                            <li>Surat rekomendasi dari instansi terkait.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan IUP ke Dinas Peternakan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, IUP diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Izin Tempat Usaha (SITU):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Surat pengantar dari RT/RW.</li>
                                            <li>Denah lokasi usaha.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan ke kelurahan atau kecamatan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SITU diterbitkan.</li>
                                        </ol>

                                        <h6>Proses Perizinan UMUM melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>

                                    <?php elseif ($r['jenis_usaha'] == 'Kesehatan dan Kecantikan'): ?>
                                        <h5>Bidang Kesehatan dan Kecantikan</h5>
                                        <ul>
                                            <li><strong>Izin Usaha Kesehatan (IUK):</strong> Diperlukan untuk usaha yang bergerak di bidang kesehatan.</li>
                                            <li><strong>Izin Usaha Kecantikan (IUK):</strong> Diperlukan untuk usaha yang bergerak di bidang kecantikan.</li>
                                            <li><strong>Surat Izin Tempat Usaha (SITU):</strong> Diperlukan untuk memastikan lokasi usaha sesuai dengan peraturan yang berlaku.</li>
                                        </ul>

                                        <h6>Izin Usaha Kesehatan (IUK):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Surat izin praktik dari instansi kesehatan (jika diperlukan).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan IUK ke Dinas Kesehatan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, IUK diterbitkan.</li>
                                        </ol>

                                        <h6>Izin Usaha Kecantikan (IUK):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Surat izin praktik dari instansi kecantikan (jika diperlukan).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan IUK ke Dinas Kesehatan atau Dinas terkait setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, IUK diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Izin Tempat Usaha (SITU):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Surat pengantar dari RT/RW.</li>
                                            <li>Denah lokasi usaha.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan ke kelurahan atau kecamatan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SITU diterbitkan.</li>
                                        </ol>

                                        <h6>Proses Perizinan UMUM melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>

                                    <?php elseif ($r['jenis_usaha'] == 'Industri Kreatif'): ?>
                                        <h5>7. Industri Kreatif</h5>
                                        <ul>
                                            <li><strong>Surat Izin Usaha Industri (SIUI):</strong> Diperlukan untuk usaha yang bergerak di bidang industri kreatif.</li>
                                            <li><strong>Surat Izin Tempat Usaha (SITU):</strong> Diperlukan untuk memastikan lokasi usaha sesuai dengan peraturan yang berlaku.</li>
                                            <li><strong>Nomor Induk Berusaha (NIB):</strong> Diperlukan untuk registrasi usaha secara umum.</li>
                                        </ul>

                                        <h6>Surat Izin Usaha Industri (SIUI):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Fotokopi NPWP.</li>
                                            <li>Surat keterangan domisili usaha.</li>
                                            <li>Denah lokasi usaha.</li>
                                            <li>Akta pendirian perusahaan (jika berbadan hukum).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan SIUI ke Dinas Perindustrian setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SIUI diterbitkan.</li>
                                        </ol>

                                        <h6>Surat Izin Tempat Usaha (SITU):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Fotokopi KTP pemilik.</li>
                                            <li>Surat pengantar dari RT/RW.</li>
                                            <li>Denah lokasi usaha.</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Mengajukan permohonan ke kelurahan atau kecamatan setempat.</li>
                                            <li>Mengisi formulir pendaftaran.</li>
                                            <li>Menyerahkan berkas persyaratan.</li>
                                            <li>Verifikasi berkas oleh petugas.</li>
                                            <li>Jika disetujui, SITU diterbitkan.</li>
                                        </ol>

                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>
                                    
                                    <?php else: ?>
                                        <h6>Proses Perizinan UMUM melalui OSS (Online Single Submission):</h6>
                                        <h6>Nomor Induk Berusaha (NIB):</h6>
                                        <p><strong>Persyaratan:</strong></p>
                                        <ul>
                                            <li>Data pribadi pemilik usaha.</li>
                                            <li>Data usaha (jenis usaha, lokasi, dll).</li>
                                        </ul>
                                        <p><strong>Proses:</strong></p>
                                        <ol>
                                            <li>Registrasi di portal OSS.</li>
                                            <li>Mengisi formulir pendaftaran secara online.</li>
                                            <li>Menyertakan data dan berkas yang diminta.</li>
                                            <li>Verifikasi otomatis oleh sistem.</li>
                                            <li>Jika disetujui, NIB diterbitkan secara digital.</li>
                                        </ol>

                                        <p>Pastikan selalu mengecek regulasi terbaru dan berkonsultasi dengan dinas terkait atau konsultan hukum untuk memastikan semua persyaratan terpenuhi sesuai dengan peraturan yang berlaku.</p>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        $('#perizinanModal'+id_umkm).modal('hide');
        $('#perizinanModal'+id_umkm).on('hidden.bs.modal', function () {
            $('#modal-umkm_perizinan'+id_umkm).modal('show');
            $('#perizinanModal'+id_umkm).off('hidden.bs.modal');
            getFileUmkmById(id_umkm)
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
        const edit = document.getElementById('edit'+id_umkm).value
        var errorMessages = [];
        var is_valid = true;

        var is_verifikasi = document.getElementById('is_verifikasi'+id_umkm).value;

        if(is_verifikasi === "null" || is_verifikasi === null || is_verifikasi === ""){
            is_valid = false
            errorMessages.push('Mohon isi catatan verifikasi');
        }

        // for (var i = 0; i < numberOfFiles; i++) {
        //     var fileInput = document.getElementById('file'+id_umkm+'_'+i);
        //     var descriptionInput = document.getElementById('description'+id_umkm+'_'+i);
        //     var fileId = document.getElementById('file_umkm_id'+id_umkm+'_'+i);

        //     if (!fileInput.value && !fileId.value) {
        //         is_valid = false;
        //         errorMessages.push('Semua File ' + (i + 1) + ' wajib diupload.');
        //     }

        //     if (!descriptionInput.value) {
        //         is_valid = false;
        //         errorMessages.push('Keterangan File ' + (i + 1) + ' wajib diisi.');
        //     }
            
        // }



        if (!is_valid) {
            alert(errorMessages.join('\n'));
            return;
        }else {

            // console.log(JSON.stringify(formData))
            // console.log("FORM FILE"+JSON.stringify(formData))
            // for (var i = 0; i < numberOfFiles; i++) {
            //     var fileInput = document.getElementById('file'+id_umkm+'_'+i);
            //     var descriptionInput = document.getElementById('description'+id_umkm+'_'+i);
            //     var fileId = document.getElementById('file_umkm_id'+id_umkm+'_'+i);

            //     formData.append('files[]', fileInput.files[0]);
            //     formData.append('descriptions[]', descriptionInput.value);
            //     formData.append('file_umkm_ids[]', fileId.value);
            // }

            formData.append('umkm_id',id_umkm)
            formData.append('role_id',<?php echo $user['role_id']?>)

            for (var [key, value] of formData.entries()) { 
                console.log(key, value);
            }

            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/verifPerizinan',
                method: 'POST',
                data: formData,
                dataType: 'json',
                processData: false, 
                contentType: false,
                success: function(response) {
                    console.log(response)
                    if(!response.status) {
                        $('#loading').hide();
                        $('#message_perizinan'+id_umkm).html('<div class="alert alert-danger">' + response.msg + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message_perizinan'+id_umkm).html('<div class="alert alert-success">' + response.msg + '</div>');
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

    function generateFileInputs(id_umkm='') {
        var numberOfFiles = document.getElementById('num_files'+id_umkm).value;
        var fileInputsContainer = document.getElementById('file_inputs_container'+id_umkm);
        fileInputsContainer.innerHTML = '';
        var defaultValue = [
            'Foto KTP',
            'Foto KK',
            'Foto NIB',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain'
        ] 

        for (var i = 0; i < numberOfFiles; i++) {
            var fileInputDiv = document.createElement('div');
            fileInputDiv.innerHTML = `
                <input type="hidden" name="file_umkm_ids[]" id="file_umkm_id${id_umkm}_${i}" value=""></input>
                <label for="file${id_umkm}_${i}">File ${i + 1}:</label>
                <input type="file" name="files[]" id="file${id_umkm}_${i}" onchange="previewImage(this, ${i},${id_umkm})" required><br>
                <label for="description${id_umkm}_${i}">Keterangan ${i + 1}:</label>
                <input type="text" name="descriptions[]" id="description${id_umkm}_${i}" value ="${defaultValue[i]}" required><br>
                <img id="preview${id_umkm}_${i}" src="#" alt="Image Preview" style="display: none; max-width: 200px; margin-top: 10px;"><br><br>
            `;
            fileInputsContainer.appendChild(fileInputDiv);
        }
    }

    function previewImage(input, index,id_umkm) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('preview'+ id_umkm+'_'+index);
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    function previewImageEdit(input, index,id_umkm,file_umkm_id="") {
        var file = input.files[0];
        if(file_umkm_id){
            input.files[0].file_umkm_id = file_umkm_id
        }
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('preview'+ id_umkm+'_'+index);
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    function getFileUmkmById(id_umkm){
        console.log(id_umkm)
        $.ajax({
            url: '<?php echo base_url(); ?>admin/getFileUmkmById',
            method: 'POST',
            data: {umkm_id : id_umkm},
            dataType: 'json',
            success: function(response) {
                console.log(response.length)
                let fileInputsContainer = document.getElementById('file_inputs_container'+id_umkm);
                if(response.length > 0){
                    // document.getElementById('num_files'+id_umkm).value = response.length;
                    // document.getElementById('edit'+id_umkm).value = 1;

                    for (let i = 0; i < response.length; i++) {
                        console.log(response[i]["path_file"])
                        let fileInputDiv = document.createElement('div');
                        fileInputDiv.innerHTML = `
                            <input type="hidden" name="file_umkm_ids[]" id="file_umkm_id${id_umkm}_${i}" value="${response[i]["file_umkm_id"]}"></input>
                            <label for="description${id_umkm}_${i}">Keterangan ${i + 1}:</label>
                            <input type="text" name="descriptions[]" id="description${id_umkm}_${i}" value ="${response[i]["keterangan"]}" required><br>
                            <img id="preview${id_umkm}_${i}" src="<?php echo base_url(); ?>${response[i]["path_file"]}" alt="Image Preview" style="max-width: 200px; margin-top: 10px;"><br><br>
                        `;
                        fileInputsContainer.appendChild(fileInputDiv);
                    }
                }
                if(response.length === 0){
                    let fileInputDiv = document.createElement('div');
                    fileInputDiv.innerHTML = `
                    <p style="color:red;">BELUM ADA DOKUMEN PERIZINAN YANG DIUPLOAD</p>
                    `;
                    fileInputsContainer.appendChild(fileInputDiv);
                }
            }
        });
    }
</script>