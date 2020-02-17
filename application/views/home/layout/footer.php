    <footer class="footer" data-background-color="black">
     <div class="container">
       <nav class="float-left">
         <ul>
           <li>
             <a href="<?= sosmed("instagram") ?>">
               <h4><b><i class="fa fa-instagram"></i></b></h4>
             </a>
           </li>
           <li>
             <a href="<?= sosmed("youtube") ?>">
               <h4><b><i class="fa fa-youtube"></i></b></h4>
             </a>
           </li>
           <li>
             <a href="<?= sosmed("facebook") ?>">
               <h4><b><i class="fa fa-facebook"></i></b></h4>
             </a>
           </li>
         </ul>
       </nav>
       <div class="copyright float-right">
         &copy;
         <script>
           document.write(new Date().getFullYear())
         </script>,&nbsp; <strong><b>AL - HIKMAH</b></strong>
       </div>
     </div>
   </footer>
   <!--   Core JS Files   -->
   <script src="<?= base_url('') ?>/assets/home/js/core/jquery.min.js" type="text/javascript"></script>
   <script src="<?= base_url('') ?>/assets/home/js/core/popper.min.js" type="text/javascript"></script>
   <script src="<?= base_url('') ?>/assets/home/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
   <script src="<?= base_url('') ?>/assets/home/js/plugins/moment.min.js"></script>
   <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
   <script src="<?= base_url('') ?>/assets/home/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
   <script src="<?= base_url('') ?>/assets/home/js/plugins/nouislider.min.js" type="text/javascript"></script>
   <!--  Google Maps Plugin    -->
   <script src="<?= base_url('') ?>/assets/home/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
   <script src="<?= base_url('') ?>/assets/home/js/style.js"></script>
   <script>
     $(document).ready(function() {
       //init DateTimePickers
       materialKit.initFormExtendedDatetimepickers();
       // Sliders Init
       materialKit.initSliders();
     });
   </script>
   <?php $this->load->view('home/ajax') ?>
 </body>
 
 </html>