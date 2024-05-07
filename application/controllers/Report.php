<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['sjmaterial_m', 'stock_m']);
    }
    public function sjmaterial()
    {
        $this->load->model('supplier_m');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
        $data['supplier'] = $this->supplier_m->get()->result();
        $data['row'] = $this->sjmaterial_m->get_sjmaterial_pagination();
        $data['post'] = $post;
        $this->template->load('template', 'report/sjmaterial_report', $data);
    }
    public function export()
    {
        $sjmaterial = $this->sjmaterial_m->get_sjmaterial_pagination()->result();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'No DO');
        $sheet->setCellValue('C1', 'No PO');
        $sheet->setCellValue('D1', 'No Kontrak');
        $sheet->setCellValue('E1', 'Tgl DO');
        $sheet->setCellValue('F1', 'Tgl Masuk');
        $sheet->setCellValue('G1', 'Total Coil');
        $sheet->setCellValue('H1', 'Total Weight');

        $column = 2;
        foreach ($sjmaterial as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->no_do);
            $sheet->setCellValue('C' . $column, $value->no_po);
            $sheet->setCellValue('D' . $column, $value->no_kontrak);
            $sheet->setCellValue('E' . $column, $value->do_date);
            $sheet->setCellValue('F' . $column, $value->in_date);
            $sheet->setCellValue('G' . $column, $value->total_coil);
            $sheet->setCellValue('H' . $column, $value->total_weight);
            $column++;
        }
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A1:H1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:H1' . ($column - 1))->applyFromArray($styleArray);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=Laporan Surat Jalan Material.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
    public function stock_in()
    {
        $this->load->model('material_m');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
        $data['material'] = $this->material_m->get()->result();
        $data['row'] = $this->stock_m->get_stockin_pagination();
        $data['post'] = $post;
        $this->template->load('template', 'report/stockin_report', $data);
    }
    public function export_stockin()
    {
        $stock = $this->stock_m->get_stockin_pagination()->result();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Tipe Material');
        $sheet->setCellValue('D1', 'Ukuran Material ');
        $sheet->setCellValue('E1', 'Nama Customer');
        $sheet->setCellValue('F1', 'Total Coil');
        $sheet->setCellValue('G1', 'Total Berat');
        $sheet->setCellValue('H1', 'Total Coil Sebelum');
        $sheet->setCellValue('I1', 'Total Coil Sesudah');
        $sheet->setCellValue('J1', 'Total Berat Sebelum');
        $sheet->setCellValue('K1', 'Total Berat Sesudah');
        $sheet->setCellValue('L1', 'Pelaksana');

        $column = 2;
        foreach ($stock as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->date);
            $sheet->setCellValue('C' . $column, $value->type);
            $sheet->setCellValue('D' . $column, $value->size);
            $sheet->setCellValue('E' . $column, $value->customer_name);
            $sheet->setCellValue('F' . $column, $value->qty_coil);
            $sheet->setCellValue('G' . $column, $value->qty_weight);
            $sheet->setCellValue('H' . $column, $value->coil_before);
            $sheet->setCellValue('I' . $column, $value->coil_after);
            $sheet->setCellValue('J' . $column, $value->weight_before);
            $sheet->setCellValue('K' . $column, $value->weight_after);
            $sheet->setCellValue('L' . $column, $value->username);
            $column++;
        }
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:L1' . ($column - 1))->applyFromArray($styleArray);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=Laporan Stock In Material.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
    public function stock_out()
    {
        $this->load->model('material_m');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
        $data['material'] = $this->material_m->get()->result();
        $data['row'] = $this->stock_m->get_stockout_pagination();
        $data['post'] = $post;
        $this->template->load('template', 'report/stockout_report', $data);
    }
    public function export_stockout()
    {
        $stock = $this->stock_m->get_stockout_pagination()->result();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Tipe Material');
        $sheet->setCellValue('D1', 'Ukuran Material ');
        $sheet->setCellValue('E1', 'Nama Customer');
        $sheet->setCellValue('F1', 'Total Coil');
        $sheet->setCellValue('G1', 'Total Berat');
        $sheet->setCellValue('H1', 'Total Coil Sebelum');
        $sheet->setCellValue('I1', 'Total Coil Sesudah');
        $sheet->setCellValue('J1', 'Total Berat Sebelum');
        $sheet->setCellValue('K1', 'Total Berat Sesudah');
        $sheet->setCellValue('L1', 'Pelaksana');

        $column = 2;
        foreach ($stock as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->date);
            $sheet->setCellValue('C' . $column, $value->type);
            $sheet->setCellValue('D' . $column, $value->size);
            $sheet->setCellValue('E' . $column, $value->customer_name);
            $sheet->setCellValue('F' . $column, $value->qty_coil);
            $sheet->setCellValue('G' . $column, $value->qty_weight);
            $sheet->setCellValue('H' . $column, $value->coil_before);
            $sheet->setCellValue('I' . $column, $value->coil_after);
            $sheet->setCellValue('J' . $column, $value->weight_before);
            $sheet->setCellValue('K' . $column, $value->weight_after);
            $sheet->setCellValue('L' . $column, $value->username);
            $column++;
        }
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:L1' . ($column - 1))->applyFromArray($styleArray);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=Laporan Stock Out Material.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
