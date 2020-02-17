<?php
class Gallery extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
    }

    function index(){
        $var['bg'] = $this->M_Sekolah->get_img("bg");

        $this->load->view('home/layout/header');
        $this->load->view('home/gallery', $var);
        $this->load->view('home/layout/footer');
    }
}