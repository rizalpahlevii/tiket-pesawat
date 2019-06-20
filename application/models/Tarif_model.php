<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Tarif_model extends CI_Model{
        public function insert($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }   
        public function deleteTarif($where){
            $this->db->delete('tarif',$where);
            return $this->db->affected_rows();
        }
        public function tmp_tarif(){
            $this->db->select('tarif_penerbangan.id_tarif,penerbangan.id_penerbangan, pesawat.type_pesawat, bandara.kota_bandara,tarif_penerbangan.tarif_bisnis,tarif_penerbangan.tarif_ekonomi,bandara.nama_bandara,penerbangan.tgl_penerbangan,penerbangan.asal,penerbangan.tujuan,penerbangan.jam_berangkat,penerbangan.jam_tiba');
            $this->db->from('tarif_penerbangan');
            $this->db->join('penerbangan', 'tarif_penerbangan.id_penerbangan = penerbangan.id_penerbangan');
            $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
            $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
            $this->db->where('penerbangan.tgl_penerbangan >=',date('Y-m-d'));
            return $this->db->get();
        }
        public function buat_kode(){
            $this->db->select('Right(tarif_penerbangan.id_tarif,5) as kode ',false);
            $this->db->order_by('id_tarif', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tarif_penerbangan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
            $kodejadi  = "TRF" . $kodemax;
            return $kodejadi;
        }
    }
?>