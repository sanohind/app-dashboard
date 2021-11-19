<?php

$header = array(
    array("label" => "Item No", "length" => "25", "align" => "L"),
    array("label" => "Description", "length" => "40", "align" => "L"),
    array("label" => "Std. Old Part", "length" => "25", "align" => "L"),
    array("label" => "PO Qty.", "length" => "15", "align" => "L"),
    array("label" => "Unit Price", "length" => "20", "align" => "L"),
    array("label" => "Receipt Qty", "length" => "20", "align" => "L"),
    array("label" => "Unit", "length" => "10", "align" => "L"),
    array("label" => "Extended Cost", "length" => "30", "align" => "L"),
    array("label" => "Inv. Doc. No", "length" => "30", "align" => "L"),
    array("label" => "Approve Date", "length" => "30", "align" => "L"),
);
//require('fpdf/fpdf.php');
use \Fpdf\Fpdf;

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', '', 11);
        $this->Cell(20, 8, 'Print Date :', 0, 0, 'L');
        $this->Cell(30, 8, date('Y-m-d H:i:s'), 0, 0, 'L');
        $this->Cell(50);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(70, 8, 'PT. SANOH INDONESIA', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(110);
        $this->Cell(55, 5, 'Receipt Register', 0, 0, 'C');
        $this->Ln(10);
    }
}

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times', '', 11);

$pdf->Cell(30, 5, 'PO Information');
$pdf->Cell(80);
$pdf->Cell(30, 5, 'Receipt Information', 0, 1);

$pdf->Cell(30, 5, 'PO Number', 0, 0);
$pdf->Cell(3, 5, ':', 0, 0);
$pdf->Cell(30, 5, 'PL21000001', 0, 0);
$pdf->Cell(47);
$pdf->Cell(30, 5, 'Receipt Number', 0, 0);
$pdf->Cell(3, 5, ':', 0, 0);
$pdf->Cell(30, 5, 'DN2102169', 0, 1);

$pdf->Cell(30, 5, 'PO Date', 0, 0);
$pdf->Cell(3, 5, ':', 0, 0);
$pdf->Cell(30, 5, '2021-09-01 16:19:00.000', 0, 0);
$pdf->Cell(47);
$pdf->Cell(30, 5, 'Receipt Date', 0, 0);
$pdf->Cell(3, 5, ':', 0, 0);
$pdf->Cell(30, 5, '2021-09-13 04:18:01.000', 0, 1);

$pdf->Cell(30, 5, 'Supplier', 0, 0);
$pdf->Cell(3, 5, ':', 0, 0);
$pdf->Cell(60, 5, 'CATURINDO AGUNG JAYA RUBBER PT.', 0, 0);
$pdf->Cell(17);
$pdf->Cell(30, 5, 'Supplier Slip', 0, 0);
$pdf->Cell(3, 5, ':', 0, 0);
$pdf->Cell(30, 5, 'SJ/202135985', 0, 0);

$pdf->Ln(8);

$pdf->SetFont('Arial', '', '10');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
foreach ($header as $col) {
    $pdf->Cell($col['length'], 5, $col['label'], 0, 0, $col['align'], 1);
}

$pdf->Output();
