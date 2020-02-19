<?php
class M_Berita extends CI_Model{
    function get_All(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('id', "DESC");
        return $this->db->get();
    }

    function get_AllBerita(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        return $this->db->get();
    }

    function get_AllLabel(){
        $this->db->select('*');
        $this->db->from('label');
        return $this->db->get();
    }

    function get_ThreeBerita(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        $this->db->limit(3);
        return $this->db->get();
    }

    function get_SixBerita(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        $this->db->limit(6);
        return $this->db->get();
    }

    function get_LabelByBerita($idberita){
        $this->db->select('label.*');
        $this->db->from('label_berita');
        $this->db->join('label', "label_berita.id_label = label.id");
        $this->db->where(['label_berita.id_berita'=>$idberita]);
        return $this->db->get();
    }

    function get_BeritaByLabel($idlabel){
        $this->db->select('berita.*');
        $this->db->from('label_berita');
        $this->db->join('label', "label_berita.id_label = label.id");
        $this->db->join('berita', "label_berita.id_berita = berita.id");
        $this->db->where([
            'berita.status'=> "published",
            'label_berita.id_label' => $idlabel
        ]);
        return $this->db->get();
    }

    function get_byId($idberita){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('id', "DESC");
        $this->db->where('id', $idberita);
        return $this->db->get();
    }
}