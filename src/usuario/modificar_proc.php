<?php 
$id = $_POST['id'];
$clave = $_POST['clave'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$localidad = $_POST['localidad'];

$usuario = new usuario();
$resultado = $usuario->modificar($id,$clave,$email,$telefono,$direccion,$localidad);
if(!$resultado){
	echo "No se pudo modificar";
}else{
	header("Location:index.php?sec=perfil");
}

?>