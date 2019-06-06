<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Gigantic extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Booking_model','booking');
            $this->load->library('form_validation');
            $this->load->model('Customer_model','customer');
            $this->load->model('Auth_model','auth');
            $this->load->model('Penerbangan_model','penerbangan');
            $this->load->model('Frontend_model','fe');
            $this->load->model('Passenger_model','passenger');
        }
        public function checkout($id){
            $data['page'] = 'Checkout';
            if(!$this->session->userdata('giganticClientLogin')){
                redirect('gigantic/auth/login');
            }else{
                $this->template->load('frontend','checkout',$data);
            }
        }
        public function auth($page){
            $data['page'] = 'Landing';
            if($page == "login"){
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                if($this->form_validation->run() == false){
                    $this->load->view('frontend/login');
                }else{
                    $this->_login();
                }

            }elseif ($page == "registration") {
                $this->form_validation->set_rules('nama','Nama','required|trim|min_length[7]');
                $this->form_validation->set_rules('email','Email','required|trim|is_unique[customer.email]|valid_email', [
                        'is_unique' => 'This email has already registered!'
                ]);
                $this->form_validation->set_rules('password1','Password','trim|required|matches[password2]|min_length[3]',[
                    'matches' => 'Password dont match!',
                    'min_length' => 'Password too short!'
                ]);
                $this->form_validation->set_rules('password2','Password Confirmation','trim|required|matches[password1]');
                $this->form_validation->set_rules('negara','negara','required|trim|min_length[4]');
                $this->form_validation->set_rules('kota','kota','required|trim|min_length[4]');
                

                if($this->form_validation->run() == false){
                    $this->load->view('frontend/registration');    
                }else{
                    $this->_registration();
                }
            }else{
                redirect('gigantic/');
            }
        }

        public function index(){
            $data['page'] = 'Gigantic';
            $this->template->load('frontend','frontend/landing',$data);
        }
        public function caripnb(){
            $asal = $this->input->post('asal');
            $tujuan = $this->input->post('tujuan');
            $qr = $this->booking->cari_form($asal,$tujuan)->result_array();
            echo json_encode($qr);
        }



        private function _login(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $where = ['email' => $email];
            $user = $this->auth->getLoginCustomer($where)->row_array();
            if($user) {
                if($user['status'] != "0"){
                    if(password_verify($password, $user['password'])){
                        $session = [
                            'giganticClientLogin' => 'logged',
                            'namaClient' => $user['nama'],
                            'emailClient' => $user['email'],
                            'idClient' => $user['id_customer']
                        ];
                        $this->session->set_userdata($session);
                        $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Welcome ' . $this->session->userdata('nama') . '!</div></div>');
                        if(!$this->session->userdata('cekUrlCheckout')){
                            redirect('gigantic/');   
                        }else{
                            redirect($this->session->userdata('cekUrlCheckout'));
                        }
                    }else {
                        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Password Salah!</div></div>');
                        redirect('gigantic/auth/login');
                    }
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Akun Nonaktif! Silahkan hubungi admin</div></div>');
                        redirect('gigantic/auth/login');
                }
            }else {
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Email Tidak terdaftar!</div></div>');
                redirect('gigantic/auth/login');
            }
        }
        private function _registration(){
            $data = [
                'id_customer' => $this->customer->nomot(),
                'nama' => $this->input->post('nama'),
                'image' => 'default.png',
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                
                'kota' => $this->input->post('kota'),
                'negara' => $this->input->post('negara'),
                'status' => 1
            ];
            $this->db->insert('customer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please Activated</div>');
            redirect('gigantic/auth/login');
        }
        public function logout(){
            session_start();
            $this->session->unset_userdata('giganticClientLogin');
            $this->session->unset_userdata('namaClient');
            $this->session->unset_userdata('emailClient');
            session_destroy();
            $_SESSION = [];
            redirect('gigantic/');
        }
        public function booking($id){
            if(!$this->session->userdata('giganticClientLogin')){
                redirect('gigantic/auth/login');
            }else{
                $data['nomotDetail'] = $this->booking->buat_kode_detail();
                $where = ['penerbangan.id_penerbangan' => $id];
                $data['tmp'] = $this->booking->pilih_pnb2($where)->row_array();
                $data['nomot'] = $this->booking->buat_kode();
                $this->template->load('frontend','frontend/booking',$data);    
            }
        }
        public function penerbangan(){
            $data['tmp'] = $this->penerbangan->tmp_penerbangan();
            $this->template->load('frontend','frontend/penerbangan',$data);
        }
        public function ajxpnb($filter){
            if($filter == "Tanggal"){
                $where = [
                    'penerbangan.tgl_penerbangan >=' => $this->input->post('tgl_awal'),
                    'penerbangan.tgl_penerbangan <=' => $this->input->post('tgl_akhir')
                ];
                $data['tmp'] = $this->fe->tampilPnbTanggal($where);
            }elseif ($filter == "asaltujuan") {
                $where1 = [
                    'penerbangan.asal' => $this->input->post('asal')
                ];
                $where2 = [
                    'penerbangan.tujuan' => $this->input->post('tujuan')
                ];
                $data['tmp'] = $this->fe->tampilPnbAsalTujuan($where1,$where2);
            }elseif ($filter == "Bandara") {
               $where = [
                    'Bandara.nama_bandara' => $this->input->post('nama_bandara')
               ];
               $data['tmp'] = $this->fe->tampilPnbBandara($where);
            }elseif ($filter == "Pesawat") {
                 $where = [
                    'pesawat.type_pesawat' => $this->input->post('nama_pesawat')
               ];
               $data['tmp'] = $this->fe->tampilPnbPesawat($where);
            }else{
                $data['tmp'] = $this->fe->tampilPnb();
            }
            $this->load->view('frontend/tblPnb',$data);
        }
        public function passenger($id){
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
            $this->template->load('frontend','frontend/passenger',$data);  
        }
    }
