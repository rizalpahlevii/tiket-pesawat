<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth_model extends CI_Model{

        public function getLogin($where){
            $this->db->select('user.*,role.role');
            $this->db->from('user');
            $this->db->join('role','role.id = user.role_id');
            $this->db->where($where);
            return $this->db->get();
        }
    }
?>