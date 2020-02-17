<?php 
class Ppdb extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('M_Kewarganegaraan');
        $this->load->model('M_Csiswa');
        if($this->session->userdata('masuk') == TRUE){
            redirect('dashboard', 'refresh');
        }
    }

    function index(){
        $data['kewarganegaraan'] = $this->M_Kewarganegaraan->get_All()->result();
        $this->load->view('ppdb', $data);
    }

    function regis(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('nama_panggil', 'Nama Panggilan', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('kwn', 'Kewarganegaraan', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => '%s Wajib Di Isi'));

        $nik = $this->input->post('nik', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $nama_panggil = $this->input->post('nama_panggil', TRUE);
        $jenkel = $this->input->post('jenkel', TRUE);
        $kwn = $this->input->post('kwn', TRUE);
        $tl = $this->input->post('tl', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $email = $this->input->post('email', TRUE);

        $cek = $this->M_Csiswa->cek_NikEmail($email, $nik);

        if($cek->num_rows() > 0){
            $error = "Email atau NIK Siswa Sudah Di Daftarkan Sebelumnya, Silahkan Cek <b>".$email."</b> Untuk Melakukan Login.";
            $this->session->set_flashdata('error',$error);
            redirect('ppdb');
        }else{
            if ($this->form_validation->run() == FALSE){ 
                $error = strip_tags(validation_errors());
                $this->session->set_flashdata('error', $error);
                $this->load->view('ppdb');
            }else{
                $cek = $this->db->order_by('noujian', "DESC")->get_where('csiswa', ['noujian !='=>NULL]);
                if($cek->num_rows() > 0){
                    $nomor = $cek->row()->noujian;
                    $noujian = $nomor + 1;
                }else{
                    $noujian = 200001;
                }
                $data = [
                    'nik' => $this->input->post('nik', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'nama_panggil' => $this->input->post('nama_panggil', TRUE),
                    'jenkel' => $this->input->post('jenkel', TRUE),
                    'kwn' => $this->input->post('kwn', TRUE),
                    'tl' => $this->input->post('tl', TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'noujian' => $noujian
                ];
    
                $this->db->insert('csiswa', $data);
    
                if($this->db->affected_rows() > 0){
    
                    $var['email'] = $email;
                    $var['password'] = $nik;
                    $var['nama'] = $nama;
                    $var['tl'] = $tl;
                    $var['tgl_lahir'] = $tgl_lahir;
                    $var['jenkel'] = $jenkel;
                    
                    $config = [
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1',
                        'protocol'  => 'smtp',
                        'smtp_host' => 'mail.alhikmahmp.sch.id',
                        'smtp_user' => 'ppdb@alhikmahmp.sch.id',   
                        'smtp_pass'   => 's1mpaud3v',   
                        'smtp_crypto' => 'ssl',
                        'smtp_port'   => 465,
                    ];
    
                    $this->load->library('email', $config);
                    $this->email->from('ppdb@alhikmahmp.sch.id', 'PPDB Online SDIT Al Hikmah');
                    $this->email->to($email);
                    $this->email->subject('PPDB SDIT Al Hikmah');
                    $isi = $this->load->view('mail', $var, true);
                    $this->email->message($isi);
    
                    if ($this->email->send()) {
                        $success = "Silahkan Cek Email <b>".$email."</b> Untuk Melakukan Login.";
                        $this->session->set_flashdata('sukses', $success);
                        redirect('ppdb');
                    } else {
                        $this->db->where('id', $this->db->insert_id());
                        $this->db->delete('csiswa');
    
                        $error = "Maaf <b>".$nama."</b> Gagal Registrasi, Silahkan Coba Kembali.";
                        $this->session->set_flashdata('error', $error);
                        redirect('ppdb');
                    }
                }else{
                    $error = "Maaf <b>".$nama."</b> Gagal Registrasi, Silahkan Coba Kembali.";
                    $this->session->set_flashdata('error', $error);
                    redirect('ppdb');
                }
            }
        }
    }
}