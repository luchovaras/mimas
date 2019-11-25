<?php
include_once('pdf.php');
//include_once('myDBC.php');

function Footer()
    {
        function Footer() // Pie de página
        {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        /* Cell(ancho, alto, txt, border, ln, alineacion)
         * ancho=0, extiende el ancho de celda hasta el margen de la derecha
         * alto=10, altura de la celda a 10
         * txt= Texto a ser impreso dentro de la celda
         * border=T Pone margen en la posición Top (arriba) de la celda
         * ln=0 Indica dónde sigue el texto después de llamada a Cell(), en este caso con 0, enseguida de nuestro texto
         * alineación=C Texto alineado al centro
         */
        $this->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
        }
    }
 
    //Se crea un objeto de PDF
    //Para hacer uso de los métodos
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
    $pdf->SetFont('Arial','B',9); //Arial, negrita, 12 puntos
 
    $pdf->Output(); //Salida al navegador del pdf
?>