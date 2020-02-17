<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--4">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pendaftar</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $daftar ?> Orang</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Konfirmasi</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $konfirmasi ?> Orang</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Belum Konfirmasi</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $belum_konfirmasi ?> Orang</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 mt-2">
            <div class="card shadow">
                <div class="col-xl-12">
                    <div class="form-group-sm m-3">
                        <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Cari ..." id="search">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table align-items-center table-flush table-hover table-sm" id="csiswa">
                        <thead class="thead-light">
                            <tr>
                                <th width="10px;">No</th>
                                <th width="10px;">Noujian</th>
                                <th>Nama</th>
                                <th width="10px;">L/P</th>
                                <th width="10px;">Asal Sekolah</th>
                                <th width="10px;" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>