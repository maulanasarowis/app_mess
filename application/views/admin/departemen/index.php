<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-dark">Data Departemen</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="mb-4">
                <a href="<?= base_url('admin/C_departemen/create'); ?>" class="btn-sm btn-primary "><i class="fas fa-plus">&nbsp;</i>Tambah Data</a>
            </div>
            <table class="table table-hover mt-4" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Departemen</th>
                        <th class="text-center">Singkatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($departemen as $d) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?php echo $d->nama_departemen ?></td>
                            <td class="text-center"><?php echo $d->singkatan_departemen ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/C_departemen/edit/' . $d->id_departemen); ?>" class="btn-sm btn-warning mb-3"><i class="fas fw fa-pencil-alt">&nbsp;</i></a>
                                <a href="<?= base_url('admin/C_departemen/delete/' . $d->id_departemen); ?> " class="btn-sm btn-danger mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-trash">&nbsp;</i></a>
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