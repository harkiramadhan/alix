<!-- Header -->
<div class="header bg-gradient-warning pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0 mt-5">
            <form action="<?= site_url('backend/profile/action') ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">~
            <div class="row">
                <input type="hidden" name="jenis" value="simpan"> 
                <div class="col-xl-8 order-xl-1 mt-2">
                    <div class="card shadow bg-secondary container">
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenjang Sekolah</label>
                                    <select name="jenjang" id="" class="form-control form-control-alternative form-control-sm">
                                        <option value="">- Pilih Jenjang -</option>
                                        <option value="TK" <?php if($sekolah->jenjang == "TK"){echo "selected";} ?>>TK</option>
                                        <option value="SD" <?php if($sekolah->jenjang == "SD"){echo "selected";} ?>>SD</option>
                                        <option value="SMP" <?php if($sekolah->jenjang == "SMP"){echo "selected";} ?>>SMP</option>
                                        <option value="SMA" <?php if($sekolah->jenjang == "SMA"){echo "selected";} ?>>SMA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Sekolah</label>
                                    <input type="text" name="nama" id="" class="form-control form-control-alternative form-control-sm" placeholder="Nama Sekolah" value="<?= $sekolah->nama ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Sejarah Sekolah</label>
                            <textarea name="sejarah" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm" placeholder="Sejarah Sekolah"><?= $sekolah->sejarah ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Visi Sekolah</label>
                            <textarea name="visi" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm" placeholder="Visi Sekolah"><?= $sekolah->visi ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Misi Sekolah</label>
                            <textarea name="misi" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm" placeholder="Misi Sekolah"><?= $sekolah->misi ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan Sekolah</label>
                            <textarea name="tujuan" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm" placeholder="Tujuan Sekolah"><?= $sekolah->tujuan ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Motto Sekolah</label>
                            <textarea name="motto" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm" placeholder="Motto Sekolah"><?= $sekolah->motto ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kurikulum Sekolah</label>
                            <textarea name="kurikulum" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm" placeholder="Kurikulum Sekolah"><?= $sekolah->kurikulum ?></textarea>
                        </div>
                        <hr>
                        <div class="col-md-12 text-right mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mt-5 mb-xl-0 mb-4 order-xl-2">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <?php if($sekolah->logo == TRUE): ?>
                                    <img id="image-preview" alt="image preview" class="rounded-circle" src="<?= base_url('assets/home/img/'. $sekolah->logo) ?>">
                                <?php else: ?>
                                    <img id="image-preview" alt="image preview" class="rounded-circle">
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <label for="">Logo Sekolah</label>
                                    <input type="file" multiple="multiple" name="img" class="form-control form-control-alternative form-control-sm" id="image-source" onchange="previewImage();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>