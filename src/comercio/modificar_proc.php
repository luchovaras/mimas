<?php 
$id = $_POST['id'];
$clave = $_POST['clave'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$comercio = new comercio();
$resultado = $comercio->modificar($id,$clave,$email,$telefono,$direccion);
if(!$resultado){
	echo "No se pudo modificar";
}else{
	header("Location:index.php?sec=comercios");
}

?>