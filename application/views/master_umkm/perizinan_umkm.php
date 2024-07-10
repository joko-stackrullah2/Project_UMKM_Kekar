<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah_umkm">Tambah Data UMKM</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%" scope="col">#</th>
                        <th width="20%" scope="col">Pelaku UMKM</th>
                        <th width="20%" scope="col">Nama UMKM</th>
                        <th width="35%" scope="col">Alamat UMKM</th>
                        <th width="20%" scope="col">No Telepon UMKM</th>
                        <th width="20%" scope="col">Email UMKM</th>
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
                        <td><?= $r['alamat_umkm']; ?></td>
                        <td><?= $r['telepon_umkm']; ?></td>
                        <td><?= $r['email_umkm']; ?></td>
                        <td>
                            <!-- <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a> -->
                            <a href="" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-warning" data-toggle="modal" data-target="#infoModal">Ajukan Perizinan</a>
                            <a href="" class="badge badge-danger">Hapus UMKM</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
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



<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-tambah_umkm" tabindex="-1" role="dialog" aria-labelledby="modal-tambah_umkm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tambah_umkm">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
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
                        <p>Pilih Pelaku UMKM<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="-">
                        <p>Nama UMKM<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama UMKM">
                        <p>Alamat UMKM<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Alamat UMKM">
                        <p>Email UMKM<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Email UMKM">
                        <p>No.Telepon UMKM<p>
                        <input type="text" class="form-control" id="role" name="role" placeholder="No.Telepon UMKM">
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