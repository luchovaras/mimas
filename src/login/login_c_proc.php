<?php 
session_start();

$codigo = $_POST['codigo'];
$clave = $_POST['clave'];

$ing = new comercio();
$resultado = $ing->login($codigo,$clave);
if(!$resultado){
	header("Location:index.php?sec=comerc&logc=errorc");
}else{
		foreach ($resultado as $row) {
			$_SESSION['logeado'] = 'si';
			$_SESSION['comercio'] = 'si';
			$_SESSION['nombre'] = $row['nombre_comercio'];
			$_SESSION['propietario'] = $row['propietario_comercio'];
			$_SESSION['codigo'] = $row['codigo_comercio'];
			header("Location:index.php?sec=perfil_c");
		}
	}		
	// header('Location:http://google.com');
	// se crean todas las variables de sesion



?>