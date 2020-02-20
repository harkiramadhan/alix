<div class="page-header" data-parallax="true" style="height: 500px; filter: brightness(70%);">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.457279425156!2d106.8184835!3d-6.2486636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3d7e54ab253%3A0x7c9380276eaa2976!2sMasjid%20Al%20-%20Hikmah!5e0!3m2!1sid!2sid!4v1582170950852!5m2!1sid!2sid" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>

<div class="row justify-content-center">
    <div class="col-xl-11">
        <div class="main main-raised" style="margin-top: -140px">
            <div class="contact-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="title mt-2">Hubungi Kami</h2>
                            <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama <small class="text-warning">*</small></label>
                                <input type="text" class="form-control" name="nama" rerquired>
                            </div>
                            <div class="form-group">
                                <label for="">Email <small class="text-warning">*</small></label>
                                <input type="email" class="form-control" name="email" rerquired>
                            </div>
                            <div class="form-group">
                                <label for="">Judul <small class="text-warning">*</small></label>
                                <input type="text" class="form-control" name="judul" rerquired>
                            </div>
                            <div class="form-group">
                                <label for="">Pesan <small class="text-warning">*</small></label>
                                <textarea name="pesan" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success" type="submit">Kirim</button>
                            </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-left">
                            <div class="info info-horizontal pb-0 pt-1">
                                <div class="icon icon-primary mt-3">
                                    <i class="material-icons">pin_drop</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title mt-0">Alamat</h4>
                                    <p><?= $sekolah->alamat ?></p>
                                </div>
                            </div>
                            <div class="info info-horizontal pb-0 pt-1">
                                <div class="icon icon-primary mt-3">
                                    <i class="material-icons">phone</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title mt-0">Telepon</h4>
                                    <p><?= $sekolah->telp ?></p>
                                </div>
                            </div>
                            <div class="info info-horizontal pt-1">
                                <div class="icon icon-primary mt-3">
                                    <i class="material-icons">alternate_email</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title mt-0">Email</h4>
                                    <p><?= $sekolah->email ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg isi" role="document" style="margin-top: 80px">
    
  </div>
</div>