<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Ubah Data Mess</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_mess'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
                    <?php foreach ($mess as $m) { ?>
                        <form action="<?= base_url('admin/C_mess/update') ?>" method="POST" enctype="multipart/form-data">
                            <!-- crsf -->
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_mess" name="id_mess" value="<?= $m->id_mess; ?>" hidden>
                            </div>
                            <div class="row mb-2 mt-4">
                                <label for="nama_mess" class="col-sm-4 col-form-label">Nama Mess</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-capitalize" id="nama_mess" name="nama_mess" value="<?= $m->nama_mess; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-capitalize" id="alamat" name="alamat" value="<?= $m->alamat; ?>" autofocus>
                                </div>
                            </div>
                            <!--  -->
                            <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                            <button type="submit" class="btn-sm btn-success mt-3">Update</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->