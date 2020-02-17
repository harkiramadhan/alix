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
                      <h3 class="mb-0">Daftar Berita </h3> 
                    </div>
                    <div class="col-xl-2 mt-2">
                        <a href="<?= site_url('backend/berita/tambah') ?>" class="btn btn-sm btn-success btn-block">Tambah Berita</a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-sm">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="5px">No</th>
                        <th scope="col">Label</th>
                        <th scope="col" class="col-12">Judul Berita</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="list_berita">
                    
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
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