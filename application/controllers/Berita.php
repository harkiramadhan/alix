<?php
class Berita extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
        $this->load->model('M_Berita');
        $this->load->model('M_Label');
    }

    function index(){
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();
        $var['label'] = $this->M_Label->get_AllLabel()->result();

        $this->load->view('home/layout/header');
        $this->load->view('home/berita', $var);
        $this->load->view('home/layout/footer');
    }

    function d($id){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where([
            'id' => $id
        ]);
        $var['berita'] = $this->db->get()->row();
        $var['bg'] = $this->M_Sekolah->get_img("bg")->row();
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();

        $this->load->view('home/layout/header');
        $this->load->view('home/detail_berita', $var);
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
                                <a href="<?= site_url('berita/d/' . $row->id) ?>">
                                    <img class="img img-raised" style="max-height: 200px;" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
                                </a>
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
                                    <a href="<?= site_url('berita/d/' . $row->id ) ?>"><?= $row->judul ?></a>
                                    <p class="mt-0 mb-0"><small><?= date_indo(date('Y-m-d', strtotime($row->timestamp))) ?></small></p>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }

    function list_by_label(){
        $idlabel = $this->input->post('idlabel', TRUE);
        $getBerita = $this->M_Berita->get_BeritaByLabel($idlabel);
        if($getBerita->num_rows() > 0){
            foreach($getBerita->result() as $row){
                $getLabel = $this->M_Berita->get_LabelByBerita($row->id);
                ?>
                    <div class="col-md-4">
                        <div class="card card-plain card-blog">
                            <div class="card-header card-header-image">
                                <a href="<?= site_url('berita/d/' . $row->id) ?>">
                                    <img class="img img-raised" style="max-height: 200px;" src="<?= base_url('/assets/home/img/content/'.$row->img) ?>">
                                </a>
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
                                    <a href="<?= site_url('berita/d/' . $row->id ) ?>"><?= $row->judul ?></a>
                                    <p class="mt-0 mb-0"><small><?= date_indo(date('Y-m-d', strtotime($row->timestamp))) ?></small></p>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }else{
           ?>
            <div class="col-md-12 text-center">
                <h5>Tidak Ada Berita Yang Berkaitan</h5>
            </div>
           <?php
        }
    }
}