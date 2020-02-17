<?php
class M_Kewarganegaraan extends CI_Model{
    function get_All(){
        $this->db->select('*');
        $this->db->from('kewarganegaraan');
        return $this->db->get();
    }
}