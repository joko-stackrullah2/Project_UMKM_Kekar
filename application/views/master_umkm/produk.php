<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Produk</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pemilik UMKM</th>
                        <th scope="col">Jenis Usaha</th>
                        <th scope="col">Data Produk</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['jenis_usaha']; ?></td>
                        <!-- <td>
                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                            <a href="" class="badge badge-success">edit</a>
                            <a href="" class="badge badge-danger">delete</a>
                        </td> -->
                        <li class="parent"><a href="#">IT</a>
                            <ul class="child">          
                                <li><a href="http://kb">Knowledge Base</a></li>
                                <li><a href="http:/">Submit a Ticket</a></li>
                                <li class="parent"><a href="http:">Archived Links</a></li>
                            </ul>
                        </li>
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