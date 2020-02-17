<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Berita');
        $this->load->model('M_Gallery');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){
        $data['title'] = "Dashboard Admin Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['user'] = $this->M_Admin->get_AllUser()->num_rows();
        $data['berita'] = $this->M_Berita->get_AllBerita()->num_rows();
        $data['label'] = $this->M_Berita->get_AllLabel()->num_rows();
        $data['gallery'] = $this->M_Gallery->get_AllGallery()->num_rows();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}