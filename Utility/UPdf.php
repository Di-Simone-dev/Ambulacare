<?php
require __DIR__.'/fpdf186/fpdf.php';
class UPdf{
    public static function crea_scarica_pdf_conimg($arrayreferto){
        $pdf=new FPDF();
        $pdf->Settitle('referto');
        $pdf->AddPage();
        $lineHeight = 8;
        $pdf->SetFont('Arial','B',22);
        $pdf->Write(5,'Referto esame di '.$arrayreferto["nominativopaziente"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',18);
        $pdf->Write(4,'Medico: Dr. '.$arrayreferto["nominativomedico"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(3,'Oggetto del Referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(2,$arrayreferto["oggetto"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(2,'Contenuto del referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, $lineHeight, $arrayreferto["contenuto"]);
        $pdf->Image($arrayreferto['immagine'],'','',100,100);
        $pdf->Output('D', 'referto.pdf');
    }
    public static function crea_scarica_pdf_noimg($arrayreferto){
        $pdf=new FPDF();
        $pdf->Settitle('referto');
        $pdf->AddPage();
        $lineHeight = 8;
        $pdf->SetFont('Arial','B',22);
        $pdf->Write(5,'Referto esame di '.$arrayreferto["nominativopaziente"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',18);
        $pdf->Write(4,'Medico: Dr. '.$arrayreferto["nominativomedico"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(3,'Oggetto del Referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(2,$arrayreferto["oggetto"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(2,'Contenuto del referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, $lineHeight, $arrayreferto["contenuto"]);
        $pdf->Output('D', 'referto.pdf');
    }
}
?>