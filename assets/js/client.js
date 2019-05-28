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
                                <td><a href="` + base_url+ `gigantic/checkout/`+ res[i].id_penerbangan  + `" class="waves-effect waves-light btn"><i class="material-icons left">send</i></a></td>
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
});