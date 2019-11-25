<?php 
$nombre = $_POST['nombre'];
$propietario = $_POST['propietario'];
$codigo = $_POST['codigo'];
$clave = $_POST['clave'];
$localidad = $_POST['localidad'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


$comercio = new comercio();
$resultado = $comercio->registro($nombre,$propietario,$codigo,$clave,$localidad,$direccion,$email,$telefono);
if(!$resultado){
	echo $resultado;
}else{
	header("Location:index.php?sec=comercios");
}




?>