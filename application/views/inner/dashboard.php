<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--4">
    <div class="row justify-content-center">
        <!-- <div class="col-xl-12">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Informasi Penting !</h5> 
                </div>
                <div class="card-body"> 
                    <div class="text-justify">
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium id earum animi qui tenetur? Aliquid sequi magnam accusantium minus sunt maxime cupiditate. Impedit nisi saepe modi vel, iusto tenetur optio?</small>  
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card shadow card-stats mb-4 text-center">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-uppercase text-muted m-0">NIK Anak</h5> 
                        </div>
                        <div class="card-body"> 
                            <h3 class="text-uppercase m-0"><strong><?= $anak->nik ?></strong></h3>  
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card shadow card-stats mb-4 text-center">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-uppercase text-muted m-0">Nama Lengkap</h5> 
                        </div>
                        <div class="card-body"> 
                            <h3 class="text-uppercase m-0"><strong><?= $anak->nama." / (".$anak->jenkel.")" ?></strong></h3>  
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card shadow card-stats mb-4 text-center">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-uppercase text-muted m-0">Lahir</h5> 
                        </div>
                        <div class="card-body"> 
                            <h3 class="m-0"><strong><?= $anak->tl.", ".date('d-m-Y', strtotime($anak->tgl_lahir)) ?></strong></h3>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-6">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Metode Pembayaran</h5> 
                </div>
                <div class="card-body"> 
                    <div class="text-justify mb-3">
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero unde sit sunt iusto perferendis, accusantium, voluptatem esse, assumenda magni laudantium explicabo qui quos tempora commodi fuga ut repudiandae voluptate tenetur?</small>
                    </div>
                    <hr class="my-4">
                    <form action="<?= site_url('dashboard/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="pilih">
                        <div class="form-group">
                            <select name="metode" id="selectMetode" class="form-control form-control-alternative form-control-sm">
                                <option value="" selected disabled>- Pilih Metode Pembayaran -</option>
                                <option value="transfer" <?php if($anak->metode_pembayaran == "transfer"){echo "selected";} ?>>Transfer</option>
                                <option value="cash" <?php if($anak->metode_pembayaran == "cash"){echo "selected";} ?>>Bayar Di Sekolah</option>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <?php //if($anak->metode_pembayaran == "transfer"): ?>
        <!-- <div class="col-xl-6" id="modalKonfirmasi">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Konfirmasi Pembayaran</h5> 
                </div>
                <div class="card-body"> 
                    <div class="text-justify mb-3">
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus rem, cumque at facere nam molestiae laudantium, repellendus quae ex necessitatibus consequuntur in. Tempora et provident veniam consequuntur saepe. Dolorem, molestias!</small>
                    </div>
                    <hr class="my-4">
                    <?php if($anak->konfirmasi_pembayaran != NULL): ?>
                            <img class="rounded" src="<?= base_url('upload/img/'.$anak->konfirmasi_pembayaran) ?>" style="width:100%;"/>
                    <?php endif; ?>
                    <hr class="my-4">
                    <button class="btn btn-sm btn-block btn-primary" type="btn" data-toggle="modal" data-target="#konfirmasi">Konfirmasi Pembayaran</button>
                </div>
            </div>
        </div> -->
        <!-- Modal Konfirmasi Pembayaran -->
        <!-- <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h3 class="modal-title">Konfirmasi Pembayaran</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= site_url('dashboard/simpan') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="jenis" value="konfirmasi">
                    <div class="modal-body">
                        <input class="btn btn-sm btn-outline-primary btn-block" type="file" name="img" id="image-source" onchange="previewImage();" accept=".png, .jpg, .jpeg" >
                        <label for="imageUpload" class="m-0"></label>
                        <?php if($anak->konfirmasi_pembayaran != NULL): ?>
                            <img id="image-preview" class="rounded" src="<?= base_url('upload/img/'.$anak->konfirmasi_pembayaran) ?>" alt="image preview" style="width:100%;"/>
                        <?php else: ?>
                            <img id="image-preview" class="rounded d-none" alt="image preview" style="width:100%;"/>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer bg-secondary">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> -->
        <?php //endif; ?>
    </div>
