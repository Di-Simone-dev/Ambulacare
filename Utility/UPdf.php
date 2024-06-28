<?php
require __DIR__.'/fpdf186/fpdf.php';
class UPdf{
    public static function crea_scarica_pdf($arrayreferto,$img){
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
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(2,$arrayreferto["oggetto"]);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->Write(2,'Contenuto del referto: ');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, $lineHeight, $arrayreferto["contenuto"]);
        if($img){
            $imageBinary = $arrayreferto['datiimmagine'];
            $imageInfo = getimagesizefromstring($imageBinary);
            if ($imageInfo !== false) {
                // Le informazioni sull'immagine sono state ottenute correttamente
                $width = $imageInfo[0]/3.75;  // Larghezza dell'immagine
                $height = $imageInfo[1]/3.75; // Altezza dell'immagine
            }
            $tempImage = 'immagine.jpg';
            file_put_contents($tempImage, $imageBinary);
            $pdf->AddPage();
            $pdf->Image($tempImage,10,10,$width,$height);
        }
        $pdf->Output('D', 'referto.pdf');
    }
    /*public static function crea_scarica_pdf_noimg($arrayreferto){
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
    }*/
}
?>