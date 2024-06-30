<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Pelaku UMKM</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemilik</th>
                        <th scope="col">Alamat Pemilik</th>
                        <th scope="col">Telepon Pemilik</th>
                        <th scope="col">Email Pemilik</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelaku as $r) : ?>
                    <tr onclick="readvalues(this);">
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['name']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td><?= $r['no_telepon']; ?></td>
                        <td><?= $r['email']; ?></td>
                        <td>
                            <!-- <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a> -->
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modalEdit_<?= $r['id']; ?>">edit</a>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modalUMKM_<?= $r['id']; ?>">data UMKM</a>
                            <a href="" class="badge badge-danger">delete</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit_<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newRoleModalLabel">Edit Data Pelaku UMKM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/role'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <p>Nama</p>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $r['name']; ?>" placeholder="Nama" style="margin-bottom:10px ;">
                                            <p>Alamat</p>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $r['alamat']; ?>" placeholder="Alamat" style="margin-bottom:10px ;">
                                            <p>No.Telepon</p>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $r['no_telepon']; ?>" placeholder="No.Telepon" style="margin-bottom:10px ;">
                                            <p>Email</p>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $r['email']; ?>" placeholder="Email" style="margin-bottom:10px ;">
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

                    <div class="modal fade" id="modalUMKM_<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newRoleModalLabel">Edit Data UMKM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/role'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <p>Nama UMKM</p>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $r['name']; ?>" placeholder="Nama" style="margin-bottom:10px ;">
                                            <p>Alamat UMKM</p>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $r['alamat']; ?>" placeholder="Alamat" style="margin-bottom:10px ;">
                                            <p>No.Telepon UMKM</p>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $r['no_telepon']; ?>" placeholder="No.Telepon" style="margin-bottom:10px ;">
                                            <p>Email UMKM</p>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $r['email']; ?>" placeholder="Email" style="margin-bottom:10px ;">
                                            <p>Tanggal Pendirian</p>
                                            <input type="text" class="form-control" id="tanggal_pendirian" name="tanggal_pendirian"  placeholder="Tanggal Pendirian" style="margin-bottom:10px ;">
                                            <p>Jenis Usaha</p>
                                            <input type="text" class="form-control" id="tanggal_pendirian" name="tanggal_pendirian"  placeholder="Jenis Usaha">
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
<!-- <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Pelaku UMKM Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<script>
    function readvalues(tableRow){
        var columns=tableRow.querySelectorAll("td");
        for(var i=0;i<columns.length;i++)
        console.log('Column '+i+': '+columns[i].innerHTML );
    }
</script>