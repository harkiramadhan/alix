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
        <div class="col-xl-12 mt-5">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Background</h3>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tambahBackground">Tambah Background</button>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="row list_background">

            </div>
        </div>
        <div class="col-xl-12 mt-3">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Slider</h3>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tambahSlider">Tambah Slider</button>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="row list_slider">
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahBackground" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('backend/gallery/action') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="tambah_gambar">
                <input type="hidden" name="gm" value="bg">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control form-control-sm form-control-alternative">
                                    <option value="">- Pilih Status -</option>
                                    <option value="active">Active</option>
                                    <option value="-">Non Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Gambar Untuk Background</label>
                                <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source" onchange="previewImage();" accept=".png, .jpg, .jpeg" required >
                                <label for="imageUpload" class="m-0"></label>
                                <img id="image-preview" class="rounded d-none" alt="image preview" style="width:100%;"/>   
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

    <div class="modal fade" id="tambahSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('backend/gallery/action') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="tambah_gambar">
                <input type="hidden" name="gm" value="slider">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control form-control-sm form-control-alternative">
                                    <option value="">- Pilih Status -</option>
                                    <option value="active">Active</option>
                                    <option value="-">Non Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Gambar Untuk Slider</label>
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
        
