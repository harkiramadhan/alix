<?php
class Prestasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Prestasi');
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
        $data['title'] = "Prestasi - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/prestasi');
        $this->load->view('admin/footer');
    }

    function action(){
        $jenis = $this->input->post('jenis', TRUE);
        $idprestasi = $this->input->post('idprestasi', TRUE);
        if($jenis == "tambah"){
            $data = [
                'kategori' => $this->input->post('kategori'),
                'tahun' => $this->input->post('tahun'),
                'prestasi' => $this->input->post('prestasi')
            ];
            $this->db->insert('prestasi', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Prestasi Berhasil Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            } 

        }elseif($jenis == "edit"){
            $data = [
                'kategori' => $this->input->post('kategori'),
                'tahun' => $this->input->post('tahun'),
                'prestasi' => $this->input->post('prestasi')
            ];
            $this->db->where('id', $idprestasi);
            $this->db->update('prestasi', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Prestasi Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            } 

        }elseif($jenis == "delete"){
            $this->db->where('id', $idprestasi);
            $this->db->delete('prestasi');
            
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Prestasi Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            } 
        }
    }

    function modal(){
        $idprestasi = $this->input->post('idprestasi', TRUE);
        $jenis = $this->input->post('jenis', TRUE);
        $cek = $this->M_Prestasi->get_byId($idprestasi);
        if($cek->num_rows() > 0){
            $pres = $cek->row();
            if($jenis == "edit"){
                ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= site_url('backend/prestasi/action') ?>" method="POST">
                        <input type="hidden" name="jenis" value="edit">
                        <input type="hidden" name="idprestasi" value="<?= $idprestasi ?>">
                        <div class="modal-body bg-secondary">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kategori Prestasi <small class="text-warning">*</small></label>
                                        <select name="kategori" class="form-control form-control-sm form-control-alternative" required>
                                            <option value="">- Pilih Kategori Prestasi -</option>
                                            <option value="Akademik" <?php if($pres->kategori == "Akademik"){echo "selected";} ?>>Akademik</option>
                                            <option value="Non" <?php if($pres->kategori == "Non"){echo "selected";} ?>>Non Akademik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tahun Prestasi <small class="text-warning">*</small></label>
                                        <select name="tahun" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="">- Pilih Tahun Prestasi -</option>
                                        <?php
                                            $year = range(2000, 2030);
                                            foreach($year as $y){
                                                ?>
                                                <option value="<?= $y ?>" <?php if($pres->tahun == $y){echo "selected";} ?>><?= $y ?></option>";
                                                <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Prestasi <small class="text-warning">*</small></label>
                                <textarea name="prestasi" class="form-control-alternative form-control-sm form-control" id="" cols="30" rows="2" required placeholder="Prestasi Yang Di Capai ...."><?= $pres->prestasi ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                        </form>
                    </div>
                <?php
            }elseif($jenis == "delete"){
                ?>
                <div class="modal-content bg-gradient-danger">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Hapus Prestasi</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Apakah Anda Yakin Menghapus Prestasi</h4>
                            <p><?= $pres->prestasi ?></p>
                        </div>
                    </div>
                    <form action="<?= site_url('backend/prestasi/action') ?>" method="post">
                    <input type="hidden" name="idprestasi" value="<?= $idprestasi ?>">
                    <input type="hidden" name="jenis" value="delete">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-link text-white" data-dismiss="modal">Tutup</button> 
                        <button type="submit" class="btn btn-sm btn-white ml-auto">Ya, Lanjutkan</button>
                    </div>
                    </form>
                </div>
                <?php
            }
        }
    }

    // // // AJAX // // //
    function table_list_prestasi(){
        $prestasi = $this->M_Prestasi->get_All();
        $loader = base_url('assets/home/loader.gif');
        if($prestasi->num_rows() > 0){
            $no = 1;
            foreach($prestasi->result() as $row){
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->kategori ?></td>
                    <td><?= $row->tahun ?></td>
                    <td><?= $row->prestasi ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary edit_<?= $row->id ?>" id="<?= $row->id ?>">Edit</button>
                            <button class="btn btn-sm btn-danger  ml-1 delete_<?= $row->id ?>" id="<?= $row->id ?>">Hapus</button>
                        </div>
                    </td>
                </tr>

                <script>
                    $('.edit_<?= $row->id ?>').click(function(){
                        var idprestasi = this.id;
                        var jenis = 'edit';
                        $.ajax({
                            url: '<?= site_url('backend/prestasi/modal') ?>',
                            type: 'post',
                            data: {idprestasi : idprestasi, jenis : jenis},
                            beforeSend: function(){
                                $('#modalEdit').modal('show');
                                $('.isi').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isi').html(html);
                            }
                        });
                    });
                    $('.delete_<?= $row->id ?>').click(function(){
                        var idprestasi = this.id;
                        var jenis = 'delete';
                        $.ajax({
                            url: '<?= site_url('backend/prestasi/modal') ?>',
                            type: 'post',
                            data: {idprestasi : idprestasi, jenis : jenis},
                            beforeSend: function(){
                                $('#modalDelete').modal('show');
                                $('.isiDelete').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isiDelete').html(html);
                            }
                        });
                    });
                </script>
            <?php
            }
        }
    }
}