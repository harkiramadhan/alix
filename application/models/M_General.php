<?php 
class M_General extends CI_Model{
    function get_pendidikan(){
        $this->db->select('*');
        $this->db->from('pendidikan');
        return $this->db->get();
    }

    function get_tempat_tinggal(){
        $this->db->select('*');
        $this->db->from('tempat_tinggal');
        return $this->db->get();
    }

    function get_pekerjaan(){
        $this->db->select('*');
        $this->db->from('pekerjaan');
        return $this->db->get();
    }

    function get_penghasilan(){
        $this->db->select('*');
        $this->db->from('penghasilan');
        return $this->db->get();
    }

    function get_Allkewarganegaraan(){
        $this->db->select('*');
        $this->db->from('kewarganegaraan');
        return $this->db->get();
    }
}