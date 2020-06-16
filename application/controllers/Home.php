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
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();
        
        $this->load->view('home/layout/header');
        $this->load->view('home/home', $var);
        $this->load->view('home/layout/footer');
    }

    // AJAX
    function get_berita(){
        $getBerita = $this->M_Berita->get_SixBerita();
        ?>
        <?php if($getBerita->num_rows() > 0): ?>
            <?php 
                foreach($getBerita->result() as $row){ 
                $getLabel = $this->M_Berita->get_LabelByBerita($row->id);
            ?>
            <div class="col-md-4">
                <div class="card card-plain card-blog">
                  <div class="card-header card-header-image">
                    <a href="<?= site_url('berita/d/' . $row->id) ?>">
                        <img class="img img-raised" style="max-height: 200px;" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
                    </a>
                    <div class="colored-shadow" style="background-image: url('<?= base_url('/assets/home/img/content/'.$row->img) ?>';); opacity: 1;"></div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-info"></h6>
                        <h4 class="card-title">
                        <a href="<?= site_url('berita/d/' . $row->id) ?>"><?= $row->judul ?></a> <br>
                        
                        <?php if($getLabel->num_rows() > 0): ?>
                            <?php foreach($getLabel->result() as $l){ ?>
                                <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                            <?php } ?>
                        <?php endif; ?>
                        <p class="mt-0 mb-0"><small><?= date_indo(date('Y-m-d', strtotime($row->timestamp))) ?></small></p>
                        </h4>
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
                        <a href="<?= site_url('berita/d/' . $row->id ) ?>"><?= $row->judul ?></a> <br>
                        <?php if($getLabel->num_rows() > 0): ?>
                            <?php foreach($getLabel->result() as $l){ ?>
                                <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                            <?php } ?>
                        <?php endif; ?>
                        <p class="mt-0 mb-0"><small><?= date_indo(date('Y-m-d', strtotime($row->timestamp))) ?></small></p>
                        </h4>
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
        $getGallery = $this->M_Gallery->get_FourGallery();
        $loader = base_url('assets/home/loader.gif');
        if($getGallery->num_rows() > 0){
        foreach($getGallery->result() as $row){
        ?>
            <div class="col-md-3">
                <div class="card card-plain card-blog gallery_<?= $row->id ?>" id="<?= $row->id ?>" style="cursor: pointer">
                    <div class="card-header card-header-image">
                        <img class="img img-raised" style="max-height: 150px;" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
                        <div class="colored-shadow" style="background-image: url('<?= base_url('/assets/home/img/content/'.$row->img) ?>'); opacity: 1;"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?= $row->judul ?></h4>
                    </div>
                </div>
            </div>
            <script>
                $('.gallery_<?= $row->id ?>').click(function(){
                    var idgallery = this.id;
                    $.ajax({
                        url: '<?= site_url('gallery/modal') ?>',
                        type: 'post',
                        data: {idgallery : idgallery},
                        beforeSend: function(){
                            $('#modalLihat').modal('show');
                            $('.isi').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                        },
                        success: function(html){
                            $('.isi').html(html);
                        }
                    });
                });
            </script>
        <?php
        }}
    }
}