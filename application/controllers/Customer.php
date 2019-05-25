<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Customer extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Customer_model', 'customer');
        }

        public function index(){
            $data['page'] = "Customer";
            $data['customer'] = $this->db->get('customer')->result();
            $this->template->load('template','customer/index',$data);
        }
        public function delete($id){
            $where = ['id_customer' => $id];
            if($this->customer->delete('customer', $where) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Airline Was deleted!</div></div>');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('customer');
        }
        public function active($id){
            $where = ['id_customer' => $id];
            $data = $this->db->get_where('customer',$where)->row();
            if($data->status == "1"){
                if($this->customer->update_aktif('customer',$where) > 0){
                     $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>account was successfully disabled!</div></div>');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>account activated failed!</div></div>');       
                }
            }else{
                if($this->customer->update_nonaktif('customer',$where) > 0){
                    $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>account activated successfull !</div></div>');
                       
                }else{
                        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Failde to activate account</div></div>');       
                }
            }
            redirect('customer');
        }
    }
?>