<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--5">
    <div class="row justify-content-center">
        <div class="col-xl-12 mt-3">
            <div class="row">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="form-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Cari ..." id="search">
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <form action="<?= site_url('csiswa/export') ?>" method="post">
                        <input type="hidden" name="jenis" value="all">
                        <div class="form-group-sm">
                            <button class="btn btn-sm btn-block btn-secondary"><i class="fa fa-print"></i>&nbsp;Download .Xlsx</button>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
        <div class="col-xl-12 mt-2">
            <div class="card shadow">
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
                                <th width="10px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>