<div class="booking" style="margin-top: 15px;">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card-panel white">
                    <span class="card-title"><?php echo $tmp['type_pesawat'] ?></span>
                    <div class="row">
                        <div class="col m7 s12">
                            <img src="<?= base_url('assets/master/pesawat/') . $tmp['image'];?>" class="responsive-img materialboxed">
                        </div>
                        <div class="col m5 s12">
                            <div class="card-content">
                                <div class="row">
                                    <span><b>ID Penerbangan</b> : <?php echo $tmp['id_penerbangan'] ?></span>   
                                </div>
                                <div class="row">
                                    <span><b>Asal Penerbangan</b> : <?php echo $tmp['asal'] ?></span>   
                                </div>
                                <div class="row">
                                    <span><b>Tujaun Penerbangan</b> : <?php echo $tmp['tujuan'] ?></span>   
                                </div>
                                <div class="row">
                                    <span><b>Tanggal Penerbangan</b> : <?php echo $tmp['tgl_penerbangan'] ?></span>   
                                </div>
                                <div class="row">
                                    <span><b>Jam Berangkat</b> : <?php echo $tmp['jam_berangkat'] ?></span>   
                                </div>
                                <div class="row">
                                    <span><b>Jam Tiba</b> : <?php echo $tmp['jam_tiba'] ?></span>   
                                </div>
                            </div>
                        </div>
                        <b>Kode Bandara</b> : <?php echo $tmp['kode'] ?></span> <br>
                        <b>Nama Bandara</b> : <?php echo $tmp['nama_bandara'] ?></span> <br>
                        <b>Kota Bandara</b> : <?php echo $tmp['kota_bandara'] ?></span> 
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card-panel white">
                    <span class="card-title">Detail Booking</span>
                    <form>
                        <input type="hidden" name="id_penerbangan" id="id_penerbangan" value="<?= $tmp['id_penerbangan'] ?>">
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">code</i>
                                <input id="id_booking" type="text" class="validate" readonly value="<?php echo $nomot; ?>">
                                <label for="id_booking">Nomor Booking</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">date_range</i>
                                <input id="tgl_booking" type="text" class="validate" readonly value="<?php echo date('Y-m-d') ?>">
                                <label for="tgl_booking">Tanggal Booking</label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">chevron_right</i>
                                <select name="kelas_penerbangan" id="kelas_penerbangan">
                                    <option value="" disabled selected>Pilih Kelas Penerbangan</option>
                                    <option>BISNIS</option>
                                    <option>EKONOMI</option>
                                </select>
                                <label>Materialize Select</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">monetization_on</i>
                                <input id="tarif_per_kursi" type="text" class="validate" readonly style="cursor: no-drop;">
                                <label for="tarif_per_kursi">Tarif Per Kursi</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">perm_identity</i>
                                <input id="jumlah_penumpang" type="text" class="validate">
                                <label for="jumlah_penumpang">Jumlah Penumpang</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">monetization_on</i>
                                <input id="total_tarif" type="text" class="validate" readonly style="cursor: no-drop;">
                                <label for="total_tarif">Total Tarif</label>
                                <input type="hidden" name="id_detail" id="id_detail" value="<?php echo $nomotDetail ?>">
                                <input type="hidden" name="id_tarif" id="id_tarif">
                                <input type="hidden" name="status_bayar" id="status_bayar" value="BOOKING">
                                <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('idClient') ?>">
                            </div>
                        </div>
                        <button class="waves-effect waves-light btn" id="booking" type="button"><i class="material-icons left">payment</i>booking</button>    
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
