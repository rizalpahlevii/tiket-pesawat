<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Frontend_model extends CI_Model{

        public function tampilPnbTanggal($where){
            $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
            $this->db->from('penerbangan');
            $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
            $this->db->where($where);
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            return $this->db->get()->result();
        }
        public function tampilPnb(){
            $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
            $this->db->from('penerbangan');
            $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            return $this->db->get()->result();
        }
        public function tampilPnbAsalTujuan($where1,$where2){
            $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
            $this->db->from('penerbangan');
            $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
            $this->db->like($where1);
            $this->db->like($where2);
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            return $this->db->get()->result();
        }
        public function tampilPnbBandara($where){
            $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
            $this->db->from('penerbangan');
            $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
            $this->db->like($where);
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            return $this->db->get()->result();
        }
        public function tampilPnbPesawat($where){
            $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
            $this->db->from('penerbangan');
            $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
            $this->db->like($where);
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            return $this->db->get()->result();
        }
    }
?>