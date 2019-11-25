<?php
$email = $_POST['email'];

$usuario = new usuario();
$selec = $usuario->recuperapass($email);

if ($selec) {
	foreach ($selec as $row) {
		$para      = $email;
		$titulo    = 'Recuperación de Clave';
		$mensaje   = 'Hola '.$row['nombre_usuario'].'! Tu clave es: ' . $row['clave_usuario']."\n\n"."Tarjeta Marcos Juárez | Tarjeta Local\n\n"."WeCreativo";
		$cabeceras = 'From: tarjetamarcosjuarez.com.ar' . "\r\n" .
    'Reply-To: lucianovaras77@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);

header("Location:index.php?sec=home&mail=ok");
	}
}else{
header("Location:index.php?sec=recupera_clave&mail=error");
}


?>