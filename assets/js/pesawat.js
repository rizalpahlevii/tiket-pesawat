$(document).ready(function(){
    const flashData = $('.flash-data').data('flashdata');
    if(flashData){
        swal('Done!',flashData,'success');
    }
    $(document).ready(function(){
        $('#tableku').dataTable();
    });
    $(document).ready(function(){
        $('#tblku').dataTable();
    });
    $(document).on('click', '.tmb-edit', function(){
        var id = $(this).data('kode');
        $.ajax({
            url : base_url + 'pesawat/show',
            method : 'POST',
            data: {
                id : id
            },
            success:function(result){
                var json_data = JSON.parse(result);
                console.log(json_data);
                $('#id_pesawatUpdate').val(json_data.id_pesawat);
                $('#type_pesawatUpdate').val(json_data.type_pesawat);
                $('#jml_kursi_bisnisUpdate').val(json_data.jml_kursi_bisnis);
                $('#jml_kursi_ekonomiUpdate').val(json_data.jml_kursi_ekonomi);
                $('#gambarku').attr("src", '');
                $('#gambarku').attr("src", json_data.image);
                $('#modalEdit').modal('show');
            }
        });
    });


    $(document).on('click','.bdr-edit',function(){
        var id = $(this).data('kode');
        $.ajax({
            url : base_url + 'bandara/show',
            method : 'POST',
            data: {
                id : id
            },
            success:function(result){
                var json_data = JSON.parse(result);
                $('#id_bandaraUpdate').val(json_data.id_bandara);
                $('#kode_bandaraUpdate').val(json_data.kode_bandara);
                $('#nama_bandaraUpdate').val(json_data.nama_bandara);
                $('#kota_bandaraUpdate').val(json_data.kota_bandara);
                $('#bdrEdit').modal('show');
            }
        });
    });
    $(document).on('click','#tmb_id_pesawat', function(){
        $('#modalPesawat').modal('show');
        tampiltablepesawat();
    });
    $(document).on('click','#id_pesawat', function(){
        $('#modalPesawat').modal('show');
        tampiltablepesawat();
    });
    function tampiltablepesawat(){
        var cod = "oke";
        var html = "";
        $.ajax({
            url : base_url + 'penerbangan/tablepesawat',
            method : 'POST',
            data : {id:cod},
            success:function(response){
                res = JSON.parse(response);
                $.each(res, function(i,data){
                    html += `<tr>
                                <td>` + i + `</td>
                                <td>` + data.id_pesawat + `</td>
                                <td><img alt="image" src="` + base_url + `assets/master/pesawat/` + data.image + `" class="rounded-circle" width="35" data-toggle="tooltip" title="` + data.type_pesawat + `"></td>
                                <td>` + data.type_pesawat + `</td>
                                <td>` + data.jml_kursi_ekonomi + `</td>
                                <td>` + data.jml_kursi_bisnis + `</td>
                                <td>` + `<button type="button" data-kode="`+ data.id_pesawat +`" class="btn btn-primary plh-pesawat"><i class="fas fa-pen"></i></button>` + `</td>
                            </tr>`
                });
                $('#tbodypesawat').html(html);   
            }
        });
    }

    $(document).on('click','.plh-pesawat', function(){
        iko = $(this).data('kode');
        $.ajax({
            url : base_url + 'penerbangan/pesawatbyid',
            method: 'POST',
            data: {
                id: iko
            },
            success:function(hasil){
                res = JSON.parse(hasil);
                $('#id_pesawat').val(res.id_pesawat);
                $('#nama_pesawat').val(res.type_pesawat);
                $('#gambarku').attr("src","");
                $('#gambarku').attr('src',res.image)
                $('#jml_kursi_ekonomi').val(res.jml_kursi_ekonomi);
                $('#jml_kursi_bisnis').val(res.jml_kursi_bisnis);
                $('#modalPesawat').modal('hide');
            }
        });
    });
    $(document).on('click','#tmb_id_bandara', function(){
        $('#modalBandara').modal('show');
        tampiltablebandara();
    });
    $(document).on('click','#id_bandara', function(){
        $('#modalBandara').modal('show');
        tampiltablebandara();
    });
    function tampiltablebandara(){
        var cod = "oke";
        var html = "";
        $.ajax({
            url : base_url + 'penerbangan/tablebandara',
            method : 'POST',
            data : {id:cod},
            success:function(response){
                res = JSON.parse(response);
                $.each(res, function(i,data){
                    html += `<tr>
                                <td>` + i + `</td>
                                <td>` + data.id_bandara + `</td>
                                <td>` + data.kode + `</td>
                                <td>` + data.nama_bandara + `</td>
                                <td>` + data.kota_bandara + `</td>
                                <td>` + `<button type="button" data-kode="`+ data.id_bandara +`" class="btn btn-primary plh-bandara"><i class="fas fa-pen"></i></button>` + `</td>
                            </tr>`
                });
                $('#tbodybandara').html(html);   
            }
        });
    }
    $(document).on('click','.plh-bandara', function(){
        iko = $(this).data('kode');
        console.log(iko);
        $.ajax({
            url : base_url + 'penerbangan/bandarabyid',
            method: 'POST',
            data: {
                id: iko
            },
            success:function(hasil){
                res = JSON.parse(hasil);
                $('#id_bandara').val(res.id_bandara);
                $('#kode_bandara').val(res.kode_bandara);
                $('#nama_bandara').val(res.nama_bandara);
                $('#kota_bandara').val(res.kota_bandara);
                $('#asal_penerbangan').val(res.kota_bandara);
                $('#modalBandara').modal('hide');
            }
        });
    });
    $(document).on('click','#detail-pnb',function(){
        id = $(this).data('kode');
        $.ajax({
            url : base_url + 'penerbangan/penerbanganbyid',
            method :'POST',
            data : {
                id:id
            },
            success:function(hasil){
                res = JSON.parse(hasil);
                console.log(res);
                $('#exampleModalCenterTitle').html('Detail Penerbangan '+res.id_penerbangan);
                $('#asal').html(res.asal);
                $('#tujuan').html(res.tujuan);
                $('#jam_berangkat').html(res.jam_berangkat);
                $('#jam_tiba').html(res.jam_tiba);
                $('#tgl').html(res.tgl_penerbangan);
                $('#kota').html(res.tempat_bandara);
                $('#nama_pesawat').html(res.nama_pesawat);
                $('#nama_bandara').html(res.nama_bandara);
                $('#modalDetail').modal('show');
            }
        });
    });
    $(document).on('click','#tmb_id_penerbangan',function(){
        $('#modalPenerbangan').modal('show');
    });
    $(document).on('click','#id_penerbangan',function(){
        $('#modalPenerbangan').modal('show'); 
    });
    $(document).on('click','#plh-penerbangan',function(){
        kode = $(this).data('kode');
        $.ajax({
            url : base_url + 'tarif/tarifbyid',
            method: 'POST',
            data: {
                id: kode
            },
            success:function(hasil){
                res = JSON.parse(hasil)
                console.log(res);
                $('#id_penerbangan').val(res.id_penerbangan);
                $('#tanggal_penerbangan').val(res.tanggal_penerbangan);
                $('#asal_penerbangan').val(res.asal_penerbangan);
                $('#nama_pesawat').val(res.nama_pesawat);
                $('#nama_bandara').val(res.nama_bandara);
                $('#tujuan_penerbangan').val(res.tujuan_penerbangan);
                $('#jam_berangkat').val(res.jam_berangkat);
                $('#jam_tiba').val(res.jam_tiba);
                $('#modalPenerbangan').modal('hide');
            }
        });
    });
    $('#tujuan_penerbangan').on('keyup',function(e){
        if(e.keyCode == 13){
            asaltujuan();
        }
    });
    function asaltujuan(){
        var td  = "";
        if( $('#asal_penerbangan').val() != "" && $('#tujuan_penerbangan').val() != "" ){
            $.ajax({    
                url : base_url + 'booking/caripnb',
                method : 'POST',
                data : {
                    asal : $('#asal_penerbangan').val(),
                    tujuan : $('#tujuan_penerbangan').val()
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
                                <td><button type="button" class="btn btn-primary" id="plh-booking" data-kode="` + res[i].id_penerbangan + `"><i class="fas fa-pen"></i></button></td>
                            </tr>`;
                        });
                        $('#eras').html('');
                        $('#ertuj').html('');
                        $('#notfound').html('');
                        $('#tbodybooking').html(td);
                        $('#tblbooking').show('slow');
                    }else{
                        $('#notfound').html('<p class="text-danger text-center">Data yang anda cari tidak ada!</p>');
                        $('#tblbooking').show('slow');
                        console.log('ggl');
                    }
                }
            });
        }else{
            $('#tbodybooking').hide('');
            $('#eras').html('<small class="text-danger pl-3">Form Tidak Boleh Kosong</small>');
            $('#ertuj').html('<small class="text-danger pl-3">Form Tidak Boleh Kosong</small>');
            console.log('kosong')
        }
    }
    $(document).on('click','#btn-cari',function(){
        var td  = "";
        if( $('#asal_penerbangan').val() != "" && $('#tujuan_penerbangan').val() != "" ){
            $.ajax({    
                url : base_url + 'booking/caripnb',
                method : 'POST',
                data : {
                    asal : $('#asal_penerbangan').val(),
                    tujuan : $('#tujuan_penerbangan').val()
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
                                <td><button type="button" class="btn btn-primary" id="plh-booking" data-kode="` + res[i].id_penerbangan + `"><i class="fas fa-pen"></i></button></td>
                            </tr>`;
                        });
                        $('#eras').html('');
                        $('#ertuj').html('');
                        $('#notfound').html('');
                        $('#tbodybooking').html(td);
                        $('#tblbooking').show('slow');
                    }else{
                        $('#notfound').html('<p class="text-danger text-center">Data yang anda cari tidak ada!</p>');
                        $('#tblbooking').show('slow');
                        console.log('ggl');
                    }
                }
            });
        }else{
            $('#tbodybooking').hide('');
            $('#eras').html('<small class="text-danger pl-3">Form Tidak Boleh Kosong</small>');
            $('#ertuj').html('<small class="text-danger pl-3">Form Tidak Boleh Kosong</small>');
            console.log('kosong')
        }
    });
    $(document).on('click','#btn-reset',function(){
        $('#asal_penerbangan').val('');
        $('#tujuan_penerbangan').val('');
        $('#tblbooking').hide();
    })
    $('#tblbooking').hide();
    $(document).on('click','#plh-booking',function(){
        kode = $(this).data('kode');
        $.ajax({
            url : base_url + 'booking/pilihpnb',
            method : 'POST',
            data : {
                id:kode
            },
            success:function(hasil){
                res = JSON.parse(hasil);
                $('#id_penerbangan').val(res.id_penerbangan);
                $('#tanggal_penerbangan').val(res.tgl_penerbangan);
                $('#nama_bandara').val(res.nama_bandara);
                $('#kota_bandara').val(res.kota_bandara);
                $('#asal_penerbangan2').val(res.asal);
                $('#tujuan_penerbangan2').val(res.tujuan);
                $('#nama_bandara').val(res.nama_bandara);
                $('#jam_keberangkatan').val(res.jam_berangkat);
                $('#jam_tiba').val(res.jam_tiba);
                $('#nama_bandara').val(res.nama_bandara);
                $('#tarif_bisnis').val(res.tarif_bisnis);
                $('#tarif_ekonomi').val(res.tarif_ekonomi);
                $('#nama_pesawat').val(res.type_pesawat);
                $('#jml_kursi_bisnis').val(res.jml_kursi_bisnis);
                $('#jml_kursi_ekonomi').val(res.jml_kursi_ekonomi);
            }
        });   
    });
    $(document).on('click','#id_customer_book',function(){
        $('#modalPlhCst').modal('show');
    });
    $(document).on('click','#tmb_plh_cst',function(){
        $('#modalPlhCst').modal('show');
    });
    $(document).on('click','.plh-cst',function(){
        kode = $(this).data('kode');
        $.ajax({
            url : base_url + 'booking/plhcst',
            method : 'POST',
            data : {
                id:kode
            },
            success:function(hasil){
                res = JSON.parse(hasil);
                $('#id_customer_book').val(res.id_customer);
                $('#nama_customer').val(res.nama);
                $('#email').val(res.email);
                $('#kota').val(res.kota);
                $('#negara').val(res.negara);
                $('#modalPlhCst').modal('hide');
            }
        });
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
    $(document).on('keyup','#jml_penumpang',function(){
        tarif = $('#tarif_per_kursi').val();
        jml = $(this).val();
        result = tarif * jml;
        $('#total_tarif').val(result);
    });
    $(document).on('click','#tombol_booking',function(){
        id_detail = $('#id_detail').val();
        // console.log('oke');
        $.ajax({
            url : base_url + 'booking/insert',
            method : 'POST',
            data : {
                id_booking : $('#id_booking').val(),
                id_customer_book : $('#id_customer_book').val(),
                tanggal_booking : $('#tanggal_booking').val(),
                id_penerbangan : $('#id_penerbangan').val(),
                jml_penumpang : $('#jml_penumpang').val(),
                kelas_penerbangan : $('#kelas_penerbangan').val(),
                total_tarif : $('#total_tarif').val(),
                id_tarif : $('#id_tarif').val()
            },
            success:function(response){
                conv = JSON.parse(response);
                if(conv.status != "false"){
                    document.location.href=base_url+'passenger/detail/'+$('#id_detail').val();
                }else{
                    document.location.href=base_url+'booking';
                }
            }
        });
    });
    // tombol cetak tiket
    $(document).on('click','#cetak_tiket',function(){
        var id_detail = $('#id_detail').val();
        window.open(base_url + 'passenger/tiket/'+id_detail);
    });
});