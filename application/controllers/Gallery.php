<?php
class Gallery extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
        $this->load->model('M_Gallery');
    }

    function index(){
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();

        $this->load->view('home/layout/header');
        $this->load->view('home/gallery', $var);
        $this->load->view('home/layout/footer');
    }

    // // // AJAX // // //
    function list_gallery(){
        $getGallery = $this->M_Gallery->get_AllGallery();
        $loader = base_url('assets/home/loader.gif');
        if($getGallery->num_rows() > 0){
        foreach($getGallery->result() as $row){
        ?>
            <div class="col-md-3">
                <div class="card card-plain card-blog gallery_<?= $row->id ?>" id="<?= $row->id ?>" style="cursor: pointer">
                    <div class="card-header card-header-image">
                        <img class="img img-raised" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
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

    function modal(){
        $idgallery = $this->input->post('idgallery', TRUE);
        $getGallery = $this->M_Gallery->get_detailById($idgallery);
        $loader = base_url('assets/home/loader.gif');
        if($getGallery->num_rows() > 0){
            $total = $getGallery->num_rows() -1 ;
            $range = range(0, $total);
            ?>
            <div class="modal-content bg-dark rounded">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php foreach($range as $r){ ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $r ?>" class="<?php if($r==0){echo "active";} ?>"></li>
                    <?php } ?>
                    </ol>
                    <div class="carousel-inner rounded">
                    <?php 
                    $no =1;
                    foreach($getGallery->result() as $row){ ?>
                        <div class="carousel-item <?php if($no == 1){echo "active";} ?>">
                            <img class="d-block w-100" src="<?= base_url('assets/home/img/content/'. $row->img) ?>">
                        </div>
                    <?php
                    $no ++;
                    } ?>
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
                <div class="row">
                    <div class="col-xl-12 text-center mb-0 pb-0">
                        <h5 class="text-white mb-0">Jumlah : <b><?= $getGallery->num_rows() ?> Foto</b></h5>
                    </div>
                </div>
                <div class="row DetailGallery m-3 justify-content-center">

                </div>
            </div>
            <script>
                $(document).ready(function(){
                    var idgallery = '<?= $idgallery ?>';
                    $.ajax({
                        url: '<?= site_url('gallery/detailGallery') ?>',
                        type: 'post',
                        data: {idgallery : idgallery},
                        beforeSend: function(){
                            $('.DetailGallery').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                        },
                        success: function(html){
                            $('.DetailGallery').html(html);
                        }
                    });
                });
            </script>
            <?php
        }else{
            $gallery = $this->M_Gallery->get_byId($idgallery)->row();
            ?>
            <div class="modal-content">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url('assets/home/img/content/'. $gallery->img) ?>">
                        </div>
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
            </div>
            <?php
        }
    }

    function detailGallery(){
        $idgallery = $this->input->post('idgallery', TRUE);
        $getGallery = $this->M_Gallery->get_detailById($idgallery);
        if($getGallery->num_rows() > 0){
            foreach($getGallery->result() as $row){
                ?>
                    <div class="col-md-3 p-1">
                        <div class="card card-plain card-blog m-0 ">
                            <div class="card-header card-header-image">
                                <img class="img img-raised" src="<?= base_url('assets/home/img/content/'. $row->img) ?>">
                                <div class="colored-shadow" style="background-image: url('<?= base_url('assets/home/img/content/'. $row->img) ?>'); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }
}