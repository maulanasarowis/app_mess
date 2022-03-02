<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <h2>detail approve</h2>
    <p>Nik : <?= $approval[0]->nik; ?></p>
    <p>Nama : <?= $approval[0]->nama_karyawan; ?></p>
    <p>jenis_kelamin : <?= $approval[0]->jenis_kelamin; ?></p>
    <p>Tgl Lahir : <?= $approval[0]->tgl_lahir; ?></p>
    <p>Nama Mess : <?= $approval[0]->nama_mess; ?></p>
    <p>Type Mess : <?= $approval[0]->type_mess; ?></p>
    <p>Nomor Kamar : K-<?= $approval[0]->nomor_kamar; ?></p>
    <p>Disetujui oleh : <?= $approval[0]->approve_by; ?></p>
    <p>Disetujui pada tgl : <?= date('d F Y', strtotime($approval[0]->approve_date)) ?></p>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->