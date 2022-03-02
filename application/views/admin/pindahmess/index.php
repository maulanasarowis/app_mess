
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Pindah Mess</h4>
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
                            <!-- <th>Disetujui oleh</th> -->
                            <th>Tgl Persetujuan</th>
                            <th>Lama Tinggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($approval as $m) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $m->nik ?></td>
                                <td><?= $m->nama_karyawan ?></td>
                                <td><?= $m->nama_mess ?></td>
                                <td><?= $m->type_mess == 'Lajang' ? 'K-0' . $m->nomor_kamar : '-' ?></td>
                                <!-- <td>
                                    <a class="btn-sm btn-success mb-3 text-light text-decoration-none" style="pointer-events: none;"><?= $m->approve_status == 1 ? $m->approve_by : '' ?></a>
                                </td> -->
                                <td><?= date('d M Y', strtotime($m->approve_date)) ?></td>
                                <td>
                                    <?php $diff = date('d-m-y') - date('d-m-y', strtotime($m->approve_date));?>
                                    <?=$diff .' Hari'?> 
                                </td>
                                <td>
                                <a href="<?= base_url('admin/C_pindahmess/edit/' . $m->id_trx_mess); ?>" class="btn-sm btn-warning mb-3"><i class="fas fw fa-pencil-alt">&nbsp;</i></a>
                                    <a href="<?= base_url('admin/C_pindahmess/detail/' . $m->id_trx_mess); ?>" class="btn-sm btn-info mb-3"><i class="fas fa-eye"></i>&nbsp;</i></a>
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