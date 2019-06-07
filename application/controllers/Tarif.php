<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Tarif extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Tarif_model','tarif');
            $this->load->model('Penerbangan_model','penerbangan');
        }
        public function delete($id){
            $where = ['id_tarif' => $id];
            if($this->tarif->deleteTarif($where) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Success!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Menghapus Tarif Penerbangan!');
            }
            else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('tarif');
        }

        public function index(){
            $data['page'] = "Tarif Penerbangan";
            $data['tarif'] = $this->tarif->tmp_tarif()->result();
            $this->template->load('template','tarif/index',$data);
        }
        public function create(){
            $data['tbl_pnb'] = $this->penerbangan->tmp_penerbanganValid();
            $data['nomot'] = $this->tarif->buat_kode();
            $data['page'] = "Form Tarif Penerbangan";
            $this->template->load('template','tarif/create',$data);
        }
        public function insert(){
            $data = [
                'id_tarif' => $this->input->post('id_tarif'),
                'id_penerbangan' => $this->input->post('id_penerbangan'),
                'tarif_bisnis' => $this->input->post('tarif_bisnis'),
                'tarif_ekonomi' => $this->input->post('tarif_ekonomi'),
            ];
            $where  = ['id_penerbangan'=> $data['id_penerbangan']];
            // cek penerbangan
            if($this->db->get_where('tarif_penerbangan',$where)->num_rows() == 0){
                // TRUE == jalankan fungi insert
                if($this->tarif->insert('tarif_penerbangan',$data) > 0){
                    $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Success!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Menmabahkan Tarif Penerbangan!');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>data sudah ada!</div></div>');
            }
            redirect('tarif');
        }
        public function tarifbyid(){
            $where = ['id_penerbangan' => $this->input->post('id')];
            $qr = $this->penerbangan->tmp_penerbanganById($where)->row();
            $data = [
                'id_penerbangan' => $qr->id_penerbangan,
                'tanggal_penerbangan' => $qr->tgl_penerbangan,
                'asal_penerbangan' => $qr->asal,
                'tujuan_penerbangan' => $qr->tujuan,
                'jam_berangkat' => $qr->jam_berangkat,
                'jam_tiba' => $qr->jam_tiba,
                'nama_pesawat' => $qr->type_pesawat,
                'nama_bandara' => $qr->nama_bandara,
                'tempat_bandara' => $qr->kota_bandara
            ];
            echo json_encode($data);
        }
    }
?>