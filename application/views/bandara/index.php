<section class="section">
          <div class="section-header">
            <h1>Bandara</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Bandara</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Bandara</h4>
                  </div>

                  <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                    <a href="<?php echo site_url('bandara/excel'); ?>" target="_blank" class="btn btn-success mb-3 float-right">Export Excel</a>
                    <a href="<?php echo site_url('bandara/pdf'); ?>" target="_blank" class="btn btn-warning mb-3 mr-2 float-right">Export PDF</a>
                    <div class="row">
                      <div class="col-sm-6">
                        <?php echo $this->session->flashdata('message'); ?>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tableku">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ID Bandara</th>
                            <th>Kode Bandara</th>
                            <th>Nama bandara</th>
                            <th>Kota Bandara</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach($bandara as $row): ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->id_bandara; ?></td>
                            <td><?php echo $row->kode; ?></td>
                            <td><?php echo $row->nama_bandara; ?></td>
                            <td><?php echo $row->kota_bandara; ?></td>
                            <td>
                              <button data-kode="<?= $row->id_bandara ?>" class="btn btn-warning bdr-edit" id="bdr-edit">Edit</button>
                              <a href="<?= base_url('bandara/delete/'.$row->id_bandara) ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
                            </td>
                          </tr>
                        <?php $no++;endforeach; ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>







        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Bandara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?php echo site_url('bandara/create'); ?>" method="post">
                  <div class="form-group">
                      <label>ID Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_bandara" id="id_bandara" value="<?php echo $nomot; ?>" readonly style="cursor: no-drop;">
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
                        <input type="text" class="form-control phone-number" name="kode_bandara" id="kode_bandara">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Nama Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="nama_bandara" id="nama_bandara">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Kota Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-down"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="kota_bandara" id="kota_bandara">
                      </div>
                  </div>
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save_pesawat">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>














        <!-- modal edit -->



        <div class="modal fade" id="bdrEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Bandara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?php echo site_url('bandara/update'); ?>" method="post">
                  <div class="form-group">
                      <label>ID Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-map"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_bandaraUpdate" id="id_bandaraUpdate" value="<?php echo $nomot; ?>" readonly style="cursor: no-drop;">
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
                        <input type="text" class="form-control phone-number" name="kode_bandaraUpdate" id="kode_bandaraUpdate">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Nama Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="nama_bandaraUpdate" id="nama_bandaraUpdate">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Kota Bandara</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-down"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="kota_bandaraUpdate" id="kota_bandaraUpdate">
                      </div>
                  </div>
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save_pesawat">Update</button>
              </div>
              </form>
            </div>
          </div>
        </div>