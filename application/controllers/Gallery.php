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
        if($getGallery->num_rows() > 0){
        foreach($getGallery->result() as $row){
        ?>
            <div class="col-md-3">
                <div class="card card-plain card-blog">
                    <div class="card-header card-header-image">
                        <a href="#pablo"><img class="img img-raised" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>"></a>
                        <div class="colored-shadow" style="background-image: url('<?= base_url('/assets/home/img/content/'.$row->img) ?>'); opacity: 1;"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?= $row->judul ?></h4>
                    </div>
                </div>
            </div>
        <?php
        }}
    }
}