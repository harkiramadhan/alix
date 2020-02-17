<?php
class Login extends CI_Controller{
    function index(){
        $this->load->view('admin/login');
    }

    function auth(){
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));
    }

    function logout(){
        
    }
}