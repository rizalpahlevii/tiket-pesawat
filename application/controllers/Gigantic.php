<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Gigantic extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function coba(){
            
        }

        public function index(){
            $data['page'] = 'Gigantic';
            $this->template->load('frontend','frontend/landing',$data);
        }
    }
