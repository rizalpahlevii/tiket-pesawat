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
            $this->load->model('User_model','user');
            $this->load->model('Passenger_model','passenger');
            $this->load->model('Contact_model','contact');
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
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
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
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
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
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
            $data['tmp'] = $this->penerbangan->tmp_penerbangan();
            $this->template->load('frontend','frontend/penerbangan',$data);
        }
        // fungsi ajax filter penerbangan
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
        // menampilka detail penerbangan dan customer
        public function passenger($id){
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
            if(!$this->session->userdata('giganticClientLogin')){
                redirect('gigantic/auth/login');
            }else{
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
        // menyimpan dta penumpang client
        public function savepenumpang(){
            if(!$this->session->userdata('giganticClientLogin')){
                redirect('gigantic/auth/login');
            }else{
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
                $this->session->set_flashdata('bkgb','Booking Berhasil!,Silahkan cek di menu pemesanan!');
                    // redirect('passenger/tiket/'.$this->input->post('id_detail'));
                redirect('gigantic/');    
            }
            
        }
        public function pemesanan(){
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
            if(!$this->session->userdata('giganticClientLogin')){
                redirect('gigantic/auth/login');
            }else{
                $data['page']='Pemesanan Saya';
                $whereIdClient = $this->session->userdata('idClient');
                $data['row'] = $this->passenger->cetak_invoice_bukti($whereIdClient)->row();
                if($data['row'] == null){
                    // tidak ada pesanan
                    $data['penumpang'] = "Tidak Ada Pesanan";
                }else{
                    $id_detail = $data['row']->id_detail;
                    $data['hrg']=$this->passenger->c_detail(['detail_booking.id_detail'=>$id_detail])->row_array();
                    $id_penerbangan = $data['row']->id_penerbangan;
                    $email = $data['row']->email;
                    $data['penumpang'] = $this->passenger->getPenumpangidpidc($id_penerbangan,$whereIdClient)->result();    
                }
                
                $this->template->load('frontend','frontend/invoice',$data);    
            }
            
        }
        public function contact(){
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
            $data['page']= 'Contact';
            $this->template->load('frontend','frontend/contact',$data);
        }
        public function sendmessage(){
            $data = [
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'message' => $this->input->post('message'),
                'is_read' => '0',
            ];
            if($this->contact->sendmessage('message',$data) > 0){
                $this->session->set_flashdata('bkgb','Pesan Terkirim!');
            }else{
                $this->session->set_flashdata('bkgb','Pesan Gagal Terkirim!');
            }
            redirect('gigantic/contact');
        }
        public function service(){
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
            $data['page'] = 'Service';
            $this->template->load('frontend','frontend/service',$data);
        }
        public function profile(){
            
            if(!$this->session->userdata('giganticClientLogin')){
                redirect('gigantic/auth/login');
            }else{
                $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
                
                $data['page'] = 'Profile';
                $this->template->load('frontend','frontend/profile',$data);
            }
        }
        public function updateprofile(){
            $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();

            $data['page'] = 'Profile';
            $this->form_validation->set_rules('nama', 'Full name', 'required|trim');
            if($this->form_validation->run() == false){
                $where = ['email' => $this->session->userdata('emailClient')];
                $data['user'] = $this->db->get_where('customer',['email'=>$this->session->userdata('emailClient')])->row_array();
                redirect('gigantic/profile');
            }else{
                $name = $this->input->post('nama');
                $email = $this->input->post('email');
                   // cek jika ada ambar yang di upload
                $upload_image = $_FILES['image']['name'];
                if($upload_image){
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/master/customer/';
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('image')){
                        $old_image = $data['user']['image'];
                        if($old_image != 'default.png'){
                            unlink(FCPATH . 'assets/master/customer/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image' , $new_image);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
                $this->db->set('nama', $name);
                $this->db->where('email' , $email);
                $this->db->update('customer');
                $this->session->set_flashdata('bkgb','Profile Berhasil Diperbarui!');
                redirect('gigantic/profile');
            }
        }
        public function changepassword(){
            $data['user'] = $this->db->get_where('customer',['email' => $this->session->userdata('emailClient')])->row_array();
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[3]|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|trim|min_length[3]|matches[new_password]');
            if($this->form_validation->run() == false){
                redirect('gigantic/profile');
            }else{
                $new_password = $this->input->post('new_password');
                $current_password = $this->input->post('current_password');
                if(! password_verify($current_password, $data['user']['password'])){
                    $this->session->set_flashdata('messagechangepassword','Wrong current password!-error');
                    redirect('gigantic/profile');
                }else{
                    if($current_password == $new_password){
                        $this->session->set_flashdata('messagechangepassword','New password cannot be the same as current password!-error');
                        redirect('gigantic/profile');
                    }else{
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('customer');
                        $this->session->set_flashdata('messagechangepassword', 'Password changed!-success');

                        redirect('gigantic/profile');
                    }
                }
            }
        }
    }
?>