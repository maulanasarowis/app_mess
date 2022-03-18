<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Data Detail Kamar</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-4">
                    <a href="<?= base_url('admin/C_mess'); ?>" class="btn-sm btn-outline-primary "><i class="fas fa-arrow-left">&nbsp;</i>Kembali</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Kamar</th>
                            <th>Kapasitas</th>
                            <th>Penghuni</th>
                            <th>Ketersedian</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kamar as $k) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>K-<?= $k->nomor_kamar ?></td>
                                <td><?= $k->kapasitas ?> Orang</td>
                                <td>
                                    <?php if ($k->penghuni == null || $k->penghuni == 0) {?>
                                        Kosong
                                    <?php } else {?>
                                        <?= $k->penghuni ?> Orang
                                    <?php }?>
                                </td>
                                <td>
                                    <a <?= 1 == $k->is_available ? 'class="btn-sm btn-success mb-3 text-light"' : 'class="btn-sm btn-danger mb-3 text-light"' ?>><?= 1 == $k->is_available ? 'Available' : 'No Available' ?></a>
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
