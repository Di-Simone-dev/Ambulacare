<?php
require('./fpdf186/fpdf.php');
class UPdf{
    public static function crea_scarica_pdf(){
        $pdf=new FPDF();
        $pdf->Settitle('referto');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',22);
        $pdf->Write(5,'Referto esame di'.'{$nometipologia}'.'Sig.'.'{$nomepaziente}'.'{$cognomepaziente}');
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',18);
        $pdf->Write(4,'Medico: Dr.'.'{$nomemedico}'.'{$cognomemedico}');
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(3,'Oggetto del Referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(2,'{$oggettoref}');
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(2,'Contenuto del referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(2,'{$contenutoref}');
        $nome_file=$pdf->Output(referto.pdf);
        header("Content-type: Application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$nome_file\"");
        header("Content-Length: . filesize($nome_file)");
        readfile($nome_file);
    }
}
?>