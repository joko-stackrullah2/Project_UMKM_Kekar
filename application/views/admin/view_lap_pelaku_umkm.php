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
    <h1 class="h3 mb-4 text-gray-1000"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-*">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <table id="tabel-pelaku_umkm" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemilik</th>
                        <th scope="col">Email Pemilik</th>
                        <th scope="col">Alamat Pemilik</th>
                        <th scope="col">Telepon Pemilik</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Role</th>
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
                        <td><?= $r['desa']; ?></td>
                        <td><?= $r['role']; ?></td>
                    </tr>


                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>


<script>
    
    new DataTable('#tabel-pelaku_umkm', 
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
                targets: [5]
            },
            {
                searchPanes: {
                    show: true
                },
                targets: [6]
            }
        ],
        
    });
</script>