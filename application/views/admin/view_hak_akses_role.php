<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-hak_akses_baru">Add New Role</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/view_hak_akses_role_centang/') . $r['role_id']; ?>" class="badge badge-warning">access</a>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-hak_akses_edit<?= $r['role_id']; ?>">edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-hak_akses_delete<?= $r['role_id']; ?>">Delete</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-hak_akses_edit<?= $r['role_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-hak_akses_edit" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div id="message" class="mt-3"></div>
                                    <h5 class="modal-title" id="modal-hak_akses_edit">Edit Nama Role Hak Akses</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="hak_akses<?= $r['role_id']; ?>" name="hak_akses" value="<?= $r['role']; ?>" placeholder="Nama Role Hak Akses" required>
                                            <div class="invalid-feedback">
                                                Name cannot be empty.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="newOrEditHakAkses('edit',<?= $r['role_id']; ?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 

                        <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="modal-hak_akses_delete<?= $r['role_id']; ?>" tabindex="-1" aria-labelledby="modal-hak_akses_delete" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-hak_akses_delete">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus role ini ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteHakAkses(<?= $r['role_id']; ?>)">Delete</button>
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
<div class="modal fade" id="modal-hak_akses_baru" tabindex="-1" role="dialog" aria-labelledby="modal-hak_akses_baru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="message" class="mt-3"></div>
                <h5 class="modal-title" id="modal-hak_akses_baru">Tambah Role Hak Akses Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form >
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="hak_akses" name="hak_akses" placeholder="Nama Role Hak Akses" required>
                        <div class="invalid-feedback">
                            Name cannot be empty.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="newOrEditHakAkses('new')">Add</button>
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
    function newOrEditHakAkses(tipe,role_id=""){
        var hak_akses=''
        if(tipe === 'new'){
            hak_akses = $('#hak_akses').val();
        }else{
            hak_akses = $('#hak_akses'+role_id).val();
        }

        if (hak_akses == '') {
            errorMessage += '<p>Hak akses wajib diisi.</p>';
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/newOrEditHakAkses',
                method: 'POST',
                data: {
                    hak_akses : hak_akses,
                    tipe : tipe,
                    role_id : role_id
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
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message').html('<div class="alert alert-danger">Error , terjadi kesalahan</div>');
                }
            });
        }
    }

    function deleteHakAkses(role_id){
        console.log(role_id)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>admin/deleteHakAkses',
                method: 'POST',
                data: { role_id: role_id },
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
</script>