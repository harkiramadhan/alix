<?php
class Keuangan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('role') != 3){
            $this->session->set_userdata('role', 3);
            // $url = base_url();
            // redirect($url, 'refresh');
        }
    }
    function index(){
        $this->load->view('keu/header');
        $this->load->view('keu/dashboard');
        $this->load->view('keu/footer');
    }
}