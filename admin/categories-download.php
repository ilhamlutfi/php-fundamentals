<?php

require 'vendor/autoload.php';
require 'config/app.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

$activeWorksheet->setCellValue('A2', 'No')->getColumnDimension('A')->setAutoSize(true);
$activeWorksheet->setCellValue('B2', 'Title')->getColumnDimension('B')->setAutoSize(true);
$activeWorksheet->setCellValue('C2', 'Slug')->getColumnDimension('C')->setAutoSize(true);
$activeWorksheet->setCellValue('D2', 'Created At')->getColumnDimension('D')->setAutoSize(true);

$styleColumn = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$no = 1;
$loc = 3;

$categories = query("SELECT * FROM categories ORDER BY created_at DESC");

foreach ($categories as $category) {
    $activeWorksheet->setCellValue('A'. $loc, $no++);
    $activeWorksheet->setCellValue('B'. $loc, $category['title']);
    $activeWorksheet->setCellValue('C'. $loc, $category['slug']);
    $activeWorksheet->setCellValue('D'. $loc, $category['created_at']);

    $loc++;
}

$activeWorksheet->getStyle('A2:D'. ($loc - 1))->applyFromArray($styleColumn);

$writer = new Xlsx($spreadsheet);
$file_name = 'Categories List.xlsx';
$writer->save($file_name);

// ganti proses download ke folder download bukan project
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length:' . filesize($file_name));
header('Content-Disposition: attachment;filename="' . $file_name . '"');
readfile($file_name);
unlink($file_name);

