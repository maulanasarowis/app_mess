<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>     -->
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
                    <form action="<?= base_url('admin/C_transaksi/update'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <div class="row flex-row">
                            <input type="text" class="form-control" id="id_trx_mess" name="id_trx_mess" value="<?= $transaksi_mess->id_trx_mess; ?>" hidden>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $transaksi_mess->id_karyawan ?>" hidden>
                                <label for="nik" class="col-form-label">NIK</label>
                                <input class="form-control" type="number" value="<?= $transaksi_mess->nik ?>" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="nama_karyawan" class="col-form-label">Nama Karyawan</label>
                                <input class="form-control" type="text" name="nama_karyawan" value="<?= $transaksi_mess->nama_karyawan ?>" readonly>
                            </div>
                        </div>
    
                        <div class="row flex-row mt-2">
                            <input type="text" class="form-control" id="id_departemen" name="id_departemen" value="<?= $get_departemen_by_nik->id_departemen ?>" hidden>
                            <div class="col-sm-6">
                                <label for="departemen" class="col-form-label">Departemen</label>
                                <input class="form-control" type="text" name="singkatan_departemen" value="<?= $get_departemen_by_nik->singkatan_departemen ?>" readonly>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="jkelamin" value="<?= $transaksi_mess->jenis_kelamin; ?>">
                                <label for="alamat" class="col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <fieldset class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input disabled class="form-check-input" type="radio" name="jkelamin" id="jkelamin" value="laki-laki" <?= 'Laki-laki' == $transaksi_mess->jenis_kelamin ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="jkelamin1">
                                                    Laki-laki
                                                </label>
                                            </div>
    
                                            <div class="form-check">
                                                <input disabled class="form-check-input" type="radio" name="jkelamin" id="jkelamin" value="perempuan" <?= 'Perempuan' == $transaksi_mess->jenis_kelamin ? 'checked' : '' ?>>
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
                                    <select name="type_mess" class="custom-select" id="type_mess" aria-label="Example select with button addon" onchange="getTypeMess()" required>
                                        <option selected disabled>Pilih Type Mess</option>
                                        <option <?= $transaksi_mess->type_mess == 'Keluarga' ? 'selected' : ''; ?> value="Keluarga">Keluarga</option>
                                        <option <?= $transaksi_mess->type_mess == 'Lajang' ? 'selected' : ''; ?> value="Lajang">Lajang</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" col-sm-6 mess-keluarga" style="display:none;">
                                <input type="hidden" name="old_keluarga" value="<?= $transaksi_mess->id_mess; ?>">
                                <label for=" alamat" class="col-form-label">Mess Keluarga</label>
                                <div class="input-group">
                                    <select name="id_mess_keluarga" class="custom-select" id="pilih_mess_keluarga" aria-label="Example select with button addon" onchange="getValKeluarga()" required>
                                        <option selected disabled>Pilih Mess</option>
                                        <?php foreach ($option_keluarga_update as $k) : ?>
                                            <option <?= $transaksi_mess->id_mess == $k->id_mess ? 'selected' : ''; ?> value="<?= $k->id_mess; ?>"><?= $k->nama_mess; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mess-lajang-lk" style="display:none;">
                                <label for="alamat" class="col-form-label">Mess Laki-laki</label>
                                <div class="input-group">
                                    <select name="id_mess_lajanglk" class="custom-select" id="pilih_mess_lk" aria-label="Example select with button addon" onchange="getKamarByIdMess()" required>
                                        <option selected disabled>Pilih Mess</option>
                                        <?php foreach ($option_lajang_lk as $lk) : ?>
                                            <option <?= $transaksi_mess->id_mess == $lk->id_mess ? 'selected' : ''; ?> value="<?= $lk->id_mess; ?>"><?= $lk->nama_mess; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mess-lajang-pr" style="display:none;">
                                <label for=" alamat" class="col-form-label">Mess Perempuan</label>
                                <div class=" input-group">
                                    <select name="id_mess_lajangpr" class="custom-select" id="pilih_mess_pr" aria-label="Example select with button addon" onchange="getKamarByIdMess()" required>
                                        <option selected disabled>Pilih Mess</option>
                                        <?php foreach ($option_lajang_pr as $pr) : ?>
                                            <option <?= $transaksi_mess->id_mess == $pr->id_mess ? 'selected' : ''; ?> value="<?= $pr->id_mess; ?>"><?= $pr->nama_mess; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6 no-kamar" style="display:none;">
                                <input type="hidden" name="old_kamar" id="old_kamar" value="<?= $transaksi_mess->id_kamar; ?>">
                                <label for="alamat" class="col-form-label">Nomor Kamar</label>
                                <div class="input-group">
                                    <select name="id_kamar" class="custom-select" id="pilih_kamar" namearia-label="Example select with button addon">
                                        <!-- <option disabled>Pilih Kamar</option> -->
                                        <!-- <option selected value="<?= $transaksi_mess->id_kamar; ?>">Kamar <?= $transaksi_mess->nomor_kamar; ?></option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-right">
                            <button type="submit" class="btn-sm btn-warning mt-3">Update</button>
                            <a href="<?= base_url('admin/C_transaksi/complate/' . $transaksi_mess->id_trx_mess); ?> " class="btn-sm btn-success p-2 text-decoration-none" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-check">&nbsp;</i>Complate</a>
                        </div>
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
    function getValKeluarga() {
        alert($('#pilih_mess_keluarga').val());
    } // proses load
    $(document).ready(function() {
        getTypeMess();
        getKamarByIdMess();
    });

    function getTypeMess() {
        var valTypeMess = $('#type_mess').val();
        var jenisKelamin = "<?= $transaksi_mess->jenis_kelamin ?>";
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
            url: "<?= base_url('admin/C_transaksi/getKamarAvailbleUpdate') ?>",
            data: {
                id_mess: getIdMess,
                old_kamar: $('#old_kamar').val()
            },
            dataType: "html",
            success: function(response) {
                document.getElementById('pilih_kamar').innerHTML = response;
            }
        });
    }
</script>