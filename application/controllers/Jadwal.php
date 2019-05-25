<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Jadwal extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Jadwal_model','jadwal');
        }

        public function index(){
            $data['page'] = 'Jadwal Penerbangan';
            $data['jadwal'] = $this->jadwal->tmp_jadwal()->result();
            $this->template->load('template','jadwal/index',$data);
        }
    }
?>