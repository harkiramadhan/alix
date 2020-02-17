<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function idcsiswa(){
        $idcsiswa = $this->session->userdata('idcsiswa');
        return $idcsiswa;
    }

    function index(){
        if($this->idcsiswa() == TRUE){
            $data['title'] = "Dashboard PPDB Online Al Hikmah";
            $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());

            $this->load->view('layout/header', $data);
            $this->load->view('inner/dashboard');
            $this->load->view('layout/footer');
        }else{
            $data['title'] = "Dashboard PPDB Online Al Hikmah";
            $data['email'] = $this->session->userdata('email');
            $data['daftar'] = $this->M_Csiswa->get_allCsiswa()->num_rows();
            $data['konfirmasi'] = $this->db->get_where('csiswa', ['konfirmasi'=> "done"])->num_rows();
            $data['belum_konfirmasi'] = $this->db->get_where('csiswa', ['konfirmasi'=> NULL])->num_rows();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('inner/dashboard_admin', $data);
            $this->load->view('layout/footer_admin', $data);
        }
    }

    function simpan(){
        $jenis = $this->input->post('jenis', TRUE);
        if($jenis == "pilih"){
            $data = [
                'metode_pembayaran' => $this->input->post('metode', TRUE)
            ];
            $this->db->where('id', $this->idcsiswa());
            $this->db->update('csiswa', $data);

            $data2 = [
                'idcsiswa' => $this->idcsiswa(),
                'idstep' => 14
            ];

            if($this->db->affected_rows() > 0){
                $cek = $this->db->get_where('bstep', ['idcsiswa'=> $this->idcsiswa(), 'idstep'=>14]);
                if($cek->num_rows() > 0){
                    $this->db->where('id', $cek->row()->id);
                    $this->db->update('bstep', $data2);
                }else{
                    $this->db->insert('bstep', $data2);
                }

                $this->session->set_flashdata('sukses', "Metode Pembayaran Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "konfirmasi"){
            $config['upload_path']      = './upload/img';
            $config['allowed_types']    = 'jpeg|jpg|png';
            $config['remove_spaces']    = TRUE;
            $config['file_name']        = $jenis."_".$this->idcsiswa();
            $config['overwrite']        = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('img');

            $upload_data = $this->upload->data();
            $fileImport = $upload_data['file_name'];
            
            if(!$this->upload->do_upload('img')){
                $this->session->set_flashdata('error', "File Belum Di Pilih");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $cek = $this->db->get_where('bstep', ['idcsiswa'=> $this->idcsiswa(), 'idstep'=>15]);
                
                $data = [
                    'konfirmasi_pembayaran' => $fileImport
                ];
                $this->db->where('id', $this->idcsiswa());
                $this->db->update('csiswa', $data);

                if($this->db->affected_rows() > 0){
                    $data2 = [
                        'idcsiswa' => $this->idcsiswa(),
                        'idstep' => 15
                    ];
    
                    if($cek->num_rows() > 0){
                        $this->db->where('id', $cek->row()->id);
                        $this->db->update('bstep', $data2);
                    }else{
                        $this->db->insert('bstep', $data2);
                    }

                    $this->session->set_flashdata('sukses', "Konfirmasi Pembayaran Berhasil Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    // // // AJAX // // //
    function list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $get = $this->M_Csiswa->get_allCsiswa();
        $data   = array();
        $no     = 1;

        foreach($get->result() as $row){

            if($row->konfirmasi == "done"){
                $status = "<div class='text-center'><span class='badge badge-success'>Sudah Konfirmasi</span></div>";
            }else{
                $status = "<div class='text-center'><span class='badge badge-warning'>Belum Konfirmasi</span></div>";
            }

            $data[] = [
                $no++,
                $row->noujian,
                "<strong>".$row->nama."</strong>",
                $row->jenkel,
                $row->asal_sekolah,
                $status
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
        ];
        echo json_encode($output);
        exit();
    }
}