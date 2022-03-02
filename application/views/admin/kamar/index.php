<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-dark">Data Kamar</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="mb-4">
                <a href="<?= base_url('admin/kamar/create'); ?>" class="btn-sm btn-primary "><i class="fas fa-plus">&nbsp;</i>Tambah Data</a>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Kamar</th>
                        <th>Kapasitas</th>
                        <th>Ketersedian</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kamar as $k) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?php echo $k->nomor_kamar ?></td>
                            <td><?php echo $k->kapasitas ?> Orang</td>
                            <td>
                                <a <?= 1 == $k->is_available ? 'class="btn-sm btn-success mb-3 text-light"' : 'class="btn-sm btn-danger mb-3 text-light"' ?>><?= 1 == $k->is_available ? 'Available' : 'No Available' ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
        </div>
    </div>
</div>