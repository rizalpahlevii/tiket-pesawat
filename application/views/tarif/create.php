
        <section class="section">
          <div class="section-header">
            <h1>Tarif Penerbangan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Tarif Penerbangan</a></div>
              <div class="breadcrumb-item">Form Tarif Penerbangan</div>
            </div>
          </div>
          <form action="<?php echo site_url('tarif/insert') ?>" method="post">
          <div class="section-body">
            <h2 class="section-title">Form Penerbangan</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Penerbangan</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>ID Penerbangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="tmb_id_penerbangan" style="cursor: pointer;">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_penerbangan" id="id_penerbangan" readonly style="cursor: pointer;" placeholder="Klik untuk menacari data penerbangan">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Penerbangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-code"></i>
                          </div>
                        </div>
                        <input type="date" class="form-control pwstrength" data-indicator="pwindicator" name="tanggal_penerbangan" id="tanggal_penerbangan" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Pesawat</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="nama_pesawat" id="nama_pesawat" readonly style="cursor: no-drop;">
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
                      <label>Asal Penerbangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="asal_penerbangan" id="asal_penerbangan" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tujuan Penerbangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="tujuan_penerbangan" id="tujuan_penerbangan" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jam Keberangkatan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="time" class="form-control pwstrength" data-indicator="pwindicator" name="jam_berangkat" id="jam_berangkat" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jam Tiba</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="time" class="form-control pwstrength" data-indicator="pwindicator" name="jam_tiba" id="jam_tiba" readonly style="cursor: no-drop;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tarif Penerbangan</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>ID Tarif</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="ok">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_tarif" id="id_tarif" readonly style="cursor: no-drop;" placeholder="Klik untuk menacari data penerbangan" value="<?php echo $nomot; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tarif Ekonomi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="ok">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="tarif_ekonomi" id="tarif_ekonomi"  placeholder="Tarif ekonomi..">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tarif Bisnis</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="ok">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="tarif_bisnis" id="tarif_bisnis" placeholder="Tarif bisnis..">
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan Data</button>
                  </div>
                </div>
              </div>   
            </div>
          </div>
          </form>
        </section>




<div class="modal fade bd-example-modal-lg" id="modalPenerbangan" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Penerbangan</h5>
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
                  <th>ID Penerbangan</th>
                  <th>Tanggal Penerbangan</th>
                  <th>Nama Pesawat</th>
                  <th>Asal Penerbangan</th>
                  <th>Tujuan Penerbangan</th>
                  <th>Jam Keberangkatan</th>
                  <th>Jam Tiba</th>
                  <th>Nama Bandara</th>
                  <th>Kota Bandara</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($tbl_pnb as $row) :?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->id_penerbangan ?></td>
                <td><?php echo $row->tgl_penerbangan ?></td>
                <td><?php echo $row->type_pesawat ?></td>
                <td><?php echo $row->asal ?></td>
                <td><?php echo $row->tujuan ?></td>
                <td><?php echo $row->jam_berangkat ?></td>
                <td><?php echo $row->jam_tiba ?></td>
                <td><?php echo $row->nama_bandara ?></td>
                <td><?php echo $row->kota_bandara ?></td>
                <td><button type="button" id="plh-penerbangan" data-kode="<?= $row->id_penerbangan ?>" class="btn btn-primary"><i class="fas fa-pen"></i></button></td>
              </tr>
              <?php $no++;endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

