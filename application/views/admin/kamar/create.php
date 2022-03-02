<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1 class="h3 mb-2 text-gray-800">Form Tambah Data</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div> -->
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <!-- <h2 class="h4 mb-4 text-gray-800">Form Tambah Data</h2> -->
                    <a href="<?= base_url('admin/kamar'); ?>">&laquo; kembali</a>
                    <form action="<?= base_url('admin/kamar/save'); ?>" method="POST" enctype="multipart/form-data">
                        <!-- crsf -->
                        <div class="row mb-2 mt-4">
                            <label for="nomor_kamar" class="col-sm-4 col-form-label">Nomor Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-uppercase" id="nomor_kamar" name="nomor_kamar" autofocus>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="alamat" class="col-sm-4 col-form-label">Kapasitas</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                        <option selected>Pilih Kapasitas</option>
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <button type="reset" class="btn-sm btn-warning mt-3">Reset</button>
                        <button type="submit" class="btn-sm btn-primary mt-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>