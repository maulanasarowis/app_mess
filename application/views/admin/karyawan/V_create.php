<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Tambah Data Karyawan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_karyawan'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
                    <form action="<?= base_url('admin/C_karyawan/save'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <div class="row mb-2 mt-4">
                            <label for="nik_karyawan" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control text-capitalize" id="nik_karyawan" name="nik_karyawan" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                            <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-capitalize" id="nama_karyawan" name="nama_karyawan" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                            <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input max="<?= date('Y-m-d') ?>" type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" autofocus>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="alamat" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <fieldset class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jkelamin" id="jkelamin1" value="laki-laki" checked>
                                            <label class="form-check-label" for="jkelamin1">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jkelamin" id="jkelamin2" value="perempuan">
                                            <label class="form-check-label" for="jkelamin2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea type="text" class="form-control text-capitalize" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="alamat" class="col-sm-4 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select name="id_departemen" class="custom-select" id="pilih_departemen" aria-label="Example select with button addon" required>
                                        <option selected disabled value="">Pilih Departemen</option>
                                        <?php foreach ($departemen as $d) : ?>
                                            <option value="<?= $d->id_departemen; ?>"><?= $d->singkatan_departemen; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <!--  -->
                        <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                        <button type="submit" class="btn-sm btn-success mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script type="text/javascript">
    $('#datepicker').datepicker();
    $('#datepicker').on('changeDate', function() {
        $('#my_hidden_input').val(
            $('#datepicker').datepicker('getFormattedDate')
        );
    });
</script>