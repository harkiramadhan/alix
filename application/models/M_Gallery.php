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

    function get_FourGallery(){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        $this->db->limit(4);
        return $this->db->get();
    }

    function get_detailById($idgallery){
        $this->db->select('*');
        $this->db->from('gallery_detail');
        $this->db->where(['id_gallery'=>$idgallery]);
        return $this->db->get();
    }

    // Background
    function get_background(){
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('jenis', 'bg');
        return $this->db->get();
    }

    // Slider
    function get_slider(){
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('jenis', 'slider');
        return $this->db->get();
    }
}