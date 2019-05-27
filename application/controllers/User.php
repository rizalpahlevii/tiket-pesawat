<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('User_model','user');
            $this->load->library('form_validation');
        }

        public function changepassword(){
            $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[3]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[3]|matches[new_password]');
            if($this->form_validation->run() == false){
                $data['page'] = 'My Profile';
                $where = ['email' => $this->session->userdata('email')];
                $data['user'] = $this->user->getUserByEmail($where)->row_array();
                $this->template->load('template','user/profile',$data);
            }else{
                $new_password = $this->input->post('new_password');
                $current_password = $this->input->post('current_password');
                if(! password_verify($current_password, $data['user']['password'])){
                    $this->session->set_flashdata('messagechangepassword','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Wrong current password!</div></div>');
                    $this->session->set_flashdata('berhasil','Password Lama Salah!');
                    redirect('user/profile');
                }else{
                    if($current_password == $new_password){
                        $this->session->set_flashdata('messagechangepassword','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>New password cannot be the same as current password!</div></div>');
                        $this->session->set_flashdata('berhasil','Password Baru Tidak Boleh Sama Dengan Password Lama!');

                        redirect('user/profile');
                    }else{
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('user');
                        $this->session->set_flashdata('messagechangepassword', '<div class="alert alert-success" role="alert">Password changed!</div>');

                        $this->session->set_flashdata('messagechangepassword','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Password changed!</div></div>');

                        redirect('user/profile');
                    }
                }
            }
        }

        public function profile(){
            $this->form_validation->set_rules('nama', 'Full name', 'required|trim');
            $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
            if($this->form_validation->run() == false){
                $data['page'] = 'My Profile';
                $where = ['email' => $this->session->userdata('email')];
                $data['user'] = $this->user->getUserByEmail($where)->row_array();
                $this->template->load('template','user/profile',$data);
            }else{
                $name = $this->input->post('nama');
                $email = $this->input->post('email');
               // cek jika ada ambar yang di upload
                $upload_image = $_FILES['image']['name'];
                if($upload_image){
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/master/user/';
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('image')){
                        $old_image = $data['user']->image;
                        if($old_image != 'default.png'){
                            unlink(FCPATH . 'assets/master/user/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image' , $new_image);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
                $this->db->set('nama_user', $name);
                $this->db->where('email' , $email);
                $this->db->update('user');
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Your profile has been updated!</div></div>');
                    $this->session->set_flashdata('berhasil','Profil Berhasil Diperbarui!');
                redirect('user/profile');
            }
        }

        public function index(){
            $data['page'] = 'User';
            $data['user'] = $this->user->getAll()->result();
            $this->template->load('template','user/index',$data);
        }
        public function create(){
            $this->form_validation->set_rules('nama', 'Name', 'required|trim|min_length[7]');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|valid_email', [
                'is_unique' => 'This email has already registered!'
            ]);
            $this->form_validation->set_rules('password1' ,'Password', 'trim|required|matches[password2]|min_length[3]',[
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password Confirmation','trim|required|matches[password1]');
            $this->form_validation->set_rules('level','Level User','required');
            if($this->form_validation->run() == false){
                $data['page'] = 'Form User';
                $data['level'] = $this->db->get('role')->result();
                $this->template->load('template','user/create',$data);
            }else{
                $ar = [
                    'email' => $this->input->post('email'),
                    'nama_user' => $this->input->post('nama'),
                    'image' => 'default.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'is_active' => 1,
                    'role_id' => $this->input->post('level')
                ];
                if($this->user->insert($ar) > 0){
                    $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>New User was successfull added!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Menambahkan User!');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
                }
                redirect('user');
            }
        }
        public function active($id){
            $where = ['id' => $id];
            $data = $this->db->get_where('user',$where)->row();
            if($data->is_active === "1"){
                $set = ['is_active' => "0"];
                if($this->user->akun('user',$set,$where) > 0){
                     $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>account was successfully disabled!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Menonaktifkan User!');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>account activated failed!</div></div>');       
                }
            }else{
                $set = ['is_active' => "1"];
                if($this->user->akun('user',$set,$where) > 0){
                    $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>account activated successfull !</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Mengaktifkan User!');
                       
                }else{
                        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Failde to activate account</div></div>');       
                }
            }
            redirect('user');
        }
    }
?>