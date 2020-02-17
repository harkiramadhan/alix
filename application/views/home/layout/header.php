<!--
 =========================================================
 * Material Kit - v2.0.6
 =========================================================
 * Product Page: https://www.creative-tim.com/product/material-kit
 * Copyright 2019 Creative Tim (http://www.creative-tim.com)
   Licensed under MIT (https://github.com/creativetimofficial/material-kit/blob/master/LICENSE.md)
 =========================================================
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->


 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('') ?>/assets/home/img/apple-icon.png">
   <link rel="icon" type="image/png" href="<?= base_url('') ?>/assets/home/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     AL HIKMAH
   </title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!-- CSS Files -->
   <link href="<?= base_url('') ?>/assets/home/css/material-kit.css?v=2.0.6" rel="stylesheet" />
   <!-- CSS Just for demo purpose, don't include it in your project -->
   <link href="<?= base_url('') ?>/assets/home/demo/demo.css" rel="stylesheet" />
 </head>
 
 <?php 
 $uri = $this->uri->segment(1);
 if($uri == "home" || $uri == ""){
     $p = "index-page";
 }elseif($uri == "profile" || $uri == "gallery"){
     $p = "profile-page";
 } ?>
 <body class="<?= $p ?> sidebar-collapse">
   <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
       <div class="container">
           <div class="navbar-translate">
           <a class="navbar-brand" href="" id="navbar-brand-2">
               <img src="<?= base_url('') ?>/assets/home/img/LOGO_WHTLONG.png" alt="" height="25px">  
           </a>
           <a class="navbar-brand" href="" id="navbar-brand">
               <img src="<?= base_url('') ?>/assets/home/img/LOGO_BLKLONG.png" alt="" height="25px">  
           </a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="sr-only">Toggle navigation</span>
               <span class="navbar-toggler-icon"></span>
               <span class="navbar-toggler-icon"></span>
               <span class="navbar-toggler-icon"></span>
           </button>
           </div>
           <div class="collapse navbar-collapse">
           <ul class="navbar-nav ml-auto">
               <li class="nav-item <?php if($uri == "" || $uri == "home"){echo "active";} ?>">
                   <a class="nav-link" href="<?= site_url('') ?>">
                       <i class="material-icons">home</i> Beranda
                   </a>
               </li>
               <li class="nav-item <?php if($uri == "profile"){echo "active";} ?>">
                   <a class="nav-link" href="<?= site_url('profile') ?>">
                       <i class="material-icons">account_balance</i> Profil
                   </a>
               </li>
               <li class="nav-item">
               <a class="nav-link <?php if($uri == "gallery"){echo "active";} ?>" href="<?= site_url('gallery') ?>">
                   <i class="material-icons">insert_photo</i> Gallery
               </a>
               </li>
               <li class="nav-item">
               <a class="nav-link <?php if($uri == "kontak"){echo "active";} ?>" href="<?= site_url('kontak') ?>">
                   <i class="material-icons">speaker_notes</i> Kontak
               </a>
               </li>
               <li class="nav-item">
               <a class="btn btn-info btn-raised btn-round" href="<?= site_url('ppdb') ?>">
                   PPDB Online
               </a>
               </li>
           </ul>
           </div>
       </div>
   </nav>