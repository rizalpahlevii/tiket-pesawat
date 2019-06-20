<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Booking_model extends CI_Model{

        public function tmp_booking(){
            $this->db->select('booking.* ,customer.nama');
            $this->db->from('booking');
            $this->db->join('customer','customer.id_customer=booking.id_customer');
            return $this->db->get();
        }
        public function insert_booking($data){
            $this->db->insert('booking',$data);
            return $this->db->affected_rows();
        }
        public function insert_detail_booking($data){
            $this->db->insert('detail_booking',$data);
            return $this->db->affected_rows();
        }
        public function cari_form($asal,$tujuan){
            $this->db->select('penerbangan.id_penerbangan, pesawat.type_pesawat,bandara.kota_bandara,bandara.nama_bandara,penerbangan.tgl_penerbangan,penerbangan.asal,penerbangan.tujuan,penerbangan.jam_berangkat,penerbangan.jam_tiba ,tarif_penerbangan.tarif_bisnis,tarif_penerbangan.tarif_ekonomi');
            $this->db->from('penerbangan');
            $this->db->join('pesawat','pesawat.id_pesawat=penerbangan.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara=penerbangan.id_bandara');
            $this->db->join('tarif_penerbangan','tarif_penerbangan.id_penerbangan=penerbangan.id_penerbangan');
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            $this->db->like('penerbangan.asal',$asal);
            $this->db->like('penerbangan.tujuan',$tujuan);
            return $this->db->get();
        }
        public function buat_kode(){
            $this->db->select('Right(booking.id_booking,5) as kode ',false);
            $this->db->order_by('id_booking', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('booking');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
            $kodejadi  = "BKG" . $kodemax;
            return $kodejadi;
        }
        public function buat_kode_detail(){
            $this->db->select('Right(detail_booking.id_detail,5) as kode ',false);
            $this->db->order_by('id_detail', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('detail_booking');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
            $kodejadi  = "DTL" . $kodemax;
            return $kodejadi;
        }
        public function pilih_pnb($where){
            $this->db->select('penerbangan.id_penerbangan,penerbangan.tgl_penerbangan,bandara.nama_bandara,bandara.kota_bandara,penerbangan.asal,penerbangan.tujuan,penerbangan.jam_berangkat,penerbangan.jam_tiba,pesawat.type_pesawat,tarif_penerbangan.tarif_bisnis,tarif_penerbangan.tarif_ekonomi,pesawat.jml_kursi_ekonomi,pesawat.jml_kursi_bisnis');
            $this->db->from('penerbangan');
            $this->db->join('pesawat','pesawat.id_pesawat=penerbangan.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara=penerbangan.id_bandara');
            $this->db->join('tarif_penerbangan','tarif_penerbangan.id_penerbangan=penerbangan.id_penerbangan');
            $this->db->where($where);
            return $this->db->get();
        }
        public function pilih_pnb2($where){
            $this->db->select('penerbangan.id_penerbangan,penerbangan.tgl_penerbangan,bandara.nama_bandara,bandara.kota_bandara,bandara.kode,penerbangan.asal,penerbangan.tujuan,penerbangan.jam_berangkat,penerbangan.jam_tiba,pesawat.type_pesawat,pesawat.image,tarif_penerbangan.tarif_bisnis,tarif_penerbangan.tarif_ekonomi,pesawat.jml_kursi_ekonomi,pesawat.jml_kursi_bisnis');
            $this->db->from('penerbangan');
            $this->db->join('pesawat','pesawat.id_pesawat=penerbangan.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara=penerbangan.id_bandara');
            $this->db->join('tarif_penerbangan','tarif_penerbangan.id_penerbangan=penerbangan.id_penerbangan');
            $this->db->where($where);
            return $this->db->get();
        }
        public function plhcst($where){
            return $this->db->get_where('customer',$where);
        }
        public function ctk_konfirmasi($where){
            $this->db->select('booking.*,penerbangan.id_penerbangan,penerbangan.tgl_penerbangan,penerbangan.asal,penerbangan.tujuan,penerbangan.jam_berangkat,penerbangan.jam_tiba,pesawat.type_pesawat,bandara.*,tarif_penerbangan.* , customer.nama,customer.email,customer.negara,customer.id_customer,customer.kota,detail_booking.id_detail');
            $this->db->from('penerbangan');
            $this->db->join('booking','booking.id_penerbangan=penerbangan.id_penerbangan');
            $this->db->join('detail_booking','detail_booking.id_booking=booking.id_booking');
            $this->db->join('tarif_penerbangan','tarif_penerbangan.id_tarif=detail_booking.id_tarif');
            $this->db->join('bandara','penerbangan.id_bandara=bandara.id_bandara');
            $this->db->join('pesawat',' pesawat.id_pesawat=penerbangan.id_pesawat');
            $this->db->join('customer','customer.id_customer=booking.id_customer');
            $this->db->where($where);
            return $this->db->get();
        }
        public function updateStatusBayar($data,$where){
            $this->db->set($data);
            $this->db->where($where);
            $this->db->update('booking');
            return $this->db->affected_rows();
        }
    }
?>