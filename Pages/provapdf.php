<?php
require('./fpdf186/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',22);
$pdf->Write(5,'Referto esame di rettoscopia Sig. Andrea Iannotti');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',18);
$pdf->Write(4,'Medico: Dr. Emanuele Papile');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Write(3,'Oggetto del Referto');
$pdf->Ln(6);
$pdf->SetFont('Arial','',12);
$pdf->Write(2,'Rettoscopia');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Write(2,'Contenuto del referto');
$pdf->Ln(6);
$pdf->SetFont('Arial','',12);
$pdf->Write(2,'il paziente ha sostenuto con successo la rettoscopia non mostrando');
$pdf->Ln(6); 
$pdf->Write(2,'sintomi o problemi');
$pdf->Ln(15);
$pdf->Write(2,'Firma del Medico');
$pdf->Ln(6);
$pdf->SetFont('Arial','I',9);
$pdf->Write(1,'Dr. Emanuele Papile');
$pdf->Ln(4);
$pdf->Write(1,'(firmato digitalmente)');
$pdf->Output();
?>