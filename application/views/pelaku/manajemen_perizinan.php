<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-manajemen_perizinan">Upload Dokumen Perizinan</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pemilik UMKM</th>
                        <th scope="col">Nama UMKM</th>
                        <th scope="col">Jenis Usaha</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Verifikasi Admin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataFileUMKM as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['nama_pemilik_umkm']; ?></td>
                            <td><?= $r['nama_umkm']; ?></td>
                            <td><?= $r['jenis_usaha']; ?></td>
                            <td><?= $r['keterangan']; ?></td>
                            <td><?= $r['path_file']; ?></td>
                            <td><?= $r['is_verifikasi']; ?></td>
                            <td>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modal-produk_delete<?= $r['file_umkm_id']; ?>">Delete</a>
                            </td>
                        </tr>

                        <!-- <div class="modal fade" id="modal-produk_edit_<?= $r['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-produk_edit_label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-produk_edit_label">Edit Data Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="message<?= $r['id_produk']; ?>" class="mt-3"></div>
                                    <form>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select name="umkm" id="umkm<?= $r['id_produk']; ?>" class="form-control">
                                                    <?php
                                                    foreach($listUMKMPelaku as $key => $data) { 
                                                        $select = ($r['id_umkm'] == $data['id_umkm'])? "selected = 'selected'":"";?>
                                                        <option value="<?php echo $data['id_umkm']; ?>"  <?php echo $select; ?>><?php echo $data['nama_pelaku_umkm']; ?> - <?php echo $data['nama_umkm']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nama_produk<?= $r['id_produk']; ?>" value="<?= $r['nama_produk']; ?>" name="nama_produk" placeholder="Nama Produk">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="deskripsi_produk<?= $r['id_produk']; ?>" value="<?= $r['deskripsi_produk']; ?>" name="deskripsi_produk" placeholder="Deskripsi Produk">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="harga_produk<?= $r['id_produk']; ?>" value="<?= $r['harga_produk']; ?>" name="harga_produk" placeholder="Harga Produk">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="stok_produk<?= $r['id_produk']; ?>" value="<?= $r['stok_produk']; ?>" name="stok_produk" placeholder="Stok Produk">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="editProduk(<?= $r['id_produk']; ?>)">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-produk_delete<?= $r['id_produk']; ?>" tabindex="-1" aria-labelledby="modal-produk_delete-label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-produk_delete-label">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin untuk menghapus Produk ini ? 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteProduk(<?= $r['id_produk']; ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-manajemen_perizinan" tabindex="-1" role="dialog" aria-labelledby="modal-manajemen_perizinan-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-manajemen_perizinan-label">Edit Data Perizinan UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="message_perizinan" class="mt-3"></div>
            <form id="form-manajemen_perizinan">
                <input type="hidden" name='edit' id='edit'/>
                <div class="modal-body">
                    <select name="umkm" id="umkm" class="form-control" style="margin-bottom: 20px;" onchange="updateCustomData()">
                        <option selected="selected" value="">
                            Pilih UMKM...
                        </option>
                        <?php
                        foreach($listUMKMPelaku as $key => $data) { 
                        ?>
                            <option value="<?php echo $data['id_umkm']; ?>" data-custom="<?= $data['jenis_usaha']; ?>"><?php echo $data['nama_pelaku_umkm']; ?> - <?php echo $data['nama_umkm']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jenis Usaha">
                    </div>

                    <label for="num_files">Jumlah File Upload:</label>
                    <input type="number" id="num_files" name="num_files" min="3" max="10" placeholder="max 10" required>
                    <button type="button" onclick="generateFileInputs()">Buat Upload File</button>
                    <br><br>

                    <div id="file_inputs_container" name="file_inputs_container"></div>


                    <p style="margin-top: 20px;<?php echo $user['role_id'] != 1 ? "display: none" : "display: block"?>">Verifikasi ? <p>
                    <select name="is_verifikasi" id="is_verifikasi" class="form-control" style="<?php echo $user['role_id'] != 1 ? "display: none" : "display: block"?>">
                        <option selectedvalue="0">
                            DITOLAK
                        </option>
                        <option value="1">
                            DISETUJUI
                        </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="newDokumenPerizinan()">Simpan</button>
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
    function newDokumenPerizinan(){
        const formData = new FormData(document.getElementById('form-manajemen_perizinan'));
        let errorMessages = [];
        let is_valid = true;
        let umkm = document.getElementById('umkm').value;
        let numberOfFiles = document.getElementById('num_files').value;
        if(umkm === "null" || umkm === null || umkm === ""){
            is_valid = false
            errorMessages.push('Wajib pilih salah satu UMKM');
        }

        if(numberOfFiles === "null" || numberOfFiles === null || numberOfFiles === ""){
            is_valid = false
            errorMessages.push('Wajib Upload dokumen.');
        }

        for (let i = 0; i < numberOfFiles; i++) {
            let fileInput = document.getElementById('file'+i);
            let descriptionInput = document.getElementById('description'+i);

            if (!fileInput.value) {
                is_valid = false;
                errorMessages.push('Semua File ' + (i + 1) + ' wajib diupload.');
            }

            if (!descriptionInput.value) {
                is_valid = false;
                errorMessages.push('Keterangan File ' + (i + 1) + ' wajib diisi.');
            }
            
        }

        if (!is_valid) {
            alert(errorMessages.join('\n'));
            return;
        }else {
            console.log("NUMBER OF FILE GUYS"+numberOfFiles)
            for (let i = 0; i < numberOfFiles; i++) {
                let fileInput = document.getElementById('file'+i);
                let descriptionInput = document.getElementById('description'+i);

                formData.append('files[]', fileInput.files[0]);
                formData.append('descriptions[]', descriptionInput.value);
            }

            formData.append('umkm_id',umkm)

            for (let [key, value] of formData.entries()) { 
                console.log(key, value);
            }

            $('#loading').show();
            $.ajax({
                url: '<?php echo base_url(); ?>pelaku/newDokumenPerizinan',
                method: 'POST',
                data: formData,
                dataType: 'json',
                processData: false, 
                contentType: false,
                success: function(response) {
                    console.log(response)
                    if(!response.status) {
                        $('#loading').hide();
                        $('#message_perizinan').html('<div class="alert alert-danger">' + response.msg + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message_perizinan').html('<div class="alert alert-success">' + response.msg + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    $('#loading').hide();
                    $('#message_perizinan').html('<div class="alert alert-danger">Terjadi kesalahan,hubungi tim IT</div>');
                }
            });
        }
    }

    function deleteProduk(id_produk){
        console.log(id_produk)
        $('#loading').show();
        $.ajax({
                url: '<?php echo base_url(); ?>pelaku/deleteProduk',
                method: 'POST',
                data: { id_produk : id_produk },
                success: function(response) {
                    let result = JSON.parse(response);
                    console.log(result)
                    if(result.error) {
                        $('#loading').hide();
                        $('#message'+id_produk).html('<div class="alert alert-danger">' + result.error + '</div>');
                    } else {
                        $('#loading').hide();
                        $('#message'+id_produk).html('<div class="alert alert-success">' + result.success + '</div>');
                        window.location.reload();  // Refresh the page
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan, hubungi tim IT.');
                }
            });
    }

    function updateCustomData() {
        let dropdown = document.getElementById("umkm");
        let selectedOption = dropdown.options[dropdown.selectedIndex];
        let customData = selectedOption.getAttribute('data-custom');
        document.getElementById("jenis_usaha").value = customData;
    }

    function generateFileInputs(){
        let numberOfFiles = document.getElementById('num_files').value;
        let fileInputsContainer = document.getElementById('file_inputs_container');
        fileInputsContainer.innerHTML = '';
        let defaultValue = [
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain',
            'File lain-lain'
        ] 

        for (let i = 0; i < numberOfFiles; i++) {
            let fileInputDiv = document.createElement('div');
            fileInputDiv.innerHTML = `
                <label for="file${i}">File${i + 1}:</label>
                <input type="file" name="files[]" id="file${i}" onchange="previewImage(this, ${i})" required><br>
                <label for="description${i}">Keterangan${i + 1}:</label>
                <input type="text" name="descriptions[]" id="description${i}" value ="${defaultValue[i]}" required><br>
                <img id="preview${i}" src="#" alt="Image Preview" style="display: none; max-width: 200px; margin-top: 10px;"><br><br>
            `;
            fileInputsContainer.appendChild(fileInputDiv);
        }
    }

    function previewImage(input, index) {
        let file = input.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('preview'+index);
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>