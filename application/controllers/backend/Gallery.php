<?php
class Gallery extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Gallery');
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
        $data['title'] = "Gallery - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/gallery');
        $this->load->view('admin/footer');
    }

    function image(){
        $data['title'] = "Image - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/image');
        $this->load->view('admin/footer');
    }

    function detail($idgallery){
        $data['title'] = "Detail Gallery - Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['gallery'] = $this->M_Gallery->get_byId($idgallery)->row();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/detail_gallery');
        $this->load->view('admin/footer');
    }

    function action(){
        $jenis = $this->input->post('jenis', TRUE);
        $idgallery = $this->input->post('idgallery', TRUE);
        $idgambar = $this->input->post('idgambar', TRUE);
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
                $config['width']            = 1000;
                $config['quality']          = '80%';  
                $config['new_image']        = './assets/home/img/content/'.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->insert('gallery', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Berita Berhasil Di Tambahkan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "Berita Gagal Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "delete"){
            $idgallery = $this->input->post('idgallery', TRUE);
            $getDetail = $this->M_Gallery->get_detailById($idgallery);
            $get = $this->M_Gallery->get_byId($idgallery);
            if($getDetail->num_rows() > 0){
                foreach($getDetail->result() as $d){
                    unlink("./assets/home/img/content/".$d->img);
                    $this->db->where('id', $d->id);
                    $this->db->delete('gallery_detail');
                }
            }

            if($get->num_rows() > 0){
                $gal = $get->row();
                unlink("./assets/home/img/content/".$gal->img);
                $this->db->where('id', $gal->id);
                $this->db->delete('gallery');
            }

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Berita Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "tambah_gallery"){
            $idgallery = $this->input->post('id_gallery', TRUE);
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
                $config['width']            = 1000;
                $config['quality']          = '80%';  
                $config['new_image']        = './assets/home/img/content/'.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                $data = [
                    'id_gallery' => $idgallery,
                    'img' => $img["file_name"]
                ];

                $this->db->insert('gallery_detail', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Gambar Berhasil Di Tambahkan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "Gambar Gagal Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "update"){
            $config['upload_path']      = './assets/home/img/content';  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;
            $this->load->library('upload', $config);  
            if($this->upload->do_upload('img')){   

                $cek = $this->M_Gallery->get_byId($idgallery);
                if($cek->num_rows() > 0){
                    $gambar = $cek->row();
                    unlink("./assets/home/img/content/".$gambar->img);
                }

                $img = $this->upload->data();  
                $config['image_library']    = 'gd2';  
                $config['source_image']     = './assets/home/img/content/'.$img["file_name"];  
                $config['create_thumb']     = FALSE;  
                $config['maintain_ratio']   = TRUE;  
                $config['quality']          = '80%'; 
                $config['new_image']        = './assets/home/img/content/'.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->where('id', $idgallery);
                $this->db->update('gallery', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Berita Berhasil Di Edit");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE)
                ];

                $this->db->where('id', $idgallery);
                $this->db->update('gallery', $data);

                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Berita Berhasil Di Edit");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }elseif($jenis == "tambah_gambar"){
            $gm = $this->input->post('gm', TRUE);
            if($gm == "bg"){
                $path = "./assets/home/img/bg/";
            }elseif($gm == "slider"){
                $path = "./assets/home/img/slide/";
            }
            $config['upload_path']      = $path;  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;
            $this->load->library('upload', $config);  
            if($this->upload->do_upload('img')){   
                $img = $this->upload->data();  
                $config['image_library']    = 'gd2';  
                $config['source_image']     = $path.$img["file_name"];  
                $config['create_thumb']     = FALSE;  
                $config['maintain_ratio']   = TRUE;  
                $config['width']            = 1000;
                $config['quality']          = '80%';  
                $config['new_image']        = $path.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                $data = [
                    'jenis' => $gm,
                    'status' => $this->input->post('status'),
                    'img' => $img["file_name"]
                ];

                $this->db->insert('gambar', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Gambar Berhasil Di Tambahkan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "Gambar Gagal Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function modal(){
        $jenis = $this->input->post('type', TRUE);
        $idgallery = $this->input->post('idgallery', TRUE);
        $get = $this->M_Gallery->get_byId($idgallery);
        if($jenis == "show"){
            $gallery = $get->row();
            ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Gallery <strong><?= $gallery->judul ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= site_url('backend/gallery/action') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idgallery" value="<?= $gallery->id ?>">
                    <input type="hidden" name="jenis" value="update">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Judul Gallery</label>
                                    <input type="text" name="judul" id="" class="form-control form-control-alternative form-control-sm" value="<?= $gallery->judul ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status Gallery</label>
                                    <select name="status" id="" class="form-control form-control-alternative form-control-sm">
                                        <option value="">- Pilih Status -</option>
                                        <option value="published" <?php if($gallery->status == "published"){echo "selected";} ?>>Published</option>
                                        <option value="draft" <?php if($gallery->status == "draft"){echo "selected";} ?>>Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Thumbnails</label>
                                    <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source2" onchange="previewImage2();" accept=".png, .jpg, .jpeg" >
                                    <label for="imageUpload2" class="m-0"></label>
                                    <?php if($gallery->img == TRUE): ?>
                                    <img id="image-preview2" class="rounded" alt="image preview2" style="width:100%;" src="<?= base_url('./assets/home/img/content/' . $gallery->img) ?>" />  
                                    <?php else: ?>
                                    <img id="image-preview2" class="rounded d-none" alt="image preview2" style="width:100%;"/>  
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pb-0 mb-0">
                                    <label class="pb-0 mb-0" for="">Foto Gallery <b><?= $gallery->judul ?></b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row list_gallery mt-0 pt-0">
                            <?php $this->list_gambar_gallery($idgallery) ?>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            <?php
        }elseif($jenis == "delete"){
            if($get->num_rows() > 0){
                $gallery = $get->row();
                ?>
                    <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">Hapus Gallery <?= $gallery->judul ?></h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="py-3 text-center">
                                <i class="ni ni-bell-55 ni-3x"></i>
                                <h4 class="heading mt-4">Apakah Anda Yakin Menghapus Semua Foto Gallery</h4>
                                <p><?= $gallery->judul ?></p>
                            </div>
                        </div>
                        <form action="<?= site_url('backend/gallery/action') ?>" method="post">
                        <input type="hidden" name="idgallery" value="<?= $idgallery ?>">
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

    function update(){
        $jenis = $this->input->post('jenis', TRUE);
        $idgambar = $this->input->post('idgambar', TRUE);
        $gambar = $this->input->post('gambar', TRUE);

        if($gambar == "Background"){
            $path = "./assets/home/img/bg/";
        }elseif($gambar == "Slider"){
            $path = "./assets/home/img/slide/";
        }

        if($jenis == "disactive"){
            $data = [
                'status' => "-"
            ];
            $this->db->where('id', $idgambar);
            $this->db->update('gambar', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Gambar ".$gambar." Berhasil Di Non Aktifkan");
                redirect('backend/gallery/image', 'refresh');
            }
        }elseif($jenis == "active"){
            $data = [
                'status' => "active"
            ];
            $this->db->where('id', $idgambar);
            $this->db->update('gambar', $data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Gambar ".$gambar." Berhasil Di Aktifkan");
                redirect('backend/gallery/image', 'refresh');
            }
        }elseif($jenis == "delete"){
            $cek = $this->db->get_where('gambar', ['id'=>$idgambar]);
            if($cek->num_rows() > 0){
                $cekGambar = $cek->row();
                unlink($path.$cekGambar->img);
                $this->db->where('id', $idgambar);
                $this->db->delete('gambar');
            }

            $this->session->set_flashdata('sukses', "Gambar ".$gambar." Berhasil Di Hapus");
            redirect('backend/gallery/image', 'refresh');
        }
    }

    // // // AJAX // // //
    function table_list_gallery(){
        $gallery = $this->M_Gallery->get_All()->result();
        ?>
            <?php 
            $no = 1;
            foreach($gallery as $row){ 
                $getDetail = $this->M_Gallery->get_detailById($row->id);
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->judul ?></td>
                    <td class="text-center">
                        <?php if($getDetail->num_rows() > 0){
                            echo $getDetail->num_rows()." Foto";
                        }else{
                            echo " - ";
                        } 
                        ?>
                    </td>
                    <td><?= $row->status ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary lihat_<?= $row->id ?>" id="<?= $row->id ?>">Edit</button>
                            <a href="<?= site_url('backend/gallery/detail/'.$row->id) ?>" class="btn btn-sm btn-default ml-1">Lihat</a>
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
                        var idgallery = this.id;
                        var type = 'show';
                        $.ajax({
                            url: '<?= site_url('backend/gallery/modal') ?>',
                            type: 'post',
                            data: {idgallery : idgallery, type : type},
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
                        var idgallery = this.id;
                        var type = 'delete';
                        $.ajax({
                            url: '<?= site_url('backend/gallery/modal') ?>',
                            type: 'post',
                            data: {idgallery : idgallery, type : type},
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

    function list_gambar_gallery($idgallery){
        $detailGallery = $this->M_Gallery->get_detailById($idgallery);
        if($detailGallery->num_rows() > 0){
        foreach($detailGallery->result() as $dg){
        ?>
            <div class="col-md-4 mt-3">
                <img id="image-preview" class="rounded" style="height: 100%; width: 100%" alt="image preview" src="<?= base_url('./assets/home/img/content/' . $dg->img) ?>">
            </div>
        <?php
        }}
    }

    function list_background(){
        $background = $this->M_Gallery->get_background();
        if($background->num_rows() > 0){
            foreach($background->result() as $row){
                ?>
                    <div class="col-xl-3 mt-5">
                        <img id="<?= $row->id ?>" class="rounded" style="height: 100%; width: 100%;" alt="image preview" src="<?= base_url('./assets/home/img/bg/' . $row->img) ?>">
                        <div class="row mt-2">
                            <div class="col-6 text-left">
                                <?php if($row->status == "active"): ?>
                                    <button class="btn btn-sm btn-success btn-block" disabled>Active</button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-warning btn-block" disabled>Non Active</button>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 text-right">
                                <?php if($row->status == "active"): ?>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-danger ml-3 disactive_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Set Non Active"><i class="fas fa-times"></i></button>
                                    <button class="btn btn-sm btn-warning ml-1 delete_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></button>
                                </div>
                                <?php else: ?>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success ml-3 active_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Set Active"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-sm btn-warning ml-1 delete_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <script>
                                $('.disactive_<?= $row->id ?>').click(function(){
                                    var idgambar = this.id;
                                    var jenis = "disactive";
                                    var gambar = "Background";
                                    $.ajax({
                                        url: '<?= site_url('backend/gallery/update') ?>',
                                        type: 'post',
                                        data: {idgambar : idgambar, jenis : jenis, gambar : gambar},
                                        success: function(){
                                            location.reload();
                                        }
                                    });
                                });
                                $('.active_<?= $row->id ?>').click(function(){
                                    var idgambar = this.id;
                                    var jenis = "active";
                                    var gambar = "Background";
                                    $.ajax({
                                        url: '<?= site_url('backend/gallery/update') ?>',
                                        type: 'post',
                                        data: {idgambar : idgambar, jenis : jenis, gambar : gambar},
                                        success: function(){
                                            location.reload();
                                        }
                                    });
                                });
                                $('.delete_<?= $row->id ?>').click(function(){
                                    var idgambar = this.id;
                                    var jenis = "delete";
                                    var gambar = "Background";
                                    $.ajax({
                                        url: '<?= site_url('backend/gallery/update') ?>',
                                        type: 'post',
                                        data: {idgambar : idgambar, jenis : jenis, gambar : gambar},
                                        success: function(){
                                            location.reload();
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                <?php
            }
        }
    }

    function list_slider(){
        $slider = $this->M_Gallery->get_slider();
        if($slider->num_rows() > 0){
            foreach($slider->result() as $row){
                $idgambar = $row->id;
                ?>
                    <div class="col-xl-3 mt-5">
                        <img id="<?= $row->id ?>" class="rounded" style="height: 100%; width: 100%" alt="image preview" src="<?= base_url('./assets/home/img/slide/' . $row->img) ?>">
                        <div class="row mt-2">
                            <div class="col-6 text-left">
                                <?php if($row->status == "active"): ?>
                                    <button class="btn btn-sm btn-block btn-success" disabled>Active</button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-block btn-warning" disabled>Non Active</button>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 text-right">
                                <?php if($row->status == "active"): ?>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-danger ml-3 disactive_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Set Non Active"><i class="fas fa-times"></i></button>
                                    <button class="btn btn-sm btn-warning ml-1 delete_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></button>
                                </div>
                                <?php else: ?>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success ml-3 active_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Set Active"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-sm btn-warning ml-1 delete_<?= $row->id ?>" id="<?= $row->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <script>
                                $('.disactive_<?= $row->id ?>').click(function(){
                                    var idgambar = this.id;
                                    var jenis = "disactive";
                                    var gambar = "Slider";
                                    $.ajax({
                                        url: '<?= site_url('backend/gallery/update') ?>',
                                        type: 'post',
                                        data: {idgambar : idgambar, jenis : jenis, gambar : gambar},
                                        success: function(){
                                            location.reload();
                                        }
                                    });
                                });
                                $('.active_<?= $row->id ?>').click(function(){
                                    var idgambar = this.id;
                                    var jenis = "active";
                                    var gambar = "Slider";
                                    $.ajax({
                                        url: '<?= site_url('backend/gallery/update') ?>',
                                        type: 'post',
                                        data: {idgambar : idgambar, jenis : jenis, gambar : gambar},
                                        success: function(){
                                            location.reload();
                                        }
                                    });
                                });
                                $('.delete_<?= $row->id ?>').click(function(){
                                    var idgambar = this.id;
                                    var jenis = "delete";
                                    var gambar = "Slider";
                                    $.ajax({
                                        url: '<?= site_url('backend/gallery/update') ?>',
                                        type: 'post',
                                        data: {idgambar : idgambar, jenis : jenis, gambar : gambar},
                                        success: function(){
                                            location.reload();
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                <?php
            }
        }
    }
}