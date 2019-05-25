<section class="section">
          <div class="section-header">
            <h1>Penerbangan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Penerbangan</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Penerbangan</h4>
                  </div>

                  <div class="card-body">
                    <a href="<?= site_url('penerbangan/create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
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
                            <th>ID Penerbangan</th>
                            <th>Tanggal Penerbangan</th>
                            <th>Asal Penerbangan</th>
                            <th>Tujuan Penerbangan</th>
                            <th>Jam Berangkat</th>
                            <th>Jam Tiba</th>
                            <th>Nama Pesawat</th>
                            <th>Nama Bandara</th>
                            <th>Tempat Bandara</th>
                            <th>Action</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;foreach($penerbangan as $row) : ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->id_penerbangan ?></td>
                            <td><?php echo $row->tgl_penerbangan ?></td>
                            <td><?php echo $row->asal ?></td>
                            <td><?php echo $row->tujuan ?></td>
                            <td><?php echo $row->jam_berangkat ?></td>
                            <td><?php echo $row->jam_tiba ?></td>
                            <td><?php echo $row->type_pesawat ?></td>
                            <td><?php echo $row->nama_bandara ?></td>
                            <td><?php echo $row->kota_bandara ?></td>
                            <td>
                              <button class="btn btn-success" id="detail-pnb" data-kode="<?= $row->id_penerbangan; ?>">Detail</button>
                            </td>
                            <td>
                              <a href="<?= site_url('penerbangan/delete/'.$row->id_penerbangan) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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





<div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Penerbangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Asal Penerbangan:</strong><br>
                            <p id="asal">Ujang Maman </p>
                        </address>
                        <address>
                          <strong>Kota Bandara:</strong><br>
                            <p id="kota">Ujang Maman </p>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right"><address>
                        <strong>Tanggal Penerbangan:</strong><br>
                          <p id="tgl"></p>
                        </address>
                        <address>
                          <strong>Tujuan Penerbangan:</strong><br>
                          <p id="tujuan"></p>
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Nama Pesawat:</strong><br>
                          <p id="nama_pesawat"></p>
                        </address>
                        <address>
                          <strong>Nama Bandara:</strong><br>
                          <p id="nama_bandara"></p>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Jam Keberangkatan:</strong><br>
                          <p id="jam_berangkat"></p>
                        </address>
                        <address>
                          <strong>Jam Tiba:</strong><br>
                          <p id="jam_tiba"></p>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
    </div>
  </div>
</div>