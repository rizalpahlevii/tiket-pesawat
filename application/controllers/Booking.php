<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Booking extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Booking_model','booking');

        }

        public function index(){
            $data['page'] = 'Booking';
            $data['booking'] = $this->booking->tmp_booking()->result();
            $this->template->load('template','booking/index',$data);
        }
        public function insert(){
           $data_booking = [
                'id_booking' => $this->input->post('id_booking'),
                'id_customer' => $this->input->post('id_customer_book'),
                'id_penerbangan' => $this->input->post('id_penerbangan'),
                'tgl_booking' => $this->input->post('tanggal_booking'),
                'jml_penumpang' => $this->input->post('jml_penumpang'),
                'kelas' => $this->input->post('kelas_penerbangan'),
                'total_tarif' => $this->input->post('total_tarif'),
                'status_bayar' => 'TERBAYAR',
           ]; 
           $data_detail = [
                'id_detail' => $this->booking->buat_kode_detail(),
                'id_tarif' => $this->input->post('id_tarif'),
                'id_booking' => $this->input->post('id_booking')
           ];
           // var_dump($data_booking);
           // var_dump($data_detail);
           if($this->booking->insert_booking($data_booking) > 0 && $this->booking->insert_detail_booking($data_detail) > 0){
                $response = ['status' => "true"];
                // $arraySession = ['aksesPassenger' => true];
                // $this->session->set_userdata($arraySession);
                echo json_encode($response);
           }else{
                $response = ['status' => "false"];
                echo json_encode($response);
           }
        }
        public function create(){
            $data['nomotDetail'] = $this->booking->buat_kode_detail();
            $data['nomot'] = $this->booking->buat_kode();
            $data['customers'] = $this->db->get('customer')->result();
            $data['page'] = 'Form Booking';
            $this->template->load('template','booking/create',$data);
        }
        public function caripnb(){
            $asal = $this->input->post('asal');
            $tujuan = $this->input->post('tujuan');
            $qr = $this->booking->cari_form($asal,$tujuan)->result_array();
            echo json_encode($qr);
        }
        public function pilihpnb(){
            $where = ['penerbangan.id_penerbangan' => $this->input->post('id')];
            $qr = $this->booking->pilih_pnb($where)->row();
            echo json_encode($qr);
        }
        public function plhcst(){
            $where = ['id_customer' => $this->input->post('id')];
            $data = $this->booking->plhcst($where)->row();
            echo json_encode($data);
        }
        public function optkelas(){
            $where = ['id_penerbangan' => $this->input->post('id_penerbangan')];
            $qr = $this->db->get_where('tarif_penerbangan',$where)->row();
            echo json_encode($qr);
        }
    }
?>