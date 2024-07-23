<!-- Begin Page Content -->
<style>
        .identity-card {
            width: 380px;
            height: 200px;
            border: 1px solid #000;
            padding: 20px;
            margin: auto;
            background-color: #e0f7fa;
            text-align: center;
            font-family: Arial, sans-serif;
            position: relative;
        }
        .identity-card img {
            max-width: 70px;
            max-height: 70px;
            margin-bottom: 10px;
            border-radius: 50%;
        }
        .identity-card .header {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .identity-card .field {
            font-size: 12px;
            text-align: left;
        }
        .identity-card .field span {
            font-weight: bold;
        }
        .identity-card .photo {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .modal-content-idcard {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-pelaku_umkm_new">Tambah Pelaku UMKM</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemilik</th>
                        <th scope="col">Email Pemilik</th>
                        <th scope="col">Alamat Pemilik</th>
                        <th scope="col">Telepon Pemilik</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelaku as $r) : ?>
                    <tr >
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['nama']; ?></td>
                        <td><?= $r['email']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td><?= $r['no_telepon']; ?></td>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-pelaku_umkm_edit_<?= $r['id']; ?>">edit</a>
                            <button class="badge badge-warning" type="button" onclick="showIdentityCard('<?php echo htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8'); ?>')">Cetak Kartu Anggota</button>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-pelaku_umkm_delete<?= $r['id']; ?>">Delete</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-pelaku_umkm_edit_<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-pelaku_umkm_edit-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-pelaku_umkm_edit-label">Edit Data Pelaku UMKM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message<?= $r['id']; ?>" class="mt-3"></div>
                                <form >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama<?= $r['id']; ?>" value="<?= $r['nama']; ?>" name="nama" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email<?= $r['id']; ?>" value="<?= $r['email']; ?>" name="email" placeholder="Email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="no_telepon<?= $r['id']; ?>" value="<?= $r['no_telepon']; ?>" name="no_telepon" placeholder="No Telepon">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="alamat<?= $r['id']; ?>" value="<?= $r['alamat']; ?>" name="alamat" placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <select name="role" id="role<?= $r['id']; ?>" class="form-control">

                                                <?php
                                                foreach($list_hak_akses as $key => $data) { 
                                                    $select = ($r['role_id'] == $data['role_id'])? "selected = 'selected'":"";?>
                                                    <option value="<?php echo $data['role_id']; ?>"  <?php echo $select; ?>><?php echo $data['role']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="editPelakuUMKM(<?=$r['id'];?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="modal-pelaku_umkm_delete<?= $r['id']; ?>" tabindex="-1" aria-labelledby="modal-pelaku_umkm_delete-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-pelaku_umkm_delete-label">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus Pelaku UMKM ini ?,data yang terkait juga akan terhapus !. 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deletePelakuUMKM(<?= $r['id']; ?>)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="identityCardModal<?= $r['id']; ?>" tabindex="-1" aria-labelledby="identityCardModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="identityCardModalLabel">Identity Card</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="identityCard<?= $r['id']; ?>" class="identity-card">
                                        <!-- Identity card content will be dynamically inserted here -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="printIdentityCard(<?= $r['id']; ?>)">Print to PDF</button>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="modal-pelaku_umkm_new" tabindex="-1" role="dialog" aria-labelledby="modal-pelaku_umkm_new-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-pelaku_umkm_new-label">Tambah Pelaku UMKM Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div id="message" class="mt-3"></div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                    </div>
                    <div class="form-group">
                        <select name="role" id="role" class="form-control">
                            <option selected="selected" value="">
                                Pilih hak akses sebagai...
                            </option>
                            <?php
                            foreach($list_hak_akses as $key => $data) { 
                                // $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                                <option value="<?php echo $data['role_id']; ?>" ><?php echo $data['role']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="newPelakuUMKM()">Add</button>
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
    function newPelakuUMKM(){
        var nama = $('#nama').val();
        var email = $('#email').val();
        var alamat = $('#alamat').val();
        var no_telepon = $('#no_telepon').val();
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
        var role = $('#role').val();
        var errorMessage = '';

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        if (nama == '') {
            errorMessage += '<p>Nama wajib diisi.</p>';
        }
        if (email == '') {
            errorMessage += '<p>Email wajib diisi.</p>';
        } else if (!validateEmail(email)) {
            errorMessage += '<p>Format email salah.</p>';
        }
        if (no_telepon == '') {
            errorMessage += '<p>No Telepon wajib diisi.</p>';
        }
        if (alamat == '') {
            errorMessage += '<p>Alamat wajib diisi.</p>';
        }
        if (password1 == '' || password2 == '') {
            errorMessage += '<p>Password wajib diisi.</p>';
        }else if(password1 !== password2){
            errorMessage += '<p>Password tidak sama.</p>';
        }
        if (role == '') {
            errorMessage += '<p>Wajib Memilih hak Akses.</p>';
        }

        if (errorMessage != '') {
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            let data = {
                    nama : nama,
                    alamat : alamat,
                    email : email,
                    no_telepon : no_telepon,
                    password1 :password1,
                    password2 : password2,
                    role : role
                }
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/newPelakuUMKM',
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

    function editPelakuUMKM(pelaku_id=''){
        var nama = $('#nama'+pelaku_id).val();
        var email = $('#email'+pelaku_id).val();
        var alamat = $('#alamat'+pelaku_id).val();
        var no_telepon = $('#no_telepon'+pelaku_id).val();
        var role = $('#role'+pelaku_id).val();
        var errorMessage = '';

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        if (nama == '') {
            errorMessage += '<p>Nama wajib diisi.</p>';
        }
        if (email == '') {
            errorMessage += '<p>Email wajib diisi.</p>';
        } else if (!validateEmail(email)) {
            errorMessage += '<p>Format email salah.</p>';
        }
        if (no_telepon == '') {
            errorMessage += '<p>No Telepon wajib diisi.</p>';
        }
        if (alamat == '') {
            errorMessage += '<p>Alamat wajib diisi.</p>';
        }

        if (role == '') {
            errorMessage += '<p>Wajib Memilih hak Akses.</p>';
        }

        console.log(errorMessage)
        if (errorMessage != '') {
            $('#message'+pelaku_id).html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            let data = {
                    nama : nama,
                    alamat : alamat,
                    email : email,
                    no_telepon : no_telepon,
                    role : role,
                    pelaku_id : pelaku_id
                }
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/editPelakuUMKM',
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

    function deletePelakuUMKM(id){
        console.log(id)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>admin/deletePelakuUMKM',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    var result = JSON.parse(response);
                    console.log(result)
                    if(result.error) {
                        $('#loading').hide();
                        $('#message').html('<div class="alert alert-danger">' + result.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message').html('<div class="alert alert-success">' + result.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan, hubungi tim IT.');
                }
            });
    }

    function showIdentityCard(dataPelakuJson) {
            // Fetch user data (example data here, replace with dynamic data fetching)
            var dataPelaku = JSON.parse(dataPelakuJson);
            var user = {
                id: dataPelaku.id,
                nama_lengkap: dataPelaku.nama,
                email: dataPelaku.email,
                alamat: dataPelaku.alamat,
                no_telepon: dataPelaku.no_telepon,
                role :  dataPelaku.role,
                image :  dataPelaku.image
            };

            var identityCardHtml = `
                <div class="header">Kartu Anggota UMKM Kekar</div>
                <div class="field"><span>ID:</span> ${user.id}</div>
                <div class="field"><span>Nama Lengkap:</span> ${user.nama_lengkap}</div>
                <div class="field"><span>Email:</span> ${user.email}</div>
                <div class="field"><span>Email:</span> ${user.alamat}</div>
                <div class="field"><span>Email:</span> ${user.no_telepon}</div>
                <div class="field"><span>Role:</span> ${user.role}</div>
                <div class="photo">
                    <img src="assets/img/profile/${user.image}" alt="User Photo">
                </div>
            `;

            $('#identityCard'+user.id).html(identityCardHtml);

            // Show modal
            $('#identityCardModal'+user.id).modal('show');
        }

    function printIdentityCard(userId) {
        var identityCardElement = document.getElementById('identityCard'+userId);
        html2canvas(identityCardElement).then(canvas => {
            var imgData = canvas.toDataURL('image/jpg');
            const { jsPDF } = window.jspdf;
            var doc = new jsPDF({
                orientation: 'landscape',
                unit: 'mm',
                format: [86, 54]
            });
            doc.addImage(imgData, 'JPG', 0, 0, 86, 54);
            doc.save('identity-card.pdf');
        });
    }
</script>