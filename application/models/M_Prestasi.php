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

    function get_TahunJenis($jenis){
        $this->db->distinct();
        $this->db->order_by('tahun', "ASC");
        $this->db->select('tahun');
        $this->db->from('prestasi');
        if($jenis != "all"){
            $this->db->where('kategori', $jenis);
        }
        return $this->db->get();
    }

    function get_byJenisTahun($tahun, $jenis){
        $this->db->select('*');
        $this->db->from('prestasi');
        $this->db->where('tahun', $tahun);

        if($jenis != "all"){
            $this->db->where('kategori', $jenis);
        }

        $this->db->order_by('id', "ASC");
        return $this->db->get();
    }
}