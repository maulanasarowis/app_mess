<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Tambah Data Departemen</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_departemen'); ?>" class="btn-sm btn-outline-primary "><i
                                class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
                    <form action="<?= base_url('admin/C_departemen/save'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <!-- crsf -->
                        <!-- <div class="row"> -->
                        <div class="col-sm-6">
                            <label for="nama_departemen" class="col-form-label">Nama Departemen</label>
                            <input type="text" class="form-control text-capitalize" id="nama_departemen"
                                name="nama_departemen" autofocus required>
                        </div>
                        <div class="col-sm-6">
                            <label for="singkatan_departemen" class="col-form-label">Nama Singkatan</label>
                            <input type="text" class="form-control text-uppercase" id="singkatan_departemen"
                                name="singkatan_departemen" autofocus required>
                        </div>
                        <!-- </div> -->
                        <hr class="mt-4">
                        <button type="reset" class="btn-sm btn-warning">Reset</button>
                        <button type="submit" class="btn-sm btn-success" onclick="saveData()">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function saveData()
    {
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
    }
</script>