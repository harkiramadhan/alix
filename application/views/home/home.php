<?php if($slider->num_rows() > 0): ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <?php 
       $total = $slider->num_rows() - 1;
       $range = range(0, $total);
       foreach($range as $r){ ?>
       <li data-target="#carouselExampleIndicators" data-slide-to="<?= $r ?>" class="<?php if($r==0){echo "active";} ?>"></li>
       <?php } ?>
     </ol>
  <div class="carousel-inner">
    <?php 
    $no = 1;  
    foreach($slider->result() as $row){ ?>
    <div class="carousel-item <?php if($no == 1){echo "active";} ?>">
        <div class="page-header header-filter clear-filter info-filter" data-parallax="true" style="background-image: url('<?= base_url('/assets/home/img/slide/'.$row->img) ?>');">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1 class="title"><?= $nama ?></h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php $no++; ?>
    <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>
 
<div class="row" style="width: 100%">
  <div class="col-md-9 ml-4 ml-md-0"> 
    <div class="main main-raised mt-5">
      <?php if($bg->num_rows() > 0):
        $bgg = $bg->row();  
      ?>
      <div class="section text-center rounded" style="background-image: url('<?= base_url('/assets/home/img/bg/'.$bgg->img) ?>')">
        <div class="features">
        </div>
      </div>
      <?php endif; ?>
      <div class="container">
        <!-- Berita -->
        <div class="section mt-0 pt-1">
          <h2 class="title text-center mb-2 pb-2">Berita</h2>
          <br>
          <div class="row" id="listBerita">

          </div>
          <div class="col-md-12 text-right">
              <a href="#pablo"> Selengkapnya </a>
          </div>
        </div>

        <!-- Gallery -->
        <div class="section mt-0 pt-1">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="title text-center mb-2 pb-2">Gallery</h2>
                <br>
                <div class="row" id="listGallery">
                  
                  <div class="col-md-12 text-right">
                      <a href="#pablo"> Selengkapnya </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 ml-4 ml-md-0 mt-5">
    <div class="card">
        <div class="card-header card-header-info text-center">
          <h4 class="card-title m-1">Berita Terbaru</h4>
        </div>
        <div class="card-body">
          <div class="row" id="beritaTerbaru">
              
          </div>
        </div>
    </div>
  </div>
</div>