<?php 
    if($bg->num_rows() > 0): 
    $bgg = $bg->row();
    $img = $bgg->img;
?>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url('/assets/home/img/bg/'.$bgg->img) ?>'); height: 350px;"></div>
<?php endif; ?>
<div class="main main-raised">
    <div class="profile-content">
    <div class="container">
        <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
            <div class="avatar">
                <img src="<?= base_url('/assets/home/img/'.$logo) ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
            </div>
            <div class="name">
                <h3 class="title">SDIT AL-HIKMAH</h3>
            </div>
            </div>
        </div>
        </div>
        <div class="description text-justify">
            <p style="color: black;">
                <?= $sejarah ?>
            </p>
        </div>
        <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <div class="profile-tabs">
            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#visi" role="tab" data-toggle="tab">
                        <i class="material-icons">how_to_reg</i> Visi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#misi" role="tab" data-toggle="tab">
                        <i class="material-icons">directions_run</i> Misi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tujuan" role="tab" data-toggle="tab">
                        <i class="material-icons">show_chart</i> Tujuan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#motto" role="tab" data-toggle="tab">
                        <i class="material-icons">favorite</i> Motto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kurikulum" role="tab" data-toggle="tab">
                        <i class="material-icons">menu_book</i> Kurikulum
                    </a>
                </li>
            </ul>
            </div>
        </div>
        </div>
        <div class="tab-content tab-space">
        <div class="tab-pane active text-center gallery" id="visi">
            <div class="description text-center text-capitalize">
                <p style="color: black;">
                    <?= $visi ?>
                </p>
            </div>
        </div>
        <div class="tab-pane text-center gallery" id="misi">
            <div class="description text-left text-capitalize">
                <p style="color: black;">
                    <?= $misi ?> <br>                   
                </p>
            </div>
        </div>
        <div class="tab-pane text-center gallery" id="tujuan">
            <div class="description text-left text-capitalize">
                <p style="color: black;">
                    <?= $tujuan ?>                
                </p>
            </div>
        </div>
        <div class="tab-pane text-center gallery" id="motto">
            <div class="description text-left text-capitalize">
                <p class="text-center" style="color: black;">
                    <b><?= $motto ?></b>             
                </p>
            </div>
        </div>
        <div class="tab-pane text-center gallery" id="kurikulum">
            <div class="description text-center text-capitalize">
                <p style="color: black;">
                    <?= $kurikulum ?>            
                </p>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>