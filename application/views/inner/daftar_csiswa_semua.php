<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt-4">
    <div class="nav-wrapper">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-check mr-2"></i>Sudah Konfirmasi &nbsp;&nbsp;<span class="badge badge-secondary"><?= $conf ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-times mr-2"></i>Belum Konfirmasi &nbsp;&nbsp;<span class="badge badge-secondary"><?= $not ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-trash mr-2"></i>Terhapus &nbsp;&nbsp;<span class="badge badge-secondary"><?= $del ?></span></a>
            </li>
        </ul>
    </div>
    
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <input type="text" class="form-control form-control-alternative form-control-sm" id="myInput" placeholder="Cari Siswa Ter- Konfirmasi .... ">
                <div class="table-responsive mt-4 bg-white">
                    <table class="table table-flush table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th width="5px;">No</th>
                                <th width="5px;">Noujian</th>
                                <th>Nama</th>
                                <th width="5px;">L/P</th>
                                <th width="5px;">Asal Sekolah</th>
                                <th width="5px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable" class="table_konfrim">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <input type="text" class="form-control form-control-alternative form-control-sm" id="myInput2" placeholder="Cari Siswa Belum Konfirmasi .... ">
                <div class="table-responsive mt-4 bg-white">
                    <table class="table table-flush table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th width="5px;">No</th>
                                <th width="5px;">Noujian</th>
                                <th>Nama</th>
                                <th width="5px;">L/P</th>
                                <th width="5px;">Asal Sekolah</th>
                                <th width="5px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable2" class="table_belum">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                <input type="text" class="form-control form-control-alternative form-control-sm" id="myInput3" placeholder="Cari Siswa Ter- Hapus .... ">
                <div class="table-responsive mt-4 bg-white">
                    <table class="table table-flush table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th width="5px;">No</th>
                                <th width="5px;">Noujian</th>
                                <th>Nama</th>
                                <th width="5px;">L/P</th>
                                <th width="5px;">Asal Sekolah</th>
                                <th width="5px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable3" class="table_deleted">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        