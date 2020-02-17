<!-- Header -->
<div class="header bg-gradient-warning pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--3">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-secondary shadow">
                <div class="card-header">
                    <h2>Tambah Berita</h2>
                </div>
                <form action="<?= site_url('backend/berita/action') ?>" method="post" enctype="multipart/form-data" id="tambah_berita">
                <input type="hidden" name="jenis" value="tambah"> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Judul Berita <small class="text-warning">*</small></label>
                                <input type="text" name="judul" id="" class="form-control form-control-alternative form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status Berita <small class="text-warning">*</small></label>
                                <select name="status" id="" class="form-control form-control-alternative form-control-sm" required>
                                    <option value="" selected disabled>- Pilih Status Berita -</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <label for="">Label Berita <small class="text-warning">*</small></label>
                            <div class="col-md-12 m-1">
                                 <?php 
                                $noo=1;
                                foreach($label->result() as $l){ ?>
                                <div class="custom-control custom-control-inline custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck<?= $noo ?>" type="checkbox" value="<?= $l->id ?>" name="idl[]">
                                    <label class="custom-control-label" for="customCheck<?= $noo ?>"><span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span></label>
                                </div>
                                <?php 
                                $noo++;
                                } ?>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <label for="">Upload Gambar <small class="text-warning">*</small></label>
                            <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source" onchange="previewImage();" accept=".png, .jpg, .jpeg" required >
                            <label for="imageUpload" class="m-0"></label>
                            <img id="image-preview" class="rounded d-none" alt="image preview" style="width:100%;"/>   
                        </div>
                        <div class="col-xl-12 mt-2">
                            <label for="">Konten Berita <small class="text-warning">*</small></label>
                            <div id="editorBerita" style="height: auto;"></div>
                            <textarea name="konten" style="display:none" id="desc_berita"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit"  class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>