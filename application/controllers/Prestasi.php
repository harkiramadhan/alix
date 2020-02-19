<?php
class Prestasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
        $this->load->model('M_Prestasi');
    }

    function index(){
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();

        $this->load->view('home/layout/header');
        $this->load->view('home/prestasi', $var);
        $this->load->view('home/layout/footer');
    }

    // // // AJAX // // //
    function list(){
        $jenis = $this->input->post('jenis', TRUE); //all, Akademik, Non

        $getTahun = $this->M_Prestasi->get_TahunJenis($jenis);
        if($getTahun->num_rows() > 0){
            foreach($getTahun->result() as $row){
        ?>
            <h5><b>Tahun <?= $row->tahun ?></b></h5>
            <ul>
                <?php
                    $getPrestasi = $this->M_Prestasi->get_byJenisTahun($row->tahun, $jenis)->result();
                    foreach($getPrestasi as $p){
                ?>
                    <li><?= $p->prestasi ?></li>
                <?php } ?>
            </ul>
        <?php
            }
        }else{
            ?>
                <h5><b>-</b></h5>
            <?php
        }
    }
}