<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model','auth');
    }
    public function blocked(){
        $this->load->view('auth/blocked');
    }
    public function index(){
        if($this->session->userdata('email')){
            redirect('dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
            $this->load->view('auth/login');
        }else{
            $this->_login();
        }
        
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = ['user.email' => $email];
        $user = $this->auth->getLogin($where)->row_array();
        if($user) {
            if($user['is_active'] != "0"){
                if(password_verify($password, $user['password'])){
                    $session = [
                        'pesawat_admin' => true,
                        'email' => $user['email'],
                        'nama' => $user['nama_user'],
                        'level' => $user['role']
                    ];
                    $this->session->set_userdata($session);
                    $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Welcome ' . $this->session->userdata('nama') . '!</div></div>');
                    redirect('dashboard');
                }else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Password Salah!</div></div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Akun Nonaktif! Silahkan hubungi admin</div></div>');
                    redirect('auth');
            }
        }else {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Email Tidak terdaftar!</div></div>');
            redirect('auth');
        }
    }
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
            redirect('auth');
    }
  
}

?>