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
        <div class="col">
          <div class="card shadow">
            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="col card-header d-md-inline-block bg-transparent border-0">
                  <div class="row align-items-center">
                    <div class="col-xl-10 mt-2">
                      <h3 class="mb-0">Daftar Gallery </h3> 
                    </div>
                    <div class="col-xl-2 mt-2">
                        <button data-toggle="modal" data-target="#tambah" class="btn btn-sm btn-success btn-block">Tambah Gallery</but>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-sm">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="5px">No</th>
                        <th scope="col" class="col-12">Judul Gallery</th>
                        <th scope="col">Jumlah Foto</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="list_gallery">
                    
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>

    <!-- Modal Tambah Gallery-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('backend/gallery/action') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="tambah">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Judul Gallery <small class="text-warning">*</small></label>
                                <input type="text" class="form-control form-control-alternative form-control-sm" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="">Status Gallery <small class="text-warning">*</small></label>
                                <select name="status" id="" class="form-control form-control-alternative form-control-sm" required>
                                    <option value="" selected disabled>- Pilih Status Gallery -</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Gambar <small class="text-warning">*</small></label>
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

    <div class="modal fade" id="modalLihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg isi" role="document">
            
        </div>
    </div>

      <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-10 isiDelete" role="document">
          
        </div>
      </div>