<?php 
class M_Indonesia extends CI_Model{
    function getAll_provinsi(){
        $this->db->select('*');
        $this->db->from('wilayah_provinsi');
        return $this->db->get();
    }

    function getAll_kabupatenByProp($idprop){
        $this->db->select('*');
        $this->db->from('wilayah_kabupaten');
        $this->db->where('provinsi_id', $idprop);
        return $this->db->get();
    }

    function getAll_kecamatanByKab($idkab){
        $this->db->select('*');
        $this->db->from('wilayah_kecamatan');
        $this->db->where('kabupaten_id', $idkab);
        return $this->db->get();
    }

    function getAll_kelurahanByKec($idkec){
        $this->db->select('*');
        $this->db->from('wilayah_desa');
        $this->db->where('kecamatan_id', $idkec);
        return $this->db->get();
    }
}