<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Contact_model extends CI_Model{

        public function sendmessage($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }
    }
?>