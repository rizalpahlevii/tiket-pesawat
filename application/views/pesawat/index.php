<section class="section">
          <div class="section-header">
            <h1>Pesawat</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Pesawat</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pesawat</h4>
                  </div>

                  <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                    <a href="<?php echo site_url('pesawat/excel'); ?>" target="_blank" class="btn btn-success mb-3 float-right">Export Excel</a>
                    <a href="<?php echo site_url('pesawat/pdf'); ?>" target="_blank" class="btn btn-warning mb-3 mr-2 float-right">Export PDF</a>
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
                            <th>ID Pesawat</th>
                            <th>Image</th>
                            <th>Type Pesawat</th>
                            <th>Jumlah Kursi Ekonomi</th>
                            <th>Jumlah Kursi Bisnis</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no =1;foreach($pesawat as $row): ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->id_pesawat; ?></td>
                            <td><img alt="image" src="<?php echo base_url('assets/master/pesawat/' . $row->image) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $row->type_pesawat ?>"></td>
                            <td><?php echo $row->type_pesawat; ?></td>
                            <td><?php echo $row->jml_kursi_ekonomi; ?></td>
                            <td><?php echo $row->jml_kursi_bisnis; ?></td>
                            <td>
                              <button data-kode="<?= $row->id_pesawat ?>" class="btn btn-warning tmb-edit" id="tmb-edit">Edit</button>
                              <a href="<?= site_url('pesawat/delete/'.$row->id_pesawat); ?>" class="btn btn-danger">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Data Pesawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('pesawat/create'); ?>
                  <div class="form-group">
                      <label>ID Pesawat</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_pesawat" id="id_pesawat" value="<?php echo $nomot; ?>" readonly style="cursor: no-drop;">
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
                        <input type="text" class="form-control phone-number" name="type_pesawat" id="type_pesawat">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Jumlah Kursi Bisnis</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="jml_kursi_bisnis" id="jml_kursi_bisnis">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Jumlah Kursi Ekonomi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-down"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="jml_kursi_ekonomi" id="jml_kursi_ekonomi">
                      </div>
                  </div>


                  <div class="form-group">
                      <label>Picture</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-image"></i>
                          </div>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image" id="image">
                         <label class="custom-file-label" for="image">Choose File</label>
                      </div>
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


        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pesawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('pesawat/update'); ?>
                  <div class="form-group">
                      <label>ID Pesawat</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="id_pesawatUpdate" id="id_pesawatUpdate" value="<?php echo $nomot; ?>" readonly style="cursor: no-drop;">
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
                        <input type="text" class="form-control phone-number" name="type_pesawatUpdate" id="type_pesawatUpdate">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Jumlah Kursi Bisnis</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="jml_kursi_bisnisUpdate" id="jml_kursi_bisnisUpdate">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Jumlah Kursi Ekonomi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-sort-numeric-down"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="jml_kursi_ekonomiUpdate" id="jml_kursi_ekonomiUpdate">
                      </div>
                  </div>


                  <div class="form-group">
                      <label>Picture</label>
                      <div class="row">
                            <div class="col-sm-4">
                                <img src="" class="img-thumbnail" id="gambarku">
                            </div>
                            <div class="col-sm-8">
                                
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-image"></i>
                                  </div>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="imageUpdate" id="image">
                                 <label class="custom-file-label" for="image">Choose File</label>
                              </div>
                              <p>NB : Biarkan kosong jika tidak ingin mengubah gambar</p>
                            </div>
                        </div>
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