<?php
class Prestasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
        $this->load->model('M_Berita');
    }

    function index(){
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();

        $this->load->view('home/layout/header');
        $this->load->view('home/prestasi', $var);
        $this->load->view('home/layout/footer');
    }
}