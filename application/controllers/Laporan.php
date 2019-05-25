<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Laporan extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Laporan_model','laporan');
        }

        public function index(){
            $data = [
                'page' => 'Laporan'
            ];
            $this->template->load('template','laporan/index',$data);
        }
        public function cetakPerBulan(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $where = [
                'month(booking.tgl_booking)' => $bulan,
                'year(booking.tgl_booking)' => $tahun
            ];
            $data['tmp'] = $this->laporan->lapBooking($where)->result();
            $this->load->view('laporan/p_laporan',$data);
        }
        public function cetakPerTanggal(){
            $tanggalAwal = $this->input->post('tgl_awal');
            $tanggalAkhir = $this->input->post('tgl_akhir');
            $where = [
                'booking.tgl_booking >=' =>$tanggalAwal,
                'booking.tgl_booking <=' =>$tanggalAkhir
            ];
            $data['tmp'] = $this->laporan->lapbooking($where)->result();
            $this->load->view('laporan/p_laporan',$data);
        }
    }
?>