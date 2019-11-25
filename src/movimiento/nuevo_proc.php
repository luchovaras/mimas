<?php 
include("secur/security.php");

$usuario = $_POST['usuario'];
$comercio = $_POST['comercio'];
$cupon = $_POST['cupon'];
$fechacompra = $_POST['fechacompra'];
$cuota = $_POST['cuota'];
$importe = $_POST['importe'];

$movimiento = new movimiento();
$resultado = $movimiento->registro($usuario,$comercio,$cupon,$fechacompra,$cuota,$importe);
if(!$resultado){
	echo $resultado;
}else{
	header("Location:index.php?sec=movimientos");
}

?>