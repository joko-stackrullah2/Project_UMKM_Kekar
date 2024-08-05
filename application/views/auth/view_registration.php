<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat akun UMKM !</h1>
                        </div>
                        <form id="form-register" class="user">
                            <div id="message" class="mt-3"></div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="no_telepon" name="no_telepon" placeholder="No Telepon" value="<?= set_value('no_telepon'); ?>">
                                <?= form_error('nomor_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" style="font-size: small;">Hak Akses</label>
                                <select name="role" id="role" class="form-control">
                                    <option selected="selected" value="">
                                        Pilih hak akses sebagai...
                                    </option>
                                    <?php
                                    foreach($list_hak_akses_register as $key => $data) { 
                                        // $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                                        <option value="<?php echo $data['role_id']; ?>" ><?php echo $data['role']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desa" style="font-size: small;">Desa</label>
                                <select name="desa" id="desa" class="form-control">
                                    <option selected="selected" value="">
                                        Pilih Desa...
                                    </option>
                                    <?php
                                    foreach($list_desa as $key => $data) { 
                                        // $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                                        <option value="<?php echo $data['desa_id']; ?>" ><?php echo $data['desa']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-user btn-block" onclick="registration()">
                                Registrasi
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Silahkan Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="loading" id="loading">
    <div class="spinner-border text-primary spinner" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script>
    function registration(){
        var nama = $('#nama').val();
        var email = $('#email').val();
        var alamat = $('#alamat').val();
        var no_telepon = $('#no_telepon').val();
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
        var desa = $('#desa').val();
        var role = $('#role').val();
        var errorMessage = '';

        console.log(role)
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
        if (alamat == '') {
            errorMessage += '<p>Alamat wajib diisi.</p>';
        }
        if (no_telepon == '') {
            errorMessage += '<p>No Telepon wajib diisi.</p>';
        }
        if (password1 == '' || password2 == '') {
            errorMessage += '<p>Password wajib diisi.</p>';
        }else if(password1 !== password2){
            errorMessage += '<p>Password tidak sama.</p>';
        }
        if (role == '') {
            errorMessage += '<p>Wajib Memilih hak Akses.</p>';
        }
        if (desa == '') {
            errorMessage += '<p>Wajib Memilih Desa.</p>';
        }

        if (errorMessage != '') {
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } 
        else {
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>auth/registration',
                method: 'POST',
                data: {
                    nama : nama,
                    alamat : alamat,
                    email : email,
                    no_telepon : no_telepon,
                    password1 :password1,
                    password2 : password2,
                    role : role,
                    desa : desa
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if(response.error) {
                        $('#loading').hide();
                        $('#message').html('<div class="alert alert-danger">' + response.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message').html('<div class="alert alert-success">' + response.success + '</div>');
                        $('#form-register')[0].reset();
                        window.location.href = '<?php echo base_url(); ?>auth';
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message').html('<div class="alert alert-danger">Error , terjadi kesalahan</div>');
                }
            });
        }
    }
</script>