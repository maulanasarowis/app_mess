<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Data Karyawan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-4">
                    <a href="<?= base_url('admin/C_karyawan/create'); ?>" class="btn-sm btn-primary "><i class="fas fa-plus">&nbsp;</i>Tambah Data</a>
                </div>
                <?= $this->session->flashdata('massage'); ?>
                <table class="table table-striped mt-4" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th class="text-center">Departemen</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($karyawan as $k) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $k->nik ?></td>
                                <td><?= $k->nama_karyawan ?></td>

                                <td class="text-center"><?= $k->singkatan_departemen ?></td>
                                <td><?= date('d F Y', strtotime($k->tgl_lahir)) ?></td>
                                <td><?= $k->jenis_kelamin ?></td>
                                <td><?= $k->alamat ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/C_karyawan/edit/' . $k->id_karyawan); ?>" class="btn-sm btn-warning mb-3"><i class="fas fw fa-pencil-alt">&nbsp;</i></a>
                                    <a href="<?= base_url('admin/C_karyawan/delete/' . $k->id_karyawan); ?>" class="btn-sm btn-danger mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-trash">&nbsp;</i></a>
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