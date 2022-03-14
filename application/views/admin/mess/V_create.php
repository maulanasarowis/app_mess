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
                <div class="col-12">
                    <div class="mb-4">
                        <a href="<?= base_url('admin/C_mess'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                    </div>
                    <form action="<?= base_url('admin/C_mess/save'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <div class="col-sm-6 mb-2">
                            <label for="alamat" class="col-form-label">Type Mess</label>
                            <div class="input-group">
                                <select name="type_mess" class="custom-select" id="type_mess" aria-label="Example select with button addon" onchange="typeMess()" autofocus required>
                                    <option selected disabled value="">Pilih Type Mess</option>
                                    <option value="lajang">Lajang</option>
                                    <option value="keluarga">Keluarga</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 mb-2">
                            <label for="nama_mess" class="col-form-label">Nama Mess</label>
                            <input type="text" class="form-control text-capitalize" id="nama_mess" name="nama_mess" autofocus required>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <label for="kategori" class="col-form-label">Kategori Mess</label>
                                <div class="input-group">
                                    <select name="kategori_mess" class="custom-select" id="kategori_mess" aria-label="Example select with button addon" required>
                                        <option selected disabled>Pilih Kategori Mess</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea type="text" class="form-control text-capitalize" id="alamat" name="alamat" rows="3" ></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-10">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Jumlah Kamar</label>
                                <input type="number" class="form-control" id="jkamar" name="jkamar" rows="3" required></input>
                            </div>
                        </div> -->

                        <div id="type_mess" onsubmit="typeMess()">
                            <div id="tampil">
                            </div>
                        </div>
                        <div>

                        
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
    function typeMess() {
        // console.log(rowCountResult);
        let valTypeMess = document.getElementById('type_mess').value
        // console.log(valTypeMess)
        if (valTypeMess == 'lajang') {
            document.getElementById('tampil').innerHTML = `
                    <div class="col-sm-6 mb-3">
                        <label for="kategori" class="col-form-label">Kategori Mess</label>
                            <div class="input-group">
                                <select name="kategori_mess" class="custom-select" id="kategori_mess" aria-label="Example select with button addon" required>
                                    <option selected disabled>Pilih Kategori Mess</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <label for="nama_mess" class="col-form-label">Nama Mess</label>
                        <input type="text" class="form-control text-capitalize" id="nama_mess" name="nama_mess" autofocus required>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea type="text" class="form-control text-capitalize" id="alamat" name="alamat" rows="3" ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 p-2">
                        <table class="table table-striped" id="myTables" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Kamar</th>
                                    <th>Kapasitas Penghuni</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="nomor" value="">1</td>
                                    <td><input class="form-control" type="text" id="no_kamar" name="no_kamar[]" value="Kamar-1" readonly></td>
                                    <td>
                                        <div class="row ">
                                            <input class="form-control col-8" type="number" id="kapasitas" name="kapasitas[]" >
                                            <p class="text-align-justify">&nbsp Orang<p/>
                                        </div>
                                    </td>
                                    <td id="button" class="text-center">
                                        <button  type="button" class="btn-sm btn-danger mb-3 fas fa-trash" onclick="myFunctionDelete(this)"></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn-sm btn-primary mt-3 fas fa-plus" onclick="myFunctionAdd()">&nbsp Tambah Baris</button>
                    </div>
                    <br>
                    <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                    <button type="submit" class="btn-sm btn-success mt-3" onclick=saveData()>Simpan</button>
                    
                    `;
        } else if (valTypeMess == 'keluarga') {
            document.getElementById('tampil').innerHTML = `
                    <div class="col-sm-6 mb-2">
                        <label for="nama_mess" class="col-form-label">Nama Mess</label>
                        <input type="text" class="form-control text-capitalize" id="nama_mess" name="nama_mess" autofocus required>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea type="text" class="form-control text-capitalize" id="alamat" name="alamat" rows="3" ></textarea>
                        </div>
                    </div>
                    <br>
                    <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                    <button type="submit" class="btn-sm btn-success mt-3" onclick=saveData()>Simpan</button>
                    
                    `;
        }
    }
</script>

<script>

    function myFunctionAdd() {
        var rowCount = $('#myTables tr').length++;
        var table     = document.getElementById("myTables");
        var row       = table.insertRow();
        row.innerHTML = `
                        <table class="table table-striped" id="myTables" width="100%" cellspacing="0">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="nomor" value="">`+rowCount+`</td>
                                    <td><input type="text" class="form-control" id="no_kamar`+rowCount+`" name="no_kamar[]" value="Kamar-`+rowCount+`" readonly></td>
                                    <td>
                                        <div class="row ">
                                            <input class="form-control col-8" type="number" id="kapasitas" name="kapasitas[]" >
                                            <p class="text-align-justify">&nbsp Orang<p/>
                                        </div>
                                    </td>
                                    <td id="button" class="text-center">
                                        <button  type="button" class="btn-sm btn-danger mb-3 fas fa-trash" onclick="myFunctionDelete(this)"></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="text" class="form-control text-capitalize" id="jmlh_kamar" name="jmlh_kamar" value="`+rowCount+`" autofocus hidden>
                        `
    }

    function myFunctionDelete(ip) {
        var tr = ip.parentNode.parentNode;
        tr.parentNode.removeChild(tr);
    }

    // function saveData () {

    //     // alert(document.getElementById()))
    //     var rowCount = $('#myTables tr').length++;
    //     alert(rowCount-1 );


        

        
        // var no_kamar;
        // var kapasitas;
        // for(var i = 1; i <= rowCount; i++)
        // {
        //     no_kamar = $('#no_kamar'+i).val();    
        //     kapasitas = $('#no_kamar'+i).val();   
        //     $.ajax({
        //         type: "post",
        //         url: "<?= base_url('admin/C_mess/getKamarAvailble') ?>",
        //         data: {
        //             nama_mess       : postNamaMess,
        //             alamat          : postAlamatMess,
        //             type_mess       : postTypeMess,
        //             kategori_mess   : postKategoriMess,
        //             kategori_mess   : postKategoriMess,
        //         },
        //         dataType: "html",
        //         success: function(response) {
        //             document.getElementById('pilih_kamar').innerHTML = response;
        //         }

        //     }); 
        // }

        // function saveHeader(){
        //     $.ajax({
        //         type: "post",
        //         url: "<?= base_url('admin/C_mess/saveHeader') ?>",
        //         data: {
        //             nama_mess       : postNamaMess,
        //             alamat          : postAlamatMess,
        //             type_mess       : postTypeMess,
        //             kategori_mess   : postKategoriMess,
        //         },
        //         // dataType: "html",
        //         success: function(response) {
        //             document.getElementById('pilih_kamar').innerHTML = response;
        //         }

        //     }); 
        // }


        // $.ajax({
        //     type: "post",
        //     url: "<?= base_url('admin/C_mess/getKamarAvailble') ?>",
        //     data: {
        //         nama_mess       : postNamaMess,
        //         alamat          : postAlamatMess,
        //         type_mess       : postTypeMess,
        //         kategori_mess   : postKategoriMess,
        //         kategori_mess   : postKategoriMess,
        //     },
        //     dataType: "html",
        //     success: function(response) {
        //         document.getElementById('pilih_kamar').innerHTML = response;
        //     }

        // });
    // }
</script>