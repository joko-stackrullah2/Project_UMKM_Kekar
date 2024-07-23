<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-jenis_usaha_new">Tambah jenis usaha</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Usaha</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataJenisUsaha as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['jenis_usaha']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-jenis_usaha_edit_<?= $r['jenis_usaha_id']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-jenis_usaha_delete<?= $r['jenis_usaha_id']; ?>">Delete</a>
                        </td>
                    </tr>


                    <div class="modal fade" id="modal-jenis_usaha_edit_<?= $r['jenis_usaha_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-jenis_usaha_edit_label_<?= $r['jenis_usaha_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-jenis_usaha_edit_label_<?= $r['jenis_usaha_id']; ?>">Edit Jenis Usaha</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message<?= $r['jenis_usaha_id']; ?>" class="mt-3"></div>
                                <form action="<?= base_url('admin/role'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="jenis_usaha<?= $r['jenis_usaha_id']; ?>" name="jenis_usaha" placeholder="Nama jenis usaha" value="<?= $r['jenis_usaha']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="newOrEditJenisUsaha('edit',<?=$r['jenis_usaha_id'];?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 

                    <div class="modal fade" id="modal-jenis_usaha_delete<?= $r['jenis_usaha_id']; ?>" tabindex="-1" aria-labelledby="modal-jenis_usaha_delete_label<?= $r['jenis_usaha_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-jenis_usaha_delete_label_<?= $r['jenis_usaha_id']; ?>">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus jenis usaha ini ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteJenisUsaha(<?= $r['jenis_usaha_id']; ?>)">Delete</button>
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
<div class="modal fade" id="modal-jenis_usaha_new" tabindex="-1" role="dialog" aria-labelledby="modal-jenis_usaha_new_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-jenis_usaha_label">Tambah jenis usaha baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message" class="mt-3"></div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Nama jenis usaha">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="newOrEditJenisUsaha('new','')">Add</button>
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
    function newOrEditJenisUsaha(tipe,jenis_usaha_id=""){
        var jenis_usaha=''
        var errorMessage=''
        if(tipe === 'new'){
            jenis_usaha = $('#jenis_usaha').val();
        }else{
            jenis_usaha = $('#jenis_usaha'+jenis_usaha_id).val();
        }

        if (jenis_usaha == '') {
            errorMessage += '<p>Jenis Usaha wajib diisi.</p>';
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/newOrEditJenisUsaha',
                method: 'POST',
                data: {
                    jenis_usaha : jenis_usaha,
                    tipe : tipe,
                    jenis_usaha_id : jenis_usaha_id
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

    function deleteJenisUsaha(jenis_usaha_id){
        console.log(jenis_usaha_id)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>admin/deleteJenisUsaha',
                method: 'POST',
                data: { jenis_usaha_id : jenis_usaha_id },
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