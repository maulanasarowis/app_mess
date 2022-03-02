
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Approval</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <a href="<?= base_url('user/C_approval'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
    
                    <!-- <form action="#" method="POST" enctype="multipart/form-data"> -->
                        <!-- crsf -->
                        <div class="row flex-row">
                            <div class="col-sm-6">
                                <label for="alamat" class="col-form-label">NIK</label>
                                <input class="form-control" type="number" value="<?= $transaksi_mess->nik ?>" readonly>
                            </div>
                            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $transaksi_mess->id_karyawan ?>" hidden>
                            <div class="col-sm-6">
                                <label for="alamat" class="col-form-label">Nama Karyawan</label>
                                <input class="form-control" type="text" name="nama_karyawan" value="<?= $transaksi_mess->nama_karyawan ?>" readonly>
                            </div>
                        </div>
    
                        <div class="row flex-row mt-2">
                            <input type="text" class="form-control" id="id_departemen" name="id_departemen" value="<?= $get_departemen_by_nik->id_departemen ?>" hidden>
                            <div class="col-sm-6">
                                <label for="alamat" class="col-form-label">Departemen</label>
                                <input class="form-control" type="text" name="singkatan_departemen" value="<?= $get_departemen_by_nik->singkatan_departemen ?>" readonly>
                            </div>
                            <div class="col-sm-6">
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
                        <div class="row flex-row">
                            <div class="col-sm-6">
                                <label for="alamat" class="col-form-label">Type Mess</label>
                                <input class="form-control" type="text" value="<?= $transaksi_mess->type_mess ?>" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="alamat" class="col-form-label">Nama Mess</label>
                                <input class="form-control" type="text" name="nama_mess" value="<?= $transaksi_mess->nama_mess ?>" readonly>
                            </div>
                        </div>
                        <div class="row flex-row">
                            <div class="col-sm-6">
                                <label for="alamat" class="col-form-label">Nomor Kamar</label>
                                <input class="form-control" type="text" value="K-<?= $transaksi_mess->nomor_kamar ?>" readonly>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('user/C_approval/reject'); ?>" method="post" enctype="multipart/form-data">
                                        <input name="id_trx_mess" id="id_trx_mess" type="hidden" value="<?= $transaksi_mess->id_trx_mess?>">
                                            <div class="modal-body">
                                                <div class="row mb-2">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="komentar">Komentar/alasan di reject</label>
                                                            <textarea type="text" class="form-control text-capitalize" id="komentar" name="komentar" rows="3" onchange="getKomen()"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                <!-- <a href="<?= base_url('user/C_approval/reject/' . $transaksi_mess->id_trx_mess); ?> " class="btn-sm btn-primary p-2 text-decoration-none p-1 rounded-sm" onclick="return confirm('Apakah anda yakin?')"></i>Kirim</a> -->
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        <hr class="mt-5">
                        <!--  -->
                        <div class="text-right">
                            <a href="<?= base_url('user/C_approval/approv/' . $transaksi_mess->id_trx_mess); ?> " class="btn-sm btn-success p-2 text-decoration-none" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-check">&nbsp;</i>Approv</a>
                            <!-- <a href="<?= base_url('user/C_approval/v_komen_reject'); ?>" class="btn-sm btn-danger p-2 text-decoration-none"><i class="fas fa-times">&nbsp;</i>Reject</a> -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-times">&nbsp;</i>Reject
                            </button>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function getKomen() {
        var $postKomen = $('#komentar').val();
        alert($postKomen);

        // $.ajax({
        //     type: "post",
        //     url: "<?= base_url('user/C_approval/reject/' . $transaksi_mess->id_trx_mess); ?>",
        //     data: {
        //         komentar: $postKomen
        //     },
        //     dataType: "html",
        //     success: function(response) {
        //         console.log(response);
        //         //     document.getElementById('pilih_kamar').innerHTML = response;
        //     }

        // });
    }
</script>