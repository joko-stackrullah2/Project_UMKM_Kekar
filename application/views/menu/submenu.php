<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-sub_menu_new">Add New Submenu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?= $sm['is_active']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-sub_menu_edit<?= $sm['id']; ?>">edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-sub_menu_delete<?= $sm['id']; ?>">Delete</a>
                        </td>
                    </tr>


                    <div class="modal fade" id="modal-sub_menu_edit<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-sub_menu_edit-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-sub_menu_edit-label">Edit Sub Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="message<?= $sm['id']; ?>" class="mt-3"></div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title<?= $sm['id']; ?>" value="<?= $sm['title']; ?>" name="title" placeholder="Submenu title">
                                        </div>
                                        <div class="form-group">
                                            <select name="menu_id" id="menu_id<?= $sm['id']; ?>" class="form-control">
                                                <option value="">Select Menu</option>
                                                <!-- <?php foreach ($menu as $m) : ?>
                                                <option value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                                                <?php endforeach; ?> -->

                                                <?php
                                                foreach($menu as $key => $data) { 
                                                    $select = ($sm['menu_id'] == $data['menu_id'])? "selected = 'selected'":"";?>
                                                    <option value="<?php echo $data['menu_id']; ?>"  <?php echo $select; ?>><?php echo $data['menu']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="url<?= $sm['id']; ?>" value="<?= $sm['url']; ?>" name="url" placeholder="Submenu url">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="icon<?= $sm['id']; ?>" value="<?= $sm['icon']; ?>" name="icon" placeholder="Submenu icon">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input-sub_menu" type="checkbox" value="<?= $sm['is_active']; ?>" name="is_active" id="is_active<?= $sm['id']; ?>"  <?= $sm['is_active'] == 1 ? 'checked' : '';?>>
                                                <label class="form-check-label" for="is_active">
                                                    Active?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="editSubMenu(<?= $sm['id']; ?>)">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 

                    <div class="modal fade" id="modal-sub_menu_delete<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="modal-sub_menu_delete-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-sub_menu_delete-label">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus Sub menu ini ?,Data Terkait juga akan tehapus ! 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteSubMenu(<?= $sm['id']; ?>)">Delete</button>
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
<div class="modal fade" id="modal-sub_menu_new" tabindex="-1" role="dialog" aria-labelledby="modal-sub_menu_new-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-sub_menu_new-label">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message" class="mt-3"></div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input-sub_menu" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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

<div class="loading" id="loading">
    <div class="spinner-border text-primary spinner" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script>
    function editSubMenu(id=''){
        var title = $('#title'+id).val();
        var menu_id = $('#menu_id'+id).val();
        var url = $('#url'+id).val();
        var icon = $('#icon'+id).val();
        var is_active =$('#is_active'+id).is(":checked") ? 1 : 0 
        var errorMessage = '';

        if (title == '') {
            errorMessage += '<p>Harap mengisi judul / title.</p>';
        }
        if (menu_id == '') {
            errorMessage += '<p>Harap pilih menu.</p>';
        }
        if (url == '') {
            errorMessage += '<p>Harap mengisi URL sub menu</p>';
        }
        if (icon == '') {
            errorMessage += '<p>Harap mengisi icon.</p>';
        }

        console.log("OOYY"+is_active)
        if (errorMessage != '') {
            $('#message'+id).html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            let data = {
                    title : title,
                    menu_id : menu_id,
                    url : url,
                    icon : icon,
                    id : id,
                    is_active : is_active
                }
            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>menu/editSubMenu',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if(response.error) {
                        $('#loading').hide();
                        $('#message'+id).html('<div class="alert alert-danger">' + response.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id).html('<div class="alert alert-success">' + response.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message'+id).html('<div class="alert alert-danger">Terjadi kesalahan,hubungi tim IT</div>');
                }
            });
        }
    }

    function deleteSubMenu(id){
        console.log(id)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>menu/deleteSubMenu',
                method: 'POST',
                data: { id : id },
                success: function(response) {
                    var result = JSON.parse(response);
                    console.log(result)
                    if(result.error) {
                        $('#loading').hide();
                        $('#message'+id).html('<div class="alert alert-danger">' + result.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id).html('<div class="alert alert-success">' + result.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan, hubungi tim IT.');
                }
            });
    }
</script>