<?php
class Kontak extends CI_Controller{
    function index(){
        $this->load->view('home/layout/header');
        $this->load->view('home/kontak');
        $this->load->view('home/layout/footer');
    }
}