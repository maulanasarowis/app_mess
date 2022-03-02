<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Data Mess</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-4">
                    <a href="<?= base_url('admin/C_mess/create'); ?>" class="btn-sm btn-primary "><i class="fas fa-plus">&nbsp;</i>Tambah Data</a>
                </div>
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mess</th>
                            <th>Type Mess</th>
                            <th>Kategori Mess</th>
                            <th>Alamat</th>
                            <th>Jumlah Kamar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mess as $m) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?php echo $m->nama_mess ?></td>
                                <td><?php echo $m->type_mess ?></td>
                                <td><?php echo $m->kategori_mess ?></td>
                                <td><?php echo $m->alamat ?></td>
                                <td><?php echo $m->jumlah_kamar ?>&nbsp;Kamar</td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/C_mess/detail/' . $m->id_mess); ?>" class="btn-sm btn-success mb-3"><i class="fas fa-search">&nbsp;</i></a>
                                    <a href="<?= base_url('admin/C_mess/edit/' . $m->id_mess); ?>" class="btn-sm btn-warning mb-3"><i class="fas fw fa-pencil-alt">&nbsp;</i></a>
                                    <a href="#" class="btn-sm btn-danger mb-3"><i class="fas fa-trash">&nbsp;</i></a>
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