<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Backup extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $data['page'] = 'Backup';
            $this->template->load('template','backup/index',$data);
        }
        public function proses(){
            $this->load->dbutil();
            $prefs = array(
                    'tables'        => array(
                        'bandara','booking','customer','detail_booking','message','passenger','penerbangan','pesawat','role','tarif_penerbangan','user'
                    ),   // Array of tables to backup.
                    'ignore'        => array(),                     // List of tables to omit from the backup
                    'format'        => 'txt',                       // gzip, zip, txt
                    'filename'      => 'db_cbt.sql',              // File name - NEEDED ONLY WITH ZIP FILES
                    'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
                    'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
                    'newline'       => "\n"                         // Newline character used in backup file
            );

            $backup =  $this->dbutil->backup($prefs);
            // Backup your entire database and assign it to a variable

            // Load the file helper and write the file to your server
            $this->load->helper('file');
            write_file('/path/to/db_cbt.sql', $backup);

            // Load the download helper and send the file to your desktop
            $this->load->helper('download');
            force_download('db_cbt.sql', $backup);
        }
    }
?>