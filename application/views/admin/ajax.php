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

<?php elseif($uri1 == "backend" && $uri2 == "profile" && $uri3 == NULL): 
    $sejarah = $sekolah->sejarah;
    $visi = $sekolah->visi;
    $misi = $sekolah->misi;
    $tujuan = $sekolah->tujuan;
    $motto = $sekolah->motto;
    $kurikulum = $sekolah->kurikulum;    
?>
<script>
    // Sejarah 
    var QuillSejarah = new Quill('#editorSejarah', {
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
      placeholder: 'Tuliskan Sejarah . . .',
      theme: 'snow'
    });
    <?php if($sejarah != NULL): ?>
        QuillSejarah.clipboard.dangerouslyPasteHTML('<?= $sejarah ?>');
    <?php endif; ?>

    // Visi
    var QuillVisi = new Quill('#editorVisi', {
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
      placeholder: 'Tuliskan Visi . . .',
      theme: 'snow'
    });
    <?php if($visi != NULL): ?>
        QuillVisi.clipboard.dangerouslyPasteHTML('<?= $visi ?>');
    <?php endif; ?>

    // Misi
    var QuillMisi = new Quill('#editorMisi', {
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
      placeholder: 'Tuliskan Misi . . .',
      theme: 'snow'
    });
    <?php if($misi != NULL): ?>
        QuillMisi.clipboard.dangerouslyPasteHTML('<?= $misi ?>');
    <?php endif; ?>

    // Tujuan
    var QuillTujuan = new Quill('#editorTujuan', {
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
      placeholder: 'Tuliskan Tujuan . . .',
      theme: 'snow'
    });
    <?php if($tujuan != NULL): ?>
        QuillTujuan.clipboard.dangerouslyPasteHTML('<?= $tujuan ?>');
    <?php endif; ?>

    // Motto
    var QuillMotto = new Quill('#editorMotto', {
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
      placeholder: 'Tuliskan Motto . . .',
      theme: 'snow'
    });
    <?php if($motto != NULL): ?>
        QuillMotto.clipboard.dangerouslyPasteHTML('<?= $motto ?>');
    <?php endif; ?>
    
    // Kurikulum
    var QuillKurikulum = new Quill('#editorKurikulum', {
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
      placeholder: 'Tuliskan Kurikulum . . .',
      theme: 'snow'
    });
    <?php if($kurikulum != NULL): ?>
        QuillKurikulum.clipboard.dangerouslyPasteHTML('<?= $kurikulum ?>');
    <?php endif; ?>

    $("#simpan").submit(function() {
        $("#descSejarah").val(QuillSejarah.root.innerHTML);
        $("#descVisi").val(QuillVisi.root.innerHTML);
        $("#descMisi").val(QuillMisi.root.innerHTML);
        $("#descTujuan").val(QuillTujuan.root.innerHTML);
        $("#descMotto").val(QuillMotto.root.innerHTML);
        $("#descKurikulum").val(QuillKurikulum.root.innerHTML);
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

<?php elseif($uri1 == "backend" && $uri2 == "gallery" && $uri3 == "image" && $uri4 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('backend/gallery/list_background') ?>',
            type: 'POST',
            beforeSend: function(){
                $('.an_background').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.an_background').remove();
                $('.list_background').html(html);
            }
        });
        $.ajax({
            url: '<?= site_url('backend/gallery/list_slider') ?>',
            type: 'POST',
            beforeSend: function(){
                $('.an_slider').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.an_slider').remove();
                $('.list_slider').html(html);
            }
        });
    }); 
</script>

<?php elseif($uri1 == "backend" && $uri2 == "user" && $uri3 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('backend/user/table_list_user') ?>',
            type: 'POST',
            beforeSend: function(){
                $('.list_user').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_user').html(html);
            }
        });
    }); 
</script>

<?php elseif($uri1 == "backend" && $uri2 == "prestasi" && $uri3 == NULL): ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('backend/prestasi/table_list_prestasi') ?>',
            type: 'POST',
            beforeSend: function(){
                $('.list_prestasi').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
            },
            success: function(html){
                $('.list_prestasi').html(html);
            }
        });
    }); 
</script>

<?php endif; ?>