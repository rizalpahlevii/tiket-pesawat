<?php 
    function cekAkses(){
        $ci = get_instance();
        $level = $ci->session->userdata('level');
        // cek session
        if( ! $ci->session->userdata('pesawat_admin') ){
            redirect('auth');
        }
        // cek akses manager
        if($ci->session->userdata('level') == "Manager"){
            if($ci->uri->segment(1) != "dashboard" AND $ci->uri->segment(1) != "laporan" AND $ci->uri->segment(2) != "profile"){
                redirect('auth/blocked');
            }   
        }   
        // cek akses petugas
        if($ci->session->userdata('level') == "Petugas"){
            if($ci->uri->segment(1) != "dashboard" AND $ci->uri->segment(1) != "penerbangan" AND $ci->uri->segment(1) != "tarif" AND $ci->uri->segment(1) != "jadwal" AND $ci->uri->segment(1) != "booking" AND $ci->uri->segment(1)!= "passenger" AND $ci->uri->segment(2) != "profile"){
                redirect('auth/blocked');
            }
        }
    }

 ?>