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
        <div class="col-xl-12">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Cetak Kartu Ujian</h5> 
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <?php foreach($step as $s){ ?>
                        <div class="col-xl-1 col-md-1 col-sm-1 col-1">
                            <?php 
                                $cekStep = $this->M_Step->cekStep($anak->id, $s->id);
                                if($cekStep->num_rows() > 0):
                            ?>
                                <h1 class="text-success mr-0"><i class="ni ni-check-bold"></i></h1>
                            <?php else: ?>
                                <h1 class="text-danger mr-0"><i class="fa fa-times"></i></h1>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-11 col-md-11 col-sm-11 col-11 text-left ml-0 pl-0">
                            <h2><?= $s->step ?></h2>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                    <div class="text-right">
                        <a href="<?= site_url('kartu/cetak') ?>" class="btn ml-auto btn-sm btn-success">Cetak Kartu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>