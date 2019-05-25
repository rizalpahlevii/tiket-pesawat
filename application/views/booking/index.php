<section class="section">
          <div class="section-header">
            <h1>Booking</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Booking</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Booking</h4>
                  </div>

                  <div class="card-body">
                    <a href="<?= site_url('booking/create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
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
                            <th>ID Booking</th>
                            <th>Tanggal Booking</th>
                            <th>Nama Customer</th>
                            <th>Jumlah Penumpang</th>
                            <th>Total Tarif</th>
                            <th>Status Pembayaran</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;foreach($booking as $row) : ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->id_booking ?></td>
                            <?php $today=date('Y-m-d'); ?>
                            <td><?php echo ($row->tgl_booking >= $today) ? '<span class="badge badge-success">' . $row->tgl_booking .'</span>' : '<span class="badge badge-warning">Penerbangan Sudah Berlalu<br>' . ( $row->tgl_booking ) . '</span>' ; ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->jml_penumpang ?></td>
                            <td><?php echo $row->total_tarif ?></td>
                            <td><?php echo $row->status_bayar ?></td>
                            <td></td>
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





