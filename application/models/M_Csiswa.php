<?php
class M_Csiswa extends CI_Model{
    function cek_NikEmail($email, $nik){
        $this->db->select('*');
        $this->db->from('csiswa');
        $this->db->where(['email'=>$email, 'nik'=>$nik]);
        return $this->db->get();
    }

    function get_byId($idcsiswa){
        $this->db->select('csiswa.*, kewarganegaraan.short, kewarganegaraan.kwn kkwn, wilayah_kabupaten.nama nama_kab, wilayah_kecamatan.nama nama_kec, wilayah_desa.nama nama_kel');
        $this->db->from('csiswa');
        $this->db->join('kewarganegaraan', 'csiswa.kwn = kewarganegaraan.id', 'left');
        $this->db->join('wilayah_kabupaten', 'csiswa.kabupaten = wilayah_kabupaten.id', 'left');
        $this->db->join('wilayah_kecamatan', 'csiswa.kecamatan = wilayah_kecamatan.id', 'left');
        $this->db->join('wilayah_desa', 'csiswa.kelurahan = wilayah_desa.id', 'left');
        $this->db->where(['csiswa.id'=>$idcsiswa]);
        return $this->db->get()->row();
    }

    function get_allCsiswa(){
        $this->db->select('*');
        $this->db->from('view_siswa');
        $this->db->order_by('nama', "ASC");
        return $this->db->get();
    }

    function get_BiodataOrtu($idcsiswa, $jenis){
        $this->db->select('*');
        $this->db->from('view_ortu');
        $this->db->where([
            'idcsiswa' => $idcsiswa,
            'jenis' => $jenis
        ]);
        return $this->db->get();
    }
}