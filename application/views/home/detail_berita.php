<?php 
    if($berita->img == TRUE):
        $img = base_url('/assets/home/img/content/'.$berita->img);
    else:
        $img = base_url('/assets/home/img/bg/'.$bg->img);
    endif;
?>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= $img ?>'); height: 350px;"></div>

<style>
    .main-raisedd {
        margin: -60px 250px 0px;
        border-radius: 6px;
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 830px){
        .main-raisedd {
            margin-left: 10px;
            margin-right: 10px;
        }
    }

    @media (max-width: 375px){
        .main.main-raisedd {
            margin-top: -30px;
        }
    }
</style>
<div class="main main-raisedd" style="margin-top: -180px;">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img class="img img-raised rounded mt-5 mb-0 pb-0" style="height: 400px;" src="<?= $img ?>">
                </div>
                <div class="col-md-8 ml-auto mr-auto text-left">
                    <h3 class="title mt-4 mb-0"><?= $berita->judul ?></h3>
                    <small>- <?= longdate_indo(date('Y-m-d', strtotime($berita->timestamp)))  ?></small>
                </div>
                <div class="col-md-8 ml-auto mr-auto mb-5">
                    <p><?= $berita->konten ?></p>
                </div>
            </div>
        </div>
    </div>
</div>