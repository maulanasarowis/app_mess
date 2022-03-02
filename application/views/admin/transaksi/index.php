<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-dark">Data Penghuni Mess</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="mb-4">
                <a href="<?= base_url('admin/C_transaksi/create'); ?>" class="btn-sm btn-primary "><i class="fas fa-plus">&nbsp;</i>Tambah Data</a>
            </div>
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Mess</th>
                        <th>Type Mess</th>
                        <th>No Kamar</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($trx_mess as $m) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $m->nik ?></td>
                            <td><?= $m->nama_karyawan ?></td>
                            <td><?= $m->nama_mess ?></td>
                            <td><?= $m->type_mess ?></td>
                            <td><?= $m->type_mess == 'Lajang' ? 'K-0' . $m->nomor_kamar : '-' ?></td>
                            <td>
                                <a class="btn-sm btn-dark mb-3 text-light text-decoration-none" style="pointer-events: none;"><?= $m->complate_stat == 0 ? 'No Complate' : '' ?></a>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/C_transaksi/edit/' . $m->id_trx_mess); ?>" class="btn-sm btn-warning mb-3"><i class="fas fw fa-pencil-alt">&nbsp;</i></a>
                                <a href="<?= base_url('admin/C_transaksi/delete/' . $m->id_trx_mess); ?>" class="btn-sm btn-danger mb-3"><i class="fas fa-trash">&nbsp;</i></a>
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