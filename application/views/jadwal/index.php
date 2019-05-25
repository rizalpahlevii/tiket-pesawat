<section class="section">
          <div class="section-header">
            <h1>Jadwal Penerbangan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Jadwal Penerbangan</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Jadwal Penerbangan</h4>
                  </div>

                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="tableku">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ID Penerbangan</th>
                            <th>Tanggal Penerbangan</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Jam Berangkat</th>
                            <th>Jam Tiba</th>
                            <th>Nama Pesawat</th>
                            <th>Nama Bandara</th>
                            <th>Kota Bandara</th>
                            <th>Kursi Ekonomi | Sisa Kursi</th>
                            <th>Kursi Bisnis | Sisa Kursi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;foreach($jadwal as $row) : ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->id_penerbangan ?></td>
                            <?php $today = date('Y-m-d'); ?>
                            <td><?php echo ($row->tgl_penerbangan >= $today) ? '<span class="badge badge-success">' . $row->tgl_penerbangan .'</span>' : '<span class="badge badge-warning">Penerbangan Sudah Berlalu<br>' . ( $row->tgl_penerbangan ) . '</span>' ; ?></td>
                            <td><?php echo $row->asal ?></td>
                            <td><?php echo $row->tujuan ?></td>
                            <td><?php echo $row->jam_berangkat ?></td>
                            <td><?php echo $row->jam_tiba ?></td>
                            <td><?php echo $row->type_pesawat ?></td>
                            <td><?php echo $row->nama_bandara ?></td>
                            <td><?php echo $row->kota_bandara ?></td>
                            <td><?php echo $row->jml_kursi_ekonomi ?> | <?php echo $row->jml_kursi_ekonomi ?></td>
                            <td><?php echo $row->jml_kursi_bisnis ?> | <?php echo $row->jml_kursi_bisnis ?></td>
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




