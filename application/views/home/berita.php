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
        <div class="col-md-8 ml-auto mr-auto">
            <div class="profile-tabs mt-5">
            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#all" role="tab" data-toggle="tab">Semua</a>
                </li>
                <?php foreach($label as $l){ ?>
                  <li class="nav-item">
                      <a class="nav-link label" href="#<?= $l->id ?>" role="tab" data-toggle="tab"><?= $l->label ?></a>
                  </li>
                <?php } ?>
            </ul>
            </div>
        </div>
        </div>
        <div class="tab-content tab-space">
            <div class="tab-pane active" id="all">
                <div class="row list_berita">
                    
                </div>
            </div>
            <?php foreach($label as $lb){ ?>
            <div class="tab-pane" id="<?= $lb->id ?>">
                <div class="row list_<?= $lb->id ?>">
                    <?= $lb->label ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
</div>