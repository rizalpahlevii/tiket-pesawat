<section class="section">
  <div class="section-header">
    <div class="swaldetail" data-flashdata="<?= $this->session->flashdata('swaldetail') ?>"></div>
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
              <div class="col-sm-8">
                <form action="<?= site_url('booking/index'); ?>" method="post">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label>Filter Booking</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-filter"></i>
                            </div>
                          </div>
                          <select name="inp_filter_booking" id="inp_filter_booking" class="form-control" required>
                            <option disabled selected>Pilih Penerbangan</option>
                            <?php foreach ($tmp_filter as $tf) : ?>
                              <option value="<?= $tf->id_penerbangan ?>" <?= ($tampil_select == $tf->id_penerbangan) ? 'selected' : ''; ?>><?= $tf->id_penerbangan . ' (' . $tf->tgl_penerbangan . ') ' . ' - ' . $tf->asal . ' - ' . $tf->tujuan ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" name="btn-tampil-filter" class="btn btn-danger mt-4">Tampilkan</button>
                      <button type="button" name="btn-reset-filter" class="btn btn-warning mt-4 btn-reset-filter">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
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
                  <?php $no = 1;
                  foreach ($booking as $row) : ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row->id_booking ?></td>
                      <?php $today = date('Y-m-d'); ?>
                      <td><?php echo ($row->tgl_booking >= $today) ? '<span class="badge badge-success">' . $row->tgl_booking . '</span>' : '<span class="badge badge-warning">Penerbangan Sudah Berlalu<br>' . ($row->tgl_booking) . '</span>'; ?></td>
                      <td><?php echo $row->nama ?></td>
                      <td><?php echo $row->jml_penumpang ?></td>
                      <td><?php echo $row->total_tarif ?></td>
                      <td><?php echo ($row->status_bayar == "TERBAYAR") ? '<span class="badge badge-success">' . $row->status_bayar . '</span>' : '<span class="badge badge-warning">' . ($row->status_bayar) . '</span>'; ?></td>
                      <td><?php echo ($row->status_bayar == "TERBAYAR") ? '-' : '<button type="button" class="btn btn-primary mb-3" id="btn-konfirmasi" data-toggle="modal" data-target=".bd-example-modal-lg" data-kode="' . $row->id_booking . '">Konfirmasi</button>'; ?></td>

                    </tr>
                    <?php $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Booking</h5>
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
                    <strong>ID Penerbangan:</strong><br>
                    <p id="id_penerbangan">Ujang Maman </p>
                  </address>
                  <address>
                    <strong>Asal Penerbangan:</strong><br>
                    <p id="asal">Ujang Maman </p>
                  </address>
                  <address>
                    <strong>Kota Bandara:</strong><br>
                    <p id="kota">Ujang Maman </p>
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
                  <address>
                    <strong>Tanggal Penerbangan:</strong><br>
                    <p id="tgl"></p>
                  </address>
                  <address>
                    <strong>Tujuan Penerbangan:</strong><br>
                    <p id="tujuan"></p>
                  </address>
                  <address>
                    <strong>Tanggal Booking:</strong><br>
                    <p id="tgl-booking"></p>
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


        <div class="modal-body">

          <div class="row">
            <h5 class="text-center">Data Customer</h5>
            <div class="col-sm-12">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>ID Customer</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Negara</th>
                    <th>Kota</th>
                  </tr>
                </thead>

                <tbody id="loadCst">
                  <td id="idcus"></td>
                  <td id="namacus"></td>
                  <td id="emailcus"></td>
                  <td id="negaracus"></td>
                  <td id="kotacus"></td>
                </tbody>

              </table>
            </div>
          </div>
          <div class="row">
            <h5 class="text-center">Data Penumpang</h5>
            <div class="col-sm-12">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>Nama Penumpang</th>
                    <th>Umur</th>
                    <th>No Kursi</th>
                  </tr>
                </thead>

                <tbody id="loadPnp">

                </tbody>

              </table>
            </div>
          </div>
          <div class="row">
            <h5 class="text-center">Data Harga</h5>
            <div class="col-sm-12">
              <table class="table table-striped table-hover table-md">
                <tr>
                  <td>Kelas Penerbanagan</td>
                  <td></td>
                  <td id="klsp"><b>
                      <center>2 Orang</center>
                    </b></td>
                </tr>
                <tr>
                  <td>Tarif Per Kursi</td>
                  <td></td>
                  <td id="pkursi"><b>
                      <center>2 Orang</center>
                    </b></td>
                </tr>
                <tr>
                  <td>Jumlah Penumpang</td>
                  <td></td>
                  <td id="jmlpnp"><b>
                      <center>2 Orang</center>
                    </b></td>
                </tr>
                <tr>
                  <td>Total Tarif</td>
                  <td></td>
                  <td id="ttltrf"><b>
                      <center>IDR 2,000,000</center>
                    </b></td>
                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_booking_input" id="id_booking_input">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-konfirmasi-submit">Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('click', '.btn-reset-filter', function() {
    document.location.href = base_url + 'booking';
  });
</script>