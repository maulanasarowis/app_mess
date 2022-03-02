
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Data List Reject</h4>
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
                            <th>Alasan</th>
                            <th>Status</th>
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
                                <td><?php echo $m->komentar ?></td>
                                <td>
                                    <a class="btn-sm btn-danger mb-3 text-light text-decoration-none" style="pointer-events: none;"><?= $m->approve_status == 2 ? 'Reject' : '' ?></a>
                                </td>
                                <td>
                                <a href="<?= base_url('user/C_approval/reject_edit/' . $m->id_trx_mess); ?>" class="btn-sm btn-warning mb-3"><i class="fas fw fa-pencil-alt">&nbsp;</i></a>
                                    <a href="<?= base_url('user/C_approval/delete/' . $m->id_trx_mess); ?>" class="btn-sm btn-danger mb-3"><i class="fas fa-trash">&nbsp;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->