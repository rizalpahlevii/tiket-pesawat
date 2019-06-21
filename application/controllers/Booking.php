<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model', 'booking');
        $this->load->model('Passenger_model', 'passenger');
        $this->load->model('Penerbangan_model', 'penerbangan');
    }

    public function index()
    {
        $this->load->library('form_validation');
        cekAkses();
        $data['page'] = 'Booking';
        $data['tmp_filter'] = $this->penerbangan->tmp_penerbanganNonWhere();
        $this->form_validation->set_rules('inp_filter_booking', 'Filter', 'required');
        if ($this->form_validation->run() == false) {
            $data['tampil_select'] = '';
            $data['booking'] = $this->booking->tmp_booking()->result();
        } else {
            $where = ['penerbangan.id_penerbangan' => $this->input->post('inp_filter_booking')];
            $data['tampil_select'] = $this->input->post('inp_filter_booking');
            $data['booking'] = $this->booking->tmp_booking_filter($where)->result();
        }
        $this->template->load('template', 'booking/index', $data);
    }
    public function insert()
    {
        cekAkses();
        if (!$this->input->post('status_bayar')) {
            $sb = "TERBAYAR";
        } else {
            $sb = "BOOKING";
        }
        $data_booking = [
            'id_booking' => $this->input->post('id_booking'),
            'id_customer' => $this->input->post('id_customer_book'),
            'id_penerbangan' => $this->input->post('id_penerbangan'),
            'tgl_booking' => $this->input->post('tanggal_booking'),
            'jml_penumpang' => $this->input->post('jml_penumpang'),
            'kelas' => $this->input->post('kelas_penerbangan'),
            'total_tarif' => $this->input->post('total_tarif'),
            'status_bayar' => $sb,
        ];

        $data_detail = [
            'id_detail' => $this->booking->buat_kode_detail(),
            'id_tarif' => $this->input->post('id_tarif'),
            'id_booking' => $this->input->post('id_booking')
        ];

        $id_booking = $this->input->post('id_booking');
        $where_psw = ['booking.id_booking' => $id_booking];
        // var_dump($data_booking);
        // var_dump($data_detail);
        if ($this->booking->insert_booking($data_booking) > 0 && $this->booking->insert_detail_booking($data_detail) > 0) {
            $response = ['status' => "true"];
            // fungsi kurangi stok kursi
            $qr_psw = $this->db->select('pesawat.*,booking.kelas,booking.id_booking')->from('pesawat')->join('penerbangan', 'penerbangan.id_pesawat=pesawat.id_pesawat ')->join('booking', 'booking.id_penerbangan=penerbangan.id_penerbangan')->where($where_psw)->get()->row_array();
            $id_pesawat = $qr_psw['id_pesawat'];
            if ($qr_psw['kelas'] != "EKONOMI") {
                // BISNIS
                $this->db->update('pesawat', ['jml_kursi_bisnis' => $qr_psw['jml_kursi_bisnis'] - $this->input->post('jml_penumpang')], ['id_pesawat' => $id_pesawat]);
            } else {
                $this->db->update('pesawat', ['jml_kursi_ekonomi' => $qr_psw['jml_kursi_ekonomi'] - $this->input->post('jml_penumpang')], ['id_pesawat' => $id_pesawat]);
            }
            // akhir kurang stok

            echo json_encode($response);
        } else {
            $response = ['status' => "false"];
            echo json_encode($response);
        }
    }
    public function create()
    {
        cekAkses();
        $data['nomotDetail'] = $this->booking->buat_kode_detail();
        $data['nomot'] = $this->booking->buat_kode();
        $data['customers'] = $this->db->get('customer')->result();
        $data['page'] = 'Form Booking';
        $this->template->load('template', 'booking/create', $data);
    }
    public function caripnb()
    {
        cekAkses();
        $asal = $this->input->post('asal');
        $tujuan = $this->input->post('tujuan');
        $qr = $this->booking->cari_form($asal, $tujuan)->result_array();
        echo json_encode($qr);
    }
    public function pilihpnb()
    {
        cekAkses();
        $where = ['penerbangan.id_penerbangan' => $this->input->post('id')];
        $qr = $this->booking->pilih_pnb($where)->row();
        echo json_encode($qr);
    }
    public function plhcst()
    {
        cekAkses();
        $where = ['id_customer' => $this->input->post('id')];
        $data = $this->booking->plhcst($where)->row();
        echo json_encode($data);
    }
    public function optkelas()
    {
        $where = ['id_penerbangan' => $this->input->post('id_penerbangan')];
        $qr = $this->db->get_where('tarif_penerbangan', $where)->row();
        echo json_encode($qr);
    }
    public function konfirmasi()
    {
        $id_booking = $this->input->post('id_booking');
        $data['tmp'] = $this->booking->ctk_konfirmasi(['booking.id_booking' => $id_booking])->row_array();
        $data['penumpang'] = $this->passenger->getPenumpangidpidc($data['tmp']['id_penerbangan'], $data['tmp']['id_customer'])->result();
        $data['hrg'] = $this->passenger->c_detail(['detail_booking.id_detail' => $data['tmp']['id_detail']])->row_array();
        echo json_encode($data);
    }
    public function savekonfirm()
    {
        $data = [
            'status_bayar' => 'TERBAYAR'
        ];
        $where = ['id_booking' => $this->input->post('id')];
        if ($this->booking->updateStatusBayar($data, $where) > 0) {
            $res = "berhasil";
            echo json_encode($res);
        } else {
            $res = "gagal";
            echo json_encode($res);
        }
    }
    public function invoice($id)
    {
        $where = ['booking.id_booking' => $id];
        $data['tmp'] = $this->passenger->c_tiketClient($where)->result();
        $data['item'] = $data['tmp'];
        $this->load->view('passenger/tiket2', $data);
    }
}
