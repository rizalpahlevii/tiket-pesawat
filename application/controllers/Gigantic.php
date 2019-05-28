<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Gigantic extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Booking_model','booking');
            $this->load->library('form_validation');
            $this->load->model('Customer_model','customer');
            $this->load->model('Auth_model','auth');
        }
        public function checkout($id){
            $data['page'] = 'Checkout';
            if(!$this->session->userdata('giganticClientLogin')){
                $cont = $this->uri->segment(1);
                $met = $this->url->segment(2);
                $val = $this->uri->segment(3);
                $fullUrl = $cont . '/' . $met . '/' .$val;
                $this->session->set_userdata('cekUrlCheckout',$fullUrl);
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
            $this->session->unset_userdata('cekUrlCheckout');
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
                            'emailClient' => $user['email']
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
    }
