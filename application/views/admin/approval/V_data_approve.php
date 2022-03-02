<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-dark">Data List Approval</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Mess</th>
                        <th>No Kamar</th>
                        <th>Disetujui oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($approval as $m) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?php echo $m->nik ?></td>
                            <td><?php echo $m->nama_karyawan ?></td>
                            <td><?php echo $m->nama_mess ?></td>
                            <td><?= $m->type_mess == 'Lajang' ? 'K-0' . $m->nomor_kamar : '-' ?></td>
                            <td>
                                <a class="btn-sm btn-success mb-3 text-light text-decoration-none" style="pointer-events: none;"><?= $m->approve_status == 1 ? $m->approve_by : '' ?></a>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/approval/detail_approv/' . $m->id_trx_mess); ?>" class="btn-sm btn-info mb-3"><i class="fas fa-eye"></i>&nbsp;</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
        </div>
    </div>
</div>