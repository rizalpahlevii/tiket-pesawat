$(document).ready(function(){
    const flashData = $('.flash-data').data('flashdata');
    if(flashData){
        swal('Done!',flashData,'success');
    }
    $('#tblTampilPnb').hide();
    $(document).on('click','#tmbCariPnb',function(){
        asaltujuan();
    });
    ajaxFull();
    function asaltujuan(){
        var td  = "";
        if( $('.asalPenerbangan').val() != "" && $('.tujuanPenerbangan').val() != "" ){
            $.ajax({    
                url : base_url + 'gigantic/caripnb',
                method : 'POST',
                data : {
                    asal : $('.asalPenerbangan').val(),
                    tujuan : $('.tujuanPenerbangan').val()
                },
                success:function(hasil){
                    res = JSON.parse(hasil);
                    panjang = res.length;
                    console.log(res);
                    if( panjang > 0){
                        // Tampilkan table
                        $.each(res, function(i,data){
                            td += `<tr>
                                <td>` + i + `</td>
                                <td>` + res[i].id_penerbangan + `</td>
                                <td>` + res[i].type_pesawat + `</td>
                                <td>` + res[i].nama_bandara + `</td>
                                <td>` + res[i].tgl_penerbangan + `</td>
                                <td>` + res[i].asal + `</td>
                                <td>` + res[i].tujuan + `</td>
                                <td>` + res[i].jam_berangkat + `</td>
                                <td>` + res[i].jam_tiba + `</td>
                                <td>` + res[i].tarif_bisnis + `</td>
                                <td>` + res[i].tarif_ekonomi + `</td>
                                <td><a href="` + base_url+ `gigantic/booking/`+ res[i].id_penerbangan  + `" class="waves-effect waves-light btn"><i class="material-icons left">send</i></a></td>
                            </tr>`;
                        });
                        $('#tbodybooking').html(td);
                        $('#tblTampilPnb').show('slow');
                    }else{
                        swal('Error!','Data Yang anda cari tidak ada','error');
                    }
                }
            });
        }else{
            swal('Error!','From tidak boleh kosong','error');
        }
    }
    $('.tujuanPenerbangan').on('keyup',function(e){
        if(e.keyCode == 13){
            asaltujuan();
        }
    });
    $(document).ready(function(){
        $('select').formSelect();
    });
    $(document).on('change','#kelas_penerbangan',function(){
        kelas = $(this).val();
        id_penerbangan = $('#id_penerbangan').val();
        $.ajax({
            url : base_url + 'booking/optkelas',
            method : 'POST',
            data : {
                kelas : kelas,
                id_penerbangan : id_penerbangan
            },
            success:function(hasil){
                res = JSON.parse(hasil);
                if( kelas != "EKONOMI" ){
                    // Jalankan bisnis
                    $('#lb_tarif_per_kursi').click();
                    $('#tarif_per_kursi').val(res.tarif_bisnis);
                    $('#id_tarif').val(res.id_tarif);
                }else{
                    $('#lb_tarif_per_kursi').click();
                    $('#tarif_per_kursi').val(res.tarif_ekonomi);
                    $('#id_tarif').val(res.id_tarif);
                }
            }
        });
    });
    $(document).on('keyup','#jumlah_penumpang',function(){
        $('#lb_total_tarif').click();
        $('#lb_jml_penumpang').click(); 
        $('#lb_total_tarif').click();
        $('#lb_jml_penumpang').click(); 
        jml = $(this).val();
        trf = $('#tarif_per_kursi').val();
        result = jml*trf;
        $('#total_tarif').val(result);
    })
    $(document).on('click','#booking',function(){
        id_detail = $('#id_detail').val();
        // console.log('oke');
        
        $.ajax({
            url : base_url + 'booking/insert',
            method : 'POST',
            data : {
                id_booking : $('#id_booking').val(),
                id_customer_book : $('#id_user').val(),
                tanggal_booking : $('#tgl_booking').val(),
                id_penerbangan : $('#id_penerbangan').val(),
                jml_penumpang : $('#jumlah_penumpang').val(),
                kelas_penerbangan : $('#kelas_penerbangan').val(),
                total_tarif : $('#total_tarif').val(),
                id_tarif : $('#id_tarif').val(),
                status_bayar : $('#status_bayar').val()
            },
            success:function(response){
                conv = JSON.parse(response);
                if(conv.status != false){
                    swal('Done!','Booking Selesai!','success').then(function(){
                        window.location.href = base_url + 'gigantic/passenger/'+$('#id_detail').val();
                    });    
                }else
                    swal('Error!','Gagal!','Error');
            }
        });
    });
    $(document).on('change','#filter',function(){
      value_filter = $(this).val();
      if(value_filter == "Tanggal"){
        $('#fasaltujuan').css({'display' : 'none'});
        $('#fpesawat').css({'display' : 'none'});
        $('#fbandara').css({'display' : 'none'});
        $('#ftanggal').css({'display' : 'block'});
      }else if(value_filter == "Asal dan Tujuan"){
        $('#fpesawat').css({'display' : 'none'});
        $('#fbandara').css({'display' : 'none'});
        $('#ftanggal').css({'display' : 'none'});
        $('#fasaltujuan').css({'display' : 'block'});
      }else if(value_filter == "Pesawat"){
        $('#fbandara').css({'display' : 'none'});
        $('#ftanggal').css({'display' : 'none'});
        $('#fasaltujuan').css({'display' : 'none'});
        $('#fpesawat').css({'display' : 'block'});
      }else if(value_filter == "Bandara"){
        $('#ftanggal').css({'display' : 'none'});
        $('#fasaltujuan').css({'display' : 'none'});
        $('#fpesawat').css({'display' : 'none'});
        $('#fbandara').css({'display' : 'block'});
      }else{
        $('#ftanggal').css({'display' : 'none'});
        $('#fasaltujuan').css({'display' : 'none'});
        $('#fpesawat').css({'display' : 'none'});
        $('#fbandara').css({'display' : 'none'});
        ajaxFull();
      }
    });
    $(document).on('click','#btnClientCari',function(){
        flt = $('#filter').val();
        if(flt == "Tanggal"){
            if($('#tgl_awal').val() != "" || $('#tgl_akhir').val() != ""){
               ajaxTanggal(); 
            }else{
                swal('Error!','Form tidak boleh kosong!','error');
            }       
        }else if(flt == "Asal dan Tujuan"){
            if($('#asal_penerbangan').val() != "" || $('#tujuan_penerbangan').val() != ""){
                ajaxAsalTujuan();
            }else{
                swal('Error!','Form tidak boleh kosong!','error');
            }
        }else if(flt == "Pesawat"){
            if($('#nama_pesawat').val() != ""){
                ajaxPesawat();    
            }else{
                swal('Error!','Form tidak boleh kosong!','error');
            }
        }else if(flt == "Bandara"){
            if($('#nama_bandara').val() != ""){
                ajaxBandara();
            }else{
                swal('Error!','Form tidak boleh kosong!','error');
            }
        }else{
            ajaxFull();
        }
    });
    function ajaxFull(){
        $.ajax({
            url : base_url + 'gigantic/ajxpnb/full',
            method : 'POST',
            data : {
              cek : 'ok'
            },
            success:function(data){
              $('#tblout').html(data);
            }
        });
    }

    function ajaxTanggal(){
      $.ajax({
        url : base_url + 'gigantic/ajxpnb/Tanggal',
        method : 'POST',
        data : {
          tgl_awal : $('#tgl_awal').val(),
          tgl_akhir :$('#tgl_akhir').val()
        },
        success:function(data){
          $('#tblout').html(data);
        }
      });
    }
    function ajaxAsalTujuan(){
      $.ajax({
        url : base_url + 'gigantic/ajxpnb/asaltujuan',
        method : 'POST',
        data : {
          asal : $('#asal_penerbangan').val(),
          tujuan :$('#tujuan_penerbangan').val()
        },
        success:function(data){
          $('#tblout').html(data);
        }
      });
    }
    function ajaxBandara(){
      $.ajax({
        url : base_url + 'gigantic/ajxpnb/Bandara',
        method : 'POST',
        data : {
          nama_bandara : $('#nama_bandara').val()
        },
        success:function(data){
          $('#tblout').html(data);
        }
      });
    }
    function ajaxPesawat(){
      $.ajax({
        url : base_url + 'gigantic/ajxpnb/Pesawat',
        method : 'POST',
        data : {
          nama_pesawat : $('#nama_pesawat').val()
        },
        success:function(data){
          $('#tblout').html(data);
        }
      });
    }
});