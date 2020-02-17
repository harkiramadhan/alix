<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--5">
    <div class="col-xl-12">
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Biodata Ayah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Biodata Ibu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Biodata Wali <small class="text-warning">*) Jika Ada</small></a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="ayah">
                        <?php if($cekayah->num_rows() > 0): 
                            $ayah = $cekayah->row();
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Ayah" name="nama" value="<?= $ayah->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Induk Kependudukan <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" placeholder="Nomor Induk Kependudukan" name="nik" value="<?= $ayah->nik ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" value="<?= $ayah->tl ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" value="<?= $ayah->tgl_lahir ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Ayah <small class="text-warning">*</small></label>
                                    <select class="form-control form-control-alternative form-control-sm" name="status" id="statusayah" required>
                                        <option value="" disabled>- Pilih Status -</option>>
                                        <option value="ada" <?php if($ayah->status == "ada"){echo "selected";} ?>>Ada</option>
                                        <option value="wafat" <?php if($ayah->status == "wafat"){echo "selected";} ?>>Wafat</option>
                                    </select>
                                </div>
                                <div class="form-group" id="formWafatAyah">
                                    <label for="">Tanggal Wafat Ayah <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-sm form-control-alternative" name="tanggal_wafat" id="inputWafatAyah" value="<?= $ayah->tanggal_wafat ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat Tinggal <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idtempat" required>
                                        <option value="" selected disabled>- Pilih Tempat Tinggal -</option>
                                        <?php foreach($tempat_tinggal as $t){ ?>
                                            <option value="<?= $t->id ?>" <?php if($ayah->idtempat == $t->id){echo "selected";} ?>><?= $t->tempat ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>" <?php if($ayah->idpendidikan == $p->id){echo "selected";} ?>><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Terakhir</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" value="<?= $ayah->gelar ?>" placeholder="Gelar Terakhir">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>" <?php if($ayah->idpekerjaan == $pk->id){echo "selected";} ?>><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama & Alamat Pekerjaan</label>
                                    <textarea id="" cols="30" rows="5" class="form-control form-control-alternative form-control-sm" name="alamat_pekerjaan"><?= $ayah->alamat_pekerjaan ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Perbulan (Rp.) <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpenghasilan" required>
                                        <option value="" selected disabled>- Pilih Penghasilan Perbulan -</option>
                                        <?php foreach($penghasilan as $pg){ ?>
                                            <option value="<?= $pg->id ?>" <?php if($ayah->idpenghasilan == $pg->id){echo "selected";} ?>><?= $pg->penghasilan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-alternative form-control-sm" name="email" value="<?= $ayah->email ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Whatsapp</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="wa" value="<?= $ayah->wa ?>" placeholder="Whatsapp">
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Ayah" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Induk Kependudukan <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" placeholder="Nomor Induk Kependudukan" name="nik" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Ayah <small class="text-warning">*</small></label>
                                    <select class="form-control form-control-alternative form-control-sm" name="status" id="statusayah" required>
                                        <option value="" selected disabled>- Pilih Status -</option>>
                                        <option value="ada">Ada</option>
                                        <option value="wafat">Wafat</option>
                                    </select>
                                </div>
                                <div class="form-group" id="formWafatAyah">
                                    <label for="">Tanggal Wafat Ayah <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-sm form-control-alternative" name="tanggal_wafat" id="inputWafatAyah">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat Tinggal <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idtempat" required>
                                        <option value="" selected disabled>- Pilih Tempat Tinggal -</option>
                                        <?php foreach($tempat_tinggal as $t){ ?>
                                            <option value="<?= $t->id ?>"><?= $t->tempat ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>"><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Terakhir</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" placeholder="Gelar Terakhir">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>"><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama & Alamat Pekerjaan</label>
                                    <textarea id="" cols="30" rows="5" class="form-control form-control-alternative form-control-sm" name="alamat_pekerjaan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Perbulan (Rp.) <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpenghasilan" required>
                                        <option value="" selected disabled>- Pilih Penghasilan Perbulan -</option>
                                        <?php foreach($penghasilan as $pg){ ?>
                                            <option value="<?= $pg->id ?>"><?= $pg->penghasilan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-alternative form-control-sm" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Whatsapp</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="wa" placeholder="Whatsapp">
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php endif; ?>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="ibu">
                        <?php if($cekibu->num_rows() > 0): 
                            $ibu = $cekibu->row();
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Ibu" name="nama" value="<?= $ibu->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Induk Kependudukan <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" placeholder="Nomor Induk Kependudukan" name="nik" value="<?= $ibu->nik ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" value="<?= $ibu->tl ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" value="<?= $ibu->tgl_lahir ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Ibu <small class="text-warning">*</small></label>
                                    <select class="form-control form-control-alternative form-control-sm" name="status" id="statusibu" required>
                                        <option value="" disabled>- Pilih Status -</option>>
                                        <option value="ada" <?php if($ibu->status == "ada"){echo "selected";} ?>>Ada</option>
                                        <option value="wafat" <?php if($ibu->status == "wafat"){echo "selected";} ?>>Wafat</option>
                                    </select>
                                </div>
                                <div class="form-group" id="formWafatIbu">
                                    <label for="">Tanggal Wafat Ibu <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-sm form-control-alternative" name="tanggal_wafat" id="inputWafatIbu" value="<?= $ibu->tanggal_wafat ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>" <?php if($ibu->idpendidikan == $p->id){echo "selected";} ?>><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Terakhir</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" value="<?= $ibu->gelar ?>" placeholder="Gelar Terakhir">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>" <?php if($ibu->idpekerjaan == $pk->id){echo "selected";} ?>><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama & Alamat Pekerjaan</label>
                                    <textarea id="" cols="30" rows="5" class="form-control form-control-alternative form-control-sm" name="alamat_pekerjaan"><?= $ibu->alamat_pekerjaan ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Perbulan (Rp.) <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpenghasilan" required>
                                        <option value="" selected disabled>- Pilih Penghasilan Perbulan -</option>
                                        <?php foreach($penghasilan as $pg){ ?>
                                            <option value="<?= $pg->id ?>" <?php if($ibu->idpenghasilan == $pg->id){echo "selected";} ?>><?= $pg->penghasilan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-alternative form-control-sm" name="email" value="<?= $ibu->email ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Whatsapp</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="wa" placeholder="Whatsapp" value="<?= $ibu->wa ?>">
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Ibu" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Induk Kependudukan <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" placeholder="Nomor Induk Kependudukan" name="nik" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Ibu <small class="text-warning">*</small></label>
                                    <select class="form-control form-control-alternative form-control-sm" name="status" id="statusibu" required>
                                        <option value="" disabled>- Pilih Status -</option>>
                                        <option value="ada">Ada</option>
                                        <option value="wafat">Wafat</option>
                                    </select>
                                </div>
                                <div class="form-group" id="formWafatIbu">
                                    <label for="">Tanggal Wafat Ibu <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-sm form-control-alternative" name="tanggal_wafat" id="inputWafatIbu">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>"><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Terakhir</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" placeholder="Gelar Terakhir">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>"><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama & Alamat Pekerjaan</label>
                                    <textarea id="" cols="30" rows="5" class="form-control form-control-alternative form-control-sm" name="alamat_pekerjaan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Perbulan (Rp.) <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpenghasilan" required>
                                        <option value="" selected disabled>- Pilih Penghasilan Perbulan -</option>
                                        <?php foreach($penghasilan as $pg){ ?>
                                            <option value="<?= $pg->id ?>"><?= $pg->penghasilan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-alternative form-control-sm" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Whatsapp</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="wa" placeholder="Whatsapp">
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                    <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="wali">
                        <?php if($cekwali->num_rows() > 0 ):
                            $wali = $cekwali->row();    
                        ?>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Wali" name="nama" value="<?= $wali->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" value="<?= $wali->tl ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" value="<?= $wali->tgl_lahir ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>" <?php if($wali->idpendidikan == $p->id){echo "selected";} ?>><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Terakhir</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" value="<?= $wali->gelar ?>" placeholder="Gelar Terakhir">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>" <?php if($wali->idpekerjaan == $pk->id){echo "selected";} ?>><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Wali" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>"><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Terakhir</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" placeholder="Gelar Terakhir">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>"><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>