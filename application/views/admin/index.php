<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Mess</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_mess ?> Mess</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kamar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kamar ?> Kamar</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Karyawan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_karyawan ?> Karyawan</div>
                                </div>
                                <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Departemen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_departemen ?> Departemen</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mess -->
    <div class="card shadow mb-4 w-50">
        <div class="card-header py-2">
            <p class="m-0 font-weight-bold text-dark">Mess</p>
        </div>
        <div class="card-body">
            <p>Jumlah Mess Type Keluarga : <span class=""><?= $total_mess_keluarga['typeMessKeluarga'] ?></span></p>
            <hr>
            <p>Jumlah Mess Type Lajang : <span class=""><?= $total_mess_lajang['typeMessLajang'] ?></span></p>
        </div>
    </div>

    <!-- keluarga -->
    <div class="card shadow mb-4 w-50">
        <div class="card-header py-2">
            <p class="m-0 font-weight-bold text-dark">Kamar</p>
        </div>
        <div class="card-body">
            <p>Kamar tersedia : <?= $total_kamar_tersedia['totalKamarTersedia'] ?></p>
            <!-- <hr>
            <p>Lajang : </p> -->
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->