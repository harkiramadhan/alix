<?php 
    if($bg->num_rows() > 0): 
    $bgg = $bg->row();
    $img = $bgg->img;
?>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url('/assets/home/img/bg/'.$bgg->img) ?>'); height: 350px;"></div>
<?php endif; ?>

<div class="main main-raised" style="margin-top: -180px">
    <div class="profile-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h3 class="title">Prestasi <?= $sekolah->nama ?></h3>
            </div>
        </div>
        <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <div class="profile-tabs mt-2">
            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#all" role="tab" data-toggle="tab">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#akademik" role="tab" data-toggle="tab">Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#non" role="tab" data-toggle="tab">Non Akademik</a>
                </li>
            </ul>
            </div>
        </div>
        </div>
        <div class="tab-content tab-space">
            <div class="tab-pane active" id="all">
                <div class="text-capitalize list_all">
                    
                </div>
            </div>
            <div class="tab-pane" id="akademik">
                <div class="text-capitalize list_akademik">

                </div>
            </div>
            <div class="tab-pane" id="non">
                <div class="text-capitalize list_non">
                
                </div>
            </div>
        </div>
    </div>
    </div>
</div>