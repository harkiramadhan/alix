<?php
class Keuangan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('role') != 3){
            $this->session->set_userdata('role', 3);
            $this->session->set_userdata('email', "TEST");
            // $url = base_url();
            // redirect($url, 'refresh');
        }
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){
        $data['title'] = "Dashboard Kwitansi Online Al Hikmah";
        $data['email'] = $this->session('email');

        $this->load->view('keu/header', $data);
        $this->load->view('keu/dashboard');
        $this->load->view('keu/footer');
    }
}