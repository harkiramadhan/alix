<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Informasi Penting !</h5> 
                </div>
                <div class="card-body"> 
                    <div class="text-center">
                        <h3 class="text-warning">*) Maksimal Ukuran File Yang Di Upload Adalah 8 Mb.</h3>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mt-sm-3">
            <div class="card shadow">
                <div class="card-header bg-secondary">
                    <h3 class="m-0">Foto Calon Siswa</h3>
                </div>
                <form action="<?= site_url('document/simpan') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="anak">
                <div class="card-body">
                    <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source" onchange="previewImage();" accept=".png, .jpg, .jpeg" >
                    <label for="imageUpload" class="m-0"></label>
                    <?php if($cek_foto->num_rows() > 0):
                        $foto = $cek_foto->row();    
                    ?>
                    <img id="image-preview" class="rounded" src="<?= base_url('upload/img/'.$foto->img) ?>" alt="image preview" style="width:100%;"/> 
                    <?php else: ?>
                    <img id="image-preview" class="rounded d-none" alt="image preview" style="width:100%;"/>    
                    <?php endif; ?>
                </div>
                <div class="card-footer bg-secondary">
                    <button type="submit" class="btn btn-sm btn-success btn-block">Simpan</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 mt-sm-3">
            <div class="card shadow">
                <div class="card-header bg-secondary">
                    <h3 class="m-0">Scan Ktp Kedua Orang Tua</h3>
                </div>
                <form action="<?= site_url('document/simpan') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="ktp">
                <div class="card-body">
                    <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source2" onchange="previewImage2();" accept=".png, .jpg, .jpeg" >
                    <label for="imageUpload" class="m-0"></label>
                    <?php if($cek_ktp->num_rows() > 0):
                        $ktp = $cek_ktp->row();
                    ?>
                    <img id="image-preview2" class="rounded" src="<?= base_url('upload/img/'.$ktp->img) ?>" alt="image preview" style="width:100%;"/>
                    <?php else: ?>
                    <img id="image-preview2" class="rounded d-none" alt="image preview" style="width:100%;"/>    
                    <?php endif; ?>
                </div>
                <div class="card-footer bg-secondary">
                    <button type="submit" class="btn btn-sm btn-success btn-block">Simpan</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 mt-sm-3 mt-xl-4">
            <div class="card shadow">
                <div class="card-header bg-secondary">
                    <h3 class="m-0">Scan Kartu Keluarga</h3>
                </div>
                <form action="<?= site_url('document/simpan') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="kk">
                <div class="card-body">
                    <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source3" onchange="previewImage3();" accept=".png, .jpg, .jpeg" >
                    <label for="imageUpload" class="m-0"></label>
                    <?php if($cek_kk->num_rows()>0):
                        $kk = $cek_kk->row();
                    ?>
                     <img id="image-preview3" class="rounded" src="<?= base_url('upload/img/'.$kk->img) ?>" alt="image preview" style="width:100%;"/> 
                    <?php else: ?>   
                    <img id="image-preview3" class="rounded d-none" alt="image preview" style="width:100%;"/>    
                    <?php endif; ?>
                </div>
                <div class="card-footer bg-secondary">
                    <button type="submit" class="btn btn-sm btn-success btn-block">Simpan</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 mt-sm-3 mt-xl-4">
            <div class="card shadow">
                <div class="card-header bg-secondary">
                    <h3 class="m-0">Scan Akta Kelahiran Anak</h3>
                </div>
                <form action="<?= site_url('document/simpan') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="akta">
                <div class="card-body">
                    <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source4" onchange="previewImage4();" accept=".png, .jpg, .jpeg" >
                    <label for="imageUpload" class="m-0"></label>
                    <?php if($cek_akta->num_rows() > 0): 
                        $akta = $cek_akta->row();
                    ?>
                    <img id="image-preview4" class="rounded" src="<?= base_url('upload/img/'.$akta->img) ?>" alt="image preview" style="width:100%;"/> 
                    <?php else: ?>
                    <img id="image-preview4" class="rounded d-none" alt="image preview" style="width:100%;"/> 
                    <?php endif; ?>   
                </div>
                <div class="card-footer bg-secondary">
                    <button type="submit" class="btn btn-sm btn-success btn-block">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>