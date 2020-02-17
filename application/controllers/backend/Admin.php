<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
    }

    function index(){
        $this->load->view('admin/login');
    }

    function auth(){
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $cek = $this->M_Admin->cek_userAdmin($username, $password);
        if($cek->num_rows() > 0){
            $data = $cek->row();

            if($data->status != "active"){
                $this->session->set_flashdata('error', "User Tidak Aktif, Silahkan Hubungi Admin");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('role', $data->role);

                redirect('backend/dashboard');
            }
            
        }else{
            $this->session->set_flashdata('error', "Username Atau Password Salah");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}