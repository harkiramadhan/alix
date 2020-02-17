<?php
class M_Sekolah extends CI_Model{
    function get_img($jenis){
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where([
            'jenis' => $jenis,
            'status' => "active"
        ]);
        return $this->db->get();
    }
}