<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('WriteHTML.php');

$html = 'You can<br><p align="center">center a new line by JJJJJ line</p>and add a horizontal rule:<br><hr>';

//$pdf=new PDF_HTML();
//$pdf->AddPage();
//
    define('PDF_FONT_FAMILY_NAME', 'helvetica'); //zapfdingbats, helvetica, courier
    define('PDF_HEADER_TITLE_FONT_SIZE', 72);
    define('PDF_HEADER_SUB_TITLE_FONT_SIZE', 24);

    $pdf = new PDF_HTML($html);
//    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//    $pdf->setFontSubsetting(true);
//    $pdf->SetFont('dejavusans', '', 12, '', true);
//    $pdf->setAuthor('amlteam.co.uk');

    // first page...
    $pdf->AddPage();

//    $pdf->SetFont(PDF_FONT_FAMILY_NAME, 'B', PDF_HEADER_TITLE_FONT_SIZE);
//print_r($pdf);die;
$pdf->SetFont('helvetica');
$pdf->WriteHTML($html);
$pdf->Output();
?>
