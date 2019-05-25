<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Customer_model extends CI_Model{

        public function delete($table,$where){
            $this->db->delete($table,$where);
            return $this->db->affected_rows();
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