
        <section class="section">
          <div class="section-header">
            <h1>Booking</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Booking</a></div>
              <div class="breadcrumb-item">Form Booking</div>
            </div>
          </div>
          <form action="<?php echo site_url('booking/insert') ?>" method="post">
          <div class="section-body">
            <h2 class="section-title">Form Booking</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

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
                          <label>Asal Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="asal_penerbangan" id="asal_penerbangan" >
                            
                          </div>
                          <div id="eras">
                              
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
                            <input type="text" class="form-control phone-number" name="tujuan_penerbangan" id="tujuan_penerbangan" >
                            
                          </div>
                          <div id="ertuj">
                              
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        <button type="button" id="btn-cari" class="btn btn-primary">Cari</button>
                        <button type="button" id="btn-reset" class="btn btn-warning">Reset</button>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                          <table class="table table-stripped" id="tblbooking">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>ID Penerbangan</th>
                                <th>Nama Pesawat</th>
                                <th>Nama Bandara</th>
                                <th>Tgl Penerbangan</th>
                                <th>Asal Penerbangan</th>
                                <th>Tujuan Penrbangan</th>
                                <th>Jam Berangkat</th>
                                <th>Jam tiba</th>
                                <th>Tarif Bisnis</th>
                                <th>Tarif Ekonomi</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="tbodybooking">
                              
                            </tbody>
                          </table>
                          <div id="notfound">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Customer</h4>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>ID Customer</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="cursor: pointer;" id="tmb_plh_cst">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="id_customer_book" id="id_customer_book" style="cursor: pointer;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Nama Customer</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="nama_customer" id="nama_customer" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="email" id="email" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Kota</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="kota" id="kota"  readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Negara</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="negara" id="negara" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Penerbangan</h4>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>ID Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="id_penerbangan" id="id_penerbangan" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="date" class="form-control phone-number" name="tanggal_penerbangan" id="tanggal_penerbangan" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Nama Bandara</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="nama_bandara" id="nama_bandara" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Kota Bandara</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="kota_bandara" id="kota_bandara" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Asal Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="asal_penerbangan2" id="asal_penerbangan2" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tujuan Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="tujuan_penerbangan2" id="tujuan_penerbangan2" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Jam keberangkatan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="time" class="form-control phone-number" name="jam_keberangkatan" id="jam_keberangkatan" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Jam Tiba</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="time" class="form-control phone-number" name="jam_tiba" id="jam_tiba" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>







              <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Tarif Penerbangan</h4>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>Tarif Bisnis</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="tarif_bisnis" id="tarif_bisnis" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tarif Ekonomi</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="tarif_ekonomi" id="tarif_ekonomi" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Nama Pesawat</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="nama_pesawat" id="nama_pesawat" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Kursi Bisnis</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="jml_kursi_bisnis" id="jml_kursi_bisnis" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Kursi Ekonomi</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-plane"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="jml_kursi_ekonomi" id="jml_kursi_ekonomi" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
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
                          <label>ID Booking</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="id_booking" id="id_booking" readonly style="cursor: no-drop;" value="<?php echo $nomot; ?>">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Kelas Penerbangan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <select class="form-control phone-number" name="kelas_penerbangan" id="kelas_penerbangan">
                              <option>BISNIS</option>
                              <option>EKONOMI</option>
                            </select>
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Jumlah Penumpang</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="number" class="form-control phone-number" name="jml_penumpang" id="jml_penumpang">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="button" class="btn btn-primary" id="tombol_booking">Booking</button>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label>Tanggal Booking</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="date" class="form-control phone-number" name="tanggal_booking" id="tanggal_booking" readonly style="cursor: no-drop;" value="<?php echo date('Y-m-d') ?>">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tarif Per Kursi</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="tarif_per_kursi" id="tarif_per_kursi" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Total Tarif</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                            <input type="hidden" name="id_detail" id="id_detail" value="<?php echo $nomotDetail ?>">
                            <input type="hidden" name="id_tarif" id="id_tarif">
                            <input type="text" class="form-control phone-number" name="total_tarif" id="total_tarif" readonly style="cursor: no-drop;">
                            
                          </div>
                        </div>
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
          </form>
        </section>



<div class="modal fade bd-example-modal-lg" id="modalPlhCst" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Bandara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-stripped" id="tableku">
            <thead>
              <tr>
                  <th>#</th>
                  <th>ID Customer</th>
                  <th>Nama Customer</th>
                  <th>Email</th>
                  <th>Kota</th>
                  <th>Negara</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $no=1;foreach($customers as $customer) : ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $customer->id_customer ?></td>
                  <td><?php echo $customer->nama ?></td>
                  <td><?php echo $customer->email ?></td>
                  <td><?php echo $customer->kota ?></td>
                  <td><?php echo $customer->negara ?></td>
                  <td><button class="btn btn-primary plh-cst" data-kode="<?= $customer->id_customer ?>"><i class="fas fa-pen"></i></button></td>
                </tr>
              <?php $no++;endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
