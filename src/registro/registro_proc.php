<?php 

$nombre = utf8_encode(ucwords(strtolower($_POST['nombre'])));
$apellido = utf8_encode(ucwords(strtolower($_POST['apellido'])));
$tarjeta = trim($_POST['tarjeta']);
$clave = trim($_POST['clave']);
$email = trim(strtolower($_POST['email']));
$sincorreo = $_POST['sincorreo'];
$telefono = trim($_POST['telefono']);
$direccion = utf8_encode(ucwords(strtolower($_POST['direccion'])));
$localidad = $_POST['localidad'];



// echo $nombre . "   " . $apellido;
$usuario = new usuario();
$resultado = $usuario->registro($nombre,$apellido,$tarjeta,$clave,$email,$sincorreo,$telefono,$direccion,$localidad);
if(!$resultado){
	echo $resultado;
}else{
	header("Location:index.php?reg=ok");
}




?>