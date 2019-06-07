<section id="about" class="about scrollspy">
      <div class="container">
        <div class="row">
          <h3 class="center light grey-text text-darken-3">Detail Booking Penerbangan</h3>
          <h6 class="center light grey-text text-darken-3">Detail  ( <?php echo $tmp['nama'] ?> | <?php echo $tmp['email'] ?>)</h6>
        </div>
        <div class="row">
          <div class="col m12">
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
                        
                      </table>
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
<br><br>
          <h3 class="center light grey-text text-darken-3">Data Penumpang</h3><br><br>
        <form action="<?php echo site_url('gigantic/savepenumpang'); ?>" method="post">
          <input type="hidden" name="limit" value="<?php echo $jml; ?>">
          <input type="hidden" name="id_detail" value="<?php echo $tmp['id_detail']; ?>" id="id_detail">
          <input type="hidden" name="id_penerbangan" value="<?php echo $tmp['id_penerbangan']; ?>">
          <div class="row">
            <?php for ($i=0; $i < $jml; $i++):?>
              <div class="col s6">
              <h6 class="center light grey-text text-darken-3">Detail Penumpang <?php echo 1+$i; ?></h6>
                 <div class="input-field">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" name="nama_penumpang[]">
                  <label for="icon_prefix">Nama Penumpang</label>
                </div>
                <div class="input-field">
                  <i class="material-icons prefix">airline_seat_legroom_normal</i>
                  <input id="icon_prefix" type="text" name="no_kursi[]" readonly style="cursor: no-drop;" value="<?php echo $no_kursi++; ?>">
                  <label for="icon_prefix">No Kursi</label>
                </div>
                <div class="input-field">
                  <i class="material-icons prefix">verified_user</i>
                  <input id="icon_prefix" type="text" name="umur[]">
                  <label for="icon_prefix">Umur</label>
                </div>
              </div>
            <?php endfor; ?>
            
          </div>
          <div class="row">
            <button class="waves-effect waves-light btn" id="btn-save-penumpang" type="submit"><i class="material-icons left">save</i>Simpan</button>
          </div>
        </form>
      </div>
    </section>