<?php
$nombre = utf8_encode(ucwords(strtolower($_POST['nombre'])));
$apellido = utf8_encode(ucwords(strtolower($_POST['apellido'])));
$numero = trim($_POST['numero']);
$usuario = new usuario();
$resultado = $usuario->concursar($nombre,$apellido,$numero);
if(!$resultado){
header("Location:http://clarin.com");
}else{
header("Location:index.php?sec=perfil");
}
?>