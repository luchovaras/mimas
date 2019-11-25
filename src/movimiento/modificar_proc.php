<?php
include("secur/security.php");

$mes = getdate();
$periodo = $mes['mon'];

$id = $_POST['id'];
$cupon = $_POST['cupon'];
$fechacompra = $_POST['fechacompra'];
$cuota = $_POST['cuota'];
$importe = $_POST['importe'];



$movimiento = new movimiento();
$resultado = $movimiento->modificar($id,$cupon,$fechacompra,$cuota,$importe,$periodo);
if(!$resultado){
	echo "No se pudo modificar";
}else{
	header("Location:index.php?sec=movimientos");
}

?>