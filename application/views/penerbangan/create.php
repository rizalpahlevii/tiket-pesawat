
        <section class="section">
          <div class="section-header">
            <h1>Penerbangan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Penerbangan</a></div>
              <div class="breadcrumb-item">Form Penerbangan</div>
            </div>
          </div>
          <form action="<?php echo site_url('penerbangan/insert') ?>" method="post">
          <div class="section-body">
            <h2 class="section-title">Form Penerbangan</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Bandara</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>ID Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="tmb_id_bandara" style="cursor: pointer;">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_bandara" id="id_bandara" readonly style="cursor: pointer;" placeholder="Klik untuk cari bandara">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-code"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="kode_bandara" id="kode_bandara" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="nama_bandara" id="nama_bandara" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kota Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="kota_bandara" id="kota_bandara" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>





              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Pesawat</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>ID Pesawat</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="tmb_id_pesawat" style="cursor: pointer;">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_pesawat" id="id_pesawat" readonly style="cursor: pointer;" placeholder="Klik untuk mencari pesawat">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Nama Pesawat</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-plane"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="nama_pesawat" id="nama_pesawat" readonly style="cursor: no-drop;">
                      </div>
                    </div>


                    <div class="form-group">
                      <label>Picture</label>
                      <div class="row">
                            <div class="col-sm-5">
                                <img src="" class="img-thumbnail" id="gambarku">
                            </div>
                      </div>
                  </div>  

                    <div class="form-group">
                      <label>Jumlah Kursi Ekonomi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-plane"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="jml_kursi_ekonomi" id="jml_kursi_ekonomi" readonly style="cursor: no-drop;">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Jumlah Kursi Bisnis</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-plane"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="jml_kursi_bisnis" id="jml_kursi_bisnis" readonly style="cursor: no-drop;">
                      </div>
                    </div>

                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Penerbangan</h4>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>ID Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="id_penerbangan" id="id_penerbangan" readonly style="cursor: no-drop;" value="<?= $nomot; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>Tanggal Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="date" class="form-control phone-number" name="tanggal_penerbangan" id="tanggal_penerbangan" min="<?php echo date('Y-m-d') ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>Asal Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="asal_penerbangan" id="asal_penerbangan" readonly style="cursor: no-drop;">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>Tujuan Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="tujuan_penerbangan" id="tujuan_penerbangan">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>Jam Keberangkatan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="time" class="form-control phone-number" name="jam_keberangkatan" id="jam_keberangkatan">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>Jam Tiba</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="time" class="form-control phone-number" name="jam_tiba" id="jam_tiba">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan Data">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </section>




<div class="modal fade bd-example-modal-lg" id="modalPesawat" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Pesawat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="table-responsive">
          <table class="table table-stripped" id="tableku">
            <thead>
              <tr>
                  <th>#</th>
                  <th>ID Pesawat</th>
                  <th>Image</th>
                  <th>Type Pesawat</th>
                  <th>Jumlah Kursi Ekonomi</th>
                  <th>Jumlah Kursi Bisnis</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbodypesawat">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" id="modalBandara" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Bandara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow: all;">
        <div class="table-responsive">
          <table class="table table-stripped" id="tableku">
            <thead>
              <tr>
                  <th>#</th>
                  <th>ID Bandara</th>
                  <th>Kode Bandara</th>
                  <th>Nama Bandara</th>
                  <th>Kota Bandara</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbodybandara">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
