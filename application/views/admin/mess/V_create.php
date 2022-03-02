<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Form Tambah Data Mess</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_mess'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
                    <form action="<?= base_url('admin/C_mess/save'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <div class="row mb-2 mt-4">
                            <label for="nama_mess" class="col-sm-4 col-form-label">Nama Mess</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-capitalize" id="nama_mess" name="nama_mess" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-4 col-form-label">Type Mess</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select name="type_mess" class="custom-select" id="type_mess" aria-label="Example select with button addon" onchange="typeMess()" autofocus required>
                                        <option selected disabled value="">Pilih Type Mess</option>
                                        <option value="lajang">Lajang</option>
                                        <option value="keluarga">Keluarga</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="type_mess" onsubmit="typeMess()">
                            <div id="tampil">
                            </div>
                        </div>
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

<script>
    function typeMess() {
        let valTypeMess = document.getElementById('type_mess').value
        // console.log(valTypeMess)
        if (valTypeMess == 'lajang') {
            document.getElementById('tampil').innerHTML = `
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-4 col-form-label">Kategori Mess</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="kategori_mess" class="custom-select" id="kategori_mess" aria-label="Example select with button addon" required>
                                    <option selected disabled>Pilih Kategori Mess</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jumlah Kamar</label>
                                <input type="number" class="form-control" id="jkamar" name="jkamar" rows="3" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Qty Penghuni / Kamar</label>
                                <input type="number" class="form-control" id="qty" name="qty" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea type="text" class="form-control text-capitalize" id="alamat" name="alamat" rows="3" ></textarea>
                            </div>
                        </div>
                    </div>`;
        } else if (valTypeMess == 'keluarga') {
            document.getElementById('tampil').innerHTML = `
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="form-group" hidden>
                                <label for="exampleFormControlTextarea1">Jumlah Kamar</label>
                                <input type="number" class="form-control" id="jkamar" name="jkamar" rows="3" value="2"required></input>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea type="text" class="form-control text-capitalize" id="alamat" name="alamat" rows="3" ></textarea>
                            </div>
                        </div>
                    </div>`;
        }
    }
</script>
</script>