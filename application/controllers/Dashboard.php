<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboard extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Dashboard_model','dashboard');
        }

        public function index(){
            $data['page'] = "Dashboard";
            $data['tmp_pesawat'] = $this->db->get('pesawat')->num_rows();
            $data['tmp_bandara'] = $this->db->get('bandara')->num_rows();
            $data['tmp_customer'] = $this->db->get('customer')->num_rows();
            $data['tmp_penerbangan'] = $this->db->get('penerbangan')->num_rows();
            $data['tmp_pesan'] = $this->db->get('message')->num_rows();
            $this->template->load('template','dashboard',$data);
        }
        public function getChartPendapatan(){
            $query = $this->dashboard->getQueryChartPendapatan()->result_array();
            if(empty($query)){
                $data['grafik'] = [0,0,0,0,0,0,0,0,0,0,0,0];
            }else{
                foreach ($query as $row) {
                    $data['grafik'][] = (float)$row['Januari'];
                    $data['grafik'][] = (float)$row['Februari'];
                    $data['grafik'][] = (float)$row['Maret'];
                    $data['grafik'][] = (float)$row['April'];
                    $data['grafik'][] = (float)$row['Mei'];
                    $data['grafik'][] = (float)$row['Juni'];
                    $data['grafik'][] = (float)$row['Juli'];
                    $data['grafik'][] = (float)$row['Agustus'];
                    $data['grafik'][] = (float)$row['September'];
                    $data['grafik'][] = (float)$row['Oktober'];
                    $data['grafik'][] = (float)$row['November'];
                    $data['grafik'][] = (float)$row['Desember'];

                }
            }
            echo json_encode($data['grafik']);
        }
        public function getChart(){
            $query = $this->dashboard->getQueryChart()->result_array();
            if(empty($query)){
                $data['grafik'] = [0,0,0,0,0,0,0,0,0,0,0,0];
            }else{
                foreach ($query as $row) {
                    $data['grafik'][] = (float)$row['Januari'];
                    $data['grafik'][] = (float)$row['Februari'];
                    $data['grafik'][] = (float)$row['Maret'];
                    $data['grafik'][] = (float)$row['April'];
                    $data['grafik'][] = (float)$row['Mei'];
                    $data['grafik'][] = (float)$row['Juni'];
                    $data['grafik'][] = (float)$row['Juli'];
                    $data['grafik'][] = (float)$row['Agustus'];
                    $data['grafik'][] = (float)$row['September'];
                    $data['grafik'][] = (float)$row['Oktober'];
                    $data['grafik'][] = (float)$row['November'];
                    $data['grafik'][] = (float)$row['Desember'];

                }
            }
            echo json_encode($data['grafik']);
        }
    }
