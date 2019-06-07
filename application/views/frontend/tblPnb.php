<table class="centered">
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
                </tr>
              </thead>
              <tbody>
                 <?php $no=1;foreach($tmp as $row) : ?>
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
                              <a href="<?php echo site_url('gigantic/booking/'.$row->id_penerbangan); ?>" class="btn btn-success">Booking</a>
                            </td>
                          </tr>
                          <?php $no++;endforeach; ?>
              </tbody>
            </table> 