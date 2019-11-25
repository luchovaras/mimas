<?php
include_once('fpdf.php');
include_once('crea_pdf.php');
if($_SESSION['tipo']!=1){
$id = $_SESSION['id'];
}else{
$id = $_GET['id'];    
}
$movimiento = new movimiento();
$listar1 = $movimiento->seleccionarmov1($_SESSION['id']);
$listar2 = $movimiento->seleccionarmov2($_SESSION['id']);
$listar34 = $movimiento->seleccionarmov34($_SESSION['id']);
$total1 = $movimiento->sumar1($_SESSION['id']);
$total2 = $movimiento->sumar2($_SESSION['id']);
$total34= $movimiento->sumar34($_SESSION['id']);
$tasas = $movimiento->listartasas();


$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$localidad = $_SESSION['localidad'];

// $hoy = getdate();
// $dianom = $hoy['weekday'];
// $dianum = $hoy['mday'];
// $diames = $hoy['month'];
// $aÃ±o = $hoy['year'];

$pdf = new FPDF();
$pdf->AddPage();
if ($localidad=='1') {
    $pdf->Image('http://tarjetamarcosjuarez.com.ar/miembros/img/msjz.png',10,12, 20);
}else{
    $pdf->Image('http://tarjetamarcosjuarez.com.ar/miembros/img/local.png',10,12, 20);
}
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
// $pdf->Cell(0,10,'Resúmen de Cuenta: '. utf8_decode($nombre) ." ". utf8_decode($apellido) ,T,0,'L');
$pdf->Cell(0,10,'Resumén de Cuenta: '. utf8_decode($nombre) ." ". utf8_decode($apellido) ." - ".utf8_decode($id) ,T,0,'L');

$pdf->Ln(5);
$pdf->Cell(0,10, ucfirst(strftime("%A %d de %B de %Y")),0,0,'L');
$pdf->Ln(5);

foreach ($tasas as $rowt) {
  $pdf->SetFont('Arial','',5);
  $pdf->Cell(0,10,'T.Com. actual: TNA: '.$rowt['tna_ac'].' TEA: '.$rowt['tea_ac'].' TEM: '.$rowt['tem_ac'].' | T.Com. actual: TNA: '.$rowt['tna_ap'].' TEA: '.$rowt['tea_ap'].' TEM: '.$rowt['tem_ap'],0,0,'L');
  $pdf->Ln(3);
  $pdf->Cell(0,10,'T.Com. pxmo resumen: TNA: '.$rowt['tna_pc'].' TEA: '.$rowt['tea_pc'].' TEM: '.$rowt['tem_pc'].' | T.Com. pxmo resumen: TNA: '.$rowt['tna_pp'].' TEA: '.$rowt['tea_pp'].' TEM: '.$rowt['tem_pp'],0,0,'L');    
  $pdf->Ln(5);
  }

$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,45,'FECHA',0,0,'L');
$pdf->Ln(0);
$pdf->Cell(160,45,'CONCEPTO',0,0,'C');
$pdf->Ln(0);
$pdf->Cell(180,45,'IMPORTE',0,0,'R');
$pdf->Ln(5);

$pdf->SetFont('Arial','',8);
foreach ($listar1 as $row1) {
    $pdf->Cell(0,60,date_format(date_create($row1['Fecha']),'d/m/Y'),0,0,'L');
    $pdf->Ln(0);
    $pdf->Cell(160,60,utf8_decode(strtoupper(trim($row1["Concepto"]))),0,0,'C');
    $pdf->Ln(0);
    $pdf->Cell(180,60,'$ '. number_format($row1['Importe'],2,",","."),0,0,'R');
    $pdf->Ln(5);
}

$pdf->Ln(3);

foreach ($listar2 as $row2) {
    $pdf->Cell(120,60,date_format(date_create($row2['Fecha']),'d/m/Y'),0,0,'L');
    $pdf->Ln(0);
    $pdf->Cell(160,60,utf8_decode(strtoupper(trim($row2["Concepto"]))),0,0,'C');
    $pdf->Ln(0);
    $pdf->Cell(180,60,'$ '. number_format($row2['Importe'],2,",","."),0,0,'R');
    $pdf->Ln(5);
}

  foreach ($total2 as $rowb) {
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(180,70,'Saldo Actual: $ '.number_format($rowb['total'],2,",",".") ,0,0,'R');    
  $pdf->Ln(5);
  }
  
  $pdf->Ln(3);
  
  foreach ($total2 as $rowb) {
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(180,70,'Saldo a Pagar: $ '.number_format($rowb['total'],2,",",".") ,0,0,'R');    
  $pdf->Ln(5);
  }

  //foreach ($total34 as $rowc) {
  //$pdf->Cell(180,70,'Saldo a Pagar: $ '.number_format($rowc['total'],2,",",".") ,0,0,'R');    
  //$pdf->Ln(5);
  //}

   
    $pdf->SetY(266); 
    $pdf->SetFillColor(255,255,255); 
    $pdf->SetFont('Arial','',8); 
    $pdf->Cell(0,10,utf8_decode("Tarjeta Local - Tarjeta Marcos JuÃ¡rez | WeCreativo"),'T',0,'C');


// $pdf->Output();
$pdf->Output('cliente:'.$id.'.pdf', 'D'); 

?>

