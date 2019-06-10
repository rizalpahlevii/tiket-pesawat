<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Pesan extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Dashboard_model','dashboard');
        }

        public function index(){
            $data['page'] = 'Pesan';
            $data['pesan'] = $this->db->select('*')->from('message')->order_by('id','DESC')->get()->result_array();
            $this->template->load('template','pesan/index',$data);
        }
        public function getPesanById(){
            $where = ['id'=> $this->input->post('id')];
            echo json_encode($this->db->get_where('message',$where)->row());
        }
        public function updateStatusMessage(){
            $where = ['id'=> $this->input->post('id')];
            $data = [
                'is_read' => '1'
            ];
            if($this->dashboard->updateStatusMessage($data,$where) > 0){
                echo "true";
            }else{
                echo "false";
            }
        }
        public function loadlist(){
            $data['pesan'] = $this->db->select('*')->from('message')->order_by('id','DESC')->get()->result_array();
            $this->load->view('pesan/listpesan',$data);
        }
    }
?>