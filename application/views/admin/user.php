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
                      <h3 class="mb-0">Daftar User </h3> 
                    </div>
                    <div class="col-xl-2 mt-2">
                        <button class="btn btn-sm btn-success btn-block" data-toggle="modal" data-target="#tambah">Tambah User</button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-sm">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="10">No</th>
                        <th scope="col">Username / Email</th>
                        <th scope="col" class="col-12">Role</th>
                        <th>Status</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="list_user">
                        
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>

    <!-- Modal Tambah Label-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('backend/user/simpan') ?>" method="POST">
                <input type="hidden" name="jenis" value="tambah">
                <div class="modal-body bg-secondary">
                    <div class="form-group">
                        <label for="">Username / Email</label>
                        <input type="text" class="form-control form-control-alternative form-control-sm" name="email" placeholder="Username / Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Role <small class="text-warning">*</small></label>
                        <select name="role" id="" class="form-control form-control-sm form-control-alternative" required>
                            <option value="">- Pilih Role -</option>
                            <option value="1">Admin Website</option>
                            <option value="2">Admin PPDB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status <small class="text-warning">*</small></label>
                        <select name="role" id="" class="form-control form-control-sm form-control-alternative" required>
                            <option value="">- Pilih Status -</option>
                            <option value="active">Active</option>
                            <option value="-">Non Active</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password <small class="text-warning">*</small></label>
                        <input type="password" id="pas" name="password" id="" class="form-control form-control-alternative form-control-sm" required>
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                        <label class="custom-control-label" for="customCheckLogin">
                            <span class="text-muted">Lihat Password</span>
                        </label>
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