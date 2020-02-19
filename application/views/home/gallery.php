<?php 
    if($bg->num_rows() > 0): 
    $bgg = $bg->row();
    $img = $bgg->img;
?>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url('/assets/home/img/bg/'.$bgg->img) ?>'); height: 350px;"></div>
<?php endif; ?>

<div class="main main-raised mt--9" style="margin-top: -180px">
    <div class="container">
      <div class="section pt-5">
        <div class="row list_gallery">
            
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="modalLihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg isi" role="document" style="margin-top: 80px">
    
  </div>
</div>