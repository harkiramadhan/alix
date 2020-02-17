<?php
class Kartu extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        $this->load->model('M_Step');
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
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['step'] = $this->M_Step->get_all()->result();
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());
        $data['cekSekolah'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>1]);
        $data['cekDataDiri'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>2]);
        $data['cekJasmani'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>3]);
        $data['cekAlamat'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>4]);
        $data['cekLain'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>5]);
        $data['cekAyah'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>6]);
        $data['cekIbu'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>7]);
        $data['cekFoto'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>9]);
        $data['cekKtp'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>10]);
        $data['cekKk'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>11]);
        $data['cekAkta'] = $this->db->get_where('bstep', ['idcsiswa'=>$this->idcsiswa(), 'idstep'=>12]);

        $this->load->view('layout/header', $data);
        $this->load->view('inner/cetak_kartu', $data);
        $this->load->view('layout/footer');
    }

    function cetak(){
        $data['title']          = "Cetak Kartu Ujian ";
        $data['idcsiswa']       = $this->idcsiswa();
        $data['siswa']          = $this->db->get_where('csiswa', ['id'=> $this->idcsiswa()])->row();
        $data['foto']           = $this->db->get_where('cdocument', ['idcsiswa'=>$this->idcsiswa(), 'jenis'=> "anak"])->row();
        
        $get = $this->M_Step->get_all()->result();
        $i = 1;
        foreach($get as $g){
            $get2 = $this->M_Step->cekStep($this->idcsiswa(), $g->id);
            if($get2->num_rows() > 0){
                $i++;
            }else{
                $gs[] = $g->step;
            }
        }
        
        if($i == 12){
            // $this->load->view('inner/karu', $data);
            $pdfFilePath = "Kartu Ujian PPDB SDIT Al Hikmah - ".$data['siswa']->nama.".pdf";
        
            try{
                $mpdf = new \Mpdf\Mpdf();
                $html = $this->load->view('inner/karu',$data,true);
                $mpdf->useSubstitutions = false; 
                $mpdf->simpleTables = true;
                $mpdf->WriteHTML($html);
                $mpdf->Output($pdfFilePath, "D");
            }catch (\Mpdf\MpdfException $e){
                echo $e->getMessage();  
            }
        }else{
            $this->session->set_flashdata('gagal', $gs);
            redirect('dashboard');
        }
    }
}