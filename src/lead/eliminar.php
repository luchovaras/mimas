<?php 
$id = $_GET['id'];
$eliminar = new usuario();
$resultado = $eliminar->eliminar($id);
if(!$resultado){
	echo "No se pudo eliminar";
}else{
	header("Location:index.php?sec=usuarios");
}


?>