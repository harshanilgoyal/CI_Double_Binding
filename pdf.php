<?php

include 'mail.php';
require('pdf\fpdf.php');

$flag=$_POST['flag'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');

if($flag==0){$pdf->Output("I");}

if($flag==1){
  $pdfstring=$pdf->Output("S");
  //echo $_POST['res'];
  mailfun($pdfstring,$_POST['res'],$_POST['sub'],$_POST['mes']);
}
?>
