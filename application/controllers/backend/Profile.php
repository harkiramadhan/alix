<?php
class Profile extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
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
        $data['sekolah'] = $this->M_Admin->get_dataSekolah();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile');
        $this->load->view('admin/footer');
    }

    function action(){
        if($this->input->post('jenis') == "simpan"){
            $config['upload_path']      = './assets/home/img/';  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('img');
            $upload_data    = $this->upload->data();
            $img            = $upload_data['file_name'];

            $data = [
                'jenjang' => $this->input->post('jenjang', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'sejarah' => $this->input->post('sejarah', TRUE),
                'visi' => $this->input->post('visi', TRUE),
                'misi' => $this->input->post('misi', TRUE),
                'tujuan' => $this->input->post('tujuan', TRUE),
                'motto' => $this->input->post('motto', TRUE),
                'kurikulum' => $this->input->post('kurikulum', TRUE),
                'logo' => $img,
                'instagram' => $this->input->post('instagram', TRUE),
                'youtube' => $this->input->post('youtube', TRUE),
                'facebook' => $this->input->post('facebook', TRUE),
                'twitter' => $this->input->post('twitter', TRUE),
                'telp' => $this->input->post('telp', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'wa' => $this->input->post('wa', TRUE),
            ];
            $this->db->where('id', 1);
            $this->db->update('sekolah', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Profil Sekolah Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
    }
}