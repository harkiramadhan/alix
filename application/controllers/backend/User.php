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
            $data = [
                'email' => $this->input->post('email', TRUE),
                'role' => $this->input->post('role', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'status' => $this->input->post('status', TRUE)
            ];
            $this->db->where('id', $iduser);
            $this->db->update('admin', $data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "User Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "delete"){

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
                        <button class="btn btn-sm btn-primary edit_<?= $row->id ?>">Edit</button>
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
                                $('#modalLihat').modal('show');
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