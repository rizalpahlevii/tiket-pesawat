<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Penerbangan extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Penerbangan_model','penerbangan');
        }

        public function index(){
            $data['page'] = "Penerbangan";
            $data['penerbangan'] = $this->penerbangan->tmp_penerbangan();
            $this->template->load('template','penerbangan/index',$data);
        }
        public function create(){
            $data['page'] = "Form Penerbangan";
            $data['nomot'] = $this->penerbangan->buat_kode();
            $this->template->load('template','penerbangan/create',$data);
        }
        public function delete($id){
            $where = ['id_penerbangan' => $id];
            if($this->penerbangan->delete('penerbangan',$where) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Success!</div></div>');
            }else{
                 $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('penerbangan');
        }
        public function insert(){
            $data = [
                'id_penerbangan' => $this->input->post('id_penerbangan'),
                'tgl_penerbangan' => $this->input->post('tanggal_penerbangan'),
                'asal' => $this->input->post('asal_penerbangan'),
                'tujuan' => $this->input->post('tujuan_penerbangan'),
                'jam_berangkat' => $this->input->post('jam_keberangkatan'),
                'jam_tiba' => $this->input->post('jam_tiba'),
                'id_bandara' => $this->input->post('id_bandara'),
                'id_pesawat' => $this->input->post('id_pesawat')
            ];
            if($this->penerbangan->insert('penerbangan',$data) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Success!</div></div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('penerbangan');
        }
        public function tablepesawat(){
            $qr = $this->db->get('pesawat')->result();
            echo json_encode($qr);
        }
        public function tablebandara(){
            $qr = $this->db->get('bandara')->result();
            echo json_encode($qr);
        }
        public function pesawatbyid(){
            $where = ['id_pesawat' => $this->input->post('id')];
            $query = $this->db->get_where('pesawat',$where)->row();
            $data = [
                'id_pesawat' => $query->id_pesawat,
                'type_pesawat' => $query->type_pesawat,
                'image' => base_url() . 'assets/master/pesawat/' .$query->image,
                'jml_kursi_ekonomi' => $query->jml_kursi_ekonomi,
                'jml_kursi_bisnis' => $query->jml_kursi_bisnis
            ];
            echo json_encode($data);
        }
        public function bandarabyid(){
            $where = ['id_bandara' => $this->input->post('id')];
            $query = $this->db->get_where('bandara',$where)->row();
            $data = [
                'id_bandara' => $query->id_bandara,
                'kode_bandara' => $query->kode,
                'nama_bandara' => $query->nama_bandara,
                'kota_bandara' => $query->kota_bandara
            ];
            echo json_encode($data);
        }
        public function penerbanganbyid(){
            $where = ['id_penerbangan' => $this->input->post('id')];
            $qr = $this->penerbangan->tmp_penerbanganById($where)->row();
            $data = [
                'id_penerbangan' => $qr->id_penerbangan,
                'tgl_penerbangan' => $qr->tgl_penerbangan,
                'asal' => $qr->asal,
                'tujuan' => $qr->tujuan,
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