<?php
class User extends CI_Controller{
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
        $data['title'] = "User - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/user');
        $this->load->view('admin/footer');
    }

    function action(){
        $jenis = $this->input->post('jenis', TRUE);
        $iduser = $this->input->post('iduser', TRUE);
        if($jenis == "tambah"){
            $data = [
                'email' => $this->input->post('email', TRUE),
                'role' => $this->input->post('role', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'status' => $this->input->post('status', TRUE)
            ];
            $this->db->insert('admin', $data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "User Berhasil Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "edit"){
            $password = $this->input->post('password', TRUE);
            if($password == TRUE){
                $data = [
                    'email' => $this->input->post('email', TRUE),
                    'role' => $this->input->post('role', TRUE),
                    'password' => md5($this->input->post('password', TRUE)),
                    'status' => $this->input->post('status', TRUE)
                ];
            }else{
                $data = [
                    'email' => $this->input->post('email', TRUE),
                    'role' => $this->input->post('role', TRUE),
                    'status' => $this->input->post('status', TRUE)
                ];
            }
            
            $this->db->where('id', $iduser);
            $this->db->update('admin', $data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "User Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "delete"){

        }
    }

    function modal(){
        $jenis = $this->input->post('type', TRUE);
        $iduser = $this->input->post('iduser', TRUE);
        $getUser = $this->M_Admin->get_byId($iduser);
        if($getUser->num_rows() > 0){
            $user = $getUser->row();
            if($jenis == "edit"){
                ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail User - <?= $user->email ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= site_url('backend/user/action') ?>" method="POST">
                        <input type="hidden" name="jenis" value="edit">
                        <input type="hidden" name="iduser" value="<?= $user->id ?>">
                        <div class="modal-body bg-secondary">
                            <div class="form-group">
                                <label for="">Username / Email <small class="text-warning">*</small></label>
                                <input type="text" class="form-control form-control-alternative form-control-sm" name="email" placeholder="Username / Email" value="<?= $user->email ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Role <small class="text-warning">*</small></label>
                                <select name="role"  class="form-control form-control-sm form-control-alternative" required>
                                    <option value="">- Pilih Role -</option>
                                    <option value="1"  <?php if($user->role == "1"){echo "selected";} ?>>Admin Website</option>
                                    <option value="2"  <?php if($user->role == "2"){echo "selected";} ?>>Admin PPDB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status <small class="text-warning">*</small></label>
                                <select name="status"  class="form-control form-control-sm form-control-alternative" required>
                                    <option value="">- Pilih Status -</option>
                                    <option value="active" <?php if($user->status == "active"){echo "selected";} ?>>Active</option>
                                    <option value="-" <?php if($user->status == "-"){echo "selected";} ?>>Non Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Password <small class="text-warning">*</small></label>
                                <input type="password" id="pas" name="password"  class="form-control form-control-alternative form-control-sm">
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">Lihat Password</span>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
                <?php
            }elseif($jenis == "delete"){
    
            }
        }
    }

    // // // AJAX // // //
    function table_list_user(){
        $user = $this->M_Admin->get_AllUser()->result();
        $no = 1;
        foreach($user as $row){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->email ?></td>
                <td>
                    <?php if($row->role == 1){
                        echo "Admin Website";
                    }elseif($row->role == 2){
                        echo "Admin PPDB";
                    } 
                    ?>
                </td>
                <td><?= $row->status ?></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-primary edit_<?= $row->id ?>" id="<?= $row->id ?>">Edit</button>
                        <button class="btn btn-sm btn-danger  ml-1 hapus_<?= $row->id ?>" id="<?= $row->id ?>">Hapus</button>
                    </div>
                </td>
            </tr>
            <script>
                <?php 
                    $loader = base_url('assets/home/loader.gif');
                ?>
                $(document).ready(function(){
                    $(".edit_<?= $row->id ?>").click(function(){
                        var iduser = this.id;
                        var type = 'edit';
                        $.ajax({
                            url: '<?= site_url('backend/user/modal') ?>',
                            type: 'post',
                            data: {iduser : iduser, type : type},
                            beforeSend: function(){
                                $('#modalEdit').modal('show');
                                $('.isi').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isi').html(html);
                            }
                        });
                    });
                    $(".hapus_<?= $row->id ?>").click(function(){
                        var iduser = this.id;
                        var type = 'delete';
                        $.ajax({
                            url: '<?= site_url('backend/user/modal') ?>',
                            type: 'post',
                            data: {iduser : iduser, type : type},
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
        <?php
        }
    }
}