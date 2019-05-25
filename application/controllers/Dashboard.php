<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboard extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
        }

        public function index(){
            $data['page'] = "Dashboard";
            $data['tmp_pesawat'] = $this->db->get('pesawat')->num_rows();
            $data['tmp_bandara'] = $this->db->get('bandara')->num_rows();
            $data['tmp_customer'] = $this->db->get('customer')->num_rows();
            $data['tmp_penerbangan'] = $this->db->get('penerbangan')->num_rows();
            $this->template->load('template','dashboard',$data);
        }
    }
?>