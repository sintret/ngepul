<?php

$sheet = $objPHPExcel->setActiveSheetIndex(0);
$sheet->setCellValue('A2', 'PERIODE : ' . $data['startDate'] . ' UNTIL  ' . $data['endDate']);

$num = 6;
//echo "<pre>"; print_r($results); exit;
if ($results)
    foreach ($results as $result) {
        $sheet->setCellValue('A' . $num, $result->name);
        $sheet->setCellValue('B' . $num, $result->clientName);
        $sheet->setCellValue('C' . $num, $result->serviceName);
        $sheet->setCellValue('D' . $num, $result->serviceTitle);
        $sheet->setCellValue('E' . $num, $result->agreedFees);
        $sheet->setCellValue('F' . $num, $result->reportDate);

        $sheet->setCellValue('G' . $num, $result->startDate);
        $sheet->setCellValue('H' . $num, $result->endDate);
        $sheet->setCellValue('I' . $num, $result->partnerName);
        $sheet->setCellValue('J' . $num, $result->managerName);
        $sheet->setCellValue('K' . $num, $result->estimatedCost);
        $sheet->setCellValue('L' . $num, $result->budgetHour);
        $sheet->setCellValue('M' . $num, $result->current);

        $num++;
    }



$name = 'Engagement-Project' . date('Y-m-d');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

