
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Transaksi Mess</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_transaksi'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
                    <form action="<?= base_url('admin/C_transaksi/search'); ?>" method="GET">
                        <div class="row mb-2 mt-3">
                            <!-- <label for="alamat" class="col-sm-4 col-form-label">NIK</label> -->
                            <div class="input-group col-sm-6 mb-2">
                                <input type="number" name="keyword" class="form-control" placeholder="Masukkan NIK yang terdaftar" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                    <form action="<?= base_url('admin/C_transaksi/save'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <?php if (!empty($keyword)) { ?>
                            <div class="row flex-row">
                                <div class="col-sm-6">
                                    <label for="nik" class="col-form-label">NIK</label>
                                    <input class="form-control" type="number" value="<?= $data->nik ?>" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $data->id_karyawan ?>" hidden>
                                    <label for="nama_karyawan" class="col-form-label">Nama Karyawan</label>
                                    <input class="form-control" type="text" name="nama_karyawan" value="<?= $data->nama_karyawan ?>" readonly>
                                </div>
                            </div>
    
                            <div class="row flex-row mt-2">
                                <input type="text" class="form-control" id="id_departemen" name="id_departemen" value="<?= $data->id_departemen ?>" hidden>
                                <div class="col-sm-6">
                                    <label for="departemen" class="col-form-label">Departemen</label>
                                    <input class="form-control" type="text" name="singkatan_departemen" value="<?= $data->singkatan_departemen ?>" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="alamat" class="col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <fieldset class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="radio" name="jkelamin" id="jkelamin" value="laki-laki" <?= 'Laki-laki' == $data->jenis_kelamin ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="jkelamin1">
                                                        Laki-laki
                                                    </label>
                                                </div>
    
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="radio" name="jkelamin" id="jkelamin" value="perempuan" <?= 'Perempuan' == $data->jenis_kelamin ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="jkelamin2">
                                                        Perempuan
                                                    </label>
                                                </div>
    
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <label for="alamat" class="col-form-label">Type Mess</label>
                                    <div class="input-group">
                                        <select name="type_mess" class="custom-select" id="type_mess" aria-label="Example select with button addon" onchange="getTypeMess()">
                                            <option selected disabled value="">Pilih Type Mess</option>
                                            <option value="Keluarga">Keluarga</option>
                                            <option value="Lajang">Lajang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-sm-6 mess-keluarga" style="display:none;">
                                    <label for=" alamat" class="col-form-label">Mess Keluarga</label>
                                    <div class="input-group">
                                        <select name="id_mess" class="custom-select" id="pilih_mess_keluarga" aria-label="Example select with button addon" onchange="getKamarByIdMess()">
                                            <option selected disabled value="">Pilih Mess</option>
                                            <?php foreach ($option_keluarga as $k) : ?>
                                                <option value="<?= $k->id_mess; ?>"><?= $k->nama_mess; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 mess-lajang-lk" style="display:none;">
                                    <label for="alamat" class="col-form-label">Mess Laki-laki</label>
                                    <div class="input-group">
                                        <select name="id_mess" class="custom-select" id="pilih_mess_lk" aria-label="Example select with button addon" onchange="getKamarByIdMess()">
                                            <option selected disabled value="">Pilih Mess</option>
                                            <?php foreach ($option_lajang_lk as $lk) : ?>
                                                <option value="<?= $lk->id_mess; ?>"><?= $lk->nama_mess; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 mess-lajang-pr" style="display:none;">
                                    <label for=" alamat" class="col-form-label">Mess Perempuan</label>
                                    <div class=" input-group">
                                        <select name="id_mess" class="custom-select" id="pilih_mess_pr" aria-label="Example select with button addon" onchange="getKamarByIdMess()">
                                            <option selected disabled value="">Pilih Mess</option>
                                            <?php foreach ($option_lajang_pr as $pr) : ?>
                                                <option value="<?= $pr->id_mess; ?>"><?= $pr->nama_mess; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 no-kamar" style="display:none;">
                                    <label for="alamat" class="col-form-label">Nomor Kamar</label>
                                    <div class="input-group">
                                        <select name="id_kamar" class="custom-select" id="pilih_kamar" namearia-label="Example select with button addon">
                                            <option selected disabled>Pilih Kamar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                            <button type="submit" class="btn-sm btn-success mt-3">Simpan</button>
                        <?php } ?>
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
    function getTypeMess() {
        var valTypeMess = $('#type_mess').val();
        var jenisKelamin = "<?= $data->jenis_kelamin ?>";

        if (valTypeMess == 'Lajang' && jenisKelamin == 'Laki-laki') {
            $('.mess-lajang-lk').show();
            $('.no-kamar').show();
            $('.mess-lajang-pr').hide();
            $('.mess-keluarga').hide();
        } else if (valTypeMess == 'Lajang' && jenisKelamin == 'Perempuan') {
            $('.mess-lajang-pr').show();
            $('.no-kamar').show();
            $('.mess-keluarga').hide();
            $('.mess-lajang-lk').hide();
        } else {
            $('.mess-keluarga').show();
            $('.mess-lajang-lk').hide();
            $('.mess-lajang-pr').hide();
            $('.no-kamar').hide();
        }
    }

    function getKamarByIdMess() {
        var getIdMess;
        var type_mes = $('#type_mess').val();
        var jkelamin = $('input[name=jkelamin]:checked').val();

        if (type_mes == 'Lajang') {
            if (jkelamin == 'laki-laki') {
                getIdMess = $('#pilih_mess_lk').val();
            } else {
                getIdMess = $('#pilih_mess_pr').val();
            }
        } else if (type_mes == 'Keluarga') {
            getIdMess = $('#pilih_mess_keluarga').val();
        }

        $.ajax({
            type: "get",
            url: "<?= base_url('admin/C_transaksi/getKamarAvailble') ?>",
            data: {
                id_mess: getIdMess
            },
            dataType: "html",
            success: function(response) {
                document.getElementById('pilih_kamar').innerHTML = response;
            }

        });
    }
</script>