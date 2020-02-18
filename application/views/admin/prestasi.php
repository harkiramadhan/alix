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
                      <h3 class="mb-0">Daftar Prestasi </h3> 
                    </div>
                    <div class="col-xl-2 mt-2">
                        <button data-toggle="modal" data-target="#tambah" class="btn btn-sm btn-success btn-block">Tambah Prestasi</button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-sm">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="5px">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tahun</th>
                        <th scope="col" class="col-12">Prestasi</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="list_prestasi">
                    
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Tambah Prestasi-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('backend/prestasi/action') ?>" method="POST">
                <input type="hidden" name="jenis" value="tambah">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori Prestasi <small class="text-warning">*</small></label>
                                <select name="kategori" class="form-control form-control-sm form-control-alternative" required>
                                    <option value="">- Pilih Kategori Prestasi -</option>
                                    <option value="Akademik">Akademik</option>
                                    <option value="Non">Non Akademik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tahun Prestasi <small class="text-warning">*</small></label>
                                <select name="tahun" class="form-control form-control-alternative form-control-sm" required>
                                <option value="">- Pilih Tahun Prestasi -</option>
                                <?php
                                    $year = range(2000, 2030);
                                    foreach($year as $y){
                                        echo "<option value=".$y.">".$y."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Prestasi <small class="text-warning">*</small></label>
                        <textarea name="prestasi" class="form-control-alternative form-control-sm form-control" id="" cols="30" rows="2" required placeholder="Prestasi Yang Di Capai ...."></textarea>
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

      <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg isi" role="document">
              
          </div>
      </div>

      <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-10 isiDelete" role="document">
          
        </div>
      </div>