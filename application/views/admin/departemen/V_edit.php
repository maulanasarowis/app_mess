<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Ubah Data Departemen</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_departemen'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>

                    <form action="<?= base_url('admin/C_departemen/update'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_departemen" name="id_departemen" value="<?= $departemen->id_departemen; ?>" hidden>
                        </div>
                        <div class="row mb-2 mt-4">
                            <label for="nama_departemen" class="col-sm-4 col-form-label">Nama Departemen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-capitalize" id="nama_departemen" name="nama_departemen" value="<?= $departemen->nama_departemen; ?>" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="singkatan_departemen" class="col-sm-4 col-form-label">Nama Singkatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-uppercase" id="singkatan_departemen" name="singkatan_departemen" value="<?= $departemen->singkatan_departemen; ?>" autofocus required>
                            </div>
                        </div>
                        <!--  -->
                        <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                        <button type="submit" class="btn-sm btn-success mt-3">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->