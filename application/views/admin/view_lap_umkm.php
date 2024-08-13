<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-*">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>


            <table id="tabel-lap_umkm" class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%" scope="col">#</th>
                        <th width="35%" scope="col">Pelaku UMKM</th>
                        <th width="35%" scope="col">Nama UMKM</th>
                        <th width="35%" scope="col">Email UMKM</th>
                        <th width="35%" scope="col">No Telepon UMKM</th>
                        <th width="35%" scope="col">Alamat UMKM</th>
                        <th width="35%" scope="col">Desa</th>
                        <th width="35%" scope="col">Tanggal Pendirian</th>
                        <th width="35%" scope="col">Jenis Usaha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data_umkm as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['nama_pelaku_umkm']; ?></td>
                        <td><?= $r['nama_umkm']; ?></td>
                        <td><?= $r['email_umkm']; ?></td>
                        <td><?= $r['telepon_umkm']; ?></td>
                        <td><?= $r['alamat_umkm']; ?></td>
                        <td><?= $r['desa']; ?></td>
                        <td><?= $r['tanggal_pendirian']; ?></td>
                        <td><?= $r['jenis_usaha']; ?></td>
                        <!-- <td><?= $r['status_verifikasi']; ?></td> -->
                    </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    new DataTable('#tabel-lap_umkm', 
    { 
        responsive : true,
        searching: true,
        lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
        layout: 
        { 
            top1: 'searchPanes',
            topStart: { 
                buttons: ['csv', 'excel', 'pdf',] 
            } 
        },
        columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [6]
            },
            {
                searchPanes: {
                    show: true
                },
                targets: [8]
            }
        ],
        
    });
</script>