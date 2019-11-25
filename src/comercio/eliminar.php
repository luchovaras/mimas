<?php 
$id = $_GET['id'];
$eliminar = new comercio();
$resultado = $eliminar->eliminar($id);
if(!$resultado){
	echo "No se pudo eliminar, intentelo más tarde.";
}else{
	header("Location:index.php?sec=comercios");
}


?>