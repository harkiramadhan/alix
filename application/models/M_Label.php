<?php
class  M_Label extends CI_Model{
    function get_AllLabel(){
        $this->db->select('*');
        $this->db->from('label');
        $this->db->order_by('label', "ASC");
        return $this->db->get();
    }
}