<?php
class Berita extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Berita');
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
        $data['title'] = "Berita - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/berita');
        $this->load->view('admin/footer');
    }

    function tambah(){
        $data['title'] = "Tambah Berita - Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Berita->get_AllLabel();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/tambah_berita');
        $this->load->view('admin/footer');
    }

    function detail($id){
        $data['title'] = "Detail Berita - Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Berita->get_AllLabel();

        $data['berita'] = $this->M_Berita->get_byId($id)->row();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/detail_berita');
        $this->load->view('admin/footer');
    }

    function action(){
        $jenis = $this->input->post('jenis', TRUE);
        if($jenis == "tambah"){   
            $config['upload_path']      = './assets/home/img/content';  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;
            $this->load->library('upload', $config);  
            if($this->upload->do_upload('img')){   
                $img = $this->upload->data();  
                $config['image_library']    = 'gd2';  
                $config['source_image']     = './assets/home/img/content/'.$img["file_name"];  
                $config['create_thumb']     = FALSE;  
                $config['maintain_ratio']   = TRUE;  
                $config['quality']          = '80%';  
                $config['width']            = 1000;  
                $config['new_image']        = './assets/home/img/content/'.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'konten' => $this->input->post('konten', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->insert('berita', $data);
                if($this->db->affected_rows() > 0){
                    $idberita = $this->db->insert_id();
                    $label = $this->input->post('idl[]', TRUE);
                    foreach($label as $l){
                        $dataLabel = [
                            'id_berita' => $idberita,
                            'id_label' => $l
                        ];

                        $this->db->insert('label_berita', $dataLabel);
                    }

                    $this->session->set_flashdata('sukses', "Berita Berhasil Di Tambahkan");
                    redirect('backend/berita');
                }
            }
        }elseif($jenis == "edit"){
            $idberita = $this->input->post('idberita', TRUE);
            
            $config['upload_path']      = './assets/home/img/content';  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;
            $this->load->library('upload', $config);  
            if($this->upload->do_upload('img')){   
                $cek = $this->db->get_where('berita', ['id'=>$idberita]);

                $img = $this->upload->data();  
                $config['image_library']    = 'gd2';  
                $config['source_image']     = './assets/home/img/content/'.$img["file_name"];  
                $config['create_thumb']     = FALSE;  
                $config['maintain_ratio']   = TRUE;  
                $config['quality']          = '80%';  
                $config['width']            = 1000;  
                $config['new_image']        = './assets/home/img/content/'.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                unlink(".assets/home/img/content/$cek->img");

                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'konten' => $this->input->post('konten', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->where('id', $idberita);
                $this->db->update('berita', $data);
                
                $this->db->where('id_berita', $idberita);
                $this->db->delete('label_berita');

                $label = $this->input->post('idl[]', TRUE);
                foreach($label as $l){
                    $dataLabel = [
                        'id_berita' => $idberita,
                        'id_label' => $l
                    ];

                    $this->db->insert('label_berita', $dataLabel);
                }

                $this->session->set_flashdata('sukses', "Berita Berhasil Di Edit");
                redirect('backend/berita');

            }else{
                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'konten' => $this->input->post('konten', TRUE)
                ];
                
                $this->db->where('id', $idberita);
                $this->db->update('berita', $data);
                
                $this->db->where('id_berita', $idberita);
                $this->db->delete('label_berita');

                $label = $this->input->post('idl[]', TRUE);
                foreach($label as $l){
                    $dataLabel = [
                        'id_berita' => $idberita,
                        'id_label' => $l
                    ];

                    $this->db->insert('label_berita', $dataLabel);
                }

                $this->session->set_flashdata('sukses', "Berita Berhasil Di Edit");
                redirect('backend/berita');
                
            }
        }elseif($jenis == "delete"){
            $idberita = $this->input->post('idberita', TRUE);
            $get = $this->M_Berita->get_byId($idberita)->row();
            unlink("./assets/home/img/content/".$get->img);
            $this->db->where('id', $idberita);
            $this->db->delete('berita');
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Berita Berhasil Di Hapus");
                redirect('backend/berita');
            }
        }
    }

    function modal(){
        $idberita = $this->input->post('idberita', TRUE);
        $jenis = $this->input->post('type', TRUE);
        $get = $this->M_Berita->get_byId($idberita);
        if($jenis == "show"){
            if($get->num_rows() > 0):
            $berita = $get->row();
            $labelBerita = $this->M_Berita->get_LabelByBerita($idberita)->result();
            ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Berita <strong><?= $berita->judul ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label for="">Judul Berita</label>
                                    <input type="text" name="judul" id="" class="form-control form-control-alternative form-control-sm" value="<?= $berita->judul ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label for="">Status Berita</label>
                                    <select name="status" id="" class="form-control form-control-alternative form-control-sm" required="">
                                        <option value="" selected="" disabled="">- Pilih Status Berita -</option>
                                        <option value="published" <?php if($berita->status == "published"){echo "selected";} ?>>Published</option>
                                        <option value="draft" <?php if($berita->status == "draft"){echo "selected";} ?>>Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <label for="">Label Berita</label>
                                <div class="col-md-12 m-1">
                                <?php 
                                    $no = 1;
                                    foreach($labelBerita as $lb){
                                ?>
                                <div class="custom-control custom-control-inline custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck<?= $no ?>" type="checkbox" checked disabled>
                                    <label class="custom-control-label" for="customCheck<?= $no ?>"><span class="badge <?= $lb->badge ?> mr-1"><?= $lb->label ?></span></label>
                                </div>
                                <?php 
                                $no++;
                                } ?>
                            </div>
                            <div class="col-md-12 p-0">
                                <label for="">Gambar</label>
                                <?php if($berita->img == TRUE): ?>
                                <img src="<?= base_url('/assets/home/img/content/'.$berita->img) ?>" id="image-preview" class="rounded" alt="image preview" style="width:100%;">   
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-12 mt-2 p-0">
                                <label for="">Konten Berita</label>
                                <div id="detail_<?= $berita->id ?>" style="height: auto;"></div>
                                <textarea name="konten" style="display:none" id="desc_<?= $berita->id ?>"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
                <script>
                    var quill = new Quill('#detail_<?= $berita->id ?>', {
                    modules: {
                        toolbar: [
                            [{ 'font': [] }],
                            [{ header: [1, 2, false] }],
                            ['bold', 'italic', 'underline'],
                            ['link', 'blockquote'],
                            [{ list: 'ordered' }, { list: 'bullet' }],
                            [{ 'align': [] }],
                        ]
                    },
                    placeholder: 'Tuliskan Berita . . .',
                    theme: 'snow'
                    });
                    <?php if($berita->konten != NULL): ?>
                    quill.clipboard.dangerouslyPasteHTML('<?= $berita->konten ?>');
                    <?php endif; ?>
                    $("#desc_<?= $berita->id ?>").val(quill.root.innerHTML);
                </script>
            <?php
            endif;
        }elseif($jenis == "delete"){
            if($get->num_rows() > 0):
            $berita = $get->row();
            ?>
                <div class="modal-content bg-gradient-danger">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Hapus Berita <?= $berita->judul ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Apakah Anda Yakin Menghapus Berita</h4>
                            <p><?= $berita->judul ?></p>
                        </div>
                    </div>
                    <form action="<?= site_url('backend/berita/action') ?>" method="post">
                    <input type="hidden" name="idberita" value="<?= $idberita ?>">
                    <input type="hidden" name="jenis" value="delete">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-link text-white" data-dismiss="modal">Tutup</button> 
                        <button type="submit" class="btn btn-sm btn-white ml-auto">Ya, Lanjutkan</button>
                    </div>
                    </form>
                </div>
            <?php endif; ?>
            <?php
        }
    }

    // // // AJAX // // //
    function table_list_berita(){
        $berita = $this->M_Berita->get_All()->result();
        ?>
            <?php 
            $no = 1;
            foreach($berita as $row){ 
            $getLabel = $this->M_Berita->get_LabelByBerita($row->id);    
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?php if($getLabel->num_rows() > 0): ?>
                        <?php foreach($getLabel->result() as $l){ ?>
                            <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                        <?php } ?>
                    <?php endif; ?>
                </td>
                <td><?= $row->judul ?></td>
                <td><?= $row->status ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= site_url('backend/berita/detail/'.$row->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-default ml-1 lihat_<?= $row->id ?>" id="<?= $row->id ?>">Lihat</button>
                        <button class="btn btn-sm btn-danger  ml-1 hapus_<?= $row->id ?>" id="<?= $row->id ?>">Hapus</button>
                    </div>
                </td>
            </tr>
            <script>
                <?php 
                    $loader = base_url('assets/home/loader.gif');
                ?>
                $(document).ready(function(){
                    $(".lihat_<?= $row->id ?>").click(function(){
                        var idberita = this.id;
                        var type = 'show';
                        $.ajax({
                            url: '<?= site_url('backend/berita/modal') ?>',
                            type: 'post',
                            data: {idberita : idberita, type : type},
                            beforeSend: function(){
                                $('#modalLihat').modal('show');
                                $('.isi').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isi').html(html);
                            }
                        });
                    });
                    $(".hapus_<?= $row->id ?>").click(function(){
                        var idberita = this.id;
                        var type = 'delete';
                        $.ajax({
                            url: '<?= site_url('backend/berita/modal') ?>',
                            type: 'post',
                            data: {idberita : idberita, type : type},
                            beforeSend: function(){
                                $('#modalDelete').modal('show');
                                $('.isiDelete').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isiDelete').html(html);
                            }
                        });
                    });
                });
            </script>
            <?php } ?>
        <?php
    }
}