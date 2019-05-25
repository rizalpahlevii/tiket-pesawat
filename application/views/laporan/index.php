<section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Laporan</a></div>
              <div class="breadcrumb-item">Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Laporan</h4>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="pencarian">Pilih Berdasarkan</label>
                          <select class="form-control" name="pencarian" id="pencarian">
                            <option disabled selected>--Pencarian--</option>
                            <option value="bulan">Bulan</option>
                            <option value="tanggal">Tanggal</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-6" style="display: none;" id="cardTanggal">
                        <div class="row">
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label for="tgl_awal_c">Tanggal Awal</label>
                              <input type="date" name="tgl_awal_c" id="tgl_awal_c" class="form-control" onchange="per_tanggal()">
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label for="tgl_akhir_c">Tanggal Akhir</label>
                              <input type="date" name="tgl_akhir_c" id="tgl_akhir_c" class="form-control" onchange="per_tanggal()">
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label for="cetak"></label>
                              <button type="button" onclick="cetak('table_out')" class="btn btn-primary mt-4" id="cetak"><i class="fas fa-print"></i></button>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <div class="col-sm-6" style="display: none;" id="cardBulan">
                          <div class="row">
                            <div class="col-sm-5">
                            <div class="form-group">
                              <label for="bulan">Bulan</label>
                              <select class="form-control" id="bulan_c" onchange="per_bulan()">
                                <option value="">----Bulan----</option>
                                <option value="01">Januari</option>
                                <option value="02">Febuari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">November</option>
                                <option value="11">Oktober</option>
                                <option value="12">Desember</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label for="tahun_c">Tahun</label>
                              <select class="form-control" id="tahun_c" onchange="per_bulan()">
                                <?php 
                                  $muali = date('Y') - 3;
                                  for ($i= $muali; $i < $muali +4; $i++) { 
                                    $sel = $i == date('Y') ? 'selected ="selected" ' : '' ;
                                    echo '<option value= "'.$i.'"'.$sel.'>'.$i.'</option>';
                                  }
                                 ?>
                              </select>

                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label for="cetak"></label>
                              <button type="button" onclick="cetak('table_out')" class="btn btn-primary mt-4" id="cetak"><i class="fas fa-print"></i></button>
                            </div>
                          </div>
                      </div>
                         
                      
                    </div>
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Laporan Table</h4>
                  </div>

                  <div class="card-body">
                   <div class="table-responsive" id="table_out">
                    </div>
                    
                  </div>
                  
                </div>
              </div>
            </div>
            </div>
          </div>
        </section>
        <iframe src="about:blank" id="printing-frame" name="print_frame" style="display: none;"></iframe>

  <script src="<?php echo base_url()  ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#pencarian',function(){
      valPencarian = $(this).val();
      if(valPencarian != "bulan"){
        // tanggal
        $('#cardBulan').css({"display":"none"});
        $('#cardTanggal').css({"display":"block"});
      }else{
        // bulan
        $('#cardBulan').css({"display":"block"});
        $('#cardTanggal').css({"display":"none"});
      }
    });
  });
  function cetak(idTable){
    var elm = $('#table_out').html();
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = elm;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
  }
  function per_tanggal(){
      $.ajax({
        url : base_url + 'laporan/cetakPerTanggal',
        method: 'POST',
        data : { 
          tgl_awal : $('#tgl_awal_c').val(),
          tgl_akhir : $('#tgl_akhir_c').val()
        },
        success:function(res){
          $('#table_out').html(res);
        }
      });
    }
    function per_bulan(){
      $.ajax({
        url : base_url + 'laporan/cetakPerBulan',
        method: 'POST',
        data : { 
          bulan : $('#bulan_c').val(),
          tahun : $('#tahun_c').val()
        },
        success:function(res){
          $('#table_out').html(res);
        }
      });
    } 
</script>

