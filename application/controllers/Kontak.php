<?php
class Kontak extends CI_Controller{
    function index(){
        $var['sekolah'] = $this->db->get_Where('sekolah', ['id'=> 1])->row();

        $this->load->view('home/layout/header');
        $this->load->view('home/kontak');
        $this->load->view('home/layout/footer');
    }
}