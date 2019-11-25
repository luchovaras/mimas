<?php
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$ing = new usuario();
$resultado = $ing->login($usuario,$clave);
if(!$resultado){
	header("Location:index.php?sec=home&log=error");
	echo "error";
}else{
		foreach ($resultado as $row) {
			$_SESSION['logeado'] = 'si';
			$_SESSION['id'] = $row['id_usuario'];
			$_SESSION['usuario'] = $row['usuario_usuario'];
			$_SESSION['nombres'] = $row['nombres_usuario'];
			$_SESSION['apellidos'] = $row['apellidos_usuario'];
			$_SESSION['tipo'] = $row['tipo_usuario'];
			echo $_SESSION['nombres'];
			header("Location:index.php?sec=leads");
		}
	}	
?>