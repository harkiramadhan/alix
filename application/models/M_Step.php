<?php
class M_Step extends CI_Model{
    function get_all(){
        $this->db->select('*');
        $this->db->where(['show'=> 1]);
        return $this->db->get('step');
    }

    function cekStep($idcsiswa, $idstep){
        $this->db->select('*');
        $this->db->from('bstep');
        $this->db->where(['idcsiswa'=>$idcsiswa, 'idstep'=>$idstep]);
        return $this->db->get();
    }
}