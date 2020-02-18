<?php
class M_Prestasi extends CI_Model{
    function get_All(){
        $this->db->select('*');
        $this->db->from('prestasi');
        $this->db->order_by('tahun', "DESC");
        $this->db->order_by('id', "DESC");
        $this->db->order_by('kategori', "ASC");
        return $this->db->get();
    }

    function get_byId($idprestasi){
        $this->db->select('*');
        $this->db->from('prestasi');
        $this->db->where('id', $idprestasi);
        return $this->db->get();
    }
}