<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Bandara extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Bandara_model','bandara');
        }

        public function index(){
            $data['page'] = "Bandara";
            $data['nomot'] = $this->bandara->buat_kode();
            $data['bandara'] = $this->db->get('bandara')->result();
            $this->template->load('template','bandara/index',$data);
        }
        public function create(){
            $data = [
                'id_bandara' => $this->input->post('id_bandara'),
                'kode' => $this->input->post('kode_bandara'),
                'nama_bandara' => $this->input->post('nama_bandara'),
                'kota_bandara' => $this->input->post('kota_bandara')
            ];
            if($this->bandara->insert('bandara',$data) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>New Bandara was successfull added!</div></div>');

                $this->session->set_flashdata('berhasil','Berhasil Menambah Bandara!');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('bandara');
        }

        public function delete($id){
            $where = ['id_bandara' => $id];
            if($this->bandara->delete('bandara',$where) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Bandara Was deleted!</div></div>');
                $this->session->set_flashdata('berhasil','Berhasil Menghapus Bandara!');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('bandara');
        }
        public function show(){
            $where = ['id_bandara' => $this->input->post('id')];
            $result = $this->db->get('bandara',$where)->row();
            $hasil = array(
                'id_bandara' => $result->id_bandara,
                'kode_bandara' => $result->kode,
                'nama_bandara' => $result->nama_bandara,
                'kota_bandara' => $result->kota_bandara,
            );
            echo json_encode($hasil);
        }
        public function update(){
            $where = ['id_bandara' => $this->input->post('id_bandaraUpdate')];
            $data = [
                'kode' => $this->input->post('kode_bandaraUpdate'),
                'nama_bandara' => $this->input->post('nama_bandaraUpdate'),
                'kota_bandara' => $this->input->post('kota_bandaraUpdate')
            ];
            if($this->bandara->update('bandara',$data,$where) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Bandara Was updated!</div></div>');

                $this->session->set_flashdata('berhasil','Berhasil Mengedit Bandara!');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('bandara');
        }

        public function excel(){
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            $excel = new PHPExcel();
            $excel->getProperties()->setCreator('My Data Bandara')
                    ->setTitle('Data Bandara')
                    ->setSubject('Bandara')
                    ->setDescription('Laporan semua data Bandara')
                    ->setKeywords('Data Bandara');
            // variable untuk menampung pengaturan style dari header table
            $style_col = array(
                'font' => array('bold' => true),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );
             $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BANDARA"); // Set kolom A1 dengan tulisan "DATA SISWA"
            $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID BANDARA"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA BANDARA"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "KODE BANDARA"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "KOTA BANDARA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            
            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
            $bandara = $this->bandara->view()->result();   
            $no =1;
            $numrow = 4;
            foreach($bandara as $data){ // Lakukan looping pada variabel bandara
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_bandara);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_bandara);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kode);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kota_bandara);
                  
                  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                  
                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(50); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(35); // Set width kolom E

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Data Bandara");
            $excel->setActiveSheetIndex(0);
            // Proses file excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Bandara_' . date('Y-m-d') . '.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
        }
        public function pdf(){
            $data['bandaras'] = $this->db->get('bandara')->result_array();
            $html = $this->load->view('bandara/pdf_report',$data,true);
            $filename = 'LaporanBandara_'.date('Y-m-d');
            // $this->load->view('table_report',$data);die;
            $this->pdf->generate($html,$filename,true,'A4','portrait');
        }
    }
?>