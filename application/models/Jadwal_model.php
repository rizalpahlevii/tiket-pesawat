<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Jadwal_model extends CI_Model{

        public function tmp_jadwal(){
            $this->db->select(' penerbangan.id_penerbangan,penerbangan.tgl_penerbangan,penerbangan.asal,penerbangan.tujuan,penerbangan.jam_berangkat,penerbangan.jam_tiba,pesawat.type_pesawat,bandara.nama_bandara, bandara.kota_bandara,pesawat.jml_kursi_ekonomi,pesawat.jml_kursi_bisnis');
            $this->db->from('penerbangan');
            $this->db->join('pesawat','pesawat.id_pesawat=penerbangan.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara=penerbangan.id_bandara');
            $this->db->order_by('penerbangan.tgl_penerbangan ASC');
            return $this->db->get();          
        }
    }
?>