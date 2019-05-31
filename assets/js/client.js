$(document).ready(function(){
    $('#tblTampilPnb').hide();
    $(document).on('click','#tmbCariPnb',function(){
        asaltujuan();
    });
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
        console.log(id_penerbangan);
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
                    $('#tarif_per_kursi').val(res.tarif_bisnis);
                    $('#id_tarif').val(res.id_tarif);
                }else{
                    $('#tarif_per_kursi').val(res.tarif_ekonomi);
                    $('#id_tarif').val(res.id_tarif);
                }
            }
        });
    });
    $(document).on('keyup','#jumlah_penumpang',function(e){
        jml = $('#jumlah_penumpang').val();
        trf = $('#tarif_per_kursi').val();
        $('#total_tarif').val(parseInt(jml)*parseInt(trf));
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
                swal('Done!','Booking Selesai!','success');
            }
        });
    });
});