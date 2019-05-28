<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Customer_model extends CI_Model{

        public function delete($table,$where){
            $this->db->delete($table,$where);
            return $this->db->affected_rows();
        }
        public function nomot(){
            $this->db->select('Right(customer.id_customer,4) as kode ',false);
            $this->db->order_by('id_customer', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('customer');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "CST" . $kodemax;
            return $kodejadi;
        }
        public function update_aktif($table, $where){
            $data = [
                'status' => "0"
            ];
            $this->db->set($data);
            $this->db->where($where);
            $this->db->update($table);
            return $this->db->affected_rows();
        }

        public function update_nonaktif($table, $where){
            $data = [
                'status' => "1"
            ];
            $this->db->set($data);
            $this->db->where($where);
            $this->db->update($table);
            return $this->db->affected_rows();
        }
    }
?>