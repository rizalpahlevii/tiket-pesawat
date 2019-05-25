<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Pesawat_model extends CI_Model{

        public function insert($table,$data){
            $this->db->insert($table,$data); 
            return $this->db->affected_rows();         
        }
        public function delete($table,$where){
            $this->db->delete($table,$where);
            return $this->db->affected_rows();
        }
        public function view(){
            $this->db->select('id_pesawat, type_pesawat, jml_kursi_ekonomi,jml_kursi_bisnis');
            $this->db->from('pesawat');
            return $this->db->get()->result();
        }
        public function update($table,$data,$where){
            $this->db->set($data);
            $this->db->where($where);
            $this->db->update($table);
            return $this->db->affected_rows();
        }

        function buat_kode(){
            $this->db->select('Right(pesawat.id_pesawat,4) as kode ',false);
            $this->db->order_by('id_pesawat', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pesawat');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "PSW" . $kodemax;
            return $kodejadi;
        }
    }
?>