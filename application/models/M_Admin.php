<?php 
class M_Admin extends CI_Model{
    function cek_admin($email, $password){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(['email'=>$email, 'password'=>md5($password)]);
        return $this->db->get();
    }

    function cek_userAdmin($username, $password){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(['email'=>$username, 'password'=>md5($password)]);
        return $this->db->get();
    }

    function get_AllUser(){
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get();
    }

    function get_dataSekolah(){
        $this->db->select('*');
        $this->db->from('sekolah');
        return $this->db->get()->row();
    }
}