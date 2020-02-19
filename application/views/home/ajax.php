<?php
    $uri1 = $this->uri->segment(1);
    $uri2 = $this->uri->segment(2);
    $uri3 = $this->uri->segment(3);
    $loader = base_url('assets/home/loader.gif');

    if($uri1 == ""):
?>

<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('home/get_berita') ?>',
            beforeSend: function(){
                $('#listBerita').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('#listBerita').html(html);
            }
        });
        $.ajax({
            url: '<?= site_url('home/get_beritaTerbaru') ?>',
            beforeSend: function(){
                $('#beritaTerbaru').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('#beritaTerbaru').html(html);
            }
        });
        $.ajax({
            url: '<?= site_url('home/get_gallery') ?>',
            beforeSend: function(){
                $('#listGallery').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('#listGallery').html(html);
            }
        });
    });
</script>

<?php elseif($uri1 == "berita" && $uri2 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('berita/list_berita') ?>',
            beforeSend: function(){
                $('.list_berita').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_berita').html(html);
            }
        });
    });
</script>

<?php elseif($uri1 == "gallery" && $uri2 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('gallery/list_gallery') ?>',
            beforeSend: function(){
                $('.list_gallery').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_gallery').html(html);
            }
        });
    });
</script>

<?php elseif($uri1 == "prestasi" && $uri2 == NULL): ?>
    <script>
    $(document).ready(function(){
        var jenis = 'all';
        $.ajax({
            url: '<?= site_url('prestasi/list') ?>',
            type: 'post',
            data: {jenis : jenis},
            beforeSend: function(){
                $('.list_all').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_all').html(html);
            }
        });

        var jenis = 'Akademik';
        $.ajax({
            url: '<?= site_url('prestasi/list') ?>',
            type: 'post',
            data: {jenis : jenis},
            beforeSend: function(){
                $('.list_akademik').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_akademik').html(html);
            }
        });

        var jenis = 'Non';
        $.ajax({
            url: '<?= site_url('prestasi/list') ?>',
            type: 'post',
            data: {jenis : jenis},
            beforeSend: function(){
                $('.list_non').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_non').html(html);
            }
        });
    });
</script>

<?php endif; ?>