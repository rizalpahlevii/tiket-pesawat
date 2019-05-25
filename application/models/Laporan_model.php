<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Laporan_model extends CI_Model{

        public function lapBooking($where){
            $this->db->select('booking.id_booking,booking.tgl_booking,pesawat.type_pesawat,penerbangan.asal,penerbangan.tujuan,tarif_penerbangan.tarif_bisnis,tarif_penerbangan.tarif_ekonomi,booking.jml_penumpang,booking.total_tarif ,booking.status_bayar,booking.kelas');
            $this->db->from('booking');
            $this->db->join('detail_booking','booking.id_booking=detail_booking.id_booking');
            $this->db->join('tarif_penerbangan','detail_booking.id_tarif=tarif_penerbangan.id_tarif');
            $this->db->join('penerbangan','tarif_penerbangan.id_penerbangan=penerbangan.id_penerbangan ');
            $this->db->join('pesawat','penerbangan.id_pesawat = pesawat.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara=penerbangan.id_bandara');
            $this->db->where($where);
            return $this->db->get();
        }
    }
?>