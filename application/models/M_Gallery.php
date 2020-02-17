<?php
class M_Gallery extends CI_Model{
    function get_All(){
        $this->db->select('*');
        $this->db->from('gallery');
        return $this->db->get();
    }

    function get_byId($idgallery){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('id', $idgallery);
        return $this->db->get();
    }

    function get_AllGallery(){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where(['status'=>"published"]);
        return $this->db->get();
    }

    function get_threeGallery(){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        $this->db->limit(3);
        return $this->db->get();
    }

    function get_detailById($idgallery){
        $this->db->select('*');
        $this->db->from('gallery_detail');
        $this->db->where(['id_gallery'=>$idgallery]);
        return $this->db->get();
    }
}