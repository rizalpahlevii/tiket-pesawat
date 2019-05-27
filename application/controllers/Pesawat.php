<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Pesawat extends CI_Controller{
        public function __construct(){
            parent::__construct();
            cekAkses();
            $this->load->model('Pesawat_model','pesawat');
        }

        public function index(){
            $data['page'] = "Pesawat";
            $data['nomot'] = $this->pesawat->buat_kode();
            $data['pesawat'] = $this->db->get('pesawat')->result();
            $data['oke'] = "ok";
            $this->template->load('template','pesawat/index',$data);
        }
        public function create(){
            $id_pesawat = $this->input->post('id_pesawat');
            $type_pesawat = $this->input->post('type_pesawat');
            $jml_kursi_ekonomi = $this->input->post('jml_kursi_ekonomi');
            $jml_kursi_bisnis = $this->input->post('jml_kursi_bisnis');
            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/master/pesawat/';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $asli = $this->upload->data('file_name');
                }else{
                    echo $this->upload->display_errors();
                    die;
                }

            }
            $ar = [
                'id_pesawat' => $id_pesawat,
                'image' => $asli,
                'type_pesawat' => $type_pesawat,
                'jml_kursi_ekonomi' => $jml_kursi_ekonomi,
                'jml_kursi_bisnis' => $jml_kursi_bisnis
            ];
            if($this->pesawat->insert('pesawat',$ar) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>new Airlines data successfully added!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Menambah Pesawat!');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error. failed to add aircraft data!!</div></div>');
            }
            redirect('pesawat');
        }

        public function delete($id){
            $image = $this->db->get_where('pesawat',['id_pesawat' => $id])->row();
            $image = $image->image;
            if($this->pesawat->delete('pesawat',['id_pesawat' => $id]) > 0){
                unlink(FCPATH . 'assets/master/pesawat/'. $image);
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Airline Was deleted!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Menghapus Pesawat!');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('pesawat');
        }
        public function show(){
            $where = array('id_pesawat' => $this->input->post('id'));
            $result = $this->db->get_where('pesawat',$where)->row();
            $hasil = array(
                'id_pesawat' => $result->id_pesawat,
                'image' =>  base_url('assets/master/pesawat/') .  $result->image,
                'type_pesawat' => $result->type_pesawat,
                'jml_kursi_bisnis' => $result->jml_kursi_bisnis,
                'jml_kursi_ekonomi' => $result->jml_kursi_ekonomi
            );
            echo json_encode($hasil);
        }
        public function update(){
            $where = ['id_pesawat' => $this->input->post('id_pesawatUpdate')];
            $file_lama = $this->db->get_where('pesawat',$where)->row();
            if($_FILES['imageUpdate']['name'] === ''){
                // jika tidak ada file yang diupload
                $data = [
                    'image' => $file_lama->image,
                    'type_pesawat' => $this->input->post('type_pesawatUpdate'),
                    'jml_kursi_ekonomi' => $this->input->post('jml_kursi_ekonomiUpdate'),
                    'jml_kursi_bisnis' => $this->input->post('jml_kursi_bisnisUpdate')
                ];
            }else{

                $upload_image = $_FILES['imageUpdate']['name'];
                if($upload_image){
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/master/pesawat/';
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('imageUpdate')){
                        $asli = $this->upload->data('file_name');
                    }else{
                        echo $this->upload->display_errors();
                        die;
                    }

                }
                $data = [
                    'image' => $asli,
                    'type_pesawat' => $this->input->post('type_pesawatUpdate'),
                    'jml_kursi_ekonomi' => $this->input->post('jml_kursi_ekonomiUpdate'),
                    'jml_kursi_bisnis' => $this->input->post('jml_kursi_bisnisUpdate')
                ];

                unlink(FCPATH . 'assets/master/pesawat/'. $file_lama->image);
            }
           
            if($this->pesawat->update('pesawat', $data, $where) > 0){
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Airline Was updated!</div></div>');
                    $this->session->set_flashdata('berhasil','Berhasil Mengedit Pesawat!');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>Error!</div></div>');
            }
            redirect('pesawat');
        }
        private function _upload(){
            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/master/pesawat/';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $asli = $this->upload->data('file_name');
                }else{
                    echo $this->upload->display_errors();
                    die;
                }
            }
            return $asli;
        }
        public function excel(){
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            $excel = new PHPExcel();
            $excel->getProperties()->setCreator('My Data Pesawat')
                    ->setTitle('Data Pesawat')
                    ->setSubject('Pesawat')
                    ->setDescription('Laporan semua data pesawat')
                    ->setKeywords('Data Pesawat');
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
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PESAWAT"); // Set kolom A1 dengan tulisan "DATA SISWA"
            $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID PESAWAT"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PESAWAT"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "KURSI EKONOMI"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "KURSI BISNIS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            
            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
            $siswa = $this->pesawat->view();   
            $no =1;
            $numrow = 4;
            foreach($siswa as $data){ // Lakukan looping pada variabel siswa
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_pesawat);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->type_pesawat);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jml_kursi_ekonomi);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jml_kursi_bisnis);
                  
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
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Data Pesawat");
            $excel->setActiveSheetIndex(0);
            // Proses file excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Pesawat.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
        }

        public function pdf(){
            $data['users'] = $this->db->get('pesawat')->result_array();
            $html = $this->load->view('pesawat/pdf_report',$data,true);
            $filename = 'LaporanPesawat_'.date('Y-m-d');
            // $this->load->view('table_report',$data);die;
            $this->pdf->generate($html,$filename,true,'A4','portrait');

        }
    }
?>