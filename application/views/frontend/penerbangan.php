<section id="about" class="about scrollspy">
      <div class="container">
        <div class="row">
          <h3 class="center light grey-text text-darken-3">Daftar Penerbangan</h3>
          <div class="row">
            <div class="input-field col s3">
              <i class="material-icons prefix">chevron_right</i>
              <select name="filter" id="filter">
                <option>None</option>
                <option>Tanggal</option>
                <option>Asal dan Tujuan</option>
                <option>Pesawat</option>
                <option>Bandara</option>
              </select>
              <label>Filter Berdasarkan</label>
            </div>
            <div id="ftanggal" style="display: none;">
              <div class="input-field col s4">
                <i class="material-icons prefix">date_range</i>
                <input id="tgl_awal" type="date" class="validate">
                <label for="tgl_awal">Tanggal Awal</label>
              </div>
              <div class="input-field col s4">
                <i class="material-icons prefix">date_range</i>
                <input id="tgl_akhir" type="date" class="validate">
                <label for="tgl_akhir">Tanggal Akhir</label>
              </div>
            </div>
            <div id="fasaltujuan" style="display: none;">
              <div class="input-field col s4">
                <i class="material-icons prefix">place</i>
                <input id="asal_penerbangan" type="text" class="validate">
                <label for="asal_penerbangan">Asal Penerbangan</label>
              </div>
              <div class="input-field col s4">
                <i class="material-icons prefix">place</i>
                <input id="tujuan_penerbangan" type="text" class="validate">
                <label for="tujuan_penerbangan">Tujuan Penerbangan</label>
              </div>
            </div>
            <div id="fpesawat" style="display: none;">
              <div class="input-field col s4">
                <i class="material-icons prefix">airplanemode_active</i>
                <input id="nama_pesawat" type="text" class="validate">
                <label for="nama_pesawat">Nama Pesawat</label>
              </div>
            </div>
            <div id="fbandara" style="display: none;">
              <div class="input-field col s4">
                <i class="material-icons prefix">home</i>
                <input id="nama_bandara" type="text" class="validate">
                <label for="nama_bandara">Nama Bandara</label>
              </div>
            </div>
            <div class="col s1" id="fbtnc">
              <label></label>
              <button class="waves-effect waves-light btn" id="btnClientCari">Cari</button>
            </div>

            
          </div>
          <div class="col m12 light" id="tblout">
                     
          </div>
        </div>
      </div>
    </section>
