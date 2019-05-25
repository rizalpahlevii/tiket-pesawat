<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_Model{

        public function getAll(){
            $this->db->select('user.*,role.role');
            $this->db->from('user');
            $this->db->join('role','role.id = user.role_id');
            $this->db->where('email !=' ,$this->session->userdata('email'));
            return $this->db->get();
        }
        public function getUserByEmail($where){
            return $this->db->get_where('user',$where);
        }
        public function insert($data){
            $this->db->insert('user',$data);
            return $this->db->affected_rows();
        }
        public function akun($table,$set,$where){
            $this->db->set($set);
            $this->db->where($where);
            $this->db->update($table);
            return $this->db->affected_rows();
        }
    }
?>