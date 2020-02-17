<?php
    $uri1 = $this->uri->segment(1);
    $uri2 = $this->uri->segment(2);
    $uri3 = $this->uri->segment(3);
    $uri4 = $this->uri->segment(4);
    $loader = base_url('assets/home/loader.gif');
?>

<?php if($uri1 == "backend" && $uri2 == "berita" && $uri3 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('backend/berita/table_list_berita') ?>',
            beforeSend: function(){
                $('#list_berita').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('#list_berita').html(html);
            }
        });
    });    
</script>

<?php elseif($uri1 == "backend" && $uri2 == "berita" && $uri3 == "tambah"): ?>
<script>
    var quill = new Quill('#editorBerita', {
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
    $("#tambah_berita").submit(function() {
        $("#desc_berita").val(quill.root.innerHTML);
    });
</script>

<?php elseif($uri1 == "backend" && $uri2 == "berita" && $uri3 == "detail" && $uri4 != NULL): ?>
<script>
    var quill2 = new Quill('#editorBerita', {
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
      quill2.clipboard.dangerouslyPasteHTML('<?= $berita->konten ?>');
    <?php endif; ?>
    $("#tambah_berita").submit(function() {
        $("#desc_berita").val(quill2.root.innerHTML);
    });
</script>

<?php elseif($uri1 == "backend" && $uri2 == "gallery" && $uri3 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('backend/gallery/table_list_gallery') ?>',
            beforeSend: function(){
                $('#list_gallery').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('#list_gallery').html(html);
            }
        });
    }); 
</script>

<?php elseif($uri1 == "backend" && $uri2 == "gallery" && $uri3 == "detail" && $uri4 != NULL): ?>
<script>
    $(document).ready(function(){
        var idgallery = '<?= $uri4 ?>';
        $.ajax({
            url: '<?= site_url('backend/gallery/list_gambar_gallery/') ?>' + idgallery,
            type: 'POST',
            beforeSend: function(){
                $('.list_gallery').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_gallery').html(html);
            }
        });
    }); 
</script>

<?php endif; ?>