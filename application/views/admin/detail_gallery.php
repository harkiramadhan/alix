<!-- Header -->
<div class="header bg-gradient-warning pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 mt-5 mb-xl-0 mb-4 order-xl-2">
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <img id="image-preview" alt="image preview" src="<?= base_url('./assets/home/img/content/' . $gallery->img) ?>">
                    </div>
                </div>
            </div>
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col">
                        <div class="mt-5">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1 mt-5">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0"><?= $gallery->judul ?></h3>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tambah">Tambah Foto</button>
                    </div>
                </div>
            </div>
        </div>   
        <div class="row list_gallery">
            
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= site_url('backend/gallery/action') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="jenis" value="tambah_gallery">
                    <input type="hidden" name="id_gallery" value="<?= $gallery->id ?>">
                    <div class="modal-body bg-secondary">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Upload Gambar Untuk Gallery - <?= $gallery->judul ?></label>
                                    <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source2" onchange="previewImage2();" accept=".png, .jpg, .jpeg" required >
                                    <label for="imageUpload2" class="m-0"></label>
                                    <img id="image-preview2" class="rounded d-none" alt="image preview2" style="width:100%;"/>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>