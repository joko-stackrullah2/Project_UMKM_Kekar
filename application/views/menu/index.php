<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-menu_new">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-menu_edit<?= $m['menu_id']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-menu_delete<?= $m['menu_id']; ?>">Delete</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-menu_edit<?= $m['menu_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-menu_edit-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-menu_edit-label">Edit Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message<?= $m['menu_id']; ?>" class="mt-3"></div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="menu<?= $m['menu_id']; ?>" value="<?= $m['menu']; ?>" name="menu" placeholder="Menu name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="newOrEditMenu('edit',<?= $m['menu_id']; ?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 


                    <div class="modal fade" id="modal-menu_delete<?= $m['menu_id']; ?>" tabindex="-1" aria-labelledby="modal-menu_delete-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-modal-menu_delete-label">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus menu usaha ini ?, Menu yang terkait juga akan terhapus !
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteMenu(<?= $m['menu_id']; ?>)">Delete</button>
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
<div class="modal fade" id="modal-menu_new" tabindex="-1" role="dialog" aria-labelledby="modal-menu_new-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-menu_new-label">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message" class="mt-3"></div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="newOrEditMenu('new')">Add</button>
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
    function newOrEditMenu(tipe,menu_id=""){
        var menu=''
        var errorMessage=''
        if(tipe === 'new'){
            menu = $('#menu').val();
        }else{
            menu = $('#menu'+menu_id).val();
        }

        if (menu == '') {
            errorMessage += '<p>Menu wajib diisi.</p>';
            $('#message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>menu/newOrEditMenu',
                method: 'POST',
                data: {
                    menu : menu,
                    tipe : tipe,
                    menu_id : menu_id
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

    function deleteMenu(menu_id){
        console.log(menu_id)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>menu/deleteMenu',
                method: 'POST',
                data: { menu_id : menu_id },
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