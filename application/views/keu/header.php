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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Al Hikmah - PPDB Online.">
    <meta name="author" content="Al Hikmah">
    <title><?= $title ?></title>
    <!-- Favicon -->
    <link href="<?= base_url('') ?>assets/inner/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
    <!-- Icons -->
    <link href="<?= base_url('') ?>assets/inner/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <!-- <link href="<?= base_url('') ?>assets/inner/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="<?= base_url('') ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>assets/inner/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="<?= base_url('') ?>assets/inner/css/argon.css?v=1.1.0" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/inner/vendor/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/inner/vendor/datatables/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/inner/vendor/datatables/css/select.bootstrap4.min.css">
</head>

<body>
    <!-- Sidenav -->
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                       
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mb-0 text-sm text-dark font-weight-bold"><?= $email ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome! <?= $email ?></h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('login/logout') ?>" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="<?= site_url(''); ?>">
                                PPDB Online
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(1) == "dashboard"){echo "active";} ?>" href="<?= site_url('dashboard') ?>">
                            <i class="ni ni-tv-2 text-default"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(1) == "csiswa"){echo "active";} ?>" href="<?= site_url('csiswa') ?>">
                            <i class="ni ni-circle-08 text-default"></i> Pendaftaran
                        </a>
                    </li>
                </ul>
                <hr class="my-2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login/logout')?>">
                            <i class="ni ni-spaceship text-default"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
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
                    <span class="alert-inner--text"><strong> &nbsp Error! </strong><?=$data2;?></span>
                </div>
            </div>
            <?php } ?>
            <div class="container-fluid">
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?= $email ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome! <?= $email ?></h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('login/logout') ?>" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>