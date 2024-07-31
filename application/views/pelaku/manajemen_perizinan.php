<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-produk_new">Upload Dokumen Perizinan</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pemilik UMKM</th>
                        <th scope="col">Nama UMKM</th>
                        <th scope="col">Jenis Usaha</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Verifikasi Admin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataFileUMKM as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['nama_pemilik_umkm']; ?></td>
                            <td><?= $r['nama_umkm']; ?></td>
                            <td><?= $r['jenis_usaha']; ?></td>
                            <td><?= $r['keterangan']; ?></td>
                            <td><?= $r['path_file']; ?></td>
                            <td><?= $r['is_verifikasi']; ?></td>
                            <td>
                                <!-- <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-produk_edit_<?= $r['id_produk']; ?>">edit</a> -->
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-produk_delete<?= $r['file_umkm_id']; ?>">Delete</a>
                            </td>
                        </tr>

                        <!-- <div class="modal fade" id="modal-produk_edit_<?= $r['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-produk_edit_label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-produk_edit_label">Edit Data Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="message<?= $r['id_produk']; ?>" class="mt-3"></div>
                                    <form>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select name="umkm" id="umkm<?= $r['id_produk']; ?>" class="form-control">
                                                    <?php
                                                    foreach($listUMKMPelaku as $key => $data) { 
                                                        $select = ($r['id_umkm'] == $data['id_umkm'])? "selected = 'selected'":"";?>
                                                        <option value="<?php echo $data['id_umkm']; ?>"  <?php echo $select; ?>><?php echo $data['nama_pelaku_umkm']; ?> - <?php echo $data['nama_umkm']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nama_produk<?= $r['id_produk']; ?>" value="<?= $r['nama_produk']; ?>" name="nama_produk" placeholder="Nama Produk">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="deskripsi_produk<?= $r['id_produk']; ?>" value="<?= $r['deskripsi_produk']; ?>" name="deskripsi_produk" placeholder="Deskripsi Produk">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="harga_produk<?= $r['id_produk']; ?>" value="<?= $r['harga_produk']; ?>" name="harga_produk" placeholder="Harga Produk">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="stok_produk<?= $r['id_produk']; ?>" value="<?= $r['stok_produk']; ?>" name="stok_produk" placeholder="Stok Produk">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="editProduk(<?= $r['id_produk']; ?>)">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-produk_delete<?= $r['id_produk']; ?>" tabindex="-1" aria-labelledby="modal-produk_delete-label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-produk_delete-label">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin untuk menghapus Produk ini ? 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteProduk(<?= $r['id_produk']; ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>




<div class="modal fade" id="modal-manajemen_perizinan" tabindex="-1" role="dialog" aria-labelledby="modal-manajemen_perizinan-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-manajemen_perizinan-label">Edit Data Perizinan UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message_perizinan" class="mt-3"></div>
            <form id="form-manajemen_perizinan">
                <input type="hidden" name='edit' id='edit'/>
                <div class="modal-body">
                    <p>Apakah telah memiliki aplikasi OSS atau sudah melakukan pengurusan ke MPP ?<p>
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
                    </select>


                        <label for="num_files">Jumlah File Upload:</label>
                        <input type="number" id="num_files" name="num_files" min="3" max="10" placeholder="maksimal 10 file" required>
                        <button type="button" onclick="generateFileInputs()">Generate</button>
                        <br><br>

                        <div id="file_inputs_container" name="file_inputs_container"></div>


                    <p style="margin-top: 20px;<?php echo $user['role_id'] != 1 ? "display: none" : "display: block"?>">Verifikasi ? <p>
                    <select name="is_verifikasi" id="is_verifikasi" class="form-control" style="<?php echo $user['role_id'] != 1 ? "display: none" : "display: block"?>">
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

<div class="loading" id="loading">
    <div class="spinner-border text-primary spinner" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script>
    function newProduk(){
        var nama_produk = $('#nama_produk').val();
        var deskripsi_produk = $('#deskripsi_produk').val();
        var harga_produk = $('#harga_produk').val();
        var stok_produk = $('#stok_produk').val();
        var umkm = $('#umkm').val();
        var errorMessage = '';

        if (umkm == '') {
            errorMessage += '<p>Wajib Memilih UMKM.</p>';
        }
        if (nama_produk == '') {
            errorMessage += '<p>Nama Produk wajib diisi.</p>';
        }
        if (deskripsi_produk == '') {
            errorMessage += '<p>Deskripsi Produk wajib diisi.</p>';
        }
        if (harga_produk == '') {
            errorMessage += '<p>Harga Produk wajib diisi.</p>';
        }
        if (stok_produk == '') {
            errorMessage += '<p>Stok produk wajib diisi.</p>';
        }


        if (errorMessage != '') {
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            let data = {
                    nama_produk : nama_produk,
                    deskripsi_produk : deskripsi_produk,
                    harga_produk : harga_produk,
                    stok_produk : stok_produk,
                    umkm : umkm
                }
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>pelaku/newProduk',
                method: 'POST',
                data: data,
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


    function editProduk(id_produk=''){
        var nama_produk = $('#nama_produk'+id_produk).val();
        var harga_produk = $('#harga_produk'+id_produk).val();
        var deskripsi_produk = $('#deskripsi_produk'+id_produk).val();
        var stok_produk = $('#stok_produk'+id_produk).val();
        var umkm = $('#umkm'+id_produk).val();
        var errorMessage = '';

        if (umkm == '') {
            errorMessage += '<p>Wajib Memilih UMKM.</p>';
        }
        if (nama_produk == '') {
            errorMessage += '<p>Nama Produk wajib diisi.</p>';
        }
        if (deskripsi_produk == '') {
            errorMessage += '<p>Deskripsi Produk wajib diisi.</p>';
        }
        if (harga_produk == '') {
            errorMessage += '<p>Harga Produk wajib diisi.</p>';
        }
        if (stok_produk == '') {
            errorMessage += '<p>Stok produk wajib diisi.</p>';
        }

        console.log(errorMessage)
        if (errorMessage != '') {
            $('#message'+id_produk).html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            let data = {
                    nama_produk : nama_produk,
                    deskripsi_produk : deskripsi_produk,
                    harga_produk : harga_produk,
                    stok_produk : stok_produk,
                    umkm : umkm,
                    id_produk : id_produk
                }
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>pelaku/editProduk',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if(response.error) {
                        $('#loading').hide();
                        $('#message'+id_produk).html('<div class="alert alert-danger">' + response.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id_produk).html('<div class="alert alert-success">' + response.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message'+id_produk).html('<div class="alert alert-danger">Terjadi kesalahan,hubungi tim IT</div>');
                }
            });
        }
    }

    function deleteProduk(id_produk){
        console.log(id_produk)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>pelaku/deleteProduk',
                method: 'POST',
                data: { id_produk : id_produk },
                success: function(response) {
                    var result = JSON.parse(response);
                    console.log(result)
                    if(result.error) {
                        $('#loading').hide();
                        $('#message'+id_produk).html('<div class="alert alert-danger">' + result.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id_produk).html('<div class="alert alert-success">' + result.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan, hubungi tim IT.');
                }
            });
    }
</script>