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
            <form action="<?= site_url('backend/profile/action') ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8" id="simpan">~
            <div class="row">
                <input type="hidden" name="jenis" value="simpan"> 
                <div class="col-xl-8 order-xl-1 mt-2">
                    <div class="card shadow bg-secondary container">
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenjang Sekolah</label>
                                    <select name="jenjang"  class="form-control form-control-alternative form-control-sm">
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
                                    <input type="text" name="nama"  class="form-control form-control-alternative form-control-sm" placeholder="Nama Sekolah" value="<?= $sekolah->nama ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Sejarah Sekolah</label>
                            <div id="editorSejarah" style="height: auto;"></div>
                            <textarea name="sejarah" style="display:none" id="descSejarah"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Visi Sekolah</label>
                            <div id="editorVisi" style="height: auto;"></div>
                            <textarea name="visi" style="display:none" id="descVisi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Misi Sekolah</label>
                            <div id="editorMisi" style="height: auto;"></div>
                            <textarea name="misi" style="display:none" id="descMisi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan Sekolah</label>
                            <div id="editorTujuan" style="height: auto;"></div>
                            <textarea name="tujuan" style="display:none" id="descTujuan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Motto Sekolah</label>
                            <div id="editorMotto" style="height: auto;"></div>
                            <textarea name="motto" style="display:none" id="descMotto"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kurikulum Sekolah</label>
                            <div id="editorKurikulum" style="height: auto;"></div>
                            <textarea name="kurikulum" style="display:none" id="descKurikulum"></textarea>
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