<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Passenger_model extends CI_Model{

        public function c_detail($where){
            $this->db->select('*');
            $this->db->from('booking');
            $this->db->join('detail_booking','detail_booking.id_booking=booking.id_booking');
            $this->db->join('tarif_penerbangan','tarif_penerbangan.id_tarif = detail_booking.id_tarif');
            $this->db->join('penerbangan','penerbangan.id_penerbangan=tarif_penerbangan.id_penerbangan');
            $this->db->join('pesawat','pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara = penerbangan.id_bandara');
            $this->db->join('customer','customer ON customer.id_customer=booking.id_customer');
            $this->db->where($where);
            return $this->db->get();
        }
        public function c_tiket($where){
            $this->db->select('*');
            $this->db->from('booking');
            $this->db->join('detail_booking','booking.id_booking=detail_booking.id_booking');
            $this->db->join('tarif_penerbangan ','detail_booking.id_tarif=tarif_penerbangan.id_tarif');
            $this->db->join('penerbangan ','tarif_penerbangan.id_penerbangan=penerbangan.id_penerbangan');
            $this->db->join('pesawat','penerbangan.id_pesawat = pesawat.id_pesawat');
            $this->db->join('bandara','bandara.id_bandara=penerbangan.id_bandara');
            $this->db->join('passenger','passenger ON detail_booking.id_detail = passenger.id_detail');
            $this->db->where($where);
            return $this->db->get();       
        }
        // public function kode_passenger($where){
        //     $this->db->select('Right(passenger.nomor_kursi,2) as kode ',false);
        //     $this->db->order_by('nomor_kursi', 'desc');
        //     $this->db->where($where);
        //     $this->db->limit(1);
        //     $query = $this->db->get('passenger');
        //     if($query->num_rows()<>0){
        //         $data = $query->row();
        //         $kode = intval($data->kode)+1;
        //     }else{
        //         $kode = 1;

        //     }
        //     $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
        //     $kodejadi  = "KRS" . $kodemax;
        //     return $kodejadi;
        // }
        public function kode_bisnis($where){
            $this->db->select('Right(passenger.nomor_kursi,2) as kode ',false);
            $this->db->order_by('nomor_kursi', 'desc');
            $this->db->where($where);
            $this->db->limit(1);
            $query = $this->db->get('passenger');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
            $kodejadi  = "BIS" . $kodemax;
            return $kodejadi;
        }

        public function kode_ekonomi($where){
            $this->db->select('Right(passenger.nomor_kursi,2) as kode ',false);
            $this->db->order_by('nomor_kursi', 'desc');
            $this->db->where($where);
            $this->db->limit(1);
            $query = $this->db->get('passenger');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
            $kodejadi  = "EKO" . $kodemax;
            return $kodejadi;
        }
        public function cetak_invoice_bukti($where){
            return $this->db->query("SELECT customer.*, penerbangan.*,tarif_penerbangan.tarif_bisnis,tarif_penerbangan.tarif_ekonomi,pesawat.*,booking.*, bandara.* FROM penerbangan INNER JOIN booking ON booking.id_penerbangan=penerbangan.id_penerbangan INNER JOIN detail_booking ON detail_booking.id_booking = booking.id_booking INNER JOIN tarif_penerbangan ON tarif_penerbangan.id_penerbangan=penerbangan.id_penerbangan INNER JOIN customer ON booking.id_customer=customer.id_customer INNER JOIN bandara ON bandara.id_bandara=penerbangan.id_bandara INNER JOIN pesawat ON pesawat.id_pesawat=penerbangan.id_pesawat WHERE booking.id_customer = '$where'");
        }
        public function getPenumpangidpidc($idp,$idc){
            return $this->db->query("SELECT passenger.* FROM passenger INNER JOIN detail_booking ON detail_booking.id_detail=passenger.id_detail INNER JOIN booking ON booking.id_booking=detail_booking.id_booking INNER JOIN penerbangan on penerbangan.id_penerbangan=booking.id_penerbangan INNER JOIN customer on customer.id_customer = booking.id_customer WHERE penerbangan.id_penerbangan ='$idp' AND booking.id_customer='$idc'");
        }
    }
?>