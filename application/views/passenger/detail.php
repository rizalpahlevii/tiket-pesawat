<section class="section">
          <div class="section-header">
            <h1>Detail Booking Penerbangan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Data Passenger</a></div>
              <div class="breadcrumb-item">Passenger</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Detail  ( <?php echo $tmp['nama'] ?> | <?php echo $tmp['email'] ?>)</h4>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-stripped">
                        <thead>
                          <tr>
                            <th>Kelas</th>
                            <th>Nama Pesawat</th>
                            <th>Kota Bandara</th>
                            <th>Nama Bandara</th>
                            <th>Tanggal Penerbangan</th>
                            <th>Asal Penerbangan</th>
                            <th>Tujuan Penerbangan</th>
                            <th>Jam Berangkat</th>
                            <th>Jam Tiba</th>
                            <th>Tarif</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?php echo $tmp['kelas'] ?></td>
                            <td><?php echo $tmp['type_pesawat'] ?></td>
                            <td><?php echo $tmp['kota_bandara'] ?></td>
                            <td><?php echo $tmp['nama_bandara'] ?></td>
                            <td><?php echo $tmp['tgl_penerbangan'] ?></td>
                            <td><?php echo $tmp['asal'] ?></td>
                            <td><?php echo $tmp['tujuan'] ?></td>
                            <td><?php echo $tmp['jam_berangkat'] ?></td>
                            <td><?php echo $tmp['jam_tiba'] ?></td>
                            <td><?php echo ($tmp['kelas'] != "EKONOMI") ? $tmp['tarif_bisnis'] : $tmp['tarif_ekonomi'];?></td>
                          </tr>
                        </tbody>
                        
                      </table><hr>
                      <table class="table table-striped table-hover table-md">
                        
                          <tr>
                            <td>Jumlah Penumpang</td>
                            <td></td>
                            <td><b><center><?php echo $tmp['jml_penumpang'] ?> Orang</center></b></td>
                          </tr>
                          <tr>
                            <td>Total Tarif</td>
                            <td></td>
                            <td><b><center>IDR <?php echo number_format($tmp['total_tarif']) ?></center></b></td>
                          </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <div class="section-body">
            <form action="<?php echo site_url('passenger/save') ?>" method="post">
                <input type="hidden" name="limit" value="<?php echo $jml; ?>">
                <input type="hidden" name="id_detail" value="<?php echo $tmp['id_detail']; ?>" id="id_detail">
                <input type="hidden" name="id_penerbangan" value="<?php echo $tmp['id_penerbangan']; ?>">

              <div class="row">
                <?php for ($i=0; $i < $jml; $i++):?>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                      <div class="card-header">
                      <h4>Detail Penumpang <?php echo 1+$i ?></h4>
                    </div>
                   
                    <div class="card-body">
                      <div class="row">
                        
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="form-group">
                            <label>Nama Penumpang</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-user"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control phone-number" name="nama_penumpang[]" id="nama_penumpang[]">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>No Kursi</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-user"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control phone-number" name="no_kursi[]" id="no_kursi[]" value="<?php echo $no_kursi++; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Umur</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-user"></i>
                                </div>
                              </div>
                              <input type="number" class="form-control phone-number" name="umur[]" id="umur[]">
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>



                  </div>
                </div>
                <?php endfor; ?>

              </div>
              <button type="submit" class="btn btn-primary" id="cetak_tiket">Cetak Tiket</button>

            </form>
          </div>
        </section>

