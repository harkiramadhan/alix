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

<?php endif; ?>