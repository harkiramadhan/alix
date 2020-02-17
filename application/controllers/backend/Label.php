<?php
class Label extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Label');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){
        $data['title'] = "Dashboard Admin Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Label->get_AllLabel()->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/label');
        $this->load->view('admin/footer');
    }

    function simpan(){
        $jenis = $this->input->post('jenis', TRUE);
        if($jenis == "tambah"){
            $data = [
                'badge' => $this->input->post('badge', TRUE),
                'label' => $this->input->post('label', TRUE),
            ];
            $this->db->insert('label', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Label Berhasil Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "edit"){
            $id = $this->input->post('id', TRUE);
            $data = [
                'badge' => $this->input->post('badge', TRUE),
                'label' => $this->input->post('label', TRUE),
            ];
            $this->db->where('id', $id);
            $this->db->update('label', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Label Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "hapus"){
            $id = $this->input->post('id', TRUE);
            $this->db->where('id', $id);
            $this->db->delete('label');

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Label Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}