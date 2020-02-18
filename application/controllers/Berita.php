<?php
class Berita extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
        $this->load->model('M_Berita');
    }

    function index(){
        $var['bg'] = $this->M_Sekolah->get_img("bg");

        $this->load->view('home/layout/header');
        $this->load->view('home/berita', $var);
        $this->load->view('home/layout/footer');
    }

    // // // AJAX // // //
    function list_berita(){
        $getBerita = $this->M_Berita->get_AllBerita();
        if($getBerita->num_rows() > 0){
            foreach($getBerita->result() as $row){
                $getLabel = $this->M_Berita->get_LabelByBerita($row->id);
                ?>
                    <div class="col-md-4">
                        <div class="card card-plain card-blog">
                            <div class="card-header card-header-image">
                                <a href="#pablo">
                                    <img class="img img-raised" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
                                </a>
                                <div class="colored-shadow" style="background-image: url('<?= base_url('/assets/home/img/content/'.$row->img) ?>'); opacity: 1;"></div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-info">
                                <?php if($getLabel->num_rows() > 0): ?>
                                    <?php foreach($getLabel->result() as $l){ ?>
                                        <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                                    <?php } ?>
                                <?php else: ?>
                                <span class="badge mr-1">-</span>
                                <?php endif; ?>
                                </h6>
                                <h4 class="card-title">
                                    <a href="#pablo"><?= $row->judul ?></a>
                                </h4>
                                <p class="card-description">
                                    <?= substr($row->konten, 0, 100) ?> . . .<a href="#pablo"> Read More </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }
}