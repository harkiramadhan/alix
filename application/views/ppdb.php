<!--

=========================================================
* Argon Design System - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Penerimaan Peserta Didik Baru - Al Hikmah</title>
  <!-- Favicon -->
  <link href="<?= base_url('') ?>assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url('') ?>assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?= base_url('') ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?= base_url('') ?>assets/css/argon.css?v=1.1.0" rel="stylesheet">
</head>

<body>
    <header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
            <div class="container">
            <a class="navbar-brand mr-lg-5" href="./index.html">
                <img alt="image" src="<?= base_url('') ?>assets/LOGO_WHTLONG.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img alt="image" src="<?= base_url('') ?>assets/LOGO_WHTLONG.png">
                        </a>
                        </div>
                        <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                    <i class="fa fa-facebook-square"></i>
                    <span class="nav-link-inner--text d-lg-none">Facebook</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://www.instagram.com/sdit.alhikmah/" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                    <i class="fa fa-instagram"></i>
                    <span class="nav-link-inner--text d-lg-none">Instagram</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://www.youtube.com/channel/UCqOuYg6t0fi34z6nxBACQKw" target="_blank" data-toggle="tooltip" title="Subscribe us on Youtube">
                    <i class="fa fa-youtube"></i>
                    <span class="nav-link-inner--text d-lg-none">Youtube</span>
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="position-relative">
            <!-- Hero for FREE version -->
            <section class="section section-lg section-hero section-shaped">
                <!-- Background circles -->
                <div class="shape shape-style-1 bg-gradient-default">
                    <span class="span-150"></span>
                    <span class="span-50"></span>
                    <span class="span-50"></span>
                    <span class="span-75"></span>
                    <span class="span-100"></span>
                    <span class="span-75"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                </div>
                <div class="col-xl-12">
                <?php 
                    $data=$this->session->flashdata('sukses');
                    if($data!=""){?>
                    <div class="sticky-top col-md-12 alert">
                        <div class="alert alert-success" role="alert">
                            <span class="alert-inner--icon"><i class="ni ni-notification-70"></i></span>
                            <span class="alert-inner--text"><strong> &nbsp Sukses! </strong><?=$data;?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                    $data2=$this->session->flashdata('error');
                    if($data2!=""){?>
                    <div class="sticky-top col-md-12 alert">
                        <div class="alert alert-warning" role="alert">
                            <span class="alert-inner--icon"><i class="ni ni-notification-70"></i></span>
                            <span class="alert-inner--text"><strong> &nbsp Gagal! </strong><?=$data2;?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="container shape-container d-flex align-items-center py-lg mt-5 pt-5 mb-5 pb-5">
                    <div class="col px-0">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 text-center">
                            <img alt="image" src="<?= base_url('') ?>assets/img/LOGO.png" style="width: 100px;" class="img-fluid">
                            <p class="lead text-white">PPDB Online SDIT Al Hikmah Tahun Ajaran 2020/2021.</p>
                                <div class="btn-wrapper mt-5">
                                    <button data-toggle="modal" data-target="#login" class="btn btn-lg btn-white btn-icon mb-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="ni ni-spaceship"></i></span>
                                    <span class="btn-inner--text">Login</span>
                                    </button>
                                    <button data-toggle="modal" data-target="#register" class="btn btn-lg btn-success btn-icon mb-3 mb-sm-0" target="_blank">
                                    <span class="btn-inner--icon"><i class="ni ni-badge"></i></span>
                                    <span class="btn-inner--text">Registrasi</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SVG separator -->
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </section>
        </div>
    </main>
    <footer class="footer has-cards">
        <div class="container">
            <hr>
            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright">
                    &copy; 2019 <a href="https://alhikmahmp.sch.id" target="_blank">AL HIKMAH</a>.
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                        <i class="fa fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.instagram.com/sdit.alhikmah/" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                        <i class="fa fa-instagram"></i>
                        <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.youtube.com/channel/UCqOuYg6t0fi34z6nxBACQKw" target="_blank" data-toggle="tooltip" title="Subscribe us on Youtube">
                        <i class="fa fa-youtube"></i>
                        <span class="nav-link-inner--text d-lg-none">Youtube</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                <form role="form" action="<?= site_url('login/auth') ?>" method="POST">
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control" placeholder="Email" type="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Password" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="customCheckLogin" type="checkbox" name="show">
                        <label class="custom-control-label" for="customCheckLogin"><span>Show Password</span></label>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary my-4 ml-auto">Sign in</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Registrasi -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRASI PESERTA DIDIK BARU TAHUN PELAJARAN 2020/2021</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('ppdb/regis'); ?>
                <div class="modal-body bg-secondary">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK Anak <small class="text-warning">*) Dapat Dilihat Pada Kartu Keluarga</small></label>
                            <input type="number" name="nik" placeholder="Nomor Induk Kependudukan Anak" class="form-control form-control-alternative form-control-sm" required> 
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" class="form-control form-control-alternative form-control-sm" required> 
                        </div>
                        <div class="form-group">
                            <label for="">Nama Panggilan</label>
                            <input type="text" name="nama_panggil" placeholder="Nama Panggilan" class="form-control form-control-alternative form-control-sm" required> 
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenkel" id="" class="form-control" required>
                            <option value="" disabled selected>- Pilih Jenis Kelamin -</option>
                            <option value="L"> Laki Laki </option>
                            <option value="P"> Perempuan </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tl" placeholder="Tempat Lahir" class="form-control form-control-alternative form-control-sm" required> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control form-control-alternative form-control-sm" required> 
                        </div>
                        <div class="form-group">
                            <label for="">Kewarganegaraan</label>
                            <select name="kwn" id="" class="form-control" required>
                            <option value="" disabled selected>- Pilih Kewarganegaraan -</option>
                            <?php foreach($kewarganegaraan as $kw){ ?>
                                <option value="<?= $kw->id ?>"> <?= $kw->short." - ".$kw->kwn ?> </option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Email Aktif</label>
                            <input type="email" name="email" placeholder="Email Aktif" class="form-control form-control-alternative form-control-sm" required> 
                        </div>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <span class="alert-inner--text text-capitalize"><strong>Info!</strong> password login akan dikirimkan ke email anda, pastikan anda memasukkan email secara benar</span>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" >Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Registrasi</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Core -->
    <script src="<?= base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendor/popper/popper.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendor/headroom/headroom.min.js"></script>
    <!-- Optional JS -->
    <script src="<?= base_url('') ?>assets/vendor/onscreen/onscreen.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendor/nouislider/js/nouislider.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Argon JS -->
    <script src="<?= base_url('') ?>assets/js/argon.js?v=1.1.0"></script>

    <script>
        $(document).ready(function(){
            $("#password").prop("type", "password");
            $('#customCheckLogin').click(function(){
                if($(this).prop("checked") == true){
                    $("#password").prop("type", "text");
                }
                else if($(this).prop("checked") == false){
                    $("#password").prop("type", "password");
                }
            });
        }); 
    </script>
</body>
</html>
