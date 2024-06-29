<?php
require __DIR__.'/fpdf186/fpdf.php';
class UPdf{
    public static function crea_scarica_pdf($arrayreferto,$withimg){
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
        if($withimg){
            $imageBinary = $arrayreferto['datiimmagine'];
            $imageInfo = getimagesizefromstring($imageBinary);
            if ($imageInfo !== false) {
                // Le informazioni sull'immagine sono state ottenute correttamente
                $width = $imageInfo[0]/3.75;  // Larghezza dell'immagine
                $height = $imageInfo[1]/3.75; // Altezza dell'immagine
            }
            
            $type = $arrayreferto['tipoimmagine'];
            switch ($type) {
                case 'image/jpg':
                    $tempImage = 'immagine.jpg';
                    break;
                case "image/jpeg":
                    $tempImage = 'immagine.jpeg';
                    break;
                case "image/png":
                    $tempImage = 'immagine.png';
                    break;
                default:
                    $tempImage = 'immagine.jpg';
                    echo "errore sul tipo dell'immagine";
            }
            //var_dump($tempImage);
            file_put_contents($tempImage, $imageBinary);
            $pdf->AddPage();
            $pdf->Image($tempImage,10,10,$width,$height);
        }
        $pdf->Output('D', 'referto.pdf');
        if (file_exists($tempImage)) {
            // Attempt to delete the file
            if (unlink($tempImage)) {
                //echo "The file has been deleted successfully.";
            } 
            else
            {
                //echo "There was an error deleting the file.";
            }
        } 
        else 
        {
            echo "The file does not exist.";
        }
    }
}