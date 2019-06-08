<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Passenger extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Passenger_model','passenger');

        }

        public function detail($id){
            // if($this->session->userdata('aksesPassenger') != true){
            //     redirect('booking');
            // }else{
                $where = ['detail_booking.id_detail' => $id];
                $data['page'] = 'Detail Passenger';
                $data['tmp'] = $this->passenger->c_detail($where)->row_array();
                if ($data['tmp']['kelas'] != "EKONOMI") {
                    // bisnis
                    $whereKursiTwo = [
                        'passenger.id_penerbangan'=> $data['tmp']['id_penerbangan']
                    ];
                    $data['no_kursi'] = $this->passenger->kode_bisnis($whereKursiTwo);
                }else{
                    // ekonomi
                    $whereKursiTwo = [
                        'passenger.id_penerbangan'=> $data['tmp']['id_penerbangan']
                    ];
                    $data['no_kursi'] = $this->passenger->kode_ekonomi($whereKursiTwo);
                }
                $data['jml'] = $data['tmp']['jml_penumpang'];
                $this->template->load('template','passenger/detail',$data);
            // }
            
        }
        
        public function save(){
            // if($this->session->userdata('aksesPassenger')!=true){
            //     redirect('booking');
            // }else{
                $limit = $this->input->post('limit');
                for ($i=0; $i < $limit; $i++) { 
                    $data = [
                        'id_detail'=> $this->input->post('id_detail'),
                        'id_penerbangan'=> $this->input->post('id_penerbangan'),
                        'nama_passenger'=> $this->input->post('nama_penumpang')[$i],
                        'umur'=> $this->input->post('umur')[$i],
                        'nomor_kursi'=> $this->input->post('no_kursi')[$i]
                    ];
                    $this->db->insert('passenger',$data);
                }
                $this->session->set_flashdata('swaldetail',$data['id_detail']);
                // redirect('passenger/tiket/'.$this->input->post('id_detail'));
                redirect('booking');
            // }
            
        }
        public function tiket($kode){
            // if($this->session->userdata('aksesPassenger')!= true){
            //     redirect('booking');
            // }else{
                $this->session->unset_userdata('aksesPassenger');
                $where = ['detail_booking.id_detail' => $kode];
                $data['tmp'] = $this->passenger->c_tiket($where)->result();
                $data['item'] = $data['tmp'];
                $this->load->view('passenger/tiket2',$data);
            // }     
        }
    }
?>