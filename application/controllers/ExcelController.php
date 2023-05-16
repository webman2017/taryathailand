<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("Excel_model",'excel_model');
        $this->load->library("excel");
    }
    function index()
    {

        $data["qr_data"] = $this->excel_model->fetch_dealer();
        $this->load->view("excel_qr_view", $data);
    }

   public function qrcode_excel()
    {
$province=$this->input->post('province');
$start=$this->input->post('startDate');
$end=$this->input->post('endDate');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setTitle('คิวอาร์โค้ดชิงรางวัล');
        $table_columns = array("ลำดับที่", "รหัส","ชื่อ-นามสกุล","เพศ" ,"อายุ","ที่อยู่","ตำบล","อำเภอ","จังหวัด","รหัสไปรษณีย์","วันเวลา");
        $column = 0;
        $object->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true);
        $object->getActiveSheet()->getStyle('A1:L1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
//        $object->getActiveSheet()->getStyle('A1:L1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $object->getActiveSheet()->getStyle('A1:L1')->getFill()->getStartColor()->setRGB('cccccc');
        $object->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
        $object->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $object->getActiveSheet()->getColumnDimension('B')->setWidth(28);
        $object->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        
        
        
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $qr_data = $this->excel_model->fetch_data($province=null,$start=null,$end=null);
        $excel_row = 2;
        $no=1;
        foreach ($qr_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->pd_id);

            $excel_row++;
            $no++;
        }
//        $file="รายชื่อส่งของประจำวันที่";
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="qrcode.xls"');
        $object_writer->save('php://output');
    }


    function dealer_excel()
    {
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setTitle('รายชื่อตัวแทน');
        $table_columns = array("ลำดับที่", "รหัส","ชื่อ","นามสกุล","เบอร์โทรศัพท์","ไลน์","facebook","instagram", "จังหวัด","อำเภอ","รหัสไปรษณีย์");
        $column = 0;
        $object->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true);
        $object->getActiveSheet()->getStyle('A1:L1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
//        $object->getActiveSheet()->getStyle('A1:L1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $object->getActiveSheet()->getStyle('A1:L1')->getFill()->getStartColor()->setRGB('cccccc');
        $object->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
        $object->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $object->getActiveSheet()->getColumnDimension('B')->setWidth(28);
        $object->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $object->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $qr_data = $this->excel_model->fetch_dealer();
        $excel_row = 2;
        foreach ($qr_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->dealer_code);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->lastname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->mobile);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->line);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->facebook);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->instagram);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->PROVINCE_NAME);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->AMPHUR_NAME);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->zipcode);

            $excel_row++;
        }
//        $file="รายชื่อส่งของประจำวันที่".date(yy-mm-dd);
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ชื่อตัวแทน.xls"');
        $object_writer->save('php://output');
    }
}























	