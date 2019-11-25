<?php
include_once('pdf_usuario.php');
//include_once('myDBC.php');
 
    //Se crea un objeto de PDF
    //Para hacer uso de los métodos
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
    $pdf->SetFont('Arial','B',9); //Arial, negrita, 12 puntos
 
    $pdf->Output(); //Salida al navegador del pdf
?>