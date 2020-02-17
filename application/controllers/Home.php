<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
        $this->load->model('M_Berita');
        $this->load->model('M_Gallery');
    }

    private function sekolah(){
        $get = $this->db->get('sekolah');
        return $get->row();
    }

    function index(){
        $var['nama'] = $this->sekolah()->nama;
        $var['slider'] = $this->M_Sekolah->get_img("slider");
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        
        $this->load->view('home/layout/header');
        $this->load->view('home/home', $var);
        $this->load->view('home/layout/footer');
    }

    // AJAX
    function get_berita(){
        $getBerita = $this->M_Berita->get_AllBerita();
        ?>
        <?php if($getBerita->num_rows() > 0): ?>
            <?php 
                foreach($getBerita->result() as $row){ 
                $getLabel = $this->M_Berita->get_LabelByBerita($row->id);
            ?>
            <div class="col-md-4">
                <div class="card card-plain card-blog">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                        <img class="img img-raised" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
                    </a>
                    <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('/assets/home/img/content/'.$row->img) ?>&quot;); opacity: 1;"></div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-info"></h6>
                        <h4 class="card-title">
                        <a href="#pablo"><?= $row->judul ?></a> <br>
                        
                        <?php if($getLabel->num_rows() > 0): ?>
                            <?php foreach($getLabel->result() as $l){ ?>
                                <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                            <?php } ?>
                        <?php endif; ?>
                        </h4>
                        <p class="card-description">
                        <?= substr($row->konten, 0, 100) ?> . . .<a href="#pablo"> Read More </a>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php else: ?>
        <div class="col-md-12">
            <div class="text-center">
                <strong>Tidak Ada Berita Untuk Saat Ini</strong>
            </div>
        </div>
        <?php endif; ?>
        <?php
    }

    function get_beritaTerbaru(){
        $getBerita = $this->M_Berita->get_ThreeBerita();
        ?>
        <?php if($getBerita->num_rows() > 0): ?>
            <?php 
                foreach($getBerita->result() as $row){ 
                $getLabel = $this->M_Berita->get_LabelByBerita($row->id);
            ?>
                <div class="card card-plain card-blog mt-0">
                    <div class="card-body pt-0 mb-0 pb-0">
                        <h4 class="card-title">
                        <a href="#pablo"><?= $row->judul ?></a> <br>
                        <p class="mt-0 mb-0"><small>2020-20-01</small></p>
                        <?php if($getLabel->num_rows() > 0): ?>
                            <?php foreach($getLabel->result() as $l){ ?>
                                <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                            <?php } ?>
                        <?php endif; ?>
                        </h4>
                        <p class="card-description">
                            <?= substr($row->konten, 0, 50) ?> . . .<a href="#pablo"> Read More </a>
                        </p>
                    </div>
                </div>
            <?php } ?>
        <?php else: ?>
        <div class="col-md-12">
            <div class="text-center">
                <strong>Tidak Ada Berita Untuk Saat Ini</strong>
            </div>
        </div>
        <?php endif; ?>
        <?php
    }

    function get_gallery(){
        $getGallery = $this->M_Gallery->get_threeGallery();
        ?>
            <?php if($getGallery->num_rows() > 0): ?>
            <?php foreach($getGallery->result() as $row){ ?>
            <div class="col-md-4">
                <div class="card card-blog">
                    <div class="card-header card-header-image">
                        <a href="#pablo">
                        <img class="img img-raised" src="<?= base_url('./assets/home/img/content/'.$row->img) ?>">
                        </a>
                    <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('upload/gallery/'.$row->img) ?>&quot;); opacity: 1;"></div>
                    </div>
                    <div class="card-body">
                        <h6 class="category text-info"><?= $row->judul ?></h6>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php endif; ?>
        <?php
    }
}